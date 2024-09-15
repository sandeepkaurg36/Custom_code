jQuery(document).ready(function($){
    var mediaUploader;
    $('#upload_button').click(function(e) {
        e.preventDefault();
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            }, multiple: false });
        mediaUploader.on('select', function() {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#custom_image').val(attachment.url);
            $('#image_preview').html('<img src="'+attachment.url+'" style="max-width:100%;">');
        });
        mediaUploader.open();
    });
});
