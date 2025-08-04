<?php
    namespace axero_toolkit\Widgets;
    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_services_area_2 extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_services_area_2';
        }

        public function get_title()
        {
            return __('Service Area 2', 'axero-toolkit');
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
            $settings   = $this->get_settings_for_display();
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
            $settings = $this->get_settings_for_display(); ?>
                <div class="services_area position-relative z-1">
                    <div class="container-fluid max_w_1560px">
                        <div class="section_title position-relative style_three text_animation">
                            <div class="row align-items-end">
                                <div class="col-lg-7">
                                    <div class="title position-relative d-inline-block">
                                        <h2 class="mb-0 fw-black text-uppercase">
                                            Services
                                        </h2>
                                        <img src="<?php echo get_template_directory_uri()?>/assets/images/icons/vector.svg" alt="vector">
                                    </div>
                                    <p>
                                        We believe that the surest measure of success is when a client partners with us more than half our clients stay with us for longer than a single project.
                                    </p>
                                </div>
                                <div class="col-lg-5 text-lg-end">
                                    <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="btn black_btn style_two with_border">
                                        <span class="d-inline-block position-relative">
                                            View All Services <i class="ti ti-arrow-up-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="container-fluid px-0 max-w-full" data-cues="slideInUp" data-group="services_list">
                        <?php if ($query->have_posts()):
                            $post_count = 0;
                            while ($query->have_posts()): $query->the_post(); 
                            $post_count++; ?>
                            <div class="service_item position-relative">
                                <div class="container-fluid max_w_1560px position-relative">
                                    <div class="row align-items-center mx-0">
                                        <div class="col-lg-5 order-2 order-lg-1 px-0">
                                            <h3 class="mb-0">
                                                <?php the_title(); ?>
                                            </h3>
                                        </div>
                                        <div class="col-lg-2 order-1 order-lg-2 px-0">
                                            <div class="number lh-1 fw-bold">
                                                <?php 
                                                // Use custom post number if available, otherwise use count
                                                $post_number = get_post_field('post_number', get_the_ID());
                                                echo esc_html($post_number ? $post_number : str_pad($post_count, 2, '0', STR_PAD_LEFT)); 
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 order-3 order-lg-3 px-0">
                                            <div class="content position-relative">
                                                <p class="mb-0">
                                                    <?php echo esc_html(get_the_excerpt()); ?>
                                                </p>
                                                <a href="<?php the_permalink(); ?>" class="details_link_btn">
                                                    <i class="ri-arrow-right-up-line"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="image">
                                        <?php if (has_post_thumbnail()): ?>
                                        <?php the_post_thumbnail(); ?>
                                        <?php endif; ?>
                                </div>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="position-absolute z-1 start-0 end-0 top-0 bottom-0"></a>
                        </div>
                        <?php endwhile; wp_reset_postdata(); else: ?>
                        <p><?php esc_html_e('No services found.', 'lunex-toolkit'); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="border_lines">
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                    </div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_services_area_2());