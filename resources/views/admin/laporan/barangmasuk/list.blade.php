@extends('admin.adminlayout')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Laporan Barang Masuk</h4>
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
                        <a href="#">Data Laporan</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Barang Masuk</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Laporan Barang Masuk</h4>
                                
                                <a href="{{ route('laporan.barangMasuk.exportMasuk') }}" class="btn btn-primary btn-round ml-auto">
                                    <i class="fa fa-plus"></i>
                                    Export Data
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row mt-2">
                                <div class="col">
                                    <form action="/laporan/barangMasuk/filterMasuk" method="POST" class="form-inline">
                                        @csrf
                                        <input type="date" name="tanggal" value="{{ old('tanggal')?? $tanggal?? '' }}" class="form-control mb-4">
                                        <button type="submit" class="btn btn-info mb-4 ml-3">Filter</button>
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Barang</th>
                                            <th>Kategori</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no=1 @endphp
                                        @foreach ($data_barang_masuk as $row)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->tgl_masuk }}</td>
                                            <td>{{ $row->nama_barang }}</td>
                                            <td>{{ $row->nama_kategori }}</td>
                                            <td>{{ $row->qty_masuk }} Pcs</td>
                                            <td>Rp. {{ number_format($row->total_masuk) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
