<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function indexLogin() {
        return view('login.index');
    }

    public function login(Request $request) {
        $response = Http::withToken(csrf_token())->post('http://localhost:8000/api/login', [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        if ($response->successful()) {
            // Sukses
            $responseData = $response->json();
            session(['access_token' => $responseData['token']]);
            session(['user' => $responseData['user']]);

             // Cek jika user adalah admin
            if ($responseData['user']['is_admin']) {
                return redirect('/admin')->with('success', $responseData['message']);
            } else {
                return redirect('/')->with('success', $responseData['message']);
            }
        } else {
            // Error
            $errorResponse = $response->json();
            return redirect()->back()->with('error', $errorResponse['message'])->withInput($errorResponse['oldInput']);
        }
    }

    public function indexRegister() {
        return view('register.index');
    }

    public function register(Request $request)
    {
        $response = Http::withToken(csrf_token())->post('http://localhost:8000/api/register', [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'password_confirmation' => $request->input('password_confirmation'),
            'gender' => $request->input('gender'),
            'birth_year' => $request->input('birth_year')
        ]);

        if ($response->successful()) {
            // Sukses
            $responseData = $response->json();
            return redirect('/login')->with('success', $responseData['message']);
        } else {
            // Error
            $errorResponse = $response->json();
            return redirect()->back()->with('error', $errorResponse['message'])->withInput($errorResponse['oldInput']);
        }
    }

    public function logout()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('access_token')
        ])->post('http://localhost:8000/api/logout');

        if ($response->successful()) {
            // Logout berhasil
            session()->forget('access_token');
            session()->forget('user');
            return redirect('/')->with('success', 'Logout berhasil');
        } else {
            // Gagal logout
            return redirect('/')->with('error', 'Gagal logout');
        }
    }

    public function pengaturan() {
        return view('pengaturan');
    }

    public function ubahPassword(Request $request) {
        $accessToken = session('access_token');
        $csrfToken = csrf_token();

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'X-CSRF-TOKEN' => $csrfToken,
        ])->post('http://localhost:8000/api/ubah-password', [
            'current_password' => $request->input('current_password'),
            'new_password' => $request->input('new_password'),
            'new_password_confirmation' => $request->input('new_password_confirmation')
        ]);

        if ($response->successful()) {
            // Sukses
            $responseData = $response->json();
            return redirect()->back()->with('password-success', $responseData['message']);
        } else {
            // Error
            $errorResponse = $response->json();
            return redirect()->back()->with('error', $errorResponse['message'])->withInput($errorResponse['oldInput']);
        }
    }

    public function ubahProfile(Request $request) {
        $accessToken = session('access_token');
        $csrfToken = csrf_token();

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'X-CSRF-TOKEN' => $csrfToken,
        ])->post('http://localhost:8000/api/ubah-profile', [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'gender' => $request->input('gender'),
            'birth_year' => $request->input('birth_year')
        ]);

        if ($response->successful()) {
            // Sukses
            $responseData = $response->json();

            // Perbarui session data pengguna
            session(['user' => $responseData['user']]);

            return redirect()->back()->with('profile-success', $responseData['message']);
        } else {
            // Error
            $errorResponse = $response->json();
            return redirect()->back()->with('error', $errorResponse['errors'])->withInput($errorResponse['oldInput']);
        }
    }
}
