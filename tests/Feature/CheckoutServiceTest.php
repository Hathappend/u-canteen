<?php

namespace Tests\Feature;

use App\Service\CheckoutService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CheckoutServiceTest extends TestCase
{
    private CheckoutService $checkoutService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->checkoutService = $this->app->make(CheckoutService::class);
    }

    public function testShowCheckoutCart()
    {
        $result = $this->checkoutService->checkout(10122004);

        var_dump($result->all());

        self::assertNotNull($result);

    }


}
