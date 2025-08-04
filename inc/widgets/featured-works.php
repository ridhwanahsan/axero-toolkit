<?php
    namespace axero_toolkit\Widgets;
    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_featured_works extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_featured_works';
        }

        public function get_title()
        {
            return __('Featured Works', 'axero-toolkit');
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
                <div class="featured_works_area">
                    <div class="container-fluid max_w_1560px">
                        <div class="section_title style_four position-relative justify-content-md-end">
                            <h2 class="mb-0 text-white text-uppercase fw-semibold order-md-2 text_animation">
                                Featured Work
                            </h2>
                            <img src="<?php echo get_template_directory_uri()?>/assets/images/icons/left_down_arrow.svg" class="order-md-1" alt="left_down_arrow">
                        </div>
                    </div>
                    <div class="container-fluid px-0">
                        <div class="featured_works_slides owl-carousel owl-theme" data-cue="slideInUp">
                            <?php
                            if ( $query->have_posts() ) :
                                while ( $query->have_posts() ) : $query->the_post();
                                    $work_title = get_the_title();
                                    $work_link  = get_permalink();
                                    $work_image = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                                    $work_terms = get_the_terms( get_the_ID(), 'works_category' );
                                    ?>
                                    <div class="work_item">
                                        <div class="image position-relative overflow-hidden">
                                            <?php if ( $work_image ) : ?>
                                                <img src="<?php echo esc_url( $work_image ); ?>" alt="<?php echo esc_attr( $work_title ); ?>">
                                            <?php endif; ?>
                                            <a href="<?php echo esc_url( $work_link ); ?>" class="details_link_btn text-white d-flex align-items-center justify-content-center fw-medium rounded-circle">
                                                <?php esc_html_e('View', 'lunex-toolkit'); ?>
                                            </a>
                                        </div>
                                        <h3 class="fw-semibold">
                                            <a href="<?php echo esc_url( $work_link ); ?>">
                                                <?php echo esc_html( $work_title ); ?>
                                            </a>
                                        </h3>
                                        <?php if ( ! empty( $work_terms ) && ! is_wp_error( $work_terms ) ) : ?>
                                            <ul class="custom_list mb-0 list-unstyled p-0">
                                                <?php foreach ( $work_terms as $i => $term ) : ?>
                                                    <li class="<?php echo $i === 0 ? 'fw-semibold' : 'fw-medium'; ?> d-inline-block">
                                                        <?php echo esc_html( $term->name ); ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                <?php endwhile;  wp_reset_postdata();  endif; ?>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_featured_works());