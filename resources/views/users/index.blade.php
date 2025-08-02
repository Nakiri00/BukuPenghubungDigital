@extends('backend.app')

@section('content')
<div class="col-md-12">
    <div class="card text-left col-md-12">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h2>Data Seluruh Pengguna</h2>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="users">
                    <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Peran</th>
                            <th width="5%">Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->user_type->user_type }}</td>
                            <td>
                                <form action="{{ route('user.destroy', $user->id) }}" id="detach-form-{{ $user->id }}"
                                    method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="if(confirm('Are you sure to Delete this?')){
                                        event.preventDefault();
                                        document.getElementById('detach-form-{{ $user->id }}').submit();
                                    } else {
                                        event.preventDefault();
                                    }">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">No Data Available</td>
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
        $('#users').DataTable();
    });
</script>
@endsection
