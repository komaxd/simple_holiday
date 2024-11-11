# Hong Kong Holiday in Laravel

## Installation

You can install the package via composer:

```
composer require koma/simple-hong-kong-holiday
```

You may publish and run the migrations:

```
#config
php artisan vendor:publish --tag="simple-holiday-config"

#migrations
php artisan vendor:publish --tag="simple-holiday-migrations"
php artisan migrate
```

And run command to generate holidays.

You may create cron job or schedule every year.

```
php artisan fetch:holiday 
```

## Config

```
return [
    /*
     * You should define table name before migrate, default: holidays
     */
    'table_name' => env('HOLIDAY_TABLE_NAME', 'holidays'),

    /*
     * fetching gov url for holiday json url
     */

    'en_url' => env('HOLIDAY_EN_URL', 'https://www.1823.gov.hk/common/ical/en.json'),
    'tc_url' => env('HOLIDAY_TC_URL', 'https://www.1823.gov.hk/common/ical/tc.json'),
    'sc_url' => env('HOLIDAY_SC_URL', 'https://www.1823.gov.hk/common/ical/sc.json'),

    /*
     * model class, you can define your own holiday class
     */
    'model_class' => Koma\SimpleHongKongHoliday\app\Models\Holiday::class,
];


```

## License

The Laravel framework is open-sourced software licensed under the <a href="https://opensource.org/license/MIT">MIT license</a>.
