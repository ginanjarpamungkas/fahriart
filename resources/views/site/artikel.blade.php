@extends('frontend.link')
@section('content')
	<!-- Portfolio Grid -->
    <section class="bg-light" id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Karya Kami</h2>
          </div>
        </div>
        <div class="row">
        @foreach ($posts as $post)
        	<div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" href="{{ route('site.artikel.detail',$post->slug) }}">
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
      </div>
    </section>
@endsection