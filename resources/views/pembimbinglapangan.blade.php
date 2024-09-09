@extends('layouts.template');

@section('content')
    <div class="mt-10 p-4 sm:ml-64">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <x-table :headers="['no','nama', 'e-mail', 'telephone', 'alamat', 'action']">
                @foreach ($pembimbingLapangans as $pembimbinglapangan)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <x-td class="border font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $loop->iteration }}</x-td>
                        <x-td>{{ $pembimbinglapangan->nama }}</x-td>
                        <x-td>{{ $pembimbinglapangan->email }}</x-td>
                        <x-td>{{ $pembimbinglapangan->telephone }}</x-td>
                        <x-td>{{ $pembimbinglapangan->alamat }}</x-td>
                @endforeach
            </x-table>
        </div>
    </div>
@endsection
