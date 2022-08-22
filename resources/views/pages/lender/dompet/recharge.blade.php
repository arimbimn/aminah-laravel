@extends('layouts.user.lender.template')

@section('content')
  <div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
      <h2>{{ 'Isi Dompet' }}</h2>
      <p>{{ 'Halaman isi dompet akun anda' }}</p>
    </div>
  </div>
  <!-- End Breadcrumbs -->

  <div class="container mt-4 mb-4">
    <form action="/lender/dompet/isi" method="post">
      @csrf
      <div class="row">
        <h5>Pilih nominal</h5>
        @php
          $nilai = ['100000', '200000', '300000', '400000', '500000', '1000000', '2000000', '4000000', '5000000'];
        @endphp
        @foreach ($nilai as $n)
          <div class="col-md-4 col-lg-4 col-sm-4 mb-3">
            <label class="input-label">
              <input type="radio" name="product" value="{{ $n }}" class="card-input-element" />
              <div class="panel panel-default card-input">
                {{-- <div class="panel-heading">Product A</div> --}}
                <div class="panel-body">
                  Rp.{{ number_format($n, 0, ',', '.') }},-
                </div>
              </div>
            </label>
          </div>
        @endforeach
      </div>
      <div class="row mt-2">
        <button class="btn btn-outline-primary"><i class="fa fa-credit-card"></i> Top up</button>
      </div>
    </form>
  </div>
@endsection

@push('page_css')
  <style>
    label {
      width: 100%;
      background-color: whitesmoke;
      border-radius: 20px;
    }

    label:hover {
      box-shadow: 0 0 2px 2px lightblue;
    }

    .card-input-element {
      display: none;
    }

    .card-input {
      margin: 20px;
      padding: 00px;
    }

    .card-input:hover {
      cursor: pointer;
    }
  </style>
@endpush

@push('page_scripts')
  <script>
    $(document).ready(function() {
      $(".product-image").on("error", function() {
        $(this).attr('src', 'https://via.placeholder.com/1080x720.png?text=Business%20Image');
      });
    });
  </script>
@endpush

@push('page_scripts')
  <script>
    $(document).ready(function() {
      $('.input-label').click(function() {
        $('.input-label').css('background-color', 'whitesmoke')
        $('.input-label').css("box-shadow", "");
        if ($('.card-input-element').is(':checked')) {
          $(this).css("background-color", "#B4FF9F");
          $(this).css("box-shadow", "0 0 2px 2px #F9FFA4");
        }
      });
    });
  </script>
@endpush
