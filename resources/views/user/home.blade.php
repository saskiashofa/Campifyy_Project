@extends('user.layout')
@section('content')
    <div class="hero-area hero-bg hero-height">
    <div class="container">
        <div class="row">
        <div class="col-lg-9 offset-lg-2 text-center">
            <div class="hero-text text-center">
            <div class="hero-text-tablecell">
                <p class="subtitle">Tempat Sewa Peralatan Outdoor Terbaik</p>
                <h1>Campifyy</h1>
                <div class="hero-btns">
                <a href="/products" class="boxed-btn">Products</a>
                <a href="/contact" class="bordered-btn">Contact</a>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>

    <div class="list-section pt-80 pb-80">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
            <div class="list-box d-flex align-items-center">
              <div class="list-icon">
                <i class="fas fa-campground"></i>
              </div>
              <div class="content">
                <h3>Kualitas Terjamin</h3>
                <p>Perlengkapan dengan merek terpercaya dan kondisi prima.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
            <div class="list-box d-flex align-items-center">
              <div class="list-icon">
                <i class="fas fa-tags"></i>
              </div>
              <div class="content">
                <h3>Harga Ramah</h3>
                <p>Sewa sesuai kebutuhan tanpa menguras kantong.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div
              class="list-box d-flex justify-content-start align-items-center"
            >
              <div class="list-icon">
                <i class="fas fa-bolt"></i>
              </div>
              <div class="content">
                <h3>Proses Mudah & Cepat</h3>
                <p>Pesan online, ambil, dan langsung berangkat!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- product section -->
    <div class="product-section mt-150 mb-150">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 offset-lg-2 text-center">
            <div class="section-title">
              <h3><span class="orange-text">Our</span> Products</h3>
              <p>
                Berbagai perlengkapan camping dan kegiatan outdoor yang siap pakai,
                terawat, dan nyaman digunakan untuk setiap perjalanan alam kamu.
              </p>
            </div>
          </div>
        </div>
        
        <div class="row product-lists justify-content-center">
            @foreach($products as $product)
                <div class="col-lg-4 col-md-6 mb-4 text-center {{ $product->kategori->slug ?? '' }}">
                    <div class="single-product-item">

                        <div class="product-image">
                            <img src="{{ asset('uploads/produk/' . $product->gambar) }}" 
                                 alt="{{ $product->nama }}">
                        </div>

                        <h3>{{ $product->nama }}</h3>

                        <p class="product-price">
                            <span>Harga per hari</span>
                            Rp {{ number_format($product->harga_day,0,',','.') }}
                        </p>

                        <p class="text-muted" style="font-size:14px">
                            Kategori: {{ $product->kategori->nama_ktg ?? '-' }} <br>
                            Stok: {{ $product->stok }}
                        </p>

                        @if(Auth::check())
                        <a href="javascript:void(0)" 
                           class="cart-btn"
                           onclick="addToCart('{{ $product->id_prod }}')">
                            <i class="fas fa-shopping-cart"></i> Add to Cart
                        </a>
                        @else
                        <a href="javascript:void(0)" 
                           class="cart-btn w-5"
                           onclick="loginAlert()">
                            <i class="fas fa-shopping-cart"></i> Add to Cart
                        </a>
                        @endif

                    </div>
                </div>
            @endforeach
        </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 d-flex justify-content-center">
                <a href="/products" class="boxed-btn">More Products</a>
            </div>
        </div>
      </div>
    </div>
    <!-- end product section -->

    <!-- testimonail-section -->
	<div class="testimonail-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="testimonial-sliders">
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar1.png" alt="">
							</div>
							<div class="client-meta">
								<h3>Rintik Bryo <span>Mahasiswa Pecinta Alam</span></h3>
                      <p class="testimonial-body">
                        "Proses sewanya gampang dan cepat. Adminnya ramah dan responsif,
                        cocok banget buat yang butuh perlengkapan camping dadakan."
                      </p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar2.png" alt="">
							</div>
							<div class="client-meta">
								<h3>Reza Abdillah <span>Pendaki Gunung</span></h3>
                      <p class="testimonial-body">
                        "Peralatan dari Campifyy bersih dan lengkap. Tenda dan carrier-nya nyaman
                        dipakai, sangat membantu perjalanan pendakian saya."
                      </p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar3.png" alt="">
							</div>
							<div class="client-meta">
								<h3>Daren Nathaniel <span>Traveler Outdoor</span></h3>
                    <p class="testimonial-body">
                        "Harga sewa terjangkau dengan kualitas alat yang terjamin.
                        Saya pasti bakal sewa lagi di Campifyy untuk trip berikutnya."
                    </p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end testimonail-section -->

    <!-- advertisement section -->
	<div class="abt-section mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
                    <div class="abt-bg" style="background-image: url('assets/img/intro.jpg');"></div>
                </div>
				<div class="col-lg-6 col-md-12">
					<div class="abt-text">
						<p class="top-sub">Since Year 2020</p>
						<h2>We are <span class="orange-text">Campifyy</span></h2>
						<p>
                            Campifyy adalah layanan penyewaan perlengkapan outdoor yang menyediakan
                            berbagai kebutuhan camping dan kegiatan alam terbuka dengan kualitas terjamin.
                        </p>
                        <p>
                            Kami berkomitmen memberikan proses sewa yang mudah, cepat, dan terpercaya,
                            sehingga kamu bisa fokus menikmati petualangan tanpa ribet menyiapkan alat.
                        </p>
						<a href="/about" class="boxed-btn mt-4">know more</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end advertisement section -->
<script>
function loginAlert() {
    Swal.fire({
        icon: 'warning',
        title: 'Login',
        text: 'Silahkan Login',
        confirmButtonText: 'Login',
        backdrop: false,
        showClass: { popup: "" },
        hideClass: { popup: "" },
        backdrop: false,
    }).then(() => {
        window.location.href = "{{ route('login') }}";
    });
}

function addToCart(id_prod){
    fetch(`/cart/add/${id_prod}`, {
        method: 'POST',
        headers:{
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json'
        }
    })
    .then(res => res.json())
    .then(data => {
        Swal.fire({
            icon: data.status,
            title: data.status === 'success' ? 'Berhasil' : 'Gagal',
            text: 'Produk Berhasil ditambahkan ke keranjang!',
            timer: 1200,
            showConfirmButton: false,
            backdrop: false,
            showClass: { popup: "" },
            hideClass: { popup: "" }
        });
    })
    .catch(err => console.error('Error:', err));
}
</script>
@endsection