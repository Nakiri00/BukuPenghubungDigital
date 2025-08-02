<div class="form-group 	required">
    <label class="control-label">Title</label>
    <div class="input-group">
        <input name="title" type="text" id="title"
            class="form-control select {{ $errors->has('title') ? ' is-invalid' : '' }}"
            value="{{old('title') ??  $project->title}}">
        @if ($errors->has('title'))
        <span class=" invalid-feedback" role="alert">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
        @endif
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
    <label class="control-label" for="when">When the Project Done? </label>
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
        <select name="category_id[]" id="category_id"
            class="form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }}">
            <option class="dropup" value=""> Select One</option>

            @foreach ($catagories as $catagory)
            @if (old('category_id') )
            <option value="{{$catagory->id}}" {{old('category_id') == $catagory->id ? 'selected' : ''}}>
                {{$catagory->title}}
            </option>
            @else
            <option value={{$catagory->id}}>
                {{ $catagory->title }}
            </option>
            @endif
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
            class="form-control {{ $errors->has('client_id') ? ' is-invalid' : '' }}" onfocusout="validateclient_id()">
            <option class="dropup" value="" selected> Select One</option>

            @foreach ($customers as $customer)
            @if (old('client_id') )
            <option class="dropup" value="{{$customer->id}}" {{old('client_id') == $customer->id ? 'selected' : ''}}>
                {{$customer->name}} </option>
            @else
            <option value={{$customer->id}} {{$customer->id == $project->client_id ? 'selected' : ''}}>
                {{ $customer->name }}</option>
            @endif
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
        <select name="tag_id[]" id="tag_id" class="form-control {{ $errors->has('tag_id') ? ' is-invalid' : '' }}">

            @foreach ($tags as $tag)
            @if (old('tag_id') )
            <option class="dropup" value="{{$tag->id}}" {{old('tag_id') == $tag->id ? 'selected' : ''}}>
                {{$tag->name}} </option>
            @else
            <option value={{$tag->id}} {{$tag->id == $project->tag_id ? 'selected' : ''}}>
                {{ $tag->name }}</option>
            @endif
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

<div class="form-group required">
    <label class="control-label" for="image">Image</label>
    @if($project->image)
    <img id="original" src="{{ url('/images/thumbnail/'.$project->image) }}" height="70" width="70">
    @endif
    <div class="input-group input-group-sm">

        <input name="image" type="file" id="image"
            class="form-control  {{ $errors->has('image') ? ' is-invalid' : '' }}" value="{{ $project->image}}"
            onfocusout="validateimage()">
        <div class="input-group-append">
            <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar" aria-hidden="true"></i></span>
        </div>
        @if ($errors->has('image'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('image') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>
</div>

<div class="form-group ml-auto">
    <button type="submit" class="btn btn-primary" name="save"> <i class="fas fa-save mr-1"
            aria-hidden="true"></i>Save</button>

</div>
