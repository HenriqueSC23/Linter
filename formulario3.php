<?php
    include_once('config.php');
    session_start();
    
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php'); 
    }
    $logado = $_SESSION['email'];
    $id = $_SESSION['id_cadastro']; 
    //echo $id; //testar se pega o id do cadastro
    if(isset($_POST['submit']))
    {
        /*print_r($_POST['titulo']);
        print_r('<br>');
        print_r($_POST['autor']);
        print_r('<br>');
        print_r($_POST['orientador']);*/

        

        $titulo_tcc = $_POST['titulo'];
        $autor_tcc = $_POST['autor'];
        $orientador_tcc = $_POST['orientador'];
        $coorientador_tcc = $_POST['coorientador'];
        $keywords = $_POST['palavraschave'];
        $resumo = $_POST['resumo'];
        $caminho = $_FILES['arquivo'];
        $ano = $_POST['ano']; 
        //$id_cadastro = $_POST['id_cadastro'];
        if($caminho !== null) {

            $nome_temporario=$_FILES["arquivo"]["tmp_name"];
            $nome_arquivo=$_FILES["arquivo"]["name"];
            copy($nome_temporario,"uploads/$nome_arquivo");

            include 'config.php';

                
            $result = mysqli_query($conexao, "INSERT INTO tcc(titulo_tcc, autor_tcc, orientador_tcc, coorientador_tcc, keywords, 
            resumo, caminho, ano, id_cadastro) VALUES ('$titulo_tcc', '$autor_tcc', '$orientador_tcc', '$coorientador_tcc', '$keywords', 
            '$resumo', '$nome_arquivo', '$ano', '$id')");
            
        }
        
        echo '<script>alert("Resposta registrada com sucesso!")</script>';

    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário | LINTER</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(3, 66, 24), rgb(0, 202, 78));
        }

        .box {
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            line-height: 13px;
        }

        fieldset {
            border: 2px solid springgreen;
        }

        legend {
            border: 1px solid springgreen;
            padding: 3%;
            text-align: center;
            background-color: rgb(5, 170, 87);
            border-radius: 8px;
        }

        .inputBox {
            position: relative;
            line-height: 1px;
        }

        .inputTítulo {
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }

        .labelInput {
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }

        .inputTítulo:focus~.labelInput,
        .inputTítulo:valid~.labelInput {
            top: -11px;
            font-size: 12px;
            color: springgreen;
        }

        #submit {
            background-image: linear-gradient(to right, darkslategray, teal);
            width: 100%;
            border: none;
            padding: 10px;
            color: white;
            border-radius: 8px;
            font-size: 15px;
            cursor: pointer;
        }

        #submit:hover {
            background-image: linear-gradient(to right, rgb(33, 56, 56), rgb(1, 102, 102));
        }

        button {
          font-size: 1em;
          background: rgb(3, 66, 24);
          color: #fff;
          border: 0.25rem solid rgb(0, 202, 78);
          border-radius: 20px;
          padding: 5px;
          margin: 1rem;
          position: relative;
          z-index: 1;
          overflow: hidden;
          cursor: pointer;
        }
        button:hover {
          color: white;
        }

        button[class^="slide"]::after {
          transition: all 0.35s;
        }
        button[class^="slide"]:hover::after {
          left: 0;
          right: 0;
          top: 0;
          bottom: 0;
          transition: all 0.35s;
        }

        button::after {
          content: "";
          background: rgb(0, 202, 78);
          position: absolute;
          z-index: -1;
          padding: 0.85em 0.75em;
          display: block;
        }

        button.slide_from_left::after {
          top: 0;
          bottom: 0;
          left: -100%;
          right: 100%;
        }
    </style>
</head>

<body>
<button class="slide_from_left" onclick="window.location.href = 'index.php'">Sair</button>
<div class="box">
    <form action="formulario3.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend><b>Formulário TCC's</b></legend>
            <br>
            <div class="inputBox">
                <input type="text" name="titulo" id="título" class="inputTítulo" required>
                <label for="título" class="labelInput">Título do TCC</label>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="text" name="autor" id="autor" class="inputTítulo" required>
                <label for="autor" class="labelInput">Autor</label>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="text" name="orientador" id="orientador" class="inputTítulo" required>
                <label for="orientador" class="labelInput">Orientador</label>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="text" name="coorientador" id="coorientador" class="inputTítulo" required>
                <label for="coorientador" class="labelInput">Coorientador</label>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="text" name="palavraschave" id="palavraschave" class="inputTítulo" required>
                <label for="palavraschave" class="labelInput">Palavras-Chave</label>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="text" name="ano" id="ano" class="inputTítulo" required>
                <label for="ano" class="labelInput">Ano</label>
            </div>
            <br><br>
            <div class="inputBox">
                <label for="resumo">Resumo</label>
                <textarea name="resumo" id="resumo" class="inputTítulo" cols="40" rows="6"></textarea>
            </div>
            <br><br>
            <div class="form-group">
                <label for="arquivo">Selecione o TCC</label>
                <input type="file" name="arquivo" class="form-control-file" id="arquivo" required>
            </div>
            <br><br>
            <input type="hidden" value=3 name="id_cadastro">
            <input type="submit" value="Enviar" id="submit" name="submit" onclick="funcao1()">
        </fieldset>
    </form>
</div>
</body>


</html>