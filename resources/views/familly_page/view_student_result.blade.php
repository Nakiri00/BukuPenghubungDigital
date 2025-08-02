@extends('familly_page.app')
@section('content')

<div class="col-md-12">
    <div class="card text-left col-md-12">
        <div class="card-header"></div>

        <div class="card text-left">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h2>Laporan Kegiatan Siswa</h2>
                </div>
            </div>

            <div class="card-body">
                @if (!$student)
                    <div class="alert alert-warning">
                        <strong>Data siswa belum tersedia.</strong> Silakan isi data siswa terlebih dahulu.
                        <br>
                        <a href="{{ route('family_student_form') }}" class="btn btn-sm btn-primary mt-2">Isi Data Siswa</a>
                    </div>
                @else
                    <h5 class="mb-4">Laporan Kegiatan Siswa dengan Nama: <strong>{{ $student->name }}</strong></h5>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="LaporanKegiatan">
                            <thead>
                                <tr>
                                    <th width="3%">No</th>
                                    <th>Nama Siswa</th>
                                    <th>Laporan Kegiatan Siswa</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($comments as $comment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $comment->student->name }}</td>
                                        <td>{{ $comment->comment }}</td>
                                        <td>{{ date('Y-m-d', strtotime($comment->created_at)) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Belum Ada Kegiatan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

            <div class="card-footer"></div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#LaporanKegiatan').DataTable();
    });
</script>
@endsection
