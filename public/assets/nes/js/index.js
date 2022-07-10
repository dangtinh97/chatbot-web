let nes;
const ROM = document.getElementById('rom_game').value

function loadRom() {
    var request = new XMLHttpRequest();
    request.responseType = 'arraybuffer';

    request.onload = function () {
        console.log('Loading done.');
        new Game(request.response).inti()
        // run(request.response);
    };

    request.onerror = function (e) {
        console.log('failed to load.');
    };

    request.open('GET', ROM, true);
    request.send(null);
    loadScreen()
}

function loadScreen() {
    //width="256" height="240"
    const screenWidth = window.innerWidth;
    const screenHeight = window.innerHeight;
    let canvasW = 0;
    let canvasH = 0;
    if (screenWidth > screenHeight) {
        canvasH = screenHeight;
        canvasW = canvasH * (256 / 240);

    } else {
        canvasW = screenWidth;
        canvasH = screenWidth * (240 / 256);
    }
    $("#mainCanvas").css({
        width: canvasW,
        height: canvasH
    })
}

class Game {
    constructor(buffer) {
        this.buffer = buffer
        this.cardinalDirection = 'C'
        this.diagonal = null;
        this.DEFAULT = {
            'C': '',
            'E': NesJs.Joypad.BUTTONS.RIGHT,
            'S': NesJs.Joypad.BUTTONS.DOWN,
            'W': NesJs.Joypad.BUTTONS.LEFT,
            'N': NesJs.Joypad.BUTTONS.UP,
            'SE':[39,40,'R_D'],
            'SW':[37,40,'L_D'],
            'NW' :[37,38,'L_U'],
            'NE' :[39,38,'R_U']
        }
    }

    listenerButton() {
        setTimeout(function () {
            $("#btn-start").fadeIn()
        }, 4500)
        const _this = this
        $("#btn-start").on('click', function () {
            // $(this).fadeOut()
            _this.releasePadButton(NesJs.Joypad.BUTTONS.START)
        })

        $("#press-a").on('click', function () {
            _this.releasePadButton(NesJs.Joypad.BUTTONS.A)
        })
        $("#press-b").on('click', function () {
            _this.releasePadButton(NesJs.Joypad.BUTTONS.B)
        })
        let joySetInterval = null
        new JoyStick('joyDiv', {}, function (stickData) {
            if (joySetInterval != null) clearInterval(joySetInterval)
            if (stickData.cardinalDirection === 'C'){
                if(_this.diagonal!==null){
                    _this.handlerKeyUp(_this.DEFAULT[_this.diagonal][0])
                    _this.handlerKeyUp(_this.DEFAULT[_this.diagonal][1])
                    return _this.diagonal = null;
                }

                return  clearInterval(joySetInterval)
            }
            console.log(stickData.cardinalDirection)
            if(['SE','SW','NW','NE'].indexOf(stickData.cardinalDirection)!==-1){
                _this.diagonal = stickData.cardinalDirection;
                _this.handlerKeyDown(_this.DEFAULT[stickData.cardinalDirection][0])
                _this.handlerKeyDown(_this.DEFAULT[stickData.cardinalDirection][1])
            }else {
                if(_this.diagonal!==null){
                    _this.handlerKeyUp(_this.DEFAULT[_this.diagonal][0])
                    _this.handlerKeyUp(_this.DEFAULT[_this.diagonal][1])
                     _this.diagonal = null;
                }
                joySetInterval = setInterval(function () {
                    _this.releasePadButton(
                        _this.DEFAULT[stickData.cardinalDirection]
                    )
                }, 0);
            }

        });
    }

    handlerKeyDown(number){
        nes.handleKeyDown({
            keyCode : number
        },false)
    }

    handlerKeyUp(number){
        nes.handleKeyUp({
            keyCode : number
        },false)
    }

    run() {
        try {
            var rom = new NesJs.Rom(this.buffer);
        } catch (e) {
            console.error(e)
            return;
        }
        this.nes = nes = new NesJs.Nes();

        nes.addEventListener('fps', function (fps) {
            document.getElementById('fps').innerText = fps.toFixed(2);
        });

        nes.setRom(rom);

        nes.setDisplay(new NesJs.Display(document.getElementById('mainCanvas')));

        try {
            nes.setAudio(new NesJs.Audio());
        } catch (e) {
            console.error(e)
            console.log("NOT SUPPORT AUDIO")
        }

        window.onkeydown = function (e) {
            nes.handleKeyDown(e);
        };
        window.onkeyup = function (e) {
            nes.handleKeyUp(e);
        };

        nes.bootup();

        nes.run();
    }

    releasePadButton(key) {
        console.log
        nes.pad1.pressButton(key)
        setTimeout(function () {
            nes.pad1.releaseButton(key);
        }, 9)

    }

    inti() {
        this.run()
        this.listenerButton()
    }
}
