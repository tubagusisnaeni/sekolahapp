@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-base-200">
    <div class="card w-96 bg-base-100 shadow-xl p-6">
        <h2 class="text-2xl font-bold text-center mb-4">Daftar Wali Murid</h2>
        
        <div class="mb-4">
            <label class="label" for="phone">
                <span class="label-text">Nomor WhatsApp</span>
            </label>
            <input type="text" id="phone" class="input input-bordered w-full" placeholder="Masukkan Nomor WA">
        </div>
        
        <button onclick="sendOTP()" class="btn btn-primary w-full">Kirim OTP</button>
    
        <div id="otp-section" class="hidden mt-4">
            <div class="mb-4">
                <label class="label" for="otp_code">
                    <span class="label-text">Masukkan OTP</span>
                </label>
                <input type="text" id="otp_code" class="input input-bordered w-full" placeholder="OTP">
            </div>
            
            <button onclick="verifyOTP()" class="btn btn-success w-full">Verifikasi</button>
        </div>
    </div>
</div>

<script>
    function sendOTP() {
        let phone = document.getElementById('phone').value;
        fetch('/send-otp', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            body: JSON.stringify({ phone })
        }).then(response => response.json()).then(data => {
            alert(data.message);
            if (data.status) {
                document.getElementById('otp-section').classList.remove('hidden');
            }
        });
    }

    function verifyOTP() {
        let phone = document.getElementById('phone').value;
        let otp_code = document.getElementById('otp_code').value;
        fetch('/verify-otp', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            body: JSON.stringify({ phone, otp_code })
        }).then(response => response.json()).then(data => {
            alert(data.message);
            if (data.status) {
                window.location.href = data.redirect;
            }
        });
    }
</script>
@endsection
