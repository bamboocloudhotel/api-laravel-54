# RestAPI Aplicación
﻿
1. instalar dependencias `composer install`
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
Agregar el campo `metadata` a la tabla `reserva`
```sql
ALTER TABLE reserva ADD metadata LONGTEXT NULL;
```
Agregar el campo `valornoche` a la tabla `plares`
```sql
ALTER TABLE plares ADD valornoche INTEGER NULL;
```

Configurar la conexión `hhotel5` en `config/database.php` apuntando a la base de datos de bamboo. *Ejemplo*:
```php
'hhotel5' => [
    'driver' => 'mysql',
    'host' => '192.168.0.17',
    'port' => '3306',
    'database' => 'hhotel5',
    'username' => 'root',
    'password' => 'hea101',
    'unix_socket' => env('DB_SOCKET', ''),
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix' => '',
    'strict' => true,
    'engine' => null,
],
```

### Rate Gain

Configurar en Bamboo los datos del WebService en `hotel5\app\clases\ReservationsChannel.php`. *Ejemplo*:

```php
public function __construct()
{
    $this->apiUrl = 'http://api-laravel-54.test'; // URL de esta aplicación
    $this->hotelId = '20915'; // Id del hotel en el PMS
    $this->hotelName = '20915'; // Nombre del hotel en el PMS
    $this->bookingEngineCode = 'rategain'; // Código del PMS 'cm-reservas', 'rategain'
}
```

Configurar los datos del WebService RateGain en `config/rategain.php`. *Ejemplo*:
```php
return [
    'url' => 'https://rzhospicert.rategain.com/rgbridgeapi/ari/receive',
    'auth' => 'Authorization: Basic dXNlcm5hbWU6cGFzc3dvcmQ=',
    'username' => 'some@email.com',
    'password' => 'secret',
    'hotelCode' => 20915,
    'rooms_cl' => [ // channel to local
        'SGL' => '12',
        'DBL' => '13',
    ],
    'rooms_lc' => [ // local to channel
        '12' => 'SGL',
        '13' => 'DBL',
    ],
    'paymentType' => '15',
    'warrantyType' => '2',
    'programType' => '7',
    'codpla' => 728,
    'tipres' => '2',
];
```

## Comandos

**Obtener Reservas:**

`php artisan cr:get_reservations rategain`

Obtiene las reservas generadas en los canales de reservas y las almacena en bamboo.

**Actuaizar inventario**

`php artisan cr:put_inventory 2020-03-15 2020-03-18 1 rategain`

Actualiza el inventario en el canal de reservas desde una fecha inicial hasta una fecha final por el código de la clase de habitación (codcla)

## Tareas programadas
Configurar la tarea programada (cronjob):

`* * * * * php /ruta-a-este-proyecto/artisan schedule:run >> /dev/null 2>&1`

Esto ejecutara los trabajos programados. [Ver Documentación Laravel: Task Scheduling](https://laravel.com/docs/5.4/scheduling#introduction)
