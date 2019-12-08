if(sessionStorage.getItem('userId'))
{
  document.getElementById("login").style.display = "none";
  document.getElementById("signup").style.display = "none";
  document.getElementById("logout").style.display = "block";
  document.getElementById("myorders").style.display = "block";
}
else{
  document.getElementById("login").style.display = "block";
  document.getElementById("signup").style.display = "block";
  document.getElementById("logout").style.display = "none";
  document.getElementById("myorders").style.display = "none";
}


function logout()
{
  sessionStorage.clear();
  location.href = "index.html";
}
