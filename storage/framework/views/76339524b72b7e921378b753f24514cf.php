<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    // NO-OP textarea: renders a plain <textarea> with today's attributes + inner content.
    // There is NO `variant` arm: the only textarea style-classes in the app (.tiptapSimple /
    // .tiptapComplex / .wiki-editor-textarea) are JS rich-text EDITOR mounts — never route those
    // through this component (see do-not-touch below). Plain textareas carry no distinct style
    // class, so attribute + content passthrough is the whole no-op surface.

    // --- design-system IDL: declared for the durable contract (shared with forms.text-input),
    //     intentionally NOT rendered in no-op mode (a label/validation wrapper would change
    //     today's markup). Activated in the design phase's field-row layout. ---
    'contentRole' => '',      // reserved
    'state' => '',            // info | warning | danger | success (validation) — reserved
    'scale' => '',            // xs | s | m | l | xl — reserved
    'labelPosition' => 'top', // reserved
    'labelText' => '',        // reserved
    'caption' => '',          // reserved
    'validationText' => '',   // reserved
    'validationState' => '',  // reserved
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    // NO-OP textarea: renders a plain <textarea> with today's attributes + inner content.
    // There is NO `variant` arm: the only textarea style-classes in the app (.tiptapSimple /
    // .tiptapComplex / .wiki-editor-textarea) are JS rich-text EDITOR mounts — never route those
    // through this component (see do-not-touch below). Plain textareas carry no distinct style
    // class, so attribute + content passthrough is the whole no-op surface.

    // --- design-system IDL: declared for the durable contract (shared with forms.text-input),
    //     intentionally NOT rendered in no-op mode (a label/validation wrapper would change
    //     today's markup). Activated in the design phase's field-row layout. ---
    'contentRole' => '',      // reserved
    'state' => '',            // info | warning | danger | success (validation) — reserved
    'scale' => '',            // xs | s | m | l | xl — reserved
    'labelPosition' => 'top', // reserved
    'labelText' => '',        // reserved
    'caption' => '',          // reserved
    'validationText' => '',   // reserved
    'validationState' => '',  // reserved
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>


<textarea <?php echo e($attributes); ?>><?php echo e($slot); ?></textarea>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Views/Templates/components/forms/textarea.blade.php ENDPATH**/ ?>