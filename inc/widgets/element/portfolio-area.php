<?php
    namespace axero_toolkit\Widgets;
    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_portfolio_area extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_portfolio_area';
        }

        public function get_title()
        {
            return __('Portfolio Area', 'axero-toolkit');
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
                'taxonomy' => 'projects_category',
                'hide_empty' => false,
            ]);
            $options = [];

            if (!empty($categories) && !is_wp_error($categories)) {
                foreach ($categories as $category) {
                    $options[$category->term_id] = $category->name;
                }
            }

            return $options;
        }

        protected function register_controls_section()
        { 
             
            // work Filter Controls
            $this->start_controls_section(
                'post_filter_section',
                [
                    'label' => esc_html__('Work Filter', 'lunex-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'posts_per_page',
                [
                    'label'   => esc_html__('works Per Page', 'lunex-toolkit'),
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
                    'options'     => $this->get_post_categories('projects_category'),
                    'multiple'    => true,
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'exclude_posts',
                [
                    'label'       => esc_html__('Exclude works', 'lunex-toolkit'),
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
            // Style 7 Controls
            $this->start_controls_section(
                'style7_section',
                [
                    'label'     => esc_html__('Style Tab', 'lunex-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                     
                ]
            );

            // Item Style
            $this->add_control(
                'style7_item_heading',
                [
                    'label' => esc_html__('Item Style', 'lunex-toolkit'),
                    'type'  => Controls_Manager::HEADING,
                ]
            );

            $this->start_controls_tabs('style7_item_tabs');

            // Normal Tab
            $this->start_controls_tab(
                'style7_item_normal',
                [
                    'label' => esc_html__('Normal', 'lunex-toolkit'),
                ]
            );

            $this->add_control(
                'style7_item_bg_color',
                [
                    'label'     => esc_html__('Background Color', 'lunex-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .load_more_items_list .item' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style7_title_color',
                [
                    'label'     => esc_html__('Title Color', 'lunex-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .load_more_items_list .item h3 a' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_tab();

            // Hover Tab
            $this->start_controls_tab(
                'style7_item_hover',
                [
                    'label' => esc_html__('Hover', 'lunex-toolkit'),
                ]
            );

            $this->add_control(
                'style7_item_hover_bg_color',
                [
                    'label'     => esc_html__('Background Color', 'lunex-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .load_more_items_list .item:hover' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style7_title_hover_color',
                [
                    'label'     => esc_html__('Title Color', 'lunex-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .load_more_items_list .item:hover h3 a' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_tab();
            $this->end_controls_tabs();

            // Title Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style7_title_typography',
                    'label'    => esc_html__('Title Typography', 'lunex-toolkit'),
                    'selector' => '{{WRAPPER}} .load_more_items_list .item h3 a',
                ]
            );

            // Category Style
            $this->add_control(
                'style7_category_heading',
                [
                    'label'     => esc_html__('Category Style', 'lunex-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'style7_category_bg',
                    'label'    => esc_html__('Background', 'lunex-toolkit'),
                    'types'    => ['classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .load_more_items_list .item .category',
                ]
            );

            $this->add_control(
                'style7_category_text_color',
                [
                    'label'     => esc_html__('Text Color', 'lunex-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .load_more_items_list .item .category' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style7_category_padding',
                [
                    'label'      => esc_html__('Padding', 'lunex-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .load_more_items_list .item .category' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'default'    => [
                        'top'      => '7',
                        'right'    => '21',
                        'bottom'   => '7',
                        'left'     => '21',
                        'unit'     => 'px',
                        'isLinked' => false,
                    ],
                ]
            );

            $this->add_control(
                'style7_category_border_radius',
                [
                    'label'      => esc_html__('Border Radius', 'lunex-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .load_more_items_list .item .category' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'default'    => [
                        'top'      => '20',
                        'right'    => '20',
                        'bottom'   => '20',
                        'left'     => '20',
                        'unit'     => 'px',
                        'isLinked' => true,
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name'           => 'style7_category_border',
                    'label'          => esc_html__('Border', 'lunex-toolkit'),
                    'selector'       => '{{WRAPPER}} .load_more_items_list .item .category',
                    'fields_options' => [
                        'border' => [
                            'default' => 'solid',
                        ],
                        'width'  => [
                            'default' => [
                                'top'      => '1',
                                'right'    => '1',
                                'bottom'   => '1',
                                'left'     => '1',
                                'isLinked' => true,
                            ],
                        ],
                        'color'  => [
                            'default' => '#000000',
                        ],
                    ],
                ]
            );

            $this->end_controls_section();
            // Style 7 Image Controls
            $this->start_controls_section(
                'style7_image_style',
                [
                    'label'     => esc_html__('Image Style', 'lunex-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                     
                ]
            );


            // Image Border Control
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name'     => 'style7_image_border',
                    'label'    => esc_html__('Border', 'lunex-toolkit'),
                    'selector' => '{{WRAPPER}} .load_more_items_list .item .image img',
                ]
            );

            // Image Border Radius Control
            $this->add_control(
                'style7_image_border_radius',
                [
                    'label'      => esc_html__('Border Radius', 'lunex-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .load_more_items_list .item .image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->end_controls_section();
        }

        protected function render()
        {


            $settings = $this->get_settings_for_display();
             $query_args = [
                'post_type'      => 'Projects',
                'posts_per_page' => $settings['posts_per_page'] ? $settings['posts_per_page'] : 3,
                'orderby'        => $settings['orderby'] ? $settings['orderby'] : 'date',
                'order'          => $settings['order'] ? $settings['order'] : 'DESC',
                'post_status'    => 'publish', // Ensure only published posts are queried
            ];
            // Add category filter if set
            if (! empty($settings['category_filter'])) {
                $query_args['tax_query'] = [
                    [
                        'taxonomy' => 'projects_category',
                        'field'    => 'term_id',
                        'terms'    => $settings['category_filter'],
                    ],
                ];
            }
            // Add post exclusion if set
            if (! empty($settings['exclude_posts'])) {
                $query_args['post__not_in'] = array_map('intval', explode(',', $settings['exclude_posts']));
            }
            $query    = new \WP_Query($query_args);
            ?>
                <div class="portfolio_area ptb_150 position-relative z-1">
                    <div class="container-fluid max_w_1560px">
                        <div class="section_title position-relative style_three text_animation">
                            <div class="row align-items-end">
                                <div class="col-lg-7">
                                    <div class="title position-relative d-inline-block">
                                        <h2 class="mb-0 fw-black text-uppercase">
                                            Our Portfolio
                                        </h2>
                                        <img src="<?php echo get_template_directory_uri()?>/assets/images/icons/vector.svg" alt="vector">
                                    </div>
                                    <p>
                                        We believe that the surest measure of success is when a client partners with us more than half our clients stay with us for longer than a single project.
                                    </p>
                                </div>
                                <div class="col-lg-5 text-lg-end">
                                    <a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>" class="btn black_btn style_two with_border">
                                        <span class="d-inline-block position-relative">
                                            View All Works <i class="ti ti-arrow-up-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center" data-cues="slideInUp" data-group="portfolio_list">
                            <div class="col-lg-6">
                                <div class="portfolio_image text-center">
                                    <img src="<?php echo get_template_directory_uri()?>/assets/images/portfolio/portfolio1.jpg" alt="portfolio">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="load_more_items_list">
                                    <?php if ($query->have_posts()):
                                                        while ($query->have_posts()): $query->the_post();
                                                            $categories    = get_the_terms(get_the_ID(), 'projects_category');
                                                            $category_name = ! empty($categories) ? esc_html($categories[0]->name) : '';
                                                        ?>
                                                <div class="item position-relative z-1 d-flex align-items-center justify-content-between">
                                                    <h3 class="mb-0">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <?php the_title(); ?>
                                                        </a>
                                                    </h3>
                                                    <?php if ($category_name): ?>
                                                        <span class="category d-inline-block">
                                                            <?php echo $category_name; ?>
                                                        </span>
                                                    <?php endif; ?>
                                                <div class="image">
                                                    <?php if (has_post_thumbnail()): ?>
                                                        <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'lunex_work_thumb_two')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                                                    <?php endif; ?>
                                            </div>
                                            <a href="<?php the_permalink(); ?>" class="position-absolute z-1 start-0 end-0 top-0 bottom-0"></a>
                                        </div>
                                    <?php endwhile; wp_reset_postdata(); else: ?>
                                        <p><?php esc_html_e('No works found.', 'lunex-toolkit'); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
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
$widgets_manager->register(new axero_portfolio_area());