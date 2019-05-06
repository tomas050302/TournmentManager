<?php
  require 'connection.php';
  $arrayHorarios = array(
	date("Y-m-d H:i:s", mktime(15,30,00,5,2,2019)),
    date("Y-m-d H:i:s",mktime(15,45,00,5,2,2019)),
    date("Y-m-d H:i:s",mktime(16,00,00,5,2,2019)),
    date("Y-m-d H:i:s",mktime(16,15,00,5,2,2019)),
    date("Y-m-d H:i:s",mktime(16,30,00,5,2,2019)),
    date("Y-m-d H:i:s",mktime(16,45,00,5,2,2019)),
    date("Y-m-d H:i:s",mktime(17,00,00,5,2,2019)),
    date("Y-m-d H:i:s",mktime(17,15,00,5,2,2019)),
	//Primeira fase
    date("Y-m-d H:i:s",mktime(15,30,00,5,3,2019)),
    date("Y-m-d H:i:s",mktime(15,50,00,5,3,2019)),
    date("Y-m-d H:i:s",mktime(16,10,00,5,3,2019)),
    date("Y-m-d H:i:s",mktime(16,30,00,5,3,2019)),
    // Segunda Ronda
    date("Y-m-d H:i:s",mktime(16,50,00,5,3,2019)),
    date("Y-m-d H:i:s",mktime(17,10,00,5,3,2019)),
    // Terceira Ronda
    date("Y-m-d H:i:s",mktime(11,00,00,6,3,2019)),
    // Final
  );

  $sql = "SELECT IDJogo FROM jogos;";
  $result = mysqli_query($connection, $sql);

  if(mysqli_num_rows($result) > 1) {
    $vencedor = false;
    if(mysqli_num_rows($result) == 8) {
        $jogadores1 = array($_POST['jogo1'], $_POST['jogo2'], $_POST['jogo3'], $_POST['jogo4']);
        $jogadores2 = array($_POST['jogo5'], $_POST['jogo6'], $_POST['jogo7'], $_POST['jogo8']);
        $rodada = 4;
      } elseif(mysqli_num_rows($result) == 12){
        $jogadores1 = array($_POST['jogo1'], $_POST['jogo2']);
        $jogadores2 = array($_POST['jogo3'], $_POST['jogo4']);
        $rodada = 2;
      } elseif(mysqli_num_rows($result) == 14){
        $jogadores1 = array($_POST['jogo1']);
        $jogadores2 = array($_POST['jogo2']);
        $rodada = 1;
      }elseif(mysqli_num_rows($result) == 15){
        $nomeVencedor = $_POST['jogo1'];
        $vencedor = true;
      }
      if (!$vencedor) {
        shuffle($jogadores1);
        shuffle($jogadores2);
        $i = mysqli_num_rows($result);
        $j = 0;

        while ($j < $rodada) {
          $jogador1 = $jogadores1[$j];
          $jogador2 = $jogadores2[$j];
          $horario = $arrayHorarios[$i + $j];
          $id = $i + $j + 1;
          $j++;

          $sql = "INSERT INTO jogos (IDJogo, jogador1, jogador2, horaJogo) VALUES ('$id', '$jogador1', '$jogador2', '$horario');";
          $connection->query($sql);
        }
        echo("<h1> Próxima fase criada ! </h1>");
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
        header("refresh:2; url=index.html");
      }else {
        echo("<h1> O vencedor é: " . $nomeVencedor . "</h1>");
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
        header("refresh:30; url=index.html");
      }
    }
?>
