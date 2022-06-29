@extends('layouts.app')
<title>Genre</title>
@section('content')
<div class="header bg-gradient-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h1 text-white d-inline-block mb-0">Master Genre</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row justify-content-center">
        <div class="col-lg">
            <div class="card">
                <!-- Light table -->
                <div class="card-body">
                    <div class="col-lg p-0 mb-4 text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#genreModal">Tambah Genre <i class="fas fa-plus"></i></button>
                    </div>
                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        {{$error}} <br>
                        @endforeach
                    </div>
                    @endif
                    @if (session('status'))
                    <div class="alert alert-success mt-3">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name" style="font-size:15px">No</th>
                                    <th scope="col" class="sort" data-sort="name" style="font-size:15px">Nama Genre</th>
                                    <th scope="col" class="sort" data-sort="name" style="font-size:15px">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse($genre as $g)
                                <tr>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm">{{$loop->iteration}}</span>
                                            </div>
                                        </div>
                                    </th>
                                    <td>
                                        <span class="name mb-0 text-sm">
                                            <span class="status">{{$g->nama_genre}}</span>
                                        </span>
                                    </td>
                                    <td>
                                        <form action="/delete/{{$g->id}}/genre" method="POST">
                                            @csrf
                                            @method("delete")
                                            <a href="/genre/{{$g->id}}" class="btn btn-primary btn-sm" style="background-color:#2962FF;">
                                                <i class="fas fa-edit" style="color: white;"></i>
                                            </a>
                                            <button type="submit" onclick="return confirm('Anda yakin ingin menghapusnya?')" class="btn btn-danger btn-sm delete-campaign"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center p-5" style="font-size: 18px;">
                                        Belum Ada Genre
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Card footer -->
                    <div class="card-footer py-4">
                        <nav aria-label="...">
                            <ul class="pagination justify-content-end mb-0">
                                <li class="page-item">
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ADD KARYAWAN -->
    <div class="modal fade" id="genreModal" tabindex="-1" aria-labelledby="genreModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="genreModal">Tambah Loket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/add/genre" method="POST" enctype="multipart/form-data" class="ml-2 mr-2" style="margin: auto;">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_genre" placeholder="Isi Nama Genre" name="nama_genre">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <input type="submit" class="btn btn-primary" value="Tambah Genre"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection