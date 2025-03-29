<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use App\Models\WaliMurid;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function sendOTP(Request $request)
    {
        // Validasi input nomor HP
        $request->validate([
            'phone' => 'required|regex:/^(\+62|62|08)[0-9]{9,13}$/',
        ]);

        $phone = $request->phone;
        $otp = rand(100000, 999999); // Generate OTP 6 digit

        // Simpan OTP di session sementara
        Session::put('otp_code', $otp);
        Session::put('phone', $phone);

        // Buat URL API dengan metode GET
        $apiKey = 'b4886eb9ebe3c58f29faedf4dd4b1d9a';
        $sender = '6285959880656'; // Ganti dengan nomor yang telah dipindai di API
        $receiver = $phone;
        $message = urlencode("Kode OTP Anda: $otp. Jangan berikan kode ini kepada siapapun.");

        $url = "http://whatsapp.mpdev.my.id/app/api/send-message?apikey=$apiKey&sender=$sender&receiver=$receiver&message=$message";

        // Kirim request menggunakan file_get_contents
        $response = file_get_contents($url);

        // Cek apakah request berhasil atau gagal
        if ($response === false) {
            return response()->json([
                'message' => 'Gagal mengirim OTP. Silakan coba lagi.',
                'status' => false
            ]);
        }

        return response()->json([
            'message' => 'OTP berhasil dikirim ke WhatsApp Anda',
            'status' => true
        ]);
    }


    public function verifyOTP(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'otp_code' => 'required|numeric',
        ]);

        $storedOTP = Session::get('otp_code');
        $storedPhone = Session::get('phone');

        if ($storedPhone !== $request->phone || $storedOTP != $request->otp_code) {
            return response()->json(['message' => 'OTP salah atau kadaluarsa', 'status' => false]);
        }

        // Hapus OTP dari sesi setelah berhasil verifikasi
        Session::forget('otp_code');

        return response()->json([
            'message' => 'Verifikasi berhasil! Lanjut ke input data wali murid.',
            'redirect' => url('/register/data-wali-murid'),
            'status' => true,
        ]);
    }
}
