@extends('admin.layout.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Hotels</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('hotels.index') }}">Hotels</a></li>
                            <li class="breadcrumb-item active"><a href="javascript: void(0);">Create</a></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <h1>{{ $title }}</h1>
        <form method="POST" action="{{ route('hotels.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-4">
                    <label for="date-field" class="form-label">Name
                    </label>

                    <input type="text" value="{{ old('name') }}" name="name" id="" class="form-control"
                        placeholder="Enter name">
                    @error('name')
                        <span class="text-danger fw-light "><i>{{ $message }}</i></span>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="date-field" class="form-label">Price
                    </label>
                    <input type="text" value="{{ old('price') }}" name="price" id="" class="form-control"
                        placeholder="Enter price">
                    @error('price')
                        <span class="text-danger fw-light "><i>{{ $message }}</i></span>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="date-field" class="form-label">Promotion
                    </label>

                    <input type="text" value="{{ old('promotion') }}" name="promotion"
                        placeholder="Enter promotion price" id="" class="form-control">
                    @error('promotion')
                        <span class="text-danger fw-light "><i>{{ $message }}</i></span>
                    @enderror
                </div>
            </div>
            <div class="row mt-3">
                <div class="form-group col-md-4">
                    <label for="date-field" class="form-label">Province
                    </label>
                    <select class="js-example-basic-single form-control" name="province_id" id="province_id">
                        <option value="">-- Choose --</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                        @endforeach
                    </select>
                    @error('province_id')
                        <span class="text-danger fw-light "><i>{{ $message }}</i></span>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label for="date-field" class="form-label">District
                    </label>
                    <select name="district_id" id="district_id" class="form-control js-example-basic-single">
                        <option value="">-- Select province first --</option>
                    </select>
                    @error('district_id')
                        <span class="text-danger fw-light "><i>{{ $message }}</i></span>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label for="date-field" class="form-label">Wards
                    </label>

                    <select name="ward_id" id="ward_id" class="form-control js-example-basic-single">
                        <option value="">-- Select district first --</option>

                    </select>
                    @error('ward_id')
                        <span class="text-danger fw-light "><i>{{ $message }}</i></span>
                    @enderror
                </div>

            </div>


            <div class="row mt-3">
                <div class="col-4">
                    <label for="date-field" class="form-label">Address
                    </label>
                    <input type="text" name="address" value="{{ old('address') }}" placeholder="Enter address"
                        id="" class="form-control">
                    @error('address')
                        <span class="text-danger fw-light "><i>{{ $message }}</i></span>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="date-field" class="form-label">Status
                    </label>
                    <div class="form-check form-switch">

                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="status" checked
                            value="1" id="status">
                    </div>

                </div>
                <div class="col-4">
                    <label for="date-field" class="form-label">Active
                    </label>
                    <div class="form-check form-switch">

                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="is_active" checked
                            value="1" id="active">
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="customername-field" class="form-label">
                                File</label>
                            <input type="file" class="form-control" id="fileUpload" name="images[]"
                                placeholder="Enter Name" multiple>
                            @error('images')
                                <span class="text-danger fw-light "><i>{{ $message }}</i></span>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="col-6">
                    <label for="date-field" class="form-label">Services
                    </label>
                    <select name="services[]" multiple="multiple" class="js-example-basic-multiple" id=""
                        class="form-control">
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}">{{ $service->service }}
                            </option>
                        @endforeach
                    </select>
                    @error('services')
                        <span class="text-danger fw-light "><i>{{ $message }}</i></span>
                    @enderror
                </div>
                <div id="preview-container" class="d-flex flex-wrap mt-3 gap-3"></div>

            </div>
            <div class="row mt-3">
                <div class="col-lg-12">
                    @error('description')
                        <span class="text-danger fw-light "><i>{{ $message }}</i></span>
                    @enderror
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0">Description</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <textarea name="description" class="ckeditor-classic">{{old('description')}}</textarea>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>


            <button type="submit" id="" class="btn btn-primary my-3" href="#"
                role="button">Submit</button>

        </form>
    </div>

@section('scripts')
    <script>
        $(document).ready(function() {
            $("#fileUpload").on("change", function() {
                let files = $(this)[0].files;
                $("#preview-container").empty();
                if (files.length > 0) {
                    for (let i = 0; i < files.length; i++) {
                        let reader = new FileReader();
                        reader.onload = function(e) {
                            $("<div class='preview'><img class='' width='150px' height='150px' src='" +
                                e.target
                                .result +
                                "'><i class='ri-delete-bin-3-line delete text-danger fs-2'></i></div>"
                            ).appendTo(
                                "#preview-container");
                        };
                        reader.readAsDataURL(files[i]);
                    }
                }
            });
            $("#preview-container").on("click", ".delete", function() {
                $(this).parent(".preview").remove();
                $('#fileUpload').val(''); // Clear input value if needed
            });
            $('#province_id').on('change', function() {
                var provinceId = $(this).val();
                console.log(provinceId);
                $.ajax({
                    url: '/get-districts/' + provinceId,
                    type: 'GET',
                    success: function(data) {
                        $('#district_id').empty();
                        $('#district_id').append('<option value="">Select District</option>');
                        $.each(data, function(key, value) {
                            $('#district_id').append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
            $('#district_id').on('change', function() {
                var districtId = $(this).val();
                $.ajax({
                    url: '/get-wards/' + districtId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#ward_id').empty();
                        $.each(data, function(key, value) {
                            $('#ward_id').append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });
                    }
                });

            });
        });
    </script>
@endsection
@endsection
