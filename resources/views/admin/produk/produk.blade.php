@extends('admin.layoutadmin.appadmin')
@section('content')
    @if (Auth::user()->role != 'pelanggan')
        {{-- Disini Isi Konten --}}
    @else
        @include('admin.access_denied')
    @endif

    @if (session('success'))
    <div class="alertmalert-success">
        {{ session('success') }}
    <div>
@endif
    
    <h1 class="mt-4">Produk Kami</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Produk Kami</li>
    </ol>
    
    <div class="card mb-4">
        {{-- bikin button create --}}
        <div class="card-header">
            <a class="btn btn-primary" href="{{ url('produk/create') }}">Create</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Harga Jual</th>
                        <th>Harga Beli</th>
                        <th>Stok</th>
                        <th>Minimal Stok</th>
                        <th>Deskripsi</th>
                        <th>Kategori Produk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Harga Jual</th>
                        <th>Harga Beli</th>
                        <th>Stok</th>
                        <th>Minimal Stok</th>
                        <th>Deskripsi</th>
                        <th>Kategori Produk</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($produk as $p)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $p->kode }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->harga_jual }}</td>
                            <td>{{ $p->harga_beli }}</td>
                            <td>{{ $p->stok }}</td>
                            <td>{{ $p->min_stok }}</td>
                            <td>{{ $p->deskripsi }}</td>
                            <td>{{ $p->nama_kategori }}</td>
                            {{-- buat tombol edit --}}
                            <td>
                                @if (Auth::user()->role == 'admin')
                                <a href="{{ url('produk/edit/' . $p->id) }}" class="btn btn-warning">Edit</a>
                                @endif
                                {{-- buat tombol delete --}}
                                @if (Auth::user()->role == 'admin')
                                <a href="{{ url('produk/delete/' . $p->id) }}" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk?')">Delete</a>
                                @endif
                            </td>
                            <!--- nama_kategori diambil dari join yang ada di controller produk yang sudah dibuatkan join -->
                        </tr>
                        @php $no++; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection