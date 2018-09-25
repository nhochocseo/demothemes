<li class="<?php if ( is_single() ) { echo 'caodung_box';} else echo 'h2_caodung_box'; ?>">
<?php
        if ( get_the_post_thumbnail() != '' ) {
                echo '<a href="'; the_permalink(); echo '" class="img-responsive thumb">';
                the_post_thumbnail();
                echo '</a>';
        } else {
                 echo '<a href="'; the_permalink(); echo '" class="img-responsive thumb">';
                 echo '<img src="';
                 echo get_first_image();
                 echo '" alt="" />';
                 echo '</a>';
               }
?>
        <?php caodung_entry_title(); ?>  
        <?php if ( !is_single() ) { caodung_entry_meta();
        caodung_entry_content(); } ?>
        <?php ( is_single() ? caodung_entry_tag() : '' ); ?>
</li>