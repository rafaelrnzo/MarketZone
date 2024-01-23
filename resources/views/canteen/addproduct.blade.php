@extends('layouts.admin')
@section('content')
    <div class="px-12 pt-16">

        <a href="{{ route('kantin.product.index') }}" class="underline text-white hover:text-blue-800">Back</a>
        <h1 class="text-3xl text-white font-semibold">Create New Product</h1>

        @if (session('message'))
            @if (is_array(session('message')) && count(session('message')) > 1)
                <div role="alert" class="alert alert-{{ session('message')[0] }} mt-3" id="warning">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>
                        {{ session('message')[1] }}
                    </span>
                </div>
            @endif
        @endif

        <div class="w-full  py-4">
            <form action="{{ route('kantin.addproduct.store') }}" method="POST" class="flex flex-col gap-4 w-full"
                enctype="multipart/form-data">
                @csrf

                <div class="mb-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                        Name</label>
                    <input type="text" name="name" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Enter product name..." required>
                </div>

                <div class="mb-2">
                    <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
                    <input type="number" name="stock" id="stock"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Enter product stock..." required>
                </div>


                <div class="">

                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                        option</label>
                    <select id="category" name="category"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option disabled selected>Choose a Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ Str::ucfirst($category->name) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-2">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">price</label>
                    <input type="number" name="harga" id="price"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Enter product price..." required>
                </div>

                <div class="mb-2">
                    <label for="Desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Desc</label>
                    <textarea id="Desc" name="deskripsi" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write your thoughts here..."></textarea>

                </div>


                <div class="mb-2">
                    <label for="Thumbnail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Thumbnail</label>
                    <input type="text" name="thumbnail" id="Thumbnail"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Enter URL Thumbnail..." required>
                </div>
                {{-- <div class="flex flex-col gap-2">
                    <label for="">Thumbnail</label>
                    <input name="image" class="input input-bordered" type="file" placeholder="Input Thumbnail">
                </div> --}}
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Confirm</button>

            </form>
        </div>
    </div>

    @push('script')
        <script>
            setTimeout(() => {
                document.getElementById('warning').style.display = 'none';
            }, 5000);
        </script>
    @endpush

@endsection
