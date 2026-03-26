<?php

namespace App\Repositories;

use App\Models\Titleee;
use App\Repositories\BaseRepository;

/**
 * Class TitleeeRepository
 * @package App\Repositories
 * @version February 24, 2026, 2:53 am UTC
*/

class TitleeeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return Titleee::class;
    }
}
