<?php
add_action('init', 'register_custom_blocks');
function register_custom_blocks() {
    register_block_type( __DIR__ . '/template-parts/blocks/blog-intro' );
}