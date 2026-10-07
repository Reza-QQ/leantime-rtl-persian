
<div class="lt-tabs lt-tabs--floating lt-tabs--links hideOnPrint">
    <nav class="lt-tabs-group" aria-label="Apps">
        <ul>
            <li class="<?php echo e($currentUrl == 'marketplace' ? "active" : ""); ?>">
                <a href="<?=BASE_URL ?>/plugins/marketplace">
                    <i class="fa-solid fa-store"></i> Explore Apps
                </a>
            </li>
            <li class="<?php echo e($currentUrl == 'installed' ? "active" : ""); ?>">
                <a href="<?=BASE_URL ?>/plugins/myapps">
                    <i class="fa-solid fa-puzzle-piece"></i> My Apps
                </a>
            </li>
        </ul>
    </nav>
</div>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Plugins/Templates/partials/plugintabs.blade.php ENDPATH**/ ?>