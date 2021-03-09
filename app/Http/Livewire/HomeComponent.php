<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class HomeComponent extends Component {
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
