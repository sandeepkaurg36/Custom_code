<?php

$custom_image = get_post_meta(get_the_ID(), '_custom_image', true);
if ($custom_image) {
    echo '<img src="' . esc_url($custom_image) . '" alt="Custom Image">';
}

$custom_url= get_post_meta(get_the_ID(), '_custom_url' ,true);
echo $custom_url;


$custom_select= get_post_meta(get_the_ID(), '_custom_select' ,true);
echo $custom_select;