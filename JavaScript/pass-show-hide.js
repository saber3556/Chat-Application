const pswrfield=document.querySelector(".form input[type='password']"),
togglebtn=document.querySelector(".form .fieled i");

togglebtn.onclick = ()=>{
    if(pswrfield.type == "password"){
        pswrfield.type = "text";
        togglebtn.classList.add("active");
        
    }else{
        pswrfield.type = "password";
        togglebtn.classList.remove("active");
    }
}
