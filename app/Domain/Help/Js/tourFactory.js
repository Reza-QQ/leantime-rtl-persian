leantime.tourFactory = (function () {

    /**
     * Create a new tour with default settings
     * @param {string} tourName - The name of the tour
     * @returns {Object} - Shepherd tour object
     */
    var createTour = function(tourName) {
        return new Shepherd.Tour({
            useModalOverlay: true,
            defaultStepOptions: {
                classes: 'shepherd-theme-arrows',
                scrollTo: false,
                cancelIcon: {
                    enabled: true
                }
            },
            tourName: tourName
        });
    };

    /**
     * Register a tour completion
     * @param {string} tourName - The name of the tour that was completed
     */
    var registerTourCompletion = function(tourName) {
        leantime.helperRepository.updateUserModalSettings(tourName);

        // Track tour completion for analytics
        if (typeof _paq !== 'undefined') {
            _paq.push(['trackEvent', 'Tour', 'Completed', tourName]);
        }
    };

    /**
     * Get tour definitions for a specific tour
     * @param {string} tourName - The name of the tour
     * @returns {Array} - Array of tour step definitions
     */
    var getTourDefinition = function(tourName) {
        const tourDefinitions = {
            'myWorkDashboard': [
                {
                    id: "welcome-step",
                    title: "👋 به تور معرفی داشبورد خوش آمدید",
                    text: "بیایید با چند مورد پایه شروع کنیم تا با ناوبری و عناصر مختلف داخل Leantime آشنا شوید.",
                },
                {
                    id: "top-nav-step",
                    title: "حالت‌های کاری",
                    text: "ناوبری بالا حالت کاری فعلی شما را نشان می‌دهد. می‌توانید داخل یک پروژه، فضای کاری شخصی یا حالت شرکت باشید.",
                    attachTo: { element: '.work-modes', on: 'bottom' }
                },
                {
                    id: "menu-step",
                    title: "ناوبری چپ",
                    text: "ناوبری چپ حالت کاری فعلی را به بخش‌های مختلف تقسیم می‌کند و به شما امکان دسترسی به بخش‌های متفاوت را می‌دهد. همه چیز در اینجا بخشی از حالت کاری انتخاب‌شده در بالاست.",
                    attachTo: { element: '.leftpanel', on: 'right' }
                },
                {
                    id: "my-menu",
                    title: "نوار پروفایل من",
                    text: "اینجا پیوندهایی به حساب کاربری خود و همچنین اعلان‌ها و آخرین اخبار درباره Leantime را پیدا می‌کنید.",
                    attachTo: { element: '.headmenu.pull-right', on: 'bottom' }
                },
                {
                    id: "dashboard-widgets",
                    title: "ویجت‌های داشبورد شما",
                    text: "داشبورد شما به ویجت‌های مختلفی تقسیم شده که اطلاعات متمرکزی درباره کار شما نشان می‌دهند.",
                    attachTo: { element: '.primaryContent', on: 'top' }
                },
                {
                    id: "dashboard-widgets-dandd",
                    title: "داشبورد خود را سفارشی کنید",
                    text: "ویجت‌ها را می‌توان با قابلیت کشیدن و رها کردن تغییر اندازه داد و جابه‌جا کرد.",
                    attachTo: { element: '#widget_wrapper_todos .grid-handler-top', on: 'bottom' }
                },
                {
                    id: "my-todo-widget",
                    title: "کارهای من",
                    text: "ویجت کارهای من همه وظایفی که در حال حاضر به شما اختصاص داده شده را نشان می‌دهد.",
                    attachTo: { element: '#widget_wrapper_todos', on: 'top' }
                },
                {
                    id: "my-todo-widget2",
                    title: "گروه‌بندی کارها",
                    text: "می‌توانید از منوهای کشویی اینجا برای فیلتر کردن وظایف بر اساس پروژه یا گروه‌بندی آن‌ها بر اساس اولویت، وضعیت، پروژه یا تاریخ استفاده کنید.",
                    attachTo: { element: '#yourToDoContainer > .clear', on: 'bottom' }
                },
                {
                    id: "my-todo-widget4",
                    title: "مرتب‌سازی کارها",
                    text: "هر کار را می‌توان کشید و رها کرد تا ترتیب آن تغییر کند. همچنین می‌توانید یک کار را به تقویم بکشید تا زمان‌بندی شود.",
                    attachTo: { element: '#yourToDoContainer .sortable-item:first-child', on: 'bottom' }
                },
                {
                    id: "my-todo-widget-timer",
                    title: "شروع زمان‌سنج",
                    text: "وقتی آماده شروع کار روی یک کار هستید، فقط روی دکمه شروع زمان‌سنج کلیک کنید.",
                    attachTo: { element: '#yourToDoContainer .sortable-item:first-child .timerContainer', on: 'bottom' }
                },
                {
                    id: "my-todo-widget-complete",
                    title: "تکمیل یک کار",
                    text: "پس از تکمیل یک کار، می‌توانید با کلیک روی منوی کشویی وضعیت، آن را به عنوان انجام‌شده علامت بزنید.",
                    attachTo: { element: '#yourToDoContainer .sortable-item:first-child .statusDropdown', on: 'bottom' }
                },
                {
                    id: "my-todo-widget-add",
                    title: "افزودن وظایف بیشتر",
                    text: "می‌توانید با کلیک روی دکمه بعلاوه در هر بخش، یا با استفاده از منوی سه‌نقطه کنار هر کار، وظایف بیشتری اضافه کنید.",
                    attachTo: { element: '#yourToDoContainer .fa-circle-plus', on: 'bottom' }
                },
                {
                    id: "finish",
                    title: "تبریک!",
                    text: "تور داشبورد کار من را کامل کردید. برای یادگیری بیشتر درباره مدیریت پروژه در Leantime به <a href='"+leantime.appUrl+"/dashboard/show'>پروژه خود</a> بروید.",
                },
            ],
            'projectDashboard': [
                {
                    id: "left-nav",
                    title: "منوی پروژه",
                    text: "منوی پروژه پروژه شما را به بخش‌های مختلف تقسیم می‌کند: <strong>اتاق داده</strong> - برای نگهداری همه فایل‌ها و اطلاعات، <strong>فکر کن</strong> - برای استراتژی، ایده‌پردازی و تعریف، <strong>بساز</strong> - برای مدیریت اهداف، نقاط عطف و وظایف.",
                    attachTo: { element: '.leftmenu ul', on: 'left' }
                },
                {
                    id: 'project-selector',
                    title: "انتخاب‌کننده پروژه",
                    text: "از انتخاب‌کننده پروژه برای جابه‌جایی بین پروژه‌ها استفاده کنید. منوی چپ همه چیز مرتبط با پروژه فعلی شما را نشان می‌دهد.",
                    attachTo: { element: '.bigProjectSelector', on: 'bottom' }
                },
                {
                    id: 'project-checklist',
                    title: "چک‌لیست",
                    text: "چک‌لیست پروژه یک مرجع سریع است تا ببینید آیا پروژه شما همه اطلاعات لازم برای اجرای موفق را دارد یا نه.",
                    attachTo: { element: '#progressForm', on: 'bottom' }
                },
                {
                    id: 'project-status',
                    title: "به‌روزرسانی‌های سریع وضعیت",
                    text: "می‌توانید از به‌روزرسانی‌های وضعیت برای به اشتراک گذاری سریع پیشرفت پروژه با تیم خود با استفاده از رنگ‌های قرمز، زرد و سبز استفاده کنید. وضعیت در سراسر برنامه قابل مشاهده خواهد بود.",
                    attachTo: { element: '.project-updates', on: 'left' }
                },
                {
                    id: 'project-progress',
                    title: "پیشرفت",
                    text: "نشانگر پیشرفت پروژه نشان می‌دهد چه مقدار کار را تکمیل کرده‌اید. این نشانگر اندازه‌های مختلف وظایف، سرعت تیم و نقاط عطف پروژه را در نظر می‌گیرد.",
                    attachTo: { element: '.project-progress', on: 'left' }
                },
                {
                    id: 'latest-tasks',
                    title: "آخرین وظایف",
                    text: "فهرست آخرین وظایف، جدیدترین وظایف اضافه‌شده به پروژه شما را نشان می‌دهد و می‌توان از آن به عنوان صندوق ورودی پروژه استفاده کرد.",
                    attachTo: { element: '.latest-todos', on: 'left' }
                },
                {
                    id: 'teams',
                    title: "تیم",
                    text: "کادر تیم اعضای این پروژه را نشان می‌دهد.",
                    attachTo: { element: '.team-container', on: 'top' }
                },
                {
                    id: 'finished',
                    title: "تبریک!",
                    text: "تور داشبورد پروژه را کامل کردید. برای یادگیری بیشتر درباره روش‌های مختلف مدیریت وظایف در Leantime به <a href='"+leantime.appUrl+"/tickets/showKanban'>کارها</a> بروید.",
                }
            ],
            'kanbanBoard': [
                {
                    id: 'kanban-overview',
                    title: "تخته کانبان شما",
                    text: "این تخته کانبان شماست. به شما کمک می‌کند کار خود را تجسم کنید و کار در حال انجام را محدود کنید.",
                    attachTo: { element: '.kanban-board-wrapper', on: 'top' }
                },
                {
                    id: 'kanban-columns',
                    title: "جریان کار",
                    text: "وظایف با پیشرفت از چپ به راست حرکت می‌کنند. برای به‌روزرسانی وضعیت، کارت‌ها را بکشید و رها کنید.",
                    attachTo: { element: '.column', on: 'right' }
                },
                {
                    id: 'kanban-columns2',
                    title: "ستون‌های انعطاف‌پذیر",
                    text: "با استفاده از منوی سه‌نقطه می‌توانید ستون‌ها را اضافه یا حذف کنید و نام آن‌ها را تغییر دهید.",
                    attachTo: { element: '.column .widgettitle .inlineDropDownContainer', on: 'right' }
                },
                {
                    id: 'kanban-filter',
                    title: "فیلتر وظایف",
                    text: "می‌توانید وظایف خود را بر اساس فیلدهای مختلف مانند اولویت، وضعیت، پروژه یا تاریخ فیلتر کنید.",
                    attachTo: { element: '.filterWrapper > .btn', on: 'bottom' }
                },
                {
                    id: 'kanban-group',
                    title: "خطوط شنا",
                    text: "علاوه بر این، می‌توانید وظایف خود را گروه‌بندی کنید تا خطوط شنای کانبان ایجاد شود. این به شما کمک می‌کند کار خود را بر اساس اعضای تیم، اولویت یا نقاط عطف تجسم کنید.",
                    attachTo: { element: '.filterWrapper > .btn-group', on: 'bottom' }
                },
                {
                    id: 'kanban-sprints',
                    title: "اسپرینت‌ها",
                    text: "اگر کار خود را در اسپرینت‌ها مدیریت می‌کنید، می‌توانید از منوی کشویی اینجا برای انتخاب، ایجاد و به‌روزرسانی اسپرینت‌ها استفاده کنید.",
                    attachTo: { element: '.pageheader .dropdown', on: 'bottom' }
                },
                {
                    id: 'kanban-congrats',
                    title: "تبریک!",
                    text: "این تور کانبان را به پایان می‌رساند. برای یادگیری نحوه ایجاد و مدیریت نقاط عطف در Leantime به <a href='"+leantime.appUrl+"/tickets/showKanban'>نقاط عطف</a> بروید.",
                }
            ],
            'milestoneView': [
                {
                    id: 'milestone-overview',
                    title: "نقاط عطف",
                    text: "نقاط عطف به شما کمک می‌کنند نتایج اصلی و فازهای پروژه را پیگیری کنید.",
                    attachTo: { element: '.gantt-wrapper', on: 'top' }
                },
                {
                    id: 'milestone-drag',
                    title: "کشیدن و مرتب‌سازی",
                    text: "هر نوار نماینده یک نقطه عطف است. می‌توانید آن‌ها را در طول زمان‌بندی بکشید، دوباره مرتب کنید و تغییر اندازه دهید. هر کاری که در این صفحه انجام دهید، زمان‌بندی نقاط عطف شما را به‌روزرسانی می‌کند.",
                    attachTo: { element: '.gantt-wrapper', on: 'top' }
                },
                {
                    id: 'milestone-filter',
                    title: "فیلتر",
                    text: "می‌توانید نقاط عطف خود را فیلتر کنید و همچنین وظایفی که بخشی از آن‌ها هستند را مشاهده کنید.",
                    attachTo: { element: '.filterWrapper > .btn', on: 'bottom' }
                },
                {
                    id: 'milestone-timeframes',
                    title: "بازه‌های زمانی",
                    text: "می‌توانید بازه زمانی نمای زمان‌بندی را تغییر دهید تا بخش بیشتری از سال را ببینید یا به تفکیک روزانه عمیق شوید.",
                    attachTo: { element: '.col-md-4 .pull-right', on: 'bottom' }
                },
                {
                    id: 'milestone-congrats',
                    title: "تبریک!",
                    text: "این تور نقاط عطف را به پایان می‌رساند. برای یادگیری نحوه ایجاد و مدیریت اهداف در Leantime به <a href='"+leantime.appUrl+"/goalcanvas/dashboard'>اهداف</a> بروید.",
                },
            ],
            'goalsView': [
                {
                    id: 'goals-overview',
                    title: "اهداف",
                    text: "اهداف به شما کمک می‌کنند تأثیر قابل اندازه‌گیری روی پروژه‌هایتان را پیگیری کنید.",
                },
                {
                    id: 'goal-parts',
                    title: "مقاصد و معیارها",
                    text: "هر هدف از یک مقصد (چیزی که می‌خواهید به آن دست یابید) و یک معیار (چگونه آن را اندازه‌گیری می‌کنید) تشکیل شده است.",
                    attachTo: { element: '.ticketBox', on: 'top' }
                },
                {
                    id: 'goal-progress',
                    title: "پیشرفت هدف",
                    text: "با به‌روزرسانی معیارهای هدف، نوار پیشرفت نشان می‌دهد چقدر پیش رفته‌اید.",
                    attachTo: { element: '.ticketBox > .row > .col-md-12 .progress', on: 'bottom' }
                },
                {
                    id: 'milestone-connection',
                    title: "نقاط عطف و اهداف",
                    text: "می‌توانید اهداف را به نقاط عطف متصل کنید تا پیشرفت در سطح کار اهداف خود را پیگیری کنید. این به شناسایی شکاف‌ها در برنامه پروژه شما کمک می‌کند.",
                    attachTo: { element: '.ticketBox.fixed', on: 'bottom' }
                },
                {
                    id: 'milestone-congrats',
                    title: "تبریک!",
                    text: "این تور اهداف را به پایان می‌رساند. نقاط عطف، اهداف و کارها بلوک‌های سازنده پایه در Leantime هستند. از آن‌ها برای تقسیم کار خود به بخش‌های قابل مدیریت استفاده کنید. برای مرور وظایف خود به <a href='"+leantime.appUrl+"/tickets/showKanban'>تخته کانبان</a> بروید.",
                },
            ]
        };

        return tourDefinitions[tourName] || [];
    };

    /**
     * Build a tour from a definition
     * @param {string} tourName - The name of the tour to build
     * @returns {Object} - Configured Shepherd tour object
     */
    var buildTour = function(tourName) {
        const tour = createTour(tourName);
        const steps = getTourDefinition(tourName);

        steps.forEach((step, index) => {
            const isFirst = index === 0;
            const isLast = index === steps.length - 1;

            // Configure buttons based on position in tour
            const buttons = [];

            if (!isFirst) {
                buttons.push({
                    text: leantime.i18n.__("tour.back"),
                    classes: 'shepherd-button-secondary',
                    action: tour.back
                });
            }

            if (isLast) {
                buttons.push({
                    text: leantime.i18n.__("tour.finish"),
                    action: function() {
                        registerTourCompletion(tourName);
                        confetti();
                        tour.complete();
                    }
                });
            } else {
                buttons.push({
                    text: leantime.i18n.__("tour.next"),
                    action: tour.next
                });
            }

            // Add cancel button for all steps
            if (!isLast) {
                buttons.unshift({
                    text: leantime.i18n.__("tour.cancel"),
                    classes: 'shepherd-button-secondary',
                    action: tour.cancel
                });
            }

            // Add the step to the tour
            tour.addStep({
                ...step,
                buttons: buttons
            });
        });

        // Add event handlers
        tour.on('complete', function() {
            registerTourCompletion(tourName);
        });

        return tour;
    };

    /**
     * Start a specific tour
     * @param {string} tourName - The name of the tour to start
     */
    var startTour = function(tourName) {
        const tour = buildTour(tourName);
        tour.start();
        return tour;
    };

    return {
        createTour: createTour,
        buildTour: buildTour,
        startTour: startTour,
        getTourDefinition: getTourDefinition
    };
})();