<?php
add_action('init', 'register_custom_blocks');
function register_custom_blocks() {
    register_block_type('/wp-content/themes/tebt-poveryat/template-parts/blocks/blog-intro' );
}