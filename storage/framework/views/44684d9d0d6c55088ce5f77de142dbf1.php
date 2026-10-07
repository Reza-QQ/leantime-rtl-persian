<?php
    // Repository is used downstream for getReplies(). Renamed from
    // $comments because the controller already assigns $comments to
    // the array of comments to render — overwriting it with the
    // repository object made the @foreach below iterate the object's
    // (empty) public properties instead of the array, so every
    // Discussion section came up empty regardless of how the comment
    // was added.
    $commentsRepo = app()->make(Leantime\Domain\Comments\Repositories\Comments::class);
    $formUrl = CURRENT_URL;
    $formHash = md5($formUrl);

    // Controller may not redirect. Make sure delComment is only added once
    if (str_contains($formUrl, '?delComment=')) {
        $urlParts = explode('?delComment=', $formUrl);
        $deleteUrlBase = $urlParts[0] . '?delComment=';
    } else {
        $deleteUrlBase = $formUrl . '?delComment=';
    }
?>

<form method="post" accept-charset="utf-8" action="<?php echo e($formUrl); ?>" id="commentForm-<?php echo e($formHash); ?>" class="formModal">

    <?php if($login::userIsAtLeast($roles::$commenter)): ?>
        <div class="mainToggler-<?php echo e($formHash); ?>" id="">
            <div class="commentImage">
                <img src="<?php echo e(BASE_URL); ?>/api/users?profileImage=<?php echo e(session('userdata.id')); ?>&v=<?php echo e(format(session('userdata.modified'))->timestamp()); ?>" />
            </div>
            <div class="commentReply inactive">
                <a href="javascript:void(0);" onclick="toggleCommentBoxes(0, null, '<?php echo e($formHash); ?>')">
                    <?php echo __('links.add_new_comment'); ?>

                </a>
            </div>
        </div>

        <div id="comment-<?php echo e($formHash); ?>-0" class="commentBox-<?php echo e($formHash); ?> commenterFields" style="display:none;">
            <div class="commentImage">
                <img src="<?php echo e(BASE_URL); ?>/api/users?profileImage=<?php echo e(session('userdata.id')); ?>&v=<?php echo e(format(session('userdata.modified'))->timestamp()); ?>" />
            </div>
            <div class="commentReply">
                <textarea rows="5" cols="50" class="tiptapSimple" name="text"></textarea>
                <input type="submit" value="<?php echo e(__('buttons.save')); ?>" name="comment" class="btn btn-primary btn-success" style="margin-left: 0px;"/>
            </div>
            <input type="hidden" name="comment" class="commenterField" value="1"/>
            <input type="hidden" name="father" class="commenterField" id="father-<?php echo e($formHash); ?>" value="0"/>
            <input type="hidden" name="edit-comment-helper" class="commenterField" id="edit-comment-helper-<?php echo e($formHash); ?>" />
            <br/>
        </div>
    <?php endif; ?>

    <div id="comments-<?php echo e($formHash); ?>">
        <div>
            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="clearall">
                    <div class="commentImage" id="comment-image-to-hide-on-edit-<?php echo e($formHash); ?>-<?php echo e($row['id']); ?>">
                        <img src="<?php echo e(BASE_URL); ?>/api/users?profileImage=<?php echo e($row['userId']); ?>&v=<?php echo e(format($row['userModified'])->timestamp()); ?>"/>
                    </div>
                    <div class="commentMain">
                        <div class="commentContent" id="comment-to-hide-on-edit-<?php echo e($formHash); ?>-<?php echo e($row['id']); ?>">
                            <div class="right commentDate">
                                <?php echo sprintf(__('text.written_on'), format($row['date'])->date(), format($row['date'])->time()); ?>

                                    <?php if($login::userIsAtLeast($roles::$editor)): ?>
                                        <div class="inlineDropDownContainer" style="float:right; margin-left:10px;">
                                            <a href="javascript:void(0);" class="dropdown-toggle ticketDropDown" data-toggle="dropdown">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>

                                            <ul class="dropdown-menu">
                                                <?php if(($row['userId'] == session('userdata.id')) || can('comments.moderate')): ?>
                                                    <li><a href="<?php echo e($deleteUrlBase . $row['id']); ?>" class="deleteComment formModal">
                                                        <span class="fa fa-trash"></span> <?php echo __('links.delete'); ?>

                                                    </a></li>
                                                <?php endif; ?>
                                                <?php if(($row['userId'] == session('userdata.id')) || can('comments.moderate')): ?>
                                                    <li>
                                                        <a href="javascript:void(0);" onclick="toggleCommentBoxes(<?php echo e($row['id']); ?>, null, '<?php echo e($formHash); ?>', true)">
                                                            <span class="fa fa-edit"></span> <?php echo __('label.edit'); ?>

                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if(isset($ticket->id)): ?>
                                                        <li><a href="javascript:void(0);" onclick="leantime.ticketsController.addCommentTimesheetContent(<?php echo e($row['id']); ?>, <?php echo e($ticket->id); ?>);"><?php echo __('links.add_to_timesheets'); ?></a></li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                            </div>
                            <span class="name"><?php echo sprintf(__('text.full_name'), $tpl->escape($row['firstname']), $tpl->escape($row['lastname'])); ?></span>
                            <div class="text tiptap-content" id="commentText-<?php echo e($formHash); ?>-<?php echo e($row['id']); ?>">
                                <div id="comment-text-to-hide-<?php echo e($formHash); ?>-<?php echo e($row['id']); ?>"><?php echo $tpl->escapeMinimal($row['text']); ?></div>
                            </div>
                        </div>
                        <div class="commentLinks" id="comment-link-to-hide-on-edit-<?php echo e($formHash); ?>-<?php echo e($row['id']); ?>">
                            <?php if($login::userIsAtLeast($roles::$commenter)): ?>
                                <a href="javascript:void(0);"
                                   onclick="toggleCommentBoxes(<?php echo e($row['id']); ?>, null, '<?php echo e($formHash); ?>')">
                                    <span class="fa fa-reply"></span> <?php echo __('links.reply'); ?>

                                </a>
                            <?php endif; ?>
                            <span class="comment-reactions" id="reactions-<?php echo e($row['id']); ?>"
                                 hx-get="<?php echo e(BASE_URL); ?>/hx/comments/reactions/get?commentId=<?php echo e($row['id']); ?>"
                                 hx-trigger="load"
                                 hx-swap="outerHTML">
                            </span>
                        </div>

                        
                        <div style="display:none;" id="comment-<?php echo e($formHash); ?>-<?php echo e($row['id']); ?>" class="commentBox">
                            <div class="commentImage">
                                <img src="<?php echo e(BASE_URL); ?>/api/users?profileImage=<?php echo e(session('userdata.id')); ?>&v=<?php echo e(format(session('userdata.modified'))->timestamp()); ?>"/>
                            </div>
                            <div class="commentReply">
                                <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'submit','labelText' => __('links.reply'),'name' => 'comment','id' => 'submit-reply-button','contentRole' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'submit','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('links.reply')),'name' => 'comment','id' => 'submit-reply-button','contentRole' => 'primary']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'input','inputType' => 'button','onclick' => 'cancel('.e($row['id']).', \''.e($formHash).'\')','labelText' => __('links.cancel'),'contentRole' => 'tertiary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'input','inputType' => 'button','onclick' => 'cancel('.e($row['id']).', \''.e($formHash).'\')','labelText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('links.cancel')),'contentRole' => 'tertiary']); ?>
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
                            <div class="clearall"></div>
                        </div>

                        <div class="replies">
                            <?php if($commentsRepo->getReplies($row['id'])): ?>
                                <?php $__currentLoopData = $commentsRepo->getReplies($row['id']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div>
                                        <div class="commentImage">
                                            <img src="<?php echo e(BASE_URL); ?>/api/users?profileImage=<?php echo e($comment['userId']); ?>&v=<?php echo e(format($comment['userModified'])->timestamp()); ?>"/>
                                        </div>
                                        <div class="commentMain">
                                            <div class="commentContent">
                                                <div class="right commentDate">
                                                    <?php echo sprintf(__('text.written_on'), format($comment['date'])->date(), format($comment['date'])->time()); ?>

                                                </div>
                                                <span class="name"><?php echo sprintf(__('text.full_name'), $tpl->escape($comment['firstname']), $tpl->escape($comment['lastname'])); ?></span>
                                                <div class="text tiptap-content" id="comment-text-to-hide-reply-<?php echo e($formHash); ?>-<?php echo e($comment['id']); ?>"><?php echo $tpl->escapeMinimal($comment['text']); ?></div>
                                            </div>

                                            <div class="commentLinks">
                                                <?php if($login::userIsAtLeast($roles::$commenter)): ?>
                                                    <a href="javascript:void(0);"
                                                       onclick="toggleCommentBoxes(<?php echo e($row['id']); ?>, null, '<?php echo e($formHash); ?>')">
                                                        <span class="fa fa-reply"></span> <?php echo __('links.reply'); ?>

                                                    </a>
                                                    <?php if($comment['userId'] == session('userdata.id')): ?>
                                                        <a href="<?php echo e($deleteUrlBase . $comment['id']); ?>"
                                                           class="deleteComment formModal">
                                                            <span class="fa fa-trash"></span> <?php echo __('links.delete'); ?>

                                                        </a>
                                                        <a href="javascript:void(0);" onclick="toggleCommentBoxes(<?php echo e($row['id']); ?>, <?php echo e($comment['id']); ?>, '<?php echo e($formHash); ?>', true, true)">
                                                            <span class="fa fa-edit"></span> <?php echo __('label.edit'); ?>

                                                        </a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <span class="comment-reactions" id="reactions-<?php echo e($comment['id']); ?>"
                                                     hx-get="<?php echo e(BASE_URL); ?>/hx/comments/reactions/get?commentId=<?php echo e($comment['id']); ?>"
                                                     hx-trigger="load"
                                                     hx-swap="outerHTML">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="clearall"></div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <div class="clearall"></div>
</form>

<script type='text/javascript'>

    jQuery(document).ready(function() {
        if (window.leantime && window.leantime.tiptapController) {
            leantime.tiptapController.initSimpleEditor();
        }
    });

    function toggleCommentBoxes(id, commentId, formHash, editComment = false, isReply = false) {
        <?php if($login::userIsAtLeast($roles::$commenter)): ?>

            if (parseInt(id, 10) === 0) {
                jQuery(`.mainToggler-${formHash}`).hide();
            } else {
                jQuery(`.mainToggler-${formHash}`).show();
            }
            if (editComment) {
                jQuery(`#comment-to-hide-on-edit-${formHash}-${id}`).hide();
                jQuery(`#comment-link-to-hide-on-edit-${formHash}-${id}`).hide();
                jQuery(`#comment-image-to-hide-on-edit-${formHash}-${id}`).hide();
                jQuery(`#edit-comment-helper-${formHash}`).val(commentId || id);
                jQuery('#submit-reply-button').val('<?php echo e(__('buttons.save')); ?>');
            }

            // Destroy existing Tiptap editors before removing textareas
            jQuery(`.commentBox-${formHash}`).each(function() {
                var wrapper = jQuery(this).find('.tiptap-wrapper');
                if (wrapper.length && window.leantime && window.leantime.tiptapController) {
                    leantime.tiptapController.registry.destroyWithin(wrapper[0]);
                }
            });

            jQuery(`.commentBox-${formHash} textarea`).remove();
            jQuery(`.commentBox-${formHash} .tiptap-wrapper`).remove();
            jQuery(`.commentBox-${formHash}`).hide();

            // Create textarea with tiptapSimple class
            var initialContent = editComment ? jQuery(`#comment-text-to-hide-${isReply ? 'reply-' : ''}${formHash}-${commentId || id}`).html() : '';
            jQuery(`#comment-${formHash}-${id} .commentReply`).prepend(`<textarea rows="5" cols="75" name="text" id="editor_${formHash}-${id}" class="tiptapSimple">${initialContent}</textarea>`);

            // Initialize Tiptap editor
            if (window.leantime && window.leantime.tiptapController) {
                leantime.tiptapController.initSimpleEditor();
                // Focus the editor after a short delay to allow initialization
                setTimeout(function() {
                    var editorEl = document.querySelector(`#comment-${formHash}-${id} .tiptap-editor`);
                    if (editorEl) {
                        var editor = leantime.tiptapController.registry.get(editorEl);
                        if (editor) {
                            editor.commands.focus('end');
                        }
                    }
                }, 100);
            }

            jQuery(`#comment-${formHash}-${id}`).show();
            jQuery(`#father-${formHash}`).val(id);

        <?php endif; ?>
    }
    function cancel(id, formHash) {
        <?php if($login::userIsAtLeast($roles::$commenter)): ?>
            jQuery(`#comment-to-hide-on-edit-${formHash}-${id}`).show();
            jQuery(`.commentBox-${formHash} textarea`).remove();
            jQuery(`#comment-link-to-hide-on-edit-${formHash}-${id}`).show();
            jQuery(`#comment-image-to-hide-on-edit-${formHash}-${id}`).show();
            jQuery(`#comment-${formHash}-${id}`).hide();
        <?php endif; ?>
    }

    jQuery(".confetti").click(function(){
        confetti({
            spread: 70,
            origin: { y: 1.2 },
        });
    });

    function respondToVisibility(element, callback) {
        var options = {
            root: document.documentElement,
        };

        var observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                callback(entry.intersectionRatio > 0);
            });
        }, options);

        observer.observe(element);
    }

    // Reaction emoji picker - uses keys that map to the Reactions model
    var reactionOptions = [
        { key: 'like', emoji: '👍' },
        { key: 'love', emoji: '❤️' },
        { key: 'celebrate', emoji: '🎉' },
        { key: 'funny', emoji: '😄' },
        { key: 'interesting', emoji: '🤔' },
        { key: 'support', emoji: '💯' }
    ];
    var activeReactionPicker = null;

    function toggleReactionPicker(btn, commentId) {
        // Close any existing picker
        if (activeReactionPicker) {
            activeReactionPicker.remove();
            activeReactionPicker = null;
        }

        // Create picker element
        var picker = document.createElement('div');
        picker.className = 'reaction-emoji-picker show';
        picker.innerHTML = '<div class="reaction-emoji-picker__grid">' +
            reactionOptions.map(function(r) {
                return '<button type="button" class="reaction-emoji-picker__btn" ' +
                    'onclick="addReaction(\'' + r.key + '\', ' + commentId + ')">' +
                    r.emoji + '</button>';
            }).join('') +
        '</div>';

        // Position the picker near the button
        var btnRect = btn.getBoundingClientRect();
        picker.style.position = 'fixed';
        picker.style.left = btnRect.left + 'px';
        picker.style.top = (btnRect.bottom + 5) + 'px';

        document.body.appendChild(picker);
        activeReactionPicker = picker;

        // Close on click outside
        setTimeout(function() {
            document.addEventListener('click', closeReactionPicker);
        }, 0);
    }

    function closeReactionPicker(e) {
        if (activeReactionPicker && !activeReactionPicker.contains(e.target) && !e.target.classList.contains('add-reaction-btn')) {
            activeReactionPicker.remove();
            activeReactionPicker = null;
            document.removeEventListener('click', closeReactionPicker);
        }
    }

    function addReaction(reactionKey, commentId) {
        if (activeReactionPicker) {
            activeReactionPicker.remove();
            activeReactionPicker = null;
        }

        // Make HTMX request to toggle reaction
        htmx.ajax('POST', '<?php echo e(BASE_URL); ?>/hx/comments/reactions/toggle?commentId=' + commentId, {
            values: { reaction: reactionKey },
            target: '#reactions-' + commentId,
            swap: 'outerHTML'
        });
    }
</script>
<?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Comments/Templates/submodules/generalComment.blade.php ENDPATH**/ ?>