<?php
  require 'connection.php';

  $sql = "SELECT nomeJogador FROM jogadores;";
  $result = mysqli_query($connection, $sql);

  if(mysqli_num_rows($result) > 0){
    echo("<option value=\"\">-- Seleciona o teu nome --</option>");
      while ($row = mysqli_fetch_assoc($result)) {
          $nome = $row["nomeJogador"];
          echo("<option value=\"" . $nome . "\">" . $nome . "</option>");
      }
      echo("</select>");
  }else{
    echo("<p>Não há jogadores inscritos!");
  }

  $connection -> close();
?>
