@extends('layouts.admin')

@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Pesanan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Pemesan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Permintaan
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
                @forelse ($cancelBookings as $listBooking)
                    <tr>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $listBooking->formatted_date . ' | ' . $listBooking->formatted_session }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $listBooking->booking->rentedBy->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $listBooking->updated_at }}
                        </td>
                        <td class="px-6 py-4">
                            <img src="{{ route('booking.paymentImage', basename($listBooking->booking->uploud_payment)) }}"
                                width="100px" alt="">
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('admin.acceptCancelBooking', $listBooking->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <button class="font-medium text-blue-600 dark:text-lime-500 hover:underline">Terima</button>
                            </form>
                            <form action="{{ route('admin.rejectCancelBooking', $listBooking->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <button class="font-medium text-blue-600 dark:text-lime-500 hover:underline">Tolak</button>
                            </form>
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    @empty
                        {{-- <p>Tidak Ada Permintaan Pembatalan Jadwal</p> --}}
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
