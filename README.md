# Laravel Settings By MI SHAJIB

[![Latest Stable Version](https://poser.pugx.org/mishajib/laravel-settings/v)](//packagist.org/packages/mishajib/laravel-settings)
[![License](https://poser.pugx.org/mishajib/laravel-settings/license)](//packagist.org/packages/mishajib/laravel-settings)
[![Total Downloads](https://poser.pugx.org/mishajib/laravel-settings/downloads)](//packagist.org/packages/mishajib/laravel-settings)

---
We use settings in every application. Which we have to do again and again in every application. For this I have created
a package through which you can create settings very quickly. You can also make the settings by running the command if
you want.

## Installation

You can install the package via composer:

```bash
composer require mishajib/laravel-settings
```

Laravel uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider.

### Laravel without auto-discovery:

If you don't use auto-discovery, add the ServiceProvider to the `$providers` array in config file `config/app.php`

```php
MISHAJIB\Settings\SettingServiceProvider::class,
```

If you want to use the facade to log messages, add this to your facades in app.php:

```php
'LaravelSetting' => MISHAJIB\Settings\Facades\LaravelSettings::class,
```

You can also publish vendor and run the migrations with:

```bash
php artisan vendor:publish --provider="MISHAJIB\Settings\SettingServiceProvider"
php artisan migrate
```

This is the contents of the published config file:

## Usage

```php
use MISHAJIB\Settings\Facades\LaravelSettings;

LaravelSettings::set('setting_key', 'setting_value'); // create or update
LaravelSettings::get('setting_key'); // get the setting
LaravelSettings::forget('setting_key'); // remove the setting
LaravelSettings::all(); // get all settings
```

## Commands

```bash
php artisan misetting:create
php artisan misetting:update
php artisan misetting:forget
php artisan misetting:all
```

### Create Command

This command will create setting and save into settings table. This command take two arguments - setting name and
setting value. Setting name should be string, can't use space or '-'. Also setting value should be string. Setting key
example - site_title, logo etc. Just write command and hit enter then it will ask for arguments. After giving arguments
setting will be created.

```bash
php artisan misetting:create
```

### Update Command

This command will update setting and save into settings table. This command take two arguments - setting name and
setting value. Setting name should be string, can't use space or '-'. Also setting value should be string. Setting key
example - site_title, logo etc. Just write command and hit enter then it will ask for arguments. After giving arguments
setting will be updated.

```bash
php artisan misetting:update
```

### Forget Command

This command will delete setting from settings table. This command take one argument - setting name/key. Just write
command and hit enter then it will ask for argument. After give the argument setting will be deleted.

```bash
php artisan misetting:forget
```

### Show Command

This command will show all setting from settings table. Just write command and hit enter and get all settings.

```bash
php artisan misetting:all
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
