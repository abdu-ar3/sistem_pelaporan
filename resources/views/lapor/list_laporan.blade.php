@extends("layouts.global")

@section("title") Testing Graafik Konek Database @endsection

@section("content")

<div class="container-fluid py-3">
    <div class="row">
        <div class="col-lg-12 mb-lg-0 mb-4">
        <div class="card ">
        <div class="card-header pb-0 p-3">
        <div class="d-flex justify-content-between">
        <h6 class="mb-2">List Laporan</h6>
    </div><br>

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
                    <input type="text" class="form-control" placeholder="Search By Nama karyawan, Departement & Progres" name="lapor">
                    <div class="input-group-append">
                        <input type="submit" value="Filter" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
        
        
        <div class="col-md-6">
        </div>
        </div><br>
     
  <thead>
                <tr>
                    <td><b>No.</b></td>
                    <td><b>Nama Karyawan.</b></td>
                    <td><b>Departement</b></td>
                    <td><b>Judul Laporan</b></td>
                    <td><b>Progres</b></td>
                    <td><b>Images</b></td>
                    <td><b>Action</b></td>
                </tr>
            </thead>
            <tbody>
              <?php
                    $no = 1;
              ?>
           @foreach($list_lapors as $list)
                <tr>
                    <td><?= $no++; ?></td>
                    <td>{{$list->name}}</td>
                    <td>{{$list->dept}}</td>
                    <td>{{$list->judul}}</td>
                    <td>{{$list->progres}}</td>
                    <td>
                        @if($list->image)
                        <img src="http://localhost/client-laravel/storage/app/public/{{ $list->image }}"
                        width="90px">
                        @else
                            N/A
                        @endif
                    </td>
                    <td> 
                        @if (auth()->user()->level == "admin")
                        <form onsubmit="return confirm('Delete this Revenue Weeks permanently?')" class="d-inline" action="{{route('lapors.destroy', $list->id)}}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                        </form>
                        @endif
                         <a href="{{route('lapors.show', [$list->id])}}" class="btn btn-success btn-sm">Details</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
  </table>
  </div>

</div>


@endsection