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
                        Harga
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Bukti Pembayaran
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($listBookings as $listBooking)
                    <tr>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $listBooking->formatted_date . ' | ' . $listBooking->formatted_session }}
                        </td>
                        {{-- @dd($listBooking->booking->userInfo) --}}
                        <td class="px-6 py-4">
                            {{ $listBooking->booking->userInfo != null ? $listBooking->booking->userInfo->name . ' (manual)' : $listBooking->booking->rentedBy->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $listBooking->booking->formatted_order_date }}
                        </td>
                        <td class="px-6 py-4">
                            {{ 'Rp. ' . $listBooking->field->price }}
                        </td>
                        <td class="px-6 py-4">
                            <img src="{{ route('booking.paymentImage', basename($listBooking->booking->uploud_payment)) }}"
                                width="100px" alt="">
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    @empty
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
