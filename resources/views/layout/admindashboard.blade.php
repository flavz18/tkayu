@extends('admin.adminlayout')
@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Dashboard</h4>
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
                        <a href="/admin">Dashboard</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Dashboard</h4>
                            </div>
                        </div>
                        <div class="container-fluid px-10">
                            <div class="row mt-4">
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-info text-white mb-4 ml-2" style="height: 10em; width: 20em;">
                                        <div class="card-body d-flex align-items-center justify-content-between">
                                            <span style="font-size: 24px;">Data User</span>
                                            <i class="fas fa-user" style="font-size: 24px;"></i>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="/user">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-info text-white mb-4 ml-2" style="height: 10em; width: 20em;">
                                        <div class="card-body d-flex align-items-center justify-content-between">
                                            <span style="font-size: 24px">Data Kategori</span>
                                            <i class="fas fa-book" style="font-size: 24px"></i>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="/kategori">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-info text-white mb-4 ml-2" style="height: 10em; width: 20em;">
                                        <div class="card-body d-flex align-items-center justify-content-between">
                                            <span style="font-size: 24px">Data Barang</span>
                                            <i class="fas fa-briefcase" style="font-size: 24px"></i>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="/barang">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-info text-white mb-4 ml-2" style="height: 10em; width: 20em;">
                                        <div class="card-body d-flex align-items-center justify-content-between">
                                            <span style="font-size: 24px">Data Laporan</span>
                                            <i class="fas fa-file" style="font-size: 24px"></i>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="/laporan">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                                        
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