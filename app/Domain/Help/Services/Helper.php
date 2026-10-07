<?php

namespace Leantime\Domain\Help\Services;

use Leantime\Core\Events\DispatchesEvents;
use Leantime\Domain\Setting\Repositories\Setting;

class Helper
{
    use DispatchesEvents;

    private $availableModals = [
        'dashboard.show' => [
            'id' => 'dashboard.show',
            'template' => 'projectDashboard',
            'tour' => 'dashboard',
            'autoLoad' => true,
        ],
        'dashboard.home' => [
            'id' => 'dashboard.home',
            'template' => 'home',
            'tour' => 'myWorkDashboard',
            'autoLoad' => true,
        ],
        'tickets.showKanban' => [
            'id' => 'tickets.showKanban',
            'template' => 'kanban',
            'tour' => '',
            'autoLoad' => true,
        ],
        'tickets.roadmap' => [
            'id' => 'tickets.roadmap',
            'template' => 'roadmap',
            'tour' => '',
            'autoLoad' => true,
        ],
        'goalcanvas.dashboard' => [
            'id' => 'goalcanvas.dashboard',
            'template' => 'goals',
            'tour' => '',
            'autoLoad' => true,
        ],
        'leancanvas.showCanvas' => [
            'id' => 'leancanvas.showCanvas',
            'template' => 'fullLeanCanvas',
            'tour' => '',
            'autoLoad' => false,
        ],
        'leancanvas.simpleCanvas' => [
            'id' => 'leancanvas.simpleCanvas',
            'template' => 'simpleLeanCanvas',
            'tour' => '',
            'autoLoad' => false,
        ],
        'ideas.showBoards' => [
            'id' => 'ideas.showBoards',
            'template' => 'ideaBoard',
            'tour' => '',
            'autoLoad' => false,
        ],
        'ideas.advancedBoards' => [
            'id' => 'ideas.advancedBoards',
            'template' => 'advancedBoards',
            'tour' => '',
            'autoLoad' => false,
        ],
        'retroscanvas.showBoards' => [
            'id' => 'retroscanvas.showBoards',
            'template' => 'retroscanvas',
            'tour' => '',
            'autoLoad' => false,
        ],
        'timesheets.showMy' => [
            'id' => 'timesheets.showMy',
            'template' => 'mytimesheets',
            'tour' => '',
            'autoLoad' => false,
        ],
        'projects.newProject' => [
            'id' => 'projects.newProject',
            'template' => 'newProject',
            'tour' => '',
            'autoLoad' => false,
        ],
        'projects.showAll' => [
            'id' => 'projects.showAll',
            'template' => 'showProjects',
            'tour' => '',
            'autoLoad' => false,
        ],
        'clients.showAll' => [
            'id' => 'clients.showAll',
            'template' => 'showClients',
            'tour' => '',
            'autoLoad' => false,
        ],
        'blueprints.showBoards' => [
            'id' => 'blueprints.showBoards',
            'template' => 'blueprints',
            'tour' => '',
            'autoLoad' => false,
        ],
        'wiki.show' => [
            'id' => 'wiki.show',
            'template' => 'wiki',
            'tour' => '',
            'autoLoad' => false,
        ],

    ];

    /**
     * Constructor for the class.
     * Initializes the availableModals property by dispatching the "addHelperModal" event.
     *
     * @return void
     */
    public function __construct(private Setting $settingsRepo)
    {

        $this->availableModals = self::dispatch_filter('addHelperModal', $this->availableModals);
    }

    /**
     * Returns an array of all available helper modals.
     *
     * @return array The array of available helper modals.
     */
    public function getAllHelperModals(): array
    {
        return $this->availableModals;
    }

    /**
     * Retrieves the corresponding helper modal for a given route.
     *
     * @param  string  $route  The route for which to retrieve the helper modal.
     * @return array The helper modal associated with the given route. If not found, a 'notfound' template array is returned.
     */
    public function getHelperModalByRoute(string $route): array
    {
        return $this->availableModals[$route] ?? ['template' => 'notfound'];
    }

