<?php $__env->startSection('content'); ?>

<div class="pageheader">

    <div class="pageicon"><span class="fa fa-cogs"></span></div>
    <div class="pagetitle">
        <h5><?php echo __('label.administration'); ?></h5>
        <h1><?php echo __('headlines.company_settings'); ?></h1>
    </div>
</div>

<div class="maincontent">
    <?php echo $tpl->displayNotification(); ?>

    <div class="maincontentinner">
        <div class="row">
            <div class="col-md-12">

                <div class="tabbedwidget tab-primary companyTabs">

                    <ul>
                        <li><a href="#details"><span class="fa fa-building"></span> <?php echo __('tabs.details'); ?></a></li>
                        <li><a href="#apiKeys"><i class="fa-solid fa-key"></i> <?php echo __('tabs.apiKeys'); ?></a></li>
                        <?php $tpl->dispatchTplEvent('tabs'); ?>
                    </ul>


                    <div id="details">


                        <div class="row">
                            <div class="col-md-8">
                                <form class="" method="post" id="" action="<?php echo e(BASE_URL); ?>/setting/editCompanySettings#details" >
                                    <p><?php echo __('text.these_are_system_wide_settings'); ?></p>
                                    <br />
                                    <input type="hidden" value="1" name="saveSettings" />

                                    <h4 class="widgettitle title-light"><span
                                            class="fa fa-building"></span><?php echo __('subtitles.companydetails'); ?>

                                    </h4>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label><?php echo __('label.language'); ?></label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="language" id="language">
                                                <?php $__currentLoopData = $languageList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $languagKey => $languageValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option
                                                        value="<?php echo e($languagKey); ?>"
                                                        <?php if($companySettings['language'] == $languagKey): ?> selected='selected' <?php endif; ?>><?php echo e($languageValue); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>


                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2">
                                            <label><?php echo __('label.company_name'); ?></label>
                                        </div>
                                        <div class="col-md-8">
                                            <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['name' => 'name','id' => 'companyName','value' => ''.e($companySettings['name']).'','class' => 'pull-left']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'name','id' => 'companyName','value' => ''.e($companySettings['name']).'','class' => 'pull-left']); ?>
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
                                            <small><?php echo __('text.company_name_helper'); ?></small>
                                        </div>
                                    </div>
                                    <br />
                                    <h4 class="widgettitle title-light"><span
                                            class="fa fa-cog"></span><?php echo __('subtitles.defaults'); ?>

                                    </h4>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="messageFrequency"><?php echo __('label.messages_frequency'); ?></label>
                                        </div>
                                        <div class="col-md-8">
                                                            <span class='field'>
                                                                <select name="messageFrequency" class="input" id="messageFrequency" style="width: 220px">
                                                                    <option value="">--<?php echo __('label.choose_option'); ?>--</option>
                                                                    <option value="300" <?php if($companySettings['messageFrequency'] == '300'): ?> selected <?php endif; ?>><?php echo __('label.5min'); ?></option>
                                                                    <option value="900" <?php if($companySettings['messageFrequency'] == '900'): ?> selected <?php endif; ?>><?php echo __('label.15min'); ?></option>
                                                                    <option value="1800" <?php if($companySettings['messageFrequency'] == '1800'): ?> selected <?php endif; ?>><?php echo __('label.30min'); ?></option>
                                                                    <option value="3600" <?php if($companySettings['messageFrequency'] == '3600'): ?> selected <?php endif; ?>><?php echo __('label.1h'); ?></option>
                                                                    <option value="10800" <?php if($companySettings['messageFrequency'] == '10800'): ?> selected <?php endif; ?>><?php echo __('label.3h'); ?></option>
                                                                    <option value="36000" <?php if($companySettings['messageFrequency'] == '36000'): ?> selected <?php endif; ?>><?php echo __('label.6h'); ?></option>
                                                                    <option value="43200" <?php if($companySettings['messageFrequency'] == '43200'): ?> selected <?php endif; ?>><?php echo __('label.12h'); ?></option>
                                                                    <option value="86400" <?php if($companySettings['messageFrequency'] == '86400'): ?> selected <?php endif; ?>><?php echo __('label.24h'); ?></option>
                                                                    <option value="172800" <?php if($companySettings['messageFrequency'] == '172800'): ?> selected <?php endif; ?>><?php echo __('label.48h'); ?></option>
                                                                    <option value="604800" <?php if($companySettings['messageFrequency'] == '604800'): ?> selected <?php endif; ?>><?php echo __('label.1w'); ?></option>
                                                                </select> <br/>
                                                            </span>
                                        </div>
                                    </div>
                                    <br />
                                    <h4 class="widgettitle title-light"><span
                                            class="fa fa-bell"></span><?php echo __('label.default_notification_types'); ?>

                                    </h4>
                                    <p><?php echo __('label.default_notification_types_description'); ?></p>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php
                                                $categoryLabels = [
                                                    'tasks' => 'label.notification_category_tasks',
                                                    'comments' => 'label.notification_category_comments',
                                                    'goals' => 'label.notification_category_goals',
                                                    'ideas' => 'label.notification_category_ideas',
                                                    'projects' => 'label.notification_category_projects',
                                                    'boards' => 'label.notification_category_boards',
                                                ];
                                            ?>
                                            <?php $__currentLoopData = $notificationCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryKey => $config): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="form-group">
                                                    <label style="display:flex; align-items:flex-start; gap:8px; cursor:pointer; padding:4px 0;">
                                                        <input type="checkbox"
                                                               name="defaultNotificationEventTypes[]"
                                                               value="<?php echo e($categoryKey); ?>"
                                                               style="margin-top:3px;"
                                                               <?php if(in_array($categoryKey, $defaultNotificationTypes)): ?> checked="checked" <?php endif; ?>
                                                        />
                                                        <span>
                                                            <strong><?php echo __($categoryLabels[$categoryKey] ?? $categoryKey); ?></strong><br />
                                                            <small style="color:#888;"><?php echo __($config['description'] ?? ''); ?></small>
                                                        </span>
                                                    </label>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>

                                    <br />
                                    <h4 class="widgettitle title-light"><span
                                            class="fa fa-sliders"></span><?php echo __('label.default_notification_relevance'); ?>

                                    </h4>
                                    <p><?php echo __('label.default_notification_relevance_description'); ?></p>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <select name="defaultNotificationRelevance" class="form-control" style="max-width:300px;">
                                                    <?php $__currentLoopData = $relevanceLevels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level => $labelKey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($level); ?>" <?php if($defaultRelevance === $level): ?> selected <?php endif; ?>>
                                                            <?php echo __($labelKey); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => __('buttons.save'),'id' => 'saveBtn']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.save')),'id' => 'saveBtn']); ?>
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
                            <div class="col-md-4">

                                <form class="" method="post" id="" action="<?php echo e(BASE_URL); ?>/setting/editCompanySettings" >
                                    <input type="hidden" value="1" name="saveLogo" />
                                    <h5 class="widgettitle title-light"><?php echo __('headlines.logo'); ?></h5>
                                    <br />

                                    <div class="row">

                                        <div class="col-md-12">
                                            <?php if($companySettings['logo'] != ''): ?>
                                            <img src='<?php echo e($companySettings['logo']); ?>'  class='logoImg' alt='Logo' id="previousImage" width="260"/>
                                            <?php else: ?>
                                                <?php echo __('text.no_logo'); ?>

                                            <?php endif; ?>
                                            <div id="logoImg" style="height:auto;">
                                            </div>
                                            <br />
                                            <div class="par">

                                                <label><?php echo __('label.upload_new_logo'); ?></label>

                                                <div class='fileupload fileupload-new' data-provides='fileupload'>
                                                    <input type="hidden"/>
                                                    <div class="input-append">
                                                        <div class="uneditable-input span3">
                                                            <i class="fa-file fileupload-exists"></i>
                                                            <span class="fileupload-preview"></span>
                                                        </div>
                                                        <span class="btn btn-default btn-file">
                                                            <span class="fileupload-new"><?php echo __('buttons.select_file'); ?></span>
                                                            <span class='fileupload-exists'><?php echo __('buttons.change'); ?></span>
                                                            <input type='file' name='file' onchange="leantime.settingController.readURL(this)" />
                                                        </span>

                                                        <a href='#' style="margin-left:5px;" class='btn btn-default fileupload-exists' data-dismiss='fileupload' onclick="leantime.usersController.clearCroppie()"><?php echo __('buttons.remove'); ?></a>
                                                    </div>
                                                    <p class='stdformbutton'>
                                                        <span id="save-logo" class="btn btn-primary fileupload-exists ld-ext-right">
                                                            <span onclick="leantime.settingController.saveCroppie()"><?php echo __('buttons.save'); ?></span>
                                                            <span class="ld ld-ring ld-spin"> </span>
                                                        </span>

                                                        <input id="picSubmit" type="submit" name="savePic" class="hidden" value="<?php echo e(__('buttons.upload')); ?>" />
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <hr />
                                <?php echo __('text.logo_reset'); ?><br /><br />
                                <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => ''.e(BASE_URL).'/setting/editCompanySettings?resetLogo=1','contentRole' => 'default']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => ''.e(BASE_URL).'/setting/editCompanySettings?resetLogo=1','contentRole' => 'default']); ?><?php echo __('buttons.reset_logo'); ?> <?php echo $__env->renderComponent(); ?>
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

                    <div id="apiKeys">
                        <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => '#/api/newApiKey','contentRole' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => '#/api/newApiKey','contentRole' => 'primary']); ?>Generate API Key <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $attributes = $__attributesOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__attributesOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $component = $__componentOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__componentOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
                        <br /> <br />
                        <ul class="sortableTicketList">


                        <?php $__currentLoopData = $apiKeys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apiKey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <div class="ticketBox">
                                      <div class="inlineDropDownContainer">
                                        <a href="javascript:void(0)" class="dropdown-toggle ticketDropDown" data-toggle="dropdown">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu">

                                            <li><a href="#/api/apiKey/<?php echo e($apiKey['id']); ?>"><i class="fa fa-edit"></i> Edit Key</a></li>
                                            <li><a href="<?php echo e(BASE_URL); ?>/api/delAPIKey/<?php echo e($apiKey['id']); ?>" class="delete"><i class="fa fa-trash"></i> Delete Key</a></li>
                                        </ul>
                                    </div>
                                    <a href="#/api/apiKey/<?php echo e($apiKey['id']); ?>"><strong><?php echo e($apiKey['firstname']); ?></strong></a><br />
                                    lt_<?php echo e($apiKey['username']); ?>***
                                    | <?php echo __('labels.created_on'); ?>: <?php echo e(format($apiKey['createdOn'])->date()); ?> | <?php echo __('labels.last_used'); ?>: <?php echo e(format($apiKey['lastlogin'])->date()); ?>


                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>

                    </div>

                    <?php $tpl->dispatchTplEvent('tabsContent'); ?>

            </div>
        </div>
    </div>
</div>




</div>

<?php if (! $__env->hasRenderedOnce('0ff7297e-ce11-4452-a6bb-ad3d0c0a3a5f')): $__env->markAsRenderedOnce('0ff7297e-ce11-4452-a6bb-ad3d0c0a3a5f'); ?>
<?php $__env->startPush('scripts'); ?>
<script>
    jQuery(document).ready(function() {
        jQuery(".companyTabs").tabs({
            activate: function (event, ui) {

                window.location.hash = ui.newPanel.selector;
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Setting/Templates/editCompanySettings.blade.php ENDPATH**/ ?>