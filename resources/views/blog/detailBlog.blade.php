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
        <div class="col-md-12 col-sm-12 mb-5 bg-white p-0">
            <img src="{{ asset('/storage/gambar/artikel/'.$artikel->gambar_artikel) }}" class="card-img-top" alt="gambar">
            <div class="p-4">
                <h2>{{ $artikel->judul_artikel }}</h2>
                <p class="mt-5">{{ $artikel->isi_artikel }}</p>
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