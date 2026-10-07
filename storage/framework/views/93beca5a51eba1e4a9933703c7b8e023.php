<?php $__env->startSection('content'); ?>
<?php if (isset($component)) { $__componentOriginal73464617f1e536702d3c383ba117853c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal73464617f1e536702d3c383ba117853c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.pageheader','data' => ['icon' => 'fa fa-gauge-high']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::pageheader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('fa fa-gauge-high')]); ?>
    <?php if(count($allUsers) == 1): ?>
        <a href="#/users/newUser" class="headerCTA">
            <i class="fa fa-users"></i>
            <span class="tw-text-[14px] tw-leading-[25px]">
                <?php echo e(__('links.dont_do_it_alone')); ?>

            </span>
        </a>
    <?php endif; ?>

    <h5><?php echo e(session("currentProjectClient")); ?></h5>
    <h1><?php echo __('headlines.project_dashboard'); ?></h1>
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
    <?php echo $tpl->displayNotification(); ?>


    <div class="row">

        <div class="col-md-8">

            <div class="maincontentinner tw-z-20">

                <?php if($login::userIsAtLeast($roles::$admin)): ?>
                    <div class="pull-right dropdownWrapper">
                        <a
                            class="dropdown-toggle btn round-button"
                            data-toggle="dropdown"
                            data-tippy-content="<?php echo e(__('label.edit_project')); ?>"
                            href="<?php echo e(BASE_URL); ?>/projects/showProject/<?php echo e($project['id']); ?>"
                        ><i class="fa fa-ellipsis"></i></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item">
                                <a
                                    href="<?php echo e(BASE_URL); ?>/projects/showProject/<?php echo e($project['id']); ?>"

                                ><i class="fa fa-edit"></i> ویرایش پروژه</a>
                            </li>
                            <li class="dropdown-item">
                                <a
                                    href="<?php echo e(BASE_URL); ?>/projects/delProject/<?php echo e($project['id']); ?>"
                                    class="delete"

                                ><i class="fa fa-trash"></i> حذف پروژه</a>
                            </li>

                        </ul>
                    </div>
                <?php endif; ?>

                <div class="pull-right dropdownWrapper tw-mr-[5px]">
                    <a
                        class="dropdown-toggle btn round-button"
                        data-toggle="dropdown"
                        data-tippy-content="<?php echo e(__('label.copy_url_tooltip')); ?>"
                        href="<?php echo e(BASE_URL); ?>/projects/changeCurrentProject/<?php echo e($project['id']); ?>"
                    ><i class="fa fa-link"></i></a>
                    <div class="dropdown-menu padding-md">
                        <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['id' => 'projectUrl','value' => ''.e(BASE_URL).'/projects/changeCurrentProject/'.e($project['id']).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'projectUrl','value' => ''.e(BASE_URL).'/projects/changeCurrentProject/'.e($project['id']).'']); ?>
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
                        <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['contentRole' => 'primary','onclick' => 'leantime.snippets.copyUrl(\'projectUrl\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['contentRole' => 'primary','onclick' => 'leantime.snippets.copyUrl(\'projectUrl\')']); ?><?php echo e(__('links.copy_url')); ?> <?php echo $__env->renderComponent(); ?>
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

                <a
                    href="javascript:void(0);"
                    id="favoriteProject"
                    class="btn pull-right margin-right <?php echo e($isFavorite ? 'isFavorite' : ''); ?> tw-mr-[5px] round-button"
                    data-tippy-content="<?php echo e(__('label.favorite_tooltip')); ?>"
                ><i class="<?php echo e($isFavorite ? 'fa-solid' : 'fa-regular'); ?> fa-star"></i></a>



                <h3><?php echo e(session("currentProjectClient")); ?></h3>

                <h1 class="articleHeadline"><?php echo e($currentProjectName); ?></h1>

                <br/>

                <?php echo $__env->make('projects::partials.checklist', [
                    'progressSteps' => $progressSteps,
                    'percentDone' => $percentDone
                ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                <br/><br/>

                    <strong><?php echo e(__('label.background')); ?></strong><br/>
                <div class="readMoreBox">
                    <div class="tiptap-content kanbanContent closed tw-max-h-[200px] readMoreContent tw-pb-[30px]" id="projectDescription">
                        <?php echo $tpl->escapeMinimal($project['details']); ?>

                    </div>

                    <div class="center readMoreToggle" style="display:none;">
                        <a href="javascript:void(0)" id="descriptionReadMoreToggle"><?php echo e(__('label.read_more')); ?></a>
                    </div>
                </div>


                <br/>

            </div>

            <div class="maincontentinner tw-z-10 latest-todos">
                <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => '#/tickets/newTicket','contentRole' => 'link','class' => 'action-link pull-right','style' => 'margin-top:-7px;']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => '#/tickets/newTicket','contentRole' => 'link','class' => 'action-link pull-right','style' => 'margin-top:-7px;']); ?><i class="fa fa-plus"></i> Create To-Do <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $attributes = $__attributesOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__attributesOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $component = $__componentOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__componentOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
                <h5 class="subtitle"><?php echo e(__('headlines.latest_todos')); ?></h5>
                <br/>
                <ul class="sortableTicketList">
                    <?php if(count($tickets) == 0): ?>
                        <em>Nothing to see here. Move on.</em><br/><br/>
                    <?php endif; ?>

                    <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="ui-state-default" id="ticket_<?php echo $row['id']; ?>">
                            <div class="ticketBox fixed priority-border-<?php echo $row['priority']; ?>" data-val="<?php echo $row['id']; ?>">
                                <div class="row">
                                    <div class="col-md-12 timerContainer tw-py-[5px] tw-px-[15px]" id="timerContainer-<?php echo $row['id']; ?>">
                                        <?php if($row['dependingTicketId'] > 0): ?>
                                        <a href="#/tickets/showTicket/<?php echo e($row['dependingTicketId']); ?>">
                                            <?php echo e($row['parentHeadline']); ?>

                                        </a>
                                            //
                                        <?php endif; ?>

                                        <a href="#/tickets/showTicket/<?php echo e($row['id']); ?>">
                                            <strong><?php echo e($row['headline']); ?></strong>
                                        </a>

                                        <?php echo $__env->make("tickets::partials.ticketsubmenu", ["ticket" => $row,"onTheClock" => $onTheClock], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 tw-px-[15px] tw-py-0">

                                        <i class="fa-solid fa-business-time infoIcon" data-tippy-content=" <?php echo e(__("label.due")); ?>"></i>

                                             <input
                                            type="text"
                                            title="<?php echo e(__('label.due')); ?>"
                                            value="<?php echo e(format($row['dateToFinish'])->date(__('text.anytime'))); ?>"
                                            class="duedates secretInput"
                                            data-id="<?php echo e($row['id']); ?>"
                                            name="date"
                                        />
                                    </div>
                                    <div class="col-md-8 tw-mt-[3px]">
                                        <div class="right">
                                            <div class="dropdown ticketDropdown effortDropdown show">
                                                <a
                                                    class="dropdown-toggle f-left label-default effort"
                                                    href="javascript:void(0);"
                                                    role="button"
                                                    id="effortDropdownMenuLink<?php echo e($row['id']); ?>"
                                                    data-toggle="dropdown"
                                                    aria-haspopup="true"
                                                    aria-expanded="false"
                                                ><span class="text">
                                                     <?php echo e($row['storypoints'] != '' && $row['storypoints'] > 0
                                                            ? ($efforts[''.$row['storypoints'].''] ?? $row['storypoints'])
                                                            : __('label.story_points_unkown')); ?>

                                                </span>&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i></a>

                                                <ul class="dropdown-menu" aria-labelledby="effortDropdownMenuLink<?php echo e($row['id']); ?>">
                                                    <li class="nav-header border"><?php echo e(__('dropdown.how_big_todo')); ?></li>
                                                    <?php $__currentLoopData = $efforts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $effortKey => $effortValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li class="dropdown-item">
                                                            <a
                                                                href="javascript:void(0)"
                                                                data-value="<?php echo e($row['id']); ?>_<?php echo e($effortKey); ?>"
                                                                id="ticketEffortChange_<?php echo e($row['id'] . $effortKey); ?>"
                                                            ><?php echo e($effortValue); ?></a>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>

                                            <div class="dropdown ticketDropdown milestoneDropdown colorized show">
                                                <a
                                                    style="background-color:<?php echo e(__($row['milestoneColor'])); ?>"
                                                    class="dropdown-toggle f-left label-default milestone"
                                                    href="javascript:void(0);"
                                                    role="button"
                                                    id="milestoneDropdownMenuLink<?php echo e($row['id']); ?>"
                                                    data-toggle="dropdown"
                                                    aria-haspopup="true"
                                                    aria-expanded="false"
                                                ><span class="text">
                                                    <?php echo e($row['milestoneid'] != '' && $row['milestoneid'] != 0
                                                        ? $row['milestoneHeadline']
                                                        : __('label.no_milestone')); ?>

                                                </span>&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i></a>

                                                <ul class="dropdown-menu" aria-labeledby="milestoneDropdownMenuLink<?php echo e($row['id']); ?>">
                                                    <li class="nav-header border"><?php echo e(__('dropdown.choose_milestone')); ?></li>
                                                    <li class="dropdown-item">
                                                        <a
                                                            href="javascript:void(0);"
                                                            data-label="<?php echo e(__('label.no_milestone')); ?>"
                                                            data-value="<?php echo e($row['id']); ?>_0_#b0b0b0"
                                                            class="tw-bg-[#b0b0b0]"
                                                        ><?php echo e(__('label.no_milestone')); ?></a>
                                                    </li>
                                                    <?php $__currentLoopData = $milestones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $milestone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li class="dropdown-item">
                                                            <a
                                                                href="javascript:void(0);"
                                                                data-label="<?php echo e($milestone->headline); ?>"
                                                                data-value="<?php echo e($row['id']); ?>_<?php echo $milestone->id; ?>_<?php echo e($milestone->tags); ?>"
                                                                id="ticketMilestoneChange_<?php echo e($row['id'] . $milestone->id); ?>"
                                                                style="background-color:<?php echo e($milestone->tags); ?>"
                                                            ><?php echo e($milestone->headline); ?></a>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>

                                            <div class="dropdown ticketDropdown statusDropdown colorized show">
                                                <a
                                                    class="dropdown-toggle f-left status <?php echo $statusLabels[$row['status']]['class']; ?>"
                                                    href="javascript:void(0);"
                                                    role="button"
                                                    id="statusDropdownMenuLink<?php echo e($row['id']); ?>"
                                                    data-toggle="dropdown"
                                                    aria-haspopup="true"
                                                    aria-expanded="false"
                                                ><span class="text"><?php echo $statusLabels[$row['status']]['name']; ?></span>&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i></a>

                                                <ul class="dropdown-menu" aria-labelledby="statusDropdownMenuLink<?php echo $row['id']; ?>">
                                                    <li class="nav-header border"><?php echo e(__('dropdown.choose_status')); ?></li>
                                                    <?php $__currentLoopData = $statusLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li class="dropdown-item">
                                                            <a
                                                                href="javascript:void(0);"
                                                                class="<?php echo $label['class']; ?>"
                                                                data-label="<?php echo e($label['name']); ?>"
                                                                data-value="<?php echo e($row['id']); ?>_<?php echo e($key); ?>_<?php echo $label['class']; ?>"
                                                                id="ticketStatusChange<?php echo e($row['id'] . $key); ?>"
                                                            ><?php echo e($label['name']); ?></a>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

            <div class="maincontentinner team-container">
                <?php $tpl->dispatchTplEvent('teamBoxBeginning', ['project' => $project]); ?>

                <h5 class="subtitle"><?php echo e(__('tabs.team')); ?></h5>

                <div class="row teamBox">
                    <?php $__currentLoopData = $project['assignedUsers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userId => $assignedUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3">
                            <?php if (isset($component)) { $__componentOriginal1c28f06779e4d891f5072c46d026ba7e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1c28f06779e4d891f5072c46d026ba7e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'users::components.profile-box','data' => ['user' => $assignedUser]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('users::profile-box'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($assignedUser)]); ?>
                                <?php ob_start(); ?>
                                    <?php $hasName = $assignedUser['firstname'] != '' || $assignedUser['lastname'] != ''; ?>

                                    <?php if($hasName): ?>
                                        <?php echo e(sprintf(
                                            __('text.full_name'),
                                            $assignedUser['firstname'],
                                            $assignedUser['lastname'],
                                        )); ?>

                                    <?php else: ?>
                                        <?php echo e($assignedUser['username']); ?>

                                    <?php endif; ?>

                                    <br />
                                    <small><?php echo e($hasName ? $assignedUser['jobTitle'] : __('label.invited')); ?></small>

                                    <?php if($hasName): ?>
                                        <?php $tpl->dispatchTplEvent('usercardBottom', ['user' => $assignedUser, 'project' => $project]); ?>
                                    <?php endif; ?>
                                <?php echo preg_replace('/>\s+</', '><', ob_get_clean()); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1c28f06779e4d891f5072c46d026ba7e)): ?>
