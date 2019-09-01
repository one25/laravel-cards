<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(asset('public/css/app.css')); ?>" rel="stylesheet">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- awesome -->  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- my customer.css -->
    <link rel="stylesheet" href="<?php echo e(asset('public/css/customer.css')); ?>">

    <?php echo $__env->yieldContent('css'); ?>

</head>
<body>
    <div class="wrapper">
        <?php echo $__env->make('front.inc.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="content-wrapper">
            <?php echo $__env->yieldContent('main'); ?>
        </div>
    </div>
<!-- Scripts -->
<script src="<?php echo e(asset('public/js/app.js')); ?>"></script>
<!-- jquery -->
<script src="<?php echo e(asset('public/js/jQuery-2.2.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/js/jquery-ui.min.js')); ?>"></script>  
<!-- Sweet Alert -->
<script src="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.js"></script>

<?php echo $__env->yieldContent('js'); ?>

</body>
</html>
<?php /**PATH /home/alex/www/laravel-cards/resources/views/front/layout.blade.php ENDPATH**/ ?>