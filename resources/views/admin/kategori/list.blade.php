@extends('admin.adminlayout')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Kategori</h4>
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
                        <a href="#">Data</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Kategori</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Kategori</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalCreate">
                                    <i class="fa fa-plus"></i>
                                    Tambah Data
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kategori</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no=1 @endphp
                                        @foreach ($data_kategori as $row)                                        
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->nama_kategori }}</td>
                                            <td>
                                                <a href="#modalEdit{{ $row->id }}" data-toggle="modal" class="btn btn-xs btn-primary"><i class="fa fa-edit">Edit</i></a>
                                                <a href="#modalHapus{{ $row->id }}" data-toggle="modal" class="btn btn-xs btn-danger"><i class="fa fa-thrash">Hapus</i></a>
                                            </td>
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

<!-- Modal Create-->
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">
                        Tambah</span> 
                        <span class="fw-light">
                            Kategori
                        </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
                <form method="POST" action="/kategori/store" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        
                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori ..." required>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Save Changes</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                        </div>
                </form>
        </div>  
    </div>
</div>

<!-- Modal Edit-->
@foreach ($data_kategori as $d)                                        
<div class="modal fade" id="modalEdit{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header no-bd">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">
                        Edit</span> 
                        <span class="fw-light">
                            Kategori
                        </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="/kategori/update/{{ $d->id }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text" class="form-control" value="{{ $d->nama_kategori }}" name="nama_kategori" placeholder="Nama Kategori ..." required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Save Changes</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                    </div>
                </form>

        </div>
    </div>
</div>
@endforeach

<!-- Modal Hapus -->
@foreach ($data_kategori as $b)                                        
<div class="modal fade" id="modalHapus{{ $b->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                    Hapus</span> 
                    <span class="fw-light">
                        Kategori
                    </span>
                </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
                <form method="GET" action="/kategori/destroy/{{ $b->id }}" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <h4>Apakah Anda Ingin Menghapus Data Ini ?</h4>
                        </div>
                    </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-thrash"></i>Hapus</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endforeach
@endsection