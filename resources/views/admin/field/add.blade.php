@extends('admin.master')

@section('content')
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card card-info">
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" id="field-edit" method="post" action="{{ route('field.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-6">
                            <image src="{{ asset('dist/img/avatar5.png') }}" class="view-profile-image" id="profile-image" />
                        </div>
                    </div>
                    <div class="custom-file mb-4">
                        <input type="file" class="custom-file-input" name="profile_image" id="input-image">
                        <label class="custom-file-label" for="customFile" id="profile-image-name"></label>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label require">Field Name
                            <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="field_name" placeholder="Field Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Country
                            <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-10">
                            <Select class="form-control" name="country_id">
                                @foreach($countries as $country)
                                <option value="{{ $country['id'] }}">{{ $country['name'] }}</option>
                                @endforeach
                            </Select>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Submit</button>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script>
    $("#user-edit").validate({
        rules: {
            first_name: {
                required: true,
            },
            last_name: {
                required: true,
            },
            email: {
                required: true,
                email: email,
            },
            country: {
                required: true,
            },
            state: {
                required: true,
            },
            city: {
                required: true,
            },
            status: {
                required: true,
            },
            gender: {
                required: true,
            },
            password: {
                required: true,
            },
            confirm_password: {
                required: true,
            }
        }
    });

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
    $('#input-image').on('change', function(e) {
        var fileName = e.target.files[0].name;
        $('#profile-image-name').text(fileName);
    });
</script>
@endsection