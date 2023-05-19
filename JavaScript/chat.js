const form = document.querySelector(".typing-area"),
inputfield = form.querySelector(".input-field"),
senbtn = form.querySelector("button"),
chatbox = document.querySelector(".chat-box");


form.onsubmit = (e)=>{
    e.preventDefault();  //preventing form from submitting
 }


senbtn.onclick= ()=>{
        //let's start AJAX

        let xhr = new XMLHttpRequest(); //creating XML Object
        xhr.open("POST","PHP/insert-chat.php",true);
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    inputfield.value = "";//once message inserted into database then leave blank the input field
                    scrollToBottom();
                }
                
                }
        }

        //we have to senf=d formedata through ajax to php
        let formdata = new FormData(form);//create new forme data object
        xhr.send(formdata);//sending the forme data to php

        
}


chatbox.onmouseenter = ()=>{
    chatbox.classList.add("active");
}
chatbox.onmouseleave = ()=>{
    chatbox.classList.remove("active");
}

setInterval(()=>{

    //let's start AJAX

    let xhr = new XMLHttpRequest(); //creating XML Object
    xhr.open("POST","PHP/get-chat.php",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                chatbox.innerHTML = data;
                if(!chatbox.classList.contains("active")){
                    scrollToBottom();
                }
                
            }
            
            }
    }
    //we have to senf=d formedata through ajax to php
    let formdata = new FormData(form);//create new forme data object
    xhr.send(formdata);//sending the forme data to php
    
},500); //THIS FONCTION will return frequently after 500ms




function scrollToBottom(){
    chatbox.scrollTop = chatbox.scrollHeight;
}
