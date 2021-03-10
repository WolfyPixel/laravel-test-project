<div class="h-screen">
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-12 mx-auto">
            <div class="flex flex-col text-center w-full mb-5 mx-auto overflow-auto">
                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Categories</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Banh mi cornhole echo park skateboard authentic
                    crucifix neutra tilde lyft biodiesel artisan direct trade mumblecore 3 wolf moon twee</p>
                <div class="flex justify-end w-full mt-2 mx-auto px-1">
                    <a href="{{route('admin.category.add')}}" class="text-white bg-green-500 w-1/5 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded text-sm mr-6">
                            Add Category
                    </a>
                    <button
                        class="text-white bg-red-500 w-1/5 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded text-sm">
                        Delete All
                    </button>
                </div>
            </div>
            <div class="w-full mx-auto overflow-auto">
                @if(count($categories) == 0 )
                    <div class="p-2 text-xl italic">
                        No categories
                    </div>
                @else
                    <table class="table-auto w-full text-left whitespace-no-wrap">
                        <thead>
                        <tr>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                                ID
                            </th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Category Name
                            </th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Slug
                            </th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($categories as $category)
                            <tr>
                                <td class="px-4 py-3">{{ $category->id }}</td>
                                <td class="px-4 py-3">{{ $category->name }}</td>
                                <td class="px-4 py-3">{{ $category->slug }}</td>
                                <td class="px-4 py-3">
                                    <a href="{{route('admin.category.edit', ['categorySlug' => $category->slug])}}">
                                        <i class="fa fa-edit fa-2x"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="py-2">
                        {{ $categories->links() }}
                    </div>
                @endif
            </div>
        </div>
    </section>
</div>
