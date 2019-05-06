<?php
  require 'connection.php';

  $sql = "SELECT * FROM jogos;";
  $result = mysqli_query($connection, $sql);
  $nRows = mysqli_num_rows($result);
  if ($nRows == 8) {
    $sql = "SELECT jogador1, jogador2 FROM jogos;";
    $result = mysqli_query($connection, $sql);
  }elseif($nRows == 12){
    $sql = "SELECT jogador1, jogador2 FROM jogos WHERE IDJogo > 8;";
    $result = mysqli_query($connection, $sql);
  }elseif($nRows == 14){
    $sql = "SELECT jogador1, jogador2 FROM jogos WHERE IDJogo > 12;";
    $result = mysqli_query($connection, $sql);
  }elseif($nRows == 15){
    $sql = "SELECT jogador1, jogador2 FROM jogos WHERE IDJogo > 14;";
    $result = mysqli_query($connection, $sql);
  }
  $i = 1;
  if(mysqli_num_rows($result) > 0){
      while ($row = mysqli_fetch_assoc($result)) {
          $jogador1 = $row["jogador1"];
          $jogador2 = $row["jogador2"];
          echo("<input type = \"radio\" name = \"jogo" . $i . "\" id = \"jogo1\" value = '" . $jogador1 . "' checked>");
          echo("<label for =\"jogo1\">" . $jogador1 . "</label>");
          echo("<input type = \"radio\" name = \"jogo" . $i . "\" id = \"jogo2\" value = '" . $jogador2 . "'>");
          echo("<label for =\"jogo2\">" . $jogador2 . "</label>");
          echo("<br>");
          $i++;
      }
  }else{
    echo("<p>De momento não há torneio.</p>");
  }

  $connection -> close();
?>
