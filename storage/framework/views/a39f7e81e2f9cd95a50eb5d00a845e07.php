<?php use Leantime\Domain\Auth\Models\Roles; ?>
<?php $tpl->dispatchTplEvent('beforeHeadMenu'); ?>

<ul class="headmenu pull-right">
    <?php $tpl->dispatchTplEvent('insideHeadMenu'); ?>

    <?php echo $__env->make('timesheets::partials.stopwatch', [
               'onTheClock' => $onTheClock
           ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php if($login::userIsAtLeast("manager", true)): ?>
        <li class="notificationDropdown appsLink">
        <a
            class="dropdown-toggle profileHandler newsDropDownHandler"
            hx-get="<?php echo e(BASE_URL); ?>/plugins/marketplaceplugins/getLatest"
            hx-target="#pluginNewsDropdown"
            hx-indicator=".htmx-news-indicator"
            hx-trigger="click"
            preload="mouseover"
            data-toggle='dropdown'
            data-tippy-content='<?php echo e(__('popover.latest_plugins')); ?>'
        >
            <i class="fa-solid fa-puzzle-piece"></i>

        </a>

        <div class='dropdown-menu tw-p-m tw-h-screen tw-overflow-y-auto' id='pluginNewsDropdown'>
            <div class="htmx-indicator htmx-news-indicator">
                <?php if (isset($component)) { $__componentOriginal0b42468a2fe4cdbfcb991722f4d1f54c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b42468a2fe4cdbfcb991722f4d1f54c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.loadingText','data' => ['type' => 'text','count' => '3','includeHeadline' => 'true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::loadingText'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','count' => '3','includeHeadline' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b42468a2fe4cdbfcb991722f4d1f54c)): ?>
<?php $attributes = $__attributesOriginal0b42468a2fe4cdbfcb991722f4d1f54c; ?>
<?php unset($__attributesOriginal0b42468a2fe4cdbfcb991722f4d1f54c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b42468a2fe4cdbfcb991722f4d1f54c)): ?>
<?php $component = $__componentOriginal0b42468a2fe4cdbfcb991722f4d1f54c; ?>
<?php unset($__componentOriginal0b42468a2fe4cdbfcb991722f4d1f54c); ?>
<?php endif; ?>
            </div>
        </div>
    </li>
    <?php endif; ?>

    <li class="notificationDropdown">
        <a
            class="dropdown-toggle profileHandler newsDropDownHandler"
            hx-get="<?php echo e(BASE_URL); ?>/notifications/news/get"
            hx-target="#newsDropdown"
            hx-indicator=".htmx-news-indicator"
            hx-trigger="click"
            preload="mouseover"
            data-toggle='dropdown'
            data-tippy-content='<?php echo e(__('popover.latest_updates')); ?>'
        >
            <span class="fa-solid fa-bolt-lightning"></span>
            <span hx-get="<?php echo e(BASE_URL); ?>/notifications/news-badge/get" hx-trigger="load" hx-target="this"></span>

        </a>

        <div class='dropdown-menu tw-p-m tw-h-screen tw-overflow-y-auto' id='newsDropdown'>
            <div class="htmx-indicator htmx-news-indicator">
                <?php if (isset($component)) { $__componentOriginal0b42468a2fe4cdbfcb991722f4d1f54c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b42468a2fe4cdbfcb991722f4d1f54c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.loadingText','data' => ['type' => 'text','count' => '3','includeHeadline' => 'true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::loadingText'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','count' => '3','includeHeadline' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b42468a2fe4cdbfcb991722f4d1f54c)): ?>
