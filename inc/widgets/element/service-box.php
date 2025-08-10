<?php
    namespace axero_toolkit\Widgets;
    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_service_box extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_service_box';
        }

        public function get_title()
        {
            return __('Service Box', 'axero-toolkit');
        }

        public function get_icon()
        {
            return 'eicon-elementor';
        }

        public function get_categories()
        {
            return ['Axero'];
        }

        protected function register_controls()
        {
            $this->register_controls_section();
            $this->style_tab_content();
        }

        protected function get_post_categories()
        {
            $categories = get_terms([
                'taxonomy'     => 'services_category',
                'hide_empty'   => false,
                'hierarchical' => true,
                'orderby'      => 'name',
                'order'        => 'ASC',
            ]);
            $options = [];

            if (! empty($categories) && ! is_wp_error($categories)) {
                foreach ($categories as $category) {
                    $options[$category->term_id] = $category->name;
                }
            }

            return $options;
        }

        protected function register_controls_section()
        {
            // service Filter Controls
            $this->start_controls_section(
                'post_filter_section',
                [
                    'label' => esc_html__('Service Filter', 'lunex-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'posts_per_page',
                [
                    'label'   => esc_html__('Services Per Page', 'lunex-toolkit'),
                    'type'    => Controls_Manager::NUMBER,
                    'default' => 6,
                    'min'     => 1,
                    'max'     => 24,
                ]
            );

            $this->add_control(
                'orderby',
                [
                    'label'   => esc_html__('Order By', 'lunex-toolkit'),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'date',
                    'options' => [
                        'date'          => esc_html__('Date', 'lunex-toolkit'),
                        'title'         => esc_html__('Title', 'lunex-toolkit'),
                        'rand'          => esc_html__('Random', 'lunex-toolkit'),
                        'comment_count' => esc_html__('Comment Count', 'lunex-toolkit'),
                    ],
                ]
            );

            $this->add_control(
                'order',
                [
                    'label'   => esc_html__('Order', 'lunex-toolkit'),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'DESC',
                    'options' => [
                        'ASC'  => esc_html__('Ascending', 'lunex-toolkit'),
                        'DESC' => esc_html__('Descending', 'lunex-toolkit'),
                    ],
                ]
            );

            $this->add_control(
                'category_filter',
                [
                    'label'       => esc_html__('Filter by Category', 'lunex-toolkit'),
                    'type'        => Controls_Manager::SELECT2,
                    'options'     => $this->get_post_categories(),
                    'multiple'    => true,
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'exclude_posts',
                [
                    'label'       => esc_html__('Exclude Services', 'lunex-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'description' => esc_html__('Enter post IDs separated by commas', 'lunex-toolkit'),
                ]
            );
            $this->end_controls_section();
        }

        /**
         * Style Tab Content Section
         * ------------------------
         */

        protected function style_tab_content()
        {

        }

        protected function render()
        {
            $settings = $this->get_settings_for_display(); 

             $query_args = [
                'post_type'      => 'services',
                'posts_per_page' => $settings['posts_per_page'] ? $settings['posts_per_page'] : 3,
                'orderby'        => $settings['orderby'] ? $settings['orderby'] : 'date',
                'order'          => $settings['order'] ? $settings['order'] : 'DESC',
                'post_status'    => 'publish', // Ensure only published posts are queried
            ];

            // Fix: Properly filter by taxonomy for services_category
            if (!empty($settings['category_filter'])) {
                $query_args['tax_query'] = [
                    [
                        'taxonomy' => 'services_category',
                        'field'    => 'term_id',
                        'terms'    => $settings['category_filter'],
                    ]
                ];
            }

            // Add post exclusion if set
            if (! empty($settings['exclude_posts'])) {
                $query_args['post__not_in'] = array_map('intval', explode(',', $settings['exclude_posts']));
            }

            $query    = new \WP_Query($query_args);
            ?>
                <div class=" pt_150">
                    <div class="container">
                        <div class="row justify-content-center" data-cues="slideInUp" data-group="services_list">
                            <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="service_box_item">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <?php 
                                            $icon_image = get_field('icon_image');
                                            if ($icon_image) : ?>
                                                <img src="<?php echo esc_url($icon_image['url']); ?>" alt="<?php echo esc_attr($icon_image['alt']); ?>">
                                            <?php endif; ?>
                                        </div>
                                        <h3>
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>
                                        <p>
                                            <?php echo get_the_excerpt(); ?>
                                        </p>
                                        <a href="<?php the_permalink(); ?>" class="details_link_btn">
                                            <i class="ti ti-arrow-up-right"></i>
                                        </a>
                                    </div>
                                </div>
                            <?php endwhile; wp_reset_postdata(); endif; ?>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_service_box());