<!DOCTYPE html>
<!-- Designined by CodingLab - youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Admin | Update Record</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
   </head>
<body>
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <div class="logo me-auto">
            <h1><a href="" >Edit Data</a></h1>
        </div>
        </div>
    </header>
    </header>
      <main style="padding-top: 95px;">
      <div class="container">
        <div class="title">Edit Data</div>
        <div class="content">
        @if(isset($is_edit) && $is_edit)
          <form action="{{ route('foods.update', $food->id) }}" method="POST">
              @csrf
              @method('PUT')
        @else
          <form action="{{ route('foods.store') }}" method="POST">
          @csrf
        @endif
            <div class="user-details">
              <div class="input-box">
                <span class="details">Nama Makanan</span>
                <input name="name" id="name" value="{{ isset($food->name) ? $food->name : '' }}" required>
              </div>
              <div class="input-box">
                <span class="details">Kategori</span>
                <select id="category" name="category" required>
                  <option value="1" {{ isset($food->kategori) && $food->kategori == 1 ? 'selected' : '' }}>Cumi & Kerang</option>
                  <option value="2" {{ isset($food->kategori) && $food->kategori == 2 ? 'selected' : '' }}>Sayur</option>
                  <option value="3" {{ isset($food->kategori) && $food->kategori == 3 ? 'selected' : '' }}>Ikan</option>
                  <option value="4" {{ isset($food->kategori) && $food->kategori == 4 ? 'selected' : '' }}>Minuman</option>
                  <option value="5" {{ isset($food->kategori) && $food->kategori == 5 ? 'selected' : '' }}> Happy Hour</option>
                </select>
              </div>
              <div class="input-box">
                <span class="details">Harga</span>
                <input type="text" id="harga" name="harga" placeholder="" value="{{ isset($food->harga) ? $food->harga : '' }}" required>
                <p id="errorHarga" style="color: red;"></p>
              </div>
            </div>
            <div class="button">
              <input type="submit" value="{{ isset($is_edit) && $is_edit ? 'Update' : 'Tambah' }}">
            </div>
          </form>
        </div>
      </div>
    </main>
</body>
  <script>
    const harga      = document.getElementById("harga");
    const eharga       = document.getElementById("errorHarga");
    harga.addEventListener("input", function() {
      const hargaValue = harga.value;
      if (/^\d*\.?\d*$/.test(hargaValue)) {
        eharga.textContent = "";
      } else {
        eharga.textContent = "Hanya berupa angka. Contoh 1.5";
      }
    });
  </script>
</html>
