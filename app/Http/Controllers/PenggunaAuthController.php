<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\hash;
use App\Models\Pengguna;
use App\Models\Samper;

class PenggunaAuthController extends Controller
{
    public function riwayat()
    {
        $jemputSampah = Samper::where('id_pengguna', Auth::user()->id)->with('produk')->get();
        return view('penggunas.profil.riwayat', compact('jemputSampah'));
    }

    public function showRegistrationForm()
    {
        return view('penggunas.login.index');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama_nasabah' => 'required|max:70',
            'nomor_telepon' => 'required|max:14',
            'jenis_kelamin' => 'required',
            'alamat' => 'required|max:200',
            'email' => 'required|email|max:48|unique:penggunas,email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'nama_nasabah.required' => 'Nama Wajib di isi',
            'nomor_telepon.required' => 'Nama Wajib di isi',
            'jenis_kelamin.required' => 'Nama Wajib di isi',
            'alamat.required' => 'Nama Wajib di isi',
            'email.required' => 'Nama Wajib di isi',
            'password.required' => 'Nama Wajib di isi',
            'email.unique' => 'Email sudah terdaftar',
        ]);
        Pengguna::create([
            'nama_nasabah' => $request->input('nama_nasabah'),
            'nomor_telepon' => $request->input('nomor_telepon'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'alamat' => $request->input('alamat'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        return redirect('/client/login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    public function showLoginForm()
    {
        return view('penggunas.login.index');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib di isi',
            'password.required' => 'Password wajib di isi',
        ]);

        try {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                // Authentication passed...
                session()->flash('success', 'Pesan sukses');

                return redirect()->intended('/home');
            }
            throw ValidationException::withMessages([
                'email' => ['Email atau kata sandi salah.'],
            ]);
        } catch (ValidationException $e) {
            return redirect('/client/login')->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Handle other exceptions here if needed
            Session::flash('error', 'Terjadi kesalahan. Silakan coba lagi.');
            return redirect('/client/login');
        }
    }

    public function showProfile()
    {
        if (Auth::check()) {
            $pengguna = Auth::user();

            // Check if the user exists
            if ($pengguna) {
                return view('penggunas.profil.profil', compact('pengguna'));
            } else {
                return redirect('client/login')->back()->with('error', 'User not found');
            }
        } else {
            return redirect('client/login');
        }
    }
    public function logout()
    {
        Auth::logout();

        return redirect('/'); // Redirect to the home page or any other desired location after logout
    }
}
