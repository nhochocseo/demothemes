<?php get_header(); ?>
<div class="row">
		<div id="main-content" class="col-md-8">
			<div class="main-title">
	 		<?php dimox_breadcrumbs(); ?>
				<div class="list-post">
	         	   <ul>
						<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
							 <?php get_template_part( 'content', get_post_format() ); ?>
						<?php endwhile; ?>
							<?php caodung_pagination(); ?>
						<?php else: ?>
							<?php get_template_part( 'content', 'none' ); ?>
						<?php endif; ?>
					</ul>
				</div>
			</div><!--./End .main-title -->
		</div>
		<div class="slidebar-ads">
		<div class="col-md-3">
			<?php dynamic_sidebar('sidebar_ads') ?>
		</div>
	</div>
	</div>
	<!-- Start SiderBar --><?php get_sidebar(); ?><!-- End SiderBar -->
<?php get_footer(); ?>