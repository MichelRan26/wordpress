<?php
get_header();
//get_template_part('template-parts/post/post', 'all');
//get_template_part('template-parts/post/post', 'with-category');
get_sidebar('primary');
get_the_content();
get_footer();
