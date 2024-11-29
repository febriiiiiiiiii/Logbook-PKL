<a href="{{ route('sekolah.edit', $sekolah->id) }}" class="text-blue-600">Edit</a>
<form action="{{ route('sekolah.destroy', $sekolah->id) }}" method="POST" style="display:inline-block;"
    onsubmit="return confirm('Yakin akan menghapus data?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-red-600">Delete</button>
</form>
