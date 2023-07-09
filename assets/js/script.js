// CONTADOR DE CAIXA DE TEXTO
textarea = document.querySelector("#mensagem");
textarea.addEventListener('input', autoResize, false);
function autoResize() {
    this.style.height = 'auto';
    this.style.height = this.scrollHeight + 'px';
}                                
var textarea=document.getElementById("mensagem");
var caracteresRestantes=document.getElementById("caracteres_restantes");
textarea.oninput=function(e){
    caracteresRestantes.innerHTML=(255-this.value.length);
}