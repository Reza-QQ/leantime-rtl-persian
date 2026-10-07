<?php $__env->startSection('content'); ?>

<?php if (isset($component)) { $__componentOriginal73464617f1e536702d3c383ba117853c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal73464617f1e536702d3c383ba117853c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.pageheader','data' => ['icon' => 'fa fa-user']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::pageheader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('fa fa-user')]); ?>
    <h5><?php echo e(__('label.overview')); ?></h5>
    <h1><?php echo __('headlines.accountSettings'); ?></h1>

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
        <div class="col-md-12">
            <div class="maincontentinner">
                <div class="tabbedwidget tab-primary accountTabs">

                    <ul>
                        <li><a href="#myProfile"><?php echo __('tabs.myProfile'); ?></a></li>
                        <li><a href="#security"><?php echo __('tabs.security'); ?></a></li>
                        <li><a href="#settings"><?php echo __('tabs.settings'); ?></a></li>
                        <li><a href="#notifications"><?php echo __('tabs.notifications'); ?></a></li>
                        <li><a href="#theme"><?php echo __('tabs.theme'); ?></a></li>
                        <?php $tpl->dispatchTplEvent('tabs'); ?>
                    </ul>

                    <div id="myProfile">
                        <div class="row">
                            <div class="col-md-8">
                                <form action="" method="post">
                                    <h4 class="widgettitle title-light"><?php echo $tpl->__('label.profile_information'); ?></h4>
                                    <input type="hidden" name="<?php echo e(session("formTokenName")); ?>" value="<?php echo e(session("formTokenValue")); ?>" />
                                    <div class="row-fluid">
                                        <div class="form-group">
                                            <label for="firstname" ><?php echo e(__('label.firstname')); ?></label>
                                            <span>
                                                <input type="text" class="input" name="firstname" id="firstname" <?php echo e(session("userdata.isExternalAuth") ? "disabled='disabled'" : ''); ?>

                                                value="<?php echo e($values['firstname']); ?>"/><br/>
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <label for="lastname" ><?php echo e(__('label.lastname')); ?></label>
                                            <span>
                                                <input type="text" name="lastname" class="input" id="lastname" <?php echo e(session("userdata.isExternalAuth") ? "disabled='disabled'" : ''); ?>

                                                value="<?php echo e($values['lastname']); ?>"/><br/>
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <label for="user" ><?php echo e(__('label.email')); ?></label>
                                            <span>
                                                <input type="text" name="user" class="input" id="user" <?php echo e(session("userdata.isExternalAuth") ? "disabled='disabled'" : ''); ?>

                                                value="<?php echo e($values['user']); ?>"/><br/>
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <label for="phone" ><?php echo e(__('label.phone')); ?></label>
                                            <span>
                                                <input type="text" name="phone" class="input" id="phone" <?php echo e(session("userdata.isExternalAuth") ? "disabled='disabled'" : ''); ?>

                                                value="<?php echo e($values['phone']); ?>"/><br/>
                                            </span>
                                        </div>
                                        <p class='stdformbutton'>
                                            <input type="hidden" name="profileInfo" value="1" />

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
                                        </p>
                                        <br />
                                        <h4 class="widgettitle title-light"><?php echo e(__('label.employee_information')); ?></h4>
                                        <em><?php echo e(__('text.only_admins_can_change_user_info')); ?></em><br /><br />
                                        <div class="form-group">
                                            <label for="phone" ><?php echo e(__('label.jobTitle')); ?></label>
                                            <span>
                                                <input type="text" name="jobTitle" readonly class="input" id="jobTitle"}}
                                                value="<?php echo e($values['jobTitle']); ?>"/><br/>
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <label for="phone" ><?php echo e(__('label.jobLevel')); ?></label>
                                            <span>
                                                <input type="text" name="jobLevel" readonly class="input" id="jobLevel"}}
                                                       value="<?php echo e($values['jobLevel']); ?>"/><br/>
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <label for="phone" ><?php echo e(__('label.department')); ?></label>
                                            <span>
                                                <input type="text" name="department" readonly class="input" id="department"}}
                                                       value="<?php echo e($values['department']); ?>"/><br/>
                                            </span>
                                        </div>

                                    </div>


                                </form>
                            </div>
                            <div class="col-md-4">
                                <div class="center">
                                    <img src='<?php echo e(BASE_URL); ?>/api/users?profileImage=<?php echo e($user['id']); ?>&v=<?php echo e(format($user['modified'])->timestamp()); ?>'  class='profileImg tw-rounded-full' alt='Profile Picture' id="previousImage"/>
                                    <div id="profileImg">
                                    </div>

                                    <div class="par">

                                        <label><?php echo e(__('label.upload')); ?></label>

                                        <div class='fileupload fileupload-new' data-provides='fileupload'>
                                            <input type="hidden"/>
                                            <div class="input-append">
                                                <div class="uneditable-input span3">
                                                    <i class="fa-file fileupload-exists"></i>
                                                    <span class="fileupload-preview"></span>
                                                </div>
                                                <span class="btn btn-file">
                                        <span class="fileupload-new"><?php echo e(__('buttons.select_file')); ?></span>
                                        <span class='fileupload-exists'><?php echo e(__('buttons.change')); ?></span>
                                        <input type='file' name='file' onchange="leantime.usersController.readURL(this)" accept=".jpg,.png,.gif,.webp"/>
                                    </span>

                                                <a href='#' class='btn fileupload-exists' data-dismiss='fileupload' onclick="leantime.usersController.clearCroppie()"><?php echo e(__('buttons.remove')); ?></a>
                                            </div>
                                            <p class='stdformbutton'>
                                    <span id="save-picture" class="btn btn-primary fileupload-exists ld-ext-right">
                                        <span onclick="leantime.usersController.saveCroppie()"><?php echo e(__('buttons.save')); ?></span>
                                        <span class="ld ld-ring ld-spin"></span>
                                    </span>
                                                <input type="hidden" name="profileImage" value="1" />
                                                <input id="picSubmit" type="submit" name="savePic" class="hidden"
                                                       value="<?php echo e(__('buttons.upload')); ?>"/>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div id="security">
                        <h4 class="widgettitle title-light">
                            <?php echo __('headlines.change_password'); ?>

                        </h4>
                        <?php if(session("userdata.isExternalAuth") ): ?>
                            <strong> <?php echo e(__("text.account_managed_external_auth")); ?></strong><br /><br />
                        <?php endif; ?>
                        <form method="post">
                            <input type="hidden" name="<?php echo e(session("formTokenName")); ?>" value="<?php echo e(session("formTokenValue")); ?>" />
                            <div class="row-fluid">
                                <div class="form-group">
                                    <label for="currentPassword" ><?php echo e(__('label.old_password')); ?></label>
                                    <span>
                                        <input type='password' value="" name="currentPassword" class="input" <?php echo e(session("userdata.isExternalAuth") ? "disabled='disabled'" : ''); ?>

                                               id="currentPassword"/><br/>
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label for="newPassword" ><?php echo e(__('label.new_password')); ?></label>
                                    <span>
                                        <input type='password' value="" name="newPassword" class="input" <?php echo e(session("userdata.isExternalAuth") ? "disabled='disabled'" : ''); ?>

                                               id="newPassword"/>
                                        <span id="pwStrength"></span>

                                    </span>
                                </div>

                                <div class="form-group">
                                    <label for="confirmPassword" ><?php echo e(__('label.password_repeat')); ?></label>
                                    <span>
                                        <input type="password" value="" name="confirmPassword" class="input" <?php echo e(session("userdata.isExternalAuth") ? "disabled='disabled'" : ''); ?>

                                               id="confirmPassword"/><br/>
                                        <?php if(!session("userdata.isExternalAuth") ): ?>
                                        <small><?php echo e(__('label.passwordRequirements')); ?></small>
                                       <?php endif; ?>
                                    </span>

                                </div>
                            </div>
                            <?php if(!session("userdata.isExternalAuth") ): ?>
                                <input type="hidden" name="savepw" value="1" />
                                <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => __('buttons.save'),'name' => 'save','id' => 'savePw']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.save')),'name' => 'save','id' => 'savePw']); ?>
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
                        </form>
                        <br /><br />
                        <h4 class="widgettitle title-light">
                            <i class="fa-solid fa-shield-halved"></i> <?php echo e(__('headlines.twoFA')); ?>

                        </h4>
                        <?php if($values['twoFAEnabled'] ): ?>
                            <p><?php echo __('text.twoFA_enabled'); ?></p>
                        <?php else: ?>
                            <p><?php echo __('text.twoFA_disabled'); ?></p>
                        <?php endif; ?>
                        <p><a href="<?php echo e(BASE_URL); ?>/twoFA/edit"><?php echo __('text.twoFA_manage'); ?></a></p>
                    </div>

                    <div id="settings">
                        <form action="" method="post">
                            <input type="hidden" name="<?php echo e(session("formTokenName")); ?>" value="<?php echo e(session("formTokenValue")); ?>" />
                            <div class="row-fluid">
                                <div class="form-group">
                                    <label for="language" ><?php echo e(__('label.language')); ?></label>
                                    <span class='field'>
                                        <select name="language" id="language" style="width: 220px">
                                            <?php $__currentLoopData = $languageList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $languagKey => $languageValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($languagKey); ?>"
                                                        <?php if($userLang == $languagKey ): ?>
                                                            selected='selected'
                                                         <?php endif; ?> ><?php echo e($languageValue); ?></option>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="date_format" ><?php echo e(__('label.date_format')); ?></label>
                                    <span>
                                        <select name="date_format" id="date_format" style="width: 220px">
                                           <?php
                                            $dateFormats = $dateTimeValues['dates'];
                                            $dateTimeNow = date_create();
                                           ?>

                                            <?php $__currentLoopData = $dateFormats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $format): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <option value="<?php echo e($format); ?>"
                                                        <?php if($dateFormat == $format): ?>
                                                            selected='selected'
                                                        <?php endif; ?> ><?php echo e(date_format($dateTimeNow, $format)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="time_format" ><?php echo e(__('label.time_format')); ?></label>
                                    <span>
                                        <select name="time_format" id="time_format" style="width: 220px">
                                            <?php
                                                $timeFormats = $dateTimeValues['times'];
                                                $dateTimeNow = date_create();
                                            ?>

                                            <?php $__currentLoopData = $timeFormats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $format): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <option value="<?php echo e($format); ?>"
                                                        <?php if($timeFormat == $format): ?>
                                                            selected='selected'
                                                        <?php endif; ?>><?php echo e(date_format($dateTimeNow, $format)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="timezone" ><?php echo e(__('label.timezone')); ?></label>
                                    <span>
                                        <select name="timezone" id="timezone" style="width: 220px">

                                            <?php $__currentLoopData = $timezoneOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($tz); ?>"
                                                        <?php if($timezone === $tz ): ?>
                                                            selected='selected'
                                                        <?php endif; ?>
                                                        ><?php echo e($tz); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </span>
                                </div>
                            </div>
                            <input type="hidden" name="saveSettings" value="1" />
                            <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => __('buttons.save'),'name' => 'save','id' => 'saveSettings']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.save')),'name' => 'save','id' => 'saveSettings']); ?>
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

                    <div id="theme">
                        <form action="" method="post">
                            <input type="hidden" name="<?php echo e(session("formTokenName")); ?>" value="<?php echo e(session("formTokenValue")); ?>" />
                            <div class="row-fluid">
                                <div class="form-group">
                                    <label for="themeSelect">Optimal Stimulation</label>
                                    <span class='field tw-flex tw-w-80'>

                                         <?php
                                         foreach ($availableThemes as $key => $theme) { ?>
                                             <?php if (isset($component)) { $__componentOriginal645063f26a0fd36e128d303472e3de4e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal645063f26a0fd36e128d303472e3de4e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.selectable','data' => ['selected' => ''.e(($userTheme == $key ? 'true' : 'false')).'','id' => '','name' => 'theme','value' => $key,'label' => '','class' => 'tw-w-1/2','onclick' => 'leantime.snippets.toggleBg(\''.e($key).'\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::selectable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['selected' => ''.e(($userTheme == $key ? 'true' : 'false')).'','id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(''),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('theme'),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($key),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(''),'class' => 'tw-w-1/2','onclick' => 'leantime.snippets.toggleBg(\''.e($key).'\')']); ?>
                                                <img src="<?php echo e(BASE_URL); ?>/dist/images/background-<?php echo e($key); ?>.png" style="margin:0; border-radius:10px;" />
                                                     <br /><?= $tpl->__($theme['name']) ?>
                                              <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal645063f26a0fd36e128d303472e3de4e)): ?>
