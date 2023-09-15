<?php

get_template_part('template-parts/header/site','head');
get_template_part('template-parts/header/site','header');
if ( function_exists( 'the_custom_logo' ) ) {
	get_template_part('template-parts/header/site','logo');
}
if(get_header_image()){
    get_template_part('template-parts/header/site','banner');
}