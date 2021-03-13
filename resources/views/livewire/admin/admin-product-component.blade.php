<div class="h-screen">
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-12 mx-auto">
            <div class="flex flex-col text-center w-full mb-5 mx-auto overflow-auto">
                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Products</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Banh mi cornhole echo park skateboard authentic
                    crucifix neutra tilde lyft biodiesel artisan direct trade mumblecore 3 wolf moon twee</p>
                <div class="flex justify-end w-full mt-2 mx-auto px-1">
                    <a href="{{route('admin.product.add')}}"
                       class="text-white bg-green-500 w-1/5 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded text-sm mr-6">
                        Add Product
                    </a>
                    <button
                        class="text-white bg-red-500 w-1/5 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded text-sm">
                        Delete All
                    </button>
                </div>
            </div>
            <div class="w-full mx-auto overflow-auto">
                @if(count($products) == 0 )
                    <div class="p-2 text-xl italic">
                        No products
                    </div>
                @else
                    @if(session()->has('message'))
                        <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3"
                             role="alert">
                            <p class="font-bold">Success</p>
                            <p class="text-sm">{{ session()->get('message') }}</p>
                        </div>
                    @endif
                    <table class="table-auto w-full text-left whitespace-no-wrap">
                        <thead>
                        <tr>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                                ID
                            </th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                                Image
                            </th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                                Name
                            </th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                                Stock
                            </th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                                Price
                            </th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                                Category
                            </th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Created Date
                            </th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Updated Date
                            </th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($products as $product)
                            <tr>
                                <td class="px-4 py-3">{{ $product->id }}</td>
                                <td class="px-4 py-3">
                                    <img src="{{ asset('storage/images/products/'.$product->image.'.png') }}"
                                         alt="{{$product->name}}" class="w-10 h-10 object-cover">
                                </td>
                                <td class="px-4 py-3">{{ $product->name }}</td>
                                <td class="px-4 py-3">{{ $product->stock_status }}</td>
                                <td class="px-4 py-3">{{ $product->regular_price }}</td>
                                <td class="px-4 py-3">{{ $product->category->name }}</td>
                                <td class="px-4 py-3">{{ $product->created_at }}</td>
                                <td class="px-4 py-3">{{ $product->updated_at }}</td>
                                <td class="px-4 py-3">
                                    <a href="{{route('admin.product.edit', ['productSlug' => $product->slug])}}">
                                        <i class="fa fa-edit fa-2x"></i>
                                    </a>
                                    <a href="#"
                                       onclick="confirm('Are you sure you want to delete this category?') || event.stopImmediatePropagation()"
                                       wire:click.prevent="delete({{$product->id}})" class="ml-1">
                                        <i class="fa fa-times fa-2x text-red-500"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="py-2">
                        {{ $products->links() }}
                    </div>
                @endif
            </div>
        </div>
    </section>
</div>
