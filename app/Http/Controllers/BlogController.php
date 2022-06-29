<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $artikel = Artikel::get();
        return view('blog.index', compact('artikel'));
    }
    public function detail($id)
    {
        $artikel = Artikel::where('id', $id)->first();
        return view('blog.detailBlog', compact('artikel'));
    }
}
