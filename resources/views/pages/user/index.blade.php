@extends('layouts.user.main')
@section('content')
<!-- start banner Area -->
<section class="banner-area">
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start">
            <div class="col-lg-12">
                <div class="">
                    <!-- single-slide -->
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="banner-content">
                                <h1>Nike New <br>Collection!</h1>
                                <p>Temukan koleksi sepatu terbaru dari brand-brand terkenal dunia! Dibuat dengan desain stylish dan teknologi mutakhir untuk kenyamanan maksimal. 
                                    Sempurnakan langkahmu dengan kualitas premium yang siap mendukung setiap aktivitas, kapan pun dan di mana pun.</p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="banner-img">
                                <img class="img-fluid"
                                    src="{{asset('assets/templates/user/img/banner/banner-img.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->
<!-- start product Area -->
<section class="section_gap">
    <!-- single product slide -->>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h1>Produk Terbaru</h1>
                    <p>Jangan lewatkan kesempatan memiliki sepatu impian dari koleksi terbaru kami! Nikmati perpaduan sempurna antara gaya, kenyamanan, dan performa. 
                        Penawaran eksklusif hanya untuk kamu yang ingin selalu tampil beda! Belanja sekarang, dapatkan diskon spesial dan kiriman gratis untuk pembelian hari ini juga!</p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- single product -->
            @forelse ($products as $item)
                <div class="col-lg-3 col-md-6">
                    <div class="single-product">
                        <img class="img-fluid" src="{{ asset('images/' . $item->image) }}" alt="">
                        <div class="product-details">
                            <h6>{{ $item->name }}</h6>
                            <div class="price">
                                <h6>Harga: {{ $item->price }} Points</h6>
                            </div>
                            <div class="prd-bottom">
                                <a class="social-info" href="javascript:void(0);"
                                    onclick="confirmPurchase('{{ $item->id }}', '{{ Auth::user()->id }}')">
                                    <span class="ti-bag"></span>
                                    <p class="hover-text">Beli</p>
                                </a>
                                <a href="{{ route('user.detail.product', $item->id) }}" class="social-info">
                                    <span class="lnr lnr-move"></span>
                                    <p class="hover-text">Detail</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-lg-12 col-md-12">
                    <div class="single-product">
                        <h3 class="text-center">Tidak ada produk</h3>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>
<!-- end product Area -->
<!-- start flash sale Area -->
<section class="section_gap">
    <div class="container">
        <h1 class="text-center">Flash Sale</h1>
        <div class="row">
            @forelse($flashSales as $flashSalesItem)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="product card text-center">
                        <img src="{{ asset('images/' . $flashSalesItem->image) }}" class="card-img-top"
                            alt="{{ $flashSalesItem->product_name }}">
                        <div class="card-body">
                            <h2 class="card-title">{{ $flashSalesItem->product_name }}</h2>
                            <p class="card-text"><strike>Rp{{ number_format($flashSalesItem->original_price, 2) }}</strike>
                            </p>
                            <p class="card-text">Rp{{ number_format($flashSalesItem->discount_price, 2) }}</p>
                            <p class="card-text">Diskon: {{ round($flashSalesItem->discount_percentage) }}%</p>
                            <p class="card-text">Sisa waktu:
                                {{ \Carbon\Carbon::parse($flashSalesItem->end_time)->diffForHumans() }}
                            </p>
                            <p class="card-text">Stok tersisa: {{ $flashSalesItem->stock }}</p>
                            <div class="prd-bottom">
                            <button class="btn btn-primary" onclick="confirmflashSalePurchase('{{ $flashSalesItem->id }}', '{{ Auth::user()->id }}')">Beli Sekarang</button>
                            </a>
                            </div>
                            </div>
                    </div>
                </div>
            @empty
                <div class="col-lg-12">
                    <h3 class="text-center">Tidak ada produk flash sale saat ini.</h3>
                </div>
            @endforelse
        </div>
    </div>
</section>

<script>
    function confirmflashSalePurchase(flashSaleId, userId) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan membeli produk Flash Sale ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Beli!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/flashsale/purchase/' + flashSaleId + '/' + userId;
            }
        });
    }
</script>
<!-- end flash sale Area -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmPurchase(productId, userId) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan membeli produk ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Beli!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/product/purchase/' + productId + '/' + userId;
            }
        });
    }
</script>
@endsection