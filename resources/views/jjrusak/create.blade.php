@extends("layouts.global")

@section("title") Testing Create JJ rusak @endsection

@section("content")

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-12 mb-lg-0 mb-4">
        <div class="card ">
        <div class="card-header pb-0 p-3">
        <div class="d-flex justify-content-between">
        <h6 class="mb-2">Create</h6>
    </div>
</div>
<div class="table-responsive">
    <table class="table align-items-center ">
        <tbody>
            <tr>
                <td class="w-30">
                    <div class="d-flex px-2 py-1 align-items-center">
                    <form class="col-lg-12" enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('jj_rusak.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="week">Nama Jalan &  Jembatan</label>
                        <input value="{{old('name')}}" class="form-control {{$errors->first('name')? "is-invalid": ""}}" placeholder="Masukan Nama Jalan & Jembatan" type="text" name="name" id="name" />
                        <div class="invalid-feedback">
                            {{$errors->first('name')}}
                        </div>
                    </div>
                    <div class="mb-3">
                      <label for="week">Lokasi</label>
                        <input value="{{old('lokasi')}}" class="form-control {{$errors->first('lokasi')? "is-invalid": ""}}" placeholder="Masukan Lokasi" type="text" name="lokasi" id="lokasi" />
                        <div class="invalid-feedback">
                            {{$errors->first('lokasi')}}
                        </div>
                    </div>
                    <div class="mb-3">
                      <label for="week">Tanggal</label>
                        <input value="{{old('tanggal')}}" class="form-control {{$errors->first('tanggal')? "is-invalid": ""}}" placeholder="Masukan tanggal pengerjaan" type="text" name="tanggal" id="tanggal" />
                        <div class="invalid-feedback">
                            {{$errors->first('tanggal')}}
                        </div>
                    </div>
                    <div class="mb-3">
                      <label for="week">Tugas Untuk</label>
                        <input value="{{old('tugas_untuk')}}" class="form-control {{$errors->first('tugas_untuk')? "is-invalid": ""}}" placeholder="Tugas Untuk" type="text" name="tugas_untuk" id="tugas_untuk" />
                        <div class="invalid-feedback">
                            {{$errors->first('tugas_untuk')}}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="avatar">Image (Isikan Foto Actual)</label>   
                        <input id="image" name="image" type="file" class="form-control">
                        <hr class="my-3">

                    </div>
                    <div class="mb-3">
                      <label for="week">Tugas Dari</label>
                        <input value="{{old('atasan')}}" class="form-control {{$errors->first('atasan')? "is-invalid": ""}}" placeholder="Yang memberikan Tugas" type="text" name="atasan" id="atasan" />
                        <div class="invalid-feedback">
                            {{$errors->first('atasan')}}
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