<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component {
    use WithPagination;

    public function delete($id) {
        $category = Category::find($id);
        $category->delete();
        session()->flash('message', "Category has been deleted successfully!");
        return redirect()->route('admin.categories');
    }

    public function deleteAll() {
        DB::statement("SET foreign_key_checks=0");
        Product::truncate();
        Category::truncate();
        DB::statement("SET foreign_key_checks=1");
        session()->flash('message', "All categories have been deleted successfully!");
    }

    public function render() {
        $categories = Category::paginate(5);
        return view('livewire.admin.admin-category-component', ['categories' => $categories]);
    }
}
