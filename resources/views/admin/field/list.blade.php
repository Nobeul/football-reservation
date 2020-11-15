@extends('admin.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title title-style"><u>User List</u></h3>
        <a href="{{ route('field.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus"></i> New Field</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="user-image">Field Pic</th>
                    <th>Field Name</th>
                    <th>Location</th>
                    <th class="action">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($fields as $field)
                <tr>
                    <td>
                        <a href="{{ route('field.details', $field->id) }}">
                            <image src="{{ asset('dist/img/avatar5.png') }}" class="profile-image" />
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('field.details', $field->id) }}" class="link">
                            {{ $field->name }}
                        </a>
                        <br/>
                        <a type="button" class="btn edit-button" href="{{ route('slot.list', $field->id) }}"><i class="fas fa-info-circle"></i></a>
                    </td>
                    <td>{{ $field->country->name }}</td>
                    <td>
                        <a type="button" class="btn edit-button" href="{{ route('field.edit', $field->id) }}"><i class="fas fa-edit edit-icon"></i></a>
                        <form action="{{ route('field.delete', $field->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn delete-button"><i class="fas fa-trash-alt delete-icon"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection