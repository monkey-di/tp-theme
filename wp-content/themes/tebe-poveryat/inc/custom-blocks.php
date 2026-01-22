<?php
add_action('init', 'register_custom_blocks');
function register_custom_blocks() {
    register_block_type( get_template_directory() . '/template-parts/blocks/blog-intro' );
    register_block_type( get_template_directory() . '/template-parts/blocks/slider-text' );
    register_block_type( get_template_directory() . '/template-parts/blocks/full-video' );
    register_block_type( get_template_directory() . '/template-parts/blocks/faq-spoilers' );
}