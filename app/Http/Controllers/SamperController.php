<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Models\Produk;
use App\Models\Samper;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class SamperController extends Controller
{
    public function formCust()
    {
        $user = Auth::user();
        $produks = Produk::all();
        $penggunas = Pengguna::all();
        return view('penggunas.layanan.layanan-jemput-sampah', compact('user', 'produks', 'penggunas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeCust(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'id_pengguna' => 'required',
            'id_produk' => 'required',
            'jumlah' => 'required|numeric',
            'total_harga' => 'numeric',
            'alamat_samper' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('jemputSampah.form')->withInput()->withErrors($validator);
        }

        $produk = Produk::find($request->id_produk);
        $input['total_harga'] = $produk->harga * $request->jumlah;
        $produk->stok = $produk->stok + $request->jumlah;
        $produk->save();

        Samper::create($input);
        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('user.riwayat')->with('success', 'samper berhasil ditambah');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $samper = Samper::orderBy('id', 'asc')->with(['produk', 'pengguna'])->simplePaginate(5);

        $filterKeyword = $request->keyword;
        if ($filterKeyword) {
            Samper::whereHas('produk', function ($query) use ($filterKeyword) {
                $query->where('nama_nasabah', "%$filterKeyword");
            })->with('produk', 'pengguna')->paginate(1);
        }

        return view('samper.index', compact('samper'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produks = Produk::all();
        $penggunas = Pengguna::all();

        return view('samper.create', compact('produks', 'penggunas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'id_pengguna' => 'required',
            'id_produk' => 'required',
            'jumlah' => 'required|numeric',
            'total_harga' => 'numeric',
            'alamat_samper' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('samper.create')->withInput()->withErrors($validator);
        }

        $produk = Produk::find($request->id_produk);
        $input['total_harga'] = $produk->harga * $request->jumlah;
        $produk->stok = $produk->stok + $request->jumlah;
        $produk->save();

        Samper::create($input);
        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('samper.index')->with('success', 'samper berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $samper = Samper::findOrfail($id);
        $samper->load('produk', 'pengguna');

        return view('samper.show', compact('samper'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $samper = Samper::findOrfail($id);
        $samper->load('produk', 'pengguna');

        $produks = Produk::all();
        $penggunas = Pengguna::all();

        // return compact('samper', penggunas', 'users');

        return view('samper.edit', compact('samper', 'produks', 'penggunas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // ini perintah untuk update data
        $samper = Samper::findOrfail($id);
        $input = $request->all();
        $validator = Validator::make($input, [
            'id_pengguna' => 'required',
            'id_produk' => 'required',
            'jumlah' => 'required|numeric',
            'total_harga' => 'numeric',
            'alamat_samper' => 'required',
        ]);

        //ini perintah untuk cek validasi
        if ($validator->fails()) {
            return redirect()->route('samper.edit', [$id])->withInput()->withErrors($validator);
        }

        $produk = Produk::find($request->id_produk);
        $input['total_harga'] = $produk->harga * $request->jumlah;

        $samper->update($input);
        // alert()->success('Edit','Data Sudah Di Edit');
        Alert::success('Berhasil', 'Data Berhasil Diperbarui');
        return redirect()->route('samper.index')->with('success', 'samper berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = samper::findOrfail($id);
        $data->delete();
        return redirect()->route('samper.index')->with('status', 'samper berhasil di hapus');
    }
}
