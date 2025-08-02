<?php get_header(); ?>

<div class="container">
    <h2><?php bloginfo('description'); ?></h2>
    <?php
    echo do_shortcode('[last_news count="10" category = "sifi"]');
    ?>
    <?php
    echo do_shortcode('[contact-form-7 id="de14f34" title="Форма заявок"]');
    ?>
     <?php
    echo do_shortcode('[reviews]');
    ?>

</div>



<?php get_footer(); ?>