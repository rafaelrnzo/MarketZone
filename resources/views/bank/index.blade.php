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
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap ">
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
        </div>
        <div class="">
            <p class="text-2xl text-white font-semibold mt-4 mb-4 ">Top Up</p>

            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
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
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
