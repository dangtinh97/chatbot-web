@extends('layouts.app-chat')
@section('content')
    <section class="container" id="page-chat">
        <div class="container-fluid h-100 chat_body">
            <div class="row justify-content-center h-100">
                <div class="col-md-8 col-xl-12 chat" id="form-chat">
                    <div class="card">
                        <div class="card-header msg_head">
                            <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                    <img src="{{asset('assets/images/handshake-icon.png')}}"
                                         class="rounded-circle user_img">
                                    <span class="online_icon"></span>
                                </div>
                                <div class="user_info">
                                    <span>Người lạ!</span>
                                    <p></p>
                                </div>

                                <div id="wave" class="d-none is_typing">
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                </div>

                                <div class="video_cam d-none">
                                    <span><i class="fas fa-video"></i></span>
                                    <span><i class="fas fa-phone"></i></span>
                                </div>
                            </div>
                            <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
                            <div class="action_menu" id="action_menu">
                                <ul>
                                    {{--                                    <li><i class="fas fa-user-circle"></i> View profile</li>--}}
                                    {{--                                    <li><i class="fas fa-users"></i> Add to close friends</li>--}}
                                    <li id="connect-chat"><i class="fas fa-plus"></i>Kết nối!</li>
                                    <li id="end-chat"><i class="fas fa-ban"></i>Rời chat</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body msg_card_body">
                            <div class="loader" style="display: none">
                                <div class="bar bar1"></div>
                                <div class="bar bar2"></div>
                                <div class="bar bar3"></div>
                            </div>

                        </div>
                        <div class="card-footer d-none">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                                </div>
                                <textarea name="" class="form-control type_msg"
                                          placeholder="Type your message..."></textarea>
                                <div class="input-group-append" id="btn-send-chat">
                                    <span class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <audio class="d-none" id="notification-new-message">
            <source src="{{asset('assets/mp3/notification-new-message.wav')}}" type="audio/wav">
        </audio>
    </section>
