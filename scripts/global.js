//Codigo do Fundo fluido
const bgimg = document.createElement('img');
bgimg.src = 'img/background.png';
bgimg.style.position = 'fixed';
bgimg.style.zIndex = '-1';
bgimg.style.top = '0';
bgimg.style.left = '0';
bgimg.ratio = bgimg.width / bgimg.height;
document.body.appendChild(bgimg);
window.onresize = function () {
    if(window.innerWidth > window.innerHeight * bgimg.ratio){
        bgimg.style.height = 'auto';
        bgimg.style.width = '100vw';
    }else{
        bgimg.style.width = 'auto';
        bgimg.style.height = '100vh';
    }
}
onresize(undefined);

//Confirma senha
function confSenha() {
    let conf = $('#sen').val() === $('#sen2').val();
    if (!conf) alert('Confirmação de senha incorreta!');
    return conf;
}