function getPassword(){
    document.getElementById('password_new').value = autoCreate(8);
  }
  function autoCreate(plength){
    var chars = "abcdefghijklmnopqrstubwsyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    var password = '';    
      for(i=0; i<plength; i++){
        password+=chars.charAt(Math.floor(Math.random()*chars.length));
      }
    
    return password;
  }