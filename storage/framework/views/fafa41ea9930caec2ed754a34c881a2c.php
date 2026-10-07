<?php $__env->startSection('content'); ?>

<?php
    $allCanvas = $allCanvas ?? [];
    $canvasTitle = '';
    $canvasLabels = $canvasLabels ?? [];

    // get canvas title
    foreach ($allCanvas as $canvasRow) {
        if ($canvasRow['id'] == ($currentCanvas ?? '')) {
            $canvasTitle = $canvasRow['title'];
            break;
        }
    }
?>

<div class="pageheader">
    <div class="pageicon"><i class="far fa-lightbulb"></i></div>
    <div class="pagetitle">
        <?php if(count($allCanvas) > 0): ?>
            <?php if (isset($component)) { $__componentOriginaled82c7bef028765b9b2b447066c3673c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled82c7bef028765b9b2b447066c3673c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.subjectSwitcher','data' => ['parent' => __('headlines.ideas'),'current' => $canvasTitle]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::subjectSwitcher'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['parent' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('headlines.ideas')),'current' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($canvasTitle)]); ?>
                <?php if($login::userIsAtLeast($roles::$editor)): ?>
                    <li><a href="#/ideas/boardDialog"><?php echo __('links.icon.create_new_board'); ?></a></li>
                <?php endif; ?>
                <li class="border"></li>
                <?php $__currentLoopData = $allCanvas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $canvasRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href='<?php echo e(BASE_URL); ?>/ideas/showBoards/<?php echo e($canvasRow['id']); ?>'><?php echo e($tpl->escape($canvasRow['title'])); ?></a></li>
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
            <h1><?php echo __('headlines.ideas'); ?></h1>
        <?php endif; ?>
    </div>
    <?php if(count($allCanvas) > 0): ?>
        <div class="pageheader-right">
            <span class="dropdown dropdownWrapper headerEditDropdown">
                <a href="javascript:void(0)" class="dropdown-toggle btn btn-transparent" data-toggle="dropdown"><i class="fa-solid fa-ellipsis-v"></i></a>
                <ul class="dropdown-menu editCanvasDropdown ">
                    <?php if($login::userIsAtLeast($roles::$editor)): ?>
                        <li><a href="#/ideas/boardDialog/<?php echo e($currentCanvas); ?>"><?php echo __('links.icon.edit'); ?></a></li>
                        <li><a href="<?php echo e(BASE_URL); ?>/ideas/delCanvas/<?php echo e($currentCanvas); ?>" class="delete"><?php echo __('links.icon.delete'); ?></a></li>
                    <?php endif; ?>
                </ul>
            </span>
        </div>
    <?php endif; ?>
</div><!--pageheader-->

