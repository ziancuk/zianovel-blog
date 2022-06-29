<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Genre;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $genre = Genre::count();
        $artikel = Artikel::count();
        return view('dashboard.index', compact('genre', 'artikel'));
    }
    public function listArtikel()
    {
        $artikel = Artikel::orderBy('created_at', 'asc')->paginate(10);
        $genre = Genre::get();
        return view('dashboard.artikel', compact('artikel', 'genre'));
    }


    public function addArtikel(Request $request)
    {
        $request->validate(
            [
                'genre' => 'required',
                'judul_artikel' => 'required',
                'gambar_artikel' => 'required|mimes:jpg,png,jpeg|max:5120',
                'isi_artikel' => 'required',
            ],
            [
                'genre.required' => 'Genre tidak boleh kosong!',
                'judul_artikel.required' => 'Judul Artikel tidak boleh kosong!',
                'gambar_artikel.required' => 'Gambar tidak boleh kosong!',
                'isi_artikel.required' => 'Isi Artikel tidak boleh kosong!',
            ]
        );
        $gambar = $request->gambar_artikel;
        $nama_gambar = "artikel" . "_" . time() . rand(100, 999) . "." . $gambar->getClientOriginalExtension();
        $gambar->storeAs('/gambar/artikel', $nama_gambar);

        Artikel::create([
            'genre' => $request->genre,
            'judul_artikel' => $request->judul_artikel,
            'isi_artikel' => $request->isi_artikel,
            'gambar_artikel' => $nama_gambar
        ]);

        return redirect('/list-artikel')->with('status', 'Artikel berhasil ditambahkan');
    }

    public function updateArtikel(Request $request, Artikel $artikel)
    {
        $postRequest = $request->validate(
            [
                'genre' => 'required',
                'judul_artikel' => 'required',
                'isi_artikel' => 'required',
            ],
            [
                'genre.required' => 'Genre tidak boleh kosong!',
                'judul_artikel.required' => 'Judul Artikel tidak boleh kosong!',
                'isi_artikel.required' => 'Isi Artikel tidak boleh kosong!',
            ]
        );

        $artikel->update($postRequest);

        return redirect('/list-artikel')->with('status', 'Artikel berhasil diubah');
    }

    public function getArtikel(Artikel $post)
    {
        $artikel = $post->first();
        $genre = Genre::get();
        return view('dashboard.detailArtikel', compact('artikel', 'genre'));
    }
    public function destroyArtikel($id)
    {
        Artikel::where('id', $id)->delete();
        return redirect('/list-artikel')->with('status', 'Artikel berhasil dihapus');
    }

    public function getGenre()
    {
        $genre = Genre::get();
        return view('dashboard.genre', compact('genre'));
    }

    public function addGenre(Request $request)
    {
        $postRequest = $request->validate(
            [
                'nama_genre' => 'required',
            ],
            [
                'nama_genre.required' => 'Genre tidak boleh kosong!',
            ]
        );
        Genre::create($postRequest);

        return redirect('/genre')->with('status', 'Genre berhasil ditambahkan');
    }

    public function editGenre($id)
    {
        $genre = Genre::where('id', $id)->first();
        return view('dashboard.editGenre', compact('genre'));
    }

    public function updategenre(Request $request, $id)
    {
        $postRequest = $request->validate(
            [
                'nama_genre' => 'required',
            ],
            [
                'nama_genre.required' => 'Genre tidak boleh kosong!',
            ]
        );
        Genre::where('id', $id)->update($postRequest);

        return redirect('/genre')->with('status', 'Genre berhasil diubah');
    }

    public function destroyGenre($id)
    {
        Genre::where('id', $id)->delete();
        return redirect('/genre')->with('status', 'Genre berhasil dihapus');
    }
}
