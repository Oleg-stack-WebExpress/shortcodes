<?php

add_action('init', 'review_register');
function review_register()
{
    $labels = array(
        'name' => 'Отзывы',
        'singular_name' => 'review',
        'add_new' => 'Добавить отзыв',
        'add_new_item' => 'Добавить новый отзыв',
        'edit_item' => 'Редактировать отзыв',
        'new_item' => 'Новой отзыв',
        'view_item' => 'Просмотр отзыва',
        'search_items' => 'Поиск',
        'not_found' => 'Нет отзыва',
        'not_found_in_trash' => 'Нет отзывов в корзине',
        'parent_item_colon' => '',
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_admin_bar' => false,
        'show_in_nav_menus' => false,
        'publicly_queryable' => false,
        'query_var' => false,
        'has_archive' => false,
        'rewrite' => array('slug' => 'reviews', 'with_front' => false),
        'menu_icon' => 'dashicons-format-gallery',
        'supports' => array('title', 'editor', 'thumbnail'),
        'exclude_from_search' => true

    );

    register_post_type('review', $args);
    register_taxonomy("review_category", array("review"), array("hierarchical" => true, "label" => "Категории", "singular_label" => "review", "rewrite" => true));

}

add_shortcode('reviews', 'reviews_shortcode');

function reviews_shortcode($attr)
{
$query = new WP_Query([
        'post_type' => 'review',
        'posts_per_page' => -1
            ]);
$output = '';
    if ($query->have_posts()) {
        $output = '<div class="reviews">';
        while ($query->have_posts()) {
            $query->the_post();
             $output .= '<div class="review">' .get_the_title() .'</div>';
        }
        $output .= '</div>';
}
wp_reset_postdata();
return $output;
}