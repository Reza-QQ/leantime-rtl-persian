<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'percentComplete' => 0,
    'current' => '',
    'completed' => [],
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
    'percentComplete' => 0,
    'current' => '',
    'completed' => [],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

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
                style="width: <?php echo e($percentComplete); ?>%"
            ><span class="sr-only"><?php echo e($percentComplete); ?>%</span></div>
        </div>
        <div class="step <?php if($current=='account'): ?> current <?php endif; ?> <?php if(in_array("account", $completed)): ?> complete <?php endif; ?>" style="left: 12%;">
            <a href="javascript:void(0)" data-toggle="dropdown" class="dropdown-toggle">
                <span class="innerCircle">
                    <?php if(in_array("account", $completed)): ?>
                        <i class="fa-solid fa-check" style="color:var(--main-action-color); padding-left:3px;"></i>
                    <?php endif; ?>
                </span>
                <span class="title">
                    Account
                </span>
            </a>
        </div>

        <div class="step <?php if($current=='theme'): ?> current <?php endif; ?> <?php if(in_array("theme", $completed)): ?> complete <?php endif; ?>" style="left: 37%;">
            <a href="javascript:void(0)" data-toggle="dropdown" class="dropdown-toggle">
                <span class="innerCircle">
                    <?php if(in_array("theme", $completed)): ?>
                        <i class="fa-solid fa-check" style="color:var(--main-action-color); padding-left:3px;"></i>
                    <?php endif; ?>
                </span>
                <span class="title">
                    Theme
                </span>
            </a>
        </div>

        <div class="step <?php if($current=='personalization'): ?> current <?php endif; ?> <?php if(in_array("personalization", $completed)): ?> complete <?php endif; ?>" style="left: 62%;">
            <a href="javascript:void(0)" data-toggle="dropdown" class="dropdown-toggle">
                <span class="innerCircle">
                    <?php if(in_array("personalization", $completed)): ?>
                        <i class="fa-solid fa-check" style="color:var(--main-action-color); padding-left:3px;"></i>
                    <?php endif; ?>
                </span>
                <span class="title">
                    Personalization
                </span>
            </a>
        </div>

        <div class="step <?php if($current=='time'): ?> current <?php endif; ?> <?php if(in_array("time", $completed)): ?> complete <?php endif; ?>" style="left: 88%;">
            <a href="javascript:void(0)" data-toggle="dropdown" class="dropdown-toggle">
                <span class="innerCircle">
                    <?php if(in_array("time", $completed)): ?>
                        <i class="fa-solid fa-check" style="color:var(--main-action-color); padding-left:3px;"></i>
                    <?php endif; ?>
                </span>
                <span class="title">
                    Routine
                </span>
            </a>
        </div>

    </div>
</div>
<br /><br /><br />
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Auth/Templates/components/onboardingProgress.blade.php ENDPATH**/ ?>