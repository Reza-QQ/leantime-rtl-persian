<div class="center padding-lg" style="width:800px;">
    <div class="row">
        <div class="col-md-12">
            <x-global::undrawSvg image="undraw_social_serenity_vhix.svg" maxWidth="auto"  maxheight="auto" height="250px" headline="{{ __('headlines.welcome') }}"></x-global::undrawSvg>
        </div>
    </div>
    <div class="row onboarding">
        <div class="col-md-12" style="font-size:var(--font-size-l);">
            <br />
            Leantime ساخته شده تا ابرقدرت‌های شما را تقویت کند و به شما کمک کند پیشرفت خود را به سمت اهدافتان ببینید.<br />
            <br />
            بیشتر ما به ساختن فهرست وظایف عادت داریم — اما می‌خواهیم از شما بخواهیم به این فکر کنید که دقیقاً می‌خواهید به چه چیزی دست یابید.<br />
            <br />
            ۱. یک چشم‌انداز (استراتژی) تعیین کنید و اهداف خود را مشخص کنید<br />
            ۲. کاری را که شما را به آن اهداف می‌رساند تعریف کنید<br />
            ۳. و سپس به آن‌ها برسید و روزمرگی خود را با داشبورد کار من برنامه‌ریزی کنید.<br />
            <br /><br />
            <x-global::forms.button tag="a" link="javascript:void(0)" contentRole="primary" onclick="leantime.helperController.hideAndKeepHidden('dashboard'); leantime.helperController.startProjectDashboardTour();">{{ __("buttons.lets_go") }} <i class="fa-solid fa-arrow-right"></i></x-global::forms.button>
            <div class="clearall"></div>
        </div>
    </div>
</div>
