    <?php
    $location_id = get_query_var('breadcrumb_location');
    $status_id   = get_query_var('breadcrumb_status');
    $type_id     = get_query_var('breadcrumb_type');
    $all_page    = get_query_var('breadcrumb_all', 0);
    ?>

    <div class="custom-breadcrumb">
                 <?php if ($all_page): ?>
                    <span class="active">Tất cả bất động sản</span>
                <?php endif; ?>
            <?php
                $location_slug      = '';
                $location_url_slug  = '';
                $status_slug        = '';

                $location_custom_links = array(
                    'tp-ho-chi-minh'  => 'tp-ho-chi-minh',
                    'binh-duong'      => 'binh-duong',
                    'dong-nai'        => 'dong-nai',
                    'ba-ria-vung-tau' => 'vung-tau',
                );
                if ($location_id) {
                    $location_term = get_term($location_id, 'property_location');

                    if ($location_term && !is_wp_error($location_term)) {
                        $location_slug = $location_term->slug;
                        $location_url_slug = $location_custom_links[$location_slug] ?? $location_slug;
                        $location_link = home_url('/' . $location_url_slug);

                        if (!$status_id && !$type_id) {
                            echo ' <span class="active">' . esc_html($location_term->name) . '</span>';
                        } else {
                            echo ' <a href="' . esc_url($location_link) . '">' . esc_html($location_term->name) . '</a>';
                        }
                    }
                }

                if ($status_id) {
                    $status_term = get_term($status_id, 'property_status');
                    if ($status_term && !is_wp_error($status_term)) {
                        $status_slug = $status_term->slug;
                        $status_link = home_url('/'. $status_slug . '-' . $location_url_slug);

                        if (!$type_id) {
                            echo ' / <span class="active">' . esc_html($status_term->name) . '</span>';
                        } else {
                            echo ' / <a href="' . esc_url($status_link) . '">' . esc_html($status_term->name) . '</a>';
                        }
                    }
                }

                if ($type_id) {
                    $type_term = get_term($type_id, 'property_type');

                    if ($type_term && !is_wp_error($type_term)) {
                        $type_link = home_url('/' . $status_slug . '-' . $type_term->slug . '-' . $location_url_slug);
                        echo ' / <span class="active">' . esc_html($type_term->name) . '</span>';
                    }
                }
            ?>
    </div>