@extends("layouts.global")

@section("title") Testing Graafik Konek Database @endsection

@section("content")

<div class="container-fluid py-3">
    <div class="row">
        <div class="col-lg-12 mb-lg-0 mb-4">
        <div class="card ">
        <div class="card-header pb-0 p-3">
        <div class="d-flex justify-content-between">
        <h3 class="mb-2">Laporan</h3>
    </div>
    <div class="card col-md-8">
    <div class="card-header">
        <h5>Detail Laporan Karyawan</h5>
    </div>
    <div class="card-body">
        
            <b>Name Karyawan</b> <br />
            {{$list_laporan->name}}
            <br><br>
            <b>Departement</b> <br />
            {{$list_laporan->dept}}
            <br><br>
            <b>Judul Laporan</b> <br />
            {{$list_laporan->judul}}
            <br><br>
            <b>Image</b><br>
            @if($list_laporan->image)
            <img src="http://localhost/client-laravel/storage/app/public/{{ $list_laporan->image }}" width="675px"/>
            @else
            No avatar
            @endif 
           
            <br><br><br>
            <footer class="blockquote-footer">UPTD Jalan & Jembatan <cite title="Source Title">#</cite></footer>
      
    </div>
    </div>


</div>


@endsection
