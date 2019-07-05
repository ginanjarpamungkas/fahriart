@extends('dashboard.admin')
@section('content')
   <div class="row">
        <div class="col-12">
            <div class="card">
                    <div class="card-title">
                        <h3>Setting Keterangan Harga</h3>
                    </div>
                    <div class="card-body">
                        <div class="basic-elements">
                            <form action="{{ route('setting.update.harga',$harga->id) }}" method="POST">
                            {{csrf_field()}}
                             <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <textarea class="form-control" id="konten1" rows="8" placeholder="Text input" name="detail">{{ $harga->detail }}</textarea>
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