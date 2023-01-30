@extends("layouts.global")

@section("title") Jalan & Jembatan Detail @endsection

@section("content")

<div class="container-fluid py-3">
    <div class="row">
        <div class="col-lg-12 mb-lg-0 mb-4">
        <div class="card ">
        <div class="card-header pb-0 p-3">
        <div class="d-flex justify-content-between">
        <h3 class="mb-2">Jalan & Jembatan</h3>
    </div>
    <div class="card col-md-8">
    <div class="card-header">
        <h5>Detail</h5>
    </div>
    <div class="card-body">
        
            <b>Name Jalan & Jembatan Rusak</b> <br />
            {{$jj_rusak->name}}
            <br><br>
            <b>Kecamatan</b> <br />
            {{$jj_rusak->lokasi}}
            <br><br>
            <b>Triwulan</b> <br />
            {{$jj_rusak->triwulan}}
            <br><br>
            <b>Tanggal</b>
            {{$jj_rusak->tanggal}}
            <br><br>
            <b>Tugas Untuk</b> <br />
            {{$jj_rusak->tugas_untuk}}
            <br><br>
            <b>Tugas Dari</b> <br />
            {{$jj_rusak->atasan}}
           
            <br><br><br>
            <footer class="blockquote-footer">UPTD Jalan & Jembatan <cite title="Source Title">#</cite></footer>
      
    </div>
    </div>


</div>


@endsection
