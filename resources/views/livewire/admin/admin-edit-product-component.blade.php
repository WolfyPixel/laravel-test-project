<section class="mb-44">
    <div class="h-screen flex justify-center">
        <div class="w-3/5 bg-white flex flex-col md:py-8 mt-8 md:mt-0">
            <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Edit Product</h2>

            @if(session()->has('message'))
                <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3" role="alert">
                    <p class="font-bold">Success</p>
                    <p class="text-sm">{{ Session::get('message') }}</p>
                </div>
            @endif

            <form enctype="multipart/form-data" wire:submit.prevent="update">
                <div class="mb-4">
                    <label for="name" class="leading-7 text-sm text-gray-600">Product Name</label>
                    <input type="text" name="name" wire:model="name" wire:change.lazy="generateSlug"
                           class="w-full bg-white rounded border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

                    @error('name')
                    <div class="text-red-700 px-4 py-1 text-sm" role="alert">
                        <p class="text-sm">{{ $message }}</p>
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="slug" class="leading-7 text-sm text-gray-600">Product Slug</label>
                    <input type="text" name="slug" placeholder="{{ $slug }}" disabled value="{{old('slug')}}"
                           class="w-full bg-white rounded border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

                    @error('slug')
                    <div class="text-red-700 px-4 py-1 text-sm" role="alert">
                        <p class="text-sm">{{ $message }}</p>
                    </div>
                    @enderror
                </div>


                <div class="mb-4">
                    <label for="short_decr" class="leading-7 text-sm text-gray-600">Short Description</label>
                    <textarea name="short_descr" wire:model="shortDescription"
                              class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>

                    @error('shortDescription')
                    <div class="text-red-700 px-4 py-1 text-sm" role="alert">
                        <p class="text-sm">{{ $message }}</p>
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="descr" class="leading-7 text-sm text-gray-600">Description</label>
                    <textarea name="descr" wire:model="description"
                              class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>

                    @error('description')
                    <div class="text-red-700 px-4 py-1 text-sm" role="alert">
                        <p class="text-sm">{{ $message }}</p>
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="reg_price" class="leading-7 text-sm text-gray-600">Regular Price</label>
                    <input type="text" name="reg_price" wire:model="regularPrice"
                           class="w-full bg-white rounded border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

                    @error('regularPrice')
                    <div class="text-red-700 px-4 py-1 text-sm" role="alert">
                        <p class="text-sm">{{ $message }}</p>
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="stock" class="leading-7 text-sm text-gray-600">Stock</label>
                    <select name="stock" wire:model="stockStatus"
                            class="rounded border appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-green-200 focus:border-green-500 text-base pl-3 pr-10">
                        <option value="instock">InStock</option>
                        <option value="outofstock">Out of Stock</option>
                    </select>

                    @error('stockStatus')
                    <div class="text-red-700 px-4 py-1 text-sm" role="alert">
                        <p class="text-sm">{{ $message }}</p>
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="stock" class="leading-7 text-sm text-gray-600">Featured</label>
                    <select name="stock" wire:model="featured"
                            class="rounded border appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-green-200 focus:border-green-500 text-base pl-3 pr-10">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="qty" class="leading-7 text-sm text-gray-600">Quantity</label>
                    <input type="text" name="qty" wire:model="quantity"
                           class="w-full bg-white rounded border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

                    @error('quantity')
                    <div class="text-red-700 px-4 py-1 text-sm" role="alert">
                        <p class="text-sm">{{ $message }}</p>
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="image" class="leading-7 text-sm text-gray-600">Product Image</label>
                    <input type="file" name="image" class="outline-none" wire:model="newImage">

                    @if($newImage)
                        <img src="{{$newImage->temporaryUrl()}}" class="w-20 h-20 object-cover" />
                    @else
                        <img src="{{asset('storage/images/products/')}}/{{$imageName}}.png" class="w-20 h-20 object-cover" />
                    @endif

                    @error('newImage')
                    <div class="text-red-700 px-4 py-1 text-sm" role="alert">
                        <p class="text-sm">{{ $message }}</p>
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="stock" class="leading-7 text-sm text-gray-600">Category</label>
                    <select name="stock" wire:model="categoryId"
                            class="rounded border appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-green-200 focus:border-green-500 text-base pl-3 pr-10">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach

                    </select>

                    @error('categoryId')
                    <div class="text-red-700 px-4 py-1 text-sm" role="alert">
                        <p class="text-sm">{{ $message }}</p>
                    </div>
                    @enderror
                </div>

                <button type="submit"
                        class="w-full text-white bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded text-lg">
                    Update
                </button>
            </form>

            <a href="{{route('admin.products')}}" class="flex text-green-600 text-sm mt-10">

                <svg class="fill-current mr-2 text-green-600 w-4" viewBox="0 0 448 512">
                    <path
                        d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/>
                </svg>
                Back to products
            </a>
        </div>
    </div>
</section>

