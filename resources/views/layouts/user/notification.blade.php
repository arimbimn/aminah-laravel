@if (!Auth::user()->checkProfile)
  <div class="row">
    <p class="alert alert-warning text text-center">Profil kamu belum lengkap, lengkapi profil kamu <a href="/lender/profile/edit"><strong>disini</strong></a></p>
  </div>
@endif
@if (Auth::user()->checkWaiting->count() > 0)
  <div class="row">
    <p class="alert alert-danger text text-center">Ada pembayaran belum selesai, silahkan selesaikan pembayaran kamu <a href="/lender/dompet/bayar"><strong>disini</strong></a></p>
  </div>
@endif
