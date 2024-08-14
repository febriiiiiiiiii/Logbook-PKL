<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Sekolah</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Sekolah</h1>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Telepon</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sekolahs as $sekolah)
                        <tr>
                            <td>{{ $sekolah->id }}</td>
                            <td>{{ $sekolah->nama }}</td>
                            <td>{{ $sekolah->alamat }}</td>
                            <td>{{ $sekolah->email }}</td>
                            <td>{{ $sekolah->telephone }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
