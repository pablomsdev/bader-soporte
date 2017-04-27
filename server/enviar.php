<?php
  session_start();

//Definición de variables
$nombre_archivo = 'texto.txt';
$contenido = "\r\nNombre:" . $_POST["first_name"] ."\r\nApellidos:" . $_POST["last_name"] .
"\r\nEmail:" . $_POST["email"] ."\r\nTelefono:" . $_POST["phone"] ."\r\nProducto:" .
 $_POST["product"] ."\r\nProveedor:" . $_POST["dealer"] ."\r\nFecha:" .
  $_POST["fechacompra"] ."\r\nComentarios:" . $_POST["comment"] ."\r\n\r\n\r\n";

if(isset($_POST['submit'])){
    $to = "pabloinf@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = "BADER · Formulario de Soporte";
    $subject2 = "BADER · Copia de tu solicitud de soporte";
    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $contenido;
    $message2 = "Esta es una copia de tu mensaje " . $first_name . "\n\n" . $contenido . "\n\nContactaremos con usted en la mayor brevedad";

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Correo enviado. Gracias " . $first_name . ", Contactaremos con usted en la mayor brevedad.";

    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }

//Creamos un log de toda la gente que cubre el formulario

//Se comprueba si el fichero se puede escribir
if (is_writable($nombre_archivo)) {
	//Comprobaciones de error
    if (!$gestor = fopen($nombre_archivo, 'a')) {
         echo "Error 2 - No se puede abrir el archivo para guardar su texto. Por favor, si el problema persiste contacte con el administrador.</p>";
         exit;
    }
    if (fwrite($gestor, $contenido) === FALSE) {
        echo "Error 3 - No se puede escribir al archivo para guardar su texto. Por favor, si el problema persiste contacte con el administrador.</p>";
        exit;
    }
    echo "En breve nos pondremos en contacto con usted.</p>";
	$href="http://www.bader.es";
	$nombr="BADER";
	echo "<a href='".$href."'>".$nombr."</a>";
	sleep(3);
	header('Location: ../gracias.html');
    fclose($gestor);
} else {
    echo "Error 1 - No se puede escribir sobre el archivo para guardar su texto. Por favor, si el problema persiste contacte con el administrador.</p>";
}
