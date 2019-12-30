<?php
 
if($_POST) {
    $visitor_name = "";
    $visitor_email = "";
    $visitor_message = "";
     
    if(isset($_POST['visitor_name'])) {
      $visitor_name = filter_var($_POST['visitor_name'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['visitor_email'])) {
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']);
        $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
    }
     
    if(isset($_POST['visitor_message'])) {
        $visitor_message = "Enviado por: " . htmlspecialchars($visitor_name). "\n" . "Correo: " . htmlspecialchars($visitor_email) . "\n" . "Mensaje: " . htmlspecialchars($_POST['visitor_message']);
    }
     
    
    $recipient = "willydavidlozada@gmail.com";
    $email_title = "MENSAJE DE CONTACTO ENVIADO DESDE NUESTRO SITIO WEB(S.Q Servicios contables especializados S.A.S)";
    
     
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";
     
    if(mail($recipient, $email_title, $visitor_message, $headers)) {
        echo "<p>Gracias por ponerte en contacto con nosotros, $visitor_name.</p>";
    } else {
        echo '<p>Lo sentimos, pero el correo electrónico no se pudo enviar, Vuelve a intertarlo.</p>';
    }
     
} else {
    echo '<p>Algo salió mal, Vuelve a intertarlo</p>';
}
 
?>  