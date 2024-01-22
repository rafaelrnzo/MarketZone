@extends('layouts.master')
@section('content')
    <section class="bg-gray-50 dark:bg-gray-900 pt-24 px-4 md:px-12 lg:px-44 flex flex-col gap-4 ">
        <span class="text-2xl text-white">
            Hello, Welcome back {{Auth::user()->name}}!
        </span>
        <div class="max-w-screen">
            <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($products as $product)
                    <div
                        class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <img class="rounded-t-lg h-44 w-full object-cover"
                                src="{{ $product->thumbnail }} "
                                alt="product image"  />
                        </a>
                        <div class="px-5 py-5 flex flex-col gap-4 justify-between ">
                            <a href="#">
                                <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{$product->name}}</h5>
                            </a>
                            <div class="flex items-center justify-between w-full ">
                                <span class="text-2xl font-bold text-gray-900 dark:text-white">{{ $product->price }}k</span>
                                <div class="">

                                    <form action="{{ route('cart.add') }}" method="POST" class="w-full">
                                        @csrf
                                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                                        <input hidden value="1" min="1" name="quantity" type="number"
                                            class="shadow-lg border-[1.5px] border-slate-300 h-full w-12 pl-2 rounded-lg">
                                        <button type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                            <p class="font-semibold text-sm text-black ">Add to cart</p>
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
    </section>
@endsection
