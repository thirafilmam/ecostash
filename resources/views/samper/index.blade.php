@extends('admin.admin_master')

@section('title')
    All samper
@endsection

@section('admin.index')
    <section class="content">
        <div class="col">
            <div class="col-md-12">
                {{--  fungsi add atau tambah --}}
                <div class="box-header with-border">
                    @if (Request::get('keyword'))
                        <a class="btn btn-app bg-info"href="{{ route('samper.index') }}">
                            <i class="fas fa-recycle"></i> Reset</a>
                    @else
                        <a class="btn btn-app bg-success"href="{{ route('samper.create') }}">
                            <i class="fas fa-plus"></i> Add</a>
                    @endif
                    <div class="row">
                        <div class="col-md-3 offset-md-9">
                            <form method="get" action="{{ route('samper.index') }}">
                                <div class="input-group">
                                    <input type="search" class="form-control form-control-lg" placeholder="Search by name"
                                        id="keyword" name="keyword" value="{{ Request::get('nama_nasabah') }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-lg btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row mt-3">
                <div class="col-md-6">
                    <a href="{{ route('samper.index') }}" class="btn btn-primary">Semua Jenis</a>
                    @foreach ($jenisSampah as $jenis)
                        <a href="{{ route('samper.index', ['jenis' => $jenis->jenis]) }}"
                            class="bt
                            n btn-outline-primary">{{ $jenis->jenis }}</a>
                    @endforeach
                </div>
            </div> --}}
            @if (Request::get('keyword'))
                <div class="alert alert-info alert-block">
                    Hasil pencarian data samper dengan keyword: <b>{{ Request::get('keyword') }}</b>
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pengguna</th>
                        <th>Nama Produk</th>
                        <th>Jumlah Unit</th>
                        <th>Total Harga</th>
                        <th>Alamat Jemput</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($samper as $row)
                        <tr>
                            <td>{{ $loop->iteration + $samper->perpage() * ($samper->currentPage() - 1) }}</td>
                            <td>{{ $row->pengguna->nama_nasabah }}</td>
                            <td>{{ $row->produk->nama }}</td>
                            <td>{{ $row->jumlah }}</td>
                            <td>Rp. {{ $row->total_harga }}</td>
                            <td>{{ $row->alamat_samper }}</td>
                            <td>{{ $row->created_at }}</td>
                            <td>
                                <form method="POST" action="{{ route('samper.destroy', [$row->id]) }}"
                                    onsubmit="return confirm('Apakah anda yakin akan menghapus data samper, {{ $row->nama_nasabah }}?')">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <a class="btn btn-info" href="{{ route('samper.edit', [$row->id]) }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="btn bt-info" href="{{ route('samper.edit', [$row->id]) }}"></a>
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <a class="btn btn-warning" href="{{ route('samper.show', [$row->id]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $samper->appends(Request::all())->links() }}
        </div>
        </div>
    </section>
@endsection
