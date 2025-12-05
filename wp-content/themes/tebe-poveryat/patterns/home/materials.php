<?php
/**
 * Title: Секция Материалы
 * Slug: tebe-poveryat/materials
 * Categories: posts, text
 * Description: Список полезных материалов или статей.
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"60px","bottom":"60px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:60px;padding-bottom:60px">
    <!-- wp:heading -->
    <h2 class="wp-block-heading">Наши материалы</h2>
    <!-- /wp:heading -->
    <!-- wp:paragraph -->
    <p>Изучите наши полезные статьи и ресурсы.</p>
    <!-- /wp:paragraph -->
    <!-- wp:query {"queryId":1,"query":{"perPage":2,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"include":[],"inherit":true,"taxQuery":[]}} -->
    <div class="wp-block-query">
        <!-- wp:post-template -->
            <!-- wp:post-title {"level":3} /-->
            <!-- wp:post-date /-->
            <!-- wp:post-excerpt /-->
        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->
