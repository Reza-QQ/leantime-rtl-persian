<?php $__env->startSection('content'); ?>

<?php
    $wikis = $wikis ?? [];
    $wikiHeadlines = $wikiHeadlines ?? [];
    $milestones = $milestones ?? [];
    $currentWiki = $currentWiki ?? false;
    $currentArticle = $currentArticle ?? null;

    /**
     * Creates a modern tree view for wiki navigation
     */
    function createModernTreeView($array, $currentParent, $currentArticleId, int $currLevel = 0, ?\Leantime\Core\UI\Template $tplObject = null): void
    {
        $hasChildren = false;

        foreach ($array as $headline) {
            if ((int) $currentParent === (int) $headline->parent) {
                if (! $hasChildren) {
                    echo '<ul class="wiki-tree">';
                    $hasChildren = true;
                }

                $isActive = ($currentArticleId == $headline->id) ? ' active' : '';
                $isDraft = ($headline->status == 'draft');

                echo '<li class="wiki-tree-item">';
                echo '<a href="' . BASE_URL . '/wiki/show/' . $headline->id . '" class="wiki-tree-link' . $isActive . '">';
                echo '<i class="' . $tplObject->escape($headline->data) . '"></i>';
                echo '<span>' . $tplObject->escape($headline->title) . '</span>';
                if ($isDraft) {
                    echo ' <span class="wiki-tree-draft">(' . $tplObject->__('label.draft') . ')</span>';
                }
                echo '</a>';

                createModernTreeView($array, $headline->id, $currentArticleId, $currLevel + 1, $tplObject);

                echo '</li>';
            }
        }

        if ($hasChildren) {
            echo '</ul>';
        }
    }

    // Get author initials for avatar
    $authorInitials = '';
    if ($currentArticle && ! empty($currentArticle->firstname)) {
        $authorInitials .= strtoupper(substr($currentArticle->firstname, 0, 1));
        if (! empty($currentArticle->lastname)) {
            $authorInitials .= strtoupper(substr($currentArticle->lastname, 0, 1));
        }
    }
?>

<div class="pageheader">
    <div class="pageicon"><span class="fa fa-book"></span></div>
    <div class="pagetitle">
        <?php if(count($wikis) > 0): ?>
            <?php if (isset($component)) { $__componentOriginaled82c7bef028765b9b2b447066c3673c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled82c7bef028765b9b2b447066c3673c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.subjectSwitcher','data' => ['parent' => __('headlines.documents'),'current' => $currentWiki !== false ? $currentWiki->title : __('label.select_board')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::subjectSwitcher'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['parent' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('headlines.documents')),'current' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($currentWiki !== false ? $currentWiki->title : __('label.select_board'))]); ?>
                <li><a class="inlineEdit" href="#/wiki/wikiModal/"><?php echo __('link.new_wiki'); ?></a></li>
                <li class='nav-header border'></li>
                <?php $__currentLoopData = $wikis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wiki): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="<?php echo e(BASE_URL . '/wiki/show?setWiki=' . $wiki->id); ?>"><?php echo e($wiki->title); ?></a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaled82c7bef028765b9b2b447066c3673c)): ?>
<?php $attributes = $__attributesOriginaled82c7bef028765b9b2b447066c3673c; ?>
<?php unset($__attributesOriginaled82c7bef028765b9b2b447066c3673c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaled82c7bef028765b9b2b447066c3673c)): ?>
<?php $component = $__componentOriginaled82c7bef028765b9b2b447066c3673c; ?>
<?php unset($__componentOriginaled82c7bef028765b9b2b447066c3673c); ?>
<?php endif; ?>
        <?php else: ?>
            <h1><?php echo __('headlines.documents'); ?></h1>
        <?php endif; ?>
    </div>
    
    <?php if(count($wikis) > 0): ?>
        <div class="pageheader-right">
            <span class="dropdown dropdownWrapper headerEditDropdown">
                <a href="javascript:void(0)" class="dropdown-toggle btn btn-transparent" data-toggle="dropdown"><i class="fa-solid fa-ellipsis-v"></i></a>
                <ul class="dropdown-menu editCanvasDropdown">
                    <?php if($login::userIsAtLeast($roles::$editor) && $currentWiki): ?>
                        <li><a class="inlineEdit" href="#/wiki/wikiModal/<?php echo e($currentWiki->id); ?>"><?php echo __('link.edit_wiki'); ?></a></li>
                        <li><a class="delete" href="#/wiki/delWiki/<?php echo e($currentWiki->id); ?>"><i class="fa fa-trash"></i> <?php echo __('links.delete_wiki'); ?></a></li>
                    <?php endif; ?>
                </ul>
            </span>
        </div>
    <?php endif; ?>
</div>

