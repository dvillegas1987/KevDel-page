# Instalación Rápida - Formulario de Contacto

## Pasos para Configurar el Formulario de Contacto

### 1. Instalar Composer (si no está instalado)
```bash
# Windows (usando Chocolatey)
choco install composer

# O descargar desde: https://getcomposer.org/download/
```

### 2. Instalar PHPMailer
```bash
# En el directorio raíz del proyecto
composer install
```

### 3. Verificar la Configuración SMTP
El archivo `assets/mail/config.php` ya está configurado con:
- **Host:** smtp.hostinger.com
- **Puerto:** 465
- **Email:** contacto@unitycode.io
- **Contraseña:** Argentina*2025

### 4. Probar la Configuración
1. Abre tu navegador
2. Ve a: `http://tu-dominio.com/assets/mail/test-smtp.php`
3. Si ves "✅ Prueba Exitosa", la configuración está correcta
4. **IMPORTANTE:** Elimina el archivo `test-smtp.php` después de la prueba

### 5. Probar el Formulario
1. Abre `index-10.html` en tu navegador
2. Ve a la sección "Contacto"
3. Completa el formulario y envíalo
4. Deberías ver "Message sent successfully!"

## Solución de Problemas

### Error: "PHPMailer no está instalado"
```bash
composer install
```

### Error: "SMTP connect() failed"
- Verifica que el puerto 465 esté abierto
- Confirma las credenciales en `config.php`
- Verifica que la cuenta SMTP tenga permisos de envío

### Error: "Authentication failed"
- Revisa el email y contraseña en `config.php`
- Asegúrate de que la cuenta SMTP esté activa

### El formulario no envía
- Verifica que JavaScript esté habilitado
- Revisa la consola del navegador para errores
- Confirma que el archivo `contact-form.php` sea accesible

## Archivos Importantes

- `assets/mail/config.php` - Configuración SMTP
- `assets/mail/contact-form.php` - Procesamiento del formulario
- `assets/js/main.js` - Validación JavaScript
- `index-10.html` - Formulario de contacto

## Seguridad

- ✅ Credenciales separadas en archivo de configuración
- ✅ Validación de entrada en frontend y backend
- ✅ Escape de HTML para prevenir XSS
- ✅ Manejo de errores sin exponer información sensible

## Notas

- El formulario requiere JavaScript habilitado
- Se recomienda usar HTTPS en producción
- Considera usar variables de entorno para las credenciales en producción 