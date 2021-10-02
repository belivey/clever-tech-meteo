<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeteoData extends Model
{
    use HasFactory;

    protected $casts = ['data' => 'object'];

    public static function data () {
        $air_id = env('AIR_STATION');
        $soil_id = env('SOIL_STATION');

        $air_data = self::where('meteo_module_id', $air_id)->latest('measured_at')->first();
        $soil_data = self::where('meteo_module_id', $soil_id)->latest('measured_at')->first();

        return [
            'air_data' => $air_data,
            'soil_data' => $soil_data,
        ];
    }
}
