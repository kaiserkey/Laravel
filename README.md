# Laravel Principios, Instalacion y Comandos


Laravel es un popular framework de desarrollo web PHP que sigue los principios de MVC (Modelo Vista Controlador) y está diseñado para facilitar el desarrollo rápido y eficiente de aplicaciones web.

## Principios de Laravel

**MVC (Modelo Vista Controlador)**: Laravel sigue el patrón de diseño MVC, lo que significa que separa la lógica de negocio, la presentación y la interacción con la base de datos.

**Routing (Enrutamiento)**: Laravel proporciona un enrutador simple y expresivo que permite definir rutas para su aplicación de manera clara y comprensible.

**Eloquent ORM**: Eloquent es el ORM (Object-Relational Mapping) de Laravel, que simplifica la interacción con la base de datos al permitirte trabajar con objetos de base de datos y relaciones.

**Blade Templating Engine**: Blade es el motor de plantillas de Laravel que te permite escribir código PHP dentro de tus vistas de manera muy limpia y expresiva.

**Middleware**: Laravel utiliza middleware para filtrar las solicitudes HTTP que ingresan en tu aplicación. Esto es útil para la autenticación, la autorización y otras tareas relacionadas con la solicitud HTTP.

**Eloquent Relationships**: Laravel ofrece una manera sencilla y poderosa de definir y trabajar con relaciones entre modelos.


## Instalación de Laravel

Para instalar Laravel, necesitarás Composer, un administrador de paquetes para PHP. Una vez que tengas Composer instalado.

<a href="https://getcomposer.org/" target="_blank">https://getcomposer.org/</a>

Instalar laravel de manera global:

```powershell
composer global require laravel/installer
```

Una vez seguidos estos pasos ya debes tener disponible el instalador de Laravel lo cual te permitirá crear un nuevo proyecto de Laravel ejecutando -desde cualquier directorio- el comando:

```powershell
laravel new nombre-proyecto
```

Al crear un nuevo proyecto de laravel el instalador te dara tres opciones a elegir para el kit de inicio:  

**No starter kit**: Esta opción instalará Laravel sin ningún kit de inicio adicional. Obtendrás una instalación básica de Laravel sin autenticación integrada ni funcionalidades específicas de frontend.

**Laravel Breeze**: es un kit de inicio mínimo para Laravel que proporciona autenticación básica con Laravel's Blade y Vue.js. Es una excelente opción si estás buscando una manera rápida y sencilla de agregar autenticación a tu aplicación Laravel sin la sobrecarga de características adicionales.

**Laravel Jetstream**: es un kit de inicio más completo que proporciona una autenticación de usuario robusta y un conjunto completo de características de frontend. Jetstream utiliza Livewire y Tailwind CSS como pilares principales. Livewire permite construir aplicaciones de una sola página (SPA) de manera más rápida y eficiente, mientras que Tailwind CSS ofrece una flexibilidad significativa en el diseño de la interfaz de usuario.


### MVC (Model-View-Controller)

El patrón de diseño Modelo-Vista-Controlador (MVC) es un enfoque arquitectónico que separa una aplicación en tres componentes principales: Modelo, Vista y Controlador. Laravel sigue este patrón de diseño de manera natural y proporciona una implementación robusta de MVC.


El patrón de diseño Modelo-Vista-Controlador (MVC) es un enfoque arquitectónico que separa una aplicación en tres componentes principales: Modelo, Vista y Controlador. Laravel sigue este patrón de diseño de manera natural y proporciona una implementación robusta de MVC. Aquí tienes una explicación detallada y en profundidad de MVC en Laravel:

1. **Modelo (Model)**: El modelo representa los datos y la lógica de negocio de la aplicación. En Laravel, los modelos son clases PHP que interactúan con la base de datos utilizando Eloquent ORM. Cada modelo está asociado a una tabla en la base de datos y define métodos para acceder y manipular los datos. Aquí tienes un ejemplo de un modelo en Laravel:

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
}
```

2. **Vista (View)**: La vista es la capa de presentación de la aplicación que se encarga de mostrar la interfaz de usuario al usuario final. En Laravel, las vistas son archivos blade almacenados en el directorio resources/views. Las vistas pueden contener HTML, CSS, JavaScript y código PHP para mostrar dinámicamente los datos. Aquí tienes un ejemplo de una vista en Laravel:

```php
<!-- resources/views/welcome.blade.php -->

