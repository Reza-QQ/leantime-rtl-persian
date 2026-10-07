<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'ticket' => false,
    'onTheClock' => false,
    'allowSubtaskCreation' => false
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
    'ticket' => false,
    'onTheClock' => false,
    'allowSubtaskCreation' => false
 ]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php if($login::userIsAtLeast(\Leantime\Domain\Auth\Models\Roles::$editor)): ?>

    <div class="inlineDropDownContainer" style="float:right;">

        <a href="javascript:void(0);" class="dropdown-toggle ticketDropDown" data-toggle="dropdown">
            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
        </a>
        <ul class="dropdown-menu">
            <li class="nav-header"><?php echo e(__("subtitles.todo")); ?></li>
            <?php $tpl->dispatchTplEvent("beforeShowTicket", ["ticket"=>$ticket]); ?>
            <li><a href="#/tickets/showTicket/<?php echo e($ticket["id"]); ?>" class=''><i class="fa fa-edit"></i> <?php echo e(__("links.edit_todo")); ?></a></li>
            <?php $tpl->dispatchTplEvent("beforeMoveTicket", ["ticket"=>$ticket]); ?>
            <li><a href="#/tickets/moveTicket/<?php echo e($ticket["id"]); ?>" class=""><i class="fa-solid fa-arrow-right-arrow-left"></i> <?php echo e(__("links.move_todo")); ?></a></li>
            <?php if($allowSubtaskCreation): ?>
            <li><a  href="javascript:void(0);" onclick="jQuery('#subtask-form-<?php echo e($ticket['id']); ?>').toggle();"
                    class="add-subtask-link">
                  <i class="fa-solid fa-diagram-predecessor"></i> افزودن زیرکار</a></li>
            <?php endif; ?>
            <?php $tpl->dispatchTplEvent("beforeDeleteTicket", ["ticket"=>$ticket]); ?>
            <li><a href="#/tickets/delTicket/<?php echo e($ticket["id"]); ?>" class="delete"><i class="fa fa-trash"></i> <?php echo e(__("links.delete_todo")); ?></a></li>


            <?php $tpl->dispatchTplEvent("submenuSection", ["ticket"=>$ticket]); ?>

            <li class="nav-header border"><?php echo e(__("subtitles.track_time")); ?></li>
            <?php $tpl->dispatchTplEvent("beforeTimer", ["ticket"=>$ticket]); ?>
            <li class="timerContainer tw-px-[10px]">
                <?php echo $__env->make('tickets::partials.timerButton', ['parentTicketId' => $ticket['id'], 'onTheClock' => $onTheClock, 'style'=> 'full'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </li>
            <?php $tpl->dispatchTplEvent("end"); ?>
        </ul>
    </div>

<?php endif; ?>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Tickets/Templates/partials/ticketsubmenu.blade.php ENDPATH**/ ?>