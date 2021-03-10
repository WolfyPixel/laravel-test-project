<div class="min-h-screen py-4">
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
            </div>
        </div>
        {{ $products->links() }}
    </section>

</div>

