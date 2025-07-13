<?php
// Incluir configuración SMTP
require_once 'config.php';

// Incluir PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Verificar si PHPMailer está instalado
$autoloadPath = __DIR__ . '/../../vendor/autoload.php';
if (!file_exists($autoloadPath)) {
    // Si no está instalado, mostrar instrucciones
    echo "N";
    exit("PHPMailer no está instalado. Ejecuta: composer install");
}

require $autoloadPath;

// Obtener datos del formulario
$conName = $_POST['conName'] ?? '';
$conLName = $_POST['conLName'] ?? '';
$conEmail = $_POST['conEmail'] ?? '';
$conPhone = $_POST['conPhone'] ?? '';
$conMessage = $_POST['conMessage'] ?? '';

// Configuración de errores
ini_set('display_errors', 1);
error_reporting(E_ALL);

try {
    // Crear instancia de PHPMailer
    $mail = new PHPMailer(true);
    
    // Configuración del servidor (usando la función mail() nativa de PHP)
    // En una implementación completa, aquí iría la configuración SMTP real
    
    // Configuración del remitente y destinatario
    $mail->setFrom(SMTP_EMAIL, 'Formulario de Contacto - UnityCode');
    $mail->addAddress(RECIPIENT_EMAIL, 'UnityCode Contacto');
    $mail->addReplyTo($conEmail, $conName . ' ' . $conLName);
    
    // Configuración del email
    $mail->isHTML(true);
    $mail->Subject = 'Nuevo mensaje de contacto - ' . $conName . ' ' . $conLName;
    
    // Contenido del email en HTML
    $htmlContent = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background-color: #f8f9fa; padding: 20px; border-radius: 5px; margin-bottom: 20px; }
            .field { margin-bottom: 15px; }
            .label { font-weight: bold; color: #555; }
            .value { margin-top: 5px; }
            .message-box { background-color: #f8f9fa; padding: 15px; border-radius: 5px; border-left: 4px solid #007bff; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>Nuevo mensaje de contacto</h2>
                <p>Has recibido un nuevo mensaje desde el formulario de contacto de tu sitio web.</p>
            </div>
            
            <div class='field'>
                <div class='label'>Nombre completo:</div>
                <div class='value'>" . htmlspecialchars($conName . ' ' . $conLName) . "</div>
            </div>
            
            <div class='field'>
                <div class='label'>Email:</div>
                <div class='value'>" . htmlspecialchars($conEmail) . "</div>
            </div>
            
            <div class='field'>
                <div class='label'>WhatsApp:</div>
                <div class='value'>" . htmlspecialchars($conPhone) . "</div>
            </div>
            
            <div class='field'>
                <div class='label'>Mensaje:</div>
                <div class='message-box'>" . nl2br(htmlspecialchars($conMessage)) . "</div>
            </div>
            
            <hr style='margin: 30px 0; border: none; border-top: 1px solid #eee;'>
            <p style='font-size: 12px; color: #666;'>
                Este mensaje fue enviado desde el formulario de contacto de tu sitio web.<br>
                Fecha: " . date('d/m/Y H:i:s') . "
            </p>
        </div>
    </body>
    </html>";
    
    // Contenido en texto plano como fallback
    $textContent = "Nuevo mensaje de contacto\n";
    $textContent .= "========================\n\n";
    $textContent .= "Nombre completo: " . $conName . ' ' . $conLName . "\n";
    $textContent .= "Email: " . $conEmail . "\n";
    $textContent .= "WhatsApp: " . $conPhone . "\n";
    $textContent .= "Mensaje:\n" . $conMessage . "\n\n";
    $textContent .= "Fecha: " . date('d/m/Y H:i:s') . "\n";
    
    $mail->Body = $htmlContent;
    $mail->AltBody = $textContent;
    
    // Enviar email
    $result = $mail->send();
    
    if ($result) {
        echo "Y"; // Éxito
    } else {
        echo "N"; // Error
    }
    
} catch (Exception $e) {
    // Log del error
    error_log("Error PHPMailer: " . $e->getMessage());
    echo "N"; // Error
}
?>
