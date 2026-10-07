<?php $__env->startSection('content'); ?>

<?php echo $__env->make('blueprints::showCanvasTop', ['canvasSlug' => $canvasSlug], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<?php if(count($allCanvas) > 0): ?>
    <div id="sortableCanvasKanban" class="sortableTicketList disabled">
        <div class="row-fluid">
            <div class="column" style="width: 100%; min-width: calc(<?php echo e($template->minColumns); ?> * 250px<?php echo e($template->minWidthOffset ? ' + ' . $template->minWidthOffset . 'px' : ''); ?>);">
                <?php $__currentLoopData = $template->layout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($row['type'] === 'header'): ?>
                        <?php echo $__env->make('blueprints::partials.sectionHeader', ['row' => $row], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php elseif($row['type'] === 'separator'): ?>
                        <?php echo $__env->make('blueprints::partials.separator', ['row' => $row], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php elseif($row['type'] === 'static'): ?>
                        <?php echo $__env->make('blueprints::partials.staticContent', ['row' => $row], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php elseif($row['type'] === 'boxes'): ?>
                        <div class="row canvas-row" <?php if(isset($row['id'])): ?> id="<?php echo e($row['id']); ?>" <?php endif; ?>>
                            <?php $__currentLoopData = $row['columns']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(isset($col['empty']) && $col['empty'] === true): ?>
                                    
                                    <div style="width: <?php echo e($col['width']); ?>%">&nbsp;</div>
                                <?php else: ?>
                                <div class="column" style="width: <?php echo e($col['width']); ?>%">
                                    <?php if(isset($col['box'])): ?>
                                        <?php
                                            // Handle per-box statusLabels overrides
                                            $boxStatusLabels = $statusLabels;
                                            if (array_key_exists('statusLabels', $col)) {
                                                if ($col['statusLabels'] === 'inherit') {
                                                    $boxStatusLabels = $statusLabels;
                                                } elseif (is_array($col['statusLabels'])) {
                                                    $boxStatusLabels = $col['statusLabels'];
                                                } else {
                                                    $boxStatusLabels = [];
                                                }
                                            }
                                        ?>
                                        <?php echo $__env->make('blueprints::element', [
                                            'canvasSlug' => $canvasSlug,
                                            'elementName' => $col['box'],
                                            'statusLabels' => $boxStatusLabels,
                                            'relatesLabels' => $relatesLabels,
                                        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                    <?php elseif(isset($col['label'])): ?>
                                        <?php echo $__env->make('blueprints::partials.rowLabel', ['label' => $col['label']], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                    <?php elseif(isset($col['nested']) && $col['nested'] === true && isset($col['rows'])): ?>
                                        
                                        <?php $__currentLoopData = $col['rows']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="row canvas-row" <?php if(isset($subRow['id'])): ?> id="<?php echo e($subRow['id']); ?>" <?php endif; ?>>
                                                <?php $__currentLoopData = $subRow['columns']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="column" style="width: <?php echo e($subCol['width']); ?>%">
                                                        <?php if(isset($subCol['box'])): ?>
                                                            <?php echo $__env->make('blueprints::element', [
                                                                'canvasSlug' => $canvasSlug,
                                                                'elementName' => $subCol['box'],
                                                                'statusLabels' => $statusLabels,
                                                                'relatesLabels' => $relatesLabels,
                                                            ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
<?php endif; ?>

<?php echo $__env->make('blueprints::showCanvasBottom', ['canvasSlug' => $canvasSlug], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Blueprints/Templates/showCanvas.blade.php ENDPATH**/ ?>