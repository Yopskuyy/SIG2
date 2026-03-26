<?php

namespace App\Repositories;

use App\Models\petaa;
use App\Repositories\BaseRepository;

/**
 * Class petaaRepository
 * @package App\Repositories
 * @version March 2, 2026, 5:39 am UTC
*/

class petaaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titik_lokasi',
        'y',
        'x'
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
        return petaa::class;
    }
}
