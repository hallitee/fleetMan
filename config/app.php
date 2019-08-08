<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    */
	
	'apps'=>[''=>'','sir'=>'SIR','email'=>'EMAIL', 'net'=>'INTERNET','rem'=>'REMOTE','eLeave'=>'E-Leave','sap'=>'SAP'],
	
	'category'=>[""=>"","NEW USER"=>"NEW USER", "UPDATE USER"=>"UPDATE USER", "REPORT"=>"REPORT","APPLICATION"=>"APPLICATION"],
	
	'status'=>[""=>"", "0"=>"AWAITING HOD APPROVAL","10"=>"APPROVED BY HOD", "8"=>"DISMISSED BY HOD", "30"=>"APPROVED BY IT HOD", "28"=>"DISMISSED BY IT HOD", "40"=>"COMPLETED"],
	
	'company'=> [""=>"", "EIL"=>"EIL","ESRNL"=>"ESRNL","NPRNL"=>"NPRNL","PFNL"=>"PFNL"],
	
	'department'=>[""=>"","PRODUCTION"=>"PRODUCTION","FINANCE"=>"FINANCE", "GA"=>"GA","HR"=>"HR","PURCHASING"=>"PURCHASING","MARKETING"=>"MARKETING","I.T"=>"I.T", "IMPORTATION"=>"IMPORTATION","AUDIT"=>"AUDIT"],
	
	'location'=> [""=>"","WITHIN LAGOS"=>"WITHIN LAGOS","OUTSIDE LAGOS"=>"OUTSIDE LAGOS"],

	'destination'=>[""=>"","AGBARA"=>"AGBARA","APAPA"=>"APAPA", "BANANA"=>"BANANA", "BANKING"=>"BANKING","FALOMO"=>"FALOMO"],
	
	'passenger'=>['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10'],
    
	'name' => env('APP_NAME', 'Laravel'),
	
	'within'=>['Apapa'=>'Apapa','Banana Island'=>'Banana Island','Domestic Airport'=>'Domestic Airport','Ikeja'=>'Ikeja','Ikeja - Euro Mega'=>'Ikeja - Euro Mega','Ikoyi'=>'Ikoyi','International Airport'=>'International Airport','Lekki'=>'Lekki','Marina - Lagos Island'=>'Marina - Lagos Island','NAFDAC - Isolo'=>'NAFDAC - Isolo','SON - Lekki phase 1'=>'SON - Lekki phase 1','Victoria Island'=>'Victoria Island','Others'=>'Others'],
	
	'outside'=>['Abeokuta'=>'Abeokuta','Agbara'=>'Agbara','Ibadan'=>'Ibadan','Ota'=>'Ota','Others'=>'Others'],
	
	'make' =>  [
   "Acura" => "Acura",
   "Alfa Romeo" => "Alfa Romeo",
   "Audi" => "Audi",
   "Bedford" => "Bedford",
   "BMW" => "BMW",
   "Cadillac" => "Cadillac",
   "Chevrolet" => "Chevrolet",
   "Chrysler" => "Chrysler",
   "CitroΓÇ░n" => "CitroΓÇ░n",
   "Daewoo" => "Daewoo",
   "Daihatsu" => "Daihatsu",
   "Fiat" => "Fiat",
   "Ford" => "Ford",
   "Honda" => "Honda",
   "Hyundai" => "Hyundai",
   "Isuzu" => "Isuzu",
   "Kia" => "Kia",
   "Land Rover" => "Land Rover",
   "Lexus" => "Lexus",
   "MAN" => "MAN",
   "Mazda" => "Mazda",
   "Mercedes-Benz" => "Mercedes-Benz",
   "Mitsubishi" => "Mitsubishi",
   "Nissan" => "Nissan",
   "Opel" => "Opel",
   "Peugeot" => "Peugeot",
   "Pontiac" => "Pontiac",
   "Proton" => "Proton",
   "Renault" => "Renault",
   "Rolls-Royce" => "Rolls-Royce",
   "Rover" => "Rover",
   "Saab" => "Saab",
   "Scion" => "Scion",
   "Skoda" => "Skoda",
   "Subaru" => "Subaru",
   "Suzuki" => "Suzuki",
   "Tata" => "Tata",
   "Toyota" => "Toyota",
   "Triumph" => "Triumph",
   "Volvo" => "Volvo",
   "VW" => "VW",
   "Yugo" => "Yugo",
   "Yulon" => "Yulon",
 ],
 
 'style' => [
  "Hatchback" => "Hatchback",
  "SUV" => "SUV",
  "Estate" => "Estate",
  "Saloon" => "Saloon",
  "SUV (Open)" => "SUV (Open)",
  "Special Design" => "Special Design",
  "Convertible" => "Convertible",
  "Coupe" => "Coupe",
  "MPV" => "MPV",
  "Mini Bus" => "Mini Bus",
  "Canter" => "Canter",
  "Coaster" => "Coaster",
  "Van" => "Van",
  "Pickup Van" => "Pickup Van",
  "Pickup" => "Pickup",
  "Targa" => "Targa",
  "Bus" => "Bus",
  "Box" => "Box",
  "Dumptruck" => "Dumptruck",
  "Municipal Vehicle" => "Municipal Vehicle",
  "Truck Tractor" => "Truck Tractor",
  "Box Body/Hatchback" => "Box Body/Hatchback",
  "Hardtop" => "Hardtop",
  "Cab with Engine" => "Cab with Engine",
],
  'frequency' => [
	''=>'',
	'Daily'=>'Daily',
	'Weekly'=>'Weekly',
	'Monthly'=>'Monthly',
	'Bi-Annual'=>'Bi-Annual',
	'Quarterly'=>'Quarterly',
	'Yearly'=>'Yearly'
	],
	'uom' => [
	''=>'',
	'Day'=>'Day',
	'Week'=>'Week',
	'Month'=>'Month',
	'Year'=>'Year'	
	],
	'uoms' => [
	''=>'',
	'Days'=>'Days',
	'Weeks'=>'Weeks',
	'Months'=>'Months',
	'Years'=>'Years'	
	],	
	'stations'=>[
	'CONOIL'=>'CONOIL',
	'FORTE'=>'FORTE',
	'MOBIL'=>'MOBIL',
	'NNPC'=>'NNPC',
	'OANDO'=>'OANDO',
	'TOTAL'=>'TOTAL'	
	],
	'fuel'=>[
	'DIESEL'=>'DIESEL',
	'PETROL'=>'PETROL'
	],
  /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services your application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Logging Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log settings for your application. Out of
    | the box, Laravel uses the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Settings: "single", "daily", "syslog", "errorlog"
    |
    */

    'log' => env('APP_LOG', 'single'),

    'log_level' => env('APP_LOG_LEVEL', 'debug'),

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,
		Collective\Html\HtmlServiceProvider::class,
		Maatwebsite\Excel\ExcelServiceProvider::class,		
        /*
         * Package Service Providers...
         */
        Laravel\Tinker\TinkerServiceProvider::class,

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
		Milon\Barcode\BarcodeServiceProvider::class,
		//Spatie\Permission\PermissionServiceProvider::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => [

        'App' => Illuminate\Support\Facades\App::class,
        'Artisan' => Illuminate\Support\Facades\Artisan::class,
        'Auth' => Illuminate\Support\Facades\Auth::class,
        'Blade' => Illuminate\Support\Facades\Blade::class,
        'Broadcast' => Illuminate\Support\Facades\Broadcast::class,
        'Bus' => Illuminate\Support\Facades\Bus::class,
        'Cache' => Illuminate\Support\Facades\Cache::class,
        'Config' => Illuminate\Support\Facades\Config::class,
        'Cookie' => Illuminate\Support\Facades\Cookie::class,
        'Crypt' => Illuminate\Support\Facades\Crypt::class,
        'DB' => Illuminate\Support\Facades\DB::class,
        'Eloquent' => Illuminate\Database\Eloquent\Model::class,
        'Event' => Illuminate\Support\Facades\Event::class,
        'File' => Illuminate\Support\Facades\File::class,
        'Gate' => Illuminate\Support\Facades\Gate::class,
        'Hash' => Illuminate\Support\Facades\Hash::class,
        'Lang' => Illuminate\Support\Facades\Lang::class,
        'Log' => Illuminate\Support\Facades\Log::class,
        'Mail' => Illuminate\Support\Facades\Mail::class,
        'Notification' => Illuminate\Support\Facades\Notification::class,
        'Password' => Illuminate\Support\Facades\Password::class,
        'Queue' => Illuminate\Support\Facades\Queue::class,
        'Redirect' => Illuminate\Support\Facades\Redirect::class,
        'Redis' => Illuminate\Support\Facades\Redis::class,
        'Request' => Illuminate\Support\Facades\Request::class,
        'Response' => Illuminate\Support\Facades\Response::class,
        'Route' => Illuminate\Support\Facades\Route::class,
        'Schema' => Illuminate\Support\Facades\Schema::class,
        'Session' => Illuminate\Support\Facades\Session::class,
        'Storage' => Illuminate\Support\Facades\Storage::class,
        'URL' => Illuminate\Support\Facades\URL::class,
        'Validator' => Illuminate\Support\Facades\Validator::class,
        'View' => Illuminate\Support\Facades\View::class,
		'Form' => Collective\Html\FormFacade::class,
		'Html' => Collective\Html\HtmlFacade::class,
		'Excel' => Maatwebsite\Excel\Facades\Excel::class,	
		'DNS1D' => Milon\Barcode\Facades\DNS1DFacade::class,
        'DNS2D' => Milon\Barcode\Facades\DNS2DFacade::class,		
    ],

];
