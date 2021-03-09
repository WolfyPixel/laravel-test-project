<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class ShopComponent extends Component
{
    use WithPagination;

    public  function store($productId, $productName, $productPrice){
        Cart::add($productId, $productName, 1, $productPrice)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added in cart');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        $products = Product::paginate(8);
        return view('livewire.shop-component', ['products' => $products]);
    }
}
