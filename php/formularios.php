<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/owl.carousel.min.css">
    <link rel="stylesheet" href="../style/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/frontphp.css">
    
    <title>Formulario</title>
</head>
<body>
    <!-- Formulario de Cadastrar Clientes -->

    <?php
        include 'conexao.php';
        if (isset($_GET['funcao']) != "editar") {  
    ?>
 
    <h2>Cadastro de Livros para lista de Desejos</h2>

    <form method="POST" action="funcoes.php?funcao=gravar" class="needs-validation" novalidate>
    
    <legend>Categoria</legend>
        <label for="validationCustom01">
            <input type="text" class="form-control" id="validationCustom01" name="nome" required>
                <div class="invalid-feedback">
                    Por favor, informe a Categoria.
                </div>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
        </label>
        <legend>Titulo do Livro</legend>
            <label for="validationCustom01">
                <input class="form-control" id="validationCustom01" type="text" name="titulo" required>
                    <div class="invalid-feedback">
                        Por favor, informe o Titulo do Livro.
                    </div>
                    <div class="valid-feedback">
                        Tudo certo!
                    </div>
            </label>
        <legend>Autor</legend>
            <label>
                <input type="text" name="autor" id="autor">
            </label>
        <legend>Valor do Livro</legend>
            <label for="validationCustom01">
                <input class="form-control" id="validationCustom01" type="text" name="valor" required>
                    <div class="invalid-feedback">
                        Por favor, informe o Valor do Livro.
                    </div>
                    <div class="valid-feedback">
                        Tudo certo!
                    </div>
            </label>

        <label><input type="submit" name="buttoncadast" id="button" value="Cadastrar"></label>
        <label><button type="submit"><a href="../../sistemalivrariavirtual/index.html">Cancelar</a></button></label>
    </form>

    <?php
        }
    ?>

    <!-- Formulario de Alterar Dados de Clientes -->

    <?php
        include 'conexao.php';
        if (isset($_GET['funcao']) == "editar") {
        $isbn = $_GET['isbn'];
        $sqlupdate = mysqli_query($conexao, "SELECT * FROM table_livros WHERE isbn = '$isbn' ");
        while ($linha = mysqli_fetch_array($sqlupdate)) {
            $nome = $linha['nome'];
            $titulo = $linha['titulo'];
            $autor = $linha['autor'];
            $valor = $linha['valor'];
        }
    ?>
    
    <h2>Alterar Dados do Livro</h2>

    <form method="POST" class="needs-validation" novalidate action="funcoes.php?funcao=editar&isbn=<?php echo $isbn ?>">

    <legend>Categoria</legend>
        <label for="validationCustom01">
            <input class="form-control" id="validationCustom01" type="text" name="nome" id="nome" value="<?php echo $nome ?>" required>
                <div class="invalid-feedback">
                    Por favor, informe a Categoria do Livro.
                </div>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
        </label>
    <legend>Titulo do Livro</legend>
        <label for="validationCustom01">
            <input class="form-control" id="validationCustom01" type="text" name="titulo" id="titulo" value="<?php echo $titulo ?>" required>
                <div class="invalid-feedback">
                    Por favor, informe o titulo do Livro.
                </div>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
        </label>
    <legend>Autor</legend>
        <label>
            <input type="text" name="autor" id="autor" value="<?php echo $autor ?>">
        </label>
    <legend>Valor do Livro</legend>
        <label for="validationCustom01">
            <input class="form-control" id="validationCustom01" type="text" name="valor" id="valor" value="<?php echo $valor ?>" required>
                <div class="invalid-feedback">
                    Por favor, informe o valor do Livro.
                </div>
                <div class="valid-feedback">
                    Tudo certo!
                </div>
        </label>

        <label><input type="submit" name="buttonedit" id="button" value="Alterar"></label>
        <label><button type="submit"><a href="listadesejo.php">Cancelar</a></button></label>
</form>
                                         
    <?php
        }
    ?>
  <!-- Arquivos Owl Jquery-->
  <script src="../js/owl/jquery.min.js"></script>
  <script src="../js/owl/owl.carousel.min.js"></script>
  <script src="../js/owl/setup.js"></script>
  <script src="../js/owl/formvalidation.js"></script>

</body>
</html>