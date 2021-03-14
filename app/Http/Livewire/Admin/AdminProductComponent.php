<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component {
    use WithPagination;

    public function delete($id){
        $product = Product::find($id);
        Storage::delete('public/images/products/'.$product->image.'.png');
        $product->delete();
        session()->flash('message', 'Product has been deleted successfully!');
        return redirect()->route('admin.products');
    }

    public function deleteAll(){
        Product::truncate();
        session()->flash('message', 'All products have been deleted successfully!');
    }

    public function render() {
        $products = Product::paginate(6);
        return view('livewire.admin.admin-product-component', ['products' => $products]);
    }
}
