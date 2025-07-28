<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_service_post extends Widget_Base
    {

        public function get_name()
        {
            return 'axero-service-post';
        }

        public function get_title()
        {
            return __('Awesome Services', 'axero-toolkit');
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

             // Title & Description
            $this->start_controls_section(
                'title_description_section',
                [
                    'label' => esc_html__('Title', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'section_title',
                [
                    'label'       => esc_html__('Title', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Services We Provide to make our client Happy', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );
 
            $this->end_controls_section();

            // service Filter Controls
            $this->start_controls_section(
                'post_filter_section',
                [
                    'label' => esc_html__('Service Filter', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'posts_per_page',
                [
                    'label'   => esc_html__('Services Per Page', 'axero-toolkit'),
                    'type'    => Controls_Manager::NUMBER,
                    'default' => 6,
                    'min'     => 1,
                    'max'     => 24,
                ]
            );

            $this->add_control(
                'orderby',
                [
                    'label'   => esc_html__('Order By', 'axero-toolkit'),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'date',
                    'options' => [
                        'date'          => esc_html__('Date', 'axero-toolkit'),
                        'title'         => esc_html__('Title', 'axero-toolkit'),
                        'rand'          => esc_html__('Random', 'axero-toolkit'),
                        'comment_count' => esc_html__('Comment Count', 'axero-toolkit'),
                    ],
                ]
            );

            $this->add_control(
                'order',
                [
                    'label'   => esc_html__('Order', 'axero-toolkit'),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'DESC',
                    'options' => [
                        'ASC'  => esc_html__('Ascending', 'axero-toolkit'),
                        'DESC' => esc_html__('Descending', 'axero-toolkit'),
                    ],
                ]
            );

            $this->add_control(
                'category_filter',
                [
                    'label'       => esc_html__('Filter by Category', 'axero-toolkit'),
                    'type'        => Controls_Manager::SELECT2,
                    'options'     => $this->get_post_categories(),
                    'multiple'    => true,
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'exclude_posts',
                [
                    'label'       => esc_html__('Exclude Services', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'description' => esc_html__('Enter post IDs separated by commas', 'axero-toolkit'),
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'service_button_content',
                [
                    'label' => esc_html__('Service Button', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'button_text',
                [
                    'label'       => esc_html__('Button Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('VIEW SERVICES', 'axero-toolkit'),
                    'placeholder' => esc_html__('Enter button text', 'axero-toolkit'),
                ]
            );

            $this->add_control(
                'button_link',
                [
                    'label'       => esc_html__('Button Link', 'axero-toolkit'),
                    'type'        => Controls_Manager::URL,
                    'placeholder' => esc_html__('https://your-link.com', 'axero-toolkit'),
                    'default'     => [
                        'url' => '#',
                    ],
                ]
            );

            $this->add_control(
                'button_icon',
                [
                    'label'       => esc_html__('Button Icon', 'axero-toolkit'),
                    'type'        => Controls_Manager::ICONS,
                    'default'     => [
                        'value'   => 'ti ti-arrow-narrow-right',
                        'library' => 'ti-icons',
                    ],
                ]
            );

        $this->end_controls_section();

        }

        protected function style_tab_content()
        {
              //  Section Title Tab
            $this->start_controls_section(
                'style5_section_title_tab',
                [
                    'label' => esc_html__('Section Title', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                ]
            );

            // Section Title Color Control
            $this->add_control(
                'style5_section_title_color',
                [
                    'label'     => esc_html__('Section Title Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .section_title.style_five h2' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Section Title Typography Control
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style5_section_title_typography',
                    'label'    => esc_html__('Section Title Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .section_title.style_five h2',
                ]
            );

            // Section Border Line Color Control
            $this->add_control(
                'style5_section_border_color',
                [
                    'label'     => esc_html__('Section Border Line Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .border_bottom_style' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();

            // Content Controls
            $this->start_controls_section(
                'style4_content_style',
                [
                    'label'     => esc_html__('Content Styling', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                     
                ]
            );

            // Title Style
            $this->add_control(
                'style4_title_heading',
                [
                    'label'     => esc_html__('Title', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'style4_title_color',
                [
                    'label'     => esc_html__('Title Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} a.post-title' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style4_title_hover_color',
                [
                    'label'     => esc_html__('Title Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} a.post-title:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style4_title_typography',
                    'selector' => '{{WRAPPER}} a.post-title',
                ]
            );

            // Category Dot Style
            $this->add_control(
                'style4_category_dot_heading',
                [
                    'label'     => esc_html__('Category Dot', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'style4_category_dot_color',
                [
                    'label'     => esc_html__('Dot Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_services_list .item_box .text .dot' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            // Category Number Style
            $this->add_control(
                'style4_category_number_heading',
                [
                    'label'     => esc_html__('Category Number', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'style4_category_number_color',
                [
                    'label'     => esc_html__('Number Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_services_list .item_box .text .number' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style4_category_number_typography',
                    'selector' => '{{WRAPPER}} .awesome_services_list .item_box .text .number',
                ]
            );

            // Category Text Style
            $this->add_control(
                'style4_category_text_heading',
                [
                    'label'     => esc_html__('Category Text', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'style4_category_text_color',
                [
                    'label'     => esc_html__('Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_services_list .item_box .text .sub_title' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style4_category_text_typography',
                    'selector' => '{{WRAPPER}} .awesome_services_list .item_box .text .sub_title',
                ]
            );
            // Description Style
            $this->add_control(
                'style4_description_heading',
                [
                    'label'     => esc_html__('Description', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'style4_description_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_services_list .item_box .content p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style4_description_typography',
                    'selector' => '{{WRAPPER}} .awesome_services_list .item_box .content p',
                ]
            );

            // Icon Style
            $this->add_control(
                'style4_icon_heading',
                [
                    'label'     => esc_html__('Icon', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'style4_details_link_btn_color',
                [
                    'label'     => esc_html__('Details Link Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_services_list .item_box .content .details_link_btn' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style4_details_link_btn_hover_color',
                [
                    'label'     => esc_html__('Details Link Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_services_list .item_box .content .details_link_btn:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style4_details_link_btn_bg_color',
                [
                    'label'     => esc_html__('Details Link Background', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_services_list .item_box .content .details_link_btn' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style4_details_link_btn_hover_bg_color',
                [
                    'label'     => esc_html__('Details Link Hover Background', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_services_list .item_box .content .details_link_btn:hover' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section(); 

            // service Button Style Tab
        $this->start_controls_section(
            'service_button_style',
            [
                'label' => esc_html__('Service Button Style', 'axero-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Button Text Color
        $this->add_control(
            'button_text_color',
            [
                'label'     => esc_html__('Text Color', 'axero-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .warning_btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Button Text Hover Color
        $this->add_control(
            'button_text_hover_color',
            [
                'label'     => esc_html__('Text Hover Color', 'axero-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .warning_btn:hover' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        // Button Text Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'button_text_typography',
                'label'    => esc_html__('Typography', 'axero-toolkit'),
                'selector' => '{{WRAPPER}} .warning_btn',
            ]
        );

        // Button Background Color
        $this->add_control(
            'button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'axero-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .warning_btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Button Hover Background Color
        $this->add_control(
            'button_bg_hover_color',
            [
                'label'     => esc_html__('Hover Background Color', 'axero-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .warning_btn:hover' => 'background-color: {{VALUE}} !important;',
                    '{{WRAPPER}} .warning_btn:focus' => 'background-color: {{VALUE}} !important;',
                    '{{WRAPPER}} .warning_btn:active' => 'background-color: {{VALUE}} !important;',
                ],
            ]
        );

        // Button Border Color
        $this->add_control(
            'button_border_color',
            [
                'label'     => esc_html__('Border Color', 'axero-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .warning_btn' => 'border-color: {{VALUE}} !important;',
                ],
            ]
        );

        // Icon Color
        $this->add_control(
            'button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'axero-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn span i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .btn span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        // Icon Hover Color
        $this->add_control(
            'button_icon_hover_color',
            [
                'label'     => esc_html__('Icon Hover Color', 'axero-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn:hover span i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .btn:hover span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        // Icon Size
        $this->add_control(
            'button_icon_size',
            [
                'label'     => esc_html__('Icon Size', 'axero-toolkit'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                    ],
                ],
                'default'   => [
                    'size' => 22,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .btn span i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .btn span svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

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
            $open_job = get_field('open_job') ?: '2 open roles'; ?>
     
                <div class="awesome_services_area ptb_150">
                    <div class="container-fluid max_w_1905px">
                        <div class="section_title style_five">
                             <?php if (!empty($settings['section_title'])) : ?>
                                <h2 class="mb-0 text_animation">
                                    <?php echo wp_kses_post($settings['section_title']); ?>
                                </h2>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="border_bottom_style"></div>
                    <div class="container-fluid max_w_1905px">
                        <div class="row">
                                <div class="col-lg-5">
                                    <div class="awesome_services_image text-center position-sticky">
                                        <?php  
                                        if (!empty($settings['category_filter'])) {
                                            $args = [
                                                'post_type'      => 'services', 
                                                'posts_per_page' => 1,
                                                'orderby'        => 'rand',
                                                'post__not_in'   => [get_the_ID()],
                                                'tax_query'      => [
                                                    [
                                                        'taxonomy' => 'services_category',
                                                        'field'    => 'term_id',
                                                        'terms'    => $settings['category_filter'],
                                                    ]
                                                ]
                                            ];
                                            
                                            $random_post_query = new \WP_Query($args); 
                                            if ($random_post_query->have_posts()) {
                                                while ($random_post_query->have_posts()) {
                                                    $random_post_query->the_post();
                                                    if (has_post_thumbnail()) {
                                                        echo get_the_post_thumbnail(get_the_ID(), 'full', ['alt' => esc_attr(get_the_title())]); 
                                                    } else { 
                                                        echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/images/default-service.png') . '" alt="' . esc_attr__('Default Service Image', 'axero-toolkit') . '">';
                                                    }
                                                }
                                                wp_reset_postdata();
                                            } else {
                                                // Fallback image if no posts found in selected categories
                                                echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/images/default-service.png') . '" alt="' . esc_attr__('Default Service Image', 'axero-toolkit') . '">';
                                            }
                                        } else {
                                            // Fallback image if no categories selected
                                            echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/images/default-service.png') . '" alt="' . esc_attr__('Default Service Image', 'axero-toolkit') . '">';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="awesome_services_list" data-cues="slideInUp" data-group="awesome_services_list">
                                        <?php 
                                            $filtered_query_args = [
                                                'post_type' => 'services',
                                                'posts_per_page' => $settings['posts_per_page'],
                                                'orderby' => $settings['orderby'],
                                                'order' => $settings['order'],
                                            ];
                                            if (!empty($settings['category_filter'])) {
                                                $filtered_query_args['tax_query'] = [
                                                    [
                                                        'taxonomy' => 'services_category',
                                                        'field' => 'term_id',
                                                        'terms' => $settings['category_filter'],
                                                    ]
                                                ];
                                            }
                                            $filtered_query_args['post__not_in'] = !empty($settings['exclude_posts']) ? array_map('intval', explode(',', $settings['exclude_posts'])) : [];

                                            $filtered_query = new \WP_Query($filtered_query_args);

                                            if ($filtered_query->have_posts()):
                                                while ($filtered_query->have_posts()): $filtered_query->the_post(); ?>
                                                <div class="item_box">
                                                    <div class="row">
                                                        <div class="col-xl-3">
                                                            <div class="text d-flex align-items-center">
                                                                <div class="dot rounded-circle"></div>
                                                                <div class="number fw-medium">
                                                                    <?php echo esc_html(str_pad($filtered_query->current_post + 1, 2, '0', STR_PAD_LEFT)); ?>
                                                                </div>
                                                                <span class="d-block sub_title fw-medium">
                                                                    <?php 
                                                                    $terms = get_the_terms(get_the_ID(), 'services_category');
                                                                    if (!empty($terms) && !is_wp_error($terms)) {
                                                                        echo esc_html($terms[0]->name);
                                                                    }
                                                                    ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-9">
                                                            <div class="content position-relative">
                                                                <h3 class="text-uppercase">
                                                                    <a href="<?php the_permalink(); ?>" class="post-title">
                                                                        <?php the_title(); ?>
                                                                    </a>
                                                                </h3>
                                                                <p>
                                                                    <?php echo esc_html(get_the_excerpt()); ?>
                                                                </p>
                                                                <a href="<?php the_permalink(); ?>" class="details_link_btn d-flex align-items-center justify-content-center">
                                                                    <i class="ri-arrow-right-up-line"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endwhile; wp_reset_postdata(); else: ?>
                                            <p><?php esc_html_e('No services found.', 'axero-toolkit'); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                 <div class="text-center">
                                <a href="<?php echo esc_url($settings['button_link']['url']); ?>" class="btn warning_btn">
                                    <span class="d-inline-block position-relative">
                                        <?php echo esc_html($settings['button_text']); ?> 
                                        <?php \Elementor\Icons_Manager::render_icon($settings['button_icon'], ['aria-hidden' => 'true']); ?>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

             

            <?php
                }
                    }
              

    $widgets_manager->register(new axero_service_post());