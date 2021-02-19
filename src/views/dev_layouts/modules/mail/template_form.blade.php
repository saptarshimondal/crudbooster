@extends("crudbooster::dev_layouts.layout")
@section("content")


    <p>
        <a href="{{ route('DeveloperMailControllerGetTemplates') }}"><i class="fa fa-arrow-left"></i> Back To List</a>
    </p>

    <div class="box box-default">
        <div class="box-header">
            <h1 class="box-title">{{ $form_title }}</h1>
        </div>

        @if($cmd == 'ADD')
            <form method="post" action="{{ cb()->getDeveloperUrl("mail/add-template") }}">
        @else
            <form method="post" action="{{ cb()->getDeveloperUrl("mail/edit-template/".@$template->id) }}">
        @endif
            {!! csrf_field() !!}
        <div class="box-body">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" placeholder="Enter name of the template" value="{{ old('name') ? old('name') : @$template->name }}" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Slug</label>
                <input type="text" placeholder="Enter unique slug for the template" value="{{ old('slug') ? old('slug') : @$template->slug }}" name="slug" class="form-control">
            </div>

            <div class="form-group">
                <label for="">From Name</label>
                <input type="text" placeholder="Enter email sender name" value="{{ old('from_name') ? old('from_name') : @$template->from_name }}" name="from_name" class="form-control">
            </div>

            <div class="form-group">
                <label for="">From Email</label>
                <input type="email" placeholder="Enter email sender id" value="{{ old('from_email') ? old('from_email') : @$template->from_email }}" name="from_email" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Cc</label>
                <input type="email" placeholder="Enter cc" value="{{ old('cc') ? old('cc') : @$template->cc }}" name="cc" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Bcc</label>
                <input type="email" placeholder="Enter Bcc" value="{{ old('bcc') ? old('bcc') : @$template->bcc }}" name="bcc" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="">Subject</label>
                <input type="text" placeholder="Enter subject for the email" value="{{ old('subject') ? old('subject') : @$template->subject }}" name="subject" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Content</label>
                <textarea id='content' 
                    name="content"
                    class='form-control'
                    rows='5'>{{ old('content') ? old('content') : @$template->content }}</textarea>
            </div>
            
        </div>
        <div class="box-footer">
            <input type="submit" class="btn btn-success" value="Save">
        </div>
        </form>
    </div>


@endsection

@push('head')
    <link rel="stylesheet" type="text/css" href="{{cbAsset('adminlte/plugins/summernote/summernote.css')}}">
@endpush

@push('bottom')
    <script type="text/javascript" src="{{cbAsset('adminlte/plugins/summernote/summernote.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#content').summernote({
                height: ($(window).height() - 300),
                callbacks: {
                    onImageUpload: function (image) {
                        uploadImageSummernote(image[0]);
                    }
                }
            });

            function uploadImageSummernote(image) {
                var data = new FormData();
                data.append("userfile", image);
                $.ajax({
                    headers: {
                      "X-CSRF-TOKEN":"{{ csrf_token() }}"
                    },
                    url: '{{ cb()->getAdminUrl('upload-image') }}',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    type: "post",
                    success: function (resp) {
                        var image = $('<img>').attr('src', resp.full_url);
                        $('#content').summernote("insertNode", image[0]);
                    },
                    error: function (data) {
                        console.log(data);
                        swal('Oops', 'Upload image failed!','warning');
                    }
                });
            }
        })
    </script>
@endpush