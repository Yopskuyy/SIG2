<?php

namespace App\Repositories;

use App\Models\KarangAsamUlu;
use App\Repositories\BaseRepository;

/**
 * Class Karang_Asam_UluRepository
 * @package App\Repositories
 * @version March 3, 2026, 3:10 am UTC
*/

class KarangAsamUluRepository extends BaseRepository
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
        return KarangAsamUlu::class;
    }
}
