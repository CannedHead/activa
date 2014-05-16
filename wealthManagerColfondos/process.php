<?php

// Information to be modified

$first_email = "danielcar@activamc.com"; // email address to which the form data will be sent
$second_email = "fernandasoto@activamc.com"; // email address to which the form data will be sent
$subject = "Contacto Wealth Management"; // subject of the email that is sent
$thanks_page = "contacto.html"; // path to the thank you page following successful form submission
$contact_page = "contacto.html"; // path to the HTML contact page where the form appears


// Nothing needs to be modified below this line

if (!isset($_POST['submit'])) {
    header( "Location: $contact_page" );
  }

if (isset($_POST["submit"])) {
	$nam = $_POST["name"];
	$ema = trim($_POST["mail"]);
	$tel = trim($_POST["tel"]);
	$cel = trim($_POST["cel"]);
	$city = $_POST["city"];
	$com = $_POST["comments"];
	$spa = $_POST["spam"];

	if (get_magic_quotes_gpc()) { 
	$nam = stripslashes($nam);
	$ema = stripslashes($ema);
	$tel = stripslashes($tel);
	$cel = stripslashes($cel);
	$city = stripslashes($city);
	$com = stripslashes($com);
	}

$error_msg=array(); 

if (empty($nam)) { 
$error_msg[] = "The name field must contain only letters, spaces, dashes ( - ) and single quotes ( ' )";
}

if (empty($ema)) {
	$error_msg[] = "Your email must have a valid format, such as name@mailhost.com";
}

$limit = 1000;

if (empty($com) || !preg_match("/^[0-9A-Za-z\/-\s'\(\)!\?\.,]+$/", $com) || (strlen($com) > $limit)) { 
$error_msg[] = "The Comments field must contain only letters, digits, spaces and basic punctuation (&nbsp;'&nbsp;-&nbsp;,&nbsp;.&nbsp;), and has a limit of 1000 characters";
}
// Assuming there's an error, refresh the page with error list and repeat the form

if ($error_msg) {
echo '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Confirmación Contacto Wealth Management</title>
<link href="http://fonts.googleapis.com/css?family=Bitter:400,700,400italic" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,700,500italic,700italic,900,900italic" rel="stylesheet" type="text/css">
<link rel="icon" type="image/png" href="img/favicon.png" />
<style>
	body {	
		background: #fff; 
		font-family:"Bitter",sans-serif;
		padding: 20px 40px; text-align:center;}
		form div {margin-bottom: 10px;}
		
	.content {
		margin: 0 auto;
	}
	h1 {
		color: #005495;
    	font-family: "Bitter",sans-serif;
    	font-size: 3em;
    	font-weight: 700;
    	letter-spacing: -1px;
    	line-height: 49px;
    	margin: 0 0 20px;
    	text-transform: uppercase;
	}
	label {
		margin-bottom: 2px;
	}
	input[type="text"], input[type="email"], textarea {
		font-size: 0.75em; 
		width: 98%; font-family: arial; 
		border: 1px solid #ebebeb; 
		padding: 4px; 
		display: block;
	}
	input[type="radio"] {
		margin: 0 5px 0 0;
	}
	textarea {
		overflow: auto;
	}
	.hide {
		display: none;
	}
	.err {
		color: red; 
		font-size: 0.875em; 
		margin: 1em 0; 
		padding: 0 2em;
	}
	p{
		font-family: "Roboto", sans-serif;
		font-size: 24px; 
		font-family: "Roboto Condensed", sans-serif;
    	font-weight: 300;
		color:#000000; 
		font-weight:300;
		margin-bottom: 40px;
	}
	a{
		background-color: #005495;
    	border-radius: 6px;
    	color: #fff;
    	font-family: "Roboto",sans-serif;
    	font-size: 1.2em;
    	height: 60px;
    	letter-spacing: -1px;
    	padding: 10px 30px;
    	text-decoration: none;
    	width: 210px;;
	}
	a:hover{
		background-color: red;
	}

	li{
		color:#fff;
		font-family: "Roboto", sans-serif; 
		color:#000000; 
		font-weight:300;

	}
</style>
</head>
<body>
	<div class="content">
		<img src="img/logo.png"/>
		<h1>Uuuuuups!</h1>
		<p>Desafortunadamente su mensaje no pudo ser enviado.<br> Por favor tenga en cuenta estas recomendaciones:
			<ul>
				<li>Todos los campos son obligatorios</li>
				<li>El teléfono de contacto únicamente debe contener <strong>dígitos del 0 al 9</strong></li>
				<li>El correo debe tener una estructura <strong>nombre@dominio.com</strong></li>
			</ul>
		</p>

	<a href="contacto.html">Regresar al formulario</a>
</body>
</html>';
exit();
}


$email_body = 
	"Nombre: $nam\n\n" .
	"Email: $ema\n\n" .
	"Teléfono: $tel\n\n" .
    "Mensaje:\n\n" .
	"$com" ; 

// Assuming there's no error, send the email and redirect to Thank You page

if (isset($_REQUEST['comments']) && !$error_msg) {
mail ($first_email, $subject, $email_body, "From: $nam <$ema>" . "\r\n" . "Reply-To: $nam <$ema>");
mail ($second_email, $subject, $email_body, "From: $nam <$ema>" . "\r\n" . "Reply-To: $nam <$ema>");
header ("Location: $thanks_page");
exit();
}  
}