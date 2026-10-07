<?php $__env->startSection('content'); ?>

    <?php
        $summary = $report['summaries'][$projectId] ?? null;
    ?>

    
    <?php if (isset($component)) { $__componentOriginal73464617f1e536702d3c383ba117853c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal73464617f1e536702d3c383ba117853c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.pageheader','data' => ['icon' => 'fa fa-chart-bar']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::pageheader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('fa fa-chart-bar')]); ?>
        <h5><?php echo e(session('currentProjectClient') ? session('currentProjectClient') . ' // ' : ''); ?><?php echo e(session('currentProjectName')); ?></h5>
        <h1><?php echo __('headlines.status_report'); ?></h1>

        
         <?php $__env->slot('actions', null, []); ?> 
            <?php if($summary !== null): ?>
                <?php echo $__env->make('reports::partials.statusPill', [
                    'status' => $summary->latestStatus,
                    'date' => $summary->latestStatusDate,
                ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endif; ?>

            <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'button','inputType' => 'button','onclick' => 'window.print();','class' => 'hideOnPrint','leadingVisual' => 'fa fa-print','labelText' => __('label.print_report')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'button','inputType' => 'button','onclick' => 'window.print();','class' => 'hideOnPrint','leadingVisual' => 'fa fa-print','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('label.print_report'))]); ?>
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
         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal73464617f1e536702d3c383ba117853c)): ?>
<?php $attributes = $__attributesOriginal73464617f1e536702d3c383ba117853c; ?>
<?php unset($__attributesOriginal73464617f1e536702d3c383ba117853c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal73464617f1e536702d3c383ba117853c)): ?>
<?php $component = $__componentOriginal73464617f1e536702d3c383ba117853c; ?>
<?php unset($__componentOriginal73464617f1e536702d3c383ba117853c); ?>
<?php endif; ?>

    <div class="maincontent">

        
        <div class="lt-tabs lt-tabs--floating lt-tabs--links hideOnPrint">
            <nav class="lt-tabs-group" aria-label="<?php echo e(__('label.status_report_tab')); ?> / <?php echo e(__('label.delivery_metrics_tab')); ?>">
                <ul>
                    <li class="active"><a href="<?php echo e(BASE_URL); ?>/reports/project"><?php echo e(__('label.status_report_tab')); ?></a></li>
                    <li><a href="<?php echo e(BASE_URL); ?>/reports/show" preload="mouseover"><?php echo e(__('label.delivery_metrics_tab')); ?></a></li>
                </ul>
            </nav>

            <div class="lt-tabs-actions">
                
                <?php if (isset($component)) { $__componentOriginalfbb01c7f73fdb12362369ff4d1d4f7f5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfbb01c7f73fdb12362369ff4d1d4f7f5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.periodpicker','data' => ['period' => $period,'url' => BASE_URL.'/reports/project','hxUrl' => BASE_URL.'/hx/reports/projectReport/get','target' => '#reportBody','hints' => [
                        \Leantime\Domain\Reports\Models\ReportPeriod::PRESET_LAST_QUARTER => __('stakeholder.period.default_hint'),
                        \Leantime\Domain\Reports\Models\ReportPeriod::PRESET_THIS_QUARTER => __('stakeholder.period.in_progress_hint'),
                        \Leantime\Domain\Reports\Models\ReportPeriod::PRESET_NEXT_QUARTER => __('stakeholder.period.upcoming_hint'),
                    ]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::periodpicker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['period' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($period),'url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(BASE_URL.'/reports/project'),'hxUrl' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(BASE_URL.'/hx/reports/projectReport/get'),'target' => '#reportBody','hints' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
                        \Leantime\Domain\Reports\Models\ReportPeriod::PRESET_LAST_QUARTER => __('stakeholder.period.default_hint'),
                        \Leantime\Domain\Reports\Models\ReportPeriod::PRESET_THIS_QUARTER => __('stakeholder.period.in_progress_hint'),
                        \Leantime\Domain\Reports\Models\ReportPeriod::PRESET_NEXT_QUARTER => __('stakeholder.period.upcoming_hint'),
                    ])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfbb01c7f73fdb12362369ff4d1d4f7f5)): ?>
<?php $attributes = $__attributesOriginalfbb01c7f73fdb12362369ff4d1d4f7f5; ?>
<?php unset($__attributesOriginalfbb01c7f73fdb12362369ff4d1d4f7f5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfbb01c7f73fdb12362369ff4d1d4f7f5)): ?>
<?php $component = $__componentOriginalfbb01c7f73fdb12362369ff4d1d4f7f5; ?>
<?php unset($__componentOriginalfbb01c7f73fdb12362369ff4d1d4f7f5); ?>
<?php endif; ?>
            </div>
        </div>

        <div class="maincontentinner">

            <?php echo $tpl->displayNotification(); ?>


            <?php echo $__env->make('reports::partials.projectReportBody', ['report' => $report, 'period' => $period, 'projectId' => $projectId], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Reports/Templates/project.blade.php ENDPATH**/ ?>