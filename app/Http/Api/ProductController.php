<?php namespace App\Http\Api;

use App\Http\Controllers\Controller as BaseController;
use App\Http\Requests\PersistProductPrice;
use App\Models\Product;
use App\Http\Resources\Product as ProductResource;
use App\Repositories\CurrentPriceRepository;

class ProductController extends BaseController
{
    protected $repository;

    function __construct(CurrentPriceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index($redSkyResponse)
    {
        $product = new Product($redSkyResponse);

        return new ProductResource($product);
    }

    public function update(PersistProductPrice $request, $redSkyResponse)
    {
        $product = new Product($redSkyResponse);
        $product->updateCurrentPrice($request->json('current_price'));

        return new ProductResource($product);
    }
}