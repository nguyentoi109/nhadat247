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

function custom_get_avatar_html( $user, $size = 'thumbnail' ) {
    if ( ! empty( $user->avatar ) ) {
        $url = wp_get_attachment_image_url( (int) $user->avatar, $size );
        if ( $url ) {
            return '<img src="' . esc_url( $url ) . '" alt="' . esc_attr( $user->full_name ?? '' ) . '" class="cs-avatar-img">';
        }
    }
    return '<span class="cs-avatar-letter">' . esc_html( get_author_name_avatar( $user->full_name ?? '' ) ) . '</span>';
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

//get post for user and admin
function bds_get_post_author_info(int $post_id): array {
    global $wpdb;
    $author_uid = (int) get_post_meta($post_id, '_custom_user_id', true);
    if ($author_uid) {
        $u = $wpdb->get_row($wpdb->prepare(
            "SELECT * FROM {$wpdb->prefix}custom_users WHERE id = %d",
            $author_uid
        ));
        $post_count = (int) $wpdb->get_var($wpdb->prepare(
            "SELECT COUNT(*) FROM {$wpdb->prefix}custom_post_listings cpl
             INNER JOIN {$wpdb->prefix}posts p ON p.ID = cpl.post_id
             WHERE cpl.custom_user_id = %d
               AND cpl.status = 'active'
               AND (cpl.expired_at IS NULL OR cpl.expired_at >= CURDATE())
               AND p.post_type = 'property'
               AND p.post_status IN ('publish','pending')",
            $author_uid
        ));

        $duration_text = ($u && !empty($u->created_at))
            ? bds_format_membership_duration($u->created_at)
            : '';

        $avatar_html = $u ? custom_get_avatar_html($u, 'thumbnail') : '<span class="cs-avatar-letter">?</span>';

        return [
            'source'        => 'custom_user',
            'name'          => $u->full_name ?? '',
            'email'         => $u->email ?? '',
            'phone'         => $u->phone ?? '',
            'post_count'    => $post_count,
            'duration_text' => $duration_text,
            'avatar_html'   => $avatar_html,
            'author_id_for_link' => $author_uid,
            'link_type'           => 'custom',
        ];
    }

    $wp_author_id = (int) get_post_field('post_author', $post_id);
    $wp_user      = get_userdata($wp_author_id);

    $post_count = (int) (new WP_Query([
        'post_type'      => 'property',
        'author'         => $wp_author_id,
        'post_status'    => ['publish', 'pending'],
        'posts_per_page' => -1,
        'fields'         => 'ids',
    ]))->found_posts;

    $duration_text = ($wp_user && !empty($wp_user->user_registered))
        ? bds_format_membership_duration($wp_user->user_registered)
        : '';
    $fake_user = (object) [
        'avatar'    => null,
        'full_name' => $wp_user ? $wp_user->display_name : '',
    ];
    $avatar_html = custom_get_avatar_html($fake_user, 'thumbnail');

    return [
        'source'        => 'wp_admin',
        'name'          => $wp_user ? $wp_user->display_name : '',
        'email'         => $wp_user ? $wp_user->user_email : '',
        'phone'         => get_user_meta($wp_author_id, 'phone', true),
        'post_count'    => $post_count,
        'duration_text' => $duration_text,
        'avatar_html'   => $avatar_html,
        'author_id_for_link' => $wp_author_id,
        'link_type'     => 'wp',
    ];
}

function bds_format_membership_duration(string $joined_datetime): string {
    if (empty($joined_datetime)) return '';

    try {
        $joined = new DateTime($joined_datetime);
        $now    = new DateTime();
        $diff   = $now->diff($joined);
    } catch (Exception $e) {
        return '';
    }

    if ($diff->y >= 1) {
        return 'Tham gia nhadathochiminh247 ' . $diff->y . ' năm';
    }
    if ($diff->m >= 1) {
        return 'Tham gia nhadathochiminh247 ' . $diff->m . ' tháng';
    }
    if ($diff->d >= 1) {
        return 'Tham gia nhadathochiminh247 ' . $diff->d . ' ngày';
    }
    return 'Mới tham gia nhadathochiminh247';
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

function ql_get_listings_categorized(int $custom_uid): array {
    global $wpdb;
    $table = $wpdb->prefix . 'custom_post_listings';
    $rows = $wpdb->get_results($wpdb->prepare("SELECT post_id, expired_at, status FROM $table WHERE custom_user_id = %d ORDER BY id DESC",$custom_uid));
    $today = date('Y-m-d');
    $result = ['active' => [], 'pending' => [], 'expired' => [], 'all' => []];

    foreach ($rows as $row) {
        $post = get_post($row->post_id);
        if (!$post || $post->post_type !== 'property') continue;

        if (!in_array($post->post_status, ['publish', 'pending', 'draft'], true)) continue;

        $is_expired_by_date = !empty($row->expired_at) && strtotime($row->expired_at) < strtotime($today);

        if ($post->post_status === 'pending') {
            $category = 'pending';
        } elseif ($is_expired_by_date) {
            $category = 'expired';  
        } elseif ($post->post_status === 'publish') {
            $category = 'active';
        } else {
            $category = 'expired'; 
        }
        $result[$category][] = $post;
        $result['all'][] = $post;
    }
    return $result;
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

//IMAGES SECRET
add_filter('wp_get_attachment_url', function ($url, $attachment_id) {
    if (get_post_meta($attachment_id, '_dt_is_legal_doc', true)) {
        $parent_id = wp_get_post_parent_id($attachment_id);
        $property_owner_uid = $parent_id ? (int) get_post_meta($parent_id, '_custom_user_id', true) : 0;
        $current_user = get_current_custom_user();
        $is_owner = $current_user && ((int) $current_user->id === $property_owner_uid);

        if (!$is_owner && !current_user_can('manage_options')) {
            return ''; 
        }
    }
    return $url;
}, 10, 2);

function dt_get_legal_images(int $post_id): array {
    $current_user = get_current_custom_user();
    if (!$current_user) return [];

    $owner_uid = (int) get_post_meta($post_id, '_custom_user_id', true);
    if ((int) $current_user->id !== $owner_uid) return [];

    $ids = get_post_meta($post_id, 'prefix-legal-images', false);
    return array_map(function ($id) {
        return [
            'id'  => $id,
            'url' => wp_get_attachment_image_url($id, 'medium'),
        ];
    }, $ids);
}
 
define('QL_POST_PRICE', 150000);
add_action('wp_ajax_dt_submit_listing', 'dt_ajax_submit_listing');
add_action('wp_ajax_nopriv_dt_submit_listing', 'dt_ajax_submit_listing');
function dt_ajax_submit_listing(): void {
 
    if (!isset($_POST['_nonce']) || !wp_verify_nonce($_POST['_nonce'], 'ql_listing_nonce')) {
        wp_send_json_error(['message' => 'Phiên làm việc đã hết hạn, vui lòng tải lại trang.']);
    }
 
    $custom_user = get_current_custom_user();
    if (!$custom_user) {
        wp_send_json_error([
            'message'          => 'Vui lòng đăng nhập để đăng tin.',
            'need_login'       => true,
            'redirect_url'     => home_url('/dang-nhap/'),
        ]);
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
 
    $has_main = isset($_FILES['main_image']) && $_FILES['main_image']['error'] === UPLOAD_ERR_OK && $_FILES['main_image']['size'] > 0;
    if (!$has_main)
        $errors[] = 'Vui lòng tải lên ảnh chính.';
 
    if (!empty($errors)) {
        set_transient('dt_errors_'   . $uid_key, $errors, 120);
        set_transient('dt_postdata_' . $uid_key, $_POST,  120);
 
        wp_send_json_error([
            'message' => 'Vui lòng kiểm tra lại thông tin.',
            'errors'  => $errors,
        ]);
    }
 
    global $wpdb;
    $wpdb->query('START TRANSACTION');
    try {
        ql_deduct_wallet_balance(
            $uid,
            QL_POST_PRICE,
            'NEWPOST',
            0,
            'Đăng tin bất động sản mới'
        );
    } catch (Exception $e) {
        $wpdb->query('ROLLBACK');
 
        if ($e->getMessage() === 'INSUFFICIENT_BALANCE') {
            wp_send_json_error([
                'message'               => 'Số dư không đủ để đăng tin.',
                'insufficient_balance'  => true,
            ]);
        }
 
        wp_send_json_error([
            'message' => 'Có lỗi xảy ra: ' . $e->getMessage(),
        ]);
    }
    $wpdb->query('COMMIT');
 
    $wp_user_id = dt_get_wp_user_id($custom_user);
    $post_id = wp_insert_post([
        'post_title'   => $title,
        'post_content' => $content,
        'post_status'  => 'pending',
        'post_type'    => 'property',
        'post_author'  => $wp_user_id,
    ], true);
 
    if (is_wp_error($post_id)) {
        wp_send_json_error([
            'message' => 'Lỗi tạo tin: ' . $post_id->get_error_message(),
        ]);
    }
 
    $main_id = dt_upload_image($_FILES['main_image'], $post_id);
    if (is_wp_error($main_id)) {
        error_log('[DangTin] Main image: ' . $main_id->get_error_message());
    } else {
        set_post_thumbnail($post_id, $main_id);
    }
 
    if (!empty($_FILES['sub_images']['name'][0])) {
        $sub_files = array_slice(dt_reformat_files($_FILES['sub_images']), 0, 9);
        foreach ($sub_files as $sf) {
            $sub_id = dt_upload_image($sf, $post_id);
            if (is_wp_error($sub_id)) {
                error_log('[DangTin] Sub image: ' . $sub_id->get_error_message());
                continue;
            }
            add_post_meta($post_id, 'prefix-image_property', $sub_id, false);
        }
    }
 
    if (isset($_FILES['image_360']) && $_FILES['image_360']['error'] === UPLOAD_ERR_OK && $_FILES['image_360']['size'] > 0) {
        $img360_id = dt_upload_image($_FILES['image_360'], $post_id);
        if (is_wp_error($img360_id)) {
            error_log('[DangTin] Image 360: ' . $img360_id->get_error_message());
        } else {
            update_post_meta($post_id, 'image360', $img360_id);
        }
    }
 
    if (!empty($_FILES['legal_images']['name'][0])) {
        $legal_files = array_slice(dt_reformat_files($_FILES['legal_images']), 0, 5);
        foreach ($legal_files as $lf) {
            $legal_id = dt_upload_image($lf, $post_id);
            if (is_wp_error($legal_id)) {
                error_log('[DangTin] Legal image: ' . $legal_id->get_error_message());
                continue;
            }
            update_post_meta($legal_id, '_dt_is_legal_doc', 1);
            add_post_meta($post_id, 'prefix-legal-images', $legal_id, false);
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
    wp_send_json_success([
        'message'      => 'Đăng tin thành công! Tin đang chờ kiểm duyệt.',
        'post_id'      => $post_id,
        'redirect_url' => add_query_arg('dt_success', '1', wp_get_referer() ?: home_url('/')),
    ]);
}

add_action('wp_ajax_dt_update_listing', 'handle_dt_update_listing_ajax');
add_action('wp_ajax_nopriv_dt_update_listing', 'handle_dt_update_listing_ajax');
function handle_dt_update_listing_ajax(): void {
    if (!wp_verify_nonce($_POST['_nonce'] ?? '', 'ql_listing_nonce')) {
        wp_send_json_error(['message' => 'Phiên làm việc hết hạn, vui lòng tải lại trang.']);
    }

    $custom_user = get_current_custom_user();
    if (!$custom_user) {
        wp_send_json_error(['message' => 'Vui lòng đăng nhập lại.']);
    }

    $uid          = (int) $custom_user->id;
    $edit_post_id = (int) ($_POST['edit_post_id'] ?? 0);
    if (!$edit_post_id) {
        wp_send_json_error(['message' => 'Thiếu thông tin tin đăng.']);
    }

    $existing_post = get_post($edit_post_id);
    if (!$existing_post || $existing_post->post_type !== 'property') {
        wp_send_json_error(['message' => 'Tin đăng không tồn tại.']);
    }
    $owner_uid = (int) get_post_meta($edit_post_id, '_custom_user_id', true);
    if ($owner_uid !== $uid) {
        wp_send_json_error(['message' => 'Bạn không có quyền chỉnh sửa tin đăng này.']);
    }

    $title     = sanitize_text_field($_POST['post_title']  ?? '');
    $content   = wp_kses_post($_POST['post_content']       ?? '');
    $mode      = sanitize_key($_POST['dt_mode']            ?? 'bds');
    $price_raw = preg_replace('/[^0-9]/', '', $_POST['prefix-price'] ?? '');
    $phone     = preg_replace('/[^0-9]/', '', $_POST['prefix-phone-custom'] ?? '');
    $video_url = esc_url_raw(trim($_POST['prefix-video'] ?? ''));

    $errors = [];
    if (empty($title))                     $errors[] = 'Vui lòng nhập tiêu đề.';
    if (empty($price_raw))                 $errors[] = 'Vui lòng nhập giá.';
    if (empty($_POST['prefix-area']))      $errors[] = 'Vui lòng nhập diện tích.';
    if (empty($_POST['prefix-address']))   $errors[] = 'Vui lòng nhập địa chỉ chi tiết.';
    if ($mode === 'bds' && empty($_POST['property_type_val']))
        $errors[] = 'Vui lòng chọn loại bất động sản.';
    if ($mode === 'du_an' && empty($_POST['property_developer_val']))
        $errors[] = 'Vui lòng chọn dự án.';
    if ($phone !== '' && !preg_match('/^0[3-9]\d{8}$/', $phone))
        $errors[] = 'Số điện thoại không hợp lệ (10 số, bắt đầu 03-09).';
    if ($video_url !== '' && !preg_match('/youtube\.com|youtu\.be|tiktok\.com/', $video_url))
        $errors[] = 'Link video chỉ hỗ trợ YouTube hoặc TikTok.';
    $has_new_main = isset($_FILES['main_image']) && $_FILES['main_image']['error'] === UPLOAD_ERR_OK && $_FILES['main_image']['size'] > 0;
    $has_old_main = has_post_thumbnail($edit_post_id);
    if (!$has_new_main && !$has_old_main)
        $errors[] = 'Vui lòng tải lên ảnh chính.';

    if (!empty($errors)) {
        wp_send_json_error(['message' => 'Vui lòng kiểm tra lại thông tin.', 'errors' => $errors]);
    }
    $updated_post_id = wp_update_post([
        'ID'           => $edit_post_id,
        'post_title'   => $title,
        'post_content' => $content,
        'post_status'  => 'pending',
    ], true);

    if (is_wp_error($updated_post_id)) {
        wp_send_json_error(['message' => 'Lỗi cập nhật tin: ' . $updated_post_id->get_error_message()]);
    }

    $post_id = $edit_post_id;
    if ($has_new_main) {
        $main_id = dt_upload_image($_FILES['main_image'], $post_id);
        if (!is_wp_error($main_id)) {
            $old_thumb_id = get_post_thumbnail_id($post_id);
            set_post_thumbnail($post_id, $main_id);
            if ($old_thumb_id) wp_delete_attachment($old_thumb_id, true);
        }
    }

    if (!empty($_FILES['sub_images']['name'][0])) {
        $old_subs = get_post_meta($post_id, 'prefix-image_property', false);
        foreach ($old_subs as $old_sub_id) wp_delete_attachment((int) $old_sub_id, true);
        delete_post_meta($post_id, 'prefix-image_property');

        $sub_files = array_slice(dt_reformat_files($_FILES['sub_images']), 0, 9);
        foreach ($sub_files as $sf) {
            $sub_id = dt_upload_image($sf, $post_id);
            if (!is_wp_error($sub_id)) add_post_meta($post_id, 'prefix-image_property', $sub_id, false);
        }
    }

    if (isset($_FILES['image_360']) && $_FILES['image_360']['error'] === UPLOAD_ERR_OK && $_FILES['image_360']['size'] > 0) {
        $old_360_id = get_post_meta($post_id, 'image360', true);
        $img360_id = dt_upload_image($_FILES['image_360'], $post_id);
        if (!is_wp_error($img360_id)) {
            update_post_meta($post_id, 'image360', $img360_id);
            if ($old_360_id) wp_delete_attachment((int) $old_360_id, true);
        }
    }

    if (!empty($_FILES['legal_images']['name'][0])) {
        $old_legal_ids = get_post_meta($post_id, 'prefix-legal-images', false);
        foreach ($old_legal_ids as $old_legal_id) wp_delete_attachment((int) $old_legal_id, true);
        delete_post_meta($post_id, 'prefix-legal-images');

        $legal_files = array_slice(dt_reformat_files($_FILES['legal_images']), 0, 5);
        foreach ($legal_files as $lf) {
            $legal_id = dt_upload_image($lf, $post_id);
            if (!is_wp_error($legal_id)) {
                update_post_meta($legal_id, '_dt_is_legal_doc', 1);
                add_post_meta($post_id, 'prefix-legal-images', $legal_id, false);
            }
        }
    }

    update_post_meta($post_id, 'prefix-price', $price_raw);
    $text_meta = [
        'prefix-area' => 'prefix-area', 'prefix-bedroom' => 'prefix-bedroom',
        'prefix-bathroom' => 'prefix-bathroom', 'prefix-address' => 'prefix-address',
        'prefix-video' => 'prefix-video', 'prefix-name-custom' => 'prefix-name-custom',
        'prefix-phone-custom' => 'prefix-phone-custom', 'prefix-email-custom' => 'prefix-email-custom',
        'prefix-phap-ly' => 'prefix-phap-ly', 'prefix-noi-that' => 'prefix-noi-that',
        'prefix-unit' => 'prefix-unit',
    ];
    foreach ($text_meta as $post_key => $meta_key) {
        if (!empty($_POST[$post_key])) {
            update_post_meta($post_id, $meta_key, sanitize_text_field($_POST[$post_key]));
        } else {
            delete_post_meta($post_id, $meta_key);
        }
    }
    $latlng = sanitize_text_field($_POST['prefix-latlng'] ?? '');
    if ($latlng !== '') {
        $parts = array_map('trim', explode(',', $latlng));
        if (isset($parts[0], $parts[1]) && is_numeric($parts[0]) && is_numeric($parts[1])) {
            update_post_meta($post_id, 'prefix-maps', "{$parts[0]},{$parts[1]},0");
            update_post_meta($post_id, '_dt_lat', $parts[0]);
            update_post_meta($post_id, '_dt_lng', $parts[1]);
            update_post_meta($post_id, 'prefix-latlng', $latlng);
        }
    }

    update_post_meta($post_id, '_dt_mode', $mode);

    if ($mode === 'bds' && !empty($_POST['property_type_val'])) {
        wp_set_post_terms($post_id, [(int) $_POST['property_type_val']], 'property_type');
    } elseif ($mode === 'du_an' && !empty($_POST['property_developer_val'])) {
        wp_set_post_terms($post_id, [(int) $_POST['property_developer_val']], 'property_developer');
    }
    if (!empty($_POST['huong'])) {
        wp_set_post_terms($post_id, [(int) $_POST['huong']], 'property_direction');
    }
    if (!empty($_POST['loai_tin'])) {
        wp_set_post_terms($post_id, [sanitize_text_field($_POST['loai_tin'])], 'property_status', false);
    }
    global $wpdb;
    $wpdb->update(
        $wpdb->prefix . 'custom_post_listings',
        ['status' => 'pending'],
        ['post_id' => $post_id],
        ['%s'], ['%d']
    );
    wp_send_json_success([
        'redirect_url' => add_query_arg(['id' => $post_id, 'dt_success' => '1'], home_url('/chinh-sua-tin/')),
    ]);
}

add_action('wp_enqueue_scripts', function () {
    if (is_page('dang-tin')) {
        wp_enqueue_script('dt-submit', get_template_directory_uri() . '/js/qlt-popups.js', ['jquery'], null, true);
    }
    if (is_page('chinh-sua-tin')) {
       wp_enqueue_script('dt-update', get_template_directory_uri() . '/js/chinh-sua-tin.js', ['jquery', 'qlt-popup'], null, true);
    }
});
 
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

//REPOST
function ql_deduct_wallet_balance(int $user_id, float $price, string $ref_prefix, int $post_id, string $description): array {
    global $wpdb;
    $wallet = $wpdb->get_row($wpdb->prepare(
        "SELECT * FROM {$wpdb->prefix}custom_wallets WHERE user_id = %d FOR UPDATE",
        $user_id
    ));
    if (!$wallet) {
        throw new Exception('INSUFFICIENT_BALANCE');
    }
    $balance_bonus = (float) $wallet->balance_bonus;
    $balance_main  = (float) $wallet->balance_main;
    $total         = $balance_bonus + $balance_main;
    if ($total < $price) {
        throw new Exception('INSUFFICIENT_BALANCE');
    }
 
    $remaining = $price;
    $use_bonus = min($balance_bonus, $remaining);
    $remaining -= $use_bonus;
    $use_main  = min($balance_main, $remaining);
    $new_bonus = $balance_bonus - $use_bonus;
    $new_main  = $balance_main - $use_main;
    $wpdb->update(
        "{$wpdb->prefix}custom_wallets",
        [
            'balance_bonus' => $new_bonus,
            'balance_main'  => $new_main,
            'updated_at'    => current_time('mysql'),
        ],
        ['user_id' => $user_id]
    );
    $wpdb->insert("{$wpdb->prefix}custom_transactions", [
        'user_id'         => $user_id,
        'transaction_type'=> 'purchase',
        'wallet_type'     => ($use_bonus > 0 && $use_main > 0) ? 'both' : (($use_bonus > 0) ? 'bonus' : 'main'),
        'amount'          => $price,
        'balance_after'   => $new_main,
        'payment_method'  => 'wallet',
        'reference_code'  => $ref_prefix . '-' . $post_id . '-' . time(),
        'related_id'      => $post_id,
        'status'          => 'completed',
        'description'     => $description,
        'created_at'      => current_time('mysql'),
    ]);
    return [
        'use_bonus' => $use_bonus,
        'use_main'  => $use_main,
        'new_bonus' => $new_bonus,
        'new_main'  => $new_main,
    ];
}

function ql_send_wallet_error(Exception $e): void {
    if ($e->getMessage() === 'INSUFFICIENT_BALANCE') {
        wp_send_json_error(['insufficient_balance' => true, 'message' => 'Số dư không đủ.']);
    }
    wp_send_json_error(['message' => $e->getMessage()]);
}
 
define('QL_REPOST_PRICE', 150000);
add_action('wp_ajax_ql_repost_listing', 'ql_handle_repost_listing');
add_action('wp_ajax_nopriv_ql_repost_listing', 'ql_handle_repost_listing');
function ql_handle_repost_listing() {
    check_ajax_referer('ql_listing_nonce', '_nonce');
    $custom_user = get_current_custom_user();
    if (!$custom_user) {
        wp_send_json_error(['message' => 'Bạn cần đăng nhập.'], 401);
    }
    $user_id = (int) $custom_user->id;
    $post_id = isset($_POST['post_id']) ? (int) $_POST['post_id'] : 0;
    if (!$post_id) {
        wp_send_json_error(['message' => 'Tin đăng không hợp lệ.']);
    }
 
    $owner_id = (int) get_post_meta($post_id, '_custom_user_id', true);
    if ($owner_id && $owner_id !== $user_id) {
        wp_send_json_error(['message' => 'Bạn không có quyền với tin đăng này.'], 403);
    }
 
    global $wpdb;
    $wpdb->query('START TRANSACTION');
 
    try {
        ql_deduct_wallet_balance(
            $user_id,
            QL_REPOST_PRICE,
            'REPOST',
            $post_id,
            'Đăng lại tin đăng #' . $post_id
        );
         wp_update_post([
            'ID'          => $post_id,
            'post_status' => 'pending',
        ]);
        $expired_at = date('Y-m-d', strtotime('+30 days'));
        update_post_meta($post_id, '_expired_at', $expired_at);
        $wpdb->update(
            "{$wpdb->prefix}custom_post_listings",
            [
                'status'     => 'pending',
                'expired_at' => $expired_at,
                'renewed_at' => current_time('mysql'),
                'updated_at' => current_time('mysql'),
            ],
            ['post_id' => $post_id]
        );
        $wpdb->query('COMMIT');
        wp_send_json_success([
            'message' => 'Đăng lại tin thành công! Tin đang chờ admin duyệt.',
        ]);
    } catch (Exception $e) {
        $wpdb->query('ROLLBACK');
        ql_send_wallet_error($e);
    }
}

//upgrade vip post
define('QL_VIP_PRICE', 150000);   
define('QL_VIP_DAYS', 30);       
add_action('wp_ajax_ql_upgrade_vip', 'ql_handle_upgrade_vip'); 
add_action('wp_ajax_nopriv_ql_upgrade_vip', 'ql_handle_upgrade_vip');
function ql_handle_upgrade_vip() {
    check_ajax_referer('ql_listing_nonce', '_nonce');
 
    $custom_user = get_current_custom_user();
    if (!$custom_user) {
        wp_send_json_error(['message' => 'Bạn cần đăng nhập.'], 401);
    }
    $user_id = (int) $custom_user->id;
    $post_id = isset($_POST['post_id']) ? (int) $_POST['post_id'] : 0;
 
    if (!$post_id) {
        wp_send_json_error(['message' => 'Tin đăng không hợp lệ.']);
    }
 
    $owner_id = (int) get_post_meta($post_id, '_custom_user_id', true);
    if ($owner_id && $owner_id !== $user_id) {
        wp_send_json_error(['message' => 'Bạn không có quyền với tin đăng này.'], 403);
    }
 
    global $wpdb;
    $price = QL_VIP_PRICE;
    $days  = QL_VIP_DAYS;
    $wpdb->query('START TRANSACTION');
    try {
        $quota = $wpdb->get_row($wpdb->prepare(
            "SELECT * FROM {$wpdb->prefix}custom_user_quotas WHERE user_id = %d FOR UPDATE",
            $user_id
        ));
        $used_quota  = false;
        $amount_paid = $price;
        if ($quota && (int) $quota->vip_quota > 0) {
            $wpdb->update(
                "{$wpdb->prefix}custom_user_quotas",
                ['vip_quota' => $quota->vip_quota - 1, 'updated_at' => current_time('mysql')],
                ['user_id' => $user_id]
            );
            $used_quota  = true;
            $amount_paid = 0;
 
        } else {
            ql_deduct_wallet_balance(
                $user_id, $price, 'VIP', $post_id,
                'Nâng cấp tin VIP (trừ bonus trước, main sau)'
            );
        }
        $current_vip = $wpdb->get_row($wpdb->prepare(
            "SELECT * FROM {$wpdb->prefix}custom_vip_posts
             WHERE post_id = %d AND status = 'active' AND expired_at >= CURDATE()
             ORDER BY expired_at DESC LIMIT 1",
            $post_id
        ));
 
        $start_from = $current_vip ? $current_vip->expired_at : current_time('mysql');
        $started_at = current_time('Y-m-d');
        $expired_at = date('Y-m-d', strtotime($start_from . " +{$days} days"));
        $wpdb->update(
            "{$wpdb->prefix}custom_vip_posts",
            ['status' => 'expired'],
            ['post_id' => $post_id, 'status' => 'active']
        );
        $wpdb->insert("{$wpdb->prefix}custom_vip_posts", [
            'user_id'     => $user_id,
            'post_id'     => $post_id,
            'vip_level'   => 'vip',
            'days'        => $days,
            'amount_paid' => $amount_paid,
            'started_at'  => $started_at,
            'expired_at'  => $expired_at,
            'status'      => 'active',
            'created_at'  => current_time('mysql'),
        ]);
 
        update_post_meta($post_id, 'vip_level', 'vip');
        update_post_meta($post_id, 'vip_expired_at', $expired_at);
        $wpdb->query('COMMIT');
        wp_send_json_success([
            'message'    => 'Nâng cấp VIP thành công! Có hiệu lực đến ' . date('d/m/Y', strtotime($expired_at)),
            'vip_level'  => 'vip',
            'expired_at' => $expired_at,
            'expired_at_formatted' => date('d/m/Y', strtotime($expired_at)),
            'used_quota' => $used_quota,
        ]);
    } catch (Exception $e) {
        $wpdb->query('ROLLBACK');
        ql_send_wallet_error($e);
    }
}

add_action('wp_ajax_ql_delete_listing', 'ql_handle_delete_listing');
add_action('wp_ajax_nopriv_ql_delete_listing', 'ql_handle_delete_listing'); 
function ql_handle_delete_listing() {
    check_ajax_referer('ql_listing_nonce', '_nonce');
    $custom_user = get_current_custom_user();
    if (!$custom_user) {
        wp_send_json_error(['message' => 'Bạn cần đăng nhập.'], 401);
    }

    $user_id = (int) $custom_user->id;
    $post_id = isset($_POST['post_id']) ? (int) $_POST['post_id'] : 0;
    if (!$post_id) {
        wp_send_json_error(['message' => 'Tin đăng không hợp lệ.']);
    }
    $post = get_post($post_id);
    if (!$post || $post->post_type !== 'property') {
        wp_send_json_error(['message' => 'Tin đăng không tồn tại.']);
    }
    $owner_id = (int) get_post_meta($post_id, '_custom_user_id', true);
    if ($owner_id && $owner_id !== $user_id) {
        wp_send_json_error(['message' => 'Bạn không có quyền xoá tin đăng này.'], 403);
    }
    global $wpdb;
    $wpdb->query('START TRANSACTION');
    try {
        $thumb_id = get_post_thumbnail_id($post_id);
        if ($thumb_id) {
            wp_delete_attachment($thumb_id, true);
        }
        $sub_ids = get_post_meta($post_id, 'prefix-image_property', false);
        foreach ($sub_ids as $sid) {
            wp_delete_attachment((int) $sid, true);
        }
        $img360_id = get_post_meta($post_id, 'image360', true);
        if ($img360_id) {
            wp_delete_attachment((int) $img360_id, true);
        }
        $legal_ids = get_post_meta($post_id, 'prefix-legal-images', false);
        foreach ($legal_ids as $lid) {
            wp_delete_attachment((int) $lid, true);
        }

        $wpdb->delete("{$wpdb->prefix}custom_post_listings", ['post_id' => $post_id]);
        $wpdb->delete("{$wpdb->prefix}custom_vip_posts", ['post_id' => $post_id]);
        $wpdb->delete("{$wpdb->prefix}custom_post_pushes", ['post_id' => $post_id]);
        $deleted = wp_delete_post($post_id, true);
        if (!$deleted) {
            throw new Exception('Không thể xoá tin đăng. Vui lòng thử lại.');
        }
        $wpdb->query('COMMIT');
        wp_send_json_success(['message' => 'Đã xoá tin đăng thành công.']);
    } catch (Exception $e) {
        $wpdb->query('ROLLBACK');
        wp_send_json_error(['message' => $e->getMessage()]);
    }
}

define('QL_PUSH_VIP_HOURS', 3);
define('QL_PUSH_NORMAL_HOURS', 3);
add_action('wp_ajax_ql_push_listing', 'ql_handle_push_listing');
add_action('wp_ajax_nopriv_ql_push_listing', 'ql_handle_push_listing');
function ql_handle_push_listing() {
    check_ajax_referer('ql_listing_nonce', '_nonce');
 
    $custom_user = get_current_custom_user();
    if (!$custom_user) {
        wp_send_json_error(['message' => 'Bạn cần đăng nhập.'], 401);
    }
 
    $user_id = (int) $custom_user->id;
    $post_id = isset($_POST['post_id']) ? (int) $_POST['post_id'] : 0;
 
    if (!$post_id) {
        wp_send_json_error(['message' => 'Tin đăng không hợp lệ.']);
    }
 
    $owner_id = (int) get_post_meta($post_id, '_custom_user_id', true);
    if ($owner_id && $owner_id !== $user_id) {
        wp_send_json_error(['message' => 'Bạn không có quyền với tin đăng này.'], 403);
    }
    $vip_check = function_exists('bds_check_post_vip') ? bds_check_post_vip($post_id) : ['is_vip' => false];
    $push_type = $vip_check['is_vip'] ? 'vip' : 'normal';
    $price     = ($push_type === 'vip') ? 20000 : 10000;
    $hours     = ($push_type === 'vip') ? QL_PUSH_VIP_HOURS : QL_PUSH_NORMAL_HOURS;
    $quota_col = ($push_type === 'vip') ? 'push_vip_quota' : 'push_normal_quota';
    global $wpdb;
    $wpdb->query('START TRANSACTION');
    try {
        $quota = $wpdb->get_row($wpdb->prepare(
            "SELECT * FROM {$wpdb->prefix}custom_user_quotas WHERE user_id = %d FOR UPDATE",
            $user_id
        ));
 
        $used_quota = false;
        if ($quota && (int) $quota->$quota_col > 0) {
            $wpdb->update(
                "{$wpdb->prefix}custom_user_quotas",
                [$quota_col => $quota->$quota_col - 1, 'updated_at' => current_time('mysql')],
                ['user_id' => $user_id]
            );
            $used_quota = true;
            $source = 'quota';
 
        } else {
            $wallet = $wpdb->get_row($wpdb->prepare(
                "SELECT * FROM {$wpdb->prefix}custom_wallets WHERE user_id = %d FOR UPDATE",
                $user_id
            ));
 
            if (!$wallet) {
                throw new Exception('INSUFFICIENT_BALANCE');
            }
 
            $balance_bonus = (float) $wallet->balance_bonus;
            $balance_main  = (float) $wallet->balance_main;
            $total         = $balance_bonus + $balance_main;
 
            if ($total < $price) {
                throw new Exception('INSUFFICIENT_BALANCE');
            }
 
            $remaining = $price;
            $use_bonus = min($balance_bonus, $remaining);
            $remaining -= $use_bonus;
            $use_main  = min($balance_main, $remaining);
            $wpdb->update(
                "{$wpdb->prefix}custom_wallets",
                [
                    'balance_bonus' => $balance_bonus - $use_bonus,
                    'balance_main'  => $balance_main - $use_main,
                    'updated_at'    => current_time('mysql'),
                ],
                ['user_id' => $user_id]
            );
            $source = ($use_bonus > 0 && $use_main > 0) ? 'bonus+main' : (($use_bonus > 0) ? 'bonus' : 'main');
            $wpdb->insert("{$wpdb->prefix}custom_transactions", [
                'user_id'          => $user_id,
                'transaction_type' => 'purchase',
                'wallet_type'      => ($use_bonus > 0 && $use_main > 0) ? 'both' : (($use_bonus > 0) ? 'bonus' : 'main'),
                'amount'           => $price,
                'balance_after'    => $balance_main - $use_main,
                'payment_method'   => 'wallet',
                'reference_code'   => 'PUSH-' . $post_id . '-' . time(),
                'related_table'    => "{$wpdb->prefix}custom_post_pushes",
                'related_id'       => $post_id,
                'status'           => 'completed',
                'description'      => 'Đẩy tin ' . ($push_type === 'vip' ? 'VIP' : 'thường'),
                'created_at'       => current_time('mysql'),
            ]);
        }
        $wpdb->update(
            "{$wpdb->prefix}custom_post_pushes",
            ['status' => 'expired'],
            ['post_id' => $post_id, 'push_type' => $push_type, 'status' => 'active']
        );
        $expired_at = date('Y-m-d H:i:s', current_time('timestamp') + ($hours * HOUR_IN_SECONDS));
        $wpdb->insert("{$wpdb->prefix}custom_post_pushes", [
            'post_id'     => $post_id,
            'user_id'     => $user_id,
            'push_type'   => $push_type,
            'source'      => $used_quota ? 'quota' : 'purchase',
            'started_at'  => current_time('mysql'),
            'expired_at'  => $expired_at,
            'status'      => 'active',
            'created_at'  => current_time('mysql'),
        ]);
        $wpdb->update(
            "{$wpdb->prefix}custom_post_listings",
            ['push_count' => $wpdb->get_var($wpdb->prepare(
                "SELECT push_count FROM {$wpdb->prefix}custom_post_listings WHERE post_id = %d", $post_id
            )) + 1, 'updated_at' => current_time('mysql')],
            ['post_id' => $post_id]
        );
 
        $wpdb->query('COMMIT');
 
        wp_send_json_success([
            'message'   => 'Đẩy tin ' . ($push_type === 'vip' ? 'VIP' : 'thường') . ' thành công! Hiệu lực đến ' . date('H:i d/m/Y', strtotime($expired_at)),
            'push_type' => $push_type,
            'expired_at' => $expired_at,
        ]);
 
    } catch (Exception $e) {
        $wpdb->query('ROLLBACK');
        if ($e->getMessage() === 'INSUFFICIENT_BALANCE') {
            wp_send_json_error(['insufficient_balance' => true, 'message' => 'Số dư không đủ để đẩy tin. Vui lòng nạp thêm tiền.']);
        }
        wp_send_json_error(['message' => $e->getMessage()]);
    }
}

function qlt_scripts() {
    wp_enqueue_script(
        'qlt-popup',
        get_template_directory_uri() . '/js/qlt-popups.js',
        array('jquery'), 
        filemtime(get_template_directory() . '/js/qlt-popups.js'), 
        true
    );

    wp_localize_script('qlt-popup', 'qlt_ajax', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('ql_listing_nonce'),
    ]);
}
add_action('wp_enqueue_scripts', 'qlt_scripts');

//sort vip post
require_once get_template_directory() . '/bds-vip-sort-helper.php';

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
//VIDEO
function get_youtube_id_from_url($url) {
    if (empty($url)) return '';
    $pattern = '#(?:youtube\.com/(?:watch\?v=|embed/|shorts/|live/)|youtu\.be/)([a-zA-Z0-9_-]{11})#';
    if (preg_match($pattern, $url, $matches)) {
        return $matches[1];
    }
    return '';
}

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

//UPGRADE MEMBER PLAN
define('QL_MEMBER_PLAN_PRICES', [
    'goi1' => 149000,
    'goi2' => 299000,
    'goi3' => 599000,
]);
 
define('QL_MEMBER_PLAN_RANK', [
    'goi1' => 1,
    'goi2' => 2,
    'goi3' => 3,
]);
 
define('QL_MEMBER_PLAN_NAMES', [
    'goi1' => 'Gói Khởi Đầu',
    'goi2' => 'Gói Nâng Cao',
    'goi3' => 'Gói Toàn Diện',
]);
 
define('QL_MEMBER_PLAN_VOUCHERS', [
    'goi1' => ['post_normal' => 10, 'push_normal' => 10, 'post_vip' => 0, 'push_vip' => 0],
    'goi2' => ['post_normal' => 25, 'push_normal' => 25, 'post_vip' => 1, 'push_vip' => 0],
    'goi3' => ['post_normal' => 50, 'push_normal' => 50, 'post_vip' => 3, 'push_vip' => 5],
]);
 
define('QL_MEMBER_PLAN_VOUCHER_DISCOUNT_PERCENT', 10);

function ql_member_plan_key_to_enum(string $plan_key): string {
    $map = [
        'goi1' => 'free',
        'goi2' => 'pro',
        'goi3' => 'vip',
    ];
    return $map[$plan_key] ?? 'free';
}
 
function ql_member_plan_enum_to_key(string $plan_enum): string {
    $map = [
        'free' => 'goi1',
        'pro'  => 'goi2',
        'vip'  => 'goi3',
    ];
    return $map[$plan_enum] ?? '';
}

function ql_get_current_member_plan(int $user_id): ?object {
    global $wpdb;
    $row = $wpdb->get_row($wpdb->prepare(
        "SELECT id, plan, expired_at, status
         FROM {$wpdb->prefix}custom_member_plans
         WHERE user_id = %d AND status = 'active'
         ORDER BY id DESC
         LIMIT 1",
        $user_id
    ));
    if (!$row) {
        return null;
    }
 
    $plan_key = ql_member_plan_enum_to_key($row->plan);
    if (empty($plan_key)) {
        return null;
    }
    return (object) [
        'id'         => (int) $row->id,
        'plan_key'   => $plan_key,
        'plan_enum'  => $row->plan,
        'expired_at' => $row->expired_at,
    ];
}
 
function ql_expire_member_plan_row(int $plan_row_id): bool {
    global $wpdb;
    $updated = $wpdb->update(
        "{$wpdb->prefix}custom_member_plans",
        ['status' => 'expired', 'updated_at' => current_time('mysql')],
        ['id' => $plan_row_id],
        ['%s', '%s'],
        ['%d']
    );
    return $updated !== false;
}

 
add_action('wp_ajax_bds_upgrade_member_plan', 'bds_handle_upgrade_member_plan');
add_action('wp_ajax_nopriv_bds_upgrade_member_plan', 'bds_handle_upgrade_member_plan');
function bds_handle_upgrade_member_plan() {
    check_ajax_referer('ql_member_plan_nonce', '_nonce');
 
    $custom_user = get_current_custom_user();
    if (!$custom_user) {
        wp_send_json_error(['message' => 'Bạn cần đăng nhập.'], 401);
    }
 
    $user_id = (int) $custom_user->id;
    $plan    = isset($_POST['plan']) ? sanitize_key($_POST['plan']) : '';
    $prices = QL_MEMBER_PLAN_PRICES;
    if (!isset($prices[$plan])) {
        wp_send_json_error(['message' => 'Gói thành viên không hợp lệ.']);
    }
    $price = $prices[$plan];
    $current = ql_get_current_member_plan($user_id);
    $current_plan_key = $current->plan_key ?? '';
 
    if ($current_plan_key === $plan) {
        wp_send_json_error(['message' => 'Bạn đang sử dụng gói này rồi.']);
    }
 
    if (!empty($current_plan_key) && isset(QL_MEMBER_PLAN_RANK[$current_plan_key])) {
        $current_rank  = QL_MEMBER_PLAN_RANK[$current_plan_key];
        $selected_rank = QL_MEMBER_PLAN_RANK[$plan];
        if ($selected_rank < $current_rank) {
            wp_send_json_error([
                'message'            => 'Bạn đang có ' . QL_MEMBER_PLAN_NAMES[$current_plan_key] . '. Không thể đăng ký gói thấp hơn.',
                'downgrade_blocked'  => true,
                'current_plan'       => $current_plan_key,
                'current_plan_name'  => QL_MEMBER_PLAN_NAMES[$current_plan_key],
            ]);
        }
    }
 
    global $wpdb;
    $wpdb->query('START TRANSACTION');
    try {
        ql_deduct_wallet_balance(
            $user_id,
            $price,
            'MEMBERPLAN',
            0,
            'Đăng ký gói thành viên: ' . $plan
        );
 
        $started_at = current_time('Y-m-d');
        $expired_at = date('Y-m-d', strtotime('+30 days'));
        if ($current) {
            ql_expire_member_plan_row($current->id);
        }
        $wpdb->insert("{$wpdb->prefix}custom_member_plans", [
            'user_id'      => $user_id,
            'plan'         => ql_member_plan_key_to_enum($plan),
            'billing'      => 'monthly',
            'amount_paid'  => $price,
            'started_at'   => $started_at,
            'expired_at'   => $expired_at,
            'auto_renew'   => 1,
            'status'       => 'active',
            'created_at'   => current_time('mysql'),
            'updated_at'   => current_time('mysql'),
        ]);
        $member_plan_id = $wpdb->insert_id;
        bds_issue_member_plan_vouchers($user_id, $plan, $expired_at, $member_plan_id);
        $wpdb->query('COMMIT');
        wp_send_json_success([
            'message'    => 'Đăng ký gói thành công!',
            'plan'       => $plan,
            'expired_at' => $expired_at,
        ]);
    } catch (Exception $e) {
        $wpdb->query('ROLLBACK');
        ql_send_wallet_error($e);
    }
}
 
function bds_generate_voucher_code(string $prefix): string {
    global $wpdb;
    do {
        $code = strtoupper($prefix . '-' . wp_generate_password(8, false, false));
        $exists = $wpdb->get_var($wpdb->prepare(
            "SELECT COUNT(*) FROM {$wpdb->prefix}custom_vouchers WHERE code = %s",
            $code
        ));
    } while ($exists > 0);
    return $code;
}
 
function bds_issue_member_plan_vouchers(int $user_id, string $plan, string $expired_at, int $member_plan_id): void {
    global $wpdb;

    $counts = QL_MEMBER_PLAN_VOUCHERS[$plan];
    $table  = "{$wpdb->prefix}custom_vouchers";
    $today  = current_time('Y-m-d');
    $voucher_specs = [
        [$counts['post_normal'], 'post', 'post', 'DTT'],
        [$counts['push_normal'], 'post', 'push', 'DAT'],
        [$counts['post_vip'],    'vip',  'post', 'DTV'],
        [$counts['push_vip'],    'vip',  'push', 'DAV'],
    ];

    foreach ($voucher_specs as [$qty, $voucher_type, $action_type, $prefix]) {
        $qty = (int) $qty;
        if ($qty <= 0) {
            continue;
        }
        $existing = $wpdb->get_row($wpdb->prepare(
            "SELECT id, quantity, quantity_total
             FROM {$table}
             WHERE user_id = %d
               AND voucher_type = %s
               AND action_type = %s
               AND source = 'member'
               AND status = 'active'
               AND issue_date = %s
             LIMIT 1",
            $user_id, $voucher_type, $action_type, $today
        ));

        if ($existing) {
            $wpdb->query($wpdb->prepare(
                "UPDATE {$table}
                 SET quantity = quantity + %d,
                     quantity_total = quantity_total + %d,
                     expired_at = %s
                 WHERE id = %d",
                $qty, $qty, $expired_at, $existing->id
            ));

            if ($wpdb->last_error) {
                throw new Exception('Không thể cập nhật voucher: ' . $wpdb->last_error);
            }
        } else {
            $code = bds_generate_voucher_code($prefix);
            $wpdb->insert($table, [
                'user_id'        => $user_id,
                'code'           => $code,
                'voucher_type'   => $voucher_type,
                'action_type'    => $action_type,
                'value'          => QL_MEMBER_PLAN_VOUCHER_DISCOUNT_PERCENT,
                'value_type'     => 'percent',
                'quantity'       => $qty,
                'quantity_total' => $qty,
                'min_order'      => 0,
                'max_discount'   => null,
                'source'         => 'member',
                'expired_at'     => $expired_at,
                'issue_date'     => $today,
                'status'         => 'active',
                'created_at'     => current_time('mysql'),
            ]);
            if ($wpdb->last_error) {
                throw new Exception('Không thể tạo voucher: ' . $wpdb->last_error);
            }
        }
    }
}
 
add_action('wp_enqueue_scripts', function () {
    $is_member_plan_tab = is_page('quan-ly-tai-khoan') && get_query_var('tab') === 'goi-thanh-vien';
 
    if ($is_member_plan_tab) {
        wp_enqueue_script(
            'goi-thanh-vien-purchase',
            get_stylesheet_directory_uri() . '/js/goi-thanh-vien-purchase.js',
            ['jquery'],
            filemtime(get_stylesheet_directory() . '/js/goi-thanh-vien-purchase.js'),
            true
        );
        wp_localize_script('goi-thanh-vien-purchase', 'qlt_member_ajax', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('ql_member_plan_nonce'),
        ]);
    }
});

//VOUCHER
function ql_expire_overdue_vouchers(int $user_id): void {
    global $wpdb;
    $table = "{$wpdb->prefix}custom_vouchers";
    $wpdb->query($wpdb->prepare(
        "UPDATE {$table}
         SET status = 'expired'
         WHERE user_id = %d
           AND status = 'active'
           AND expired_at IS NOT NULL
           AND expired_at < CURDATE()",
        $user_id
    ));
}

function ql_get_voucher_counts(int $user_id): array {
    global $wpdb;
    $table = "{$wpdb->prefix}custom_vouchers";
    $rows = $wpdb->get_results($wpdb->prepare(
        "SELECT status, COUNT(*) as cnt
         FROM {$table}
         WHERE user_id = %d
         GROUP BY status",
        $user_id
    ), OBJECT_K);
    return [
        'active'  => isset($rows['active'])  ? (int) $rows['active']->cnt  : 0,
        'used'    => isset($rows['used'])    ? (int) $rows['used']->cnt    : 0,
        'expired' => isset($rows['expired']) ? (int) $rows['expired']->cnt : 0,
    ];
}

function ql_get_vouchers_by_status(int $user_id, string $status): array {
    global $wpdb;
    $table = "{$wpdb->prefix}custom_vouchers";
    $allowed_status = ['active', 'used', 'expired'];
    if (!in_array($status, $allowed_status, true)) {
        $status = 'active';
    }
    return $wpdb->get_results($wpdb->prepare(
        "SELECT * FROM {$table}
         WHERE user_id = %d AND status = %s
         ORDER BY created_at DESC",
        $user_id, $status
    ));
}

function ql_voucher_category_label(string $voucher_type, string $action_type): string {
    if ($voucher_type === 'vip') {
        return $action_type === 'push' ? 'Đẩy tin VIP' : 'Đăng tin VIP';
    }
    if ($voucher_type === 'discount') {
        return 'Chung';
    }
    return $action_type === 'push' ? 'Đẩy tin' : 'Tin đăng';
}

function ql_voucher_color(string $voucher_type): string {
    if ($voucher_type === 'vip') return 'blue';
    if ($voucher_type === 'discount') return 'green';
    return 'red';
}

function ql_voucher_discount_label($value, string $value_type): string {
    if ($value_type === 'percent') {
        $trimmed = rtrim(rtrim((string) $value, '0'), '.');
        return ($trimmed === '' ? '0' : $trimmed) . '%';
    }
    return number_format((float) $value, 0, ',', '.') . 'K';
}

function ql_format_voucher_for_display(object $row): array {
    return [
        'code'           => $row->code,
        'title'          => ql_voucher_category_label($row->voucher_type, $row->action_type). ' -' . ql_voucher_discount_label($row->value, $row->value_type),
        'desc'           => $row->min_order > 0 ? 'Áp dụng cho đơn hàng từ ' . number_format((float) $row->min_order, 0, ',', '.') . ' ₫ trở lên.' : 'Không giới hạn giá trị đơn hàng tối thiểu.',
        'discount'       => ql_voucher_discount_label($row->value, $row->value_type),
        'discount_type'  => $row->value_type,
        'expires'        => $row->expired_at ? date('d/m/Y', strtotime($row->expired_at)) : '',
        'used_date'      => $row->used_at ? date('d/m/Y', strtotime($row->used_at)) : '',
        'min_order'      => $row->min_order > 0 ? number_format((float) $row->min_order, 0, ',', '.') . ' ₫' : '',
        'color'          => ql_voucher_color($row->voucher_type),
        'category'       => ql_voucher_category_label($row->voucher_type, $row->action_type),
        'quantity'       => (int) $row->quantity,
        'quantity_total' => (int) $row->quantity_total,
    ];
}

function ql_consume_voucher(int $voucher_id, int $user_id): bool {
    global $wpdb;
    $table = "{$wpdb->prefix}custom_vouchers";
    $voucher = $wpdb->get_row($wpdb->prepare(
        "SELECT id, quantity, status, expired_at
         FROM {$table}
         WHERE id = %d AND user_id = %d
         FOR UPDATE",
        $voucher_id, $user_id
    ));

    if (!$voucher || $voucher->status !== 'active' || (int) $voucher->quantity <= 0) {
        return false;
    }

    if ($voucher->expired_at && strtotime($voucher->expired_at) < strtotime('today')) {
        $wpdb->update($table, ['status' => 'expired'], ['id' => $voucher_id]);
        return false;
    }
    $new_qty = (int) $voucher->quantity - 1;
    $new_status = $new_qty <= 0 ? 'used' : 'active';
    $updated = $wpdb->update(
        $table,
        [
            'quantity' => $new_qty,
            'status'   => $new_status,
            'used_at'  => current_time('mysql'),
        ],
        ['id' => $voucher_id]
    );
    return $updated !== false;
}

function ql_get_voucher_page_data(int $user_id, string $vtab): array {
    ql_expire_overdue_vouchers($user_id);

    $status_map = [
        'available' => 'active',
        'used'      => 'used',
        'expired'   => 'expired',
    ];
    $db_status = $status_map[$vtab] ?? 'active';
    $raw_rows = ql_get_vouchers_by_status($user_id, $db_status);
    $counts   = ql_get_voucher_counts($user_id);
    $display_vouchers = array_map('ql_format_voucher_for_display', $raw_rows);
    return [
        'vouchers' => $display_vouchers,
        'counts'   => [
            'available' => $counts['active'],
            'used'      => $counts['used'],
            'expired'   => $counts['expired'],
        ],
    ];
}

function ql_check_voucher_code(int $user_id, string $code): array {
    global $wpdb;
    $table = "{$wpdb->prefix}custom_vouchers";
    $code  = strtoupper(trim($code));

    if ($code === '') {
        return ['valid' => false, 'message' => 'Vui lòng nhập mã voucher.', 'voucher' => null];
    }
    $voucher = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$table} WHERE user_id = %d AND code = %s",$user_id, $code));

    if (!$voucher) {
        return ['valid' => false, 'message' => 'Mã voucher không tồn tại hoặc không thuộc về bạn.', 'voucher' => null];
    }
    if ($voucher->status === 'used') {
        return ['valid' => false, 'message' => 'Mã voucher này đã được sử dụng.', 'voucher' => null];
    }
    if ($voucher->status === 'expired' || ($voucher->expired_at && strtotime($voucher->expired_at) < strtotime('today'))) {
        return ['valid' => false, 'message' => 'Mã voucher này đã hết hạn.', 'voucher' => null];
    }
    return ['valid' => true, 'message' => 'Mã voucher hợp lệ! Áp dụng: ' . ql_voucher_discount_label($voucher->value, $voucher->value_type), 'voucher' => $voucher];
}
add_action('wp_ajax_ql_check_voucher_code', 'ql_ajax_check_voucher_code');
function ql_ajax_check_voucher_code() {
    check_ajax_referer('ql_voucher_nonce', '_nonce');
    $custom_user = get_current_custom_user();
    if (!$custom_user) {
        wp_send_json_error(['message' => 'Bạn cần đăng nhập.'], 401);
    }
    $code   = isset($_POST['code']) ? sanitize_text_field(wp_unslash($_POST['code'])) : '';
    $result = ql_check_voucher_code((int) $custom_user->id, $code);

    if ($result['valid']) {
        wp_send_json_success(['message' => $result['message']]);
    } else {
        wp_send_json_error(['message' => $result['message']]);
    }
}

add_action('wp_enqueue_scripts', function () {
    $is_voucher_tab = is_page('quan-ly-tai-khoan') && get_query_var('tab') === 'voucher';
    if ($is_voucher_tab) {
        wp_localize_script('jquery', 'qlt_voucher_ajax', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('ql_voucher_nonce'),
        ]);
    }
});

//PAYMENT
require_once get_stylesheet_directory() . '/inc/payment-config.php';
require_once get_stylesheet_directory() . '/inc/payment-functions.php';
add_action('wp_enqueue_scripts', function () {
    $is_naptien_tab = is_page('quan-ly-tai-khoan') && get_query_var('tab') === 'nap-tien';
 
    if ($is_naptien_tab) {
        wp_enqueue_script(
            'nt-nap-tien',
            get_stylesheet_directory_uri() . '/js/nap-tien.js',
            ['jquery'],
            filemtime(get_stylesheet_directory() . '/js/nap-tien.js'),
            true
        );
        wp_localize_script('nt-nap-tien', 'qlt_nap_tien_ajax', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('bds_deposit_nonce'),
        ]);
    }
});

//TRANSACTION
function lsgd_get_transactions($user_id, $args = []) {
    global $wpdb;
 
    $user_id  = (int) $user_id;
    $tx_table = $wpdb->prefix . 'custom_transactions';
 
    $defaults = [
        'type'     => '',
        'month'    => '',
        'paged'    => 1,
        'per_page' => 15,
    ];
    $args = wp_parse_args($args, $defaults);
    $type_map_ui_to_db = [
        'nap'  => ['deposit', 'bonus'],
        'chi'  => ['withdraw', 'purchase', 'transfer'],
        'hoan' => ['refund'],
    ];
 
    $where  = ['user_id = %d', "status != 'pending'"];
    $params = [$user_id];
 
    if ($args['type'] && isset($type_map_ui_to_db[$args['type']])) {
        $types        = $type_map_ui_to_db[$args['type']];
        $placeholders = implode(',', array_fill(0, count($types), '%s'));
        $where[]      = "transaction_type IN ($placeholders)";
        foreach ($types as $t) {
            $params[] = $t;
        }
    }
 
    if ($args['month'] && preg_match('/^\d{4}-\d{2}$/', $args['month'])) {
        [$y, $m]   = explode('-', $args['month']);
        $where[]   = 'YEAR(created_at) = %d AND MONTH(created_at) = %d';
        $params[]  = (int) $y;
        $params[]  = (int) $m;
    }
 
    $where_sql = implode(' AND ', $where);
    $count_sql   = "SELECT COUNT(*) FROM $tx_table WHERE $where_sql";
    $total_items = (int) $wpdb->get_var($wpdb->prepare($count_sql, $params));
    $per_page    = max(1, (int) $args['per_page']);
    $total_pages = max(1, (int) ceil($total_items / $per_page));
    $paged       = min(max(1, (int) $args['paged']), $total_pages);
    $offset      = ($paged - 1) * $per_page;
     $list_sql    = "SELECT * FROM $tx_table WHERE $where_sql ORDER BY created_at DESC LIMIT %d OFFSET %d";
    $list_params = array_merge($params, [$per_page, $offset]);
    $transactions = $wpdb->get_results($wpdb->prepare($list_sql, $list_params));
 
    return [
        'items'       => $transactions,
        'total_items' => $total_items,
        'total_pages' => $total_pages,
        'paged'       => $paged,
        'per_page'    => $per_page,
        'offset'      => $offset,
    ];
}
 
function lsgd_get_month_summary($user_id) {
    global $wpdb;
 
    $user_id  = (int) $user_id;
    $tx_table = $wpdb->prefix . 'custom_transactions';
    $year     = (int) date('Y');
    $month    = (int) date('n');
 
    $nap = (float) $wpdb->get_var($wpdb->prepare(
        "SELECT COALESCE(SUM(amount),0) FROM $tx_table
         WHERE user_id = %d AND status = 'completed'
         AND transaction_type IN ('deposit','bonus','refund')
         AND YEAR(created_at) = %d AND MONTH(created_at) = %d",
        $user_id, $year, $month
    ));
 
    $chi = (float) $wpdb->get_var($wpdb->prepare(
        "SELECT COALESCE(SUM(amount),0) FROM $tx_table
         WHERE user_id = %d AND status = 'completed'
         AND transaction_type IN ('withdraw','purchase','transfer')
         AND YEAR(created_at) = %d AND MONTH(created_at) = %d",
        $user_id, $year, $month
    ));
 
    return ['nap' => $nap, 'chi' => $chi];
}
 
function lsgd_get_wallet_balance($user_id) {
    global $wpdb;
 
    $user_id       = (int) $user_id;
    $wallets_table = $wpdb->prefix . 'custom_wallets';
 
    $wallet = $wpdb->get_row($wpdb->prepare(
        "SELECT balance_main, balance_bonus FROM $wallets_table WHERE user_id = %d",
        $user_id
    ));
 
    $main  = $wallet ? (float) $wallet->balance_main : 0;
    $bonus = $wallet ? (float) $wallet->balance_bonus : 0;
 
    return [
        'main'  => $main,
        'bonus' => $bonus,
        'total' => $main + $bonus,
    ];
}
 
if (!function_exists('lsgd_fmt')) {
    function lsgd_fmt($n) {
        return number_format((float) $n, 0, ',', '.') . ' ₫';
    }
}
 
if (!function_exists('lsgd_type_meta')) {
    function lsgd_type_meta($db_type) {
        $map = [
            'deposit'  => ['label' => 'Nạp tiền',    'ui' => 'nap',  'sign' => '+'],
            'bonus'    => ['label' => 'Khuyến mãi',  'ui' => 'nap',  'sign' => '+'],
            'refund'   => ['label' => 'Hoàn tiền',   'ui' => 'hoan', 'sign' => '+'],
            'withdraw' => ['label' => 'Rút tiền',    'ui' => 'chi',  'sign' => '-'],
            'purchase' => ['label' => 'Thanh toán',  'ui' => 'chi',  'sign' => '-'],
            'transfer' => ['label' => 'Chuyển tiền', 'ui' => 'chi',  'sign' => '-'],
        ];
        return $map[$db_type] ?? ['label' => ucfirst($db_type), 'ui' => 'chi', 'sign' => '-'];
    }
}
 
if (!function_exists('lsgd_method_label')) {
    function lsgd_method_label($method) {
        $map = [
            'momo'    => 'MoMo',
            'zalopay' => 'ZaloPay',
            'vnpay'   => 'VNPay',
            'bank'    => 'Ngân hàng',
            'wallet'  => 'Ví nội bộ',
            'system'  => 'Hệ thống',
        ];
        return $map[$method] ?? ($method ?: '—');
    }
}
 
if (!function_exists('lsgd_status_meta')) {
    function lsgd_status_meta($status) {
        $map = [
            'completed' => ['label' => 'Thành công', 'css' => 'lsgd-status-completed'],
            'failed'    => ['label' => 'Thất bại',   'css' => 'lsgd-status-failed'],
            'cancelled' => ['label' => 'Đã huỷ',     'css' => 'lsgd-status-cancelled'],
        ];
        return $map[$status] ?? ['label' => ucfirst($status), 'css' => 'lsgd-status-other'];
    }
}
///////////////////
function html5blank_conditional_scripts() {}
function html5_blank_view_article() {}

