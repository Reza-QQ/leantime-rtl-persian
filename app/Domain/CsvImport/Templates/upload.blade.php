@extends($layout)

@section('content')

@php
    $maxSize = \Leantime\Core\Files\FileManager::getMaximumFileUploadSize();
@endphp

<div id="fileManager">

    {!! $tpl->displayNotification() !!}

    <h2>آپلود فایل CSV</h2>
    <p>می‌توانید فایل‌های CSV را برای واردکردن یا به‌روزرسانی وظایف، پروژه‌ها و اهداف آپلود کنید. <a href="https://support.leantime.io/importing-data-via-csv" target="_blank">مستندات ما را بررسی کنید</a> تا درباره قالب‌بندی بیشتر بدانید و قالب‌ها را دانلود کنید</p>
    <br /><br/>
    <div class="uploadWrapper" style="width:100%">

        <form id="upload-form">

        <div class="extra" style="margin-top:5px;"></div>
        <div class="fileUploadDrop">
            <p><i>{!! __('text.drop_files') !!}</i></p>
            <div class="file-upload-input" style="margin:auto;  display:inline-block"></div>
        </div>

        <!-- Progress bar #1 -->
        <div class="input-progress"></div>

        <div class="input-error"></div>

        </form>

    </div>

</div>

@once
<script>

    if (typeof uppy === 'undefined') {


        const uppy = new Uppy.Uppy({
            debug: false,
            autoProceed: true,
            restrictions: {
                maxFileSize: {{ $maxSize }}
            }
        });

        uppy.use(Uppy.DropTarget, { target: '#fileManager' });

        uppy.use(Uppy.FileInput, {
            target: '.file-upload-input',
            pretty: true,
            locale: {
                strings: {
                    chooseFiles: ' مرور',
                }
            }
        });

        uppy.use(Uppy.XHRUpload, {
            endpoint: '{{ BASE_URL }}/csvImport/upload',
            formData: true,
            fieldName: 'file'
        });

        uppy.use(Uppy.StatusBar, {
            target: '.input-progress',
            hideUploadButton: false,
            hideAfterFinish: false,
        });

        uppy.use(Uppy.Form, { target: '#upload-form' });

        // Upload
        uppy.on("restriction-failed", (file, error) => {

            jQuery(".input-error").html("<span class='label-important'>"+error+"</span>");
            return false
        });

        uppy.on('upload-success', (file, response) => {

            jQuery(".input-error").text('');

            window.location.href = "{{ BASE_URL }}/connector/integration?provider=csv_importer&step=entity&integrationId="+response.body.id;

        });


        uppy.on('upload-error', (file, error, response) => {

            jQuery(".input-error").html("<span class='label-important'>مشکلی در فایل CSV شما وجود دارد: "+response.body.error+"</span>");



            return false
        });


    }

</script>
@endonce

@endsection