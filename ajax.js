$("select").on("change", function(){
  $("#tabela").load("showSchedule.php", {
    nomeJogador: $("#selectPlayer option:selected").text()
  })
});
