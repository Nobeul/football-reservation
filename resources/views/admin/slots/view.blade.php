@extends('admin.master')

@section('content')
<div class="card">
    <div class="col-md-12">
        <h4 id="slot-view"></h4>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var totalSeat = "{{ $totalSeat }}";
    var reservedSeats = <?php echo json_encode($reservedSeats); ?>;

    for(var i = 1; i <= totalSeat; i++) {
        var html = '<i class="fas fa-chair seat" style="padding: 20px" id="seat-'+i+'"></i>';
        $('#slot-view').append(html);
        if( i % 10 == 0) {
            $('#slot-view').append('</br>');
        }
    }
    
    var seatArray = [];
    $('.seat').on('click', function() {
        var seatId = $(this).attr('id');
        seatId = seatId.slice(5, 7);
        if ($.inArray(seatId, reservedSeats) == -1) {
            if ($.inArray(seatId, seatArray) == -1) {
                $('#seat-'+seatId).css('color','green');
                seatArray.push(seatId);
            } else {
                for(var i = 0; i < seatArray.length; i++) {
                    if(seatArray[i] == seatId) {
                        seatArray.splice(i, 1);
                    }
                }
                $('#seat-'+seatId).css('color','black');
            }
        }
        console.log(seatArray);
    });

    $.each(reservedSeats, function(key, value){
        $('#seat-'+value).css('color','red');
        $('#seat-'+value).on('click', function() {
            alert('This seat is taken');
        });
    });
</script>
@endsection