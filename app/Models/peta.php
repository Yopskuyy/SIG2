<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class peta
 * @package App\Models
 * @version March 2, 2026, 5:37 am UTC
 *
 * @property string $tempat
 * @property string $titiklokasi
 */
class peta extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'petas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'tempat',
        'titiklokasi'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tempat' => 'string',
        'titiklokasi' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
