<?php
    $nomeJogador = $_POST['nomeJogador'];
    $anoJogador = $_POST['anoJogador'];
    if ($anoJogador == 10 OR $anoJogador == 11 OR $anoJogador == 12) {
      $turmaJogador = $_POST['turmaJogador'];
    } else {
      $turmaJogador = null;
    }

    $nomeJogador = trim(ucwords($nomeJogador));

    require 'connection.php';

    if(mysqli_connect_error()) {
      die('Erro de conexão ('.mysqli_connect_errorno().')'.mysqli_connect_error());
    } else {
      $sqli = "SELECT nomeJogador FROM jogadores;";
      $query = mysqli_query($connection, $sqli);
      $id = mysqli_num_rows($query) + 1;

      $sql = "INSERT INTO jogadores (ID, nomeJogador, turmaJogador, anoJogador) VALUES ('$id', '$nomeJogador', '$turmaJogador', '$anoJogador')";
    }

    if(mysqli_num_rows($query) < 16){
      $connection->query($sql);
      echo ("<h1> Jogador Adicionado! </h1>");
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
    } else {
      echo ("Erro, o torneio já está cheio. Não é possível adicionar novos jogadores!");
    }

    header("refresh:1; url=index.html");
?>
