<div class="h-screen">
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-12 mx-auto">
            <div class="flex flex-col text-center w-full mb-10">
                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Categories</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Banh mi cornhole echo park skateboard authentic
                    crucifix neutra tilde lyft biodiesel artisan direct trade mumblecore 3 wolf moon twee</p>
            </div>
            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
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
                                <td class="px-4 py-3">ADD DELETE</td>
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
