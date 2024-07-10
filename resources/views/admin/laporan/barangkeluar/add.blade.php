@extends('admin.adminlayout')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Create Data Barang Keluar</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Create Data</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Barang Keluar</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Create Data Barang Keluar</h4>
                            </div>
                        </div>
                        <form method="POST" action="/barangkeluar/store">
                        @csrf
                        <div class="card-body">

                            <input type="hidden" id="id" name="id_barang">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="nama_barang" readonly placeholder="Nama Barang ..." required>
                                            <div class="input-group-prepend">
                                                <button type="button" data-toggle="modal" data-target="#modalTambah" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Harga Jual</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-primary"> RP</button>
                                            </div>
                                            <input type="text" class="form-control" id="harga_jual" placeholder="Harga Jual..." readonly required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Stok Barang</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" readonly id="stok" placeholder="Stok Barang ..." required>
                                            <div class="input-group-prepend">
                                                <button class="btn btn-primary"> Pcs</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Qty Keluar</label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" name="qty_keluar" id="qty_keluar" placeholder="Qty Keluar ..." required>
                                            <div class="input-group-prepend">
                                                <button class="btn btn-primary"> Pcs</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label>Tgl Keluar</label>
                                        <input type="date" class="form-control" name="tgl_keluar" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Total Keluar</label>
                                        <input type="text" class="form-control" placeholder="Total Keluar..." id="total_keluar" name="total_keluar" readonly required>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
                            <a href="/barangkeluar" class="btn btn-danger"><i class="fa fa-undo"></i> Kembali</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                    Tambah</span>
                    <span class="fw-light">
                        Barang
                    </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Stok</th>
                                <th>Harga Jual</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1 @endphp
                            @foreach ($data_barang as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->nama_barang }}</td>
                                <td>{{ $row->nama_kategori }}</td>
                                <td>{{ $row->stok }} Pcs</td>
                                <td>Rp. {{ number_format($row->harga_jual) }}</td>
                                <td>
                                    <center>
                                        <button class="btn btn-xs btn-primary" id="pilihBarang"
                                             data-id="{{ $row->id }}"
                                             data-nama_barang="{{ $row->nama_barang }}"
                                             data-harga_jual="{{ $row->harga_jual }}"
                                             data-stok="{{ $row->stok }}">
                                             <i class="fa fa-check-circle"></i> Pilih
                                        </button>
                                    </center>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<script src="/assets/js/core/jquery.3.2.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#pilihBarang', function() {
            var id                 = $(this).data('id');
            var nama_barang        = $(this).data('nama_barang');
            var harga_jual       = $(this).data('harga_jual');
            var stok               = $(this).data('stok');
            $('#id').val(id);
            $('#nama_barang').val(nama_barang);
            $('#harga_jual').val(harga_jual);
            $('#stok').val(stok);
            $('#modalTambah').modal('hide');
        })
    })
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#harga_jual, #qty_keluar").keyup(function() {
            var harga_jual     = $("#harga_jual").val();
            var qty_keluar       = $("#qty_keluar").val();

            var total_keluar = parseInt(harga_jual) * parseInt(qty_keluar);
            $("#total_keluar").val(total_keluar);
        });
    });
</script>

@endsection
