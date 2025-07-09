<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_faq_according extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_faq_according ';
        }

        public function get_title()
        {
            return __('FAQ', 'axero-toolkit');
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

            // FAQ Content Tab
            $this->start_controls_section(
                'faq_content',
                [
                    'label'     => esc_html__('FAQ Items', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );
            $this->add_control(
                'first_item_open',
                [
                    'label'        => esc_html__('First Item Open', 'axero-toolkit'),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => esc_html__('Yes', 'axero-toolkit'),
                    'label_off'    => esc_html__('No', 'axero-toolkit'),
                    'return_value' => 'yes',
                    'default'      => 'no',
                    'description'  => esc_html__('Make the first FAQ item open by default', 'axero-toolkit'),
                ]
            );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'faq_question',
                [
                    'label'       => esc_html__('Question', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('What services do you offer?', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $repeater->add_control(
                'faq_answer',
                [
                    'label'      => esc_html__('Answer', 'axero-toolkit'),
                    'type'       => Controls_Manager::WYSIWYG,
                    'default'    => esc_html__('We offer a wide range of services...', 'axero-toolkit'),
                    'show_label' => false,
                ]
            );

            $repeater->add_control(
                'faq_default_open',
                [
                    'label'        => esc_html__('Open by Default', 'axero-toolkit'),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => esc_html__('Yes', 'axero-toolkit'),
                    'label_off'    => esc_html__('No', 'axero-toolkit'),
                    'return_value' => 'yes',
                    'default'      => 'no',
                ]
            );

            $this->add_control(
                'faq_items',
                [
                    'label'       => esc_html__('FAQ Items', 'axero-toolkit'),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'default'     => [
                        [
                            'faq_question' => esc_html__('What services do you offer?', 'axero-toolkit'),
                            'faq_answer'   => esc_html__('We offer a wide range of services...', 'axero-toolkit'),
                        ],
                    ],
                    'title_field' => '{{{ faq_question }}}',
                ]
            );

            $this->end_controls_section();

            // Style 2 Content Tab
            $this->start_controls_section(
                'style2_faq_content',
                [
                    'label'     => esc_html__('FAQ Items', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );

            $style2_repeater = new \Elementor\Repeater();

            $style2_repeater->add_control(
                'style2_faq_question',
                [
                    'label'       => esc_html__('Question', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('What services do you offer?', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $style2_repeater->add_control(
                'style2_faq_answer',
                [
                    'label'      => esc_html__('Answer', 'axero-toolkit'),
                    'type'       => Controls_Manager::WYSIWYG,
                    'default'    => esc_html__('We offer a wide range of services...', 'axero-toolkit'),
                    'show_label' => false,
                ]
            );

            $this->add_control(
                'style2_faq_items',
                [
                    'label'       => esc_html__('FAQ Items', 'axero-toolkit'),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $style2_repeater->get_controls(),
                    'default'     => [
                        [
                            'style2_faq_question' => esc_html__('What services do you offer?', 'axero-toolkit'),
                            'style2_faq_answer'   => esc_html__('We offer a wide range of services...', 'axero-toolkit'),
                        ],
                        [
                            'style2_faq_question' => esc_html__('How can we help your business?', 'axero-toolkit'),
                            'style2_faq_answer'   => esc_html__('We provide innovative solutions to grow your business...', 'axero-toolkit'),
                        ],
                    ],
                    'title_field' => '{{{ style2_faq_question }}}',
                ]
            );

            $this->end_controls_section();
            // Style 3 Content Section
            $this->start_controls_section(
                'style3_content_section',
                [
                    'label'     => esc_html__('Style 3 Content', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style3',
                    ],
                ]
            );

            $style3_repeater = new \Elementor\Repeater();

            $style3_repeater->add_control(
                'style3_faq_question',
                [
                    'label'       => esc_html__('Question', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Expertise Teams', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $style3_repeater->add_control(
                'style3_faq_answer',
                [
                    'label'      => esc_html__('Answer', 'axero-toolkit'),
                    'type'       => Controls_Manager::WYSIWYG,
                    'default'    => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit...', 'axero-toolkit'),
                    'show_label' => false,
                ]
            );

            $this->add_control(
                'style3_faq_items',
                [
                    'label'       => esc_html__('FAQ Items', 'axero-toolkit'),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $style3_repeater->get_controls(),
                    'default'     => [
                        [
                            'style3_faq_question' => esc_html__('Expertise Teams', 'axero-toolkit'),
                            'style3_faq_answer'   => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit...', 'axero-toolkit'),
                        ],
                        [
                            'style3_faq_question' => esc_html__('Quality Services', 'axero-toolkit'),
                            'style3_faq_answer'   => esc_html__('Sed do eiusmod tempor incididunt ut labore et dolore magna...', 'axero-toolkit'),
                        ],
                    ],
                    'title_field' => '{{{ style3_faq_question }}}',
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
            // Question Style
            $this->start_controls_section(
                'question_style',
                [
                    'label'     => esc_html__('Question', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'question_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .accordion-button' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();

            // Answer Style
            $this->start_controls_section(
                'answer_style',
                [
                    'label' => esc_html__('Answer', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE, 'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'answer_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .accordion-body'                                                                                => 'color: {{VALUE}};',
                        '{{WRAPPER}} .creative-agency-faq-accordion.accordion .accordion-item .accordion-collapse .accordion-body p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();

            // Button Style
            $this->start_controls_section(
                'button_style',
                [
                    'label'     => esc_html__('Button', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'button_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .accordion-button i' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'button_hover_color',
                [
                    'label'     => esc_html__('Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .accordion-button:hover i' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'button_bg_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .accordion-button::before' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'button_bg_hover_color',
                [
                    'label'     => esc_html__('Hover Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .accordion-button:hover::before' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();
            // Style 2 Tab Content
            $this->start_controls_section(
                'style2_tab_style',
                [
                    'label'     => esc_html__('Style 2 Settings', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );

            // Number Styling
            // Number Color (Open/Show)
            $this->add_control(
                'number_color',
                [
                    'label'     => esc_html__('Number Show Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        // Default (open) state
                        '{{WRAPPER}} .digital-agency-faq-accordion.accordion .accordion-item .accordion-button .number'                            => 'color: {{VALUE}} !important;',
                        // Show state (open)
                        '{{WRAPPER}} .digital-agency-faq-accordion.accordion .accordion-item .accordion-collapse.show ~ .accordion-button .number' => 'color: {{VALUE}} !important;',
                    ],
                ]
            );

            // Number Color (Collapsed/Off)
            $this->add_control(
                'number_collapsed_color',
                [
                    'label'     => esc_html__('Number Collapsed Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        // Collapsed state
                        '{{WRAPPER}} .digital-agency-faq-accordion.accordion .accordion-item .accordion-button.collapsed .number' => 'color: {{VALUE}} !important;',
                    ],
                ]
            );

            $this->add_control(
                'number_bg_color',
                [
                    'label'     => esc_html__('collapse Number show Background Color  ', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        // Default (open) state
                        '{{WRAPPER}} .digital-agency-faq-accordion.accordion .accordion-item .accordion-button .number'                            => 'background-color: {{VALUE}} !important;',
                        // Show state (open)
                        '{{WRAPPER}} .digital-agency-faq-accordion.accordion .accordion-item .accordion-collapse.show ~ .accordion-button .number' => 'background-color: {{VALUE}} !important;',
                    ],
                ]
            );

            $this->add_control(
                'number_bg_collapsed_color',
                [
                    'label'     => esc_html__('Collapsed Number Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        // Collapsed state
                        '{{WRAPPER}} .digital-agency-faq-accordion.accordion .accordion-item .accordion-button.collapsed .number' => 'background-color: {{VALUE}} !important;',
                    ],
                ]
            );
            $this->add_control(
                'number_border_color',
                [
                    'label'     => esc_html__('Number Border Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .digital-agency-faq-accordion.accordion .accordion-item .accordion-button .number' => 'border-color: {{VALUE}} !important;',
                    ],
                ]
            );

            $this->add_control(
                'number_border_width',
                [
                    'label'     => esc_html__('Number Border Width', 'axero-toolkit'),
                    'type'      => Controls_Manager::SLIDER,
                    'range'     => [
                        'px' => [
                            'min' => 0,
                            'max' => 10,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .digital-agency-faq-accordion.accordion .accordion-item .accordion-button .number' => 'border-width: {{SIZE}}{{UNIT}} !important;',
                    ],
                ]
            );

            $this->add_control(
                'number_border_style',
                [
                    'label'     => esc_html__('Number Border Style', 'axero-toolkit'),
                    'type'      => Controls_Manager::SELECT,
                    'options'   => [
                        'none'   => esc_html__('None', 'axero-toolkit'),
                        'solid'  => esc_html__('Solid', 'axero-toolkit'),
                        'dotted' => esc_html__('Dotted', 'axero-toolkit'),
                        'dashed' => esc_html__('Dashed', 'axero-toolkit'),
                        'double' => esc_html__('Double', 'axero-toolkit'),
                    ],
                    'default'   => 'solid',
                    'selectors' => [
                        '{{WRAPPER}} .digital-agency-faq-accordion.accordion .accordion-item .accordion-button .number' => 'border-style: {{VALUE}} !important;',
                    ],
                ]
            );
            // Question Styling
            $this->add_control(
                'question_heading',
                [
                    'label'     => esc_html__('Question Style', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'question2_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .accordion-button' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'question_typography',
                    'label'    => esc_html__('Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .accordion-button',
                ]
            );

            // Answer Styling
            $this->add_control(
                'answer_heading',
                [
                    'label'     => esc_html__('Answer Style', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'answer2_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .digital-agency-faq-accordion.accordion .accordion-item .accordion-collapse .accordion-body p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'answer_typography',
                    'label'    => esc_html__('Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .digital-agency-faq-accordion.accordion .accordion-item .accordion-collapse .accordion-body p',
                ]
            );
            $this->add_control(
                'icon_color',
                [
                    'label'     => esc_html__('Icon Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .digital-agency-faq-accordion.accordion .accordion-item .accordion-button::before' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'icon_collapsed_color',
                [
                    'label'     => esc_html__('Collapsed Icon Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .digital-agency-faq-accordion.accordion .accordion-item .accordion-button.collapsed::before' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();
            // Style 3 Question Style
            $this->start_controls_section(
                'style3_question_style',
                [
                    'label'     => esc_html__('Style 3 Question', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style3',
                    ],
                ]
            );

            $this->add_control(
                'style3_question_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .why_choose_us_content .accordion .accordion-item .accordion-button' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style3_question_typography',
                    'selector' => '{{WRAPPER}} .why_choose_us_content .accordion .accordion-item .accordion-button',
                ]
            );

            $this->add_control(
                'style3_question_hover_color',
                [
                    'label'     => esc_html__('Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .why_choose_us_content .accordion .accordion-item .accordion-button:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'style3_answer_color',
                [
                    'label'     => esc_html__('Answer Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .why_choose_us_content .accordion .accordion-item .accordion-collapse .accordion-body' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style3_answer_typography',
                    'selector' => '{{WRAPPER}} .why_choose_us_content .accordion .accordion-item .accordion-collapse .accordion-body',
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
               <div class="faq-area">
                <div class="creative-agency-faq-accordion accordion" id="creativeAgencyFaqAccordion" data-cues="slideInUp">
                    <?php foreach ($settings['faq_items'] as $index => $item):
                                        $collapsed     = ($index === 0 && $settings['first_item_open'] === 'yes') ? '' : ($item['faq_default_open'] === 'yes' ? '' : 'collapsed');
                                        $show          = ($index === 0 && $settings['first_item_open'] === 'yes') ? 'show' : ($item['faq_default_open'] === 'yes' ? 'show' : '');
                                        $aria_expanded = ($index === 0 && $settings['first_item_open'] === 'yes') ? 'true' : ($item['faq_default_open'] === 'yes' ? 'true' : 'false');
                                    ?>
			                    <div class="accordion-item">
			                        <button class="accordion-button			                                                       		                                                       	                                                        <?php echo esc_attr($collapsed); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo esc_attr($index); ?>" aria-expanded="<?php echo esc_attr($aria_expanded); ?>" aria-controls="collapse<?php echo esc_attr($index); ?>">
			                            <?php echo esc_html($item['faq_question']); ?>
			                            <i class="ri-add-line"></i>
			                        </button>
			                        <div id="collapse<?php echo esc_attr($index); ?>" class="accordion-collapse collapse<?php echo esc_attr($show); ?>" data-bs-parent="#creativeAgencyFaqAccordion">
			                            <div class="accordion-body">
			                                <?php echo wp_kses_post($item['faq_answer']); ?>
			                            </div>
			                        </div>
			                    </div>
			                    <?php endforeach; ?>
                </div>
        </div>



        <?php
            } elseif ($settings['style_selection'] === 'style2') {
                    ?>
            <!-- style 2 -->
          <div class="faq-area">
             <div class="container">
        <div class="digital-agency-faq-accordion accordion" id="digitalAgencyFaqAccordion" data-cues="slideInUp">
            <?php foreach ($settings['style2_faq_items'] as $index => $item):
                                $number        = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                                $collapsed     = ($index === 0) ? '' : 'collapsed';
                                $show          = ($index === 0) ? 'show' : '';
                                $aria_expanded = ($index === 0) ? 'true' : 'false';
                            ?>
			            <div class="accordion-item">
			                <button class="accordion-button			                                               		                                               	                                                <?php echo esc_attr($collapsed); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo esc_attr($index); ?>"
			                    aria-expanded="<?php echo esc_attr($aria_expanded); ?>" aria-controls="collapse<?php echo esc_attr($index); ?>">
			                    <?php echo esc_html($item['style2_faq_question']); ?>
			                    <span class="number d-inline-block rounded-circle text-center">
			                        <?php echo esc_html($number); ?>
			                    </span>
			                </button>
			                <div id="collapse<?php echo esc_attr($index); ?>" class="accordion-collapse collapse<?php echo esc_attr($show); ?>"
			                    data-bs-parent="#digitalAgencyFaqAccordion">
			                    <div class="accordion-body">
			                        <?php echo wp_kses_post($item['style2_faq_answer']); ?>
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
                <div class="why_choose_us_area">
                <div class="container">
                    <div class="row align-items-center">
                            <div class="why_choose_us_content">
                                <div class="accordion" id="whyChooseUsAccordion" data-cues="slideInUp" data-group="why_choose_us_content">
                                    <?php foreach ($settings['style3_faq_items'] as $index => $item):
                                                        $number        = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                                                        $collapsed     = ($index === 0) ? '' : 'collapsed';
                                                        $show          = ($index === 0) ? 'show' : '';
                                                        $aria_expanded = ($index === 0) ? 'true' : 'false';
                                                    ?>
			                                    <div class="accordion-item rounded-0 bg-transparent">
			                                        <button class="accordion-button d-block text-start p-0 fw-semibold bg-transparent shadow-none			                                                                                                                                     		                                                                                                                                     	                                                                                                                                      <?php echo esc_attr($collapsed); ?>"
			                                            type="button"
			                                            data-bs-toggle="collapse"
			                                            data-bs-target="#wCUCollapse<?php echo esc_attr($index); ?>"
			                                            aria-expanded="<?php echo esc_attr($aria_expanded); ?>"
			                                            aria-controls="wCUCollapse<?php echo esc_attr($index); ?>">
			                                            <span><?php echo esc_html($number); ?></span><?php echo esc_html($item['style3_faq_question']); ?>
			                                        </button>
			                                        <div id="wCUCollapse<?php echo esc_attr($index); ?>"
			                                            class="accordion-collapse collapse			                                                                              		                                                                              	                                                                               <?php echo esc_attr($show); ?>"
			                                            data-bs-parent="#whyChooseUsAccordion">
			                                            <div class="accordion-body pb-0">
			                                                <?php echo wp_kses_post($item['style3_faq_answer']); ?>
			                                            </div>
			                                        </div>
			                                    </div>
			                                    <?php endforeach; ?>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

    <?php
        }
            }
        }

    $widgets_manager->register(new axero_faq_according());