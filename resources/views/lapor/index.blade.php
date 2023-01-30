@extends("layouts.global")

@section("title") Testing Graafik Konek Database @endsection

@section("content")

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-12 mb-lg-0 mb-4">
        <div class="card ">
        <div class="card-header pb-0 p-3">
        <div class="d-flex justify-content-between">
        <h6 class="mb-2">Lapor</h6>
    </div>
</div>
<div class="table-responsive">
    <table class="table align-items-center ">
        <tbody>
            <tr>
                <td class="w-30">
                    <div class="d-flex px-2 py-1 align-items-center">
                    <form class="col-lg-12" enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('lapors.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="week">Nama Karyawan</label>
                        <input value="{{old('name')}}" class="form-control {{$errors->first('name')? "is-invalid": ""}}" placeholder="Masukan Nama" type="text" name="name" id="name" />
                        <div class="invalid-feedback">
                            {{$errors->first('name')}}
                        </div>
                    </div>
                    <div class="mb-3">
                      <label for="week">Departement</label>
                        <input value="{{old('dept')}}" class="form-control {{$errors->first('dept')? "is-invalid": ""}}" placeholder="Masukan Departement" type="text" name="dept" id="dept" />
                        <div class="invalid-feedback">
                            {{$errors->first('dept')}}
                        </div>
                    </div>
                    <div class="mb-3">
                      <label for="week">Judul Laporan</label>
                        <input value="{{old('judul')}}" class="form-control {{$errors->first('judul')? "is-invalid": ""}}" placeholder="Masukan Judul Laporan" type="text" name="judul" id="judul" />
                        <div class="invalid-feedback">
                            {{$errors->first('judul')}}
                        </div>
                    </div>
                    <div class="mb-3">
                      <label for="week">Isi Laporan</label>
                        <input value="{{old('isi_laporan')}}" class="form-control {{$errors->first('isi_laporan')? "is-invalid": ""}}" placeholder="Masukan Isi Laporan atau Keterangan" type="text" name="isi_laporan" id="isi_laporan" />
                        <div class="invalid-feedback">
                            {{$errors->first('')}}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="avatar">Image (Isikan Foto lokasi terkini)</label>   
                        <input id="image" name="image" type="file" class="form-control">
                        <hr class="my-3">

                    </div>
                     <div class="mb-3">
                        <label for="avatar">AS Build Drawing (Isikan Foto Hitung hitungan)</label>   
                        <input id="asbuild_drawing" name="asbuild_drawing" type="file" class="form-control">
                        <hr class="my-3">

                    </div>
                    <div class="mb-3">
                      <label for="week">Progres Pekerjaan (Tahap)</label>
                        <input value="{{old('progres')}}" class="form-control {{$errors->first('progres')? "is-invalid": ""}}" placeholder="Masukan Progres pekerjaan sudah sampai tahap berapa?" type="text" name="progres" id="progres" />
                        <div class="invalid-feedback">
                            {{$errors->first('progres')}}
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</div>
</div>


@endsection