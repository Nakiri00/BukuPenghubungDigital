@extends('layouts.backend.app')

@section('breadcrumb')
<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
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
                    <h2>Create New Project </h2>
                    {{-- <!-- @can('driver create') --> --}}
                    <div class="ml-auto">
                        <a href="{{route('project.index')}}" class="btn btn-outline-primary">
                            <i class="fa fa-caret-left mr-1" aria-hidden="true"></i>Back</a>
                    </div>
                    {{-- <!-- @endcan --> --}}
                </div>

            </div>

            <div class="card-body">
                @if ($errors->any()){}
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{route('project.update', $project)}}" class="form-horizontal"
                    id="driver_reg" novalidate>
                    @csrf
                    @method('PATCH')

                    <div class="form-group 	required">
                        <label class="control-label">Title</label>
                        <div class="input-group">
                            <input name="title" type="text" id="title"
                                class="form-control select {{ $errors->has('title') ? ' is-invalid' : '' }}"
                                value="{{old('title') ??  $project->title}}" onfocusout="validatetitle()">
                            @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                            <span class="invalid-feedback" role="alert"></span>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label class="control-label">Body</label>
                        <div class="input-group">
                            <textarea name="body" class="form-control {{ $errors->has('body') ? ' is-invalid' : '' }}"
                                id="body">{{ old('body') ?? $project->body}}</textarea>
                            @if ($errors->has('body'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                            @endif
                            <span class="invalid-feedback" role="alert"></span>
                        </div>
                    </div>
                    <div class="form-group 	required">
                        <label class="control-label" for="when">When the Done? </label>
                        <div class="input-group">
                            <input name="when" type="date" id="when"
                                class="form-control select {{ $errors->has('when') ? ' is-invalid' : '' }}"
                                value="{{old('when') ??  $project->when}}" onfocusout="validatewhen()">
                            @if ($errors->has('when'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('when') }}</strong>
                            </span>
                            @endif
                            <span class="invalid-feedback" role="alert"></span>
                        </div>
                    </div>

                    <div class="form-group 	required">
                        <label class="control-label">Link</label>
                        <div class="input-group">
                            <input name="link" type="text" id="link"
                                class="form-control select {{ $errors->has('link') ? ' is-invalid' : '' }}"
                                value="{{old('link') ??  $project->link}}" onfocusout="validatelink()">
                            @if ($errors->has('link'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('link') }}</strong>
                            </span>
                            @endif
                            <span class="invalid-feedback" role="alert"></span>
                        </div>
                    </div>

                    <div class="form-group  required">
                        <label class="control-label" for="category_id">Catagory</label>
                        <div class="input-group">
                            @php
                            $category_id = [];
                            @endphp
                            <select name="category_id" id="category_id"
                                class="form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }}"
                                onfocusout="validatecategory_id()">
                                <option class="dropup" value="" selected> Select One</option>
                                @foreach ($catagories as $catagory)
                                <option class="dropup" value="{{$catagory->id}}"
                                    {{ $catagory->id == $project->client_id ? 'selected' : '' }}>
                                    {{$catagory->title}}
                                </option>
                                @endforeach
                            </select>
                            @if ($errors->has('catagory_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('catagory_id') }}</strong>
                            </span>
                            @endif
                            <span class="invalid-feedback" role="alert"></span>
                        </div>
                    </div>

                    <div class="form-group  required">
                        <label class="control-label" for="client_id">Customer Name</label>
                        <div class="input-group">
                            <select name="client_id" id="client_id"
                                class="form-control {{ $errors->has('client_id') ? ' is-invalid' : '' }}"
                                onfocusout="validateclient_id()">
                                <option class="dropup" value="" selected> Select One</option>
                                @foreach ($customers as $customer)
                                <option class="dropup" value="{{$customer->id}}"
                                    {{ $customer->id == $project->client_id ? 'selected' : '' }}>
                                    {{$customer->name}}
                                </option>
                                @endforeach
                            </select>
                            @if ($errors->has('client_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('client_id') }}</strong>
                            </span>
                            @endif
                            <span class="invalid-feedback" role="alert"></span>
                        </div>
                    </div>

                    <div class="form-group  required">
                        <label class="control-label" for="tag_id">Tag</label>
                        <div class="input-group">
                            <select name="tag_id" id="tag_id"
                                class="form-control {{ $errors->has('tag_id') ? ' is-invalid' : '' }}"
                                onfocusout="validatetag_id()">
                                <option class="dropup" value="" selected> Select One</option>
                                @foreach ($tags as $tag)
                                <option class="dropup" value="{{$tag->id}}"
                                    {{ $tag->id == $project->tag_id ? 'selected' : '' }}>
                                    {{$tag->name}}
                                </option>
                                @endforeach
                            </select>
                            @if ($errors->has('tag_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('tag_id') }}</strong>
                            </span>
                            @endif
                            <span class="invalid-feedback" role="alert"></span>
                        </div>
                    </div>

                    <div class="form-group  required">
                        <label class="control-label" for="job_card_type"> Status</label>
                        <div class="input-group">
                            <select name="status" id="status"
                                class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}"
                                onfocusout="validatestatus()">
                                @if ($project->status == 1)
                                <option class="dropup" value="1" selected>Publihsed </option>
                                <option class="dropup" value="0">Not Published</option>
                                @else
                                <option class="dropup" value="0" selected>Not Published</option>
                                <option class="dropup" value="1">Publihsed</option>
                                @endif

                            </select>
                            @if ($errors->has('status'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('status') }}</strong>
                            </span>
                            @endif
                            <span class="invalid-feedback" role="alert"></span>
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
    $(document).ready( function () {
    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
    });
</script>

@endsection
