@extends('admin.admin_master')

@section('title')
    Edit Jemput
@endsection

@section('admin.index')
    <div class="row-container">
        <div class="col-md-12">
            <div class="box">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Edit Jemputan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('samper.update', [$samper->id]) }}" method="post" class="form-horizontal"
                            enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="card-body">
                                <!-- edit nama Pelanggan -->
                                <div class="form-group">
                                    <label>Nama Pengguna</label>
                                    <select class="form-control" name="id_nasabah">
                                        @foreach ($penggunas as $pengguna)
                                            <option value="{{ $pengguna->id }}">{{ $pengguna->nama_pengguna }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- edit nama produk -->
                                <div class="form-group">
                                    <label>Nama Produk</label>
                                    <select class="form-control" name="id_produk">
                                        @foreach ($produks as $produk)
                                            <option value="{{ $produk->id }}">{{ $produk->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- edit Jumlah Unit -->
                                <div class="form-group">
                                    <label for="exampleInputJemput1">Jumlah Unit</label>
                                    <input type="number" name="jumlah" class="form-control" value="{{ $samper->jumlah }}"
                                        id="exampleInputJumlah1" placeholder="Jumlah Unit">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputalamat1">Alamat Penjemputan</label>
                                    <textarea type="text" name="alamat_samper" class="form-control" value=id="exampleInputalamat1" placeholder="Alamat">"{{ $pengguna->alamat_samper }}"</textarea>
                                </div>
                                <div class="card-footer">
                                    <div class="box-footer">
                                        <button type = "submit" name="tombol" class="btn btn-info pull-right">Edit</button>
                                        <a href="{{ route('samper.index') }}" class="btn btn-danger float-right">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
