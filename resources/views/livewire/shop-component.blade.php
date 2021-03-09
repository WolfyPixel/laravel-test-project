<div class="min-h-screen py-4 text-3xl">
    <h3 class="pl-3">Products</h3>

    <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap -m-4">
            @foreach($products as $product)
            <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a class="block h-48 rounded overflow-hidden">
                    <img alt="{{$product->name}}" class="object-cover object-center w-full h-full block"
                         src="storage/images/products/{{ $product->image }}.png">
                </a>
                <div class="mt-4">
                    <div class="flex justify-between">
                        <div><h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
                            <h2 class="text-gray-900 title-font text-lg font-medium">{{ $product->name }}</h2>
                            <p class="mt-1">{{ $product->real_price }}</p></div>
                        <div>
                            <button class="text-lg bg-yellow-400 text-white p-1 rounded">Add to Cart</button>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>

    </section>
    {{ $products->links() }}
</div>

