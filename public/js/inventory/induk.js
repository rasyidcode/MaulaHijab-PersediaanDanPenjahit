$(function() {
    const routeList = window.location.origin + '/api/induk'
    const datatable = $('#list_induk').DataTable({
        initComplete: function(settings, json) {
            handleButtonsClick()
        },
        ajax: function(data, callback, settings) {
            axios.get(routeList)
                .then(function(res) {
                    const allInduk = []
                    res.data.data.forEach(function(induk, index) {
                        const modelInduk = new ModelInduk(
                            induk.kode,
                            induk.harga_jahit,
                            induk.harga_basic,
                            induk.hpp_shopee,
                            induk.hpp_lazada,
                            induk.dfs_shopee,
                            induk.dfs_lazada,
                            induk.created_at,
                            induk.updated_at
                        )
                        modelInduk.setNumbering(index + 1)
                        allInduk.push(modelInduk.getUIData())
                    })
                    const dataInduk = {
                        data: allInduk
                    }
                    callback(dataInduk)
                })
                .catch(function(err) {
                    console.log(err)
                })
        },
        columns: [
            { data: 'no' },
            { data: 'kode' },
            { data: 'harga_jahit' },
            { data: 'harga_basic' },
            { data: 'created_at' },
            {
                data: null,
                orderable: false,
                className: 'text-center',
                // TODO : ganti warna tombol mata jadi warning apabila diopen dan sebaliknya ke primary apabila diclose
                defaultContent: '<button type="button" class="btn btn-primary btn-sm mr-2 detail"><i class="fas fa-eye"></i></button><button type="button" class="btn btn-info btn-sm mr-2"><i class="fas fa-pencil-alt"></i></button><button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>'
            }
        ]
    })

    /* handle form tambah induk */
    $('#form_create_induk').submit(function(e) {
        e.preventDefault()
        const newInduk = {
            kode: $('#kode').val(),
            harga_jahit: General.removeRupiah($('#harga_jahit').val()),
            harga_basic: General.removeRupiah($('#harga_basic').val()),
            hpp_shopee: General.removeRupiah($('#hpp_shopee').val()),
            dfs_shopee: General.removeRupiah($('#dfs_shopee').val()),
            hpp_lazada: General.removeRupiah($('#hpp_lazada').val()),
            dfs_lazada: General.removeRupiah($('#dfs_lazada').val())
        }
        console.log(newInduk)
        const route = window.location.origin + '/api/induk'
        axios.post(route, newInduk)
            .then(function(res) {
                General.resetElementsField([
                    { selector: '#kode', type: 'text' },
                    { selector: '#harga_jahit', type: 'text' },
                    { selector: '#harga_basic', type: 'text' },
                    { selector: '#hpp_shopee', type: 'text' },
                    { selector: '#dfs_shopee', type: 'text' },
                    { selector: '#hpp_lazada', type: 'text' },
                    { selector: '#dfs_lazada', type: 'text' }
                ])
                $('#modal_create_induk').modal('toggle')
                General.showToast('success', res.data.message)
                datatable.ajax.reload()
            })
            .catch(function(err) {
                console.log(err)
            })
    })

    $('#form_edit_induk').submit(function(e) {
        e.preventDefault()
        const editedInduk = {
            kode: $('#kode2').val(),
            harga_jahit: General.removeRupiah($('#harga_jahit2').val()),
            harga_basic: General.removeRupiah($('#harga_basic2').val()),
            hpp_shopee: General.removeRupiah($('#hpp_shopee2').val()),
            dfs_shopee: General.removeRupiah($('#dfs_shopee2').val()),
            hpp_lazada: General.removeRupiah($('#hpp_lazada2').val()),
            dfs_lazada: General.removeRupiah($('#dfs_lazada2').val())
        }
        const kode = $('#kodes2').val()
        const route = window.location.origin + `/api/induk/${kode}/edit`
        axios.post(route, editedInduk)
            .then(function(res) {
                General.resetElementsField([
                    { selector: '#kodes2', type: 'text' },
                    { selector: '#kode2', type: 'text' },
                    { selector: '#harga_jahit2', type: 'text' },
                    { selector: '#harga_basic2', type: 'text' },
                    { selector: '#hpp_shopee2', type: 'text' },
                    { selector: '#dfs_shopee2', type: 'text' },
                    { selector: '#hpp_lazada2', type: 'text' },
                    { selector: '#dfs_lazada2', type: 'text' },
                ])
                $('#modal_edit_induk').modal('toggle')
                General.showToast('success', res.data.message)
                datatable.ajax.reload()
            })
            .catch(function(err) {
                console.log(err)
            })
    })

    function handleButtonsClick() {
        /* handle tombol detail */
        $('#list_induk tbody').on('click', 'tr button.detail', function(e) {
            const tr = $(this).closest('tr')
            const row = datatable.row(tr)

            if (row.child.isShown()) {
                row.child.hide()
                tr.find('button.detail').removeClass('btn-warning').addClass('btn-primary')
            } else {
                row.child(formattingDetail2(row.data())).show()
                tr.find('button.detail').removeClass('btn-primary').addClass('btn-warning')
            }
        })
        /* handle tombol edit */
        $('#list_induk tbody').on('click', 'tr button.btn-info', function(e) {
            const kode = datatable.row($(this).parent()).data().kode
            const url = window.location.origin + `/api/induk/${kode}`

            axios.get(url)
                .then(function(res) {
                    $('#kodes2').val(`${res.data.data.kode}`)
                    $('#kode2').val(`${res.data.data.kode}`)
                    $('#harga_jahit2').val(`${General.rupiahFormat(res.data.data.harga_jahit, '')}`)
                    $('#harga_basic2').val(`${General.rupiahFormat(res.data.data.harga_basic, '')}`)
                    $('#hpp_shopee2').val(`${General.rupiahFormat(res.data.data.hpp_shopee, '')}`)
                    $('#dfs_shopee2').val(`${General.rupiahFormat(res.data.data.dfs_shopee, '')}`)
                    $('#hpp_lazada2').val(`${General.rupiahFormat(res.data.data.hpp_lazada, '')}`)
                    $('#dfs_lazada2').val(`${General.rupiahFormat(res.data.data.dfs_lazada, '')}`)
                    $('#modal_edit_induk').modal('toggle')
                })
                .catch(function(err) {
                    console.log(err)
                })
        })
        /* handle tombol hapus */
        $('#list_induk tbody').on('click', 'tr button.btn-danger', function(e) {
            let result = confirm('Anda yakin ingin dihapus?')
            if (result) {
                const kode = datatable.row($(this).parent().parent()).data().kode
                const url = window.location.origin + `/api/induk/${kode}/delete`

                axios.post(url)
                    .then(function(res) {
                        General.showToast('success', res.data.message)
                        datatable.ajax.reload()
                    })
                    .catch(function(err) {
                        console.log(err)
                        General.showToast('error', err.message)
                    })
            }
        })
    }

    function formattingDetail(induk) {
        return `<table class="table"><thead><tr><th colspan="2">Shopee</th><th colspan="2">Lazada</th></tr></thead><tbody><tr><td>Hpp:</td><td>${induk.shopee.hpp}</td><td>Hpp:</td><td>${induk.lazada.hpp}</td></tr></tbody></table>`
    }

    function formattingDetail2(induk) {
        return `<div class="row">
            <div class="col-md-3">
                <h3>Shopee</h3>
                <hr />
                <dl class="row">
                    <dt class="col-sm-4">HPP</dt>
                        <dd class="col-sm-8">${induk.shopee.hpp}</dd>
                    <dt class="col-sm-4">DFS</dt>
                        <dd class="col-sm-8">${induk.shopee.dfs}</dd>
                    <dt class="col-sm-4">Min FS</dt>
                        <dd class="col-sm-8">${induk.shopee.min_fs}</dd>
                    <dt class="col-sm-4">Campaign</dt>
                        <dd class="col-sm-8">${induk.shopee.campaign}</dd>
                    <dt class="col-sm-4">Ecer</dt>
                        <dd class="col-sm-8">${induk.shopee.ecer}</dd>
                </dl>
            </div>
            <div class="col-md-3">
                <h3>Lazada</h3>
                <hr />
                <dl class="row">
                    <dt class="col-sm-4">HPP</dt>
                        <dd class="col-sm-8">${induk.lazada.hpp}</dd>
                    <dt class="col-sm-4">DFS</dt>
                        <dd class="col-sm-8">${induk.lazada.dfs}</dd>
                    <dt class="col-sm-4">Min FS</dt>
                        <dd class="col-sm-8">${induk.lazada.min_fs}</dd>
                    <dt class="col-sm-4">Campaign</dt>
                        <dd class="col-sm-8">${induk.lazada.campaign}</dd>
                    <dt class="col-sm-4">Ecer</dt>
                        <dd class="col-sm-8">${induk.lazada.ecer}</dd>
                </dl>
            </div>
        </div>`
    }
})