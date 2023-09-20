<?php
$args = array(
    'post_type'=> 'post',
    'post_status' => 'publish',
    'posts_per_page' => 3
);

$the_query = new WP_Query($args);
the_content();
if($the_query->have_posts()):
?>
    <div class = "d-flex gap-4">
<?php
    while($the_query->have_posts()):$the_query->the_post();
?>
        <div class = "card " style="width: 18rem;">
            <img src = "<?= get_the_post_thumbnail_url(get_the_ID(),'full')?>" class ="card-img-top">
            <div class = "card-body d-flex flex-column justify-content-between">
                <h5 class = "card-title"><?= get_the_title() ?></h5>
                <p class = "card-text"> <?= get_the_excerpt()?></p>
                <div class = "card-link-container">
                    <a href = "<?= get_the_permalink()?>" class = "btn btn-primary"> <?= __('Lire la suite')?></a>
                </div>
            </div>
        </div>
<?php
    endwhile;
?>
    </div>
<?php
endif;