<?php $__env->startSection('content'); ?>

<?php
    $canvasItem = $canvasItem ?? [];
    $canvasTypes = $canvasTypes ?? [];

    $id = '';
    if (isset($canvasItem['id']) && $canvasItem['id'] != '') {
        $id = $canvasItem['id'];
    }
?>

<?php echo $tpl->displayNotification(); ?>


<form class="formModal" method="post" action="<?php echo e(BASE_URL); ?>/ideas/ideaDialog/<?php echo e($id); ?>">

<div class="row">

    <div class="col-md-8">

        <input type="hidden" value="<?php echo e($currentCanvas); ?>" name="canvasId"/>
        <input type="hidden" value="<?php echo e($tpl->escape($canvasItem['box'])); ?>" name="box" id="box"/>
        <input type="hidden" value="<?php echo e($id); ?>" name="itemId" id="itemId"/>
        <input type="hidden" name="status" value="<?php echo e($canvasItem['status']); ?>" />
        <input type="hidden" value="<?php echo e($id); ?>" name="id" autocomplete="off" readonly/>

        <input type="hidden" name="milestoneId" value="<?php echo e($canvasItem['milestoneId']); ?>"/>
        <input type="hidden" name="changeItem" value="1"/>

        <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['name' => 'description','variant' => 'headline','style' => 'width:99%;','value' => ''.e($tpl->escape($canvasItem['description'])).'','placeholder' => ''.e(__('input.placeholders.short_name')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'description','variant' => 'headline','style' => 'width:99%;','value' => ''.e($tpl->escape($canvasItem['description'])).'','placeholder' => ''.e(__('input.placeholders.short_name')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $attributes = $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $component = $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?><br/>

        <input type="text" value="<?php echo e($tpl->escape($canvasItem['tags'])); ?>" name="tags" id="tags" />

        <textarea rows="3" cols="10" name="data" class="tiptapComplex"
                  placeholder=""><?php echo $tpl->escapeMinimal($canvasItem['data']); ?></textarea><br/>

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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['contentRole' => 'secondary','inputType' => 'submit','value' => 'closeModal','id' => 'saveAndClose']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['contentRole' => 'secondary','inputType' => 'submit','value' => 'closeModal','id' => 'saveAndClose']); ?><?php echo __('buttons.save_and_close'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $attributes = $__attributesOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__attributesOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $component = $__componentOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__componentOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>

        <?php if($id !== ''): ?>
            <br/>
            <hr>
            <input type="hidden" name="comment" value="1"/>

            <h4 class="widgettitle title-light"><span class="fa fa-submodules.generalComment"></span><?php echo __('subtitles.discussion'); ?></h4>
            <?php echo $__env->make('comments::submodules.generalComment', ['formUrl' => BASE_URL . '/ideas/ideaDialog/' . $id], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endif; ?>

    </div>

    <div class="col-md-4">
        <?php if($id !== ''): ?>
            <br/><br/>
            <h4 class="widgettitle title-light"><span
                    class="fa fa-link"></span> <?php echo __('headlines.linked_milestone'); ?> <i class="fa fa-question-circle-o helperTooltip" data-tippy-content="<?php echo e(__('tooltip.link_milestones_tooltip')); ?>"></i></h4>

            <ul class="sortableTicketList" style="width:99%">
                <?php if($canvasItem['milestoneId'] == ''): ?>
                    <li class="ui-state-default center" id="milestone_0">
                        <h4><?php echo __('headlines.no_milestone_link'); ?></h4>
                        <?php echo __('text.use_milestone_to_track_idea'); ?><br/>
                        <div class="row" id="milestoneSelectors">
                            <?php if($login::userIsAtLeast($roles::$editor)): ?>
                                <div class="col-md-12">
                                    <a href="javascript:void(0);"
                                       onclick="leantime.ideasController.toggleMilestoneSelectors('new');"><?php echo __('links.create_link_milestone'); ?></a>
                                    | <a href="javascript:void(0);"
                                         onclick="leantime.ideasController.toggleMilestoneSelectors('existing');"><?php echo __('links.link_existing_milestone'); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="row" id="newMilestone" style="display:none;">
                            <div class="col-md-12">
                                <?php if (isset($component)) { $__componentOriginal6029a3567a8faaf6e1fc536869bd9e70 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6029a3567a8faaf6e1fc536869bd9e70 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.textarea','data' => ['name' => 'newMilestone']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'newMilestone']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6029a3567a8faaf6e1fc536869bd9e70)): ?>
<?php $attributes = $__attributesOriginal6029a3567a8faaf6e1fc536869bd9e70; ?>
<?php unset($__attributesOriginal6029a3567a8faaf6e1fc536869bd9e70); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6029a3567a8faaf6e1fc536869bd9e70)): ?>
<?php $component = $__componentOriginal6029a3567a8faaf6e1fc536869bd9e70; ?>
<?php unset($__componentOriginal6029a3567a8faaf6e1fc536869bd9e70); ?>
<?php endif; ?><br/>
                                <input type="hidden" name="type" value="milestone"/>
                                <input type="hidden" name="leancanvasitemid" value="<?php echo e($id); ?> "/>
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
                                <a href="javascript:void(0);"
                                   onclick="leantime.ideasController.toggleMilestoneSelectors('hide');">
                                    <i class="fas fa-times"></i> <?php echo __('links.cancel'); ?>

                                </a>
                            </div>
                        </div>

                        <div class="row" id="existingMilestone" style="display:none;">
                            <div class="col-md-12">
                                <select data-placeholder="<?php echo e(__('input.placeholders.filter_by_milestone')); ?>"
                                        name="existingMilestone" class="user-select">
                                    <option value=""><?php echo __('text.all_milestones'); ?></option>
                                    <?php $__currentLoopData = $milestones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $milestoneRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($milestoneRow->id); ?>"
                                            <?php if(isset($searchCriteria['milestone']) && ($searchCriteria['milestone'] == $milestoneRow->id)): ?>
                                                selected='selected'
                                            <?php endif; ?>
                                        ><?php echo e($tpl->escape($milestoneRow->headline)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <input type="hidden" name="type" value="milestone"/>
                                <input type="hidden" name="leancanvasitemid" value="<?php echo e($id); ?> "/>
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
                                <a href="javascript:void(0);"
                                   onclick="leantime.ideasController.toggleMilestoneSelectors('hide');">
                                    <i class="fas fa-times"></i> <?php echo __('links.cancel'); ?>

                                </a>
                            </div>
                        </div>
                    </li>
                <?php else: ?>
                    <li class="ui-state-default" id="milestone_<?php echo e($canvasItem['milestoneId']); ?>"
                        class="leanCanvasMilestone">

                        <div hx-trigger="load"
                             hx-indicator=".htmx-indicator"
                             hx-get="<?php echo e(BASE_URL); ?>/hx/tickets/milestones/showCard?milestoneId=<?php echo e($canvasItem['milestoneId']); ?>">
                            <div class="htmx-indicator">
                                <?php echo __('label.loading_milestone'); ?>

                            </div>
                        </div>
                        <a href="<?php echo e(CURRENT_URL); ?>?removeMilestone=<?php echo e($canvasItem['milestoneId']); ?>" class="ideaCanvasModal delete formModal"><i class="fa fa-close"></i> <?php echo __('links.remove'); ?></a>

                    </li>
                <?php endif; ?>

            </ul>

        <?php endif; ?>
    </div>

</div>

</form>

<div class="showDialogOnLoad" >
        <?php if($id != ''): ?>
            <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => ''.e(BASE_URL).'/ideas/delCanvasItem/'.e($id).'','class' => 'ideaModal delete right','state' => 'danger','variant' => 'outline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => ''.e(BASE_URL).'/ideas/delCanvasItem/'.e($id).'','class' => 'ideaModal delete right','state' => 'danger','variant' => 'outline']); ?><i
                        class="fa fa-trash"></i> <?php echo __('links.delete'); ?> <?php echo $__env->renderComponent(); ?>
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
</div>

<?php if (! $__env->hasRenderedOnce('e36075d4-7f06-4997-a918-4ef71e648ad6')): $__env->markAsRenderedOnce('e36075d4-7f06-4997-a918-4ef71e648ad6'); ?>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
    window.onload = function () {
        if (!window.jQuery) {
            //It's not a modal
            location.href = "<?php echo e(BASE_URL); ?>/ideas/showBoards?showIdeaModal=<?php echo e($canvasItem['id']); ?>";
        }
    }

    jQuery(document).ready(function(){

        if (window.leantime && window.leantime.tiptapController) {
            leantime.tiptapController.initComplexEditor();
        }
        leantime.ticketsController.initTagsInput();

        <?php if(!$login::userIsAtLeast($roles::$editor)): ?>
            leantime.authController.makeInputReadonly(".nyroModalCont");
        <?php endif; ?>

        <?php if($login::userHasRole([$roles::$commenter])): ?>
        leantime.submodules.generalCommentController.enableCommenterForms();
        <?php endif; ?>

    })
</script>
<?php $__env->stopPush(); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Ideas/Templates/ideaDialog.blade.php ENDPATH**/ ?>