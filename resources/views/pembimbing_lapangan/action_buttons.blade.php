<a href="{{ route('pembimbing_lapangan.edit', $pembimbingLapangan->id) }}" class="text-blue-600">Edit</a>
<form action="{{ route('pembimbing_lapangan.destroy', $pembimbingLapangan->id) }}" method="POST" style="display:inline-block;"
    onsubmit="return confirm('Yakin akan menghapus data?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-red-600">Delete</button>
</form>
