<?php
require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';
require 'OAuth.php';

include '../conexion.php';

$nombre = $_POST["txtNombre"];
$correo = $_POST["txtCorreo"];
$usuario = $_POST["txtUsuario"];
$password = $_POST["txtPassword"];

$insertar = mysqli_query($con,"insert into talumnos (usuario,password,nombre,correo,status) 
VALUES('" . $usuario . "', '" . $password . "', '" .$nombre. "', '".$correo. "','A') " );



// // $sql_agregar = 'insert into tusuarios (nombre,correo) VALUES (?,?)';
// // $sentencia_agregar = $pdo->prepare($sql_agregar);
// // $sentencia_agregar->execute(array($nombre,$correo));

$mail = new PHPMailer\PHPMailer\PHPMailer();

$mail->isMail();
/*
Enable SMTP debugging
0 = off (for production use)
1 = client messages
2 = client and server messages
*/
$mail->SMTPDebug = 0;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "correo@titulacionfcays.com";
$mail->Password = "Titulacion";
$mail->setFrom('no-reply@titulacionfcays.mx', 'TITULACION FCAYS');
$mail->addAddress($_POST["txtCorreo"], 'Destino');
$mail->Subject = 'Asunto';
$mail->Body = "<p>El motivo del correo es para avisarle que usted a sido registrado exitosamente en el sistema de <b>Titulacion</b></p><br><br><br><br><br>
<table style='border:1px solid black'>
	<tr>
		<th style='border:1px solid black;background-color:green'>Nombre</th>
		<th style='border:1px solid black;background-color:green'>Correo</th>
			
	</tr>
	<tr>
		<td style='border:1px solid black'>" . $_POST['txtNombre'] . "</td>
		<td style='border:1px solid black'>" . $_POST['txtCorreo'] . "</td>

	</tr>

</table>

";
$mail->CharSet = 'UTF-8'; // Con esto ya funcionan los acentos
$mail->IsHTML(true);

if (!$mail->send())
{
	echo "Error al enviar el E-Mail: ".$mail->ErrorInfo;
}
else
{
	echo "OK";
}
?>