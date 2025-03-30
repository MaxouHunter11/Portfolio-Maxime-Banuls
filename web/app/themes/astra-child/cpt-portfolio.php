<?php
function create_portfolio_cpt() {
    $labels = array(
        'name' => __('Portfolios', 'astra'),
        'singular_name' => __('Portfolio', 'astra'),
        'menu_name' => __('Portfolios', 'astra'),
        'name_admin_bar' => __('Portfolio', 'astra'),
        'add_new' => __('Ajouter Nouveau', 'astra'),
        'add_new_item' => __('Ajouter Nouveau Portfolio', 'astra'),
        'new_item' => __('Nouveau Portfolio', 'astra'),
        'edit_item' => __('Éditer Portfolio', 'astra'),
        'view_item' => __('Voir Portfolio', 'astra'),
        'all_items' => __('Tous les Portfolios', 'astra'),
        'search_items' => __('Rechercher Portfolios', 'astra'),
        'parent_item_colon' => __('Parent Portfolios:', 'astra'),
        'not_found' => __('Aucun portfolio trouvé.', 'astra'),
        'not_found_in_trash' => __('Aucun portfolio trouvé dans la corbeille.', 'astra')
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'portfolio'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'thumbnail'),
        'taxonomies' => array('category'),
    );

    register_post_type('portfolio', $args);
}

add_action('init', 'create_portfolio_cpt');
