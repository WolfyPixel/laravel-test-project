<section class="min-h-screen text-gray-600 body-font overflow-hidden">
    <div class="container px-5 py-12 mx-auto">
        <div class="lg:w-4/5 mx-auto flex flex-wrap">
            <img src="{{asset('/storage/images/products/'.$product->image.'.png')}}"
                 alt="{{ $product->name }}"
                 class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded"
            >
            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                <h2 class="text-sm title-font text-gray-500 tracking-widest">{{ $product->category->name }}</h2>
                <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $product->name }}</h1>

                <p class="leading-relaxed">{{ $product->description }}</p>
                <br>
                <h3>Quantity available: {{ $product->quantity }}</h3>

                <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-100 mb-5">
                </div>

                <div class="flex">
                    <span class="title-font font-medium text-2xl text-gray-900">${{ $product->regular_price }}</span>
                    <button class="flex ml-auto text-white bg-yellow-500 border-0 py-2 px-6
                    focus:outline-none hover:bg-yellow-600 rounded"
                    wire:click.prevent="store({{$product->id}}, '{{$product->name}}', {{$product->regular_price}})">
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap w-full mb-16">
            <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Related Products</h1>
                <div class="h-1 w-20 bg-green-500 rounded"></div>
            </div>
            <p class="lg:w-1/2 w-full leading-relaxed text-gray-500">Whatever cardigan tote bag tumblr hexagon
                brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard
                of them man bun deep jianbing selfies heirloom prism food truck ugh squid celiac humblebrag.</p>
        </div>
        <div class="flex flex-wrap -m-4">
            @foreach($relatedProducts as $product)
                <div class="xl:w-1/4 md:w-1/2 p-4">
                    <div class="bg-gray-100 p-6 rounded-lg">
                        <a href="{{ route('product.details', ['slug' => $product->slug]) }}">
                            <img class="h-40 rounded w-full object-cover object-center mb-6"
                                 src="{{ asset('storage/images/products/'.$product->image.'.png') }}"
                                 alt="{{$product->name}}">
                        </a>
                        <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">
                            {{ $product->category->name }}
                        </h3>
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-4">{{ $product->name }}</h2>
                        <p class="leading-relaxed text-base">
                            {{ $product->short_description }}
                        </p>
                        <div class="mt-4">
                            <div class="flex justify-between">
                                <div>
                                    <p class="mt-1">${{ $product->regular_price }}</p>
                                </div>
                                <div>
                                    <button
                                        class="flex ml-auto text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
