<div class="center padding-lg">

    <div class="row">
        <div class="col-md-12">
            <div style='width:50%' class='svgContainer'>
                <?php echo file_get_contents(ROOT . '/dist/images/svg/undraw_new_ideas_jdea.svg'); ?>

            </div>
            <h3 class="primaryColor"><?php echo __('headlines.welcome_to_idea_board'); ?></h3><br />
            <p><?php echo __('text.idea_board_helper_content'); ?><br /></p>
            <br /><br />
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <p>
             </p>
            <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => 'javascript:void(0);','onclick' => 'jQuery.nmTop().close()','contentRole' => 'tertiary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => 'javascript:void(0);','onclick' => 'jQuery.nmTop().close()','contentRole' => 'tertiary']); ?><?php echo __('links.close'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $attributes = $__attributesOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__attributesOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $component = $__componentOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__componentOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?><br />
        </div>
    </div>


</div>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Help/Templates/ideaBoard.blade.php ENDPATH**/ ?>