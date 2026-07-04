<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}
@ini_set( 'upload_max_size' , '0.5M' );
@ini_set( 'post_max_size', '3M');
@ini_set( 'max_execution_time', '300' );

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 1920, 1440, true); // Large Thumbnail
    add_image_size('medium', 800, 600, true); // Small Thumbnail
    add_image_size('thumb-banner', '', '', true); // Medium Thumbnail
    add_image_size('thumb4x3', 400, 300, true); // Medium Thumbnail

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> '250',
	'height'			=> '168',
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="main-menu clear">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        
        //wp_enqueue_script('swiper'); // Enqueue it!
      
        wp_register_script('html5blankscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.2'); // Custom scripts
        wp_enqueue_script('html5blankscripts'); // Enqueue it!
    }
}

// Load HTML5 Blank conditional scripts


// Load HTML5 Blank styles
function html5blank_styles()
{
    wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!
}
function html5blank_styles_main()
{
    wp_register_style( 'main', get_template_directory_uri() . '/css/main.css', array(), '1.1', 'all' );
    wp_enqueue_style( 'main' );
}

function carousel_script() {
    //wp_enqueue_script('html5blank', get_template_directory_uri() . '/js/pannellum.js' , false);
    wp_enqueue_script('html5blank', get_template_directory_uri() . '/js/swiper.min.js', false); // Custom scripts
}

