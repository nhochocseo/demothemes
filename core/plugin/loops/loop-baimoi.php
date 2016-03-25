<?php query_posts ('showposts=50'); while ( have_posts() ) : the_post(); ?>
	
			<article class="list"> <img src="<?php echo get_template_directory_uri(); ?>/images/icon.png" alt="<?php the_title(); ?>t">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_title(); ?>			</a>
			</h3>
		</a>
		</article>
<?php endwhile;
?>
<?php echo caodung_pagination();?>