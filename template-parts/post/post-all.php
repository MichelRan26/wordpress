<?php
//Start the main loop
if(have_posts()):
    while(have_posts()):the_post();
        if(in_category(3)):
            the_title('<h1 style="color:red">','</h1>');
        else:
            the_title('<h2 style="color:green">','</h2>');    
        endif;    
    endwhile;
endif;

//Use rewind_posts() to use the query a second time.
rewind_posts();

while(have_posts()):the_post();
    the_post_thumbnail();
endwhile; 
