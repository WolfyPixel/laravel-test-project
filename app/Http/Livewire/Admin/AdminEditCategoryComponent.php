<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;

class AdminEditCategoryComponent extends Component {
    public $name;           // new category name
    public $slug;           // new category slug
    public $categoryId;     // id of the category being updated

    public function mount($categorySlug) {
        $category = Category::where('slug', $categorySlug)->first();

        $this->categoryId = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
    }

    public function generateSlug() {
        $this->slug = Str::slug($this->name);
    }

    public function update() {
        $category = Category::find($this->categoryId);

        $category->name = $this->name;
        $category->slug = $this->slug;

        $category->save();

        session()->flash('message', 'Category has been updated successfully!');
    }

    public function render() {
        return view('livewire.admin.admin-edit-category-component');
    }
}
