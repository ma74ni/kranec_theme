<?php
function krnc_register_styles() {
  $version = wp_get_theme()->get('Version');
  wp_enqueue_style('krnc_fullpage', 'https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.7/fullpage.css', array(), '', 'all');
  wp_enqueue_style('krnc_tailwind', get_template_directory_uri() . '/css/style.css');
  wp_enqueue_style('krnc_elder_carousel', get_template_directory_uri() . '/assets/css/dist/style.css');
  wp_enqueue_style('krnc_style', get_template_directory_uri() . '/style.css', array(), $version, 'all');
  wp_enqueue_style('krnc_main', get_template_directory_uri() . '/assets/css/main.css', array(), $version, 'all');
}
add_action('wp_enqueue_scripts', 'krnc_register_styles');

function krnc_register_scripts() {
  //Develop
  wp_enqueue_script('krnc_vuejs', 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js', array(), '', true);
  //Production
  /*wp_enqueue_script('krnc_vuejs', 'https://cdn.jsdelivr.net/npm/vue', array(), '', true);*/
  wp_enqueue_script('krnc_scrolloverflow', 'https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.9/vendors/scrolloverflow.min.js', array(), '', true);
  wp_enqueue_script('krnc_fullpage', 'https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.9/fullpage.js', array(), '', true);
  wp_enqueue_script('krnc_mailchimp', 'https://s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js', array(), '', true);
  wp_enqueue_script('krnc_elder_carousel', get_template_directory_uri() . '/assets/js/dist/index.min.js', array(), '', true);
  wp_enqueue_script('krnc_js', get_template_directory_uri() . '/assets/js/main.js', array('jquery','media-upload' ), '1.0', true);
}
add_action('wp_enqueue_scripts', 'krnc_register_scripts');

function krnc_register_admin_scripts() {
  wp_enqueue_script('krnc_img_upload', get_template_directory_uri() . '/assets/js/admin.js', array('jquery','media-upload' ), '1.0', true);
  wp_localize_script('krnc_img_upload', 'customUploads', array('imageData' => get_post_meta(get_the_ID(), 'data-custom-image', true)));
}
add_action('admin_enqueue_scripts', 'krnc_register_admin_scripts');

function krnc_theme_support(){
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'krnc_theme_support');

function krnc_menus(){
  $locations = array('primary' => "Menú Principal");
  register_nav_menus($locations);
}
add_action('init', 'krnc_menus');

function krnc_add_li_class($classes, $item, $args) {
    if($args->add_li_class) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'krnc_add_li_class', 1, 3);

function krnc_duplicate_post_as_draft(){
  global $wpdb;
  if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'krnc_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
    wp_die('No post to duplicate has been supplied!');
  }
 
  /*
   * Nonce verification
   */
  if ( !isset( $_GET['duplicate_nonce'] ) || !wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) )
    return;
 
  /*
   * get the original post id
   */
  $post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
  /*
   * and all the original post data then
   */
  $post = get_post( $post_id );
 
  /*
   * if you don't want current user to be the new post author,
   * then change next couple of lines to this: $new_post_author = $post->post_author;
   */
  $current_user = wp_get_current_user();
  $new_post_author = $current_user->ID;
 
  /*
   * if post data exists, create the post duplicate
   */
  if (isset( $post ) && $post != null) {
 
    /*
     * new post data array
     */
    $args = array(
      'comment_status' => $post->comment_status,
      'ping_status'    => $post->ping_status,
      'post_author'    => $new_post_author,
      'post_content'   => $post->post_content,
      'post_excerpt'   => $post->post_excerpt,
      'post_name'      => $post->post_name,
      'post_parent'    => $post->post_parent,
      'post_password'  => $post->post_password,
      'post_status'    => 'draft',
      'post_title'     => $post->post_title,
      'post_type'      => $post->post_type,
      'to_ping'        => $post->to_ping,
      'menu_order'     => $post->menu_order
    );
 
    /*
     * insert the post by wp_insert_post() function
     */
    $new_post_id = wp_insert_post( $args );
 
    /*
     * get all current post terms ad set them to the new post draft
     */
    $taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
    foreach ($taxonomies as $taxonomy) {
      $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
      wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
    }
 
    /*
     * duplicate all post meta just in two SQL queries
     */
    $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
    if (count($post_meta_infos)!=0) {
      $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
      foreach ($post_meta_infos as $meta_info) {
        $meta_key = $meta_info->meta_key;
        if( $meta_key == '_wp_old_slug' ) continue;
        $meta_value = addslashes($meta_info->meta_value);
        $sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
      }
      $sql_query.= implode(" UNION ALL ", $sql_query_sel);
      $wpdb->query($sql_query);
    }
 
 
    /*
     * finally, redirect to the edit post screen for the new draft
     */
    wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
    exit;
  } else {
    wp_die('Post creation failed, could not find original post: ' . $post_id);
  }
}
add_action( 'admin_action_krnc_duplicate_post_as_draft', 'krnc_duplicate_post_as_draft' );
 
