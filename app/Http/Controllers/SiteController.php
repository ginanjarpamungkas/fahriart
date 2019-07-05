<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Artikel;
use App\Galery;
use App\Other;
use App\Profile;

class SiteController extends Controller
{
    public function index()
    {   
        $ket_harga = Other::whereKeterangan('ket_harga')->first();
        $profile = Other::whereKeterangan('profile')->first();
        $pengerjaan = Other::whereKeterangan('pengerjaan')->first();
        $kualitas = Other::whereKeterangan('kualitas')->first();
        $harga = Other::whereKeterangan('harga')->first();

        $posts = Artikel::orderBy('created_at','desc')->limit(6)->get();
        $users = Profile::where('last_name','<>','admin')->get();
        return view('site.home', compact('posts','ket_harga','profile','pengerjaan','kualitas','harga','users'));
    }

    public function kategori($slug)
    {   
        //untuk dropdwon
        $all_kategori = Category::orderBy('name','asc')->get();

        $kategori = Category::where('slug',$slug)->first();
        $posts = $kategori->artikels()->orderBy('created_at','desc')->whereStatus('Publish')->get();
        return view('site.kategori', compact('posts','kategori','all_kategori'));
    }

    public function artikel()
    {   
        //untuk dropdwon
        $all_kategori = Category::orderBy('name','asc')->get();

        $posts = Artikel::orderBy('created_at','desc')->get();
        return view('site.artikel', compact('posts','all_kategori'));
    }

    public function show($slug)
    {   
        //untuk dropdwon
        $all_kategori = Category::orderBy('name','asc')->get();

        $id = Artikel::whereSlug($slug)->first()->id;
        $galery = Galery::where('artikel_id',$id)->get();
        $post = Artikel::whereSlug($slug)->first();

        // input visitor
        $post->view = $post->view + 1;
        $post->save();
        
        return view('site.show', compact('post','all_kategori','galery'));
    }
}
