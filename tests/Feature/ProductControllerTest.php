<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\Traits\ExistingIds;

class ProductControllerTest extends TestCase
{
    use WithFaker, ExistingIds;

    public function testExistingIdsReturnOkStatus()
    {
        foreach ($this->existingIds as $productId) {
            $response = $this->get("/api/products/{$productId}");

            $response
                ->assertStatus(200)
                ->assertJsonStructure(['id', 'name', 'current_price']);
        }
    }

    public function testNonExistingIdsReturnNotFoundStatus()
    {
        for ($i = 0; $i < 4; $i++) {
            $randomId = $this->getRandomId();
            $response = $this->get("/api/products/{$randomId}");

            $response->assertStatus(404);
        }

    }

    public function testUpdateProductPriceReturnsOkStatus()
    {
        $value          = $this->faker->randomFloat(2, 0, 99);
        $currencyCode   = $this->faker->currencyCode;
        $productId      = $this->faker->randomElement($this->existingIds);
        $response       = $this->putJson("/api/products/{$productId}", [
            'current_price' => [
                'value'         => $value,
                'currency_code' => $currencyCode
            ]
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'current_price' => [
                'value'         => $value,
                'currency_code' => $currencyCode
            ]
        ]);
    }

    private function getRandomId()
    {
        $id = $this->faker->randomNumber();

        return !in_array($id, $this->existingIds) ? $id : $this->$this->getRandomId();
    }
}
