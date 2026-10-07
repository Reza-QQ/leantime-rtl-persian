<?php $__env->startSection('content'); ?>

<?php
    use Leantime\Domain\Logicmodelcanvas\Repositories\Logicmodelcanvas;
    use Leantime\Domain\Comments\Repositories\Comments;

    $canvasName = 'logicmodel';
    $allCanvas = $tpl->get('allCanvas');
    $canvasIcon = $tpl->get('canvasIcon');
    $canvasTypes = $tpl->get('canvasTypes');
    $statusLabels = $tpl->get('statusLabels');
    $relatesLabels = $tpl->get('relatesLabels');
    $dataLabels = $tpl->get('dataLabels');
    $disclaimer = $tpl->get('disclaimer');
    $canvasItems = $tpl->get('canvasItems');
    $currentCanvas = $tpl->get('currentCanvas');
    $users = $tpl->get('users');

    $filter['status'] = $_GET['filter_status'] ?? (session('filter_status') ?? 'all');
    // Logic model board does not use relates filter — force to 'all'
    $filter['relates'] = 'all';

    $canvasTitle = '';
    foreach ($allCanvas as $canvasRow) {
        if ($canvasRow['id'] == $currentCanvas) {
            $canvasTitle = $canvasRow['title'];
            break;
        }
    }

    $stages = Logicmodelcanvas::STAGES;
?>

<?php echo $__env->make('global::components.stageflow.styles', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>


<div class="pageheader">
    <div class="pageicon"><span class="fas <?php echo e($canvasIcon); ?>"></span></div>
    <div class="pagetitle">
        <?php if(count($allCanvas) > 0): ?>
            <?php if (isset($component)) { $__componentOriginaled82c7bef028765b9b2b447066c3673c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled82c7bef028765b9b2b447066c3673c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.subjectSwitcher','data' => ['parent' => $tpl->__('headline.logicmodel.board'),'current' => $canvasTitle]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::subjectSwitcher'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['parent' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tpl->__('headline.logicmodel.board')),'current' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($canvasTitle)]); ?>
                <?php if($login::userIsAtLeast($roles::$editor)): ?>
                    <li><a href="#/<?php echo e($canvasName); ?>canvas/boardDialog"><?php echo $tpl->__('links.icon.create_new_board'); ?></a></li>
                <?php endif; ?>
                <li class="border"></li>
                <?php $__currentLoopData = $allCanvas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $canvasRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(BASE_URL); ?>/<?php echo e($canvasName); ?>canvas/showCanvas/<?php echo e($canvasRow['id']); ?>"><?php echo e($tpl->escape($canvasRow['title'])); ?></a></li>
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
            <h1><?php echo e($tpl->__('headline.logicmodel.board')); ?></h1>
        <?php endif; ?>
    </div>
    <?php if(count($allCanvas) > 0): ?>
        <div class="pageheader-right">
            <span class="dropdown dropdownWrapper headerEditDropdown">
                <a href="javascript:void(0)" class="dropdown-toggle btn btn-transparent" data-toggle="dropdown"><i class="fa-solid fa-ellipsis-v"></i></a>
                <ul class="dropdown-menu editCanvasDropdown">
                    <?php if($login::userIsAtLeast($roles::$editor)): ?>
                        <li><a href="#/<?php echo e($canvasName); ?>canvas/boardDialog/<?php echo e($currentCanvas); ?>" class="editCanvasLink"><?php echo $tpl->__('links.icon.edit'); ?></a></li>
                    <?php endif; ?>
                    <li><a href="<?php echo e(BASE_URL); ?>/<?php echo e($canvasName); ?>canvas/export/<?php echo e($currentCanvas); ?>" hx-boost="false"><?php echo $tpl->__('links.icon.export'); ?></a></li>
                    <li><a href="javascript:window.print();"><?php echo $tpl->__('links.icon.print'); ?></a></li>
                    <?php $tpl->dispatchTplEvent('logicmodel.headerActions', ['canvasId' => $currentCanvas]); ?>
                    <?php if($login::userIsAtLeast($roles::$editor)): ?>
                        <li><a href="#/<?php echo e($canvasName); ?>canvas/delCanvas/<?php echo e($currentCanvas); ?>" class="delete"><?php echo $tpl->__('links.icon.delete'); ?></a></li>
                    <?php endif; ?>
                </ul>
            </span>
        </div>
    <?php endif; ?>
