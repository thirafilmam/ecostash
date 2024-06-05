<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $produk = Produk::orderBy('nama', 'asc')->simplePaginate(5);

        $filterKeyword = $request->get('keyword');
        if ($filterKeyword) {
            $produk = Produk::where('nama', 'LIKE', "%$filterKeyword")->paginate(1);
        }
        return view('produk.index', compact('produk'));
    }
    public function LayananProduk()
    {
        $produk = Produk::all(); // Assuming you have a model named "Produk" representing your products
        return view('penggunas.layanan.layanan-harga-sampah', compact('produk'));
    }
    public function LayananSelect(Request $request)
    {
        $jenis = $request->query('type'); // Mengambil jenis dari parameter URL

        // Lakukan logika untuk mengambil produk berdasarkan jenis
        $produk = Produk::where('jenis', $jenis)->get();

        return response()->json($produk);
    }

    public function getjenis(Request $request)
    {
        $jenisSampah = Produk::select('jenis')->distinct()->orderBy('jenis', 'asc')->get();

        $filterJenis = $request->get('jenis');
        if ($filterJenis) {
            $produk = Produk::where('jenis', $filterJenis)->orderBy('nama', 'asc')->simplePaginate(5);
        } else {
            $produk = Produk::orderBy('nama', 'asc')->simplePaginate(5);
        }

        return view('produk.index', compact('produk', 'jenisSampah'));
    }

    public function create()
    {
        $produk = Produk::all();
        return view('produk.create', compact('produk'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nama' => 'required|max:30',
            'gambar' => 'nullable|image|mimes:jpeg,jpg,png|max:5048',
            'harga' => 'required|',
            'stok' => 'required|numeric',
            'jenis' => 'required',
            'satuan_hitung' => 'required|max:30',
            'deskripsi' => 'required|max:200',
        ]);
        if ($validator->fails()) {
            return redirect()->route('produk.create')->withInput()->withErrors($validator);
        }

        $gambar = $request->file('gambar');
        $extention = $gambar->getClientOriginalExtension();

        if ($request->file('gambar')->isValid()) {
            $namafoto = "produk/" . date('YmdHis') . "." . $extention;
            $extention;
            $upload_path = "uploads/produk";
            $request->file('gambar')->move($upload_path, $namafoto);
            $input['gambar'] = $namafoto;
        }

        Produk::create($input);
        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('produk.index')->with('success', 'Data produk berhasil ditambah');
    }

    public function show(string $id)
    {
        $produk = Produk::findOrfail($id);
        return view('produk.show', compact('produk'));
    }

    public function edit(string $id)
    {
        $produk = Produk::findOrfail($id);
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, string $id)
    {
        // ini perintah untuk update data
        $produk = Produk::findOrfail($id);
        $input = $request->all();
        $validator = Validator::make($input, [
            'nama' => 'required|max:30',
            'gambar' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'harga' => 'required|',
            'stok' => 'required|numeric',
            'jenis' => 'required',
            'satuan_hitung' => 'required|max:30',
            'deskripsi' => 'required|max:200',

        ]);

        //ini perintah untuk cek validasi
        if ($validator->fails()) {
            return redirect()->route('produk.edit', [$id])->withInput()->withErrors($validator);
        }

        if ($request->hasFile('gambar')) {
            if ($request->file('gambar')->isValid()) {
                Storage::disk('upload')->delete($produk->gambar);
                $gambar = $request->file('gambar');

                $extention = $gambar->getClientOriginalExtension();
                $namafoto = "produk/" . date('YmdHis') . "." . $extention;
                $upload_path = 'uploads/produk';
                $request->file('gambar')->move($upload_path, $namafoto);
                $input['gambar'] = $namafoto;
            }
        } else {
            $input['gambar'] = $produk->gambar;
        }

        $produk->update($input);
        // alert()->success('Edit','Data Sudah Di Edit');
        Alert::success('Berhasil', 'Data Berhasil Diperbarui');
        return redirect()->route('produk.index')->with('success', 'Data produk berhasil di edit');
    }
    public function destroy(string $id)
    {
        $data = Produk::findOrfail($id);

        // Hapus semua pesanan yang terkait dengan produk
        $pesanans = Pesanan::where('id_produk', $data->id)->get();
        foreach ($pesanans as $pesanan) {
            $pesanan->delete();
        }

        // Hapus produk
        $data->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->route('produk.index')->with('status', 'Data produk berhasil di hapus');
    }
    // public function destroy(string $id)
    // {
    //     $data = Produk::findOrfail($id);
    //     $data->delete();
    //     Alert::success('Berhasil', 'Data berhasil dihapus');
    //     return redirect()->route('produk.index')->with('status','Data produk berhasil di hapus');
    // }

}