<html>
    <body>
        <h1>{{ $title }}</h1>
        <p>{{ $message }}</p>
    </body>
</html>
```

3. **Controlador (Controller)**: El controlador actúa como intermediario entre el modelo y la vista. Se encarga de procesar las solicitudes del usuario, interactuar con el modelo para recuperar o modificar los datos y devolver la respuesta adecuada a través de una vista. En Laravel, los controladores son clases PHP almacenadas en el directorio app/Http/Controllers. Cada método en un controlador representa una acción del usuario. Aquí tienes un ejemplo de un controlador en Laravel:
```php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', ['user' => $user]);
    }
}
```


4. **Rutas (Routes)**: Las rutas en Laravel definen cómo se responden las solicitudes HTTP entrantes. El archivo de rutas principal se encuentra en routes/web.php y routes/api.php. En Laravel, puedes asignar controladores a rutas utilizando la sintaxis de closures o utilizando el método Route::resource() para generar rutas RESTful. Aquí tienes un ejemplo de cómo definir rutas en Laravel:
```php
use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
```

5. **Flujo de Trabajo**: Cuando un usuario realiza una solicitud HTTP, Laravel enrutará la solicitud a la acción correspondiente en el controlador. El controlador interactuará con el modelo para recuperar o modificar los datos según sea necesario. Luego, el controlador pasará los datos a una vista y devolverá la respuesta al usuario final.

**Ventajas de MVC en Laravel**
- **Separación de Responsabilidades**: MVC divide la aplicación en componentes separados, lo que facilita la organización y el mantenimiento del código.

- **Reutilización de Código**: Los modelos y controladores pueden reutilizarse en diferentes partes de la aplicación.

- **Facilidad de Pruebas**: Al separar la lógica de negocio de la presentación, las pruebas unitarias y de integración se vuelven más fáciles de escribir y mantener.

### Routing (Enrutamiento)

El enrutamiento (routing) en Laravel es el proceso de definir cómo responde la aplicación a una solicitud HTTP particular. Laravel proporciona una forma elegante y expresiva de definir rutas utilizando una sintaxis clara y concisa.

**Definición de Rutas**
En Laravel, las rutas se definen en el archivo routes/web.php (para rutas web) o routes/api.php (para rutas API). Puedes definir rutas utilizando el método Route::verb() donde "verb" es uno de los métodos HTTP como GET, POST, PUT, DELETE, etc.

**Ejemplo de definición de ruta básica:**
```php
Route::get('/', function () {
    return '¡Hola, mundo!';
});
```

**Parámetros de Ruta**
Puedes definir rutas con parámetros utilizando llaves {} en la definición de ruta. Estos parámetros serán pasados a la función de callback o al controlador.

```php
Route::get('/usuario/{id}', function ($id) {
    return 'ID del usuario: ' . $id;
});
```

**Nombre de Ruta**
Puedes asignar un nombre a una ruta para facilitar la generación de URLs en tu aplicación.
```php
Route::get('/perfil', function () {
    //
})->name('perfil');
```

**Agrupamiento de Rutas**
Puedes agrupar rutas para aplicar middleware, prefijos de URL o nombres de espacio de controlador comunes.
```php
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        // ...
    });
    Route::get('/usuarios', function () {
        // ...
    });
});
```

**Rutas con Controladores**
Es una buena práctica utilizar controladores para manejar la lógica de las rutas. Puedes asignar rutas a métodos de controlador utilizando la sintaxis Route::get('uri', 'Controller@method').

```php
Route::get('/usuarios', 'UserController@index');
```

**Middleware**
El middleware se puede aplicar a rutas para filtrar las solicitudes HTTP antes de que lleguen al controlador. Puedes asignar middleware a rutas utilizando el método middleware().
```php
Route::get('/perfil', 'ProfileController@index')->middleware('auth');
```

**Rutas API**
En el archivo routes/api.php, puedes definir rutas para tu API. Estas rutas se utilizan comúnmente para servir JSON o XML y generalmente están destinadas a ser consumidas por aplicaciones cliente o dispositivos móviles.

```php
Route::get('/usuarios', 'UserController@index');
```

**Rutas de Fallback**
Puedes definir una ruta de fallback que se ejecutará si ninguna otra ruta coincide con la solicitud. Esto es útil para manejar errores 404 o redirigir a una página de inicio.

```php
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
```

**Rutas con Prefijos de Idioma**
Si necesitas definir rutas para múltiples idiomas, puedes utilizar prefijos de idioma.
```php
Route::prefix('{locale}')->group(function () {
    Route::get('/usuarios', 'UserController@index');
});
```
**Generación de URLs**
Laravel proporciona varios métodos para generar URLs, incluyendo el método url(), route(), y action(), que facilitan la generación de enlaces en tus vistas y controladores.

Laravel Artisan proporciona comandos útiles para generar rutas basadas en los modelos de tu aplicación.

1. **php artisan route:list**: Este comando lista todas las rutas registradas en tu aplicación, incluidas las rutas generadas por los controladores de recursos.
2. **php artisan route:model {model}**: Este comando genera automáticamente las rutas RESTful para un modelo específico. Requiere que tengas controladores de recursos definidos para el modelo. Por ejemplo, si tienes un modelo Post, ejecutarías:
```powershell
php artisan route:model Post
```
Esto generará las rutas RESTful comunes para el modelo Post.

3. **php artisan route:clear**: Este comando limpia la caché de rutas de tu aplicación. Si has realizado cambios en tus rutas y no se están reflejando, puedes ejecutar este comando para borrar la caché y forzar a Laravel a recargar las rutas.

4. **php artisan route:cache**: Este comando crea una caché de las rutas de tu aplicación. Es útil en entornos de producción para acelerar el tiempo de carga de las rutas. Sin embargo, ten en cuenta que si realizas cambios en tus rutas después de ejecutar este comando, necesitarás borrar la caché de las rutas utilizando php artisan route:clear.

### Blade Templating Engine (Motor de Plantillas Blade)

Blade es el motor de plantillas predeterminado en Laravel, diseñado para simplificar la escritura de vistas en tus aplicaciones web. Proporciona una sintaxis limpia y expresiva para trabajar con HTML y PHP en tus archivos de vista.

1. **Sintaxis de Blade**: Blade utiliza una sintaxis sencilla y legible que combina HTML y PHP de manera intuitiva.

- **Directivas Blade**: Las directivas Blade comienzan con @ y te permiten incluir lógica PHP directamente en tus vistas. Por ejemplo, @if, @foreach, @else, @endif, etc.

- **{{ }}**: Blade utiliza dobles llaves para imprimir contenido en la vista. Por ejemplo, {{ $variable }} imprimirá el valor de la variable en esa posición.

- **{{-- --}}**: Se utilizan para comentarios que no serán incluidos en el código HTML generado.

- **{{ !! !! }}**: Se utilizan para imprimir contenido HTML sin escapar. Es útil cuando necesitas imprimir HTML de forma segura.

2. **Extender Plantillas y Secciones**: Blade facilita la creación de plantillas maestras y la extensión de ellas. Puedes definir una plantilla maestra con secciones que luego puedes rellenar desde otras vistas.

- **@extends('layout')**: Extiende una plantilla maestra llamada 'layout'.

- **@section('content')**: Define una sección llamada 'content' en la plantilla maestra.

- **@yield('content')**: Indica dónde se debe incluir el contenido de la sección 'content' en la plantilla maestra.

3. **Incluir y Anidar Plantillas**: Blade te permite incluir otras vistas en una vista específica o anidar plantillas para reutilizar código.

- **@include('header')**: Incluye la vista 'header' en la vista actual.

- **@includeWhen($condition, 'header')**: Incluye la vista 'header' solo si se cumple la condición.

4. **Variables y Expresiones**: Puedes trabajar con variables y expresiones en Blade de manera similar a PHP, pero con una sintaxis más clara y legible.

- **{{ $variable }}**: Imprime el contenido de una variable.

- **{{ $variable ?? 'default' }}**: Imprime el contenido de una variable si está definida, de lo contrario, imprime 'default'.

- **{{ 'La suma es: ' . ($a + $b) }}**: Realiza operaciones y concatena cadenas dentro de las llaves Blade.

5. **Directivas de Control**: Blade proporciona varias directivas de control que simplifican la escritura de código PHP en tus vistas.

- **@if, @else, @elseif, @endif**: Para estructuras condicionales.

- **@foreach, @forelse, @empty, @endforelse**: Para bucles foreach.

- **@while, @endwhile**: Para bucles while.

- **@switch, @case, @break, @default, @endswitch**: Para estructuras de control switch.

6. **Componentes de Blade**: Los componentes de Blade permiten encapsular fragmentos de HTML y lógica de PHP en componentes reutilizables.

- **@component('alert')**: Define un nuevo componente llamado 'alert'.

- **@slot('title')**: Define una ranura ('slot') dentro del componente.

- **@endcomponent**: Finaliza la definición del componente.

7. **Escapado Automático de HTML**: Blade escapa automáticamente el HTML generado para prevenir ataques XSS, asegurando que los datos del usuario se muestren de forma segura.

8. **Compilación de Plantillas**: Las plantillas Blade se compilan en código PHP plano para mejorar el rendimiento de tu aplicación.

### Eloquent es el ORM (Mapeo Objeto-Relacional)
Eloquent es el ORM (Mapeo Objeto-Relacional) incluido en Laravel, que simplifica enormemente la interacción con la base de datos utilizando una sintaxis limpia y expresiva basada en objetos. 

1. **Definición de Modelos**: En Eloquent, cada tabla de la base de datos está representada por un modelo de Eloquent. Los modelos de Eloquent son clases PHP que extienden la clase Illuminate\Database\Eloquent\Model. Cada modelo corresponde a una tabla en la base de datos y define la estructura y las relaciones de esa tabla.

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // ...
}
```

