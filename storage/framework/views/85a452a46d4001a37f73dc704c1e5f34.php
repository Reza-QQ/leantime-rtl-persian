<?php $__env->startSection('content'); ?>

<div class="pageheader">

    <div class="pageicon"><span class="fa fa-suitcase"></span></div>
    <div class="pagetitle">
        <h5><?php echo __('label.administration'); ?></h5>
        <h1><?php echo __('headline.new_project'); ?></h1>
    </div>

</div><!--pageheader-->

<div class="maincontent">
    <div class="maincontentinner">

        <?php echo $tpl->displayNotification(); ?>


        <div class="tabbedwidget tab-primary projectTabs">

            <ul>
                <li><a href="#projectdetails"><?php echo __('tabs.projectdetails'); ?></a></li>
            </ul>

            <div id="projectdetails">
                <form action="" method="post" class="">

                    <div class="row">

                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['variant' => 'headline','name' => 'name','id' => 'name','style' => 'width:99%','value' => ''.e($project['name']).'','placeholder' => ''.e(__('input.placeholders.enter_title_of_project')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'headline','name' => 'name','id' => 'name','style' => 'width:99%','value' => ''.e($project['name']).'','placeholder' => ''.e(__('input.placeholders.enter_title_of_project')).'']); ?>
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
                                    <input type="hidden" name="projectState"  id="projectState" value="0" />

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <br />
                                    <p>
                                        <?php echo __('label.accomplish'); ?>

                                        <?php echo __('label.describe_outcome'); ?>

                                        <br /><br />
                                    </p>
                                    <textarea name="details" id="details" class="tiptapComplex" rows="5" cols="50"><?php echo e($project['details']); ?></textarea>

                                </div>
                            </div>
                            <div class="padding-top">
                                <?php if(isset($project['id']) && $project['id'] != ''): ?>
                                    <div class="pull-right padding-top">
                                        <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => ''.e(BASE_URL).'/projects/delProject/'.e($project['id']).'','class' => 'delete','state' => 'danger','variant' => 'outline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => ''.e(BASE_URL).'/projects/delProject/'.e($project['id']).'','class' => 'delete','state' => 'danger','variant' => 'outline']); ?><i class="fa fa-trash"></i> <?php echo __('buttons.delete'); ?> <?php echo $__env->renderComponent(); ?>
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
                                <?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => __('buttons.save'),'name' => 'save','id' => 'save']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.save')),'name' => 'save','id' => 'save']); ?>
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
                        </div>

                        <div class="col-md-4">

                            <?php if($projectTypes && count($projectTypes) > 1): ?>
                                <h4 class="widgettitle title-light"><i class="fa-regular fa-rectangle-list"></i> Project Type</h4>
                                <p>The type of the project. This will determine which features are available.</p>
                                <select name="type">
                                    <?php $__currentLoopData = $projectTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>"
                                            <?php if($project['type'] == $key): ?> selected='selected' <?php endif; ?>
                                        ><?php echo __($key); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <br /><br />
                            <?php endif; ?>

                            <?php $tpl->dispatchTplEvent('beforeClientPicker', $project); ?>

                            <div style="margin-bottom: 30px;">
                                <h4 class="widgettitle title-light tw-block"><span
                                        class="fa fa-calendar"></span><?php echo __('label.project_dates'); ?></h4>
                                <div>
                                    <label><?php echo __('label.project_start'); ?></label>
                                    <div class="">
                                        <input type="text" class="dates dateFrom" style="width:100px;" name="start" autocomplete="off"
                                               value="<?php echo e($project['start']); ?>" placeholder="<?php echo e(__('language.dateformat')); ?>"/>

                                    </div>
                                    <label><?php echo __('label.project_end'); ?></label>
                                    <div class="">
                                        <input type="text" class="dates dateTo" style="width:100px;" name="end" autocomplete="off"
                                               value="<?php echo e($project['end']); ?>" placeholder="<?php echo e(__('language.dateformat')); ?>"/>

                                    </div>
                                </div>

                            </div>

                            <div style="margin-bottom: 30px;">

                                <div class="">
                                    <h4 class="widgettitle title-light"><span
                                            class="fa fa-building"></span><?php echo __('label.client_product'); ?></h4>
                                    <select name="clientId" id="clientId">

                                        <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($row['id']); ?>"
                                                <?php if($project['clientId'] == $row['id']): ?> selected=selected <?php endif; ?>
                                            ><?php echo e($row['name']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>
                                    <?php if($login::userIsAtLeast('manager')): ?>
                                        <br /><a href="<?php echo e(BASE_URL); ?>/clients/newClient" target="_blank"><?php echo __('label.client_not_listed'); ?></a>
                                    <?php endif; ?>


                                </div>
                            </div>

                            <div style="margin-bottom: 30px;">
                                <div class="">
                                    <h4 class="widgettitle title-light"><span
                                            class="fa fa-lock-open"></span><?php echo __('labels.defaultaccess'); ?></h4>
                                    <?php echo __('text.who_can_access'); ?>

                                    <br /><br />

                                    <select name="globalProjectUserAccess" style="max-width:300px;">
                                        <option value="restricted" <?php echo e($project['psettings'] == 'restricted' ? "selected='selected'" : ''); ?>><?php echo __('labels.only_chose'); ?></option>
                                        <option value="clients" <?php echo e($project['psettings'] == 'clients' ? "selected='selected'" : ''); ?>><?php echo __('labels.everyone_in_client'); ?></option>
                                        <option value="all" <?php echo e($project['psettings'] == 'all' ? "selected='selected'" : ''); ?>><?php echo __('labels.everyone_in_org'); ?></option>
                                    </select>

                                </div>
                            </div>

                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php if (! $__env->hasRenderedOnce('a4d1d068-4dde-4056-8834-1974f6e3ef15')): $__env->markAsRenderedOnce('a4d1d068-4dde-4056-8834-1974f6e3ef15'); ?> <?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
    jQuery(document).ready(function() {

        jQuery("#projectdetails select").chosen();
        leantime.dateController.initDateRangePicker(".dateFrom", ".dateTo", 2);

        leantime.projectsController.initProjectTabs();
        if (window.leantime && window.leantime.tiptapController) {
            leantime.tiptapController.initComplexEditor();
        }

        }
    );

</script>
<?php $__env->stopPush(); ?> <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Projects/Templates/newProject.blade.php ENDPATH**/ ?>