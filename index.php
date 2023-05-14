<?php
include_once('config.php');
$sql = "SELECT * FROM tcc ORDER BY id_tcc DESC LIMIT 3";
$resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Página Inicial</title>
    <style>
        body {
            background: white;
            color: white;
        }

        * {
            margin: 0 auto;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif, 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif, Helvetica, sans-serif;
        }

        header {
            background: no-repeat center/cover url(arquivos_home/linter.jpg);
            height: calc(100vh - 270px);
        }

        footer {
            background: white;
            color: black;
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

        .table-bg{
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px 15px 0 0;
        }

        .box-search{
            display: flex;
            justify-content: center;
            gap: .1%;
        }

        .slider {
			position: relative;
			width: 800px;
			height: 300px;
			overflow: hidden;
			border-radius: 20px;
		}

		.slider-inner {
			position: absolute;
			top: 0;
			left: 0;
			width: 2400px;
			height: 300px;
			transition: transform 0.3s ease-out;
		}

		.slide {
			position: relative;
			float: left;
			width: 800px;
			height: 400px;
			background-color: #003615;
		}

		.arrow {
			position: absolute;
			top: 50%;
			margin-top: -25px;
			width: 50px;
			height: 50px;
			background-color: springgreen;
			border-radius: 100%;
			box-shadow: 0 0 5px rgba(0,0,0,0.5);
			cursor: pointer;
			transition: background-color 0.3s ease-out;
            line-height: 50px;
            text-align: center;
		}

		.arrow-left {
            
			left: 20px;
		}

		.arrow-right {
			right: 20px;
		}

		.arrow:hover {
			background-color: #eee;
		}

		.slide{
			color: white;
			text-align:center;
		}

		a{
			color:white;
		}

		a:visited{
			color:springgreen;
		}

		p{
			text-align:justify;
			margin-left:100px;
			margin-right:100px;
		}

		fieldset {
			margin-top:5px;
			margin-left:5px;
			margin-right:5px;
			height:290px;
            border: 2px solid springgreen;
			border-radius:15px;
        }
    </style>
</head>

<body>
    <header>
    </header>

    <nav id="menu-h">
        <ul>
            <li><a id="esquerdo" href="">Página Inicial</a></li>
            <li><a id="esquerdo" href="contato.php">Contato</a></li>
            <li><a id="direito" href="login.php">Entrar</a></li>
            <li><a id="direito" href="cadastro.php">Cadastre-se</a></li>
        </ul>
    </nav>
    <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar (autor ou título)" id="pesquisar">
        <button onclick="searchData()" class="btn btn-outline-success">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>
    <br><br>
    <div class="slider">
		<div class="slider-inner">
			<!-- <div class="slide">Slide 1</div>
			<div class="slide">Slide 2</div>
			<div class="slide">Slide 3</div> -->
            <?php
            if ($resultado->num_rows > 0) {
                // há pelo menos um resultado
            
                while ($row = $resultado->fetch_assoc()) {
                    // crie um slide para cada linha do resultado
					$nome_arquivo = $row['caminho'];
					$link_download = "uploads/" . $nome_arquivo;
                    echo '<div class="slide">';
					echo '<fieldset>';
					echo '<h1>Novos TCCs depositados</h1>';
        			echo '<h2><a href="' . $link_download . '">' . $row['titulo_tcc'] . '</a></h2>';
        			echo '<p>' . $row['resumo'] . '</p>';
        			echo '</fieldset>';
					echo '</div>';
                }
            }
            ?>
		</div>
		<div class="arrow arrow-left">&#10094;</div>
		<div class="arrow arrow-right">&#10095;</div>
	</div>
    <br><br>
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

    //SLIDER:

    // Seleciona os elementos do slider
		const slider = document.querySelector('.slider');
		const sliderInner = slider.querySelector('.slider-inner');
		const slides = slider.querySelectorAll('.slide');

		// Seleciona os elementos das setas
		const arrowLeft = slider.querySelector('.arrow-left');
		const arrowRight = slider.querySelector('.arrow-right');

		// Configura o índice inicial do slide
		let currentSlide = 0;

		// Função para mover para o slide anterior
		function prevSlide() {
			currentSlide--;
			if (currentSlide < 0) {
				currentSlide = slides.length - 1;
			}
			moveSlider();
		}

		// Função para mover para o próximo slide
		function nextSlide() {
			currentSlide++;
			if (currentSlide >= slides.length) {
				currentSlide = 0;
			}
			moveSlider();
		}

		// Função para mover o slider
		function moveSlider() {
			const slideWidth = slides[0].offsetWidth;
			const slideOffset = currentSlide * slideWidth;
			sliderInner.style.transform = `translateX(-${slideOffset}px)`;
		}

		// Adiciona os eventos de clique nas setas
		arrowLeft.addEventListener('click', prevSlide);
		arrowRight.addEventListener('click', nextSlide);
</script>
</html>