2. **Configuración de la Tabla**: Por convención, Eloquent asume que el nombre de la tabla en la base de datos es el nombre en plural de la clase modelo (en este caso, users). Sin embargo, puedes especificar manualmente el nombre de la tabla utilizando la propiedad $table en el modelo.

```php
protected $table = 'usuarios';
```

3. **Consultas Básicas**: Eloquent proporciona una variedad de métodos para realizar consultas básicas en la base de datos.

**Obtener todos los registros**:
```php
$users = User::all();
```

**Obtener un solo registro por ID**:
```php
$user = User::find(1);
```

**Obtener el primer registro que coincida con las condiciones**:
```php
$user = User::where('name', 'John')->first();
```

4. **Crear, Actualizar y Eliminar Registros**: Eloquent también facilita la creación, actualización y eliminación de registros en la base de datos.

**Crear un nuevo registro**:
```php
$user = new User;
$user->name = 'John';
$user->email = 'john@example.com';
$user->save();
```

**Actualizar un registro existente**:
```php
$user = User::find(1);
$user->name = 'Jane';
$user->save();
```

**Eliminar un registro**:
```php
$user = User::find(1);
$user->delete();
```

### Relaciones entre Modelos

Eloquent permite definir relaciones entre modelos, como uno a uno, uno a muchos y muchos a muchos.

