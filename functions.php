<?php
	/* Khai báo hằng giá trị trong theme
		@THEME_URL : Đường dẫn tới thue mục theme
		@CORE : Đường dẫn tới thư mục core trong theme
	*/
define('THEME_URL', get_stylesheet_directory());
define ('THEME_NAME',   'CaoDung' );
define('CORE' , THEME_URL . "/core");
require_once(CORE . "/init.php");
require_once(CORE .'/widgets.php');
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'caodung_plugin_activation' );
function caodung_plugin_activation() {
    $plugins = array(
            // Gọi một plugin nào đó ở bên ngoài
            array(
                'name'               => 'Crayon Syntax Highlighter', // Tên của plugin
                'slug'               => 'dungcv-crayon-syntax-highlighter', // Tên thư mục plugin
                'source'             => CORE . '/plugin/crayon-syntax-highlighter.zip', // Link tải plugin - direct link
                'required'           => true, // Nếu đặt là true thì plugin này sẽ không bắt buộc phải cài mà chỉ ở dạng Recommend.
                'external_url'       => 'https://github.com/thomasgriffin/New-Media-Image-Uploader', // Nếu bạn cài plugin ở bên ngoài, không phải từ WordPress.Org thì thêm URL của trang plugin vào.
            ),
            // Gọi một plugin trong thư viện WordPress.org/plugins
            array(
                'name'      => 'BuddyPress',
                'slug'      => 'buddypress', //Tên slug của plugin trên URL
                'required'  => false,
            ),
 
        ); // end $plugins
 
    $config = array(
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Có hiển thị thông báo hay không
        'dismissable'  => true,                    // Nếu đặt false thì người dùng không thể hủy thông báo cho đến khi cài hết plugin.
        'dismiss_msg'  => '',                      // Nếu 'dismissable' là false, thì tin nhắn ở đây sẽ hiển thị trên cùng trang Admin.
        'is_automatic' => false,                   // Nếu là false thì plugin sẽ không tự động kích hoạt khi cài xong.
        'message'      => '',
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    ); // end $config
    tgmpa( $plugins, $config );
 
}
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
		'before_title' => '<h3 class="widget-title"><span>',
    'after_title' => '</span></h3>'
	);
	register_sidebar( $sidebar );

    $sidebar_ads = array (
    'name' => __('Main Sidebar ADS','caodung'),
    'id' => 'sidebar_ads',
    'description' => __('Sidebar ADS'),
    'class' => 'main-sidebar',
    'before_title' => '<h3 class="widget-title"><span>',
    'after_title' => '</span></h3>'
  );
  register_sidebar( $sidebar_ads );
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
					<img class="logo" src="%1$s/wp-content/themes/demothemes/logo.png" alt="Cao Dung Blog"></a> 
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
    $first_img = get_template_directory_uri() .'/avatar.png';
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
if ( ! function_exists( 'caodung_entry_title' ) ) {
  function caodung_entry_title() {
    if ( is_single() ) : ?>
    <a class="caodung_box-name" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
          <h2 class="caodung_box_title"><span> <?php the_title(); ?></span></h2>
        </a>
    <?php else : ?>
        <a class="h2_caodung_box-name" href="<?php the_permalink(); ?>"data-toggle="tooltip" data-placement="bottom"  rel="bookmark" title="<?php the_title_attribute(); ?>">
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
        printf( __('<span class="author">Người Đăng : <a href="%1$s" title="">%2$s</a> </span>', 'caodung'),
          get_author_posts_url( get_the_author_meta( 'ID' ) ),get_the_author() );
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
function get_linkthumuc( $id, $link = false, $separator = '/', $nicename = false, $visited = array() ) {
	$chain = '';
	$parent = get_term( $id, 'category' );
	if ( is_wp_error( $parent ) )
		return $parent;
	if ( $nicename )
		$name = $parent->slug;
	else
		$name = $parent->name;
	if ( $parent->parent && ( $parent->parent != $parent->term_id ) && !in_array( $parent->parent, $visited ) ) {
		$visited[] = $parent->parent;
		$chain .= get_category_parents( $parent->parent, $link, $separator, $nicename, $visited );
	}
	if ( $link )
		$chain .= '<a class="internal-link" href="' . esc_url( get_category_link( $parent->term_id ) ) . '">'.$name.'</a>' . $separator;
	else
		$chain .= $name.$separator;
	return $chain;
}
function dimox_breadcrumbs() {
	$delimiter = '</span><span typeof="v:Breadcrumb"> » ';
	$home = 'Trang chủ'; // chữ thay thế cho phần 'Home' link
	$before = '<span class="breadcrumb_last" property="v:title">'; // thẻ html đằng trước mỗi link
	$after = '</li></li>'; // thẻ đằng sau mỗi link
	if ( !is_home() && !is_front_page() || is_paged() ) {

	echo '<ol class="breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#">';

	global $post;
	$homeLink = get_bloginfo('url');
	echo '<span typeof="v:Breadcrumb"><a class="internal-link" href="' . $homeLink . '" rel="v:url" property="v:title">' . $home . '</a> ' . $delimiter . ' ';

	if ( is_category() ) {
	global $wp_query;
	$cat_obj = $wp_query->get_queried_object();
	$thisCat = $cat_obj->term_id;
	$thisCat = get_category($thisCat);
	$parentCat = get_category($thisCat->parent);
	if ($thisCat->parent != 0) echo(get_linkthumuc($parentCat, TRUE, ' ' . $delimiter . ' '));
	echo $before . ' <b><a class="internal-link" href="#" rel="v:url" property="v:title">' . single_cat_title('', false) . '</a></b></span></ol>' . $after;

	} elseif ( is_day() ) {
	echo '<a class="internal-link" href="' . get_year_link(get_the_time('Y')) . '" rel="v:url" property="v:title">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
	echo '<a class="internal-link" href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '" rel="v:url" property="v:title">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
	echo $before . get_the_time('d') . $after;

	} elseif ( is_month() ) {
	echo '<a class="internal-link" href="' . get_year_link(get_the_time('Y')) . '" rel="v:url" property="v:title">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
	echo $before . get_the_time('F') . $after;

	} elseif ( is_year() ) {
	echo $before . get_the_time('Y') . $after;

	} elseif ( is_single() && !is_attachment() ) {
	if ( get_post_type() != 'post' ) {
	$post_type = get_post_type_object(get_post_type());
	$slug = $post_type->rewrite;
	echo '<a class="internal-link" href="' . $homeLink . '/' . $slug['slug'] . '/" rel="v:url" property="v:title">' . $post_type->labels->singular_name . '</a> ' . $delimiter . '';
	echo $before . ''. get_the_title() . ' '. $after;
	} else {
	$cat = get_the_category(); $cat = $cat[0];
	echo get_linkthumuc($cat, TRUE, ' ' . $delimiter . ' ');
	echo $before . get_the_title() . $after. '</ol>';
	}

	} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
	$post_type = get_post_type_object(get_post_type());
    if(is_search()){
      echo $before . get_search_query() . $after;
    } else {
      echo $before . $post_type->labels->singular_name . $after;
    }
    echo '</ol>';

	} elseif ( is_attachment() ) {
	$parent = get_post($post->post_parent);
	$cat = get_the_category($parent->ID); $cat = $cat[0];
	echo get_linkthumuc($cat, TRUE, ' ' . $delimiter . ' ');
	echo '<a class="internal-link"  href="' . get_permalink($parent) . '" rel="v:url" property="v:title">' . $parent->post_title . '</a> ' . $delimiter . ' ';
	echo $before . get_the_title() . $after;

	} elseif ( is_page() && !$post->post_parent ) {
	echo $before . get_the_title() . $after;

	} elseif ( is_page() && $post->post_parent ) {
	$parent_id = $post->post_parent;
	$breadcrumbs = array();
	while ($parent_id) {
	$page = get_page($parent_id);
	$breadcrumbs[] = '<a class="internal-link"  href="' . get_permalink($page->ID) . '" rel="v:url" property="v:title">' . get_the_title($page->ID) . '</a>';
	$parent_id = $page->post_parent;
	}
	$breadcrumbs = array_reverse($breadcrumbs);
	foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
	echo $before . get_the_title() . $after;

	} elseif ( is_search() ) {
	echo $before . '<a class="internal-link" href="#" rel="v:url" property="v:title">' . get_search_query() . '</a>' . $after;
	echo '</ol>';
	} elseif ( is_tag() ) {
	echo $before . '<a class="internal-link" href="http://gioitreit.com/xem-nhieu" rel="v:url" property="v:title">Tag</a> » <a href="#" rel="v:url" property="v:title">' . single_tag_title('', false) . '</a>' . $after;
	echo '</ol>';
	} elseif ( is_author() ) {
	global $author;
	$userdata = get_userdata($author);
	echo $before . 'Bài Viết Của : <b><a class="internal-link" href="#" rel="v:url" property="v:title">' . $userdata->display_name . '</a></b>' . $after;
	echo '</ol>';
	} elseif ( is_404() ) {
	echo $before . 'Error 404' . $after;
	}

	if ( get_query_var('paged') ) {
	if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' ';
	echo __('');
	if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '';
	}

	echo '';

	}
} // end mod_breadcrumbs()

// Custom Post Types

add_action( 'init', 'create_post_types' ); // Create New Post Type

function create_post_types() {

	$labels = array(
		'name' => __( 'Books' ),
		'singular_name' => __( 'Book' ),
		'add_new' => __( 'Add New Book' ),
		'add_new_item' => __( 'Add New Book' ),
		'edit' => __( 'Edit' ),
		'edit_item' => __( 'Edit Book' ),
		'new_item' => __( 'New Book' ),
		'view' => __( 'View Book' ),
		'view_item' => __( 'View Book' ),
		'search_items' => __( 'Search Books' ),
		'not_found' => __( 'No books found' ),
		'not_found_in_trash' => __( 'No books found in Trash' ),
		'parent' => __( 'Parent Book' ),
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 20,
		'supports' => array('title','editor','thumbnail')
	); 	

	register_post_type( 'books' , $args );
	flush_rewrite_rules( false );
}
// Rename Posts to News in Menu
function wptutsplus_change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'News';
    $submenu['edit.php'][5][0] = 'News Items';
    $submenu['edit.php'][10][0] = 'Add News Item';
}
add_action( 'admin_menu', 'wptutsplus_change_post_menu_label' );
// Edit submenus
// Edit submenus
function wptutsplus_change_post_object_label() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'News';
    $labels->singular_name = 'News Item';
    $labels->add_new = 'Add News Item';
    $labels->add_new_item = 'Add News Item';
    $labels->edit_item = 'Edit News Item';
    $labels->new_item = 'News Item';
    $labels->view_item = 'View News Item';
    $labels->search_items = 'Search News Items';
    $labels->not_found = 'No News Items found';
    $labels->not_found_in_trash = 'No News Items found in Trash';
}
add_action( 'admin_menu', 'wptutsplus_change_post_object_label' );
// Remove Comments menu item for all but Administrators
function wptutsplus_remove_comments_menu_item() {
    $user = wp_get_current_user();
    if ( ! $user->has_cap( 'manage_options' ) ) {
        remove_menu_page( 'edit-comments.php' );
    }
}
add_action( 'admin_menu', 'wptutsplus_remove_comments_menu_item' );
// Move Pages above Media
function wptutsplus_change_menu_order( $menu_order ) {
    return array(
        'index.php',
        'edit.php',
        'edit.php?post_type=page',
        'upload.php',
    );
}
add_filter( 'custom_menu_order', '__return_true' );
add_filter( 'menu_order', 'wptutsplus_change_menu_order' );
	/*
		@Nhúng tệp tin style.css vào theme
	*/
