<?php $__env->startSection('content'); ?>

<?php
    $state = $state ?? null;
?>

<div class="pageheader">
    <div class="pageicon"><span class="fa fa-suitcase"></span></div>
    <div class="pagetitle">
        <h5><?php echo __('label.administration'); ?></h5>
        <h1><?php echo sprintf(__('headline.project'), $tpl->escape($project['name'])); ?>

        </h1>
    </div>
</div><!--pageheader-->

<div class="maincontent">
    <div class="maincontentinner">

        <?php echo $tpl->displayNotification(); ?>


        <div class="inlineDropDownContainer" style="float:right; z-index:9; padding-top:2px;">

            <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => ''.e(BASE_URL).'/projects/duplicateProject/'.e($project['id']).'','contentRole' => 'default','class' => 'duplicateProjectModal','dataTippyContent' => ''.e(__('link.duplicate_project')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => ''.e(BASE_URL).'/projects/duplicateProject/'.e($project['id']).'','contentRole' => 'default','class' => 'duplicateProjectModal','data-tippy-content' => ''.e(__('link.duplicate_project')).'']); ?><i class="fa-regular fa-copy"></i> کپی <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','state' => 'danger','variant' => 'outline','class' => 'delete','link' => ''.e(BASE_URL).'/projects/delProject/'.e($project['id']).'','dataTippyContent' => ''.e(__('link.delete_project')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','state' => 'danger','variant' => 'outline','class' => 'delete','link' => ''.e(BASE_URL).'/projects/delProject/'.e($project['id']).'','data-tippy-content' => ''.e(__('link.delete_project')).'']); ?><i class="fa fa-trash"></i> حذف <?php echo $__env->renderComponent(); ?>
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
        <div class="tabbedwidget tab-primary projectTabs">

            <ul>
                <li><a href="#projectdetails"><span class="fa fa-leaf"></span> <?php echo __('tabs.projectdetails'); ?></a></li>
                <li><a href="#team"><span class="fa fa-group"></span> <?php echo __('tabs.team'); ?></a></li>

                <li><a href="#integrations"> <span class="fa fa-asterisk"></span> <?php echo __('tabs.Integrations'); ?></a></li>
                <li><a href="#todosettings"><span class="fa fa-list-ul"></span> <?php echo __('tabs.todosettings'); ?></a></li>
                <?php $tpl->dispatchTplEvent('projectTabsList'); ?>
            </ul>

            <div id="projectdetails">
                <?php echo $__env->make('projects::submodules.projectDetails', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>

            <div id="team">
                <form method="post" action="<?php echo e(BASE_URL); ?>/projects/showProject/<?php echo e($project['id']); ?>#team">
                    <input type="hidden" name="saveUsers" value="1" />


                    <div class="row-fluid">
                    <div class="span12">

                         <div class="form-group">
                             <br /><?php echo __('text.choose_access_for_users'); ?><br />
                             <br />

                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="widgettitle title-light">
                                        <span class="fa fa-users"></span><?php echo __('headlines.team_member'); ?>

                                    </h4>
                                </div>
                            </div>

                             <div class="row">
                                <?php $__currentLoopData = $project['assignedUsers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userId => $assignedUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-4">
                                        <div class="userBox">
                                            <input type='checkbox' name='editorId[]' id="user-<?php echo e($assignedUser['id']); ?>" value='<?php echo e($assignedUser['id']); ?>'
                                                checked="checked"
                                                />
                                            <div class="commentImage">
                                                <img src="<?php echo e(BASE_URL); ?>/api/users?profileImage=<?php echo e($assignedUser['id']); ?>&v=<?php echo e(format($assignedUser['modified'])->timestamp()); ?>"/>
                                            </div>
                                            <label for="user-<?php echo e($assignedUser['id']); ?>" ><?php echo sprintf(__('text.full_name'), $tpl->escape($assignedUser['firstname']), $tpl->escape($assignedUser['lastname'])); ?>

                                                <?php if($assignedUser['jobTitle'] != ''): ?>
                                                    <small>
                                                        <?php echo e($assignedUser['jobTitle']); ?>

                                                    </small>
                                                    <br/>
                                                <?php endif; ?>
                                                <?php if($assignedUser['source'] == 'api'): ?>
                                                    <small>
                                                        API Access
                                                    </small>
                                                    <br/>
                                                <?php endif; ?>
                                                <?php if($assignedUser['status'] == 'i'): ?>
                                                    <small><?php echo __('label.invited'); ?></small>
                                                <?php endif; ?>
                                            </label>
                                            <?php
                                            if (($roles::getRoles()[$assignedUser['role']] == $roles::$admin || $roles::getRoles()[$assignedUser['role']] == $roles::$owner)) {
                                            ?>
                                                <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['readonly' => true,'disabled' => true,'value' => ''.e(__('label.roles.'.$roles::getRoles()[$assignedUser['role']])).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['readonly' => true,'disabled' => true,'value' => ''.e(__('label.roles.'.$roles::getRoles()[$assignedUser['role']])).'']); ?>
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
                                            <?php
                                            } else {
                                            ?>
                                                <select name="userProjectRole-<?php echo e($assignedUser['id']); ?>">
                                                    <option value="inherit">Inherit</option>
                                                    <option value="<?php echo e(array_search($roles::$readonly, $roles::getRoles())); ?>"
                                                        <?php if($assignedUser['projectRole'] == array_search($roles::$readonly, $roles::getRoles())): ?> selected='selected' <?php endif; ?>
                                                    ><?php echo __('label.roles.'.$roles::$readonly); ?></option>

                                                    <option value="<?php echo e(array_search($roles::$commenter, $roles::getRoles())); ?>"
                                                        <?php if($assignedUser['projectRole'] == array_search($roles::$commenter, $roles::getRoles())): ?> selected='selected' <?php endif; ?>
                                                    ><?php echo __('label.roles.'.$roles::$commenter); ?></option>
                                                    <option value="<?php echo e(array_search($roles::$editor, $roles::getRoles())); ?>"
                                                        <?php if($assignedUser['projectRole'] == array_search($roles::$editor, $roles::getRoles())): ?> selected='selected' <?php endif; ?>
                                                    ><?php echo __('label.roles.'.$roles::$editor); ?></option>
                                                    <option value="<?php echo e(array_search($roles::$manager, $roles::getRoles())); ?>"
                                                        <?php if($assignedUser['projectRole'] == array_search($roles::$manager, $roles::getRoles())): ?> selected='selected' <?php endif; ?>
                                                    ><?php echo __('label.roles.'.$roles::$manager); ?></option>
                                                </select>
                                            <?php } ?>
                                            <div class="clearall"></div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                             </div>


                `           <div class="row">
                                <div class="col-md-12">
                                    <h4 class="widgettitle title-light">
                                        <span class="fa fa-user-friends "></span><?php echo __('headlines.assign_users_to_project'); ?>

                                    </h4>
                                </div>
                            </div>

                             <div class="row">
                                <?php $__currentLoopData = $availableUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(collect($project['assignedUsers'])->where('id', $row['id'])->isEmpty()): ?>
                                        <div class="col-md-4">
                                            <div class="userBox">
                                                <input type='checkbox' name='editorId[]' id="user-<?php echo e($row['id']); ?>" value='<?php echo e($row['id']); ?>' />

                                                <div class="commentImage">
                                                    <img src="<?php echo e(BASE_URL); ?>/api/users?profileImage=<?php echo e($row['id']); ?>&v=<?php echo e(format($row['modified'])->timestamp()); ?>"/>
                                                </div>
                                                <label for="user-<?php echo e($row['id']); ?>" ><?php echo sprintf(__('text.full_name'), $tpl->escape($row['firstname']), $tpl->escape($row['lastname'])); ?></label>
                                                <?php if($roles::getRoles()[$row['role']] == $roles::$admin || $roles::getRoles()[$row['role']] == $roles::$owner): ?>
                                                    <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['readonly' => true,'disabled' => true,'value' => ''.e(__('label.roles.'.$roles::getRoles()[$row['role']])).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['readonly' => true,'disabled' => true,'value' => ''.e(__('label.roles.'.$roles::getRoles()[$row['role']])).'']); ?>
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
                                                <?php else: ?>
                                                    <?php $assignedUserMatch = collect($project['assignedUsers'])->where('id', $row['id'])->first(); ?>
                                                    <select name="userProjectRole-<?php echo e($row['id']); ?>">
                                                        <option value="inherit">Inherit</option>
                                                        <option value="<?php echo e(array_search($roles::$readonly, $roles::getRoles())); ?>"
                                                        <?php if($assignedUserMatch && $assignedUserMatch['projectRole'] == array_search($roles::$readonly, $roles::getRoles())): ?> selected='selected' <?php endif; ?>
                                                            ><?php echo __('label.roles.'.$roles::$readonly); ?></option>

                                                        <option value="<?php echo e(array_search($roles::$commenter, $roles::getRoles())); ?>"
                                                            <?php if($assignedUserMatch && $assignedUserMatch['projectRole'] == array_search($roles::$commenter, $roles::getRoles())): ?> selected='selected' <?php endif; ?>
                                                        ><?php echo __('label.roles.'.$roles::$commenter); ?></option>
                                                        <option value="<?php echo e(array_search($roles::$editor, $roles::getRoles())); ?>"
                                                            <?php if($assignedUserMatch && $assignedUserMatch['projectRole'] == array_search($roles::$editor, $roles::getRoles())): ?> selected='selected' <?php endif; ?>
                                                        ><?php echo __('label.roles.'.$roles::$editor); ?></option>
                                                        <option value="<?php echo e(array_search($roles::$manager, $roles::getRoles())); ?>"
                                                            <?php if($assignedUserMatch && $assignedUserMatch['projectRole'] == array_search($roles::$manager, $roles::getRoles())): ?> selected='selected' <?php endif; ?>
                                                        ><?php echo __('label.roles.'.$roles::$manager); ?></option>
                                                    </select>
                                                <?php endif; ?>
                                                <div class="clearall"></div>
                                            </div>
                                        </div>




                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php if($login::userIsAtLeast($roles::$manager)): ?>
                                    <div class="col-md-4">

                                        <div class="userBox">
                                            <a class="userEditModal" href="<?php echo e(BASE_URL); ?>/users/newUser?preSelectProjectId=<?php echo e($project['id']); ?>" style="font-size:var(--font-size-l); line-height:61px"><span class="fa fa-user-plus"></span> <?php echo __('links.create_user'); ?></a>
                                            <div class="clearall"></div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                             <div class="row">
                                 <div class="col-md-12">

                                 </div>
                             </div>
                        </div>


                    </div>
                </div>
                    <br/>
                    <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => __('buttons.save'),'name' => 'saveUsers','id' => 'save']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.save')),'name' => 'saveUsers','id' => 'save']); ?>
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

                </form>

            </div>

            <div id="integrations">

                <?php if($projectMuteCount > 0): ?>
                    <div class="alert alert-info" style="margin-bottom: 20px;">
                        <i class="fa fa-bell-slash"></i>
                        <?php echo sprintf(__('label.project_mute_count'), $projectMuteCount); ?>

                    </div>
                <?php endif; ?>

                <h4 class="widgettitle title-light"><span class="fa fa-leaf"></span>Mattermost</h4>
                <div class="row">
                    <div class="col-md-3">
                        <img src="<?php echo e(BASE_URL); ?>/dist/images/mattermost-logoHorizontal.png" width="200" />
                    </div>
                    <div class="col-md-5">
                        <?php echo __('text.mattermost_instructions'); ?>

                    </div>
                    <div class="col-md-4">
                        <strong><?php echo __('label.webhook_url'); ?></strong><br />
                        <form action="<?php echo e(BASE_URL); ?>/projects/showProject/<?php echo e($project['id']); ?>#integrations" method="post">
                            <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['name' => 'mattermostWebhookURL','id' => 'mattermostWebhookURL','value' => ''.e(e($mattermostWebhookURL)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'mattermostWebhookURL','id' => 'mattermostWebhookURL','value' => ''.e(e($mattermostWebhookURL)).'']); ?>
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
                            <br />
                            <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => __('buttons.save'),'name' => 'mattermostSave']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.save')),'name' => 'mattermostSave']); ?>
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
                        </form>
                    </div>
                </div>
                <br />
                <h4 class="widgettitle title-light"><span class="fa fa-leaf"></span>Slack</h4>
                <div class="row">
                    <div class="col-md-3">
                        <img src="https://cdn.cdnlogo.com/logos/s/52/slack.svg" width="200"/>
                    </div>

                    <div class="col-md-5">
                        <?php echo __('text.slack_instructions'); ?>

                    </div>
                    <div class="col-md-4">
                        <strong><?php echo __('label.webhook_url'); ?></strong><br />
                        <form action="<?php echo e(BASE_URL); ?>/projects/showProject/<?php echo e($project['id']); ?>#integrations" method="post">
                            <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['name' => 'slackWebhookURL','id' => 'slackWebhookURL','value' => ''.e(e($slackWebhookURL)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'slackWebhookURL','id' => 'slackWebhookURL','value' => ''.e(e($slackWebhookURL)).'']); ?>
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
                            <br />
                            <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => __('buttons.save'),'name' => 'slackSave']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.save')),'name' => 'slackSave']); ?>
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
                        </form>
                    </div>
                </div>

                <h4 class="widgettitle title-light"><span class="fa fa-leaf"></span>Zulip</h4>
                <div class="row">
                    <div class="col-md-3">
                        <img src="<?php echo e(BASE_URL); ?>/dist/images/zulip-org-logo.png" width="200"/>
                    </div>

                    <div class="col-md-5">
                        <?php echo __('text.zulip_instructions'); ?>

                    </div>
                    <div class="col-md-4">

                        <form action="<?php echo e(BASE_URL); ?>/projects/showProject/<?php echo e($project['id']); ?>#integrations" method="post">
                            <strong><?php echo __('label.base_url'); ?></strong><br />
                            <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['name' => 'zulipURL','id' => 'zulipURL','placeholder' => ''.e(__('input.placeholders.zulip_url')).'','value' => ''.e($zulipHook['zulipURL']).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'zulipURL','id' => 'zulipURL','placeholder' => ''.e(__('input.placeholders.zulip_url')).'','value' => ''.e($zulipHook['zulipURL']).'']); ?>
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
                            <br />
                            <strong><?php echo __('label.bot_email'); ?></strong><br />
                            <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['name' => 'zulipEmail','id' => 'zulipEmail','placeholder' => '','value' => ''.e($tpl->escape($zulipHook['zulipEmail'])).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'zulipEmail','id' => 'zulipEmail','placeholder' => '','value' => ''.e($tpl->escape($zulipHook['zulipEmail'])).'']); ?>
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
                            <br />
                            <strong><?php echo __('label.botkey'); ?></strong><br />
                            <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['name' => 'zulipBotKey','id' => 'zulipBotKey','placeholder' => '','value' => ''.e($tpl->escape($zulipHook['zulipBotKey'])).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'zulipBotKey','id' => 'zulipBotKey','placeholder' => '','value' => ''.e($tpl->escape($zulipHook['zulipBotKey'])).'']); ?>
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
                            <br />
                            <strong><?php echo __('label.stream'); ?></strong><br />
                            <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['name' => 'zulipStream','id' => 'zulipStream','placeholder' => '','value' => ''.e($tpl->escape($zulipHook['zulipStream'])).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'zulipStream','id' => 'zulipStream','placeholder' => '','value' => ''.e($tpl->escape($zulipHook['zulipStream'])).'']); ?>
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
                            <br />
                            <strong><?php echo __('label.topic'); ?></strong><br />
                            <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['name' => 'zulipTopic','id' => 'zulipTopic','placeholder' => '','value' => ''.e($tpl->escape($zulipHook['zulipTopic'])).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'zulipTopic','id' => 'zulipTopic','placeholder' => '','value' => ''.e($tpl->escape($zulipHook['zulipTopic'])).'']); ?>
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
                            <br />
                            <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => __('buttons.save'),'name' => 'zulipSave']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.save')),'name' => 'zulipSave']); ?>
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
                        </form>
                    </div>
                </div>

                <h4 class="widgettitle title-light"><span class="fa fa-leaf"></span>Telegram</h4>
                <div class="row">
                    <div class="col-md-3">
                        <img src="<?php echo e(BASE_URL); ?>/dist/images/telegram-logo.png" width="130" alt="Telegram logo" />
                    </div>

                    <div class="col-md-5">
                        <?php echo __('text.telegram_instructions'); ?>

                    </div>
                    <div class="col-md-4">
                        <form action="<?php echo e(BASE_URL); ?>/projects/showProject/<?php echo e($project['id']); ?>#integrations" method="post">
                            <strong><?php echo __('label.botkey'); ?></strong><br />
                            <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['name' => 'telegramBotToken','id' => 'telegramBotToken','placeholder' => '','value' => ''.e($tpl->escape($telegramHook['telegramBotToken'])).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'telegramBotToken','id' => 'telegramBotToken','placeholder' => '','value' => ''.e($tpl->escape($telegramHook['telegramBotToken'])).'']); ?>
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
                            <br />
                            <strong><?php echo __('label.telegram_chat_id'); ?></strong><br />
                            <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['name' => 'telegramChatId','id' => 'telegramChatId','placeholder' => ''.e(__('input.placeholders.telegram_chat_id')).'','value' => ''.e($tpl->escape($telegramHook['telegramChatId'])).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'telegramChatId','id' => 'telegramChatId','placeholder' => ''.e(__('input.placeholders.telegram_chat_id')).'','value' => ''.e($tpl->escape($telegramHook['telegramChatId'])).'']); ?>
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
                            <br />
                            <strong><?php echo __('label.telegram_topic_id'); ?></strong><br />
                            <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['name' => 'telegramTopicId','id' => 'telegramTopicId','placeholder' => ''.e(__('input.placeholders.telegram_topic_id')).'','value' => ''.e($tpl->escape($telegramHook['telegramTopicId'])).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'telegramTopicId','id' => 'telegramTopicId','placeholder' => ''.e(__('input.placeholders.telegram_topic_id')).'','value' => ''.e($tpl->escape($telegramHook['telegramTopicId'])).'']); ?>
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
                            <br />
                            <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => __('buttons.save'),'name' => 'telegramSave']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.save')),'name' => 'telegramSave']); ?>
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
                        </form>
                    </div>
                </div>

                
                <h4 class='widgettitle title-light'><span class='fa fa-leaf'></span>Discord</h4>
                <div class='row'>
                    <div class='col-md-3'>
                        <img src='<?php echo e(BASE_URL); ?>/dist/images/discord-logo.png' width='200'/>
                    </div>

                    <div class='col-md-5'>
                      <?php echo __('text.discord_instructions'); ?>

                    </div>
                    <div class="col-md-4">
                        <strong><?php echo __('label.webhook_url'); ?></strong><br/>
                        <form action="<?php echo e(BASE_URL); ?>/projects/showProject/<?php echo e($project['id']); ?>#integrations" method="post">
                            <?php for($i = 1; $i <= 3; $i++): ?>
                            <?php $discordVarName = 'discordWebhookURL'.$i; $discordVarVal = $$discordVarName ?? ''; ?>
                            <input type="text" name="discordWebhookURL<?php echo e($i); ?>" id="discordWebhookURL<?php echo e($i); ?>" placeholder="<?php echo e(__('input.placeholders.discord_url')); ?>" value="<?php echo e(e($discordVarVal)); ?>"/><br/>
                            <?php endfor; ?>
                            <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => __('buttons.save'),'name' => 'discordSave']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.save')),'name' => 'discordSave']); ?>
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
                        </form>
                    </div>
                </div>

            </div>

            <div id="todosettings">
                <form action="<?php echo e(BASE_URL); ?>/projects/showProject/<?php echo e($project['id']); ?>#todosettings" method="post">
                    <ul class="sortableTicketList" id="todoStatusList">
                        <?php $__currentLoopData = $todoStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ticketStatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <div class="ticketBox">

                                    <div class="row statusList" id="todostatus-<?php echo e($key); ?>">

                                        <input type="hidden" name="labelKeys[]" id="labelKey-<?php echo e($key); ?>" class='labelKey' value="<?php echo e($key); ?>"/>
                                        <div class="sortHandle">
                                            <br />
                                            <span class="fa fa-sort"></span>
                                        </div>
                                        <div class="col-md-1">
                                            <label><?php echo __('label.sortindex'); ?></label>
                                            <input type="text" name="labelSort-<?php echo e($key); ?>" class="sorter" id="labelSort-<?php echo e($key); ?>" value="<?php echo e($ticketStatus['sortKey']); ?>" style="width:50px;"/>
                                        </div>
                                        <div class="col-md-2">

                                            <label><?php echo __('label.label'); ?></label>
                                            <input type="text" name="label-<?php echo e($key); ?>" <?php echo e($key == -1 ? 'readonly' : ''); ?> id="label-<?php echo e($key); ?>" value="<?php echo e($ticketStatus['name']); ?>" />

                                        </div>
                                        <div class="col-md-2">
                                            <label><?php echo __('label.color'); ?></label>
                                            <select name="labelClass-<?php echo e($key); ?>" id="labelClass-<?php echo e($key); ?>" class="colorChosen">
                                                <option value="label-purple" class="label-purple" <?php echo e($ticketStatus['class'] == 'label-purple' ? 'selected="selected"' : ''); ?>><span class="label-purple"><?php echo __('label.purple'); ?></span></option>
                                                <option value="label-pink" class="label-pink" <?php echo e($ticketStatus['class'] == 'label-pink' ? 'selected="selected"' : ''); ?>><span class="label-pink"><?php echo __('label.pink'); ?></span></option>
                                                <option value="label-darker-blue" class="label-darker-blue" <?php echo e($ticketStatus['class'] == 'label-darker-blue' ? 'selected="selected"' : ''); ?>><span class="label-darker-blue"><?php echo __('label.darker-blue'); ?></span></option>
                                                <option value="label-info" class="label-info" <?php echo e($ticketStatus['class'] == 'label-info' ? 'selected="selected"' : ''); ?>><span class="label-info"><?php echo __('label.dark-blue'); ?></span></option>
                                                <option value="label-blue" class="label-blue"  <?php echo e($ticketStatus['class'] == 'label-blue' ? 'selected="selected"' : ''); ?>><span class="label-blue"><?php echo __('label.blue'); ?></span></option>
                                                <option value="label-dark-green" class="label-dark-green" <?php echo e($ticketStatus['class'] == 'label-dark-green' ? 'selected="selected"' : ''); ?>><span class="label-dark-green"><?php echo __('label.dark-green'); ?></span></option>
                                                <option value="label-success" class="label-success" <?php echo e($ticketStatus['class'] == 'label-success' ? 'selected="selected"' : ''); ?>><span class="label-success"><?php echo __('label.green'); ?></span></option>
                                                <option value="label-warning" class="label-warning" <?php echo e($ticketStatus['class'] == 'label-warning' ? 'selected="selected"' : ''); ?>><span class="label-warning"><?php echo __('label.yellow'); ?></span></option>
                                                <option value="label-brown" class="label-brown" <?php echo e($ticketStatus['class'] == 'label-brown' ? 'selected="selected"' : ''); ?>><span class="label-brown"><?php echo __('label.brown'); ?></span></option>
                                                <option value="label-danger" class="label-danger" <?php echo e($ticketStatus['class'] == 'label-danger' ? 'selected="selected"' : ''); ?>><span class="label-danger"><?php echo __('label.dark-red'); ?></span></option>
                                                <option value="label-important" class="label-important" <?php echo e($ticketStatus['class'] == 'label-important' ? 'selected="selected"' : ''); ?>><span class="label-important"><?php echo __('label.red'); ?></span></option>
                                                <option value="label-default" class="label-default" <?php echo e($ticketStatus['class'] == 'label-default' ? 'selected="selected"' : ''); ?>><span class="label-default"><?php echo __('label.grey'); ?></span></option>



                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label><?php echo __('label.reportType'); ?></label>
                                            <select name="labelType-<?php echo e($key); ?>" id="labelType-<?php echo e($key); ?>">
                                                <option value="NEW" <?php echo e(($ticketStatus['statusType'] == 'NEW') ? 'selected="selected"' : ''); ?>><?php echo __('status.new'); ?></option>
                                                <option value="INPROGRESS" <?php echo e(($ticketStatus['statusType'] == 'INPROGRESS') ? 'selected="selected"' : ''); ?>><?php echo __('status.in_progress'); ?></option>
                                                <option value="DONE" <?php echo e(($ticketStatus['statusType'] == 'DONE') ? 'selected="selected"' : ''); ?>><?php echo __('status.done'); ?></option>
                                                <option value="NONE" <?php echo e(($ticketStatus['statusType'] == 'NONE') ? 'selected="selected"' : ''); ?>><?php echo __('status.dont_report'); ?></option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for=""><?php echo __('label.showInKanban'); ?></label>
                                            <input type="checkbox" name="labelKanbanCol-<?php echo e($key); ?>" id="labelKanbanCol-<?php echo e($key); ?>" <?php echo e($ticketStatus['kanbanCol'] ? 'checked="checked"' : ''); ?>/>
                                        </div>
                                        <div class="remove">
                                            <br />
                                            <?php if($key != -1): ?>
                                                <a href="javascript:void(0);" onclick="leantime.projectsController.removeStatus(<?php echo e($key); ?>)" class="delete"><span class="fa fa-trash"></span></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <?php if($key == -1): ?>
                                        <em>* the archive status is protected cannot be renamed or removed.</em>
                                    <?php endif; ?>
                                </div>
                            </li>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>

                    <a href="javascript:void(0);" onclick="leantime.projectsController.addToDoStatus();" class="quickAddLink" style="text-align:left;"><?php echo __('links.add_status'); ?></a>
                    <br />
                    <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'submit','labelText' => __('buttons.save'),'name' => 'submitSettings','contentRole' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'submit','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.save')),'name' => 'submitSettings','contentRole' => 'primary']); ?>
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
                </form>
            </div>

            <?php $tpl->dispatchTplEvent('projectTabsContent'); ?>
        </div>
    </div>
</div>


<!-- New Status Template -->
<div class="newStatusTpl" style="display:none;">
    <div class="ticketBox">
    <div class="row statusList" id="todostatus-XXNEWKEYXX">
        <input type="hidden" name="labelKeys[]" id="labelKey-XXNEWKEYXX" class='labelKey' value="XXNEWKEYXX"/>
        <div class="sortHandle">
            <br />
            <span class="fa fa-sort"></span>
        </div>
        <div class="col-md-1">
            <label><?php echo __('label.sortindex'); ?></label>
            <input type="text" name="labelSort-XXNEWKEYXX" class="sorter" id="labelSort-XXNEWKEYXX" value="" style="width:50px;"/>
        </div>
        <div class="col-md-2">
            <label><?php echo __('label.label'); ?></label>
            <input type="text" name="label-XXNEWKEYXX" id="label-XXNEWKEYXX" value="" />

        </div>
        <div class="col-md-2">
            <label><?php echo __('label.color'); ?></label>
            <select name="labelClass-XXNEWKEYXX" id="labelClass-XXNEWKEYXX" class="colorChosen">
                <option value="label-blue" class="label-blue"><span class="label-blue"><?php echo __('label.blue'); ?></span></option>
                <option value="label-info" class="label-info"><span class="label-info"><?php echo __('label.dark-blue'); ?></span></option>
                <option value="label-darker-blue" class="label-darker-blue"><span class="label-darker-blue"><?php echo __('label.darker-blue'); ?></span></option>
                <option value="label-warning" class="label-warning"><span class="label-warning"><?php echo __('label.yellow'); ?></span></option>
                <option value="label-success" class="label-success"><span class="label-success"><?php echo __('label.green'); ?></span></option>
                <option value="label-dark-green" class="label-dark-green"><span class="label-dark-green"><?php echo __('label.dark-green'); ?></span></option>
                <option value="label-important" class="label-important"><span class="label-important"><?php echo __('label.red'); ?></span></option>
                <option value="label-danger" class="label-danger"><span class="label-danger"><?php echo __('label.dark-red'); ?></span></option>
                <option value="label-pink" class="label-pink"><span class="label-pink"><?php echo __('label.pink'); ?></span></option>
                <option value="label-purple" class="label-purple"><span class="label-purple"><?php echo __('label.purple'); ?></span></option>
                <option value="label-brown" class="label-brown"><span class="label-brown"><?php echo __('label.brown'); ?></span></option>
                <option value="label-default" class="label-default"><span class="label-default"><?php echo __('label.grey'); ?></span></option>
            </select>
        </div>
        <div class="col-md-2">
            <label><?php echo __('label.reportType'); ?></label>
            <select name="labelType-XXNEWKEYXX" id="labelType-XXNEWKEYXX">
                <option value="NEW"><?php echo __('status.new'); ?></option>
                <option value="INPROGRESS"><?php echo __('status.in_progress'); ?></option>
                <option value="DONE"><?php echo __('status.done'); ?></option>
                <option value="NONE"><?php echo __('status.dont_report'); ?></option>
            </select>
        </div>
        <div class="col-md-2">
            <label for=""><?php echo __('label.showInKanban'); ?></label>
            <input type="checkbox" name="labelKanbanCol-XXNEWKEYXX" id="labelKanbanCol-XXNEWKEYXX"/>
        </div>
        <div class="remove">
            <br />
            <a href="javascript:void(0);" onclick="leantime.projectsController.removeStatus('XXNEWKEYXX')" class="delete"><span class="fa fa-trash"></span></a>
        </div>
    </div>
</div>
</div>

<?php if (! $__env->hasRenderedOnce('e59126c7-a8e2-473f-a0e7-1360669a84ca')): $__env->markAsRenderedOnce('e59126c7-a8e2-473f-a0e7-1360669a84ca'); ?> <?php $__env->startPush('scripts'); ?>
<script type='text/javascript'>

    jQuery(document).ready(function() {
        jQuery("#projectdetails select").chosen();

        <?php if(isset($_GET['integrationSuccess'])): ?>
            window.history.pushState({},document.title, '<?php echo e(BASE_URL); ?>/projects/showProject/<?php echo e((int) $project['id']); ?>');
        <?php endif; ?>

        jQuery(".dates").datepicker(
            {
                dateFormat: leantime.dateHelper.getFormatFromSettings("dateformat", "jquery"),
                dayNames: leantime.i18n.__("language.dayNames").split(","),
                dayNamesMin:  leantime.i18n.__("language.dayNamesMin").split(","),
                dayNamesShort: leantime.i18n.__("language.dayNamesShort").split(","),
                monthNames: leantime.i18n.__("language.monthNames").split(","),
                currentText: leantime.i18n.__("language.currentText"),
                closeText: leantime.i18n.__("language.closeText"),
                buttonText: leantime.i18n.__("language.buttonText"),
                isRTL: leantime.i18n.__("language.isRTL") === "true" ? 1 : 0,
                nextText: leantime.i18n.__("language.nextText"),
                prevText: leantime.i18n.__("language.prevText"),
                weekHeader: leantime.i18n.__("language.weekHeader"),
                firstDay: leantime.i18n.__("language.firstDayOfWeek"),
            }
        );

        leantime.projectsController.initProjectTabs();
        leantime.projectsController.initDuplicateProjectModal();
        leantime.projectsController.initTodoStatusSortable("#todoStatusList");
        leantime.projectsController.initSelectFields();
        leantime.usersController.initUserEditModal();

        if (window.leantime && window.leantime.tiptapController) {
            leantime.tiptapController.initComplexEditor();
        }

    });

</script>
<?php $__env->stopPush(); ?> <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Projects/Templates/showProject.blade.php ENDPATH**/ ?>