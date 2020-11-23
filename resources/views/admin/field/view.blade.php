@extends('admin.master')

@section('content')
<div class="row">
    <div class="col-md-12 ml-40p">
        <image src="{{ asset('dist/img/avatar2.png') }}" class="view-profile-image" />
    </div>
</div>
<div class="row mt-5">
    <div class="col-md-4 text-right font-weight-bold">
        Field Name:
    </div>
    <div class="col-md-8">
        {{ $field->name }}
    </div>
</div>
<div class="row">
    <div class="col-md-4 text-right font-weight-bold">
        Location:
    </div>
    <div class="col-md-8">
        {{ $field->country->name }}
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