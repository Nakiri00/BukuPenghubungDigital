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
                <h2>All student_results </h2>
                {{-- @can('customer create') --}}

                <div class="ml-auto">


                </div>
                {{-- @endcan --}}
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive ">
                <table class="table table-bordered  table-striped" id="student_results">
                    <thead>
                        <tr>
                            <th class="m-1 b-1" width="3%">No</th>
                            <th class="m-1 b-1">Studnet Name</th>
                            <th class="m-1 b-1">Teacher Name</th>
                            <th class="m-1 b-1">Grade</th>
                            <th class="m-1 b-1">Subject Name</th>
                            <th class="m-1 b-1">Score</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($student_results as $student_result)
                        <tr>
                            <td class='p-1'>{{$loop->index+1}}</td>
                            <td class='p-1'>{{$student_result->student->name}}</td>
                            <td class='p-1'>{{$student_result->user->name}}</td>
                            <td class='p-1'>{{$student_result->grade->grade}}</td>
                            <td class='p-1'>{{$student_result->subject->subject_name}}</td>
                            <td class='p-1'>{{$student_result->score}}</td>



                        </tr>
                        @empty
                        <tr>
                            <td class='m-1 p-1 text-center' colspan="5">No Data Avilable</td>
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

        $('#student_results').DataTable();
    });
</script>

@endsection