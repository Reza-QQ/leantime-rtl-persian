<h1>Latest From Leantime</h1>
<br />
<div>
    <ul>
        <?php if(is_string($rss)): ?>
            <?php echo e($rss); ?>

        <?php endif; ?>
        <?php $__currentLoopData = $rss->channel->item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li style="border-bottom:1px solid var(--main-border-color)">
                <strong><a href="<?php echo e($item->link); ?>" target="_blank"><?php echo e($item->title); ?></a></strong><br/>
                <small class="tw-pb-1"><?php echo e($item->pubDate); ?></small><br />
                <p><?php echo $item->description; ?></p>
                <div class="clearall"></div>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Notifications/Templates/partials/latestNews.blade.php ENDPATH**/ ?>