<div class="maincontent">
    <?php echo $tpl->displayNotification(); ?>


    <?php if((! $currentArticle || $currentArticle->id != null) && (! $wikis || count($wikis) == 0)): ?>
        <!-- No wikis exist - show empty state -->
        <div class="wiki-empty-state">
            <div class="wiki-empty-state-icon svgContainer">
                <?php echo file_get_contents(ROOT . '/dist/images/svg/undraw_book_reading_re_fu2c.svg'); ?>

            </div>
            <h3 class="wiki-empty-state-title"><?php echo __('headlines.no_articles_yet'); ?></h3>
            <p class="wiki-empty-state-text"><?php echo __('text.create_new_wiki'); ?></p>
            <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => '#/wiki/wikiModal/','class' => 'inlineEdit','contentRole' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => '#/wiki/wikiModal/','class' => 'inlineEdit','contentRole' => 'primary']); ?><?php echo __('links.icon.create_new_board'); ?> <?php echo $__env->renderComponent(); ?>
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

    <?php elseif($wikis && count($wikis) > 0): ?>

        <?php if($currentArticle && $currentArticle->id != null): ?>
            <!-- Single Panel Layout: Contents | Document | Properties (all inside) -->
            <div class="wiki-layout">

                <!-- Main Content Area (contains everything) -->
                <main class="wiki-content">

                    <!-- Three-panel layout inside -->
                    <div class="wiki-content-layout">

                        <!-- Left: Contents Sidebar -->
                        <div class="wiki-contents-panel" id="contentsPanel">
                            <div class="wiki-panel-header">
                                <h4 class="widgettitle title-light"><i class="fa fa-list"></i> فهرست مطالب</h4>
                                <button class="wiki-collapse-btn" id="toggleContents" title="Collapse">
                                    <i class="fa fa-chevron-left"></i>
                                </button>
                            </div>

                            <nav id="article-toc-wrapper">
                                <?php createModernTreeView($wikiHeadlines, 0, $currentArticle->id, 0, $tpl); ?>
                            </nav>

                            <?php if($login::userIsAtLeast($roles::$editor)): ?>
                                <button class="wiki-create-btn"
                                        hx-post="<?php echo e(BASE_URL); ?>/hx/wiki/articleContent/create"
                                        hx-swap="none">
                                    <i class="fa fa-plus"></i>
                                    <span><?php echo __('link.create_article'); ?></span>
                                </button>
                            <?php endif; ?>
                        </div>

                        <!-- Toggle for collapsed Contents -->
                        <button class="wiki-panel-toggle left" id="showContentsBtn" title="Show Contents">
                            <i class="fa fa-chevron-right"></i>
                        </button>

                        <div class="wiki-content-inner">

                        <!-- Toggle for collapsed Details -->
                        <button class="wiki-panel-toggle right" id="showPropertiesBtn" title="Show Details">
                            <i class="fa fa-chevron-left"></i>
                        </button>

                            <!-- Document Header -->
                            <header class="wiki-document-header">
                                <?php if($login::userIsAtLeast($roles::$editor)): ?>
                                    <!-- Editable Title with Icon Picker -->
                                    <div class="form-group" id="wikiTitleWrapper">
                                        <div class="btn-group inlineDropDownContainerLeft">
                                            <button data-selected="graduation-cap" type="button"
                                                    class="icp icp-dd btn btn-default dropdown-toggle iconpicker-container titleIconPicker"
                                                    data-toggle="dropdown">
                                                <span class="iconPlaceholder"><i class="<?php echo e(e($currentArticle->data ?: 'fa fa-file-alt')); ?>"></i></span>
                                                <span class="caret"></span>
                                            </button>
                                            <div class="dropdown-menu"></div>
                                        </div>
                                        <input type="hidden" id="wikiArticleIcon" class="articleIcon" value="<?php echo e(e($currentArticle->data)); ?>" />
                                        <?php if (isset($component)) { $__componentOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b3cbc968d76b231c0fe9fb6c8846579 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.text-input','data' => ['id' => 'wikiTitleEditable','variant' => 'headline','value' => ''.e(e($currentArticle->title)).'','dataOriginal' => ''.e(e($currentArticle->title)).'','placeholder' => ''.e(__('input.placeholders.wiki_title')).'','style' => 'width:80%','autocomplete' => 'off']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'wikiTitleEditable','variant' => 'headline','value' => ''.e(e($currentArticle->title)).'','data-original' => ''.e(e($currentArticle->title)).'','placeholder' => ''.e(__('input.placeholders.wiki_title')).'','style' => 'width:80%','autocomplete' => 'off']); ?>
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

                                    <!-- Editable Tags -->
                                    <div class="wiki-tags-wrapper">
                                        <input type="text"
                                               id="wikiTagsInput"
                                               class="wiki-tags-input"
                                               data-role="tagsinput"
                                               value="<?php echo e(e($currentArticle->tags ?? '')); ?>"
                                               placeholder="افزودن تگ..." />
                                    </div>
                                <?php else: ?>
                                    <h1 class="wiki-document-title">
                                        <i class="article-icon <?php echo e(e($currentArticle->data)); ?>"></i>
                                        <?php echo e($currentArticle->title); ?>

                                    </h1>

                                    <?php $tagsArray = array_filter(explode(',', $currentArticle->tags ?? '')); ?>
                                    <?php if(count($tagsArray) > 0): ?>
                                        <div class="wiki-document-tags">
                                            <?php $__currentLoopData = $tagsArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $tag = trim($tag); ?>
                                                <?php if(! empty($tag)): ?>
                                                    <span class="wiki-document-tag"><?php echo e($tag); ?></span>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </header>

                        <!-- Document Body - Click to Edit -->
                        <div class="wiki-document-wrapper" id="wikiDocumentWrapper" data-article-id="<?php echo e($currentArticle->id); ?>">
                            <?php if($login::userIsAtLeast($roles::$editor)): ?>
                                <!-- Hidden textarea for Tiptap -->
                                <textarea id="wikiArticleContent" class="wiki-editor-textarea" style="display:none;"><?php echo $tpl->escapeMinimal($currentArticle->description); ?></textarea>
                                <!-- Tiptap editor will be initialized here -->
                                <div id="wikiTiptapEditor" class="wiki-document"></div>
                                <!-- Edit mode indicator -->
                                <div class="wiki-edit-indicator" id="wikiEditIndicator" style="display: none;">
                                    <i class="fa fa-circle"></i>
                                    <span>در حال ویرایش</span>
                                </div>
                            <?php else: ?>
                                <!-- Read-only view for non-editors -->
                                <article class="wiki-document" id="wikiDocumentContent">
                                    <?php echo $tpl->escapeMinimal($currentArticle->description); ?>

                                </article>
                            <?php endif; ?>
                        </div>

                        <?php if(! empty($currentArticle->milestoneHeadline)): ?>
                            <div class="wiki-milestone-card">
                                <div hx-trigger="load"
                                     hx-indicator=".htmx-indicator"
                                     hx-get="<?php echo e(BASE_URL); ?>/hx/tickets/milestones/showCard?milestoneId=<?php echo e($currentArticle->milestoneId); ?>">
                                    <div class="htmx-indicator">
                                        <?php echo __('label.loading_milestone'); ?>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Comments Section -->
                        <section class="wiki-comments-section" id="comments">
                            <h4 class="widgettitle title-light"><span class="fa-solid fa-comments"></span> <?php echo __('subtitles.discussion'); ?></h4>

                            <form method="post" action="<?php echo e(BASE_URL); ?>/wiki/show/<?php echo e($currentArticle->id); ?>#comment">
                                <input type="hidden" name="comment" value="1" />
                                <?php echo $__env->make('comments::submodules.generalComment', ['formUrl' => BASE_URL . '/wiki/show/' . $currentArticle->id], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                            </form>
                        </section>

                        </div><!-- /.wiki-content-inner -->

                        <!-- Properties Panel (inside content area) -->
                        <div class="wiki-properties-panel" id="propertiesPanel">
                            <div class="wiki-panel-header">
                                <h4 class="widgettitle title-light"><i class="fa fa-info-circle"></i> جزئیات</h4>
                                <button class="wiki-collapse-btn" id="collapseProperties" title="Collapse">
                                    <i class="fa fa-chevron-right"></i>
                                </button>
                            </div>

                    <!-- Properties Section -->
                    <div class="wiki-properties-section">

                        <!-- Status Dropdown -->
                        <div class="form-group">
                            <label class="control-label"><?php echo __('label.status'); ?></label>
                            <div class="">
                                <?php if($login::userIsAtLeast($roles::$editor)): ?>
                                    <select id="wikiStatusSelect" class="span11">
                                        <option value="draft" <?php if($currentArticle->status === 'draft'): echo 'selected'; endif; ?>>پیش‌نویس</option>
                                        <option value="published" <?php if($currentArticle->status !== 'draft'): echo 'selected'; endif; ?>>منتشرشده</option>
                                    </select>
                                <?php else: ?>
                                    <?php echo e(ucfirst($currentArticle->status)); ?>

                                <?php endif; ?>
                            </div>
                        </div>

                        <?php
                            // Find parent article name
                            $parentName = 'هیچ‌کدام';
                            if ($currentArticle->parent && $currentArticle->parent > 0) {
                                foreach ($wikiHeadlines as $headline) {
                                    if ($headline->id == $currentArticle->parent) {
                                        $parentName = e($headline->title);
                                        break;
                                    }
                                }
                            }
                        ?>

                        <!-- Parent -->
                        <div class="form-group">
                            <label class="control-label">والد</label>
                            <div class="">
                                <?php if($login::userIsAtLeast($roles::$editor)): ?>
                                    <?php
                                        $parentOptions = array_filter($wikiHeadlines, function ($h) use ($currentArticle) {
                                            return $h->id != $currentArticle->id;
                                        });
                                    ?>
                                    <select id="wikiParentSelect" class="span11">
                                        <option value="0" <?php if(! $currentArticle->parent || $currentArticle->parent == 0): echo 'selected'; endif; ?>>هیچ‌کدام</option>
                                        <?php $__currentLoopData = $parentOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $headline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($headline->id); ?>" <?php if($currentArticle->parent == $headline->id): echo 'selected'; endif; ?>><?php echo e($headline->title); ?><?php if($headline->status === 'draft'): ?> (<?php echo __('label.draft'); ?>)<?php endif; ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                <?php else: ?>
                                    <?php if($currentArticle->parent && $currentArticle->parent > 0): ?>
                                        <a href="<?php echo e(BASE_URL); ?>/wiki/show/<?php echo e($currentArticle->parent); ?>">
                                            <?php echo e($parentName); ?>

                                        </a>
                                    <?php else: ?>
                                        <span><?php echo e($parentName); ?></span>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Milestone -->
                        <div class="form-group">
                            <label class="control-label"><?php echo __('label.milestone'); ?></label>
                            <div class="">
                                <?php if($login::userIsAtLeast($roles::$editor)): ?>
                                    <select id="wikiMilestoneSelect" class="span11">
                                        <option value=""><?php echo __('label.not_assigned_to_milestone'); ?></option>
                                        <?php $__currentLoopData = $milestones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $milestone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($milestone->id); ?>" <?php if($currentArticle->milestoneId == $milestone->id): echo 'selected'; endif; ?>><?php echo e($milestone->headline); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                <?php else: ?>
                                    <?php if(! empty($currentArticle->milestoneHeadline)): ?>
                                        <a href="<?php echo e(BASE_URL); ?>/tickets/roadmap#/tickets/editMilestone/<?php echo e($currentArticle->milestoneId); ?>">
                                            <?php echo e($currentArticle->milestoneHeadline); ?>

                                        </a>
                                    <?php else: ?>
                                        <span><?php echo __('label.not_assigned_to_milestone'); ?></span>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Author -->
                        <div class="form-group">
                            <label class="control-label"><?php echo __('label.author'); ?></label>
                            <div class="">
                                <div class="wiki-author">
                                    <span class="wiki-author-avatar"><?php echo e($authorInitials); ?></span>
                                    <?php echo e($currentArticle->firstname); ?> <?php echo e($currentArticle->lastname); ?>

                                </div>
                            </div>
                        </div>

                        <!-- Last Saved -->
                        <div class="form-group">
                            <label class="control-label"><?php echo __('label.last_updated'); ?></label>
                            <div class="" id="wikiLastSaved" data-timestamp="<?php echo e($currentArticle->modified); ?>">
                                <?php echo e(format($currentArticle->modified)->diffForHumans()); ?>

                            </div>
                        </div>
                    </div>

                    <!-- Activity Section -->
                    <div class="wiki-properties-section wiki-activity-section">
                        <h4 class="widgettitle title-light"><i class="fa fa-clock-rotate-left"></i> فعالیت</h4>

                        <div id="wikiActivityContainer"
                             hx-get="<?php echo e(BASE_URL); ?>/hx/wiki/articleActivity?articleId=<?php echo e($currentArticle->id); ?>"
                             hx-trigger="load, refreshActivity from:body"
                             hx-swap="innerHTML">
                            <div class="wiki-activity-loading">
                                <i class="fa fa-circle-notch fa-spin"></i> در حال بارگذاری فعالیت...
                            </div>
                        </div>
                    </div>

                    <!-- Delete (pinned to bottom) -->
                    <?php if($login::userIsAtLeast($roles::$editor)): ?>
                    <div class="wiki-properties-footer">
                        <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['tag' => 'a','link' => '#/wiki/delArticle/'.e($currentArticle->id).'','class' => 'wiki-action-btn delete','state' => 'danger','variant' => 'outline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','link' => '#/wiki/delArticle/'.e($currentArticle->id).'','class' => 'wiki-action-btn delete','state' => 'danger','variant' => 'outline']); ?>
                            <i class="fa fa-trash"></i> حذف مقاله
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

                        </div><!-- /.wiki-properties-panel -->
                    </div><!-- /.wiki-content-layout -->
                </main>

            </div>

        <?php else: ?>
            <!-- Wiki exists but no articles yet -->
            <div class="wiki-empty-state">
                <div class="wiki-empty-state-icon svgContainer" style="width: 200px; margin: 0 auto;">
                    <?php echo file_get_contents(ROOT . '/dist/images/svg/undraw_book_reading_re_fu2c.svg'); ?>

                </div>
                <h3 class="wiki-empty-state-title"><?php echo __('headlines.no_articles_yet'); ?></h3>
                <p class="wiki-empty-state-text"><?php echo __('text.create_new_content'); ?></p>
                <?php if (isset($component)) { $__componentOriginala493228b66e4027022b3745cf8ae8521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala493228b66e4027022b3745cf8ae8521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global::components.forms.button','data' => ['contentRole' => 'primary','hxPost' => ''.e(BASE_URL).'/hx/wiki/articleContent/create','hxSwap' => 'none']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global::forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['contentRole' => 'primary','hx-post' => ''.e(BASE_URL).'/hx/wiki/articleContent/create','hx-swap' => 'none']); ?>
                    <i class="fa fa-plus"></i> <?php echo __('link.create_article'); ?>

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

    <?php endif; ?>

</div>

<?php if (! $__env->hasRenderedOnce('1f997bea-291d-4076-a118-54163daa6c8c')): $__env->markAsRenderedOnce('1f997bea-291d-4076-a118-54163daa6c8c'); ?> <?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
jQuery(document).ready(function() {

    jQuery('#toggleContents').on('click', function() {
        var panel = jQuery('#contentsPanel');
        var showBtn = jQuery('#showContentsBtn');
        panel.addClass('collapsed');
        showBtn.addClass('visible');
        localStorage.setItem('wikiContentsCollapsed', 'true');
    });

    jQuery('#showContentsBtn').on('click', function() {
        var panel = jQuery('#contentsPanel');
        var showBtn = jQuery('#showContentsBtn');
        panel.removeClass('collapsed');
        showBtn.removeClass('visible');
        localStorage.setItem('wikiContentsCollapsed', 'false');
    });

    jQuery('#collapseProperties').on('click', function() {
        var panel = jQuery('#propertiesPanel');
        var showBtn = jQuery('#showPropertiesBtn');
        panel.addClass('collapsed');
        showBtn.addClass('visible');
        localStorage.setItem('wikiPropertiesCollapsed', 'true');
    });

    jQuery('#showPropertiesBtn').on('click', function() {
        var panel = jQuery('#propertiesPanel');
        var showBtn = jQuery('#showPropertiesBtn');
        panel.removeClass('collapsed');
        showBtn.removeClass('visible');
        localStorage.setItem('wikiPropertiesCollapsed', 'false');
    });

    var isSmallScreen = window.innerWidth <= 1280;

    if (isSmallScreen || localStorage.getItem('wikiContentsCollapsed') === 'true') {
        jQuery('#contentsPanel').addClass('collapsed');
        jQuery('#showContentsBtn').addClass('visible');
    }

    if (isSmallScreen || localStorage.getItem('wikiPropertiesCollapsed') === 'true') {
        jQuery('#propertiesPanel').addClass('collapsed');
        jQuery('#showPropertiesBtn').addClass('visible');
    }

    var resizeTimeout;
    jQuery(window).on('resize', function() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(function() {
            var nowSmall = window.innerWidth <= 1280;
            if (nowSmall) {
                jQuery('#contentsPanel').addClass('collapsed');
                jQuery('#showContentsBtn').addClass('visible');
                jQuery('#propertiesPanel').addClass('collapsed');
                jQuery('#showPropertiesBtn').addClass('visible');
            }
        }, 150);
    });

    <?php if($currentArticle && $login::userIsAtLeast($roles::$editor)): ?>
    (function() {
        var articleId = <?php echo json_encode($currentArticle->id, 15, 512) ?>;
        var wrapper = document.getElementById('wikiDocumentWrapper');
        var editorEl = document.getElementById('wikiTiptapEditor');
        var textarea = document.getElementById('wikiArticleContent');
        var indicator = document.getElementById('wikiEditIndicator');

        if (!editorEl || !textarea || !window.leantime || !window.leantime.tiptapController) {
            console.warn('[Wiki] Tiptap controller not available');
            return;
        }

        var isEditing = false;
        var saveTimeout = null;
        var lastSavedContent = textarea.value;
        var toolbarClicking = false;

        wrapper.addEventListener('mousedown', function(e) {
            if (isEditing && !editorEl.contains(e.target)) {
                toolbarClicking = true;
            }
        });

        var tiptapInstance = leantime.tiptapController.initComplex(textarea, {
            placeholder: 'Click anywhere to start editing...',
            toolbar: false,
            autosave: false,
            onCreate: function(params) {
                params.editor.setEditable(false);
            },
            onUpdate: function(params) {
                if (isEditing) {
                    clearTimeout(saveTimeout);
                    showIndicator('saving');
                    saveTimeout = setTimeout(function() {
                        saveContent(params.editor.getHTML());
                    }, 1500);
                }
            },
            onBlur: function(params) {
                if (toolbarClicking) {
                    toolbarClicking = false;
                    return;
                }

                setTimeout(function() {
                    if (!isEditing) return;

                    var active = document.activeElement;

                    if (wrapper.contains(active)) return;

                    var openPopover = document.querySelector(
                        '.tiptap-color-popover, .tiptap-font-popover, .tiptap-heading-popover, .tiptap-image-popover'
                    );
                    if (openPopover) return;

                    exitEditMode();
                }, 300);
            }
        });

        if (!tiptapInstance) {
            console.error('[Wiki] Failed to initialize Tiptap');
            return;
        }

        var editor = tiptapInstance.editor;

        function showToolbar() {
            if (window.leantime.tiptapToolbar) {
                var toolbar = window.leantime.tiptapToolbar.create(editor, 'complex');
                var tiptapEditorEl = wrapper.querySelector('.tiptap-editor');
                window.leantime.tiptapToolbar.attach({ element: tiptapEditorEl || editorEl }, toolbar);
            }
        }

        function hideToolbar() {
            var toolbarEl = wrapper.querySelector('.tiptap-toolbar');
            if (toolbarEl) {
                toolbarEl.remove();
            }
        }

        function enterEditMode() {
            if (isEditing) return;
            isEditing = true;
            editor.setEditable(true);
            wrapper.classList.add('editing');
            showToolbar();
            showIndicator('editing');
            editor.commands.focus('end');
        }

        function exitEditMode() {
            if (!isEditing) return;

            var currentContent = editor.getHTML();
            if (currentContent !== lastSavedContent) {
                saveContent(currentContent);
            }

            isEditing = false;
            editor.setEditable(false);
            wrapper.classList.remove('editing');
            hideToolbar();
            hideIndicator();
        }

        function saveContent(content) {
            showIndicator('saving');

            fetch(leantime.appUrl + '/hx/wiki/articleContent/save?articleId=' + articleId, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'include',
                body: 'description=' + encodeURIComponent(content)
            })
            .then(function(response) { return response.json(); })
            .then(function(data) {
                if (data.success) {
                    lastSavedContent = content;
                    showIndicator('saved');
                    updateLastSaved();
                    setTimeout(function() {
                        if (!isEditing) hideIndicator();
                    }, 2000);
                } else {
                    showIndicator('error');
                }
            })
            .catch(function(err) {
                console.error('[Wiki] Save failed:', err);
                showIndicator('error');
            });
        }

        function showIndicator(state) {
            if (!indicator) return;
            indicator.style.display = 'flex';
            indicator.className = 'wiki-edit-indicator ' + state;
            var icon = indicator.querySelector('i');
            var text = indicator.querySelector('span');
            switch (state) {
                case 'editing': icon.className = 'fa fa-edit'; text.textContent = 'Editing'; break;
                case 'saving': icon.className = 'fa fa-circle-notch fa-spin'; text.textContent = 'Saving...'; break;
                case 'saved': icon.className = 'fa fa-check'; text.textContent = 'Saved'; break;
                case 'error': icon.className = 'fa fa-exclamation-triangle'; text.textContent = 'Save failed'; break;
            }
        }

        function hideIndicator() {
            if (indicator) indicator.style.display = 'none';
        }

        wrapper.addEventListener('click', function(e) {
            if (e.target.tagName === 'A' || e.target.closest('a')) return;
            enterEditMode();
        });

        document.addEventListener('keydown', function(e) {
            if ((e.metaKey || e.ctrlKey) && e.key === 'e') {
                e.preventDefault();
                if (isEditing) exitEditMode(); else enterEditMode();
            }
            if (e.key === 'Escape' && isEditing) {
                e.preventDefault();
                exitEditMode();
            }
            if ((e.metaKey || e.ctrlKey) && e.key === 's' && isEditing) {
                e.preventDefault();
                saveContent(editor.getHTML());
            }
        });

        window.addEventListener('beforeunload', function(e) {
            if (isEditing) {
                var currentContent = editor.getHTML();
                if (currentContent !== lastSavedContent) {
                    navigator.sendBeacon(
                        leantime.appUrl + '/hx/wiki/articleContent/save?articleId=' + articleId,
                        new URLSearchParams({ description: currentContent })
                    );
                }
            }
        });

    })();

    var titleEditable = document.getElementById('wikiTitleEditable');
    if (titleEditable) {
        var originalTitle = titleEditable.dataset.original;

        titleEditable.addEventListener('blur', function() {
            var newTitle = titleEditable.value.trim();
            if (newTitle && newTitle !== originalTitle) {
                saveField('title', newTitle, function() {
                    originalTitle = newTitle;
                    titleEditable.dataset.original = newTitle;
                    var treeLink = document.querySelector('.wiki-tree-link.active span');
                    if (treeLink) treeLink.textContent = newTitle;
                    updateLastSaved();
                });
            }
        });

        titleEditable.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') { e.preventDefault(); titleEditable.blur(); }
            if (e.key === 'Escape') { titleEditable.value = originalTitle; titleEditable.blur(); }
        });
    }

    var iconInput = document.getElementById('wikiArticleIcon');
    if (iconInput && jQuery.fn.iconpicker) {
        jQuery('.titleIconPicker').iconpicker({
            component: '.btn > .iconPlaceholder',
            input: '.articleIcon',
            inputSearch: true,
            defaultValue: 'far fa-file-alt',
            selected: iconInput.value || 'far fa-file-alt',
            showFooter: false,
            searchInFooter: false,
            icons: [
                {title: "far fa-file-alt", searchTerms:['icons']},
                {title: "fab fa-accessible-icon", searchTerms:['icons']},
                {title: "far fa-address-book", searchTerms:['icons']},
                {title: "fas fa-archive", searchTerms:['icons']},
                {title: "fas fa-asterisk", searchTerms:['icons']},
                {title: "fas fa-balance-scale", searchTerms:['icons']},
                {title: "fas fa-ban", searchTerms:['icons']},
                {title: "fas fa-bell", searchTerms:['icons']},
                {title: "fas fa-binoculars", searchTerms:['icons']},
                {title: "fas fa-birthday-cake", searchTerms:['icons']},
                {title: "fas fa-bolt", searchTerms:['icons']},
                {title: "fas fa-book", searchTerms:['icons']},
                {title: "fas fa-bookmark", searchTerms:['icons']},
                {title: "fas fa-briefcase", searchTerms:['icons']},
                {title: "fas fa-bug", searchTerms:['icons']},
                {title: "far fa-building", searchTerms:['icons']},
                {title: "fas fa-bullhorn", searchTerms:['icons']},
                {title: "far fa-calendar-alt", searchTerms:['icons']},
                {title: "fas fa-chart-bar", searchTerms:['icons']},
                {title: "fas fa-check-circle", searchTerms:['icons']},
                {title: "fas fa-chart-line", searchTerms:['icons']},
                {title: "fas fa-chess", searchTerms:['icons']},
                {title: "fas fa-cogs", searchTerms:['icons']},
                {title: "fas fa-comments", searchTerms:['icons']},
                {title: "fas fa-compass", searchTerms:['icons']},
                {title: "fas fa-database", searchTerms:['icons']},
                {title: "fas fa-envelope", searchTerms:['icons']},
                {title: "fas fa-exclamation-triangle", searchTerms:['icons']},
                {title: "fas fa-flask", searchTerms:['icons']},
                {title: "fas fa-globe", searchTerms:['icons']},
                {title: "fas fa-gem", searchTerms:['icons']},
                {title: "fas fa-graduation-cap", searchTerms:['icons']},
                {title: "fas fa-hand-spock", searchTerms:['icons']},
                {title: "fas fa-heart", searchTerms:['icons']},
                {title: "fas fa-home", searchTerms:['icons']},
                {title: "fas fa-image", searchTerms:['icons']},
                {title: "fas fa-info-circle", searchTerms:['icons']},
                {title: "fas fa-key", searchTerms:['icons']},
                {title: "fas fa-leaf", searchTerms:['icons']},
                {title: "fas fa-life-ring", searchTerms:['icons']},
                {title: "fas fa-lightbulb", searchTerms:['icons']},
                {title: "fas fa-link", searchTerms:['icons']},
                {title: "fas fa-location-arrow", searchTerms:['icons']},
                {title: "fas fa-lock", searchTerms:['icons']},
                {title: "fas fa-map", searchTerms:['icons']},
                {title: "fas fa-map-signs", searchTerms:['icons']},
                {title: "fas fa-money-bill-alt", searchTerms:['icons']},
                {title: "fas fa-paper-plane", searchTerms:['icons']},
                {title: "fas fa-paperclip", searchTerms:['icons']},
                {title: "fas fa-question-circle", searchTerms:['icons']},
                {title: "fas fa-quote-left", searchTerms:['icons']},
                {title: "fas fa-road", searchTerms:['icons']},
                {title: "fas fa-rocket", searchTerms:['icons']},
                {title: "fas fa-shopping-cart", searchTerms:['icons']},
                {title: "fas fa-sitemap", searchTerms:['icons']},
                {title: "fas fa-sliders-h", searchTerms:['icons']},
                {title: "fas fa-star", searchTerms:['icons']},
                {title: "fas fa-tachometer-alt", searchTerms:['icons']},
                {title: "fas fa-thermometer-half", searchTerms:['icons']},
                {title: "fas fa-thumbs-down", searchTerms:['icons']},
                {title: "fas fa-thumbs-up", searchTerms:['icons']},
                {title: "fas fa-trash-alt", searchTerms:['icons']},
                {title: "fas fa-trophy", searchTerms:['icons']},
                {title: "fas fa-user-circle", searchTerms:['icons']},
                {title: "fas fa-utensils", searchTerms:['icons']}
            ]
        });

        jQuery('.titleIconPicker').on('iconpickerSelected', function(event) {
            var newIcon = event.iconpickerValue;
            jQuery('.articleIcon').val(newIcon);
            jQuery('.titleIconPicker .iconPlaceholder > i').attr('class', newIcon);
            saveField('icon', newIcon, function() {
                var treeLink = document.querySelector('.wiki-tree-link.active i');
                if (treeLink) treeLink.className = newIcon;
                updateLastSaved();
            });
        });
    }

    var tagsInput = document.getElementById('wikiTagsInput');
    if (tagsInput && jQuery.fn.tagsInput) {
        jQuery('#wikiTagsInput').tagsInput({
            width: '100%',
            height: 'auto',
            defaultText: 'Add tag...',
            placeholderColor: 'var(--secondary-font-color)',
            onChange: function(elem, elem_tags) {
                // The tagsInput plugin passes only the single tag that changed as elem_tags, and
                // fires once with `undefined` during its initial import. Saving elem_tags directly
                // overwrote the column with just the last tag (and the literal "undefined" on load).
                // Ignore the init call and persist the full delimited value instead.
                if (typeof elem_tags === 'undefined') {
                    return;
                }
                saveField('tags', jQuery('#wikiTagsInput').val(), function() { updateLastSaved(); });
            }
        });
    }

    var statusSelect = document.getElementById('wikiStatusSelect');
    if (statusSelect) {
        statusSelect.addEventListener('change', function() {
            var newStatus = statusSelect.value;
            saveField('status', newStatus, function() {
                var activeLink = document.querySelector('.wiki-tree-link.active');
                if (activeLink) {
                    var draftLabel = activeLink.querySelector('.wiki-tree-draft');
                    if (newStatus === 'draft') {
                        if (!draftLabel) {
                            draftLabel = document.createElement('span');
                            draftLabel.className = 'wiki-tree-draft';
                            activeLink.appendChild(draftLabel);
                        }
                        draftLabel.textContent = '(<?php echo e(__('label.draft')); ?>)';
                    } else if (draftLabel) {
                        draftLabel.remove();
                    }
                }
                updateLastSaved();
            });
        });
    }

    var milestoneSelect = document.getElementById('wikiMilestoneSelect');
    if (milestoneSelect) {
        milestoneSelect.addEventListener('change', function() {
            saveField('milestoneId', milestoneSelect.value, function() { window.location.reload(); });
        });
    }

    var parentSelect = document.getElementById('wikiParentSelect');
    if (parentSelect) {
        parentSelect.addEventListener('change', function() {
            saveField('parent', parentSelect.value, function() { window.location.reload(); });
        });
    }

    function updateLastSaved() {
        var lastSavedEl = document.getElementById('wikiLastSaved');
        if (lastSavedEl) {
            lastSavedEl.textContent = 'Just now';
            lastSavedEl.dataset.timestamp = new Date().toISOString();
        }
        htmx.trigger(document.body, 'refreshActivity');
    }

    function saveField(field, value, onSuccess) {
        var articleId = <?php echo json_encode($currentArticle->id, 15, 512) ?>;

        fetch(leantime.appUrl + '/hx/wiki/articleContent/save?articleId=' + articleId, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'X-Requested-With': 'XMLHttpRequest'
            },
            credentials: 'include',
            body: field + '=' + encodeURIComponent(value)
        })
        .then(function(response) { return response.json(); })
        .then(function(data) {
            if (data.success) {
                if (onSuccess) onSuccess(data);
            } else {
                console.error('[Wiki] Failed to save ' + field);
            }
        })
        .catch(function(err) {
            console.error('[Wiki] Save failed:', err);
        });
    }
    <?php endif; ?>

    <?php if($login::userHasRole([$roles::$commenter])): ?>
    leantime.commentsController.enableCommenterForms();
    <?php endif; ?>

});
</script>
<?php $__env->stopPush(); ?> <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\dentvira\public\leantime/app/Domain/Wiki/Templates/show.blade.php ENDPATH**/ ?>