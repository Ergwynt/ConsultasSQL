# Instalación y Configuración de LDAP en Ubuntu

Este documento proporciona instrucciones detalladas para la instalación y configuración de un servidor y un cliente LDAP en Ubuntu, además de la creación de un usuario llamado `clockwork` y la conexión desde el cliente.

## Requisitos Previos
- Un servidor con Ubuntu instalado
- Acceso a un usuario con privilegios de `sudo`
- Conexión a Internet

---

## Instalación del Servidor LDAP

### 1. Actualizar el Sistema
```bash
sudo apt update && sudo apt upgrade -y
```

### 2. Instalar el Servidor OpenLDAP y las Herramientas
```bash
sudo apt install slapd ldap-utils -y
```

### 3. Configurar OpenLDAP
Durante la instalación se pedirá configurar una contraseña para el administrador de `cn=admin,dc=example,dc=com`.
Si no se pidió, ejecutar:
```bash
sudo dpkg-reconfigure slapd
```
Y seguir los pasos:
1. No omitir la configuración.
2. Ingresar el dominio base (`example.com` → `dc=example,dc=com`).
3. Establecer la contraseña del administrador.
4. Elegir el formato de base de datos (MDB recomendado).
5. Confirmar la eliminación de la base de datos cuando se desinstale el paquete.
6. No mover la base de datos anterior si ya existe.

### 4. Verificar la Instalación
```bash
ldapsearch -x -LLL -H ldap:/// -b dc=example,dc=com
```

---

## Creación del Usuario `clockwork`

### 1. Crear un Archivo LDIF para el Usuario
Crear un archivo llamado `clockwork.ldif` con el siguiente contenido:
```ldif
dn: uid=clockwork,ou=People,dc=example,dc=com
objectClass: inetOrgPerson
objectClass: posixAccount
objectClass: shadowAccount
cn: Clockwork
sn: User
uid: clockwork
uidNumber: 1001
gidNumber: 1001
homeDirectory: /home/clockwork
loginShell: /bin/bash
userPassword: {SSHA}hashed_password_here
```

### 2. Agregar el Usuario a LDAP
```bash
ldapadd -x -D cn=admin,dc=example,dc=com -W -f clockwork.ldif
```

### 3. Verificar que el Usuario se Creó Correctamente
```bash
ldapsearch -x -LLL -b dc=example,dc=com uid=clockwork
```

---

## Instalación del Cliente LDAP

### 1. Instalar los Paquetes Necesarios
```bash
sudo apt install libnss-ldap libpam-ldap ldap-utils -y
```
Durante la instalación, se solicitarán los siguientes datos:
- **URI del servidor LDAP**: `ldap://ip-del-servidor`
- **Distinguished Name (DN) base**: `dc=example,dc=com`
- **Versión LDAP**: `3`
- **Cuenta de administrador**: `cn=admin,dc=example,dc=com`
- **Contraseña de administrador**

Si no se pidió la configuración, se puede reconfigurar con:
```bash
sudo dpkg-reconfigure ldap-auth-config
```

### 2. Configurar NSSwitch
Editar el archivo `/etc/nsswitch.conf` y asegurarse de que tenga las siguientes líneas:
```bash
passwd: files systemd ldap
group: files systemd ldap
shadow: files ldap
```

### 3. Configurar PAM para Autenticación LDAP
```bash
sudo auth-client-config -t nss -p lac_ldap
```

### 4. Reiniciar Servicios
```bash
sudo systemctl restart nscd
sudo systemctl restart nslcd
```

### 5. Verificar Conexión al Servidor LDAP
```bash
getent passwd | grep clockwork
```

---

## Conectar al Servidor LDAP como `clockwork`

Para iniciar sesión como el usuario LDAP `clockwork`, ejecutar:
```bash
su - clockwork
```
Si la autenticación es correcta, se ingresará a la sesión del usuario.

Para probar el acceso desde un cliente LDAP:
```bash
ssh clockwork@nombre-del-servidor
```

Si se requiere autenticación con contraseña encriptada, se puede modificar el usuario con:
```bash
ldappasswd -x -D "cn=admin,dc=example,dc=com" -W -S "uid=clockwork,ou=People,dc=example,dc=com"
```

---

## Pruebas y Depuración
- Para probar la autenticación:
  ```bash
  su - clockwork
  ```
- Para verificar la consulta LDAP:
  ```bash
  ldapsearch -x -LLL -H ldap://ip-del-servidor -b dc=example,dc=com uid=clockwork
  ```
- Para depuración, revisar logs:
  ```bash
  sudo journalctl -xe | grep slapd
  ```
