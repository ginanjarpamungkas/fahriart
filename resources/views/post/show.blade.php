@extends('dashboard.admin')
@section('content')
   <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-b-0">
                    <h4 class="card-title">Detail Artikel</h4>
                    @if (count($errors) > 0)
                      <div class="alert alert-danger">
                        <strong>Whoops!</strong> Ada masalah dengan file yang anda masukan.<br><br>
                        <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div>
                     @endif
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs customtab2" role="tablist">
                        <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home7" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Show</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile7" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Edit</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#galery7" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Galery</span></a> </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">

                        <div class="tab-pane active show" id="home7" role="tabpanel">
                        	<div class="row">
                        		<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            		<h1>{{ $post->title }}</h1><span>{{ $post->created_at }}</span>
                            		<br><br>
                            		@php
                            			echo $post->body;
                            		@endphp
                            		<hr>
                            		<h3>Excerpt:</h3>
                            		{{ $post->excerpt }}
                            	</div>
                            	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            	  
	                              <h4 class="text-center">Gambar</h4>
	                              <img align="center" src="/fahriart2/public/{{$post->thumbnail}}" style="margin-top:15px;max-height:150px;" alt="">
	                              <hr>
	                              <h4 class="text-center">Contributor</h4>
	                                Name:
	                                <p>{{$post->user->name}}</p>
	                                   
	                                Email:
	                                <p>{{$post->user->email}}</p>
	                              <hr>
	                              <h4 class="text-center">Kategori</h4>
	                              	<p>{{$post->category->name}}</p>
	                              <hr>
	                              <h4 class="text-center">Status</h4>
	                              	<p>{{$post->status}}</p>

	                            </div>
                        	</div>                     	                          
                        </div>

                        <div class="tab-pane p-20" id="profile7" role="tabpanel">
                        	<form action="{{ route('post.update',$post) }}" method="POST">
                        	<input name="_method" type="hidden" value="PUT">
                                    {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" class="form-control" placeholder="Judul Artikel" name="title" value="{{ $post->title }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Body</label>
                                                    <textarea class="form-control" id="konten1" rows="8" placeholder="Text input" name="body">{{ $post->body }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Excerpt</label>
                                                    <textarea class="form-control" style="height: 100px" placeholder="Text input" name="excerpt">{{ $post->excerpt }}</textarea>
                                                </div>

                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Thumbnail</label>
                                                    <div class="input-group">
														<span class="input-group-btn">
														<a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-warning">
														<i class="fa fa-picture-o"></i> Choose
														</a>
														</span>
														<input id="thumbnail" class="form-control" type="text" name="thumbnail" value="{{$post->thumbnail}}">
														</div>
 													Now<br><img src="/fahriart2/public/{{$post->thumbnail}}" style="margin-top:15px;max-height:100px;" alt=""><br>Change to<br><img id="holder" style="margin-top:15px;max-height:100px;">
                                                </div>
                                                <div class="form-group">
                                                    <label>Tags</label>
                                                    <input class="form-control" type="text" name="tag" placeholder=Tags>
                                                </div>
                                                <div class="form-group">
                                                    <label>Category</label>
                                                    <select class="form-control" name="category">
                                                    <option value="{{$post->category_id}}">{{$post->category->name}}</option>
                                                    <option value="0">-- Please select category --</option>
                                                    @foreach ($categories as $cat)
                                                        <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control" name="status">
                                                    	<option value="{{$post->status}}">{{$post->status}}</option>
                                                    	<option value="0">-- Please select status --</option>
                                                        <option value="Publish">Publish</option>
                                                        <option value="Draft">Draft</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-info">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                        </div>

                        <div class="tab-pane p-20" id="galery7" role="tabpanel">
                        <form method="post" action="{{ route('galery.store') }}" enctype="multipart/form-data">
                        {{csrf_field()}}

                            <div class="input-group control-group increment" >
                            <input type="hidden" name="artikel_id" value="{{ $post->id }}"></input>
                              <input type="file" name="thumbnail[]" class="form-control">
                              <div class="input-group-btn"> 
                                <button class="btn btn-success add" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                              </div>
                            </div>
                            <div class="clone hide">
                              <div class="control-group input-group" style="margin-top:10px">
                                <input type="file" name="thumbnail[]" class="form-control">
                                <div class="input-group-btn"> 
                                  <button class="btn btn-danger move" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                </div>
                              </div>
                            </div>

                            <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>

                        </form>
                        @php
                            foreach ($galery as $pic) {
                                $thumbnail = json_decode($pic->thumbnail);
                                foreach ($thumbnail as $view) {
                                        echo '<img style="margin-top:15px;max-height:100px;" src="'.asset('').'/galery/'.$view.'"> &nbsp';
                                    }    
                            }
                        @endphp
                        {{-- @php
                            $thumbnail = json_decode($galery->thumbnail);
                        @endphp
                        @foreach ($thumbnail as $pic)
                            <img style="margin-top:15px;max-height:100px;" src="{{ asset('/galery') }}/{{$pic}}">
                        @endforeach --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
   </div>
@endsection
@section('footer')
    <script type="text/javascript">

        $(document).ready(function() {

          $(".add").click(function(){ 
              var html = $(".clone").html();
              $(".increment").after(html);
          });

          $("body").on("click",".move",function(){ 
              $(this).parents(".control-group").remove();
          });

        });

    </script>
    <!-- ckeditor -->
    <script>var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";</script>
    <script>
      {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
    </script>

    <script>
      $('#lfm').filemanager('image', {prefix: route_prefix});
      $('#lfm2').filemanager('file', {prefix: route_prefix});
    </script>
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    </script>
    <script>
      var konten = document.getElementById("konten1");
        CKEDITOR.replace(konten,{
        language:'en-gb'
      });
      CKEDITOR.config.allowedContent = true;
    </script>
    
@endsection