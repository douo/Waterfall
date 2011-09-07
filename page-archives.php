<?php
/*
Template Name: Archives
*/
?>
<?php get_header(); ?>
    <div id="main">
        <div id="content">
            <?php if(have_posts()):?>
            <?php while(have_posts()):the_post();?>
            <div class="story" id="post-<?php the_ID();?>">
                <h2><a href="<?php the_permalink();?>" title="<?php the_title();?>">
                    <?php the_title();?>
                    </a></h2>
                    <!--<div class="meta"><?php echo get_avatar( get_the_author_email(), 40 ); ?><p><?php the_author() ?> [<?php the_category(',') ?>]</p><p><?php the_time('Y.m.d') ?></p></div>-->
                <div class="entry">

<?php if (function_exists('af_ela_super_archive')) {
       af_ela_super_archive();
} ?>
                    <?php the_content('<br /><span class="readmore">阅读全文&raquo;</span>');?>
                    <br class="clear" />
                    <?php link_pages('<p class="page_nav"><strong>Pages:</strong>','</p>', 
'number'); ?>
                    <p class="postmetadata">
                        <?php edit_post_link('编辑页面', '', ''); ?>
                    </p>
                </div>
            </div>
            <div class="navigation">
            <?php previous_post_link('<span class="nav_prev">&laquo; %link</span>') ?> <?php next_post_link('<span class="nav_next">%link &raquo;</span>') ?>
            </div>
            <div class="comments-template"> 
                <?php comments_template(); ?> 
            </div> 
            <?php endwhile;?>

            <?php else:?>
            <div class="story">
                <h2>什么也没有..</h2>
            </div>
            <?php endif;?>
        </div>
    <div id="sidebar">
    <?php get_sidebar(1); ?>
    <?php get_sidebar(2); ?>
    <?php get_sidebar(3); ?>
    </div>
    </div>
    <?php get_footer();?>