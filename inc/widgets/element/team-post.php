<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class Axero_Teams_Grid_slider extends Widget_Base
    {

        public function get_name()
        {
            return 'Axero-teams-post';
        }

        public function get_title()
        {
            return __('Teams Post', 'axero-toolkit');
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
            $categories = get_categories();
            $options    = [];

            if (! empty($categories)) {
                foreach ($categories as $category) {
                    $options[$category->term_id] = $category->name;
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
                 
                     
                    ],
                ]
            );

            $this->end_controls_section();

            // teams Filter Controls
            $this->start_controls_section(
                'post_filter_section',
                [
                    'label' => esc_html__('teams Filter', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'posts_per_page',
                [
                    'label'   => esc_html__('Teams Per Page', 'axero-toolkit'),
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
                    'label'       => esc_html__('Exclude Teams', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'description' => esc_html__('Enter teams IDs separated by commas', 'axero-toolkit'),
                ]
            );

            $this->end_controls_section();

        }

        protected function style_tab_content()
        {
            // Team Position Style (.team_member .content span)
            $this->start_controls_section(
                'style1_team_position_style',
                [
                    'label'     => esc_html__('Team Position', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'team_position_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .team_member .content span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'team_position_typography',
                    'selector' => '{{WRAPPER}} .team_member .content span',
                ]
            );

            $this->end_controls_section();

            // Team Member Name Style (.team_member .content h3)
            $this->start_controls_section(
                'style1_team_name_style',
                [
                    'label'     => esc_html__('Team Member Name', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'team_name_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .team_member .content h3 a' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'team_name_hover_color',
                [
                    'label'     => esc_html__('Hover Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .team_member .content h3 a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'team_name_typography',
                    'selector' => '{{WRAPPER}} .team_member .content h3',
                ]
            );

            $this->end_controls_section();

            // Social Media Icon Style (.team_member .socials a)
            $this->start_controls_section(
                'style1_team_social_icon_style',
                [
                    'label'     => esc_html__('Social Media Icons', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'team_social_icon_color',
                [
                    'label'     => esc_html__('Icon Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .team_member .socials a' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'team_social_icon_hover_color',
                [
                    'label'     => esc_html__('Icon Hover Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .team_member .socials a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();

        }

        protected function render()
        {
            $settings   = $this->get_settings_for_display();
            $query_args = [
                'post_type'      => 'teams',
                'posts_per_page' => $settings['posts_per_page'] ? $settings['posts_per_page'] : 3,
                'orderby'        => $settings['orderby'] ? $settings['orderby'] : 'date',
                'order'          => $settings['order'] ? $settings['order'] : 'DESC',
                'post_status'    => 'publish', // Ensure only published posts are queried
            ];

            // Add category filter if set
            if (! empty($settings['category_filter'])) {
                $query_args['category__in'] = $settings['category_filter'];
            }

            // Add teams exclusion if set
            if (! empty($settings['exclude_posts'])) {
                $query_args['post__not_in'] = array_map('intval', explode(',', $settings['exclude_posts']));
            }

            $query = new \WP_Query($query_args);

            if ($settings['style_selection'] === 'style1') {
             
            ?>
<!-- style 1 -->
<div class="team_area ">
    <div class="container">
        <div class="row align-items-center justify-content-center" id="team_load_more_items">
            <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); 
                    $linkedin = get_field('linkdin', get_the_ID());
                    $instagram = get_field('instagram', get_the_ID());
                    $twitter_x = get_field('twitter_x', get_the_ID());
                    $facebook = get_field('facebook', get_the_ID());
                    $team_categories = get_the_terms(get_the_ID(), 'teams_category');
                    
                    // Check if get_the_terms returned WP_Error
                    if (is_wp_error($team_categories)) {
                        $team_categories = array();
                        }
                    ?>
                    <div class="col-lg-4 col-sm-6">
                        <div class="team_member mb_25 position-relative">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                            <div class="content">
                                <?php if (!empty($team_categories) && !is_wp_error($team_categories)) : ?>
                                    <span class="d-block">
                                        <?php echo esc_html($team_categories[0]->name); ?>
                                    </span>
                                <?php endif; ?>
                                <h3 class="mb-0 text-white">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                            </div>
                            <div class="socials lh-1 d-flex align-items-center">
                                <?php if (!empty($linkedin)) : ?>
                                    <a href="<?php echo esc_url($linkedin); ?>" target="_blank">
                                        <i class="ti ti-brand-linkedin"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty($twitter_x)) : ?>
                                    <a href="<?php echo esc_url($twitter_x); ?>" target="_blank">
                                        <i class="ti ti-brand-x"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty($instagram)) : ?>
                                    <a href="<?php echo esc_url($instagram); ?>" target="_blank">
                                        <i class="ti ti-brand-instagram"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty($facebook)) : ?>
                                    <a href="<?php echo esc_url($facebook); ?>" target="_blank">
                                        <i class="ti ti-brand-facebook"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
            <?php else : ?>
                <div class="col-12">
                    <p class="text-center"><?php esc_html_e('No team members found.', 'axero-toolkit'); ?></p>
                </div>
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

      $widgets_manager->register(new Axero_Teams_Grid_slider());