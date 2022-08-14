@extends('layouts.user.lender.template')

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>Beranda</h2>
            <p>Selamat datang di beranda kamu, *nama lender* !</p>
        </div>
    </div><!-- End Breadcrumbs -->

    <div class="container mt-4">
        {{--  --}}
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
        {{--  --}}
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
                                    <th class="pl-5 text-left lg:text-right lg:pl-0">
                                        <span class="hidden lg:inline">Jumlah Unit</span>
                                    </th>
                                    <th class="hidden text-right md:table-cell"> Harga</th>
                                    <th class="hidden text-right md:table-cell"> Hapus </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                    <tr>
                                        <td class="hidden pb-4 md:table-cell">
                                            <a href="#">
                                                <img src="{{ $item->attributes->image }}" class="w-20 rounded" alt="Thumbnail">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#">
                                                <p class="mb-2 md:ml-4">{{ $item->name }}</p>
                                            </a>
                                        </td>
                                        <td class="justify-center mt-6 md:justify-end md:flex">
                                            <div class="h-10 w-28">
                                                <div class="relative flex flex-row w-full h-8">
                                                    <form action="{{ route('cart.update') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                        <input min="1" type="number" name="quantity" value="{{ $item->quantity }}" class="text-center form-inline" />
                                                        <button type="submit" class="btn btn-primary"><i class="fa fa-refresh"></i> Update</button>
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
                                <form action="{{ route('cart.checkout') }}" method="POST">
                                    @csrf
                                    <button class="btn btn-outline-success col-12"><i class="fa fa-shopping-cart"></i> Checkout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- END CARD FOOTER --}}
                </div>
            </div>
        </div>
    </div>
@endsection
