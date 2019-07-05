<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;

class CategoryController extends Controller
{
    public function index()
   {
      $categories = Category::orderBy('name', 'asc')->get();
      return view('categories.index', compact('categories'));
   }

   public function store(Request $request)
   {
      // validasi form
      $this->validate($request, [
         'category'   => 'required',
      ]);
      // buat slug
      $slug = str_slug($request->category, '-');
      // jika slug sudah ada di db maka tambahkan waktu
      if(Category::where('slug', $slug)->first() != null)
      $slug = $slug.'-'.time();
      // masukan data ke debug
      $category = Category::create([
         'name'   => $request->category,
         'slug'   => $slug,
      ]);

      return back()->with('success', 'Category added');
   }

   public function destroy($id)
   {
      // cari category berdasarkan param id yang di terima
      $category = Category::find($id);
      // lakukan hapus
      $category->delete();

      return back()->with('success', 'Category deleted');
   }

   public function show($slug)
   {

   }

   public function update(Request $request, $id)
   {
      
   }

}
