<?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="auth-page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center mt-sm-5 mb-4 text-white-50">
                    <div>
                        <img width="150" height="150" src="<?php echo e(url('assets/images/logonew-nobg.png')); ?> " alt=""
                            height="20">
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card mt-2">

                    <div class="card-body p-4">

                        <div class="p-2 mt-4">
                            <form class="needs-validation" novalidate action="<?php echo e(route('auth.login')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="mb-3">
                                    <label for="useremail" class="form-label">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="useremail" name="email"
                                        placeholder="Enter email address" required>
                                    <div class="invalid-feedback">
                                        Please enter email
                                    </div>
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><i><?php echo e($message); ?></i></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="password-input">Password<span
                                            class="text-danger">*</span></label>
                                    <div class="position-relative auth-pass-inputgroup">
                                        <input type="password" class="form-control pe-5 password-input" name="password"
                                            onpaste="return false" placeholder="Enter password" id="password-input"
                                            aria-describedby="passwordInput"
                                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                        <button
                                            class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                            type="button" id="password-addon"><i
                                                class="ri-eye-fill align-middle"></i></button>
                                        <div class="invalid-feedback">
                                            Please enter password
                                        </div>
                                    </div>
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><i><?php echo e($message); ?></i></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>



                                <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                                    <h5 class="fs-13">Password must contain:</h5>
                                    <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characters</b></p>
                                    <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b> letter (a-z)</p>
                                    <p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter (A-Z)
                                    </p>
                                    <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>
                                </div>

                                <div class="mt-4">
                                    <button class="btn btn-success w-100" type="submit">Sign Up</button>
                                </div>

                                
                            </form>

                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<?php echo $__env->make('admin.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH D:\DATN\resources\views/auth/login.blade.php ENDPATH**/ ?>