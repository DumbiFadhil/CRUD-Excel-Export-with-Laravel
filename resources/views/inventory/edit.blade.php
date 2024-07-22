@extends('layouts/layout')

@section('content')
<div class="container p-5">
    <a href="{{ route('inventory.index') }}" class="btn btn-secondary mb-2">Kembali</a>
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="card-title">Edit Barang : {{ $inventory->nama_barang }}</h4>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('inventory.update', $inventory->id_barang) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Nama Barang</label>
                    <input type="text" value="{{ $inventory->nama_barang }}" name="nama_barang" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Qty</label>
                    <input type="number" value="{{ $inventory->qty }}" name="qty" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Harga Beli</label>
                    <input type="number" value="{{ $inventory->harga_beli }}" name="harga_beli" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Harga Jual</label>
                    <input type="number" value="{{ $inventory->harga_jual }}" name="harga_jual" required class="form-control">
                </div>
                <input type="hidden" value="{{ $inventory->id_barang }}" name="id">
                <button class="btn btn-success">Edit Data</button>
            </form>

        </div>
    </div>
</div>
@endsection