function caodung_style() {
	// Load css bootstrap desgin
	wp_register_style( 'style', get_template_directory_uri() . "/style.css",'all' );
	wp_enqueue_style( 'style' );
	wp_enqueue_style( 'core', get_template_directory_uri() . "/core.css",'core-css'  );
	wp_enqueue_style( 'jQuery-CustomScrollbar', get_template_directory_uri() . "/core/css/jquery.mCustomScrollbar.min.css" );
	// Load file thư viện (libraly bootstrap) css bootstrap
	wp_enqueue_style( 'wpbootstrap-min' ,get_template_directory_uri() . "/bootstrap/css/bootstrap.min.css" );
	wp_enqueue_style( 'wpbootstrap-theme',get_template_directory_uri() . "/bootstrap/css/bootstrap-theme.min.css"  );
	wp_enqueue_style( 'wpfont-awesome',get_template_directory_uri() . "/bootstrap/font-awesome-4.5.0/css/font-awesome.min.css" );
	/*Nhúng thư viện script*/
	/*<!--[if lt IE 9]-->*/
	wp_enqueue_script( 'html5shiv', get_template_directory_uri() ."/core/js/html5shiv.min.js" );
	wp_enqueue_script( 'respond', get_template_directory_uri() ."/core/js/respond.min.js" );
	wp_enqueue_script( 'jqueryapis',"https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js" );
}
add_action( 'wp_enqueue_scripts', 'caodung_style' );

?>