<?php $attributes = $__attributesOriginal645063f26a0fd36e128d303472e3de4e; ?>
<?php unset($__attributesOriginal645063f26a0fd36e128d303472e3de4e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal645063f26a0fd36e128d303472e3de4e)): ?>
<?php $component = $__componentOriginal645063f26a0fd36e128d303472e3de4e; ?>
<?php unset($__componentOriginal645063f26a0fd36e128d303472e3de4e); ?>
<?php endif; ?>

                                        <?php } ?>
                                    </span>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">

                                        <hr />
                                        <label for="colormode" ><?php echo e(__('label.colormode')); ?></label>

                                        <?php if (isset($component)) { $__componentOriginal645063f26a0fd36e128d303472e3de4e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal645063f26a0fd36e128d303472e3de4e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.selectable','data' => ['selected' => ($userColorMode == 'light') ? 'true' : '','id' => 'light','name' => 'colormode','value' => 'light','label' => 'Light','onclick' => 'leantime.snippets.toggleTheme(\'light\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::selectable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['selected' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(($userColorMode == 'light') ? 'true' : ''),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('light'),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('colormode'),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('light'),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Light'),'onclick' => 'leantime.snippets.toggleTheme(\'light\')']); ?>
                                            <label for="colormode-light" class="tw-w-[100px]">
                                                <i class="fa-solid fa-sun tw-font-xxl"></i>
                                            </label>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal645063f26a0fd36e128d303472e3de4e)): ?>
