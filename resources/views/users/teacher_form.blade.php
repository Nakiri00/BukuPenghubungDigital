@extends('backend.app')
@section('content')
@php
    $isReadOnly = isset($teacher);
@endphp
<div class="col-md-12">
    <div class="card text-left col-md-12">
        <div class="card-header"></div>

        <div class="card text-left">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h2>{{ $isReadOnly ? 'Detail Guru' : 'Tambah Guru' }}</h2>
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

                <form action="{{ isset($teacher) ? route('teacher.update', $teacher->id) : route('teacher.store') }}" method="POST">
                @if(isset($teacher))
                    @method('PUT')
                @endif
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            {{-- NIP --}}
                            <div class="form-group required">
                                <label for="nip">NIP</label>
                                <input type="text" name="nip" id="nip" 
                                    class="form-control {{ $errors->has('nip') ? 'is-invalid' : '' }}"
                                    value="{{ old('nip', $teacher->nip ?? '') }}"
                                    {{ $isReadOnly ? 'readonly' : '' }}>
                                @if ($errors->has('nip'))
                                    <span class="invalid-feedback">{{ $errors->first('nip') }}</span>
                                @endif
                            </div>

                            {{-- Nama Lengkap --}}
                            <div class="form-group required">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" name="name" id="name" 
                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    value="{{ old('name', $teacher->name ?? '') }}"
                                    {{ $isReadOnly ? 'readonly' : '' }}>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            {{-- Jenis Guru --}}
                            <div class="form-group required">
                                <label for="teacher_type">Tipe Guru</label>
                                <select name="teacher_type" id="teacher_type" 
                                    class="form-control {{ $errors->has('teacher_type') ? 'is-invalid' : '' }}"
                                    {{ $isReadOnly ? 'disabled' : '' }}>
                                    <option value="wali_kelas" {{ old('teacher_type', $teacher->teacher_type ?? '') == 'wali_kelas' ? 'selected' : '' }}>Wali Kelas (Mengajar semua pelajaran umum)</option>
                                    <option value="mapel" {{ old('teacher_type', $teacher->teacher_type ?? '') == 'mapel' ? 'selected' : '' }}>Guru Mata Pelajaran</option>
                                </select>
                                @if ($errors->has('teacher_type'))
                                    <span class="invalid-feedback">{{ $errors->first('teacher_type') }}</span>
                                @endif
                            </div>

                            {{-- Tanggal Lahir --}}
                            <div class="form-group required">
                                <label for="dob">Tanggal Lahir</label>
                                <input type="date" name="dob" id="dob" 
                                    class="form-control {{ $errors->has('dob') ? 'is-invalid' : '' }}"
                                    value="{{ old('dob', $teacher->dob ?? '') }}"
                                    {{ $isReadOnly ? 'readonly' : '' }}>
                                @if ($errors->has('dob'))
                                    <span class="invalid-feedback">{{ $errors->first('dob') }}</span>
                                @endif
                            </div>

                            {{-- Jenis Kelamin --}}
                            <div class="form-group required">
                                <label for="gender">Jenis Kelamin</label>
                                <select name="gender" id="gender" 
                                    class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}"
                                    {{ $isReadOnly ? 'disabled' : '' }}>
                                    <option value="Laki-Laki" {{ old('gender', $teacher->gender ?? '') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="Perempuan" {{ old('gender', $teacher->gender ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback">{{ $errors->first('gender') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-6">

                            {{-- Mata Pelajaran (untuk guru mapel) --}}
                            <div class="form-group required" id="subject_group">
                                <label for="subject">Mata Pelajaran</label>
                                <input type="text" name="subject" id="subject" 
                                    class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}"
                                    value="{{ old('subject', $teacher->subject ?? '') }}"
                                    {{ $isReadOnly ? 'readonly' : '' }}>
                                <small class="text-muted">Contoh: Agama, PJOK, Seni Budaya</small>
                                @if ($errors->has('subject'))
                                    <span class="invalid-feedback">{{ $errors->first('subject') }}</span>
                                @endif
                            </div>

                            {{-- Pilih kelas jika guru mapel --}}
                            <div class="form-group required" id="mapel_grades_group">
                                <label for="mapel_grades">Kelas yang Diajar (Guru Mapel)</label>
                                <select name="mapel_grades[]" id="mapel_grades" multiple
                                    class="form-control {{ $errors->has('mapel_grades') ? 'is-invalid' : '' }}"
                                    {{ $isReadOnly ? 'disabled' : '' }}>
                                    @foreach ($grades as $grade)
                                        <option value="{{ $grade->id }}"
                                            @if(isset($teacher) && $teacher->grades && $teacher->grades->pluck('id')->contains($grade->id)) selected @endif>
                                            {{ $grade->grade }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('mapel_grades'))
                                    <span class="invalid-feedback">{{ $errors->first('mapel_grades') }}</span>
                                @endif
                            </div>

                            {{-- Pilih kelas untuk wali kelas --}}
                            <div class="form-group required" id="grade_group">
                                <label for="grade_id">Kelas yang Diampu (Wali Kelas)</label>
                                <select name="grade_id" id="grade_id" 
                                    class="form-control {{ $errors->has('grade_id') ? 'is-invalid' : '' }}"
                                    {{ $isReadOnly ? 'disabled' : '' }}>
                                    <option value="">Pilih Kelas</option>
                                    @foreach ($grades as $grade)
                                        <option value="{{ $grade->id }}" 
                                            {{ old('grade_id', $teacher->grade_id ?? '') == $grade->id ? 'selected' : '' }}>
                                            {{ $grade->grade }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('grade_id'))
                                    <span class="invalid-feedback">{{ $errors->first('grade_id') }}</span>
                                @endif
                            </div>

                            {{-- Alamat --}}
                            <div class="form-group required">
                                <label for="address">Alamat</label>
                                <input type="text" name="address" id="address" 
                                    class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                    value="{{ old('address', $teacher->address ?? '') }}"
                                    {{ $isReadOnly ? 'readonly' : '' }}>
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback">{{ $errors->first('address') }}</span>
                                @endif
                            </div>

                            {{-- Telepon --}}
                            <div class="form-group required">
                                <label for="phone">Nomor Telepon</label>
                                <input type="text" name="phone" id="phone" 
                                    class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                    value="{{ old('phone', $teacher->phone ?? '') }}"
                                    {{ $isReadOnly ? 'readonly' : '' }}>
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>

                            {{-- Tombol --}}
                            <div class="form-group mt-3">
                                @if ($isReadOnly)
                                    <button type="button" class="btn btn-warning" id="editButton">Ubah</button>
                                @else
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <div class="card-footer"></div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editButton = document.getElementById('editButton');
        if (editButton) {
            editButton.addEventListener('click', function () {
                document.querySelectorAll('input, select, textarea').forEach(el => {
                    el.removeAttribute('readonly');
                    el.removeAttribute('disabled');
                });
                editButton.outerHTML = '<button type="submit" class="btn btn-success">Update</button>';
            });
        }

        const teacherTypeSelect = document.getElementById('teacher_type');
        const subjectGroup = document.getElementById('subject_group');
        const gradeGroup = document.getElementById('grade_group');
        const mapelGradesGroup = document.getElementById('mapel_grades_group');

        function toggleFields() {
            if (teacherTypeSelect.value === 'wali_kelas') {
                subjectGroup.style.display = 'none';
                document.getElementById('subject').value = 'Mengajar semua pelajaran umum';
                gradeGroup.style.display = 'block';
                mapelGradesGroup.style.display = 'none';
            } else {
                subjectGroup.style.display = 'block';
                document.getElementById('subject').value = '';
                gradeGroup.style.display = 'none';
                mapelGradesGroup.style.display = 'block';
            }
        }

        teacherTypeSelect.addEventListener('change', toggleFields);
        toggleFields(); // Initial load
    });
</script>
@endsection
