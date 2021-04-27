## Install composer package
`composer install`

## Generate New .env
Save as .env.example to .env

## Generate app key by running
`php artisan key:generate`

## Edit .env database configuration
Database name: `laravel_fortify`

## Run migration
`php artisan migrate`

## Run tinker and Create Fake Users using User Factory
`php artisan tinker`

`User::factory()->count(5)->create();`<br/>
*that will create 5 fake users to users data*

## Fortify Configurations
1. Install<br/>
`composer require laravel/fortify`


2. Publish service provider<br>
`php artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider"`


3. Run migration<br>
`php artisan migrate`
   

4. Create login, registerview in FortifyServiceProvider.php, `boot` method<br>
```
// login view
Fortify::loginView(function() {
    return view('auth.login');
});

// register view
Fortify::registerView(function () {
    return view('auth.register');
});
```
