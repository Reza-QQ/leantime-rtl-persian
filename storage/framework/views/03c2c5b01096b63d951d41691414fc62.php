<h4 class="widgettitle title-primary">
    <?php if(isset($canvasTypes[$elementName]['icon'])): ?>
        <i class="fas <?php echo e($canvasTypes[$elementName]['icon']); ?>"></i>
    <?php endif; ?>
    <?php echo e($canvasTypes[$elementName]['title']); ?>

</h4>
<div class="contentInner even status_<?php echo e($elementName); ?>"
     <?php echo isset($canvasTypes[$elementName]['color']) ? 'style="background: ' . $canvasTypes[$elementName]['color'] . ';"' : ''; ?>>

    <?php $__currentLoopData = $canvasItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $filterStatus = $filter['status'] ?? 'all';
            $filterRelates = $filter['relates'] ?? 'all';
        ?>

        <?php if($row['box'] === $elementName && ($filterStatus == 'all' || $filterStatus == $row['status']) && ($filterRelates == 'all' || $filterRelates == $row['relates'])): ?>
            <?php
                // Use the module-scoped count already computed by getCanvasItemsById
                // (avoids an unscoped per-item query that miscounts across modules).
                $nbcomments = (int) ($row['commentCount'] ?? 0);
            ?>

            <div class="ticketBox" id="item_<?php echo e($row['id']); ?>">
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
                                    <li class="nav-header"><?php echo __('subtitles.edit'); ?></li>
                                    <li><a href="#/blueprints/<?php echo e($canvasSlug); ?>/editCanvasItem/<?php echo e($row['id']); ?>"
                                           data="item_<?php echo e($row['id']); ?>"> <?php echo __('links.edit_canvas_item'); ?></a></li>
                                    <li><a href="#/blueprints/<?php echo e($canvasSlug); ?>/delCanvasItem/<?php echo e($row['id']); ?>"
                                           class="delete"
                                           data="item_<?php echo e($row['id']); ?>"> <?php echo __('links.delete_canvas_item'); ?></a></li>
                                </ul>
                            <?php endif; ?>
                        </div>

                        <h4><a href="#/blueprints/<?php echo e($canvasSlug); ?>/editCanvasItem/<?php echo e($row['id']); ?>"
                               data="item_<?php echo e($row['id']); ?>"><?php echo e($row['description']); ?></a></h4>

                        <?php if($row['conclusion'] != ''): ?>
                            <small><?php echo $tpl->convertRelativePaths($row['conclusion']); ?></small>
                        <?php endif; ?>

                        <div class="clearfix" style="padding-bottom: 8px;"></div>

                        <?php if(! empty($statusLabels)): ?>
                            <div class="dropdown ticketDropdown statusDropdown colorized show firstDropdown">
                                <a class="dropdown-toggle f-left status label-<?php echo e($statusLabels[$row['status']]['dropdown']); ?>"
                                   href="javascript:void(0);" role="button"
                                   id="statusDropdownMenuLink<?php echo e($row['id']); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="text"><?php echo e($statusLabels[$row['status']]['title']); ?></span> <i class="fa fa-caret-down" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="statusDropdownMenuLink<?php echo e($row['id']); ?>">
                                    <li class="nav-header border"><?php echo __('dropdown.choose_status'); ?></li>
                                    <?php $__currentLoopData = $statusLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($data['active'] || true): ?>
                                            <li class='dropdown-item'>
                                                <a href="javascript:void(0);" class="label-<?php echo e($data['dropdown']); ?>"
                                                   data-label='<?php echo e($data['title']); ?>' data-value="<?php echo e($row['id'] . '/' . $key); ?>"
                                                   id="ticketStatusChange<?php echo e($row['id']); ?><?php echo e($key); ?>"><?php echo e($data['title']); ?></a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <?php if(! empty($relatesLabels)): ?>
                            <div class="dropdown ticketDropdown relatesDropdown colorized show firstDropdown">
                                <a class="dropdown-toggle f-left relates label-<?php echo e($relatesLabels[$row['relates']]['dropdown']); ?>"
                                   href="javascript:void(0);" role="button"
                                   id="relatesDropdownMenuLink<?php echo e($row['id']); ?>" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                    <span class="text"><?php echo e($relatesLabels[$row['relates']]['title']); ?></span> <i class="fa fa-caret-down" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="relatesDropdownMenuLink<?php echo e($row['id']); ?>">
                                    <li class="nav-header border"><?php echo __('dropdown.choose_relates'); ?></li>
                                    <?php $__currentLoopData = $relatesLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($data['active'] || true): ?>
                                            <li class='dropdown-item'>
                                                <a href="javascript:void(0);" class="label-<?php echo e($data['dropdown']); ?>"
                                                   data-label='<?php echo e($data['title']); ?>'
                                                   data-value="<?php echo e($row['id'] . '/' . $key); ?>"
                                                   id="ticketRelatesChange<?php echo e($row['id']); ?><?php echo e($key); ?>"><?php echo e($data['title']); ?></a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <div class="dropdown ticketDropdown userDropdown noBg show right lastDropdown dropRight">
                            <a class="dropdown-toggle f-left" href="javascript:void(0);" role="button" id="userDropdownMenuLink<?php echo e($row['id']); ?>"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text">
                                    <?php if($row['authorFirstname'] != ''): ?>
                                        <span id='userImage<?php echo e($row['id']); ?>'><img src='<?php echo e(BASE_URL); ?>/api/users?profileImage=<?php echo e($row['author']); ?>' width='25' style='vertical-align: middle;'/></span><span id='user<?php echo e($row['id']); ?>'></span>
                                    <?php else: ?>
                                        <span id='userImage<?php echo e($row['id']); ?>'><img src='<?php echo e(BASE_URL); ?>/api/users?profileImage=false' width='25' style='vertical-align: middle;'/></span><span id='user<?php echo e($row['id']); ?>'></span>
                                    <?php endif; ?>
                                </span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="userDropdownMenuLink<?php echo e($row['id']); ?>">
                                <li class="nav-header border"><?php echo __('dropdown.choose_user'); ?></li>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class='dropdown-item'>
                                        <a href='javascript:void(0);' data-label='<?php echo e(sprintf(__('text.full_name'), e($user['firstname']), e($user['lastname']))); ?>' data-value='<?php echo e($row['id']); ?>_<?php echo e($user['id']); ?>_<?php echo e($user['profileId']); ?>' id='userStatusChange<?php echo e($row['id']); ?><?php echo e($user['id']); ?>'><img src='<?php echo e(BASE_URL); ?>/api/users?profileImage=<?php echo e($user['id']); ?>&v=<?php echo e($user['modified']); ?>' width='25' style='vertical-align: middle; margin-right:5px;'/><?php echo e(sprintf(__('text.full_name'), e($user['firstname']), e($user['lastname']))); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <div class="pull-right" style="margin-right:10px;">
                            <span class="fas fa-comments"></span> <small><?php echo e($nbcomments); ?></small>
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
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <br />
    <?php if($login::userIsAtLeast($roles::$editor)): ?>
        <a href="#/blueprints/<?php echo e($canvasSlug); ?>/editCanvasItem?type=<?php echo e($elementName); ?>"
           class="" id="<?php echo e($elementName); ?>"
           style="padding-bottom: 10px;"><?php echo __('links.add_new_canvas_item'); ?></a>
    <?php endif; ?>
</div>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Blueprints/Templates/element.blade.php ENDPATH**/ ?>