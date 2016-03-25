<div class="nd"><?php while (have_posts()) : the_post(); ?>
<div class="truyen">
	<div class="anhstory">
		<a class="internal-link" href='<?php the_permalink(); ?>'>
			<img src="<?php echo get_first_image(); ?>" />
		</a>
	</div>
		<h2 class="title">
				<a  class="internal-link" href='<?php the_permalink(); ?>'>
					<?php the_title(); ?>
				</a>
		</h2>
</div>
<?php endwhile; ?></div>
<?php echo caodung_pagination();?>