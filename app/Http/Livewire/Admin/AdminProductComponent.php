<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component {
    use WithPagination;

    public function delete($id){
        $product = Product::find($id);
        $product->delete();
        session()->flash('message', 'Product has been deleted successfully!');
        return redirect()->route('admin.products');
    }

    public function render() {
        $products = Product::paginate(6);
        return view('livewire.admin.admin-product-component', ['products' => $products]);
    }
}
