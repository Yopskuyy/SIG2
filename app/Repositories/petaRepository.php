<?php

namespace App\Repositories;

use App\Models\peta;
use App\Repositories\BaseRepository;

/**
 * Class petaRepository
 * @package App\Repositories
 * @version March 2, 2026, 5:37 am UTC
*/

class petaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tempat',
        'titiklokasi'
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
        return peta::class;
    }
}
