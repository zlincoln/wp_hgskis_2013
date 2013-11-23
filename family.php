<?php
/*
Template Name: Family Page
*/
?>
<?php
class Member{
	public $name;
	public $photoURL;
	public $videoURL;
	public $bio;
	function __construct($name, $photoURL, $videoURL, $bio){
		$this->name = $name;
		$this->photoURL = $photoURL;
		$this->videoURL = $videoURL;
		$this->bio = $bio;
	}
}

$connor = new Member('Connor Gaeta', 'images/family/connor.png', 'http://player.vimeo.com/video/50028011', "<p>I got started with HG about 3 years ago well it was still in its infancy stages. From then it's grown out of a dingy garage in downtown Burlington to a real shop. I am always trying to see how I can change my personal style to reflect in HG itself. Working with HG really allows everything we do on the snow reflect in the company itself.</p>");
$hunter = new Member('Hunter Tyrell', 'images/family/hunter.png', 'http://player.vimeo.com/video/49095760', "<p>Yo what's good I'm Hunter Tyrrell and I'm a rider for HG skis. I started skiing when I was about 2 and was racing up until I was 11. I always had a love for freestyle skiing ever since I ditched my ski group to take park laps. The first couple of years for me consisted on expanding my bag of tricks and dialing them down consistently.</p>");
$james = new Member('James Amedeo', 'images/family/james.png', 'http://player.vimeo.com/video/46318020', "<p>Grew up living and skiing on Burke Mountain where I've been for the last 18 years. Moved to Burlington, Vermont over the summer to change things up a bit and ski at Sugarbush this season with the whole HG crew! Shout outs to the boys at HG, YMR, Dan at Arsenic Apparel, Ian at Kingdom Softwear, and all the friends and family that helped me along the way.</p>");
$riders = array($connor, $hunter, $james);

$harrison = new Member('Harrison Goldberg', 'images/family/harrison.png', false, "<p>Growing up if I wasn't building with Legos, I was likely constructing with duct tape and card board, or wiring contraptions that fell a little short of eletrical standards. I skied on weekends and after school, or I snowskated in my back yard if I couldn't get on the hill. In high school I built a pair of skis for the first time as a senior project. Two years later when I blew the circuit for the whole floor in my dorm I decided it was time to focus on just the skis!</p>");
$zach = new Member('Zachary Lincoln', 'images/family/zach.png', false, "<p>Chicken shit in the park.</p>");
$charlie = new Member('Charles Stemen', 'images/family/charlie.png', false, "<p>Growing up a weekend warrior, me and some friends started filming each other once in a while at Okemo in my early years of schooling. My last 2 years of high school I started making ski movies with my friend George Watts, and since then I have found skiing coming before almost anything else. Its great to work with a team of equally passionate people here at HG Skis, and as our riders progress, so does our video production. I work on the graphics, videos, and photography - putting in the hours behind the appearance of our products. My video production partner in crime, Sam Rogers, and of course, the team riders, will be hard at work getting you the best quality videos in the 12/13 season that your going to have to watch twice to comprehend. Be sure to say hello if you see us riding/filming!</p>");
$team = array($harrison, $zach, $charlie);

get_header();

$args = array(
	'post_type' => 'team_member'
);

$members = new WP_Query($args);

?>

<section class="gallery-detail-template family container">
	<div id="detail-target" class="row" data-curr-detail="null"></div>
	<div class="row item-gallery">
		<h2 class="col-xs-12">Riders</h2>
		<?php
		if($members->have_posts()): while($members->have_posts()): $members->the_post();
		?>
		<a class="item-wrapper col-xs-12 col-sm-6 col-md-4" href="family-detail.php">
			<div class="item-viewport">
				<?php the_post_thumbnail('gallery-crop', array('class'=>'img-responsive')); ?>
				<iframe src="<?= $member->videoURL; ?>"></iframe>
			</div>
			<div class="item-details">
				<h3 class="item-title"><?= $member->name; ?></h3>
				<div class="image-gallery">
					<!-- <img class="img-responsive" src="http://placehold.it/1200x1000">
					<img class="img-responsive" src="http://placehold.it/1200x1000">
					<img class="img-responsive" src="http://placehold.it/1200x1000">
					<img class="img-responsive" src="http://placehold.it/1200x1000"> -->
				</div>
				<div class="wysiwyg-content">
					<?php the_content(); ?>
					<?= $member->bio; ?>
				</div>
			</div>
		</a>
		<?php
		endwhile;
		endif;
		?>
	</div>
</section>
<?php include('includes/gallery-script.php'); ?>

<?php
get_footer();
?>