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
                <div class=" gap-6 ">
                    <div class="transaction-history">
                        <p class="mt-6 text-xl font-semibold">
                            Riwayat Transaksi
                        </p>
                        @if (count($transactions))
                            <div class="grid grid-cols-1 mt-2">
                                @foreach ($transactions as $date => $transactionGroup)
                                    <h2 class="my-2">{{ $date }}</h2>
                                    <div class="grid grid-cols-1 my-3 gap-2 bg-white rounded-md overflow-hidden shadow-md">
                                        @foreach ($transactionGroup as $transaction)
                                            <div class="card card-side h-fit w-full border-b-[1px] rounded-[0px] py-1">
                                                <div class="card-body py-3">
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
                    <div class="topup-history">
                        <p class="mt-6 text-xl font-semibold">
                            Riwayat Top Up
                        </p>
                        @if (count($topups))
                            <div class="grid grid-cols-1 mt-2">
                                @foreach ($topups as $date => $topupGroup)
                                    <h2 class="my-2">{{ $date }}</h2>
                                    <div class="grid grid-cols-1 my-3 bg-white rounded-md shadow-md overflow-hidden">
                                        @foreach ($topupGroup as $topup)
                                            <div
                                                class="card card-side h-fit shadow-lg w-full border-b-[1px] rounded-[0px] py-1">
                                                <div class="card-body">
                                                    <div class="body-wrappers flex justify-between items-center">
                                                        <div class="body-left">
                                                            <p>
                                                                {{ $topup->order_id }}
                                                            </p>
                                                            <p class="text-xl font-semibold text-green-500">
                                                                + {{ $topup->nominals }}
                                                            </p>
                                                        </div>
                                                        <div class="body-right">
                                                            @if ($topup->status == 'unconfirmed')
                                                                <div class="bg-red-400 px-3 py-1 rounded-md text-white">
                                                                    Belum Dikonfirmasi
                                                                </div>
                                                            @elseif($topup->status == 'confirmed')
                                                                <div class="bg-green-400 px-3 py-1 rounded-md text-white">
                                                                    Terkonfirmasi
                                                                </div>
                                                            @elseif($topup->status == 'rejected')
                                                                <div class="bg-red-400 px-3 py-1 rounded-md text-white">
                                                                    Ditolak
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

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
                                <span>Belum Ada Top Up Untuk Saat Ini</span>
                            </div>
                        @endif

                    </div>
                    <div class="tariktunai-history">
                        <p class="mt-6 text-xl font-semibold">
                            Riwayat Tarik Tunai
                        </p>

                        @if (count($tariktunais))
                            <div class="grid grid-cols-1 mt-2">
                                @foreach ($tariktunais as $date => $tarikTunaiGroup)
                                    <h2 class="my-2">{{ $date }}</h2>
                                    <div class="grid grid-cols-1 my-3 bg-white rounded-md shadow-md overflow-hidden">
                                        @foreach ($tarikTunaiGroup as $tarikTunai)
                                            <div
                                                class="card card-side h-fit shadow-lg w-full border-b-[1px] rounded-[0px] py-1">
                                                <div class="card-body">
                                                    <div class="body-wrappers flex justify-between items-center">
                                                        <div class="body-left">
                                                            <p>
                                                                {{ $topup->order_id }}
                                                            </p>
                                                            <p class="text-xl font-semibold text-red-500">
                                                                - {{ $tarikTunai->nominals }}
                                                            </p>
                                                        </div>
                                                        <div class="body-right">
                                                            @if ($tarikTunai->status == 'unconfirmed')
                                                                <div class="bg-red-400 px-3 py-1 rounded-md text-white">
                                                                    Belum Dikonfirmasi
                                                                </div>
                                                            @elseif($tarikTunai->status == 'confirmed')
                                                                <div class="bg-green-400 px-3 py-1 rounded-md text-white">
                                                                    Terkonfirmasi
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

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
                                <span>Belum Ada Tarik Tunai Untuk Saat Ini</span>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>




    </div>

@endsection
