<?php $__env->startSection('content'); ?>

<?php

use Leantime\Domain\Comments\Repositories\Comments;
use Leantime\Domain\Goalcanvas\Services\Goalcanvas;


$elementName = 'goal';

/**
 * showCanvasTop.inc template - Top part of the main canvas page
 *
 * Required variables:
 * - goal      Name of current canvas
 */

$canvasTitle = '';

//get canvas title
foreach ($allCanvas as $canvasRow) {
    if ($canvasRow["id"] == $currentCanvas) {
        $canvasTitle = $canvasRow["title"];
        $canvasId = $canvasRow["id"];
        break;
    }
}

?>

<style>
    .canvas-row { margin-left: 0px; margin-right: 0px;}
    .canvas-title-only { border-radius: var(--box-radius-small); }
    h4.canvas-element-title-empty { background: white !important; border-color: white !important; }
    div.canvas-element-center-middle { text-align: center; }
</style>

<div class="pageheader">
    <div class="pageicon"><span class='fa <?php echo e($canvasIcon); ?>'></span></div>
    <div class="pagetitle">
        <?php if(count($allCanvas) > 0): ?>
            <?php if (isset($component)) { $__componentOriginaled82c7bef028765b9b2b447066c3673c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled82c7bef028765b9b2b447066c3673c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.subjectSwitcher','data' => ['parent' => __('headline.goal.dashboardboard'),'current' => 'همه گروه‌های هدف']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::subjectSwitcher'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['parent' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('headline.goal.dashboardboard')),'current' => 'همه گروه‌های هدف']); ?>
                <?php if($login::userIsAtLeast($roles::$editor)): ?>
                    <li><a href="#/goalcanvas/bigRock"><?php echo __("links.icon.create_new_board"); ?></a></li>
                <?php endif; ?>
                <li class="border"></li>
                <?php $__currentLoopData = $allCanvas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $canvasRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(BASE_URL); ?>/goalcanvas/showCanvas/<?php echo e($canvasRow['id']); ?>"><?php echo e($canvasRow['title']); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaled82c7bef028765b9b2b447066c3673c)): ?>
<?php $attributes = $__attributesOriginaled82c7bef028765b9b2b447066c3673c; ?>
<?php unset($__attributesOriginaled82c7bef028765b9b2b447066c3673c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaled82c7bef028765b9b2b447066c3673c)): ?>
<?php $component = $__componentOriginaled82c7bef028765b9b2b447066c3673c; ?>
<?php unset($__componentOriginaled82c7bef028765b9b2b447066c3673c); ?>
<?php endif; ?>
        <?php else: ?>
            <h1><?php echo e(__("headline.goal.dashboardboard")); ?></h1>
        <?php endif; ?>
    </div>
</div><!--pageheader-->

<div class="maincontent">

<div class="row" style="margin-bottom:20px; ">
    <div class="col-md-4">
        <div class="bigNumberBox" style="padding: 29px 15px;">
            <h2>پیشرفت: <?php echo e(round($goalStats['avgPercentComplete'])); ?>%</h2>

            <div class="progress" style="margin-top:5px;">
                <div class="progress-bar progress-bar-success" role="progressbar"
                     aria-valuenow="<?php echo e(round($goalStats['avgPercentComplete'])); ?>" aria-valuemin="0" aria-valuemax="100"
                     style="width: <?php echo e($goalStats['avgPercentComplete']); ?>%">
                    <span class="sr-only"><?php echo e(sprintf(__("text.percent_complete"), round($goalStats['avgPercentComplete']))); ?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-2">
        <div class="bigNumberBox priority-border-4">
            <h2>در مسیر</h2>
            <span class="content"><?php echo e($goalStats['goalsOnTrack']); ?></span>
        </div>
    </div>
    <div class="col-md-2">
        <div class="bigNumberBox priority-border-3">
            <h2>در خطر</h2>
            <span class="content"><?php echo e($goalStats['goalsAtRisk']); ?></span>
        </div>
    </div>
    <div class="col-md-2">
        <div class="bigNumberBox priority-border-1">
            <h2>از دست رفته</h2>
            <span class="content"><?php echo e($goalStats['goalsMiss']); ?></span>
        </div>
    </div>
</div>

