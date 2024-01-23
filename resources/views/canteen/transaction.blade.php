@extends('layouts.admin')
@section('content')
    <div class="px-12 pt-16">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-white">Transactions List</h1>
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
                        {{-- <th scope="col" class="px-6 py-3" align="left">
                            </th> --}}
                        <th scope="col" class="px-6 py-3" align="left">
                            Order ID
                        </th>
                        <th scope="col" class="px-6 py-3" align="left">
                            User
                        </th>
                        <th scope="col" class="px-6 py-3" align="left">
                            Product
                        </th>
                        <th scope="col" class="px-6 py-3" align="left">
                            Date
                        </th>
                        <th scope="col" class="px-6 py-3" align="left">
                            Status
                        </th>
                        {{-- <th scope="col" class="px-6 py-3" align="left">
                                Action
                            </th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $date => $transaction)
                        <tr class="hidden">
                            <td rowspan="{{ count($transaction) }}">{{ $date }}</td>
                            @foreach ($transaction as $index => $per_transaction)
                                @if ($index > 0)
                        </tr>
                    @endif
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ $per_transaction->order_id }}</td>
                        <td class="px-6 py-4">{{ $per_transaction->user->name }}</td>
                        <td class="px-6 py-4">{{ $per_transaction->product->name }}</td>
                        <td class="px-6 py-4">{{ $per_transaction->created_at }}</td>
                        <td class="px-6 py-4">
                            @if ($per_transaction->status == 'taken')
                                <p>Diambil</p>
                            @elseif($per_transaction->status == 'paid')
                                <p>Dibayar</p>
                            @endif

                        </td>
                        {{-- @if ($index === 0)
                                <td class="flex gap-2" rowspan="{{ count($transaction) }}">
                                    <a href="{{ route('admin.transaction.print', ['date' => $date, 'user_id' => $per_transaction->user->id]) }}"
                                        class="btn btn-error text-black">
                                     kdjasijdias
                                    </a>
                                </td>
                            @endif --}}
                        @endforeach
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
