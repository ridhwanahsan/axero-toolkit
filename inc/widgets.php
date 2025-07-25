<?php

    /**
     * Recent Post Widget
     */
    class axero_posts_thumbs extends WP_Widget
    {

        public function __construct()
        {
            $widget_ops = ['description' => esc_html__('Display Random or Recent posts with a small image.', 'axero-toolkit')];
            parent::__construct(false, esc_html__('Axero Recent Posts With Image', 'axero-toolkit'), $widget_ops);
        }

        public function widget($args, $instance)
        {
            global $axero_theme, $axero_opt;
            extract($args); //it receives an associative array

            $title = apply_filters('widget_title', $instance['title']);
            $args  = [
                'posts_per_page' => $instance['number'],
                'post_type'      => 'post',
                'order'          => 'DESC',
                'orderby'        => $instance['orderby'],
            ];
            $query = new WP_Query($args);

            if (! $query->have_posts()) {
                return;
            }

            echo $before_widget;
            if ($title) {
                echo $before_title . $title . $after_title;
            }

            if (! $instance['number']) {
                $instance['number'] = 4;
            }

            if ($query->have_posts()):
                $c = 0;

            while ($query->have_posts()): $query->the_post(); ?>
<?php
            $class      = 'item';
                    $post_id    = get_the_ID();
                    $thumb_size = 'axero_widget_thumb';
                ?>
<?php if (! has_post_thumbnail()) {
                        $class .= ' no-thumb';
                    }
                ?>
						                <article<?php post_class($class); ?>>

						                    <?php if (has_post_thumbnail()): ?>
<?php
            $thumb_id   = get_post_thumbnail_id($post_id);
                    $thumb_type = get_post_mime_type($thumb_id);
                    $image_alt  = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
                    if (! $image_alt) {
                        $image_alt = get_the_title($post_id);
                    }
                    if ($thumb_type == 'image/gif') {
                        $thumb_size = '';
                    }
                ?>
						                        <a href="<?php the_permalink(); ?>" class="thumb hover-effect" aria-label="<?php the_title(); ?>">
						                            <?php if (! empty($axero_theme) && $axero_theme['enable_lazyload'] == '1'): ?>
						                                <span class="fullimage cover lazy" role="img" aria-label="<?php echo esc_attr($image_alt); ?>" data-src="<?php the_post_thumbnail_url($thumb_size); ?>"></span>
						                            <?php else: ?>
			                                <span class="fullimage cover" role="img" aria-label="<?php echo esc_attr($image_alt); ?>" style="background: url('<?php the_post_thumbnail_url($thumb_size); ?>');"></span>
			                            <?php endif; ?>
                        </a>
                    <?php endif; ?>

                    <div class="info">
                        <ul class="ps-0 mb-0 list-unstyled">
                            <li class="d-inline-block">
                                <i class="flaticon-calendar-1"></i>
                                <?php echo esc_html(get_the_date()); ?>
                            </li>
                        </ul>
                        <h4 class="title usmall"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 10, ''); ?> </a></h4>
                    </div>

                    <div class="clear"></div>
                </article>
            <?php
                endwhile;
                        wp_reset_postdata();
                        endif;
                        echo $after_widget;
                    }

                    public function update($new_instance, $old_instance)
                    {
                        $instance            = $old_instance;
                        $instance['title']   = strip_tags($new_instance['title']);
                        $instance['number']  = (int) $new_instance['number'];
                        $instance['orderby'] = $new_instance['orderby'];
                        return $instance;
                    }

                    public function form($instance)
                    {
                        $defaults = [
                            'title'   => 'Recent posts',
                            'number'  => 4,
                            'orderby' => 'date',
                        ];
                        $instance = wp_parse_args((array) $instance, $defaults);
                        $number   = isset($instance['number']) ? absint($instance['number']) : 4;
                    ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">
                <?php esc_html_e('Title:', 'axero-toolkit'); ?>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php esc_html_e('Number of posts to show:', 'axero-toolkit'); ?></label>
            <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('orderby'); ?>"><?php esc_html_e('Mode:', 'axero-toolkit')?> </label>
            <select id="<?php echo $this->get_field_id('orderby'); ?>" name="<?php echo $this->get_field_name('orderby'); ?>">
                <option                                                                      <?php if ($instance['orderby'] == 'date') {
                                                                                      echo 'selected="selected"';
                                                                              }
                                                                              ?> value="date"><?php esc_html_e('Recent Posts', 'axero-toolkit'); ?></option>
                <option                                                                      <?php if ($instance['orderby'] == 'rand') {
                                                                                      echo 'selected="selected"';
                                                                              }
                                                                              ?> value="rand"><?php esc_html_e('Random Posts', 'axero-toolkit'); ?></option>
                <?php if (function_exists('get_field')): // By views ?>
			                    <option<?php if ($instance['orderby'] == 'views') {
                    echo 'selected="selected"';
            }
            ?> value="views"><?php esc_html_e('Post views', 'axero-toolkit'); ?></option>
			                <?php endif; ?>
            </select>
        </p>
        <?php
            }

            }

            function axero_register_posts_thumbs()
            {
                register_widget('axero_posts_thumbs');
            }

        add_action('widgets_init', 'axero_register_posts_thumbs');