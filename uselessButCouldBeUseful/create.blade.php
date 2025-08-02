@extends('familly_page.app')
@section('content')
<div class="col-md-12">
    <div class="card text-left col-md-12">
        <div class="card-header">
        </div>

        <div class="card text-left">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h2>Laporan Kegiatan Siswa </h2>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive ">
                    <table class="table table-bordered  table-striped" id="LaporanKegiatan">
                        <thead>
                            <tr>
                                <th class="m-1 b-1" width="3%">No</th>
                                <th class="m-1 b-1">Nama Siswa</th>
                                <th class="m-1 b-1">Laporan Kegiatan Siswa</th>
                                <th class="m-1 b-1">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($comments as $comment)
                            <tr>
                                <td class='p-1'>{{$loop->index+1}}</td>
                                <td class='p-1'>{{$comment->student->name}}</td>
                                <td class='p-1'>{{$comment->comment}}</td>
                                <td class='p-1'>{{date('Y-m-d', strtotime($comment->created_at))}}</td>
                            </tr>

                            @empty
                            <tr>
                                <td class='m-1 p-1 text-center' colspan="4">Belum Ada Kegiatan</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
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

        $('#LaporanKegiatan').DataTable();
    });
    </script>

    @endsection
