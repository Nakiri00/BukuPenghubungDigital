@extends('familly_page.app')
@section('content')
@php
    $isReadOnly = isset($student); // jika sudah ada, readonly
@endphp
<div class="col-md-12">
    <div class="card text-left col-md-12">
        <div class="card-header">
        </div>

        <div class="card text-left">
            <div class="card-header">

                <div class="d-flex align-items-center">
                    <h2>Isi Data Siswa</h2>

                </div>

            </div>

            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ isset($student) ? route('family_student_update', $student->id) : route('family_store_student') }}" method="POST">
                @if(isset($student))
                    @method('PUT')
                @endif
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group 	required">
                                <label class="control-label" for="nisn">NISN</label>
                                <div class="input-group">
                                    <input name="nisn" type="text" id="nisn"
                                        class="form-control select {{ $errors->has('nisn') ? ' is-invalid' : '' }}"
                                        value="{{old('nisn', $student->nisn ?? '') }}"
                                        {{ $isReadOnly ? 'readonly' : '' }}>
                                    @if ($errors->has('nisn'))
                                    <span class=" invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nisn') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group 	required">
                                <label class="control-label" for="full_name">Nama Lengkap</label>
                                <div class="input-group">
                                    <input name="full_name" type="text" id="full_name"
                                        class="form-control select {{ $errors->has('full_name') ? ' is-invalid' : '' }}"
                                        value="{{old('full_name', $student->name ?? '') }}"
                                        {{ $isReadOnly ? 'readonly' : '' }} >
                                    @if ($errors->has('full_name'))
                                    <span class=" invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('full_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group 	required">
                                <label class="control-label" for="dob">Tanggal Lahir</label>
                                <div class="input-group">
                                    <input name="dob" type="date" id="dob"
                                        class="form-control select {{ $errors->has('dob') ? ' is-invalid' : '' }}"
                                        value="{{old('dob', $student->dob ?? '') }}"
                                        {{ $isReadOnly ? 'readonly' : '' }}>
                                    @if ($errors->has('dob'))
                                    <span class=" invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group  required">
                                <label class="control-label" for="gender"> Jenis Kelamin</label>
                                <div class="input-group">
                                    <select name="gender" id="gender"
                                        class="form-control {{ $errors->has('gender') ? ' is-invalid' : '' }}"
                                        onfocusout="validategender()" {{ $isReadOnly ? "disabled" : "" }}>
                                        <option value="Laki-Laki" {{ old('gender', $student->gender ?? '') == 'Laki-Laki' ? 'selected' : '' }}>Laki - Laki</option>
                                        <option value="Perempuan" {{ old('gender', $student->gender ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                    @endif
                                    <span class="invalid-feedback" role="alert"></span>
                                </div>
                            </div>


                            <div class="form-group 	required">
                                <label class="control-label" for="nationality">Kewarganegaraan</label>
                                <div class="input-group">
                                    <select name="nationality" id="nationality"
                                            class="form-control {{ $errors->has('nationality') ? ' is-invalid' : '' }}"
                                            onfocusout="validatenationality()" {{ $isReadOnly ? "disabled" : "" }}>
                                            <option value="WNI" {{ old('nationality', $student->nationality ?? '') == 'WNI' ? 'selected' : '' }} selected>WNI </option>
                                            <option value="WNA" {{ old('nationality', $student->nationality ?? '') == 'WNA' ? 'selected' : '' }}>WNA</option>

                                        </select>
                                        @if ($errors->has('nationality'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nationality') }}</strong>
                                        </span>
                                        @endif
                                        <span class="invalid-feedback" role="alert"></span>
                                </div>
                            </div>

                            <!-- <div class="form-group 	required">
                                <label class="control-label" for="mother_name">mother_name</label>
                                <div class="input-group">
                                    <input name="mother_name" type="text" id="mother_name"
                                        class="form-control select {{ $errors->has('mother_name') ? ' is-invalid' : '' }}"
                                        value="{{old('mother_name') }}">
                                    @if ($errors->has('mother_name'))
                                    <span class=" invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mother_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div> -->
                        </div>
                        <div class="col-6">

                            <div class="form-group 	required">
                                <label class="control-label" for="address">Alamat</label>
                                <div class="input-group">
                                    <input name="address" type="text" id="address"
                                        class="form-control select {{ $errors->has('address') ? ' is-invalid' : '' }}"
                                        value="{{old('address', $student->address ?? '') }}"
                                        {{ $isReadOnly ? 'readonly' : '' }}>
                                    @if ($errors->has('address'))
                                    <span class=" invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group  required">
                                <label class="control-label" for="grade_id">Kelas</label>
                                <div class="input-group">
                                    <select name="grade_id" id="grade_id"
                                        class="form-control {{ $errors->has('grade_id') ? ' is-invalid' : '' }}" {{ $isReadOnly ? "disabled" : "" }}>
                                        <option class="dropup" value=""> Pilih Salah Satu</option>

                                        @foreach ($grades as $grade)
                                        <option value="{{$grade->id}}"
                                            {{old('grade_id', $student->grade_id ?? '') == $grade->id ? 'selected' : ''}}> {{$grade->grade}}
                                        </option>

                                        @endforeach
                                    </select>
                                    @if ($errors->has('grade_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('grade_id') }}</strong>
                                    </span>
                                    @endif
                                    <span class="invalid-feedback" role="alert"></span>
                                </div>
                            </div>
                            <div class="form-group  required">
                                <label class="control-label" for="religion"> Agama</label>
                                <div class="input-group">
                                    <select name="religion" id="religion"
                                        class="form-control {{ $errors->has('religion') ? ' is-invalid' : '' }}"
                                        onfocusout="validatereligion()" {{ $isReadOnly ? "disabled" : "" }}>
                                        <option class="dropup" value="Islam" {{ old('religion', $student->religion ?? '') == 'Islam' ? 'selected' : '' }} selected>Islam </option>
                                        <option class="dropup" value="Protestan" {{ old('religion', $student->religion ?? '') == 'Protestan' ? 'selected' : '' }}>Protestan</option>
                                        <option class="dropup" value="Katholik" {{ old('religion', $student->religion ?? '') == 'Katholik' ? 'selected' : '' }}>Katholik</option>
                                        <option class="dropup" value="Hindu" {{ old('religion', $student->religion ?? '') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                        <option class="dropup" value="Buddha" {{ old('religion', $student->religion ?? '') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                        <option class="dropup" value="Kong hu cu" {{ old('religion', $student->religion ?? '') == 'Kong hu cu' ? 'selected' : '' }}>Kong Hu Cu</option>

                                    </select>
                                    @if ($errors->has('religion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('religion') }}</strong>
                                    </span>
                                    @endif
                                    <span class="invalid-feedback" role="alert"></span>
                                </div>
                            </div>

                            <div class="form-group ml-auto">
                                @if ($isReadOnly)
                                    <button type="button" class="btn btn-warning" id="editButton">Ubah</button>
                                @else
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                @endif
                            </div>

                        </div>
                    </div>
                    </div>


                </form>
            </div>

        </div>
        <div class="card-footer">

        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editButton = document.getElementById('editButton');
        if (editButton) {
            editButton.addEventListener('click', function () {
                // Buka semua input
                document.querySelectorAll('input, select, textarea').forEach(el => {
                    el.removeAttribute('readonly');
                    el.removeAttribute('disabled');
                });
                // Ganti tombol menjadi submit
                editButton.outerHTML = '<button type="submit" class="btn btn-success">Update</button>';
            });
        }
    });
</script>
@endsection
