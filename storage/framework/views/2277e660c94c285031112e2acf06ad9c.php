<?php if(can('tickets.create') && !empty($newField)): ?>
    <div class="btn-group pull-left" style="margin-right:5px;">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?php echo __('links.new_with_icon'); ?> <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <?php $__currentLoopData = $newField; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a
                        href="<?php echo e(!empty($option['url']) ? $option['url'] : ''); ?>"
                        class="<?php echo e(!empty($option['class']) ? $option['class'] : ''); ?>"
                    > <?php echo !empty($option['text']) ? __($option['text']) : ''; ?></a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Tickets/Templates/submodules/ticketNewBtn.blade.php ENDPATH**/ ?>