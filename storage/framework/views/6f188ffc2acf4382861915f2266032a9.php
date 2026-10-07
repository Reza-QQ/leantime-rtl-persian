
<?php if(! empty($milestones)): ?>
    
    <?php if (! $__env->hasRenderedOnce('e6b006f2-7f16-4b4c-8222-55c36b2ab349')): $__env->markAsRenderedOnce('e6b006f2-7f16-4b4c-8222-55c36b2ab349'); ?>
        <style>
            .goalMsBoardRow{scrollbar-width:thin;scrollbar-color:#9aa7ad transparent;}
            .goalMsBoardRow::-webkit-scrollbar{height:8px;}
            .goalMsBoardRow::-webkit-scrollbar-thumb{background:#9aa7ad;border-radius:10px;border:2px solid transparent;background-clip:padding-box;}
            .goalMsBoardRow::-webkit-scrollbar-track{background:transparent;}
            .goalMsBoardChip{text-decoration:none;color:inherit;cursor:pointer;transition:border-color .12s;}
            .goalMsBoardChip:hover{border-color:var(--primary-color,#004666)!important;}
        </style>
    <?php endif; ?>
    <div class="goalMsBoardRow" style="display:flex;gap:6px;overflow-x:auto;padding-bottom:4px;margin-top:6px;">
        <?php $__currentLoopData = $milestones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ms): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="#/tickets/editMilestone/<?php echo e((int) $ms['id']); ?>" onclick="event.stopPropagation();" class="goalMsBoardChip" title="<?php echo e(__('links.edit_milestone')); ?>: <?php echo e($ms['headline']); ?>"
               style="position:relative;flex:0 0 auto;min-width:120px;max-width:180px;height:32px;border-radius:8px;border:1px solid var(--main-border-color,#e4e7ec);background:var(--secondary-background,#f2f4f7);overflow:hidden;display:flex;align-items:center;padding:0 9px;">
                <span style="position:absolute;left:0;top:0;bottom:0;width:<?php echo e((int) $ms['percentDone']); ?>%;background:<?php echo e($ms['color']); ?>;opacity:.18;border-right:2px solid <?php echo e($ms['color']); ?>;"></span>
                <span style="position:relative;z-index:1;flex:1;min-width:0;font-size:11.5px;font-weight:500;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?php echo e($ms['headline']); ?></span>
                <span style="position:relative;z-index:1;flex:none;font-size:10px;font-weight:600;opacity:.65;margin-left:5px;"><?php echo e((int) $ms['percentDone']); ?>%</span>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Goalcanvas/Templates/partials/milestoneChips.blade.php ENDPATH**/ ?>