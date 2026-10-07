<?php
    $module = \Leantime\Core\Controller\Frontcontroller::getModuleName('');
    $maxSize = \Leantime\Core\Files\FileManager::getMaximumFileUploadSize();
    $moduleId = $_GET['id'] ?? '';
?>
<div id="fileManager">

    <?php echo $tpl->displayNotification(); ?>


    <div class="uploadWrapper">

        <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','contentRole' => 'default','id' => 'cancelLink','link' => 'javascript:void(0);','style' => 'display:none;']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','contentRole' => 'default','id' => 'cancelLink','link' => 'javascript:void(0);','style' => 'display:none;']); ?><?php echo __('links.cancel'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $attributes = $__attributesOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__attributesOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala493228b66e4027022b3745cf8ae8521)): ?>
<?php $component = $__componentOriginala493228b66e4027022b3745cf8ae8521; ?>
<?php unset($__componentOriginala493228b66e4027022b3745cf8ae8521); ?>
<?php endif; ?>
        <div class="extra" style="margin-top:5px;"></div>
        <div class="fileUploadDrop">
            <p><i><?php echo __('text.drop_files'); ?></i></p>
            <div class="file-upload-input" style="margin:auto;  display:inline-block"></div>
            <a href="javascript:void(0);" id="webcamClick"><?php echo __('label.webcam'); ?></a>
            <a href="javascript:void(0);" id="screencaptureLink"><?php echo __('label.screen_recording'); ?></a>
        </div>

        <!-- Progress bar #1 -->
        <div class="input-progress"></div>

        <div class="input-error"></div>

        <form id="upload-form"></form>

    </div>

    <div class='mediamgr'>

        <div class="mediamgr_content">

            <ul id='medialist' class='listfile'>
                <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="file-module-<?php echo e($file['moduleId']); ?>">
                        <div class="inlineDropDownContainer dropright" style="float:right;">

                            <a href="javascript:void(0);" class="dropdown-toggle ticketDropDown" data-toggle="dropdown">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-header"><?php echo __('subtitles.file'); ?></li>
                                <li><a target="_blank" href="<?php echo e(BASE_URL); ?>/files/get?module=<?php echo e($file['module']); ?>&encName=<?php echo e($file['encName']); ?>&ext=<?php echo e($file['extension']); ?>&realName=<?php echo e($file['realName']); ?>"><?php echo __('links.download'); ?></a></li>

                                <?php if($login::userIsAtLeast($roles::$editor)): ?>
                                    <li>
                                        <form method="post" action="<?php echo e(BASE_URL); ?>/files/showAll" class="deleteFile" onsubmit="return confirm('<?php echo e(__('text.confirm_delete')); ?>')">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="delFile" value="<?php echo e($file['id']); ?>" />
                                            <button type="submit" class="delete" style="background:none;border:none;cursor:pointer;padding:3px 20px;width:100%;text-align:left;"><i class="fa fa-trash"></i> <?php echo __('links.delete'); ?></button>
                                        </form>
                                    </li>
                                <?php endif; ?>

                            </ul>
                        </div>
                        <a class="imageLink" data-ext="<?php echo e($file['extension']); ?>" href="<?php echo e(BASE_URL); ?>/files/get?module=<?php echo e($file['module']); ?>&encName=<?php echo e($file['encName']); ?>&ext=<?php echo e($file['extension']); ?>&realName=<?php echo e($file['realName']); ?>">
                            <?php if(in_array(strtolower($file['extension']), $imgExtensions ?? [])): ?>
                                <img style='max-height: 50px; max-width: 70px;' src="<?php echo e(BASE_URL); ?>/files/get?module=<?php echo e($file['module']); ?>&encName=<?php echo e($file['encName']); ?>&ext=<?php echo e($file['extension']); ?>&realName=<?php echo e($file['realName']); ?>" alt="" />
                            <?php else: ?>
                                <img style='max-height: 50px; max-width: 70px;' src='<?php echo e(BASE_URL); ?>/dist/images/doc.png' />
                            <?php endif; ?>
                            <span class="filename" title="<?php echo e($file['realName']); ?>.<?php echo e($file['extension']); ?>"><?php echo e($file['realName']); ?>.<?php echo e($file['extension']); ?></span>
                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <br class="clearall" />
            </ul>

            <br class="clearall" />

        </div><!--mediamgr_content-->

        <br class="clearall" />
    </div><!--mediamgr-->
