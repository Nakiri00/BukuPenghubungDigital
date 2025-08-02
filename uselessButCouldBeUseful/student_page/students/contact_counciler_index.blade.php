@extends('student_page.app')
@section('content')
<div class="col-md-12">
    <div class="card text-left col-md-12">
        <div class="card-header">
        </div>

        <div class="card text-left">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h2>Contact Conciler </h2>
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
                <form method="post" action="{{route('students_comment.store')}}" class="form-horizontal" id="driver_reg"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group  required">
                        <label class="control-label" for="studnet_id">Select Conciler Name</label>
                        <div class="input-group">
                            <select name="studnet_id" id="studnet_id"
                                class="form-control {{ $errors->has('studnet_id') ? ' is-invalid' : '' }}">

                                @foreach ($students as $studnet)
                                <option value="{{$studnet->id}}"
                                    {{old('studnet_id') == $studnet->id ? 'selected' : ''}}>
                                    {{$studnet->name}}
                                </option>
                                @endforeach

                            </select>
                            @if ($errors->has('studnet_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('studnet_id') }}</strong>
                            </span>
                            @endif
                            <span class="invalid-feedback" role="alert"></span>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label">Comment</label>
                        <div class="input-group">
                            <textarea name="body" class="form-control {{ $errors->has('body') ? ' is-invalid' : '' }}"
                                id="body" rows="3">{{ old('body') }} </textarea>
                            @if ($errors->has('body'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                            @endif
                            <span class="invalid-feedback" role="alert"></span>
                        </div>
                    </div>

                    <div class="form-group ml-auto">
                        <button type="submit" class="btn btn-primary" name="save"> <i class="fas fa-search mr-1"
                                aria-hidden="true"></i>Send The Comment</button>

                    </div>



                </form>
            </div>

        </div>
        <div class="card-footer">

        </div>
    </div>
</div>


@endsection