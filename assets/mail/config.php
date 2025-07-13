<?php
/**
 * Configuración SMTP para el formulario de contacto
 * 
 * IMPORTANTE: Este archivo contiene credenciales sensibles.
 * En producción, considera usar variables de entorno.
 */

// Configuración del servidor SMTP
define('SMTP_HOST', 'smtp.hostinger.com');
define('SMTP_PORT', 465);
define('SMTP_EMAIL', 'contacto@unitycode.io');
define('SMTP_PASSWORD', 'Argentina*2025');

// Email del destinatario
define('RECIPIENT_EMAIL', 'contacto@unitycode.io');

// Configuración adicional
define('SMTP_SECURE', true); // Usar SSL/TLS
define('SMTP_AUTH', true);   // Autenticación requerida
define('CHARSET', 'UTF-8');  // Codificación de caracteres
?> 