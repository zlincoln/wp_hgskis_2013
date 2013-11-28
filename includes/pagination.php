<ul class="pagination pagination-lg">
	<li <?= ($paged == 1) ? 'class="disabled"' : ''; ?>>
		<a href="<?php previous_posts_link(); ?>">&laquo;</a>
	</li>
	<li class="active"><span>1</span></li>
	<li><a href="#">2</a></li>
	<li><a href="#">3</a></li>
	<li><a href="#">4</a></li>
	<li><a href="#">5</a></li>
	<li><a href="#">6</a></li>
	<li><a href="#">7</a></li>
	<li><a href="#">&raquo;</a></li>
</ul>