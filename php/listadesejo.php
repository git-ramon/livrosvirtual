<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/frontphp.css">
    <title>Lista de Desejos</title>
</head>
<body>
    <h2>Lista de Desejos</h2>
<table>
        <tr>
            <th>Categoria</th>
            <th>Titulo do Livro</th>
            <th>Autor</th>
            <th>Valor do Livro</th>

            <th><span>Editar</span></th>
            <th><span>Excluir</span></th>
        </tr>

        <?php
        include 'conexao.php';
            $sqlvisualizar = mysqli_query($conexao, "SELECT * FROM table_livros");
            while ($linha = mysqli_fetch_array($sqlvisualizar)) {
            $peganome = $linha['nome'];
            $pegatitulo = $linha['titulo'];
            $pegaautor = $linha['autor'];
            $pegavalor = $linha['valor'];
            $isbn = $linha['isbn'];
        ?>

        <tr>
            <td><?php echo $peganome ?></td>
            <td><?php echo $pegatitulo ?></td>
            <td><?php echo $pegaautor ?></td>
            <td><?php echo "R$ $pegavalor,00" ?></td>

            <td><a class="linkeditar" href="formularios.php?funcao=editar&isbn=<?php echo $isbn ?>"><i><img src="..\img\pencil-square.svg"></i> Editar </a></td>
            <td><a class="linkeexcluir" href="funcoes.php?funcao=excluir&isbn=<?php echo $isbn ?>"><i><img src="..\img\trash-fill.svg"></i> Excluir </a></td>
        </tr>
    <?php
            }
    ?>
    </table><br><br>
            
    <button type="submit"><a href="../../sistemalivrariavirtual/index.html">Voltar</a></button>
    <button type="submit"><a href="formularios.php">Adicionar Livro</a></button>
</body>
</html>