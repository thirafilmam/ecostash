<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Controllers\HomeController;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $user = Pengguna::orderBy('nama_nasabah', 'asc')->simplePaginate(3);
        $filterKeyword = $request->get('keyword');
        if ($filterKeyword) {
            $user = Pengguna::where('nama_nasabah', 'LIKE', "%$filterKeyword")->paginate(1);
        }
        return view('user.index', compact('user'));
    }

    public function create()
    {
        return view('user.create');
    }


    public function store(Request $request)
    {
        $simpan = $request->all();
        $validasi = Validator::make($simpan, [
            'nama_nasabah' => 'required|max:70',
            'nomor_telepon' => 'required|max:14',
            'jenis_kelamin' => 'required',
            'alamat' => 'required|max:200',
            'email' => 'required|email|max:48|unique:penggunas,email',
            'password' => 'required|string|min:8|confirmed',
        ]);
        if ($validasi->fails()) {
            return redirect()->route('user.create')->withInput()->withErrors($validasi);
        }

        $simpan['password'] = bcrypt($simpan['password']);
        Pengguna::create($simpan);
        Alert::success('Berhasil', 'Data sudah tersimpan');
        return redirect()->route('user.index')->with('success', 'User berhasil ditambah');
    }


    public function show(string $id)
    {
        $user = Pengguna::findOrfail($id);
        return view('user.show', compact('user'));
    }


    public function edit(string $id)
    {
        $user = Pengguna::findOrfail($id);
        return view('user.edit', compact('user'));
    }


    public function update(Request $request, string $id)
    {
        $user = Pengguna::findOrfail($id);
        $data = $request->all();
        $validasi = Validator::make($data, [
            'nama_nasabah' => 'required|max:70',
            'nomor_telepon' => 'required|max:14',
            'jenis_kelamin' => 'required',
            'alamat' => 'required|max:200',
            'email' => 'required|email|max:48|unique:penggunas,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validasi->fails()) {
            return redirect()->route('user.create')->withInput()->withErrors($validasi);
        }

        if ($request->input('password')) {
            $data['password'] = bcrypt($data['password']);
        } else {
            $data = Arr::except($data, ['password']);
        }
        $user->update($data);
        Alert::success('Berhasil', 'Perubahan sudah tersimpan');
        return redirect()->route('user.index')->with('success', 'User berhasil ditambah');
    }


    public function destroy(string $id)
    {
        $data = pengguna::findOrfail($id);
        $data->delete();
        Alert::success('Berhasil', 'Data sudah dihapus');
        return redirect()->route('user.index')->with('status', 'User berhasil di hapus');
    }
}
