<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pakaian</title>
    <script type="text/javascript">
        function preventBack(){
            window.history.forward();
        }
        setTimeout(() => {
            preventBack()
        }, 0);
        window.onunload = function(){null};
    </script>
</head>
<body>
<form action="/dashboard/agent/edit/execution" method="post" enctype="multipart/form-data">
        @csrf
        @foreach($PakaianData as $pd)
            <input type="hidden" name="id" value="{{$pd->PakaianID}}">
            
            <label for="nama">Nama</label><br>
            <input type="text" name="nama" id="nama" required value="{{$pd->PakaianNama}}"><br><br>
            
            <label for="deskripsi">Deskripsi</label><br>
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" required style="resize:none;">{{$pd->PakaianDeskripsi}}</textarea><br><br>
            
            <label for="harga">Harga</label><br>
            <input type="number" name="harga" id="harga" required value="{{$pd->PakaianHarga}}"><br><br>
            
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" required value="{{$pd->StockQty}}"><br><br>
        
            <label for="gambar">Gambar</label><br>
            <input type="file" name="gambar" id="gambar"><br><br>
            
            <label for="kategori">Kategori</label><br>
            <select name="kategori" id="kategori" required>
                @foreach($Kategori as $k)
                    @if("{{$k->KategoriID}}" == "{{$pd->KategoriID}}")
                        <option value="{{$k->KategoriID}}" selected>{{$k->KategoriNama}}</option>
                    @else
                        <option value="{{$k->KategoriID}}">{{$k->KategoriNama}}</option>
                    @endif
                @endforeach
            </select>
            
            <label for="size">Ukuran Pakaian</label>
            <select name="size" id="size" required>
                @foreach($Size as $s)
                    @if("{{$s->SizeID}}" == "{{$pd->SizeID}}")
                        <option value="{{$s->SizeID}}" selected>{{$s->DeskripsiSize}}</option>
                    @else
                        <option value="{{$s->SizeID}}">{{$s->DeskripsiSize}}</option>
                    @endif
                @endforeach
            </select>
        @endforeach
        <input type="submit" value="> Update Data">
    </form>
</body>
</html>