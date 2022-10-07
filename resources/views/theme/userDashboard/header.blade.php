<body class="layout-2">
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
    
                <nav class="navbar navbar-expand-lg main-navbar">
                    <div class="nav-collapse">
                        <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="navbar-header">
                            <div class="logo-navigasi">
                                <img src="{{asset('assets/images/Logo/logo1.png')}}" alt="" class="img1">
                                <img src="{{asset('assets/images/Logo/logo.png')}}" alt="" class="img2">
                            </div>
                        </div>
                        <ul class="navbar-nav">
                            <li class="nav-item"><a href="{{route('home')}}" class="nav-link home">Beranda</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Produk</a></li>
                            <li class="nav-item submenu dropdown"><a class="nav-link" href="#">Layanan</a>
                            </li>
                            <li class="nav-item"><a href="#" class="nav-link">Tentang</a></li>
                        </ul>
                    </div>
                    <div class="attr-nav">
                        <ul>
                            <li class="dropdown">
                                <a href="#" class="dropdown" style="margin-left: 170px;" data-toggle="dropdown">
                                    <span class="lnr lnr-cart"></span>
                                    @php
                                        $total_items = \Cart::getContent()->count();
                                    @endphp
                                    <span class="badge badge-bg-1">{{$total_items}}</span>
                                </a>
                            </li>
                            <li class="nav-item submenu dropdown active">
                                <a href="#" class="nav-link dropdown user" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    Hi, {{Auth::user()->username}}
                                    <span class="lnr lnr-chevron-down"></span>
                                </a>
                                <ul class="dropdown-menu menu">
                                    <li class="nav-item"><a class="nav-link" href="{{route('user.akun')}}"><span class="lnr lnr-user"> Akun Saya</span> </a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{route('user.settings')}}"><span class="lnr lnr-cog"> Settings</span></a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{route('auth.logout')}}"><span class="lnr lnr-exit"> Logout</span></a></li>
                                </ul>
                            </li>
                        </ul>
    
                    </div>
                </nav>
                <div class="main-sidebar">
                    <aside id="sidebar-wrapper">
                        <div class="sidebar-brand sidebar-gone-show"><a href="index.html">Stisla</a></div>
                        <ul class="sidebar-menu">
                            <li class="nav-item dropdown {{request()->is('user/akun') ? 'active' : ''}}">
                                <a href="{{route('user.akun')}}" class="nav-link">
                                    <i class="fa fa-desktop"></i>
                                    <span>Dashboard</span></a>
                            </li>
                            <li class="nav-item dropdown {{request()->is('user/profile') ? 'active' : ''}}">
                                <a href="{{route('user.profile')}}" class="nav-link">
                                    <i class="fa fa-user"></i>
                                    <span>Edit Profile</span></a>
                            </li>
                            <li class="nav-item {{request()->is('user/order') || request()->is('user/order_view/*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{route('user.order')}}">
                                    <i class="fa fa-clipboard-list"></i>
                                    <span>Pesanan Saya</span></a>
                            </li>
                            <li class="nav-item {{request()->is('user/pembayaran') ? 'active' : '' }}">
                                <a class="nav-link" href="{{route('user.pembayaran')}}">
                                    <i class="fa fa-credit-card"></i>
                                    <span>Pembayaran Saya</span></a>
                            </li>
                            <li>
                                <a class="nav-link" href="credits.html">
                                    <i class="fa fa-pen"></i>
                                    <span>Ulasan Produk</span></a>
                            </li>
                        </ul>
                    </aside>
                </div>