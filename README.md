# Validación de Correos con PHP y PHPMailer

Esta aplicación permite registrar usuarios, validar sus correos electrónicos mediante un código de verificación enviado por email y gestionar el proceso de autenticación de manera segura. 
El sistema incluye el uso de variables de entorno para proteger información sensible como las credenciales de la base de datos y el correo electrónico.

## Características

- **Registro de usuarios**: Formulario de registro para capturar nombre, correo y contraseña.
- **Verificación de correo**: Envío de un código único al email del usuario para confirmar su cuenta.
- **Gestión segura de datos**: Uso de variables de entorno y almacenamiento cifrado de contraseñas.
- **Notificaciones por email**: Implementado con PHPMailer para enviar correos profesionales.
- **Arquitectura organizada**: Código modular y separando lógica de configuración.

## Tecnologías utilizadas

- **Backend**: PHP 8+
- **Base de datos**: MySQL/MariaDB
- **Gestión de correos**: PHPMailer

## Requisitos previos

Antes de instalar y ejecutar la aplicación, asegúrate de cumplir con los siguientes requisitos:

1. PHP 8.0 o superior instalado.
2. Composer instalado (para gestionar dependencias).
3. MySQL o MariaDB como gestor de base de datos.
4. Un servidor SMTP (por ejemplo, Gmail) para enviar correos electrónicos.

## Instalación

Sigue los pasos para instalar y ejecutar la aplicación:

1- Descargue el proyecto comprimido.
2- Asegúrese de tener en su equipo los requisitos previos.
3- Importe el fichero validarCorreos.sql que contiene la BD.
4- Modifique las siguentes líneas de código:

bd.php -> 'tuUsuario','tuPassword' 
constantes.php:
    define('EMAIL','');
    define('EMAIL_PASSWORD',"");
aquí tan solo tiene que añadir el email que va a enviar los correos automáticos con el código de validación. Para extraer su EMAIL_PASSWORD
tiene que dirigirse a la configuración de cuenta de google ( buscar "contraseñas de aplicación" ) y le aparecerá un código parecido a este : xxxx xxxx xxxx xxxx
