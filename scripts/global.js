//Codigo do Fundo fluido
const bgimg = document.createElement('img');
bgimg.src = 'media/background.png';
bgimg.style.position = 'fixed';
bgimg.style.zIndex = '-1';
bgimg.style.top = '0';
bgimg.style.left = '0';
document.body.appendChild(bgimg);
window.onresize = function () {
    if(window.innerWidth > window.innerHeight * (16/9)){
        bgimg.style.height = 'auto';
        bgimg.style.width = '100vw';
    }else{
        bgimg.style.width = 'auto';
        bgimg.style.height = '100vh';
    }
}
onresize();