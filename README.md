# MySuperMarket

## Descripción del proyecto y objetivo

MySuperMarket es una aplicación web para la gestión de ventas, existencias, proveedores, órdenes y usuarios en un supermercado. El objetivo es facilitar el control y administración de los procesos internos, permitiendo registrar ventas, gestionar inventario, controlar proveedores y usuarios, y visualizar estadísticas de manera sencilla y eficiente.

## Instrucciones de instalación y ejecución

1. **Requisitos previos**
   - PHP 7.4 o superior
   - Servidor web (Apache recomendado), opcional crear un host con php -s localhost:8000 y en la ruta del navegador ingresar.
   - MySQL o MariaDB
   - Workbrenh o cualquier gestor de base de datos.

2. **Instalación**
   - Clona o descarga este repositorio en tu servidor local, link del repositorio anclado en la act.
   - Descargar y crear la db en el gestor de base de datos.
   - Configura la base de datos y actualiza los datos de conexión en `app/config.php`.
   - Asegúrate de que la carpeta `public/` sea accesible desde el navegador.

3. **Ejecución**
   - Inicia tu servidor web y accede a la URL donde está alojado el proyecto.
   - El sistema inicia en la pantalla de inicio de sesión.

## Estructura de archivos

- `app/`
  - `app.php`, `config.php`: Archivos principales de configuración y arranque.
  - `classes/`: Clases base del framework (Autoloader, DB, Router, View).
  - `controllers/`: Controladores de la lógica de negocio.
    - `auth/`: Controladores de autenticación (registro, sesión).
  - `models/`: Modelos de datos.
  - `public/`: Archivos públicos (index, assets como CSS, JS, imágenes).
  - `resources/`: Recursos de la aplicación.
    - `functions/`: Funciones auxiliares.
    - `layouts/`: Plantillas reutilizables (header, footer).
    - `Modales/`: Vistas de modales.
    - `views/`: Vistas principales de la aplicación.
