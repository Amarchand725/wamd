<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.layout-dashboard','data' => ['title' => 'Roles']]); ?>
<?php $component->withName('layout-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Roles']); ?>
    <input type="hidden" id="page_url" value="<?php echo e(route('role.index')); ?>">
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
                                <h5>List Roles</h5>
                                <div class="row">
                                    <div class="col-md-10">
                                        <input type="text" name="search" id="search" class="form-control" placeholder="Search">
                                        <input type="hidden" name="status" id="status" value="All">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-primary" style="padding: 10px 20px;" data-bs-toggle="modal" data-bs-target="#add-role-modal"><i class="material-icons">add</i>Add Role</button>
                                    </div>
                                </div>
                                <table class="table table-striped">
                                    <thead>
                                        <th>SN#</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody id="body">
                                        <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="id-<?php echo e($model->id); ?>">
                                                <td><?php echo e($models->firstItem()+$key); ?>.</td>
                                                <td><?php echo e($model->role); ?></td>
                                                <td>
                                                    <?php if($model->status): ?>
                                                        <span class="label label-info">Active</span>
                                                    <?php else: ?>
                                                        <span class="label label-info">In-active</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td width="250px">
                                                    <button type="button" data-toggle="tooltip" data-placement="top" title="Edit Role" class="btn btn-primary btn-xs edit-btn" data-url="<?php echo e(route('role.edit', $model->id)); ?>"><i class="fa fa-edit"></i> Edit</button>
                                                    <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($model->id); ?>" data-del-url="<?php echo e(route('role.destroy', $model->id)); ?>"><i class="fa fa-trash"></i> Delete</button>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td colspan="9">
                                                Displying <?php echo e($models->firstItem()); ?> to <?php echo e($models->lastItem()); ?> of <?php echo e($models->total()); ?> records
                                                <div class="d-flex justify-content-center">
                                                    <?php echo $models->links('pagination::bootstrap-4'); ?>

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
    <div class="modal fade" id="add-role-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="SubmitForm">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="role" class="form-label">Role</label>
                                <input type="text" name="role" class="form-control" id="role" placeholder="Enter user name" >
                                <span id="error-role_name" style="color: red"></span>
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

    <div class="modal fade" id="edit-role-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="EditForm">
                    <div class="modal-body" id="edit-modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" data-url="<?php echo e(route('role.update', $model->id)); ?>" name="submit" class="btn btn-primary edit-form">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        $(document).on('click', '.edit-btn', function(){
            var url = $(this).attr('data-url');
            let role = $('.role-name').val('');
            let status = $('#role_status').val('');
            $.ajax({
                url: url,
                type:"GET",
                success:function(response){
                    $('#edit-modal-body').html(response);
                    $('#edit-role-modal').modal('show');  
                },
            });
        });

        $('#EditForm').on('submit',function(e){
            e.preventDefault();
            var url = $('#update-url').val();
            let role = $('.role-name').val();
            let status = $('#role_status').val();
            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                type:"PATCH",
                data:{
                    role : role,
                    status : status,
                },
                
                success:function(response){
                    if(response=='success'){
                        $('.role-name').val('');
                        $('#edit-role-modal').hide();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Role has updated successfully.',
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
                    $('#edit-error-role_name').text(response.responseJSON.errors.role);
                },
            });
        });

        $('#SubmitForm').on('submit',function(e){
            e.preventDefault();
            let role = $('#role').val();
            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "<?php echo e(route('role.store')); ?>",
                type:"POST",
                data:{
                    role : role,
                },
                
                success:function(response){
                    if(response=='success'){
                        $('#role').val('');
                        $('#add-role-modal').hide();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Role has added successfully.',
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
                    $('#error-role_name').text(response.responseJSON.errors.role);
                },
            });
        });
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\wamd\resources\views/admin/role/index.blade.php ENDPATH**/ ?>