<?php $attributes = $__attributesOriginal0b42468a2fe4cdbfcb991722f4d1f54c; ?>
<?php unset($__attributesOriginal0b42468a2fe4cdbfcb991722f4d1f54c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b42468a2fe4cdbfcb991722f4d1f54c)): ?>
<?php $component = $__componentOriginal0b42468a2fe4cdbfcb991722f4d1f54c; ?>
<?php unset($__componentOriginal0b42468a2fe4cdbfcb991722f4d1f54c); ?>
<?php endif; ?>
            </div>
        </div>
    </li>

    <li class="notificationDropdown">
        <a
            href='javascript:void(0);'
            class="dropdown-toggle profileHandler notificationHandler"
            data-toggle='dropdown'
            data-tippy-content='<?php echo e(__('popover.notifications')); ?>'
        >
            <span class="fa-solid fa-bell"></span>
            <?php if($newNotificationCount>0): ?>
                <span class='notificationCounter'><?php echo e($newNotificationCount); ?></span>
            <?php endif; ?>
        </a>

        <div class='dropdown-menu' id='notificationsDropdown'>

            <div class='dropdownTabs'>
                <a
                    href='javascript:void(0);'
                    class='notifcationTabs active'
                    id="notificationsListLink"
                    onclick="toggleNotificationTabs('notifications')"
                >Notification (<?php echo e($totalNewNotifications); ?>)</a>
                <a
                    href='javascript:void(0);'
                    class='notifcationTabs'
                    id="mentionsListLink"
                    onclick="toggleNotificationTabs('mentions')"
                >Mentions (<?php echo e($totalNewMentions); ?>)</a>
            </div>

            <div class="scroll-wrapper">

                <ul id='notificationsList' class='notifcationViewLists'>
                    <?php if($totalNotificationCount === 0): ?>
                        <p style='padding: 10px'><?php echo e(__('text.no_notifications')); ?></p>
                    <?php endif; ?>

                    <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($notif['type'] == 'mention'): ?>
                            <?php continue; ?>
                        <?php endif; ?>

                        <li
                            <?php if($notif['read'] == 0): ?>
                                class='new'
                            <?php endif; ?>
                            data-url="<?php echo e($notif['url']); ?>"
                            data-id="<?php echo e($notif['id']); ?>"
                        >
                            <a href="<?php echo e($notif['url']); ?>">
                                <span class="notificationProfileImage">
                                    <img src="<?php echo e(BASE_URL); ?>/api/users?profileImage=<?php echo e($notif['authorId']); ?>"/>
                                </span>
                                <span class="notificationDate">
                                    <?php echo e(format($notif['datetime'])->date()); ?>

                                    <?php echo e(format($notif['datetime'])->time()); ?>

                                </span>
                                <span class="notificationTitle"><?php echo strip_tags($tpl->convertRelativePaths($notif['message'])); ?></span>
                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>

                <ul id='mentionsList' style='display:none;' class='notificationViewLists'>
                    <?php if($totalMentionCount === 0): ?>
                        <p style="padding: 10px"><?php echo e(__('text.no_notifications')); ?></p>
                    <?php endif; ?>

                    <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($notif['type'] != 'mention'): ?>
                            <?php continue; ?>
                        <?php endif; ?>

                        <li
                            <?php if($notif['read'] == 0): ?>
                                class='new'
                            <?php endif; ?>
                            data-url="<?php echo e($notif['url']); ?>"
                            data-id="<?php echo e($notif['id']); ?>"
                        >
                            <a href="<?php echo e($notif['url']); ?>">
                                <span class="notificationProfileImage">
                                    <img src="<?php echo e(BASE_URL); ?>/api/users?profileImage=<?php echo e($notif['authorId']); ?>"/>
                                </span>
                                <span class="notificationDate">
                                    <?php echo e(format($notif['datetime'])->date()); ?>

                                    <?php echo e(format($notif['datetime'])->time()); ?>

                                </span>
                                <span class="notificationTitle"><?php echo strip_tags($tpl->convertRelativePaths($notif['message'])); ?></span>
                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>

            </div>
        </div>

    </li>

    <li class="userloggedinfo">
        <a
            href='javascript:void(0);'
            class="dropdown-toggle"
            data-toggle='dropdown'
            data-tippy-content='<?php echo e(__('popover.help')); ?>'
        >
            <span class="fa-solid fa-question-circle"></span>
        </a>
        <ul class="dropdown-menu pull-right">
            <li class="nav-header">
                <?php echo e(__("headline.support")); ?>

            </li>
            <li>
                <a href='#/help/showOnboardingDialog?route=<?php echo e($request->getCurrentRoute()); ?>'>
                <?php echo __("menu.what_is_this_page"); ?>

                </a>
            </li>
            <li>
                <a href='https://support.leantime.io' target="_blank">
                    <?php echo __("menu.knowledge_base"); ?>

                    </a>
            </li>
            <li>
                <a href='https://github.com/Leantime/leantime/issues' target="_blank">
                    <?php echo __("menu.submit_bug"); ?>

                </a>
            </li>
            <li class="nav-header border"><?php echo __("menu.leantime_community"); ?></li>
            <li>
                <a href='https://discord.gg/4zMzJtAq9z' target="_blank">
                    <?php echo __("menu.community"); ?>

                </a>
            </li>
            <li>
                <a href='https://leantime.io/contact-us' target="_blank">
                    <?php echo __("menu.contact_us"); ?>

                </a>
            </li>
            <li class="nav-header border">System</li>
            <li><a href="https://github.com/Leantime/leantime/releases" target="_blank">Leantime V<?php echo e(app(\Leantime\Core\Configuration\AppSettings::class)->appVersion); ?></a></li>
        </ul>
    </li>

    <li>
        <div class="userloggedinfo">

            <?php echo $__env->make("auth::partials.loginInfo", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        </div>

        <?php $tpl->dispatchTplEvent('afterUser'); ?>

    </li>

    <?php $tpl->dispatchTplEvent('beforeHeadMenuClose'); ?>

</ul>

<ul class="headmenu work-modes" style="height: 50px; float: left;">

    <?php $tpl->dispatchTplEvent('afterHeadMenuOpen'); ?>
    <li>
        <?php echo $__env->make('menu::projectSelector', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </li>
    <li>
        <a
            href="<?php echo e(BASE_URL); ?>/dashboard/home"
            <?php if($menuType == 'personal'): ?>
                class="active"
            <?php endif; ?>
            data-tippy-content="<?php echo e(__('popover.my_work')); ?>"
        ><?php echo __('menu.my_work'); ?></a>
    </li>
    <?php if($login::userIsAtLeast("manager", true)): ?>
        <li>
            <?php if($login::userHasRole("manager")): ?>
                <a
                    href="<?php echo e(BASE_URL); ?>/projects/showAll/"
                    <?php if($menuType == 'company'): ?>
                        class="active"
                    <?php endif; ?>
                    data-tippy-content="<?php echo e(__('popover.company')); ?>"
                ><?php echo __('menu.company'); ?></a>
            <?php else: ?>
            <a
                href="<?php echo e(BASE_URL); ?>/setting/editCompanySettings/"
                <?php if($menuType == 'company'): ?>
                    class="active"
                <?php endif; ?>
                data-tippy-content="<?php echo e(__('popover.company')); ?>"
            ><?php echo __('menu.company'); ?></a>
            <?php endif; ?>
        </li>
    <?php endif; ?>

</ul>



<?php $tpl->dispatchTplEvent('afterHeadMenu'); ?>

<?php if (! $__env->hasRenderedOnce('548e7084-49eb-4966-a44e-12f25998aeae')): $__env->markAsRenderedOnce('548e7084-49eb-4966-a44e-12f25998aeae'); ?>
    <?php $__env->startPush('scripts'); ?>
        <script>
            function toggleNotificationTabs(active) {
                jQuery(".notifcationTabs").removeClass("active");
                jQuery('#' + active + 'ListLink').addClass("active");
                jQuery('.notifcationViewLists').hide();
                jQuery('#' + active + 'List').show();
            }

            jQuery(document).ready(function () {
                jQuery('.notificationHandler').on('click', function () {
                    leantime.rpc('Notifications.Notifications.markRead', { id: 'all' })
                        .then(function () {
                            jQuery(".notifcationViewLists li.new").removeClass("new");
                            jQuery(".notificationCounter").fadeOut();
                        })
                        .catch(function (e) { console.error('Could not mark notifications read', e); });
                });

                jQuery('.notificationDropdown .dropdown-menu').on('click', function (e) {
                    e.stopPropagation();
                });

                jQuery('notificationsDropdown li').click(function () {
                    const url = jQuery(this).data('url');
                    const id = jQuery(this).data('id');

                    window.location.href = url;
                })
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Menu/Templates/headMenu.blade.php ENDPATH**/ ?>