**Uno a Uno**: 
```php
class User extends Model
{
    public function phone()
    {
        return $this->hasOne(Phone::class);
    }
}
```

**Uno a Muchos**:
```php
class Post extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
```

**Muchos a Muchos**:
```php
class User extends Model
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
```


6. **Consultas Avanzadas**: Eloquent proporciona métodos para realizar consultas más complejas, como agregaciones, ordenamientos y consultas anidadas.

**Agregaciones**:
```php
$count = User::where('active', true)->count();
```

**Ordenamiento**:
```php
$users = User::orderBy('name', 'asc')->get();
```

**Consultas Anidadas**:
```php
$users = User::whereHas('posts', function ($query) {
    $query->where('title', 'like', '%laravel%');
})->get();
```

En Eloquent ORM, puedes utilizar las transacciones para agrupar un conjunto de consultas de base de datos y confirmarlas o revertirlas en función de si todas las consultas tienen éxito o si se produce un error en alguna de ellas. Esto es especialmente útil cuando necesitas asegurarte de que todas las operaciones relacionadas con la base de datos se realicen correctamente o ninguna de ellas se realice en absoluto.

1. Iniciar una Transacción: Para iniciar una transacción en Eloquent, puedes usar el método beginTransaction() proporcionado por la conexión de la base de datos.

