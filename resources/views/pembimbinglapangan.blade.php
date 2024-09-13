@extends('layouts.template');

@section('content')
    <div class="mt-10 p-4 sm:ml-64">
        <div class="relative overflow-auto shadow-md sm:rounded-lg">
            <table id="myDataTable" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                    <th scope="col" class="px-6 py-3">no</th>
                    <th scope="col" class="px-6 py-3">nama</th>
                    <th scope="col" class="px-6 py-3">email</th>
                    <th scope="col" class="px-6 py-3">telephone</th>
                    <th scope="col" class="px-6 py-3">alamat</th>
                    <th scope="col" class="px-6 py-3">action</th>
                </thead>
                <tbody>
                    @foreach ($pembimbingLapangans as $pembimbinglapangan)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="border px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $pembimbinglapangan->nama }}</td>
                            <td class="px-6 py-4">{{ $pembimbinglapangan->email }}</td>
                            <td class="px-6 py-4">{{ $pembimbinglapangan->telephone }}</td>
                            <td class="px-6 py-4">{{ $pembimbinglapangan->alamat }}</td>
                            <td>
                                <form action="{{ route('pembimbingLapangan.edit', $pembimbinglapangan->id) }}" method="GET">
                                    <button type="submit"
                                        class="inline-flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 mb-2 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                        <svg class="w-5 h-5 text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                        </svg>
                                        <span>Edit</span>
                                    </button>
                                </form>

                                <form action="{{ route('pembimbingLapangan.destroy', $pembimbinglapangan->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin akan menghapus data?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2.5 mb-2 me-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                                        <svg class="w-5 h-5 text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                        </svg>
                                        <span>Delete</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
