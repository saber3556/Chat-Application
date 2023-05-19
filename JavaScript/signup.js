const form = document.querySelector(".signup form"),
continuebtn = form.querySelector(".button input"),
errortext = form.querySelector(".error-text");


 form.onsubmit = (e)=>{
    e.preventDefault();
 }
 continuebtn.onclick = ()=>{
    //let's start AJAX

    let xhr = new XMLHttpRequest(); //creating XML Object
    xhr.open("POST","PHP/signup.php",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "success"){
                    location.href = "http://localhost/Chat%20Aplication/usres.php";
                }else {
                  errortext.textContent = data;
                  errortext.style.display = "block";
                }
            }
            
            }
    }
    //we have to senf=d formedata through ajax to php
    let formdata = new FormData(form);//create new forme data object
    xhr.send(formdata);//sending the forme data to php
 }