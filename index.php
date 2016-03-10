<?php get_header(); ?>
<div id="main-content" class="row"><div id="content" class="col-md-8">
	<div class="main-title">
	  <div class="widget-title"><span><i class="fa fa-check-square-o"></i> Bài Viết Mới ?</span></div>
		<div class="list-post">
            <ul>
				<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
		 <?php get_template_part( 'content', get_post_format() ); ?>
	<?php endwhile; ?>
	<?php caodung_pagination(); ?>
		<?php else: ?>
			<?php get_template_part( 'content', 'none' ); ?>
	<?php endif; ?>
	<?php get_sidebar(); ?>		
			</ul>
		</div>
	</div><!--./End .main-title -->
</div>
</div>
<?php get_footer(); ?>