<?php $attributes = $__attributesOriginal645063f26a0fd36e128d303472e3de4e; ?>
<?php unset($__attributesOriginal645063f26a0fd36e128d303472e3de4e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal645063f26a0fd36e128d303472e3de4e)): ?>
<?php $component = $__componentOriginal645063f26a0fd36e128d303472e3de4e; ?>
<?php unset($__componentOriginal645063f26a0fd36e128d303472e3de4e); ?>
<?php endif; ?>

                                        <?php if (isset($component)) { $__componentOriginal645063f26a0fd36e128d303472e3de4e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal645063f26a0fd36e128d303472e3de4e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.selectable','data' => ['selected' => ($userColorMode == 'dark') ? 'true' : '','id' => 'dark','name' => 'colormode','value' => 'dark','label' => 'Dark','onclick' => 'leantime.snippets.toggleTheme(\'dark\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::selectable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['selected' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(($userColorMode == 'dark') ? 'true' : ''),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('dark'),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('colormode'),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('dark'),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Dark'),'onclick' => 'leantime.snippets.toggleTheme(\'dark\')']); ?>
                                            <label for="colormode-light" class="tw-w-[100px]">
                                                <i class="fa-solid fa-moon tw-font-xxl"></i>
                                            </label>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal645063f26a0fd36e128d303472e3de4e)): ?>
