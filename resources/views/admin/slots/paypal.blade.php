@extends('admin.master')

@section('content')
<div class="container">
  <div class="gateway--info">
      <div class="gateway--desc">
          @if(session()->has('message'))
              <p class="message">
                  {{ session('message') }}
              </p>
          @endif
          <div class="row">
              <div class="col">
                  <img src="{{ asset('dist/img/paypal/paypal.png') }}" width="50px" class="img-responsive gateway__img">
              </div>
          </div>
          <p><strong>Order Overview !</strong></p>
          <hr>
          <p>Item : Ticket payment with PayPal !</p>
          <p id="total-amount">Amount : ${{ $order->amount }}
            </p>
            <hr>
        </div>
        <div class="gateway--paypal">
            <form method="POST" action="{{ route('checkout.payment.paypal', $order->id) }}">
                {{ csrf_field() }}
                <input type="hidden" name="amount" id="amount">
                <button class="btn btn-primary">
                    <i class="fa fa-paypal" aria-hidden="true"></i> Pay with PayPal
                </button>
            </form>
      </div>
  </div>
</div>

@endsection
@section('scripts')
    <script>
        var amount = $('#total-amount').text();
        amount = parseFloat(amount.slice(10));
        $('#amount').val(amount);
    </script>
@endsection