<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

        <div class="row padding_body">
           <div class="col-md-12">
              <div class="box box-primary">
                 <div class="box-body">
                    <div id="spinner" class="text-center"></div>
                      <div class="row">
                          <div class="col-md-3 col-sm-4 col-xs-12">
                              <div class="form-group">
                                 <input type="text" name="query_search" class="form-control f-verify input-size" placeholder="helen" />
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-4 col-xs-12">
                              <div class="form-group">
                                  <button type="button" name="submit_search" value="searchproduct" class="btn btn-success add_upd_p" data-action="saved_new">Search User</button>
                              </div>
                          </div>    
                      </div>
                    <div class="table-responsive">
                      <?php if(session('card-updated')): ?>
                          <?php $__env->startComponent('back.components.alert'); ?>
                              <?php $__env->slot('type'); ?>
                                  success
                              <?php $__env->endSlot(); ?>
                              <?php echo session('card-updated'); ?>

                          <?php echo $__env->renderComponent(); ?>
                      <?php endif; ?>
                      <table>
                         <thead>
                          <tr>
                            <?php if($layout == 'back'): ?>
                            <?php if(auth()->guard()->guest()): ?>
                            <?php else: ?>
                            <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
                            <td class="widthbutton">&nbsp;</td>
                            <td class="widthbutton">&nbsp;</td> 
                            <?php endif; ?>
                            <?php if (\Illuminate\Support\Facades\Blade::check('redac')): ?>
                            <td class="widthbutton">&nbsp;</td>
                            <td class="widthbutton">&nbsp;</td> 
                            <?php endif; ?>    
                            <?php endif; ?>  
                            <?php endif; ?>                            
                            <td>Number Card</td>
                            <td>
                               <table>
                                 <tr>
                                   <td rowspan="2">Name User</td>
                                   <td ><a href="#" class="sort" data-order="user_id" data-direction="asc">
                                      <img src="<?php echo e(asset('public/images/top.jpg')); ?>" alt />
                                   </a></td>
                                 </tr>
                                 <tr>   
                                   <td><a href="#" class="sort" data-order="user_id" data-direction="desc">
                                      <img src="<?php echo e(asset('public/images/bottom.jpg')); ?>" alt />
                                   </a></td>  
                                 </tr>
                               </table>        
                            </td>
                            <td>
                               <table>
                                 <tr>
                                   <td rowspan="2">Type Card</td>
                                   <td><a href="#" class="sort" data-order="type_id" data-direction="asc">
                                      <img src="<?php echo e(asset('public/images/top.jpg')); ?>" alt />
                                   </a></td>
                                 </tr>
                                 <tr>   
                                   <td><a href="#" class="sort" data-order="type_id" data-direction="desc">
                                      <img src="<?php echo e(asset('public/images/bottom.jpg')); ?>" alt />
                                   </a></td>  
                                 </tr>
                               </table>       
                            </td>
                          </tr>  
                          </thead>
                          <tbody id="pannel">
                             <?php echo $__env->make('front.brick-standard', compact('cards'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                         </tbody>    
                       </table>
                     </div>
                     <hr> <!-- cards->links() -->
                     <div id="pagination" class="box-footer">
                       <?php echo e($links); ?>

                     </div>                     
                   </div>  
                 </div>
              </div> 
           </div>  
</section>  

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('public/js/mine.js')); ?>"></script>
    <script>
    $(document).ready(function(){
       var url = '<?php if($layout == "front"): ?><?php echo e(route('home')); ?><?php else: ?><?php echo e(route('dashboard')); ?><?php endif; ?>'; 
       BaseRecord.errorAjax = '<?php echo app('translator')->getFromJson('Looks like there is a server issue...'); ?>';
       BaseRecord.swalTitle = '<?php echo app('translator')->getFromJson('Really destroy card ?'); ?>';
       BaseRecord.confirmButtonText = '<?php echo app('translator')->getFromJson('Yes'); ?>';
       BaseRecord.cancelButtonText = '<?php echo app('translator')->getFromJson('No'); ?>';                
       $('td a.sort').click(function () {
          BaseRecord.ordering(url, $(this), BaseRecord.errorAjax);
          return false;
       });
       $('button[name="submit_search"]').click(function () {
          BaseRecord.searching(url, $('input[name="query_search"]'), BaseRecord.errorAjax);
       });
       $('.listbuttonremove').click(function () {
          BaseRecord.destroy($(this), url, BaseRecord.swalTitle, BaseRecord.confirmButtonText, BaseRecord.cancelButtonText, BaseRecord.errorAjax);
          return false;
       });
    });    
    </script>
<?php $__env->stopSection(); ?>    

<?php echo $__env->make($layout . '.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alex/www/laravel-cards/resources/views/front/index.blade.php ENDPATH**/ ?>