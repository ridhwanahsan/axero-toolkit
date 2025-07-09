<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class Axero_career_Grid_slider extends Widget_Base
    {

        public function get_name()
        {
            return 'Axero-career-grid';
        }

        public function get_title()
        {
            return __('Careers Grid', 'axero-toolkit');
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
                'taxonomy'     => 'careers_category',
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

                    ],
                ]
            );

            $this->end_controls_section();

            // career Filter Controls
            $this->start_controls_section(
                'post_filter_section',
                [
                    'label' => esc_html__('career Filter', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'posts_per_page',
                [
                    'label'   => esc_html__('careers Per Page', 'axero-toolkit'),
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
                    'label'       => esc_html__('Exclude careers', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'description' => esc_html__('Enter post IDs separated by commas', 'axero-toolkit'),
                ]
            );

            $this->end_controls_section();

        }

        protected function style_tab_content()
        {
            // content style controls tab
            $this->start_controls_section(
                'style2_section',
                [
                    'label'     => esc_html__('Style 2', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );

            $this->add_control(
                'text_color',
                [
                    'label'     => esc_html__('Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .jobs-list .item .content h3' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .jobs-list .item .content h3' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'text_hover_color',
                [
                    'label'     => esc_html__('Text Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .jobs-list .item .content h3:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography',
                    'label'    => esc_html__('Title Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .item .content h3',
                ]
            );

            $this->end_controls_section();
            // Style 1 Title Controls
            $this->start_controls_section(
                'style1_title_style',
                [
                    'label'     => esc_html__('Style 1 Title', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'style1_title_color',
                [
                    'label'     => esc_html__('Title Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awards-list .single-award h3' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style1_title_hover_color',
                [
                    'label'     => esc_html__('Title Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awards-list .single-award h3:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style1_title_typography',
                    'selector' => '{{WRAPPER}} .awards-list .single-award h3',
                ]
            );

            $this->end_controls_section();

            // Style 1 Number Controls
            $this->start_controls_section(
                'style1_number_style',
                [
                    'label'     => esc_html__('Style 1 Number', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'style1_number_color',
                [
                    'label'     => esc_html__('Number Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awards-list .single-award .number' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style1_number_typography',
                    'selector' => '{{WRAPPER}} .awards-list .single-award .number',
                ]
            );

            $this->add_control(
                'style1_number_background_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awards-list .single-award .number' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style1_number_border_radius',
                [
                    'label'      => esc_html__('Border Radius', 'axero-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .awards-list .single-award .number' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->end_controls_section();

            // Style 1 Line Background Controls
            $this->start_controls_section(
                'style1_line_background_style',
                [
                    'label'     => esc_html__('Style 1 Line Background', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'style1_line_background_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awards-list .single-award::before' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();

        }

        protected function render()
        {
            $settings   = $this->get_settings_for_display();
            $query_args = [
                'post_type'      => 'careers',
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

            $query    = new \WP_Query($query_args);
            $open_job = get_field('open_job') ?: '2 open roles';

            if ($settings['style_selection'] === 'style1') {
            ?>
<!-- style 1 -->
<div class="awards-area pb-150">
    <div class="container">
        <div class="creative-agency-section-title">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-5">
                    <div class="awards-list-image position-relative">
                        <?php
                            // Show featured images of each post (award)
                                        if ($query->have_posts()):
                                            while ($query->have_posts()): $query->the_post();
                                            if (has_post_thumbnail()): ?>
						                                    <div class="awards-image text-center">
						                                        <a href="<?php the_permalink(); ?>">
						                                            <?php the_post_thumbnail('medium', ['alt' => get_the_title()]); ?>
						                                        </a>
						                                    </div>
						                                <?php endif;
                                                                        endwhile;
                                                                        // Reset loop for the list below
                                                                        $query->rewind_posts();
                                                                        endif;
                                                                    ?>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="awards-list" data-cues="slideInUp">
                        <?php
                            $counter = 1;
                                        if ($query->have_posts()):
                                        while ($query->have_posts()): $query->the_post(); ?>
						                                <div class="single-award d-flex align-items-center justify-content-between position-relative">
						                                    <h3 class="mb-0">
						                                        <?php the_title(); ?>
						                                    </h3>
						                                    <div class="number">
						                                        <?php echo str_pad($counter, 2, '0', STR_PAD_LEFT); ?>
						                                    </div>
						                                    <a href="<?php the_permalink(); ?>" class="link-btn position-absolute start-0 end-0 top-0 bottom-0 z-1"></a>
						                                </div>
						                            <?php
                                                                $counter++;
                                                                        endwhile;
                                                                        wp_reset_postdata();
                                                                else: ?>
                            <p><?php esc_html_e('No awards found.', 'axero-toolkit'); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php
        } elseif ($settings['style_selection'] === 'style2') {
                ?>
<!-- style 2 -->
        <div class="jobs-area">
                <div class="jobs-list" data-cues="slideInUp">
                    <?php
                        $counter = 1;
                                    while ($query->have_posts()): $query->the_post();
                                        $open_job = get_field('open_job', get_the_ID()) ?: '0 open roles';
                                        $job_type = get_field('job_type', get_the_ID()) ?: 'Full time';
                                        $location = get_field('location', get_the_ID()) ?: 'Onsite';
                                    ?>
			                    <div class="item">
			                        <div class="row align-items-center">
			                            <div class="col-lg-4 col-md-4">
			                                <span class="d-block title">
			                                    <?php echo esc_html($open_job); ?>
			                                </span>
			                            </div>
			                            <div class="col-lg-6 col-md-6">
			                                <div class="content d-flex align-items-center">
			                                    <div class="number text-center rounded-circle">
			                                        <?php echo str_pad($counter, 2, '0', STR_PAD_LEFT); ?>
			                                    </div>
			                                    <h3 class="mb-0">
			                                        <?php the_title(); ?>
			                                    </h3>
			                                </div>
			                            </div>
			                            <div class="col-lg-2 col-md-2">
			                                <div class="link-btn">
			                                    <a href="<?php the_permalink(); ?>" class="d-inline-block rounded-circle text-center position-relative">
			                                        <i class="ri-arrow-right-up-line"></i>
			                                    </a>
			                                </div>
			                            </div>
			                        </div>
			                    </div>
			                    <?php
                                        $counter++;
                                                endwhile;
                                                wp_reset_postdata();
                                            ?>
                </div>
        </div>


<?php
    } elseif ($settings['style_selection'] === 'style3') {
            ?>
<!-- style 3 -->


<?php
    }
        }
    }

$widgets_manager->register(new Axero_career_Grid_slider());