<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Quản lý Tour</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('tours.index')); ?>">Tours</a></li>
                            <li class="breadcrumb-item active"><a href="<?php echo e(route('tours.create')); ?>">Create</a></li>
                        </ol>
                    </div>

                </div>
            </div>
            <div class="card">
                <h3 class="card-header border-0 fs-5">Thêm chuyến du lịch</h3>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('tours.store')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-4">
                                <label for="date-field" class="form-label">Tiêu đề
                                </label>

                                <input type="text" value="<?php echo e(old('title')); ?>" name="title" id=""
                                    class="form-control" placeholder="Nhập tiêu dề">
                                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger fw-light "><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-4">
                                <label for="date-field" class="form-label">Giá
                                </label>
                                <input type="text" value="<?php echo e(old('price')); ?>" name="price" id="price"
                                    class="form-control" placeholder="Nhập giá">
                                <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger fw-light "><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-4">
                                <label for="date-field" class="form-label">Giá khuyến mại
                                </label>

                                <input type="text" value="<?php echo e(old('promotion')); ?>" name="promotion"
                                    placeholder="Nhập giá khuyến mại" id="promotion" class="form-control">
                                <?php $__errorArgs = ['promotion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger fw-light "><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group col-md-4">
                                <label for="date-field" class="form-label">Tỉnh/Thành phố
                                </label>

                                <select class="js-example-basic-single form-control" name="province_id" id="province_id">
                                    <option value="">-- Chọn --</option>
                                    <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($province->id); ?>"><?php echo e($province->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['province_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger fw-light "><i><?php echo e($message); ?></i></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="date-field" class="form-label">Quận/Huyện
                                </label>
                                <select name="district_id" id="district_id" class="form-control js-example-basic-single">
                                    <option value="">-- Chọn thành phố trước --</option>
                                </select>
                                <?php $__errorArgs = ['district_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger fw-light "><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="date-field" class="form-label">Xã/Phường
                                </label>

                                <select name="ward_id" id="ward_id" class="form-control js-example-basic-single">
                                    <option value="">-- Chọn quận/huyện trước --</option>

                                </select>
                                <?php $__errorArgs = ['ward_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger fw-light "><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                        </div>


                        <div class="row mt-3">
                            <div class="col-4">
                                <label for="date-field" class="form-label">Số ngày
                                </label>
                                <input type="number" value="<?php echo e(old('day')); ?>" class="form-control" name="day"
                                    id="day" id="day">
                                <?php $__errorArgs = ['day'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger fw-light "><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="date-field" class="form-label">Kiểu du lịch
                                </label>
                                <select class="js-example-basic-single form-control" name="type_id" id="">
                                    <option value="">-- Chọn --</option>

                                    <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($type->id); ?>"><?php echo e($type->name_type); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['province_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger fw-light "><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-4">
                                <label for="date-field" class="form-label">Thuộc tính
                                </label>
                                <select name="attributes[]" multiple="multiple" class="js-example-basic-multiple"
                                    id="" class="form-control">
                                    <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($attribute->id); ?>"><?php echo e($attribute->attribute); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['attributes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger fw-light "><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>


                        </div>
                        <div class="row mt-2" id="itine">
                            <h2>Lịch trình</h2>
                            <div id="itineraries">

                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="customername-field" class="form-label">
                                            Ảnh </label>
                                        <input type="file" class="form-control" id="fileUpload" name="images[]"
                                            placeholder="Enter Name" multiple>
                                    </div>
                                    <?php $__errorArgs = ['images'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger fw-light "><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                            </div>
                            <div class="col-4">
                                <label for="date-field" class="form-label">Khách sạn
                                </label>
                                <select name="hotels[]" multiple="multiple" class="js-example-basic-multiple"
                                    id="hotels" class="form-control">
                                </select>
                                <?php $__errorArgs = ['hotels'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger fw-light "><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-4">
                                <label for="date-field" class="form-label">Kích hoạt
                                </label>
                                <div class="form-check form-switch">

                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                        name="is_active" checked value="1" id="is_active">
                                </div>

                            </div>
                            <div id="preview-container" class="d-flex flex-wrap mt-3 gap-3"></div>

                        </div>
                        <div class="row mt-3">
                            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger fw-light "><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0">Mô tả</h4>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <textarea name="description" class="ckeditor-classic"><?php echo e(old('description')); ?></textarea>
                                    </div><!-- end card-body -->
                                </div><!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>


                        <button type="submit" id="" class="btn btn-primary my-3" href="#"
                            role="button">Thêm</button>

                    </form>
                </div>

            </div>
        </div>

    </div>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('#price').on('blur', function() {
                const value = this.value.replace(/[^0-9]/g, "");
                this.value = parseFloat(value).toLocaleString('vi-VN');
                if (value == "") {
                    this.value = "";
                }
            });
            $('#promotion').on('blur', function() {
                const value = this.value.replace(/[^0-9]/g, "");
                this.value = parseFloat(value).toLocaleString('vi-VN');
                if (value == "") {
                    this.value = "";
                }
            });
            $('#itine').hide();
            $('#day').on('change', function() {
                $('#itine').show();
                // $('#itineraries').html('');
                var currentInputs = $('#itineraries').children('.child').length;
                let days = $(this).val();
                if (currentInputs > days) {
                    $('#itineraries').children('.child:gt(' + (days - 1) + ')').remove();
                } else {
                    for (let i = currentInputs + 1; i <= days; i++) {
                        let html = `
                <div class="child mt-2" id="div${i}">
                    <label for="">Ngày ${i}</label>
                    <div class="row" >
                        <div class="col-md-4">
                            <label for="basiInput" class="form-label">Tiêu đề</label>
                            <input type="text" class="form-control itinerary" id="title" name="title_itineraries[]">
                          
                            </div>    
                        <div class="col-md-8">
                            <label for="basiInput" class="form-label">Lịch trình cụ thể</label>
                            <textarea name="itineraries[]" class="ckeditor-classic-2"></textarea>
                            
                        </div>                      
                    </div>
                </div>`;
                        $('#itineraries').append(html);

                    }
                    $('.ckeditor-classic-2').each(function() {
                        ClassicEditor
                            .create(this)
                            .catch(error => {
                                console.error(error);
                            });
                    });
                }
            })

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
                        $.each(data, function(key, value) {
                            $('#district_id').append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
                $.ajax({
                    url: '/get-hotels/' + provinceId,
                    type: 'GET',
                    success: function(data) {
                        $('#hotels').empty();
                        $.each(data, function(key, value) {
                            $('#hotels').append('<option value="' + value.id +
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
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Desktop\laragon\www\DEAH-Booking\resources\views/admin/tours/create.blade.php ENDPATH**/ ?>