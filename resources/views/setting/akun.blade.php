@extends('dashboard.admin')
@section('content')
   <div class="row">
        <div class="col-12">
            <div class="card">
                    <div class="card-title">
                        <h3>Setting Akun</h3>
                        <h5 style="color:red; background-color: yellow" class="btn"><b>Untuk Whatsapp masukan angka dibelakang angka +62 atau angka 0 !</b></h5>
                    </div>
                    <div class="card-body">
                        <div class="basic-elements">
                            <form action="{{ route('setting.update.akun') }}" method="POST">
                            {{csrf_field()}}
                             <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    @foreach ($settings as $set)
                                       	<div class="form-group">
                                            <label>{{$set->setting_key}}</label>
                                            <input type="text" class="form-control" placeholder="{{$set->setting_key}}" name="{{$set->setting_key}}" value="{{$set->setting_value}}">
                                        </div>
                                    @endforeach
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
