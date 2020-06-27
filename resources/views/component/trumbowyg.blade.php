@if(!config('website.pjax'))
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.20.0/ui/trumbowyg.min.css">
@endpush

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.20.0/trumbowyg.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.20.0/plugins/upload/trumbowyg.upload.min.js"></script>
@endpush
@endif

@push('javascript')
<script>
  $('.demo').trumbowyg({
        btns: [
          ['upload']
        ],
        plugins: {
          upload: {
            serverPath: '{{ route("upload") }}',
            fileFieldName: 'image',
            data: [{
              name: 'myKey1'
            }],
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            urlPropertyName: 'url'
          }
          }
        });
</script>
@endpush