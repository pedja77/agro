<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
//     protected $table='kategorije';
//    // protected $primaryKey = 'ID';
//     public $timestamps = false;

    private static $categories = [
        'Ball bearing' => [
            'Bearing with housing - housing unit type GWST (ST. BK)',
            'Single row deep groove ball bearing',
            'Ball bearing with angular contact',
            'Double row ball bearing',
            'Self aligning ball bearing. double row'
        ],
        'Cylindrical-roller bearing' => [
            'Cylindrical-roller bearing. single row',
            'Cylindrical-roller bearing. double row',
            'Cylindrical-roller bearing axial load',
            'Combined cylindrical roller bearing'
        ],
        'Tapered-roller bearing' => [
            'Tapered-roller bearing',
            'Other tapered-roller bearing'
        ],
        'Spherical Roller bearing' => [
            'Spherical roller self aligning bearing. single row',
            'Spherical roller self aligning bearing. double row'
        ],
        'Needle Roller bearing' => [
            'Needle bearing with inner ring',
            'Needle bearing without inner ring',
            'Needle bearing with cage'
        ],
    ];

    public static function getCategories() {
        return self::$categories;
    }
}
