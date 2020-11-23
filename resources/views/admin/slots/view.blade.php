@extends('admin.master')

@section('content')
<div class="card">
    <div class="row">
        <div class="col-md-7">
            <h4 id="slot-view"></h4>
            <div class="gateway--paypal">
                <form method="POST" action="{{ route('reservation.store') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="reserved_seat" id="reserved_seat">
                    <input type="hidden" name="field_id" value="{{ $field }}">
                    <input type="hidden" name="amount" id="reservation-total-amount">
                    <button class="btn btn-info" id="paypal-btn" style="margin: 0 0 10% 20px">
                        <i class="fa fa-paypal" aria-hidden="true"></i> Pay with PayPal
                    </button>
                </form>
            </div>
        </div>
        <div class="col-md-5" style="margin-top: 20px;">
            <articale><i class="fas fa-chair seat-preview-1" style="color:red"></i> </articale> <span style="padding-right:10px">= Reserved Seats</span>
            <articale><i class="fas fa-chair seat-preview-2" style="color:grey"></i> </articale><span style="padding-right:10px">= Available Seats</span>
            <articale><i class="fas fa-chair seat-preview-2" style="color:green"></i> </articale><span>= Selected Seats</span><br/><br/>
            <p>Per Seat Price = ${{ $seatPrice }}</p>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered" style="width: 90%; margin-top: 10px">
                        <thead>
                            <tr>
                                <th class="text-center">Seat Number</th>
                                <th class="text-center">Fare</th>
                            </tr>
                        </thead>
                        <tbody id="seat-table">
                            
                        </tbody>
                    </table>
                    <h4>Total: <span id="total-price"></span></h4>
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
    var seatPrice = "{{ $seatPrice }}";

    $('#total-price').text('0');

    for (var i = 1; i <= totalSeat; i++) {
        var html = '<a href="#"><i class="fas fa-chair seat" style="padding: 20px; color: grey" id="seat-' + i + '"></i></a>';
        $('#slot-view').append(html);
        if (i % 10 == 0) {
            $('#slot-view').append('</br>');
        }
    }

    var totalPrice = 0;
    var seatArray = [];
    $('.seat').on('click', function() {
        var seatId = $(this).attr('id');
        seatId = parseInt(seatId.slice(5, 7));
        totalPrice = parseInt($('#total-price').text());

        var html = '';
        html = '<tr  class="text-center" id="s-' + seatId + '">';
        html += '<td> Seat-'+seatId+'</td>';
        html += '<td id="seat-price">' + seatPrice + '</td>';
        html += '</tr>';

        if ($.inArray(seatId, reservedSeats) == -1) {
            if ($.inArray(seatId, seatArray) == -1) {
                $('#seat-' + seatId).css('color', 'green');
                seatArray.push(seatId);

                $('#seat-table').append(html);
                totalPrice = totalPrice + parseInt($('#seat-price').text());
                $('#total-price').text(totalPrice);
                
            } else {
                for (var i = 0; i < seatArray.length; i++) {
                    if (seatArray[i] == seatId) {
                        seatArray.splice(i, 1);
                        $('#s-'+ seatId).remove();
                        totalPrice = totalPrice - parseInt($('#seat-price').text());
                        if (isNaN(totalPrice)) {
                            totalPrice = 0;
                        }
                        $('#total-price').text(totalPrice);
                    }
                }
                $('#seat-' + seatId).css('color', 'grey');
            }
        }
    });

    $.each(reservedSeats, function(key, value) {
        $('#seat-' + value).css('color', 'red');
        $('#seat-' + value).on('click', function() {
            alert('This seat is taken');
        });
    });

    $("#paypal-btn").on('click', function(e) {
        var amount = parseFloat($("#total-price").text());
        if (amount == 0) {
            alert('Please select any seat first!');
            e.preventDefault();
        } else {
            $('#reserved_seat').val(seatArray);
            $('#reservation-total-amount').val(amount);
        }
    });
</script>
@endsection