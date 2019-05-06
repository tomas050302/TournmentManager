<?php
  require 'connection.php';

  error_reporting(E_ALL ^ E_NOTICE);
  $nomeJogador = $_POST['nomeJogador'];
  $sql = "SELECT jogador1, jogador2, horaJogo FROM jogos;";
  $result = mysqli_query($connection, $sql);

  if(mysqli_num_rows($result) > 0) {
    $exists = false;
    echo("<table id=\"tabela\">");
    echo("<th>Nome</th>");
    echo("<th>Adversário</th>");
    echo("<th>Horário</th>");
    while ($row = mysqli_fetch_assoc($result)) {
      if ($row['jogador1'] == $nomeJogador) {
        $exists = true;
        $adversario = $row['jogador2'];
      }elseif($row['jogador2'] == $nomeJogador){
        $exists = true;
        $adversario = $row['jogador1'];
      }
      if ($exists) {
        $horario = $row['horaJogo'];
        $horario = date("d/m/Y H:i", strtotime($horario));
        echo("<tr><td>" . $nomeJogador . "</td><td>" . $adversario . "</td><td>" . $horario . "</td></tr>");
      }
      $exists = false;
    }
    echo("</table>");
  } else {
    echo("</table>");
  }
?>
