const searchbar=document.querySelector(".users .search input"),
searchbtn=document.querySelector(".users .search button"),
userslist=document.querySelector(".users .list-users");
searchbtn.onclick = ()=>{
    searchbar.classList.toggle("active");
    searchbar.focus();
    searchbtn.classList.toggle("active");
    searchbar.value = "";
}

searchbar.onkeyup = ()=>{
    let = searchterm = searchbar.value;
    if(searchterm != ''){
        searchbar.classList.add('active');
    }else{
        searchbar.classList.remove('active');
    }
            //let's start AJAX

            let xhr = new XMLHttpRequest(); //creating XML Object
            xhr.open("POST","PHP/search.php",true);
            xhr.onload = ()=>{
                if(xhr.readyState === XMLHttpRequest.DONE){
                    if(xhr.status === 200){
                        let data = xhr.response;
                        userslist.innerHTML = data;
                    }
                    
                    }
            }
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
            xhr.send("searchterm=" + searchterm);
}


setInterval(()=>{

        //let's start AJAX

        let xhr = new XMLHttpRequest(); //creating XML Object
        xhr.open("GET","PHP/users.php",true);
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    if(!searchbar.classList.contains('active')){ //if active active not contains in search bar then add this data
                        userslist.innerHTML = data;
                    }
                }
                
                }
        }
        xhr.send();
},500); //THIS FONCTION will return frequently after 500ms