<?php $attributes = $__attributesOriginal1c28f06779e4d891f5072c46d026ba7e; ?>
<?php unset($__attributesOriginal1c28f06779e4d891f5072c46d026ba7e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1c28f06779e4d891f5072c46d026ba7e)): ?>
<?php $component = $__componentOriginal1c28f06779e4d891f5072c46d026ba7e; ?>
<?php unset($__componentOriginal1c28f06779e4d891f5072c46d026ba7e); ?>
<?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if($login::userIsAtLeast($roles::$manager)): ?>
                        <div class="col-md-3">
                            <?php if (isset($component)) { $__componentOriginal1c28f06779e4d891f5072c46d026ba7e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1c28f06779e4d891f5072c46d026ba7e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'users::components.profile-box','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('users::profile-box'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <a href="#/users/newUser?preSelectProjectId=<?php echo e($project['id']); ?>">
                                    <?php echo e(__('links.invite_user')); ?>

                                </a><br/>&nbsp;
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1c28f06779e4d891f5072c46d026ba7e)): ?>
<?php $attributes = $__attributesOriginal1c28f06779e4d891f5072c46d026ba7e; ?>
<?php unset($__attributesOriginal1c28f06779e4d891f5072c46d026ba7e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1c28f06779e4d891f5072c46d026ba7e)): ?>
<?php $component = $__componentOriginal1c28f06779e4d891f5072c46d026ba7e; ?>
<?php unset($__componentOriginal1c28f06779e4d891f5072c46d026ba7e); ?>
<?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>

        <div class="col-md-4">

            <div class="maincontentinner project-updates">
                <div class="pull-right">
                    <?php if($login::userIsAtLeast($roles::$editor)): ?>
                        <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => 'javascript:void(0);','onclick' => 'leantime.commentsController.toggleCommentBoxes(0);jQuery(\'.noCommentsMessage\').toggle();','id' => 'mainToggler','contentRole' => 'link','class' => 'action-link','style' => 'margin-top:-7px;']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => 'javascript:void(0);','onclick' => 'leantime.commentsController.toggleCommentBoxes(0);jQuery(\'.noCommentsMessage\').toggle();','id' => 'mainToggler','contentRole' => 'link','class' => 'action-link','style' => 'margin-top:-7px;']); ?><span class="fa fa-plus"></span> <?php echo e(__('links.add_new_report')); ?> <?php echo $__env->renderComponent(); ?>
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

                <h5 class="subtitle"><?php echo e(__('subtitles.project_updates')); ?></h5>

                <form method="post" action="<?php echo e(BASE_URL); ?>/dashboard/show">
                    <input type="hidden" name="comment" value="1" />
                        <?php if($login::userIsAtLeast($roles::$editor)): ?>
                            <div id="comment0" class="commentBox tw-hidden">
                                <label for="projectStatus tw-inline"><?php echo e(__('label.project_status_is')); ?></label>

                                <select name="status" id="projectStatus" class="tw-ml-0 tw-mb-[10px]">
                                    <option value="green"><?php echo e(__('label.project_status_green')); ?></option>
                                    <option value="yellow"><?php echo e(__('label.project_status_yellow')); ?></option>
                                    <option value="red"><?php echo e(__('label.project_status_red')); ?></option>
                                </select>

                                <div class="commentReply">
                                    <textarea rows="5" cols="50" class="tiptapSimple tw-w-full" name="text"></textarea>
                                    <input
                                        type="submit"
                                        value="<?php echo e(__('buttons.save')); ?>"
                                        name="comment"
                                        class="btn btn-primary btn-success tw-ml-0"
                                    />
                                    <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => 'javascript:void(0);','onclick' => 'leantime.commentsController.toggleCommentBoxes(-1);jQuery(\'.noCommentsMessage\').toggle();','class' => 'tw-leading-[50px]','contentRole' => 'secondary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => 'javascript:void(0);','onclick' => 'leantime.commentsController.toggleCommentBoxes(-1);jQuery(\'.noCommentsMessage\').toggle();','class' => 'tw-leading-[50px]','contentRole' => 'secondary']); ?><?php echo e(__('links.cancel')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $attributes = $__attributesOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__attributesOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $component = $__componentOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__componentOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
                                    <input type="hidden" name="comment" value="1"/>
                                    <input type="hidden" name="father" id="father" value="0"/>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div id="comments">
                            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($loop->iteration == 3): ?>
                                    <a href="javascript:void(0);" onclick="jQuery('.readMore').toggle('fast')">
                                        <?php echo e(__('links.read_more')); ?>

                                    </a>
                                    <div class="readMore tw-hidden tw-mt-[20px]">
                                <?php endif; ?>
                                <div class="clearall">
                                    <div>
                                        <div class="commentContent statusUpdate commentStatus-<?php echo e($row['status']); ?>">
                                            <strong class="fancyLink">
                                                <?php echo e(sprintf(
                                                    __('text.report_written_on'),
                                                    format($row['date'])->date(),
                                                    format($row['date'])->time()
                                                )); ?>

                                            </strong>
                                                <?php if($login::userIsAtLeast($roles::$editor)): ?>
                                                    <div class="inlineDropDownContainer tw-float-right tw-ml-[10px]">
                                                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-v"></i>
                                                        </a>

                                                        <ul class="dropdown-menu">
                                                            <?php if($row['userId'] == session("userdata.id")): ?>
                                                                <li>
                                                                    <a href="<?php echo $delUrlBase . $row['id']; ?>" class="deleteComment">
                                                                        <span class="fa fa-trash"></span> <?php echo e(__('links.delete')); ?>

                                                                    </a>
                                                                </li>
                                                            <?php endif; ?>

                                                            <?php if(isset($ticket->id)): ?>
                                                                <li>
                                                                    <a
                                                                        href="javascript:void(0);"
                                                                        onclick="leantime.ticketsController.addCommentTimesheetContent(<?php echo $row['id']; ?>, <?php echo $ticket->id; ?>)"
                                                                    ><?php echo e(__('links.add_to_timesheets')); ?></a>
                                                                </li>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </div>
                                                <?php endif; ?>

                                            <div class="text" id="commentText-<?php echo e($row['id']); ?>"><?php echo $tpl->escapeMinimal($row['text']); ?></div>
                                        </div>

                                        <div class="commentLinks">
                                            <small class="right">
                                                <?php echo sprintf(
                                                    __('text.written_on_by'),
                                                    format($row['date'])->date(),
                                                    format($row['date'])->time(),
                                                    $tpl->escape($row['firstname']),
                                                    $tpl->escape($row['lastname'])
                                                ); ?>

                                            </small>

                                            <?php if($login::userIsAtLeast($roles::$commenter)): ?>
                                                <a
                                                    href="javascript:void(0);"
                                                    onclick="leantime.commentsController.toggleCommentBoxes(<?php echo $row['id']; ?>);"
                                                ><span class="fa fa-reply"></span> <?php echo e(__('links.reply')); ?>

                                                </a>
                                            <?php endif; ?>
                                        </div>

                                        <div class="replies">
                                            <?php if($row['replies']): ?>
                                                <?php $__currentLoopData = $row['replies']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if (isset($component)) { $__componentOriginale7f34241856aca6686767b800bfcd05a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale7f34241856aca6686767b800bfcd05a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'comments::components.reply','data' => ['comment' => $comment,'iteration' => $loop->iteration]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('comments::reply'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['comment' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($comment),'iteration' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($loop->iteration)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale7f34241856aca6686767b800bfcd05a)): ?>
<?php $attributes = $__attributesOriginale7f34241856aca6686767b800bfcd05a; ?>
<?php unset($__attributesOriginale7f34241856aca6686767b800bfcd05a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale7f34241856aca6686767b800bfcd05a)): ?>
<?php $component = $__componentOriginale7f34241856aca6686767b800bfcd05a; ?>
<?php unset($__componentOriginale7f34241856aca6686767b800bfcd05a); ?>
<?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                            <?php if (isset($component)) { $__componentOriginale7cf05d7380a0a3978b6b22287eff043 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale7cf05d7380a0a3978b6b22287eff043 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'comments::components.input','data' => ['commentId' => $row['id'],'user' => session('userdata')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('comments::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['commentId' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($row['id']),'user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('userdata'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale7cf05d7380a0a3978b6b22287eff043)): ?>
<?php $attributes = $__attributesOriginale7cf05d7380a0a3978b6b22287eff043; ?>
<?php unset($__attributesOriginale7cf05d7380a0a3978b6b22287eff043); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale7cf05d7380a0a3978b6b22287eff043)): ?>
<?php $component = $__componentOriginale7cf05d7380a0a3978b6b22287eff043; ?>
<?php unset($__componentOriginale7cf05d7380a0a3978b6b22287eff043); ?>
<?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php if(count($comments) >= 3): ?>
                                </div>
                            <?php endif; ?>
                        </div>

                    <?php if(count($comments) == 0): ?>
                        <div style="padding-left:0px; clear:both;" class="noCommentsMessage">
                                <?php echo e(__('text.no_updates')); ?>

                        </div>
                    <?php endif; ?>
                    <div class="clearall"></div>
                </form>
                <div class="clearall"></div>
            </div>

            <div class="maincontentinner project-progress">
                <div class="row" id="projectProgressContainer">
                    <div class="col-md-12">
                        <h5 class="subtitle"><?php echo e(__('subtitles.project_progress')); ?></h5>

                        <div id="canvas-holder" class="tw-w-full tw-h-[250px]">
                            <canvas id="chart-area"></canvas>
                        </div>

                        <br/><br/>
                    </div>
                </div>

                <div class="row" id="milestoneProgressContainer">
                    <div class="col-md-12">
                        <h5 class="subtitle"><?php echo e(__('headline.milestones')); ?></h5>
                        <ul class="sortableTicketList">
                            <?php if(count($milestones) == 0): ?>
                                <div class="center">
                                    <br/>
                                    <h4><?php echo e(__('headlines.no_milestones')); ?></h4>
                                    <?php echo e(__('text.milestones_help_organize_projects')); ?>

                                    <br/><br/>
                                    <a href="<?php echo e(BASE_URL); ?>/tickets/roadmap"><?php echo __('links.goto_milestones'); ?></a>
                                </div>
                            <?php endif; ?>

                            <?php $__currentLoopData = $milestones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($row->percentDone >= 100 && (new \DateTime($row->editTo) < new \DateTime())): ?>
                                    <?php break; ?>
                                <?php endif; ?>

                                <li class="ui-state-default" id="milestone_<?php echo $row->id; ?>">

                                    <div hx-trigger="load"
                                         hx-indicator=".htmx-indicator"
                                         hx-get="<?= BASE_URL ?>/hx/tickets/milestones/showCard?milestoneId=<?= $row->id ?>">
                                        <div class="htmx-indicator">
                                                <?= $tpl->__('label.loading_milestone') ?>
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

<?php if (! $__env->hasRenderedOnce('8918541f-9600-46c3-8f94-a3f76ad1d86e')): $__env->markAsRenderedOnce('8918541f-9600-46c3-8f94-a3f76ad1d86e'); ?> <?php $__env->startPush('scripts'); ?>
<script type='text/javascript'>
    if (window.leantime && window.leantime.tiptapController) {
        leantime.tiptapController.initSimpleEditor();
    }
</script>
<?php $__env->stopPush(); ?> <?php endif; ?>

<?php if (! $__env->hasRenderedOnce('7adcd451-ce6b-49ab-87ca-0619df9acc5e')): $__env->markAsRenderedOnce('7adcd451-ce6b-49ab-87ca-0619df9acc5e'); ?> <?php $__env->startPush('scripts'); ?>
<script>
    <?php $tpl->dispatchTplEvent('scripts.afterOpen'); ?>

    jQuery(document).ready(function () {

        jQuery('#descriptionReadMoreToggle').click(function() {

            if (jQuery("#projectDescription").hasClass("closed")) {
                jQuery("#projectDescription").css("max-height", "100%");
                jQuery("#projectDescription").removeClass("closed");
                jQuery("#projectDescription").removeClass("kanbanContent");
                jQuery('#descriptionReadMoreToggle').text("<?php echo e(__('label.read_less')); ?>");
            } else {
                jQuery("#projectDescription").css("max-height", "200px");
                jQuery("#projectDescription").addClass("closed");
                jQuery("#projectDescription").addClass("kanbanContent");
                jQuery('#descriptionReadMoreToggle').text("<?php echo e(__('label.read_more')); ?>");
            }
        });

        jQuery(".readMoreBox").each(function() {
            if (jQuery(this).find(".readMoreContent").height() >= 169) {

                jQuery(this).find(".readMoreToggle").show();
            }
        });

        jQuery(document).on('click', '.progressWrapper .dropdown-menu', function (e) {
            e.stopPropagation();
        });

        <?php if($login::userIsAtLeast($roles::$editor)): ?>
            leantime.dashboardController.prepareHiddenDueDate();
            leantime.ticketsController.initEffortDropdown();
            leantime.ticketsController.initMilestoneDropdown();
            leantime.ticketsController.initStatusDropdown();
            leantime.usersController.initUserEditModal();
        <?php else: ?>
            leantime.authController.makeInputReadonly(".maincontentinner");
        <?php endif; ?>

        leantime.dashboardController.initProgressChart(
            "chart-area",
            <?php echo round($projectProgress['percent']); ?>,
            <?php echo round(100 - $projectProgress['percent']); ?>

        );

        jQuery("#favoriteProject").click(function() {
            if (jQuery("#favoriteProject").hasClass("isFavorite")) {
                leantime.reactionsController.removeReaction(
                    'project',
                    <?php echo $project['id']; ?>,
                    'favorite',
                    function() {
                        jQuery("#favoriteProject").find("i").removeClass("fa-solid").addClass("fa-regular");
                        jQuery("#favoriteProject").removeClass("isFavorite");
                    }
                );
            } else {
                leantime.reactionsController.addReactions(
                    'project',
                    <?php echo $project['id']; ?>,
                    'favorite',
                    function() {
                        jQuery("#favoriteProject").find("i").removeClass("fa-regular").addClass("fa-solid");
                        jQuery("#favoriteProject").addClass("isFavorite");
                    }
                );
            }
        });

        leantime.ticketsController.initDueDateTimePickers();
        leantime.ticketsController.initDueDateTimePickers();


        <?php (session(["usersettings.modals.projectDashboardTour" => 1])); ?>;
    });

    <?php $tpl->dispatchTplEvent('scripts.beforeClose'); ?>
</script>
<?php $__env->stopPush(); ?> <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Dashboard/Templates/show.blade.php ENDPATH**/ ?>