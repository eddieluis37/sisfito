## Documentación de la aplicación sisfito basada RentCarApp:

Sisfito es una aplicación basada en la app RentCar App de gestión de alquiler de coches muy sencilla, en la cual existen clientes que quieren alquilar un coche por un tiempo determinado, existen dos roles dentro de la aplicación, el rol de admin que se encarga de gestionar los usuarios que pueden usar la aplicación y el rol de comercial, que se encarga realizar el registro del alquiler de coche.
Se hizo con el objetivo de probar la versión 5.1 de laravel y que las personas que estan comenzando puedan guiarse en lo que haga falta con esta aplicación. 

Librerias usadas:
- `Pinpong Modules` para separar la aplicación por módulos: (https://sky.pingpong-labs.com/docs/2.1/modules).
- `Entrust` para el módulo de autenticación: (https://github.com/Zizaco/entrust).
- `Laravel-Dompdf` para los reportes en pdf: (https://github.com/barryvdh/laravel-dompdf).
- `Framework Bootstrap` para el frontend de la aplicación.

Instalación: 
Descargar o clonar el proyecto, crear el archivo `".env"` y poner información necesaria sobre la base de datos, por último teclear el comando `"php artisan app:install"` dentro de la carpeta del proyecto para realizar las migraciones de la base de datos.

```
Acceso al Sistema:
Role Admin:
email: admin@demo.com
password: admin123

Role Seccional:
email: comercial@demo.com
password: comercial123
```

