<?php
    $canvasSlug = $canvasSlug ?? '';
    $currentCanvas = $currentCanvas ?? '';
    $canvasItem = $canvasItem ?? ['id' => '', 'box' => '', 'description' => '', 'status' => '', 'relates' => '', 'milestoneId' => '', 'milestoneHeadline' => ''];
    $canvasTypes = $canvasTypes ?? [];
    $hiddenStatusLabels = $statusLabels ?? [];
    $statusLabels = $statusLabels ?? [];
    $hiddenRelatesLabels = $relatesLabels ?? [];
    $relatesLabels = $relatesLabels ?? [];
    $dataLabels = $dataLabels ?? [1 => ['active' => false, 'field' => '', 'title' => ''], 2 => ['active' => false, 'field' => '', 'title' => ''], 3 => ['active' => false, 'field' => '', 'title' => '']];
    $milestones = $milestones ?? [];
    $users = $users ?? [];
    $searchCriteria = $searchCriteria ?? [];

    $id = '';
    if (isset($canvasItem['id']) && $canvasItem['id'] != '') {
        $id = $canvasItem['id'];
    }

    $boxMeta = $canvasTypes[$canvasItem['box']] ?? ['icon' => '', 'title' => ''];
?>

<script type="text/javascript">
    window.onload = function() {
        if (!window.jQuery) {
            //It's not a modal
            location.href="<?php echo e(BASE_URL); ?>/blueprints/<?php echo e($canvasSlug); ?>/showCanvas?showModal=<?php echo e($canvasItem['id']); ?>";
        }
    }
</script>

