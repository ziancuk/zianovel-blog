<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Zianulis Blog -</title>
    {{-- Styles --}}
    @stack('before-style')
    @include('includes.style')
    @stack('after-style')
</head>

<body class="bg-default">
    <!-- Main content -->
    <div class="main-content">
        <div class="container mt-2 pb-5">
            <h2 class="text-center text-white">Zianulis Blog</h2>
            <div class="row justify-content-center">
                @foreach ($artikel as $a)
                <div class="col-md-4 col-sm-12 mt-4">
                    <div class="card">
                        <img src="{{ asset('/storage/gambar/artikel/'.$a->gambar_artikel) }}" class="card-img-top" alt="gambar">
                        <div class="card-body">
                            <h5 class="card-title">{{ $a->judul_artikel }}</h5>
                            <a href="/detail/{{ $a->id }}" class="btn btn-primary">Baca Artikel</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
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