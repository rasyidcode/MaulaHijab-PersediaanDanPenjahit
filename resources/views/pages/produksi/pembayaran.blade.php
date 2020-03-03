@extends('layouts.app')

@section('title', 'List Pembayaran')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">List Pembayaran</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">List Penjahit</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Pembayaran</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="list_pembayaran" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Nama Penjahit</th>
                                    <th>Kode Barang</th>
                                    <th>Kode Kain</th>
                                    <th>Jumlah Kembali</th>
                                    <th>Harga Jahit</th>
                                    <th>Total Pembayaran</th>
                                    <th>Status Bayar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_create_penjahit"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

@endsection

@section('custom-js')
<script src="{{ asset('js/produksi/pembayaran.js') }}"></script>
@endsection