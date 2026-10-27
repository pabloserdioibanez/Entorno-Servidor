## 1. Ubicación del fichero php.ini
La ruta exacta del archivo php.ini depende de cómo tengas montado tu entorno de desarrollo (XAMPP, Docker, o instalación nativa en Ubuntu/Debian).
    En mi caso a traves de phpinfo() lo he localizado en: C:\laragon\bin\php\php-8.3.33-Win32-vs16-x64\php.ini

## 2. Principales directivas de configuración en php.ini
El archivo php.ini controla el comportamiento general de PHP. Estas son las directivas fundamentales que más se modifican al desarrollar aplicaciones web:

   ### Manejo y visualización de errores    
   - *display_errors*: *(Valores: On / Off)* Determina si los errores de PHP se muestran por pantalla en el navegador.
    - *error_reporting*: Define qué nivel de errores se notifican. Lo habitual en desarrollo es E_ALL (muestra todos los errores, advertencias y avisos).


    ### Límites de recursos y rendimiento
    - memory_limit: *(Ej: 128M, 256M)*. Establece la cantidad máxima de memoria RAM que un script de PHP puede consumir. Evita que un script mal programado bloquee el servidor.

    - max_execution_time: *(Ej: 30, 60)*. Fija el tiempo máximo en segundos que puede tardar en ejecutarse un script antes de que el servidor lo detenga.

    ### Subida de archivos (Uploads y Formularios)
    - file_uploads: *(Valores: On / Off)*. Habilita o deshabilita la capacidad de subir archivos al servidor mediante PHP.

    - upload_max_filesize: *(Ej: 2M, 20M)*. El tamaño máximo permitido para un único archivo subido.

    - post_max_size: *(Ej: 8M, 40M)*. El tamaño máximo de todos los datos enviados a través de un formulario (método POST). 
    __Importante: Debe ser siempre mayor que upload_max_filesize.__

    ### Fechas y Zonas Horarias
    - date.timezone: *(Ej: Europe/Madrid)*. Define la zona horaria por defecto para todas las funciones de fecha y hora. Si no se configura, funciones como date() pueden devolver horas incorrectas.