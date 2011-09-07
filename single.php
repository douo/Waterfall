<?php get_header(); ?>

<div id="main">
    <div id="content">
        <?php if(have_posts()):?>
        <?php while(have_posts()):the_post();?>
        <div class="story" id="post-<?php the_ID();?>">
            <h2><a href="<?php the_permalink();?>" title="<?php the_title();?>">
                <?php the_title();?>
                </a></h2>
            <div class="meta"><?php echo get_avatar( get_the_author_email(), 40 ); ?>
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
                <div class="inner"><?php the_content();?></div>
                <?php link_pages('<p class="page_nav"><strong>Pages:</strong> ', '</p>', 
'number'); ?>
                <br class="clear" />
                <div class="entry_copyright">
                    <p>可以任意转载, 转载时请务必以超链接形式标明文章<a href="<?php the_permalink() ?>">原始出处</a>及此<a href="http://creativecommons.org/licenses/by-nc-nd/3.0/deed.zh" title="署名-非商业性使用-禁止演绎 3.0 Unported">声明</a></p>
                    <p>本文地址：<a href="<?php the_permalink() ?>"><?php the_permalink() ?></a></p>
                </div>
                <p class="postmetadata">
                    <?php the_tags('Tags: ', ', ', ''); ?>
                    <?php edit_post_link('编辑', ' | ', ''); ?>
                </p>
            </div>
        </div>
        <div class="navigation">
            <?php previous_post_link('<span class="nav_prev">&laquo; %link</span>') ?>
            <?php next_post_link('<span class="nav_next">%link &raquo;</span>') ?>
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
