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
     * @param $attributes
     * @return mixed
     * @throws Exception
     */
    public function store($attributes)
    {
        $instance = $this->model->newInstance();
        $instance->fill($attributes);
        if (!$instance->save()) {
            throw new Exception('Failed to create new instance of model: ' . get_class($this->model));
        }

        return $instance;
    }

    /**
     * @param Model $model
     * @param $attributes
     * @throws Exception
     */
    public function update(Model $model, $attributes)
    {
        $model->fill($attributes);
        if (!$model->save()) {
            throw new Exception('Failed to update model: ' . get_class($this->model) . " with Id: {$model->id}");
        }
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

    /**
     * @param Model $model
     * @return mixed
     */
    public function delete(Model $model)
    {
        return $model->delete();
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return call_user_func(get_class($this->model).'::all');
    }
}