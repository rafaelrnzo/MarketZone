@extends('layouts.master')
@section('content')
    <div class="p-12 lg:px-44 pt-32 px mx-auto">
        <div class="flex items-center justify-between py-2">
            <h1 class="font-semibold text-4xl text-white">Your Cart</h1>
            <a href="{{ route('index') }}" class=" ">
                <p
                    class=" text-white underline underline-offset-2c:\Users\acer\usk_fintech\resources\views\profile.blade.php">
                    Continue Shopping
                </p>
            </a>
        </div>
        <div class="flex justify-between gap-8">
            <div class="grid grid-cols-1 gap-3 w-full ">
                <div class="border-b border-gray-200 py-2 flex justify-between">
                    <p class="text-sm text-white">Product</p>
                    <p class="text-sm text-white">Total Price</p>
                </div>
                @if (count($transactions))
                    @foreach ($transactions as $transaction)
                        <div class="flex justify-start gap-8">
                            <div class="overflow-hidden  ">
                                <img class="object-cover w-[140px] h-[140px] "
                                    src="{{ $transaction->product->thumbnail }}" />
                            </div>
                            <div class="flex gap-2 flex-col w-full">
                                <p class="font-bold text-lg text-white">{{ $transaction->product->name }}</p>
                                <div class="flex justify-between w-full">

                                    <p class="font-normal text-lg text-white">{{ $transaction->product->price }} x
                                        {{ $transaction->quantity }}</p>
                                    <p class="font-normal text-lg text-white    ">{{ $transaction->total_price }}</p>
                                </div>
                                <div class="">
                                    <form action="{{ route('cart.delete', $transaction->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-error text-white">
                                            <i class="fa-solid fa-trash text-black"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                <p class="text-white text-lg">No Product in Cart!</p>
                @endif
            </div>
            <div class=" w-1/4">
                <div class=" w-full max-h-full gap-2 flex flex-col  mt-2 rounded-lg">
                    <div class="flex justify-between items-center">
                        <p class="title font-semibold text-lg text-white">
                            Total Price
                        </p>
                        <p class="price text-2xl font-normal text-white">
                            {{ $total_prices_all }}
                        </p>
                    </div>
                    <div class="button">
                        <form action="{{ route('cart.pay') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $total_prices_all }}" name="total_prices">
                            <button type="submit" class="bg-blue-800 rounded-md w-full py-2">
                                <p class="text-white">
                                    Pay Now
                                </p>
                            </button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>




@endsection
