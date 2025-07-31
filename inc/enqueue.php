<?php

add_action('wp_enqueue_scripts', 'assets_enqueue');

function assets_enqueue()
{
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js');
    wp_enqueue_script('custom-js', get_assets_dir('js/script.js'));

    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css');
    wp_enqueue_style('custom-css', get_assets_dir('css/style.css'));
}

