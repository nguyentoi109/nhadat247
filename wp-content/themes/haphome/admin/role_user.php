<?php

/* Create Staff Member User Role */
add_role(
    'staff_member', //  System name of the role.
    __( 'Nhân viên'  ), // Display name of the role.
    array(
        'read'  => true,
        'delete_posts'  => true,
        'delete_published_posts' => true,
        'edit_posts'   => true,
        'publish_posts' => true,
        'upload_files'  => true,
        'edit_pages'  => true,
        'edit_published_pages'  =>  true,
        'publish_pages'  => true,
        'delete_published_pages' => true, // This user will NOT be able to  delete published pages.
    )
);

/* Upgrade the Author Role */
function author_level_up() {
    // Retrieve the  Author role.
    $role = get_role(  'author' );
    
    // Let's add a set  of new capabilities we want Authors to have.
    $role->add_cap(  'edit_pages' );
    $role->add_cap(  'edit_published_pages' );
    $role->add_cap(  'publish_pages' );
}
add_action( 'admin_init', 'author_level_up');

$wp_roles = new WP_Roles();
$wp_roles->remove_role("wpseo_editor");
$wp_roles->remove_role("wpseo_manager");