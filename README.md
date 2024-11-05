# Configuración de Servidores Apache y Tomcat en Ubuntu 10.04 LTS

## Arquitectura Web de Tres Capas

La arquitectura web de tres capas es un modelo que organiza el software en tres partes principales y se usa mucho en el desarrollo de aplicaciones web:

1. **Capa de Presentación**: Es la interfaz de usuario. Aquí es donde se muestran los datos y se gestionan las interacciones del usuario, y suele implementarse en HTML, CSS y JavaScript.

2. **Capa de Lógica de Negocio**: Aquí se procesan las reglas de negocio y la lógica de la aplicación, usualmente en un lenguaje de programación como Java, PHP o Python.

3. **Capa de Datos**: Esta capa maneja y almacena la información de la aplicación, usando una base de datos como MySQL o SQL Server.

---

## Plataformas Web: LAMP y WISA

Las plataformas web son entornos de software que utilizo para desarrollar y ejecutar sitios web. Aquí describo dos de las plataformas más comunes:

- **LAMP**: Es una pila de software open-source que incluye Linux, Apache, MySQL y PHP. Es una configuración común para alojar sitios y aplicaciones web dinámicas en servidores Linux.

- **WISA**: Esta es una pila de software que incluye Windows, IIS (Internet Information Services), SQL Server y ASP.NET. Es la plataforma de Microsoft y generalmente se usa para aplicaciones empresariales en servidores Windows.

---

## Configuración del Servidor Web Apache y Servidor de Aplicaciones Tomcat en Ubuntu 10.04 LTS

### Requisitos Previos

Antes de empezar, me aseguro de que mi máquina con Ubuntu 10.04 LTS tenga una configuración de red activa y acceso a Internet. Además, necesito tener privilegios de `root`.

### Paso 1: Instalación de Apache

1. **Actualizar el sistema**:
    ```bash
    apt-get update
    ```

2. **Instalar Apache**:
    ```bash
    apt-get install apache2 -y
    ```

### Paso 2: Verificar que Apache Está Funcionando

1. **Comprobar el estado de Apache en la terminal**:
    ```bash
    service apache2 status
    ```
    Esto debería mostrar que el servicio Apache está activo.

2. **Comprobar el servidor Apache desde el navegador**:
    - Abro mi navegador y visito `http://localhost/` o `http://<mi-ip>`.
    - Debería ver la página de inicio de Apache si está funcionando correctamente.

### Paso 3: Cambiar el Puerto de Apache al Puerto 82

1. **Abrir el archivo de configuración de Apache**:
    ```bash
    nano /etc/apache2/ports.conf
    ```

2. **Modificar el puerto de escucha**:
    - Busco la línea que dice `Listen 80` y la cambio a `Listen 82`.

3. **Modificar el archivo de configuración del sitio predeterminado**:
    ```bash
    nano /etc/apache2/sites-available/000-default.conf
    ```
    - Cambio `<VirtualHost *:80>` a `<VirtualHost *:82>`.

4. **Reiniciar Apache para aplicar los cambios**:
    ```bash
    service apache2 restart
    ```

5. **Probar la configuración en el navegador**:
    - En el navegador, visito `http://localhost:82/` o `http://<mi-ip>:82` para confirmar que Apache está funcionando en el puerto 82.

### Paso 4: Instalación de Tomcat

1. **Instalar Java (requisito para Tomcat)**:
    ```bash
    apt-get install default-jdk -y
    ```

2. **Descargar e instalar Tomcat**:
    - Descargo Tomcat desde el sitio oficial o utilizo el siguiente comando para instalarlo:
    ```bash
    apt-get install tomcat7 -y
    ```

3. **Iniciar Tomcat**:
    ```bash
    service tomcat7 start
    ```

4. **Verificar que Tomcat está funcionando**:
    - Visito `http://localhost:8080/` en el navegador para ver la página de inicio de Tomcat
