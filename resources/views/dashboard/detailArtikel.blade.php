@extends('layouts.app')
<title>Edit - Artikel</title>
@section('content')
<div class="header bg-gradient-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h1 text-white d-inline-block mb-0">Edit Artikel</h6>
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
                <div class="card-header">
                    <h5 class="mt-1">Artikel</h5>
                </div>
                <div class="card-body">
                    <form action="/artikel/{{$artikel->id}}/update" method="POST" enctype="multipart/form-data" class="ml-2 mr-2" style="margin: auto;">
                        @method('patch')
                        @csrf
                        <div class="form-group row">
                            <img src="{{ asset('/storage/gambar/artikel/'.$artikel->gambar_artikel) }}" class="img-thumbnail" width="100%">
                            <div class="custom-file">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="inputGroupFile02" name="gambar_artikel" value="{{old('gambar_artikel')}}">
                                    <label class="input-group-text" for="inputGroupFile02">Ubah</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticName" class="col-sm-2 col-form-label">Judul Artikel</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="judul_artikel" placeholder="Isi Judul Artikel" name="judul_artikel" value="{{old('judul_artikel') ?? $artikel->judul_artikel}}">
                                @error('judul_artikel')
                                <div class="mt-1">
                                    <small class="ml-1" style="color: red;">{{$message}}</small>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="validationTooltip04" class="col-sm-2 col-form-label">Genre</label>
                            <div class="col-sm-10">
                                <select class="custom-select" name="genre" id="validationTooltip04" required>
                                    <option selected>Pilih genre</option>
                                    @forelse($genre as $g)
                                    <option value="{{$g->id}} ">{{$g->nama_genre}}</option>
                                    @empty
                                    <option>Tidak Ada Genre</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <span class="input-group-text">Isi Artikel</span>
                            <textarea class="form-control" aria-label="With textarea" name="isi_artikel" value="{{$artikel->isi_artikel}}">{{$artikel->isi_artikel}}</textarea>
                        </div>
                        <div class="col-lg text-right p-0">
                            <a href="/list-artikel" type="button" class="btn btn-secondary">Kembali</a>
                            <input type="submit" class="btn btn-primary" value="Edit"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection