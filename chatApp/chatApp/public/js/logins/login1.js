(function(){

  var btnLogin= document.getElementById("btnLogin");
  btnLogin.addEventListener("click", function(e){
    e.preventDefault();
    
    var username= document.getElementById("username").value;
    var password= document.getElementById("password").value;
    var errorLine= document.getElementById("errorLine");

    if(username.length < 4){
      errorLine.innerHTML= "The Username must contain a minimum of 4 characters";
      errorLine.classList.remove("d-none");
      errorLine.classList.add("d-block");
    
    } else if(password.length < 8){
      errorLine.innerHTML= "The password must contain a minimum of 8 characters";
      errorLine.classList.remove("d-none");
      errorLine.classList.add("d-block");

    } else {
      sendDates(username, password, errorLine);
    }
  });

  var sendDates= function(username, password, errorLine){
    var xml = new XMLHttpRequest();
    var getUrl= document.getElementById('getUrl').value;
    var phpPage= getUrl+ 'ajaxController/login';
    var header = "username=" + username + "&password=" + password;

    xml.open('POST', phpPage, true);
    xml.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xml.onreadystatechange = function() {
      if(xml.readyState === 4 & xml.status === 200) {
        
        if(xml.responseText == "false"){
          errorLine.innerHTML= "¡The data entered is incorrect!";
          errorLine.classList.remove("d-none");
          errorLine.classList.add("d-block");
      
        } else {
          errorLine.classList.remove("d-block");
          errorLine.classList.add("d-none");
          window.location.href= getUrl;
        }
      }
    }
    xml.send(header);
  }

}());