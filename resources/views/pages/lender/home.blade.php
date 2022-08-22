@extends('layouts.user.lender.template')

@section('content')
  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
      <h2>Beranda</h2>
      <p>Selamat datang di beranda kamu, {{ Auth::user()->name }} !</p>
    </div>
  </div><!-- End Breadcrumbs -->

  <div class="container mt-4">
    @include('layouts.user.notification');
    <div class="row">
      <div class="col">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
              <img src="{{ asset('') }}/img/aminahImg1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
              <img src="{{ asset('') }}/img/aminahImg2cr.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{ asset('') }}/img/aminahImg4cr.jpg" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>

  <section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">
      <div class="row" data-aos="zoom-in" data-aos-delay="100">
        @if (isset($mitra) && $mitra != null)
          @foreach ($mitra as $index => $mitra)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="course-item" id="{{ $mitra->id }}">
                <img class="product-image" src="{{ isset($mitra->borrower) ? asset('pendaftaran/' . $mitra->borrower->business_image) : asset('img/testimonials.jpg') }}" class="img-fluid" alt="gambar" width="100%">
                <div class="course-content">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>{{ isset($mitra->business_type) ? $business_type : 'Lain-lain' }}</h4>
                    <p class="price">{{ isset($mitra->borrower) && !is_null($mitra->borrower->duration) ? $mitra->borrower->duration . ' Bulan' : 'Jangka Waktu: -' }}</p>
                  </div>
                  <h3><a href="/lender/mitra/detail/{{ $mitra->id }}">{{ isset($mitra->borrower) ? $mitra->borrower->business_name : 'Usaha' }}</a></h3>
                  <div class="row">
                    <dl>
                      <dt class="col-sm-6">{{ 'Harga: Rp.100.000,-' }}</dt>
                      <dd class="col-sm-6">dana dibutuhkan: {{ !is_null($mitra->accepted_fund) ? 'Rp.' . number_format($mitra->accepted_fund, 0, ',', '.') . ',-' : '' }}</dd>
                      <dt class="col-sm-6">Terkumpul</dt>
                      <dd class="col-sm-6">dana terkumpul: Rp.{{ isset($mitra->dana_terkumpul) ? number_format($mitra->dana_terkumpul, 0, ',', '.') . ',-' : '' }}</dd>
                    </dl>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: {{ $mitra->dana_terkumpul_persen }}%;" aria-valuenow="{{ $mitra->dana_terkumpul_persen }}" aria-valuemin="0" aria-valuemax="100">{{ $mitra->dana_terkumpul_persen }}%</div>
                  </div>
                  <div class="mt-3">
                    <form action="/cart" method="post">
                      @csrf
                      <input type="hidden" value="{{ $mitra->id }}" name="id">
                      <input type="hidden" value="{{ $mitra->borrower->business_name }}" name="name">
                      <input type="hidden" value="100000" name="price">
                      <input type="hidden" value="{{ $mitra->borrower->business_image }}" name="image">
                      <input type="hidden" value="1" name="quantity">
                      <button type="submit" class="btn btn-outline-success col-12 cart-button" {{ $mitra->dana_terkumpul_persen == 100 ? 'disabled' : '' }}><i class="fa fa-plus"></i> Tambah ke keranjang</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        @endif

        <div class="col-lg-4 d-flex align-items-stretch">
          <div class="content">
            <h3>Ingin Lihat Mitra Lebih Banyak?</h3>
            <p>
              Kamu dapat memilih banyak mitra yang cocok bagi kamu untuk kamu danai disini.
            </p>
            <div class="text-center">
              <a href="/lender/mitra" class="more-btn">Lihat Lebih Banyak <i class="bx bx-chevron-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('page_scripts')
  <script>
    $('.course-item').on('click', function(e) {
      var id = $(this).attr("id");
      window.location.href = '/lender/mitra/detail/' + id;
      // $('.course-item a').click();
    });
    $('.cart-button, a').on('click', function(e) {
      e.stopPropagation();
    });
  </script>
@endpush

@push('page_scripts')
  <script>
    $('.course-item').css('cursor', 'pointer');
  </script>
@endpush

@push('page_scripts')
  <script>
    $(".product-image").on("error", function() {
      $(this).attr('src', 'https://via.placeholder.com/1080x720.png?text=Business%20Image');
    });
  </script>
@endpush
