@extends('layouts.master')
@section('content')
    <div class="pt-24 lg:px-44">

        <div class="flex w-full gap-4">
            <div
                class="w-1/4 block max-w-sm max-h-28 p-6 bg-white border border-gray-200 rounded-md shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <div class="top-left">

                    <div class="profile flex items-center gap-5">
                        <div class="description text-white w-full">
                            <div class="h-auto flex w-full justify-between">
                                <h1 class="text-xl font-semibold">{{ Str::ucfirst(Auth::user()->name) }}</h1>
                                <a href="{{ route('logout') }}">Logout</a>
                            </div>
                            {{-- <p>Joined Date: {{ Auth::user()->created_at }}</p> --}}
                            <p class="text-2xl font-semibold">{{ Auth::user()->wallet->credit }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col w-3/4">
                <div class=" gap-4 w-full flex flex-col">

                    <div
                        class="w-full block max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">

                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">History
                            Transaction</h5>
                        @if (count($transactions))
                            <div class="grid grid-cols-1 mt-2">
                                @foreach ($transactions as $date => $transactionGroup)
                                    <h2 class="my-2 text-white">{{ $date }}</h2>
                                    <div class="grid grid-cols-1 my-3 gap-2 bg-white rounded-md overflow-hidden shadow-md">
                                        @foreach ($transactionGroup as $transaction)
                                            <div class="p-3 h-fit w-full border-b-[1px]  ">
                                                <div class="card-body ">
                                                    <p class="text-xl font-semibold">{{ $transaction->product->name }}</p>
                                                    <p>{{ $transaction->product->price }} x
                                                        {{ $transaction->quantity }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div role="alert" class="alert mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    class="stroke-info shrink-0 w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Belum Ada Transaksi Untuk Saat Ini</span>
                            </div>
                        @endif
                    </div>

                    <div
                        class="w-full block max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">

                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Top Up</h5>
                        @if (count($transactions))
                            <div class="grid grid-cols-1 mt-2">
                                @foreach ($topups as $date => $topupGroup)
                                    <h2 class="my-2 text-white">{{ $date }}</h2>
                                    <div class="grid grid-cols-1 my-3 gap-2 bg-white rounded-md overflow-hidden shadow-md">
                                        @foreach ($topupGroup as $topup)
                                            <div class="p-3 h-fit w-full border-b-[1px] flex justify-between items-center ">
                                                <div class="card-body ">
                                                    <p class="text-xl font-semibold">{{ $topup->order_id }}</p>
                                                    <p class="text-xl font-semibold text-green-700">
                                                        + {{ $topup->nominals }}
                                                    </p>
                                                </div>
                                                <div class="body-right">
                                                    @if ($topup->status == 'unconfirmed')
                                                        <span
                                                            class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                                            Unconfirmed
                                                        </span>
                                                    @elseif($topup->status == 'confirmed')
                                                        <span
                                                            class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                                            Confirmed
                                                        </span>
                                                    @elseif($topup->status == 'rejected')
                                                        <span
                                                            class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                                            Rejected
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div role="alert" class="alert mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    class="stroke-info shrink-0 w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Nothing..</span>
                            </div>
                        @endif
                    </div>

                    <div
                        class="w-full block max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">

                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Withdraw</h5>
                        @if (count($tariktunais))
                            <div class="grid grid-cols-1 mt-2">
                                @foreach ($tariktunais as $date => $tarikTunaiGroup)
                                    <h2 class="my-2 text-white">{{ $date }}</h2>
                                    <div class="grid grid-cols-1 my-3 gap-2 bg-white rounded-md overflow-hidden shadow-md">
                                        @foreach ($tarikTunaiGroup as $tarikTunai)
                                            <div class="p-3 h-fit w-full border-b-[1px] flex justify-between items-center ">
                                                <div class="card-body ">
                                                    <p class="text-xl font-semibold">{{ $tarikTunai->order_id }}</p>
                                                    <p class="text-xl font-semibold text-green-700">
                                                        + {{ $tarikTunai->nominals }}
                                                    </p>
                                                </div>
                                                <div class="body-right">
                                                    @if ($tarikTunai->status == 'unconfirmed')
                                                        <span
                                                            class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                                            Unconfirmed
                                                        </span>
                                                    @elseif($tarikTunai->status == 'confirmed')
                                                        <span
                                                            class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                                            Confirmed
                                                        </span>
                                                    @elseif($tarikTunai->status == 'rejected')
                                                        <span
                                                            class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                                            Rejected
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div role="alert" class="alert mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    class="stroke-info shrink-0 w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Nothing..</span>
                            </div>
                        @endif
                    </div>

                   
                </div>
            </div>
        </div>




    </div>

@endsection
