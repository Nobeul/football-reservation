@extends('admin.master')

@section('content')
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card card-info">
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" id="user-add" method="post" action="{{ route('user.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-6">
                            <img src="{{ asset('dist/img/avatar5.png') }}" class="view-profile-image" id="profile-image" />
                        </div>
                    </div>
                    <div class="custom-file mb-4">
                        <input type="file" class="custom-file-input" name="profile_image" id="input-image">
                        <label class="custom-file-label" for="customFile" id="profile-image-name"></label>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label require">First Name
                            <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label require">Last Name
                            <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email
                            <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
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
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">City
                            <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-10">
                            <Select class="form-control" name="city_id">
                                @foreach($cities as $city)
                                <option value="{{ $city['id'] }}">{{ $city['name'] }}</option>
                                @endforeach
                            </Select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mobile</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile Number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Role
                            <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-10">
                            <Select class="form-control" name="role_id">
                                @foreach($roles as $role)
                                <option value="{{ $role['id'] }}">{{ $role['name'] }}</option>
                                @endforeach
                            </Select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Status
                            <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-10">
                            <Select class="form-control" name="is_active">
                                <option value="0">{{ 'Inactive' }}</option>
                                <option value="1">{{ 'Active' }}</option>
                            </Select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Gender
                            <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-10">
                            <Select class="form-control" name="gender" id="gender">
                                <option value="male">{{ 'Male' }}</option>
                                <option value="female">{{ 'Female' }}</option>
                            </Select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
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
    var SITE_URL = "{{ URL::to('/') }}";
    $("#user-add").validate({
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
            city: {
                required: true,
            },
            status: {
                required: true,
            },
            gender: {
                required: true,
            }
        }
    });
    $('#profile-image').css('display','none');
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
        $('#profile-image').css('display','block');

    });
</script>
@endsection