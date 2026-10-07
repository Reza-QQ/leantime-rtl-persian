<?php $__env->startSection('content'); ?>
    <?php
        $hiddenRelatesLabels = $relatesLabels ?? [];

        // Metric preview — from the SAVED values; re-renders on save.
        $mType  = $canvasItem['metricType'] ?: 'number';  // new goals default to # (no math)
        $mStart = (float) ($canvasItem['startValue'] ?? 0);
        $mCur   = (float) ($canvasItem['currentValue'] ?? 0);
        $mGoal  = (float) ($canvasItem['endValue'] ?? 0);
        $mPct   = ($mGoal - $mStart) != 0 ? max(0, min(100, (($mCur - $mStart) / ($mGoal - $mStart)) * 100)) : 0;
        $fmtM = function ($v) use ($mType) {
            $v = (float) $v;
            if ($mType === 'percent')  return rtrim(rtrim(number_format($v, 2), '0'), '.') . '%';
            if ($mType === 'currency') return '$' . number_format($v, $v == floor($v) ? 0 : 2);
            return rtrim(rtrim(number_format($v, 2), '0'), '.');
        };
    ?>
    <script type="text/javascript">
        window.onload = function() {
            if (!window.jQuery) {
                location.href = "<?php echo e(BASE_URL); ?>/goalcanvas/showCanvas?showModal=<?php echo e($canvasItem['id']); ?>";
            }
        }
    </script>

    <style>
        /* ── Goal dialog v1 — tabbed (Goal / Progress / Milestones) so only one
              zone shows at a time. Presentation only: fields keep name/id/class. ── */
        /* System design tokens, not a private palette (alignment pass
           2026-08-03): ink/lines/accent/sizes derive from the theme, so the
           dialog matches the rest of the app in BOTH themes. */
        .gvDialog{width:860px;max-width:min(860px, 94vw);padding:6px 18px 14px;
            --gv-acc:var(--accent1);
            --gv-acc2:var(--accent1);
            --gv-line:var(--main-border-color);
            --gv-line-soft:color-mix(in srgb, var(--main-border-color) 55%, transparent);
            --gv-ink:var(--primary-font-color);
            --gv-ink2:color-mix(in srgb, var(--primary-font-color) 68%, transparent);
            --gv-soft:var(--secondary-background);}

        /* Two-column split (Docs-article pattern, review 2026-08-03): main
           work area left, "Details" rail right with the essentials. The rail
           hugs its content (no full-height stretch — that stranded Delete in
           dead space) and keeps a tight label-over-field rhythm. */
        .gv-cols{display:grid;grid-template-columns:minmax(0,1fr) 240px;gap:0 28px;align-items:start;}
        .gv-side{border-left:1px solid var(--gv-line-soft);padding-left:24px;display:flex;flex-direction:column;gap:16px;}
        .gv-side-head{margin:0;}
        .gv-side label{margin-bottom:5px;}
        .gv-side .gv-dates{grid-template-columns:1fr;max-width:none;gap:12px;}
        .gv-side .gv-delete-slot{padding-top:16px;border-top:1px solid var(--gv-line-soft);}
        /* Discussion sits under the MAIN column (its own form — kept outside
           the goal form so the nested-form parse never orphans the Save
           buttons again). */
        .gv-discussion{margin-right:calc(240px + 28px);}
        /* Discussion stays quiet — smaller avatar so the profile color doesn't
           compete with the work area (review 2026-08-03). */
        .gv-discussion .commentImage img,.gv-discussion .commentImage .profileImage{width:30px!important;height:30px!important;}
        @media (max-width:900px){.gv-cols{grid-template-columns:1fr;}.gv-side{border-left:none;padding-left:0;}.gv-discussion{margin-right:0;}}
        /* Section headers ride the SYSTEM recipe (h4.widgettitle.title-light,
           same as the task modal) — no dialog-private eyebrow styles. */
        .gvDialog > h4.widgettitle{margin:2px 0 12px;}
        .gvDialog label{font-size:var(--font-size-s);font-weight:600;color:var(--gv-ink2);display:block;margin:0 0 6px;}
        .gv-field-lbl{font-size:var(--font-size-s);color:var(--gv-ink2);margin:0 0 6px;}
        .gv-unit{font-size:var(--font-size-xs);font-weight:700;color:var(--gv-acc);opacity:.85;}

        /* tab bar — report deck style (gradient bar + translucent group + white active pill) */
        /* Tab visuals come from the shared floating-pill standard
           (tab-group.css: .lt-tabs--floating + --onlight for this white
           modal surface); only the dialog-specific spacing stays here. */
        .gv-tabs{margin:0 0 16px;}
        .gv-tab i,.gv-tab span[class*="fa"]{font-size:12px;}
        .gv-panel{min-height:170px;}
        .gv-row{margin-bottom:18px;}

        /* inputs + selects */
        .gvDialog input[name="title"]{font-size:var(--font-size-xxl)!important;font-weight:600!important;line-height:1.25!important;color:var(--gv-ink)!important;border:none!important;border-bottom:1px solid var(--gv-line)!important;border-radius:0!important;padding:4px 2px 9px!important;background:transparent!important;box-shadow:none!important;height:auto!important;width:100%!important;}
        .gvDialog input[name="title"]:focus{border-bottom-color:var(--gv-acc)!important;outline:none!important;box-shadow:none!important;}
        .gvDialog input[name="title"]::placeholder{color:var(--gv-ink2);font-weight:500;}
        .gvDialog input[type="number"]:not(.gv-mb-input),.gvDialog input[type="text"]:not([name="title"]),.gvDialog select[name="metricType"],.gvDialog input.startDate,.gvDialog input.endDate{border:1px solid var(--gv-line)!important;border-radius:var(--input-radius, 9px)!important;padding:9px 11px!important;font-size:var(--base-font-size)!important;color:var(--gv-ink)!important;background:var(--input-background, #fff)!important;box-shadow:none!important;height:auto!important;width:100%!important;}
        .gvDialog input:focus:not([name="title"]):not(.gv-mb-input),.gvDialog select:focus{border-color:var(--gv-acc)!important;outline:none!important;box-shadow:0 0 0 3px rgba(0,100,122,.09)!important;}

        /* Progress readout — deliberately QUIET (review 2026-08-03: the big
           teal number + gradient card pulled the eye away from the actual
           task). Ink-colored number, thin flat bar, no card, no gradient —
           the page's color budget belongs to the action (Save / the input). */
        .gv-metric-bar{padding:2px 2px 0;margin:4px 0 0;}
        .gv-mb-metric{font-size:var(--font-size-s);color:var(--gv-ink2);margin-bottom:7px;}
        .gv-metric-bar .gv-mb-top{display:flex;align-items:baseline;gap:6px;margin-bottom:8px;}
        .gv-mb-togo{margin-left:auto;font-size:var(--font-size-s);color:var(--gv-ink2);}
        .gv-mb-barrow{display:grid;grid-template-columns:minmax(0,1fr) 38px;gap:12px;align-items:start;}
        .gv-mb-pct{font-size:var(--font-size-s);color:var(--gv-ink2);text-align:right;font-variant-numeric:tabular-nums;align-self:start;line-height:12px;}
        /* Scored track — the RA planbar recipe: striped remaining segment,
           quarter score marks, and a position marker with a halo. */
        .gv-track--scored{position:relative;height:12px;border-radius:6px;overflow:visible;
            background:repeating-linear-gradient(135deg, var(--gv-line-soft) 0 5px, color-mix(in srgb, var(--main-border-color) 30%, transparent) 5px 10px);}
        .gv-track--scored .gv-fill{position:absolute;inset:0 auto 0 0;border-radius:6px 0 0 6px;opacity:1;}
        .gv-tick{position:absolute;top:2px;bottom:2px;width:1px;background:color-mix(in srgb, var(--gv-ink) 22%, transparent);}
        .gv-marker{position:absolute;top:-3px;bottom:-3px;width:2px;border-radius:2px;background:var(--gv-ink);box-shadow:0 0 0 1.5px var(--primary-background, #fff);transform:translateX(-1px);}
        .gv-scale{display:flex;justify-content:space-between;margin-top:5px;font-size:var(--font-size-xs);color:var(--gv-ink2);font-variant-numeric:tabular-nums;}
        /* The input hugs its digits (no fill-in-the-blank dashes past the
           number) in browsers with field-sizing; others keep the fixed ch. */
        @supports (field-sizing: content){
            .gvDialog .gv-metric-bar input.gv-mb-input{field-sizing:content;width:auto!important;min-width:2.5ch!important;max-width:10ch!important;}
        }
        .gv-metric-bar .gv-mb-now{font-size:var(--font-size-xl);font-weight:700;letter-spacing:-.2px;color:var(--gv-ink);line-height:1;}
        .gv-metric-bar .gv-mb-of{font-size:var(--font-size-s);color:var(--gv-ink2);}
        .gv-metric-bar .gv-mb-of b{color:var(--gv-ink);font-weight:600;}
        .gv-track{height:6px;background:var(--gv-line-soft);border-radius:4px;overflow:hidden;}
        .gv-fill{height:100%;border-radius:4px;background:var(--gv-acc);opacity:.8;}
        .gv-values{display:grid;grid-template-columns:repeat(3,1fr);gap:12px;max-width:480px;}

        /* Inline value edit — the RA pattern: the number IS the input.
           (Selector carries the element+class so the dialog's generic
           input[type=number] rule — same importance — can never outrank it.) */
        .gvDialog .gv-metric-bar input.gv-mb-input{font-size:var(--font-size-xl)!important;font-weight:700!important;color:var(--gv-ink)!important;border:none!important;border-bottom:1px dashed var(--gv-line)!important;border-radius:0!important;background:transparent!important;padding:0 2px 2px!important;width:5.5ch!important;height:auto!important;box-shadow:none!important;-moz-appearance:textfield;}
        .gv-mb-input::-webkit-outer-spin-button,.gv-mb-input::-webkit-inner-spin-button{-webkit-appearance:none;margin:0;}
        .gvDialog .gv-metric-bar input.gv-mb-input:hover{border-bottom-color:var(--gv-ink2)!important;}
        .gvDialog .gv-metric-bar input.gv-mb-input:focus{border-bottom:1px solid var(--gv-acc)!important;outline:none!important;box-shadow:none!important;}

        /* Milestone bars on the Progress tab — read-only rows, quiet. */
        .gv-ms-bars{margin-top:22px;padding-top:16px;border-top:1px solid var(--gv-line-soft);display:flex;flex-direction:column;gap:11px;}
        .gv-msb-row{display:grid;grid-template-columns:9px minmax(0,1fr) 130px 38px;align-items:center;gap:12px;}
        .gv-msb-dot{width:9px;height:9px;border-radius:50%;}
        .gv-msb-name{font-size:var(--font-size-s);color:var(--gv-ink2);text-decoration:none;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
        .gv-msb-name:hover{color:var(--gv-acc);text-decoration:underline;text-underline-offset:3px;}
        .gv-msb-track{height:5px;background:var(--gv-line-soft);border-radius:4px;overflow:hidden;}
        .gv-msb-fill{height:100%;border-radius:4px;opacity:.75;}
        .gv-msb-pct{font-size:var(--font-size-s);color:var(--gv-ink2);text-align:right;font-variant-numeric:tabular-nums;}

        /* Milestones tab — MANAGEMENT list (RA line-item style). */
        .gv-ms-list{display:flex;flex-direction:column;}
        .gv-ms-item{display:flex;align-items:center;gap:10px;padding:9px 2px;border-bottom:1px solid var(--gv-line-soft);}
        .gv-ms-name{font-size:var(--base-font-size);color:var(--gv-ink);text-decoration:none;flex:1;min-width:0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
        .gv-ms-name:hover{color:var(--gv-acc);text-decoration:underline;text-underline-offset:3px;}
        .gv-ms-due{font-size:var(--font-size-s);color:var(--gv-ink2);flex:none;}
        .gv-ms-remove{flex:none;background:transparent;border:none;cursor:pointer;padding:6px 8px;opacity:.55;color:var(--gv-ink2);}
        .gv-ms-remove:hover{opacity:1;color:var(--gv-acc);}
        .gv-values .gv-field-lbl{font-size:11px;}
        .gv-dates{display:grid;grid-template-columns:1fr 1fr;gap:16px;max-width:360px;}

        /* milestones panel */
        .gv-ms-head{display:flex;align-items:center;gap:10px;margin-bottom:12px;}
        .gv-ms-summary{font-size:var(--font-size-s);color:var(--gv-ink2);}
        .gv-ms-summary b{color:var(--gv-ink);font-weight:700;}
        .gv-ms-actions{margin-left:auto;display:flex;align-items:center;gap:14px;}
        .gv-ms-act{background:none!important;border:none!important;cursor:pointer;color:var(--gv-ink2)!important;font-size:15px;padding:0;line-height:1;opacity:.65;transition:opacity .12s,color .12s;}
        .gv-ms-act:hover{opacity:1;color:var(--gv-acc)!important;}
        .gv-ms-actions .helperTooltip{color:var(--gv-ink2)!important;opacity:.55;}


        /* discussion sub-heading inside the Goal tab */

        /* actions (always visible under the tabs) */
        .gv-actions{display:flex;align-items:center;gap:10px;margin-top:22px;padding-top:16px;border-top:1px solid var(--gv-line);}
        .gv-actions .gv-delete{margin-left:auto;}

        @media (max-width:560px){.gv-values{grid-template-columns:1fr 1fr;}}
    </style>

    <div class="gvDialog">

        
        <h4 class="widgettitle title-light"><i class="fas <?php echo e($canvasTypes[$canvasItem['box']]['icon']); ?>"></i> <?php echo e($canvasTypes[$canvasItem['box']]['title']); ?></h4>

        <form class="formModal" method="post" action="<?php echo e(BASE_URL . "/goalcanvas/editCanvasItem/$id"); ?>">

            <input type="hidden" value="<?php echo e($currentCanvas); ?>" name="canvasId">
            <input type="hidden" value="<?php echo e($canvasItem['box']); ?>" name="box" id="box">
            <input type="hidden" value="<?php echo e($id); ?>" name="itemId" id="itemId">
            <input type="hidden" name="changeItem" value="1">

            <div class="gv-cols">
            <div class="gv-main">

            
            <?php if($id !== ''): ?>
                <div class="gv-tabs lt-tabs lt-tabs--floating lt-tabs--onlight" role="tablist" aria-label="<?php echo e(__('goalcanvas.tabs_label')); ?>">
                    <div class="gv-tab-group lt-tabs-group">
                        <button type="button" class="gv-tab lt-tab" role="tab" id="gvTab-edit" aria-controls="gvPanel-edit" aria-selected="false" data-tab="edit"><i class="fa-solid fa-pen" aria-hidden="true"></i> <?php echo e(__('links.edit')); ?></button>
                        <button type="button" class="gv-tab lt-tab" role="tab" id="gvTab-progress" aria-controls="gvPanel-progress" aria-selected="false" data-tab="progress"><i class="fa-solid fa-ranking-star" aria-hidden="true"></i> <?php echo e(__('goalcanvas.tab_progress')); ?></button>
                        <button type="button" class="gv-tab lt-tab" role="tab" id="gvTab-milestones" aria-controls="gvPanel-milestones" aria-selected="false" data-tab="milestones"><span class="fa fa-flag-checkered" aria-hidden="true"></span> <?php echo e(__("headlines.milestones")); ?></button>
                    </div>
                </div>
            <?php endif; ?>

            
            <div class="gv-row">
                <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['name' => 'title','id' => 'goalTitleInput','value' => ''.e($canvasItem['title']).'','placeholder' => ''.e(__('goalcanvas.name_goal')).'','ariaLabel' => ''.e(__('goalcanvas.name_goal')).'','style' => 'width:100%']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'title','id' => 'goalTitleInput','value' => ''.e($canvasItem['title']).'','placeholder' => ''.e(__('goalcanvas.name_goal')).'','aria-label' => ''.e(__('goalcanvas.name_goal')).'','style' => 'width:100%']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $attributes = $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $component = $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?>
            </div>

            
            <div class="gv-panel" data-panel="edit" role="tabpanel" id="gvPanel-edit" aria-labelledby="gvTab-edit" tabindex="0">
                <div id="measureGoalContainer" class="gv-row">
                    <label class="gv-field-lbl" for="goalDescriptionInput"><?php echo e(__('goalcanvas.metric_label')); ?></label>
                    <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['name' => 'description','id' => 'goalDescriptionInput','value' => ''.e($canvasItem['description']).'','style' => 'width:100%']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'description','id' => 'goalDescriptionInput','value' => ''.e($canvasItem['description']).'','style' => 'width:100%']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $attributes = $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $component = $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?>
                </div>

                <div class="gv-values">
                    <div>
                        <label class="gv-field-lbl" for="goalMetricType"><?php echo e(__('label.type')); ?></label>
                        <select name="metricType" id="goalMetricType">
                            <option value="number" <?php if($mType == 'number'): ?> selected <?php endif; ?>><?php echo e(__('goalcanvas.type_number')); ?></option>
                            <option value="percent" <?php if($mType == 'percent'): ?> selected <?php endif; ?>><?php echo e(__('goalcanvas.type_percent')); ?></option>
                            <option value="currency" <?php if($mType == 'currency'): ?> selected <?php endif; ?>><?php echo e(__('goalcanvas.type_currency')); ?></option>
                        </select>
                    </div>
                    <div>
                        <label class="gv-field-lbl" for="goalStartValue"><?php echo e(__('goalcanvas.v_start')); ?> <span class="gv-unit"></span></label>
                        <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['type' => 'number','step' => '0.01','name' => 'startValue','id' => 'goalStartValue','value' => ''.e($canvasItem['startValue']).'','style' => 'width:100%']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'number','step' => '0.01','name' => 'startValue','id' => 'goalStartValue','value' => ''.e($canvasItem['startValue']).'','style' => 'width:100%']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $attributes = $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $component = $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?>
                    </div>
                    <div>
                        <label class="gv-field-lbl" for="goalEndValue"><?php echo e(__('goalcanvas.v_goal')); ?> <span class="gv-unit"></span></label>
                        <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['type' => 'number','step' => '0.01','name' => 'endValue','id' => 'goalEndValue','value' => ''.e($canvasItem['endValue']).'','style' => 'width:100%']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'number','step' => '0.01','name' => 'endValue','id' => 'goalEndValue','value' => ''.e($canvasItem['endValue']).'','style' => 'width:100%']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $attributes = $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579)): ?>
