@extends('layouts.navbar')
@section('content')

<div class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">History</h1>

        <div class="overflow-x-auto">
            <table class="table-auto border-collapse border border-gray-400 bg-white">
                <thead>
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Reference</th>
                        <th class="px-4 py-2">Detail</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Total</th>
                        <th class="px-4 py-2">Dibayar</th>
                    </tr>
                </thead>
                <tbody>
                    @if($history)
                        @php $i = 1 @endphp
                        @foreach($history as $item)
                            @php
                                $status = 'pending';
                                if ($item->Status === '00') {
                                    $status = 'sukses';
                                } elseif ($item->Status === '01') {
                                    $status = 'failed';
                                }
                            @endphp
                            <tr>
                                <td class="border px-4 py-2">{{ $i }}</td>
                                <td class="border px-4 py-2">{{ $item->Reference }}</td>
                                <td class="border px-4 py-2">{{ $item->detail }}</td>
                                <td class="border px-4 py-2">{{ ucfirst($status) }}</td>
                                <td class="border px-4 py-2">Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                                <td class="border px-4 py-2">Rp {{ number_format($item->Dibayar, 0, ',', '.') }}</td>
                            </tr>
                            @php $i++ @endphp
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="border px-4 py-2 text-center">No data available</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
