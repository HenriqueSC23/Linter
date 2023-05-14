<?php

if(isset($_POST['submit']))
    {
        include_once('config.php');

        $nome = $_POST['name'];
        $email = $_POST['email'];
        $mensagem = $_POST['message'];

        $result = mysqli_query($conexao, "INSERT INTO contato(nome_cont, email_cont, mensagem_cont) VALUES ('$nome', '$email', '$mensagem')");
    
        header('Location: obrigado.html');
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
    <style>
        body {
            background-image: linear-gradient(to right, rgb(3, 66, 24), rgb(0, 202, 78));
            color: white;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        * {
            margin: 0 auto;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif, 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif, Helvetica, sans-serif;
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
            line-height: 20px;
        }

        #direito {
            float: right;
        }

        #menu-h {
            background: rgb(3, 66, 24);
            list-style: none;
            padding: 0;
        }

        #menu-h ul {
            max-width: 1000px;
            list-style: none;
            padding: 0;
            background-color: rgb(3, 66, 24);

        }

        #menu-h ul li {
            display: inline;
        }

        #menu-h ul li a {
            color: white;
            text-decoration: none;
            padding: 15px;
            display: inline-block;
            transition: background .6s;
        }

        #menu-h ul li a:hover {
            background-color: rgb(0, 155, 59);
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
            line-height: 20px;

        }

        fieldset {
            border: 2px solid springgreen;
            padding:15px;
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
            line-height: 2px;
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
            top: -15px;
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
    </style>
</head>

<body>
    <nav id="menu-h">
        <ul>
            <li><a href="index.php">Página Inicial</a></li>
            <li><a href="contato.html">Contato</a></li>
            <li><a id="direito" href="login.php">Entrar</a></li>
            <li><a id="direito" href="cadastro.php">Cadastre-se</a></li>
        </ul>
    </nav>

    <!-- <fieldset>
    <legend><b>Contato</b></legend>
        <form action="contato.php" method="POST" enctype="multipart/form-data">
        <div class="inputBox">
            <label>Nome</label>
            <input type="text" name="name" placeholder="Digite seu nome" autocomplete="off" required>
        </div>
            <label>Email</label>
            <input type="email" name="email" placeholder="Digite seu email" autocomplete="off" required>
            <label>Mensagem</label>
            <textarea name="message" cols="30" rows="10" placeholder="Digite sua mensagem" required></textarea>
            <input type="submit" value="Enviar" id="submit" name="submit">

            <input type="hidden" name="accessKey" value="042be0d3-84fa-4ae8-aaed-2434cda72cac">
            <input type="hidden" name="redirectTo" value="http://127.0.0.1:5501/obrigado.html">
        </form> -->
        <div class="box">
        <form action="contato.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend><b>Contato</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="name" id="título" class="inputTítulo" required>
                    <label for="título" class="labelInput">Nome</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="autor" class="inputTítulo" required>
                    <label for="autor" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="resumo" class="labelInput">Mensagem</label><br><br><br><br><br>
                    <textarea name="message" id="resumo" class="inputTítulo" cols="40" rows="6"></textarea>
                </div>
                <br><br>
                <input type="submit" value="Enviar" id="submit" name="submit">
            </fieldset>
        </form>
    </div>
    </fieldset>
</body>

</html>