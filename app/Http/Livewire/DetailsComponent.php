<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;

class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug){
        $this->slug = $slug;
    }

    public  function store($productId, $productName, $productPrice){
        Cart::add($productId, $productName, 1, $productPrice)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added in cart');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        $productsInStock = Product::where('stock_status', 'instock');

        $product = $productsInStock->where('slug', $this->slug)->first();

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->inRandomOrder()->limit(5)->get();

        return view('livewire.details-component',
            [
                'product' => $product,
                'relatedProducts' => $relatedProducts
            ]);
    }
}
