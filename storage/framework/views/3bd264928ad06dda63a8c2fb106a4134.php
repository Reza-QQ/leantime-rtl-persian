<?php
    use Leantime\Core\Controller\Frontcontroller;

    $currentRoute = Frontcontroller::getCurrentRoute();

    // Program boards inject their own kanban/table/list URLs + the route fragments used to
    // highlight the active tab. Per-project views fall back to the core /tickets/* routes.
    $boardTabs = $boardTabs ?? [
        'kanban' => ['url' => BASE_URL . '/tickets/showKanban', 'active' => 'Kanban'],
        'table'  => ['url' => BASE_URL . '/tickets/showAll',    'active' => 'showAll'],
        'list'   => ['url' => BASE_URL . '/tickets/showList',   'active' => 'showList'],
    ];

    $tabs = [];
    foreach (['kanban' => 'links.kanban', 'table' => 'links.table', 'list' => 'links.list'] as $key => $langKey) {
        $tabs[] = [
            'url'      => $boardTabs[$key]['url'] . $searchParams,
            'label'    => __($langKey),
            'isActive' => str_contains($currentRoute, $boardTabs[$key]['active']),
        ];
    }

    // links.* carry a Font Awesome icon (e.g. "<i class='fas fa-columns'></i> Kanban"), which
    // is what the tab body wants but not the accessible name — an unstripped label puts escaped
    // markup into the attribute. Strip tags for aria-label, keep the markup in the link. #3748
    $navLabel = implode(' / ', array_map(fn ($tab) => trim(strip_tags((string) $tab['label'])), $tabs));
?>

<div class="lt-tabs lt-tabs--floating lt-tabs--links hideOnPrint">
    <nav class="lt-tabs-group" aria-label="<?php echo e($navLabel); ?>">
        <ul>
            <?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="<?php echo e($tab['isActive'] ? 'active' : ''); ?>">
                    <a href="<?php echo e($tab['url']); ?>"
                       <?php if($tab['isActive']): ?> aria-current="page" <?php endif; ?>
                       preload="mouseover">
                        <?php echo $tab['label']; ?>

                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </nav>

    
    <?php if(isset($searchCriteria)): ?>
        <div class="lt-tabs-actions">
            <?php $tpl->dispatchTplEvent('filters.afterLefthandSectionOpen'); ?>
            <?php echo $__env->make('tickets::submodules.ticketNewBtn', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('tickets::submodules.ticketFilter', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php $tpl->dispatchTplEvent('filters.beforeLefthandSectionClose'); ?>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Tickets/Templates/submodules/ticketBoardTabs.blade.php ENDPATH**/ ?>