<div class="maincontent">
    <div class="maincontentinner" id="ideaBoards" style="min-height:350px;">
        <?php echo $tpl->displayNotification(); ?>


        <div class="row">
            <div class="col-md-4">
                <?php if($login::userIsAtLeast($roles::$editor)): ?>
                    <?php if(count($allCanvas) > 0): ?>
                        <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => '#/ideas/ideaDialog?type=idea','contentRole' => 'primary','id' => 'customersegment']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => '#/ideas/ideaDialog?type=idea','contentRole' => 'primary','id' => 'customersegment']); ?><span
                                    class="far fa-lightbulb"></span><?php echo __('buttons.add_idea'); ?> <?php echo $__env->renderComponent(); ?>
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
                <?php endif; ?>
            </div>

            <div class="col-md-4 center">
            </div>
            <div class="col-md-4">
                <div class="pull-right">
                    <div class="btn-group viewDropDown">
                        <button class="btn dropdown-toggle" data-toggle="dropdown"><?php echo __('buttons.idea_wall'); ?> <?php echo __('links.view'); ?></button>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo e(BASE_URL); ?>/ideas/showBoards" class="active"><?php echo __('buttons.idea_wall'); ?></a></li>
                            <li><a href="<?php echo e(BASE_URL); ?>/ideas/advancedBoards" class=""><?php echo __('buttons.idea_kanban'); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <div class="clearfix"></div>

        <?php if(count($allCanvas) > 0): ?>
            <div id="ideaMason" class="sortableTicketList" style="padding-top:10px;">

                <?php $__currentLoopData = $canvasItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="ticketBox" id="item_<?php echo e($row['id']); ?>" data-value="<?php echo e($row['id']); ?>">

                        <div class="row">
                            <div class="col-md-12">

                                <?php if($login::userIsAtLeast($roles::$editor)): ?>
                                    <div class="inlineDropDownContainer" style="float:right;">

                                        <a href="javascript:void(0);" class="dropdown-toggle ticketDropDown" data-toggle="dropdown">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                        &nbsp;&nbsp;&nbsp;
                                        <ul class="dropdown-menu">
                                            <li class="nav-header"><?php echo __('subtitles.edit'); ?></li>
                                            <li><a href="#/ideas/ideaDialog/<?php echo e($row['id']); ?>" class="" data="item_<?php echo e($row['id']); ?>"> <?php echo __('links.edit_canvas_item'); ?></a></li>
                                            <li><a href="#/ideas/delCanvasItem/<?php echo e($row['id']); ?>" class="delete" data="item_<?php echo e($row['id']); ?>"> <?php echo __('links.delete_canvas_item'); ?></a></li>

                                        </ul>
                                    </div>
                                <?php endif; ?>

                                <h4><a href="#/ideas/ideaDialog/<?php echo e($row['id']); ?>"
                                       data="item_<?php echo e($row['id']); ?>"><?php echo e($tpl->escape($row['description'])); ?></a></h4>

                                <div class="mainIdeaContent">
                                    <div class="kanbanCardContent">

                                        <div class="kanbanContent" style="margin-bottom: 20px; max-height:none;">
                                            <?php echo $tpl->escapeMinimal($row['data']); ?>

                                        </div>

                                    </div>
                                </div>

                                <div class="clearfix" style="padding-bottom: 8px;"></div>

                                <div class="dropdown ticketDropdown statusDropdown show firstDropdown colorized">
                                    <a class="dropdown-toggle f-left status <?php echo e($canvasLabels[$row['box']]['class']); ?> " href="javascript:void(0);" role="button" id="statusDropdownMenuLink<?php echo e($row['id']); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <span class="text"><?php echo e($canvasLabels[$row['box']]['name']); ?></span>
                                        &nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="statusDropdownMenuLink<?php echo e($row['id']); ?>">
                                        <li class="nav-header border"><?php echo __('dropdown.choose_status'); ?></li>

                                        <?php $__currentLoopData = $canvasLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo "<li class='dropdown-item'>
                                                <a href='javascript:void(0);' class='" . $label['class'] . "' data-label='" . $tpl->escape($label['name']) . "' data-value='" . $row['id'] . '_' . $key . '_' . $label['class'] . "' id='ticketStatusChange" . $row['id'] . $key . "' >" . $tpl->escape($label['name']) . "</a></li>"; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>


                                <div class="dropdown ticketDropdown userDropdown noBg show right lastDropdown dropRight">
                                    <a class="dropdown-toggle f-left" href="javascript:void(0);" role="button" id="userDropdownMenuLink<?php echo e($row['id']); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <span class="text">
                                                                        <?php if($row['authorFirstname'] != ''): ?>
                                                                            <?php echo "<span id='userImage" . $row['id'] . "'><img src='" . BASE_URL . "/api/users?profileImage=" . $row['author'] . "' width='25' style='vertical-align: middle;'/></span><span id='user" . $row['id'] . "'></span>"; ?>

                                                                        <?php else: ?>
                                                                            <?php echo "<span id='userImage" . $row['id'] . "'><img src='" . BASE_URL . "/api/users?profileImage=false' width='25' style='vertical-align: middle;'/></span><span id='user" . $row['id'] . "'></span>"; ?>

                                                                        <?php endif; ?>
                                                                    </span>

                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="userDropdownMenuLink<?php echo e($row['id']); ?>">
                                        <li class="nav-header border"><?php echo __('dropdown.choose_user'); ?></li>

                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo "<li class='dropdown-item'>
                                                                    <a href='javascript:void(0);' data-label='" . sprintf(__('text.full_name'), $tpl->escape($user['firstname']), $tpl->escape($user['lastname'])) . "' data-value='" . $row['id'] . '_' . $user['id'] . '_' . $user['profileId'] . "' id='userStatusChange" . $row['id'] . $user['id'] . "' ><img src='" . BASE_URL . "/api/users?profileImage=" . $user['id'] . "' width='25' style='vertical-align: middle; margin-right:5px;'/>" . sprintf(__('text.full_name'), $tpl->escape($user['firstname']), $tpl->escape($user['lastname'])) . "</a></li>"; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>

                                <div class="pull-right" style="margin-right:10px;">

                                    <a href="#/ideas/ideaDialog/<?php echo e($row['id']); ?>"
                                       class="" data="item_<?php echo e($row['id']); ?>"
                                        <?php echo $row['commentCount'] == 0 ? 'style="color: grey;"' : ''; ?>>
                                        <span class="fas fa-comments"></span></a> <small><?php echo e($row['commentCount']); ?></small>

                                </div>

                            </div>
                        </div>

                        <?php if($row['milestoneHeadline'] != ''): ?>
                            <br/>
                            <div hx-trigger="load"
                                 hx-indicator=".htmx-indicator"
                                 hx-get="<?php echo e(BASE_URL); ?>/hx/tickets/milestones/showCard?milestoneId=<?php echo e($row['milestoneId']); ?>">

                                <div class="htmx-indicator">
                                    <?php echo __('label.loading_milestone'); ?>

                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            <?php if(count($canvasItems) == 0): ?>
                <div class='center'>
                    <div style='width:30%' class='svgContainer'>
                        <?php echo file_get_contents(ROOT . '/dist/images/svg/undraw_new_ideas_jdea.svg'); ?>

                    </div>

                    <h3><?php echo __('headlines.have_an_idea'); ?></h3><br />
                    <?php echo __('subtitles.start_collecting_ideas'); ?><br/><br/>
                </div>
            <?php endif; ?>
            <div class="clearfix"></div>

        <?php else: ?>
            <br/><br/>
            <div class='center'>
                <div style='width:30%' class='svgContainer'>
                    <?php echo file_get_contents(ROOT . '/dist/images/svg/undraw_new_ideas_jdea.svg'); ?>

                </div>

                <h3><?php echo __('headlines.have_an_idea'); ?></h3><br />
                <?php echo __('subtitles.start_collecting_ideas'); ?><br/><br/>
                <?php if($login::userIsAtLeast($roles::$editor)): ?>
                <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => 'javascript:void(0)','class' => 'addCanvasLink','contentRole' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => 'javascript:void(0)','class' => 'addCanvasLink','contentRole' => 'primary']); ?><?php echo __('links.icon.create_new_board'); ?> <?php echo $__env->renderComponent(); ?>
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
        <!-- Modals -->

        <div class="modal fade bs-example-modal-lg" id="addCanvas">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"><?php echo __('headlines.start_new_idea_board'); ?></h4>
                        </div>
                        <div class="modal-body">
                            <label><?php echo __('label.topic_idea_board'); ?></label>
                            <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['name' => 'canvastitle','placeholder' => ''.e(__('input.placeholders.name_for_idea_board')).'','style' => 'width:90%']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'canvastitle','placeholder' => ''.e(__('input.placeholders.name_for_idea_board')).'','style' => 'width:90%']); ?>
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
                        </div>
                        <div class="modal-footer">
                            <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['inputType' => 'button','contentRole' => 'tertiary','dataDismiss' => 'modal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['inputType' => 'button','contentRole' => 'tertiary','data-dismiss' => 'modal']); ?><?php echo __('buttons.close'); ?> <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => __('buttons.create_board'),'name' => 'newCanvas']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.create_board')),'name' => 'newCanvas']); ?>
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
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade bs-example-modal-lg" id="editCanvas">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"><?php echo __('headlines.edit_board_name'); ?></h4>
                        </div>
                        <div class="modal-body">
                            <label><?php echo __('label.title_idea_board'); ?></label>
                            <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['name' => 'canvastitle','value' => ''.e($canvasTitle).'','style' => 'width:90%']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'canvastitle','value' => ''.e($canvasTitle).'','style' => 'width:90%']); ?>
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
                        </div>
                        <div class="modal-footer">
                            <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['inputType' => 'button','contentRole' => 'tertiary','dataDismiss' => 'modal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['inputType' => 'button','contentRole' => 'tertiary','data-dismiss' => 'modal']); ?><?php echo __('buttons.close'); ?> <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => __('buttons.save'),'name' => 'editCanvas']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.save')),'name' => 'editCanvas']); ?>
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
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="clearfix"></div>

    </div>
