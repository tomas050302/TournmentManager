<?php
  require 'connection.php';

  $sql = "SELECT nomeJogador FROM jogadores;";
  $result = mysqli_query($connection, $sql);
  // mktime (horas,minutos,segundos,mes,dia,ano)
  $arrayHorario = array(
    date("Y-m-d H:i:s", mktime(15,30,00,5,2,2019)),
    date("Y-m-d H:i:s",mktime(15,45,00,5,2,2019)),
    date("Y-m-d H:i:s",mktime(16,00,00,5,2,2019)),
    date("Y-m-d H:i:s",mktime(16,15,00,5,2,2019)),
    date("Y-m-d H:i:s",mktime(16,30,00,5,2,2019)),
    date("Y-m-d H:i:s",mktime(16,45,00,5,2,2019)),
    date("Y-m-d H:i:s",mktime(17,00,00,5,2,2019)),
    date("Y-m-d H:i:s",mktime(17,15,00,5,2,2019)),
  );
  if(mysqli_num_rows($result) == 16){
    $i = 0;

    $arrayJogador1 = array();
    $arrayJogador2 = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $i++;
      if ($i % 2 == 0) {
        array_push($arrayJogador2, $row["nomeJogador"]);
      }else{
        array_push($arrayJogador1, $row["nomeJogador"]);
      }
    }
    shuffle($arrayJogador1);
    shuffle($arrayJogador2);
    $i = 0;
    $linha = 1;
    while ($i < 8) {
      $jogador1 = $arrayJogador1[$i];
      $jogador2 = $arrayJogador2[$i];
      $horario = $arrayHorario[$i];

      // TODO: Dar fix aos horarios; acabar a página dos horários; fazer o ler e aceito termos e condiçoes; fazer a pagina de quem passa (radiobuttons)

      $sql = "INSERT INTO jogos (IDJogo, jogador1, jogador2, horaJogo) VALUES ('$linha', '$jogador1', '$jogador2', '$horario');";
      $i++;
      $linha++;
      $connection->query($sql);
    }
    echo("<h1>Torneio criado! </h1>");
    echo("<style media=\"screen\">
      body{
        background: #1e272e;
      }
      h1{
        margin-left: -3%;
        color: green;
        margin-top: 20%;
        font-size: 60px;
        text-align: center;
        font-family: 'Anton', sans-serif;
      }
    </style>");
    header("refresh:4; url=index.html");
  }else{
    echo("Não há jogadores suficientes para criar um torneio novo!");
    header("refresh:2; url = index.html");
  }
?>
