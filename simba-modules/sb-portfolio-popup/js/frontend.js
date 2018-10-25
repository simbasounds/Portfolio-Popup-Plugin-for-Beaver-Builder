jQuery(document).ready(function($) {
    $('.sbpp-block').on('click', function() {
        $('#imagepreview').attr('src', $('.imageresource',this).attr('src'));
				$('.modal-image-holder').attr('href', $('.imageresource',this).attr('src'));
        $('#modalTitle').html($('.sbpp-grid-title',this).html());
        $('#modalSubTitle').html($('.sbpp-grid-subtitle',this).html());
        $('#modalText').html($('#grid-text',this).html());
				$('#modalURL').html($('#grid-url',this).html());
        $('#imagemodal').modal('show');
    });
		$('.modal-image-holder').magnificPopup({
			type: 'image'
			// other options
		});
});