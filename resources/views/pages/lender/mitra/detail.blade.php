@extends('layouts.user.lender.template')

@section('content')
  <div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
      <h2>{{ isset($funding->borrower->business_name) ? $funding->borrower->business_name : 'Usaha UMKM' }}</h2>
      <p>{{ isset($funding->borrower->buniness_type) ? $funding->borrower->buniness_type : 'Lain-lain' }}</p>
    </div>
  </div>
  <!-- End Breadcrumbs -->

  <div class="container mt-4 mb-4">
    @include('layouts.user.notification')
    <div class="row">
      <div class="col-6">
        <img class="product-image" src="{{ isset($funding->borrower->business_image) ? asset('pendaftaran/' . $funding->borrower->business_image) : 'https://via.placeholder.com/1080x720.png?text=Business%20Image' }}" class="img-fluid" alt="gambar" width="100%">
        <h4><b>{{ isset($funding->borrower->business_name) ? $funding->borrower->business_name : 'UMKM' }}</b></h4>
        <h5>Alamat UMKM : {{ isset($funding->borrower->business_address) ? $funding->borrower->business_address : '-' }}</h5>
        {{-- <h5>Deskripsi & Jenis UMKM</h5>
        <p> {{ isset($funding->borrower->description) ? $funding->borrower->description : '-' }}</p> --}}
        <h6>Jenis UMKM: {{ isset($funding->borrower->buniness_type) ? $funding->borrower->buniness_type : 'Lain-lain' }}</h6>
      </div>
      <div class="col-6">
        <h3><b>Rincian Pendanaan dari {{ $funding->borrower->business_name }}</b></h3>
        <h5><small>{{ \Carbon\Carbon::parse($funding->due_date)->diff(now())->days != null ? \Carbon\Carbon::parse($funding->due_date)->diff(now())->days : '-' }} hari lagi</small></h5>
        <h5>terkumpul {{ $funding->dana_terkumpul_persen }}%</h5>
        <h5>terkumpul Rp.{{ number_format($funding->dana_terkumpul) }},- dari Rp.{{ number_format($funding->accepted_fund) }},-</h5>
        <div class="progress">
          <div class="progress-bar" role="progressbar" style="width:{{ $funding->dana_terkumpul_persen }}%;" aria-valuenow="{{ $funding->dana_terkumpul_persen }}" aria-valuemin="0" aria-valuemax="100">{{ $funding->dana_terkumpul_persen }} %</div>
        </div>
        <hr>
        <dl class="row">
          <dt class="col-sm-6">Nilai per unit pendanaan</dt>
          <dd class="col-sm-6">Rp.100.000,-</dd>

          <dt class="col-sm-6">Estimasi Bagi hasil</dt>
          <dd class="col-sm-6">{{ $funding->borrower->profit_sharing_estimate }}%</dd>

          <dt class="col-sm-6">Lama pendanaan</dt>
          <dd class="col-sm-6">{{ $funding->borrower->duration }} Bulan</dd>

          <dt class="col-sm-6">Siklus bagi hasil</dt>
          <dd class="col-sm-6">Per 1 Bulan</dd>

          <dt class="col-sm-6">Periode bagi hasil</dt>
          <dd class="col-sm-6">{{ $funding->borrower->duration }} Bulan</dd>

          <dt class="col-sm-6">Akad</dt>
          <dd class="col-sm-6">Mudharabah</dd>
        </dl>

        <hr>

        <h4>Danai sebesar:</h4>
        <h3><b>Rp100.000</b></h3>
        <p>Estimasi bagi hasil: {{ $funding->borrower->profit_sharing_estimate }}%. Sisa {{ $funding->sisa_unit }} unit</p>
        <div class="col-md-12 mb-0 d-flex d-none d-md-block d-lg-block mb-2">
          <form action="/cart" method="post">
            @csrf
            <input type="hidden" value="{{ $funding->id }}" name="id">
            <input type="hidden" value="{{ $funding->borrower->business_name }}" name="name">
            <input type="hidden" value="100000" name="price">
            <input type="hidden" value="{{ $funding->borrower->business_image }}" name="image">
            <input type="hidden" value="1" name="quantity">
            <button type="submit" class="btn btn-outline-success col-12" {{ $funding->dana_terkumpul_persen == 100 ? 'disabled' : '' }}><i class="fa fa-check-square" {{ $funding->borrower->dana_terkumpul_persen == 100 ? 'disabled' : '' }}></i> Danai mitra sekarang!</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('page_scripts')
  <script>
    $(document).ready(function() {
      $(".product-image").on("error", function() {
        $(this).attr('src', 'https://via.placeholder.com/1080x720.png?text=Business%20Image');
      });
    });
  </script>
@endpush
