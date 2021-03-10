<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;

class ShopComponent extends Component {
    use WithPagination;

    public $sorting;
    public $pageSize;
    public $categorySlug;
    public $search;

    public function mount() {
        $this->sorting = "default";
        $this->pageSize = 6;
        $this->categorySlug = "no-category";
        $this->search = '';
    }

    // adds products to the cart
    public function store($productId, $productName, $productPrice) {
        Cart::add($productId, $productName, 1, $productPrice)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added in cart');
        return redirect()->route('product.cart');
    }

    public function render() {
        $products = $this->filterSortPaginate();

        $categories = Category::all();

        return view('livewire.shop-component', ['products' => $products, 'categories' => $categories]);
    }

    private function filterSortPaginate() {
        $query = Product::query();

        //search filter
        if(!empty($this->search))
            $query = $query->where('name', 'like', '%' . $this->search . '%');

        //category filter
        if ($this->categorySlug != "no-category") {
            $category = Category::where('slug', $this->categorySlug)->first();
            $query = $query->where('category_id', $category->id);
        }

        // sort products
        switch ($this->sorting) {
            case 'date':
                $query = $query->orderBy('created_at', 'DESC');
                break;
            case 'price':
                $query = $query->orderBy('regular_price', 'ASC');
                break;
            case 'price-desc':
                $query = $query->orderBy('regular_price', 'DESC');
                break;
        }

        $products = $query->paginate($this->pageSize);
        return $products;
    }
}