    /**
     * Retrieves the first login steps.
     *
     * This method returns an array of steps that a user needs to follow during the first login.
     *
     * Each step consists of a template and a button label.
     *
     * @return array The first login steps.
     */
    public function getFirstLoginSteps(): array
    {
        $steps = [
            0 => ['class' => "Leantime\Domain\Help\Services\FirstTaskStep", 'next' => 'end'],
        ];

        // make array of onboarding steps.
        $steps = self::dispatch_filter('filterSteps', $steps);

        return $steps;
    }

    /**
     * Resolves which first-login onboarding step should be displayed.
     *
     * Given an optional requested step key (from the request), this returns
     * the resolved step including its template and whether the onboarding flow
     * has reached the final "end" step. When no valid step key is provided the
     * first available step is used.
     *
     * @param  string|null  $requestedStep  The requested step key (e.g. a numeric index or "end").
     * @return array{key: int|string, next: string|int|null, template: string|null, isEnd: bool} The resolved step information.
     *
     * @api
     */
    public function resolveFirstLoginStep(?string $requestedStep): array
    {
        if ($requestedStep === 'end') {
            return [
                'key' => 'end',
                'next' => null,
                'template' => 'help.firstLoginEnd',
                'isEnd' => true,
            ];
        }

        $allSteps = $this->getFirstLoginSteps();

        $currentStepKey = collect($allSteps)->keys()->first();

        if ($requestedStep !== null && isset($allSteps[$requestedStep])) {
            $currentStepKey = (int) $requestedStep;
        }

        $currentStep = $allSteps[$currentStepKey];

        /** @var \Leantime\Domain\Help\Contracts\OnboardingSteps $stepObject */
        $stepObject = app()->make($currentStep['class']);

        return [
            'key' => $currentStepKey,
            'next' => $currentStep['next'],
            'template' => $stepObject->getTemplate(),
            'isEnd' => false,
        ];
    }

    /**
     * Handles the submission of a first-login onboarding step.
     *
     * Resolves the current step from the submitted parameters, delegates handling
     * to the step's class, and returns whether the step was valid along with the
     * key of the step the user should be redirected to next.
     *
     * @param  array  $params  The submitted request parameters. Must contain a numeric "currentStep".
     * @return array{valid: bool, next: string|int} Result of the step handling: "valid" indicates whether the
     *                                              submitted step was recognized, "next" is the step key to navigate to.
     *
     * @api
     */
    public function handleFirstLoginStep(array $params): array
    {
        $allSteps = $this->getFirstLoginSteps();

        if (
            ! isset($params['currentStep'])
            || ! is_numeric($params['currentStep'])
            || ! isset($allSteps[$params['currentStep']])
        ) {
            return ['valid' => false, 'next' => ''];
        }

        $currentStep = $allSteps[$params['currentStep']];

        /** @var \Leantime\Domain\Help\Contracts\OnboardingSteps $stepObject */
        $stepObject = app()->make($currentStep['class']);

        $result = $stepObject->handle($params);

        if ($result) {
            return ['valid' => true, 'next' => $currentStep['next']];
        }

        return ['valid' => true, 'next' => $params['currentStep']];
    }

    /**
     * Marks an onboarding modal as seen for a given module and returns its template name.
     *
     * Ensures the per-session modal tracking store exists, sanitizes the module
     * identifier, records that the modal has been shown once for this session, and
     * returns the (sanitized) template name to render.
     *
     * @param  string  $module  The module identifier whose modal should be marked as seen.
     * @return string The sanitized template name to render (without the "help." prefix).
     *
     * @api
     */
    public function markModalSeenForModule(string $module): string
    {
        $this->ensureModalSessionStore();

        $template = htmlspecialchars($module);

        if (! session()->exists('usersettings.modals.'.$template)) {
            session(['usersettings.modals.'.$template => 1]);
        }

        return $template;
    }

