<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $shortDescription;
    public $description;
    public $regularPrice;
    public $stockStatus;
    public $featured;
    public $quantity;
    public $categoryId;
    public $image;
    public $newImage;
    public $productId;

    public function mount($productSlug){
        $product = Product::where('slug', $productSlug)->first();
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->shortDescription = $product->short_description;
        $this->description = $product->description;
        $this->regularPrice = $product->regular_price;
        $this->stockStatus = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->categoryId = $product->category_id;
        $this->productId = $product->id;
    }

    public function generateSlug(){
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields){
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => [
                'required',
                Rule::unique('products')->ignore($this->productId)
            ],
            'shortDescription' => 'required|min:3|max:250',
            'description' => 'required|min:3|max:1000',
            'regularPrice' => 'required|numeric',
            'stockStatus' => 'required',
            'quantity' => 'required|numeric',
            'newImage' => 'exclude_unless:image,true|required|mimes:jpg,jpeg,png',
            'categoryId' => 'required',
            'featured' => 'nullable|boolean'
        ]);
    }

    public function update(){

        $this->validate([
            'name' => 'required',
            'slug' => [
                'required',
                Rule::unique('products')->ignore($this->productId)
            ],
            'shortDescription' => 'required|min:3|max:250',
            'description' => 'required|min:3|max:1000',
            'regularPrice' => 'required|numeric',
            'stockStatus' => 'required',
            'quantity' => 'required|numeric',
            'newImage' => 'exclude_unless:image,true|required|mimes:jpg,jpeg,png',
            'categoryId' => 'required',
            'featured' => 'nullable|boolean'
        ]);

        $product = Product::find($this->productId);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->shortDescription;
        $product->description = $this->description;
        $product->regular_price = $this->regularPrice;
        $product->stock_status = $this->stockStatus;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        $product->category_id = $this->categoryId;

        if($this->newImage){

            $imageName = Carbon::now()->timestamp;
            $extension = 'png';

            //store new image
            $this->newImage->storeAs('public/images/products', $imageName . '.' . $extension);

            //delete old image
            Storage::delete('public/images/products/'.$product->image.'.png');

            //reassign product image
            $product->image = $imageName;
        }


        $product->save();

        session()->flash('message', 'Product has been updated successfully!');
        return redirect()->route('admin.products');
    }

    public function render()
    {
        $categories = Category::all();
        $imageName = $this->image;
        return view('livewire.admin.admin-edit-product-component', ['categories' => $categories, 'imageName' => $imageName]);
    }
}
