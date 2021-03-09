<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class CartComponent extends Component
{
    public function render()
    {
        return view('livewire.cart-component');
    }
}
