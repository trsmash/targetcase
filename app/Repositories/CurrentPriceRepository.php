<?php namespace App\Repositories;

use App\Models\CurrentPrice;

/**
 * Class CurrentPriceRepository
 * @package App\Repositories
 */
class CurrentPriceRepository extends Repository
{
    /**
     * CurrentPriceRepository constructor.
     * @param CurrentPrice $price
     */
    public function __construct(CurrentPrice $price)
    {
        parent::__construct($price);
    }

    /**
     * @param integer $id
     * @return CurrentPrice|null
     */
    public function findByProductId(int $id): ?CurrentPrice
    {
        return $this->model->newQuery()
            ->where('product_id', '=', $id)
            ->first();
    }
}