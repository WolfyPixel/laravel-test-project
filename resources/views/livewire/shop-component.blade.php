<div class="min-h-screen py-4">
    <div class="container mx-auto flex px-5 py-5 flex-col items-center">
        <div
            class="pr-6 w-full flex flex-col items-center text-center">
            <div class="flex w-4/5 lg:justify-center md:justify-start justify-center items-end">
                <div class="mr-4 w-full">
                    <input wire:model.debounce.500ms="search"
                           type="text" name="search-field" placeholder="Search"
                           class="w-full bg-gray-100 rounded border bg-opacity-50 border-gray-300 focus:ring-2 focus:ring-green-200 focus:bg-transparent focus:border-green-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>

            </div>
        </div>
    </div>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-8 mx-auto">
            <div class="flex flex-wrap w-full mb-10">
                <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Our Products</h1>
                    <div class="h-1 w-20 bg-green-500 rounded"></div>
                </div>
                <p class="lg:w-1/2 w-full leading-relaxed text-gray-500">Chillwave portland ugh, knausgaard fam polaroid
                    iPhone. Man braid swag typewriter affogato, hella selvage wolf narwhal dreamcatcher.</p>
            </div>
            <div class="mb-8">
                <select name="orderby" wire:model="sorting">
                    <option value="default" selected="selected">Default sorting</option>
                    <option value="date">Sort by newness</option>
                    <option value="price">Sort by price: low to high</option>
                    <option value="price-desc">Sort by price: high to low</option>
                </select>
                <select name="category" wire:model="categorySlug">
                    <option value="no-category" selected="selected">Choose category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->slug }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="flex flex-wrap -m-4 mt-3">
                @if($products->count())
                    @foreach($products as $product)
                        <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                            <a class="block h-48 rounded overflow-hidden"
                               href="{{ route('product.details', ['slug' => $product->slug]) }}">
                                <img alt="{{$product->name}}" class="object-cover object-center w-full h-full block"
                                     src="{{asset('/storage/images/products/'.$product->image.'.png')}}">
                            </a>
                            <div class="mt-4">
                                <div class="flex justify-between">
                                    <div><h3
                                            class="text-gray-500 text-xs tracking-widest title-font mb-1">{{ $product->category->name }}</h3>
                                        <h2 class="text-gray-900 title-font text-lg font-medium">{{ $product->name }}</h2>
                                        <p class="mt-1">${{ $product->regular_price }}</p></div>
                                    <div class="flex flex-col-reverse">
                                        <button class="flex ml-auto text-white bg-yellow-500 border-0 py-2 px-6
                                                focus:outline-none hover:bg-yellow-600 rounded"
                                                wire:click.prevent="store({{$product->id}}, '{{$product->name}}', {{$product->regular_price}})">
                                            Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="pt-30">No Products</p>
                @endif
            </div>
        </div>
        {{ $products->links() }}
    </section>

</div>

