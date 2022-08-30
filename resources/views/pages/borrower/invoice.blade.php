@extends('layouts.user.borrower.template')

@section('content')
  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
      <h2>Invoice</h2>
      <p>Detail Penarikan Saldo dari {{ Auth::user()->name }}</p>
    </div>
  </div>
  <!-- End Breadcrumbs -->

  <section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Penarikan Saldo</h2>
        <p>Invoice Penarikan Saldo</p>
      </div>
      <div class="card col-lg-12 mb-3">
        <div class="card-header">
          Rincian Penarikan Saldo
        </div>
        <div class="card-body">
          <form class="row g-3" action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-lg-4">
                <div class="card-body text-dark">
                  <p class="card-title"><b>Total Saldo Anda</b></p>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="card-body text-dark">
                  <p class="card-title"><b>Tujuan Penarikan</b></p>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="card-body text-dark">
                  <p class="card-title">Tarik Pendanaan Saya Sekarang!</p>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="card-body text-dark">
                  <p class="card-title"><strong>Rp. {{ number_format(Auth::user()->borrowerAmount()) }},-</strong></p>
                </div>
              </div>

              <div class="col-4">
                <div class="card-body text-dark">
                  <div class="form-group">
                    <x-basic.label for="pemilikRekeningName" value="Nama Pemilik Rekening" required="true" />
                    <x-basic.input exist="{{ Auth::user()->latestBorrower->account_name }}" type="text" name="pemilikRekeningName" :error="$errors->first('pemilikRekeningName')" placeholder="masukkan nama pemilik rekening anda..." />
                  </div>
                </div>

                <div class="card-body text-dark">
                  <div class="form-group">
                    <x-basic.label for="nomorRekening" value="Nomor Rekening" required="true" />
                    <x-basic.input exist="{{ Auth::user()->latestBorrower->account_number }}" type="text" name="nomorRekening" :error="$errors->first('nomorRekening')" placeholder="masukkan nomor rekening anda..." />
                  </div>
                </div>

                <div class="card-body text-dark">
                  <div class="form-group">
                    <x-basic.label for="jumlahSaldo" value="Jumlah Saldo" required="true" />
                    <x-basic.input exist="{{ Auth::user()->borrowerAmount() }}" type="text" name="jumlahSaldo" :error="$errors->first('jumlahSaldo')" placeholder="masukkan jumlah saldo...." />
                  </div>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="card-body text-dark">
                  <button type="submit" class="btn btn-outline-success col-12"><i class="fa fa-check-square"></i> Tarik Dana Sekarang!</button>
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
