<?php namespace App\Repositories;

use App\Contracts\Model;
use Exception;

/**
 * Class Repository
 * @package App\Repositories
 *
 * Abstract class that contains generalized application logic for CRUD operations against models and other helpers
 */
abstract class Repository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Repository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $updConditions
     * @param array $attributes
     * @return mixed
     */
    public function updateOrCreate(array $updConditions, array $attributes)
    {
        return call_user_func_array(get_class($this->model).'::updateOrCreate', [$updConditions, $attributes]);
    }
}