<div class="center padding-lg">

    <div class="row">
        <div class="col-md-12">

            <x-global::undrawSvg
                image="undraw_goals_re_lu76.svg"
                maxWidth="auto"
                headlineSize="var(--font-size-xxxl)"
                maxheight="auto"
                height="250px"
                headline="اهدافی که شما را متمرکز نگه می‌دارد"
            ></x-global::undrawSvg>
        </div>
    </div>

    <div class="row ">
        <div class="col-md-12" style="font-size:var(--font-size-l);">
            <br />
            <div id="firstLoginContent">
                <p><br />اهداف به شما امکان می‌دهند پروژه خود را به بخش‌های قابل دستیابی، قابل اندازه‌گیری و قابل اجرا تقسیم کنید.<br />در حالی که نقاط عطف بر اجرا تمرکز دارند، اهداف درباره معیارهایی هستند که می‌خواهید به آن‌ها دست یابید.<br/>
                    هر هدف باید یک مقصد واضح (چیزی که می‌خواهید به آن دست یابید) داشته باشد و باید به‌راحتی با یک معیار واحد قابل اندازه‌گیری باشد.<br /><br />
                    پس از داشتن یک هدف، می‌توانید نقاط عطف را به آن اختصاص دهید تا آن را به وظایف قابل اجرا تقسیم کنید.<br />
                </p><br />
            </div>
            <br /><br />
            <div class="row">
                <div class="col-md-12 tw-text-center">
                    <x-global::forms.button tag="a" link="javascript:void(0)" contentRole="tertiary" onclick="leantime.helperController.closeModal()">خودم کاوش می‌کنم</x-global::forms.button>
                    <x-global::forms.button tag="a" link="javascript:void(0)" contentRole="primary" onclick="leantime.helperController.closeModal(); leantime.helperController.startGoalTour();">{{ __("buttons.start_tour") }} <i class="fa-solid fa-arrow-right"></i></x-global::forms.button>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12 tw-text-center">
                    <form hx-post="{{ BASE_URL }}/help/helperModal/dontShowAgain" hx-trigger="change" hx-swap="none">
                        <label class="tw-text-sm tw-mt-sm" >
                            <input type="hidden" name="modalId" value="goals" />
                            <input type="checkbox" id="dontShowAgain" name="hidePermanently"  style="margin-top:-2px;">
                            دیگر این را نشان نده
                        </label>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

