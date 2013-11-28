jQuery(document).ready(function($){
	$('.add-new-photo-input').on('click', function(e){
		e.preventDefault();
		var $input2clone = $('[name*="team_photo"]').last();

		var count = $('[type="text"][name*="team_photo"]').length;

		var $clone = $input2clone.clone();
		$clone.attr('id', 'team_photo_'+count).attr('name', 'team_photo['+count+']').attr('value', '');
		$(this).before($clone);
	});
});