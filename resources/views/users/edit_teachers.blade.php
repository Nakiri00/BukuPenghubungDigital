@extends('backend.app')

@section('content')
<div class="col-md-8 mx-auto">
    <div class="card">
        <div class="card-header">
            <h2>Edit Data Guru</h2>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('users.teacher.update', $teacher->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- NIP --}}
                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" name="nip" id="nip" 
                        class="form-control {{ $errors->has('nip') ? 'is-invalid' : '' }}"
                        value="{{ old('nip', $teacher->nip) }}">
                    @if ($errors->has('nip'))
                        <span class="invalid-feedback">{{ $errors->first('nip') }}</span>
                    @endif
                </div>

                {{-- Nama --}}
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" 
                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        value="{{ old('name', $teacher->name) }}">
                    @if ($errors->has('name'))
                        <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                {{-- Teacher Type --}}
                <div class="form-group">
                    <label for="teacher_type">Tipe Guru</label>
                    <select name="teacher_type" id="teacher_type" 
                        class="form-control {{ $errors->has('teacher_type') ? 'is-invalid' : '' }}">
                        <option value="wali_kelas" {{ old('teacher_type', $teacher->teacher_type) == 'wali_kelas' ? 'selected' : '' }}>Wali Kelas</option>
                        <option value="mapel" {{ old('teacher_type', $teacher->teacher_type) == 'mapel' ? 'selected' : '' }}>Guru Mapel</option>
                    </select>
                    @if ($errors->has('teacher_type'))
                        <span class="invalid-feedback">{{ $errors->first('teacher_type') }}</span>
                    @endif
                </div>

                {{-- Kelas Wali --}}
                <div class="form-group" id="grade_group">
                    <label for="grade_id">Kelas yang Diampu</label>
                    <select name="grade_id" id="grade_id" 
                        class="form-control {{ $errors->has('grade_id') ? 'is-invalid' : '' }}">
                        <option value="">-- Pilih Kelas --</option>
                        @foreach($grades as $grade)
                            <option value="{{ $grade->id }}" 
                                {{ old('grade_id', $teacher->grade_id) == $grade->id ? 'selected' : '' }}>
                                {{ $grade->grade }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('grade_id'))
                        <span class="invalid-feedback">{{ $errors->first('grade_id') }}</span>
                    @endif
                </div>

                {{-- Kelas yang Diajar (Mapel) --}}
                <div class="form-group" id="mapel_grades_group">
                    <label for="mapel_grades">Kelas yang Diajar (Bisa lebih dari 1)</label>
                    <select name="mapel_grades[]" id="mapel_grades" multiple 
                        class="form-control {{ $errors->has('mapel_grades') ? 'is-invalid' : '' }}">
                        @foreach($grades as $grade)
                            <option value="{{ $grade->id }}"
                                {{ (isset($teacher->grades) && $teacher->grades->pluck('id')->contains($grade->id)) ? 'selected' : '' }}>
                                {{ $grade->grade }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('mapel_grades'))
                        <span class="invalid-feedback">{{ $errors->first('mapel_grades') }}</span>
                    @endif
                </div>

                {{-- Subject --}}
                <div class="form-group" id="subject_group">
                    <label for="subject">Mata Pelajaran</label>
                    <input type="text" name="subject" id="subject" 
                        class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}"
                        value="{{ old('subject', $teacher->subject) }}">
                    @if ($errors->has('subject'))
                        <span class="invalid-feedback">{{ $errors->first('subject') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const teacherTypeSelect = document.getElementById('teacher_type');
        const gradeGroup = document.getElementById('grade_group');
        const mapelGradesGroup = document.getElementById('mapel_grades_group');
        const subjectInput = document.getElementById('subject');

        function toggleFields() {
            if (teacherTypeSelect.value === 'wali_kelas') {
                gradeGroup.style.display = 'block';
                mapelGradesGroup.style.display = 'none';
                subjectInput.value = 'Mengajar semua pelajaran umum';
                subjectInput.setAttribute('readonly', true);
            } else {
                gradeGroup.style.display = 'none';
                mapelGradesGroup.style.display = 'block';
                subjectInput.removeAttribute('readonly');
                if(subjectInput.value === 'Mengajar semua pelajaran umum') {
                    subjectInput.value = '';
                }
            }
        }

        teacherTypeSelect.addEventListener('change', toggleFields);
        toggleFields(); // Run on load
    });
</script>
@endsection
