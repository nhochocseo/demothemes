<?php
	/* Khai báo hằng giá trị trong theme
		@THEME_URL : Đường dẫn tới thue mục theme
		@CORE : Đường dẫn tới thư mục core trong theme
	*/
define('THEME_URL', get_stylesheet_directory());
define('CORE' , THEME_URL . "/core");
	/*
		@Nhúng file init trong thư mục core
	*/
require_once(CORE . "/init.php");
	/*
		@Thiết lập chiều rộng nội dung
	*/
if (!isset($content_width)) {
	$content_width = 620;
}
	/*
		@Thiết lập chức năng của theme
	*/
if (!function_exists('caodung_demo_theme_setup')) {
function caodung_demo_theme_setup()
{
		/*
			@Thiết lập ngôn ngữ trang
		*/
	$languages_folder = THEME_URL . '/languages';
	load_theme_textdomain('caodung', $languages_folder);
		/*
			@Thêm tự động RSS vào đầu trang
		*/
	add_theme_support('automatic-feed-links');
		/*
			@Thêm ảnh Thumbnails khi post
		*/
	add_theme_support( 'post-thumbnails' );
		/*
			@Post Format
		*/
	add_theme_support('post-formats',array(
		'image',
		'video',
		'gallery',
		'quote',
		'link',
	));
		/*
			@Thêm thẻ title-tag vào <title>...</title>
		*/
	add_theme_support('title-tag');
		/*
			@Thay đổi nền background
		*/
	$default_background = array(
		'default-color' => '#ffffff'
		);
	add_theme_support('custom-background',$default_background);
		/*
			@Đăng ký Tùy chỉnh menu trang
		*/
			register_nav_menu('caodung_menu', __('Cao Dung Menu', 'caodung'));
		/*
			@Main SideBar
		*/
	$sidebar = array (
		'name' => __('Main Sidebar','caodung'),
		'id' => 'sidebar',
		'description' => __('Sidebar Demo'),
		'class' => 'main-sidebar',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>'
	);
	register_sidebar( $sidebar );
}
}
add_action('init','caodung_demo_theme_setup');
	/*
		@Tempalate Function Header
	*/
if (!function_exists('caodung_header')) {
	function caodung_header() { ?>
			<?php
								
				printf('<div id="header">
					<div class="head-container">
					<div class="heading">
					<a href="%1$s">
					<img class="logo" src="%1$s/wp-content/themes/demothemes/logo.png" alt="Kind"></a> 
					</div>
					<form action="%1$s" id="search" class="navbar-form navbar-right hidden-xs">
					<div class="form-group">
					<input type="text" name="s" placeholder=" Tìm kiếm..." class="form-control form-search" onkeyup="search();">
					</div>
					 <button type="submit" class="btn btn-success">Tìm kiếm</button>
					</form>
					</div>
					</div>',
					get_bloginfo( 'url' ),
					get_bloginfo( 'description' ),
					get_bloginfo( 'sitename' )
				);
								
			?><?php
		}
	}
		/*
			@Thiết lập thanh menu đa cấp
		*/
if (!function_exists('caodung_navitation')) {
	function caodung_navitation($menu) {
		$menu = array(
			'theme_location' => $menu,
/*			'container_class' => 'navbar-collapse collapse',*/
            'menu_class'      => 'nav navbar-nav',
            'menu_id'         => 'main-menu',
            'walker'          => new bootstrap_menu()
			);
		wp_nav_menu($menu);
	}
}
 /**
 * class bootstrap_menu()
 *
 * Extending Walker_Nav_Menu Class
 *
 * @author Gabriel Vasile
 **/
 class bootstrap_menu extends Walker_Nav_Menu {
 	function display_element ($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
      // check, whether there are children for the given ID and append it to the element with a (new) ID
      $element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]);
      return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
    // CHANGE .sub-menu INTO .dropdown-menu
    function start_lvl(&$output, $depth = 0, $args = array() ) {
      $indent = str_repeat("\t", $depth);
      $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
    }
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
    global $wp_query;
    $args = (object) $args;
    $item_html = '';
    parent::start_el($item_html, $item, $depth, $args);
 
    if (($item->hasChildren) && ($depth === 0)) {
        $item_html = str_replace('<a', '<a class="dropdown-toggle" data-toggle="dropdown" data-target="#"', $item_html);
        $item_html = str_replace('</a>', ' <b class="caret"></b></a>', $item_html);
      }
      $output .= $item_html;
    }
   }
  function bootstrap_menu_nav_menu_css_class($classes, $item) {
    // CHANGE .current-menu-item .current-menu-parent .current-menu-ancestor INTO .active
    $classes = preg_replace('/(current(-menu-|[-_]page[-_])(item|parent|ancestor))/', 'active', $classes);
    // Add the .dropdown class to the list items that have children
    if ($item->hasChildren) {
      $classes[] = 'dropdown';
    }
    return $classes;
  }
  add_filter('nav_menu_css_class', 'bootstrap_menu_nav_menu_css_class', 10, 2);
		/*
			@ Tùy chỉnh phân trang bài viết
		*/
