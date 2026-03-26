<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class mahasiswa
 * @package App\Models
 * @version February 24, 2026, 2:56 am UTC
 *
 * @property string $name
 * @property string $alamat
 * @property integer $nim
 */
class mahasiswa extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'mahasiswas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'alamat',
        'nim'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'alamat' => 'string',
        'alamat' => 'int'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
