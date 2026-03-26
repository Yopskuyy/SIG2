<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class petaa
 * @package App\Models
 * @version March 2, 2026, 5:39 am UTC
 *
 * @property string $titik_lokasi
 * @property string $y
 * @property string $x
 */
class petaa extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'petaas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'titik_lokasi',
        'y',
        'x'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'titik_lokasi' => 'string',
        'y' => 'string',
        'x' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
