# hit-counter
Contador de visitas según IP con REDIS y MySQL

1. Instalamos un servidor LAMP en la máquina que queremos alojar el contador de visitas.
2. En la carpeta donde tengas el servidor apache (es parte del LAMP, normalmente en /etc/www/html), deberemos añadir los ficheros de este github.
3. Ahora crear una base de datos MySQL para el ejercicio. Crearemos una tabla que alojará los datos del contador. La tabla deberá tener una clave primaria ID autoincremental, un campo de ip varchar y un último campo int que sea total_visitas. Recordar los datos para acceder a la base de datos.
4. Para acceder a la web, tendrás que poner la IP de la máquina con el LAMP, seguido del nombre del archivo que quieras ver.
