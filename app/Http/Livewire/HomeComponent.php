<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;

class HomeComponent extends Component {

    public  function store($productId, $productName, $productPrice){
        Cart::add($productId, $productName, 1, $productPrice)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added in cart');
        return redirect()->route('product.cart');
    }

    public function render() {
        $popularProducts = Product::inRandomOrder()->limit(4)->get();
        $featuredProduct = Product::where('featured', 1)->inRandomOrder()->limit(1)->get()[0];
        if(!$featuredProduct)
            $featuredProduct = Product::first();

        return view('livewire.home-component',
            [
                'popularProducts' => $popularProducts,
                'featuredProduct' => $featuredProduct
            ]);
    }
}
