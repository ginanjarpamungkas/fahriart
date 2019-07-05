@extends('frontend.link')
@section('content')
	<section class="bg-light" id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">{{$post->title}}</h2>
          </div>
        </div>
        <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <p class="item-intro text-muted"><center>By {{$post->user->name}}</center></p>
                  <img class="img-fluid d-block mx-auto" src="/fahriart2/public/{{$post->thumbnail}}" alt=""><br>
                  @php
                  	echo $post->body;
                  @endphp

                  <ul class="list-inline">
                    <li>Date: {{ date('d M Y', strtotime($post->created_at)) }}</li>
                    <li>Category: <a href="{{ route('site.kategori',$post->category_id) }}">{{$post->category->name}}</a></li>
                  </ul>
                </div>
              </div>
            </div>  
            <h2><center>Galery</center></h2>
            <p><center>Click On The Images:</center></p>
              <div class="row">
              <div class="col-lg-8 mx-auto">
              @foreach ($galery as $pic)
                @php
                  $thumbnail = json_decode($pic->thumbnail);
                @endphp

                  @foreach ($thumbnail as $view)
                    <div class="column">
                      <img style="margin-top:15px;max-height:100px;" src="{{ asset('/galery') }}/{{$view}}" alt="" onclick="myFunction(this);">
                    </div>
                  @endforeach
              @endforeach
              </div>
              </div>
              <div class="container1">
                <!-- Close the image -->
                <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>

                <!-- Expanded image -->
                <img id="expandedImg" style="width:100%">

                <!-- Image text -->
                <div id="imgtext"></div>
              </div>
          </div>
      </div>
    </section>
@endsection
@section('footer')
  <script type="text/javascript">
    function myFunction(imgs) {
  // Get the expanded image
  var expandImg = document.getElementById("expandedImg");
  // Get the image text
  var imgText = document.getElementById("imgtext");
  // Use the same src in the expanded image as the image being clicked on from the grid
  expandImg.src = imgs.src;
  // Use the value of the alt attribute of the clickable image as text inside the expanded image
  imgText.innerHTML = imgs.alt;
  // Show the container element (hidden with CSS)
  expandImg.parentElement.style.display = "block";
}
  </script>
@endsection