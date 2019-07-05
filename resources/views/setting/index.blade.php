@extends('dashboard.admin')
@section('content')
   <div class="row">
        <div class="col-12">
            <div class="card">
                    <div class="card-title">
                        <h3>Setting Website</h3>
                    </div>
                    <div class="card-body">
                        <div class="basic-elements">
                        <form action="{{ route('setting.update') }}" method="POST">
                        @csrf
                            <div class="row">
                                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                                    <img style="width:80px" src="{{ asset('image/lampu.png') }}" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                    <h4>Profile</h4>
                                    <input type="hidden" name="id{{ $profile->id }}" value="{{ $profile->id }}"></input>
                                    <textarea name="detail[{{ $profile->id }}]" style="height:200px" class="form-control">{{ $profile->detail }}</textarea>
                                </div>
                                
                                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                                    <img style="width:80px" src="{{ asset('image/telor.png') }}" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                    <h4>Pengerjaan</h4>
                                    <input type="hidden" name="id{{ $pengerjaan->id }}" value="{{ $pengerjaan->id }}"></input>
                                    <textarea name="detail[{{ $pengerjaan->id }}]" style="height:200px" class="form-control">{{ $pengerjaan->detail }}</textarea>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                                    <img style="width:80px" src="{{ asset('image/recycle.png') }}" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                    <h4>Kualitas</h4>
                                    <input type="hidden" name="id{{ $kualitas->id }}" value="{{ $kualitas->id }}"></input>
                                    <textarea name="detail[{{ $kualitas->id }}]" style="height:200px" class="form-control">{{ $kualitas->detail }}</textarea>
                                </div>
                                
                                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                                    <img style="width:80px" src="{{ asset('image/handshake.png') }}" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                    <h4>Harga</h4>
                                    <input type="hidden" name="id{{ $harga->id }}" value="{{ $harga->id }}"></input>
                                    <textarea name="detail[{{ $harga->id }}]" style="height:200px" class="form-control">{{ $harga->detail }}</textarea>
                                </div>
                            </div><br>
                            <button type="submit" class="btn btn-info pull-right">Save</button>
                        </form>    
                        </div>
                    </div>
            </div>
        </div>
   </div>
@endsection
