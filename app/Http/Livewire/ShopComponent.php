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
    public $pagesize;
    public $categorySlug;

    public function mount() {
        $this->sorting = "default";
        $this->pagesize = 6;
        $this->categorySlug = "no-category";
    }

    // adds products to the cart
    public function store($productId, $productName, $productPrice) {
        Cart::add($productId, $productName, 1, $productPrice)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added in cart');
        return redirect()->route('product.cart');
    }

    public function render() {
        $products = $this->filterByCategoryAndSort();

        $categories = Category::all();

        return view('livewire.shop-component', ['products' => $products, 'categories' => $categories]);
    }

    private function filterByCategoryAndSort() {

        if ($this->categorySlug == "no-category") {

            // sort products
            switch ($this->sorting) {
                case 'date':
                    $products = Product::orderBy('created_at', 'DESC')->paginate($this->pagesize);
                    break;
                case 'price':
                    $products = Product::orderBy('regular_price', 'ASC')->paginate($this->pagesize);
                    break;
                case 'price-desc':
                    $products = Product::orderBy('regular_price', 'DESC')->paginate($this->pagesize);
                    break;
                default:
                    $products = Product::paginate($this->pagesize);
            }
        } else {
            //category filter
            $category = Category::where('slug', $this->categorySlug)->first();
            $categoryId = $category->id;

            // filter and sort products
            switch ($this->sorting) {
                case 'date':
                    $products = Product::where('category_id', $categoryId)->orderBy('created_at', 'DESC')->paginate($this->pagesize);
                    break;
                case 'price':
                    $products = Product::where('category_id', $categoryId)->orderBy('regular_price', 'ASC')->paginate($this->pagesize);
                    break;
                case 'price-desc':
                    $products = Product::where('category_id', $categoryId)->orderBy('regular_price', 'DESC')->paginate($this->pagesize);
                    break;
                default:
                    $products = Product::where('category_id', $categoryId)->paginate($this->pagesize);
            }
        }

        return $products;
    }
}