```php
DB::beginTransaction();
```

Este método inicia una transacción en la base de datos, lo que significa que todas las consultas posteriores a esta llamada se agruparán en la transacción hasta que se realice un commit o un rollback.

2. **Realizar Operaciones de Base de Datos**: Después de iniciar la transacción, puedes realizar operaciones de base de datos normales utilizando Eloquent o consultas SQL directas.

```php
try {
    // Realizar operaciones de base de datos (insertar, actualizar, eliminar, etc.)
} catch (Exception $e) {
    // Manejar excepciones si ocurre algún error
}
```

3. **Confirmar una Transacción (Commit)**: Si todas las operaciones se han realizado correctamente y deseas confirmar la transacción, puedes llamar al método commit().

```php
DB::commit();
```

Esto confirmará todas las operaciones realizadas en la transacción y las persistirá en la base de datos.

4. **Revertir una Transacción (Rollback)**: Si alguna operación dentro de la transacción falla o si deseas revertir todas las operaciones realizadas en la transacción por algún otro motivo, puedes llamar al método rollback().

```php
DB::rollback();
```

Esto revertirá todas las operaciones realizadas dentro de la transacción y restaurará la base de datos a su estado anterior a la transacción.

5. **Ejemplo Completo**: Aquí tienes un ejemplo completo de cómo utilizar beginTransaction(), commit() y rollback() en Eloquent ORM:

```php
use App\Models\User;
use Illuminate\Support\Facades\DB;

DB::beginTransaction();

try {
    // Realizar operaciones de base de datos
    $user = new User();
    $user->name = 'John Doe';
    $user->email = 'john@example.com';
    $user->save();
    
    // Otras operaciones...
    
    DB::commit();
} catch (Exception $e) {
    // Manejar excepciones si ocurre algún error
    DB::rollback();
}
```

### Middlewares

Los middlewares en Laravel son filtros que proporcionan una forma flexible y poderosa de procesar las solicitudes HTTP entrantes en tu aplicación. Permiten realizar tareas específicas antes o después de que la solicitud sea manejada por el controlador o enrutador principal.

1. **Funcionamiento de los Middlewares**: Cuando una solicitud HTTP llega a tu aplicación Laravel, pasa a través de una serie de middlewares antes de ser manejada por el controlador o enrutador principal. Los middlewares pueden realizar tareas como autenticación, verificación de permisos, registro de solicitudes, etc.

2. **Registro de Middlewares**: Los middlewares se registran en el archivo app/Http/Kernel.php. Aquí encontrarás dos propiedades importantes: $middleware y $routeMiddleware.

**$middleware**: Estos middlewares se ejecutan en cada solicitud HTTP que ingresa a tu aplicación. Incluyen middlewares globales como EncryptCookies, VerifyCsrfToken, etc.

**$routeMiddleware**: Estos son middlewares que puedes asignar a rutas específicas en tu aplicación. Cada middleware se asigna a un alias que puedes utilizar en las definiciones de ruta.

3. **Creación de Middlewares Personalizados**: Puedes crear tus propios middlewares personalizados en Laravel. Para ello, puedes usar el comando Artisan make:middleware.

```powershell
php artisan make:middleware CheckAge
```

Esto creará un nuevo middleware llamado CheckAge en el directorio app/Http/Middleware.

4. **Lógica de los Middlewares**: Los middlewares personalizados pueden contener cualquier lógica necesaria para procesar la solicitud entrante. Esto puede incluir autenticación, verificación de permisos, manipulación de la solicitud, etc.

```php
namespace App\Http\Middleware;

use Closure;

class CheckAge
{
    public function handle($request, Closure $next)
    {
        if ($request->age <= 18) {
            return redirect('home');
        }

        return $next($request);
    }
}
```

5. **Asignación de Middlewares a Rutas**: Puedes asignar middlewares a rutas específicas utilizando el método middleware() en la definición de ruta.

```php
Route::get('profile', function () {
    //
})->middleware('auth');
```

