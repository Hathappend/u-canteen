<?php

namespace App\Service;


use Illuminate\Support\Collection;

interface CheckoutService
{
    public function checkout(string $username): Collection|bool;
}
