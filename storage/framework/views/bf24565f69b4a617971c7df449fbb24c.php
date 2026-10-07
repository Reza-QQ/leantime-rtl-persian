<?php $tpl->dispatchTplEvent('beforeSelectable'); ?>


<div <?php echo e($attributes->merge([ 'class' => 'selectable selectable-'.$name.' tw-center '.($selected == "true" ? 'active' : ''). '' ])); ?> id="selectableWrapper-<?php echo e($id); ?>">

        <div class="selectableContent">
            <?php echo e($slot); ?>

        </div>

        <input type="<?php echo e($type ?? 'radio'); ?>"  name="<?php echo e($name); ?>" <?php echo $selected == "true" ? "checked='checked'" : ""; ?> id="selectable-<?php echo e($id); ?>" value="<?php echo e($value); ?>" class="selectableRadio tw-hidden"/>
        <label for="selectable-<?php echo e($id); ?>" class="selectable-label" >
            <?php echo e($label); ?>

        </label>

</div>

<?php if (! $__env->hasRenderedOnce('8db976ee-a47c-472a-8bd1-018cb516a347')): $__env->markAsRenderedOnce('8db976ee-a47c-472a-8bd1-018cb516a347');
$__env->startPush('scripts'); ?>
    <script>



        function setSelectables() {
            jQuery(".selectable").each(function(){

                jQuery(this).mousedown(function(){
                    jQuery(this).addClass("pushed");
                });
                jQuery(this).mouseup(function(){
                    jQuery(this).removeClass("pushed");
                });

                jQuery(this).click(function(){
                    var name = jQuery(this).find("input").attr("name");
                    var type = jQuery(this).find("input").attr("type");

                    if(type == 'radio') {
                        jQuery(".selectable-" + name).find("input.selectableRadio").removeProp("checked");
                        jQuery(".selectable-" + name).removeClass("active");
                        jQuery(this).addClass("active");
                        jQuery(this).find("input.selectableRadio").prop("checked", true);
                    }

                    if(type=='checkbox') {
                        if( jQuery(this).hasClass("active")) {
                            jQuery(this).removeClass("active");
                            jQuery(this).find("input.selectableRadio").prop("checked", false);
                        }else{
                            jQuery(this).addClass("active");
                            jQuery(this).find("input.selectableRadio").prop("checked", true);
                        }
                    }
                });
            });
        }

        jQuery(document).ready(function() {
            setSelectables();
        });

        htmx.onLoad(function(){
            setSelectables();
        });


    </script>
<?php $__env->stopPush(); endif; ?>


<?php $tpl->dispatchTplEvent('afterSelectableClose'); ?>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Views/Templates/components/selectable.blade.php ENDPATH**/ ?>