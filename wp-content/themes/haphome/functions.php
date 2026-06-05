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
function create_otp_table(){
    global $wpdb;
    $table = $wpdb->prefix . 'phone_otp';
    $charset = $wpdb->get_charset_collate();
    $sql = "
    CREATE TABLE IF NOT EXISTS $table (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        phone VARCHAR(20) NOT NULL,
        otp VARCHAR(10) NOT NULL,
        expired_at DATETIME NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        is_used TINYINT(1) DEFAULT 0,

        INDEX(phone),
        INDEX(created_at)
    ) $charset;
    ";
    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($sql);
}
add_action('after_switch_theme','create_otp_table');

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
    $result = $wpdb->insert(
        $table,
        [
            'phone'      => $phone,
            'otp'        => $otp,
            'expired_at' => date('Y-m-d H:i:s',time() + 300),
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
    if(strtotime($row->expired_at) < time()){
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

// CREATE TABLE USER 
// function create_user_table(){
//     global $wpdb;
//     $table = $wpdb->prefix . 'custom_users';
//     $charset = $wpdb->get_charset_collate();
//     $sql = "
//     CREATE TABLE $table (
//         id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//         phone VARCHAR(20) NOT NULL UNIQUE,
//         password VARCHAR(255) NOT NULL,
//         full_name VARCHAR(255) NULL,
//         email VARCHAR(255) NULL,
//         status TINYINT(1) DEFAULT 1,
//         google_id VARCHAR(255) NULL,
//         apple_id VARCHAR(255) NULL,
//         avatar TEXT NULL,
//         created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
//         updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

//         INDEX(phone),
//         INDEX(email)) $charset ;";
//     require_once ABSPATH . 'wp-admin/includes/upgrade.php';
//     dbDelta($sql);
// }
// add_action('after_switch_theme','create_user_table');
// create_user_table();

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
            'phone'      => $phone,
            'password'   => password_hash($password,PASSWORD_DEFAULT),
            'full_name'   => $full_name,
            'created_at' => current_time('mysql')
        ], ['%s','%s','%s','%s']
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
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        unset($_SESSION['custom_user_id']);
        session_destroy();
        wp_redirect(home_url());
        exit;
    }
}

// FORGOT PASSWORD 

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
add_action('init','start_custom_session');
///////////////////
function html5blank_conditional_scripts() {}
function html5_blank_view_article() {}

