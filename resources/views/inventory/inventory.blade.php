<!DOCTYPE html>
<html>

<head>
  <title>Laravel 11 Import/Export Excel to Inventory Database</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>

<body>
  <div class="container">
    <div class="card mt-5">
      <h3 class="card-header p-3"><i class="fa fa-star"></i> Laravel 11 Import Export Excel to Inventory Database</h3>
      <div class="card-body">

        @session('success')
        <div class="alert alert-success" role="alert">
          {{ $value }}
        </div>
        @endsession

        @if ($errors->any())
        <div class="alert alert-danger">
          <strong>Whoops!</strong> There were some problems with your input.<br><br>
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <form action="{{ route('inventory.import') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <input type="file" name="file" class="form-control">

          <br>
          <button class="btn btn-outline-success"><i class="fa fa-file"></i> Import Inventory Data</button>
          <a href="{{ route('inventory.create') }}" class="btn btn-outline-success mx-2"><i class="fa fa-file"></i> Tambah Data</a>
        </form>

        <table class="table table-bordered mt-3">
          <tr>
            <th colspan="6">
              Inventory List
              <a class="btn btn-outline-warning fw-bold float-end" href="{{ route('inventory.export') }}"><i class="fa fa-download"></i> Export Inventory Data</a>
            </th>
          </tr>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Selling Price</th>
            <th>Buying Price</th>
            <th>Aksi</th>
          </tr>

          @if ($inventory->isEmpty())
          <tr>
            <td colspan="6">Inventory kosong.</td>
          </tr>
          @else
          @foreach($inventory as $item)
          <tr>
            <td>{{ $item->id_barang }}</td>
            <td>{{ $item->nama_barang }}</td>
            <td>{{ $item->qty }}</td>
            <td>Rp {{ number_format($item->harga_beli, 0, ',', '.') }},-</td>
            <td>Rp {{ number_format($item->harga_jual, 0, ',', '.') }},-</td>
            <td>
              <span class="d-flex flex-row gap-2">
                <a href="{{ route('inventory.edit', $item->id_barang) }}" class="btn btn-outline-warning fw-bold">
                  Edit
                </a>
                <form action="{{ route('inventory.delete', $item->id_barang) }}" method="POST" onsubmit="return confirm('Apakah ingin menghapus data barang?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-outline-danger fw-bold">Hapus</button>
                </form>
              </span>
            </td>
          </tr>
          @endforeach
          @endif
        </table>

      </div>
    </div>
  </div>
</body>