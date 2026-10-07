<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'includeTitle' => true
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'includeTitle' => true
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php if($includeTitle): ?>
    <h5 class="subtitle">فهرست بررسی پروژه <i class="fa fa-question-circle-o helperTooltip" data-tippy-content="چک‌ لیست پروژه، فهرستی از فعالیت‌هایی است که باید انجام دهید تا اطمینان حاصل کنید پروژه‌هایتان به‌درستی تعریف، برنامه‌ریزی و اجرا می‌شوند."></i> </h5><br/>

<?php endif; ?>

<form name="progressForm" id="progressForm">
    <div class="projectSteps">
        <div class="progressWrapper">
            <div class="progress">
                <div
                    id="progressChecklistBar"
                    class="progress-bar progress-bar-success tx-transition"
                    role="progressbar"
                    aria-valuenow="0"
                    aria-valuemin="0"
                    aria-valuemax="100"
                    style="width: <?php echo e($percentDone); ?>%"
                ><span class="sr-only"><?php echo e($percentDone); ?>%</span></div>
            </div>

            <?php $__currentLoopData = $progressSteps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="step <?php echo e($step['stepType']); ?>" style="left: <?php echo e($step['positionLeft']); ?>%;">
                    <a href="javascript:void(0)" data-toggle="dropdown" class="dropdown-toggle" data-tippy-content="<?php echo e(__($step['description'])); ?>">
                        <span class="innerCircle"></span>
                        <span class="title">
                            <?php if($step['status'] == 'done'): ?>
                                <i class="fa fa-circle-check"></i>
                            <?php else: ?>
                                <i class="fa-regular fa-circle"></i>
                            <?php endif; ?>
                                <?php echo e(__("text.step_".$loop->index + 1)); ?>: <?php echo e(__($step['title'])); ?>

                            <i class="fa fa-caret-down" aria-hidden="true"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu">

                        <?php $__currentLoopData = $step['tasks']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li <?php if($task['status'] == 'done'): ?> class="done" <?php endif; ?>>
                                <input
                                    type="checkbox"
                                    name="<?php echo e($key); ?>"
                                    id="progress_<?php echo e($key); ?>"
                                    hx-patch="<?php echo e(BASE_URL); ?>/hx/projects/checklist/update-subtask/"
                                    hx-target="#progressForm"
                                    hx-swap="outerHTML"
                                    <?php if($task['status'] == 'done'): ?> checked <?php endif; ?>
                                    <?php if(! in_array($step['stepType'], ['complete', 'current'])): ?>
                                        disabled

                                    <?php endif; ?>
                                />
                                <label for="progress_<?php echo e($key); ?>"
                                       <?php if(! in_array($step['stepType'], ['complete', 'current'])): ?>
                                           data-tippy-content="Finish the previous steps first"

                                       <?php endif; ?>

                                ><?php echo e(__($task['title'] ?? '')); ?></label>
                                <span class="clearall"></span>
                                <span class="taskDescription">
                                <?php echo e(__($task['description'] ?? '')); ?><br />
                                <a href="<?php echo e($task['link'] ?? '#'); ?>"><i class="fa fa-external-link"></i> Take me there</a>
                                </span>


                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</form>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Projects/Templates/partials/checklist.blade.php ENDPATH**/ ?>