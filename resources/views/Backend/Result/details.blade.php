@extends('Admin.adminMaster')
{{-- * NICE SELECTC 2* --}}
@push('niceSelectCss')
    <link rel="stylesheet" href="{{ asset('assets/js/niceSelectAsset/select2.min.css') }}">
@endpush
@section('general-content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card p-5">
                    <div class="card-header bg-info text-light py-4">
                        <h1>Upload Result</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('result.details.upload') }}" method="POST">
                            @csrf

                            {{-- **subject SELECT * --}}
                            <label for="subject">Select a subject for subject</label>
                            <select name="subject" id="subject" class="form-control my-3">
                                <option value="" disabled selected>Select subject</option>

                                {{-- ** ALL subject FROM ROUTINE subject MODEL --}}
                                @foreach ($allsubject as $subjectData)
                                  <option value="{{ $subjectData->id }}">{{ $subjectData->subject_name  }}</option>
                                @endforeach
                            </select>
                            {{-- **ERROR MESSAGE ** --}}
                            @if($errors->has('subject'))
                                <div class="error"><strong style="color:red;font-weight:bold;">{{ $errors->first('subjectName') }}</strong></div>
                            @endif


                            {{-- **subject SELECT * --}}
                            <label for="year" class="mt-5">Select a year</label>
                            <select name="year" id="year" class="form-control my-3">
                                <option value="" disabled selected>Select year</option>

                                {{-- ** ALL year FROM ROUTINE year MODEL --}}
                                @foreach ($allyear as $yearData)
                                  <option value="{{ $yearData->id }}">{{ $yearData->passing_year   }}</option>
                                @endforeach
                            </select>
                            {{-- **ERROR MESSAGE ** --}}
                            @if($errors->has('year'))
                                <div class="error"><strong style="color:red;font-weight:bold;">{{ $errors->first('subjectName') }}</strong></div>
                            @endif


                            {{-- ** DETAILS *** --}}
                            <label for="resultDetails" class="mt-5">make result / upload result </label>
                            <textarea name="resultDetails" id="resultDetails" class="form-control" cols="30" rows="10"></textarea>
                            <button class="btn btn-primary w-100 mt-3">submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('NiceSelect_2')
    <script src="{{ asset('assets/js/niceSelectAsset/select2.min.js') }}"></script>
    <script>
        $('#subject').select2();
        $('#year').select2();
    </script>
@endpush

{{-- **CK EDITOR START --}}
@push('ckeditor')
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/super-build/ckeditor.js"></script>

<script>
  // This sample still does not showcase all CKEditor 5 features (!)
  // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
  CKEDITOR.ClassicEditor.create(document.getElementById('resultDetails'),{
      // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
      toolbar: {
          items: [
              'exportPDF','exportWord', '|',
              'findAndReplace', 'selectAll', '|',
              'heading', '|',
              'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
              'bulletedList', 'numberedList', 'todoList', '|',
              'outdent', 'indent', '|',
              'undo', 'redo',
              '-',
              'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
              'alignment', '|',
              'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
              'specialCharacters', 'horizontalLine', 'pageBreak', '|',
              'textPartLanguage', '|',
              'sourceEditing'
          ],
          shouldNotGroupWhenFull: true
      },
      // Changing the language of the interface requires loading the language file using the <script> tag.
      // language: 'es',
      list: {
          properties: {
              styles: true,
              startIndex: true,
              reversed: true
          }
      },
      // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
      heading: {
          options: [
              { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
              { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
              { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
              { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
              { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
              { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
              { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
          ]
      },
      // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
      placeholder: 'Welcome to CKEditor 5!',
      // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
      fontFamily: {
          options: [
              'default',
              'Arial, Helvetica, sans-serif',
              'Courier New, Courier, monospace',
              'Georgia, serif',
              'Lucida Sans Unicode, Lucida Grande, sans-serif',
              'Tahoma, Geneva, sans-serif',
              'Times New Roman, Times, serif',
              'Trebuchet MS, Helvetica, sans-serif',
              'Verdana, Geneva, sans-serif'
          ],
          supportAllValues: true
      },
      // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
      fontSize: {
          options: [ 10, 12, 14, 'default', 18, 20, 22 ],
          supportAllValues: true
      },
      // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
      // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
      htmlSupport: {
          allow: [
              {
                  name: /.*/,
                  attributes: true,
                  classes: true,
                  styles: true
              }
          ]
      },
      // Be careful with enabling previews
      // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
      htmlEmbed: {
          showPreviews: true
      },
      // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
      link: {
          decorators: {
              addTargetToExternalLinks: true,
              defaultProtocol: 'https://',
              toggleDownloadable: {
                  mode: 'manual',
                  label: 'Downloadable',
                  attributes: {
                      download: 'file'
                  }
              }
          }
      },
      // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
      mention: {
          feeds: [
              {
                  marker: '@',
                  feed: [
                      '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                      '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                      '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                      '@sugar', '@sweet', '@topping', '@wafer'
                  ],
                  minimumCharacters: 1
              }
          ]
      },
      // The "super-build" contains more premium features that require additional configuration, disable them below.
      // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
      removePlugins: [
          // These two are commercial, but you can try them out without registering to a trial.
          // 'ExportPdf',
          // 'ExportWord',
          'CKBox',
          'CKFinder',
          'EasyImage',
          // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
          // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
          // Storing images as Base64 is usually a very bad idea.
          // Replace it on production website with other solutions:
          // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
          // 'Base64UploadAdapter',
          'RealTimeCollaborativeComments',
          'RealTimeCollaborativeTrackChanges',
          'RealTimeCollaborativeRevisionHistory',
          'PresenceList',
          'Comments',
          'TrackChanges',
          'TrackChangesData',
          'RevisionHistory',
          'Pagination',
          'WProofreader',
          // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
          // from a local file system (file://) - load this site via HTTP server if you enable MathType
          'MathType'
      ]
  });
</script>
@endpush
{{-- **CK EDITOR END --}}