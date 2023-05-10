

<?php
$para      = 'richard123qui@gmail.com';
$titulo    = 'VERIFICAR MEMBRESÍA';
$mensaje   = 'SU MEMBRESÍA ESTÁ POR TERMINAR
REALIZAR NUEVA SOLICITUD DE SER MIEMBRO';
$cabeceras = 'From: techboor@techlab.com' . "\r\n" .
    'Reply-To: techboor@techlab.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($para, $titulo, $mensaje, $cabeceras);

?>