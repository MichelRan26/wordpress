<?php
//Main query
if(have_posts()):
    echo "<div style = 'background-color:#94A684;padding:40px 0px'>";
        echo "<h1>Listes des articles</h1>";
        while(have_posts()): the_post();
            the_title('<h2>','</h2>');
            the_excerpt();
        endwhile;
    echo "</div>";
endif;
/**
 * Use when running a custom or multiple loops with WP_Query
 * We place this function after any loops with WP_Query
 */
wp_reset_postdata(); // reset post data 

/**
 * The secondray query. Note that we can use category name
 */
$secondary_query = new WP_Query('category_name=categorie-2');

if($secondary_query->have_posts()):
    echo "<ul style = 'background-color:#AEC3AE;padding:40px 0px'>";
        echo "<p>Liste des postes avec catégorie 2</p>";
        while($secondary_query->have_posts()): $secondary_query->the_post();
            the_title('<li>','</li>');
        endwhile;
    echo "</ul>";
endif;
wp_reset_postdata();

$args = array(
    'posts_per_page'=>3,
);
$the_query = new WP_Query($args);

if($the_query->have_posts()):
    echo "<div style = 'background-color:#E4E4D0;padding:40px 0px'>";
        while($the_query->have_posts()):$the_query->the_post();
            the_title('<h2>','</h2>');
        endwhile;
    echo "</div>";
endif;





