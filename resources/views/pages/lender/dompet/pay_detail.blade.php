@extends('layouts.user.lender.template')

@section('content')
  {{-- Begin Breadcrumbs --}}
  <div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
      <h2>{{ 'Detail Pembayaran ' . $transaction->trx_hash }}</h2>
      <p>{{ 'Silahkan lakukan pembayaran anda' }}</p>
    </div>
  </div>
  {{-- End Breadcrumbs --}}

  <div class="container">

  </div>
  <section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Payment</h2>
        <p>Konfirmasi Pembayaran</p>
      </div>
      <div class="row mb-4">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              Rincian Nomor Rekening
            </div>
            <div class="card-body">
              <div class="row">
                @foreach ($bankAccounts as $item)
                  <div class="col-lg-2">
                    <div class="card-body text-dark">
                      <img src="tes" class="img-thumbnail" alt="gambar" width="50" onerror="this.onerror=null;this.scr='https://via.placeholder.com/1080x720.png?text=Business%20Image';">
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <div class="card-body text-dark">
                      <p class="card-title"><b>{{ $item->bank_name }}</b></p>
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <div class="card-body text-dark">
                      <p class="card-title"><b>a.n. {{ $item->account_name }}</b></p>
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <div class="card-body text-dark">
                      <p class="card-title"><b>No. rek: {{ $item->account_number }}</b></p>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card col-lg-12 mb-3">
        <div class="card-header">
          Rincian Pembayaran
        </div>
        <div class="card-body">
          <form class="row g-3" action="/lender/dompet/bayar" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="trx_hash" value="{{ $transaction->trx_hash }}" />
            <div class="row">
              <div class="col-lg-4">
                <div class="card-body text-dark">
                  <p class="card-title"><b>Total Pembayaran</b></p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card-body text-dark">
                  <p class="card-title"><b>Upload Bukti Bayar</b></p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card-body text-dark">
                  <p class="card-title"><b>Aksi</b></p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card-body text-dark">
                  <p class="card-title">Rp.{{ number_format($transaction->transaction_amount, 0, ',', '.') }},-</p>
                </div>
              </div>
              <div class="col-4">
                <div class="card-body text-dark">
                  <input type="file" class="col-3 form-control" aria-label="Default select example" name="file_trx" />
                  @error('file_trx')
                    <small class="text text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card-body text-dark">
                  <button type="submit" class="btn btn-outline-success col-12"><i class="fa fa-sack-dollar"></i> Upload Bukti Bayar!</button>
                </div>
              </div>

            </div>
          </form>

        </div>
      </div>
    </div>
  </section>
@endsection
