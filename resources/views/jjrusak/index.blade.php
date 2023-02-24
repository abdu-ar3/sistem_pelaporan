@extends("layouts.global")

@section("title") Testing Jalan & Jembatan @endsection

@section("content")

<div class="container-fluid py-3">
    <div class="row">
        <div class="col-lg-12 mb-lg-0 mb-4">
        <div class="card ">
        <div class="card-header pb-0 p-3">
        <div class="d-flex justify-content-between">
        <h6>List Jalan & Jembatan</h6>
    </div>

      <!-- Message -->
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <br>

  <div class="table-responsive">
  <table class="table">
        <div class="row">
        <div class="col-md-6">
            <form action="#">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search By Lokasi, Tugas Untuk, Tugas dari" name="jjrusak">
                    <div class="input-group-append">
                        <input type="submit" value="Filter" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
        
        @if (auth()->user()->level == "admin")
        <div class="col-md-6">
            <div class="col-md-3">
                <div class="row mb-3">
                    <a href="{{route('jj_rusak.create')}}" class="btn btn-primary">Create</a>    
                </div>
            </div>
        </div><br>
        @endif
  <thead>
                <tr>
                    <td><b>No.</b></td>
                    <td><b>Nama Ruas</b></td>
                    <td><b>Kecamatan</b></td>
                    <td><b>Triwulan</b></td>
                    <td><b>Tugas Untuk</b></td>
                    <td><b>Tugas Dari</b></td>
                    <td><b>Action</b></td>
                </tr>
            </thead>
            <tbody>
            <?php
                    $no = 1;
            ?>
           @foreach($jj_rusaks as $jr)
                <tr>
                    <td><?= $no++; ?></td>
                    <td>{{$jr->name}}</td>
                    <td>{{$jr->lokasi}}</td>
                    <td>{{$jr->triwulan}}</td>
                    <td>{{$jr->tugas_untuk}}</td>
                    <td>{{$jr->atasan}}</td>

                    
                    <td> 
                        @if (auth()->user()->level == "admin")
                        <form onsubmit="return confirm('Delete this Revenue Weeks permanently?')" class="d-inline" action="{{route('jj_rusak.destroy', $jr->id)}}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                        </form>
                        @endif
                        <a href="{{route('jj_rusak.show', [$jr->id])}}" class="btn btn-success btn-sm">Details</a>
                    </td>
                    
                </tr>
            @endforeach
            </tbody>
  </table>
  </div>

</div>


@endsection