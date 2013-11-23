<script type="text/javascript">
	$(function(){
		$('.item-gallery').on('click', '.item-wrapper', function(e){
			e.preventDefault();
			//@todo: figure this out
			console.log(window.innerWidth <= 480);
			if(window.innerWidth <= 480){
				console.log('here');
				// window.location = $(this).attr('href');
			}
			//@todo: create method if two instances of .item-gallery
			var index = $(this).index(),
					target = $('#detail-target'),
					currDetailIndex = parseInt(target.data('curr-detail'));
			if(index != currDetailIndex){
				target.scrollTop();
				target.slideUp().html($(this).html()).data('curr-detail', index);
				target.find('.item-viewport').addClass('col-md-8 col-sm-6');
				target.slideDown().addClass('open');
			}
		});
	});

</script>