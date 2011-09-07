<div id="sidebar-3" class="sidebar">
    <ul>
        <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar(3)):else: ?>
        <?php get_links_list();?>
        <li class="widget">
            <h2>选项</h2>
            <ul>
                <?php wp_register(); ?>
                <li>
                    <?php wp_loginout(); ?>
                </li>
                <?php wp_meta(); ?>
            </ul>
        </li>
        <?php endif;?>
    </ul>
</div>