6. Parámetros de Middlewares: Los middlewares pueden aceptar parámetros adicionales. Puedes pasar estos parámetros al middleware utilizando dos puntos (:) en la definición de middleware.

```php
Route::get('profile', function () {
    //
})->middleware('role:admin');
```

7. **Grupos de Middlewares**: Puedes agrupar middlewares para aplicarlos a varias rutas a la vez utilizando el método middlewareGroup() en el archivo Kernel.php.

```php
protected $middlewareGroups = [
    'web' => [
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        // Otros middlewares...
    ],

    'api' => [
        'throttle:api',
        'auth:api',
        // Otros middlewares...
    ],
];
```

8. **Middleware Global vs Middleware de Ruta**: Los middlewares globales se aplican a todas las solicitudes entrantes, mientras que los middlewares de ruta se aplican solo a rutas específicas. Los middlewares globales son útiles para tareas como la autenticación de usuario en toda la aplicación, mientras que los middlewares de ruta son útiles para tareas específicas de una ruta determinada.

9. Ejemplo de Uso
```php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAge
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->age <= 18) {
            return redirect('home');
        }

        return $next($request);
    }
}
```


### Cheat Sheet Básico de Laravel

**Artisan Commands (Comandos Artisan)**:

**php artisan serve**:Inicia un servidor de desarrollo local para tu aplicación Laravel. Te permite acceder a tu aplicación en tu navegador web a través de una URL local (por defecto: http://localhost:8000).

**php artisan make:model NombreModelo**:Crea un nuevo modelo en tu aplicación Laravel en la ruta app/Models. Los modelos representan y gestionan los datos de tu aplicación.

**php artisan make:controller NombreControlador**:Crea un nuevo controlador en tu aplicación Laravel en la ruta app/Http/Controllers. Los controladores manejan la lógica de tu aplicación y gestionan las solicitudes HTTP.

**php artisan make:controller --resource**: crea controladores con métodos CRUD y las vistas correspondientes en la carpeta resources/views.

**php artisan make:migration nombre_de_migracion**:Crea una nueva migración de base de datos. Las migraciones te permiten modificar la estructura de tu base de datos de manera programática y reversible.

**php artisan migrate**:Ejecuta todas las migraciones pendientes en tu base de datos. Esto aplica los cambios definidos en las migraciones a tu base de datos.

**php artisan migrate:rollback**:Revierte la última migración ejecutada. Esto deshace el último conjunto de cambios aplicados a tu base de datos.

**php artisan tinker**:Inicia el REPL (Read-Eval-Print Loop) interactivo de Laravel. Te permite interactuar con tu aplicación y probar código PHP en tiempo real.

**Comandos adicionales**:

**php artisan make:seeder NombreDelSembrador**:Crea un nuevo seeder (sembrador de datos) en la ruta database/seeders. Los seeders se utilizan para poblar tu base de datos con datos de prueba.

**php artisan db:seed**:Ejecuta todos los seeders para poblar tu base de datos con datos de prueba.

**php artisan make:request NombreDeLaSolicitud**:Crea una nueva clase de solicitud en la ruta app/Http/Requests. Las solicitudes se utilizan para validar los datos de entrada del usuario.

**php artisan make:middleware NombreDelMiddleware**:Crea un nuevo middleware en la ruta app/Http/Middleware. Los middleware proporcionan una forma de filtrar las solicitudes HTTP entrantes de tu aplicación.

**php artisan make:command NombreDeLaTareaProgramada**:Crea una nueva tarea programada (command) en la ruta app/Console/Commands. Las tareas programadas se utilizan para ejecutar comandos programáticamente en intervalos regulares.

**php artisan key:generate**:Genera una nueva clave de aplicación. Esta clave se utiliza para cifrar los datos sensibles de tu aplicación.


### Comandos relacionados a livewire y artisan
**php artisan make:livewire NombreDelComponente**: Este comando crea un nuevo componente Livewire en tu aplicación Laravel. Los componentes Livewire son elementos de interfaz de usuario interactivos que pueden manejar eventos del lado del servidor sin necesidad de JavaScript.

**php artisan livewire:copy NombreDelComponente**: Copia un componente Livewire existente. Esto puede ser útil si deseas crear un componente similar a uno existente y realizar modificaciones en él.

**php artisan livewire:delete NombreDelComponente**: Elimina un componente Livewire existente de tu aplicación.

**php artisan livewire:move NombreDelComponente**: Mueve un componente Livewire de su ubicación actual a una nueva ubicación en tu aplicación.

**php artisan livewire:discover**: Este comando se utiliza para registrar componentes Livewire en la aplicación y permitir que Livewire los detecte automáticamente.

**php artisan livewire:publish --assets**: Publica los assets de Livewire. Esto incluye los archivos de JavaScript y CSS necesarios para el funcionamiento de Livewire.

**php artisan livewire:publish --config**: Publica el archivo de configuración de Livewire. Puedes usar esto para personalizar la configuración de Livewire en tu aplicación.


### Paquetes de Composer Mas Utiles en Laravel

**Laravel Debugbar**: Proporciona una barra de depuración que muestra información útil como consultas SQL, tiempos de ejecución, variables de entorno y mucho más durante el desarrollo.
```powershell
composer require barryvdh/laravel-debugbar
```


**Laravel Telescope**: Es una elegante herramienta de depuración e introspección para las aplicaciones Laravel. Proporciona información detallada sobre las solicitudes HTTP, trabajos de cola, eventos, excepciones y mucho más.
```powershell
composer require laravel/telescope
```


**Laravel Backup**: Permite realizar copias de seguridad de tu aplicación Laravel en diferentes servicios de almacenamiento, como S3, Dropbox, Google Drive, etc., de forma fácil y configurable.
```powershell
composer require spatie/laravel-backup
```

**Laravel Scout**: Facilita la búsqueda en tu aplicación utilizando motores de búsqueda como Algolia, Elasticsearch, etc. Proporciona una API sencilla y limpia para realizar búsquedas en tu modelo Eloquent.
```powershell
composer require laravel/scout
```

**Laravel Passport**: Es un paquete completo de autenticación API que permite a los desarrolladores de Laravel crear sistemas de autenticación OAuth2 para sus aplicaciones.
```powershell
composer require laravel/passport
```

**Laravel Socialite**: Facilita la autenticación con servicios de terceros como Facebook, Twitter, Google, etc., en tu aplicación Laravel.
```powershell
composer require laravel/socialite
```

**Laravel Horizon**: Proporciona un hermoso panel de control y monitorización para tus trabajos de Laravel que se ejecutan en segundo plano utilizando Laravel's Queue.
```powershell
composer require laravel/horizon
```

**Laravel Excel**: Permite la importación y exportación de archivos Excel en tu aplicación Laravel. Facilita la manipulación de hojas de cálculo de Excel dentro de tu aplicación.
```powershell
composer require maatwebsite/excel
```

**Laravel Sanctum**: Proporciona un sistema simple de autenticación de API basado en tokens para aplicaciones de una sola página (SPA), aplicaciones móviles, etc.
```powershell
composer require laravel/sanctum
```

### Procesamiento de Imagenes y Archivos

**Intervention Image**: Intervention Image es una librería de manipulación de imágenes para Laravel que ofrece una interfaz sencilla y fácil de usar para manipular imágenes, incluyendo redimensionamiento, recorte, rotación, ajuste de brillo y contraste, entre otros.
```powershell
composer require intervention/image
```

**Laravel Filemanager**: Laravel Filemanager proporciona una interfaz de usuario para administrar archivos y carpetas en tu aplicación Laravel. Permite subir, renombrar, eliminar y mover archivos y carpetas de forma intuitiva.
```powershell
composer require unisharp/laravel-filemanager
```

**Flysystem**: Flysystem es un sistema de archivos agnóstico que proporciona una capa de abstracción para interactuar con sistemas de archivos locales, FTP, SFTP, Amazon S3, y muchos otros. Laravel tiene integración nativa con Flysystem, lo que facilita la gestión de archivos en diferentes sistemas de almacenamiento.
```powershell
composer require league/flysystem
```

**Spatie Media Library**: Spatie Media Library es otro paquete popular para gestionar archivos multimedia en Laravel. Ofrece características avanzadas como la generación automática de miniaturas, la manipulación de imágenes y la gestión de archivos en la nube.
```powershell
composer require spatie/laravel-medialibrary
```

