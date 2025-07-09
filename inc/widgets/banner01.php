<?php
    namespace lunex_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class Lunex_banner01 extends Widget_Base
    {

        public function get_name()
        {
            return 'lunex-banner01';
        }

        public function get_title()
        {
            return __('Banner 01', 'lunex-toolkit');
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
        // Banner Content Section
        $this->start_controls_section(
            'banner_content',
            [
                'label' => esc_html__('Banner Content', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label'       => esc_html__('Sub Title', 'lunex-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('The creative agency', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'title_line1',
            [
                'label'       => esc_html__('Title Line 1', 'lunex-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('Innovate. inspire', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'title_line2',
            [
                'label'       => esc_html__('Title Line 2', 'lunex-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('ignite growth', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'banner_image',
            [
                'label'   => esc_html__('Banner Image', 'lunex-toolkit'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/banners/banner1.jpg',
                ],
            ]
        );

        $this->add_control(
            'banner_image_alt',
            [
                'label'       => esc_html__('Banner Image Alt Text', 'lunex-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('Banner Image', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label'       => esc_html__('Button Text', 'lunex-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__("Let's Chat", 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label'       => esc_html__('Button Link', 'lunex-toolkit'),
                'type'        => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'lunex-toolkit'),
                'default'     => [
                    'url' => 'about.html',
                ],
            ]
        );

         $this->add_control(
            'button_icon',
            [
                'label'   => esc_html__('Button Icon', 'lunex-toolkit'),
                'type'    => Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'ri-chat-1-line',
                    'library' => 'remixicon',
                ],
            ]
        );

        $this->add_control(
            'button_icon_alt',
            [
                'label'       => esc_html__('Button Icon Alt Text', 'lunex-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('Chat Icon', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'description',
            [
                'label'       => esc_html__('Description', 'lunex-toolkit'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => esc_html__('At Lunex, we blend creativity and strategy to create impactful brand experiences that inspire and drive growth. 🚀', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // Social Links Section
        $this->start_controls_section(
            'social_links',
            [
                'label' => esc_html__('Social Links', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'social_icon',
            [
                'label'   => esc_html__('Icon', 'lunex-toolkit'),
                'type'    => Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fab fa-instagram',
                    'library' => 'fa-brands',
                ],
            ]
        );

        $repeater->add_control(
            'social_text',
            [
                'label'       => esc_html__('Text', 'lunex-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('Instagram', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'social_link',
            [
                'label'       => esc_html__('Link', 'lunex-toolkit'),
                'type'        => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'lunex-toolkit'),
                'default'     => [
                    'url' => '#',
                ],
            ]
        );

        $repeater->add_control(
            'social_arrow_icon',
            [
                'label' => esc_html__('Arrow Icon', 'lunex-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => '',
                ],
                'media_types' => [
                    'image',
                    'svg'
                ],
                'description' => esc_html__('Upload SVG or image for arrow icon', 'lunex-toolkit'),
            ]
        );

       

        $this->add_control(
            'social_items',
            [
                'label'       => esc_html__('Social Items', 'lunex-toolkit'),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'social_text' => esc_html__('Instagram', 'lunex-toolkit'),
                    ],
                    [
                        'social_text' => esc_html__('Twitter', 'lunex-toolkit'),
                    ],
                    [
                        'social_text' => esc_html__('YouTube', 'lunex-toolkit'),
                    ],
                ],
                'title_field' => '{{{ social_text }}}',
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
            // content style controls tab
        $this->start_controls_section(
            'banner_style',
            [
                'label' => esc_html__('Banner Style', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Sub Title Style
        $this->add_control(
            'sub_title_style',
            [
                'label'     => esc_html__('Sub Title', 'lunex-toolkit'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'sub_title_color',
            [
                'label'     => esc_html__('Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .creative-agency-banner-content .sub-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'sub_title_typography',
                'selector' => '{{WRAPPER}} .creative-agency-banner-content .sub-title',
            ]
        );

        // Title Style
        $this->add_control(
            'title_style',
            [
                'label'     => esc_html__('Title', 'lunex-toolkit'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'     => esc_html__('Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .creative-agency-banner-content .title h1' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .creative-agency-banner-content .title h1:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'selector' => '{{WRAPPER}} .creative-agency-banner-content .title h1',
            ]
        );
        // Title Line 2 Style
        $this->add_control(
            'title_line2_style',
            [
                'label'     => esc_html__('Title Line 2', 'lunex-toolkit'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'title_line2_color',
            [
                'label'     => esc_html__('Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .creative-agency-banner-content .title h1 span.d-inline-block' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'title_line2_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .creative-agency-banner-content .title h1 span.d-inline-block:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'title_line2_typography',
                'selector' => '{{WRAPPER}} .creative-agency-banner-content .title h1 span.d-inline-block',
            ]
        );
        $this->end_controls_section();

        // banner circle button and text color or bg color
        $this->start_controls_section(
            'banner_circle_button',
            [
                'label' => esc_html__('Circle Button', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Button Text Color
        $this->add_control(
            'button_text_color',
            [
                'label'     => esc_html__('Text Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .creative-agency-banner-image .link-btn' => 'color: {{VALUE}}',
                ],
            ]
        );

        // Button Background Color
        $this->add_control(
            'button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .creative-agency-banner-image .link-btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        // Button Hover Background Color
        $this->add_control(
            'button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .creative-agency-banner-image .link-btn:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        // Button Hover Text Color
        $this->add_control(
            'button_hover_text_color',
            [
                'label'     => esc_html__('Hover Text Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .creative-agency-banner-image .link-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        // Button Icon Size
        $this->add_responsive_control(
            'button_icon_size',
            [
                'label' => esc_html__('Icon Size', 'lunex-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .creative-agency-banner-image .link-btn i' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Button Text Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'button_text_typography',
                'selector' => '{{WRAPPER}} .creative-agency-banner-image .link-btn',
            ]
        );

        $this->end_controls_section();



        // Social Icons Style
        $this->start_controls_section(
            'social_icons_style',
            [
                'label' => esc_html__('Social Icons', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'social_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .creative-agency-banner-socials li a i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .creative-agency-banner-socials li a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .creative-agency-banner-socials li a svg' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'social_icon_hover_color',
            [
                'label'     => esc_html__('Text & Icon Hover Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .creative-agency-banner-socials li a:hover i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .creative-agency-banner-socials li:hover a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .creative-agency-banner-socials li a:hover svg' => 'fill: {{VALUE}}',
                ],
            ]
        );

         $this->add_responsive_control(
            'social_icon_size',
            [
                'label' => esc_html__('Icon Size', 'lunex-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'size' => 20,
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .creative-agency-banner-socials li a i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .creative-agency-banner-socials li a svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'social_icon_spacing',
            [
                'label' => esc_html__('Icon Spacing', 'lunex-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 30,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .creative-agency-banner-socials li a i' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .creative-agency-banner-socials li a svg' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'social_text_typography',
                'label' => esc_html__('Text Typography', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} .creative-agency-banner-socials li a',
            ]
        );

       
        $this->end_controls_section();

        }

        protected function render()
        {
            $settings = $this->get_settings_for_display();

            if ($settings['style_selection'] === 'style1') {
            ?>
            <!-- style 1 -->
                  <!-- Start Creative Agency Banner Area -->
        <div class="creative-agency-banner-area position-relative z-1">
            <div class="container" data-cues="slideInUp" data-group="creativeAgencyBanner">
                <div class="creative-agency-banner-content">
                    <span class="sub-title d-block fw-medium">
                        <?php echo esc_html($settings['sub_title']); ?>
                    </span>
                    <div class="title">
                        <h1>
                            <?php echo esc_html($settings['title_line1']); ?>
                        </h1>
                        <h1>
                            <span class="d-inline-block">
                                <?php echo esc_html($settings['title_line2']); ?>
                            </span>
                        </h1>
                    </div>
                </div>
                <div class="creative-agency-banner-image mx-auto text-center position-relative">
                    <img src="<?php echo esc_url($settings['banner_image']['url']); ?>" class="main-image" alt="<?php echo esc_attr($settings['banner_image_alt']); ?>">
                    
                    <a href="<?php echo esc_url($settings['button_link']['url']); ?>" class="link-btn menu_link d-inline-block rounded-circle">
                          <i class="<?php echo esc_attr($settings['button_icon']['value']); ?>" aria-hidden="true"></i>
                        <span class="menu_link-text">
                            <?php echo esc_html($settings['button_text']); ?>
                        </span>
                    </a>
                </div>
                <div class="creative-agency-banner-text">
                    <p>
                        <?php echo wp_kses_post($settings['description']); ?>
                    </p>
                </div>
                <ul class="creative-agency-banner-socials ps-0 mb-0 list-unstyled">
                    <?php foreach ($settings['social_items'] as $item): ?>
                    <li>
                        <a href="<?php echo esc_url($item['social_link']['url']); ?>" target="_blank" class="d-inline-block position-relative">
                            
                            <?php \Elementor\Icons_Manager::render_icon($item['social_icon'], ['aria-hidden' => 'true']); ?>
                            <?php echo esc_html($item['social_text']); ?>

                            <?php if (!empty($item['social_arrow_icon']['url'])): ?>
                                <img src="<?php echo esc_url($item['social_arrow_icon']['url']); ?>" alt="<?php echo esc_attr__('Social arrow icon', 'lunex-toolkit'); ?>">
                            <?php endif; ?>
                             
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <!-- End Creative Agency Banner Area -->

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

$widgets_manager->register(new Lunex_banner01());
