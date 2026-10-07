<?php
    $currentMilestone = $milestone ?? null;
    $milestones = $milestones ?? [];
    $statusLabels = $statusLabels ?? [];
?>

<script type="text/javascript">
    window.onload = function() {
        if (!window.jQuery) {
            //It's not a modal
            location.href="<?php echo e(BASE_URL); ?>/tickets/roadmap?showMilestoneModal=<?php echo e($currentMilestone->id); ?>";
        }
    }
</script>

<div class="modal-icons">
    <?php if(isset($currentMilestone->id) && $currentMilestone->id != ''): ?>
        <a href="#/tickets/delMilestone/<?php echo e($currentMilestone->id); ?>" class="danger" data-tippy-content="Delete"><i class='fa fa-trash-can'></i></a>
    <?php endif; ?>
</div>

<h4 class="widgettitle title-light"><?php echo __('headline.milestone'); ?> </h4>

<?php echo $tpl->displayNotification(); ?>


<form class="formModal" method="post" action="<?php echo e(BASE_URL); ?>/tickets/editMilestone/<?php echo e($currentMilestone->id); ?>" style="min-width: 250px;">

    <label><?php echo __('label.milestone_title'); ?></label>
    <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['name' => 'headline','value' => ''.e($currentMilestone->headline).'','placeholder' => ''.e(__('label.milestone_title')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'headline','value' => ''.e($currentMilestone->headline).'','placeholder' => ''.e(__('label.milestone_title')).'']); ?>
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

    <label class="control-label"><?php echo __('label.project'); ?></label>
    <select name="projectId" class="tw-w-full">
        <?php $__currentLoopData = $allAssignedprojects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(empty($project['type']) || $project['type'] == 'project'): ?>
            <option value="<?php echo e($project['id']); ?>"
                <?php if(!empty($currentMilestone->projectId) && $currentMilestone->projectId == $project['id']): ?>
                    selected
                <?php elseif(session('currentProject') == $project['id']): ?>
                    selected
                <?php endif; ?>
            ><?php echo e($project['name']); ?></option>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>

    <label><?php echo __('label.todo_status'); ?></label>
    <select id="status-select" name="status" class="span11"
            data-placeholder="<?php echo e(isset($statusLabels[$currentMilestone->status]) ? $statusLabels[$currentMilestone->status]['name'] : ''); ?>">

        <?php $__currentLoopData = $statusLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($key); ?>"
                <?php if($currentMilestone->status == $key): ?> selected='selected' <?php endif; ?>
            ><?php echo e($label['name']); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>

    <label><?php echo __('label.dependent_on'); ?></label>
    <select name="dependentMilestone"  class="span11">
        <option value=""><?php echo __('label.no_dependency'); ?></option>
        <?php $__currentLoopData = $milestones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $milestoneRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($milestoneRow->id !== $currentMilestone->id): ?>
                <option value="<?php echo e($milestoneRow->id); ?>"
                    <?php if($currentMilestone->milestoneid == $milestoneRow->id): ?> selected='selected' <?php endif; ?>
                ><?php echo e($milestoneRow->headline); ?> </option>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </select>

    <label><?php echo __('label.owner'); ?></label>
    <select data-placeholder="<?php echo e(__('input.placeholders.filter_by_user')); ?>"
            name="editorId" class="user-select span11">
        <option value=""><?php echo __('dropdown.not_assigned'); ?></option>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($userRow['id']); ?>"
                <?php if($currentMilestone->editorId == $userRow['id']): ?> selected='selected' <?php endif; ?>
            ><?php echo e($userRow['firstname']); ?> <?php echo e($userRow['lastname']); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>

    <label><?php echo __('label.color'); ?></label>
    <input type="text" name="tags" autocomplete="off" value="<?php echo e($currentMilestone->tags); ?>" placeholder="<?php echo e(__('input.placeholders.pick_a_color')); ?>" class="simpleColorPicker"/><br />

    <label><?php echo __('label.planned_start_date'); ?></label>
    <input type="text" name="editFrom" autocomplete="off" value="<?php echo e(format($currentMilestone->editFrom)->date()); ?>" placeholder="<?php echo e(__('language.dateformat')); ?>" id="milestoneEditFrom" /><br />

    <label><?php echo __('label.planned_end_date'); ?></label>
    <input type="text" name="editTo" autocomplete="off" value="<?php echo e(format($currentMilestone->editTo)->date()); ?>"  placeholder="<?php echo e(__('language.dateformat')); ?>" id="milestoneEditTo" /><br />

    <label><?php echo __('label.outcome_impact'); ?></label>
    <textarea name="outcomeImpact" rows="3" class="tw-w-full"
              placeholder="<?php echo e(__('input.placeholders.outcome_impact')); ?>"><?php echo e($currentMilestone->outcomeImpact); ?></textarea><br />

    <div class="row">
        <div class="col-md-6">
            <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => __('buttons.save')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'submit','contentRole' => 'primary','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.save'))]); ?>
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
        <div class="col-md-6 align-right padding-top-sm">

        </div>
    </div>

</form>

    <?php if(isset($currentMilestone->id) && $currentMilestone->id !== ''): ?>
    <br />
    <input type="hidden" name="comment" value="1" />

        <?php echo $__env->make('comments::submodules.generalComment', ['formUrl' => '/tickets/editMilestone/'.$currentMilestone->id], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php endif; ?>

<script type="text/javascript">
    jQuery(document).ready(function(){

        <?php if(isset($_GET['closeModal'])): ?>
            jQuery.nmTop().close();
            return;
        <?php endif; ?>

        leantime.ticketsController.initSimpleColorPicker();
        leantime.ticketsController.initMilestoneDates();

        <?php if(!$login::userIsAtLeast($roles::$editor)): ?>
            leantime.authController.makeInputReadonly(".nyroModalCont");
        <?php endif; ?>

        <?php if($login::userHasRole([$roles::$commenter])): ?>
            leantime.commentsController.enableCommenterForms();
        <?php endif; ?>


    })
</script>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Tickets/Templates/milestoneDialog.blade.php ENDPATH**/ ?>