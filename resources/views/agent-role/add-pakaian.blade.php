<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambahkan Pakaian</title>
</head>
<body>
    <form action="/dashboard/agent/add/execution" method="post" enctype="multipart/form-data">
        @csrf
        <label for="nama">Nama</label><br>
        <input type="text" name="nama" id="nama" required><br><br>
        
        <label for="deskripsi">Deskripsi</label><br>
        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" required style="resize:none;"></textarea><br><br>
        
        <label for="harga">Harga</label><br>
        <input type="number" name="harga" id="harga" required><br><br>
        
        <label for="stock">Stock</label>
        <input type="number" name="stock" id="stock" required><br><br>
        
        <label for="gambar">Gambar</label><br>
        <input type="file" name="gambar" id="gambar" required><br><br>
        
        <label for="kategori">Kategori</label><br>
        <select name="kategori" id="kategori" required>
            @foreach($Kategori as $k)
                <option value="{{$k->KategoriID}}">{{$k->KategoriNama}}</option>
            @endforeach
        </select>
        
        <label for="size">Ukuran Pakaian</label>
        <select name="size" id="size" required>
            @foreach($Size as $s)
                <option value="{{$s->SizeID}}">{{$s->DeskripsiSize}}</option>
            @endforeach
        </select>

        <input type="submit" value="+ Add Data">
    </form>
</body>
</html>