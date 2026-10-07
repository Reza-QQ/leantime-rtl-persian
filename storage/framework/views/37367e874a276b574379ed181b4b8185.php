<?php
    use Leantime\Domain\Menu\Repositories\Menu;
?>

<form action="" method="post" class="stdform">

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
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <?php echo __('label.accomplish'); ?>

                        <br /><br />
                    </p>
                    <textarea name="details" id="details" class="tiptapComplex" rows="5" cols="50"><?php echo e($project['details']); ?></textarea>
                </div>
            </div>
            <div class="row padding-top">
                <div class="col-md-12">

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
        </div>
        <div class="col-md-4">

            <div class="row marginBottom">



                <?php if($projectTypes && count($projectTypes) > 1): ?>
                <div class="col-md-12 center">
                    <h4 class="widgettitle title-light"><i class="fa-regular fa-rectangle-list"></i> Project Type</h4>
                    <p>The type of the project. This will determine which features are available.</p>
                    <select name="type">
                        <?php $__currentLoopData = $projectTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($tpl->escape($key)); ?>"
                            <?php if($project['type'] == $key): ?>
                                selected='selected'
                            <?php endif; ?>
                            ><?php echo __($tpl->escape($type)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <br /><br />
                </div>
                <?php endif; ?>


            </div>
            <div class="row marginBottom">

                <div class="col-md-12 center">

                    <h4 class="widgettitle title-light"><span
                            class="fa fa-picture-o"></span><?php echo __('label.project_avatar'); ?></h4>

                    <img src='<?php echo e(BASE_URL); ?>/api/projects?projectAvatar=<?php echo e($project['id']); ?>&v=<?php echo e(format($project['modified'])->timestamp()); ?>'  class='profileImg' alt='Profile Picture' id="previousImage"/>
                    <div id="projectAvatar">
                    </div>

                    <div class="par">

                        <div class='fileupload fileupload-new' data-provides='fileupload'>
                            <input type="hidden"/>
                            <div class="input-append">
                                <div class="uneditable-input span3">
                                    <i class="fa-file fileupload-exists"></i>
                                    <span class="fileupload-preview"></span>
                                </div>
                                <span class="btn btn-file">
                                        <span class="fileupload-new"><?php echo __('buttons.select_file'); ?></span>
                                        <span class='fileupload-exists'><?php echo __('buttons.change'); ?></span>
                                        <input type='file' name='file' onchange="leantime.projectsController.readURL(this)" accept=".jpg,.png,.gif,.webp"/>
                                    </span>

                                <a href='#' class='btn fileupload-exists' data-dismiss='fileupload' onclick="leantime.projectsController.clearCroppie()"><?php echo __('buttons.remove'); ?></a>
                            </div>

                            <span id="save-picture" class="btn btn-primary fileupload-exists ld-ext-right">
                                <span onclick="leantime.projectsController.saveCroppie()"><?php echo __('buttons.save'); ?></span>
                                <span class="ld ld-ring ld-spin"></span>
                            </span>
                        <input type="hidden" name="profileImage" value="1" />
                        <input id="picSubmit" type="submit" name="savePic" class="hidden"
                               value="<?php echo e(__('buttons.upload')); ?>"/>

                        </div>
                    </div>
                </div>

            </div>

                <?php $tpl->dispatchTplEvent('afterProjectAvatar', $project); ?>

                <div class="row marginBottom" style="margin-bottom: 30px;">
                    <div class="col-md-12">
                        <h4 class="widgettitle title-light"><span
                                class="fa fa-calendar"></span><?php echo __('label.project_dates'); ?></h4>


                        <label class="control-label"><?php echo __('label.project_start'); ?></label>
                        <div class="">
                            <input type="text" class="dates" style="width:100px;" name="start" autocomplete="off"
                                   value="<?php echo e(format($project['start'])->date()); ?>" placeholder="<?php echo e(__('language.dateformat')); ?>"/>

                        </div>
                        <label class="control-label"><?php echo __('label.project_end'); ?></label>
                        <div class="">
                            <input type="text" class="dates" style="width:100px;" name="end" autocomplete="off"
                                   value="<?php echo e(format($project['end'])->date()); ?>" placeholder="<?php echo e(__('language.dateformat')); ?>"/>

                        </div>
                    </div>

                </div>


                <div class="row" style="margin-bottom: 30px;">

                    <div class="col-md-12 " style="margin-bottom: 30px;">
                    <h4 class="widgettitle title-light"><span
                            class="fa fa-building"></span><?php echo __('label.client_product'); ?></h4>
                    <select name="clientId" id="clientId">

                        <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($row['id']); ?>"
                                <?php if($project['clientId'] == $row['id']): ?>
                                    selected=selected
                                <?php endif; ?>
                            ><?php echo e($row['name']); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>
                    <?php if($login::userIsAtLeast('manager')): ?>
                        <br /><a href="<?php echo e(BASE_URL); ?>/clients/newClient" target="_blank"><?php echo __('label.client_not_listed'); ?></a>
                    <?php endif; ?>


                </div>
                </div>



            <div class="row marginBottom" style="margin-bottom: 30px;">
                <div class="col-md-12">
                    <h4 class="widgettitle title-light"><span
                            class="fa fa-wrench"></span><?php echo __('label.settings'); ?></h4>

            <input type="hidden" name="menuType" id="menuType"
                           value="<?php echo e(Menu::DEFAULT_MENU); ?>">

                    <div class="form-group">

                <label class="col-md-4 control-label" for="projectState"><?php echo __('label.project_state'); ?></label>
                <div class="col-md-6">
                    <select name="projectState" id="projectState">
                        <option value="0" <?php if($project['state'] == 0): ?> selected=selected <?php endif; ?>><?php echo __('label.open'); ?></option>

                        <option value="-1" <?php if($project['state'] == -1): ?> selected=selected <?php endif; ?>><?php echo __('label.closed'); ?></option>

                    </select>
                </div>
            </div>

                </div>
            </div>

            <div class="row marginBottom" style="margin-bottom: 30px;">
                <div class="col-md-12 ">
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

            <div class="row" style="margin-bottom: 30px;">
                <div class="col-md-12 ">
                    <h4 class="widgettitle title-light"><span
                                class="fa fa-money-bill-alt"></span><?php echo __('label.budgets'); ?></h4>
                    <div class="form-group">
                        <label class="col-md-4 control-label"for="hourBudget"><?php echo __('label.hourly_budget'); ?></label>
                        <div class="col-md-6">
                            <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['variant' => 'large','name' => 'hourBudget','id' => 'hourBudget','value' => ''.e($project['hourBudget']).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'large','name' => 'hourBudget','id' => 'hourBudget','value' => ''.e($project['hourBudget']).'']); ?>
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
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="dollarBudget"><?php echo __('label.budget_cost'); ?></label>
                        <div class="col-md-6">
                            <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['variant' => 'large','name' => 'dollarBudget','id' => 'dollarBudget','value' => ''.e($project['dollarBudget']).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'large','name' => 'dollarBudget','id' => 'dollarBudget','value' => ''.e($project['dollarBudget']).'']); ?>
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
                    </div>

                </div>
            </div>

        </div>

    </div>


</form>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Projects/Templates/submodules/projectDetails.blade.php ENDPATH**/ ?>