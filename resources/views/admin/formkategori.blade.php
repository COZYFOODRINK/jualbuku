<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Kategori</title>
</head>
<body>
    <form action="{{ route('proses.data.kategori') }}" method="post">
        @csrf

        @if(session('sukses')) {
            <p style="color: green;">{{ session('sukses') }}</p>
        }
        @endif
        @if(session('error')) {
            <p style="color: red;">{{ session('error') }}</p>
        }
        @endif

        <label for="nama_kategori">Nama Kategori:</label>
        <input type="text" id="nama_kategori" name="nama_kategori" required>
        
        <br><br>

        <button type="submit">Tambah Kategori</button>
    </form>
</body>
</html>