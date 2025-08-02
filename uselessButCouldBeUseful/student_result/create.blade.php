@extends('teacher_page.app')

@section('breadcrumb')
<h1 class="h3 mb-0 text-gray-800"></h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
</ol>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card text-left col-md-12">
        <div class="card-header">
        </div>

        <div class="card text-left">
            <div class="card-header">

                <div class="d-flex align-items-center">
                    <h2>Register Studets Result </h2>

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
                <form method="post" action="{{route('student_result.store')}}" class="form-horizontal" id="driver_reg"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group  required">
                        <label class="control-label" for="grade_id">Grade</label>
                        <div class="input-group">
                            <select name="grade_id" id="grade_id"
                                class="form-control {{ $errors->has('grade_id') ? ' is-invalid' : '' }}">
                                <option class="dropup" value=""> Select One</option>

                                @foreach ($grades as $grade)
                                <option value="{{$grade->id}}" {{old('grade_id') == $grade->id ? 'selected' : ''}}>
                                    {{$grade->grade}}
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
                        <label class="control-label" for="student_id">Student Name</label>
                        <div class="input-group">
                            <select name="student_id" id="student_id"
                                class="form-control {{ $errors->has('student_id') ? ' is-invalid' : '' }}">
                                <option class="dropup" value=""> Select One</option>

                                @foreach ($students as $student)
                                <option value="{{$student->id}}"
                                    {{old('student_id') == $student->id ? 'selected' : ''}}>
                                    {{$student->name}}
                                </option>

                                @endforeach
                            </select>
                            @if ($errors->has('student_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('student_id') }}</strong>
                            </span>
                            @endif
                            <span class="invalid-feedback" role="alert"></span>
                        </div>
                    </div>

                    <div class="form-group  required">
                        <label class="control-label" for="subject_id">Subject </label>
                        <div class="input-group">
                            <select name="subject_id" id="subject_id"
                                class="form-control {{ $errors->has('subject_id') ? ' is-invalid' : '' }}">
                                <option class="dropup" value=""> Select One</option>

                                @foreach ($subjects as $subject)
                                <option value="{{$subject->id}}"
                                    {{old('subject_id') == $subject->id ? 'selected' : ''}}>
                                    {{$subject->subject_name}}
                                </option>

                                @endforeach
                            </select>
                            @if ($errors->has('subject_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('subject_id') }}</strong>
                            </span>
                            @endif
                            <span class="invalid-feedback" role="alert"></span>
                        </div>
                    </div>

                    <div class="form-group 	required">
                        <label class="control-label" for="score">Score</label>
                        <div class="input-group">
                            <input name="score" type="text" id="score"
                                class="form-control select {{ $errors->has('score') ? ' is-invalid' : '' }}"
                                value="{{old('score')}}">
                            @if ($errors->has('score'))
                            <span class=" invalid-feedback" role="alert">
                                <strong>{{ $errors->first('score') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group ml-auto">
                        <button type="submit" class="btn btn-primary" name="save"> <i class="fas fa-save mr-1"
                                aria-hidden="true"></i>Save</button>

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

</script>

@endsection
