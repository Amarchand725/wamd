<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.layout-dashboard','data' => ['title' => 'Settings']]); ?>
<?php $component->withName('layout-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'Settings']); ?>
    <div class="app-content">
        <div class="content-wrapper">
            
            <div class="container-fluid">
                <div class="row">
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
                    <div class="col">
                        <div class="page-description page-description-tabbed">
                           

                            <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="account-tab" data-bs-toggle="tab" data-bs-target="#server" type="button" role="tab" aria-controls="hoaccountme" aria-selected="true">Server</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button" role="tab" aria-controls="security" aria-selected="false">Security</button>
                                </li>
                              
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="server" role="tabpanel" aria-labelledby="account-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6"> 
                                                <form action="<?php echo e(route('generateNewApiKey')); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">API Key</span>
            
                                                        <input type="text" class="form-control" value="<?php echo e(Auth::user()->api_key); ?>" aria-label="Username" aria-describedby="basic-addon1" readonly>
                                                        <button type="submit" name="api_key" class="btn btn-primary">Generate New</button>
                                                    </div>
                                                </form>  
                                            </div>

                                            <?php if(Auth::user()->role_id==1): ?>
                                                <div class="col-md-6">
                                                    <form action="<?php echo e(route('changeChunk')); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">Maximal Blast</span>
            
                                                        <input type="text" name="chunk" class="form-control" value="<?php echo e(Auth::user()->chunk_blast); ?>" aria-label="Username" aria-describedby="basic-addon1">
                                                        <button type="submit" name="changechunk" class="btn btn-primary">Save</button>
                                                    </div>
                                                    </form>
                                                </div>

                                        
                                                <div class="row m-t-lg">
                                                    <form action="<?php echo e(route('setServer')); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="col-md-6">
                                                        <label for="typeServer" class="form-label">Server Type</label>
                                                        <select name="typeServer" class="form-control" id="server" required>
                                                            <?php if(env('TYPE_SERVER') === 'localhost'): ?>
                                                                <option value="localhost" selected>Localhost</option>
                                                                <option value="hosting">Hosting Shared</option>
                                                                <option value="other">Other</option>
                                                            <?php elseif(env('TYPE_SERVER') === 'hosting'): ?>
                                                                <option value="localhost">Localhost</option>
                                                                <option value="hosting" selected>Hosting Shared</option>
                                                                <option value="other">Other</option>
                                                            <?php else: ?>
                                                                <option value="other" required>Other</option>
                                                                <option value="localhost">Localhost</option>
                                                                <option value="hosting">Hosting Shared</option>
                                                            <?php endif; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="Port" class="form-label">Port Node JS</label>
                                                        <input type="number" name="portnode" class="form-control" id="Port" value="<?php echo e(env('PORT_NODE')); ?>" required>
                                                    </div>
                                                </div>
                                                <div class="row m-t-lg <?php echo e(env('TYPE_SERVER') === 'other' ? 'd-block' : 'd-none'); ?> formUrlNode">
                                                    <div class="col-md-6">
                                                        <label for="settingsInputUserName " class="form-label">URL Node</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"  id="settingsInputUserName-add">URL</span>
                                                            <input type="text" class="form-control" value="<?php echo e(env('WA_URL_SERVER')); ?>" name="urlnode" id="settingsInputUserName" aria-describedby="settingsInputUserName-add">
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                            
                                                <div class="row m-t-lg">
                                                    <div class="col">
                                                    
                                                        <button type="submit" class="btn btn-primary m-t-sm">Update</button>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="<?php echo e(route('changePassword')); ?>" method="POST">
                                        <?php echo csrf_field(); ?> 
                                        <div class="row m-t-xxl">
                                            <div class="col-md-6">
                                                <label for="settingsCurrentPassword" class="form-label">Current Password</label>
                                                <input type="password" name="current" class="form-control" aria-describedby="settingsCurrentPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                                                <div id="settingsCurrentPassword" class="form-text">Never share your password with anyone.</div>
                                            </div>
                                        </div>
                                        <div class="row m-t-xxl">
                                            <div class="col-md-6">
                                                <label for="settingsNewPassword" class="form-label">New Password</label>
                                                <input type="password" name="new" class="form-control" aria-describedby="settingsNewPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                                            </div>
                                        </div>
                                        <div class="row m-t-xxl">
                                            <div class="col-md-6">
                                                <label for="settingsConfirmPassword" class="form-label">Confirm Password</label>
                                                <input type="password" name="confirm" class="form-control" aria-describedby="settingsConfirmPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                                            </div>
                                        </div>
                                        <div class="row m-t-lg">
                                            <div class="col">
                                               
                                                <button type="submit" class="btn btn-primary m-t-sm">Change Password</button>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#server').on('change',function(){
           let type = $('#server :selected').val();
            console.log(type);
            if(type === 'other'){
                    $('.formUrlNode').removeClass('d-none')
                } else {
                $('.formUrlNode').addClass('d-none')

            }
        })
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\wamd\resources\views/pages/settings.blade.php ENDPATH**/ ?>