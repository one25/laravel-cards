<?php $__env->startSection('form-open'); ?>
    <form method="post" action="<?php echo e(route('cards.store')); ?>">
                    <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('POST')); ?>   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back.cards.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alex/www/laravel-cards/resources/views/back/cards/create.blade.php ENDPATH**/ ?>