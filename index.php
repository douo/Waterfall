<?php get_header(); ?>

<div id="main">
    <div id="content">
        <?php if(have_posts()):?>
        <?php while(have_posts()):the_post();?>
        <div class="story" id="post-<?php the_ID();?>">
            <h2><a href="<?php the_permalink();?>" title="<?php the_title();?>">
                <?php the_title();?>
                </a></h2>
            <div class="meta">
                <!--<?php echo get_avatar( get_the_author_email(), 40 ); ?>-->
                <p>
                    <?php the_author() ?>
                    [
                    <?php the_category(',') ?>
                    ]</p>
                <p>
                    <?php the_time('Y.m.d') ?>
                </p>
            </div>
            <div class="entry">
                <div class="inner"><?php the_content('<span class="readmore">阅读全文&raquo;</span>');?></div>
                <br class="clear" />
                <p class="postmetadata">
                    <?php the_tags('Tags: ', ', ', ' | '); ?>
                    <?php edit_post_link('编辑', '', ' | '); ?>
                    <?php comments_popup_link('评论 &#187;', '1 评论 &#187;','% 评论 &#187;', '', '<!--评论关闭-->' ); ?>
                </p>
            </div>
        </div>
        <?php endwhile;?>
        <div class="navigation">
            <?php if (function_exists('postbar')){
                postbar();
            }else{
                posts_nav_link(' ','<span class="nav_prev">&laquo;上一页</span>','<span class="nav_next">下一页&raquo;</span>');
            } ?>
        </div>
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
