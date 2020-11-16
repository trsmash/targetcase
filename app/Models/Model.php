<?php namespace App\Models;

use App\Contracts\Model as ModelContract;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Abstract class that I will subclass all of my custom models off of. The importance of this class comes from the
 * ModelInterface. In other languages that support inheritance, you can often type hint a parent class in your
 * formal parameters and then pass in an object that is a member of a child class of that parent. Sadly, you cannot do
 * this in PHP currently. There is a workaround though. You can typehint interfaces.
 *
 * See \App\Repositories\Repository
 *
 * Class Model
 * @package App\Models
 */
abstract class Model extends EloquentModel implements ModelContract
{

}