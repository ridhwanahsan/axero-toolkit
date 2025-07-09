<?php
    namespace lunex_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class Lunex_work_filter extends Widget_Base
    {

        public function get_name()
        {
            return 'Lunex-work-Post-grid';
        }

        public function get_title()
        {
            return __('Wrok grid v2', 'lunex-toolkit');
        }

        public function get_icon()
        {
            return 'eicon-elementor';
        }

        public function get_categories()
        {
            return ['Lunex'];
        }

        protected function register_controls()
        {
            $this->register_controls_section();
            $this->style_tab_content();
        }
        protected function get_custom_post_categories($taxonomy = 'works_category')
        {
            $terms = get_terms([
                'taxonomy'   => $taxonomy,
                'hide_empty' => false,
            ]);

            $options = [];

            if (! empty($terms) && ! is_wp_error($terms)) {
                foreach ($terms as $term) {
                    $options[$term->term_id] = $term->name;
                }
            }

            return $options;
        }

        protected function register_controls_section()
        {
            // Section Selection
            $this->start_controls_section(
                'section_selection',
                [
                    'label' => esc_html__('Section Selection', 'lunex-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'style_selection',
                [
                    'label'   => esc_html__('Select Section', 'lunex-toolkit'),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'style1',
                    'options' => [
                        'style1' => esc_html__('Style 1', 'lunex-toolkit'),
                      
                    ],
                ]
            );

            $this->end_controls_section();

            // Post Filter Controls
            $this->start_controls_section(
                'post_filter_section',
                [
                    'label' => esc_html__('Post Filter', 'lunex-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'posts_per_page',
                [
                    'label'   => esc_html__('Posts Per Page', 'lunex-toolkit'),
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
                    'options'     => $this->get_custom_post_categories(),
                    'multiple'    => true,
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'exclude_posts',
                [
                    'label'       => esc_html__('Exclude Posts', 'lunex-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'description' => esc_html__('Enter post IDs separated by commas', 'lunex-toolkit'),
                ]
            );

            $this->end_controls_section();

        }

        protected function style_tab_content()
        {
            // content style controls tab
        $this->start_controls_section(
            'style_number_section',
            [
                'label' => esc_html__('Number Style', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'number_bg_color',
            [
                'label'     => esc_html__('Background Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .works-list .item .title .number' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'number_color',
            [
                'label'     => esc_html__('Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .works-list .item .title .number' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'number_typography',
                'selector' => '{{WRAPPER}} .works-list .item .title .number',
            ]
        );

        $this->add_control(
            'number_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .works-list .item:hover .title .number' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'number_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .works-list .item:hover .title .number' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Image Button Style
        $this->start_controls_section(
            'image_button_style',
            [
                'label' => esc_html__('Image Button Style', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'image_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .works-list .item .image .link-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'image_button_color',
            [
                'label'     => esc_html__('Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .works-list .item .image .link-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'image_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .works-list .item .image .link-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'image_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .works-list .item .image .link-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Title Style
        $this->start_controls_section(
            'title_style_section',
            [
                'label' => esc_html__('Title Style', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'     => esc_html__('Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .works-list .item .title h3 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .works-list .item .title h3 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'selector' => '{{WRAPPER}} .works-list .item .title h3 a',
            ]
        );

        $this->end_controls_section();

        // Description Style
        $this->start_controls_section(
            'description_style_section',
            [
                'label' => esc_html__('Description Style', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label'     => esc_html__('Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .works-list .item .content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'description_typography',
                'selector' => '{{WRAPPER}} .works-list .item .content p',
            ]
        );

        $this->end_controls_section();

        // Categories Style
        $this->start_controls_section(
            'categories_style_section',
            [
                'label' => esc_html__('Categories Style', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'categories_color',
            [
                'label'     => esc_html__('Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .works-list .item .content .categories li a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'categories_bg_color',
            [
                'label'     => esc_html__('Background Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .works-list .item .content .categories li a' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'categories_border_color',
            [
                'label'     => esc_html__('Border Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .works-list .item .content .categories li a' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'categories_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .works-list .item .content .categories li a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'categories_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .works-list .item .content .categories li a:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

            

        }

        protected function render()
        {
            $settings   = $this->get_settings_for_display();
            $query_args = [
                'post_type'      => 'works',
                'posts_per_page' => $settings['posts_per_page'] ? $settings['posts_per_page'] : 3,
                'orderby'        => $settings['orderby'] ? $settings['orderby'] : 'date',
                'order'          => $settings['order'] ? $settings['order'] : 'DESC',
                'post_status'    => 'publish', // Ensure only published posts are queried
            ];

            // Add category filter if set
            if (! empty($settings['category_filter'])) {
                $query_args['category__in'] = $settings['category_filter'];
            }

            // Add post exclusion if set
            if (! empty($settings['exclude_posts'])) {
                $query_args['post__not_in'] = array_map('intval', explode(',', $settings['exclude_posts']));
            }

            $query = new \WP_Query($query_args);

            if ($settings['style_selection'] === 'style1') {
            ?>
<!-- style 1 -->
       <div class="works-area pb-150">
            <div class="container" data-cue="slideInUp">
                <div class="works-shorting-menu">
                    <button class="filter active" data-filter="all">
                        <?php echo esc_html__('All', 'lunex-toolkit'); ?>
                        <span class="rounded-circle"></span>
                    </button>
                    <?php 
                    $categories = get_terms([
                        'taxonomy' => 'works_category',
                        'hide_empty' => true,
                    ]);
                    foreach ($categories as $category) : ?>
                        <button class="filter" data-filter=".<?php echo esc_attr($category->slug); ?>">
                            <?php echo esc_html($category->name); ?>
                            <span class="rounded-circle"> </span>
                        </button>
                    <?php endforeach; ?>
                </div>
                <div class="works-list works-shorting">
                    <?php while ($query->have_posts()) : $query->the_post(); 
                        $post_terms = get_the_terms(get_the_ID(), 'works_category');
                        $term_classes = '';
                        if ($post_terms && !is_wp_error($post_terms)) {
                            foreach ($post_terms as $term) {
                                $term_classes .= ' ' . $term->slug;
                            }
                        }
                    ?>
                    <div class="item mix<?php echo esc_attr($term_classes); ?>">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-md-12">
                                <div class="title position-relative">
                                    <div class="number text-center rounded-circle">
                                        <?php echo get_the_ID(); // Or use a counter if you want sequential numbers ?>
                                    </div>
                                    <h3 class="mb-0">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="image position-relative">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('full', ['alt' => get_the_title()]); ?>
                                    <?php endif; ?>
                                    <a href="<?php the_permalink(); ?>" class="link-btn text-center d-inline-block rounded-circle">
                                        <img src="<?php echo get_template_directory_uri()?>/assets/images/icons/primary-right-top-arrow.svg" alt="right-top-arrow">
                                        <?php esc_html_e('Read More', 'lunex-toolkit'); ?>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12">
                                <div class="content">
                                    <p>
                                        <?php echo get_the_excerpt(); ?>
                                    </p>
                                    <ul class="categories ps-0 mb-0 list-unstyled">
                                        <?php
                                        if ($post_terms && !is_wp_error($post_terms)) :
                                            foreach ($post_terms as $term) : ?>
                                                <li class="d-inline-block">
                                                    <a href="<?php echo esc_url(get_term_link($term)); ?>" class="d-block">
                                                        <?php echo esc_html($term->name); ?>
                                                    </a>
                                                </li>
                                            <?php endforeach;
                                        endif;
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
                <div class="more-project-btn text-center">
                    <?php if ($query->max_num_pages > 1) : ?>
                        <a href="#" class="d-flex align-items-center justify-content-center load-more-works" data-page="1" data-max-pages="<?php echo esc_attr($query->max_num_pages); ?>">
                            <i class="ri-arrow-down-line"></i>
                            <?php esc_html_e('More Works', 'lunex-toolkit'); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
    <?php
        } elseif ($settings['style_selection'] === 'style2') {
                ?>
<!-- style 2 -->

       
       

<?php
    } elseif ($settings['style_selection'] === 'style3') {
            ?>
<!-- style 3 -->


<?php
    }
        }
    }

$widgets_manager->register(new Lunex_work_filter());