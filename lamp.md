# Guía de Instalación de Servidores y PHP en Ubuntu

## 1. Actualización del Repositorio y Paquetes

Primero, actualizamos la lista de paquetes disponibles e instalamos las actualizaciones disponibles.

```bash
sudo apt update
sudo apt upgrade
```
## 2. Instalación del Servidor Apache

Para instalar el servidor web Apache, utilizamos el siguiente comando:
```bash
sudo apt install apache2
```
## 3. Instalación del Servidor de Base de Datos MaríaDB

Para instalar MariaDB, utiliza el siguiente comando:
```bash
sudo apt install mariadb-server mariadb-client
```
Después de la instalación, el servidor MariaDB debería ejecutarse automáticamente. Para comprobar el estado del servidor MariaDB, usamos:
```bash
sudo systemctl status mariadb
```

Para asegurarnos de que MariaDB se inicie automáticamente al arrancar el sistema, ejecutamos el siguiente comando:
```bash
sudo systemctl enable mariadb
```
Para verificar la versión del servidor MariaDB instalado, usamos:
```bash
mysql --version
```

A continuación, ejecutamos un script de seguridad para configurar MariaDB:
```bash
sudo mysql_secure_installation
```
Cuando se nos solicite la contraseña root de MariaDB, presionamos Enter ya que aún no está configurada. Después, proporcionamos una contraseña para el usuario root de MariaDB y respondemos las preguntas para eliminar el usuario anónimo, deshabilitar el inicio de sesión remoto y eliminar la base de datos de prueba.

Por defecto, MariaDB en Ubuntu utiliza unix_socket para autenticar el inicio de sesión del usuario root. Esto significa que solo se puede acceder al servidor MariaDB a través de un socket Unix local y no mediante una contraseña. Esto mejora la seguridad al evitar inicios de sesión remotos.

Para probar el acceso a la base de datos con la nueva contraseña:
```bash
sudo mysql -u root -p
```


Ahora, vamos a crear un nuevo usuario en la base de datos llamado developer con la contraseña 5t6y7u8i:
```bash
CREATE USER 'developer'@'localhost' IDENTIFIED BY '5t6y7u8i';
```


Posteriormente, puedes iniciar sesión con el nuevo usuario:
```bash
mysql -u developer -p
```

## 4. Instalación de la Última Versión de PHP

Para instalar PHP 8.3 y algunos módulos comunes, ejecuta el siguiente comando:
```bash
sudo apt install php7.4 libapache2-mod-php7.4 php7.4-mysql php-common php7.4-cli php7.4-common php7.4-json php7.4-opcache php7.4-readline
```
Ahora, activamos el módulo Apache para PHP 7.4 y reiniciamos Apache:
```bash
sudo a2enmod php8.3
sudo systemctl restart apache2
```
Verificamos la versión de PHP instalada:
```bash
php --version
```


Para probar que el servidor Apache está procesando scripts PHP, creamos un archivo info.php en el directorio raíz de Apache:
```bash
sudo vim /var/www/html/info.php
```
Dentro del archivo, agregamos el siguiente código:
```bash
<?php phpinfo(); ?>
```
Una vez guardado el archivo, abre tu navegador y accede a http://<dirección-ip>/info.php.

### 4.1 Ejecutando Código PHP con PHP-FPM

En algunos casos, es necesario usar PHP-FPM en lugar del módulo PHP de Apache. Para hacerlo, primero desactivamos el módulo PHP 8.3 de Apache:
```bash
sudo a2dismod php8.3
```
Instalamos PHP-FPM:
```bash
sudo apt install php7.4-fpm
```
Luego, habilitamos los módulos necesarios:
```bash
sudo a2enmod proxy_fcgi setenvif
```
Habilitamos el archivo de configuración de PHP-FPM para Apache:
```bash
sudo a2enconf php7.4-fpm
```
Reiniciamos Apache:
```bash
sudo systemctl restart apache2
```
Ahora, al actualizar la página info.php en el navegador, verás que la API del servidor ha cambiado de "Apache 2.0 Handler" a "FPM/FastCGI", lo que indica que Apache ahora está pasando las solicitudes PHP a PHP-FPM.
