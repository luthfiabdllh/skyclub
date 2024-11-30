@extends('layouts.admin')

@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Daftar Pesanan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Pemesan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Pesanan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga Total
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Bukti Pembayaran
                    </th>
                    <th scope="col" class="px-6 py-3">
                        persetujuan
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($bookings as $booking)
                    <tr>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            @foreach ($booking->listBooking as $listBooking)
                                {{ $listBooking->formatted_date . ' | ' . $listBooking->formatted_session }}
                                <br>
                            @endforeach
                        </td>
                        <td class="px-6 py-4">
                            {{ $booking->rentedBy->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $booking->formatted_order_date }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $booking->getTotalPriceAfterDiscountAttribute() }}
                        </td>
                        <td class="px-6 py-4">
                            <img src="{{ route('booking.paymentImage', basename($booking->uploud_payment)) }}"
                                width="100px" alt="">
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('admin.acceptBooking', $booking->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <button class="font-medium text-blue-600 dark:text-lime-500 hover:underline">Terima</button>
                            </form>
                            <form action="{{ route('admin.rejectBooking', $booking->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <button class="font-medium text-blue-600 dark:text-lime-500 hover:underline">Tolak</button>
                            </form>
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    @empty
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
