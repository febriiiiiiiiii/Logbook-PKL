@extends('layouts.template');

@section('content')
    <div class="mt-10 p-4 sm:ml-64">
        <div class="relative overflow-auto shadow-md sm:rounded-lg">
            <table id="myDataTable">
                <thead>
                    <th>no</th>
                    <th>nama</th>
                    <th>email</th>
                    <th>telephone</th>
                    <th>alamat</th>
                </thead>
                <tbody>
                    @foreach ($pembimbingLapangans as $pembimbinglapangan)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="border font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}</td>
                            <td>{{ $pembimbinglapangan->nama }}</td>
                            <td>{{ $pembimbinglapangan->email }}</td>
                            <td>{{ $pembimbinglapangan->telephone }}</td>
                            <td>{{ $pembimbinglapangan->alamat }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
