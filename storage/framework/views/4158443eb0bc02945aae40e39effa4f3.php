<?php $__env->startSection('content'); ?>

<div class="pageheader">
    <div class="pageicon"><span class="fa fa-chart-bar"></span></div>
    <div class="pagetitle">
        <h5><?php echo e(session('currentProjectClient') . ' // ' . session('currentProjectName')); ?></h5>
        <h1><?php echo __('headlines.reports'); ?></h1>
    </div>
</div>

<div class="maincontent">

    
    <div class="lt-tabs lt-tabs--floating lt-tabs--links hideOnPrint">
        <nav class="lt-tabs-group" aria-label="<?php echo e(__('label.status_report_tab')); ?> / <?php echo e(__('label.delivery_metrics_tab')); ?>">
            <ul>
                <li><a href="<?php echo e(BASE_URL); ?>/reports/project" preload="mouseover"><?php echo e(__('label.status_report_tab')); ?></a></li>
                <li class="active"><a href="<?php echo e(BASE_URL); ?>/reports/show"><?php echo e(__('label.delivery_metrics_tab')); ?></a></li>
            </ul>
        </nav>
    </div>

    <div class="maincontentinner">

        <?php echo $tpl->displayNotification(); ?>


        <div class="row">
            <div class="col-lg-8">

                <div class="row" id="yourToDoContainer">
                    <div class="col-md-12">

                            <h5 class="subtitle"><?php echo __('subtitles.summary'); ?> <?php if($fullReportLatest): ?>(<?php echo e(format($fullReportLatest['date'])->date()); ?>)<?php endif; ?> </h5>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="boxedHighlight">

                                        <span class="headline"><?php echo __('label.planned_hours'); ?></span>
                                        <span class="value"><?php if($fullReportLatest !== false && $fullReportLatest['sum_planned_hours'] != null): ?><?php echo e(format($fullReportLatest['sum_planned_hours'])->decimal()); ?><?php else: ?><?php echo e(0); ?><?php endif; ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="boxedHighlight">


                                        <span class="headline"><?php echo __('label.estimated_hours_remaining'); ?></span>
                                        <span class="value"><?php if($fullReportLatest !== false && $fullReportLatest['sum_estremaining_hours'] != null): ?><?php echo e(format($fullReportLatest['sum_estremaining_hours'])->decimal()); ?><?php else: ?><?php echo e(0); ?><?php endif; ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="boxedHighlight">


                                        <span class="headline"><?php echo __('label.booked_hours'); ?></span>
                                        <span class="value"><?php if($fullReportLatest !== false && $fullReportLatest['sum_logged_hours'] != null): ?><?php echo e(format($fullReportLatest['sum_logged_hours'])->decimal()); ?><?php else: ?><?php echo e(0); ?><?php endif; ?></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="boxedHighlight">
                                        <span class="headline"><?php echo __('label.open_todos'); ?></span>
                                        <span class="value">
                                            
                                            <?php if($fullReportLatest !== false): ?>
                                                <?php echo e((int) ($fullReportLatest['sum_open_todos'] + $fullReportLatest['sum_progres_todos'])); ?>

                                            <?php else: ?>
                                                <?php echo e(0); ?>

                                            <?php endif; ?>
                                        </span>
                                    </div>
                                </div>


                            </div>

                            
                            <?php if($allSprints !== false && count($allSprints) > 0): ?>
                                <h5 class="subtitle"><?php echo __('subtitles.sprint_burndown'); ?></h5>
                                <br />
                                <span class="pull-left">
                                <?php if(true): ?>
                                    <select data-placeholder="<?php echo e(__('input.placeholders.filter_by_sprint')); ?>" title="<?php echo e(__('input.placeholders.filter_by_sprint')); ?>" name="sprint" class="mainSprintSelector" onchange="location.href='<?php echo e(BASE_URL); ?>/reports/show?sprint='+jQuery(this).val()" id="sprintSelect">

                                        <option value="" ><?php echo __('input.placeholders.filter_by_sprint'); ?></option>
                                        <?php $dates = ''; ?>
                                        <?php $__currentLoopData = $allSprints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sprintRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($sprintRow->id); ?>"
                                                <?php if($currentSprint !== false && $sprintRow->id == $currentSprint): ?>
                                                    selected="selected"
                                                    <?php $dates = sprintf(__('label.date_from_date_to'), format($sprintRow->startDate)->date(), format($sprintRow->endDate)->date()); ?>
                                                <?php endif; ?>
                                            ><?php echo e($tpl->escape($sprintRow->name)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                <?php endif; ?>
                            </span>

                                <div class="pull-right">
                                    <div class="btn-group mt-1 mx-auto" role="group">
                                        <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','id' => 'NumChartButtonSprint','class' => 'btn-sm btn-secondary active chartButtons','link' => 'javascript:void(0)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','id' => 'NumChartButtonSprint','class' => 'btn-sm btn-secondary active chartButtons','link' => 'javascript:void(0)']); ?><?php echo __('label.num_tickets'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $attributes = $__attributesOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__attributesOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $component = $__componentOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__componentOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
                                        <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','id' => 'EffortChartButtonSprint','class' => 'btn-sm btn-secondary chartButtons','link' => 'javascript:void(0)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','id' => 'EffortChartButtonSprint','class' => 'btn-sm btn-secondary chartButtons','link' => 'javascript:void(0)']); ?><?php echo __('label.effort'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $attributes = $__attributesOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__attributesOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $component = $__componentOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__componentOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
                                        <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','id' => 'HourlyChartButtonSprint','class' => 'btn-sm btn-secondary chartButtons','link' => 'javascript:void(0)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','id' => 'HourlyChartButtonSprint','class' => 'btn-sm btn-secondary chartButtons','link' => 'javascript:void(0)']); ?><?php echo __('label.hours'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $attributes = $__attributesOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__attributesOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $component = $__componentOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__componentOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
                                    </div>

                                </div>

                                <div style="width:100%; height:350px;">
                                    <canvas id="sprintBurndown"></canvas>
                                </div>


                            <?php endif; ?>

                        <div class="clearall"></div>
                        <br />
                        <br />
                        <h5 class="subtitle"><?php echo __('subtitles.cummulative_flow'); ?></h5>

                        <div class="pull-right">
                            <div class="btn-group mt-1 mx-auto" role="group">
                                <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','id' => 'NumChartButtonBacklog','class' => 'btn-sm btn-secondary active backlogChartButtons','link' => 'javascript:void(0)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','id' => 'NumChartButtonBacklog','class' => 'btn-sm btn-secondary active backlogChartButtons','link' => 'javascript:void(0)']); ?><?php echo __('label.num_tickets'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $attributes = $__attributesOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__attributesOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $component = $__componentOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__componentOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','id' => 'EffortChartButtonBacklog','class' => 'btn-sm btn-secondary backlogChartButtons','link' => 'javascript:void(0)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','id' => 'EffortChartButtonBacklog','class' => 'btn-sm btn-secondary backlogChartButtons','link' => 'javascript:void(0)']); ?><?php echo __('label.effort'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $attributes = $__attributesOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__attributesOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $component = $__componentOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__componentOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','id' => 'HourlyChartButtonBacklog','class' => 'btn-sm btn-secondary backlogChartButtons','link' => 'javascript:void(0)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','id' => 'HourlyChartButtonBacklog','class' => 'btn-sm btn-secondary backlogChartButtons','link' => 'javascript:void(0)']); ?><?php echo __('label.hours'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $attributes = $__attributesOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__attributesOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $component = $__componentOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__componentOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
                            </div>

                        </div>
                        <div style="width:100%; height:350px;">
                            <canvas id="backlogBurndown"></canvas>
                        </div>

                        <div class="clearall"></div>
                        <br />
                        <br />
                    </div>
                </div>

            </div>

            <div class="col-lg-4">

                <div class="row" id="projectProgressContainer">
                    <div class="col-md-12">

                        <h5 class="subtitle"><?php echo __('subtitles.project_progress'); ?></h5>

                        <div id="canvas-holder" style="width:100%; height:250px;">
                            <canvas id="chart-area" ></canvas>
                        </div>
                        <br /><br />
                    </div>
                </div>
                <div class="row" id="milestoneProgressContainer">
                    <div class="col-md-12">
                        <h5 class="subtitle"><?php echo __('headline.milestones'); ?></h5>
                        <ul class="sortableTicketList" >
                            <?php if(count($milestones) == 0): ?>
                                <div class='center'><br /><h4><?php echo __('headlines.no_milestones'); ?></h4>
                                <?php echo __('text.milestones_help_organize_projects'); ?><br /><br /><a href="<?php echo e(BASE_URL); ?>/tickets/roadmap"><?php echo __('links.goto_milestones'); ?></a>
                            <?php endif; ?>
                            <?php $__currentLoopData = $milestones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="ui-state-default" id="milestone_<?php echo e($row->id); ?>" >
                                        <div class="ticketBox fixed">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <strong><a href="<?php echo e(BASE_URL); ?>/tickets/editMilestone/<?php echo e($row->id); ?>" class="milestoneModal"><?php echo e($tpl->escape($row->headline)); ?></a></strong>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-7">
                                                    <?php echo __('label.due'); ?>

                                                    <?php echo e(format($row->editTo)->date(__('text.no_date_defined'))); ?>

                                                </div>
                                                <div class="col-md-5" style="text-align:right">
                                                    <?php echo sprintf(__('text.percent_complete'), $row->percentDone); ?>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo e($row->percentDone); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e($row->percentDone); ?>%">
                                                            <span class="sr-only"><?php echo sprintf(__('text.percent_complete'), $row->percentDone); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (! $__env->hasRenderedOnce('7d66dd7c-e22a-440c-8adb-9a1fb0eda164')): $__env->markAsRenderedOnce('7d66dd7c-e22a-440c-8adb-9a1fb0eda164'); ?>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">

   jQuery(document).ready(function() {

       leantime.dashboardController.prepareHiddenDueDate();
       leantime.ticketsController.initEffortDropdown();
       leantime.ticketsController.initMilestoneDropdown();
       leantime.ticketsController.initStatusDropdown();

       leantime.dashboardController.initProgressChart("chart-area", <?php echo e(round($projectProgress['percent'])); ?>, <?php echo e(round((100 - $projectProgress['percent']))); ?>);

       <?php if($sprintBurndown !== false): ?>
           var sprintBurndownChart = leantime.dashboardController.initBurndown([<?php $__currentLoopData = $sprintBurndown; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>'<?php echo e($value['date']); ?>',<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>], [<?php $__currentLoopData = $sprintBurndown; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>'<?php echo e(round($value['plannedNum'], 2)); ?>',<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>], [ <?php $__currentLoopData = $sprintBurndown; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($value['actualNum'] !== ''): ?>'<?php echo e($value['actualNum']); ?>',<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> ]);
           leantime.dashboardController.initChartButtonClick('HourlyChartButtonSprint', '<?php echo __('label.hours'); ?>', [<?php $__currentLoopData = $sprintBurndown; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>'<?php echo e($value['plannedHours']); ?>',<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>], [ <?php $__currentLoopData = $sprintBurndown; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($value['actualHours'] !== ''): ?>'<?php echo e(round($value['actualHours'])); ?>',<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> ], sprintBurndownChart);
           leantime.dashboardController.initChartButtonClick('EffortChartButtonSprint', '<?php echo __('label.effort'); ?>', [<?php $__currentLoopData = $sprintBurndown; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>'<?php echo e($value['plannedEffort']); ?>',<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>], [ <?php $__currentLoopData = $sprintBurndown; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($value['actualEffort'] !== ''): ?>'<?php echo e($value['actualEffort']); ?>',<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> ], sprintBurndownChart);
           leantime.dashboardController.initChartButtonClick('NumChartButtonSprint', '<?php echo __('label.num_tickets'); ?>', [<?php $__currentLoopData = $sprintBurndown; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>'<?php echo e($value['plannedNum']); ?>',<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>], [ <?php $__currentLoopData = $sprintBurndown; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($value['actualNum'] !== ''): ?>'<?php echo e($value['actualNum']); ?>',<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> ], sprintBurndownChart);

       <?php endif; ?>

       <?php if($backlogBurndown !== false): ?>
           var statusBurnupNum = [];

           statusBurnupNum['open'] = {
               'label': 'Open',
               'data': [<?php $__currentLoopData = $backlogBurndown; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($value['open']['actualNum'] !== ''): ?>'<?php echo e($value['open']['actualNum']); ?>',<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>]
           };

           statusBurnupNum['progress'] = {
               'label': 'Progress',
               'data': [<?php $__currentLoopData = $backlogBurndown; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($value['progress']['actualNum'] !== ''): ?>'<?php echo e($value['progress']['actualNum']); ?>',<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>]
           };

           statusBurnupNum['done'] = {
               'label': 'Done',
               'data': [<?php $__currentLoopData = $backlogBurndown; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($value['done']['actualNum'] !== ''): ?>'<?php echo e($value['done']['actualNum']); ?>',<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>]
           };

           var backlogBurndown = leantime.dashboardController.initBacklogBurndown([<?php $__currentLoopData = $backlogBurndown; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>'<?php echo e($value['date']); ?>',<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>], statusBurnupNum);


           var statusBurnupEffort = [];

           statusBurnupEffort['open'] = {
               'label': 'Open',
               'data': [<?php $__currentLoopData = $backlogBurndown; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($value['open']['actualEffort'] !== ''): ?>'<?php echo e($value['open']['actualEffort']); ?>',<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>]
           };

           statusBurnupEffort['progress'] = {
               'label': 'Progress',
               'data': [<?php $__currentLoopData = $backlogBurndown; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($value['progress']['actualEffort'] !== ''): ?>'<?php echo e($value['progress']['actualEffort']); ?>',<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>]
           };

           statusBurnupEffort['done'] = {
               'label': 'Done',
               'data': [<?php $__currentLoopData = $backlogBurndown; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($value['done']['actualEffort'] !== ''): ?>'<?php echo e($value['done']['actualEffort']); ?>',<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>]
           };

           var statusBurnupHours = [];

           statusBurnupHours['open'] = {
               'label': 'Open',
               'data': [<?php $__currentLoopData = $backlogBurndown; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($value['open']['actualHours'] !== ''): ?>'<?php echo e($value['open']['actualHours']); ?>',<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>]
           };

           statusBurnupHours['progress'] = {
               'label': 'Progress',
               'data': [<?php $__currentLoopData = $backlogBurndown; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($value['progress']['actualHours'] !== ''): ?>'<?php echo e($value['progress']['actualHours']); ?>',<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>]
           };

           statusBurnupHours['done'] = {
               'label': 'Done',
               'data': [<?php $__currentLoopData = $backlogBurndown; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($value['done']['actualHours'] !== ''): ?>'<?php echo e($value['done']['actualHours']); ?>',<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>]
           };

           leantime.dashboardController.initBacklogChartButtonClick('HourlyChartButtonBacklog', statusBurnupHours, '<?php echo __('label.hours'); ?>', backlogBurndown);
           leantime.dashboardController.initBacklogChartButtonClick('EffortChartButtonBacklog', statusBurnupEffort, '<?php echo __('label.effort'); ?>', backlogBurndown);
           leantime.dashboardController.initBacklogChartButtonClick('NumChartButtonBacklog', statusBurnupNum, '<?php echo __('label.num_tickets'); ?>', backlogBurndown);

       <?php endif; ?>


    });

</script>
<?php $__env->stopPush(); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Reports/Templates/show.blade.php ENDPATH**/ ?>