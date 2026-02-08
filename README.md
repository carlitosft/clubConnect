# 🏆 ClubConnect

ClubConnect es un proyecto web desarrollado con **PHP + MySQL**, pensado como sistema de conexión/gestión para un club.

Incluye:

- Registro e inicio de sesión de usuarios
- Conexión con base de datos MySQL
- Interfaz web con HTML + CSS
- Soporte para subida de archivos (`uploads/`)
- Base de datos incluida en formato `.sql`

---

# 📦 Requisitos

Para ejecutar este proyecto necesitás:

✅ PHP 8.x  
✅ MySQL o MariaDB  
✅ Apache Server  
✅ Navegador Web  

La forma más fácil de tener todo esto en Windows es usando **XAMPP**.

---

# 🚀 Instalación y ejecución con XAMPP (Windows)

---

## ✅ Paso 1: Descargar e instalar XAMPP

1. Descargá XAMPP desde la página oficial:

https://www.apachefriends.org/

2. Instalalo normalmente.

3. Abrí el **Panel de Control de XAMPP**.

4. Activá estos módulos:

- ✅ Apache  
- ✅ MySQL  

---

## ✅ Paso 2: Descargar el proyecto desde GitHub

Podés clonarlo con Git:

```bash
git clone https://github.com/TU-USUARIO/ClubConnect.git
O también descargarlo como ZIP desde GitHub y extraerlo

## ✅ Paso 3: Copiar el proyecto dentro de htdocs
Mové la carpeta del proyecto a:
C:\xampp\htdocs\
Ejemplo:
C:\xampp\htdocs\clubConnect\

✅ Paso 4: Importar la base de datos
El repositorio incluye un archivo .sql exportado desde phpMyAdmin.

Abrí phpMyAdmin en el navegador:
http://localhost/phpmyadmin

Creá una nueva base de datos llamada:
clubconnect
Entrá a esa base de datos → pestaña Importar
Seleccioná el archivo:
clubconnect.sql

Click en Continuar
✅ Base de datos cargada correctamente.

✅ Paso 5: Configurar la conexión a la base de datos
Buscá el archivo:
php/db.php

Asegurate de que tenga los datos correctos para XAMPP:
$host = "localhost";
$user = "root";
$password = "";
$dbname = "clubconnect";

📌 En XAMPP por defecto el usuario es root y no tiene contraseña.

✅ Paso 6: Abrir el proyecto en el navegador
Una vez que Apache y MySQL estén activos, entrá a:
http://localhost/clubConnect/html/index.html

🎉 Proyecto funcionando correctamente.
----------------------------------------------
📁 Estructura del proyecto
clubConnect/
│
├── css/        → estilos
├── html/       → páginas principales
├── php/        → lógica del sistema y conexión DB
├── uploads/    → archivos subidos por usuarios

👤 Autor

Proyecto desarrollado por Carlos Martin
📍 Uruguay
💻 UTU - Informática

⭐ Nota

Si este proyecto te resulta útil, podés dejar una estrella en GitHub ⭐
