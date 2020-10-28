@section('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endsection

@extends('admin.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title title-style"><u>User List</u></h3>
        <a href="{{ route('user.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus"></i> New User</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="user-image">Image</th>
                    <th>User Name</th>
                    <th>Location</th>
                    <th class="text-center">Status</th>
                    <th class="action">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                        <td>
                            <a href="{{ route('user.details', $user->id) }}">
                                @if($user->gender == 'male')
                                    <image src="{{ asset('dist/img/avatar5.png') }}" class="profile-image"/>
                                @else
                                    <image src="{{ asset('dist/img/avatar2.png') }}" class="profile-image"/>
                                @endif
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('user.details', $user->id) }}" class="link">
                                {{ $user->first_name }} {{ $user->last_name }}
                            </a>
                        </td>
                        <td>{{ $user->country->name }}</td>
                        <td>
                            <div class="{{ $user->is_active ? 'active-status' : 'inactive-status' }} text-center">
                                {{ $user->is_active ? 'Active' : 'Inactive' }}
                            </div>
                        </td>
                        <td>
                            <a type="button" class="btn edit-button" href="{{ route('user.edit', $user->id) }}"><i class="fas fa-edit edit-icon"></i></a>
                            <button type="submit" class="btn delete-button"><i class="fas fa-trash-alt delete-icon"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection

@section('scripts')
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
@endsection