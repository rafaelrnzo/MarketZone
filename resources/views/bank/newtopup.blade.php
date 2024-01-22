@extends('layouts.admin')
@section('content')
    <div class="px-12 pt-16">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-white">New Top Up</h1>
            <a href="{{ route('bank.topup.index') }}" class="underline text-white hover:text-blue-800">Back</a>
        </div>
        <div class="w-full  ">
            <form action="{{ route('bank.topup.post') }}" method="POST" class="flex flex-col gap-4 w-full"
                enctype="multipart/form-data">
                @csrf

                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nominal</label>
                    <input type="nominals" id="nominals" name="nominals"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Input Nominals" required>
                </div>
                <div class="">

                    <label for="default" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User</label>
                    <select id="default" name="user"
                        class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose User</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ Str::ucfirst($user->name) }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Confirm</button>

            </form>
        </div>

    </div>
@endsection

{{-- @extends('layouts.admin')
@section('content')
    <div class="px-12 p-6">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-xl font-semibold">New Topup </h1>
            <a href="{{ route('bank.topup.index') }}" class="underline">Back</a>
        </div>
        <div class="w-full bg-white ">
            <form action="{{ route('bank.topup.post') }}" method="POST" class="flex flex-col gap-4 w-full"
                enctype="multipart/form-data">
                @csrf
                <div class="flex gap-1 flex-col">
                    <label for="" class="text-sm font-bold text-black/50">Nominal</label>
                    <input required name="nominals" type="text" class="input input-bordered w-full"
                        placeholder="Input Nominal">
                </div>
                <select required class="select select-bordered w-full p-2" name="user">
                    <option disabled selected>Choose User</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ Str::ucfirst($user->name) }}</option>
                    @endforeach
                </select>
                <button class="bg-black text-white text-semibold py-2.5">
                    Submit
                </button>
            </form>
        </div>

    </div>
@endsection --}}