</div>

<?php if (! $__env->hasRenderedOnce('e6d2753d-98d9-4b22-b1b4-43e59b727144')): $__env->markAsRenderedOnce('e6d2753d-98d9-4b22-b1b4-43e59b727144'); ?>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">

    jQuery(document).ready(function () {

        leantime.ideasController.initMasonryWall();
        leantime.ideasController.initBoardControlModal();
        leantime.ideasController.initWallImageModals();

        <?php if($login::userIsAtLeast($roles::$editor)): ?>
            leantime.ideasController.initStatusDropdown();
            leantime.ideasController.initUserDropdown();
        <?php else: ?>
        leantime.authController.makeInputReadonly(".maincontentinner");
        <?php endif; ?>

        <?php if(isset($_GET['showIdeaModal'])): ?>
            <?php
                if ($_GET['showIdeaModal'] == '') {
                    $modalUrl = '&type=idea';
                } else {
                    $modalUrl = '/' . (int) $_GET['showIdeaModal'];
                }
            ?>

        leantime.ideasController.openModalManually("<?php echo e(BASE_URL); ?>/ideas/ideaDialog<?php echo e($modalUrl); ?>");
        window.history.pushState({}, document.title, '<?php echo e(BASE_URL); ?>/ideas/showBoards');

        <?php endif; ?>
    });

</script>
<?php $__env->stopPush(); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Ideas/Templates/showBoards.blade.php ENDPATH**/ ?>