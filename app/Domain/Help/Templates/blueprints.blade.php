<div class="center padding-lg">

    <div class="row">
        <div class="col-md-12">
            <div style='width:50%' class='svgContainer'>
                {!! file_get_contents(ROOT . '/dist/images/svg/undraw_design_data_khdb.svg') !!}
            </div>
            <h1>پروژه‌های خود را به‌راحتی تعریف کنید</h1>
            <p>نقشه‌ها فرصت شما برای معنا بخشیدن به همه داده‌ها هستند. Leantime ابزارها و بوم‌های متنوعی برای تعریف پیشینه پروژه شما از طریق بوم‌های مدل کسب‌وکار، تحلیل SWOT یا نقشه‌های همدلی دارد.<br /><br />
            اگر نمی‌دانید از کجا شروع کنید، پیشنهاد می‌کنیم یک «بوم ارزش پروژه» ایجاد کنید. این بوم به مهم‌ترین پرسش‌های پروژه شما پاسخ می‌دهد:

                مشتری شما کیست؟ <br />
                چه مشکلی را حل می‌کنید؟<br />
                راه‌حل شما چیست؟<br />
                راه‌حل شما چه مزیتی نسبت به رقبای شما دارد<br />
            </p>
            <br /><br />
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">

            <x-global::forms.button tag="a" link="{{ BASE_URL }}/valuecanvas/showCanvas" contentRole="primary">ایجاد یک بوم ارزش پروژه</x-global::forms.button><br />

        </div>
    </div>


</div>
