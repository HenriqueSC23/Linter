<?php
    include_once('config.php');
    session_start();
    //print_r($_SESSION);
    /*if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    $logado = $_SESSION['email'];*/

    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM tcc WHERE id_tcc LIKE '%$data%' or titulo_tcc LIKE '%$data%' or autor_tcc LIKE '%$data%' or ano LIKE '%$data%' ORDER BY id_tcc DESC";
        
    }
    else
    {
        $sql = "SELECT * FROM tcc ORDER BY id_tcc";
    }
    $result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Repositório | LINTER</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(3, 66, 24), rgb(0, 202, 78));
            color: white;
        }

        * {
            margin: 0 auto;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif, 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif, Helvetica, sans-serif;
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

        #direito {
            float: right;
        }

        #esquerdo{

        }

        .table-bg{
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px 15px 0 0;
        }

        .box-search{
            display: flex;
            justify-content: center;
            gap: .1%;
        }

        td{
            max-width: 120px;
          overflow: hidden;
          text-overflow: ellipsis;
          white-space: nowrap;
          transition: all ease 0.7s;
        }

        a{
            color: white;
        }
    </style>
</head>
<body>
    <nav id="menu-h">
        <ul>
            <li><a id="esquerdo" href="index.php">Página Inicial</a></li>
            <li><a id="esquerdo" href="contato.php">Contato</a></li>
            <li><a id="direito" href="login.php">Entrar</a></li>
            <li><a id="direito" href="cadastro.php">Cadastre-se</a></li>
            
        </ul>
    </nav>
    <br>
    <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button type="button" onclick="searchData()" class="btn btn-light">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>
    <?php
    if(empty($_GET['search']))
    {
        echo "<p align=center>Nenhum item foi pesquisado, estes são todos itens listados: ";
    }
    ?>
    <div class="m-5">
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Título TCC</th>
                    <th scope="col">Autor TCC</th>
                    <th scope="col">Orientador TCC</th>
                    <th scope="col">Coorientador TCC</th>
                    <th scope="col">Palavras-Chave</th>
                    <th scope="col">Resumo</th>
                    <th scope="col">Arquivo</th>
                    <th scope="col">Ano</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($user_data = mysqli_fetch_assoc($result)) {
                        $nome_arquivo = $user_data['caminho'];
                        $link_download = "uploads/" . $nome_arquivo;
                        echo "<tr>";
                        echo "<td>".$user_data['id_tcc']."</td>";
                        echo "<td>".$user_data['titulo_tcc']."</td>";
                        echo "<td>".$user_data['autor_tcc']."</td>";
                        echo "<td>".$user_data['orientador_tcc']."</td>";
                        echo "<td>".$user_data['coorientador_tcc']."</td>";
                        echo "<td>".$user_data['keywords']."</td>";
                        echo "<td>".$user_data['resumo']."</td>";
                        echo "<td>".$user_data['caminho']." <br>|<a href='{$link_download}'>Baixar</a>|</td>";
                        echo "<td>".$user_data['ano']."</td>";
                        echo "</tr>";
                    }
                    ?>
            </tbody>
        </table>
    </div>
</body>
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'system.php?search='+search.value;
    }
</script>
</html>