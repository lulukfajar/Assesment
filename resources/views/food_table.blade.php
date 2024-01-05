<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Admin | Data makanan</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script> 	
   $(document).ready(function() {
    $('#example').DataTable();
  });
  </script>
  
</head>

<body>
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <div class="logo me-auto">
            <h1><a href="" >Admin Dashboard</a></h1>
        </div>
        </div>
    </header>
  <main>
    <div class = "container" style="padding-top: 95px; padding-bottom:70px;">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
        <div class="mb-3">
            <a href="{{ route('foods.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Tambah Data
            </a>
        </div>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($foods as $food)
                <tr>
                    <td>{{ $food->name }}</td>
                    <td>
                        @switch($food->category)
                            @case(1)
                                Cumi dan Kerang
                                @break
                            @case(2)
                                Sayur
                                @break
                            @case(3)
                                Ikan
                                @break
                            @case(4)
                                Minuman
                                @break
                            @case(5)
                                Happy Hour
                                @break
                            @default
                                Lainnya
                        @endswitch
                    </td>
                    <td>{{ $food->harga }}</td>
                    <td>
                        <a href="{{ route('foods.edit', ['food' => $food->id]) }}"> 
                          <button type="button" rel="tooltip" class="btn btn-warning btn-just-icon btn-sm" data-original-title="" title="">
                              <i class="fas fa-edit"></i>
                          </button>
                        </a>
                        <a onclick="showDeleteConfirmation({{ $food->id }})">
                          <button type="button" rel="tooltip" class="btn btn-danger btn-just-icon btn-sm" data-original-title="" title="">
                              <i class="fas fa-trash"></i>
                          </button>
                        </a>
                    </td>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    </div>
  </main>
  </script>
  <script>
    function showDeleteConfirmation(itemId) {
    if (window.confirm('Are you sure you want to delete this item?')) {
        var deleteUrl = "{{ route('foods.destroy', 0) }}".replace('/0', '/'+itemId);
        window.location.href = deleteUrl;
    }
}
  </script>

</body>

</html>