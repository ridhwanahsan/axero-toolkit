<?php
    namespace axero_toolkit\Widgets;
    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_services_area_3 extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_services_area_3';
        }

        public function get_title()
        {
            return __('Service Area 3', 'axero-toolkit');
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
                <div class="services_area">
                    <div class="container-fluid max_w_1560px">
                        <div class="section_title style_four position-relative text_animation">
                            <h2 class="mb-0 text-white text-uppercase fw-semibold">
                                Services
                            </h2>
                            <img src="<?php echo get_template_directory_uri()?>/assets/images/icons/right_down_arrow.svg" alt="right_down_arrow">
                        </div>
                        <div class="services_items_list" data-cues="slideInUp" data-group="services_items_list">
                            <?php
                            if ( $query->have_posts() ) :
                                $count = 1;
                                while ( $query->have_posts() ) : $query->the_post();
                                    $service_title = get_the_title();
                                    $service_link  = get_permalink();
                                    ?>
                                    <div class="item position-relative">
                                        <div class="row align-items-center">
                                            <div class="col-lg-3">
                                                <div class="number text-white fw-semibold lh-1">
                                                    (<?php echo str_pad($count, 2, '0', STR_PAD_LEFT); ?>)
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <h3 class="mb-0 fw-semibold">
                                                    <a href="<?php echo esc_url($service_link); ?>">
                                                        <?php echo esc_html($service_title); ?>
                                                    </a>
                                                </h3>
                                            </div>
                                            <div class="col-lg-3 text-lg-end">
                                                <a href="<?php echo esc_url($service_link); ?>" class="btn secondary_btn style_three">
                                                    <span class="d-inline-block position-relative">
                                                        View Service <i class="ti ti-arrow-up-right"></i>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $count++;
                                endwhile;
                                wp_reset_postdata();
                            else :
                                ?>
                                <div class="item">
                                    <div class="row">
                                        <div class="col">
                                            <p class="text-white"><?php esc_html_e('No services found.', 'lunex-toolkit'); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_services_area_3());