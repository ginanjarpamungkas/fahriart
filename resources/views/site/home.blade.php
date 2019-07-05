@extends('frontend.master')
@section('content')
	    <!-- JASA -->
    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Jasa</h2>
            <h3 class="section-subheading text-muted">Kami bergerak dalam bidang</h3>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-4">
          <a href="{{ route('site.kategori','kaligrafi-kubah') }}">
            <span class="fa-stack fa-4x">
              <img style="width: 100%" src="{{ asset('image/kubah.png') }}">
            </span>
            <h4 class="service-heading">Kaligrafi Kubah</h4>
            <p class="text-muted">Membuat tampilan kubah lebih menarik</p>
          </a>
          </div>
          <div class="col-md-4">
          <a href="{{ route('site.kategori','kaligrafi-dinding') }}">
            <span class="fa-stack fa-4x">
              <img style="width: 100%" src="{{ asset('image/dinding.png') }}">
            </span>
            <h4 class="service-heading">Kaligrafi Dinding</h4>
            <p class="text-muted">Dinding menjadi indah</p>
          </a>
          </div>
          <div class="col-md-4">
          <a href="{{ route('site.kategori','grc-masjid') }}">
            <span class="fa-stack fa-4x">
              <img style="width: 100%" src="{{ asset('image/grc.png') }}">
            </span>
            <h4 class="service-heading">GRC</h4>
            <p class="text-muted">GRC paten bukan kaleng-kaleng</p>
          </a>
          </div>
        </div>
      </div>
    </section>

    <!-- Portfolio Grid -->
    <section class="bg-light" id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Portofolio</h2>
            <h3 class="section-subheading text-muted">Bekerja dengan kepercayaan</h3>
          </div>
        </div>
        <div class="row">



        @foreach ($posts as $post)
        	<div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal{{$post->id}}">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" style="display: block;margin-left: auto;margin-right: auto;" src="/fahriart2/public/{{$post->thumbnail}}" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>{{$post->title}}</h4>
              <p class="text-muted" align="justify">{{$post->excerpt}}</p>
            </div>
          </div>
        @endforeach
        </div>
        <div class="row">
          <center><a href="{{ route('site.artikel') }}" class="pull-right btn btn-warning">Show All >></a></center>
        </div>
      </div>
    </section>

    <!-- About -->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Tentang Kami</h2>
            <h3 class="section-subheading text-muted">Sedikit intro tentang kami.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <ul class="timeline">
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="{{ asset('image/lampu.png') }}" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>FahriART</h4>
                    <h4 class="subheading">Profile</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">{{ $profile->detail }}</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="{{ asset('image/telor.png') }}" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="subheading">Pengerjaan</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">{{ $pengerjaan->detail }}</p>
                  </div>
                </div>
              </li>
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="{{ asset('image/recycle.png') }}" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="subheading">Kualitas</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">{{ $kualitas->detail }}</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="{{ asset('image/handshake.png') }}" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="subheading">Harga</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">{{ $harga->detail }}</p>
                    <a class="btn btn-warning" data-toggle="modal" href='#harga'>Klik Detail</a>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="{{ asset('image/end.png') }}" alt="">
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Team -->
    <section class="bg-light" id="team">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Tim Luar Biasa Kami</h2>
            <h3 class="section-subheading" style="color:black">Kami membangun sebuah <a style="color:black" href="{{ route('auth.login') }}">tim</a> dengan berasas kekompakan, kenyamanan dalam berkarya, ketelitian dan juga solidaritas sesama tim.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
          @foreach ($users as $user)
            <div class="team-member">
            @if ($user->photo != null)
              <img class="mx-auto rounded-circle" src="/fahriart2/public/{{$user->photo}}" alt="">
            @else
              <img class="mx-auto rounded-circle" src="{{ asset('image/user-default.jpg') }}" alt="">
            @endif
              <h4>{{ $user->first_name }} {{ $user->last_name }}</h4>
              <ul class="list-inline social-buttons">
                <li class="list-inline-item">
                  <a href="{{ $user->instagram }}">
                    <i class="fa fa-instagram"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="{{ $user->facebook }}">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
              </ul>
            </div>
          @endforeach
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <p class="large text-muted">"Dengan Kerjasama Jalan Menuju Kesuksesan Lebih Mudah"</p>
          </div>
        </div>
      </div>
    </section>

    {{-- <!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Hubungi Kami</h2>
            <h3 class="section-subheading text-muted">Data anda tidak akan dipublikasikan</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form id="contactForm" name="sentMessage" novalidate>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="name" type="text" placeholder="Your Name *" required data-validation-required-message="Please enter your name.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" type="email" placeholder="Your Email *" required data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required data-validation-required-message="Please enter your phone number.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Your Message *" required data-validation-required-message="Please enter a message."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Kirim</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section> --}}
@foreach ($posts as $post)
	<!-- Modal 6 -->
    <div class="portfolio-modal modal fade" id="portfolioModal{{$post->id}}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">{{$post->title}}</h2>
                  <p class="item-intro text-muted">{{$post->category->name}}</p>
                  <img class="img-fluid d-block mx-auto" src="/fahriart2/public/{{$post->thumbnail}}" alt="">
                  @php
                  	echo $post->body;
                  @endphp
                  <ul class="list-inline">
                    <li>Date: {{ date('d M Y', strtotime($post->created_at)) }}</li>
                    <li>Category: <a href="{{ route('site.kategori',$post->category_id) }}">{{$post->category->name}}</a></li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endforeach

<div class="portfolio-modal modal fade" id="harga" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Detail Harga</h2>
                  <p class="item-intro text-muted"></p>

                  @php
                    echo $ket_harga->detail ;
                  @endphp
                  <br>
                  <ul class="list-inline">
                    <li><a data-toggle="tooltip" class="btn btn-success" target="_blank" title="Whatsapp" href="https://web.whatsapp.com/send?phone=62{{ UserHelp::getSetting('whatsapp') }}&text=Assalamualaikum%20Saya%20tertarik%20untuk%20memesan%20kaligrafi%20anda%20">Order Now <i class="fa fa-whatsapp"></i></a></li>
                  </ul>
                  <button class="btn btn-danger" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection