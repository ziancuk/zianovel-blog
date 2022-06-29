@extends('layouts.app')
<title>List Artikel</title>
@section('content')

<!-- Main content -->
<div class="header bg-gradient-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h1 text-white d-inline-block mb-0">List Artikel</h6>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#artikelModal">Tambah Artikel <i class="fas fa-plus"></i></button>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name" style="font-size:15px">No</th>
                                    <th scope="col" class="sort" data-sort="name" style="font-size:15px">Judul Artikel</th>
                                    <th scope="col" class="sort" data-sort="name" style="font-size:15px">Isi Artikel</th>
                                    <th scope="col" class="sort" data-sort="name" style="font-size:15px">Tanggal Posting</th>
                                    <th scope="col" class="sort" data-sort="name" style="font-size:15px">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse($artikel as $a)
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
                                            <span class="status">{{$a->judul_artikel}}</span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="name mb-0 text-sm">
                                            <span class="status">{{$a->isi_artikel}}</span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="name mb-0 text-sm">
                                            <span class="status">{{$a->created_at}}</span>
                                        </span>
                                    </td>
                                    <td>
                                        <form action="/delete/{{$a->id}}/artikel" method="POST">
                                            @csrf
                                            @method("delete")
                                            <a href="/artikel/{{$a->id}}" class="btn btn-primary btn-sm" style="background-color:#2962FF;">
                                                <i class="fas fa-eye" style="color: white;"></i>
                                            </a>
                                            <button type="submit" onclick="return confirm('Anda yakin ingin menghapusnya?')" class="btn btn-danger btn-sm delete-campaign"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>

                                @empty
                                <tr>
                                    <td colspan="6" class="text-center p-5" style="font-size: 18px;">
                                        Belum Ada Artikel
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

    <!-- ADD ARTIKEL -->
    <div class="modal fade" id="artikelModal" tabindex="-1" aria-labelledby="artikelModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="artikelModal">Tambah Artikel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/add/artikel" method="POST" enctype="multipart/form-data" class="ml-2 mr-2" style="margin: auto;">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" id="judul_artikel" placeholder="Isi Judul Artikel" name="judul_artikel">
                        </div>
                        <div class="form-group">
                            <label for="validationTooltip04">Genre</label>
                            <select class="custom-select" name="genre" id="validationTooltip04" required>
                                <option selected>Pilih genre</option>
                                @forelse($genre as $g)
                                <option value="{{$g->id}}">{{$g->nama_genre}}</option>
                                @empty
                                <option>Tidak Ada Genre</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="inputGroupFile02" name="gambar_artikel">
                                    <label class="input-group-text" for="inputGroupFile02">Tambah</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="input-group-text">Isi Artikel</span>
                            <textarea class="form-control" aria-label="With textarea" name="isi_artikel"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <input type="submit" class="btn btn-primary" value="Tambah Artikel"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection