@extends('layouts.user.lender.template')

@section('content')
  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
      <h2>Checkout</h2>
      <p>Detail transaksi dari {{ Auth::user()->name }}</p>
    </div>
  </div>
  <!-- End Breadcrumbs -->

  <section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Checkout</h2>
        <p>Invoice</p>
      </div>
      @isset($items)
        @foreach ($items as $item)
          <div class="card col-lg-12 mb-3">
            <div class="card-header">
              Rincian Usaha
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-1">
                  <div class="card-body text-dark">
                    <img src="{{ asset('') }}/img/testimonials.jpg" class="img-thumbnail" alt="gambar" width="50" onerror="this.onerror=null;this.scr='https://via.placeholder.com/1080x720.png?text=Business%20Image';">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="card-body text-dark">
                    <p class="card-title"><b>Nama Usaha</b></p>
                  </div>
                </div>
                <div class="col-lg-2">
                  <div class="card-body text-dark">
                    <p class="card-title"><b>Harga per Unit</b></p>
                  </div>
                </div>
                <div class="col-lg-2">
                  <div class="card-body text-dark">
                    <p class="card-title"><b>Jumlah Unit</b></p>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="card-body text-dark">
                    <p class="card-title"><b>Total Harga Unit</b></p>
                  </div>
                </div>
                <div class="col-lg-5">
                  <div class="card-body text-dark">
                    <p class="card-title">{{ $item->associatedModel->borrower->business_name }}</p>
                  </div>
                </div>
                <div class="col-lg-2">
                  <div class="card-body text-dark">
                    <p class="card-title">Rp.{{ number_format(env('HARGA_UNIT', 100000)) }},-</p>
                  </div>
                </div>
                <div class="col-lg-2">
                  <div class="card-body text-dark">
                    <p class="card-title">{{ $item->quantity }}</p>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="card-body text-dark">
                    <p class="card-title">Rp.{{ number_format($item->quantity * env('HARGA_UNIT', 100000)) }},-</p>
                  </div>
                </div>
                <hr>
                <div class="col-lg-12">
                  <div class="card-body text-dark">
                    <p class="card-title"><b>Tujuan Pendanaan</b></p>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="card-body text-dark">
                    <p class="card-title">{{ $item->associatedModel->borrower->purpose }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      @endisset
      <div class="card col-lg-12 mb-3">
        <div class="card-header">
          Rincian Pembayaran
        </div>
        <div class="card-body">
          <form class="row g-3" action="{{ route('cart.checkout') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-lg-4">
                <div class="card-body text-dark">
                  <p class="card-title"><b>Total Jumlah Pendanaan</b></p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card-body text-dark">
                  <p class="card-title"><b>Metode Pembayaran</b></p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card-body text-dark">
                  <p class="card-title">Bayar</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card-body text-dark">
                  <p class="card-title"><strong>Rp.{{ number_format(\Cart::session(Auth::user()->id)->getTotal()) }},-</strong></p>
                </div>
              </div>
              <div class="col-4">
                <div class="card-body text-dark">
                  <select class="form-select col-3 form-control" aria-label="Default select example" name="metodePembayaran">
                    <option selected value="">Pilih metode pembayaran</option>
                    <option value="1">Dompet Digital (Rp.{{ number_format(Auth::user()->sumAmount()) }},-)</option>
                  </select>
                  @error('metodePembayaran')
                    <small class="text text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card-body text-dark">
                  <button type="submit" class="btn btn-outline-success col-12 {{ Auth::user()->checkProfile == null ? 'disabled' : '' }}"><i class="fa fa-check-square"></i> Bayar Sekarang!</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  {{-- END MITRA CONTENT --}}
@endsection
