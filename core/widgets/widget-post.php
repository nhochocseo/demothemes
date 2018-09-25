<?php
/*
Plugin Name : Widget Bài Viết
Author Url : htt://facebook.com/nhochocseo
*/
add_action('widgets_init', 'caodung_post');
function caodung_post()
	{
		register_widget('caodung_post_Widget');
	}
class caodung_post_Widget extends WP_Widget {
	function __construct()
	{
		$widget_ops = array('classname' => 'caodung_post', 'description' => 'Bạn có thể Kéo thả để tạo mục bài mới với khả năng tùy chỉnh đa dạng gồm bài viết ngẫu nhiên và bài viết xem nhiều');
		$control_ops = array('id_base' => 'caodung_post');
		parent::__construct('caodung_post', 'widgets show bài viết', $widget_ops, $control_ops);
	}
function widget($args, $instance)
{
	global $post, $check_browser;
	extract($args);
	$title = $instance['title'];
	$order = $instance['order'];
	$postnum = $instance['postnum'];
?>
<?php
 if ($order == 'rand') {
 	echo '<h5 class="soll">Ngẫu nhiên <i data-toggle="tooltip" data-placement="bottom" title="Đẩy lên" class="fa iconup fa-angle-double-up"></i></h5>
			<div class="block-cat">
				<h5 class="hidele">Ngẫu nhiên <i data-toggle="tooltip" data-placement="bottom" title="Đẩy xuống" class="fa icondonwn fa-angle-double-down"></i></h5>';
 }
 if ($order == 'view') {
 	echo '<h5>Xem nhiều</h5><div class="ranpost">';
 }
?>
	<ul class="list-group">
		<?php if ($order == 'rand') { $recent_posts = new WP_Query(array( 'showposts' => $postnum, 'orderby' => 'rand' ));}
				if ($order == 'view'){ $recent_posts = new WP_Query(array( 'showposts' => $postnum, 'meta_key' => 'post_views_count', 'orderby'=> 'meta_value_num', 'order' => 'DESC' )); } ?>
			<?php 
				while($recent_posts->have_posts()): $recent_posts->the_post(); 
					get_template_part( 'core/plugin/loops/loop-mini');	
				endwhile; ?>
	</ul>
<?php
	echo "</div>";
?>
<?php
	echo $after_widget;
}
function update($new_instance, $old_instance)
{
	$instance = $old_instance;
	$instance['title'] = $new_instance['title'];
	$instance['order'] = $new_instance['order'];
	$instance['postnum'] = $new_instance['postnum'];
	return $instance;
}
function form($instance)
{
	$defaults = array('title' => 'Tiêu đề mục', 'postnum' => 5);
	$instance = wp_parse_args((array) $instance, $defaults); ?>
	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>">Tiêu đề:</label>
		<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('order'); ?>">Hiển thị bài viết trong:</label> 
		<select id="<?php echo $this->get_field_id('order'); ?>" name="<?php echo $this->get_field_name('order'); ?>" class="widefat order" style="width:100%;">
			<option value='rand' <?php if ('rand' == $instance['order']) echo 'selected="selected"'; ?>>bài viết ngẫu nhiên</option>
			<option value='view' <?php if ('view' == $instance['order']) echo 'selected="selected"'; ?>>bài viết đọc nhiều nhất</option>
		</select>
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('postnum'); ?>">Số bài hiển thị:</label>
		<input class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('postnum'); ?>" name="<?php echo $this->get_field_name('postnum'); ?>" value="<?php echo $instance['postnum']; ?>" />
	</p>
<?php
}
}
?>
<?php 
/*
Plugin Name: Widget show Category
*/
?>
<?php
class wp_widget_category extends WP_Widget {
	// constructor
	function __construct() {
		parent::__construct(
			'wp_widget_category', // Base ID
			__('Widget Show Bài viết chuyên mục'), // Name
			array( 'description' => __( 'Hiện thị danh sánh bài viết hoắc danh sách chuyên mục con ( chỉ hiện thì khi chuyên mục nào cho danh mục con )', 'wp_widget_category' ), ) // Args
		);
	}
	// widget form creation
	function form($instance) {	
		// Check values
		if( $instance) {
		    $title = esc_attr($instance['title']);
		    $content = esc_attr($instance['content']);
		    $category = esc_attr($instance['category']);
		    $style = esc_attr($instance['style']);
		    $number = esc_attr($instance['number']);
			$sobaiviet = esc_attr($instance['sobaiviet']);
		    $display = esc_attr($instance['display']);
		} else {
		    $title = 'Chuyên Mục';
		    $content = '';
		    $category = '0';
		    $style = 'news';
			$sobaiviet = '1';
		    $number = '6';
		    $display = 'post';
		}
		$args = array(
			'echo' 	=> 0,
			'hierarchical'	=> 1,
			'taxonomy'	=> 'category'
		);
		$cats_array = get_categories($args);
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Tiêu đề', 'wp_widget_ads'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Chuyên mục hiển thị:' ); ?></label> 
			<select id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>" class="widefat">
				<?php foreach( $cats_array as $category ) {  ?>
					<option value="<?php echo $category->cat_ID; ?>"<?php echo (($category->cat_ID) ? ' selected' : '') ; ?>><?php echo $category->cat_name; ?></option>
				<?php }?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'display' ); ?>"><?php _e( 'Nội dung hiển thị:' ); ?></label> 
			<select id="<?php echo $this->get_field_id( 'display' ); ?>" name="<?php echo $this->get_field_name( 'display' ); ?>" class="widefat">
				<option value="post"<?php echo (($display == 'post') ? ' selected' : '') ; ?>>Bài Viết</option>
				<option value="category"<?php echo (($display == 'category') ? ' selected' : '') ; ?>>Chuyên Mục</option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'style' ); ?>"><?php _e( 'Style hiển thị:' ); ?></label> 
			<select id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" class="widefat">
				<option value="news"<?php echo (($style == 'news') ? ' selected' : '') ; ?>>News</option>
				<option value="story"<?php echo (($style == 'story') ? ' selected' : '') ; ?>>Story</option>
				<option value="list-style"<?php echo (($style == 'list-style') ? ' selected' : '') ; ?>>List Style</option>
				<option value="video"<?php echo (($style == 'video') ? ' selected' : '') ; ?>>Video</option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Số lượng hiển thị:' ); ?></label> 
			<input type="number" class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo esc_attr( $number ); ?>" min="1" max="20" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sobaiviet' ); ?>"><?php _e( 'Số lượng bài viết hiển thị cột trái (Chỉ áp dụng cho Style List):' ); ?></label> 
			<input type="number" class="widefat" id="<?php echo $this->get_field_id( 'sobaiviet' ); ?>" name="<?php echo $this->get_field_name( 'sobaiviet' ); ?>" value="<?php echo (!empty($sobaiviet) ? esc_attr( $sobaiviet ) : '1'); ?>" min="1" max="20" />
		</p>
		<?php
	}
	// widget update
	function update($new_instance, $old_instance) {
		 $instance = $old_instance;
	    // Fields
	    $instance['title'] = $new_instance['title'];
	    $instance['content'] = strip_tags($new_instance['content']);
	    $instance['category'] = strip_tags($new_instance['category']);
	    $instance['style'] = strip_tags($new_instance['style']);
	    $instance['number'] = strip_tags($new_instance['number']);
		$instance['sobaiviet'] = strip_tags($new_instance['sobaiviet']);
	    $instance['display'] = strip_tags($new_instance['display']);
	    return $instance;
	}
	// widget display
	function widget($args, $instance) {
		extract( $args );
	   	// these are the widget options
	   	$title = apply_filters('widget_title', $instance['title']);
	   	$content = $instance['content'];
	   	$categorys = $instance['category'];
	   	$style = $instance['style'];
	   	$number = $instance['number'];
		$sobaiviet = $instance['sobaiviet'];
	   	$display = $instance['display'];
	   	$arr = array (
			'orderby' 			=> 'id',
			'order' 			=> 'DESC',
			'parent' 			=> $categorys,
			'hide_empty' 		=> 0,
			'posts_per_page'	=> $number,
		);
		$parent_categories = get_categories($arr);
	   	// Display the widget

	   	// Check if title is set
	   	if ( $title ) {
	    	echo "<div id='docs-header'> $title</div>";
	   	}
	   	// check if category is set
	   	if( $categorys ) {
	   		if ( $display == 'category' ) { 
		   		foreach ($parent_categories as $category) {
				?>
					<div class="list category-<?php echo get_the_ID(); ?>">
						<?php get_template_part( 'core/plugin/loops/loop-category' ); ?>
						<a href="<?php echo get_category_link( $category->term_id ); ?>" title="<?php echo $category->name; ?>"><?php echo $category->name; ?></a>
					</div>
				<?php
				}
			}
				elseif ( $display == 'post' ) { 
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$query = new WP_Query(  array( 'orderby' => array( 'ID' => 'DESC' ), 'cat'=> $categorys, 'posts_per_page' => $number, 'paged'=>$paged ) );
					if ( $query->have_posts() ) :
						$i = 0;
						while ( $query->have_posts() ) : $query->the_post(); 
						//global $number;
						if ( $i == 0 ) {
						get_template_part ( 'core/plugin/loops/header');
						get_template_part( 'core/plugin/loops/header/' .$style );
						}
						elseif( $i < $sobaiviet ) {
						get_template_part( 'core/plugin/loops/header/' .$style );
						 }
						 elseif ( $i == $sobaiviet) {
							 if ( in_categorys('Video Hài') ) {
							 get_template_part( 'core/plugin/loops/video');
							 }
							 else {
								 get_template_part( 'core/plugin/loops/right');
							 }
						 }
						else{ 
							get_template_part( 'core/plugin/loops/container/' .$style );
						}
						$i++;
						endwhile;
						get_template_part( 'core/plugin/loops/footer/' .$style );
						wp_reset_postdata();
					else :
						_e( 'Sorry, no posts matched your criteria.' );
					endif;
			}
	   		?>
	   		<?php
	   	} else {
	   		echo 'You don\'t select show post in category!';
	   	}
	   	// Check if content is set
	   	if( $content ) {
	      	echo $args['before_content'] . $content . $args['after_content'];
	   	}
	}
}
// register widget
add_action('widgets_init', create_function('', 'return register_widget("wp_widget_category");'));