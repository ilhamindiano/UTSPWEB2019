@extends("layouts.app")

@section('content')
@include('inc.header')

<section class="bg-primary" id="about">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto text-center">
        <h2 class="section-heading text-white">Why Nope Note?!</h2>
        <hr class="light my-4">
        <p class="text-faded mb-4">Because it's a Note that you've already know</p>
        <a class="btn btn-light btn-xl js-scroll-trigger" href="{{ route('register') }}">Wanna register mate ?</a>
      </div>
    </div>
  </div>
</section>

<section class="bg-light" id="features">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center">
              <h2 class="section-heading">What ?! You never use Nope Note ? </h2>
              <hr class="my-4">
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-6 text-center">
              <div class="service-box mt-5 mx-auto">
                <i class="fas fa-4x fa-pen-nib text-primary mb-3 sr-icon-1"></i>
                <h3 class="mb-3">Write Note</h3>
                <p class="text-muted mb-0">You can write about anything even your last wish before your death, we'll keep it right away</p>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
              <div class="service-box mt-5 mx-auto">
                <i class="fas fa-4x fa-book-open text-primary mb-3 sr-icon-2"></i>
                <h3 class="mb-3">See Note</h3>
                <p class="text-muted mb-0">See about you and everyone's note, your father, mother, and your ex! (terms and condition) </p>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
              <div class="service-box mt-5 mx-auto">
                <i class="fas fa-4x fa-edit text-primary mb-3 sr-icon-3"></i>
                <h3 class="mb-3">Edit Note</h3>
                <p class="text-muted mb-0">Mr. Typo ?, don't worry. you can edit your note anywhere anytime</p>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
              <div class="service-box mt-5 mx-auto">
                <i class="fas fa-4x fa-share-alt text-primary mb-3 sr-icon-4"></i>
                <h3 class="mb-3">Share with friends!</h3>
                <p class="text-muted mb-0">We know you have some friends (or not, sorry) so you can share it to them. That's will be no cost advertise for Us :) </p>
              </div>
            </div>
          </div>
        </div>
</section>

<section id="contact" class="bg-dark text-white">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto text-center">
              <h2 class="section-heading">Let's chat with us</h2>
              <hr class="my-4">
              <p class="mb-5">Have any thoughts or question ? ,  let us know! we ain't gonna read it tho</p>
            </div>
          </div>
            <div class="col-lg-4-center mr-auto text-center">
              <i class="fas fa-envelope fa-3x mb-3 sr-contact-2"></i>
              <p>
                <a href="mailto:your-email@your-domain.com">nopenope@nopenote.com</a>
              </p>
              <p><small style="text-align:center">Theme from <a href="https://startbootstrap.com/" target="_blank">startbootstrap.com</a></small></p>
            </div>
          </div>
        </div>
    </section>

@endsection

