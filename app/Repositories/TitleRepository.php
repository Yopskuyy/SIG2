<?php

namespace App\Repositories;

use App\Models\Title;
use App\Repositories\BaseRepository;

/**
 * Class TitleRepository
 * @package App\Repositories
 * @version February 24, 2026, 2:45 am UTC
*/

class TitleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Title'
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
        return Title::class;
    }
}
