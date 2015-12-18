<?php
session_start();
if(!isset($_SESSION['correo'])){
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
	function registro(){
		document.getElementById("preguntas").style.display= 'none';
		document.getElementById("creditos").style.display= 'none';
		document.getElementById("login").style.display= 'none';
		document.getElementById("registro").style.display= 'block';
	}
	function login(){
		document.getElementById("preguntas").style.display= 'none';
		document.getElementById("creditos").style.display= 'none';
		document.getElementById("registro").style.display= 'none';
		document.getElementById("login").style.display= 'block';
document.getElementById("nick").style.display= 'none';
	}
	function creditos(){
		document.getElementById("preguntas").style.display= 'none';
		document.getElementById("registro").style.display= 'none';
		document.getElementById("login").style.display= 'none';
		document.getElementById("creditos").style.display= 'block';
document.getElementById("nick").style.display= 'none';
	}
	function preguntas(){
		document.getElementById("registro").style.display= 'none';
		document.getElementById("login").style.display= 'none';
		document.getElementById("creditos").style.display= 'none';
		document.getElementById("preguntas").style.display= 'block';
document.getElementById("nick").style.display= 'none';
	}
function pruebame(){
		document.getElementById("registro").style.display= 'none';
		document.getElementById("login").style.display= 'none';
		document.getElementById("creditos").style.display= 'none';
		document.getElementById("preguntas").style.display= 'none';
document.getElementById("nick").style.display= 'block';
	}
	</script>
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
		<span class="right" id="reg"><a href="#" onclick="registro()">Registrarse</a></span>
      		<span class="right" id="log"><a href="#" onclick="login()">Login</a></span>
		<h2>Quiz: el juego de las preguntas</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.php'>Inicio</a></span>
		<span><a href='#' onclick="preguntas()">Preguntas</a></span>
		<span><a href='#' onclick="creditos()">Creditos</a></span>
<span><a href='#' onclick="pruebame()">¿Cuanto sabes?Pruebame</a></span>

	</nav>
    <section class="main" id="s1">
		<iframe id="registro" src="registro.html" style="display:none; border:0px; height: 400px; width: 100%"></iframe>
		<iframe id="login" src="login.php" style="display:none; border:0px; height: 400px; width: 100%"></iframe>
		<iframe id="creditos" src="creditos.html" style="display:none; border:0px; height: 400px; width: 100%"></iframe>
		<iframe id="preguntas" src="visualizarPreguntas.php" style="display:none; border:0px; height: 400px; width: 100%"></iframe>
<iframe id="nick" src="introducirNick.html" style="display:none; border:0px; height: 400px; width: 100%"></iframe>
		
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