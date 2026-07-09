<style>
    .breadcrumb-separator{
        color: #999 !important;
    }
</style>
<?php
    $developer_id = get_query_var('breadcrumb_developer');
    $project_id   = get_query_var('breadcrumb_project');
?>
<div class="custom-breadcrumb">
        <?php if (!$developer_id): ?>
                <span class="active">Dự án</span>
            <?php else: ?>
                <a href="<?php echo home_url('/du-an'); ?>"> Dự án </a>
        <?php endif; ?>

        <?php
            if ($developer_id) :
                $developer_term = get_term($developer_id, 'property_developer');
                if ($developer_term && !is_wp_error($developer_term)) :
                    if (!$project_id) :
            ?>
                    <span class="breadcrumb-separator"> / </span>
                    <span class="active">
                        <?php echo esc_html($developer_term->name); ?>
                    </span>
                <?php else: ?>
                    <span class="breadcrumb-separator"> / </span>
                    <a href="<?php echo get_term_link($developer_term); ?>">
                        <?php echo esc_html($developer_term->name); ?>
                    </a>
                <?php endif; ?>
        <?php
            endif;
        endif;
        ?>

        <?php
        if ($project_id) :
            $project_term = get_term($project_id, 'property_project');
            if ($project_term && !is_wp_error($project_term)) :
        ?>
                <span class="breadcrumb-separator"> / </span>
                <span class="active">
                    <?php echo esc_html($project_term->name); ?>
                </span>
        <?php
        endif;
    endif;
    ?>
</div>