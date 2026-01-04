<header>
<div class="top-header-area" id="sticker">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="main-menu-wrap">

                    <!-- logo -->
                    <div class="site-logo">
                        <a href="/">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="">
                        </a>
                    </div>
                    <!-- logo -->

                    <!-- menu start -->
                    <nav class="main-menu">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="/about">About</a></li>
                            <li><a href="/products">Products</a></li>
                            <li><a href="/history">History</a></li>
                            <li><a href="/contact">Contact</a></li>

                            <!-- ICONS -->
                            <li>
                                <div class="header-icons">
                                    <a class="shopping-cart" href="/cart">
                                        <i class="fas fa-shopping-cart"></i>
                                    </a>

                                    @if(Auth::check())
                                    <a href="javascript:void(0)" onclick="logoutAlert()">
                                        <i class="fas fa-user"></i>
                                        {{ auth()->user()->name }}
                                    </a>
                                    <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display:none;">
                                        @csrf
                                    </form>
                                    @else
                                    <a href="javascript:void(0)" 
                                    onclick="loginAlert()">
                                        <i class="fas fa-user"></i>
                                    </a>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <!-- menu end -->
                </div>
            </div>
        </div>
    </div>
</div>
</header>

<script>
function logoutAlert() {
    Swal.fire({
        title: 'Logout?',
        text: 'Kamu yakin mau keluar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Logout',
        cancelButtonText: 'Batal',
        backdrop: false,
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('logoutForm').submit();
        }
    });
}

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
</script>

