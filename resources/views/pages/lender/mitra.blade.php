@extends('layouts.user.lender.template')

@section('content')
  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
      <h2>Mitra</h2>
      <p>Ini merupakan halaman kumpulan dari mitra Aminah yang telah melewati proses seleksi dari admin.
        Kamu dapat memilih mitra yang ingin kamu danai disini.
      </p>
    </div>
  </div><!-- End Breadcrumbs -->

  <section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">
      @include('layouts.user.notification')
      <div class="row" id="content-item" data-aos="zoom-in" data-aos-delay="100">
        @if (isset($mitra) && $mitra != null)
          @foreach ($mitra as $index => $mitra)
            {{-- <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="course-item" id="{{ $mitra->id }}">
                <img class="product-image" src="{{ isset($mitra->borrower->business_image) ? asset('pendaftaran/' . $mitra->borrower->business_image) : 'https://via.placeholder.com/1080x720.png?text=Business%20Image' }}" class="img-fluid" alt="gambar" width="100%">
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
                    <div class="progress-bar" role="progressbar" style="width: {{ $mitra->dana_terkumpul_persen }}%;" aria-valuenow="{{ $mitra->dana_terkumpul_persen }}" aria-valuemin="0" aria-valuemax="100">{{ number_format((float) $mitra->dana_terkumpul_persen, 2, '.', '') }}%</div>
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
            </div> --}}
            {{-- <x-card.borrower :mitra=$mitra /> --}}
          @endforeach
        @else
          <p class="text text-center">belum ada data mitra.</p>
        @endif
      </div>
      <div class="text-center">
        <button id="load-more" class="btn btn-outline-secondary my-3">
          Lihat Lebih Banyak
        </button>
      </div>
      <!-- Data Loader -->
      <div class="auto-load text-center">
        <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
          <path fill="#000" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
            <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />
          </path>
        </svg>
      </div>
    </div>
  </section>
@endsection

@push('page_css')
  <style>
    .courses {
      margin-top: 1.5rem;
      padding-top: 0px;
    }
  </style>
@endpush

{{-- load more javascript --}}
@push('page_scripts')
  <script>
    var ENDPOINT = "{{ url('/') }}";
    var page = 1;
    infinteLoadMore(page);
    $(window).scroll(function() {
      if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
        page++;
        infinteLoadMore(page);
      }
    });

    $('#load-more').on('click', function() {
      page++;
      infinteLoadMore(page);
    });

    function infinteLoadMore(page) {
      $.ajax({
          url: ENDPOINT + "/lender/mitra?page=" + page,
          datatype: "html",
          type: "get",
          beforeSend: function() {
            $('.auto-load').show();
          }
        })
        .done(function(response) {
          if (response.length == 0) {
            $('.auto-load').html("We don't have more data to display :(");
            return;
          }
          $('.auto-load').hide();
          $("#content-item").append(response);
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
          console.log('Server error occured');
        });
    }
  </script>
@endpush

@push('page_scripts')
  <script>
    $('.course-item').on('click', function(e) {
      var id = $(this).attr("id");
      window.location.href = '/lender/mitra/detail/' + id;
    });
    $('.cart-button, a').on('click', function(e) {
      e.stopPropagation();
    });
  </script>
@endpush

@push('page_scripts')
  <script>
    $(document).on('click', '.course-item', function(e) {
      var id = $(this).attr("id");
      window.location.href = '/lender/mitra/detail/' + id;
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

@push('page_css')
  <style>
    .course-item {
      cursor: pointer;
    }
  </style>
@endpush
