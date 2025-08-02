@extends('counciler_page.app')
@section('content')
<div class="col-md-12">
    <div class="card text-left col-md-12">
        <div class="card-header">
        </div>

        <div class="card text-left">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h2>View Studets Result </h2>
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
                            @forelse ($student_result as $sr)
                            <tr>
                                <td class='p-1'>{{$loop->index+1}}</td>
                                <td class='p-1'>{{$sr->student->name}}</td>
                                <td class='p-1'>{{$sr->user->name}}</td>
                                <td class='p-1'>{{$sr->grade->grade}}</td>
                                <td class='p-1'>{{$sr->subject->subject_name}}</td>
                                <td class='p-1'>{{$sr->score}}</td>


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

        $('#student_results').DataTable();
    });
    </script>

    @endsection