    /**
     * Marks an onboarding modal as seen for a given route and returns its template name.
     *
     * Sanitizes the route, resolves the matching helper modal, ensures the per-session
     * modal tracking store exists, records that the modal has been shown once for this
     * session, and returns the template name to render.
     *
     * @param  string  $route  The route identifier whose helper modal should be marked as seen.
     * @return string The template name to render (without the "help." prefix).
     *
     * @api
     */
    public function markModalSeenForRoute(string $route): string
    {
        $this->ensureModalSessionStore();

        $filteredRoute = htmlspecialchars($route);

        $modal = $this->getHelperModalByRoute($filteredRoute);

        if (! session()->exists('usersettings.modals.'.$modal['template'])) {
            session(['usersettings.modals.'.$modal['template'] => 1]);
        }

        return $modal['template'];
    }

    /**
     * Ensures the per-session modal tracking store exists.
     *
     * Initializes "usersettings.modals" to an empty array when it has not yet
     * been set so that modals are only shown once per session.
     */
    private function ensureModalSessionStore(): void
    {
        if (! session()->exists('usersettings.modals')) {
            session(['usersettings.modals' => []]);
        }
    }

    /**
     * Checks if this is the user's first login.
     *
     * NOTE: This is now a pure check with no side effects.
     * Default project creation has been moved to ensureDefaultProject()
     * which is called from the CurrentProject middleware, not from view composers.
     *
     * @param  int  $userId  The user ID to check
     * @return bool True if this is the first login, false otherwise
     */
    public function isFirstLogin(int $userId): bool
    {
        $onboardingComplete = $this->settingsRepo->getSetting('user.'.$userId.'.firstLoginCompleted');

        return ! isset($onboardingComplete) || $onboardingComplete === false;
    }

    /**
     * Ensures the user has a default project.
     * Creates one if the user has no current project set.
     * Called from middleware (not from view composers) to avoid
     * write operations during template rendering.
     *
     * @param  int  $userId  The user ID to check.
     * @param  string  $role  The user's role for determining task content.
     */
    public function ensureDefaultProject(int $userId, string $role = 'editor'): void
    {
        $currentProject = session('currentProject');
        if ($currentProject === null || $currentProject === 0 || $currentProject === '' || $currentProject === false) {
            $this->createDefaultProject($userId, $role);
        }
    }

    /**
     * Marks the first login as completed for a user
     *
     * @param  int  $userId  The user ID to update
     * @return bool Success status
     */
    public function markFirstLoginComplete(int $userId): bool
    {

        return $this->settingsRepo->saveSetting('user.'.$userId.'.firstLoginCompleted', true);

    }

    public function getOnboardingChecklist(int $userId): array|false
    {

        $checklist = $this->settingsRepo->getSetting('user.'.$userId.'.onboardingChecklist');
        $checklist = json_decode($checklist, true);

        //        if(!$checklist) {
        //            return false;
        //        }

        // Checklist Debug
        $checklist = [
            'step1' => [
                'completed' => true,
                'label' => 'اولین کار خود را ایجاد کنید',
            ],
            'step2' => [
                'completed' => false,
                'label' => 'تور داشبورد کار من را کامل کنید',
            ],
            'step3' => [
                'completed' => false,
                'label' => 'پروژه شخصی خود را مرور کنید',
                'url' => '',
            ],
            'step4' => [
                'completed' => false,
                'label' => 'پروژه خود را مرور کنید',
                'url' => '',
            ],
            'step5' => [
                'completed' => false,
                'label' => 'یک نقطه عطف ایجاد کنید',
                'url' => '',
            ],
            'step6' => [
                'completed' => false,
                'label' => 'یک هدف ایجاد کنید',
                'url' => '',
            ],
            'step7' => [
                'completed' => false,
                'label' => 'روی یک کار نظر بدهید',
                'url' => '',
            ],

        ];

        return $checklist;

    }

