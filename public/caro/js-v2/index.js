function setButtonLight(id,light){
    const ele = document.getElementById(id);
    if(light){
        ele.classList.add('light-button')
    }else {
        ele.classList.remove('light-button')
    }
}
