@extends('backend.app')

@section('content')
<div class="col-md-12">
    <div class="card text-left col-md-12">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2>Data Guru</h2>
                <a href="{{ route('teacher.create') }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i> Tambah Guru
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="teachers">
                    <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Tipe Guru</th>
                            <th>Kelas yang Diampu</th>
                            <th>Mata Pelajaran</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($teachers as $teacher)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $teacher->nip }}</td>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ ucfirst(str_replace('_', ' ', $teacher->teacher_type)) }}</td>
                            <td>
                                @if ($teacher->teacher_type === 'wali_kelas')
                                    {{ $teacher->grade ? $teacher->grade->grade : '-' }}
                                @else
                                    {{-- Untuk guru mapel, tampilkan daftar kelas yang diampu --}}
                                    {{ $teacher->grades && $teacher->grades->count() > 0 
                                        ? $teacher->grades->pluck('grade')->implode(', ') 
                                        : '-' }}
                                @endif
                            </td>
                            <td>{{ $teacher->subject ?? '-' }}</td>
                            <td>
                                <a href="{{ route('users.teacher.edit', $teacher->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('teacher.destroy', $teacher->id) }}" id="delete-form-{{ $teacher->id }}"
                                    method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm"
                                        onclick="if(confirm('Hapus guru ini?')) {
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{ $teacher->id }}').submit();
                                        } else {
                                            event.preventDefault();
                                        }">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data guru</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#teachers').DataTable();
    });
</script>
@endsection
