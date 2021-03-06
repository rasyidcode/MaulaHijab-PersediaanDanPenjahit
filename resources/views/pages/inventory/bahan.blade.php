@extends('layouts.app')

@section('title', 'List Bahan')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">List Bahan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">List Bahan</li>
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
                        <h3 class="card-title">List Bahan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="list_bahan" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>No.</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Kode</th>
                                    <th>Yard</th>
                                    <th>Harga</th>
                                    <th>Value</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_create_bahan"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<!-- Modal show bahan -->
<div class="modal fade" id="modal_show_bahan">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail bahan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <dl class="row">
                    <dt class="col-sm-4">Tanggal masuk</dt>
                        <dd id="dt_tanggal_masuk" class="col-sm-8"></dd> <!-- use moment -->
                    <dt class="col-sm-4">Kode</dt>
                        <dd id="dt_kode" class="col-sm-8"></dd>
                    <dt class="col-sm-4">Yard</dt>
                        <dd id="dt_yard" class="col-sm-8"></dd>
                    <dt class="col-sm-4">Harga</dt>
                        <dd id="dt_harga" class="col-sm-8"></dd>
                    <dt class="col-sm-4">Value</dt>
                        <dd id="dt_value" class="col-sm-8"></dd>
                    <dt class="col-sm-4">Status Potong</dt>
                        <dd id="dt_status_potong" class="col-sm-8"></dd>
                    <dt class="col-sm-4">Tanggal dibuat</dt>
                        <dd id="dt_created_at" class="col-sm-8"></dd> <!-- Rabu, 14 April 2019, 06:05 AM -->
                    <dt class="col-sm-4">Tanggal diupdate</dt>
                        <dd id="dt_updated_at" class="col-sm-8"></dd> <!-- Rabu, 15 April 2019, 06:05 AM -->
                </dl>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal create bahan -->
<div class="modal fade" id="modal_create_bahan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah bahan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_create_bahan" role="form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Kode</label>
                                <select id="kode_jenis_bahan" class="form-control" style="width: 100%;">
                                    <option value="0">Pilih</option>
                                </select>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="yard">Yard</label>
                                <input id="yard" type="number" class="form-control" placeholder="Ex : 30" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input id="harga" type="text" class="form-control" placeholder="Ex : Rp. 30.000" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Tanggal Masuk</label>
                                <div class="input-group date" id="tanggal_masuk_picker" data-target-input="nearest">
                                    <input id="tanggal_masuk" type="text" class="form-control datetimepicker-input" data-target="#tanggal_masuk_picker"/>
                                    <div class="input-group-append" data-target="#tanggal_masuk_picker" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal edit bahan -->
<div class="modal fade" id="modal_edit_bahan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit bahan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_edit_bahan" role="form">
                <div class="modal-body">
                    <div class="row">
                        <input id="id2" type="hidden">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="kode_jenis_bahan2">Kode</label>
                                <select id="kode_jenis_bahan2" class="form-control" style="width: 100%;">
                                    <option value="0">Pilih</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="yard2">Yard</label>
                                <input id="yard2" type="number" class="form-control" placeholder="Ex : 30" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="harga2">Harga</label>
                                <input id="harga2" type="text" class="form-control" placeholder="Ex : Rp. 30.000" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Tanggal Masuk</label>
                                <div class="input-group date" id="tanggal_masuk_picker2" data-target-input="nearest">
                                    <input id="tanggal_masuk2" type="text" class="form-control datetimepicker-input" data-target="#tanggal_masuk_picker2"/>
                                    <div class="input-group-append" data-target="#tanggal_masuk_picker2" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('custom-js')
<script src="{{ asset('js/models/model_bahan.js') }}"></script>
<script src="{{ asset('js/inventory/bahan.js') }}"></script>
<script>
$(function() {
    $.fn.datetimepicker.Constructor.Default = $.extend({}, 
    $.fn.datetimepicker.Constructor.Default, {
        icons: {
            time: 'far fa-clock',
            date: 'far fa-calendar',
            up: 'fas fa-arrow-up',
            down: 'fas fa-arrow-down',
            previous: 'fas fa-arrow-circle-left',
            next: 'fas fa-arrow-circle-right',
            today: 'far fa-calendar-check-o',
            clear: 'fas fa-trash',
            close: 'far fa-times'
        }
    })
    moment.locale("id")
    $('#tanggal_masuk_picker').datetimepicker({
        defaultDate: moment(),
        locale: "id"
    })
    $('#tanggal_masuk_picker2').datetimepicker({
        defaultDate: moment(),
        locale: "id"
    })
    $('#harga').keyup(function () {
        $(this).val(General.rupiahFormat($(this).val(), 'Rp. '))
    })
    $('#harga2').keyup(function () {
        $(this).val(General.rupiahFormat($(this).val(), 'Rp. '))
    })
})
</script>
@endsection