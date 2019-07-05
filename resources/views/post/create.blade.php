@extends('dashboard.admin')
@section('content')
   <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Buat Artikel</h4>

                            </div>
                            <div class="card-body">
                                <div class="basic-elements">
                                    <form action="{{ route('post.store') }}" method="POST">
                                    {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" class="form-control" placeholder="Judul Artikel" name="title">
                                                </div>
                                                <div class="form-group">
                                                    <label>Body</label>
                                                    <textarea class="form-control" id="konten1" rows="8" placeholder="Text input" name="body"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Excerpt</label>
                                                    <textarea class="form-control" style="height: 100px" placeholder="Ulasan Singkat" name="excerpt"></textarea>
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
														<input id="thumbnail" class="form-control" type="text" name="thumbnail">
														</div>
 													<img id="holder" style="margin-top:15px;max-height:100px;">
                                                </div>
                                                <div class="form-group">
                                                    <label>Tags</label>
                                                    <input class="form-control" type="text" name="tag" placeholder=Tags>
                                                </div>
                                                <div class="form-group">
                                                    <label>Category</label>
                                                    <select class="form-control" name="category">
                                                    <option value="0">-- Please select category --</option>
                                                    @foreach ($categories as $cat)
                                                        <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control" name="status">
                                                    <option value="0">-- Please select status --</option>
                                                        <option value="Publish">Published</option>
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
                            </div>
                        </div>
                    </div>
                </div>
@endsection
@section('footer')
    
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

    <script>
      var konten = document.getElementById("konten1");
        CKEDITOR.replace(konten,{
        language:'en-gb'
      });
      CKEDITOR.config.allowedContent = true;
    </script>
    
@endsection