<title><?php echo $tpl->dispatchTplFilter('page_title', $sitename); ?></title>

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<meta name="requestId" content="<?php echo e(\Illuminate\Support\Str::random(4)); ?>">
<meta name="description" content="<?php echo e($sitename); ?>">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="theme-color" content="<?php echo e($primaryColor); ?>">
<meta name="color-scheme" content="<?php echo e($themeColorMode); ?>">
<meta name="theme" content="<?php echo e($theme); ?>">
<meta name="identifier-URL" content="<?php echo BASE_URL; ?>">
<meta name="leantime-version" content="<?php echo e($version); ?>">

<?php $tpl->dispatchTplEvent('afterMetaTags'); ?>

<link rel="shortcut icon" href="<?php echo BASE_URL; ?>/dist/images/favicon.png"/>
<link rel="apple-touch-icon" href="<?php echo BASE_URL; ?>/dist/images/apple-touch-icon.png">

<?php
    // Cache-buster: the filenames only change per app version, so rebuilds of
    // the SAME version were served stale from browser cache (no query hash in
    // the mix manifest — core mix does not version() the css). The bundle's
    // mtime changes on every build, which busts exactly when needed.
    $mainCssPath = APP_ROOT.'/public/dist/css/main.'.$version.'.min.css';
    $cssBust = is_file($mainCssPath) ? filemtime($mainCssPath) : $version;
?>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>/dist/css/main.<?php echo $version; ?>.min.css?v=<?php echo $cssBust; ?>"/>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>/dist/css/app.<?php echo $version; ?>.min.css?v=<?php echo $cssBust; ?>"/>
<?php if($tpl->needsComponent('tiptap')): ?>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>/dist/css/tiptap-editor.<?php echo $version; ?>.min.css?v=<?php echo $cssBust; ?>"/>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>/dist/css/katex.min.css?v=<?php echo $cssBust; ?>"/>
<?php endif; ?>

<?php $tpl->dispatchTplEvent('afterLinkTags'); ?>

<script src="<?php echo BASE_URL; ?>/api/i18n?v=<?php echo $version; ?>"></script>

<script src="<?php echo BASE_URL; ?>/dist/js/compiled-htmx.<?php echo $version; ?>.min.js"></script>
<script src="<?php echo BASE_URL; ?>/dist/js/compiled-htmx-extensions.<?php echo $version; ?>.min.js"></script>

<!-- libs -->
<script src="<?php echo BASE_URL; ?>/dist/js/compiled-frameworks.<?php echo $version; ?>.min.js"></script>
<script src="<?php echo BASE_URL; ?>/dist/js/compiled-framework-plugins.<?php echo $version; ?>.min.js"></script>
<script src="<?php echo BASE_URL; ?>/dist/js/compiled-global-component.<?php echo $version; ?>.min.js"></script>

<?php if($tpl->needsComponent('calendar')): ?>
<script defer src="<?php echo BASE_URL; ?>/dist/js/compiled-calendar-component.<?php echo $version; ?>.min.js"></script>
<?php endif; ?>
<?php if($tpl->needsComponent('table')): ?>
<script defer src="<?php echo BASE_URL; ?>/dist/js/compiled-table-component.<?php echo $version; ?>.min.js"></script>
<?php endif; ?>
<?php if($tpl->needsComponent('tiptap')): ?>
<script defer src="<?php echo BASE_URL; ?>/dist/js/compiled-tiptap-toolbar.<?php echo $version; ?>.min.js"></script>
<script defer src="<?php echo BASE_URL; ?>/dist/js/compiled-tiptap-editor.<?php echo $version; ?>.min.js"></script>
<?php endif; ?>
<?php if($tpl->needsComponent('gantt')): ?>
<script defer src="<?php echo BASE_URL; ?>/dist/js/compiled-gantt-component.<?php echo $version; ?>.min.js"></script>
<?php endif; ?>
<?php if($tpl->needsComponent('chart')): ?>
<script defer src="<?php echo BASE_URL; ?>/dist/js/compiled-chart-component.<?php echo $version; ?>.min.js"></script>
<?php endif; ?>

<?php $tpl->dispatchTplEvent('afterScriptLibTags'); ?>

