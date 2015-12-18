<?php
session_start();
if(isset($_SESSION['correo'])){
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Preguntas</title>
    <link rel='stylesheet' type='text/css' href='estilos/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='estilos/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='estilos/smartphone.css' />
		   <script type="text/javascript" src="jquery.js"></script>

		
	<script language="JavaScript">
	function verPreguntas(){
		document.getElementById("creditos").style.display='none';
		document.getElementById("insertarPreguntas").style.display='none';
		document.getElementById("verPreguntas").style.display='block';
	}
	function insertarPreguntas(){
		document.getElementById("creditos").style.display='none';
		document.getElementById("verPreguntas").style.display='none';
		document.getElementById("insertarPreguntas").style.display='block';
	}
	function creditos(){
		document.getElementById("insertarPreguntas").style.display='none';
		document.getElementById("verPreguntas").style.display='none';
		document.getElementById("creditos").style.display='block';
	}
	</script>
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
		<span class="right" id="reg"><a href="logout.php" >Logout</a></span>
		<h2>Quiz: el juego de las preguntas</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='#' onclick="verPreguntas()">Ver Preguntas</a></span>
		<span><a href='#' onclick="insertarPreguntas()">Insertar Preguntas</a></span>
		<span><a href='#' onclick="creditos()">Creditos</a></span>
	</nav>
    <section class="main" id="s1">
		<iframe id="verPreguntas" src="VisualizarXml.php" style="display:none; border:0px; height: 400px; width: 100%"></iframe>
		<iframe id="insertarPreguntas" src="geestionPreguntas.php" style="display:none; border:0px; height: 400px; width: 100%"></iframe>
		<iframe id="creditos" src="creditos.html" style="display:none; border:0px; height: 400px; width: 100%"></iframe>
		
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://es.wikipedia.org/wiki/Quiz" target="_blank">Que es un Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>
<?php
}
?>