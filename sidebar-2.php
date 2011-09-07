<div id="sidebar-2" class="sidebar">
    <ul>
        <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar(2)):else: ?>
        <li id="calendar" class="widget">
            <h2>日历</h2>
            <?php get_calendar(); ?>
        </li>
        <?php wp_list_pages('depth=3&title_li=<h2>页面</h2>');?>
        <?php endif;?>
    </ul>
</div>
