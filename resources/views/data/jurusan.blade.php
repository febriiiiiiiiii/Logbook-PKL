@extends('layouts.template');

@section('content')
    <div class="mt-10 p-4 sm:ml-64">
        <div class="mb-2 relative overflow-x-auto">
            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3"
                        onclick="this.parentElement.style.display='none';">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M14.348 5.652a1 1 0 0 1 0 1.414L11.414 10l2.934 2.934a1 1 0 1 1-1.414 1.414L10 11.414l-2.934 2.934a1 1 0 0 1-1.414-1.414L8.586 10 5.652 7.066a1 1 0 0 1 1.414-1.414L10 8.586l2.934-2.934a1 1 0 0 1 1.414 0z" />
                        </svg>
                    </span>
                </div>
            @endif

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3"
                        onclick="this.parentElement.style.display='none';">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M14.348 5.652a1 1 0 0 1 0 1.414L11.414 10l2.934 2.934a1 1 0 1 1-1.414 1.414L10 11.414l-2.934 2.934a1 1 0 0 1-1.414-1.414L8.586 10 5.652 7.066a1 1 0 0 1 1.414-1.414L10 8.586l2.934-2.934a1 1 0 0 1 1.414 0z" />
                        </svg>
                    </span>
                </div>
            @endif
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kode
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jurusans as $jurusan)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="border px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $jurusan->id }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $jurusan->kode }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $jurusan->nama }}
                            </td>
                            <td class="flex items-center px-6 py-4">
                                <form action="{{ route('jurusan.edit', $jurusan->id) }}" method="GET">
                                    <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                        Edit
                                    </button>
                                </form>
                                <form action="{{ route('jurusan.delete', $jurusan->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin akan menghapus data?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                                        Delete
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
