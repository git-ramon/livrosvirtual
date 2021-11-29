<?php
    include 'conexao.php';

    $gravanome = $_POST['nome'];
    $gravatitulo = $_POST['titulo'];
    $gravaautor = $_POST['autor'];
    $gravavalor = $_POST['valor'];

    if ($_GET['funcao'] == "gravar") {      
        $sqlgravar = "INSERT INTO table_livros (nome, titulo, autor, valor) VALUES ('$gravanome','$gravatitulo','$gravaautor','$gravavalor')";

        mysqli_query($conexao, $sqlgravar);
        header ('Location: listadesejo.php');
    }

    if ($_GET['funcao'] == "editar") {
        $isbn = $_GET['isbn'];
        $sqlalterar = mysqli_query($conexao, "UPDATE table_livros SET nome='$gravanome', titulo='$gravatitulo', autor='$gravaautor', valor='$gravavalor' WHERE isbn = '$isbn' ");
        header ('Location: listadesejo.php');
    }

    if ($_GET['funcao'] =="excluir") {
        $isbn = $_GET['isbn'];
        $sqldel = mysqli_query($conexao, "DELETE FROM table_livros WHERE isbn = '$isbn' ");
        header ('Location: listadesejo.php');
    }

?>
