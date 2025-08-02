@extends('teacher_page.app')
@section('content')
<div class="col-md-12">
    <div class="card text-left col-md-12">
        <div class="card-header"></div>

        <div class="card text-left">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h2>Kegiatan Siswa</h2>
                </div>
            </div>
            
            <div class="card-body">
                {{-- Dropdown Kelas --}}
                @if($kelasList->count() > 0)
                    <div class="form-group required">
                        <label for="kelas_id">Pilih Kelas</label>
                        <form method="GET" action="">
                            <select name="kelas_id" id="kelas_id" class="form-control" onchange="this.form.submit()">
                                <option value="">-- Pilih Kelas --</option>
                                @foreach($kelasList as $kelas)
                                    <option value="{{ $kelas->id }}" {{ $selectedKelasId == $kelas->id ? 'selected' : '' }}>
                                        {{ $kelas->grade }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                @endif

                {{-- Form Kegiatan Siswa --}}
                @if($selectedKelasId && $students->count() > 0)
                <form method="post" action="{{route('students_comment.store')}}" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group required">
                        <label class="control-label" for="studnet_id">Pilih Siswa</label>
                        <select name="studnet_id" id="studnet_id" class="form-control {{ $errors->has('studnet_id') ? ' is-invalid' : '' }}">
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}" {{ old('studnet_id') == $student->id ? 'selected' : '' }}>
                                    {{ $student->name }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('studnet_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('studnet_id') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label">Kegiatan Siswa</label>
                        <textarea name="body" class="form-control {{ $errors->has('body') ? ' is-invalid' : '' }}" rows="3">{{ old('body') }}</textarea>
                        @if ($errors->has('body'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group ml-auto">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
                @elseif($selectedKelasId)
                    <p class="text-muted">Tidak ada siswa di kelas ini.</p>
                @endif
            </div>
        </div>
        <div class="card-footer"></div>
    </div>
</div>
@endsection
