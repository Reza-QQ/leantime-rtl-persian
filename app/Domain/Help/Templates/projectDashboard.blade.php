<div class="center padding-lg" style="width:800px;">
    <div class="row">
        <div class="col-md-12">
            <x-global::undrawSvg
                image="undraw_joyride_re_968t.svg"
                maxWidth="auto"
                headlineSize="var(--font-size-xxxl)"
                maxheight="auto"
                height="250px"
                headline="مدیریت پروژه‌ها"
            ></x-global::undrawSvg>
        </div>
    </div>
    <div class="row onboarding">
        <div class="col-md-12" style="font-size:var(--font-size-l);">
            <br />
            <div id="firstLoginContent">
                <p><br />پروژه‌ها در Leantime فضاهای کاری مشترکی هستند که در آن شما و تیمتان کار را به‌طور کارآمد سازمان‌دهی، پیگیری و تحویل می‌دهید. هر پروژه به عنوان ظرفی برای اهداف، وظایف و نقاط عطف مرتبط عمل می‌کند و به شما امکان می‌دهد پیشرفت را در یک مکان مرکزی نظارت کنید. <br /><br />
                    چه در حال مدیریت کار، تحصیل یا ابتکارات شخصی داخلی باشید، پروژه‌های Leantime ساختار و ابزارهای لازم برای تبدیل ایده‌ها به نتایج موفق را فراهم می‌کنند.
                </p><br />
            </div>
            <br /><br />
            <div class="row">
                <div class="col-md-12 tw-text-center">
                    <x-global::forms.button tag="a" link="javascript:void(0)" contentRole="tertiary" onclick="leantime.helperController.closeModal()">خودم کاوش می‌کنم</x-global::forms.button>
                    <x-global::forms.button tag="a" link="javascript:void(0)" contentRole="primary" onclick="leantime.helperController.closeModal(); leantime.helperController.startProjectDashboardTour();">{{ __("buttons.start_tour") }} <i class="fa-solid fa-arrow-right"></i></x-global::forms.button>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12 tw-text-center">
                    <form hx-post="{{ BASE_URL }}/help/helperModal/dontShowAgain" hx-trigger="change" hx-swap="none">
                        <label class="tw-text-sm tw-mt-sm" >
                            <input type="hidden" name="modalId" value="projectDashboard" />
                            <input type="checkbox" id="dontShowAgain" name="hidePermanently"  style="margin-top:-2px;">
                            دیگر این را نشان نده
                        </label>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>