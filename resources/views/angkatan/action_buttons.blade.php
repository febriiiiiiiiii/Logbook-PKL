@can('edit-angkatan')
    <a href="{{ route('angkatan.edit', $angkatan->id) }}" class="text-blue-600">Edit</a>
@endcan

@can('hapus-angkatan')
    <form action="{{ route('angkatan.destroy', $angkatan->id) }}" method="POST" style="display:inline-block;"
        onsubmit="return confirm('Yakin akan menghapus data?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-600">Delete</button>
    </form>
@endcan
