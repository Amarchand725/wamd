<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="WTZ Track QR - Beta version">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <meta name="keywords" content="Tracking and delivery message system">
    <meta name="author" content="MZ Team">
    <title><?php echo e($title); ?> | WTZ Track QR</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="<?php echo e(asset('public/plugins/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/plugins/perfectscroll/perfect-scrollbar.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/plugins/pace/pace.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/plugins/highlight/styles/github-gist.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('public/plugins/jquery/jquery-3.5.1.min.js')); ?>"></script>
    <link href="<?php echo e(asset('public/css/main.min.css')); ?>" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('public/images/avatars/avatar2.png')); ?>" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('public/images/avatars/avatar2.png')); ?>" />
</head>

<body>
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.sidebar','data' => []]); ?>
<?php $component->withName('sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo e($slot); ?>



    <!-- Javascripts -->

<script src="<?php echo e(asset('public/plugins/bootstrap/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/plugins/perfectscroll/perfect-scrollbar.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/plugins/pace/pace.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/plugins/highlight/highlight.pack.js')); ?>"></script>
<script src="<?php echo e(asset('public/plugins/blockUI/jquery.blockUI.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/js/main.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/js/custom.js')); ?>"></script>
<script src="<?php echo e(asset('public/js/pages/blockui.js')); ?>"></script>
<script src="<?php echo e(asset('public/js/search.js')); ?>"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\wamd\resources\views/components/layout-dashboard.blade.php ENDPATH**/ ?>