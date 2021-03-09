<section class="text-gray-600 body-font">
    <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
        <div
            class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Before they sold out
                <br class="hidden lg:inline-block">readymade gluten
            </h1>
            <p class="mb-8 leading-relaxed">Copper mug try-hard pitchfork pour-over freegan heirloom neutra air plant
                cold-pressed tacos poke beard tote bag. Heirloom echo park mlkshk tote bag selvage hot chicken authentic
                tumeric truffaut hexagon try-hard chambray.</p>
            <div class="flex justify-center">
                <div>
                    <button
                        class="text-xl flex ml-auto text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded">
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
            <a href="{{ route('product.details', ['slug' => $featuredProduct->slug]) }}">
                <img class="object-cover object-center rounded" alt="{{ $featuredProduct->name }}"
                 src="{{ asset('storage/images/products/'.$featuredProduct->image.'.png') }}">
            </a>
        </div>
    </div>
</section>

<section class="min-h-screen flex justify-center py-4 text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap w-full mb-20">
            <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Popular Products</h1>
                <div class="h-1 w-20 bg-green-500 rounded"></div>
            </div>
            <p class="lg:w-1/2 w-full leading-relaxed text-gray-500">Whatever cardigan tote bag tumblr hexagon
                brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard
                of them man bun deep jianbing selfies heirloom prism food truck ugh squid celiac humblebrag.</p>
        </div>
        <div class="flex flex-wrap -m-4">
            @foreach($popularProducts as $product)
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

