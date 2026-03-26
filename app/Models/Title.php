<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Title
 * @package App\Models
 * @version February 24, 2026, 2:45 am UTC
 *
 * @property string $Title
 */
class Title extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'titles';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'Title'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Title' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Title' => 'y'
    ];

    
}
