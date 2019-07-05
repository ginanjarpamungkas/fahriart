<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Galery;
use App\Artikel;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Artikel::orderBy('created_at','desc')->get();
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::orderBy('name', 'asc')->get();
        return view('post.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // validasi
        $this->validate($request, [
         'title'        => 'required',
         'body'         => 'required',
         'excerpt'      => 'required',
         'category'     => 'required',
         'thumbnail'    => 'required',
         'status'       => 'required',
      ]);
        // explode tags
        //$tags = explode(",", $request->tags);
        
        $user_id = Auth::user()->id;
        // masukan data ke database
        $post = Artikel::create([
         'user_id'         => $user_id,
         'title'           => $request->title,
         'body'            => $request->body,
         'excerpt'         => $request->excerpt,
         'thumbnail'       => $request->thumbnail,
         'status'          => $request->status,
         'category_id'     => $request->category,
      ]);
        
        // input tags
        //$post->tag($tags);
        return back()->with('success', 'Post saved');
    }

    public function galery(Request $request)
    {
        // validasi
        $this->validate($request, [
            'artikel_id' => 'required',
            'thumbnail' => 'required',
            'thumbnail.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],[
            'thumbnail.required' => 'File harus dipilih',
            'thumbnail.image' => 'File harus foto',
            'thumbnail.mimes' => 'File harus dengan format .jpeg, .png, .gif, atau .svg',
            'thumbnail.max' => 'Ukuran maskimal 2 mb',

      ]);
        // masukan data ke database
        if($request->hasfile('thumbnail'))
         {

            foreach($request->file('thumbnail') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/galery/', $name);  
                $data[] = $name;  
            }
         }
         //@dd($data);

         $form= new Galery();
         $form->thumbnail=json_encode($data);
         $form->artikel_id=$request->artikel_id;
         
        
        $form->save();

        return back()->with('success', 'Your images has been successfully');
    }

    public function show($id)
    {
        $post = Artikel::where('id',$id)->first();
        $galery = Galery::where('artikel_id',$id)->get();
        $categories = Category::orderBy('name', 'asc')->get();

        return view('post.show', compact('categories','post','galery'));
    }

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
         'title'        => 'required',
         'body'         => 'required',
         'excerpt'      => 'required',
         'category'     => 'required',
         'thumbnail'    => 'required',
         'status'       => 'required',
        ]);

        $post = Artikel::find($id);

        $post->update([
         'title'           => $request->title,
         'body'            => $request->body,
         'excerpt'         => $request->excerpt,
         'thumbnail'       => $request->thumbnail,
         'status'          => $request->status,
         'category_id'     => $request->category,
        ]);

        return back()->with('success', 'Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Artikel::find($id);
        // hapus data
        $post->delete();

      return back()->with('success', 'Post deleted');
    }
}