<div class="maincontentinner">
    <div class="row">
        <div class="col-md-6"></div>
    </div>
    <?php if(count($allCanvas) > 0): ?>
        <?php $__currentLoopData = $allCanvas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $canvasRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row">
                <div class="col-md-12">
                    <a href='#/goalcanvas/editCanvasItem?type=goal&canvasId=<?php echo e($canvasRow["id"]); ?>' class='btn btn-primary pull-right'><i class="fa fa-plus"></i> ایجاد هدف جدید</a>

                    <h5 class='subtitle'><a href='<?php echo e(BASE_URL); ?>/goalcanvas/showCanvas/<?php echo e($canvasRow["id"]); ?>'><?php echo e($canvasRow["title"]); ?></a></h5>
                </div>
            </div>
            <div class="row" style="border-bottom:1px solid var(--main-border-color); margin-bottom:20px">
                <?php
                $canvasSvc = app()->make(Goalcanvas::class);
                $canvasItems = $canvasSvc->getCanvasItemsById($canvasRow["id"]);
                ?>
                <div id="sortableCanvasKanban-<?php echo e($canvasRow['id']); ?>" class="sortableTicketList disabled col-md-12" style="padding-top:15px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <?php if(!is_countable($canvasItems) || count($canvasItems) == 0): ?>
                                    <div class='col-md-12'>هنوز هدفی در این تخته وجود ندارد. برای شروع افزودن اهداف، <a href='<?php echo e(BASE_URL); ?>/goalcanvas/showCanvas/<?php echo e($canvasRow["id"]); ?>'>تخته</a> را باز کنید</div>
                                <?php endif; ?>
                                <?php $__currentLoopData = $canvasItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $filterStatus = $filter['status'] ?? 'all';
                                    $filterRelates = $filter['relates'] ?? 'all';
                                    ?>
                                    <?php if($row['box'] === $elementName && ($filterStatus == 'all' || $filterStatus == $row['status']) && ($filterRelates == 'all' || $filterRelates == $row['relates'])): ?>
                                        <?php
                                        $comments = app()->make(Comments::class);
                                        $nbcomments = $comments->countComments(moduleId: $row['id']);
                                        ?>
                                        <div class="col-md-4">
                                            <div class="ticketBox" id="item_<?php echo e($row["id"]); ?>">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="inlineDropDownContainer" style="float:right;">
                                                            <?php if($login::userIsAtLeast($roles::$editor)): ?>
                                                                <a href="javascript:void(0)" class="dropdown-toggle ticketDropDown" data-toggle="dropdown">
                                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                                </a>
                                                            <?php endif; ?>
                                                            <?php if($login::userIsAtLeast($roles::$editor)): ?>
                                                                &nbsp;&nbsp;&nbsp;
                                                                <ul class="dropdown-menu">
                                                                    <li class="nav-header"><?php echo e(__("subtitles.edit")); ?></li>
                                                                    <li><a href="#/goalcanvas/editCanvasItem/<?php echo e($row["id"]); ?>" class="goalCanvasModal" data="item_<?php echo e($row["id"]); ?>"><?php echo __("links.edit_canvas_item"); ?></a></li>
                                                                    <li><a href="#/goalcanvas/delCanvasItem/<?php echo e($row["id"]); ?>" class="delete goalCanvasModal" data="item_<?php echo e($row["id"]); ?>"><?php echo __("links.delete_canvas_item"); ?></a></li>
                                                                </ul>
                                                            <?php endif; ?>
                                                        </div>

                                                        <h4>
                                                            <strong>هدف:</strong>
                                                            <a href="#/goalcanvas/editCanvasItem/<?php echo e($row['id']); ?>" class="goalCanvasModal" data="item_<?php echo e($row['id']); ?>">
                                                                <?php echo e($row["title"]); ?>

                                                            </a>
                                                        </h4>
                                                        <br />
                                                        <strong>معیار:</strong> <?php echo e($row["description"]); ?>

                                                        <br /><br />

                                                        <?php
                                                        $percentDone = $row["goalProgress"];
                                                        $metricTypeFront = '';
                                                        $metricTypeBack = '';
                                                        if ($row["metricType"] == "percent") {
                                                            $metricTypeBack = '%';
                                                        } elseif ($row["metricType"] == "currency") {
                                                            $metricTypeFront = __("language.currency");
                                                        }
                                                        ?>

                                                        <div class="row">
                                                            <div class="col-md-4"></div>
                                                            <div class="col-md4 center">
                                                                <small><?php echo e(sprintf(__("text.percent_complete"), $percentDone)); ?></small>
                                                            </div>
                                                            <div class="col-md-4"></div>
                                                        </div>
                                                        <div class="progress" style="margin-bottom:0px;">
                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo e($percentDone); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e($percentDone); ?>%">
                                                                <span class="sr-only"><?php echo e(sprintf(__("text.percent_complete"), $percentDone)); ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="row" style="padding-bottom:0px;">
                                                            <div class="col-md-4">
                                                                <small>شروع:<br /><?php echo e($metricTypeFront . $row["startValue"] . $metricTypeBack); ?></small>
                                                            </div>
                                                            <div class="col-md-4 center">
                                                                <small><?php echo e(__('label.current')); ?>:<br /><?php echo e($metricTypeFront . $row["currentValue"] . $metricTypeBack); ?></small>
                                                            </div>
                                                            <div class="col-md-4" style="text-align:right">
                                                                <small><?php echo e(__('label.goal')); ?>:<br /><?php echo e($metricTypeFront . $row["endValue"] . $metricTypeBack); ?></small>
                                                            </div>
                                                        </div>

                                                        <div class="clearfix" style="padding-bottom: 8px;"></div>

                                                        <?php if(!empty($statusLabels)): ?>
                                                            <div class="dropdown ticketDropdown statusDropdown colorized show firstDropdown">
                                                                <a class="dropdown-toggle f-left status label-<?php echo e($row['status'] != "" ? $statusLabels[$row['status']]['dropdown'] : ""); ?>" href="javascript:void(0);" role="button" id="statusDropdownMenuLink<?php echo e($row['id']); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <span class="text"><?php echo e($row['status'] != "" ? $statusLabels[$row['status']]['title'] : ""); ?></span> <i class="fa fa-caret-down" aria-hidden="true"></i>
                                                                </a>
                                                                <ul class="dropdown-menu" aria-labelledby="statusDropdownMenuLink<?php echo e($row['id']); ?>">
                                                                    <li class="nav-header border"><?php echo e(__("dropdown.choose_status")); ?></li>
                                                                    <?php $__currentLoopData = $statusLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if($data['active'] || true): ?>
                                                                            <li class='dropdown-item'>
                                                                                <a href="javascript:void(0);" class="label-<?php echo e($data['dropdown']); ?>" data-label='<?php echo e($data["title"]); ?>' data-value="<?php echo e($row['id'] . "/" . $key); ?>" id="ticketStatusChange<?php echo e($row['id'] . $key); ?>"><?php echo $data['title']; ?></a>
                                                                            </li>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </ul>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if(!empty($relatesLabels)): ?>
                                                            <div class="dropdown ticketDropdown relatesDropdown colorized show firstDropdown">
                                                                <a class="dropdown-toggle f-left relates label-<?php echo e($relatesLabels[$row['relates']]['dropdown']); ?>" href="javascript:void(0);" role="button" id="relatesDropdownMenuLink<?php echo e($row['id']); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <span class="text"><?php echo e($relatesLabels[$row['relates']]['title']); ?></span> <i class="fa fa-caret-down" aria-hidden="true"></i>
                                                                </a>
                                                                <ul class="dropdown-menu" aria-labelledby="relatesDropdownMenuLink<?php echo e($row['id']); ?>">
                                                                    <li class="nav-header border"><?php echo e(__("dropdown.choose_relates")); ?></li>
                                                                    <?php $__currentLoopData = $relatesLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if($data['active'] || true): ?>
                                                                            <li class='dropdown-item'>
                                                                                <a href="javascript:void(0);" class="label-<?php echo e($data['dropdown']); ?>" data-label='<?php echo e($data["title"]); ?>' data-value="<?php echo e($row['id'] . "/" . $key); ?>" id="ticketRelatesChange<?php echo e($row['id'] . $key); ?>"><?php echo $data['title']; ?></a>
                                                                            </li>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </ul>
                                                            </div>
                                                        <?php endif; ?>

                                                        <div class="dropdown ticketDropdown userDropdown noBg show right lastDropdown dropRight">
                                                            <a class="dropdown-toggle f-left" href="javascript:void(0);" role="button" id="userDropdownMenuLink<?php echo e($row['id']); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="text">
                                                                    <?php if($row["authorFirstname"] != ""): ?>
                                                                        <span id='userImage<?php echo e($row['id']); ?>'>
                                                                            <img src='<?php echo e(BASE_URL); ?>/api/users?profileImage=<?php echo e($row['author']); ?>' width='25' style='vertical-align: middle;'/>
                                                                        </span>
                                                                        <span id='user<?php echo e($row['id']); ?>'></span>
                                                                    <?php else: ?>
                                                                        <span id='userImage<?php echo e($row['id']); ?>'>
                                                                            <img src='<?php echo e(BASE_URL); ?>/api/users?profileImage=false' width='25' style='vertical-align: middle;'/>
                                                                        </span>
                                                                        <span id='user<?php echo e($row['id']); ?>'></span>
                                                                    <?php endif; ?>
                                                                </span>
                                                            </a>
                                                            <ul class="dropdown-menu" aria-labelledby="userDropdownMenuLink<?php echo e($row['id']); ?>">
                                                                <li class="nav-header border"><?php echo e(__("dropdown.choose_user")); ?></li>
                                                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li class='dropdown-item'>
                                                                        <a href='javascript:void(0);' data-label='<?php echo e(sprintf(__("text.full_name"), $tpl->escape($user["firstname"]), $tpl->escape($user['lastname']))); ?>' data-value='<?php echo e($row['id'] . "_" . $user['id'] . "_" . $user['profileId']); ?>' id='userStatusChange<?php echo e($row['id'] . $user['id']); ?>'>
                                                                            <img src='<?php echo e(BASE_URL); ?>/api/users?profileImage=<?php echo e($user['id']); ?>' width='25' style='vertical-align: middle; margin-right:5px;'/>
                                                                            <?php echo e(sprintf(__("text.full_name"), $tpl->escape($user["firstname"]), $tpl->escape($user['lastname']))); ?>

                                                                        </a>
                                                                    </li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </ul>
                                                        </div>

                                                        <div class="right" style="margin-right:10px;">
                                                            <span class="fas fa-comments"></span>
                                                            <small><?php echo e($nbcomments); ?></small>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php echo $__env->make('goalcanvas::partials.milestoneChips', ['milestones' => $row['milestones'] ?? []], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <br />
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</div>





<?php if(count($allCanvas) > 0): ?>
    
<?php else: ?>
    <br><br>
    <div class='center'>
        <div class='svgContainer'>
            <?php echo file_get_contents(ROOT . "/dist/images/svg/undraw_design_data_khdb.svg"); ?>

        </div>
        <h3><?php echo e(__("headlines.goal.analysis")); ?></h3>
        <br><?php echo __("text.goal.helper_content"); ?>


        <?php if($login::userIsAtLeast($roles::$editor)): ?>
            <br><br>
            <a href='javascript:void(0)' class='addCanvasLink btn btn-primary'>
                <?php echo e(__("links.icon.create_new_board")); ?>

            </a>
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php if(!empty($disclaimer) && count($allCanvas) > 0): ?>
    <small class="align-center"><?php echo e($disclaimer); ?></small>
<?php endif; ?>

<?php echo $tpl->viewFactory->make($tpl->getTemplatePath('canvas', 'modals'), $__data)->render(); ?>


</div>
</div>

<script type="text/javascript">
jQuery(document).ready(function() {
    if(jQuery('#searchCanvas').length > 0) {
        new SlimSelect({ select: '#searchCanvas' });
    }

    leantime.goalCanvasController.setRowHeights();
    leantime.canvasController.setCanvasName('goal');
    leantime.canvasController.initFilterBar();

    <?php if($login::userIsAtLeast($roles::$editor)): ?>
        leantime.canvasController.initCanvasLinks();
        leantime.canvasController.initUserDropdown();
        leantime.canvasController.initStatusDropdown();
        leantime.canvasController.initRelatesDropdown();
    <?php else: ?>
        leantime.authController.makeInputReadonly(".maincontentinner");
    <?php endif; ?>

    <?php if(isset($_GET['showModal'])): ?>
        <?php
            $modalUrl = $_GET['showModal'] == ""
                ? "&type=" . array_key_first($canvasTypes)
                : "/" . (int)$_GET['showModal'];
        ?>
        leantime.canvasController.openModalManually("<?php echo e(BASE_URL); ?>/goalcanvas/editCanvasItem<?php echo e($modalUrl); ?>");
        window.history.pushState({}, document.title, '<?php echo e(BASE_URL); ?>/goalcanvas/showCanvas/');
    <?php endif; ?>
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Goalcanvas/Templates/dashboard.blade.php ENDPATH**/ ?>