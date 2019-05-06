let slctTurma = document.getElementsByName("turmaJogador")[0];
var radios = document.forms["formRegisto"].elements["anoJogador"];

for (var i = 0; i < radios.length; i++) {
  let valor = radios[i].value;
  radios[i].onclick = function(){
    if (valor == 10 || valor == 11 || valor == 12) {
      slctTurma.disabled = false;
      slcrtTurma.required = "";
    }else{
      slctTurma.disabled = true;
      slctTurma.required = "required";
    }
  }
};
