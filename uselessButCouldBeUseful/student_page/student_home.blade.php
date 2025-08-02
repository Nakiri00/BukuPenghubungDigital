@extends('student_page.app')

@section('content')
<div class="col-md-12">
    @if (!is_null($student))
    <div class="card text-left col-md-12">
        <div class="card-header">

        </div>

        <div class="card text-left">
            <div class="card-header">

                <div class="d-flex align-items-center">
                    <h2>Data Diri</h2>

                </div>

            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group 	required">
                            <label class="control-label" for="name">Nama Lengkap</label>
                            <div class="input-group">
                                <input disabled name="name" type="text" id="name" class="form-control select "
                                    value="{{$student->name ?? ''}}">
                            </div>
                        </div>

                        <div class="form-group 	required">
                            <label class="control-label" for="dob">Tanggal Lahir</label>
                            <div class="input-group">
                                <input disabled name="dob" type="date" id="dob" class="form-control select "
                                    value="{{$student->dob ?? '' }}">
                            </div>
                        </div>

                        <div class="form-group  required">
                            <label class="control-label" for="gender">Jenis Kelamin</label>
                            <div class="input-group">
                                <input disabled name="nationality" type="text" id="nationality"
                                class="form-control select " value="{{$student->gender ?? '' }}">
                            </div>
                        </div>


                        <div class="form-group 	required">
                            <label class="control-label" for="nationality">Kewarganegaraan</label>
                            <div class="input-group">
                                <input disabled name="nationality" type="text" id="nationality"
                                    class="form-control select " value="{{$student->nationality ?? '' }}">
                            </div>
                        </div>


                        <div class="form-group 	required">
                            <label class="control-label" for="email">Email</label>
                            <div class="input-group">
                                <input disabled name="email" type="email" id="email" class="form-control select "
                                    value="{{$student->email ?? '' }}">
                            </div>
                        </div>

                        <div class="form-group 	required">
                            <label class="control-label" for="phone_no">Nomor Telepon</label>
                            <div class="input-group">
                                <input disabled name="phone_no" type="text" id="phone_no" class="form-control select "
                                    value="{{$student->phone_no ?? '' }}">
                            </div>
                        </div>

                        <div class="form-group 	required">
                            <label class="control-label" for="father_name">Nama Ayah</label>
                            <div class="input-group">
                                <input disabled name="father_name" type="text" id="father_name"
                                    class="form-control select " value="{{$student->father_name ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group 	required">
                            <label class="control-label" for="mother_name">Nama Ibu</label>
                            <div class="input-group">
                                <input disabled name="mother_name" type="text" id="mother_name"
                                    class="form-control select " value="{{$student->mother_name ?? '' }}">
                            </div>
                        </div>

                        <div class="form-group 	required">
                            <label class="control-label" for="mother_phone_no">Nomor Telepon Ibu</label>
                            <div class="input-group">
                                <input disabled name="mother_phone_no" type="text" id="mother_phone_no"
                                    class="form-control select " value="{{$student->mother_phone_no ?? '' }}">
                            </div>
                        </div>



                    </div>
                    <div class="col-6">

                        <div class="form-group 	required">
                            <label class="control-label" for="father_phone_no">Nomor Telepon Ayah</label>
                            <div class="input-group">
                                <input disabled name="father_phone_no" type="text" id="father_phone_no"
                                    class="form-control select " value="{{$student->father_phone_no ?? '' }}">
                            </div>
                        </div>


                        <div class="form-group 	required">
                            <label class="control-label" for="address">Alamat</label>
                            <div class="input-group">
                                <input disabled name="address" type="text" id="address" class="form-control select "
                                    value="{{$student->gender ?? '' }}">
                            </div>
                        </div>

                        <div class="form-group  required">
                            <label class="control-label" for="grade_id">Kelas</label>
                            <div class="input-group">
                            <input disabled name="address" type="text" id="address" class="form-control select "
                                    value="{{$student->grade_id?? '' }}">
                            </div>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="control-label" for="religion">Agama</label>
                            <div class="input-group">
                                <input disabled name="address" type="text" id="address" class="form-control select "
                                value="{{$student->religion?? '' }}">
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
    @else
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Alert</h4>
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Mohon Isi Formulir Data Diri</h4>
            </div>
        </div>

        <p></p>
        <p class="mb-0"></p>
    </div>
    @endif


</div>

@endsection
@section('scripts')
<script>

</script>

@endsection