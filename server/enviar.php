<?php
  session_start();

//Definición de variables
$nombre_archivo = 'texto.txt';
$contenido = "\r\nNombre:" . $_POST["first_name"] ."\r\nApellidos:" . $_POST["last_name"] ."\r\n\r\n\r\n";

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
	header('Location: http://217.160.128.108/facturas-expodental/gracias.html');
    fclose($gestor);
} else {
    echo "Error 1 - No se puede escribir sobre el archivo para guardar su texto. Por favor, si el problema persiste contacte con el administrador.</p>";
}
