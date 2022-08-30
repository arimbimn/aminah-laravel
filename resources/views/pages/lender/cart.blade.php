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
    @if (!Auth::user()->checkProfile)
      <div class="row">
        <p class="alert alert-warning text text-center">Profil kamu harus lengkap untuk melakukan checkout. Profil kamu belum lengkap, lengkapi profil kamu <a href="/lender/profile/edit"><strong>disini</strong></a></p>
      </div>
    @endif
    @if (\Cart::session(Auth::user()->id)->getTotal() > (float) Auth::user()->sumAmount())
      <div class="row">
        <p class="alert alert-danger text text-center">Saldo anda tidak cukup, isi saldo <a href="/lender/dompet/isi"><strong>disini</strong></a></p>
      </div>
    @endif
    <div class="row">
      <div class="col-12">
        @if ($message = Session::get('success'))
          <div class="card bg-success">
            <div class="card-header">
              <h5 class="text text-bold text-white">{{ $message }}</h5>
            </div>
          </div>
        @endif
        @if ($message = Session::get('error'))
          <div class="card bg-warning">
            <div class="card-header">
              <h5 class="text text-bold">{{ $message }}</h5>
            </div>
          </div>
        @endif
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card mb-5 mt-5">
          <div class="card-header">
            <h3 class="card-title">Cart List</h3>
          </div>
          {{-- BEGIN CARD BODY --}}
          <div class="card-body">
            <table class="table table-responsive" cellspacing="0">
              <thead>
                <tr>
                  <th></th>
                  <th class="text-left">Nama</th>
                  <th class="pl-5 text-left">
                    <span>Tujuan Pengajuan</span>
                  </th>
                  <th class="pl-5 text-center">
                    <span>Rincian</span>
                  </th>
                  <th class="pl-5 text-left">
                    <span>Jumlah Unit</span>
                  </th>
                  <th> Harga</th>
                  <th> Hapus </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($cartItems as $item)
                  <tr>
                    <td class="hidden pb-4 md:table-cell">
                      <a href="#">
                        <img class="product-image" src="{{ $item->attributes->image }}" class="w-20 rounded" alt="Thumbnail" width="100%">
                      </a>
                    </td>
                    <td>
                      <a href="/lender/mitra/detail/{{ $item->id }}">
                        <p class="mb-2">{{ $item->name }}</p>
                      </a>
                    </td>
                    <td>
                      <p class=" mb-2">{{ $item->associatedModel->borrower->purpose }}</p>
                    </td>
                    <td>
                      <p class=" mb-2">
                      <dl class="row">

                        <dt class="col-sm-6"><small>Estimasi Bagi hasil</small></dt>
                        <dd class="col-sm-6">{{ $item->associatedModel->profit_sharing_estimate}} %</dd>

                        <dt class="col-sm-6"><small>Lama pendanaan</small></dt>
                        <dd class="col-sm-6">{{ $item->associatedModel->funding_period}} bulan</dd>

                        <dt class="col-sm-6"><small>Siklus bagi hasil</small></dt>
                        <dd class="col-sm-6">Per 1 bulan</dd>

                        <dt class="col-sm-6"><small>Periode bagi hasil</small></dt>
                        <dd class="col-sm-6">{{ $item->associatedModel->funding_period}} bulan</dd>

                        <dt class="col-sm-6"><small>Akad</small></dt>
                        <dd class="col-sm-6">Mudharabah</dd>
                      </dl>
                      </p>
                    </td>
                    <td class="justify-center mt-6 md:justify-end md:flex">
                      <div class="h-10 w-28">
                        <div class="relative flex flex-row w-full h-8">
                          <form action="{{ route('cart.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <input min="1" type="number" name="quantity" value="{{ $item->quantity }}" class="text-center form-inline" />
                            <button type="submit" class="btn btn-primary mt-3"><i class="fa fa-refresh"></i> Update</button>
                          </form>
                        </div>
                      </div>
                    </td>
                    <td class="hidden text-right md:table-cell">
                      <span class="text-sm font-medium lg:text-base">
                        Rp.{{ number_format($item->price, 0, ',', '.') }},-
                      </span>
                    </td>
                    <td class="hidden text-right md:table-cell">
                      <form action="{{ route('cart.remove') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $item->id }}" name="id">
                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                      </form>
                    </td>
                  </tr>
                @endforeach
                <tr>
                  <td colspan="2"></td>
                  <td>
                    Total jumlah unit: {{ Cart::session(Auth::user()->id)->getTotalQuantity() }}
                  </td>
                  <td colspan="2">
                    Total: Rp.{{ number_format(Cart::getTotal(), 0, ',', '.') }},-
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          {{-- END CARD BODY --}}
          {{-- BEGIN CARD FOOTER --}}
          <div class="card-footer">
            <div class="row">
              <div class="col-6">
                <form action="{{ route('cart.clear') }}" method="POST">
                  @csrf
                  <button class="btn btn-outline-danger col-12"><i class="fa fa-trash"></i> Remove All Cart</button>
                </form>
              </div>
              <div class="col-6">
                {{-- <form action="{{ route('cart.checkout') }}" method="POST"> --}}
                {{-- @csrf --}}
                <a href="/lender/checkout/invoice" class="btn btn-outline-success col-12 {{ Auth::user()->checkProfile == null ? 'disabled' : '' }}"><i class="fa fa-shopping-cart"></i> Checkout</a>
                {{-- </form> --}}
              </div>
            </div>
          </div>
          {{-- END CARD FOOTER --}}
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