<!-- app -->
<script src="<?php echo BASE_URL; ?>/dist/js/compiled-app.<?php echo $version; ?>.min.js"></script>
<?php $tpl->dispatchTplEvent('afterMainScriptTag'); ?>

<!--
//For future file based ref js loading
<script src="<?php echo BASE_URL; ?>/dist/js/<?php echo e(ucwords(\Leantime\Core\Controller\Frontcontroller::getModuleName())); ?>/Js/<?php echo e(\Leantime\Core\Controller\Frontcontroller::getModuleName()); ?>Controller.js"></script>
-->

<!-- theme & custom -->

<?php $__currentLoopData = $themeScripts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $script): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(! empty($script)): ?>
        <script src="<?php echo $script; ?>"></script>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__currentLoopData = $themeStyles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $style): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(! empty($style['url'])): ?>
        <link rel="stylesheet" <?php if(isset($style['id'])): ?> id="<?php echo e($style['id']); ?>" <?php endif; ?> href="<?php echo $style['url']; ?>"/>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $tpl->dispatchTplEvent('afterScriptsAndStyles'); ?>

<!-- Replace main theme colors -->
<?php
    // The nav bar sets white controls on the accent gradient. A light accent is
    // a mid-tone that fails WCAG AA for white text; detect that per-theme and
    // enable a dark scrim only then, so dark-accent themes stay fully vivid.
    $navNeedsScrim = false;
    foreach ($accents as $accentColor) {
        // No usable accent value here — nothing to reason about, skip.
        if ($accentColor === false || $accentColor === null || $accentColor === '') {
            continue;
        }
        // A real accent we can't parse as 6-digit hex (e.g. rgb()/hsl()/named
        // colors): we can't measure its luminance, so fail closed and enable the
        // scrim to protect white nav-text contrast rather than assuming it's safe.
        if (! is_string($accentColor) || ! preg_match('/^#?([0-9a-fA-F]{6})$/', $accentColor, $accentHex)) {
            $navNeedsScrim = true;
            break;
        }
        [$ar, $ag, $ab] = sscanf($accentHex[1], '%02x%02x%02x');
        $linChannel = static fn ($v) => ($v /= 255) <= 0.03928 ? $v / 12.92 : (($v + 0.055) / 1.055) ** 2.4;
        $accentLum = 0.2126 * $linChannel($ar) + 0.7152 * $linChannel($ag) + 0.0722 * $linChannel($ab);
        if (1.05 / ($accentLum + 0.05) < 4.5) { // white-on-accent below AA
            $navNeedsScrim = true;
            break;
        }
    }
?>
<style id="colorSchemeSetter">
    :root { --nav-scrim: <?php echo e($navNeedsScrim ? '0.22' : '0'); ?>; }
    <?php $__currentLoopData = $accents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($accent !== false): ?>
            :root {
                --accent<?php echo e($loop->iteration); ?>: <?php echo e($accent); ?>;
            }
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</style>

<link rel="preload" href="<?php echo e(BASE_URL); ?>/dist/fonts/woff2/IRANSansWeb.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="<?php echo e(BASE_URL); ?>/dist/fonts/woff2/IRANSansWeb_Bold.woff2" as="font" type="font/woff2" crossorigin>

<style id="fontStyleSetter">
    :root {
        --primary-font-family: '<?php echo e($themeFont); ?>', 'Helvetica Neue', Helvetica, sans-serif;
    }
</style>


<style id="backgroundImageSetter">
    <?php if(!empty($themeBg)): ?>
            .rightpanel {
                background-image: url(<?php echo filter_var($themeBg, FILTER_SANITIZE_URL); ?>);
                opacity: <?php echo e($themeOpacity); ?>;
                mix-blend-mode: <?php echo e($themeType == 'image' ? 'normal' : 'multiply'); ?>;
                background-size: var(--background-size, cover);
                background-position: center;
                background-attachment: fixed;
            }

    <?php if($themeType === 'image'): ?>
        .rightpanel:before {
            background: none;
        }
    <?php endif; ?>
    <?php endif; ?>
</style>


<?php $tpl->dispatchTplEvent('afterThemeColors'); ?>


<script>
    window.leantime.currentProject = '<?php echo e(session("currentProject")); ?>';
</script>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Views/Templates/sections/header.blade.php ENDPATH**/ ?>