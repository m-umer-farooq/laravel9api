<h1>Laravel 9 API - Using Laravel Sanctum</h1>

<h4>Setting up local project after cloning it to local machien</h4>

<p>
    <ul>
        <li>setup .env file and set database connection</li>
        <li>composer install</li>
        <li>php artisan key:generate</li>
        <li>php artisan migrate</li>
        <li>php artisan serve</li>
    </ul>
</p>


<h6>Laravel Sanctum</h6>
<a href="https://laravel.com/docs/9.x/sanctum" target="_blank">https://laravel.com/docs/9.x/sanctum</a>


<p>You may install Laravel Sanctum via the Composer package manager:</p>
<code>composer require laravel/sanctum</code>

<p>
    Next, you should publish the Sanctum configuration and migration files using the vendor:publish Artisan command. The sanctum configuration file will be placed in your application's config directory:
</p>
<code>php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"</code>

<p>Finally, you should run your database migrations. Sanctum will create one database table in which to store API tokens:</p>

<code>php artisan migrate</code>

<p>
Next, if you plan to utilize Sanctum to authenticate a SPA, you should add Sanctum's middleware to your api middleware group within your application's app/Http/Kernel.php file:
</p>

<code>
'api' => [
    \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
    'throttle:api',
    \Illuminate\Routing\Middleware\SubstituteBindings::class,
],
</code>