</div>

<div class="maincontent">
    <div class="maincontentinner">

        <?php echo $tpl->displayNotification(); ?>


        <?php if(count($allCanvas) > 0): ?>
            
            <div style="display:flex; align-items:center; gap:8px; margin-bottom:8px;">
                
                <?php if(!empty($statusLabels)): ?>
                    <?php
                        $statusColorMap = ['blue' => '#1B75BB', 'orange' => '#fdab3d', 'green' => '#75BB1B', 'red' => '#BB1B25', 'grey' => '#c3ccd4'];
                        if ($filter['status'] != 'all' && !isset($statusLabels[$filter['status']])) { $filter['status'] = 'all'; }
                        if ($filter['status'] == 'all') {
                            $statusFilterLabel = '<i class="fas fa-filter"></i> ' . $tpl->__('status.all');
                        } else {
                            $sc = $statusColorMap[$statusLabels[$filter['status']]['color']] ?? '#666';
                            $statusFilterLabel = '<i class="fas fa-fw ' . $statusLabels[$filter['status']]['icon'] . '" style="color:' . $sc . '"></i> ' . $statusLabels[$filter['status']]['title'];
                        }
                    ?>
                    
                    <div class="btn-group viewDropDown">
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?php echo $statusFilterLabel; ?></button>
                        <ul class="dropdown-menu" style="left:0; right:auto;">
                            <li><a href="<?php echo e(BASE_URL); ?>/<?php echo e($canvasName); ?>canvas/showCanvas?filter_status=all" <?php if($filter['status'] == 'all'): ?> class="active" <?php endif; ?>><i class="fas fa-globe"></i> <?php echo e($tpl->__('status.all')); ?></a></li>
                            <?php $__currentLoopData = $statusLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $iconColor = $statusColorMap[$data['color']] ?? '#666'; ?>
                                <li><a href="<?php echo e(BASE_URL); ?>/<?php echo e($canvasName); ?>canvas/showCanvas?filter_status=<?php echo e($key); ?>" <?php if($filter['status'] == $key): ?> class="active" <?php endif; ?>><i class="fas fa-fw <?php echo e($data['icon']); ?>" style="color:<?php echo e($iconColor); ?>"></i> <?php echo e($data['title']); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

            </div>
            

            <?php $tpl->dispatchTplEvent('logicmodel.beforeStageFlow', ['canvasId' => $currentCanvas, 'canvasItems' => $canvasItems]); ?>

            
            <div class="sf-flow" id="logicModelBoard">
                <?php $__currentLoopData = $stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $num => $stage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $boxKey = 'lm_' . $stage['key'];
                        $stageItems = array_filter($canvasItems, function ($item) use ($boxKey, $filter) {
                            if ($item['box'] !== $boxKey) return false;
                            if ($filter['status'] !== 'all' && $item['status'] !== $filter['status']) return false;
                            if ($filter['relates'] !== 'all' && $item['relates'] !== $filter['relates']) return false;
                            return true;
                        });
                        $itemCount = count($stageItems);
                    ?>

                    <?php if (isset($component)) { $__componentOriginalc347371c94c366f22751ceff8ee8e757 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc347371c94c366f22751ceff8ee8e757 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.stageflow.card','data' => ['stageKey' => $boxKey,'stageNum' => $num,'color' => $stage['color'],'bgColor' => $stage['bg'],'icon' => $stage['icon'],'title' => $tpl->__($stage['title']),'subtitle' => $tpl->__($stage['subtitle']),'active' => true,'itemCount' => $itemCount,'focusLabel' => '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::stageflow.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['stageKey' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($boxKey),'stageNum' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($num),'color' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($stage['color']),'bgColor' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($stage['bg']),'icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($stage['icon']),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tpl->__($stage['title'])),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tpl->__($stage['subtitle'])),'active' => true,'itemCount' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($itemCount),'focusLabel' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('')]); ?>
                         <?php $__env->slot('headerExtra', null, []); ?> 
                            <?php $tpl->dispatchTplEvent('logicmodel.afterStageHeader', ['stageNum' => $num, 'stage' => $stage, 'canvasId' => $currentCanvas, 'stageItems' => $stageItems]); ?>
                         <?php $__env->endSlot(); ?>

                         <?php $__env->slot('beforeBody', null, []); ?> 
                            <?php $tpl->dispatchTplEvent('logicmodel.beforeStageBody', ['stageNum' => $num, 'stage' => $stage, 'canvasId' => $currentCanvas]); ?>
                         <?php $__env->endSlot(); ?>

                        <?php $__currentLoopData = $stageItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $commentsRepo = app()->make(Comments::class);
                                $nbcomments = $commentsRepo->countComments(moduleId: $row['id']);
                                $statusColor = isset($statusLabels[$row['status']]) ? $statusLabels[$row['status']]['color'] : 'grey';
                            ?>

                            <?php if (isset($component)) { $__componentOriginal089a3191af98bacac3b8638422a43b9c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal089a3191af98bacac3b8638422a43b9c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.stageflow.item','data' => ['itemId' => $row['id'],'title' => $row['description'],'description' => $row['conclusion'] != '' ? $tpl->convertRelativePaths($row['conclusion']) : '','editUrl' => '#/' . $canvasName . 'canvas/editCanvasItem/' . $row['id'],'deleteUrl' => '#/' . $canvasName . 'canvas/delCanvasItem/' . $row['id'],'commentUrl' => '#/' . $canvasName . 'canvas/editCanvasComment/' . $row['id'],'commentCount' => $nbcomments,'authorId' => $row['author'],'authorName' => trim(($row['authorFirstname'] ?? '') . ' ' . ($row['authorLastname'] ?? '')),'dotColor' => $statusColor,'canEdit' => $login::userIsAtLeast($roles::$editor)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::stageflow.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['itemId' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($row['id']),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($row['description']),'description' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($row['conclusion'] != '' ? $tpl->convertRelativePaths($row['conclusion']) : ''),'editUrl' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('#/' . $canvasName . 'canvas/editCanvasItem/' . $row['id']),'deleteUrl' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('#/' . $canvasName . 'canvas/delCanvasItem/' . $row['id']),'commentUrl' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('#/' . $canvasName . 'canvas/editCanvasComment/' . $row['id']),'commentCount' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($nbcomments),'authorId' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($row['author']),'authorName' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trim(($row['authorFirstname'] ?? '') . ' ' . ($row['authorLastname'] ?? ''))),'dotColor' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($statusColor),'canEdit' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($login::userIsAtLeast($roles::$editor))]); ?>
                                <?php $tpl->dispatchTplEvent('logicmodel.itemCardFooter', ['item' => $row, 'canvasId' => $currentCanvas]); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal089a3191af98bacac3b8638422a43b9c)): ?>
<?php $attributes = $__attributesOriginal089a3191af98bacac3b8638422a43b9c; ?>
<?php unset($__attributesOriginal089a3191af98bacac3b8638422a43b9c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal089a3191af98bacac3b8638422a43b9c)): ?>
<?php $component = $__componentOriginal089a3191af98bacac3b8638422a43b9c; ?>
<?php unset($__componentOriginal089a3191af98bacac3b8638422a43b9c); ?>
<?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php if($itemCount === 0): ?>
                            <div class="sf-empty">
                                <i class="fa <?php echo e($stage['icon']); ?> sf-empty-icon" style="color: <?php echo e($stage['color']); ?>;"></i>
                                <?php echo e($tpl->__('text.no_items_yet')); ?>

                            </div>
                        <?php endif; ?>

                        <?php if($login::userIsAtLeast($roles::$editor)): ?>
                            <a class="sf-add" href="#/<?php echo e($canvasName); ?>canvas/editCanvasItem?type=<?php echo e($boxKey); ?>">
                                <i class="fa fa-plus"></i> <?php echo e($tpl->__('logicmodel.add_' . $stage['key'])); ?>

                            </a>
                        <?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc347371c94c366f22751ceff8ee8e757)): ?>
