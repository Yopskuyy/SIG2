<?php

namespace App\Repositories;

use App\Models\mahasiswa;
use App\Repositories\BaseRepository;

/**
 * Class mahasiswaRepository
 * @package App\Repositories
 * @version February 24, 2026, 2:56 am UTC
*/

class mahasiswaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'alamat',
        'nim'
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
        return mahasiswa::class;
    }
}
