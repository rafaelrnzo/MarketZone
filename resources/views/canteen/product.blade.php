@extends('layouts.admin')
@section('content')
    <div class="px-12 pt-16">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl text-white font-semibold">Product List ({{ $products->count() }}) </h1>

            <a href="{{ route('kantin.addproduct.index') }}"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                New Product</a>
        </div>
        <div class="overflow-x-auto w-full">
            <table class=" bg-white w-full ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="">
                        <th scope="col" class="px-6 py-3" align="left">
                        </th>
                        <th scope="col" class="px-6 py-3" align="left">
                            Thumbnail
                        </th>
                        <th scope="col" class="px-6 py-3" align="left">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3" align="left">
                            Stock
                        </th>
                        <th scope="col" class="px-6 py-3" align="left">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3" align="left">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3" align="left">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3" align="left">
                            Action
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $product)
                        <tr class="text-white bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap ">
                                {{ $key + 1 }}
                            </th>
                            <td class="px-6 py-4">
                                <div class="overflow-hidden ">
                                    <img class="w-32 h-32 object-cover rounded-md" src="{{ asset($product->thumbnail) }}"
                                        alt="">
                                </div>
                            </td>
                            <td class="px-6 py-1">{{ $product->name }}</td>
                            <td class="px-6 py-1">{{ $product->stock }}</td>
                            <td class="px-6 py-1">{{ $product->category->name }}</td>
                            <td class="px-6 py-1">{{ $product->price }}</td>
                            <td class="px-6 py-1">{{ $product->description }}</td>
                            <td class="flex gap-2 px-6 py-1 items-center  ">
                                <form action="{{ route('kantin.deleteproduct', $product->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-error text-red-500"
                                        onclick="return confirm('Yakin Mau Delete?')">
                                        Delete
                                    </button>
                                </form>
                                <a class="btn btn-warning text-blue-500"
                                    href="{{ route('kantin.editproduct', $product->id) }}">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
