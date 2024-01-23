@extends('layouts.admin')
@section('content')
    <div class="p-12 pt-16 w-full h-auto">

        <h1 class="text-3xl font-semibold text-white">Product Admin</h1>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-3 mt-4 shadow-sm">
            <div class="w-full">

                <a href="#"
                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total Transactions</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">
                        {{ count($transactions) }}</p>
                </a>
            </div>
            <div class="w-full">

                <a href="#"
                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total Products</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">
                        {{ count($products) }}</p>
                </a>
            </div>
            <div class="w-full">

                <a href="#"
                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total WD</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">
                        {{ count($transactions) }}</p>
                </a>
            </div>
        </div>
        <div class="h-auto w-full">
            <p class="text-2xl font-semibold mt-4 mb-4 text-white">Transaction</p>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                            </th>
                            <th scope="col" class="px-6 py-3">
                                User
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Product
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Transaction Date
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $key => $transaction)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap ">
                                    {{ $key + 1 }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $transaction->user->name }}

                                </td>
                                <td class="px-6 py-4">
                                    {{ $transaction->product->name }}

                                </td>
                                <td class="px-6 py-4">
                                    {{ $transaction->created_at }}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class="h-auto w-full">
            <p class="text-2xl font-semibold mt-4 mb-4 text-white">Products</p>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Stock
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $product)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap ">
                                    {{ $key + 1 }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $product->name }}

                                </td>
                                <td class="px-6 py-4">
                                    {{ $product->stock }}

                                </td>
                                <td class="px-6 py-4">
                                    {{ $product->category->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $product->price }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $product->description }}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>
    </div>
@endsection
