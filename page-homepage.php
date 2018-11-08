<?php
/*
Template Name: Homepage
*/
get_header();
?>
<h1>homepage</h1>
<main id="homepage">
	<section class="content ">
		<div class="wrapper has-sidebar">
			<div class="badge-01">
				<?php 
					query_posts( array(
					//'cat' => 2,
					//'category' => array(2,3,4,5),
					'category__in' => array( 2,3,4,5 ),
					'offset' => 0, 
					'orderby' => 'rand',
					'posts_per_page' => 4) );
					 ?>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article>
					<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );?>
					<div class="featured-image img-crop" style="background-image: url('<?php echo $thumb['0'];?>')" aria-label="<?php the_title(); ?>">
					</div>
					<div class="entry">
						<?php global $post; $categories = get_the_category($post->ID); $cat_link = get_category_link($categories[0]->cat_ID); echo '<a href="'.$cat_link.'"  class="cat-name">'.$categories[0]->cat_name.'</a>' ?>
						<h2 class="header-s"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<p>
							<?php if(!empty($post->post_excerpt)) { the_excerpt(); } else { echo wp_trim_words( get_the_content(), 20, '' ); } ?>
						</p>
						<a href="<?php the_permalink() ?>" rel="bookmark" class="read-more">Read More</a>
					</div>

				</article>
				<?php endwhile; endif; ?>
				<?php wp_reset_query(); ?>				
			</div>
			<?php get_sidebar(); ?>
		</div>

	</section>
</main>
<!--no div-->
<?php get_footer(); ?>