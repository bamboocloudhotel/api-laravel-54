# RestAPI Aplicación

 Nota: Se inplemento Laravel 5.4 para compatibilidad con PHP 5.6
 
1. Instalar dependencias `composer install`
2. Copiar archvo de configuración `cp .env.example .env`
3. Definir base de datos. Modificar en el archivo `.env`
```dotenv
   DB_CONNECTION=MySQL
   DB_HOST=127.0.0.1 
   DB_PORT=3306
   DB_DATABASE=api-laravel-54
   DB_USERNAME=homestead
   DB_PASSWORD=secret
```
4. Crear tablas `php artisan migrate`

# Rest API Aplicación Reservas por Central de Reservas
Agregar las siguientes columnas a la tabla `reserva` de Bamboo (o ejecutar sh install en la carpeta hotel5):
```sql
ALTER TABLE reserva ADD metadata LONGTEXT NULL COMMENT 'Data original de la reserva en linea' AFTER firma;
ALTER TABLE reserva ADD confirmationid VARCHAR(100) NULL COMMENT 'Id para la confirmacion de la reserva en linea' AFTER metadata;
ALTER TABLE reserva ADD guarantee LONGTEXT NULL COMMENT 'Garantia de la reserva en linea' AFTER confirmationid;
ALTER TABLE reserva ADD booker LONGTEXT NULL COMMENT 'Informacion del booker de la reserva en linea' AFTER guarantee;
ALTER TABLE reserva ADD onlinecomment LONGTEXT NULL COMMENT 'Comentario de la reserva en linea' AFTER booker;
ALTER TABLE reserva ADD cancellationid VARCHAR(100) NULL COMMENT 'Id para la cancelación de la reserva en linea' AFTER onlinecomment;
```

### Configuración Bamboo

Configurar en Bamboo los datos del WebService en `hotel5\app\clases\ReservationsChannel.php`. *Ejemplo*:

```php
public function __construct()
{
    $this->apiUrl = 'http://api-laravel-54.test'; // URL de esta aplicación
    $this->hotelId = '20915'; // Id del hotel en el PMS
    $this->hotelName = '20915'; // Nombre del hotel en el PMS
    $this->bookingEngineCode = 'cm_reservas'; // Código del PMS 'cm-reservas'
}
```

### RateGain
Configarar la instancia de bamboo en 
http://ip-servidor/api-laravel-54/public/index.php/rategain-bamboo-instances

## Comandos

**Obtener Reservas:**

`php artisan cr:get_reservations cm_reservas`

Obtiene las reservas generadas en los canales de reservas y las almacena en bamboo.

**Actuaizar inventario:**

`php artisan cr:put_inventory 2020-03-15 2020-03-18 1 rategain parque93`

Actualiza el inventario en el canal de reservas desde una fecha inicial hasta una fecha final por el código de la clase de habitación (codcla) y codigo del hotel

## Tareas programadas
Configurar la tarea programada (cronjob):

`* * * * * php /ruta-a-este-proyecto/artisan schedule:run >> /dev/null 2>&1`

Esto ejecutara los trabajos programados. [Ver Documentación Laravel: Task Scheduling](https://laravel.com/docs/5.4/scheduling#introduction)


## Freeradius

### Obtener usuario freeradius

`GET` http://server/api/radius/users/{username}

#### Request (ejemplo)

```json
{
	"host": "172.16.32.133",
	"database": "radius"
}
```

#### Response  (ejemplo)

```json
{
    "message": "OK",
    "data": {
        "id": 18,
        "username": "username",
        "attribute": "User-Password",
        "op": "==",
        "value": "12345"
    }
}
```


### Crear usuarios freeradius

`POST` http://server/api/radius/users

#### Request (ejemplo)

```json
{
	"host": "172.16.32.133",
	"database": "radius",
	"username": "someuser",
	"value": "12345"
}
```

#### Response  (ejemplo)

```json
{
    "message": "OK",
    "data": {
        "username": "someuser",
        "attribute": "User-Password",
        "value": "12345",
        "id": 18
    }
}
```

### Eliminar usuarios freeradius

`DELETE` http://server/api/radius/users/{username}

#### Request (ejemplo)

```json
{
	"host": "172.16.32.133",
	"database": "radius"
}
```

#### Response  (ejemplo)

```json
{
    "message": "Usuario eliminado!"
}
```
>>>>>>> d5b69917dc5a0240b196228681584043e67fcb05