<?php $component = $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579; ?>
<?php unset($__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579); ?>
<?php endif; ?>
                    </div>
                </div>
            </div>

            
            <div class="gv-panel" data-panel="progress" role="tabpanel" id="gvPanel-progress" aria-labelledby="gvTab-progress" tabindex="0">
                <?php echo $__env->make('goalcanvas::partials.progressReadout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                
                <?php if(count($goalMilestones ?? []) > 0): ?>
                    <div class="gv-ms-bars">
                        <?php $__currentLoopData = $goalMilestones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ms): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="gv-msb-row">
                                
                                <span class="gv-msb-dot" style="background:<?php echo e($ms['color']); ?>;" aria-hidden="true"></span>
                                <a class="gv-msb-name" href="#/tickets/editMilestone/<?php echo e((int) $ms['id']); ?>" title="<?php echo e(__('links.edit_milestone')); ?>: <?php echo e($ms['headline']); ?>"><?php echo e($ms['headline']); ?></a>
                                <div class="gv-msb-track"><div class="gv-msb-fill" style="width:<?php echo e((int) $ms['percentDone']); ?>%;background:<?php echo e($ms['color']); ?>;"></div></div>
                                <span class="gv-msb-pct"><?php echo e((int) $ms['percentDone']); ?>%</span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            </div>

            
            <?php if($id !== ''): ?>
                <div class="gv-panel" data-panel="milestones" role="tabpanel" id="gvPanel-milestones" aria-labelledby="gvTab-milestones" tabindex="0">
                    
                    <?php echo $__env->make('goalcanvas::partials.milestonesSection', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                    <?php if($login::userIsAtLeast($roles::$editor)): ?>
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
                                <input type="hidden" name="goalcanvasitemid" value="<?php echo e($id); ?>" />
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'button','labelText' => __('buttons.cancel'),'onclick' => 'leantime.goalCanvasController.toggleMilestoneSelectors(\'hide\')','contentRole' => 'tertiary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'button','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.cancel')),'onclick' => 'leantime.goalCanvasController.toggleMilestoneSelectors(\'hide\')','contentRole' => 'tertiary']); ?>
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
                                <select data-placeholder="<?php echo e(__("input.placeholders.filter_by_milestone")); ?>" name="existingMilestone" class="user-select">
                                    <option value=""></option>
                                    <?php $__currentLoopData = $milestones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $milestoneRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($milestoneRow->id); ?>"><?php echo e($milestoneRow->headline); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <input type="hidden" name="type" value="milestone" />
                                <input type="hidden" name="goalcanvasitemid" value="<?php echo e($id); ?>" />
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'button','labelText' => __('buttons.cancel'),'onclick' => 'leantime.goalCanvasController.toggleMilestoneSelectors(\'hide\')','contentRole' => 'tertiary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'button','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('buttons.cancel')),'onclick' => 'leantime.goalCanvasController.toggleMilestoneSelectors(\'hide\')','contentRole' => 'tertiary']); ?>
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
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            
            <?php if($login::userIsAtLeast($roles::$editor)): ?>
                <div class="gv-actions">
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['inputType' => 'submit','contentRole' => 'secondary','id' => 'saveAndClose','value' => 'closeModal','onclick' => 'leantime.goalCanvasController.setCloseModal();']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['inputType' => 'submit','contentRole' => 'secondary','id' => 'saveAndClose','value' => 'closeModal','onclick' => 'leantime.goalCanvasController.setCloseModal();']); ?><?php echo e(__('buttons.save_and_close')); ?> <?php echo $__env->renderComponent(); ?>
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
            <?php endif; ?>

            </div>

            
            <aside class="gv-side">
                <h4 class="widgettitle title-light gv-side-head"><i class="fa fa-circle-info" aria-hidden="true"></i> <?php echo e(__('goalcanvas.side_details')); ?></h4>

                <div>
                    <label for="statusCanvas"><?php echo e(__('label.status')); ?></label>
                    <?php if(!empty($statusLabels)): ?>
                        <select name="status" id="statusCanvas"></select>
                    <?php else: ?>
                        <input type="hidden" name="status" value="<?php echo e($canvasItem['status'] ?? array_key_first($hiddenStatusLabels)); ?>" />
                    <?php endif; ?>
                </div>

                
                <div class="gv-dates">
                    <div>
                        <label for="goalStartDate"><?php echo e(__('label.start_date')); ?></label>
                        <input type="text" autocomplete="off" id="goalStartDate" value="<?php echo e(format($canvasItem['startDate'])->date()); ?>" name="startDate" class="startDate"/>
                    </div>
                    <div>
                        <label for="goalEndDate"><?php echo e(__('label.end_date')); ?></label>
                        <input type="text" autocomplete="off" id="goalEndDate" value="<?php echo e(format($canvasItem['endDate'])->date()); ?>" name="endDate" class="endDate"/>
                    </div>
                </div>

                <div>
                    <?php $tpl->dispatchTplEvent('beforeMeasureGoalContainer', $canvasItem); ?>
                    <?php if(!empty($relatesLabels)): ?>
                        <label class="gv-field-lbl" for="relatesCanvas"><?php echo e(__('label.relates')); ?></label><select name="relates" id="relatesCanvas"></select>
                    <?php else: ?>
                        <input type="hidden" name="relates" value="<?php echo e($canvasItem['relates'] ?? array_key_first($hiddenRelatesLabels)); ?>">
                    <?php endif; ?>
                </div>

                <?php if($login::userIsAtLeast($roles::$editor) && $id != ''): ?>
                    <div class="gv-delete-slot">
                        <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => ''.e(BASE_URL).'/goalcanvas/delCanvasItem/'.e($id).'','class' => 'formModal delete gv-delete','state' => 'danger','variant' => 'outline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => ''.e(BASE_URL).'/goalcanvas/delCanvasItem/'.e($id).'','class' => 'formModal delete gv-delete','state' => 'danger','variant' => 'outline']); ?>
                            <i class='fa fa-trash-can'></i> <?php echo e(__('links.delete')); ?>

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
                <?php endif; ?>
            </aside>
            </div>

        </form>

        
        <?php if($id !== ''): ?>
            <div class="gv-discussion">
                <hr />
                <h4 class="widgettitle title-light"><span class="fa-solid fa-comments" aria-hidden="true"></span> <?php echo e(__('subtitles.discussion')); ?></h4>
                <?php echo $__env->make('comments::submodules.generalComment', ['formUrl' => '/goalcanvas/editCanvasItem/' . $id], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
        <?php endif; ?>

    </div>

    <script type="text/javascript">
        jQuery(document).ready(function() {

            leantime.dateController.initDateRangePicker(".startDate", ".endDate");

            // Live unit cue on Start/Now/Goal so it's clear they're numbers.
            (function () {
                var typeSel = document.querySelector('.gvDialog select[name="metricType"]');
                if (typeSel) {
                    var units = { number: '#', percent: '%', currency: '$' };
                    var apply = function () {
                        var u = units[typeSel.value] || '#';
                        document.querySelectorAll('.gvDialog .gv-unit').forEach(function (s) { s.textContent = '(' + u + ')'; });
                    };
                    apply();
                    typeSel.addEventListener('change', apply);
                }
            })();

            // Tabs — one zone at a time; remembers the last-used tab.
            (function () {
                var tabs = document.querySelectorAll('.gvDialog .gv-tab');
                var panels = document.querySelectorAll('.gvDialog .gv-panel');
                if (!tabs.length) return;
                function show(name) {
                    var found = false;
                    panels.forEach(function (p) { var m = p.getAttribute('data-panel') === name; p.hidden = !m; p.style.display = m ? '' : 'none'; if (m) found = true; });
                    tabs.forEach(function (t) {
                        var active = t.getAttribute('data-tab') === name;
                        t.classList.toggle('is-active', active);
                        t.setAttribute('aria-selected', active ? 'true' : 'false');
                        t.tabIndex = active ? 0 : -1;
                    });
                    if (found) { try { localStorage.setItem('gvActiveTab', name); } catch (e) {} }
                    return found;
                }
                tabs.forEach(function (t, i) {
                    t.addEventListener('click', function () { show(t.getAttribute('data-tab')); });
                    // Roving-tabindex arrow-key navigation (WAI-ARIA tabs pattern).
                    t.addEventListener('keydown', function (e) {
                        var next = null;
                        if (e.key === 'ArrowRight' || e.key === 'ArrowDown') { next = tabs[(i + 1) % tabs.length]; }
                        else if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') { next = tabs[(i - 1 + tabs.length) % tabs.length]; }
                        else if (e.key === 'Home') { next = tabs[0]; }
                        else if (e.key === 'End') { next = tabs[tabs.length - 1]; }
                        if (next) { e.preventDefault(); show(next.getAttribute('data-tab')); next.focus(); }
                    });
                });
                var saved = null; try { saved = localStorage.getItem('gvActiveTab'); } catch (e) {}
                // Default = Progress: updating the value is the recurring job
                // this dialog exists for (stale saved names fall through too).
                if (!saved || !show(saved)) { if (!show('progress')) { show(tabs[0].getAttribute('data-tab')); } }
            })();

            <?php if(!empty($statusLabels)): ?>
            new SlimSelect({
                select: '#statusCanvas',
                showSearch: false,
                valuesUseText: false,
                data: [
                        <?php $__currentLoopData = $statusLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($data['active']): ?>
                    {
                        innerHTML: '<i class="fas fa-fw <?php echo e($data['icon']); ?>"></i>&nbsp;<?php echo e($data['title']); ?>',
                        text: "<?php echo e($data['title']); ?>",
                        value: "<?php echo e($key); ?>",
                        selected: <?php echo e($canvasItem['status'] == $key ? 'true' : 'false'); ?>

                    },
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ]
            });
            <?php endif; ?>

            <?php if(!empty($relatesLabels)): ?>
            new SlimSelect({
                select: '#relatesCanvas',
                showSearch: false,
                valuesUseText: false,
                data: [
                        <?php $__currentLoopData = $relatesLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($data['active']): ?>
                    {
                        innerHTML: '<i class="fas fa-fw <?php echo e($data['icon']); ?>"></i>&nbsp;<?php echo e($data['title']); ?>',
                        text: "<?php echo e($data['title']); ?>",
                        value: "<?php echo e($key); ?>",
                        selected: <?php echo e($canvasItem['relates'] == $key ? 'true' : 'false'); ?>

                    },
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ]
            });
            <?php endif; ?>

            if (window.leantime && window.leantime.tiptapController) {
                leantime.tiptapController.initSimpleEditor();
            }

            <?php if(!$login::userIsAtLeast($roles::$editor)): ?>
            leantime.authController.makeInputReadonly(".nyroModalCont");
            <?php endif; ?>

            <?php if($login::userHasRole([$roles::$commenter])): ?>
            leantime.commentsController.enableCommenterForms();
            <?php endif; ?>

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Goalcanvas/Templates/canvasDialog.blade.php ENDPATH**/ ?>