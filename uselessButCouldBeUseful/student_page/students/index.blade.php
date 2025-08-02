@extends('student_page.app')

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
            <div class="d-flex align-items-center">
                <h2>All students </h2>
                {{-- @can('customer create') --}}

                <div class="ml-auto">
                    <a href="{{route('student.create')}}" class="btn btn-outline-primary btn-sm"><i
                            class="fas fa-plus mr-1"></i>Add student</a>

                </div>
                {{-- @endcan --}}
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive ">
                <table class="table table-bordered  table-striped" id="students">
                    <thead>
                        <tr>
                            <th class="m-1 b-1" width="3%">No</th>
                            <th class="m-1 b-1">Avatar</th>
                            <th class="m-1 b-1">Title</th>
                            <th class="m-1 b-1">Link</th>
                            <th class="m-1 b-1">status</th>
                            <th class="m-1 b-1" width="3%">Edit</th>
                            <th class="m-1 b-1" width="3%">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $student)
                        <tr>
                            <td class='p-1'>{{$loop->index+1}}</td>
                            <td class='p-1'><img src="/images/thumbnail/{{ $student->image }}" alt=""
                                    class="rounded-circle" width="40" height="40"></td>
                            <td class='p-1'>{{$student->title}}</td>
                            <td class='p-1'>{{$student->link}}</td>
                            <td class='p-1'>
                                @if ($student->status)
                                <span class="badge badge-primary">Published</span>
                                @else
                                <span class="badge badge-danger">Not Published</span>

                                @endif
                            </td>
                            <td class='p-1 text-center' data-toggle="tooltip" data-placement="top" title="Edit">
                                <a href="{{route('student.edit', $student)}}"><i class="fas fa-edit"></i></a>
                            </td>

                            <td class='p-1 text-center' data-toggle="tooltip" data-placement="top" title="delete">
                                <button id="delete_meue" class="delete_meue red"> <i class="fas fa-trash"
                                        aria-hidden="true"></i></button>
                            </td>

                        </tr>

                        @empty
                        <tr>
                            <td class='m-1 p-1 text-center' colspan="2">No Data Avilable</td>
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

        $('#students').DataTable();
    });
</script>

@endsection
