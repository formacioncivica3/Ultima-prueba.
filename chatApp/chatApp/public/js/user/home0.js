(function(){
	
	var chatDiv= document.querySelector(".chat-div");
  chatDiv.scrollTo(0, chatDiv.scrollHeight);
	
	var btnSend= document.getElementById('sendMess');
  var getUrl= document.getElementById('getUrl').value;
  var myuser= document.getElementById('fromUser').value;
  var touser= document.getElementById('toUser').value;
  
	btnSend.addEventListener('click', function(e){
		e.preventDefault();
    var txt= document.getElementById('textMess').value;
    if(txt.length > 0){
      addText(txt, myuser, touser);
      document.getElementById('formSend').reset();
    } else {
      alert('The chat input is empty!!');
    }
  });
  
  setInterval(function(){
    loadChat(myuser, touser);
  }, 400);
  
  function addText(text, from, to){
    var header = "text=" + text + '&from=' + from + '&to=' + to;
    var xml = new XMLHttpRequest();
    var page= getUrl+ 'home/sendChat';
    xml.open('POST', page, true);
    xml.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xml.onreadystatechange = function() {
      if(xml.readyState == 4 && xml.status == 200) {
        loadChat(from, to);
    		chatDiv.scrollTo(0, chatDiv.scrollHeight);
      }
    }
    xml.send(header);
  }

  function loadChat(from, to){
    var xml = new XMLHttpRequest();
    var header = 'from=' + from + '&to=' + to;
    var page= getUrl+ 'home/getChat';
    xml.open('POST', page, true);
    xml.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xml.onreadystatechange = function() {
      if(xml.readyState == 4 && xml.status == 200) {
        chatDiv.innerHTML = xml.responseText;
      }
    }
    xml.send(header);
  }

}());