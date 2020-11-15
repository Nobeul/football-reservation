@extends('admin.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title title-style"><u>Slot List</u></h3>
        <a href="{{ route('slot.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus"></i> New Slot</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Sl No</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Total Seat</th>
                    <th>Seat Price</th>
                    <th class="action">Action</th>
                </tr>
            </thead>
            <tbody>
            @php 
            $i = 0;
            @endphp
                @foreach($slots as $slot)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>
                        <a href="{{ route('slot.details', $slot->id) }}" class="link">
                            {{ $slot->start_time }}
                        </a>
                    </td>
                    <td>{{ $slot->end_time }}</td>
                    <td>{{ $slot->total_seat }}</td>
                    <td>{{ $slot->seat_price }}</td>
                    <td>
                        <a type="button" class="btn edit-button" href="{{ route('slot.list', $slot->id) }}"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection