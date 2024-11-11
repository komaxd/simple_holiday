<?php

namespace Koma\SimpleHongKongHoliday\app\Models;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $fillable = ['name_en', 'name_tc', 'name_sc', 'date', 'enable'];

    protected $casts = [
        'enable' => 'boolean',
        'date' => 'date:Y-m-d',
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];

    /**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable()
    {
        return config('simple_holiday.table_name', parent::getTable());
    }


}
