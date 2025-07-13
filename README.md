# KevDel Page - Formulario de Contacto con PHPMailer

Este proyecto incluye un formulario de contacto funcional que utiliza PHPMailer para enviar correos electrónicos a través de SMTP.

## Configuración del Formulario de Contacto

### Requisitos Previos

- PHP 7.4 o superior
- Composer instalado
- Servidor web (Apache/Nginx)
- Extensión PHP OpenSSL habilitada

### Instalación

1. **Instalar PHPMailer usando Composer:**
   ```bash
   composer install
   ```

2. **Verificar la configuración SMTP:**
   El archivo `assets/mail/config.php` contiene la configuración SMTP:
   - Host: smtp.hostinger.com
   - Puerto: 465
   - Email: contacto@unitycode.io
   - Contraseña: Argentina*2025

### Estructura de Archivos

```
KevDel-page/
├── assets/
│   ├── mail/
│   │   ├── config.php          # Configuración SMTP
│   │   └── contact-form.php    # Procesamiento del formulario
├── vendor/                     # Dependencias de Composer
├── composer.json              # Configuración de Composer
└── index-10.html             # Página principal con formulario
```

### Funcionalidad del Formulario

El formulario de contacto en `index-10.html` incluye los siguientes campos:
- **Nombre** (requerido)
- **Apellido** (requerido)
- **Email** (requerido, validado)
- **WhatsApp** (requerido)
- **Mensaje** (requerido)

### Proceso de Envío

1. El usuario completa el formulario en `index-10.html`
2. JavaScript valida los campos del formulario
3. Los datos se envían via AJAX a `assets/mail/contact-form.php`
4. PHPMailer procesa el envío usando la configuración SMTP
5. Se envía un email HTML con formato profesional
6. Se devuelve "Y" (éxito) o "N" (error) al frontend

### Características del Email

- **Formato HTML** con estilos CSS integrados
- **Versión texto plano** como fallback
- **Información completa** del remitente
- **Timestamp** de envío
- **Reply-To** configurado para respuestas directas

### Seguridad

- **Validación de entrada** en el frontend y backend
- **Escape de HTML** para prevenir XSS
- **Configuración separada** de credenciales
- **Manejo de errores** sin exponer información sensible

### Troubleshooting

Si el formulario no funciona:

1. **Verificar instalación de PHPMailer:**
   ```bash
   composer install
   ```

2. **Verificar configuración SMTP:**
   - Revisar credenciales en `assets/mail/config.php`
   - Confirmar que el puerto 465 esté abierto
   - Verificar que la cuenta SMTP tenga permisos de envío

3. **Verificar logs de error:**
   - Revisar logs de PHP en el servidor
   - Verificar permisos de escritura en el directorio

4. **Probar conexión SMTP:**
   ```php
   // Agregar temporalmente para debug
   $mail->SMTPDebug = SMTP::DEBUG_SERVER;
   ```

### Personalización

Para personalizar el formulario:

1. **Modificar campos:** Editar el HTML en `index-10.html`
2. **Cambiar validación:** Modificar JavaScript en `assets/js/main.js`
3. **Personalizar email:** Editar plantilla HTML en `assets/mail/contact-form.php`
4. **Cambiar configuración SMTP:** Modificar `assets/mail/config.php`

### Notas Importantes

- Las credenciales SMTP están en texto plano en el archivo de configuración
- En producción, considera usar variables de entorno
- El formulario requiere JavaScript habilitado para funcionar
- Se recomienda configurar un certificado SSL para el sitio web 