<script type="text/javascript">
	//create functions to pair flexslider with vimeo api
  function addEvent(element, eventName, callback) {
    if (element.addEventListener) {
      element.addEventListener(eventName, callback, false)
    } else {
      element.attachEvent(eventName, callback, false);
    }
  }

  function ready(player_id) {
    var froogaloop = $f(player_id);
    froogaloop.addEvent('play', function(data) {
      $('.flexslider').flexslider("pause");
    });
    froogaloop.addEvent('pause', function(data) {
      $('.flexslider').flexslider("play");
    });
  }

	$(function(){
		// prep videos for api calls
	 	// @todo: make sure to get ie8 indexof polyfill before release
		$('iframe').each(function(index){
			var video = $(this),
					source = video.attr('src');
			if(source.indexOf('vimeo') != -1){
				var cutoffPoint,
						updatedSource;
				cutoffPoint = source.indexOf('?');
				updatedSource = source.substring(0, (cutoffPoint != -1) ? cutoffPoint : source.length);
				video.attr({
					id: 'player_'+index,
					src: updatedSource+'?api=1&amp;player_id=player_'+index
				});
				var player = document.getElementById('player_'+index);
				$f(player).addEvent('ready', ready);
			}
		});

		//remove extra embed stuff
	  $('.embed').each(function(){
	  	$(this).children().remove('*:not(iframe)');
	  });

		$('.item-gallery').on('click', '.item-wrapper', function(e){
			e.preventDefault();
			//@todo: figure this out
			console.log(window.innerWidth <= 480);
			if(window.innerWidth <= 480){
				console.log('here');
				// window.location = $(this).attr('href');
			}
			//@todo: create method if two instances of .item-gallery
			var detailIndex = $(this).data('curr-detail'),
					target = $('#detail-target'),
					currDetailIndex = target.data('curr-detail');
			if(detailIndex != currDetailIndex){
				console.log('pass');
				target.slideUp().html($(this).html()).data('curr-detail', detailIndex);
				target.find('.item-viewport').addClass('col-md-8 col-sm-6');
				target.find('.flex-holder').addClass('flexslider');
				//init flexslider and responsive videos
			  //@todo: 10sec delay
			  $("#detail-target .flexslider").fitVids().flexslider({
			      animation: "slide",
			      useCSS: false,
			      animationLoop: false,
			      smoothHeight: true,
			      before: function(slider){
			      	//pause video before moving to next slide
			      	var video2Pause = $('#detail-target .flexslider li.flex-active-slide iframe').attr('id'),
			      			player = document.getElementById(video2Pause);
			      	if(player){
			      		$f(player).api('pause');
			      	}
			      }
			  });
				target.slideDown().addClass('open');
				//@todo: add scrollto method
				// target.scrollTo();
			}else{
				//@todo: add scrollto method
				// target.scrollTo();
			}
		});
	});
</script>