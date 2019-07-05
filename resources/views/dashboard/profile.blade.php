@extends('dashboard.admin')
@section('content')
   <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                	<div class="card-two">
                        <header>
                            <div class="avatar">
                            @if ($detail->profile->photo != null )
                                <img align="center" src="/fahriart2/public/{{$detail->profile->photo}}" alt="">
                            @else
                                <img src="{{ asset('image/user-default.jpg') }}" alt="">
                            @endif
                            </div>
                        </header>

                        <h3>{{$detail->profile->first_name}} {{$detail->profile->last_name}}</h3>
                            <div class="desc">
                        	    {{$detail->profile->address}}
                            </div>
                        <div class="contacts">
                            <a href="{{ url('/register') }}"><i class="fa fa-plus"></i></a>
                            <a target="_blank" href="https://web.whatsapp.com/send?phone=62{{$detail->profile->phone}}&text="><i class="fa fa-whatsapp"></i></a>
                            <a href="mailto:{{$detail->email}}"><i class="fa fa-envelope"></i></a>
                        	<div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Profile</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-selected="false">Settings</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!--second tab-->
                                <div class="tab-pane active show" id="profile" role="tabpanel">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                                <br>
                                                <p class="text-muted">{{$detail->profile->first_name}} {{$detail->profile->last_name}}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Nick Name</strong>
                                                <br>
                                                <p class="text-muted">{{$detail->profile->nickname}}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                                                <br>
                                                <p class="text-muted">+62{{$detail->profile->phone}}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                                <br>
                                                <p class="text-muted">{{$detail->email}}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Location</strong>
                                                <br>
                                                <p class="text-muted">{{$detail->profile->address}}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Facebook</strong>
                                                <br>
                                                <a class="text-muted" href="{{$detail->profile->facebook}}">{{$detail->profile->facebook}}</a>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Instagram</strong>
                                                <br>
                                                <a class="text-muted" href="{{$detail->profile->instagram}}">{{$detail->profile->instagram}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="settings" role="tabpanel">
                                    <div class="card-body">
                                        <form action="{{ route('auth.update',$detail->id) }}" method="POST" class="form-horizontal form-material">
                                        @csrf
                                            <div class="form-group">
                                                <label class="col-md-12">Full Name</label>
                                                <div class="col-md-12">
                                                <div class="row">
                                                    <input type="text" placeholder="First Name" name="first_name" class="form-control form-control-line col-md-6" value="{{$detail->profile->first_name}}">
                                                    <input type="text" placeholder="Last Name" name="last_name" class="form-control form-control-line col-md-6" value="{{$detail->profile->last_name}}">
                                                </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Nickname</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Nickname" class="form-control form-control-line" name="nickname" value="{{$detail->profile->nickname}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Phone No</label>
                                                <div class="col-md-12">
                                                <div class="input-group">
                                                        <input type="button" class="btn btn-info" readonly="" value="+62">
                                                        <input type="text" name="phone" placeholder="Telephone" class="form-control form-control-line" value="{{$detail->profile->phone}}"> 
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                <div class="input-group">
                                                        <input type="hidden" name="id_user" value="{{ $detail->id }}"></input>
                                                        <input type="email" name="email" placeholder="Email" class="form-control form-control-line" value="{{$detail->email}}"> 
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Facebook</label>
                                                <div class="col-md-12">
                                                <div class="input-group">
                                                        <input type="text" name="facebook" placeholder="Facebook" class="form-control form-control-line" value="{{$detail->profile->facebook}}"> 
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Instagram</label>
                                                <div class="col-md-12">
                                                <div class="input-group">
                                                        <input type="text" name="instagram" placeholder="Instagram" class="form-control form-control-line" value="{{$detail->profile->instagram}}"> 
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Address</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="address" placeholder="Address" class="form-control form-control-line" value="{{$detail->profile->address}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Thumbnail</label>
                                                    <div class="input-group">
                                                        <span class="input-group-btn">
                                                        <a style="color:white" id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-info">
                                                        <i class="fa fa-picture-o"></i> Choose
                                                        </a>
                                                        </span>
                                                        <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$detail->profile->photo}}">
                                                        </div>
                                                    Now <img src="/fahriart2/public/{{$detail->profile->photo}}" style="margin-top:15px;max-height:100px;" alt=""> Change to <img id="holder" style="margin-top:15px;max-height:100px;">
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-info">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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
@endsection