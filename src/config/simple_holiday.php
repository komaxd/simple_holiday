<?php
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
