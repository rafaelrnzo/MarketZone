@extends('layouts.admin')
@section('content')
    <div class="px-12 pt-16">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-white">TopUp List</h1>
            <a href="{{ route('bank.topup.new') }}"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">New
                Top Up</a>
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
                            Order ID
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
                    @foreach ($topups as $key => $topup)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-3">{{ $key + 1 }}</td>
                            <td class="px-6 py-3 ">{{ $topup->order_id }}</td>
                            <td class="px-6 py-3">{{ $topup->user->name }}</td>
                            <td class="px-6 py-3">{{ $topup->nominals }}</td>
                            <td class="px-6 py-3">
                                @if ($topup->status == 'confirmed')
                                    Confirmed
                                @elseif($topup->status == 'unconfirmed')
                                    Wait for confirm
                                @elseif($topup->status == 'rejected')
                                    Rejected
                                @endif
                            </td>
                            <td class="flex gap-2">
                                @if ($topup->status == 'unconfirmed')
                                    <div class="">

                                    </div>
                                    <div class="flex justify-center items-center my-1 gap-2">
                                        <form action="{{ route('bank.topup.store') }}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{ $topup->id }}" name="topup_id">
                                            <input type="hidden" value="{{ $topup->user->id }}" name="user_id">
                                            <input type="hidden" name="nominals" value="{{ $topup->nominals }}">
                                            <button type="submit"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                                Confirm
                                            </button>
                                        </form>
                                        <form action="{{ route('bank.topup.reject') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $topup->id }}" name="topup_id">
                                            <button type="submit"
                                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Reject</button>
                                        </form>
                                    </div>
                                @else
                                    <button
                                        class="success p-2 text-white font-semibold flex items-center gap-2 rounded-md text-center">
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">Success</span>

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
