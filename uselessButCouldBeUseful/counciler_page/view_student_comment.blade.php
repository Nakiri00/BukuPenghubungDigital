@extends('counciler_page.app')
@section('content')
<div class="col-md-12">
    <div class="card text-left col-md-12">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h2>All students </h2>
                {{-- @can('customer create') --}}

                <div class="ml-auto">


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
                            <th class="m-1 b-1">Student Name</th>
                            <th class="m-1 b-1">Teacher Name</th>
                            <th class="m-1 b-1">comments</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($comments as $student) 
                        <tr>
                            <td class='p-1'>{{$loop->index+1}}</td>
                            <td class='p-1'>{{$student->user->name ?? ''}}</td>
                            <td class='p-1'>{{$student ?? '' }}</td>
                            <td class='p-1'>{{$student->comment}}</td>


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