    public function createDefaultProject(int $userId, string $role = 'editor')
    {

        // Create Project
        $projectService = app()->make(\Leantime\Domain\Projects\Services\Projects::class);

        $values = [
            'name' => 'پروژه من',
            'details' => 'به اولین پروژه خود در Leantime خوش آمدید!<br />این فضای شما برای سازمان‌دهی وظایف، پیگیری اهداف و برنامه‌ریزی کارتان است. راحت باشید هر چیزی را اینجا تغییر دهید یا با رشد کار، پروژه‌های بیشتری ایجاد کنید. این پروژه فقط برای شروع کار شماست',
            'clientId' => 0,
            'hourBudget' => 0,
            'assignedUsers' => [['id' => $userId, 'projectRole' => '']],
            'dollarBudget' => 0,
            'psettings' => 'restricted',
            'type' => 'project',
            'start' => null,
            'end' => null,
        ];

        $projectId = $projectService->addProject($values);

        // Create Milestone
        $ticketService = app()->make(\Leantime\Domain\Tickets\Services\Tickets::class);
        $values = [
            'headline' => '🚀 شروع کار',
            'projectId' => $projectId,
            'editorId' => $userId,
            'userId' => $userId,
            'date' => dtHelper()->userNow()->formatDateTimeForDb(),
            'editFrom' => dtHelper()->userNow()->formatDateTimeForDb(),
            'editTo' => dtHelper()->userNow()->addDays(14)->formatDateTimeForDb(),
            'tags' => '#124F7D',
        ];
        $milestoneId = $ticketService->quickAddMilestone($values);

        // Create Tasks
        $values = [
            'headline' => '',
            'description' => '',
            'projectId' => $projectId,
            'editorId' => $userId,
            'userId' => $userId,
            'dateToFinish' => dtHelper()->userNow()->addDays(3)->formatDateTimeForDb(),
            'milestone' => $milestoneId,
        ];

        $values['headline'] = '💬 به گفتگوی انجمن ما بپیوندید';
        $values['description'] = 'گفتگوی انجمن ما منبع عالی برای پرسیدن سؤال و دریافت بازخورد درباره راه‌اندازی پروژه است. <a href="https://discord.gg/4zMzJtAq9z" target="_blank">گفتگوی انجمن</a>';
        $values['dateToFinish'] = dtHelper()->userNow()->addDays(1)->formatDateForUser();
        $ticketService->quickAddTicket($values);

        if (in_array($role, ['admin', 'owner', 'manager'])) {

            $values['headline'] = '👥 هم‌تیمی‌های خود را دعوت کنید';
            $values['description'] = 'چه با کسی کار می‌کنید یا فقط به یک همراه برای پاسخگویی نیاز دارید. استفاده گروهی از Leantime به ماندن در مسیر و انگیزه کمک می‌کند <a href="'.BASE_URL.'/users/showAll">مدیریت کاربران</a>';
            $values['dateToFinish'] = dtHelper()->userNow()->addDays(1)->formatDateForUser();
            $ticketService->quickAddTicket($values);
        }

        $values['headline'] = '🎯 درباره ساختار پروژه Leantime بیشتر بدانید';
        $values['description'] = 'ما منابع اضافی زیادی در مستندات راهنمای خود داریم. برای یادگیری بیشتر درباره ساختار پروژه در Leantime و بهترین روش‌ها به اینجا مراجعه کنید: <a href="https://support.leantime.io/en/article/getting-started-in-leantime-an-introduction-to-setting-structure-to-the-work-14t1qip/" target="_blank">https://help.leantime.io</a>';
        $values['dateToFinish'] = dtHelper()->userNow()->addDays(1)->formatDateForUser();
        $ticketService->quickAddTicket($values);

        $values['headline'] = '🎯 یک هدف ایجاد کنید';
        $values['description'] = 'اهداف برای پیگیری و اندازه‌گیری مقاصد بلندمدت استفاده می‌شوند. آن‌ها باید با معیارهایی که می‌توانید به‌طور منظم به‌روزرسانی کنید، قابل اندازه‌گیری باشند. اهداف و نقاط عطف را می‌توان به هم متصل کرد تا پیشرفت اجرا را هنگام مشاهده پیشرفت معیار ببینید <a href="'.BASE_URL.'/goalcanvas/dashboard">اهداف پروژه</a>';
        $values['dateToFinish'] = dtHelper()->userNow()->addDays(1)->formatDateForUser();
        $ticketService->quickAddTicket($values);

        $values['headline'] = '🚩 یک نقطه عطف ایجاد کنید';
        $values['description'] = 'نقاط عطف به شما امکان می‌دهند فازهای پروژه‌های خود را در نتایج مجزا دسته‌بندی کنید. هر نقطه عطف تاریخ شروع و پایان دارد و باید خروجی‌ای ارائه دهد <a href="'.BASE_URL.'/tickets/roadmap/">نقاط عطف پروژه</a>';
        $values['dateToFinish'] = dtHelper()->userNow()->addDays(1)->formatDateForUser();
        $ticketService->quickAddTicket($values);

        $values['headline'] = '🗺️ پروژه شخصی خود را کاوش کنید';
        $values['description'] = 'پروژه شخصی شما فضایی است که می‌توانید وظایف، اهداف و کار خود را سازمان‌دهی کنید. می‌توانید از طریق انتخاب‌کننده پروژه در بالا یا با کلیک روی این پیوند به آن دسترسی داشته باشید: <a href="'.BASE_URL.'/projects/changeCurrentProject/'.$projectId.'/">پروژه من</a>';
        $values['dateToFinish'] = dtHelper()->userNow()->addDays(1)->formatDateForUser();
        $ticketService->quickAddTicket($values);

        $values['headline'] = '🖼️ پروفایل Leantime خود را کامل کنید';
        $values['description'] = 'تصویر پروفایل را به‌روزرسانی کنید و ترجیحات کاری را برای شخصی‌سازی تجربه خود کامل کنید. <a href="'.BASE_URL.'/users/editOwn/">پروفایل من</a>';
        $values['dateToFinish'] = dtHelper()->userNow()->addDays(1)->formatDateForUser();
        $ticketService->quickAddTicket($values);

        $values['headline'] = '📌 اولین کار خود را ایجاد کنید';
        $values['description'] = '';
        $values['dateToFinish'] = dtHelper()->userNow();
        $values['status'] = 0;
        $ticketService->quickAddTicket($values);

        // Create Goal. This is a SYSTEM-orchestrated onboarding write (running in the
        // userSignUpSuccess listener while the user's project membership is still being set
        // up), so it goes through the REPOSITORY directly — bypassing the CREATE-authorized
        // Goalcanvas service methods, which would otherwise 403 the brand-new user. (Same
        // landmine pattern as Wiki's default-notebook / Ideas' default-board bootstrap.)
        $goalRepo = app()->make(\Leantime\Domain\Goalcanvas\Repositories\Goalcanvas::class);
        $values = [
            'title' => 'اهداف من',
            'author' => $userId,
            'projectId' => $projectId,
        ];
        $currentCanvasId = $goalRepo->addCanvas($values);

        $values = [
            'description' => 'وظایف به‌موقع تکمیل‌شده', // Metric
            'title' => 'ساخت سیستم بهره‌وری من', // Objective
            'box' => 'goal',
            'author' => $userId,
            'canvasId' => $currentCanvasId,
            'milestoneId' => $milestoneId,
            'startDate' => dtHelper()->userNow()->formatDateForUser(),
            'endDate' => dtHelper()->userNow()->addMonths(2)->formatDateForUser(),
            'metricType' => 'percent',
            'assignedTo' => $userId,
            'startValue' => '0',
            'currentValue' => '0',
            'endValue' => '80',
        ];

        $goalRepo->createGoal($values);

        $projectService->changeCurrentSessionProject($projectId);

    }
}
