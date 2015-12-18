<?php 
session_start();

?>

<html>
	<head>
		<link rel="STYLESHEET" type="text/css" href="estilos/style.css">
		<script>
	

function pedirValidacion(){

		xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function()
		{
			if(xmlhttp.readyState==4){
				if(xmlhttp.responseText=='INVALIDA'){
					document.getElementById("alerta7").style.display = 'block';
				}
			}else{
				document.getElementById("alerta7").style.display = 'none';
			}
		}
		xmlhttp.open("POST","comprobar.php",true);	
		
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("pass="+document.getElementById('pass').value);
}
		function comprobar(){
			var pass=document.getElementById("pass").value;
			var confirmar=document.getElementById("pass1").value;
			if(pass!=confirmar){
				alert("La contraseña y su comfirmacion no coinciden");
				return false;
			}else{ if(document.getElementById("alerta7").style.display == 'block'){
alert("El password no es valido, introduzca un password mas complicado");
return false;
}}
			return true;
		}
		</script>
	</head>
	<body>
<div class="alert-danger"  id="alerta7" style="display:none;">
    <strong>Error!</strong> El password no es valido. Por favor introduzca otro.
  </div>
		<form method="POST" action="modificar.php" onSubmit="return comprobar()">
			<div id='login'> 
				<p>Correo:<input type='text' id='correo' name='correo' value="<?php echo $_SESSION['correoA'];  ?>" disabled></p><br>
				<p>Contraseña: <input type='password' id='pass'name='pass' onBlur="pedirValidacion()"></p><br>
                <p>Confirmar Contraseña <input type='password' id='pass1'name='pass1'></p><br>
				
				<p><input type='submit' id='boton' value='Modificar contraseña'></p>
			</div>
		</form>
	</body>
</html>