/*function wow_script() {
    wp_enqueue_script('html5blank', get_template_directory_uri() . '/js/wow.min.js' , false);
}*/
/*function slidepro_script() {
    wp_enqueue_script('html5blank', get_template_directory_uri() . '/js/jquery.sliderPro.min.js' , false);
}*/

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Main Sidebar', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-sidebar',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="title-widget"><span>',
        'after_title' => '</span></h3>'
    ));

    // Define widget-bottom 1
    register_sidebar(array(
        'name' => __('widget-bottom 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-bottom-1',
        // 'before_widget' => '<div id="%1$s" class="%2$s col-bottom wow fadeInUp" data-wow-delay="0.3">',
        'before_widget' => '<div id="%1$s" class="%2$s col-bottom" data-wow-delay="0.3">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="title-widget"><span>',
        'after_title' => '</span></h3>'
    ));
    // Define widget-bottom 2
    register_sidebar(array(
        'name' => __('widget-bottom 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-bottom-2',
        // 'before_widget' => '<div id="%1$s" class="%2$s col-bottom wow fadeInUp" data-wow-delay="0.6">',
        'before_widget' => '<div id="%1$s" class="%2$s col-bottom" data-wow-delay="0.6">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="title-widget"><span>',
        'after_title' => '</span></h3>'
    ));
    // Define widget-bottom 3
    register_sidebar(array(
        'name' => __('widget bottom 3', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-bottom-3',
        // 'before_widget' => '<div id="%1$s" class="%2$s col-bottom wow fadeInUp" data-wow-delay="0.9">',
        'before_widget' => '<div id="%1$s" class="%2$s col-bottom" data-wow-delay="0.9">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="title-widget"><span>',
        'after_title' => '</span></h3>'
    ));
    // Define widget-bottom 3
    register_sidebar(array(
        'name' => __('Ads Top Story', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-adstop',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        //'before_title' => '<h3 class="title-widget"><span>',
        //'after_title' => '</span></h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 30;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 50;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
        $amp_content = get_post_meta( get_the_ID(),'ampforwp_custom_content_editor', true);
    if (!empty($amp_content)) {
        $output = wp_trim_words(
        wp_strip_all_tags(html_entity_decode($amp_content)),50,'...');
    } else {
        $output = get_the_excerpt();
        $output = apply_filters('wptexturize', $output);
        $output = apply_filters('convert_chars', $output);
    }
        $output = '<p class="des">' . $output . '</p>';
        echo $output;
}

// Custom View Article link to Post
/*function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('Xem thêm', 'html5blank') . '</a>';
}*/

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_enqueue_scripts', 'carousel_script');
/*add_action('wp_enqueue_scripts', 'wow_script');
add_action('wp_enqueue_scripts', 'slidepro_script');*/
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('wp_enqueue_scripts', 'html5blank_styles_main');
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
//add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
//add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether


require_once('taxonomy/project.php');
require_once('taxonomy/property.php');
require_once('location/location.php');
require_once('metabox/metabox-post.php');
//require_once('location/locationsearch.php');



function insert_attachment($file_handler,$post_id,$setthumb='false') {
    // check to make sure its a successful upload
    if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();
    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
    require_once(ABSPATH . "wp-admin" . '/includes/file.php');
    require_once(ABSPATH . "wp-admin" . '/includes/media.php');
    $attach_id = media_handle_upload( $file_handler, $post_id );
  
    if ($setthumb) update_post_meta($post_id,'_thumbnail_id',$attach_id);
    return $attach_id;
}

/*Multi images*/
/*function fix_file_array(&$files) {
    $names = array(
        'name' => 1,
        'type' => 1,
        'tmp_name' => 1,
        'error' => 1,
        'size' => 1
    );
    foreach ($files as $key => $part) {
        // only deal with valid keys and multiple files
        $key = (string) $key;
        if (isset($names[$key]) && is_array($part)) {
            foreach ($part as $position => $value) {
                $files[$position][$key] = $value;
            }
            // remove old key reference
            unset($files[$key]);
        }
    }
}
function insert_attachment($file_handler,$post_id,$setthumb='false') {
    if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();
    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
    require_once(ABSPATH . "wp-admin" . '/includes/file.php');
    require_once(ABSPATH . "wp-admin" . '/includes/media.php');
    $attach_id = media_handle_sideload( $file_handler, $post_id );
    if ($setthumb) update_post_meta($post_id,'_thumbnail_id',$attach_id);
    return $attach_id;
}*/
/*End Multi images*/

///////////////Trường User
function add_contact_methods($profile_fields) {
$profile_fields['phone'] = 'Di động';
$profile_fields['address'] = 'Địa chỉ';
$profile_fields['facebook'] = 'Facebook';
$profile_fields['zalo'] = 'Zalo';
$profile_fields['viber'] = 'Viber';
$profile_fields['hapcoin'] = 'HAPCoin';
//$profile_fields['times_up'] = 'Lần up tin';
return $profile_fields;
}
add_filter('user_contactmethods', 'add_contact_methods');

if ( ! function_exists( 'ld_modify_contact_methods' ) ) :

    function ld_modify_contact_methods( $contactmethods ) {
        $contactmethods['linkedin'] = __( 'Linked In' );
        $contactmethods['youtube'] = __( 'YouTube' );
        $contactmethods['instagram'] = __( 'Instagram' );
        //$contactmethods['conin'] = __( 'conin' );
        unset($contactmethods['facebook']);
        unset($contactmethods['twitter']);
        unset($contactmethods['googleplus']);

        return $contactmethods;
    }
    add_filter('user_contactmethods','ld_modify_contact_methods', 10, 1);

endif;
///////////////Hết Trường User

/////////////////Search Property
//Custom template search
function template_chooser($template)
{
 global $wp_query;
 $post_type = get_query_var('post_type');
 if( isset($_GET['s']) && $post_type == 'property' )
 {
 return locate_template('search-property.php');
 }
 return $template;
}
add_filter('template_include', 'template_chooser');

/*Count view post*/
function count_post_views($post_ID) {
    $count_key = 'post_views_count'; 
    $count = get_post_meta($post_ID, $count_key, true);
    if($count == ''){
        $count = 1;
        delete_post_meta($post_ID, $count_key);
        add_post_meta($post_ID, $count_key, '0');
        return $count . ' lượt xem';
    }else{
        $count++;
        update_post_meta($post_ID, $count_key, $count);
        return $count . ' lượt xem';
        }
}
/*End Count view post*/


/*UP TIN*/
//require_once('uptin.php');

add_action( 'wp_ajax_loadpost', 'loadpost_init' );
add_action( 'wp_ajax_nopriv_loadpost', 'loadpost_init' );
function loadpost_init() {
 
    ob_start(); //bắt đầu bộ nhớ đệm
	$check_key_times_up = get_user_meta($_POST['id_user'], 'key_times_up', true);
	
	$current_time = current_time('mysql');
	if( 20 > $check_key_times_up ){
		wp_update_post(
			array (
				'ID'            => $_POST['post_id'],
				//'post_date'     => $current_time,
				'post_modified'     => $current_time,
				'post_status'   => 'publish',
			)
		);
		
		if( isset($check_key_times_up) ){
			$check_key_times_up += 1;
			update_user_meta( $_POST['id_user'], 'key_times_up', $check_key_times_up);
		}else{
			$value_times = 1;
			add_user_meta( $_POST['id_user'], 'key_times_up', $value_times);
		}
	}
	
	//wp_reset_postdata();
	//update_user_meta( $user_id, 'times_up', 3 ) ;
    $result = ob_get_clean(); //cho hết bộ nhớ đệm vào biến $result
 
    wp_send_json_success($result); // trả về giá trị dạng json
 
    die();//bắt buộc phải có khi kết thúc
}

/*Reset times up*/

$time = current_time( 'mysql' );
/*$time_stamp = strtotime($time);
$new = $time_stamp + 10;*/

wp_schedule_single_event( $time, 'reset_times_up' );
add_action( 'reset_times_up', 'set_to_first');

function set_to_first() {
    $users = get_users( array( 'fields' => array( 'ID' ) ) );
	foreach($users as $user_id){
		update_user_meta( $user_id->ID, 'key_times_up', '0');
	}
}

///////////////////



add_action('init', 'url_author_custom');
function url_author_custom() {
    global $wp_rewrite;
    $author_slug = 'chuyen-vien';
    $wp_rewrite->author_base = $author_slug;
}

//require_once('theme_options.php');
require_once('taxonomy/banner/banner_pc.php');
require_once('admin/role_user.php');


///////////////////
add_filter('wpseo_robots', '__return_false');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
function hide_wp_vers()
{
    return '';
}
// Remove Emojis
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');

// Remove Shortlink
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Disable Embed
function disable_embed()
{
    wp_dequeue_script('wp-embed');
}
add_action('wp_footer', 'disable_embed');

// Disable XML-RPC
add_filter('xmlrpc_enabled', '__return_false');

// Remove RSD Link
remove_action('wp_head', 'rsd_link');

// Hide Version
remove_action('wp_head', 'wp_generator');

// Remove WLManifest Link
remove_action('wp_head', 'wlwmanifest_link');

// Disable Heartbeat
add_action('init', 'stop_heartbeat', 1);
function stop_heartbeat()
{
    wp_deregister_script('heartbeat');
}

// Disable Dashicons in Front-end
function wpdocs_dequeue_dashicon()
{
    if (current_user_can('update_core')) {
        return;
    }
    wp_deregister_style('dashicons');
}
add_action('wp_enqueue_scripts', 'wpdocs_dequeue_dashicon');

function remove_json_api()
{
    // Remove the REST API lines from the HTML Header
    remove_action('wp_head', 'rest_output_link_wp_head', 10);
    remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

    // Remove the REST API endpoint.
    remove_action('rest_api_init', 'wp_oembed_register_route');

    // Turn off oEmbed auto discovery.
    add_filter('embed_oembed_discover', '__return_false');

    // Don't filter oEmbed results.
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

    // Remove oEmbed discovery links.
    remove_action('wp_head', 'wp_oembed_add_discovery_links');

    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action('wp_head', 'wp_oembed_add_host_js');
}
add_action('after_setup_theme', 'remove_json_api');

function custom_property_posts_per_page($query) {
    if (!is_admin() && $query->is_main_query()) {
        if (isset($_GET['post_type']) && $_GET['post_type'] == 'property') {
            $query->set('posts_per_page', 12);
        }
    }
}
add_action('pre_get_posts', 'custom_property_posts_per_page');
add_filter('show_admin_bar', '__return_false');

wp_enqueue_style(
    'main-style',
    get_stylesheet_uri(),
    [],
    time()
);

function set_post_views($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// add_filter('content_save_pre', 'clean_post_content_before_save');

// function clean_post_content_before_save($content) {

//     $content = force_balance_tags($content);

//     $allowed_tags = array(
//         'p' => array(),
//         'br' => array(),
//         'strong' => array(),
//         'img' => array(
//             'src' => true,
//             'alt' => true,
//         ),
//     );

//     return wp_kses($content, $allowed_tags);
// }

function theme_styles() {

    wp_enqueue_style(
        'theme-color',
        get_template_directory_uri() . '/css/theme.css'
    );

}
add_action('wp_enqueue_scripts', 'theme_styles');

function custom_property_banner_style() {

    wp_enqueue_style(
        'property-banner-style',
        get_template_directory_uri() . '/css/property-banner.css',
        array(),
        '1.0'
    );

}

add_action('wp_enqueue_scripts', 'custom_property_banner_style');

function custom_property_search_filter($query) {
    if (
        !is_admin()
        && $query->is_main_query()
        && isset($_GET['post_type'])
        && $_GET['post_type'] == 'property'
    ) {
        $meta_query = array();
        $tax_query = array();

         if (isset($_GET['area_min']) && $_GET['area_min'] !== '' && isset($_GET['area_max']) && $_GET['area_max'] !== '' ) {
            $area_min = (float) $_GET['area_min'];
            $area_max = (float) $_GET['area_max'];

            if ($area_min > 0 || $area_max < 500) {
                $meta_query[] = array(
                    'key'     => 'prefix-area',
                    'value'   => array($area_min, $area_max),
                    'compare' => 'BETWEEN',
                    'type'    => 'NUMERIC'
                );
            }

        } elseif (!empty($_GET['area_range']) && $_GET['area_range'] != '0') {
            $area = explode('-', $_GET['area_range']);
            if ($area[1] == 'max') {
                $meta_query[] = array(
                    'key'     => 'prefix-area',
                    'value'   => $area[0],
                    'compare' => '>=',
                    'type'    => 'NUMERIC'
                );
            } else {
                $meta_query[] = array(
                    'key'     => 'prefix-area',
                    'value'   => array($area[0], $area[1]),
                    'compare' => 'BETWEEN',
                    'type'    => 'NUMERIC'
                );
            }
        }
        
        if (isset($_GET['price_min']) && $_GET['price_min'] !== '' && isset($_GET['price_max']) && $_GET['price_max'] !== '') {
            $price_min = (float) $_GET['price_min'] * 1000000;
            $price_max = (float) $_GET['price_max'] * 1000000;

            if ($price_min > 0 || $price_max < 60000000000) {
                $meta_query[] = array(
                    'key'     => 'prefix-price',
                    'value'   => array($price_min, $price_max),
                    'compare' => 'BETWEEN',
                    'type'    => 'NUMERIC'
                );
            }
        } elseif (!empty($_GET['price_range']) && $_GET['price_range'] != '0') {
            $price = explode('-', $_GET['price_range']);
            $min = (float)$price[0] * 1000000;
            if ($price[1] == 'max') {
                $meta_query[] = array(
                    'key'     => 'prefix-price',
                    'value'   => $min,
                    'compare' => '>=',
                    'type'    => 'NUMERIC'
                );
            } else {
                $max = (float)$price[1] * 1000000;
                $meta_query[] = array(
                    'key'     => 'prefix-price',
                    'value'   => array($min, $max),
                    'compare' => 'BETWEEN',
                    'type'    => 'NUMERIC'
                );
            }
        }

        if (!empty($_GET['bedroom'])) {
            $bedrooms = array_map('sanitize_text_field', (array) $_GET['bedroom']);
            $meta_query[] = array(
                'key'     => 'prefix-bedroom',
                'value'   => $bedrooms,
                'compare' => 'IN'
            );
        }

        if (!empty($_GET['bathroom'])) {
            $bathrooms = array_map('sanitize_text_field', (array) $_GET['bathroom']);
            $meta_query[] = array(
                'key'     => 'prefix-bathroom',
                'value'   => $bathrooms,
                'compare' => 'IN'
            );
        }
       if (!empty($_GET['direction_filter'])) {
            $directions = array_map(
                'intval',
                (array) $_GET['direction_filter']
            );
            $tax_query[] = array(
                'taxonomy' => 'property_direction',
                'field'    => 'term_id',
                'terms'    => $directions,
                'operator' => 'IN'
            );
        }
        
        if (!empty($tax_query)) {
            $query->set('tax_query', $tax_query);
        }

        if (!empty($meta_query)) {
            $query->set('meta_query', $meta_query);
        }
    }
}
add_action('pre_get_posts', 'custom_property_search_filter');

// OTP
add_action('wp_ajax_nopriv_send_phone_otp','send_phone_otp');
add_action('wp_ajax_send_phone_otp','send_phone_otp');
function send_phone_otp(){
    global $wpdb;
    $phone = sanitize_text_field($_POST['phone']);
    $user_table = $wpdb->prefix . 'custom_users';
    $otp_table  = $wpdb->prefix . 'phone_otp';
    $type  = sanitize_text_field($_POST['type'] ?? 'register');

    // CHECK USER 
    $user_exists = $wpdb->get_var(
        $wpdb->prepare(
            "
            SELECT id
            FROM $user_table
            WHERE phone = %s
            LIMIT 1 ", $phone )
    );

    // REGISTER
    if($type === 'register' && $user_exists){
        wp_send_json_error([
            'message' => 'Tài khoản đã tồn tại'
        ]);
    }

    // FORGOT PASSWORD
    if($type === 'forgot' && !$user_exists){
        wp_send_json_error([
            'message' => 'Số điện thoại chưa đăng ký'
        ]);
    }

    if(empty($phone)){
        wp_send_json_error(['message' => 'Số điện thoại không hợp lệ']);
    }

    $table = $wpdb->prefix . 'phone_otp';
    $today = current_time('Y-m-d');
    $count_today = $wpdb->get_var(
        $wpdb->prepare(
            "
            SELECT COUNT(*)
            FROM $otp_table
            WHERE phone = %s
            AND DATE(created_at) = %s ", $phone, $today)
    );

    if($count_today >= 5){
        wp_send_json_error(['message' => 'Bạn đã đạt giới hạn 5 lần gửi OTP hôm nay']);
    }

    $otp = random_int(100000, 999999);
    $expired = date('Y-m-d H:i:s',current_time('timestamp') + 300);
    $result = $wpdb->insert(
        $table,
        [
            'phone'      => $phone,
            'otp'        => $otp,
            'expired_at' => $expired,
            'is_used'    => 0
        ],['%s','%s','%s','%d']
    );
    if(!$result){
        wp_send_json_error(['message' => 'Không thể tạo OTP']);
    }
    wp_send_json_success([
        'message' => 'OTP đã được gửi thành công'
    ]);
}

add_action('wp_ajax_nopriv_verify_otp', 'verify_otp');
add_action('wp_ajax_verify_otp', 'verify_otp');
function verify_otp(){
    global $wpdb;
    $phone = sanitize_text_field($_POST['phone']);
    $otp   = sanitize_text_field($_POST['otp']);
    $table = $wpdb->prefix . 'phone_otp';

    $row = $wpdb->get_row(
        $wpdb->prepare(
            "
            SELECT *
            FROM $table
            WHERE phone = %s
            AND is_used = 0
            ORDER BY id DESC LIMIT 1",$phone)
    );

    if(!$row){
        wp_send_json_error(['message' => 'Không tìm thấy OTP']);
    }
    if (strtotime($row->expired_at) < current_time('timestamp')) {
        wp_send_json_error(['message' => 'OTP đã hết hạn']);
    }
    if($row->otp !== $otp){
        wp_send_json_error(['message' => 'OTP không đúng']);
    }

    $wpdb->update(
        $table,
        ['is_used' => 1],['id' => $row->id],
        ['%d'],['%d']
    );
    wp_send_json_success(['message' => 'Xác thực thành công']);
}

// REGISTER 
add_action('wp_ajax_nopriv_register_user', 'register_user');
add_action('wp_ajax_register_user', 'register_user');
function register_user(){
    global $wpdb;
    $phone = sanitize_text_field($_POST['phone']);
    $password = $_POST['password'];

    if(empty($phone) || empty($password)){
        wp_send_json_error(['message' => 'Thiếu dữ liệu']);
    }

    $full_name = 'user' . random_int(1000000, 9999999);
    $table = $wpdb->prefix . 'custom_users';
    $insert = $wpdb->insert(
        $table,
        [
            'username'  => $full_name,
            'phone'     => $phone,
            'password'  => password_hash($password, PASSWORD_DEFAULT),
            'full_name' => $full_name,
            'status'    => 1,    // active
        ],
        ['%s', '%s', '%s', '%s', '%d']
    );

    $user_id = $wpdb->insert_id;
    $_SESSION['custom_user_id'] = $user_id;

    wp_send_json_success([
        'message'  => 'Đăng ký thành công',
        'redirect' => home_url('/')
    ]);
}

// LOGIN 
add_action('wp_ajax_nopriv_login_user','login_user');
add_action('wp_ajax_login_user','login_user');
function login_user(){
    global $wpdb;
    $phone = sanitize_text_field($_POST['phone']);
    $password = $_POST['password'];
    $table = $wpdb->prefix . 'custom_users';

    $user = $wpdb->get_row(
        $wpdb->prepare(
            "
            SELECT *
            FROM $table
            WHERE phone=%s ",$phone)
    );

    if(!$user){
        wp_send_json_error(['message' => 'Tài khoản không tồn tại']);
    }
    if(!password_verify($password,$user->password)){
        wp_send_json_error([ 'message' => 'Sai mật khẩu']);
    }
    $_SESSION['custom_user_id'] = $user->id;
    wp_send_json_success([
        'message'  => 'Đăng nhập thành công',
        'redirect' => home_url()
    ]);
}

add_action('init', 'custom_logout_user');
function custom_logout_user() {
    if (isset($_GET['custom_logout']) && $_GET['custom_logout'] == 1) {
        unset($_SESSION['custom_user_id']);
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_destroy();
        }
        wp_safe_redirect(home_url());
        exit;
    }
}

function theme_scripts() {
    wp_enqueue_script(
        'password-validation',
        get_template_directory_uri() . '/js/password-validation.js',
        array(), null, true
    );
}
add_action('wp_enqueue_scripts', 'theme_scripts');

add_action('wp_ajax_nopriv_custom_reset_password', 'custom_reset_password');
add_action('wp_ajax_custom_reset_password', 'custom_reset_password');
function custom_reset_password(){
    global $wpdb;
    $phone = sanitize_text_field($_POST['phone'] ?? '');
    $password = $_POST['password'] ?? '';
    $table = $wpdb->prefix . 'custom_users';
    $user = $wpdb->get_row( $wpdb->prepare("SELECT * FROM $table WHERE phone = %s", $phone));

    if(!$user){
        wp_send_json_error(['message' => 'Không tìm thấy tài khoản']);
    }

    $wpdb->update(
        $table,
        [
            'password' => password_hash(
                $password,
                PASSWORD_DEFAULT
            )
        ],
        ['id' => $user->id],['%s'],['%d']
    );

    $_SESSION['custom_user_id'] = $user->id;
    wp_send_json_success([
        'message'  => 'Đổi mật khẩu thành công',
        'redirect' => home_url('/')
    ]);
}

function start_custom_session(){
    if( !session_id()){
        session_start();
    }
}
add_action('init', 'start_custom_session', 1);

function ql_register_rewrite_rules() {
    add_rewrite_rule(
        '^quan-ly-tai-khoan/([a-z0-9-]+)/?$',
        'index.php?pagename=quan-ly-tai-khoan&tab=$matches[1]',
        'top'
    );
}
add_action('init', 'ql_register_rewrite_rules');

function ql_register_query_vars($vars) {
    $vars[] = 'tab';
    return $vars;
}
add_filter('query_vars', 'ql_register_query_vars');

// PROFILE 
function get_current_custom_user() {
    global $wpdb;
    if (empty($_SESSION['custom_user_id'])) {
        return null;
    }
    $table = $wpdb->prefix . 'custom_users';
    return $wpdb->get_row( $wpdb->prepare("SELECT * FROM $table WHERE id = %d", $_SESSION['custom_user_id']));
}

function custom_get_user($user_id = 0){
    global $wpdb;
    if(!$user_id){
        $user_id = $_SESSION['custom_user_id'] ?? 0;
    }

    if(!$user_id){
        return false;
    }
    return $wpdb->get_row($wpdb->prepare("SELECT * FROM {$wpdb->prefix}custom_users WHERE id=%d",$user_id));
}

function custom_get_addresses($user_id){
    global $wpdb;
    return $wpdb->get_results($wpdb->prepare("SELECT *FROM {$wpdb->prefix}custom_user_addresses WHERE user_id=%d ORDER BY is_default DESC,id DESC",$user_id));
}

function get_current_custom_avatar() {
    $user = get_current_custom_user();
    if (!$user || empty($user->full_name)) {
        return "?";
    }
    $name = trim($user->full_name);
    $parts = preg_split('/\s+/', $name);
    $lastName = end($parts);
    return mb_strtoupper(mb_substr($lastName, 0, 1, "UTF-8"),"UTF-8");
}
function get_author_name_avatar($author_name) {
    if (empty($author_name)) {
        return '?';
    }
    $author_name = trim($author_name);
    $parts = preg_split('/\s+/', $author_name);
    $last_name = end($parts);

    return mb_strtoupper(
        mb_substr($last_name, 0, 1, 'UTF-8'),
        'UTF-8'
    );
}

function custom_save_profile( int $user_id, array $data, array $addr ) {
    global $wpdb;
    $table_users = $wpdb->prefix . 'custom_users';
    $table_addr  = $wpdb->prefix . 'custom_user_addresses';
    $updated = $wpdb->update($table_users,$data,[ 'id' => $user_id ]);
 
    if ( $updated === false ) {
        return new WP_Error( 'db_error', 'Không thể lưu thông tin. Vui lòng thử lại.' );
    }
    $existing = $wpdb->get_var( $wpdb->prepare("SELECT id FROM $table_addr WHERE user_id = %d AND is_default = 1 LIMIT 1", $user_id));
    if ( $existing ) {
        $wpdb->update( $table_addr, $addr, [ 'id' => $existing ] );
    } else {
        $wpdb->insert( $table_addr, array_merge( $addr, [ 'user_id' => $user_id,'label' => 'Mặc định', 'is_default' => 1,]));
    }
    return true;
}

function custom_get_default_address( $user_id ) {
    global $wpdb;
    return $wpdb->get_row($wpdb->prepare("SELECT * FROM {$wpdb->prefix}custom_user_addresses WHERE user_id = %d AND is_default = 1 LIMIT 1",$user_id));
}

function custom_validate_profile_data( array $post ): array {
    $errors = [];
    $data   = [];
    $display_name = sanitize_text_field( $post['display_name'] ?? '' );
    if ( $display_name === '' ) {
        $errors[] = 'Tên hiển thị không được để trống.';
    } else {
        $data['full_name'] = $display_name;
    }
 
    $id_card = preg_replace( '/\D/', '', $post['id_card'] ?? '' );
    if ( $id_card !== '' && ! preg_match( '/^(\d{9}|\d{12})$/', $id_card ) ) {
        $errors[] = 'Số CCCD/CMND phải là 9 hoặc 12 chữ số.';
    } else {
        $data['citizen_id'] = $id_card;
    }
 
    $gender = sanitize_key( $post['gender'] ?? '' );
    if ( in_array( $gender, [ 'male', 'female', 'other', '' ], true ) ) {
        $data['gender'] = $gender ?: null;
    }
 
    $birth_date = sanitize_text_field( $post['birth_date'] ?? '' );
    if ( $birth_date !== '' ) {
        $ts = strtotime( $birth_date );
        if ( ! $ts || $ts > strtotime( '-10 years' ) || $ts < strtotime( '1930-01-01' ) ) {
            $errors[] = 'Ngày sinh không hợp lệ.';
        } else {
            $data['birthday'] = date( 'Y-m-d', $ts );
        }
    } else {
        $data['birthday'] = null;
    }
    $phone = preg_replace( '/\D/', '', $post['phone'] ?? '' );
    if ( $phone !== '' && ! preg_match( '/^(0[3-9]\d{8})$/', $phone ) ) {
        $errors[] = 'Số điện thoại không hợp lệ (10 số, bắt đầu bằng 03-09).';
    } else {
        $data['phone'] = $phone ?: null;
    }
    $email = sanitize_email($post['email'] ?? '');
    if (!empty($email) && !is_email($email)) {
        $errors[] = 'Email không hợp lệ.';
    } else {
        $data['email'] = $email;
    }

    $data['address'] = sanitize_textarea_field( $post['address'] ?? '' ) ?: null;
    $data['bio'] = sanitize_textarea_field( $post['bio'] ?? '' ) ?: null;
    $data['company_name']    = sanitize_text_field( $post['company_name']    ?? '' ) ?: null;
    $data['tax_code']        = sanitize_text_field( $post['tax_code']        ?? '' ) ?: null;
    $data['company_address'] = sanitize_text_field( $post['company_address'] ?? '' ) ?: null;
     $addr = [
        'province' => sanitize_text_field( $post['province'] ?? '' ) ?: null,
        'district' => sanitize_text_field( $post['district'] ?? '' ) ?: null,
        'ward'     => sanitize_text_field( $post['ward']     ?? '' ) ?: null,
        'address'  => sanitize_text_field( $post['address']  ?? '' ) ?: null,
    ];
    return [ 'data' => $data, 'address' => $addr, 'errors' => $errors ];
}

function custom_handle_change_password( int $user_id, array $post ): array {
    global $wpdb;
 
    $current_pw = $post['current_password']  ?? '';
    $new_pw     = $post['new_password']      ?? '';
    $confirm_pw = $post['confirm_password']  ?? '';
 
    if ( $current_pw === '' || $new_pw === '' || $confirm_pw === '' ) {
        return [ 'success' => false, 'message' => 'Vui lòng điền đầy đủ tất cả các trường.' ];
    }
 
    if ( $new_pw !== $confirm_pw ) {
        return [ 'success' => false, 'message' => 'Mật khẩu xác nhận không khớp.' ];
    }

    if (strlen( $new_pw ) < 8 || ! preg_match( '/[A-Z]/', $new_pw ) || ! preg_match( '/[0-9]/', $new_pw )) {
        return [ 'success' => false, 'message' => 'Mật khẩu mới cần ít nhất 8 ký tự, 1 chữ hoa và 1 chữ số.' ];
    }

    $table = $wpdb->prefix . 'custom_users';
    $user  = $wpdb->get_row($wpdb->prepare( "SELECT password FROM $table WHERE id = %d", $user_id ));
    if ( ! $user ) {
        return [ 'success' => false, 'message' => 'Không tìm thấy tài khoản.' ];
    }
    if ( ! password_verify( $current_pw, $user->password ) ) {
        return [ 'success' => false, 'message' => 'Mật khẩu hiện tại không đúng.' ];
    }
    if ( password_verify( $new_pw, $user->password ) ) {
        return [ 'success' => false, 'message' => 'Mật khẩu mới không được trùng mật khẩu cũ.' ];
    }
    $updated = $wpdb->update($table, [ 'password' => password_hash( $new_pw, PASSWORD_DEFAULT ) ],[ 'id' => $user_id ],[ '%s' ],[ '%d' ]);
    if ( $updated === false ) {
        return [ 'success' => false, 'message' => 'Có lỗi xảy ra, vui lòng thử lại.' ];
    }
    return [ 'success' => true, 'message' => 'Đổi mật khẩu thành công.' ];
}

function custom_handle_lock_account( int $user_id, array $post ): array {
    global $wpdb;
    $password    = $post['lock_password'] ?? '';
    $lock_action = sanitize_key( $post['lock_action'] ?? 'lock' );
 
    if ( $password === '' ) {
        return [ 'success' => false, 'message' => 'Vui lòng nhập mật khẩu để xác nhận.' ];
    }
    $table = $wpdb->prefix . 'custom_users';
    $user  = $wpdb->get_row($wpdb->prepare( "SELECT id, password, status FROM $table WHERE id = %d", $user_id ));
 
    if ( ! $user ) {
        return [ 'success' => false, 'message' => 'Không tìm thấy tài khoản.' ];
    }
 
    if ( ! password_verify( $password, $user->password ) ) {
        return [ 'success' => false, 'message' => 'Mật khẩu không đúng.' ];
    }
 
    $current_locked = (int) $user->status === 1;
    if ( $lock_action === 'lock' && $current_locked ) {
        return [ 'success' => false, 'message' => 'Tài khoản đã bị khóa trước đó.' ];
    }
    if ( $lock_action === 'unlock' && ! $current_locked ) {
        return [ 'success' => false, 'message' => 'Tài khoản đang hoạt động bình thường.' ];
    }
 
    $new_status = ( $lock_action === 'lock' ) ? 1 : 0;
 
    $updated = $wpdb->update($table,['status'    => $new_status,'locked_at' => $new_status === 1 ? current_time( 'mysql' ) : null,],[ 'id' => $user_id ],[ '%d', '%s' ], [ '%d' ]);
 
    if ( $updated === false ) {
        return [ 'success' => false, 'message' => 'Có lỗi xảy ra, vui lòng thử lại.' ];
    }
    $msg = $new_status === 1 ? 'Tài khoản đã được khóa thành công.' : 'Tài khoản đã được mở khóa thành công.';
    return [ 'success' => true, 'message' => $msg, 'new_status' => $new_status ];
}
 
function custom_handle_delete_account( int $user_id, array $post ): array {
    global $wpdb;
    $confirm_text = trim( $post['delete_confirm_text'] ?? '' );
    $password     = $post['delete_password'] ?? '';
    if ( $confirm_text !== 'XOA TAI KHOAN' ) {
        return [ 'success' => false, 'message' => 'Cụm từ xác nhận không đúng. Vui lòng nhập "XOA TAI KHOAN".' ];
    }
 
    if ( $password === '' ) {
        return [ 'success' => false, 'message' => 'Vui lòng nhập mật khẩu để xác nhận.' ];
    }
 
    $table_users = $wpdb->prefix . 'custom_users';
    $user = $wpdb->get_row($wpdb->prepare( "SELECT id, password FROM $table_users WHERE id = %d", $user_id ));
 
    if ( ! $user ) {
        return [ 'success' => false, 'message' => 'Không tìm thấy tài khoản.' ];
    }
 
    if ( ! password_verify( $password, $user->password ) ) {
        return [ 'success' => false, 'message' => 'Mật khẩu không đúng.' ];
    }

    $wpdb->query( 'START TRANSACTION' );
    try {
        $wpdb->delete( $wpdb->prefix . 'custom_user_addresses', [ 'user_id' => $user_id ], [ '%d' ] );
        $deleted = $wpdb->delete( $table_users, [ 'id' => $user_id ], [ '%d' ] );
        if ( $deleted === false ) {
            throw new Exception( 'Không thể xóa tài khoản khỏi database.' );
        }
        $wpdb->query( 'COMMIT' );
        return [ 'success' => true, 'message' => 'Tài khoản đã được xóa vĩnh viễn.' ];
    } catch ( Exception $e ) {
        $wpdb->query( 'ROLLBACK' );
        return [ 'success' => false, 'message' => 'Có lỗi xảy ra: ' . $e->getMessage() ];
    }
}

//FAVORITE
function is_favorited(int $user_id, int $post_id): bool {
    if (!$user_id || !$post_id) return false;
    global $wpdb;
    return (bool) $wpdb->get_var($wpdb->prepare(
        "SELECT id
         FROM {$wpdb->prefix}custom_favorites
         WHERE user_id = %d AND post_id = %d
         LIMIT 1",
        $user_id, $post_id
    ));
}

function add_favorite(int $user_id, int $post_id, string $folder = 'Mặc định', string $note = ''): array {
    global $wpdb;
    if (!$user_id) return ['success' => false, 'message' => 'Chưa đăng nhập.'];
    if (!$post_id) return ['success' => false, 'message' => 'Tin không hợp lệ.'];
 
    if (is_favorited($user_id, $post_id)) {
        return ['success' => true,'already_saved'=> true,'id' => 0, 'message' => 'Tin đã được lưu trước đó.',];
    }
    $price_at_save = get_post_meta($post_id, 'prefix-price', true) ?: null;
    $ok = $wpdb->insert(
        $wpdb->prefix . 'custom_favorites',
        [
            'user_id'      => $user_id,
            'post_id'      => $post_id,
            'folder'       => sanitize_text_field($folder),
            'note'         => sanitize_textarea_field($note),
            'created_at'   => current_time('mysql'),],
        ['%d', '%d', '%s', '%s', '%s']
    );
 
    if (!$ok) {
        return ['success' => false, 'already_saved' => false, 'id' => 0, 'message' => 'Lưu thất bại.'];
    }
    return ['success' => true,'already_saved'=> false,'id' => (int) $wpdb->insert_id,'message' => 'Đã lưu tin thành công.',];
}
 
function remove_favorite(int $user_id, int $post_id): array {
    global $wpdb;
    if (!$user_id) return ['success' => false, 'message' => 'Chưa đăng nhập.'];
 
    if (!is_favorited($user_id, $post_id)) {
        return ['success' => false, 'message' => 'Tin chưa được lưu.'];
    }

    $ok = $wpdb->delete( $wpdb->prefix . 'custom_favorites',['user_id' => $user_id, 'post_id' => $post_id],['%d', '%d']);
    return $ok ? ['success' => true,  'message' => 'Đã bỏ lưu tin.'] : ['success' => false, 'message' => 'Xoá thất bại.'];
}
 
function toggle_favorite(int $user_id, int $post_id, string $folder = 'Mặc định'): array {
    if (is_favorited($user_id, $post_id)) {
        $result = remove_favorite($user_id, $post_id);
        $result['action'] = 'removed';
        return $result;
    }
    $result = add_favorite($user_id, $post_id, $folder);
    $result['action'] = 'added';
    return $result;
}
 
function count_favorites(int $user_id): int {
    if (!$user_id) return 0;
    global $wpdb;
    return (int) $wpdb->get_var($wpdb->prepare(
        "SELECT COUNT(*)
         FROM {$wpdb->prefix}custom_favorites
         WHERE user_id = %d", $user_id));
}
 
function get_favorite_folders(int $user_id): array {
    if (!$user_id) return [];
    global $wpdb;
    return $wpdb->get_results($wpdb->prepare(
        "SELECT folder, COUNT(*) AS total
         FROM {$wpdb->prefix}custom_favorites
         WHERE user_id = %d
         GROUP BY folder
         ORDER BY total DESC", $user_id)) ?: [];
}

function update_favorite_note(int $user_id, int $post_id, string $note): bool {
    if (!$user_id || !$post_id) return false;
    global $wpdb;
    $result = $wpdb->update(
        $wpdb->prefix . 'custom_favorites',
        ['note' => sanitize_textarea_field($note)],
        ['user_id' => $user_id, 'post_id' => $post_id],
        ['%s'],['%d', '%d']);
    return $result !== false;
}

function toggle_favorite_notify_price(int $user_id, int $post_id): bool {
    if (!$user_id || !$post_id) return false;
    global $wpdb;
    $table = $wpdb->prefix . 'custom_favorites';
    $current = (int) $wpdb->get_var($wpdb->prepare("SELECT notify_price FROM $table WHERE user_id = %d AND post_id = %d",$user_id, $post_id));
    $result = $wpdb->update(
        $table,
        ['notify_price' => $current ? 0 : 1],
        ['user_id' => $user_id, 'post_id' => $post_id],
        ['%d'], ['%d', '%d']);

    return $result !== false;
}

function get_favorites(int $user_id, string $folder = '', int $per_page = 20, int $page = 1): array {
    global $wpdb;
    if (!$user_id) return ['items' => [], 'total' => 0, 'pages' => 0];
    $offset = ($page - 1) * $per_page;
    $table  = $wpdb->prefix . 'custom_favorites';
 
    if ($folder !== '') {
        $where_sql   = $wpdb->prepare("f.user_id = %d AND f.folder = %s", $user_id, $folder);
        $count_where = $wpdb->prepare("user_id = %d AND folder = %s", $user_id, $folder);
    } else {
        $where_sql   = $wpdb->prepare("f.user_id = %d", $user_id);
        $count_where = $wpdb->prepare("user_id = %d", $user_id);
    }
 
    $rows = $wpdb->get_results(
        "SELECT f.id, f.post_id, f.folder, f.note, f.notify_price, f.notify_status, f.created_at, p.post_title, p.post_status, p.post_date
         FROM $table f
         LEFT JOIN {$wpdb->posts} p ON p.ID = f.post_id
         WHERE $where_sql
         ORDER BY f.created_at DESC
         LIMIT $per_page OFFSET $offset") ?: [];
 
    foreach ($rows as &$row) {
        $pid             = (int) $row->post_id;
        $row->permalink  = get_permalink($pid);
        $row->thumbnail  = get_the_post_thumbnail_url($pid, 'medium') ?: '';
        $row->price      = get_post_meta($pid, 'prefix-price',   true);
        $row->area       = get_post_meta($pid, 'prefix-area',    true);
        $row->address    = get_post_meta($pid, 'prefix-address', true);
    }
    unset($row);
    $total = (int) $wpdb->get_var("SELECT COUNT(*) FROM $table WHERE $count_where");
    return ['items' => $rows,'total' => $total,'pages' => (int) ceil($total / $per_page),];
}

require_once get_template_directory() . '/authentication/favorite-ajax.php';

//WALLET
function get_user_wallet($user_id) {
    global $wpdb;

    $wallet = $wpdb->get_row(
        $wpdb->prepare(
            "SELECT * FROM {$wpdb->prefix}custom_wallets WHERE user_id = %d",
            $user_id
        )
    );

    $balance_main  = $wallet ? (float) $wallet->balance_main : 0;
    $balance_bonus = $wallet ? (float) $wallet->balance_bonus : 0;

    return [
        'wallet'         => $wallet,
        'balance_main'   => $balance_main,
        'balance_bonus'  => $balance_bonus,
        'balance_total'  => $balance_main + $balance_bonus,
    ];
}

//UPLOAD POST
add_action('init', function () {
    if (!post_type_exists('property')) {
        register_post_type('property', [
            'public'      => true,
            'label'       => 'Bất động sản',
            'supports'    => ['title', 'editor', 'thumbnail', 'custom-fields'],
            'has_archive' => true,
            'rewrite'     => ['slug' => 'bat-dong-san'],
        ]);
    }
});

function dt_get_wp_user_id(object $custom_user): int {
    if (!empty($custom_user->email)) {
        $wp_user = get_user_by('email', $custom_user->email);
        if ($wp_user instanceof WP_User) {
            return (int) $wp_user->ID;
        }
    }
    return 1;
}
 
function dt_insert_listing(int $post_id, int $custom_user_id, int $days = 30): bool {
    global $wpdb;
 
    $expired_at = date('Y-m-d', strtotime("+{$days} days"));
    $result = $wpdb->insert(
        $wpdb->prefix . 'custom_post_listings',
        [
            'post_id'        => $post_id,
            'custom_user_id' => $custom_user_id,
            'plan'           => 'free',
            'status'         => 'pending', 
            'expired_at'     => $expired_at,
        ],
        ['%d', '%d', '%d', '%s', '%s', '%s']
    );
    return $result !== false;
}
 
add_action('transition_post_status', 'dt_on_post_approved', 10, 3);
function dt_on_post_approved(string $new, string $old, WP_Post $post): void {
    if ($post->post_type !== 'property') return;
    if ($new !== 'publish' || $old === 'publish') return;
 
    global $wpdb;
    $table = $wpdb->prefix . 'custom_post_listings';
    $row = $wpdb->get_row($wpdb->prepare(
        "SELECT * FROM $table WHERE post_id = %d", $post->ID
    ));
    if (!$row) return;

    $expired_at = (!empty($row->expired_at) && strtotime($row->expired_at) > time())
        ? $row->expired_at
        : date('Y-m-d', strtotime('+30 days'));
    $wpdb->update(
        $table,
        ['status' => 'active', 'expired_at' => $expired_at],
        ['post_id' => $post->ID],
        ['%s', '%s'],
        ['%d']
    );
    update_post_meta($post->ID, '_expired_at', $expired_at);
}
 
add_action('dt_check_expired_listings', 'dt_expire_old_listings');
function dt_expire_old_listings(): void {
    global $wpdb;
    $table = $wpdb->prefix . 'custom_post_listings';
    $expired_posts = $wpdb->get_col($wpdb->prepare(
        "SELECT post_id FROM $table WHERE status = 'active' AND expired_at < %s",
        date('Y-m-d')
    ));
 
    foreach ($expired_posts as $post_id) {
        wp_update_post(['ID' => (int)$post_id, 'post_status' => 'draft']);
        $wpdb->update(
            $table,
            ['status' => 'expired'],
            ['post_id' => (int)$post_id],
            ['%s'], ['%d']
        );
    }
}
 
if (!wp_next_scheduled('dt_check_expired_listings')) {
    wp_schedule_event(time(), 'daily', 'dt_check_expired_listings');
}

function dt_upload_image(array $file, int $parent_post_id = 0): int|WP_Error {
    $allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
 
    if (!in_array($file['type'], $allowed_types, true)) {
        return new WP_Error('invalid_type', 'Định dạng ảnh không hợp lệ: ' . esc_html($file['name']));
    }
    if ($file['size'] > 10 * 1024 * 1024) {
        return new WP_Error('too_large', 'Ảnh vượt quá 10MB: ' . esc_html($file['name']));
    }
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return new WP_Error('upload_err', 'Lỗi upload: ' . esc_html($file['name']));
    }
 
    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/image.php';
    require_once ABSPATH . 'wp-admin/includes/media.php';
 
    $uploaded = wp_handle_upload($file, ['test_form' => false]);
    if (isset($uploaded['error'])) {
        return new WP_Error('wp_upload', $uploaded['error']);
    }
 
    $filename  = $uploaded['file'];
    $file_type = wp_check_filetype(basename($filename));
    $title     = preg_replace('/\.[^.]+$/', '', basename($filename));
    $attach_id = wp_insert_attachment([
        'post_mime_type' => $file_type['type'],
        'post_title'     => sanitize_text_field($title),
        'post_content'   => '',
        'post_status'    => 'inherit',
        'post_parent'    => $parent_post_id,
    ], $filename, $parent_post_id, true);
 
    if (is_wp_error($attach_id)) return $attach_id;
 
    wp_update_attachment_metadata($attach_id, wp_generate_attachment_metadata($attach_id, $filename));
 
    return (int) $attach_id;
}
 
function dt_reformat_files(array $file_post): array {
    if (!is_array($file_post['name'])) return [$file_post];
 
    $result = [];
    foreach (array_keys($file_post['name']) as $i) {
        if ($file_post['error'][$i] !== UPLOAD_ERR_OK) continue;
        $result[] = [
            'name'     => $file_post['name'][$i],
            'tmp_name' => $file_post['tmp_name'][$i],
            'type'     => $file_post['type'][$i],
            'size'     => $file_post['size'][$i],
            'error'    => $file_post['error'][$i],
        ];
    }
    return $result;
}
 
function _dt_uid_key(): ?string {
    $u = get_current_custom_user();
    return $u ? 'dang_tin_uid_' . md5((int) $u->id) : null;
}
 
function get_dang_tin_errors(): array {
    $k = _dt_uid_key();
    if (!$k) return [];
    $e = get_transient('dt_errors_' . $k);
    return is_array($e) ? $e : [];
}
 
function old_form_value(string $key, string $fallback = ''): string {
    $k = _dt_uid_key();
    if ($k) {
        $data = get_transient('dt_postdata_' . $k);
        if (is_array($data) && isset($data[$key])) {
            return esc_attr($data[$key]);
        }
    }
    return esc_attr($fallback);
}
 
function dang_tin_success(): bool {
    return !empty($_GET['dt_success']) && $_GET['dt_success'] === '1';
}
function ql_get_expired_at(int $post_id): string {
    global $wpdb;

    $table = $wpdb->prefix . 'custom_post_listings';
    $table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table'") === $table;
    if ($table_exists) {
        $expired_at = $wpdb->get_var($wpdb->prepare(
            "SELECT expired_at FROM $table WHERE post_id = %d LIMIT 1",
            $post_id
        ));
        if ($expired_at) return $expired_at; 
    }

    $meta = get_post_meta($post_id, '_expired_at', true);
    if ($meta) return $meta;
    $meta_old = get_post_meta($post_id, 'expiry_date', true);
    if ($meta_old) {
        return is_numeric($meta_old)
            ? date('Y-m-d', (int) $meta_old)
            : $meta_old;
    }

    return '';
}

function ql_format_expired(string $expired_raw): array {
    if (!$expired_raw) return ['text' => '', 'warning' => false, 'overdue' => false];
    $ts      = strtotime($expired_raw);
    $today   = strtotime(date('Y-m-d'));
    $diff    = (int) (($ts - $today) / 86400); 
    return [
        'text'    => date('d/m/Y', $ts),
        'warning' => ($diff >= 0 && $diff <= 7),   
        'overdue' => ($diff < 0),                 
        'days_left' => $diff,
    ];
}

function ql_get_listings(int $custom_uid, array $statuses, int $limit = -1): array {
    return get_posts([
        'post_type'      => 'property',
        'post_status'    => $statuses,
        'posts_per_page' => $limit,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'meta_query'     => [[
            'key'   => '_custom_user_id',
            'value' => $custom_uid,
            'type'  => 'NUMERIC',
        ]],
    ]);
}
 
add_action('template_redirect', 'handle_dang_tin_form');
function handle_dang_tin_form(): void {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') return;
    if (!isset($_POST['dang_tin_nonce'])) return;
    if (!wp_verify_nonce($_POST['dang_tin_nonce'], 'dang_tin_action')) return;
 
    $custom_user = get_current_custom_user();
    if (!$custom_user) {
        wp_redirect(home_url('/dang-nhap/'));
        exit;
    }
 
    $uid     = (int) $custom_user->id;  
    $uid_key = 'dang_tin_uid_' . md5($uid);
    $errors  = [];
     $title     = sanitize_text_field($_POST['post_title']  ?? '');
    $content   = wp_kses_post($_POST['post_content']       ?? '');
    $mode      = sanitize_key($_POST['dt_mode']            ?? 'bds'); 
    $price_raw = preg_replace('/[^0-9]/', '', $_POST['prefix-price'] ?? '');
    $phone     = preg_replace('/[^0-9]/', '', $_POST['prefix-phone-custom'] ?? '');
    $video_url = esc_url_raw(trim($_POST['prefix-video'] ?? ''));
 
    if (empty($title))
        $errors[] = 'Vui lòng nhập tiêu đề.';
    if (empty($price_raw))
        $errors[] = 'Vui lòng nhập giá.';
    if (empty($_POST['prefix-area']))
        $errors[] = 'Vui lòng nhập diện tích.';
    if (empty($_POST['prefix-address']))
        $errors[] = 'Vui lòng nhập địa chỉ chi tiết.';
    if ($mode === 'bds' && empty($_POST['property_type_val']))
        $errors[] = 'Vui lòng chọn loại bất động sản.';
    if ($mode === 'du_an' && empty($_POST['property_developer_val']))
        $errors[] = 'Vui lòng chọn dự án.';
    if ($phone !== '' && !preg_match('/^0[3-9]\d{8}$/', $phone))
        $errors[] = 'Số điện thoại không hợp lệ (10 số, bắt đầu 03-09).';
    if ($video_url !== '' && !preg_match('/youtube\.com|youtu\.be|tiktok\.com/', $video_url))
        $errors[] = 'Link video chỉ hỗ trợ YouTube hoặc TikTok.';
     $has_main = isset($_FILES['main_image']) && $_FILES['main_image']['error'] === UPLOAD_ERR_OK && $_FILES['main_image']['size']  > 0;
    if (!$has_main)
        $errors[] = 'Vui lòng tải lên ảnh chính.';
 
    if (!empty($errors)) {
        set_transient('dt_errors_'   . $uid_key, $errors, 120);
        set_transient('dt_postdata_' . $uid_key, $_POST,  120);
        wp_redirect(add_query_arg('dt_error', '1', get_permalink()));
        exit;
    }
     $wp_user_id = dt_get_wp_user_id($custom_user);
     $post_id = wp_insert_post([
        'post_title'   => $title,
        'post_content' => $content,
        'post_status'  => 'pending',
        'post_type'    => 'property',
        'post_author'  => $wp_user_id, 
    ], true);
 
    if (is_wp_error($post_id)) {
        set_transient('dt_errors_' . $uid_key,
            ['Lỗi tạo tin: ' . $post_id->get_error_message()], 120);
        wp_redirect(add_query_arg('dt_error', '1', get_permalink()));
        exit;
    }
 
    $main_id = dt_upload_image($_FILES['main_image'], $post_id);
    if (is_wp_error($main_id)) {
        error_log('[DangTin] Main image: ' . $main_id->get_error_message());
    } else {
        set_post_thumbnail($post_id, $main_id);
    }
 
    if (!empty($_FILES['sub_images']['name'][0])) {
        $sub_files = array_slice(dt_reformat_files($_FILES['sub_images']), 0, 5);
        foreach ($sub_files as $sf) {
            $sub_id = dt_upload_image($sf, $post_id);
            if (is_wp_error($sub_id)) {
                error_log('[DangTin] Sub image: ' . $sub_id->get_error_message());
                continue;
            }
            add_post_meta($post_id, 'prefix-image_property', $sub_id, false);
        }
    }
 
    update_post_meta($post_id, 'prefix-price', $price_raw);
    $text_meta = [
        'prefix-area'         => 'prefix-area',
        'prefix-bedroom'      => 'prefix-bedroom',
        'prefix-bathroom'     => 'prefix-bathroom',
        'prefix-address'      => 'prefix-address',
        'prefix-video'        => 'prefix-video',
        'prefix-name-custom'  => 'prefix-name-custom',
        'prefix-phone-custom' => 'prefix-phone-custom',
        'prefix-email-custom' => 'prefix-email-custom',
        'prefix-address-bds'  => 'prefix-address-bds',
        'prefix-phap-ly'      => 'prefix-phap-ly',
        'prefix-noi-that'     => 'prefix-noi-that',
        'prefix-unit'         => 'prefix-unit',
    ];
 
    foreach ($text_meta as $post_key => $meta_key) {
        if (!empty($_POST[$post_key])) {
            update_post_meta($post_id, $meta_key, sanitize_text_field($_POST[$post_key]));
        }
    }
 
    $lat = sanitize_text_field($_POST['dt-lat'] ?? '');
    $lng = sanitize_text_field($_POST['dt-lng'] ?? '');
    if ($lat !== '' && $lng !== '') {
        update_post_meta($post_id, 'prefix-maps', "{$lat},{$lng},0");
        update_post_meta($post_id, '_dt_lat', $lat);
        update_post_meta($post_id, '_dt_lng', $lng);
    }
    update_post_meta($post_id, '_custom_user_id', $uid);
    update_post_meta($post_id, '_dt_mode', $mode);
     $expired_at = date('Y-m-d', strtotime('+30 days'));
    update_post_meta($post_id, '_expired_at', $expired_at);
 
    if ($mode === 'bds' && !empty($_POST['property_type_val'])) {
        wp_set_post_terms($post_id, [(int) $_POST['property_type_val']], 'property_type');
    }
    if ($mode === 'du_an' && !empty($_POST['property_developer_val'])) {
        wp_set_post_terms($post_id, [(int) $_POST['property_developer_val']], 'property_developer');
    }
    if (!empty($_POST['property_location_val'])) {
        wp_set_post_terms($post_id, [(int) $_POST['property_location_val']], 'property_location');
    }
    if (!empty($_POST['huong'])) {
        wp_set_post_terms($post_id, [(int) $_POST['huong']], 'property_direction');
    }
    if (!empty($_POST['loai_tin'])) {
        wp_set_post_terms(
            $post_id,
            [sanitize_text_field($_POST['loai_tin'])],
            'property_status',
            false
        );
    }
 
    dt_insert_listing($post_id, $uid, 30);
    delete_transient('dt_errors_'   . $uid_key);
    delete_transient('dt_postdata_' . $uid_key);
    wp_redirect(add_query_arg('dt_success', '1', get_permalink()));
    exit;
}
 
add_action('init', function () {
    add_rewrite_rule(
        '^quan-ly-tai-khoan/([a-z0-9-]+)/?$',
        'index.php?pagename=quan-ly-tai-khoan&tab=$matches[1]',
        'top'
    );
});
 
add_filter('query_vars', function ($vars) {
    $vars[] = 'tab';
    return $vars;
});

//filter property sidebar 
function bds_filter_price_area_meta_query() {
    $meta_query = array();
     if (!empty($_GET['price_range']) && $_GET['price_range'] !== '0') {
        $price_range = sanitize_text_field($_GET['price_range']);
        $parts = explode('-', $price_range);
 
        if (count($parts) === 2) {
            $min_trieu = (float) $parts[0];
            $min_vnd = $min_trieu * 1000000;
 
            if ($parts[1] === 'max') {
                $meta_query[] = array(
                    'key'     => 'prefix-price',
                    'value'   => $min_vnd,
                    'compare' => '>=',
                    'type'    => 'NUMERIC',
                );
            } else {
                $max_trieu = (float) $parts[1];
                $max_vnd = $max_trieu * 1000000;
                $meta_query[] = array(
                    'key'     => 'prefix-price',
                    'value'   => array($min_vnd, $max_vnd),
                    'compare' => 'BETWEEN',
                    'type'    => 'NUMERIC',
                );
            }
        }
    }
 
    if (!empty($_GET['area_range']) && $_GET['area_range'] !== '0') {
        $area_range = sanitize_text_field($_GET['area_range']);
        $parts = explode('-', $area_range);
 
        if (count($parts) === 2) {
            $min_area = (float) $parts[0];
            if ($parts[1] === 'max') {
                $meta_query[] = array(
                    'key'     => 'prefix-area',
                    'value'   => $min_area,
                    'compare' => '>=',
                    'type'    => 'NUMERIC',
                );
            } else {
                $max_area = (float) $parts[1];
                $meta_query[] = array(
                    'key'     => 'prefix-area',
                    'value'   => array($min_area, $max_area),
                    'compare' => 'BETWEEN',
                    'type'    => 'NUMERIC',
                );
            }
        }
    }
 
    if (count($meta_query) > 1) {
        $meta_query['relation'] = 'AND';
    }
    return $meta_query;
}

function bds_filter_url(string $key, string $value): string {
    $params = $_GET;
    unset($params['paged'], $params['page']);
 
    if ($value === '' || $value === '0') {
        unset($params[$key]);
    } else {
        $params[$key] = $value;
    }
 
    $base = strtok($_SERVER['REQUEST_URI'], '?');
    $qs   = http_build_query($params);
    return $base . ($qs ? '?' . $qs : '');
}

function bds_enqueue_filter_script() {
    if (!is_front_page()) {
        return;
    }
    wp_enqueue_script(
        'bds-filter-property',
        get_template_directory_uri() . '/js/filter-property.js',
        ['jquery'],
        null,
        true
    );
    wp_localize_script('bds-filter-property', 'bdsFilterAjax', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('bds_filter_nonce'),
    ]);
}
add_action('wp_enqueue_scripts', 'bds_enqueue_filter_script');

function bds_filter_properties_callback() {
    check_ajax_referer('bds_filter_nonce', 'nonce');

    $price_range = isset($_POST['price_range']) ? sanitize_text_field($_POST['price_range']) : '0';
    $area_range  = isset($_POST['area_range'])  ? sanitize_text_field($_POST['area_range'])  : '0';
    $paged = isset($_POST['paged']) ? max(1, intval($_POST['paged'])) : 1;
    $_GET['price_range'] = $price_range;
    $_GET['area_range']  = $area_range;
    $meta_query = bds_filter_price_area_meta_query();
    $query_args = [
        'post_type' => 'property',
        'post_status' => 'publish',
        'orderby' => 'modified',
        'order' => 'DESC',
        'paged' => $paged,
        'posts_per_page' => 20,
    ];

    if (!empty($meta_query)) {
        $query_args['meta_query'] = $meta_query;
    }
    $query = new WP_Query($query_args);
    ob_start();
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            set_query_var('is_ngop', true);
            get_template_part('loop-property/item-property');
        endwhile;
    else :
        echo '<p>Không có bất động sản nào.</p>';
    endif;
    wp_reset_postdata();
    $html = ob_get_clean();

    wp_send_json_success([
        'html'        => $html,
        'max_pages'   => $query->max_num_pages,
        'found_posts' => $query->found_posts,
    ]);
}
add_action('wp_ajax_bds_filter_properties', 'bds_filter_properties_callback');
add_action('wp_ajax_nopriv_bds_filter_properties', 'bds_filter_properties_callback');

function get_related_posts_by_location($location_id, $limit = 5){
    global $wpdb;
    $location = get_term($location_id, 'property_location');
    if (!$location || is_wp_error($location)) {
        return new WP_Query();
    }

    $keywords = explode('-', strtolower($location->slug));
    $ignore = ['tp','thanh','pho','tinh'];
    $keywords = array_filter($keywords, function ($k) use ($ignore) {
        return strlen($k) >= 2 && !in_array($k, $ignore);
    });
    if (empty($keywords)) {
        return new WP_Query();
    }

    $conditions = [];
    foreach ($keywords as $word) {
        $conditions[] = $wpdb->prepare(
            "(t.slug LIKE %s OR t.name LIKE %s)",
            '%' . $wpdb->esc_like($word) . '%',
            '%' . $wpdb->esc_like($word) . '%'
        );
    }

    $where = implode(' OR ', $conditions);
    $sql = "
        SELECT DISTINCT p.ID
        FROM {$wpdb->posts} p
        INNER JOIN {$wpdb->term_relationships} tr ON p.ID = tr.object_id
        INNER JOIN {$wpdb->term_taxonomy} tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
        INNER JOIN {$wpdb->terms} t ON tt.term_id = t.term_id
        LEFT JOIN {$wpdb->postmeta} pm ON p.ID = pm.post_id AND pm.meta_key = 'post_views_count'
        WHERE
            p.post_status = 'publish'
            AND p.post_type = 'post'
            AND tt.taxonomy = 'post_tag'
            AND ($where)
        ORDER BY CAST(COALESCE(pm.meta_value, 0) AS UNSIGNED) DESC, p.post_date DESC
        LIMIT %d";
    $ids = $wpdb->get_col(
        $wpdb->prepare($sql, $limit)
    );

    if (empty($ids)) {
        return new WP_Query();
    }
    return new WP_Query([
        'post_type' => 'post',
        'post__in' => $ids,
        'orderby' => 'post__in'
    ]);
}
//PAYMENT
require_once get_template_directory() . '/payment/ajax-handler.php';
require_once get_template_directory() . '/config.php';
add_action('wp_enqueue_scripts', function () {
    if (is_singular('property') || is_page('dang-tin')) {
        wp_enqueue_script('here-mapbox', get_template_directory_uri() . '/js/map-here-mapbox.js',[], null, true);
    }
});

add_action('admin_enqueue_scripts', function ($hook) {
    if (!in_array($hook, ['post.php', 'post-new.php'])) return;
    global $post;
    $is_property = (isset($post) && $post->post_type === 'property') || (isset($_GET['post_type']) && $_GET['post_type'] === 'property');
    if (!$is_property) return;

    wp_enqueue_script('here-mapbox', get_template_directory_uri() . '/js/map-here-mapbox.js',[], null, true);
});
///////////////////
function html5blank_conditional_scripts() {}
function html5_blank_view_article() {}

