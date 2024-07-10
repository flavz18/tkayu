<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>{{ $title }}</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="/assets/img/icon.ico" type="image/x-icon"/>
	
	<!-- Fonts and icons -->
	<script src="/assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['/assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/azzara.min.css">
	
	<!-- PWA  -->
	<meta name="theme-color" content="#6777ef"/>
	<link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
	<link rel="manifest" href="{{ asset('/manifest.json') }}">
	
</head>
<body>
	<div class="wrapper">
		<!--
				Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" data-background-color="purple">
			<!-- Logo Header -->
			<div class="logo-header">
				
				<a href="#" class="logo">
					<font color="white" alt="navbar brand" class="navbar-brand">TOKO AYU</font>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">
				
				
			</nav>
			<!-- End Navbar -->
		</div>
		<!-- Sidebar -->
		<div class="sidebar">
			
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{ Auth::user()->name }}
									<span class="user-level">{{ Auth::user()->name }}</span>
								</span>
							</a>
							<div class="clearfix"></div>
						</div>
					</div>
					<ul class="nav">
						<li class="nav-item {{ (request()->is('admin')) ? 'active' : '' }}">
							<a href="/admin">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Components</h4>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#base" aria-expanded="{{ (request()->is('user*') || request()->is('kategori*'))? 'true' : 'false' }}">
								<i class="fas fa-layer-group"></i>
								<p>Data Master</p>
								<span class="caret"></span>
							</a>
							<div class="collapse {{ (request()->is('user*') || request()->is('kategori*'))? 'how' : '' }}" id="base">
								<ul class="nav nav-collapse">
									<li class="{{ (request()->is('user')) ? 'active' : '' }}">
										<a href="/user">
											<span class="sub-item">Data User</span>
										</a>
									</li>
									<li class="{{ (request()->is('kategori')) ? 'active' : '' }}">
										<a href="/kategori">
											<span class="sub-item">Data Kategori</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
                        <li class="nav-item {{ (request()->is('barang')) ? 'active' : '' }}">
							<a href="/barang">
								<i class="fas fa-briefcase"></i>
								<p>Data Barang</p>
							</a>
						</li>
                        <li class="nav-item">
							<a data-toggle="collapse" href="#laporan" aria-expanded="{{ (request()->is('laporan/barangMasuk*') || request()->is('laporan/barangKeluar*'))? 'true' : 'false' }}">
								<i class="fas fa-file"></i>
								<p>Data Laporan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse {{ (request()->is('laporan/barangMasuk*') || request()->is('laporan/barangKeluar'))? 'how' : '' }}" id="laporan">
								<ul class="nav nav-collapse">
									<li class="{{ (request()->is('laporan/barangMasuk'))? 'active' : '' }}">
										<a href="/laporan/barangMasuk">
											<span class="sub-item">Barang Masuk</span>
										</a>
									</li>
									<li class="{{ (request()->is('laporan/barangKeluar*'))? 'active' : '' }}">
										<a href="/laporan/barangKeluar">
											<span class="sub-item">Barang Keluar</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
                        <li class="nav-item">
							<a href="/logout">
								<i class="fas fa-sign-out-alt"></i>
								<p>Logout</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		@yield('content')
	</div>

	<!--   Core JS Files   -->
	<script src="/assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="/assets/js/core/popper.min.js"></script>
	<script src="/assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	<!-- Bootstrap Toggle -->
	<script src="/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
	<!-- jQuery Scrollbar -->
	<script src="/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Datatables -->
	<script src="/assets/js/plugin/datatables/datatables.min.js"></script>
	<!-- Azzara JS -->
	<script src="/assets/js/ready.min.js"></script>
	<!-- Azzara DEMO methods, don't include it in your project! -->
	<script src="/assets/js/setting-demo.js"></script>
    <!-- Sweet Alert -->
	<script src="/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<script >
		$(document).ready(function() {
			$('#add-row').DataTable({});
		});
	</script>

<script>
    //== Class definition
    var SweetAlert2Demo = function() {

        //== Demos
        var initDemos = function() {

            //== Sweetalert Demo 4
            $('#alert_demo_4').click(function(e) {
                swal({
                    title: "SUCCESS",
                    text: "You clicked the button!",
                    icon: "success",
                    buttons: {
                        confirm: {
                            text: "Confirm Me",
                            value: true,
                            visible: true,
                            className: "btn btn-success",
                            closeModal: true
                        }
                    }
                });
            });

            $('#alert_demo_7').click(function(e) {
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    buttons:{
                        confirm: {
                            text : 'Yes, delete it!',
                            className : 'btn btn-success'
                        },
                        cancel: {
                            visible: true,
                            className: 'btn btn-danger'
                        }
                    }
                }).then((Delete) => {
                    if (Delete) {
                        swal({
                            title: 'Deleted!',
                            text: 'Your file has been deleted.',
                            type: 'success',
                            buttons : {
                                confirm: {
                                    className : 'btn btn-success'
                                }
                            }
                        });
                    } else {
                        swal.close();
                    }
                });
            });

            $('#alert_demo_8').click(function(e) {
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    buttons:{
                        cancel: {
                            visible: true,
                            text : 'No, cancel!',
                            className: 'btn btn-danger'
                        },        			
                        confirm: {
                            text : 'Yes, delete it!',
                            className : 'btn btn-success'
                        }
                    }
                }).then((willDelete) => {
                    if (willDelete) {
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                            buttons : {
                                confirm : {
                                    className: 'btn btn-success'
                                }
                            }
                        });
                    } else {
                        swal("Your imaginary file is safe!", {
                            buttons : {
                                confirm : {
                                    className: 'btn btn-success'
                                }
                            }
                        });
                    }
                });
            })

        };

        return {
            //== Init
            init: function() {
                initDemos();
            },
        };
    }();

    //== Class Initialization
    jQuery(document).ready(function() {
        SweetAlert2Demo.init();
    });
</script>

<script src="{{ asset('/sw.js') }}"></script>
<script>
   if ("serviceWorker" in navigator) {
      // Register a service worker hosted at the root of the
      // site using the default scope.
      navigator.serviceWorker.register("/sw.js").then(
      (registration) => {
         console.log("Service worker registration succeeded:", registration);
      },
      (error) => {
         console.error(`Service worker registration failed: ${error}`);
      },
    );
  } else {
     console.error("Service workers are not supported.");
  }
</script>

<script>
	$(document).ready(function() {
		var url = window.location.href;
		if (url.indexOf('user') > -1 || url.indexOf('kategori') > -1) {
			$('#base').collapse('show');
		}
	});
</script>

<script>
	$(document).ready(function() {
		var url = window.location.href;
		if (url.indexOf('laporan/barangMasuk') > -1 || url.indexOf('laporan/barangKeluar') > -1) {
			$('#laporan').collapse('show');
		}
	});
</script>
</body>
</html>