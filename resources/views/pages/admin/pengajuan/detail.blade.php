@extends('layouts.admin.template_admin')

@section('content')
    <div class="container-fluid">
        @include('layouts.admin.navigation')
        <div class="card">
            <div class="col mt-4">
                <dl class="row">
                    <dt class="col-sm-5">Identitas UMKM</dt>
                    <dt class="col-sm-7">Keterangan</dt>

                    <dt class="col-sm-5 mt-3">Nama UMKM</dt>
                    <dd class="col-sm-7 mt-3">{{ $borrower->business_name }}</dd>

                    <dt class="col-sm-5">Nama Pemilik UMKM</dt>
                    <dd class="col-sm-7">{{ $borrower->name }}</dd>

                    <dt class="col-sm-5">NIK Pemilik UMKM</dt>
                    <dd class="col-sm-7">{{ $borrower->nik }}</dd>

                    <dt class="col-sm-5">Alamat Tempat Tinggal</dt>
                    <dd class="col-sm-7">{{ $borrower->address }}</dd>

                    <dt class="col-sm-5">Nomor Telepon/HP Pemilik UMKM</dt>
                    <dd class="col-sm-7">{{ $borrower->phone_number }}</dd>

                    <dt class="col-sm-5">Email Pemilik UMKM</dt>
                    <dd class="col-sm-7">{{ $borrower->email }}</dd>

                    <dt class="col-sm-5">Nomor Rekening Pemilik UMKM</dt>
                    <dd class="col-sm-7">{{ $borrower->account_number }}</dd>

                    <dt class="col-sm-5">Nama Pemilik Rekening</dt>
                    <dd class="col-sm-7">{{ $borrower->account_name }}</dd>

                    <dt class="col-sm-5">Nama Bank</dt>
                    <dd class="col-sm-7">{{ $borrower->bank_name}}</dd>

                    <dt class="col-sm-5">Pendapatan per bulan UMKM</dt>
                    <dd class="col-sm-7">{{ $borrower->borrower_monthly_income }}</dd>

                    <dt class="col-sm-5">Jumlah Pengajuan Pendanaan</dt>
                    <dd class="col-sm-7">{{ $borrower->borrower_first_submission }}</dd>

                    <dt class="col-sm-5">Tujuan Pengajuan Pendanaan</dt>
                    <dd class="col-sm-7">{{ $borrower->purpose}}</dd>

                    <dt class="col-sm-5">Jangka Waktu Pendanaan</dt>
                    <dd class="col-sm-7">{{ $borrower->duration }}</dd>

                    <dt class="col-sm-5">Estimasi Bagi Hasil (dalam %)</dt>
                    <dd class="col-sm-7">{{ $borrower->profit_sharing_estimate}}</dd>

                    <dt class="col-sm-5">Foto KTP Pemilik UMKM</dt>
                    <dd class="col-sm-7">
                        <a target="_blank" href="{{ asset('pendaftaran/' . $borrower->ktp_image) }}">
                            <img src="{{ asset('pendaftaran/' . $borrower->ktp_image) }}" alt="Foto KTP" width="100px">
                        </a>
                    </dd>

                    <dt class="col-sm-5">Foto Surat Izin Usaha (SIU)</dt>
                    <dd class="col-sm-7">
                        <a target="_blank" href="{{ asset('pendaftaran/' . $borrower->siu_image) }}">
                            <img src="{{ asset('pendaftaran/' . $borrower->siu_image) }}" alt="Foto SIU" width="100px">
                        </a>
                    </dd>

                    <dt class="col-sm-5">Foto UMKM</dt>
                    <dd class="col-sm-7">
                        <a target="_blank" href="{{ asset('pendaftaran/' . $borrower->business_image) }}">
                            <img src="{{ asset('pendaftaran/' . $borrower->business_image) }}" alt="Foto UMKM" width="100px">
                        </a>
                    </dd>
                </dl>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <x-basic.label for="accepted_funding" required="true">Jumlah dana yang disetujui</x-basic.label>
                <div class="input-group mb-1">
                    <x-basic.input type="text" name="accepted_funding" :error="$errors->first('accepted_funding')" placeholder="masukkan jumlah dana yang disetujui..." />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col mb-4">
                <button type="button" value="{{ $borrower->id }}" class="btn btn-danger col-lg-12 reject-button">Tolak</button>
            </div>
            <div class="col mb-4">
                <button type="button" value="{{ $borrower->id }}" class="btn btn-success col-lg-12 approve-button">Terima</button>
            </div>
        </div>
    </div>
