@extends('layouts.template');

@section('content')
    <div class="mt-14 p-4 sm:ml-64">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white p-6">
            <form action="{{ route('jurusan.update', $jurusan->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                <div>
                    <label for="nama" class="block text-gray-700 text-sm font-semibold mb-2">Kode Jurusan:</label>
                    <input type="text" name="kode" value="{{ $jurusan->kode }}"
                        class="w-full py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700">
                </div>
                <div>
                    <label for="nama" class="block text-gray-700 text-sm font-semibold mb-2">Nama Jurusan:</label>
                    <input type="text" name="nama" value="{{ $jurusan->nama }}"
                        class="w-full py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700">
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
