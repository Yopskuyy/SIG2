<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Karang_Asam_Ulu
 * @package App\Models
 * @version March 3, 2026, 3:10 am UTC
 *
 * @property string $Nama_lokasi
 * @property string $koordinat_poligon
 * @property string $warna_poligon
 * @property string $deskripsi
 */
class Karang_Asam_Ulu extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'karang__asam__ulus';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'Nama_lokasi',
        'koordinat_poligon',
        'warna_poligon',
        'deskripsi'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Nama_lokasi' => 'string',
        'warna_poligon' => 'string',
        'deskripsi' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
