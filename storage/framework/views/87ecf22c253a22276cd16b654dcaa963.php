<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    // NO-OP variant -> the class the app renders TODAY. Default '' = a bare, unclassed input
    // (the common case: ~206 inputs have no class and are styled by their form/context).
    'variant' => '',          // '' (bare) | headline | large | small
                              //   Only EVIDENCE-BACKED, visually-distinct variants exist here:
                              //     headline -> .main-title-input  (large 24/26px title font, drop-shadow removed)
                              //     large    -> .input-large       (fixed 210px width — width only)
                              //     small    -> .input-small       (fixed 90px width — width only)
                              //   NO "form" or "legacy" variant: `.form-control` and `.input` are pure Bootstrap
                              //   cruft — forms.css element selectors override them, so a bare input is identical.
                              //   (Ghost/inline-edit `.secretInput` is a real future variant, pending its async-save JS.)
    'type' => 'text',         // text | email | password | number | url | tel | search (HTML-native; Blade extracts it from $attributes so it never duplicates)

    // --- design-system IDL: declared for the durable contract, but intentionally NOT rendered
    //     in no-op mode (a label/validation wrapper would change today's markup). They become
    //     active when the design phase introduces the field-row/label layout. ---
    'contentRole' => '',      // reserved
    'state' => '',            // info | warning | danger | success (validation) — reserved
    'scale' => '',            // xs | s | m | l | xl — reserved
    'labelPosition' => 'top', // reserved
    'labelText' => '',        // reserved
    'caption' => '',          // reserved
    'validationText' => '',   // reserved
    'validationState' => '',  // reserved
    'leadingVisual' => '',    // reserved
    'trailingVisual' => '',   // reserved
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
    // NO-OP variant -> the class the app renders TODAY. Default '' = a bare, unclassed input
    // (the common case: ~206 inputs have no class and are styled by their form/context).
    'variant' => '',          // '' (bare) | headline | large | small
                              //   Only EVIDENCE-BACKED, visually-distinct variants exist here:
                              //     headline -> .main-title-input  (large 24/26px title font, drop-shadow removed)
                              //     large    -> .input-large       (fixed 210px width — width only)
                              //     small    -> .input-small       (fixed 90px width — width only)
                              //   NO "form" or "legacy" variant: `.form-control` and `.input` are pure Bootstrap
                              //   cruft — forms.css element selectors override them, so a bare input is identical.
                              //   (Ghost/inline-edit `.secretInput` is a real future variant, pending its async-save JS.)
    'type' => 'text',         // text | email | password | number | url | tel | search (HTML-native; Blade extracts it from $attributes so it never duplicates)

    // --- design-system IDL: declared for the durable contract, but intentionally NOT rendered
    //     in no-op mode (a label/validation wrapper would change today's markup). They become
    //     active when the design phase introduces the field-row/label layout. ---
    'contentRole' => '',      // reserved
    'state' => '',            // info | warning | danger | success (validation) — reserved
    'scale' => '',            // xs | s | m | l | xl — reserved
    'labelPosition' => 'top', // reserved
    'labelText' => '',        // reserved
    'caption' => '',          // reserved
    'validationText' => '',   // reserved
    'validationState' => '',  // reserved
    'leadingVisual' => '',    // reserved
    'trailingVisual' => '',   // reserved
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>


<?php
    // No-op map: variant -> the exact class the markup uses today.
    $variantClass = match ($variant) {
        'headline' => 'main-title-input',
        'large' => 'input-large',
        'small' => 'input-small',
        default => '',   // bare / search: no class (styled by context / id / name)
    };

    // Only add a class attribute when there's actually a class — so a bare input stays
    // class-less (no empty class="") exactly like today.
    $attrs = $variantClass !== '' ? $attributes->merge(['class' => $variantClass]) : $attributes;
?>

<input type="<?php echo e($type); ?>" <?php echo e($attrs); ?> />
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Views/Templates/components/forms/text-input.blade.php ENDPATH**/ ?>