if ( ! function_exists( 'caodung_pagination' ) ) {
  function caodung_pagination() {
    /*
     * Không hiển thị phân trang nếu trang đó có ít hơn 2 trang
     */
    if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
      return '';
    }
  ?>
 
  <nav class="pagination" role="navigation">
    <?php if ( get_next_post_link() ) : ?>
      <div class="prev"><?php next_posts_link( __('Older Posts', 'caodung') ); ?></div>
    <?php endif; ?>
 
    <?php if ( get_previous_post_link() ) : ?>
      <div class="next"><?php previous_posts_link( __('Newer Posts', 'caodung') ); ?></div>
    <?php endif; ?>
 
  </nav><?php
  }
}
		/**
		@ Hàm hiển thị ảnh thumbnail của post.
		@ Ảnh thumbnail sẽ không được hiển thị trong trang single
		@ Nhưng sẽ hiển thị trong single nếu post đó có format là Image
		@ caodung_thumbnail( $size )
		**/
if ( ! function_exists( 'get_first_image' ) ) {
  function get_first_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);  
  if(empty($output)) {
    $first_img = 'http://gioitreit.com/default.png';
  }else{
  	$first_img = $matches[1][0];
  }
  return $first_img;
}
}
 
		/**
		@ Hàm hiển thị tiêu đề của post trong .entry-header
		@ Tiêu đề của post sẽ là nằm trong thẻ <h1> ở trang single
		@ Còn ở trang chủ và trang lưu trữ, nó sẽ là thẻ <h2>
		@ caodung_entry_header()
		**/
if ( ! function_exists( 'caodung_entry_header' ) ) {
  function caodung_entry_header() {
    if ( is_single() ) : ?>
    <a class="h2_caodung_box-name" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
          <h2 class="caodung_box_title"><span> <?php the_title(); ?></span></h2>
        </a>
    <?php else : ?>
        <a class="h2_caodung_box-name" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
          <h1 class="caodung_box_title"><span> <?php the_title(); ?></span></h1>
        </a>
     <?php
 
    endif;
  }
}
 
		/**
		@ Hàm hiển thị thông tin của post (Post Meta)
		@ caodung_entry_meta()
		**/
if( ! function_exists( 'caodung_entry_meta' ) ) {
  function caodung_entry_meta() {
    if ( ! is_page() ) :
 // Hiển thị tên tác giả, tên category và ngày tháng đăng bài
        printf( __('<span class="author">Posted by %1$s</span>', 'caodung'),
          get_the_author() );
 /*
        printf( __('<span class="date-published"> at %1$s</span>', 'caodung'),
          get_the_date() );
 
        printf( __('<span class="category"> in %1$s</span>', 'caodung'),
          get_the_category_list( ', ' ) );
 
        // Hiển thị số đếm lượt bình luận
        if ( comments_open() ) :
          echo ' <span class="meta-reply">';
            comments_popup_link(
              __('Leave a comment', 'caodung'),
              __('One comment', 'caodung'),
              __('% comments', 'caodung'),
              __('Read all comments', 'caodung')
             );
          echo '</span>';
        endif;*/
    endif;
  }
}
 
		/*
		 * Thêm chữ Read More vào excerpt
		 */
function caodung_readmore() {
  return '...<a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'caodung') . '</a>';
}
add_filter( 'excerpt_more', 'caodung_readmore' );
 
		  /**
		  @ Hàm hiển thị nội dung của post type
		  @ Hàm này sẽ hiển thị đoạn rút gọn của post ngoài trang chủ (the_excerpt)
		  @ Nhưng nó sẽ hiển thị toàn bộ nội dung của post ở trang single (the_content)
		  @ caodung_entry_content()
		  **/
  if ( ! function_exists( 'caodung_entry_content' ) ) {
    function caodung_entry_content() {
 
      if ( ! is_single() ) :
        the_excerpt();
      else :
        the_content();
 
        /*
         * Code hiển thị phân trang trong post type
         */
        $link_pages = array(
          'before' => __('<p>Page:', 'caodung'),
          'after' => '</p>',
          'nextpagelink'     => __( 'Next page', 'caodung' ),
          'previouspagelink' => __( 'Previous page', 'caodung' )
        );
        wp_link_pages( $link_pages );
      endif;
 
    }
  }
 
  /**
		@ Hàm hiển thị tag của post
		@ caodung_entry_tag()
		**/
if ( ! function_exists( 'caodung_entry_tag' ) ) {
  function caodung_entry_tag() {
    if ( has_tag() ) :
      echo '<div class="entry-tag">';
      printf( __('Tagged in %1$s', 'caodung'), get_the_tag_list( '', ', ' ) );
      echo '</div>';
    endif;
  }
}
	/*
		@Nhúng tệp tin style.css vào theme
	*/
function caodung_style() {
	// Load css bootstrap desgin
	wp_register_style( 'style-css', get_template_directory_uri() . "/style.css",'all' );
	wp_enqueue_style( 'style-css' );
	// Load file thư viện (libraly bootstrap) css bootstrap
	wp_register_style( 'wpbootstrap-min',get_template_directory_uri() . "/bootstrap/css/bootstrap.min.css" );
	wp_enqueue_style( 'wpbootstrap-min' );
	wp_register_style( 'wpbootstrap-theme',get_template_directory_uri() . "/bootstrap/css/bootstrap-theme.min.css" );
	wp_enqueue_style( 'wpbootstrap-theme' );
	wp_register_style( 'wpfont-awesome',get_template_directory_uri() . "/bootstrap/font-awesome-4.5.0/css/font-awesome.min.css" );
	wp_enqueue_style( 'wpfont-awesome' );
}
add_action( 'wp_enqueue_scripts', 'caodung_style' );

?>