<div class="" style="width:900px;">

    <h4 class="widgettitle title-light" style="padding-bottom: 0"><i class="fas <?php echo e($boxMeta['icon']); ?>"></i> <?php echo e($boxMeta['title']); ?></h4>
    <hr style="margin-top: 5px; margin-bottom: 15px;">
    <?php echo $tpl->displayNotification(); ?>


    <form class="formModal" method="post" action="<?php echo e(BASE_URL); ?>/blueprints/<?php echo e($canvasSlug); ?>/editCanvasItem/<?php echo e($id); ?>">

        <input type="hidden" value="<?php echo e($currentCanvas); ?>" name="canvasId" />
        <input type="hidden" value="<?php echo e($canvasItem['box']); ?>" name="box" id="box"/>
        <input type="hidden" value="<?php echo e($id); ?>" name="itemId" id="itemId"/>

        <label><?php echo __('label.description'); ?></label>
        <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['name' => 'description','value' => ''.e($canvasItem['description']).'','style' => 'width:100%']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'description','value' => ''.e($canvasItem['description']).'','style' => 'width:100%']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $attributes = $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $component = $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?><br />

        <?php if(! empty($statusLabels)): ?>
            <label><?php echo __('label.status'); ?></label>
            <select name="status" style="width: 50%" id="statusCanvas">
            </select><br /><br />
        <?php else: ?>
            <input type="hidden" name="status" value="<?php echo e($canvasItem['status'] ?? array_key_first($hiddenStatusLabels)); ?>" />
        <?php endif; ?>

        <?php if(! empty($relatesLabels)): ?>
            <label><?php echo __('label.relates'); ?></label>
            <select name="relates" style="width: 50%" id="relatesCanvas">
            </select><br />
        <?php else: ?>
            <input type="hidden" name="relates" value="<?php echo e($canvasItem['relates'] ?? array_key_first($hiddenRelatesLabels)); ?>" />
        <?php endif; ?>

        <?php if($dataLabels[1]['active']): ?>
            <label><?php echo __($dataLabels[1]['title']); ?></label>
            <?php if(isset($dataLabels[1]['type']) && $dataLabels[1]['type'] == 'int'): ?>
                <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['type' => 'number','name' => ''.e($dataLabels[1]['field']).'','value' => ''.e($canvasItem[$dataLabels[1]['field']]).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'number','name' => ''.e($dataLabels[1]['field']).'','value' => ''.e($canvasItem[$dataLabels[1]['field']]).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $attributes = $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $component = $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?><br />
            <?php elseif(isset($dataLabels[1]['type']) && $dataLabels[1]['type'] == 'string'): ?>
                <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['name' => ''.e($dataLabels[1]['field']).'','value' => ''.e($canvasItem[$dataLabels[1]['field']]).'','style' => 'width:100%']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => ''.e($dataLabels[1]['field']).'','value' => ''.e($canvasItem[$dataLabels[1]['field']]).'','style' => 'width:100%']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $attributes = $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $component = $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?><br />
            <?php else: ?>
                <textarea style="width:100%" rows="3" cols="10" name="<?php echo e($dataLabels[1]['field']); ?>" class="modalTextArea tiptapSimple"><?php echo e($canvasItem[$dataLabels[1]['field']]); ?></textarea><br />
            <?php endif; ?>
        <?php else: ?>
            <input type="hidden" name="<?php echo e($dataLabels[1]['field']); ?>" value="" />
        <?php endif; ?>

        <?php if($dataLabels[2]['active']): ?>
            <label><?php echo __($dataLabels[2]['title']); ?></label>
            <?php if(isset($dataLabels[2]['type']) && $dataLabels[2]['type'] == 'int'): ?>
                <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['type' => 'number','name' => ''.e($dataLabels[2]['field']).'','value' => ''.e($canvasItem[$dataLabels[2]['field']]).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'number','name' => ''.e($dataLabels[2]['field']).'','value' => ''.e($canvasItem[$dataLabels[2]['field']]).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $attributes = $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $component = $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?><br />
            <?php elseif(isset($dataLabels[2]['type']) && $dataLabels[2]['type'] == 'string'): ?>
                <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['name' => ''.e($dataLabels[2]['field']).'','value' => ''.e($canvasItem[$dataLabels[2]['field']]).'','style' => 'width:100%']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => ''.e($dataLabels[2]['field']).'','value' => ''.e($canvasItem[$dataLabels[2]['field']]).'','style' => 'width:100%']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $attributes = $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $component = $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?><br />
            <?php else: ?>
                <textarea style="width:100%" rows="3" cols="10" name="<?php echo e($dataLabels[2]['field']); ?>" class="modalTextArea tiptapSimple"><?php echo e($canvasItem[$dataLabels[2]['field']]); ?></textarea><br />
            <?php endif; ?>
        <?php else: ?>
            <input type="hidden" name="<?php echo e($dataLabels[2]['field']); ?>" value="" />
        <?php endif; ?>

        <?php if($dataLabels[3]['active']): ?>
            <label><?php echo __($dataLabels[3]['title']); ?></label>
            <?php if(isset($dataLabels[3]['type']) && $dataLabels[3]['type'] == 'int'): ?>
                <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['type' => 'number','name' => ''.e($dataLabels[3]['field']).'','value' => ''.e($canvasItem[$dataLabels[3]['field']]).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'number','name' => ''.e($dataLabels[3]['field']).'','value' => ''.e($canvasItem[$dataLabels[3]['field']]).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $attributes = $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $component = $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?><br />
            <?php elseif(isset($dataLabels[3]['type']) && $dataLabels[3]['type'] == 'string'): ?>
                <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['name' => ''.e($dataLabels[3]['field']).'','value' => ''.e($canvasItem[$dataLabels[3]['field']]).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => ''.e($dataLabels[3]['field']).'','value' => ''.e($canvasItem[$dataLabels[3]['field']]).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $attributes = $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $component = $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?><br />
            <?php else: ?>
                <textarea style="width:100%" rows="3" cols="10" name="<?php echo e($dataLabels[3]['field']); ?>" class="modalTextArea tiptapSimple"><?php echo e($canvasItem[$dataLabels[3]['field']]); ?></textarea><br />
            <?php endif; ?>
        <?php else: ?>
            <input type="hidden" name="<?php echo e($dataLabels[3]['field']); ?>" value="" />
        <?php endif; ?>

        <input type="hidden" name="milestoneId" value="<?php echo e($canvasItem['milestoneId']); ?>" />
        <input type="hidden" name="changeItem" value="1" />

        <?php if($id != ''): ?>
            <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => ''.e(BASE_URL).'/blueprints/'.e($canvasSlug).'/delCanvasItem/'.e($id).'','class' => 'blueprintsCanvasModal delete right','state' => 'danger','variant' => 'outline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => ''.e(BASE_URL).'/blueprints/'.e($canvasSlug).'/delCanvasItem/'.e($id).'','class' => 'blueprintsCanvasModal delete right','state' => 'danger','variant' => 'outline']); ?><i class='fa fa-trash-can'></i> <?php echo __('links.delete'); ?> <?php echo $__env->renderComponent(); ?>
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

        <?php if($login::userIsAtLeast($roles::$editor)): ?>
            <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => __('buttons.save'),'id' => 'primaryCanvasSubmitButton']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.save')),'id' => 'primaryCanvasSubmitButton']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['inputType' => 'submit','contentRole' => 'secondary','value' => 'closeModal','id' => 'saveAndClose','onclick' => 'leantime.blueprintsController.setCloseModal();']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['inputType' => 'submit','contentRole' => 'secondary','value' => 'closeModal','id' => 'saveAndClose','onclick' => 'leantime.blueprintsController.setCloseModal();']); ?><?php echo __('buttons.save_and_close'); ?> <?php echo $__env->renderComponent(); ?>
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

        <?php if($id !== ''): ?>
            <br /><br />
            <h4 class="widgettitle title-light"><span class="fa fa-link"></span> <?php echo __('headlines.linked_milestone'); ?> <i class="fa fa-question-circle-o helperTooltip" data-tippy-content="<?php echo e(__('tooltip.link_milestones_tooltip')); ?>"></i></h4>

            <?php if($canvasItem['milestoneId'] == ''): ?>
                <center>
                    <h4><?php echo __('headlines.no_milestone_link'); ?></h4>

                    <div class="row" id="milestoneSelectors">
                        <?php if($login::userIsAtLeast($roles::$editor)): ?>
                            <div class="col-md-12">
                                <a href="javascript:void(0);" onclick="leantime.blueprintsController.toggleMilestoneSelectors('new');"><?php echo __('links.create_link_milestone'); ?></a>
                                <?php if(count($milestones) > 0): ?>
                                    | <a href="javascript:void(0);" onclick="leantime.blueprintsController.toggleMilestoneSelectors('existing');"><?php echo __('links.link_existing_milestone'); ?></a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="row" id="newMilestone" style="display:none;">
                        <div class="col-md-12">
                            <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['width' => '50%','name' => 'newMilestone']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['width' => '50%','name' => 'newMilestone']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $attributes = $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $component = $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?><br />
                            <input type="hidden" name="type" value="milestone" />
                            <input type="hidden" name="blueprintscanvasitemid" value="<?php echo e($id); ?> " />
                            <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'button','labelText' => __('buttons.save'),'onclick' => 'jQuery(\'#primaryCanvasSubmitButton\').click()','contentRole' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'button','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.save')),'onclick' => 'jQuery(\'#primaryCanvasSubmitButton\').click()','contentRole' => 'primary']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'button','labelText' => __('buttons.cancel'),'onclick' => 'leantime.blueprintsController.toggleMilestoneSelectors(\'hide\')','contentRole' => 'tertiary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'button','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.cancel')),'onclick' => 'leantime.blueprintsController.toggleMilestoneSelectors(\'hide\')','contentRole' => 'tertiary']); ?>
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

                    <div class="row" id="existingMilestone" style="display:none;">
                        <div class="col-md-12">
                            <select data-placeholder="<?php echo e(__('input.placeholders.filter_by_milestone')); ?>" name="existingMilestone" class="user-select">
                                <option value=""></option>
                                <?php $__currentLoopData = $milestones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $milestoneRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($milestoneRow->id); ?>"
                                        <?php if(isset($searchCriteria['milestone']) && $searchCriteria['milestone'] == $milestoneRow->id): ?> selected='selected' <?php endif; ?>
                                    ><?php echo e($milestoneRow->headline); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <input type="hidden" name="type" value="milestone" />
                            <input type="hidden" name="blueprintscanvasitemid" value="<?php echo e($id); ?> " />
                            <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'button','labelText' => __('buttons.save'),'onclick' => 'jQuery(\'#primaryCanvasSubmitButton\').click()','contentRole' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'button','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.save')),'onclick' => 'jQuery(\'#primaryCanvasSubmitButton\').click()','contentRole' => 'primary']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'button','labelText' => __('buttons.cancel'),'onclick' => 'leantime.blueprintsController.toggleMilestoneSelectors(\'hide\')','contentRole' => 'tertiary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'button','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.cancel')),'onclick' => 'leantime.blueprintsController.toggleMilestoneSelectors(\'hide\')','contentRole' => 'tertiary']); ?>
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
                </center>
            <?php else: ?>
                <div hx-trigger="load"
                     hx-indicator=".htmx-indicator"
                     hx-get="<?php echo e(BASE_URL); ?>/hx/tickets/milestones/showCard?milestoneId=<?php echo e($canvasItem['milestoneId']); ?>">
                    <div class="htmx-indicator">
                        <?php echo __('label.loading_milestone'); ?>

                    </div>
                </div>
                <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => ''.e(CURRENT_URL).'?removeMilestone='.e($canvasItem['milestoneId']).'','class' => 'blueprintsCanvasModal delete formModal','state' => 'danger','variant' => 'outline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => ''.e(CURRENT_URL).'?removeMilestone='.e($canvasItem['milestoneId']).'','class' => 'blueprintsCanvasModal delete formModal','state' => 'danger','variant' => 'outline']); ?><i class="fa fa-close"></i> <?php echo __('links.remove'); ?> <?php echo $__env->renderComponent(); ?>
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
        <?php endif; ?>

    </form>

    <?php if($id !== ''): ?>
        <br />
        <input type="hidden" name="comment" value="1" />
        <h4 class="widgettitle title-light"><span class="fa fa-comments"></span><?php echo __('subtitles.discussion'); ?></h4>
        <?php echo $__env->make('comments::submodules.generalComment', ['formUrl' => '/blueprints/' . $canvasSlug . '/editCanvasItem/' . $id], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php endif; ?>
</div>

<script type="text/javascript">
    jQuery(document).ready(function(){

        <?php if(! empty($statusLabels)): ?>
            new SlimSelect({
                select: '#statusCanvas',
                showSearch: false,
                valuesUseText: false,
                data: [
                    <?php $__currentLoopData = $statusLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($data['active']): ?>
                            { innerHTML: '<i class="fas fa-fw <?php echo e($data['icon']); ?>"></i>&nbsp;<?php echo e($data['title']); ?>',
                              text: "<?php echo e($data['title']); ?>", value: "<?php echo e($key); ?>", selected: <?php echo e($canvasItem['status'] == $key ? 'true' : 'false'); ?>},
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ]
            });
        <?php endif; ?>

        <?php if(! empty($relatesLabels)): ?>
            new SlimSelect({
                select: '#relatesCanvas',
                showSearch: false,
                valuesUseText: false,
                data: [
                    <?php $__currentLoopData = $relatesLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($data['active']): ?>
                            { innerHTML: '<i class="fas fa-fw <?php echo e($data['icon']); ?>"></i>&nbsp;<?php echo e($data['title']); ?>',
                              text: "<?php echo e($data['title']); ?>", value: "<?php echo e($key); ?>", selected: <?php echo e($canvasItem['relates'] == $key ? 'true' : 'false'); ?>},
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ]
            });
        <?php endif; ?>

        if (window.leantime && window.leantime.tiptapController) {
            leantime.tiptapController.initSimpleEditor();
        }

        <?php if(! $login::userIsAtLeast($roles::$editor)): ?>
            leantime.authController.makeInputReadonly(".nyroModalCont");
        <?php endif; ?>

        <?php if($login::userHasRole([$roles::$commenter])): ?>
            leantime.commentsController.enableCommenterForms();
        <?php endif; ?>

    })
</script>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Blueprints/Templates/canvasDialog.blade.php ENDPATH**/ ?>