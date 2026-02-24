/* 
Lógica de Programacao
    - Falar a lingua do computador
Algoritmo
    - Receita de bolo. Os passos na sequencia certa

JavaScript
    - Variáveis - pedacinho na memória do computador
        que voce pode guardar o que voce quiser

    - Funcoes
        pedacinho de código que, só executa quando
        eu chamo
        
    - Como se comunicar com o HTML
        Manipular a DOM

    console.log() mostra o que eu quiser na tela

    [x] Saber quando o botão foi clicado
    [x] Pegar o texto que o usário digitou
    [x] Mando para o servidor traduzir
    [x] Receber a resposta do servidor (traducao)  
    [x] Colocar o texto na tela
    [x] Escolher o idioma

    Fase 2
    [] Saber quando o botão do microfone for clicado
    [] IA - Detectar a voz e pegar a transcrição
    [] Traduzir o que foi falado
    [] Colocar o site no ar

    // JavaScript - scripts
    // HTML - document
    querySelector - procurar alguem no HTML
    value = valor - o texto que tem nele

   padrao =  https://api.mymemory.translated.net/get?q=
   traduzir =  Hello World!
   idioma = &langpair=pt-BR|en

   fetch / ferramenta do javascript para entrar em contato com um servidor
   await (Espere) - async (async & await)
   json (formato mais amigavel)
*/

// pegando o texto dentro do text area
let inputTexto = document.querySelector(".input-texto");
let traducao = document.querySelector(".traducao");
let idioma = document.querySelector(".idioma");

async function traduzir() {

    // endereço do servidor com o texto que eu quero traduzir 
    let endereco = "https://api.mymemory.translated.net/get?q="
    + inputTexto.value 
    + "&langpair=pt-BR|" 
    + idioma.value

    // resposta do servidor
    let resposta = await fetch(endereco);

    // converto a resposta para um formato mais amigavel
    let dados = await resposta.json();

    traducao.innerHTML = dados.responseData.translatedText;

    // textContent = texto puro, sem formatação
}

function ouvirVoz() {
    // Ferramenta de transcição de voz do navegador
    let voz = window.webkitSpeechRecognition

    // Deixando a ferramenta pronta para ser usada
    let reconhecimentoVoz = new voz();

    // Configurando a linguagem para português do Brasil
    reconhecimentoVoz.lang = "pt-BR";

    // Me avise quando ele terminar de ouvir a voz
    reconhecimentoVoz.onresult = (evento) => {
        let textoTranscricao = evento.results[0][0].transcript; /* Pegando o texto que ele entendeu */

        inputTexto.textContent = textoTranscricao; /* Colocando o texto no text area */

        traduzir(); /* Traduzindo o texto que ele entendeu */
    }

    reconhecimentoVoz.start(); /* Comece a ouvir a voz do usuário */
}
// clicou no botão -> chama a função -> monto o endereço ->
// chamo o servidor -> peço para esperar -> responde