<?php $attributes = $__attributesOriginalc347371c94c366f22751ceff8ee8e757; ?>
<?php unset($__attributesOriginalc347371c94c366f22751ceff8ee8e757); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc347371c94c366f22751ceff8ee8e757)): ?>
<?php $component = $__componentOriginalc347371c94c366f22751ceff8ee8e757; ?>
<?php unset($__componentOriginalc347371c94c366f22751ceff8ee8e757); ?>
<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <?php $tpl->dispatchTplEvent('logicmodel.afterStageFlow', ['canvasId' => $currentCanvas, 'canvasItems' => $canvasItems]); ?>

            <div class="clearfix"></div>
        <?php endif; ?>

        
        <?php if(count($allCanvas) == 0): ?>
            <br /><br />
            <div class="center">
                <div class="svgContainer">
                    <?php echo file_get_contents(ROOT . '/dist/images/svg/undraw_design_data_khdb.svg'); ?>

                </div>
                <h3><?php echo e($tpl->__('headlines.logicmodel.analysis')); ?></h3>
                <br /><?php echo $tpl->__('text.logicmodel.helper_content'); ?>

                <?php if($login::userIsAtLeast($roles::$editor)): ?>
                    <br /><br />
                    <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => 'javascript:void(0)','class' => 'addCanvasLink','contentRole' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => 'javascript:void(0)','class' => 'addCanvasLink','contentRole' => 'primary']); ?>
                        <?php echo e($tpl->__('links.icon.create_new_board')); ?>

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
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if(!empty($disclaimer) && count($allCanvas) > 0): ?>
            <small class="center"><?php echo e($disclaimer); ?></small>
        <?php endif; ?>

        <?php echo $tpl->viewFactory->make($tpl->getTemplatePath('canvas', 'modals'), $__data)->render(); ?>


        
        <div id="templateSelectorContainer"></div>

    </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function () {

        if (jQuery('#searchCanvas').length > 0) {
            new SlimSelect({ select: '#searchCanvas' });
        }

        <?php if(isset($_GET['closeModal'])): ?>
            jQuery.nmTop().close();
        <?php endif; ?>

        leantime.canvasController.setCanvasName('logicmodel');
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
                if ($_GET['showModal'] == '') {
                    $modalUrl = '&type=' . array_key_first($canvasTypes);
                } else {
                    $modalUrl = '/' . (int) $_GET['showModal'];
                }
            ?>
            leantime.canvasController.openModalManually("<?php echo e(BASE_URL); ?>/<?php echo e($canvasName); ?>canvas/editCanvasItem<?php echo e($modalUrl); ?>");
            window.history.pushState({}, document.title, '<?php echo e(BASE_URL); ?>/<?php echo e($canvasName); ?>canvas/showCanvas/');
        <?php endif; ?>

        // Reload page when sector fixture is loaded (items were added server-side by the plugin)
        document.body.addEventListener('logicmodel.fixtureLoaded', function () {
            window.location.reload();
        });

    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Logicmodelcanvas/Templates/showCanvas.blade.php ENDPATH**/ ?>