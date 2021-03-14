<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $shortDescription;
    public $description;
    public $regularPrice;
    public $salePrice;
    public $sku;
    public $stockStatus;
    public $featured;
    public $quantity;
    public $categoryId;
    public $image;

    public function mount(){
        $this->stockStatus ='instock';
        $this->featured = 0;
    }

    public function generateSlug(){
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields){
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:products',
            'shortDescription' => 'required|min:3|max:250',
            'description' => 'required|min:3|max:1000',
            'regularPrice' => 'required|numeric',
            'salePrice' => 'nullable|numeric',
            'sku' => 'required',
            'stockStatus' => 'required',
            'quantity' => 'required|numeric',
            'image' => 'required|mimes:jpg,jpeg,png',
            'categoryId' => 'required',
            'featured' => 'nullable|boolean'
        ]);
    }

    public function store(){

        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:products',
            'shortDescription' => 'required|min:3|max:250',
            'description' => 'required|min:3|max:1000',
            'regularPrice' => 'required|numeric',
            'salePrice' => 'nullable|numeric',
            'sku' => 'required',
            'stockStatus' => 'required',
            'quantity' => 'required|numeric',
            'image' => 'required|mimes:jpg,jpeg,png',
            'categoryId' => 'required',
            'featured' => 'nullable|boolean'
        ]);

        $product = new Product;
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->shortDescription;
        $product->description = $this->description;
        $product->regular_price = $this->regularPrice;
        $product->sale_price = $this->salePrice;
        $product->SKU = $this->sku;
        $product->stock_status = $this->stockStatus;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;


        $imageName = Carbon::now()->timestamp;
        $extension = 'png';

        $this->image->storeAs('public/images/products', $imageName . '.' . $extension);

        $product->image = $imageName;
        $product->category_id = $this->categoryId;

        $product->save();

        session()->flash('message', 'Product has been added successfully!');
        return redirect()->route('admin.products');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-add-product-component', ['categories' => $categories, 'slug' => $this->slug]);
    }
}
