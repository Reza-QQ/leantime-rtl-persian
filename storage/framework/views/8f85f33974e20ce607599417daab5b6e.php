<?php
    use Leantime\Domain\Logicmodelcanvas\Repositories\Logicmodelcanvas;

    $canvasName = 'logicmodel';

    $canvasItem = $tpl->get('canvasItem') ?? [];
    $canvasItem = array_merge([
        'id' => '', 'box' => '', 'description' => '', 'conclusion' => '', 'assumptions' => '',
        'data' => '', 'status' => '', 'relates' => '', 'impact' => '', 'milestoneId' => '',
        'author' => '', 'authorFirstname' => '', 'authorLastname' => '',
        'why_this_matters' => '', 'starting_picture' => '',
    ], is_array($canvasItem) ? $canvasItem : []);

    $canvasTypes = $tpl->get('canvasTypes');
    $hiddenStatusLabels = $tpl->get('statusLabels');
    $statusLabels = $statusLabels ?? $hiddenStatusLabels;
    $hiddenRelatesLabels = $tpl->get('relatesLabels');
    $relatesLabels = $relatesLabels ?? $hiddenRelatesLabels;
    $dataLabels = $tpl->get('dataLabels');

    $id = ($canvasItem['id'] ?? '') !== '' ? $canvasItem['id'] : '';

    // Resolve stage color for the pill
    $stages = Logicmodelcanvas::STAGES;
    $boxKey = $canvasItem['box'] ?? '';
    $stageColor = '#888';
    $stageBg = '#f0f0f0';
    foreach ($stages as $stage) {
        if ('lm_' . $stage['key'] === $boxKey) {
            $stageColor = $stage['color'];
            $stageBg = $stage['bg'];
            break;
        }
    }

    $currentImpact = (string) ($canvasItem['impact'] ?? '');
?>

<script type="text/javascript">
    window.onload = function() {
        if (!window.jQuery) {
            location.href="<?php echo e(BASE_URL); ?>/<?php echo e($canvasName); ?>canvas/showCanvas?showModal=<?php echo e($canvasItem['id']); ?>";
        }
    }
</script>

