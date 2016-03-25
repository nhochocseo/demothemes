<?php $count = 0; ?>
<?php while (have_posts()) : the_post(); ?>
<?php $count++; ?>
<?php if ($count== 1) : ?>
<div class="khung-chuyen-muc">
<div class="nd-chuyen-muc">
						<a class="internal-link" href="<?php the_permalink(); ?>">
							<img src="<?php echo get_first_image(); ?>" />
						<li class="textlink-chuyen-muc"><?php the_title(); ?></li>
					</a><div class="text-nd-mota"><?php echo get_excerpt(250); ?></div>
				</div>
				<div class="ndphai">
<?php elseif ($count < 6) : ?>
<li class="list-cm">
					<a class="internal-link" href="<?php the_permalink(); ?>" ><?php the_title(); ?></a>
				</li>
<?php elseif ($count == 6) : ?>
<div class="item-box">
<a  class="internal-link" href="<?php the_permalink(); ?>" rel="bookmark">
							<img src="<?php echo get_first_image(); ?>" class="img-responsive thumb lazy k-appear" alt="<?php the_title(); ?>">
</a>
								<a  class="internal-link" href="<?php the_permalink(); ?>" rel="bookmark">
								<div class="title"><span>
									<?php the_title(); ?>						</span></div>
							</a>
							<span style="font-size:12px;line-height:6px;">
								<?php echo get_excerpt(120); ?>
								</span>
													</div>
				</div></div>
				<div class="khung-chuyen-muc1">
<?php else : ?>
<li class="list-1">
					<a class="internal-link" href="<?php the_permalink(); ?>" ><?php the_title(); ?></a>
				</li>
<?php endif; ?>
<?php endwhile; ?>
</div>
<?php echo caodung_pagination();?>