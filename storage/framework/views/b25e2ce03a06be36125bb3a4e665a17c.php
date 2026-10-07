<?php if($ticket->type == 'milestone'): ?>
    <h4 class="widgettitle title-light"><?php echo __('headline.move_milestone'); ?> </h4>
<?php else: ?>
    <h4 class="widgettitle title-light"><?php echo __('headline.move_todo'); ?> </h4>
<?php endif; ?>


    <form method="post" action="<?php echo e(BASE_URL); ?>/tickets/moveTicket/<?php echo e($ticket->id); ?>" class="formModal">
        <h3>#<?php echo e($ticket->id); ?> - <?php echo e($ticket->headline); ?></h3> <br />
        <p>
            <?php if($ticket->type == 'milestone'): ?>
                <?php echo __('text.moving_milestones'); ?>

            <?php else: ?>
                <?php echo __('text.moving'); ?>

            <?php endif; ?>

            <br /><br />
        </p>

        <select id="projectSelector" name="projectId">
        <?php
        $i = 0;
        $lastClient = '';
        foreach ($projects as $projectRow) {
            if ($lastClient != $projectRow['clientName']) {
                $lastClient = $projectRow['clientName'];
                if ($i > 1) {
                    echo '</optgroup>';
                }
                echo "<optgroup label='".$tpl->escape($projectRow['clientName'])."'> ";
            }
            echo "<option value='".$projectRow['id']."'>".$tpl->escape($projectRow['name']).'</option>';
            $i++;
        }
        ?>
        </select><br /><br /><br /><br />
        <br />
        <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => __('buttons.move'),'name' => 'move']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.move')),'name' => 'move']); ?>
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
        <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','class' => 'pull-right','link' => 'javascript:void(0);','onclick' => 'jQuery.nmTop().close();','contentRole' => 'tertiary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','class' => 'pull-right','link' => 'javascript:void(0);','onclick' => 'jQuery.nmTop().close();','contentRole' => 'tertiary']); ?><?php echo __('buttons.back'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $attributes = $__attributesOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__attributesOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $component = $__componentOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__componentOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
        <div class="clearall"></div>
        <br />
    </form>


<script>
    <?php if(isset($_GET['closeModal'])): ?>
        jQuery.nmTop().close();
    <?php endif; ?>

    jQuery(document).ready(function(){
        jQuery("#projectSelector").chosen();
    });
</script>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Tickets/Templates/moveTicket.blade.php ENDPATH**/ ?>