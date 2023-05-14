<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background-image: url(linter.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }

    div {
        background-color: rgba(255, 255, 255, 0.8);
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 80px;
        border-radius: 15px;
        color: #363636;
    }

    input {
        padding: 15px;
        border: none;
        font-size: 15px;
    }

    .inputSubmit {
        background-color: #3cbd72;
        border: none;
        padding: 15px;
        width: 100%;
        border-radius: 20px;
        color: white;
        font-size: 15px;
    }

    .inputSubmit:hover {
        background-color: #25a25a;
        cursor: pointer;
    }

    .btn{
        background-color: #3cbd72;
        border: none;
        padding: 15px;
        border-radius: 10px;
        color: white;
        cursor: pointer;
        margin: 1rem;
        font-size: 1em;
    }

    .btn:hover{
        background-color: #25a25a;
    }
    </style>
</head>

<body>
<button type="button" class="btn btn-primary" onclick="window.location.href = 'index.php'">Voltar</button>
    <div>
        <h1>Login</h1>
        <form action="testLogin.php" method="post">
            <input type="text" name="email" placeholder="Email">
            <br><br>
            <input type="password" name="senha" placeholder="Senha">
            <br><br>
            <input class="inputSubmit" type="submit" name="submit" value="Enviar">
        </form>
    </div>
</body>

</html>