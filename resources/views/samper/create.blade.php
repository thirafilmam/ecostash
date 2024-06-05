@extends('admin.admin_master')

@section('title')
    Buat Jemput
@endsection

@section('admin.index')
    <section class="content">
        <div class="col">
            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Buat Jemputan</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('samper.store') }}" method="POST" class="form-horizontal">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label class="col-sm-2 label-control">Nama pengguna</label>
                                <select class="form-control" name="id_pengguna">
                                    @foreach ($penggunas as $pengguna)
                                        <option value="{{ $pengguna->id }}">{{ $pengguna->nama_nasabah }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <select class="form-control" name="id_produk">
                                    @foreach ($produks as $produk)
                                        <option value="{{ $produk->id }}">{{ $produk->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 label-control">Jumlah Unit</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" placeholder="Jumlah Unit" name="jumlah"
                                        value="{{ old('jumlah') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 label-control">Alamat Penjemputan</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" placeholder="Alamat" name="alamat_samper"
                                        value="{{ old('alamat_samper') }}">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{ route('samper.index') }}" class="btn btn-danger float-right">Cancel</a>
                </div>
                </form>
            </div>
        </div>
        </div>
    </section>
@endsection
