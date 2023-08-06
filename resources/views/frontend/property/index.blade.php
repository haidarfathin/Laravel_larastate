@extends('frontend.layout')
@section('content')
<div class="hero page-inner overlay" 
style="background-image: url({{ asset('realestate/images/hero_bg_3.jpg') }})">

  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-9 text-center mt-5">
        <h1 class="heading" data-aos="fade-up">Properties</h1>

        <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
          <ol class="breadcrumb text-center justify-content-center">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active text-white-50" aria-current="page">
              Properties
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<div class="section">
  <div class="container">
    <div class="row mb-4 align-items-center">
      <div class="col-lg-6 text-center mx-auto">
        <h2 class="font-weight-bold text-primary heading">
          Featured Properties
        </h2>
      </div>
    </div>
    <div class="row">
      @foreach($properties as $property)
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
        <div class="property-item mb-30">
          <a href="{{ route('property.show', $property->slug) }}" class="img">
            <img src="{{ Storage::url($property->banner) }}" alt="Image" class="img-fluid" />
          </a>

          <div class="property-content">
            <div class="price mb-2"><span>$1,291,000</span></div>
            <div>
              <span class="city d-block mb-3">{{$property->location}}</span>
              <span class="d-block mb-2 text-black-50">{{$property->title}}</span>
              <div class="specs d-flex mb-4">
                <span class="d-block d-flex align-items-center me-3">
                  <span class="icon-bed me-2"></span>
                  <span class="caption">🛏️ {{$property->bed}}</span>
                </span>
                <span class="d-block d-flex align-items-center">
                  <span class="icon-bath me-2"></span>
                  <span class="caption">🛁 {{$property->bath}}</span>
                </span>
              </div>

              <a href="property-single.html" class="btn btn-primary py-2 px-3">See details</a>
            </div>
          </div>
        </div>
        <!-- .item -->
      </div>
      @endforeach
    </div>
    <div class="row align-items-center py-5">
      <div class="col-lg-12 text-center">
        <div class="custom-pagination">
          <a href="#" class="active">1</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection