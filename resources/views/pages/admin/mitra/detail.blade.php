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

                    <dt class="col-sm-5">Nomor Rekening Pemilik UMKM</dt>
                    <dd class="col-sm-7">{{ $borrower->account_number }}</dd>

                    <dt class="col-sm-5">Nomor Telepon/HP Pemilik UMKM</dt>
                    <dd class="col-sm-7">{{ $borrower->phone_number }}</dd>

                    <dt class="col-sm-5">Email Pemilik UMKM</dt>
                    <dd class="col-sm-7">{{ $borrower->email }}</dd>

                    <dt class="col-sm-5">Pendapatan per bulan UMKM</dt>
                    <dd class="col-sm-7">{{ $borrower->borrower_monthly_income }}</dd>

                    <dt class="col-sm-5">Jumlah Pengajuan Pendanaan</dt>
                    <dd class="col-sm-7">{{ $borrower->borrower_first_submission }}</dd>

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
        <div class="row">
            <div class="col mb-4">
                <button type="button" value="{{ $borrower->id }}" class="btn btn-danger col-lg-12 delete-button"><i class="fa fa-trash"></i> Nonaktifkan</button>
            </div>
            <div class="col mb-4">
                <button type="button" value="{{ $borrower->id }}" class="btn btn-secondary col-lg-12 cancel-button"><i class="fa fa-undo"></i> Kembali</button>
            </div>
        </div>
    </div>
@endsection

@push('page_scripts')
    <script>
        jQuery(document).ready(function() {
            jQuery('.delete-button').on('click', function() {
                var titleText = '<p class="text text-light">Nonaktifkan Akun Mitra?</p>'
                var iconType = 'question'
                var confText = 'Hapus'
                var urlTarget = "{{ url('admin/mitra/hapus') }}"
                var iconTypeSuccess = 'success'
                var titleTextSuccess = 'Anda berhasil menonaktifkan akun mitra'
                var iconTypeFailed = 'error'
                var titleTextFailed = 'Gagal menonaktifkan mitra'
                var redirectTo = '/admin/mitra'
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
                            method: "delete",
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
