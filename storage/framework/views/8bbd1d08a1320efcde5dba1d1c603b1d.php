<?php if($poorMansCron && $loggedIn): ?>
    <script>

        jQuery(document).ready(function() {

            let now = Date.now();
            let lastCronExecution = localStorage.getItem("lastCronRun");

            if(Number.isInteger(lastCronExecution)){

                var difference = Math.floor((now - lastCronExecution) / 1000);
                if(difference > 300) {
                    jQuery.get('<?php echo BASE_URL; ?>/cron/run');
                    localStorage.setItem("lastCronRun", Date.now());
                }

            }else{
                jQuery.get('<?php echo BASE_URL; ?>/cron/run');
                localStorage.setItem("lastCronRun", Date.now());
            }

            //1 min time to run cron
            setInterval(function(){
                jQuery.get('<?php echo BASE_URL; ?>/cron/run');
                localStorage.setItem("lastCronRun", Date.now());
            }, 300000);
        });

    </script>
<?php endif; ?>

<script src="<?php echo BASE_URL; ?>/dist/js/compiled-footer.<?php echo $version; ?>.min.js"></script>

<?php $tpl->dispatchTplEvent('beforeBodyClose'); ?>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Views/Templates/sections/pageBottom.blade.php ENDPATH**/ ?>