<?php
/**
 * Quick-add form partial for Kanban columns
 *
 * @var int $statusId - Status column ID
 * @var string|null $swimlaneKey - Swimlane identifier
 * @var bool $isEmpty - Whether column is empty
 * @var array|null $reopenState - Session flash data
 */
$isActive = !empty($reopenState)
    && $reopenState['status'] == $statusId
    && ($reopenState['swimlane'] ?? null) == ($swimlaneKey ?? null);

$savedHeadline = $isActive ? ($reopenState['headline'] ?? '') : '';
$hasError = $isActive && !empty($reopenState['error']);
?>

<div class="quickaddContainer tw-mb-s <?php echo e($isEmpty ? 'quickaddContainer--empty' : ''); ?>" data-status="<?php echo e($statusId); ?>" data-swimlane="<?php echo e($swimlaneKey ?? ''); ?>">
    <a href="javascript:void(0);"
       class="quickAddLink <?php echo e($isEmpty ? 'empty-state' : 'inline-add'); ?>"
       onclick="leantime.kanbanController.toggleQuickAdd(this)"
       aria-expanded="<?php echo e($isActive ? 'true' : 'false'); ?>"
       aria-controls="quickadd-form-<?php echo e($statusId); ?>-<?php echo e($swimlaneKey ?? 'default'); ?>"
       style="<?php echo e($isActive ? 'display:none;' : ''); ?>">
        <i class="fa-solid fa-plus"></i>
        <span>افزودن کار</span>
    </a>

    <form method="post"
          class="quickAddForm <?php echo e($isActive ? 'active' : ''); ?>"
          id="quickadd-form-<?php echo e($statusId); ?>-<?php echo e($swimlaneKey ?? 'default'); ?>"
          data-quickadd-form
          style="<?php echo e($isActive ? '' : 'display:none;'); ?>"
          data-submitting="false">
        <input type="hidden" name="quickadd" value="1" />
        <input type="hidden" name="status" value="<?php echo e($statusId); ?>" />
        <input type="hidden" name="swimlane" value="<?php echo e($swimlaneKey ?? ''); ?>" />
        <input type="hidden" name="groupBy" value="<?php echo e($currentGroupBy ?? ''); ?>" />
        <input type="hidden" name="milestone" value="<?php echo e($searchCriteria['milestone'] ?? ''); ?>" />
        <input type="hidden" name="sprint" value="<?php echo e(session('currentSprint') ?? ''); ?>" />
        <input type="hidden" name="stay_open" value="0" data-stay-open-input />

        <?php if(! empty($programBoard) && ! empty($availableProjects)): ?>
            
            <div class="form-group">
                <select name="quickaddProjectId" class="form-control" required aria-label="<?php echo e(__('label.project')); ?>">
                    <option value=""><?php echo e(__('label.project')); ?>…</option>
                    <?php $__currentLoopData = $availableProjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quickAddProjectId => $quickAddProjectName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($quickAddProjectId); ?>"><?php echo e($tpl->escape($quickAddProjectName)); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <label for="headline-<?php echo e($statusId); ?>-<?php echo e($swimlaneKey ?? 'default'); ?>" class="sr-only">Task name</label>
            <input type="text"
                   name="headline"
                   id="headline-<?php echo e($statusId); ?>-<?php echo e($swimlaneKey ?? 'default'); ?>"
                   class="form-control quickAddInput <?php echo e($hasError ? 'error' : ''); ?>"
                   placeholder="What are you working on? ↵"
                   value="<?php echo e(htmlspecialchars($savedHeadline)); ?>"
                   <?php echo e($isActive ? 'autofocus' : ''); ?>

                   data-quickadd-input />

            <?php if($hasError): ?>
                <div class="error-message" role="alert"><?php echo e(htmlspecialchars($reopenState['error'])); ?></div>
            <?php endif; ?>

            <div id="quick-add-help-<?php echo e($statusId); ?>-<?php echo e($swimlaneKey ?? 'default'); ?>" class="sr-only">
                Press Enter to save and close. Press Shift plus Enter to save and add another task. Press Escape to cancel.
            </div>
        </div>

        <div class="formButtonContainer">
            <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['inputType' => 'submit','contentRole' => 'primary','onclick' => 'this.closest(\'form\').dataset.submitting = \'true\'; this.closest(\'form\').querySelector(\'[data-stay-open-input]\').value = \'0\';']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['inputType' => 'submit','contentRole' => 'primary','onclick' => 'this.closest(\'form\').dataset.submitting = \'true\'; this.closest(\'form\').querySelector(\'[data-stay-open-input]\').value = \'0\';']); ?>Save <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['inputType' => 'button','contentRole' => 'secondary','onclick' => 'leantime.kanbanController.toggleQuickAdd(this.closest(\'.quickaddContainer\').querySelector(\'.quickAddLink\'))']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['inputType' => 'button','contentRole' => 'secondary','onclick' => 'leantime.kanbanController.toggleQuickAdd(this.closest(\'.quickaddContainer\').querySelector(\'.quickAddLink\'))']); ?>
                Cancel
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
            <i class="fa fa-circle-question"
               data-tippy-content="<strong>Keyboard Shortcuts:</strong><br>Enter: Save and close<br>Shift+Enter: Save and add another<br>Esc: Cancel"
               tabindex="0"
               aria-label="Keyboard shortcuts help"></i>
        </div>
    </form>
</div>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Tickets/Templates/partials/quickadd-form.blade.php ENDPATH**/ ?>