<div style="width:1000px; padding-bottom:20px;">

    
    <div style="display:flex; align-items:center; gap:12px; margin-bottom:8px;">
        <span style="display:inline-flex; align-items:center; gap:5px; padding:4px 14px; border-radius:20px; font-size:var(--font-size-s); font-weight:600; color:<?php echo e($stageColor); ?>; background:<?php echo e($stageBg); ?>;">
            <i class="fas <?php echo e($canvasTypes[$canvasItem['box']]['icon'] ?? 'fa-diagram-project'); ?>"></i>
            <?php echo e(isset($canvasTypes[$canvasItem['box']]) ? $tpl->__($canvasTypes[$canvasItem['box']]['title']) : ''); ?>

        </span>
    </div>

    <?php echo $tpl->displayNotification(); ?>


    <form class="formModal" method="post" action="<?php echo e(BASE_URL); ?>/<?php echo e($canvasName); ?>canvas/editCanvasItem/<?php echo e($id); ?>">

        <input type="hidden" value="<?php echo e($tpl->get('currentCanvas')); ?>" name="canvasId" />
        <input type="hidden" value="<?php echo e($id); ?>" name="itemId" id="itemId"/>
        <input type="hidden" name="milestoneId" value="<?php echo e($canvasItem['milestoneId']); ?>" />
        <input type="hidden" name="changeItem" value="1" />
        <input type="hidden" name="<?php echo e($dataLabels[3]['field']); ?>" value="" />

        <div class="row">
            
            <div class="col-md-8">

                
                <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['name' => 'description','variant' => 'headline','style' => 'width:99%;','value' => ''.e($tpl->escape($canvasItem['description'])).'','placeholder' => ''.e($tpl->__('input.placeholders.short_name')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'description','variant' => 'headline','style' => 'width:99%;','value' => ''.e($tpl->escape($canvasItem['description'])).'','placeholder' => ''.e($tpl->__('input.placeholders.short_name')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $attributes = $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $component = $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?><br /><br />

                <?php if($dataLabels[1]['active']): ?>
                    <label><?php echo e($tpl->__($dataLabels[1]['title'])); ?></label>
                    <textarea style="width:100%" rows="5" cols="10" name="<?php echo e($dataLabels[1]['field']); ?>" class="modalTextArea tiptapSimple"><?php echo e($canvasItem[$dataLabels[1]['field']]); ?></textarea><br />
                <?php else: ?>
                    <input type="hidden" name="<?php echo e($dataLabels[1]['field']); ?>" value="" />
                <?php endif; ?>

                <?php if($dataLabels[2]['active']): ?>
                    <label><?php echo e($tpl->__($dataLabels[2]['title'])); ?></label>
                    <textarea style="width:100%" rows="3" cols="10" name="<?php echo e($dataLabels[2]['field']); ?>" class="modalTextArea tiptapSimple"><?php echo e($canvasItem[$dataLabels[2]['field']]); ?></textarea><br />
                <?php else: ?>
                    <input type="hidden" name="<?php echo e($dataLabels[2]['field']); ?>" value="" />
                <?php endif; ?>

                
                <?php
                    $isImpact  = $boxKey === 'lm_impact';
                    $isOutcome = $boxKey === 'lm_outcomes';
                    $isOutput  = $boxKey === 'lm_outputs';
                    $showWhy   = $isImpact || $isOutcome || $isOutput;
                    $showStart = $isImpact;
                ?>

                <?php if($showWhy): ?>
                    <label for="whyThisMatters" style="display:block;margin-top:8px;"><?php echo e($tpl->__('logicmodel.field.why_this_matters')); ?></label>
                    <textarea id="whyThisMatters" style="width:100%" rows="3" name="why_this_matters"
                        maxlength="500"
                        placeholder="<?php echo e($tpl->__('logicmodel.field.why_this_matters.placeholder')); ?>"
                        class="modalTextArea"><?php echo e($canvasItem['why_this_matters']); ?></textarea>
                    <?php if(! $isImpact): ?>
                        
                        <div style="margin-top:4px;font-size:12px;color:var(--rd-text-3,#7a8790);">
                            <button type="button"
                                    class="lm-suggest-why"
                                    data-source-title="<?php echo e($tpl->escape($canvasItem['description'] ?? '')); ?>"
                                    data-source-body="<?php echo e($tpl->escape($canvasItem['conclusion'] ?? '')); ?>"
                                    style="background:none;border:0;padding:0;color:var(--main-titles-color,#004666);cursor:pointer;font-size:12px;font-weight:600;">
                                <i class="fa fa-lightbulb"></i> <?php echo e($tpl->__('logicmodel.field.why_this_matters.suggest')); ?>

                            </button>
                        </div>
                    <?php endif; ?>
                    <br />
                <?php else: ?>
                    <input type="hidden" name="why_this_matters" value="<?php echo e($tpl->escape($canvasItem['why_this_matters'] ?? '')); ?>" />
                <?php endif; ?>

                <?php if($showStart): ?>
                    <label for="startingPicture" style="display:block;margin-top:8px;"><?php echo e($tpl->__('logicmodel.field.starting_picture')); ?></label>
                    <textarea id="startingPicture" style="width:100%" rows="3" name="starting_picture"
                        maxlength="500"
                        placeholder="<?php echo e($tpl->__('logicmodel.field.starting_picture.placeholder')); ?>"
                        class="modalTextArea"><?php echo e($canvasItem['starting_picture']); ?></textarea>
                    <br />
                <?php else: ?>
                    <input type="hidden" name="starting_picture" value="<?php echo e($tpl->escape($canvasItem['starting_picture'] ?? '')); ?>" />
                <?php endif; ?>

                
                <?php if($showWhy && ! $isImpact): ?>
                    <script>
                    (function () {
                        var btns = document.querySelectorAll('.lm-suggest-why');
                        btns.forEach(function (btn) {
                            // The dialog can be re-injected within a session — guard against
                            // stacking a second listener on an already-bound button.
                            if (btn.dataset.lmWhyBound) {
                                return;
                            }
                            btn.dataset.lmWhyBound = '1';
                            btn.addEventListener('click', function () {
                                var title = (btn.getAttribute('data-source-title') || '').trim();
                                var body  = (btn.getAttribute('data-source-body')  || '').trim();
                                // Silence beats generic: skip if we don't have real source text.
                                if (title.length < 4 && body.length < 12) return;
                                var draft = body.length >= 20 ? body : title;
                                var ta = document.getElementById('whyThisMatters');
                                if (ta && ! ta.value.trim()) {
                                    ta.value = draft;
                                    ta.focus();
                                }
                            });
                        });
                    })();
                    </script>
                <?php endif; ?>

                

            </div>

            
            <div class="col-md-4">
                <div class="lm-details-panel">

                    <div class="lm-details-heading"><?php echo e($tpl->__('label.details')); ?></div>

                    
                    <?php if(! empty($statusLabels)): ?>
                        <div class="lm-details-row">
                            <span class="lm-details-label"><i class="fas fa-fw fa-circle-dot"></i> <?php echo e($tpl->__('label.status')); ?></span>
                            <span class="lm-details-value">
                                <select name="status" id="statusCanvas"></select>
                            </span>
                        </div>
                    <?php else: ?>
                        <input type="hidden" name="status" value="<?php echo e($canvasItem['status'] ?? array_key_first($hiddenStatusLabels)); ?>" />
                    <?php endif; ?>

                    
                    <div class="lm-details-row">
                        <span class="lm-details-label"><i class="fas fa-fw fa-flag"></i> <?php echo e($tpl->__('logicmodel.priority.label')); ?></span>
                        <span class="lm-details-value">
                            <select name="impact" id="priorityCanvas"></select>
                        </span>
                    </div>

                    
                    <div class="lm-details-row">
                        <span class="lm-details-label"><i class="fas fa-fw fa-layer-group"></i> <?php echo e($tpl->__('logicmodel.stage.label')); ?></span>
                        <span class="lm-details-value">
                            <select name="box" id="stageCanvas"></select>
                        </span>
                    </div>

                    <?php if(! empty($relatesLabels)): ?>
                        <div class="lm-details-row">
                            <span class="lm-details-label"><i class="fas fa-fw fa-link"></i> <?php echo e($tpl->__('label.relates')); ?></span>
                            <span class="lm-details-value">
                                <select name="relates" id="relatesCanvas"></select>
                            </span>
                        </div>
                    <?php else: ?>
                        <input type="hidden" name="relates" value="<?php echo e($canvasItem['relates'] ?? array_key_first($hiddenRelatesLabels)); ?>" />
                    <?php endif; ?>

                    
                    <?php if($id !== '' && ($canvasItem['author'] ?? '') !== ''): ?>
                        <div class="lm-details-row">
                            <span class="lm-details-label"><i class="fas fa-fw fa-user"></i> <?php echo e($tpl->__('label.author')); ?></span>
                            <span class="lm-details-value lm-details-text"><?php echo e($canvasItem['authorFirstname'] ?? ''); ?> <?php echo e($canvasItem['authorLastname'] ?? ''); ?></span>
                        </div>
                    <?php endif; ?>

                </div>

                
                <?php if($id !== ''): ?>
                    <?php $tpl->dispatchTplEvent('canvas.dialog.afterDetails', [
                        'canvasItem' => $canvasItem,
                        'canvasName' => $canvasName,
                        'canvasId' => (int) session('currentLOGICMODELCanvas'),
                    ]); ?>
                <?php endif; ?>

            </div>
        </div>

        
        <div style="display:flex; align-items:center; gap:8px; flex-wrap:wrap; margin-top:16px; padding-top:16px; border-top:1px solid var(--main-border-color);">
            <?php if($login::userIsAtLeast($roles::$editor)): ?>
                <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'submit','labelText' => $tpl->__('buttons.save'),'id' => 'primaryCanvasSubmitButton','contentRole' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'submit','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tpl->__('buttons.save')),'id' => 'primaryCanvasSubmitButton','contentRole' => 'primary']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['inputType' => 'submit','contentRole' => 'secondary','value' => 'closeModal','id' => 'saveAndClose','onclick' => 'leantime.canvasController.setCloseModal();']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['inputType' => 'submit','contentRole' => 'secondary','value' => 'closeModal','id' => 'saveAndClose','onclick' => 'leantime.canvasController.setCloseModal();']); ?><?php echo $tpl->__('buttons.save_and_close'); ?> <?php echo $__env->renderComponent(); ?>
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

            <?php if($id != ''): ?>
                <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => ''.e(BASE_URL).'/'.e($canvasName).'canvas/delCanvasItem/'.e($id).'','class' => ''.e($canvasName).'CanvasModal delete','style' => 'margin-left:auto;','state' => 'danger','variant' => 'outline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => ''.e(BASE_URL).'/'.e($canvasName).'canvas/delCanvasItem/'.e($id).'','class' => ''.e($canvasName).'CanvasModal delete','style' => 'margin-left:auto;','state' => 'danger','variant' => 'outline']); ?><i class="fa fa-trash-can"></i> <?php echo e($tpl->__('links.delete')); ?> <?php echo $__env->renderComponent(); ?>
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

    </form>

    
    <?php if($id !== ''): ?>
        <div style="margin-top:16px; padding-top:16px; border-top:1px solid var(--main-border-color);">
            <h4 class="widgettitle title-light"><span class="fa fa-comments"></span><?php echo e($tpl->__('subtitles.discussion')); ?></h4>
            <input type="hidden" name="comment" value="1" />
            <?php echo $__env->make('comments::submodules.generalComment', ['formUrl' => '/' . $canvasName . 'canvas/editCanvasItem/' . $id], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    <?php endif; ?>

</div>

<style>
    .lm-details-panel {
        border-left: 1px solid var(--main-border-color);
        padding-left: 20px;
        margin-left: 5px;
    }
    .lm-details-heading {
        font-size: var(--font-size-s);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: var(--primary-font-color);
        padding-bottom: 10px;
        margin-bottom: 6px;
        border-bottom: 1px solid var(--main-border-color);
    }
    .lm-details-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 0;
        min-height: 40px;
    }
    .lm-details-label {
        font-size: var(--font-size-s);
        font-weight: 500;
        color: var(--primary-font-color);
        white-space: nowrap;
    }
    .lm-details-label i {
        color: var(--secondary-font-color);
        margin-right: 4px;
    }
    .lm-details-value {
        text-align: right;
    }
    .lm-details-value .ss-main {
        min-width: 120px;
        border: none !important;
        background: transparent !important;
        box-shadow: none !important;
    }
    .lm-details-value .ss-main .ss-single-selected {
        border: none !important;
        background: transparent !important;
        padding-right: 0;
        justify-content: flex-end;
    }
    .lm-details-text {
        font-size: var(--font-size-s);
        color: var(--primary-font-color);
    }
</style>

<script type="text/javascript">
    jQuery(document).ready(function(){

        <?php if(! empty($statusLabels)): ?>
            <?php $statusColorMap = ['blue' => '#1B75BB', 'orange' => '#fdab3d', 'green' => '#75BB1B', 'red' => '#BB1B25', 'grey' => '#c3ccd4']; ?>
            new SlimSelect({
                select: '#statusCanvas',
                showSearch: false,
                valuesUseText: false,
                data: [
                    <?php $__currentLoopData = $statusLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($data['active']): ?>
                            <?php $sColor = $statusColorMap[$data['color']] ?? '#666'; ?>
                            { innerHTML: '<i class="fas fa-fw <?php echo e($data['icon']); ?>" style="color:<?php echo e($sColor); ?>"></i>&nbsp;<?php echo e($tpl->__($data['title'])); ?>',
                              text: "<?php echo e($tpl->__($data['title'])); ?>", value: "<?php echo e($key); ?>", selected: <?php echo e($canvasItem['status'] == $key ? 'true' : 'false'); ?> },
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ]
            });
        <?php endif; ?>

        // Priority dropdown (matches to-do priority structure; stored in the impact column)
        new SlimSelect({
            select: '#priorityCanvas',
            showSearch: false,
            valuesUseText: false,
            data: [
                { text: "<?php echo e($tpl->__('logicmodel.priority.none')); ?>", value: "", selected: <?php echo e($currentImpact === '' ? 'true' : 'false'); ?> },
                { innerHTML: '<i class="fas fa-fw fa-thermometer-full" style="color:#C73E5C"></i>&nbsp;<?php echo e($tpl->__('logicmodel.priority.critical')); ?>',
                  text: "<?php echo e($tpl->__('logicmodel.priority.critical')); ?>", value: "1", selected: <?php echo e($currentImpact === '1' ? 'true' : 'false'); ?> },
                { innerHTML: '<i class="fas fa-fw fa-thermometer-three-quarters" style="color:#E85A5A"></i>&nbsp;<?php echo e($tpl->__('logicmodel.priority.high')); ?>',
                  text: "<?php echo e($tpl->__('logicmodel.priority.high')); ?>", value: "2", selected: <?php echo e($currentImpact === '2' ? 'true' : 'false'); ?> },
                { innerHTML: '<i class="fas fa-fw fa-thermometer-half" style="color:#F5A623"></i>&nbsp;<?php echo e($tpl->__('logicmodel.priority.medium')); ?>',
                  text: "<?php echo e($tpl->__('logicmodel.priority.medium')); ?>", value: "3", selected: <?php echo e($currentImpact === '3' ? 'true' : 'false'); ?> },
                { innerHTML: '<i class="fas fa-fw fa-thermometer-quarter" style="color:#2ECC71"></i>&nbsp;<?php echo e($tpl->__('logicmodel.priority.low')); ?>',
                  text: "<?php echo e($tpl->__('logicmodel.priority.low')); ?>", value: "4", selected: <?php echo e($currentImpact === '4' ? 'true' : 'false'); ?> },
            ]
        });

        // Stage dropdown (drives the box column)
        new SlimSelect({
            select: '#stageCanvas',
            showSearch: false,
            valuesUseText: false,
            data: [
                <?php $__currentLoopData = $stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $num => $stage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $stageBoxKey = 'lm_' . $stage['key']; ?>
                    { innerHTML: '<i class="fas fa-fw <?php echo e($stage['icon']); ?>" style="color:<?php echo e($stage['color']); ?>"></i>&nbsp;<?php echo e($tpl->__($stage['title'])); ?>',
                      text: "<?php echo e($tpl->__($stage['title'])); ?>", value: "<?php echo e($stageBoxKey); ?>", selected: <?php echo e($boxKey === $stageBoxKey ? 'true' : 'false'); ?> },
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ]
        });

        <?php if(! empty($relatesLabels)): ?>
            new SlimSelect({
                select: '#relatesCanvas',
                showSearch: false,
                valuesUseText: false,
                data: [
                    <?php $__currentLoopData = $relatesLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($data['active']): ?>
                            { innerHTML: '<i class="fas fa-fw <?php echo e($data['icon']); ?>"></i>&nbsp;<?php echo e($tpl->__($data['title'])); ?>',
                              text: "<?php echo e($tpl->__($data['title'])); ?>", value: "<?php echo e($key); ?>", selected: <?php echo e($canvasItem['relates'] == $key ? 'true' : 'false'); ?> },
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ]
            });
        <?php endif; ?>

        if (window.leantime && window.leantime.tiptapController) {
            leantime.tiptapController.initSimpleEditor();
        }

        <?php if(! $login::userIsAtLeast($roles::$editor)): ?>
            leantime.authController.makeInputReadonly("#global-modal-content");
        <?php endif; ?>

        <?php if($login::userHasRole([$roles::$commenter])): ?>
            leantime.commentsController.enableCommenterForms();
        <?php endif; ?>

    })
</script>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Logicmodelcanvas/Templates/canvasDialog.blade.php ENDPATH**/ ?>