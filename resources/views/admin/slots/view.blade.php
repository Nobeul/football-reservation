@extends('admin.master')

@section('content')
<div class="card">
    <div class="row">
        <div class="col-md-7">
            <h4 id="slot-view"></h4>
            <a href="" class="btn btn-info" style="margin: 0 0 30px 20px">Continue</a>
        </div>
        <div class="col-md-5" style="margin-top: 20px;">
            <articale><i class="fas fa-chair seat-preview-1" style="color:red"></i> </articale> <span>= Reserved Seats</span>
            <articale><i class="fas fa-chair seat-preview-2" style="color:grey"></i> </articale><span>= Available Seats</span>
            <articale><i class="fas fa-chair seat-preview-2" style="color:green"></i> </articale><span>= Selected Seats</span>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered" style="width: 90%; margin-top: 20px">
                        <thead>
                            <tr>
                                <th class="text-center">Seat Number</th>
                                <th class="text-center">Fare</th>
                            </tr>
                        </thead>
                        <tbody id="seat-table">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var totalSeat = "{{ $totalSeat }}";
    var reservedSeats = <?php echo json_encode($reservedSeats); ?>;

    for (var i = 1; i <= totalSeat; i++) {
        var html = '<i class="fas fa-chair seat" style="padding: 20px; color: grey" id="seat-' + i + '"></i>';
        $('#slot-view').append(html);
        if (i % 10 == 0) {
            $('#slot-view').append('</br>');
        }
    }

    var seatArray = [];
    $('.seat').on('click', function() {
        var seatId = $(this).attr('id');
        seatId = seatId.slice(5, 7);

        var html = '';
        html = '<tr  class="text-center" id="s-' + seatId + '">';
        html += '<td> Seat-'+seatId+'</td>';
        html += '<td>250</td>';
        html += '</tr>';

        if ($.inArray(seatId, reservedSeats) == -1) {
            if ($.inArray(seatId, seatArray) == -1) {
                $('#seat-' + seatId).css('color', 'green');
                seatArray.push(seatId);

                $('#seat-table').append(html);
                
            } else {
                for (var i = 0; i < seatArray.length; i++) {
                    if (seatArray[i] == seatId) {
                        seatArray.splice(i, 1);
                        $('#s-'+ seatId).remove();
                    }
                }
                $('#seat-' + seatId).css('color', 'grey');
            }
        }
        console.log(seatArray);
    });

    $.each(reservedSeats, function(key, value) {
        $('#seat-' + value).css('color', 'red');
        $('#seat-' + value).on('click', function() {
            alert('This seat is taken');
        });
    });
</script>
@endsection