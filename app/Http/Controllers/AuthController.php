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
            return redirect('/')->with('success', $responseData['message']);
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
}
