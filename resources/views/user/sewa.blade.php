@extends('user.layout')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-section hero-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Tempat Penyewaan Peralatan Outdoor Terbaik</p>
                    <h1>Sewa campifyy</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<section style="font-family: 'Poppins', sans-serif;">
<div class="container py-5 rounded shadow-sm mb-5 mt-5">
    <div class="container px-5">

    @if(empty($cart))
        <div class="alert alert-warning">Keranjang masih kosong.</div>
    @else
    <div class="row justify-content-center">
        <!-- Checkout Form -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm p-4">

                <!-- Step indicator -->
                <div class="d-flex mb-4 justify-content-between" id="step-indicator">
                    <div class="text-center step-circle" data-step="1">
                        <div class="rounded-circle bg-warning text-white d-inline-block" style="width:30px;height:30px;line-height:30px;"><b>1</b></div>
                        <small style="font-family: 'Poppins', sans-serif;"><b>Informasi Penyewa</b></small>
                    </div>
                    <div class="text-center step-circle" data-step="2">
                        <div class="rounded-circle bg-light text-muted d-inline-block" style="width:30px;height:30px;line-height:30px;"><b>2</b></div>
                        <small style="font-family: 'Poppins', sans-serif;"><b>Pembayaran</b></small>
                    </div>
                    <div class="text-center step-circle" data-step="3">
                        <div class="rounded-circle bg-light text-muted d-inline-block" style="width:30px;height:30px;line-height:30px;"><b></b>3</b></div>
                        <small style="font-family: 'Poppins', sans-serif;"><b>Review</b></small>
                    </div>
                </div>

                <form id="checkoutForm"
                action="{{ route('cart.processSewa') }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf

                <!-- Step 1: Info Penyewa -->
                <div id="step-1">
                    <h6 class="fw-bold mb-3">Informasi Penyewa</h6>
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="full_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No. HP / WA</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>
                    <p><strong>Catatan:</strong> Semua barang akan diambil di tempat penyewaan.</p>
                    <button type="button" class="btn mt-2 text-white" style="background-color: #F28123;" onclick="nextStep(2)">Next</button>

                </div>

                <!-- Step 2: Payment -->
                <div id="step-2" style="display:none;">
                    <h6 class="fw-bold mb-3">Pilih Metode Pembayaran</h6>
                    <div class="d-flex gap-3 mb-3 flex-wrap justify-content-start">

                        <!-- DANA -->
                        <div class="payment-option p-3 border rounded text-center" data-value="DANA" onclick="selectPayment(this)" style="flex: 1 1 200px; max-width: 250px;">
                            <img src="{{ asset('user/assets/img/dana.png') }}" class="img-fluid mb-1" style="width:50px">
                            <h4 class="payment-detail mt-3">081234567981</h4>
                        </div>

                        <!-- QRIS -->
                        <div class="payment-option p-3 border rounded text-center" data-value="QRIS" onclick="selectPayment(this)" style="flex: 1 1 200px; max-width: 250px;">                         
                            <small class="payment-detail">
                                <img src="{{ asset('user/assets/img/qris.jpeg') }}" style="width:150px" alt="QRIS">
                            </small>
                        </div>
                    </div>

                    <!-- Upload bukti pembayaran -->
                    <div class="mb-3">
                        <label class="form-label">Upload Bukti Pembayaran</label>
                        <input type="file" name="bukti" class="form-control" id="bukti" required>
                    </div>

                    <input type="hidden" name="payment_method" id="payment_method">

                    <button type="button" class="btn btn-secondary mt-2 me-2" onclick="prevStep(1)">Back</button>
                    <button type="button" class="btn mt-2 text-white" style="background-color: #F28123;" onclick="nextStep(3)">Next</button>
                </div>

                <!-- Step 3: Review -->
                <div id="step-3" style="display:none;">
                    <h6 class="fw-bold mb-3">Review Pesanan</h6>

                    @php $grandTotal = 0; @endphp
                    @foreach($cart as $id => $item)
                        @php
                            $start = $item['start_date'];
                            $end = $item['end_date'];
                            $days = (strtotime($end) - strtotime($start))/86400 + 1;
                            if($days<1) $days=1;
                            $subtotal = $item['harga_day'] * $item['quantity'] * $days;
                            $grandTotal += $subtotal;
                        @endphp
                        <div class="row border-bottom py-2 align-items-center">
                            <div class="col-md-2">
                                <img src="{{ asset('uploads/produk/' . $item['gambar']) }}" class="img-fluid rounded">
                            </div>
                            <div class="col-md-3">
                                {{ $item['nama'] }}<br>
                                <small>Rp {{ number_format($item['harga_day'],0,',','.') }}/hari</small>
                            </div>
                            <div class="col-md-2 text-center">{{ $item['quantity'] }}</div>
                            <div class="col-md-3"><small>{{ $start }} <br>{{ $end }} <br>({{ $days }} hari)</small></div>
                            <div class="col-md-2 text-end fw-bold">Rp {{ number_format($subtotal,0,',','.') }}</div>
                        </div>
                    @endforeach

                    <div class="d-flex justify-content-between mt-3">
                        <h5>Total</h5>
                        <div class="fw-bold">Rp {{ number_format($grandTotal,0,',','.') }}</div>
                    </div>

                    <button type="button" class="btn btn-secondary mt-2 me-2" onclick="prevStep(2)">Back</button>
                    <button type="submit" class="btn mt-2 text-white" style="background-color: #F28123;">Bayar &Sewa</button>
                </div>
                </form>
            </div>
        </div>

    </div>
    @endif
</div>
</div>
</section>

<script>
let currentStep = 1;

function showError(message){
    Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: message,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK',
        backdrop: false
    });
}

function updateStepIndicator(step){
    currentStep = step;
    document.querySelectorAll('#step-indicator .step-circle').forEach(el=>{
        const circle = el.querySelector('div');
        if(el.dataset.step == step){
            circle.classList.remove('bg-light','text-muted');
            circle.classList.add('bg-warning','text-white');
        } else {
            circle.classList.remove('bg-warning','text-white');
            circle.classList.add('bg-light','text-muted');
        }
    });
}

function validateStep(step){
    if(step === 1){
        const fullName = document.querySelector('input[name="full_name"]').value.trim();
        const phone = document.querySelector('input[name="phone"]').value.trim();
        if(fullName === '' || phone === ''){
            showError('Isi semua informasi penyewa terlebih dahulu!');
            return false;
        }
    } else if(step === 2){
        const metode = document.getElementById('payment_method').value;
        const bukti = document.getElementById('bukti').files.length;
        if(!metode){
            showError('Pilih metode pembayaran dulu!');
            return false;
        }
        if(bukti === 0){
            showError('Upload bukti pembayaran terlebih dahulu!');
            return false;
        }
    }
    return true;
}

function nextStep(step){
    if(!validateStep(currentStep)) return;
    document.querySelectorAll('[id^="step-"]').forEach(el => el.style.display='none');
    document.getElementById('step-'+step).style.display='block';
    updateStepIndicator(step);
}

function prevStep(step){
    document.querySelectorAll('[id^="step-"]').forEach(el => el.style.display='none');
    document.getElementById('step-'+step).style.display='block';
    updateStepIndicator(step);
}

// Pilih metode pembayaran
function selectPayment(el){
    document.querySelectorAll('.payment-option').forEach(e=>{
        e.classList.remove('border-success');
    });

    el.classList.add('border-success');
    document.getElementById('payment_method').value = el.dataset.value;
}
</script>
@endsection