<?php $attributes = $__attributesOriginal645063f26a0fd36e128d303472e3de4e; ?>
<?php unset($__attributesOriginal645063f26a0fd36e128d303472e3de4e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal645063f26a0fd36e128d303472e3de4e)): ?>
<?php $component = $__componentOriginal645063f26a0fd36e128d303472e3de4e; ?>
<?php unset($__componentOriginal645063f26a0fd36e128d303472e3de4e); ?>
<?php endif; ?>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <hr />
                                        <label>Font</label>
                                        <?php $__currentLoopData = $availableFonts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $font): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <?php if (isset($component)) { $__componentOriginal645063f26a0fd36e128d303472e3de4e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal645063f26a0fd36e128d303472e3de4e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.selectable','data' => ['selected' => ($themeFont == $font) ? 'true' : '','id' => $key,'name' => 'themeFont','value' => $font,'label' => $font,'onclick' => 'leantime.snippets.toggleFont(\''.e($font).'\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::selectable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['selected' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(($themeFont == $font) ? 'true' : ''),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($key),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('themeFont'),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($font),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($font),'onclick' => 'leantime.snippets.toggleFont(\''.e($font).'\')']); ?>
                                                <label for="selectable-<?php echo e($key); ?>" class="font tw-w-[200px]"
                                                       style="font-family:'<?php echo e($font); ?>'; font-size:16px;">
                                                    The quick brown fox jumps over the lazy dog
                                                </label>
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal645063f26a0fd36e128d303472e3de4e)): ?>
<?php $attributes = $__attributesOriginal645063f26a0fd36e128d303472e3de4e; ?>
<?php unset($__attributesOriginal645063f26a0fd36e128d303472e3de4e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal645063f26a0fd36e128d303472e3de4e)): ?>
<?php $component = $__componentOriginal645063f26a0fd36e128d303472e3de4e; ?>
<?php unset($__componentOriginal645063f26a0fd36e128d303472e3de4e); ?>
<?php endif; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <hr />
                                        <label>Color Scheme</label>
                                        <?php $__currentLoopData = $availableColorSchemes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $scheme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if (isset($component)) { $__componentOriginal645063f26a0fd36e128d303472e3de4e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal645063f26a0fd36e128d303472e3de4e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.selectable','data' => ['class' => 'circle','selected' => ($userColorScheme == $key) ? 'true' : '','id' => $key,'name' => 'colorscheme','value' => $key,'label' => __($scheme['name']),'onclick' => 'leantime.snippets.toggleColors(\''.e($scheme['primaryColor']).'\',\''.e($scheme['secondaryColor']).'\');']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::selectable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'circle','selected' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(($userColorScheme == $key) ? 'true' : ''),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($key),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('colorscheme'),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($key),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__($scheme['name'])),'onclick' => 'leantime.snippets.toggleColors(\''.e($scheme['primaryColor']).'\',\''.e($scheme['secondaryColor']).'\');']); ?>
                                                <label for="color-<?php echo e($key); ?>" class="colorCircle"
                                                       style="background:linear-gradient(135deg, <?php echo e($scheme["primaryColor"]); ?> 20%, <?php echo e($scheme["secondaryColor"]); ?> 100%);">
                                                </label>
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal645063f26a0fd36e128d303472e3de4e)): ?>
<?php $attributes = $__attributesOriginal645063f26a0fd36e128d303472e3de4e; ?>
<?php unset($__attributesOriginal645063f26a0fd36e128d303472e3de4e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal645063f26a0fd36e128d303472e3de4e)): ?>
<?php $component = $__componentOriginal645063f26a0fd36e128d303472e3de4e; ?>
<?php unset($__componentOriginal645063f26a0fd36e128d303472e3de4e); ?>
<?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                            <br /><br />
                            <input type="hidden" name="saveTheme" value="1" />
                            <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => __('buttons.save'),'name' => 'save','id' => 'saveTheme']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.save')),'name' => 'save','id' => 'saveTheme']); ?>
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

                        <?php $tpl->dispatchTplEvent('themecontent'); ?>
                    </div>

                    <div id="notifications">
                        <form action="" method="post">
                            <input type="hidden" name="<?php echo e(session("formTokenName")); ?>" value="<?php echo e(session("formTokenValue")); ?>" />
                            <div class="row-fluid">
                                <div class="form-group">
                                    <label for="notifications" style="display: inline-flex; align-items: center; gap: 8px; cursor: pointer;">
                                        <input type="checkbox" value="on" name="notifications" class="input"
                                               id="notifications"
                                               <?php if($values['notifications'] == "1" ): ?>
                                                   checked='checked'
                                               <?php endif; ?>/>
                                        <?php echo e(__('label.receive_notifications')); ?>

                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="messagesfrequency" ><?php echo e(__('label.messages_frequency')); ?></label>
                                    <span>
                                        <select name="messagesfrequency" class="input" id="messagesfrequency" style="width: 220px">
                                            <option value="">--<?php echo e(__('label.choose_option')); ?>--</option>
                                             <option value="60"
                                                     <?php if($values['messagesfrequency'] == "60" ): ?>
                                                 selected="selected"
                                             <?php endif; ?>><?php echo e(__('label.1min')); ?></option>
                                            <option value="300" <?php if($values['messagesfrequency'] == "300" ): ?>
                                                selected="selected"
                                                                <?php endif; ?>><?php echo e(__('label.5min')); ?></option>
                                            <option value="900" <?php if($values['messagesfrequency'] == "900" ): ?>
                                                selected="selected"
                                                                <?php endif; ?>><?php echo e(__('label.15min')); ?></option>
                                            <option value="1800" <?php if($values['messagesfrequency'] == "1800" ): ?>
                                                selected="selected"
                                                                 <?php endif; ?>><?php echo e(__('label.30min')); ?></option>
                                            <option value="3600" <?php if($values['messagesfrequency'] == "3600" ): ?>
                                                selected="selected"
                                                                 <?php endif; ?>><?php echo e(__('label.1h')); ?></option>
                                            <option value="10800" <?php if($values['messagesfrequency'] == "10800" ): ?>
                                                selected="selected"
                                                                  <?php endif; ?>><?php echo e(__('label.3h')); ?></option>
                                            <option value="36000" <?php if($values['messagesfrequency'] == "36000" ): ?>
                                                selected="selected"
                                                                  <?php endif; ?>><?php echo e(__('label.6h')); ?></option>
                                            <option value="43200" <?php if($values['messagesfrequency'] == "43200" ): ?>
                                                selected="selected"
                                                                  <?php endif; ?>><?php echo e(__('label.12h')); ?></option>
                                            <option value="86400" <?php if($values['messagesfrequency'] == "86400" ): ?>
                                                selected="selected"
                                                                  <?php endif; ?>><?php echo e(__('label.24h')); ?></option>
                                            <option value="172800" <?php if($values['messagesfrequency'] == "172800" ): ?>
                                                selected="selected"
                                                                   <?php endif; ?>><?php echo e(__('label.48h')); ?></option>
                                            <option value="604800" <?php if($values['messagesfrequency'] == "604800" ): ?>
                                                selected="selected"
                                                                   <?php endif; ?>><?php echo e(__('label.1w')); ?></option>
                                        </select> <br/>
                                    </span>
                                </div>
                            </div>

                            <hr />

                            <h4 class="widgettitle title-light"><?php echo e(__('label.notification_event_types')); ?></h4>
                            <p><small><?php echo e(__('label.notification_event_types_description')); ?></small></p>
                            <div class="tw-mb-4">
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
                                    <label class="tw-flex tw-items-start tw-gap-2 tw-cursor-pointer tw-m-0 tw-py-1.5">
                                        <input type="checkbox"
                                               name="enabledEventTypes[]"
                                               value="<?php echo e($categoryKey); ?>"
                                               class="input tw-mt-0.5"
                                               <?php if(in_array($categoryKey, $enabledEventTypes)): ?>
                                                   checked="checked"
                                               <?php endif; ?>
                                        />
                                        <span>
                                            <strong><?php echo e(__($categoryLabels[$categoryKey] ?? $categoryKey)); ?></strong><br />
                                            <small class="tw-text-gray-500"><?php echo e(__($config['description'] ?? '')); ?></small>
                                        </span>
                                    </label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                            <hr />

                            <h4 class="widgettitle title-light"><?php echo e(__('label.project_notifications')); ?></h4>
                            <p><small><?php echo e(__('label.project_notifications_description')); ?></small></p>
                            <div class="tw-max-w-lg tw-max-h-[350px] tw-overflow-y-auto tw-mb-5">
                                <?php if(count($userProjects) > 0): ?>
                                    <?php $__currentLoopData = $userProjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $currentLevel = $projectNotificationLevels[$project['id']] ?? $companyDefaultRelevance;
                                        ?>
                                        <div class="tw-flex tw-items-center tw-justify-between tw-py-1.5 tw-border-b tw-border-gray-100">
                                            <span class="tw-truncate tw-mr-3">
                                                <?php echo e($project['name']); ?>

                                                <?php if(!empty($project['clientName'])): ?>
                                                    <span class="tw-text-gray-400 tw-text-xs">(<?php echo e($project['clientName']); ?>)</span>
                                                <?php endif; ?>
                                            </span>
                                            <select name="projectNotificationLevel[<?php echo e($project['id']); ?>]"
                                                    class="tw-text-sm tw-border tw-border-gray-300 tw-rounded tw-px-2 tw-py-1 tw-min-w-[140px]">
                                                <?php $__currentLoopData = $relevanceLevels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level => $labelKey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($level); ?>"
                                                            <?php if($currentLevel === $level): ?> selected <?php endif; ?>
                                                    ><?php echo e(__($labelKey)); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <p class="tw-text-gray-400 tw-p-2"><?php echo e(__('label.no_projects')); ?></p>
                                <?php endif; ?>
                            </div>

                            <input type="hidden" name="savenotifications" value="1" />
                            <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => __('buttons.save'),'name' => 'save']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.save')),'name' => 'save']); ?>
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

                    <?php $tpl->dispatchTplEvent('tabsContent'); ?>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

    jQuery(document).ready(function(){

        leantime.usersController.checkPWStrength('newPassword');

        jQuery('.accountTabs').tabs();

        jQuery("#messagesfrequency").chosen();
        jQuery("#language").chosen();
        jQuery("#themeSelect").chosen();

    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Users/Templates/editOwn.blade.php ENDPATH**/ ?>