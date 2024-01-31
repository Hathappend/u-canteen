@include('partials.header')
@include('partials.navbar')

<section id="checkout">
    <div class="container p-5">
        <h3 class="title">CHECKOUT</h3>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item " aria-current="page"><a href="/">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </nav>

        @if($carts->isEmpty())

            <div class="row">
                <div class="col-12 d-flex justify-content-center align-items-center" style="min-height: 50vh;">
                    <div class="card p-2" style="width: 25rem;">
                        <div class="card-body">
                            <h5 class="card-title text-center">Wah, keranjang kamu kosong</h5>
                            <p class="card-text text-center">Yuk, segera cari menu menu yang menarik!</p>
                            <div class="text-center">
                                <a href="/" class="btn btn-outline-danger">Pilih Menu Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endif

        <div class="row">
            <div class="col-md-12 col-lg-8">

                @foreach($carts as $key => $cart_item)

                    <div class="card mb-3 shadow-sm p-2 @if($key == 0) mt-5 @endif">
                        <div class="row g-0">
                            <form action="/cart/delete/{{ strtolower(\Illuminate\Support\Str::slug($cart_item->menuName)) }}/{{ $cart_item->cart_id }}" method="post">
                                @csrf
                                <div class="close-wrapper position-relative">
                                    <button type="submit" class="btn-close position-absolute top-0 end-0" aria-label="Close"></button>
                                </div>
                            </form>
                            <div class="img-panel col-2 p-0 m-0" style="background: url('/storage/img/shops/menus/{{ $cart_item->img }}'); background-size: cover; background-position: center" >
                            </div>
                            <div class="col-7 p-2 d-flex justify-content-center align-items-center">
                                <p class="card-text">
                                    {{ $cart_item->menuName }}
                                </p>
                            </div>
                            <div class="col-2 d-flex justify-content-center align-items-center" >
                                <p class="card-text">Rp. {{ number_format($cart_item->price) }}</p>
                            </div>
                            <div class="col-1 d-flex justify-content-center align-items-center">
                                <p class="card-text">x{{ $cart_item->quantity }}</p>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>

            @if(!$carts->isEmpty())
                <div class="col-md-12 col-lg-4">
                    <form action="/checkout" method="post">
                        @csrf
                        <div class="card shadow-sm p-3 mt-5">
                            <div class="row g-0">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <table width="100%">
                                            <tr>
                                                <th>Metode Pembayaran</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select name="billing_method" class="form-select w-100 mt-1 mb-2 @error('billing_method') is-invalid @enderror" aria-label="Default select example">
                                                        <option value="" selected disabled>Choose One:</option>
                                                        <option value="Cash">Cash</option>
                                                        <option value="Qris">Qris</option>
                                                    </select>


                                                    @error('billing_method')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                    @enderror

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Jam Pengambilan</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="time" name="pickup_time" class="form-control w-100 mt-1 mb-2 @error('pickup_time') is-invalid @enderror" value="{{ old('pickup_time') }}" aria-label="bookingTime" aria-describedby="basic-addon1">

                                                    @error('pickup_time')
                                                        <small class="text-danger mb-3">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror

                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow-sm p-3 mt-2">
                            <div class="row g-0">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <table width="100%">
                                            <tr>
                                                <th>Total Harga</th>
                                                <td class="fw-bold font-monospace text-end">
                                                    Rp. {{ number_format($carts->sum('amount')) }}
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-2 float-end w-100" style="border: none">
                            <button class="Btn" type="submit">
                                Checkout
                                <svg class="svgIcon" viewBox="0 0 576 512"><path d="M512 80c8.8 0 16 7.2 16 16v32H48V96c0-8.8 7.2-16 16-16H512zm16 144V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V224H528zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm56 304c-13.3 0-24 10.7-24 24s10.7 24 24 24h48c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm128 0c-13.3 0-24 10.7-24 24s10.7 24 24 24H360c13.3 0 24-10.7 24-24s-10.7-24-24-24H248z"></path></svg>
                            </button>
                        </div>
                    </form>
                </div>

            @endif

            @if(session()->has('success'))
                <script>
                    swal("Good job!", "{{ session()->get('success') }}", "success");
                </script>
            @endif

            @if(session()->has('error'))
                <script>
                    swal( "Oops" ,  "{{ session()->get('error') }}" ,  "error" )
                </script>
            @endif

    </div>

</section>

@include('partials.footer')
