<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Login - Zianulis Blog</title>

    {{-- Styles --}}
    @stack('before-style')
    @include('includes.style')
    @stack('after-style')
</head>

<!-- Main content -->

<body class="bg-default">
    <div class="main-content">
        <!-- Header -->
        <div class="header bg-gradient-primary py-3 ">
            <div class="container mt-5">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-lg text-white">
                            <strong style="font-size: 30px;">Zianulis Blog</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    <!-- Page content -->
    <div class="container mt--7 pb-4">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-white border-0 mb-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <h3 class="text-muted">Login</h3>
                        </div>
                        @if (session('error'))
                        <div class="alert alert-danger mt-3">
                            {{ session('error') }}
                        </div>
                        @endif
                        @if (session('status'))
                        <div class="alert alert-success mt-3">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form action="/login" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input class="form-control ml-2" placeholder="User Name" type="text" name="username">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input class="form-control ml-2" placeholder="Password" type="password" name="password">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg text-left">
                                    <small> Belum Punya akun? <a href="/register" class="text-primary">Daftar Disini</a></small>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-2">Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-2">
        <div class=" container">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl">
                    <div class="copyright text-center text-muted">
                        &copy; 2022 <a href="#" class="font-weight-bold ml-1" target="_blank">Fauzian Sebastian</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    {{-- Script --}}
    @include('includes.script')
    @stack('after-script')
</body>

</html>