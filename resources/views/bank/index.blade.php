@extends('layouts.admin')
@section('content')
    <div class="px-12 pt-16">

        <h1 class="text-3xl text-white font-semibold">Bank</h1>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-3 mt-4 shadow-sm">
            <div class="w-full">

                <a href="#"
                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total TopUp</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">
                        {{ count($topups) }}</p>
                </a>
            </div>
            <div class="w-full">

                <a href="#"
                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total WD</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">
                        {{ count($tariktunais) }}</p>
                </a>
            </div>
            <div class="w-full">

                <a href="#"
                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total WD</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">
                        {{ count($tariktunais) }}</p>
                </a>
            </div>
        </div>


        <div class="">
            <p class="text-2xl text-white font-semibold mt-4 mb-4 ">Top Up</p>

            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Product name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Color
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Apple MacBook Pro 17"
                            </th>
                            <td class="px-6 py-4">
                                Silver
                            </td>
                            <td class="px-6 py-4">
                                Laptop
                            </td>
                            <td class="px-6 py-4">
                                $2999
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Microsoft Surface Pro
                            </th>
                            <td class="px-6 py-4">
                                White
                            </td>
                            <td class="px-6 py-4">
                                Laptop PC
                            </td>
                            <td class="px-6 py-4">
                                $1999
                            </td>
                        </tr>
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Magic Mouse 2
                            </th>
                            <td class="px-6 py-4">
                                Black
                            </td>
                            <td class="px-6 py-4">
                                Accessories
                            </td>
                            <td class="px-6 py-4">
                                $99
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <div class="relative overflow-x-auto">

            <table class="w-full text-sm text-left text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            User
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nominal
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($topups as $key => $topup)
                        <tr class="bg-white border-b ">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                {{ $key + 1 }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $topup->created_at }}

                            </td>
                            <td class="px-6 py-4">
                                {{ $topup->user->name }}

                            </td>
                            <td class="px-6 py-4">
                                {{ $topup->nominals }}

                            </td>
                            <td class="px-6 py-4">
                                {{ $topup->status }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="relative overflow-x-auto">
            <p class="text-xl font-semibold mt-4 mb-4">WithDraw</p>

            <table class="w-full text-sm text-left text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            User
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nominal
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($tariktunais5 as $key => $tariktunai)
                        <tr class="bg-white border-b ">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                {{ $key + 1 }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $tariktunai->created_at }}

                            </td>
                            <td class="px-6 py-4">
                                {{ $tariktunai->user->name }}

                            </td>
                            <td class="px-6 py-4">
                                {{ $tariktunai->nominals }}

                            </td>
                            <td class="px-6 py-4">
                                {{ $tariktunai->status }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
