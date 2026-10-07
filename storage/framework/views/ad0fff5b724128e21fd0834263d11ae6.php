
<?php
    $roType = $canvasItem['metricType'] ?: 'number';
    $roStart = (float) ($canvasItem['startValue'] ?? 0);
    $roCur = (float) ($canvasItem['currentValue'] ?? 0);
    $roGoal = (float) ($canvasItem['endValue'] ?? 0);
    $roHasRange = ($roGoal - $roStart) != 0;
    $roPct = $roHasRange ? max(0, min(100, (($roCur - $roStart) / ($roGoal - $roStart)) * 100)) : 0;
    $roFmt = function ($v) use ($roType) {
        $v = (float) $v;
        if ($roType === 'percent') {
            return rtrim(rtrim(number_format($v, 2), '0'), '.').'%';
        }
        if ($roType === 'currency') {
            return '$'.number_format($v, $v == floor($v) ? 0 : 2);
        }

        return rtrim(rtrim(number_format($v, 2), '0'), '.');
    };
    $roReached = $roHasRange && $roPct >= 100;
    // Works for decreasing goals too (goal < start): distance left to travel.
    $roRemaining = abs($roGoal - $roCur);
    // linkAndReport current values are computed from children; viewers can't
    // write — both render the number as static text instead of an input.
    $roEditable = $login::userIsAtLeast($roles::$editor) && ($canvasItem['setting'] ?? '') !== 'linkAndReport';
    // Inline blur-save needs a PERSISTED goal: on the create form (id empty)
    // an hx-post with itemId=0 would swap the readout back to zeros and wipe
    // the value the user just typed — new goals get a plain input that
    // submits with the create form instead.
    $roLive = (int) ($canvasItem['id'] ?? 0) > 0;
?>
<div class="gv-metric-bar" id="gvReadout">
    
    <?php if(trim((string) ($canvasItem['description'] ?? '')) !== ''): ?>
        <div class="gv-mb-metric"><?php echo e($canvasItem['description']); ?></div>
    <?php endif; ?>
    <div class="gv-mb-top">
        <?php if($roEditable && $roLive): ?>
            <input class="gv-mb-input" type="number" step="0.01" name="currentValue"
                   value="<?php echo e($roCur == floor($roCur) ? (int) $roCur : $roCur); ?>"
                   aria-label="<?php echo e(__('goalcanvas.update_current')); ?>"
                   data-tippy-content="<?php echo e(__('goalcanvas.update_current')); ?>"
                   hx-post="<?php echo e(BASE_URL); ?>/hx/goalcanvas/goalProgress/updateValue"
                   hx-vals='{"itemId": <?php echo e((int) $canvasItem['id']); ?>}'
                   hx-headers='{"X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>"}'
                   hx-trigger="blur changed"
                   hx-target="#gvReadout"
                   hx-swap="outerHTML">
        <?php elseif($roEditable): ?>
            
            <input class="gv-mb-input" type="number" step="0.01" name="currentValue"
                   value="<?php echo e($roCur == floor($roCur) ? (int) $roCur : $roCur); ?>"
                   aria-label="<?php echo e(__('goalcanvas.update_current')); ?>"
                   data-tippy-content="<?php echo e(__('goalcanvas.update_current')); ?>">
        <?php else: ?>
            <span class="gv-mb-now" <?php if(($canvasItem['setting'] ?? '') === 'linkAndReport'): ?> data-tippy-content="<?php echo e(__('text.current_value_calculated_from_children')); ?>" <?php endif; ?>><?php echo e($roFmt($roCur)); ?></span>
            
            <input type="hidden" name="currentValue" value="<?php echo e($roCur == floor($roCur) ? (int) $roCur : $roCur); ?>">
        <?php endif; ?>
        
        <?php if($roHasRange): ?>
            <span class="gv-mb-togo">
                <?php if($roReached): ?>
                    <?php echo e(__('goalcanvas.goal_reached')); ?>

                <?php else: ?>
                    <?php echo e(sprintf(__('goalcanvas.to_go'), $roFmt($roRemaining))); ?>

                <?php endif; ?>
            </span>
        <?php endif; ?>
    </div>
    
    <div class="gv-mb-barrow">
        <div class="gv-mb-scalewrap">
            <div class="gv-track gv-track--scored" aria-hidden="true">
                <div class="gv-fill" style="width:<?php echo e($roPct); ?>%"></div>
                <span class="gv-tick" style="left:25%"></span>
                <span class="gv-tick" style="left:50%"></span>
                <span class="gv-tick" style="left:75%"></span>
                <?php if($roPct > 0 && $roPct < 100): ?>
                    <span class="gv-marker" style="left:<?php echo e($roPct); ?>%"></span>
                <?php endif; ?>
            </div>
            
            <div class="gv-scale"><span><?php echo e($roFmt($roStart)); ?></span><span><?php echo e($roFmt($roGoal)); ?></span></div>
        </div>
        <span class="gv-mb-pct"><?php echo e((int) round($roPct)); ?>%</span>
    </div>
</div>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Goalcanvas/Templates/partials/progressReadout.blade.php ENDPATH**/ ?>