</div>



<script type='text/javascript'>
    jQuery(document).ready(function(){

        jQuery('#widgetAction').click(function(){
            jQuery('.widgetList').toggle();
        });
        jQuery('#widgetAction2').click(function(){
            jQuery('.widgetList2').toggle();
        });
    });
</script>


    <script type="text/javascript">
        jQuery(document).ready(function(){

            let modalTypes = ["jpg", "jpeg", "png", "gif", "apng", "webp", "avif"];

            jQuery(".imageLink").each(function(i) {
                let ext = jQuery(this).attr("data-ext");
                if(modalTypes.includes(ext)) {
                    jQuery(this).nyroModal();
                }
            });

            //Replaces data-rel attribute to rel.
            //We use data-rel because of w3c validation issue
            jQuery('a[data-rel]').each(function() {
                jQuery(this).attr('rel', jQuery(this).data('rel'));
            });

            //jQuery("#medialist a").colorbox();

            <?php if(isset($_GET['modalPopUp'])): ?>
                jQuery('#medialist a.imageLink').on("click", function(event){

                    event.preventDefault();
                    event.stopImmediatePropagation();

                    var url = jQuery(this).attr("href");

                    //File picker upload callback from editor
                    window.filePickerCallback(url, {text: "file"});

                    jQuery.nmTop().close();
                });

            <?php endif; ?>

            // Media Filter
            jQuery('#mediafilter a').on("click", function(){

                var filter = (jQuery(this).attr('href') != 'all')? '.'+jQuery(this).attr('href') : '*';
                jQuery('#medialist').isotope({ filter: filter });

                jQuery('#mediafilter li').removeClass('current');
                jQuery(this).parent().addClass('current');

                return false;
            });

            jQuery(".deleteFile").nyroModal();


        });
    </script>


