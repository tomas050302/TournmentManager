<?php
    require 'connection.php';

    $sql = "SELECT nomeJogador, turmaJogador, anoJogador FROM jogadores;";
    $result = mysqli_query($connection, $sql);

    if(mysqli_num_rows($result) > 0){
      while ($row = mysqli_fetch_assoc($result)) {
            $turma = $row["turmaJogador"];
            $id = $turma;
            if ($turma == null) {
              $turma = "- - - - -";
              $id = "resto";
            }
            echo("<tr id = \"$id\"  </td><td>" . $row["nomeJogador"] . "</td><td>" . $row["anoJogador"] . "</td><td>" . $turma . "</td></tr>");
        }
        echo("</table>");
    }else{
      echo("<tr><td>Não há jogadores inscritos de momento!</td></tr>");
      echo("</table>");
    }

    $connection -> close();
?>
