<?php namespace App\Models;

class Product
{
    private $response;
    public $id;
    public $name;
    public $currentPrice;

    function __construct($redSkyResponse)
    {
        $this->response     = $redSkyResponse;
        $this->id           = $redSkyResponse->product->item->tcin;
        $this->name         = $redSkyResponse->product->item->product_description->title;
        $this->currentPrice = (app('App\Repositories\CurrentPriceRepository'))->findByProductId($this->id);
    }

    public function updateCurrentPrice(array $attributes)
    {
        $repository         = app('App\Repositories\CurrentPriceRepository');
        $this->currentPrice = $repository->updateOrCreate(['product_id' => (int) $this->id], $attributes);

        return $this;
    }
}