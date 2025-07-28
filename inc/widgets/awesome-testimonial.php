<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_client_review extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_client_review';
        }

        public function get_title()
        {
            return __('Awesome Testimonial', 'axero-toolkit');
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

        protected function register_controls_section() { 

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
                'default'     => esc_html__('See What Clients Say About Cooperation with Axero', 'axero-toolkit'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

            
        // Style 5 Content Tab
        $this->start_controls_section(
            'style5_content_section',
            [
                'label' => esc_html__('Awesome Testimonial Content', 'axero-toolkit'),
                'tab' => Controls_Manager::TAB_CONTENT,
                
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'style5_content',
            [
                'label' => esc_html__('Testimonial Content', 'axero-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Working with axero was an absolute pleasure...', 'axero-toolkit'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'style5_client_name',
            [
                'label' => esc_html__('Client Name', 'axero-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('David Korren', 'axero-toolkit'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'style5_client_position',
            [
                'label' => esc_html__('Client Position', 'axero-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Product Manager', 'axero-toolkit'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'style5_client_image',
            [
                'label' => esc_html__('Client Image', 'axero-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/kintsugi.svg',
                ],
            ]
        );

        $this->add_control(
            'style5_testimonials_list',
            [
                'label' => esc_html__('Testimonials', 'axero-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'style5_content' => esc_html__('Working with axero was an absolute pleasure...', 'axero-toolkit'),
                        'style5_client_name' => esc_html__('David Korren', 'axero-toolkit'),
                        'style5_client_position' => esc_html__('Product Manager', 'axero-toolkit'),
                        'style5_client_image' => [
                            'url' => get_template_directory_uri() . '/assets/images/kintsugi.svg',
                        ],
                    ],
                ],
                'title_field' => '{{{ style5_client_name }}}',
            ]
        );

        $this->end_controls_section();
 

        }
        /**
         * Style Tab Content Section
         * ------------------------
         */

        protected function style_tab_content() {
         

      

        // style5 testimonial tyle
        $this->start_controls_section(
            'style5_testimonial_style',
            [
                'label' => esc_html__('Awesome Testimonial', 'axero-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                
            ]
        );

        
        // Title Color Typography
        $this->add_control(
            'style5_title_color',
            [
                'label' => esc_html__('Title Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_testimonials_inner .section_title.style_five h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style5_title_typography',
                'selector' => '{{WRAPPER}} .awesome_testimonials_inner .section_title.style_five h2',
            ]
        );

        // Border Line Background Color
        $this->add_control(
            'style5_border_bg_color',
            [
                'label' => esc_html__('Border Line Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_testimonials_inner .border_bottom_style' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        // Content Background Color Control
        $this->add_control(
            'style6_content_bg_color',
            [
                'label'     => esc_html__('Background Color', 'axero-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_testimonials_inner' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        // Content Border Radius Control
        $this->add_control(
            'style6_content_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'axero-toolkit'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .awesome_testimonials_inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Content Border Control
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'style6_content_border',
                'label'    => esc_html__('Border', 'axero-toolkit'),
                'selector' => '{{WRAPPER}} .awesome_testimonials_inner',
            ]
        );

        // Testimonial Description Style
        $this->add_control(
            'style5_description_color',
            [
                'label' => esc_html__('Description Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_testimonials_inner .box_inner .single_awesome_testimonial_item p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style5_description_typography',
                'selector' => '{{WRAPPER}} .awesome_testimonials_inner .box_inner .single_awesome_testimonial_item p',
            ]
        );

        // Client Name Style
        $this->add_control(
            'style5_client_name_color',
            [
                'label' => esc_html__('Client Name Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_testimonials_inner .box_inner .single_awesome_testimonial_item .client_info .title h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style5_client_name_typography',
                'selector' => '{{WRAPPER}} .awesome_testimonials_inner .box_inner .single_awesome_testimonial_item .client_info .title h3',
            ]
        );

        // Client Position Style
        $this->add_control(
            'style5_client_position_color',
            [
                'label' => esc_html__('Client Position Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_testimonials_inner .box_inner .single_awesome_testimonial_item .client_info .title .sub_title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style5_client_position_typography',
                'selector' => '{{WRAPPER}} .awesome_testimonials_inner .box_inner .single_awesome_testimonial_item .client_info .title .sub_title',
            ]
        );

        $this->end_controls_section(); 

        }

        protected function render()
        {
            $settings = $this->get_settings_for_display(); ?>
               
                <div class="awesome_testimonials_area">
                    <div class="container-fluid max_w_1905px">
                        <div class="awesome_testimonials_inner">
                            <div class="section_title style_five">
                                <?php if (!empty($settings['section_title'])) : ?>
                                    <h2 class="mb-0 text_animation">
                                        <?php echo wp_kses_post($settings['section_title']); ?>
                                    </h2>
                                <?php endif; ?>
                            </div>
                            <div class="border_bottom_style"></div>
                            <div class="box_inner">
                                <div class="awesome_testimonials_slides owl-carousel owl-theme">
                                    <?php if (!empty($settings['style5_testimonials_list']) && is_array($settings['style5_testimonials_list'])) : ?>
                                        <?php foreach ($settings['style5_testimonials_list'] as $review) : ?>
                                            <div class="single_awesome_testimonial_item">
                                                <p>
                                                    <?php echo wp_kses_post($review['style5_content']); ?>
                                                </p>
                                                <div class="client_info d-md-flex align-items-center justify-content-between">
                                                    <div class="title">
                                                        <h3 class="fw-medium">
                                                            <?php echo esc_html($review['style5_client_name']); ?>
                                                        </h3>
                                                        <span class="sub_title fw-medium">
                                                            <?php echo esc_html($review['style5_client_position']); ?>
                                                        </span>
                                                    </div>
                                                    <img src="<?php echo esc_url(!empty($review['style5_client_image']['url']) ? $review['style5_client_image']['url'] : (get_template_directory_uri() . '/assets/images/kintsugi.svg')); ?>" alt="<?php echo esc_attr($review['style5_client_name']); ?>">
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 
              
        
               
             
            <?php
        }
            }
       

    $widgets_manager->register(new axero_client_review());