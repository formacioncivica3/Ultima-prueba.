(function(){

  var btnLogin= document.getElementById("btnRegister");
  btnLogin.addEventListener("click", function(e){
    e.preventDefault();
    
    var name= document.getElementById("name").value;
    var surnames= document.getElementById("surnames").value;
    var username= document.getElementById("username").value;
    var password= document.getElementById("password").value;
    var confirmpass= document.getElementById("confirmpassword").value;
    var errorLine= document.getElementById("errorLine");

    if(name.length < 3){
      errorLine.innerHTML= "The Name must contain a minimum of 3 characters";
      errorLine.classList.remove("d-none");
      errorLine.classList.add("d-block");
    
    } else if(surnames.length < 4){
      errorLine.innerHTML= "The Surnames must contain a minimum of 4 characters";
      errorLine.classList.remove("d-none");
      errorLine.classList.add("d-block");

    } else if(username.length < 4){
      errorLine.innerHTML= "The Username must contain a minimum of 4 characters";
      errorLine.classList.remove("d-none");
      errorLine.classList.add("d-block");
    
    } else if(password.length < 8){
      errorLine.innerHTML= "The password must contain a minimum of 8 characters";
      errorLine.classList.remove("d-none");
      errorLine.classList.add("d-block");

    } else if(password.length != confirmpass.length){
      errorLine.innerHTML= "Passwords do not match";
      errorLine.classList.remove("d-none");
      errorLine.classList.add("d-block");

    } else {
      sendDates(name, surnames, username, password, errorLine);
    }
  });

  var sendDates= function(name, surnames, username, password, errorLine){
    var xml = new XMLHttpRequest();
    var getUrl= document.getElementById('getUrl').value;
    var phpPage= getUrl+ 'ajaxController/addUser';
    var header = "name=" + name + "&surnames=" + surnames +
        "&username=" + username + "&password=" + password;

    xml.open('POST', phpPage, true);
    xml.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xml.onreadystatechange = function() {
      if(xml.readyState === 4 & xml.status === 200) {
        
        if(xml.responseText == "false"){
          errorLine.innerHTML= "¡The username already exists!";
          errorLine.classList.remove("d-none");
          errorLine.classList.add("d-block");
      
        } else {
          errorLine.classList.remove("d-block");
          errorLine.classList.add("d-none");
          window.location.href= getUrl+ 'success/register';
        }
      }
    }
    xml.send(header);
  }

}());