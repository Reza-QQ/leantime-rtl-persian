<?php
$values = $timesheetValues;
if ($remainingHours < 0) {
    $remainingHours = 0;
}
$currentPay = $userHours * $userInfo['wage'];
?>

        <div class="row">
            <div class="col-md-6">


                <h4 class="widgettitle title-light"><span class="fa fa-clock-o"></span><?php echo __('headline.add_time_entry', false); ?></h4>
                <br />

                <form method="post" action="<?php echo e(BASE_URL); ?>/tickets/showTicket/<?php echo e($ticket->id); ?>#timesheet" class="formModal">

                    <label for="kind"><?php echo __('label.timesheet_kind'); ?></label>
                    <span class="field">
                    <select id="kind" name="kind">
                    <?php $__currentLoopData = $kind; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>"
                            <?php if($row == $values['kind']): ?> selected="selected" <?php endif; ?>
                        ><?php echo __(strtolower($row)); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </span>

                    <label for="timesheetdate"><?php echo __('label.date'); ?>:</label>
                    <input type="text" id="timesheetdate" name="date" class="dates" value="<?php echo e(format($values['date'])->date()); ?>" /><br/>

                    <label for="hours"><?php echo __('label.hours'); ?></label>
                    <span class="field">
                        <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['id' => 'hours','name' => 'hours','value' => ''.e($values['hours']).'','size' => '7','variant' => 'small']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'hours','name' => 'hours','value' => ''.e($values['hours']).'','size' => '7','variant' => 'small']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $attributes = $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $component = $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?>
                    </span>
                    <label for="description"><?php echo __('label.description'); ?></label>
                    <span class="field">
                        <?php if (isset($component)) { $__componentOriginal6029a3567a8faaf6e1fc536869bd9e70 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6029a3567a8faaf6e1fc536869bd9e70 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.textarea','data' => ['rows' => '5','cols' => '50','id' => 'description','name' => 'description']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['rows' => '5','cols' => '50','id' => 'description','name' => 'description']); ?><?php echo e($values['description']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6029a3567a8faaf6e1fc536869bd9e70)): ?>
<?php $attributes = $__attributesOriginal6029a3567a8faaf6e1fc536869bd9e70; ?>
<?php unset($__attributesOriginal6029a3567a8faaf6e1fc536869bd9e70); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6029a3567a8faaf6e1fc536869bd9e70)): ?>
<?php $component = $__componentOriginal6029a3567a8faaf6e1fc536869bd9e70; ?>
<?php unset($__componentOriginal6029a3567a8faaf6e1fc536869bd9e70); ?>
<?php endif; ?><br />
                    </span>
                    <input type="hidden" name="saveTimes" value="1" />
                    <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => __('buttons.save'),'name' => 'saveTimes']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.save')),'name' => 'saveTimes']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $attributes = $__attributesOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__attributesOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $component = $__componentOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__componentOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>

                </form>

            </div>
            <div class="col-md-6">
                <h4 class="widgettitle title-light"><span class="fa fa-bar-chart"></span><?php echo __('subtitles.logged_hours_chart'); ?></h4>

                <br />
                <canvas id="canvas"></canvas>
                <p><br />
                    <?php echo __('label.planned_hours'); ?>: <?php echo e($ticket->planHours); ?><br />
                    <?php echo __('label.booked_hours'); ?>: <?php echo e($timesheetsAllHours); ?><br />
                    <?php echo __('label.actual_hours_remaining'); ?>: <?php echo e($remainingHours); ?><br />
                </p>
            </div>
        </div>

<script type="text/javascript">

    jQuery(document).ready(function($) {

        var d2 = [];
        var d3 = [];
        var labels = [];
        <?php
        // Emit every value through json_encode so the generated JS is always
        // valid. Raw concatenation broke when a value was null or non-numeric
        // (e.g. Postgres SUM()/plan hours formatting), producing a JS syntax
        // error that killed the whole time-tracking modal. (#3353)
        $sum = 0;
        $planHours = is_numeric($ticket->planHours) ? (float) $ticket->planHours : 0;
        foreach ($ticketHours as $hours) {
            $sum = $sum + (float) ($hours['summe'] ?? 0);
            try {
                $label = dtHelper()->parseDbDateTime($hours['utc'])->setToUserTimezone()->format('Y-m-d');
                echo 'labels.push(' . json_encode($label) . ");\n";
                echo 'd2.push(' . json_encode($sum) . ");\n";
                echo 'd3.push(' . json_encode($planHours) . ");\n";
            } catch (\Exception $e) {
                // not much we can do at this point. Ignore the datapoint
            }
        }
        ?>

        leantime.ticketsController.initTimeSheetChart(labels, d2, d3, "canvas")

    });

</script>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Tickets/Templates/submodules/timesheet.blade.php ENDPATH**/ ?>