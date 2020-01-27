<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;

class PhysicsSlot extends Model
{
    protected $fillable = [
        'date', 'start_time', 'end_time', 'booked', 'mobile_number', 'place', 'address', 'students', 'fees', 'content', 'chapters', 'type'
    ];

    protected $casts = [
        'date' => 'date',
        'booked' => 'boolean',
        'fees' => 'integer',
        'chapters' => 'collection',
        'type' => 'collection'
    ];

    public static function getDataFile() {
        return json_decode(Storage::get('physics-data.json'));
    }
    
    public static function getTypes()
    {
        return collect(self::getDataFile()->Types);
    }

    public static function getTypesKeys() {
        return self::getTypes()->keys();
    }

    public static function getChapters()
    {
        return collect(self::getDataFile()->Chapters);
    }

    public static function getChaptersKeys() {
        return self::getChapters()->keys();
    }

    public static function getPlaces()
    {
        return collect(self::getDataFile()->Places);
    }

    public static function getPlacesKeys() {
        return self::getPlaces()->keys();
    }
}