@endsection

@push('page_scripts')
    <script>
        jQuery(document).ready(function() {
            jQuery('.approve-button').on('click', function() {
                var titleText = '<p class="text text-light">Terima Pengajuan Pendanaan?</p>'
                var iconType = 'question'
                var confText = 'Terima'
                var urlTarget = "{{ url('admin/pengajuan/terima') }}"
                var iconTypeSuccess = 'success'
                var titleTextSuccess = 'Anda berhasil menerima pengajuan pendanaan'
                var iconTypeFailed = 'error'
                var titleTextFailed = 'Gagal menerima pengajuan pendanaan'
                var redirectTo = '/admin/pengajuan'
                Swal.fire({
                    title: titleText,
                    icon: iconType,
                    showCancelButton: true,
                    cancelButtonColor: '#d33',
                    confirmButtonText: confText,
                }).then((result) => {
                    if (result.isConfirmed) {
                        var id = jQuery(this).val();
                        var acceptedFunding = jQuery('#accepted_funding').val();
                        jQuery.ajax({
                            url: urlTarget,
                            method: "post",
                            dataType: 'json',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                'id': id,
                                'acceptedFunding': acceptedFunding,
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: titleTextSuccess,
                                    icon: iconTypeSuccess,
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = redirectTo
                                    };
                                });
                            },
                            error: function(XMLHttpRequest, textStatus, errorThrown) {
                                var text = jQuery.parseJSON(XMLHttpRequest.responseText);
                                Swal.fire({
                                    title: titleTextFailed,
                                    icon: iconTypeFailed,
                                });
                            },
                        });
                    };
                });
            });
        });
    </script>
@endpush

@push('page_scripts')
    <script>
        jQuery(document).ready(function() {
            jQuery('.reject-button').on('click', function() {
                var titleText = '<p class="text text-light">Tolak Pengajuan Pendanaan?</p>'
                var iconType = 'question'
                var confText = 'Tolak'
                var urlTarget = "{{ url('admin/pengajuan/tolak') }}"
                var iconTypeSuccess = 'success'
                var titleTextSuccess = 'Anda berhasil menolak pengajuan pendanaan'
                var iconTypeFailed = 'error'
                var titleTextFailed = 'Gagal menolak pengajuan pendanaan'
                var redirectTo = '/admin/pengajuan'
                Swal.fire({
                    title: titleText,
                    icon: iconType,
                    showCancelButton: true,
                    cancelButtonColor: '#d33',
                    confirmButtonText: confText,
                }).then((result) => {
                    if (result.isConfirmed) {
                        var id = jQuery(this).val();
                        jQuery.ajax({
                            url: urlTarget,
                            method: "post",
                            dataType: 'json',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                'id': id,
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: titleTextSuccess,
                                    icon: iconTypeSuccess,
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = redirectTo
                                    };
                                });
                            },
                            error: function(XMLHttpRequest, textStatus, errorThrown) {
                                var text = jQuery.parseJSON(XMLHttpRequest.responseText);
                                Swal.fire({
                                    title: titleTextFailed,
                                    icon: iconTypeFailed,
                                });
                            },
                        });
                    };
                });
            });
        });
    </script>
@endpush

{{-- Format on 'Salary' field --}}
@push('page_scripts')
    <script>
        var rupiah_field = "accepted_funding";
        var rupiah = document.getElementById(rupiah_field);
        rupiah.addEventListener("keyup", function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, "Rp. ");
        });

        rupiah.addEventListener("focusout", function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, "Rp. ");
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
        }
    </script>
@endpush

@push('page_scripts')
    <script>
        var acceptedFunding = formatRupiah('{{ $borrower->borrower_first_submission }}', "Rp. ");
        $('#accepted_funding').val(acceptedFunding);
    </script>
@endpush
