<?php

    if(isset($_POST['submit']))
    {
        include_once('config.php');

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone']; 
        $senha = $_POST['senha'];
        
        $result = mysqli_query($conexao, "INSERT INTO cadastro(nome, email, telefone, senha) VALUES ('$nome', '$email', '$telefone', '$senha')");

        header('Location: login.php');
    }

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Cadastro</title>
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
            line-height: 20px;
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
    <button class="slide_from_left" onclick="window.location.href = 'index.php'">Voltar</button>
    <div class="box">
        <form action="cadastro.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend><b>Cadastre-se</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="título" class="inputTítulo" required>
                    <label for="título" class="labelInput">Nome</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="autor" class="inputTítulo" required>
                    <label for="autor" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="telefone" id="orientador" class="inputTítulo" required>
                    <label for="orientador" class="labelInput">Telefone</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="coorientador" class="inputTítulo" required>
                    <label for="coorientador" class="labelInput">Senha</label>
                </div>
                <br><br>
                <input type="submit" value="Enviar" id="submit" name="submit">
            </fieldset>
        </form>
    </div>
</body>

</html>