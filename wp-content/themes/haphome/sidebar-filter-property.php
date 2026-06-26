<style>
.list-style-wrap {
  display: flex;
  gap: 15 px;
  align-items: flex-start;
}
.list-style-wrap .list-style.list-all {
  flex: 1;
  min-width: 0;
  padding-right: 20px;
}
.sidebar-filter-property {
  width: 280px;
  flex-shrink: 0;
}
.filter-box {
  background: #fff;
  border: 1px solid #e5e5e5;
  border-radius: 8px;
  padding: 16px;
  margin-bottom: 20px;
}

.filter-box-interested{
  background: #f2f2f2;
}
.filter-title {
  font-size: 16px;
  font-weight: 700;
  color: #2c2c2c;
  margin: 0 0 12px;
}
.filter-list {
  list-style: none;
  margin: 0;
  padding: 0;
}
.filter-item {
  padding: 9px 0;
  border-bottom: 1px solid #f0f0f0;
}
.filter-item:last-child {
  border-bottom: none;
}
.filter-item a {
  color: #2c2c2c;
  text-decoration: none;
  font-size: 14.5px;
  display: block;
}
.filter-item a:hover,
.filter-item.active a {
  color: var(--menu-text-selected, #ffa600);
}
.filter-item.active a {
  font-weight: 700;
}
.interested-list {
  list-style: none;
  margin: 0;
  padding: 0;
}
.interested-item {
  display: flex;
  align-items: flex-start;
  gap: 10px;
  padding: 12px 0;
  border-bottom: 1px solid #f0f0f0;
}
.interested-item:last-child {
  border-bottom: none;
}
.interested-number {
  flex-shrink: 0;
  width: 24px;
  height: 24px;
  border-radius: 50%;
  background: #fde2e2;
  color: #d9534f;
  font-size: 13px;
  font-weight: 700;
  display: flex;
  align-items: center;
  justify-content: center;
}
.interested-link {
  color: #2c2c2c;
  text-decoration: none;
  font-size: 14.5px;
  line-height: 1.4;
}
.interested-link:hover {
  color: var(--menu-text-selected, #ffa600);
}

/* Mobile */
@media (max-width: 992px) {
  .list-style-wrap {
    flex-direction: column;
  }
  .sidebar-filter-property {
    width: 100%;
    padding: 10px;
  }

  .sidebar-filter-property .filter-box-price,
  .sidebar-filter-property .filter-box-area {
    display: none;
  }

  .sidebar-filter-property .filter-box-interested {
    display: block;
    width: 100%;
  }
}
</style>

<?php
$price_ranges = [
    '0'           => 'Tất cả mức giá',
    '0-500'       => 'Dưới 500 triệu',
    '500-800'     => '500 - 800 triệu',
    '800-1000'    => '800 triệu - 1 tỷ',
    '1000-2000'   => '1 - 2 tỷ',
    '2000-3000'   => '2 - 3 tỷ',
    '3000-5000'   => '3 - 5 tỷ',
    '5000-7000'   => '5 - 7 tỷ',
    '7000-10000'  => '7 - 10 tỷ',
    '10000-20000' => '10 - 20 tỷ',
    '20000-30000' => '20 - 30 tỷ',
    '30000-40000' => '30 - 40 tỷ',
    '40000-60000' => '40 - 60 tỷ',
    '60000-max'   => 'Trên 60 tỷ',
];
 
$area_ranges = [
    '0'       => 'Tất cả diện tích',
    '0-30'    => 'Dưới 30 m²',
    '30-50'   => '30 - 50 m²',
    '50-80'   => '50 - 80 m²',
    '80-100'  => '80 - 100 m²',
    '100-150' => '100 - 150 m²',
    '150-200' => '150 - 200 m²',
    '200-max' => 'Trên 200 m²',
];
 
$current_price = isset($_GET['price_range']) ? sanitize_text_field($_GET['price_range']) : '0';
$current_area  = isset($_GET['area_range'])  ? sanitize_text_field($_GET['area_range'])  : '0';
 
$related_posts = get_query_var('related_posts');
$has_related   = $related_posts && $related_posts->have_posts();
?>
 
<aside class="sidebar-filter-property">
 
    <div class="filter-box filter-box-price">
        <h3 class="filter-title">Lọc theo khoảng giá</h3>
        <ul class="filter-list">
            <?php foreach ($price_ranges as $value => $label):
                $is_active = ((string)$current_price === (string)$value);
            ?>
            <li class="filter-item <?php echo $is_active ? 'active' : ''; ?>">
                <a href="<?php echo esc_url(bds_filter_url('price_range', (string)$value)); ?>" data-value="<?php echo esc_attr($value); ?>">
                    <?php echo esc_html($label); ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
 
    <div class="filter-box filter-box-area">
        <h3 class="filter-title">Lọc theo diện tích</h3>
        <ul class="filter-list">
            <?php foreach ($area_ranges as $value => $label):
                $is_active = ((string)$current_area === (string)$value);
            ?>
            <li class="filter-item <?php echo $is_active ? 'active' : ''; ?>">
                <a href="<?php echo esc_url(bds_filter_url('area_range', (string)$value)); ?>" data-value="<?php echo esc_attr($value); ?>">
                    <?php echo esc_html($label); ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <?php if ($has_related): ?>
    <div class="filter-box filter-box-interested">
        <h3 class="filter-title">Bài viết quan tâm nhiều</h3>
        <ul class="interested-list">
            <?php
            $rank = 1;
            while ($related_posts->have_posts()):
                $related_posts->the_post();
            ?>
            <li class="interested-item">
                <span class="interested-number"><?php echo $rank++; ?></span>
                <a href="<?php the_permalink(); ?>" class="interested-link">
                    <?php the_title(); ?>
                </a>
            </li>
            <?php endwhile; wp_reset_postdata(); ?>
        </ul>
    </div>
    <?php endif; ?>
</aside>