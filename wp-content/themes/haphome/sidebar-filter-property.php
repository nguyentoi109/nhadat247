<style>
.list-style-wrap {
  display: flex;
  gap: 24px;
  align-items: flex-start;
}
.list-style-wrap .list-style.list-all {
  flex: 1;
  min-width: 0;
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
@media (max-width: 992px) {
  .list-style-wrap {
    flex-direction: column;
  }
  .sidebar-filter-property {
    width: 100%;
  }
}
</style>

<?php
$price_ranges = [
    '0'           => 'Tất cả',
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

if (!function_exists('bds_build_filter_url')) {
    function bds_build_filter_url($key, $value) {
        $params = $_GET;
        if ($value === '') unset($params[$key]);
        else $params[$key] = $value;
        $qs = http_build_query($params);
        $base = strtok($_SERVER['REQUEST_URI'], '?');
        return $base . ($qs ? '?' . $qs : '');
    }
}   
?>

<aside class="sidebar-filter-property">

    <!-- Lọc giá -->
    <div class="filter-box">
        <h3 class="filter-title">Lọc theo khoảng giá</h3>
        <ul class="filter-list">
            <?php foreach ($price_ranges as $value => $label):
                $is_active = ($current_price === (string)$value); ?>
            <li class="filter-item <?php echo $is_active ? 'active' : ''; ?>">
                <a href="<?php echo esc_url(bds_build_filter_url('price_range', $value)); ?>">
                    <?php echo esc_html($label); ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Lọc diện tích -->
    <div class="filter-box">
        <h3 class="filter-title">Lọc theo diện tích</h3>
        <ul class="filter-list">
            <?php foreach ($area_ranges as $value => $label):
                $is_active = ($current_area === (string)$value); ?>
            <li class="filter-item <?php echo $is_active ? 'active' : ''; ?>">
                <a href="<?php echo esc_url(bds_build_filter_url('area_range', $value)); ?>">
                    <?php echo esc_html($label); ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <?php
        $related_posts = get_query_var('related_posts');?>
        <div class="filter-box">
            <h3 class="filter-title"> Bài viết được quan tâm</h3>
            <?php if ($related_posts && $related_posts->have_posts()): ?>
                <ul class="interested-list">
                    <?php
                    $rank = 1;
                    while ($related_posts->have_posts()):
                        $related_posts->the_post();
                    ?>
                        <li class="interested-item">
                            <span class="interested-number"> <?php echo $rank++; ?> </span>
                            <a href="<?php the_permalink(); ?>" class="interested-link">
                                <?php the_title(); ?>
                            </a>
                        </li>
                    <?php endwhile; ?>
                </ul>
                <?php wp_reset_postdata(); ?>
            <?php else: ?>
                <p style="font-size:14px;color:#999">Chưa có bài viết liên quan.</p>
            <?php endif; ?>
        </div>
</aside>