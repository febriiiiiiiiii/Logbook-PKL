<a href="{{ route('jurusan.edit', $jurusan->id) }}" class="text-blue-600">Edit</a>
<form action="{{ route('jurusan.destroy', $jurusan->id) }}" method="POST" style="display:inline-block;"
    onsubmit="return confirm('Yakin akan menghapus data?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-red-600">Delete</button>
</form>
