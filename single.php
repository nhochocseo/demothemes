<?php get_header(); ?>
	<div class="row">
		<div id="main-content" class="col-md-8">
			<?php dimox_breadcrumbs(); ?>
			<div id="content">
			<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
			<div class="right">
				<span itemtype="http://schema.org/Person" itemscope="itemscope" itemprop="author">
					<i class="fa fa-user"></i> <a title="Xem các bài viết của <?php the_author(); ?>" data-toggle="tooltip" data-placement="top" rel="author" itemprop="url" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"> <span class="entry-author-name" itemprop="name"><?php the_author(); ?></span></a></span> 
				<span itemprop="datePublished"><i class="fa fa-calendar-o"></i> <?php the_time('d/m/y') ;?></span>
				<?php edit_post_link( __( '<i class="fa fa-pencil-square-o"></i> Sửa', 'caodung' )); ?>
			</div>
				
					 <?php the_content(); ?>
				<?php endwhile; endif; ?>
			</div>
						<?php
 	global $post;
	 	if (get_the_tags()) {
	 		echo '<div id="content">Tag : ';
	 	foreach(get_the_tags($post->ID) as $tag) {
	  		echo '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>,';
	  	}
	  	echo '</div>';
 	}
?>
<!--./End .main-title -->

		</div><div class="slidebar-ads">
		<div class="col-md-3">
			<?php dynamic_sidebar('sidebar_ads') ?>

<div class="main-title-single">
	 		<div class="widget-title"><span> Bài Viết Liên Quan !</span></div>
			<div class="list-post">

<?php
$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 5, 'post__not_in' => array($post->ID) ) );
if( $related )
	foreach( $related as $post ) {
	setup_postdata($post); ?>
     <?php get_template_part( 'content', get_post_format() ); ?>
<?php }
wp_reset_postdata(); ?>
</div>
		</div>
		</div>
	</div>
	</div>
<!-- Start SiderBar --><?php get_sidebar(); ?><!-- End SiderBar -->
<?php get_footer(); ?>