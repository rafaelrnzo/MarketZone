@extends('layouts.admin')
@section('content')
    <div class="px-12 pt-16">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-white">Withdraw List</h1>
            <a href="{{ route('bank.tariktunai.new') }}"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">New
                WD</a>
        </div>
        @if (session('message'))
            @if (is_array(session('message')) && count(session('message')) > 1)
                <div role="alert" class="alert {{ session('message')[0] }} mb-8" id="warning">
                    <span>
                        TopUp Success
                    </span>
                </div>
            @endif
        @endif



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
                            Nominal
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tariktunais as $key => $wd)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-3">{{ $key + 1 }}</td>
                            <td class="px-6 py-3 ">{{ $wd->order_id }}</td>
                            <td class="px-6 py-3">{{ $wd->user->name }}</td>
                            <td class="px-6 py-3">{{ $wd->nominals }}</td>
                            <td class="px-6 py-3">
                                @if ($wd->status == 'confirmed')
                                    Confirmed
                                @elseif($wd->status == 'unconfirmed')
                                    Wait for confirm
                                @elseif($wd->status == 'rejected')
                                    Rejected
                                @endif
                            </td>
                            <td class="flex gap-2">
                                @if ($wd->status == 'unconfirmed')
                                    <form action="{{ route('bank.tariktunai.store') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $wd->id }}" name="wd_id">
                                        <input type="hidden" value="{{ $wd->user->id }}" name="user_id">
                                        <input type="hidden" name="nominals" value="{{ $wd->nominals }}">
                                        <button type="submit"
                                            class="bg-black px-4 p-1.5 text-white font-normal">Confirm</button>
                                    </form>
                                    <form action="{{ route('bank.tariktunai.reject') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $wd->id }}" name="wd_id">
                                        <button type="submit"
                                            class="border border-black px-4 p-1.5 text-black font-normal">Reject</button>
                                    </form>
                                @else
                                    <button
                                        class="success p-2 text-white font-semibold flex items-center gap-2 rounded-md text-center">
                                        <i class="fa-solid fa-circle-check text-black text-2xl"></i>
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('script')
    <script>
        setTimeout(() => {
            document.getElementById('warning').style.display = 'none';
        }, 5000);
    </script>
@endpush
