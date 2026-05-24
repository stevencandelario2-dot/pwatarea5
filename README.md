# Sistema de Biblioteca Online - Tarea 5

Proyecto desarrollado como parte de la formación académica en la Universidad Bolivariana del Ecuador (UBE). Este sistema permite la gestión automatizada de una biblioteca mediante el uso de roles de usuario y control de inventario.

## Funcionalidades Principales

El sistema está estructurado con tres roles de usuario distintos para asegurar la seguridad y jerarquía de la información:

* **Administrador (Admin):**
    - Gestión de usuarios y asignación de roles.
    - Supervisión total del sistema.
* **Bibliotecario (Librarian):**
    - Gestión del catálogo de libros (Agregar nuevos ejemplares).
    - Control de existencias (Stock).
* **Lector (Reader):**
    - Visualización del catálogo de libros disponibles.
    - Solicitud de préstamos (se actualiza el inventario automáticamente).

## Tecnologías Utilizadas

- **Frontend:** HTML5, CSS3, Bootstrap 5.
- **Backend:** PHP 8.
- **Base de Datos:** MySQL.
- **Servidor Local:** XAMPP (Apache).

## Instrucciones de Instalación

1. Clona este repositorio en tu servidor local (carpeta `htdocs` de XAMPP).
2. Importa el archivo SQL de la base de datos (biblioteca_ube.sql) en tu phpMyAdmin.
3. Asegúrate de que las credenciales de conexión en `includes/db.php` coincidan con tu configuración local.
4. Accede desde tu navegador a `http://localhost/pwatarea5/index.php`.

---
*Desarrollado por: Steven Guillermo Candelario Arana*