<div class="h-screen flex justify-center">
    <div class="w-3/5 bg-white flex flex-col md:py-8 mt-8 md:mt-0">
        <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Edit Category</h2>
        @if(session()->has('message'))
            <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3" role="alert">
                <p class="font-bold">Success</p>
                <p class="text-sm">{{ Session::get('message') }}</p>
            </div>
        @endif
        <form wire:submit.prevent="update">
            <div class="mb-4">
                <label for="name" class="leading-7 text-sm text-gray-600">Category Name</label>
                <input type="text" name="name" wire:model="name" wire:change.lazy="generateSlug"
                       class="w-full bg-white rounded border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

                @error('name')
                <div class="text-red-700 px-4 py-1 text-sm" role="alert">
                    <p class="text-sm">{{ $message }}</p>
                </div>
                @enderror

            </div>
            <div class="mb-4">
                <label for="slug" class="leading-7 text-sm text-gray-600">Category Slug</label>
                <input type="text" name="slug" placeholder="{{$slug}}" disabled
                       class="w-full bg-white rounded border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

                @error('slug')
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

        <a href="{{route('admin.categories')}}" class="flex text-green-600 text-sm mt-10">

            <svg class="fill-current mr-2 text-green-600 w-4" viewBox="0 0 448 512">
                <path
                    d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/>
            </svg>
            Back to categories
        </a>
    </div>
</div>
