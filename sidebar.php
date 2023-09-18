<?php
if(is_active_sidebar('primary')):
    get_template_part('template-parts/sidebar/primary');
else:
    get_template_part('template-parts/sidebar/default');
endif;