/*
 * Add the duplicate link to action list for post_row_actions
 */
function krnc_duplicate_post_link( $actions, $post ) {
  if (current_user_can('edit_posts')) {
    $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=krnc_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicar entrada" rel="permalink">Duplicar</a>';
  }
  return $actions;
}
 
add_filter( 'post_row_actions', 'krnc_duplicate_post_link', 10, 2 );

function krnc_first_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $post->post_content, $matches);
  $first_img = $matches[1][0];

  if(empty($first_img)) {
    $first_img = get_template_directory_uri() . '/assets/images/default.png';
  }
  return $first_img;
}

function krnc_remove_first_image ($content) {
if (!is_page() && !is_feed() && !is_home()){
$content = preg_replace("/<img[^>]+\>/i", "", $content, 1);
} return $content;
}
add_filter('the_content', 'krnc_remove_first_image');

function krnc_create_portfolio_taxonomy() {
  register_taxonomy(
    'portfolio-taxonomy',
    'portfolio',
    array(
      'label' => __('Categorías'),
      'rewrite' => array(
        'slug' => 'portfolio-category'
      ),
      'hierarchical' => true
    )
  );
}
add_action('init', 'krnc_create_portfolio_taxonomy');

function krnc_create_portfolio_posttype() {
  register_post_type('portfolio',
  array(
    'labels' => array(
      'name' => __('Portafolio'),
      'singular_name' => __('Portafolio')
    ),
    'public' => true,
    'menu_icon' => 'dashicons-portfolio',
    'has_archive' => false,
    'rewrite' => array('slug' => 'experiencia'),
    'taxonomies' => array( 'portfolio-taxonomy' ),
    'supports' => array( 'title', 'editor', 'thumbnail', )
  ));
}
add_action('init', 'krnc_create_portfolio_posttype');

function krnc_add_custom_box() {

    $screens = array('portfolio' );

    foreach ( $screens as $screen ) {

        add_meta_box(
            'image_metabox',
            'Subir Logo Cliente',
            'krnc_image_uploader',
            $screen
        );
    }
}
add_action( 'add_meta_boxes', 'krnc_add_custom_box' );

function krnc_image_uploader( $post ) {

  // Add an nonce field so we can check for it later.
  wp_nonce_field( 'krnc_image_uploader', 'krnc_image_uploader_nonce' );

  /*
   * Use get_post_meta() to retrieve an existing value
   * from the database and use the value for the form.
   */
  $value = get_post_meta( $post->ID, '_my_meta_value_key', true );
    wp_nonce_field(basename(__FILE__), 'custom_image_nonce');
  ?>
    <div id="metabox-wrapper">
      <img id="logo-tag">
      <input type="hidden" name="data-custom-image" id="data-custom-image">
      <input type="button" value="Añadir" id="btn-image-upload" class="button">
      <input type="button" value="Eliminar" id="btn-image-delete" class="button">
    </div>
<?php
}
function krnc_save_custom_image($post_id) {
  $is_autosave = wp_is_post_autosave($post_id);
  $is_revision = wp_is_post_revision($post_id);
  $is_valid_nonce = (isset($_POST['custom_image_nonce']) && wp_verify_nonce($_POST['custom_image_nonce'], basename(__FILE__)));
  if($is_autosave || $is_revision || !is_valid_nonce) {
    return;
  }
  if(isset($_POST['data-custom-image'])) {
    $image_data = json_decode(stripslashes($_POST['data-custom-image']));
    if(is_object($image_data[0])) {
      $image_data = array(
        'id' => intval($image_data[0] -> id), 
        'src' => esc_url_raw($image_data[0] -> url)
      );
    } else {
      $image_data = [];
    }
    update_post_meta($post_id, 'data-custom-image', $image_data);
  }
}
add_action('save_post', 'krnc_save_custom_image');

function krnc_contact_sidebar(){
  register_sidebar( 
    array(
        'name'          => 'Información de Contacto - Sidebar',
        'id'            => 'contact-sidebar',
        'description'   => 'Información que se muestra en la barra lateral',
        'before_widget' => '<div class="flex flex-col font-light text-lg">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="uppercase">',
        'after_title'   => '</h2>',
    )
  );
}
add_action('widgets_init', 'krnc_contact_sidebar');
?>