@endsection
@section('scripts')
    <script src="https://cdn.socket.io/4.4.0/socket.io.min.js"
            integrity="sha384-1fOn6VtTq3PWwfsOrk45LnYcGosJwzMHv+Xh/Jx5303FVOXzEnw0EpLv30mtjmlj"
            crossorigin="anonymous"></script>
    <script>
        const SOCKET_SINGLE_CHAT_CREATE_ROOM = "single-chat-create-room"
        const SOCKET_JOIN_SINGLE_CHAT = "join-single-chat"
        const STATUS_ROOM_WAIT_CONNECT = "WAIT_CONNECT"
        const STATUS_ROOM_IN_CHATTING = "IN_CHATTING"
        const SOCKET_SEND_MESSAGE_SINGLE_CHAT = "single-chat-send-message"
        const SOCKET_USER_OFFLINE_CHAT_SINGLE = "user-leave-room-single-chat"
        const SOCKET_USER_END_CHAT_ROOM_SINGLE_CHAT = "end-chat-single"
        const SOCKET_CHAT_IS_TYPING = "chat-typing"
        let roomChat = null
        let keyCodeEnd = 0;
        var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
        let userIsTab = true;
        let waitingConnect = false;
        let timeSendSocketTypeKeyboard = 0;
        let timeIntervalSendSocketTypeKeyboard = null;
        let timeIntervalClearOffTyping = null;
        let timeIntervalTypeKeyboard = null;
        let timeEnd = 0;
        let dataEnd = {}
        let userWaitConnect = '{{(bool)$waitConnect ?? true}}' == 1 ? true : false //xem user có đang chờ kết nối hay không

        document.addEventListener("visibilitychange", event => {
            userIsTab = document.visibilityState === "visible";
        })

        document.addEventListener("DOMContentLoaded", function () {
            waitUserConnect()
            $('#action_menu_btn').click(function () {
                $('.action_menu').toggle();
            });

            let socketIsConnect = false;
            let socket = io('{{env('URL_SOCKET')}}', {
                transports: ['websocket', 'polling'],
                auth: {
                    token: '{{$token}}',
                },
                query: {
                    user_id: '{{$userOid}}'
                },
                timestampRequests: true,
                forceBase64: true,
            })

            socket.on("connect_error", () => {
                // revert to classic upgrade
                socket.io.opts.transports = ["polling", "websocket"];
            });

            $(this).on('keydown', '.type_msg', function (e) {
                processTypeKeyboard();
                if (keyCodeEnd !== 16 && e.keyCode === 13 && !isMobile) {
                    e.preventDefault();
                    $("#wave").fadeOut()
                    sendMessage()
                }
                keyCodeEnd = e.keyCode
            })

            function processTypeKeyboard() {
                if (timeSendSocketTypeKeyboard <= 0) {
                    timeSendSocketTypeKeyboard = 3000;
                    timeIntervalSendSocketTypeKeyboard = setInterval(function () {
                        timeSendSocketTypeKeyboard -= 100;
                        if (timeSendSocketTypeKeyboard <= 0 && socket.connected) {
                            timeSendSocketTypeKeyboard = 3000
                            socket.emit(SOCKET_CHAT_IS_TYPING, {
                                status: "TYPING",
                                room_oid: roomChat.room_oid
                            })
                        }
                    }, 100)
                }

                let timeMax = 5000;
                if (timeIntervalTypeKeyboard !== null) clearInterval(timeIntervalTypeKeyboard);
                timeIntervalTypeKeyboard = setInterval(() => {
                    timeMax -= 100;
                    if (timeMax <= 0) {
                        if (timeIntervalSendSocketTypeKeyboard !== null) clearInterval(timeIntervalSendSocketTypeKeyboard)
                        clearInterval(timeIntervalTypeKeyboard)
                        timeSendSocketTypeKeyboard = 0;
                        socket.volatile.emit(SOCKET_CHAT_IS_TYPING, {
                            status: "STOP_TYPING",
                            room_oid: roomChat.room_oid
                        })
                    }
                }, 100)

                return true;
            }

            socket.on("connect", function () {
                console.log(socket)
                userWaitConnect === true ? $(".user_info p").html("Vui lòng chờ...") : $(".user_info p").html("Chưa kết nối với ai")

                if (socket.connected && userWaitConnect) socket.volatile.emit(SOCKET_SINGLE_CHAT_CREATE_ROOM, {})
                socketIsConnect = true;
                socket.on(SOCKET_JOIN_SINGLE_CHAT, function (response) {
                    roomChat = response;
                    if (response.status_room === STATUS_ROOM_WAIT_CONNECT) return waitUserConnect()
                    if (response.status_room === STATUS_ROOM_IN_CHATTING) return inChatting(response)
                })
                socket.on(SOCKET_SEND_MESSAGE_SINGLE_CHAT, (response) => onMessage(response))
                socket.on(SOCKET_USER_OFFLINE_CHAT_SINGLE, () => userLeaveRoom())
                socket.on(SOCKET_USER_END_CHAT_ROOM_SINGLE_CHAT, (data) => endChatSingle(data.from_user_oid))
                socket.on(SOCKET_CHAT_IS_TYPING, (data) => socketChatTyping(data))
                socket.on("disconnect", function () {
                    $(".user_info p").html("kết nối internet không ổn định...")
                })
            })

            function socketChatTyping(data) {
                if (timeIntervalClearOffTyping !== null) clearInterval(timeIntervalClearOffTyping);
                if (data.from_user_oid == '{{$userOid}}') return false;
                if (data.status === "TYPING") $("#wave").removeClass('d-none').fadeIn()
                if (data.status === "STOP_TYPING") $("#wave").fadeOut()
                let timeCloseTypingHtml = 5000;
                timeIntervalClearOffTyping = setInterval(function () {
                    timeCloseTypingHtml -= 100;
                    if (timeCloseTypingHtml <= 0) {
                        clearInterval(timeIntervalClearOffTyping)
                        $("#wave").fadeOut()
                    }
                }, 100)
            }

            $(this).on('click', '#connect-chat', function () {
                request('{{route('api.set-wait-connect')}}', 'GET', {})
                userWaitConnect = true;
                if (!socketIsConnect) return false;
                socket.emit(SOCKET_SINGLE_CHAT_CREATE_ROOM, {})
                $(".user_info p").html("Đang tìm kiếm!")
                $('.action_menu').toggle();
                setMenuAction(true, false)
                waitUserConnect()
            })

            function endChatSingle(userEndChat) {
                if (userEndChat != '{{$userOid}}') {
                    $(".user_info p").html("Người lạ đã rời chat!")
                } else {
                    $(".user_info p").html("Chưa kết nối với ai!")
                }
                processChat(false)
                setMenuAction(false, true)
            }

            function onMessage(data) {
                let timeNow = (new Date()).getTime();
                if (dataEnd === data && timeNow - timeEnd < 100) return;
                timeEnd = timeNow;
                dataEnd = data;

                let classSendFrom = ''
                let parent = ''
                if (data.from_user_oid != '{{$userOid}}') {
                    parent = 'start'
                    classSendFrom = 'msg_cotainer';
                    newMessageShowButtonLoadEnd()
                    playAudio()
                } else {
                    //sms my
                    classSendFrom = 'msg_cotainer_send'
                    parent = 'end'
                }
                var match = /\r|\n/.exec(data.message);
                if (match) {
                    classSendFrom += ' update-border-radius'
                }
                let html = '<div  class="d-flex justify-content-' + parent + ' mb-2"> <div style="max-width: 75%;white-space: pre-line;padding: 3px 10px !important;" class="' + classSendFrom + '">' + data.message.replace(/<[^>]*>?/gm, '') + '</div></div>';
                $(".card-body").append(html)
                if (data.from_user_oid == '{{$userOid}}') {
                    scrollBodyChatToEnd()
                }
            }

            function checkUserJoinRoom() {
                if (waitingConnect) playAudio()
            }

            function playAudio() {
                if (userIsTab) return false
                var audio = document.getElementById("notification-new-message");
                audio.volume = 0.1;
                audio.play()
            }

            function userLeaveRoom() {
                $(".online_icon").css("background-color", "#d13737")
            }

            function userOnline() {
                if (roomChat.status_room == STATUS_ROOM_IN_CHATTING) $(".online_icon").css("background-color", "#4cd137")
            }

            function inChatting(dataRoom) {
                checkUserJoinRoom();
                waitingConnect = false;
                $(".user_info p").html("Đã kết nối!")
                $(".type_msg").focus();
                $(".show_start").fadeOut(1000)
                $(".msg_head").removeClass('d-none')
                $(".card-footer").removeClass('d-none')
                userOnline()
                processChat(true)
                $(".msg_card_body loader").remove()
            }

            function processChat(isChat) {
                if (isChat) {
                    $(".card-body .loader").fadeOut()
                    $("#end-chat").fadeIn()
                    $(".card-footer").fadeIn()
                    $("#connect-chat").fadeOut()
                } else {
                    $("#end-chat").fadeOut()
                    $(".card-body").html("")
                    $("#connect-chat").fadeIn()
                    $(".card-footer").fadeOut()
                }
            }

            function waitUserConnect() {
                waitingConnect = true;
                $(".msg_card_body").html('<div class="loader" ><div class="bar bar1"></div><div class="bar bar2"></div><div class="bar bar3"></div> </div>')
            }

            $(this).on("click", "#btn-send-chat", () => {
                timeSendSocketTypeKeyboard=0
                if(timeIntervalSendSocketTypeKeyboard!==null) clearInterval(timeIntervalSendSocketTypeKeyboard)
                socket.volatile.emit(SOCKET_CHAT_IS_TYPING, {
                    status: "STOP_TYPING",
                    room_oid: roomChat.room_oid
                })
                return sendMessage()
            })

            let timeClickBtnSendChatEnd = 0;

            function sendMessage() {

                let mess = $(".type_msg").val().trim()
                if ((new Date()).getTime() - timeClickBtnSendChatEnd < 100) $(".type_msg").focus();
                if (mess == "" || !socket.connected || roomChat === null || typeof roomChat.room_oid === "undefined") return false

                socket.emit(SOCKET_SEND_MESSAGE_SINGLE_CHAT, {
                    room_oid: roomChat.room_oid,
                    message: mess
                })
                return $(".type_msg").val("")
            }

            $(".type_msg")[0].addEventListener("blur", function () {
                timeClickBtnSendChatEnd = (new Date()).getTime()
            })

            $(this).on('click', '#end-chat', async function () {
                userWaitConnect = false;
                if (roomChat === null || typeof roomChat.room_oid === 'undefined') return
                const c = confirm('Bạn có muốn kết thúc cuộc trò chuyện?')
                if (!c) return false;
                $('.action_menu').toggle();
                await request('{{route('api.end-chat-single')}}', "POST", {
                    room_oid: roomChat.room_oid
                }).then(function (response) {
                    processChat(false)
                    if (response.status !== 200) return;
                    socket.emit(SOCKET_USER_END_CHAT_ROOM_SINGLE_CHAT, {
                        room_oid: roomChat.room_oid
                    })
                })
            })

            window.addEventListener('click', function (e) {

                if (document.getElementById('action_menu').contains(e.target) || document.getElementById('action_menu_btn').contains(e.target)) {
                    // Clicked in box
                } else {
                    if ($("#action_menu").css('display') === "block") $('.action_menu').toggle();

                }
            });

            function init() {
                $(".online_icon").css('background-color', "#727272")

                if (userWaitConnect) {
                    $(".user_info p").html("Đang tìm người kết nối...")
                    $(".msg_card_body .loader").fadeIn()
                    setMenuAction(true, false)
                } else {
                    $(".msg_card_body .loader").fadeOut()
                    setMenuAction(false, true)
                }
            }

            init()

            function setMenuAction(endChat = false, connectChat = false) {
                $("#end-chat,#connect-chat").fadeOut();
                if (endChat) $("#end-chat").fadeIn()
                if (connectChat) $("#connect-chat").fadeIn()
            }

            function newMessageShowButtonLoadEnd(){
                var ele = document.getElementsByClassName("msg_card_body")[0];

                var sh = ele.scrollHeight;
                var st = ele.scrollTop;
                var ht = ele.offsetHeight;

                if(ht===0 || ((st+10) > sh - ht))
                {
                    scrollBodyChatToEnd()
                    return true;
                }

                if(sh > 2*ht+10){
                    let bottom = document.getElementsByClassName('card-footer')[0].offsetHeight+10;
                    if(document.getElementById('scrollToEnd') == null) $(".msg_card_body").append('<i id="scrollToEnd" onclick="scrollBodyChatToEnd()" style="position: absolute;bottom: '+bottom+'px; right: 20px;z-index: 999999" class="fas fa-arrow-circle-down fa-2x"></i>')
                }
            }

        })

        if (isMobile) $(".card").css('height', `${window.innerHeight - 1}px`)

        window.addEventListener("resize",function (){
            if (isMobile) $(".card").css('height', `${window.innerHeight - 1}px`)
        })

        function scrollBodyChatToEnd()
        {

            document.getElementById('scrollToEnd') == null ? "" : document.getElementById('scrollToEnd').remove()
            setTimeout(()=>{
                let objDiv = document.getElementsByClassName("msg_card_body")[0];
                objDiv.scrollTop = objDiv.scrollHeight;
            },100)
        }

    </script>
@endsection
