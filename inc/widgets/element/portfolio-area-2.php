<?php
    namespace axero_toolkit\Widgets;
    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_portfolio_area_2 extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_portfolio_area_2';
        }

        public function get_title()
        {
            return __('Portfolio Area 2', 'axero-toolkit');
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
                'taxonomy' => 'works_category',
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
                    'options'     => $this->get_post_categories('works_category'),
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
                        'taxonomy' => 'works_category',
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
              <div class="portfolio_area pt_150">
            <div class="container">
                <div class="row load_more_items" id="load_more_items">
                    <div class="col-sm-6">
                        <div class="portfolio_item">
                            <a href="portfolio-details.html" class="image d-block overflow-hidden">
                                <img src="assets/images/portfolio/portfolio6.jpg" alt="portfolio6">
                            </a>
                            <div class="content d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="d-block fw-medium text-uppercase">
                                        Affiliate
                                    </span>
                                    <h3 class="mb-0">
                                        <a href="portfolio-details.html">
                                            SEO Website
                                        </a>
                                    </h3>
                                </div>
                                <a href="portfolio-details.html" class="details_link_btn">
                                    <i class="ti ti-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="portfolio_item">
                            <a href="portfolio-details.html" class="image d-block overflow-hidden">
                                <img src="assets/images/portfolio/portfolio7.jpg" alt="portfolio7">
                            </a>
                            <div class="content d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="d-block fw-medium text-uppercase">
                                        Branding
                                    </span>
                                    <h3 class="mb-0">
                                        <a href="portfolio-details.html">
                                            Income Growth
                                        </a>
                                    </h3>
                                </div>
                                <a href="portfolio-details.html" class="details_link_btn">
                                    <i class="ti ti-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="portfolio_item">
                            <a href="portfolio-details.html" class="image d-block overflow-hidden">
                                <img src="assets/images/portfolio/portfolio8.jpg" alt="portfolio8">
                            </a>
                            <div class="content d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="d-block fw-medium text-uppercase">
                                        Branding
                                    </span>
                                    <h3 class="mb-0">
                                        <a href="portfolio-details.html">
                                            Social Media Marketing
                                        </a>
                                    </h3>
                                </div>
                                <a href="portfolio-details.html" class="details_link_btn">
                                    <i class="ti ti-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="portfolio_item">
                            <a href="portfolio-details.html" class="image d-block overflow-hidden">
                                <img src="assets/images/portfolio/portfolio9.jpg" alt="portfolio9">
                            </a>
                            <div class="content d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="d-block fw-medium text-uppercase">
                                        Affiliate
                                    </span>
                                    <h3 class="mb-0">
                                        <a href="portfolio-details.html">
                                            Technical Agency
                                        </a>
                                    </h3>
                                </div>
                                <a href="portfolio-details.html" class="details_link_btn">
                                    <i class="ti ti-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="portfolio_item">
                            <a href="portfolio-details.html" class="image d-block overflow-hidden">
                                <img src="assets/images/portfolio/portfolio10.jpg" alt="portfolio10">
                            </a>
                            <div class="content d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="d-block fw-medium text-uppercase">
                                        Cyber
                                    </span>
                                    <h3 class="mb-0">
                                        <a href="portfolio-details.html">
                                            Network Security
                                        </a>
                                    </h3>
                                </div>
                                <a href="portfolio-details.html" class="details_link_btn">
                                    <i class="ti ti-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="portfolio_item">
                            <a href="portfolio-details.html" class="image d-block overflow-hidden">
                                <img src="assets/images/portfolio/portfolio11.jpg" alt="portfolio11">
                            </a>
                            <div class="content d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="d-block fw-medium text-uppercase">
                                        Data
                                    </span>
                                    <h3 class="mb-0">
                                        <a href="portfolio-details.html">
                                            Cloud Migration
                                        </a>
                                    </h3>
                                </div>
                                <a href="portfolio-details.html" class="details_link_btn">
                                    <i class="ti ti-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 d-none">
                        <div class="portfolio_item">
                            <a href="portfolio-details.html" class="image d-block overflow-hidden">
                                <img src="assets/images/portfolio/portfolio6.jpg" alt="portfolio6">
                            </a>
                            <div class="content d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="d-block fw-medium text-uppercase">
                                        Affiliate
                                    </span>
                                    <h3 class="mb-0">
                                        <a href="portfolio-details.html">
                                            SEO Website
                                        </a>
                                    </h3>
                                </div>
                                <a href="portfolio-details.html" class="details_link_btn">
                                    <i class="ti ti-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 d-none">
                        <div class="portfolio_item">
                            <a href="portfolio-details.html" class="image d-block overflow-hidden">
                                <img src="assets/images/portfolio/portfolio7.jpg" alt="portfolio7">
                            </a>
                            <div class="content d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="d-block fw-medium text-uppercase">
                                        Branding
                                    </span>
                                    <h3 class="mb-0">
                                        <a href="portfolio-details.html">
                                            Income Growth
                                        </a>
                                    </h3>
                                </div>
                                <a href="portfolio-details.html" class="details_link_btn">
                                    <i class="ti ti-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 d-none">
                        <div class="portfolio_item">
                            <a href="portfolio-details.html" class="image d-block overflow-hidden">
                                <img src="assets/images/portfolio/portfolio8.jpg" alt="portfolio8">
                            </a>
                            <div class="content d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="d-block fw-medium text-uppercase">
                                        Branding
                                    </span>
                                    <h3 class="mb-0">
                                        <a href="portfolio-details.html">
                                            Social Media Marketing
                                        </a>
                                    </h3>
                                </div>
                                <a href="portfolio-details.html" class="details_link_btn">
                                    <i class="ti ti-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 d-none">
                        <div class="portfolio_item">
                            <a href="portfolio-details.html" class="image d-block overflow-hidden">
                                <img src="assets/images/portfolio/portfolio9.jpg" alt="portfolio9">
                            </a>
                            <div class="content d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="d-block fw-medium text-uppercase">
                                        Affiliate
                                    </span>
                                    <h3 class="mb-0">
                                        <a href="portfolio-details.html">
                                            Technical Agency
                                        </a>
                                    </h3>
                                </div>
                                <a href="portfolio-details.html" class="details_link_btn">
                                    <i class="ti ti-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 d-none">
                        <div class="portfolio_item">
                            <a href="portfolio-details.html" class="image d-block overflow-hidden">
                                <img src="assets/images/portfolio/portfolio10.jpg" alt="portfolio10">
                            </a>
                            <div class="content d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="d-block fw-medium text-uppercase">
                                        Cyber
                                    </span>
                                    <h3 class="mb-0">
                                        <a href="portfolio-details.html">
                                            Network Security
                                        </a>
                                    </h3>
                                </div>
                                <a href="portfolio-details.html" class="details_link_btn">
                                    <i class="ti ti-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 d-none">
                        <div class="portfolio_item">
                            <a href="portfolio-details.html" class="image d-block overflow-hidden">
                                <img src="assets/images/portfolio/portfolio11.jpg" alt="portfolio11">
                            </a>
                            <div class="content d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="d-block fw-medium text-uppercase">
                                        Data
                                    </span>
                                    <h3 class="mb-0">
                                        <a href="portfolio-details.html">
                                            Cloud Migration
                                        </a>
                                    </h3>
                                </div>
                                <a href="portfolio-details.html" class="details_link_btn">
                                    <i class="ti ti-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn secondary_btn" type="button" id="loadMore">
                        <span class="d-inline-block position-relative">
                            Load More <i class="ti ti-arrow-up-right"></i>
                        </span>
                    </button>
                    <p id="allLoadedMessage" style="display: none;">
                        All items are loaded!
                    </p>
                </div>
            </div>
        </div>
                 
            <?php
        }
    }
$widgets_manager->register(new axero_portfolio_area_2());