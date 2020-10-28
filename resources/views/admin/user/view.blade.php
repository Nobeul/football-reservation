@extends('admin.master')

@section('content')
<div class="row">
    <div class="col-md-12 ml-40p">
        @if($user->gender == 'male')
        <image src="{{ asset('dist/img/avatar5.png') }}" class="view-profile-image" />
        @else
        <image src="{{ asset('dist/img/avatar2.png') }}" class="view-profile-image" />
        @endif
    </div>
</div>
<div class="row mt-5">
    <div class="col-md-4 text-right font-weight-bold">
        User Name:
    </div>
    <div class="col-md-8">
        {{ $user->first_name }} {{ $user->last_name }}
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-4 text-right font-weight-bold">
        Email Address:
    </div>
    <div class="col-md-8">
        {{ $user->email }}
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-4 text-right font-weight-bold">
        Country:
    </div>
    <div class="col-md-8">
        {{ $user->country->name }}
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-4 text-right font-weight-bold">
        Mobile Number:
    </div>
    <div class="col-md-8">
        @if($user->mobile != Null)
        {{ $user->mobile }}
        @else
        {{ 'No mobile number found' }}
        @endif
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-4 text-right font-weight-bold">
        User Status:
    </div>
    <div class="col-md-8">
        {{ $user->is_active == 1 ? 'Active' : 'Inactive' }}
    </div>
</div>
@endsection

@section('scripts')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#profile-image').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#input-image").change(function() {
        readURL(this);
    });
</script>
@endsection