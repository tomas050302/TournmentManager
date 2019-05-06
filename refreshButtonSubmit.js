let buttonSubmit = document.getElementsByName("btnSubmeter")[0];
var checkLiAceito = document.querySelector("input[name = liAceito]");

checkLiAceito.addEventListener( 'change', function(){
  if (checkLiAceito.checked) {
    buttonSubmit.disabled = "";
  } else {
    buttonSubmit.disabled = "disabled";
  }
});
