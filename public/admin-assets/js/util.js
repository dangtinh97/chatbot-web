async function request(url,method,data)
{
    return new Promise((resolve)=>{
        $.ajax({
            url:url,
            type:method,
            typeData:"JSON",
            data:data,
            headers:{
                Authorization:"Bearer "+window.localStorage.getItem('token')
            },
            success:function (res)
            {
                return resolve(res)
            }
        }).fail(function (){
            return resolve({
                status:500,
                content:"SERVER ERROR",
                data:{}
            })
        })
    })
}
