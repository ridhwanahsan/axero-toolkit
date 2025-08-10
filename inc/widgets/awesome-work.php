<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_work_post extends Widget_Base
    {

        public function get_name()
        {
            return 'awesome-work-post';
        }

        public function get_title()
        {
            return __('Awesome Work', 'axero-toolkit');
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
            // Title & Description
            $this->start_controls_section(
                'title_description_section',
                [
                    'label' => esc_html__('Title & Description', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'section_title',
                [
                    'label'       => esc_html__('Title', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Our Awesome Works', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'section_description',
                [
                    'label'       => esc_html__('Description', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXTAREA,
                    'default'     => esc_html__(' Axero is designed with the flexibility your business demands.', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->end_controls_section();

            
            // work Filter Controls
            $this->start_controls_section(
                'post_filter_section',
                [
                    'label' => esc_html__('Work Filter', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'posts_per_page',
                [
                    'label'   => esc_html__('works Per Page', 'axero-toolkit'),
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
                    'options'     => $this->get_post_categories('projects_category'),
                    'multiple'    => true,
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'exclude_posts',
                [
                    'label'       => esc_html__('Exclude works', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'description' => esc_html__('Enter post IDs separated by commas', 'axero-toolkit'),
                ]
            );

            $this->add_control(
                'style5_vector_image',
                [
                    'label'       => esc_html__('Vector Image', 'axero-toolkit'),
                    'type'        => Controls_Manager::MEDIA,
                    'default'     => [
                        'url' => get_template_directory_uri() . '/assets/images/icons/vector2.svg',
                    ],
                    'description' => esc_html__('Upload or select a vector image to display in the Work layout', 'axero-toolkit'),
                ]
            );
  
            $this->end_controls_section();

            $this->start_controls_section(
                'work_button_content',
                [
                    'label' => esc_html__('Work Button', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'button_text',
                [
                    'label'       => esc_html__('Button Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Read All Work', 'axero-toolkit'),
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
            // Style5 Section Title Tab
            $this->start_controls_section(
                'style5_section_title_tab',
                [
                    'label' => esc_html__('Section Title & Description', 'axero-toolkit'),
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

            // Section Description Color Control
            $this->add_control(
                'style5_section_desc_color',
                [
                    'label'     => esc_html__('Section Description Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_works_list .sub_title' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Section Description Typography Control
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style5_section_desc_typography',
                    'label'    => esc_html__('Section Description Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .awesome_works_list .sub_title',
                ]
            );

            $this->end_controls_section();

            // Style5 Background Tab
            $this->start_controls_section(
                'style5_background_tab',
                [
                    'label'     => esc_html__('Work Background', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    
                ]
            );

            // Background Color Control
            $this->add_control(
                'style5_background_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_works_list .item_box::before' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            // Background Opacity Control
            $this->add_control(
                'style5_background_opacity',
                [
                    'label'      => esc_html__('Background Opacity', 'axero-toolkit'),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range'      => [
                        'px' => [
                            'min'  => 0,
                            'max'  => 1,
                            'step' => 0.1,
                        ],
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .awesome_works_list .item_box::before' => 'opacity: {{SIZE}};',
                    ],
                ]
            );

            // Background Blend Mode Control
            $this->add_control(
                'style5_background_blend_mode',
                [
                    'label'     => esc_html__('Blend Mode', 'axero-toolkit'),
                    'type'      => Controls_Manager::SELECT,
                    'default'   => 'normal',
                    'options'   => [
                        'normal'   => esc_html__('Normal', 'axero-toolkit'),
                        'multiply' => esc_html__('Multiply', 'axero-toolkit'),
                        'screen'   => esc_html__('Screen', 'axero-toolkit'),
                        'overlay'  => esc_html__('Overlay', 'axero-toolkit'),
                        'darken'   => esc_html__('Darken', 'axero-toolkit'),
                        'lighten'  => esc_html__('Lighten', 'axero-toolkit'),
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .awesome_works_list .item_box::before' => 'mix-blend-mode: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();
            // Work Number and Title Controls
            $this->start_controls_section(
                'style5_number_title_section',
                [
                    'label'     => esc_html__('Work Number & Title', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                     
                ]
            );

            // Number Color Control
            $this->add_control(
                'style5_number_color',
                [
                    'label'     => esc_html__('Number Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_works_list .item_box .title .number' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Number Typography Control
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style5_number_typography',
                    'label'    => esc_html__('Number Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .awesome_works_list .item_box .title .number',
                ]
            );

            // Title Color Control
            $this->add_control(
                'style5_title_color',
                [
                    'label'     => esc_html__('Title Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_works_list .item_box .title h3' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Title Typography Control
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style5_title_typography',
                    'label'    => esc_html__('Title Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .awesome_works_list .item_box .title h3',
                ]
            );

            // Title Hover Color Control
            $this->add_control(
                'style5_title_hover_color',
                [
                    'label'     => esc_html__('Title Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_works_list .item_box:hover .title h3' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Number Hover Color Control
            $this->add_control(
                'style5_number_hover_color',
                [
                    'label'     => esc_html__('Number Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_works_list .item_box:hover .title .number' => 'color: {{VALUE}};',
                    ],
                ]
            );
            // Description Color Control
            $this->add_control(
                'style5_description_color',
                [
                    'label'     => esc_html__('Description Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_works_list .item_box .content p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Description Typography Control
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style5_description_typography',
                    'label'    => esc_html__('Description Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .awesome_works_list .item_box .content p',
                ]
            );

            $this->end_controls_section();

            // Work Button Style Tab
            $this->start_controls_section(
                'work_button_style',
                [
                    'label' => esc_html__('Work Button Style', 'axero-toolkit'),
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
            <div class="awesome_works_area ptb_150">
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
                    <div class="awesome_works_list" data-cues="slideInUp" data-group="awesome_works_list">
                            <?php if (!empty($settings['section_description'])) : ?>
                            <p class="sub_title fw-medium">
                                <?php echo wp_kses_post($settings['section_description']); ?>
                            </p>
                        <?php endif; ?>
                        <?php
                                        $vector_image = ! empty($settings['style5_vector_image']['url']) ? esc_url($settings['style5_vector_image']['url']) : get_template_directory_uri() . '/assets/images/icons/vector2.svg';
                                        if ($query->have_posts()):
                                            $post_number = 1;
                                            while ($query->have_posts()): $query->the_post();
                                                $background_image = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : get_template_directory_uri() . '/assets/images/works/work6.jpg';
                                            ?>
                                        <div class="item_box position-relative z-1"
                                            style="background-image: url('<?php echo esc_url($background_image); ?>');">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <div class="title">
                                                        <div class="number lh-1 fw-semibold">
                                                            (<?php echo str_pad($post_number, 2, '0', STR_PAD_LEFT); ?>)
                                                        </div>
                                                        <h3 class="mb-0">
                                                            <?php the_title(); ?>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="content">
                                                        <img src="<?php echo $vector_image; ?>" alt="vector">
                                                        <p>
                                                            <?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="<?php the_permalink(); ?>" class="details_btn d-block position-absolute start-0 end-0 top-0 bottom-0 z-1"></a>
                                        </div>
                                        <?php $post_number++; endwhile; wp_reset_postdata();else:?>
                            <p><?php esc_html_e('No works found.', 'axero-toolkit'); ?></p>
                        <?php endif; ?>
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
$widgets_manager->register(new axero_work_post());