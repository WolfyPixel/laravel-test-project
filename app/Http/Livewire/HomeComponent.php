<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;

class HomeComponent extends Component {

    public  function store($productId, $productName, $productPrice){
        Cart::add($productId, $productName, 1, $productPrice)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added in cart');
        return redirect()->route('cart');
    }

    public function render() {
        // only instock items
        $productsInStock = Product::where('stock_status', 'instock');

        $popularProducts = $productsInStock->limit(4)->get();
        $featuredProduct = $productsInStock->where('featured', 1)->inRandomOrder()->first();


        return view('livewire.home-component',
            [
                'popularProducts' => $popularProducts,
                'featuredProduct' => $featuredProduct
            ]);
    }
}
