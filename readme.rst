# Aplicación de Registro de Eventos

## Descripción

Esta es una aplicación web simple que permite a los usuarios listar, registrar, editar y eliminar eventos. Los eventos tienen un título, descripción, fecha de inicio y fecha de fin.

## Requisitos

- PHP 5.6 o superior
- MySQL
- Apache con mod_rewrite habilitado
- CodeIgniter v3

## Instalación

1. Clona el repositorio:

    ```bash
    git clone https://github.com/tu-usuario/tu-repositorio.git
    ```

2. Configura tu servidor web para que apunte al directorio del proyecto.
3. Crea una base de datos MySQL llamada `event_manager` y ejecuta el script SQL `event_manager.sql` proporcionado.
4. Configura la conexión a la base de datos en `application/config/database.php`.

    ```php
    $db['default'] = array(
        'dsn'   => '',
        'hostname' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'event_manager',
        'dbdriver' => 'mysqli',
        'dbprefix' => '',
        'pconnect' => FALSE,
        'db_debug' => (ENVIRONMENT !== 'production'),
        'cache_on' => FALSE,
        'cachedir' => '',
        'char_set' => 'utf8',
        'dbcollat' => 'utf8_general_ci',
        'swap_pre' => '',
        'encrypt' => FALSE,
        'compress' => FALSE,
        'stricton' => FALSE,
        'failover' => array(),
        'save_queries' => TRUE
    );
    ```

5. Accede a la aplicación a través de tu navegador web.

## Uso

- Página de inicio: muestra una lista de eventos registrados y un enlace para agregar nuevos eventos.
- Agregar evento: formulario para ingresar el título, descripción, fecha y hora de inicio, y fecha y hora de fin del evento.
- Editar evento: formulario para editar el título, descripción, fecha y hora de inicio, y fecha y hora de fin del evento.
- Eliminar evento: elimina el evento seleccionado.

## Características adicionales

- Eliminación de eventos.
- Paginación de la lista de eventos (opcional).

## Licencia

MIT

rutas: 

application/
    config/
        config.php
        database.php
    controllers/
        Events.php
    models/
        Event_model.php
    views/
        events/
            index.php
          
assets/
    css/
    js/
        script.js
system/
index.php
.htaccess