<script>

    if (typeof uppy === 'undefined') {


    const uppy = new Uppy.Uppy({
            debug: false,
            autoProceed: true,
            restrictions: {
                maxFileSize: <?php echo e($maxSize); ?>

            }
    });

    uppy.use(Uppy.DropTarget, { target: '#fileManager' });

    uppy.use(Uppy.FileInput, {
            target: '.file-upload-input',
        pretty: true,
        locale: {
                strings: {
                    chooseFiles: ' Browse',
                }
        }
    });
    uppy.use(Uppy.XHRUpload, {
        endpoint: '<?php echo e(BASE_URL); ?>/api/files?module=<?php echo e($module); ?>&moduleId=<?php echo e($moduleId); ?>',
        formData: true,
    });

    uppy.use(Uppy.StatusBar, {
        target: '.input-progress',
        hideUploadButton: true,
        hideAfterFinish: false,
    });

    //uppy.use(Uppy.Webcam, { target: '.extra' });
    //uppy.use(Uppy.ProgressBar, { target: '.input-progress', hideAfterFinish: true });

    //uppy.use(Uppy.Audio, { target: '.extra', showRecordingLength: true });
    //uppy.use(Uppy.ScreenCapture, { target: '.extra' });

    uppy.use(Uppy.Form, { target: '#upload-form' });
    //uppy.use(Uppy.ImageEditor, { target: '.extra' });
    // Allow dropping files on any element or the whole document
    // Optimize images
    uppy.use(Uppy.Compressor);

    /*
    uppy.use(Uppy.ThumbnailGenerator, {
        id: 'ThumbnailGenerator',
        thumbnailWidth: 200,
        thumbnailHeight: 200,
        thumbnailType: 'image/jpeg',
        waitForThumbnailsBeforeUpload: false,
    });

    uppy.on('thumbnail:generated', (file, preview) => {
        const img = document.createElement('img')
        img.src = preview;
        img.width = 100;
        document.body.appendChild(img);

    });*/

    // Upload
    uppy.on("restriction-failed", (file, error) => {

        jQuery(".input-error").html("<span class='label-important'>"+error+"</span>");
        return false
    });

    uppy.on('upload-success', (file, response) => {

        jQuery(".input-error").text('');

        response = response.body;

        if(response.hasOwnProperty("moduleId")){
        /*
        //window.location.hash = "files";
        //window.location.reload();*/

            let html = '<li class="file-module-'+response.moduleId+'">' +
                            '<div class="inlineDropDownContainer dropright" style="float:right;">' +
                                '<a href="javascript:void(0);" class="dropdown-toggle ticketDropDown" data-toggle="dropdown">' +
                                    '<i class="fa fa-ellipsis-v" aria-hidden="true"></i>' +
                                '</a>' +
                                '<ul class="dropdown-menu">' +
                                    '<li class="nav-header"><?php echo __('subtitles.file'); ?></li>' +
                                    '<li><a target="_blank" href="<?php echo e(BASE_URL); ?>/files/get?module='+ response.module +'&encName='+ response.encName +'&ext='+ response.extension +'&realName='+ response.realName +'"><?php echo str_replace("'", '"', __('links.download')); ?></a></li>'+
                                    <?php if($login::userIsAtLeast($roles::$editor)): ?>
                                        '<li><form method="post" action="<?php echo e(BASE_URL); ?>/files/showAll" class="deleteFile" onsubmit="return confirm(\'<?php echo e(__("text.confirm_delete")); ?>\')"><input type="hidden" name="_token" value="'+ jQuery('meta[name=csrf-token]').attr('content') +'" /><input type="hidden" name="delFile" value="'+ response.fileId +'" /><button type="submit" class="delete" style="background:none;border:none;cursor:pointer;padding:3px 20px;width:100%;text-align:left;"><i class="fa fa-trash"></i> <?php echo str_replace("'", '"', __("links.delete")); ?></button></form></li>'+
                                    <?php endif; ?>
                                '</ul>'+
                            '</div>'+
                            '<a class="imageLink" href="<?php echo e(BASE_URL); ?>/files/get?module='+ response.module +'&encName='+ response.encName +'&ext='+ response.extension +'&realName='+ response.realName +'">'+
                                '<img style="max-height: 50px; max-width: 70px;" src="<?php echo e(BASE_URL); ?>/files/get?module='+ response.module +'&encName='+ response.encName +'&ext='+ response.extension +'&realName='+ response.realName +'" alt="" />'+

                                '<span class="filename" title="'+response.realName+'.'+response.extension+'">'+response.realName+'.'+response.extension+'</span>'+
                            '</a>'+
                        '</li>';

                 jQuery("#medialist").append(html);
        }

    });

    jQuery("#webcamClick").click(function(){
        jQuery(".uploadWrapper .extra").css("display", "flex");
        uppy.use(Uppy.Webcam, { target: '.extra' });
        jQuery("#cancelLink").show();
    });

    jQuery("#screencaptureLink").click(function(){
        jQuery(".uploadWrapper .extra").css("display", "flex");
        uppy.use(Uppy.ScreenCapture,
            {
                displayMediaConstraints: {
                    video: {
                        width: 1280,
                        height: 720,
                        frameRate: {
                            ideal: 3,
                            max: 5,
                        },
                        cursor: 'motion',
                        displaySurface: 'window',
                    },
                },
                target: '.extra'
            });
        jQuery("#cancelLink").show();
    });



    jQuery("#cancelLink").click(function(){
        const instance = uppy.getPlugin('Webcam');
        if(instance) {
            uppy.removePlugin(instance);
        }

        const instance2 = uppy.getPlugin('ScreenCapture');
        if(instance2) {
            uppy.removePlugin(instance2);
        }

        jQuery("#cancelLink").hide();

        jQuery(".uploadWrapper .extra").css("display", "none");


    });

    }

</script>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Files/Templates/submodules/showAll.blade.php ENDPATH**/ ?>