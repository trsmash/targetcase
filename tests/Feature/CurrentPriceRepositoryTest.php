<?php

namespace Tests\Feature;

use App\Models\CurrentPrice;
use App\Repositories\CurrentPriceRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\Traits\ExistingIds;

class CurrentPriceRepositoryTest extends TestCase
{
    /**
     * @var \App\Repositories\CurrentPriceRepository $repo
     */
    protected $repo;

    /**
     * @var \Jenssegers\Mongodb\Connection $mongo;

     */
    protected $mongo;

    use WithFaker, ExistingIds;

    protected function setUp(): void
    {
        parent::setUp();
        $this->repo     = app('App\Repositories\CurrentPriceRepository');
        $this->mongo    = $this->getConnection('mongodb');
    }

    public function testCurrentPriceRepositoryInstantiation()
    {
        $this->assertTrue($this->repo instanceof CurrentPriceRepository);
    }

    public function testConfirmCurrentPricesCollectionIsEmpty()
    {
        $this->mongo->collection('current_prices')->truncate();
        $records    = $this->mongo->table('current_prices')->get();

        $this->assertCount(0, $records);
    }

    public function testRepositoryReturnsNullWhenRetrievingCurrentPriceWhenEmpty()
    {
        $existingId = $this->faker->randomElement($this->existingIds);

        $this->assertNull($this->repo->findByProductId($existingId));
    }

    public function testUpdateOrCreate()
    {
        $existingId     = $this->faker->randomElement($this->existingIds);
        $value          = $this->faker->randomFloat(2, 0, 99);
        $currency_code  = $this->faker->currencyCode;

        $this->assertNull($this->repo->findByProductId($existingId));
        $this->repo->updateOrCreate(['product_id' => $existingId], compact('value', 'currency_code'));
        $this->assertNotNull($this->repo->findByProductId($existingId));
    }
}
