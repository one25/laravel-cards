<?php $__env->startSection('form-open'); ?>
    <form method="post" action="<?php echo e(route('cards.update', [$card->id])); ?>">
                     <?php echo e(csrf_field()); ?>

                  <?php echo e(method_field('PUT')); ?>   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.cards.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alex/www/laravel-cards/resources/views/back/cards/edit.blade.php ENDPATH**/ ?>