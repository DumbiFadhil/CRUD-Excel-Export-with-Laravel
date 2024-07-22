@extends('layouts/layout')

@section('content')
<div class="container p-5">
    <a href="{{ route('inventory.index') }}" class="btn btn-secondary mb-2">Kembali</a>
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="card-title">Tambah Data Inventory</h4>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('inventory.store') }}">
                @csrf
                <div class="form-group">
                    <label for="">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Qty</label>
                    <input type="number" name="qty" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Harga Beli</label>
                    <input type="number" name="harga_beli" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Harga Jual</label>
                    <input type="number" name="harga_jual" class="form-control" required>
                </div>
                <button class="btn btn-success mt-3">Tambah Data</button>
            </form>
            
        </div>
    </div>
</div>
@endsection