
<html>
    <head>
		<?php 

		require 'head.php';

		?>
    </head>
    
<body>

    <form id="formRegistro" name="formRegistro"  method="POST">
		<input type="text" id="txtUsuario" name="txtUsuario" placeholder="Escribe tu usuario">
        <input type="password" id="txtPassword" name="txtPassword" placeholder="Escribe tu contraseña">
        <input type="text" id="txtNombre" name="txtNombre" placeholder="Escribe tu nombre">
        <input type="email" id="txtCorreo" name="txtCorreo" placeholder="Escribe tu correo">
        <button type="button" onClick="registrar();">Enviar</button>
		
        
    </form>
	
</body>
    
</html>