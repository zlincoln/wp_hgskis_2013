<!-- @todo: create footer menu fallback -->
<footer>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="inner-wrap clearfix">
					<div class="copyright-holder pull-left">
						<img src="<?= THEME_DIR; ?>/images/hg-america-logo.png" alt="HG North America">
						<span>Copyright &copy;2013 | HG Skis | All rights reserved</span>
					</div>
					<nav class="social-nav pull-right">
						<ul>
							<li><a href="http://www.facebook.com/hgskis" target="_blank"><i class="icon icon-facebook"></i></a></li>
							<li><a href="http://vimeo.com/hgskis" target="_blank"><i class="icon icon-vimeo"></i></a></li>
							<li><a href="http://instagram.com/hgskis" target="_blank"><i class="icon icon-instagram"></i></a></li>
							<li><a href="https://twitter.com/HG_Skis" target="_blank"><i class="icon icon-twitter"></i></a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>	
</footer>
<script type="text/javascript">
	//utilities
	//@todo: remove these at launch
	function toggleStaticHeader(){
		$('body').toggleClass('static-header');
		//@todo: remove these returns before production
		if($('body').hasClass('static-header')){
			return "Header is currently static";
		}else{
			return "Header is currently fixed";
		}
	}
	function logoSwitch(){
		$('.navbar-brand').toggleClass('reduced');
	}
	//end utils

	$(function(){
		$('body').addClass('js-enabled');
		var headerOffset = $('header').offset().top;

		var stickyNav = function(){
			windowTop = $(window).scrollTop();
			if(windowTop >= headerOffset){
				$('body').addClass('static-header');
			}else{
				$('body').removeClass('static-header');
			}
		}

		// $(window).on('scroll', function(){
		// 	stickyNav();
		// });
	});


	//@todo: set min height for body to window.height
	//@todo: set flexslider max-height dependant on window.height
	//@todo: if html.height is less than window.height+header.height apply static-header class to body
</script>
</body>
</html>