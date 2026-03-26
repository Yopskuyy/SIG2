<?php

namespace App\Repositories;

use App\Models\Karang_Asam_Ulu;
use App\Repositories\BaseRepository;

/**
 * Class Karang_Asam_UluRepository
 * @package App\Repositories
 * @version March 3, 2026, 3:10 am UTC
*/

class Karang_Asam_UluRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Nama_lokasi',
        'koordinat_poligon',
        'warna_poligon',
        'deskripsi'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Karang_Asam_Ulu::class;
    }
}
