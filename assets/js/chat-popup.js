const popup = document.querySelector('.chat-popup');
const popup_Publicar = document.querySelector('.publicar-popup');
const chatBtn = document.querySelector('.chat-btn');
const chatBtnAdd = document.querySelector('.chat-btn-add');
const submitBtn = document.querySelector('.submit');
const chatArea = document.querySelector('.chat-area');
const inputElm = document.querySelector('.input-area >input');
      

//   chat button toggler 

chatBtn.addEventListener('click', ()=>{
    popup.classList.toggle('show');
});

chatBtnAdd.addEventListener('click', ()=>{
    popup_Publicar.classList.toggle('show');
});


function validar(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13){
        let userInput = inputElm.value;
        if(!(userInput.length === 0 || userInput === " "))
        {
            let temp = `<div class="out-msg">
            <span class="my-msg">${userInput}</span>
            <img src="../../assets/images/faces/face1.jpg" class="avatar" alt="profile">
            </div>`;
            chatArea.insertAdjacentHTML("beforeend", temp);
            inputElm.value = '';
        }else{alert("Debe Ingresar un Mensaje, no sea pendejo!");}
    }
  }


submitBtn.addEventListener('click', ()=>{
    let userInput = inputElm.value;
        if(!(userInput.length === 0 || userInput === " "))
        {
            let temp = `<div class="out-msg">
            <span class="my-msg">${userInput}</span>
            <img src="../../assets/images/faces/face1.jpg" class="avatar" alt="profile">
            </div>`;
            chatArea.insertAdjacentHTML("beforeend", temp);
            inputElm.value = '';
        }else{alert("Debe Ingresar un Mensaje, no sea pendejo!");}
})