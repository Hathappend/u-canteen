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

        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="card mb-3 shadow-sm p-2 mt-5">
                    <div class="row g-0">
                        <div class="close-wrapper position-relative">
                            <button type="button" class="btn-close position-absolute top-0 end-0" aria-label="Close"></button>
                        </div>
                        <div class="img-panel col-2" style="background: #D9D9D9;" >
                            <img src="" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-7 p-2 d-flex justify-content-center align-items-center">
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, cupiditate!
                            </p>
                        </div>
                        <div class="col-2 d-flex justify-content-center align-items-center" >
                            <p class="card-text">Rp. 50.000</p>
                        </div>
                        <div class="col-1 d-flex justify-content-center align-items-center">
                            <p class="card-text">x3</p>
                        </div>
                    </div>
                </div>

                <div class="card mb-3 shadow-sm p-2">
                    <div class="row g-0">
                        <div class="close-wrapper position-relative">
                            <button type="button" class="btn-close position-absolute top-0 end-0" aria-label="Close"></button>
                        </div>
                        <div class="img-panel col-2" style="background: #D9D9D9;" >
                            <img src="" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-7 p-2 d-flex justify-content-center align-items-center">
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, cupiditate!
                            </p>
                        </div>
                        <div class="col-2 d-flex justify-content-center align-items-center" >
                            <p class="card-text">Rp. 50.000</p>
                        </div>
                        <div class="col-1 d-flex justify-content-center align-items-center">
                            <p class="card-text">x3</p>
                        </div>
                    </div>
                </div>

                <div class="card mb-3 shadow-sm p-2">
                    <div class="row g-0">
                        <div class="close-wrapper position-relative">
                            <button type="button" class="btn-close position-absolute top-0 end-0" aria-label="Close"></button>
                        </div>
                        <div class="img-panel col-2" style="background: #D9D9D9;" >
                            <img src="" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-7 p-2 d-flex justify-content-center align-items-center">
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, cupiditate!
                            </p>
                        </div>
                        <div class="col-2 d-flex justify-content-center align-items-center" >
                            <p class="card-text">Rp. 50.000</p>
                        </div>
                        <div class="col-1 d-flex justify-content-center align-items-center">
                            <p class="card-text">x3</p>
                        </div>
                    </div>
                </div>

                <div class="card mb-3 shadow-sm p-2">
                    <div class="row g-0">
                        <div class="close-wrapper position-relative">
                            <button type="button" class="btn-close position-absolute top-0 end-0" aria-label="Close"></button>
                        </div>
                        <div class="img-panel col-2" style="background: #D9D9D9;" >
                            <img src="" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-7 p-2 d-flex justify-content-center align-items-center">
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, cupiditate!
                            </p>
                        </div>
                        <div class="col-2 d-flex justify-content-center align-items-center" >
                            <p class="card-text">Rp. 50.000</p>
                        </div>
                        <div class="col-1 d-flex justify-content-center align-items-center">
                            <p class="card-text">x3</p>
                        </div>
                    </div>
                </div>



            </div>

            <div class="col-md-12 col-lg-4">
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
                                            <select class="form-select w-100 mt-1 mb-2" aria-label="Default select example">
                                                <option selected>Choose One:</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Jam Pengambilan</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="time" class="form-control w-100 mt-1 mb-2" aria-label="bookingTime" aria-describedby="basic-addon1">
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
                                        <td class="fw-bold font-monospace text-end">Rp. 10.000</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-2 float-end w-100" style="border: none">
                    <button class="Btn">
                        Checkout
                        <svg class="svgIcon" viewBox="0 0 576 512"><path d="M512 80c8.8 0 16 7.2 16 16v32H48V96c0-8.8 7.2-16 16-16H512zm16 144V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V224H528zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm56 304c-13.3 0-24 10.7-24 24s10.7 24 24 24h48c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm128 0c-13.3 0-24 10.7-24 24s10.7 24 24 24H360c13.3 0 24-10.7 24-24s-10.7-24-24-24H248z"></path></svg>
                    </button>
                </div>
        </div>
    </div>

</section>

@include('partials.footer')
