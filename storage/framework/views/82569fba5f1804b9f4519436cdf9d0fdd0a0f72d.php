<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.layout-dashboard','data' => ['title' => 'Users']]); ?>
<?php $component->withName('layout-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Users']); ?>

    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
               
                <?php if(session()->has('alert')): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.alert','data' => []]); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                        <?php $__env->slot('type',session('alert')['type']); ?>
                        <?php $__env->slot('msg',session('alert')['msg']); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php endif; ?>
             <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h5>List Users</h5>
                                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#add-user-modal"><i class="material-icons">add</i>Add Users</button>
                                <table class="table table-striped">
                                    <thead>
                                        <th>SN#</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th>Expired</th>
                                        <th>Limit Device</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="id-<?php echo e($user->id); ?>">
                                                <td><?php echo e($users->firstItem()+$key); ?>.</td>
                                                <td><?php echo e($user->username); ?></td>
                                                <td><?php echo e(isset($user->hasRole)?$user->hasRole->role:'N/A'); ?></td>
                                                <td>
                                                    <?php if(!empty($user->expired_date)): ?>
                                                        <span class="label label-info"><?php echo e(date('d, F-Y', strtotime($user->expired_date))); ?></span>
                                                    <?php else: ?>
                                                        <span class="label label-info">Life Time</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e($user->device_limit); ?></td>
                                                <td width="250px">
                                                    <button type="button" data-toggle="tooltip" data-placement="top" title="Edit User" class="btn btn-primary btn-xs edit-btn" data-url="<?php echo e(route('user.edit', $user->id)); ?>"><i class="fa fa-edit"></i> Edit</button>
                                                    <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($user->id); ?>" data-del-url="<?php echo e(route('user.destroy', $user->id)); ?>"><i class="fa fa-trash"></i> Delete</button>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td colspan="9">
                                                Displying <?php echo e($users->firstItem()); ?> to <?php echo e($users->lastItem()); ?> of <?php echo e($users->total()); ?> records
                                                <div class="d-flex justify-content-center">
                                                    <?php echo $users->links('pagination::bootstrap-4'); ?>

                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="add-user-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="SubmitForm">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="username" class="form-label">User name</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="Enter user name" >
                                <span id="error-user_name" style="color: red"></span>
                            </div>
                            <div class="col-sm-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password ..." >
                                <span id="error-password" style="color: red"></span>
                            </div>
                            <div class="col-sm-12">
                                <span id="expired-date">
                                    <label for="expired_date" class="form-label">Expired</label>
                                    <input type="date" name="expired_date" class="form-control" id="expired_date" >
                                </span>
                                <div class="form-check">
                                    <input type="checkbox" name="life_time" value="1" class="form-check-input" id="life-time">
                                    <label class="form-check-label" for="life-time">Life Time.</label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="role-id" class="form-label">Role</label>
                                <select name="role_id" id="role-id" class="form-control">
                                    <option value="" selected>Select Role</option>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($role->id); ?>"><?php echo e($role->role); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <span id="error-role_id" style="color: red"></span>
                            </div>
                            <div class="col-sm-12">
                                <label for="device_limit" class="form-label">Limit Device scan QR can create at dashboard</label>
                                <input type="number" name="device_limit" class="form-control" id="device_limit" placeholder="Enter devices limit">
                                <span id="error-device_limit" style="color: red"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit"  name="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit-user-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="EditForm">
                    <div class="modal-body" id="edit-modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" data-url="<?php echo e(route('user.update', $user->id)); ?>" name="submit" class="btn btn-primary edit-form">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        $(document).on('click', '.edit-btn', function(){
            var url = $(this).attr('data-url');
            $.ajax({
                url: url,
                type:"GET",
                success:function(response){
                    $('#edit-modal-body').html(response);
                    $('#edit-user-modal').modal('show');  
                },
            });
        });

        $('#EditForm').on('submit',function(e){
            e.preventDefault();
            var url = $('#update-url').val();
            let lif_time = $(".life-time:checked").val() ? $(".life-time:checked").val() : '';
            let expired_date = $('.expired_date').val();
            let device_limit = $('.device_limit').val();
            let role_id = $('.role-id').val();
            let password = $('.password').val();
            let username = $('.username').val();
            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                type:"PATCH",
                data:{
                    lif_time : lif_time,
                    expired_date : expired_date,
                    device_limit : device_limit,
                    role_id : role_id,
                    password : password,
                    username : username,
                },
                
                success:function(response){
                    if(response=='success'){
                        $(".life-time").prop("checked", false);
                        $('.expired_date').val('');
                        $('.device_limit').val('');
                        $('.role-id').val('');
                        $('.password').val('');
                        $('.username').val('');
                        $('.add-user-modal').hide();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'User has updated successfully.',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        location.reload();
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong try again.',
                        })
                    }
                },
                error: function(response) {
                    $('#error-user_name').text(response.responseJSON.errors.username);
                    $('#error-password').text(response.responseJSON.errors.password);
                    $('#error-role_id').text(response.responseJSON.errors.role_id);
                    $('#error-device_limit').text(response.responseJSON.errors.device_limit);
                },
            });
        });

        $('#SubmitForm').on('submit',function(e){
            e.preventDefault();
            let lif_time = $("#life-time:checked").val() ? $("#life-time:checked").val() : '';
            let expired_date = $('#expired_date').val();
            let device_limit = $('#device_limit').val();
            let role_id = $('#role-id').val();
            let password = $('#password').val();
            let username = $('#username').val();
            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "<?php echo e(route('user.store')); ?>",
                type:"POST",
                data:{
                    lif_time : lif_time,
                    expired_date : expired_date,
                    device_limit : device_limit,
                    role_id : role_id,
                    password : password,
                    username : username,
                },
                
                success:function(response){
                    if(response=='success'){
                        $("#life-time").prop("checked", false);
                        $('#expired_date').val('');
                        $('#device_limit').val('');
                        $('#role-id').val('');
                        $('#password').val('');
                        $('#username').val('');
                        $('#add-user-modal').hide();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'User has registered successfully.',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        location.reload();
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong try again.',
                        })
                    }
                },
                error: function(response) {
                    $('#error-user_name').text(response.responseJSON.errors.username);
                    $('#error-password').text(response.responseJSON.errors.password);
                    $('#error-role_id').text(response.responseJSON.errors.role_id);
                    $('#error-device_limit').text(response.responseJSON.errors.device_limit);
                },
            });
        });

        $(document).on('change', '#life-time', function() {
            var checkbox = $(this), // Selected or current checkbox
            value = checkbox.val(); // Value of checkbox

            if (checkbox.is(':checked'))
            {
                $("#expired-date").hide();
            }else
            {
                $("#expired-date").show();
            }
        });

        $(document).on('change', '.life-time', function() {
            var checkbox = $(this), // Selected or current checkbox
            value = checkbox.val(); // Value of checkbox

            if (checkbox.is(':checked'))
            {
                $(".expired-date").hide();
            }else
            {
                $(".expired-date").show();
            }
        });
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\wamd\resources\views/admin/user/index.blade.php ENDPATH**/ ?>