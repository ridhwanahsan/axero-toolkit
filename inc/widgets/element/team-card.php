<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_team_card extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_team_card';
        }

        public function get_title()
        {
            return __('Team Card', 'axero-toolkit');
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
            // Section Selection
            $this->start_controls_section(
                'section_selection',
                [
                    'label' => esc_html__('Section Selection', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'style_selection',
                [
                    'label'   => esc_html__('Select Section', 'axero-toolkit'),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'style1',
                    'options' => [
                        'style1' => esc_html__('Style 1', 'axero-toolkit'),
                        'style2' => esc_html__('Style 2', 'axero-toolkit'),
                        'style3' => esc_html__('Style 3', 'axero-toolkit'),

                    ],
                ]
            );

            $this->end_controls_section();
            // Team Content Tab
            $this->start_controls_section(
                'team_content',
                [
                    'label'     => esc_html__('Team Content', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'team_image',
                [
                    'label'   => esc_html__('Image', 'axero-toolkit'),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => get_template_directory_uri() . '/assets/images/team-two/team1.jpg',
                    ],
                ]
            );

            $this->add_control(
                'team_name',
                [
                    'label'       => esc_html__('Name', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Megan Wilson', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'team_position',
                [
                    'label'       => esc_html__('Position', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Founder', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'social_icon',
                [
                    'label'   => esc_html__('Icon', 'axero-toolkit'),
                    'type'    => Controls_Manager::ICONS,
                    'default' => [
                        'value'   => 'ri-facebook-fill',
                        'library' => 'ri',
                    ],
                ]
            );

            $repeater->add_control(
                'social_link',
                [
                    'label'       => esc_html__('Link', 'axero-toolkit'),
                    'type'        => Controls_Manager::URL,
                    'placeholder' => esc_html__('https://your-link.com', 'axero-toolkit'),
                    'default'     => [
                        'url' => '#',
                    ],
                ]
            );

            $this->add_control(
                'social_profiles',
                [
                    'label'       => esc_html__('Social Profiles', 'axero-toolkit'),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'default'     => [
                        [
                            'social_icon' => [
                                'value'   => 'ri-facebook-fill',
                                'library' => 'ri',
                            ],
                        ],
                        [
                            'social_icon' => [
                                'value'   => 'ri-instagram-line',
                                'library' => 'ri',
                            ],
                        ],
                        [
                            'social_icon' => [
                                'value'   => 'ri-twitter-x-line',
                                'library' => 'ri',
                            ],
                        ],
                        [
                            'social_icon' => [
                                'value'   => 'ri-linkedin-fill',
                                'library' => 'ri',
                            ],
                        ],
                    ],
                    'title_field' => '<# var migrated = "undefined" !== typeof __fa4_migrated, social = ( "undefined" === typeof social ) ? false : social; #>{{{ elementor.helpers.getSocialNetworkNameFromIcon( social_icon, social, true, migrated, true ) }}}',
                ]
            );

            $this->end_controls_section();
            // Style 2 Team Content Controls
            $this->start_controls_section(
                'style2_team_content',
                [
                    'label'     => esc_html__('Team Content', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );

            $style2_repeater = new \Elementor\Repeater();

            $style2_repeater->add_control(
                'style2_member_name',
                [
                    'label'       => esc_html__('Name', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Team Member', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $style2_repeater->add_control(
                'style2_member_position',
                [
                    'label'       => esc_html__('Position', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Team Position', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $style2_repeater->add_control(
                'style2_member_description',
                [
                    'label'       => esc_html__('Description', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXTAREA,
                    'default'     => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $style2_repeater->add_control(
                'style2_member_image',
                [
                    'label'   => esc_html__('Image', 'axero-toolkit'),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => AXERO_IMG . '/teams/placeholder.jpg',
                    ],
                ]
            );

            // Add social media controls
            $style2_repeater->add_control(
                'style2_social_profiles_heading',
                [
                    'label'     => esc_html__('Social Profiles', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $style2_social_repeater = new \Elementor\Repeater();
            $style2_social_repeater->add_control(
                'style2_social_icon',
                [
                    'label'   => esc_html__('Icon', 'axero-toolkit'),
                    'type'    => Controls_Manager::ICONS,
                    'default' => [
                        'value'   => 'ri-facebook-fill',
                        'library' => 'ri',
                    ],
                ]
            );

            $style2_social_repeater->add_control(
                'style2_social_link',
                [
                    'label'       => esc_html__('Link', 'axero-toolkit'),
                    'type'        => Controls_Manager::URL,
                    'placeholder' => esc_html__('https://your-link.com', 'axero-toolkit'),
                    'default'     => [
                        'url'               => '#',
                        'is_external'       => false,
                        'nofollow'          => false,
                        'custom_attributes' => '',
                    ],
                ]
            );

            $style2_repeater->add_control(
                'style2_social_profiles',
                [
                    'label'       => esc_html__('Social Links', 'axero-toolkit'),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $style2_social_repeater->get_controls(),
                    'default'     => [
                        [
                            'style2_social_icon' => [
                                'value'   => 'ri-facebook-fill',
                                'library' => 'ri',
                            ],
                            'style2_social_link' => [
                                'url'         => '#',
                                'is_external' => false,
                                'nofollow'    => false,
                            ],
                        ],
                        [
                            'style2_social_icon' => [
                                'value'   => 'ri-instagram-line',
                                'library' => 'ri',
                            ],
                            'style2_social_link' => [
                                'url'         => '#',
                                'is_external' => false,
                                'nofollow'    => false,
                            ],
                        ],
                        [
                            'style2_social_icon' => [
                                'value'   => 'ri-twitter-x-line',
                                'library' => 'ri',
                            ],
                            'style2_social_link' => [
                                'url'         => '#',
                                'is_external' => false,
                                'nofollow'    => false,
                            ],
                        ],
                        [
                            'style2_social_icon' => [
                                'value'   => 'ri-linkedin-fill',
                                'library' => 'ri',
                            ],
                            'style2_social_link' => [
                                'url'         => '#',
                                'is_external' => false,
                                'nofollow'    => false,
                            ],
                        ],
                    ],
                    'title_field' => '<# var migrated = "undefined" !== typeof __fa4_migrated, social = ( "undefined" === typeof social ) ? false : social; #>{{{ elementor.helpers.getSocialNetworkNameFromIcon( style2_social_icon, social, true, migrated, true ) }}}',
                ]
            );

            $this->add_control(
                'style2_team_members',
                [
                    'label'       => esc_html__('Team Members', 'axero-toolkit'),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $style2_repeater->get_controls(),
                    'default'     => [
                        [
                            'style2_member_name'        => esc_html__('Megan Wilson', 'axero-toolkit'),
                            'style2_member_position'    => esc_html__('Founder', 'axero-toolkit'),
                            'style2_member_description' => esc_html__('Lorem ipsum dolor sit amet, consectet adipis cing elit. Fusce varius faucibus massa.', 'axero-toolkit'),
                            'style2_social_profiles'    => [
                                [
                                    'style2_social_icon' => ['value' => 'ri-facebook-fill', 'library' => 'ri'],
                                    'style2_social_link' => ['url' => '#', 'is_external' => false, 'nofollow' => false],
                                ],
                                [
                                    'style2_social_icon' => ['value' => 'ri-instagram-line', 'library' => 'ri'],
                                    'style2_social_link' => ['url' => '#', 'is_external' => false, 'nofollow' => false],
                                ],
                            ],
                        ],
                        [
                            'style2_member_name'        => esc_html__('Zylen Orion', 'axero-toolkit'),
                            'style2_member_position'    => esc_html__('Co-founder', 'axero-toolkit'),
                            'style2_member_description' => esc_html__('Lorem ipsum dolor sit amet, consectet adipis cing elit. Fusce varius faucibus massa.', 'axero-toolkit'),
                            'style2_social_profiles'    => [
                                [
                                    'style2_social_icon' => ['value' => 'ri-twitter-x-line', 'library' => 'ri'],
                                    'style2_social_link' => ['url' => '#', 'is_external' => false, 'nofollow' => false],
                                ],
                                [
                                    'style2_social_icon' => ['value' => 'ri-linkedin-fill', 'library' => 'ri'],
                                    'style2_social_link' => ['url' => '#', 'is_external' => false, 'nofollow' => false],
                                ],
                            ],
                        ],
                    ],
                    'title_field' => '{{{ style2_member_name }}}',
                ]
            );

            $this->end_controls_section();
            // Style 3 Team Content Controls
            $this->start_controls_section(
                'style3_team_content',
                [
                    'label'     => esc_html__('Style 3 Content', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style3',
                    ],
                ]
            );

            $this->add_control(
                'style3_team_image',
                [
                    'label'   => esc_html__('Image', 'axero-toolkit'),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => get_template_directory_uri() . '/assets/images/teams/team1.jpg',
                    ],
                ]
            );

            $this->add_control(
                'style3_team_name',
                [
                    'label'       => esc_html__('Name', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('David Wilson', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'style3_team_position',
                [
                    'label'       => esc_html__('Position', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Content Strategist', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $style3_social_repeater = new \Elementor\Repeater();

            $style3_social_repeater->add_control(
                'style3_social_icon',
                [
                    'label'   => esc_html__('Icon', 'axero-toolkit'),
                    'type'    => Controls_Manager::ICONS,
                    'default' => [
                        'value'   => 'ri-instagram-line',
                        'library' => 'ri',
                    ],
                ]
            );

            $style3_social_repeater->add_control(
                'style3_social_link',
                [
                    'label'       => esc_html__('Link', 'axero-toolkit'),
                    'type'        => Controls_Manager::URL,
                    'placeholder' => esc_html__('https://your-link.com', 'axero-toolkit'),
                    'default'     => [
                        'url'         => '#',
                        'is_external' => true,
                        'nofollow'    => false,
                    ],
                ]
            );

            $this->add_control(
                'style3_social_profiles',
                [
                    'label'       => esc_html__('Social Profiles', 'axero-toolkit'),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $style3_social_repeater->get_controls(),
                    'default'     => [
                        [
                            'style3_social_icon' => [
                                'value'   => 'ri-instagram-line',
                                'library' => 'ri',
                            ],
                            'style3_social_link' => [
                                'url'         => '#',
                                'is_external' => true,
                                'nofollow'    => false,
                            ],
                        ],
                        [
                            'style3_social_icon' => [
                                'value'   => 'ri-facebook-circle-fill',
                                'library' => 'ri',
                            ],
                            'style3_social_link' => [
                                'url'         => '#',
                                'is_external' => true,
                                'nofollow'    => false,
                            ],
                        ],
                        [
                            'style3_social_icon' => [
                                'value'   => 'ri-threads-line',
                                'library' => 'ri',
                            ],
                            'style3_social_link' => [
                                'url'         => '#',
                                'is_external' => true,
                                'nofollow'    => false,
                            ],
                        ],
                        [
                            'style3_social_icon' => [
                                'value'   => 'ri-twitter-x-line',
                                'library' => 'ri',
                            ],
                            'style3_social_link' => [
                                'url'         => '#',
                                'is_external' => true,
                                'nofollow'    => false,
                            ],
                        ],
                    ],
                    'title_field' => '<# var migrated = "undefined" !== typeof __fa4_migrated, social = ( "undefined" === typeof social ) ? false : social; #>{{{ elementor.helpers.getSocialNetworkNameFromIcon( style3_social_icon, social, true, migrated, true ) }}}',
                ]
            );

            $this->end_controls_section();
            // Style 4 Team Content Controls
            $this->start_controls_section(
                'style1_team_content',
                [
                    'label'     => esc_html__('Style 4 Content', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $style1_social_repeater = new \Elementor\Repeater();
            $style1_social_repeater->add_control(
                'style1_social_icon',
                [
                    'label'   => esc_html__('Icon', 'axero-toolkit'),
                    'type'    => Controls_Manager::ICONS,
                    'default' => [
                        'value'   => 'ri-facebook-fill',
                        'library' => 'ri',
                    ],
                ]
            );
            $style1_social_repeater->add_control(
                'style1_social_link',
                [
                    'label'       => esc_html__('Link', 'axero-toolkit'),
                    'type'        => Controls_Manager::URL,
                    'placeholder' => esc_html__('https://your-link.com', 'axero-toolkit'),
                    'default'     => [
                        'url'         => '#',
                        'is_external' => true,
                        'nofollow'    => false,
                    ],
                ]
            );

            $style1_member_repeater = new \Elementor\Repeater();
            $style1_member_repeater->add_control(
                'style1_member_image',
                [
                    'label'   => esc_html__('Image', 'axero-toolkit'),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => get_template_directory_uri() . '/assets/images/team-two/team1.jpg',
                    ],
                ]
            );
            $style1_member_repeater->add_control(
                'style1_member_position',
                [
                    'label'       => esc_html__('Position', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Founder', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );
            $style1_member_repeater->add_control(
                'style1_member_name',
                [
                    'label'       => esc_html__('Name', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Megan Wilson', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );
            $style1_member_repeater->add_control(
                'style1_social_profiles',
                [
                    'label'       => esc_html__('Social Profiles', 'axero-toolkit'),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $style1_social_repeater->get_controls(),
                    'default'     => [
                        [
                            'style1_social_icon' => [
                                'value'   => 'ri-facebook-fill',
                                'library' => 'ri',
                            ],
                            'style1_social_link' => [
                                'url'         => '#',
                                'is_external' => true,
                                'nofollow'    => false,
                            ],
                        ],
                        [
                            'style1_social_icon' => [
                                'value'   => 'ri-instagram-line',
                                'library' => 'ri',
                            ],
                            'style1_social_link' => [
                                'url'         => '#',
                                'is_external' => true,
                                'nofollow'    => false,
                            ],
                        ],
                        [
                            'style1_social_icon' => [
                                'value'   => 'ri-twitter-x-line',
                                'library' => 'ri',
                            ],
                            'style1_social_link' => [
                                'url'         => '#',
                                'is_external' => true,
                                'nofollow'    => false,
                            ],
                        ],
                        [
                            'style1_social_icon' => [
                                'value'   => 'ri-linkedin-fill',
                                'library' => 'ri',
                            ],
                            'style1_social_link' => [
                                'url'         => '#',
                                'is_external' => true,
                                'nofollow'    => false,
                            ],
                        ],
                    ],
                    'title_field' => '<# var migrated = "undefined" !== typeof __fa4_migrated, social = ( "undefined" === typeof social ) ? false : social; #>{{{ elementor.helpers.getSocialNetworkNameFromIcon( style1_social_icon, social, true, migrated, true ) }}}',
                ]
            );

            $this->add_control(
                'style1_team_members',
                [
                    'label'       => esc_html__('Team Members', 'axero-toolkit'),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $style1_member_repeater->get_controls(),
                    'default'     => [
                        [
                            'style1_member_image'    => [
                                'url' => get_template_directory_uri() . '/assets/images/team-two/team1.jpg',
                            ],
                            'style1_member_position' => esc_html__('Founder', 'axero-toolkit'),
                            'style1_member_name'     => esc_html__('Megan Wilson', 'axero-toolkit'),
                            'style1_social_profiles' => [
                                [
                                    'style1_social_icon' => ['value' => 'ri-facebook-fill', 'library' => 'ri'],
                                    'style1_social_link' => ['url' => '#', 'is_external' => true, 'nofollow' => false],
                                ],
                                [
                                    'style1_social_icon' => ['value' => 'ri-instagram-line', 'library' => 'ri'],
                                    'style1_social_link' => ['url' => '#', 'is_external' => true, 'nofollow' => false],
                                ],
                                [
                                    'style1_social_icon' => ['value' => 'ri-twitter-x-line', 'library' => 'ri'],
                                    'style1_social_link' => ['url' => '#', 'is_external' => true, 'nofollow' => false],
                                ],
                                [
                                    'style1_social_icon' => ['value' => 'ri-linkedin-fill', 'library' => 'ri'],
                                    'style1_social_link' => ['url' => '#', 'is_external' => true, 'nofollow' => false],
                                ],
                            ],
                        ],
                        [
                            'style1_member_image'    => [
                                'url' => get_template_directory_uri() . '/assets/images/team-two/team2.jpg',
                            ],
                            'style1_member_position' => esc_html__('Co-founder', 'axero-toolkit'),
                            'style1_member_name'     => esc_html__('Zylen Orion', 'axero-toolkit'),
                            'style1_social_profiles' => [
                                [
                                    'style1_social_icon' => ['value' => 'ri-facebook-fill', 'library' => 'ri'],
                                    'style1_social_link' => ['url' => '#', 'is_external' => true, 'nofollow' => false],
                                ],
                                [
                                    'style1_social_icon' => ['value' => 'ri-instagram-line', 'library' => 'ri'],
                                    'style1_social_link' => ['url' => '#', 'is_external' => true, 'nofollow' => false],
                                ],
                                [
                                    'style1_social_icon' => ['value' => 'ri-twitter-x-line', 'library' => 'ri'],
                                    'style1_social_link' => ['url' => '#', 'is_external' => true, 'nofollow' => false],
                                ],
                                [
                                    'style1_social_icon' => ['value' => 'ri-linkedin-fill', 'library' => 'ri'],
                                    'style1_social_link' => ['url' => '#', 'is_external' => true, 'nofollow' => false],
                                ],
                            ],
                        ],
                        [
                            'style1_member_image'    => [
                                'url' => get_template_directory_uri() . '/assets/images/team-two/team3.jpg',
                            ],
                            'style1_member_position' => esc_html__('Manager', 'axero-toolkit'),
                            'style1_member_name'     => esc_html__('Veyron Lorien', 'axero-toolkit'),
                            'style1_social_profiles' => [
                                [
                                    'style1_social_icon' => ['value' => 'ri-facebook-fill', 'library' => 'ri'],
                                    'style1_social_link' => ['url' => '#', 'is_external' => true, 'nofollow' => false],
                                ],
                                [
                                    'style1_social_icon' => ['value' => 'ri-instagram-line', 'library' => 'ri'],
                                    'style1_social_link' => ['url' => '#', 'is_external' => true, 'nofollow' => false],
                                ],
                                [
                                    'style1_social_icon' => ['value' => 'ri-twitter-x-line', 'library' => 'ri'],
                                    'style1_social_link' => ['url' => '#', 'is_external' => true, 'nofollow' => false],
                                ],
                                [
                                    'style1_social_icon' => ['value' => 'ri-linkedin-fill', 'library' => 'ri'],
                                    'style1_social_link' => ['url' => '#', 'is_external' => true, 'nofollow' => false],
                                ],
                            ],
                        ],
                        [
                            'style1_member_image'    => [
                                'url' => get_template_directory_uri() . '/assets/images/team-two/team4.jpg',
                            ],
                            'style1_member_position' => esc_html__('Web Developer', 'axero-toolkit'),
                            'style1_member_name'     => esc_html__('Nyxelle Daxel', 'axero-toolkit'),
                            'style1_social_profiles' => [
                                [
                                    'style1_social_icon' => ['value' => 'ri-facebook-fill', 'library' => 'ri'],
                                    'style1_social_link' => ['url' => '#', 'is_external' => true, 'nofollow' => false],
                                ],
                                [
                                    'style1_social_icon' => ['value' => 'ri-instagram-line', 'library' => 'ri'],
                                    'style1_social_link' => ['url' => '#', 'is_external' => true, 'nofollow' => false],
                                ],
                                [
                                    'style1_social_icon' => ['value' => 'ri-twitter-x-line', 'library' => 'ri'],
                                    'style1_social_link' => ['url' => '#', 'is_external' => true, 'nofollow' => false],
                                ],
                                [
                                    'style1_social_icon' => ['value' => 'ri-linkedin-fill', 'library' => 'ri'],
                                    'style1_social_link' => ['url' => '#', 'is_external' => true, 'nofollow' => false],
                                ],
                            ],
                        ],
                        [
                            'style1_member_image'    => [
                                'url' => get_template_directory_uri() . '/assets/images/team-two/team5.jpg',
                            ],
                            'style1_member_position' => esc_html__('Web Designer', 'axero-toolkit'),
                            'style1_member_name'     => esc_html__('Serenya Fenrir', 'axero-toolkit'),
                            'style1_social_profiles' => [
                                [
                                    'style1_social_icon' => ['value' => 'ri-facebook-fill', 'library' => 'ri'],
                                    'style1_social_link' => ['url' => '#', 'is_external' => true, 'nofollow' => false],
                                ],
                                [
                                    'style1_social_icon' => ['value' => 'ri-instagram-line', 'library' => 'ri'],
                                    'style1_social_link' => ['url' => '#', 'is_external' => true, 'nofollow' => false],
                                ],
                                [
                                    'style1_social_icon' => ['value' => 'ri-twitter-x-line', 'library' => 'ri'],
                                    'style1_social_link' => ['url' => '#', 'is_external' => true, 'nofollow' => false],
                                ],
                                [
                                    'style1_social_icon' => ['value' => 'ri-linkedin-fill', 'library' => 'ri'],
                                    'style1_social_link' => ['url' => '#', 'is_external' => true, 'nofollow' => false],
                                ],
                            ],
                        ],
                    ],
                    'title_field' => '{{{ style1_member_name }}}',
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

            // Style 1 Position
            $this->start_controls_section(
                'style1_position_style',
                [
                    'label'     => esc_html__('Position Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'style1_position_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .team_member span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style1_position_typography',
                    'selector' => '{{WRAPPER}} .team_member span',
                ]
            );

            $this->end_controls_section();

            // Style 4 Name
            $this->start_controls_section(
                'style1_name_style',
                [
                    'label'     => esc_html__('Name Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'style1_name_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .team_member .content h3' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style1_name_typography',
                    'selector' => '{{WRAPPER}} .team_member .content h3',
                ]
            );

            $this->end_controls_section();

            // Style 4 Hover Effects
            $this->start_controls_section(
                'style1_hover_effects',
                [
                    'label'     => esc_html__('Hover Effects', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'style1_social_icon_color',
                [
                    'label'     => esc_html__('Social Icon Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .team_member:hover .socials a' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style1_social_icon_hover_color',
                [
                    'label'     => esc_html__('Social Icon Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .team_member:hover .socials a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style1_overlay_color',
                [
                    'label'     => esc_html__('Overlay Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .team_member:hover::before' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'style2_content_style',
                [
                    'label'     => esc_html__('Style 2 Content', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );

            // Active slide content background
            $this->add_control(
                'style2_active_content_bg',
                [
                    'label'     => esc_html__('Active Content Background', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .team_tabs_slides .slide.active .team_content' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            // Name styling
            $this->add_control(
                'style2_name_heading',
                [
                    'label'     => esc_html__('Name', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'style2_name_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .team_tabs_slides .slide .team_content h3' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style2_name_typography',
                    'selector' => '{{WRAPPER}} .team_tabs_slides .slide .team_content h3',
                ]
            );

            // Position styling
            $this->add_control(
                'style2_position_heading',
                [
                    'label'     => esc_html__('Position', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'style2_position_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .team_tabs_slides .slide .team_content span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style2_position_typography',
                    'selector' => '{{WRAPPER}} .team_tabs_slides .slide .team_content span',
                ]
            );

            // Description styling
            $this->add_control(
                'style2_description_heading',
                [
                    'label'     => esc_html__('Description', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'style2_description_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .team_tabs_slides .slide .team_content p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style2_description_typography',
                    'selector' => '{{WRAPPER}} .team_tabs_slides .slide .team_content p',
                ]
            );

            // Social icons styling
            $this->add_control(
                'style2_social_heading',
                [
                    'label'     => esc_html__('Social Icons', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'style2_social_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .team_tabs_slides .slide .team_content .socials a i'   => 'color: {{VALUE}};',
                        '{{WRAPPER}} .team_tabs_slides .slide .team_content .socials a svg' => 'fill: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style2_social_hover_color',
                [
                    'label'     => esc_html__('Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .team_tabs_slides .slide .team_content .socials a:hover i'   => 'color: {{VALUE}};',
                        '{{WRAPPER}} .team_tabs_slides .slide .team_content .socials a:hover svg' => 'fill: {{VALUE}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'style2_social_size',
                [
                    'label'      => esc_html__('Size', 'axero-toolkit'),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => ['px', 'em'],
                    'range'      => [
                        'px' => [
                            'min' => 10,
                            'max' => 50,
                        ],
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .team_tabs_slides .slide .team_content .socials a i'   => 'font-size: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .team_tabs_slides .slide .team_content .socials a svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->end_controls_section();
            // Style 3 Team Member Image
            $this->start_controls_section(
                'style3_member_image_style',
                [
                    'label'     => esc_html__('Member Image Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style3',
                    ],
                ]
            );

            $this->add_control(
                'style3_image_width',
                [
                    'label'      => esc_html__('Width', 'axero-toolkit'),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => ['px', '%'],
                    'range'      => [
                        'px' => [
                            'min' => 50,
                            'max' => 1000,
                        ],
                        '%'  => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors'  => [
                        '{{WRAPPER}}  .single-team-member img' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'style3_image_height',
                [
                    'label'      => esc_html__('Height', 'axero-toolkit'),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => ['px', '%'],
                    'range'      => [
                        'px' => [
                            'min' => 50,
                            'max' => 1000,
                        ],
                        '%'  => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors'  => [
                        '{{WRAPPER}}  .single-team-member img' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'style3_image_b border_radius',
                [
                    'label'      => esc_html__('Border Radius', 'axero-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}}  .single-team-member img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->end_controls_section();

            // Style 3 Member Name
            $this->start_controls_section(
                'style3_member_name_style',
                [
                    'label'     => esc_html__('Member Name Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style3',
                    ],
                ]
            );

            $this->add_control(
                'style3_name_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-team-member .content .title h3' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style3_name_typography',
                    'selector' => '{{WRAPPER}} .single-team-member .content .title h3',
                ]
            );

            $this->end_controls_section();

            // Style 3 Member Position
            $this->start_controls_section(
                'style3_member_position_style',
                [
                    'label'     => esc_html__('Member Position Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style3',
                    ],
                ]
            );

            $this->add_control(
                'style3_position_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-team-member .content .title span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style3_position_typography',
                    'selector' => '{{WRAPPER}} .single-team-member .content .title span',
                ]
            );

            $this->end_controls_section();

            // Style 3 Social Icons
            $this->start_controls_section(
                'style3_social_icons_style',
                [
                    'label'     => esc_html__('Social Icons Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style3',
                    ],
                ]
            );

            $this->add_control(
                'style3_icon_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-team-member .content .socials a i'   => 'color: {{VALUE}};',
                        '{{WRAPPER}} .single-team-member .content .socials a svg' => 'fill: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style3_icon_size',
                [
                    'label'      => esc_html__('Size', 'axero-toolkit'),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range'      => [
                        'px' => [
                            'min' => 10,
                            'max' => 100,
                        ],
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .single-team-member .content .socials a i'   => 'font-size: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .single-team-member .content .socials a svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                    ],
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

            <div class="team_area">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-center" data-cues="slideInUp" data-group="team_list">
                        <?php
                            if (! empty($settings['style1_team_members']) && is_array($settings['style1_team_members'])):
                                            // First member in left column, rest in right
                                            $members      = $settings['style1_team_members'];
                                            $first_member = array_shift($members);
                                        ?>
				                        <div class="col-lg-4 col-sm-6">
				                            <?php if ($first_member): ?>
				                            <div class="team_member position-relative">
				                                <img src="<?php echo esc_url($first_member['style1_member_image']['url']); ?>" alt="<?php echo esc_attr($first_member['style1_member_name']); ?>">
				                                <div class="content">
				                                    <span class="d-block ">
				                                        <?php echo esc_html($first_member['style1_member_position']); ?>
				                                    </span>
				                                    <h3 class="mb-0  fw-semibold">
				                                        <?php echo esc_html($first_member['style1_member_name']); ?>
				                                    </h3>
				                                </div>
				                                <div class="socials lh-1 d-flex align-items-center">
				                                    <?php if (! empty($first_member['style1_social_profiles'])): ?>
<?php foreach ($first_member['style1_social_profiles'] as $social):
                        $target   = ! empty($social['style1_social_link']['is_external']) ? ' target="_blank"' : '';
                        $nofollow = ! empty($social['style1_social_link']['nofollow']) ? ' rel="nofollow"' : '';
                    ?>
								                                            <a href="<?php echo esc_url($social['style1_social_link']['url']); ?>"<?php echo $target; ?><?php echo $nofollow; ?>>
								                                                <?php \Elementor\Icons_Manager::render_icon($social['style1_social_icon'], ['aria-hidden' => 'true']); ?>
								                                            </a>
								                                        <?php endforeach; ?>
<?php endif; ?>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <?php
                                    // Split remaining members into two columns
                                                $chunks = array_chunk($members, ceil(count($members) / 2));
                                                foreach ($chunks as $col_members):
                                            ?>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="row">
                                        <?php foreach ($col_members as $member): ?>
                                        <div class="col-lg-12">
                                            <div class="team_member position-relative">
                                                <img src="<?php echo esc_url($member['style1_member_image']['url']); ?>" alt="<?php echo esc_attr($member['style1_member_name']); ?>">
                                                <div class="content">
                                                    <span class="d-block">
                                                        <?php echo esc_html($member['style1_member_position']); ?>
                                                    </span>
                                                    <h3 class="mb-0  fw-semibold">
                                                        <?php echo esc_html($member['style1_member_name']); ?>
                                                    </h3>
                                                </div>
                                                <div class="socials lh-1 d-flex align-items-center">
                                                    <?php if (! empty($member['style1_social_profiles'])): ?>
<?php foreach ($member['style1_social_profiles'] as $social):
                    $target   = ! empty($social['style1_social_link']['is_external']) ? ' target="_blank"' : '';
                    $nofollow = ! empty($social['style1_social_link']['nofollow']) ? ' rel="nofollow"' : '';
                ?>
				                                                            <a href="<?php echo esc_url($social['style1_social_link']['url']); ?>"<?php echo $target; ?><?php echo $nofollow; ?>>
				                                                                <?php \Elementor\Icons_Manager::render_icon($social['style1_social_icon'], ['aria-hidden' => 'true']); ?>
				                                                            </a>
				                                                        <?php endforeach; ?>
<?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        <?php
            } elseif ($settings['style_selection'] === 'style2') {
                    ?>
            <!-- style 2 -->
           <div class="team_area_two pb-150 position-relative z-1">
            <div class="container-fluid max_w_1560px">
                <div class="team_tabs_slides overflow-hidden d-md-flex" data-cues="slideInUp" data-group="team_list">
                    <?php foreach ($settings['style2_team_members'] as $member):
                                        $image_url = ! empty($member['style2_member_image']['id'])
                                        ? wp_get_attachment_image_url($member['style2_member_image']['id'], 'full')
                                        : (! empty($member['style2_member_image']['url'])
                                            ? $member['style2_member_image']['url']
                                            : AXERO_IMG . '/teams/placeholder.jpg');
                                    ?>
				                        <div
				                            class="slide d-flex align-items-end"
				                            style="background-image: url(<?php echo esc_url($image_url); ?>);"
				                        >
				                            <div class="team_content">
				                                <h3>
				                                    <?php echo esc_html($member['style2_member_name']); ?>
				                                </h3>
				                                <span class="d-block">
				                                    <?php echo esc_html($member['style2_member_position']); ?>
				                                </span>
				                                <p>
				                                    <?php echo esc_html($member['style2_member_description']); ?>
				                                </p>
				                                <div class="socials lh-1 d-flex align-items-center">
				                                    <?php foreach ($member['style2_social_profiles'] as $social):
                                                                            $target   = $social['style2_social_link']['is_external'] ? ' target="_blank"' : '';
                                                                            $nofollow = $social['style2_social_link']['nofollow'] ? ' rel="nofollow"' : '';
                                                                        ?>
								                                        <a href="<?php echo esc_url($social['style2_social_link']['url']); ?>"<?php echo $target; ?><?php echo $nofollow; ?>>
								                                            <?php \Elementor\Icons_Manager::render_icon($social['style2_social_icon'], ['aria-hidden' => 'true']); ?>
								                                        </a>
								                                    <?php endforeach; ?>
				                                </div>
				                            </div>
				                        </div>
				                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <?php
            } elseif ($settings['style_selection'] === 'style3') {
                    ?>
            <!-- style 3 -->
            <div class="team-area">
                <div class="single-team-member">
                    <img src="<?php echo esc_url($settings['style3_team_image']['url']); ?>" alt="<?php echo esc_attr($settings['style3_team_name']); ?>">
                    <div class="content d-flex justify-content-between align-items-end">
                        <div class="title">
                            <h3>
                                <?php echo esc_html($settings['style3_team_name']); ?>
                            </h3>
                            <span class="d-block">
                                <?php echo esc_html($settings['style3_team_position']); ?>
                            </span>
                        </div>
                        <div class="socials">
                            <?php foreach ($settings['style3_social_profiles'] as $social):
                                                $target   = ! empty($social['style3_social_link']['is_external']) ? ' target="_blank"' : '';
                                                $nofollow = ! empty($social['style3_social_link']['nofollow']) ? ' rel="nofollow"' : '';
                                            ?>
				                                <a href="<?php echo esc_url($social['style3_social_link']['url']); ?>"<?php echo $target; ?><?php echo $nofollow; ?> class="d-inline-block">
				                                    <?php \Elementor\Icons_Manager::render_icon($social['style3_social_icon'], ['aria-hidden' => 'true']); ?>
				                                </a>
				                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>


    <?php

                }
            }
        }

    $widgets_manager->register(new axero_team_card());