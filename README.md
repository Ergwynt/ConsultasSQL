# Configuración de Servidores Apache y Tomcat en Ubuntu 10.04 LTS

## Arquitectura Web de Tres Capas

La arquitectura web de tres capas es un modelo común en el desarrollo de aplicaciones web, que organiza el software en tres capas distintas:

1. **Capa de Presentación**: Es la interfaz del usuario y se encarga de mostrar los datos y recibir las interacciones del usuario. Suele implementarse en HTML, CSS y JavaScript.

2. **Capa de Lógica de Negocio**: Procesa las reglas de negocio y la lógica de la aplicación. Generalmente se implementa en un lenguaje de programación como Java, PHP o Python.

3. **Capa de Datos**: Gestiona y almacena la información en una base de datos, como MySQL o SQL Server.

---

## Plataformas Web: LAMP y WISA

Las plataformas web son entornos de software utilizados para desarrollar y ejecutar sitios web. Dos de las plataformas más populares son:

- **LAMP**: Compuesto por Linux, Apache, MySQL y PHP. Es una pila de software open-source que se usa comúnmente para alojar sitios y aplicaciones web dinámicas en servidores Linux.

- **WISA**: Compone una pila de software que incluye Windows, IIS (Internet Information Services), SQL Server y ASP.NET. Es una plataforma de Microsoft, generalmente utilizada para aplicaciones empresariales en servidores Windows.

---

## Configuración del Servidor Web Apache y Servidor de Aplicaciones Tomcat en Ubuntu 10.04 LTS

### Requisitos Previos
Antes de comenzar, asegúrate de que tu máquina con Ubuntu 10.04 LTS tiene una configuración de red activa y acceso a Internet. Además, necesitas tener privilegios de `root`.

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
    Deberías ver un mensaje que indique que el servicio Apache está activo.

2. **Comprobar el servidor Apache desde el navegador**:
    - Abre tu navegador y visita `http://localhost/` o `http://<tu-ip>`.
    - Deberías ver la página de inicio de Apache si está funcionando correctamente.

### Paso 3: Cambiar el Puerto de Apache al Puerto 82

1. **Abrir el archivo de configuración de Apache**:
    ```bash
    nano /etc/apache2/ports.conf
    ```

2. **Modificar el puerto de escucha**:
    - Busca la línea que dice `Listen 80` y cámbiala a `Listen 82`.

3. **Modificar el archivo de configuración del sitio predeterminado**:
    ```bash
    nano /etc/apache2/sites-available/000-default.conf
    ```
    - Cambia `<VirtualHost *:80>` a `<VirtualHost *:82>`.

4. **Reiniciar Apache para aplicar los cambios**:
    ```bash
    service apache2 restart
    ```

5. **Probar la configuración en el navegador**:
    - En el navegador, visita `http://localhost:82/` o `http://<tu-ip>:82` para confirmar que Apache está funcionando en el puerto 82.

### Paso 4: Instalación de Tomcat

1. **Instalar Java (requisito para Tomcat)**:
    ```bash
    apt-get install default-jdk -y
    ```

2. **Descargar e instalar Tomcat**:
    - Descarga Tomcat desde el sitio oficial o utiliza el siguiente comando para instalarlo:
    ```bash
    apt-get install tomcat7 -y
    ```

3. **Iniciar Tomcat**:
    ```bash
    service tomcat7 start
    ```

4. **Verificar que Tomcat está funcionando**:
    - Visita `http://localhost:8080/` en tu navegador para ver la página de inicio de Tomcat.
