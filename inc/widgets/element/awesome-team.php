<?php
    namespace lunex_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class lunex_team_slider extends Widget_Base
    {

        public function get_name()
        {
            return 'lunex_team_slider';
        }

        public function get_title()
        {
            return __('awesome Team', 'lunex-toolkit');
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
                'default'     => esc_html__('Meet our dedicated team of marketing experts', 'axero-toolkit'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // Style 1 Content Controls
        $this->start_controls_section(
            'style1_content_section',
            [
                'label' => esc_html__('Team Content', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_CONTENT,
                 
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'member_image',
            [
                'label' => esc_html__('Member Image', 'lunex-toolkit'),
                'type' => Controls_Manager::MEDIA,
                 
            ]
        );

        $repeater->add_control(
            'member_name',
            [
                'label' => esc_html__('Name', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Michael Carter', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'member_position',
            [
                'label' => esc_html__('Position', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Junior Executive', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'member_description',
            [
                'label' => esc_html__('Description', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('In cursus quam consequat non tortor tristique dolor pellentesque.', 'lunex-toolkit'),
            ]
        );

        // Add team link text and URL controls
        $repeater->add_control(
            'member_link',
            [
                'label' => esc_html__('Team Link', 'lunex-toolkit'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => 'https://your-link.com',
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
                'show_external' => true,
            ]
        );

        $repeater->add_control(
            'member_link_text',
            [
                'label' => esc_html__('Link Text', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Learn more', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'team_members_list',
            [
                'label' => esc_html__('Team Members', 'lunex-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'member_name' => esc_html__('Michael Carter', 'lunex-toolkit'),
                        'member_position' => esc_html__('Junior Executive', 'lunex-toolkit'),
                        'member_description' => esc_html__('In cursus quam consequat non tortor tristique dolor pellentesque.', 'lunex-toolkit'),
                        'member_image' => [
                            'url' => get_template_directory_uri() . '/assets/images/teams/team7.jpg',
                        ],
                        'member_link' => [
                            'url' => 'team-details.html',
                            'is_external' => false,
                            'nofollow' => false,
                        ],
                        'member_link_text' => esc_html__('Learn more', 'lunex-toolkit'),
                    ],
                ],
                'title_field' => '{{{ member_name }}}',
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

        // Name Style
        $this->start_controls_section(
            'name_style_section',
            [
                'label' => esc_html__('Name Style', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                
            ]
        );

        $this->add_control(
            'name_color',
            [
                'label' => esc_html__('Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single_awesome_team_member .image h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography',
                'selector' => '{{WRAPPER}} .single_awesome_team_member .image h3',
            ]
        );

        $this->end_controls_section();

        // Position Style
        $this->start_controls_section(
            'position_style_section',
            [
                'label' => esc_html__('Position Style', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                
            ]
        );

        $this->add_control(
            'position_color',
            [
                'label' => esc_html__('Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single_awesome_team_member .content h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'position_typography',
                'selector' => '{{WRAPPER}} .single_awesome_team_member .content h4',
            ]
        );

        $this->end_controls_section();

        // Description Style
        $this->start_controls_section(
            'description_style_section',
            [
                'label' => esc_html__('Description Style', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                 
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single_awesome_team_member .content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'selector' => '{{WRAPPER}} .single_awesome_team_member .content p',
            ]
        );

        $this->end_controls_section();

        // Team Button Style Tab
        $this->start_controls_section(
            'team_button_style_section',
            [
                'label' => esc_html__('Button Style', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Button Color
        $this->add_control(
            'team_button_color',
            [
                'label' => esc_html__('Button Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single_awesome_team_member .content .details_link_btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Button Hover Color
        $this->add_control(
            'team_button_hover_color',
            [
                'label' => esc_html__('Button Hover Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single_awesome_team_member .content .details_link_btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Button Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'team_button_typography',
                'selector' => '{{WRAPPER}} .single_awesome_team_member .content .details_link_btn',
            ]
        );

        $this->end_controls_section();
  
        }

        protected function render()
        {
            $settings = $this->get_settings_for_display();  ?>

           <div class="awesome_team_area ptb_150">
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
                <div class="container-fluid style_two max_w_1905px">
                    <div class="awesome_team_slides owl-carousel owl-theme" data-cue="slideInUp">
                        <?php if ( ! empty( $settings['team_members_list'] ) && is_array( $settings['team_members_list'] ) ) : ?>
                            <?php foreach ( $settings['team_members_list'] as $member ) : ?>
                                <div class="single_awesome_team_member">
                                    <div class="image position-relative">
                                        <?php
                                            $image_url = '';
                                            if ( !empty($member['member_image']['id']) ) {
                                                $image_url = wp_get_attachment_image_url($member['member_image']['id'], 'full');
                                            } elseif ( !empty($member['member_image']['url']) ) {
                                                $image_url = $member['member_image']['url'];
                                            }
                                        ?>
                                        <?php if ( $image_url ) : ?>
                                            <img src="<?php echo esc_url( $image_url ); ?>"
                                                alt="<?php echo esc_attr( $member['member_name'] ); ?>"
                                                class="team-member-image"
                                                loading="lazy">
                                        <?php endif; ?>
                                        <?php if ( ! empty( $member['member_name'] ) ) : ?>
                                            <h3 class="mb-0">
                                                <?php echo wp_kses_post( $member['member_name'] ); ?>
                                            </h3>
                                        <?php endif; ?>
                                    </div>
                                    <div class="content">
                                        <?php if ( ! empty( $member['member_position'] ) ) : ?>
                                            <h4> <?php echo wp_kses_post( $member['member_position'] ); ?>
                                            </h4>
                                        <?php endif; ?>
                                        <?php if ( ! empty( $member['member_description'] ) ) : ?>
                                            <p> <?php echo wp_kses_post( $member['member_description'] ); ?> </p>
                                        <?php endif; ?>
                                        <div class="border_bottom"></div>
                                        <?php if ( ! empty( $member['member_link']['url'] ) ) : 
                                            $link_url = $member['member_link']['url'];
                                            $link_target = !empty($member['member_link']['is_external']) ? ' target="_blank"' : '';
                                            $link_nofollow = !empty($member['member_link']['nofollow']) ? ' rel="nofollow"' : '';
                                            $link_text = !empty($member['member_link_text']) ? $member['member_link_text'] : esc_html__('Learn more', 'lunex-toolkit');
                                        ?>
                                            <a href="<?php echo esc_url( $link_url ); ?>" class="details_link_btn d-inline-block position-relative text-uppercase fw-semibold"<?php echo $link_target . $link_nofollow; ?>>
                                                <i class="ti ti-arrow-up-right"></i>
                                                <?php echo wp_kses_post( $link_text ); ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?> 
                        <?php endif; ?>
                    </div>
                </div>
            </div>
 

    <?php
        }
            }
       

    $widgets_manager->register(new lunex_team_slider());