<?php $__env->startSection('content'); ?>

<?php
    $milestones = $milestones ?? [];
    $timelineTasks = $timelineTasks ?? [];
    $roadmapView = session('usersettings.views.roadmap', 'Month');
?>

<?php echo $__env->make('tickets::submodules.timelineHeader', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<div class="maincontent">

    <?php echo $__env->make('tickets::submodules.timelineTabs', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="maincontentinner">

        
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">

                    <div class="btn-group dropRight">

                        <?php
                            $currentView = '';
                            if ($roadmapView == 'Day') {
                                $currentView = __('buttons.day');
                            } elseif ($roadmapView == 'Week') {
                                $currentView = __('buttons.week');
                            } elseif ($roadmapView == 'Month') {
                                $currentView = __('buttons.month');
                            }
                        ?>
                        <button class="btn dropdown-toggle" data-toggle="dropdown"><?php echo __('buttons.timeframe'); ?>: <span class="viewText"><?php echo e($currentView); ?></span><span class="caret"></span></button>
                        <ul class="dropdown-menu" id="ganttTimeControl">
                           <li><a href="javascript:void(0);" data-value="Day" class="<?php echo e($roadmapView == 'Day' ? 'active' : ''); ?>"> <?php echo __('buttons.day'); ?></a></li>
                            <li><a href="javascript:void(0);" data-value="Week" class="<?php echo e($roadmapView == 'Week' ? 'active' : ''); ?>"><?php echo __('buttons.week'); ?></a></li>
                            <li><a href="javascript:void(0);" data-value="Month" class="<?php echo e($roadmapView == 'Month' ? 'active' : ''); ?>"><?php echo __('buttons.month'); ?></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        <?php
        if (
            (is_array($timelineTasks) && count($timelineTasks) == 0) ||
            $timelineTasks == false
        ) {
            echo "<div class='empty' id='emptySprint' style='text-align:center;'>";
            echo "<div style='width:30%' class='svgContainer'>";
            echo file_get_contents(ROOT.'/dist/images/svg/undraw_adjustments_p22m.svg');
            echo '</div>';
            echo '<h4>'.__('headlines.no_tickets').'<br /></h4></div>';
        }
        ?>
        <div class="gantt-wrapper">
            <svg id="gantt"></svg>
        </div>

    </div>
</div>

<?php if (! $__env->hasRenderedOnce('2a0e8716-a76c-47b8-b299-69e922b8eb17')): $__env->markAsRenderedOnce('2a0e8716-a76c-47b8-b299-69e922b8eb17'); ?> <?php $__env->startPush('scripts'); ?>
<script type="text/javascript">

    jQuery(document).ready(function(){


    <?php if(isset($_GET['showMilestoneModal'])): ?>
        <?php
            $modalUrl = $_GET['showMilestoneModal'] == '' ? '' : '/'.(int) $_GET['showMilestoneModal'];
        ?>

        leantime.ticketsController.openMilestoneModalManually("<?php echo e(BASE_URL); ?>/tickets/editMilestone<?php echo e($modalUrl); ?>");
        window.history.pushState({},document.title, '<?php echo e(BASE_URL); ?>/tickets/roadmap');

    <?php endif; ?>


});


    <?php

    if (count($timelineTasks) > 0) {
    ?>
        var tasks = [

            <?php
            $lastMilestoneSortIndex = [];

            foreach ($timelineTasks as $mlst) {
                if ($mlst->type == 'milestone') {
                    $lastMilestoneSortIndex[$mlst->id] = ($mlst->sortIndex != '') ? $mlst->sortIndex : 999;
                }
            }

            foreach ($timelineTasks as $mlst) {

                $headline = __('label.'.strtolower($mlst->type)).': '.$mlst->headline;
                if ($mlst->type == 'milestone') {
                    $headline .= ' ('.format($mlst->percentDone)->decimal().'% Done)';
                }

                $color = '#8D99A6';
                if ($mlst->type == 'milestone') {
                    $color = $mlst->tags;
                }

                $sortIndex = $mlst->sortIndex;

                $dependencyList = [];

                // Use explicit > 0 checks: new milestones store dependingTicketId as an empty
                // string, and under PHP 8 `'' != 0` is true — which pushed an empty dependency and
                // skipped the real milestoneid, so a dependency set in table mode never rendered here.
                if ((int) $mlst->dependingTicketId > 0) {
                    $dependencyList[] = $mlst->dependingTicketId;
                } elseif ((int) $mlst->milestoneid > 0) {
                    $dependencyList[] = $mlst->milestoneid;
                }

                echo "{
                            id :'".$mlst->id."',
                            name :".json_encode($headline, JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_TAG | JSON_HEX_AMP).",
                            start :'".(dtHelper()->isValidDateString($mlst->editFrom) ? $mlst->editFrom : dtHelper()->userNow()->addDays(2)->format('Y-m-d'))."',
                            end :'".(dtHelper()->isValidDateString($mlst->editTo) ? $mlst->editTo : dtHelper()->userNow()->addDays(2)->format('Y-m-d'))."',
                            progress :'".format($mlst->percentDone)->decimal()."',
                            dependencies :'".implode(',', $dependencyList)."',
                            custom_class :'',
                            type: '".strtolower($mlst->type)."',
                            bg_color: ".json_encode($color, JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_TAG | JSON_HEX_AMP).",
                            thumbnail: '".BASE_URL.'/api/users?profileImage='.$mlst->editorId."',
                            sortIndex: ".$sortIndex.'
                        },';
            }
            ?>
        ];

        <?php if($login::userIsAtLeast($roles::$editor)): ?>
        leantime.ticketsController.initGanttChart(tasks, '<?php echo e($roadmapView); ?>', false);
        <?php else: ?>
        leantime.ticketsController.initGanttChart(tasks, '<?php echo e($roadmapView); ?>', true);
        <?php endif; ?>

    <?php } ?>


</script>
<?php $__env->stopPush(); ?> <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Tickets/Templates/roadmap.blade.php ENDPATH**/ ?>