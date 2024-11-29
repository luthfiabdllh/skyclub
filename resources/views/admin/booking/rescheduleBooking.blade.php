@extends('layouts.admin')

@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Jadwal Sebelum
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jadwal Sesudah
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Pemesan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Permintaan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        persetujuan
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reschedules as $reschedule)
                    <tr>
                        <td class="px-6 py-4">
                            {{ $reschedule->listBooking->formatted_date . ' | ' . $reschedule->listBooking->formatted_session }}
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $reschedule->formatted_date . ' | ' . $reschedule->formatted_session }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $reschedule->listBooking->booking->rentedBy->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $reschedule->formatted_createdAt }}
                        </td>
                        <td class="px-6 py-4">
                            <form
                                action="{{ route('admin.acceptReschedule', ['request' => $reschedule->id, 'listBooking' => $reschedule->id_list_booking]) }}"
                                method="post">
                                @csrf
                                @method('POST')
                                <button type="submit"
                                    class="font-medium text-blue-600 dark:text-lime-500 hover:underline">Terima</button>
                            </form>
                            <form
                                action="{{ route('admin.rejectReschedule', ['request' => $reschedule->id, 'listBooking' => $reschedule->id_list_booking]) }}"
                                method="post">
                                @csrf
                                @method('POST')
                                <button type="submit"
                                    class="font-medium text-blue-600 dark:text-lime-500 hover:underline">Tolak</button>
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
