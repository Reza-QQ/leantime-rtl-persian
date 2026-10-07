<?php
    /** @var array $activity */
    /** @var int $articleId */

    $actionIcons = [
        'article.create' => 'fa fa-plus',
        'article.edit' => 'fa fa-edit',
        'article.title' => 'fa fa-heading',
        'article.status' => 'fa fa-circle-dot',
        'article.parent' => 'fa fa-folder-tree',
        'article.milestone' => 'fa fa-flag',
        'article.tags' => 'fa fa-tags',
        'article.icon' => 'fa fa-icons',
    ];

    $actionClasses = [
        'article.create' => '',
        'article.edit' => 'edit',
        'article.title' => 'edit',
        'article.status' => 'status',
        'article.parent' => '',
        'article.milestone' => '',
        'article.tags' => 'edit',
        'article.icon' => '',
    ];

    /**
     * Build a natural-language label based on the action and its values.
     */
    function getActivityLabel(string $action, array $values): string
    {
        switch ($action) {
            case 'article.create':
                return 'مقاله را ایجاد کرد';

            case 'article.edit':
                return 'متن سند را ویرایش کرد';

            case 'article.title':
                $to = $values['to'] ?? '';
                return $to !== '' ? 'نام مقاله را به «' . e($to) . '» تغییر داد' : 'نام مقاله را تغییر داد';

            case 'article.status':
                $to = $values['to'] ?? '';
                if ($to === 'published') {
                    return 'مقاله را منتشر کرد';
                } elseif ($to === 'draft') {
                    return 'به پیش‌نویس بازگرداند';
                }
                return 'وضعیت را تغییر داد';

            case 'article.parent':
                $to = $values['to'] ?? '';
                if (empty($to) || $to === '0') {
                    return 'مقاله والد را حذف کرد';
                }
                return 'یک مقاله والد اضافه کرد';

            case 'article.milestone':
                $to = $values['to'] ?? '';
                if (empty($to) || $to === '0') {
                    return 'نقطه عطف را حذف کرد';
                }
                return 'یک نقطه عطف اضافه کرد';

            case 'article.tags':
                return 'برچسب‌ها را به‌روزرسانی کرد';

            case 'article.icon':
                return 'آیکون را تغییر داد';

            default:
                return 'مقاله را به‌روزرسانی کرد';
        }
    }
?>

<div class="wiki-activity-feed" id="wikiActivityFeed">
    <?php $__empty_1 = true; $__currentLoopData = $activity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php
            $action = $item['action'] ?? '';
            $icon = $actionIcons[$action] ?? 'fa fa-circle';
            $cssClass = $actionClasses[$action] ?? '';
            $name = trim(($item['firstname'] ?? '') . ' ' . ($item['lastname'] ?? ''));
            $date = $item['date'] ?? '';
            $values = $item['values'] ?? [];
            $label = getActivityLabel($action, $values);
        ?>
        <div class="wiki-activity-item">
            <div class="wiki-activity-icon <?php echo e($cssClass); ?>">
                <i class="<?php echo e($icon); ?>"></i>
            </div>
            <div class="wiki-activity-content">
                <div class="wiki-activity-text">
                    <strong><?php echo e($name ?: 'Someone'); ?></strong> <?php echo e($label); ?>

                </div>
                <?php if(!empty($date)): ?>
                    <div class="wiki-activity-time"><?php echo e(format($date)->date()); ?></div>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="wiki-activity-empty">
            <span>هنوز فعالیتی وجود ندارد</span>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Wiki/Templates/partials/activityFeed.blade.php ENDPATH**/ ?>