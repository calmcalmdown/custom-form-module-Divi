<?php

class mrc_plan_form_Item extends ET_Builder_Module {

	public $additional_shortcode_slugs = array( 'acf_signup_custom_field' );

	function init() {
		$this->plural          = esc_html__( 'MRC Plan Form Fields', 'et_builder' );
		$this->name            = esc_html__( 'MRC Plan Form Field', 'et_builder' );
		$this->slug            = 'mrc_plan_form_field';
		$this->vb_support      = 'on';
		$this->type            = 'child';
		$this->child_title_var = 'field_id';
		$this->advanced_setting_title_text = esc_html__( 
			'New Field', 'et_builder' 
		);
		$this->settings_text = esc_html__( 'Field Settings', 'et_builder' );
		$this->main_css_element = '
			.mrc_plan_form_container 
			%%order_class%%.mrc_form_field
		';

		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content'      => esc_html__( 'Text', 'et_builder' ),
					'field_options'     => esc_html__( 'Field Options', 'et_builder' ),
					'conditional_logic' => esc_html__( 'Conditional Logic', 'et_builder' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'layout' => esc_html__( 'Layout', 'et_builder' ),
				),
			),
		);

		$this->advanced_fields = array(
			'borders'        => array(
				'default' => array(
					'css'          => array(
						'main'      => array(
							'border_radii'  => sprintf( '%1$s .input, %1$s .input[type="checkbox"] + label i, %1$s .input[type="radio"] + label i', $this->main_css_element ),
							'border_styles' => sprintf( '%1$s .input, %1$s .input[type="checkbox"] + label i, %1$s .input[type="radio"] + label i', $this->main_css_element ),
						),
						'important' => 'plugin_only',
					),
					'label_prefix' => esc_html__( 'Input', 'et_builder' ),
				),
			),
			'box_shadow'     => array(
				'default' => array(
					'css' => array(
						'main'      => implode( ', ', array(
							'%%order_class%% input',
							'%%order_class%% select',
							'%%order_class%% textarea',
							'%%order_class%% .mrc_form_field_options_list label > i',
						) ),
						'important' => true,
					),
				),
			),
			'background'     => array(
				'css' => array(
					'main' => '%%order_class%%',
				),
			),
			'margin_padding' => array(
				'css' => array(
					'padding'   => '%%order_class%%',
					'important' => array( 'custom_margin' ), // needed to overwrite last module margin-bottom styling
				),
			),
			'text'           => array(
				'css' => array(
					'text_orientation' => '%%order_class%% input, %%order_class%% textarea, %%order_class%% label',
				),
			),
			'text_shadow'    => array(
				// Don't add text-shadow fields since they already are via font-options
				'default' => false,
			),
			'filters'        => array(
				'css' => array(
					'main' => array(
						'%%order_class%% input',
						'%%order_class%% textarea',
						'%%order_class%% label',
					),
				),
			),
			'button'         => false,
			'form_field'    => array(
				'form_field' => array(
					'label'          => esc_html__( 'Field', 'et_builder' ),
					'css'            => array(
					'background_color' 								=> '%%order_class%%.mrc_form_field .input, %%order_class%%.mrc_form_field .input + label i',
						'main'                        	=> '%%order_class%%.mrc_form_field .input',
						'background_color_hover' 				=> '%%order_class%%.mrc_form_field .input:hover, %%order_class%%.mrc_form_field .input + label:hover i',
						'focus_background_color' 				=> '%%order_class%%.mrc_form_field .input:focus, %%order_class%%.mrc_form_field .input:focus + label i',
						'focus_background_color_hover' 	=> '%%order_class%%.mrc_form_field .input:focus:hover, %%order_class%%.mrc_form_field .input:focus + label:hover i',
						'form_text_color'              	=> '%%order_class%%.mrc_form_field .input, %%order_class%%.mrc_form_field .input[type="checkbox"] + label, %%order_class%%.mrc_form_field .input[type="radio"] + label, %%order_class%%.mrc_form_field .input[type="checkbox"]:checked + label i:before',
						'form_text_color_hover'        => '%%order_class%%.mrc_form_field .input:hover, %%order_class%%.mrc_form_field .input[type="checkbox"]:hover + label,
						%%order_class%%.mrc_form_field .input[type="radio"]:hover + label, %%order_class%%.mrc_form_field .input[type="checkbox"]:checked:hover + label i:before',
						'focus_text_color'             => '%%order_class%%.mrc_form_field .input:focus, %%order_class%%.mrc_form_field .input[type="checkbox"]:active + label,
						%%order_class%%.mrc_form_field .input[type="radio"]:active + label, %%order_class%%.mrc_form_field .input[type="checkbox"]:checked:active + label i:before',
						'focus_text_color_hover'       => '%%order_class%%.mrc_form_field .input:focus:hover, %%order_class%%.mrc_form_field .input[type="checkbox"]:active:hover + label,
						%%order_class%%.mrc_form_field .input[type="radio"]:active:hover + label, %%order_class%%.mrc_form_field .input[type="checkbox"]:checked:active:hover + label i:before',
					),
					'margin_padding' => array(
						'css'	=> array(
							'main' => '%%order_class%%  .mrc_form_field_radio',
						),
					),
					'box_shadow'     => false,
					'border_styles'  => false,
					'font_field'     => array(
						'css' => array(
							'main'      => implode( ',', array(
								'%%order_class%% .mrc_form_field .mrc_form_field_radio',
								"{$this->main_css_element} .input",
								"{$this->main_css_element} .input::placeholder",
								"{$this->main_css_element} .input::-webkit-input-placeholder",
								"{$this->main_css_element} .input::-moz-placeholder",
								"{$this->main_css_element} .input:-ms-input-placeholder",
								"{$this->main_css_element} .input[type=checkbox] + label",
								"{$this->main_css_element} .input[type=radio] + label",
							) ),
							'important' => 'plugin_only',
						),
					),
				),
			),
			'height'                => array(
				'css' => array(
					'main' => implode(', ', array(
						'%%order_class%% input[type=text]',
						'%%order_class%% input[type=email]',
						'%%order_class%% textarea',
						'%%order_class%%[data-type=checkbox]',
						'%%order_class%%[data-type=radio]',
						'%%order_class%%[data-type=select]',
						'%%order_class%%[data-type=select] select',
					)),
				)
			),
		);
		$this->custom_css_fields = array(
			'date_select' => array(
				'label'    => esc_html__( 'Date Dropdown Size', 'et_builder' ),
				'selector' => '.mrc_form_field select',
			),
			
		);
	}

	function get_fields() {
		$labels = array(
			'link_url'      => esc_html__( 'Link URL', 'et_builder' ),
			'link_text'     => esc_html__( 'Link Text', 'et_builder' ),
			'link_cancel'   => esc_html__( 'Discard Changes', 'et_builder' ),
			'link_save'     => esc_html__( 'Save Changes', 'et_builder' ),
			'link_settings' => esc_html__( 'Option Link', 'et_builder' ),
		);

		$fields = array(
			'field_id' => array(
				'label'            => esc_html__( 'Field ID', 'et_builder' ),
				'type'             => 'text',
				'description'      => esc_html__( 
					'Define the unique ID of this field.', 'et_builder' ),
				'toggle_slug'      => 'main_content',
				'default_on_front' => '',
				'option_category'  => 'basic_option',
			),
			'field_title' => array(
				'label'       => esc_html__( 'Title', 'et_builder' ),
				'type'        => 'text',
				'description' => esc_html__( 
					'Here you can define the content that will be placed within the current tab.', 'et_builder' ),
				'toggle_slug' => 'main_content',
				'default_on_front' => esc_html__( 'New Field', 'et_builder' ),
				'option_category'  => 'basic_option',
			),
			'field_type' => array(
				'label'       => esc_html__( 'Type', 'et_builder' ),
				'type'        => 'select',
				'default'     => 'input',
				'option_category' => 'basic_option',
				'options'         => array(
					'label'   	=> esc_html__( 'Label Field', 'et_builder' ),
					'input'    => esc_html__( 'Input Field', 'et_builder' ),
					'email'    => esc_html__( 'Email Field', 'et_builder' ),
					'text'     => esc_html__( 'Textarea', 'et_builder' ),
					'radio'    	=> esc_html__( 'Radio Buttons', 'et_builder' ),
					'select'   	=> esc_html__( 'Select Dropdown', 'et_builder' ),
					'datepicker'=> esc_html__( 'Date Field', 'et_builder' ),
					'gendersel'	=> esc_html__( 'Gender Select Field', 'et_builder' ),
				),
				'description' => esc_html__(
					'Choose the type of field', 'et_builder' ),
				'affects'     => array(
					'checkbox_options',
					'radio_options',
					'select_options',
					'min_length',
					'max_length',
					'allowed_symbols',
				),
				'toggle_slug' => 'field_options',
			),
			'checkbox_checked' => array(
				'label'           => esc_html__( 'Checked By Default', 'et_builder' ),
				'description'     => esc_html__( 'If enabled, the check mark will be automatically selected for the visitor. They can still deselected it.', 'et_builder' ),
				'type'            => 'hidden',
				'option_category' => 'layout',
				'default'         => 'off',
				'depends_show_if' => 'checkbox',
				'toggle_slug'     => 'field_options',
			),
			'checkbox_options' => array(
				'label'           => esc_html__( 'Options', 'et_builder' ),
				'type'            => 'sortable_list',
				'checkbox'        => true,
				'option_category' => 'basic_option',
				'depends_show_if' => 'checkbox',
				'toggle_slug'     => 'field_options',
				'right_actions'   => 'move|link|copy|delete',
				'labels'          => $labels,
			),
			'radio_options' => array(
				'label'           => esc_html__( 'Options', 'et_builder' ),
				'type'            => 'sortable_list',
				'radio'           => true,
				'option_category' => 'basic_option',
				'depends_show_if' => 'radio',
				'toggle_slug'     => 'field_options',
				'right_actions'   => 'move|link|copy|delete',
				'labels'          => $labels,
			),
			'select_options' => array(
				'label'           => esc_html__( 'Options', 'et_builder' ),
				'type'            => 'sortable_list',
				'option_category' => 'basic_option',
				'depends_show_if' => 'select',
				'toggle_slug'     => 'field_options',
			),
			'min_length'   => array(
				'label'          => esc_html__( 
					'Minimum Length', 'et_builder' ),
				'description'    => esc_html__( 
					'Leave at 0 to remove restriction', 'et_builder' ),
				'type'           => 'range',
				'default'        => '0',
				'unitless'       => true,
				'range_settings' => array(
					'min'  => '0',
					'max'  => '255',
					'step' => '1',
				),
				'option_category' => 'basic_option',
				'depends_show_if' => 'input',
				'toggle_slug'     => 'field_options',
			),
			'max_length'   => array(
				'label'          => esc_html__( 
					'Maximum Length', 'et_builder' ),
				'description'    => esc_html__( 
					'Leave at 0 to remove restriction', 'et_builder' ),
				'type'           => 'range',
				'default'        => '0',
				'unitless'       => true,
				'range_settings' => array(
					'min'  => '0',
					'max'  => '255',
					'step' => '1',
				),
				'option_category' => 'basic_option',
				'depends_show_if' => 'input',
				'toggle_slug'     => 'field_options',
			),
			'allowed_symbols' => array(
				'label'       => esc_html__( 'Allowed Symbols', 'et_builder' ),
				'type'        => 'select',
				'default'     => 'all',
				'options'     => array(
					'all'          => esc_html__( 'All', 'et_builder' ),
					'letters'      => esc_html__( 
						'Letters Only (A-Z)', 'et_builder' ),
					'numbers'      => esc_html__( 
						'Numbers Only (0-9)', 'et_builder' ),
					'alphanumeric' => esc_html__( 
						'Alphanumeric Only (A-Z, 0-9)', 'et_builder' ),
				),
				'option_category' => 'basic_option',
				'depends_show_if' => 'input',
				'toggle_slug'     => 'field_options',
			),
			'required_mark' => array(
				'label'           => esc_html__( 
					'Required Field', 'et_builder' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'default'         => 'on',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'et_builder' ),
					'off' => esc_html__( 'No', 'et_builder' ),
				),
				'description'     => esc_html__( 
					'Define whether the field should be required or optional',
					'et_builder' ),
				'toggle_slug'     => 'field_options',
			),
			'full_width' => array(
				'label'           => esc_html__( 'Full Width', 'et_builder' ),
				'type'            => 'yes_no_button',
				'option_category' => 'layout',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'et_builder' ),
					'off' => esc_html__( 'No', 'et_builder' ),
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'layout',
				'description'     => esc_html__( 
					'If enabled, the field will be full width.', 'et_builder' ),
				'default_on_front' => 'off',
			),
			'conditional_logic' => array(
				'label'           => esc_html__( 'Enable', 'et_builder' ),
				'type'            => 'yes_no_button',
				'option_category' => 'layout',
				'default'         => 'off',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'et_builder' ),
					'off' => esc_html__( 'No', 'et_builder' ),
				),
				'affects'         => array(
					'conditional_logic_rules',
					'conditional_logic_relation',
				),
				'description' => et_get_safe_localization( __( "Enabling conditional logic makes this field only visible when any or all of the rules below are fulfilled<br><strong>Note:</strong> Only fields with an unique and non-empty field ID can be used", 'et_builder' ) ),
				'toggle_slug' => 'conditional_logic',
			),
			'conditional_logic_relation' => array(
				'label'             => esc_html__( 'Relation', 'et_builder' ),
				'type'              => 'yes_no_button',
				'option_category'   => 'layout',
				'options'           => array(
					'on'  => esc_html__( 'All', 'et_builder' ),
					'off' => esc_html__( 'Any', 'et_builder' ),
				),
				'default'           => 'off',
				'button_options'    => array(
					'button_type' => 'equal',
				),
				'depends_show_if' => 'on',
				'description' => esc_html__( 
					'Choose whether any or all of the rules should be fulfilled', 'et_builder' ),
				'toggle_slug' => 'conditional_logic',
			),
			'conditional_logic_rules' => array(
				'label'           => esc_html__( 'Rules', 'et_builder' ),
				'type'            => 'conditional_logic',
				'option_category' => 'layout',
				'depends_show_if' => 'on',
				'toggle_slug'     => 'conditional_logic',
			),
		);

		return $fields;
	}

	public function get_transition_fields_css_props() {
		$fields = parent::get_transition_fields_css_props();

		$fields['form_field_background_color'] = array(
			'background' => implode( ', ', array(
				'%%order_class%%.mrc_form_field .input',
				'%%order_class%%.mrc_form_field .input + label:hover i'
			) )
		);

		return $fields;
	}

	function render( $attrs, $content = null, $render_slug ) {
		global $mrc_plan_form_num, $et_pb_half_width_counter;

		et_core_nonce_verified_previously();

		$multi_view                 = et_pb_multi_view_options( $this );
		$field_title                = $this->props['field_title'];
		$field_type                 = $this->props['field_type'];
		$field_id                   = $this->props['field_id'];
		$required_mark              = $this->props['required_mark'];
		$full_width									= $this->props['full_width'];
		$form_field_text_color      = $this->props['form_field_text_color'];
		$checkbox_checked           = $this->props['checkbox_checked'];
		$checkbox_options           = $this->props['checkbox_options'];
		$radio_options              = $this->props['radio_options'];
		$select_options             = $this->props['select_options'];
		$min_length                 = $this->props['min_length'];
		$max_length                 = $this->props['max_length'];
		$conditional_logic          = $this->props['conditional_logic'];
		$conditional_logic_relation = $this->props['conditional_logic_relation'];
		$conditional_logic_rules    = $this->props['conditional_logic_rules'];
		$allowed_symbols            = $this->props['allowed_symbols'];
		$render_count               = $this->render_count();
		$current_module_num         = null === $mrc_plan_form_num ? 0 : intval( $mrc_plan_form_num ) + 1;

		$field_text_color_hover        = $this->get_hover_value( 'form_field_text_color' );
		$field_text_color_values       = et_pb_responsive_options()->get_property_values( $this->props, 'form_field_text_color' );
		$field_focus_text_color_hover  = $this->get_hover_value( 'form_field_focus_text_color' );
		$field_focus_text_color_values = et_pb_responsive_options()->get_property_values( $this->props, 'form_field_focus_text_color' );

		wp_enqueue_style( 
			'mrc-plan-form', 
			plugins_url('/mrccta_v3/includes/modules/style.css') 
		);

		// set a field ID.
		if ( '' === $field_id ) {
			$field_id = sprintf( 'field_%d_%d', $mrc_plan_form_num, $render_count );
		}

		if ( 'acf_signup_custom_field' === $render_slug ) {
			$this->add_classname( 'acf_newsletter_field' );
		} else {
			$field_id = strtolower( $field_id );
		}

		$video_background          = $this->video_background();
		$parallax_image_background = $this->get_parallax_image_background();

		$et_pb_half_width_counter = ! isset( $et_pb_half_width_counter ) ? 0 : $et_pb_half_width_counter;

		// count fields to add the et_pb_contact_field_last properly
		if ( 'off' === $$full_width ) {
			$et_pb_half_width_counter++;
		} else {
			$et_pb_half_width_counter = 0;
		}

		$input_field = '';

		// Form Field Text Color - Radio Checked.
		$field_text_color_important = et_builder_has_limitation( 'force_use_global_important' ) ? ' !important' : '';
		et_pb_responsive_options()->generate_responsive_css( $field_text_color_values, '%%order_class%%.mrc_form_field .input[type="radio"]:checked + label i:before', 'background-color', $render_slug, $field_text_color_important, 'color' );


		if ( et_builder_is_hover_enabled( 'form_field_focus_text_color', $this->props ) ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%%.mrc_form_field .input[type="radio"]:checked:active:hover + label i:before',
				'declaration' => sprintf(
					'background-color: %1$s%2$s;',
					esc_html( $field_focus_text_color_hover ),
					$field_text_color_important
				),
			) );
		}

		$pattern         = '';
		$title           = '';
		$min_length      = intval( $min_length );
		$max_length      = intval( $max_length );
		$max_length_attr = '';
		$symbols_pattern = '.';
		$length_pattern  = '*';

		if ( in_array( $allowed_symbols, array( 'letters', 'numbers', 'alphanumeric' ) ) ) {
			switch ( $allowed_symbols ) {
				case 'letters':
					$symbols_pattern = '[A-Z|a-z|\s-]';
					$title           = __( 'Only letters allowed.', 'et_builder' );
					break;
				case 'numbers':
					$symbols_pattern = '[0-9\s-]';
					$title           = __( 'Only numbers allowed.', 'et_builder' );
					break;
				case 'alphanumeric':
					$symbols_pattern = '[\w\s-]';
					$title           = __( 'Only letters and numbers allowed.', 'et_builder' );
					break;
			}
		}

		if ( 0 !== $min_length && 0 !== $max_length ) {
			$max_length = max( $min_length, $max_length );
			$min_length = min( $min_length, $max_length );

			if ( $max_length > 0 ) {
				$max_length_attr = sprintf(
					' maxlength="%1$d"',
					$max_length
				);
			}
		}

		if ( 0 !== $min_length || 0 !== $max_length ) {
			$length_pattern = '{';

			if ( 0 !== $min_length ) {
				$length_pattern .= $min_length;
				$title   .= sprintf( __( 'Minimum length: %1$d characters. ', 'et_builder' ), $min_length );
			}

			if ( 0 === $max_length ) {
				$length_pattern .= ',';
			}

			if ( 0 === $min_length ) {
				$length_pattern .= '0';
			}

			if ( 0 !== $max_length ) {
				$length_pattern .= ",{$max_length}";
				$title   .= sprintf( __( 'Maximum length: %1$d characters.', 'et_builder' ), $max_length );
			}

			$length_pattern .= '}';
		}

		if ( '.' !== $symbols_pattern || '*' !== $length_pattern ) {
			$pattern = sprintf(
				' pattern="%1$s%2$s"',
				esc_attr( $symbols_pattern ),
				esc_attr( $length_pattern )
			);
		}

		if ( '' !== $title ) {
			$title = sprintf(
				' title="%1$s"',
				esc_attr( $title )
			);
		}

		$conditional_logic_attr = '';

		if ( 'on' === $conditional_logic && ! empty( $conditional_logic_rules ) ) {
			$option_search           = array( '&#91;', '&#93;' );
			$option_replace          = array( '[', ']' );
			$conditional_logic_rules = str_replace( $option_search, $option_replace, $conditional_logic_rules );
			$condition_rows          = json_decode( $conditional_logic_rules );
			$ruleset                 = array();

			foreach ( $condition_rows as $condition_row ) {
				$condition_value = isset( $condition_row->value ) ? $condition_row->value : '';
				$condition_value = trim( $condition_value );

				$ruleset[] = array(
					$condition_row->field,
					$condition_row->condition,
					$condition_value,
				);
			}

			if ( ! empty( $ruleset ) ) {
				$json     = json_encode( $ruleset );
				$relation = $conditional_logic_relation === 'off' ? 'any' : 'all';

				$conditional_logic_attr = sprintf(
					' data-conditional-logic="%1$s" data-conditional-relation="%2$s"',
					esc_attr( $json ),
					$relation
				);
			}
		}

		switch( $field_type ) {
			case 'text':
			case 'textarea':
				$input_field = sprintf(
					'<textarea name="mrc_plan_%3$s_%2$s" id="mrc_plan_%3$s_%2$s" class="mrc_plan_message input" data-required_mark="%6$s" data-field_type="%4$s" data-original_id="%3$s" placeholder="%5$s"%7$s>%1$s</textarea>',
					( isset( $_POST['mrc_plan_' . $field_id . '_' . $current_module_num] ) ? esc_html( sanitize_text_field( $_POST['mrc_plan_' . $field_id . '_' . $current_module_num] ) ) : '' ),
					esc_attr( $current_module_num ),
					esc_attr( $field_id ),
					esc_attr( $field_type ),
					esc_attr( $field_title ),
					'off' === $required_mark ? 'not_required' : 'required',
					$multi_view->render_attrs( array(
						'attrs' => array(
							'placeholder' => '{{field_title}}',
						),
					) )
				);
				break;
			case 'input':
			case 'email' :
				if ( 'email' === $field_type ) {
					$pattern = '';
				}
				$input_field = sprintf(
					'<input type="text" id="mrc_plan_%3$s_%2$s" class="input" value="%1$s" name="mrc_plan_%3$s_%2$s" data-required_mark="%6$s" data-field_type="%4$s" data-original_id="%3$s" placeholder="%5$s"%7$s%8$s%9$s%10$s>',
					( isset( $_POST['mrc_plan_' . $field_id . '_' . $current_module_num] ) ? esc_attr( sanitize_text_field( $_POST['mrc_plan_' . $field_id . '_' . $current_module_num] ) ) : '' ),
					esc_attr( $current_module_num ),
					esc_attr( $field_id ),
					esc_attr( $field_type ),
					esc_attr( $field_title ),
					'off' === $required_mark ? 'not_required' : 'required',
					$pattern,
					$title,
					$max_length_attr,
					$multi_view->render_attrs( array(
						'attrs' => array(
							'placeholder' => '{{field_title}}',
						),
					) )
				);
				break;
			case 'datepicker':
				$input_field = sprintf(
					'<div>
						<input id="mrc_plan_%2$s_%1$s" type="date" max="2002-12-31" min="1919-01-01">
					</div>',
					esc_attr( $field_id ),
					esc_attr( $field_type )
				);
				break;
			case 'gendersel':
				$input_field = sprintf(
					'<div class="switch-field" id="mrc_plan_%2$s_%1$s">
						<input type="radio" id="radio-male" name="gender" value="male"/>
						<label for="radio-male" class="check-gender-v3">Male</label>
						<input type="radio" id="radio-female" name="gender" value="female" />
						<label for="radio-female" class="check-gender-v3">Female</label>
					</div>',
					esc_attr( $field_id ),
					esc_attr( $field_type )
				);
				break;
			case 'label':
				$input_field = sprintf(
					'<label 
						name="mrc_plan_%3$s_%2$s" 
						id="mrc_plan_%3$s_%2$s" 
						class="mrc_plan_message input" 
						data-required_mark="%6$s" 
						data-field_type="%4$s" 
						data-original_id="%3$s"
					>
						%5$s
					</label>',
					( isset( 
						$_POST[
							'mrc_plan_' . 
							$field_id . 
							'_' . 
							$current_module_num
						] ) 
						? esc_html( sanitize_text_field( 
							$_POST['mrc_plan_' . 
								$field_id . 
								'_' . 
								$current_module_num] ) ) 
						: ''
					),
					esc_attr( $current_module_num ),
					esc_attr( $field_id ),
					esc_attr( $field_type ),
					esc_attr( $field_title ),
					'off' === $required_mark ? 'not_required' : 'required'
				);
				break;
				case 'checkbox' :
					$input_field = '';
	
					if ( ! $checkbox_options ) {
						$is_checked       = ! empty( $checkbox_checked ) && 'on' === $checkbox_checked;
						$checkbox_options = sprintf(
							'[{"value":"%1$s","checked":%2$s}]',
							esc_attr( $field_title ),
							$is_checked ? 1 : 0
						);
						$field_title = '';
					}
	
					$option_search    = array( '&#91;', '&#93;' );
					$option_replace   = array( '[', ']' );
					$checkbox_options = str_replace( $option_search, $option_replace, $checkbox_options );
					$checkbox_options = json_decode( $checkbox_options );
	
					foreach ( $checkbox_options as $index => $option ) {
						$is_checked   = 1 === $option->checked ? true : false;
						$option_value = wp_strip_all_tags( $option->value );
						$drag_id      = isset( $option->dragID ) ? $option->dragID : '';
						$option_id    = isset( $option->id ) ? $option->id : $drag_id;
						$option_id    = sprintf( ' data-id="%1$s"', esc_attr( $option_id ) );
						$option_label = wp_strip_all_tags( $option->value );
						$option_link  = '';
	
						if ( ! empty( $option->link_url ) ) {
							$link_text   = isset( $option->link_text ) ? $option->link_text : '';
							$option_link = sprintf( ' <a href="%1$s" target="_blank">%2$s</a>', esc_url( $option->link_url ), esc_html( $link_text ) );
						}
	
						// The required field needs a value, use link information if the option value is empty
						if ( 'off' !== $required_mark && empty( $option_value ) && ! empty( $option_link ) ){
							$option_value = isset( $option->link_text ) && ! empty( $option->link_text ) ? esc_html( $option->link_text ) : esc_url( $option->link_url );
						}
	
						$input_field .= sprintf(
							'<span class="mrc_plan_checkbox">
								<input type="checkbox" id="mrc_plan_%1$s_%5$s_%3$s" class="input" value="%2$s"%4$s%6$s>
								<label for="mrc_plan_%1$s_%5$s_%3$s"><i></i>%7$s%8$s</label>
							</span>',
							esc_attr( $field_id ),
							esc_attr( $option_value ),
							esc_attr( $index ),
							$is_checked ? ' checked="checked"' : '',
							esc_attr( $render_count ), // #5
							$option_id,
							$option_label,
							$option_link // #8
						);
					}
	
					$input_field = sprintf(
						'<input class="et_pb_checkbox_handle" type="hidden" name="mrc_plan_%1$s_%4$s" data-required_mark="%3$s" data-field_type="%2$s" data-original_id="%1$s">
						<span class="mrc_plan_field_options_wrapper">
							<span class="mrc_plan_field_options_title"%7$s>%5$s</span>
							<span class="mrc_plan_field_options_list">%6$s</span>
						</span>',
						esc_attr( $field_id ),
						esc_attr( $field_type ),
						'off' === $required_mark ? 'not_required' : 'required',
						esc_attr( $current_module_num ),
						esc_html( $field_title ),
						$input_field,
						$multi_view->render_attrs( array(
							'content' => '{{field_title}}',
						) )
					);
	
					break;
			case 'radio' :
				$input_field = '';

				if ( $radio_options ) {
					$option_search  = array( '&#91;', '&#93;' );
					$option_replace = array( '[', ']' );
					$radio_options  = str_replace( $option_search, $option_replace, $radio_options );
					$radio_options  = json_decode( $radio_options );

					foreach ( $radio_options as $index => $option ) {
						$is_checked  = 1 === $option->checked ? true : false;
						$drag_id = isset( $option->dragID ) ? $option->dragID : '';
						$option_id = isset( $option->id ) ? $option->id : $drag_id;
						$option_id = sprintf( ' data-id="%1$s"', esc_attr( $option_id ) );
						$option_link = '';

						if ( ! empty( $option->link_url ) ) {
							$link_text = isset( $option->link_text ) ? $option->link_text : '';
							$option_link = sprintf( ' <a href="%1$s" target="_blank">%2$s</a>', esc_url( $option->link_url ), esc_html( $link_text ) );
						}

						$input_field .= sprintf(
							'<span class="mrc_form_field_radio">
								<input 
									type="radio" 
									id="mrc_plan_%3$s_%2$s_%10$s_%7$s" 
									class="input" 
									value="%8$s" 
									name="mrc_plan_%3$s_%2$s" 
									data-required_mark="%6$s" 
									data-field_type="%4$s" 
									data-original_id="%3$s" 
									%9$s%11$s
								>
								<label 
									for="mrc_plan_%3$s_%2$s_%10$s_%7$s" 
									class="check-gender"
								>
									%8$s%12$s
								</label>
							</span>',
							( isset( $_POST['mrc_plan_' . $field_id . '_' . $current_module_num] ) ? esc_attr( sanitize_text_field( $_POST['mrc_plan_' . $field_id . '_' . $current_module_num] ) ) : '' ),
							esc_attr( $current_module_num ),
							esc_attr( $field_id ),
							esc_attr( $field_type ),
							esc_attr( $field_title ), // #5
							'off' === $required_mark ? 'not_required' : 'required',
							esc_attr( $index ),
							wp_strip_all_tags( $option->value ),
							checked( $is_checked, true, false ),
							esc_attr( $render_count ), // #10
							$option_id,
							$option_link // #12
						);
					}
				} else {
					$input_field .= esc_html__( 'No options added.', 'et_builder' );
				}

				$input_field = sprintf(
					'<span class="mrc_form_field_options_wrapper">
						<span class="mrc_form_field_options_title"%3$s>%1$s</span>
						<span class="mrc_form_field_options_list">%2$s</span>
					</span>',
					esc_html( $field_title ),
					$input_field,
					$multi_view->render_attrs( array(
						'content' => '{{field_title}}',
					) )
				);

				break;
			case 'select' :
				$options = sprintf(
					'<option value=""%2$s>%1$s</option>',
					esc_attr( $field_title ),
					$multi_view->render_attrs( array(
						'content' => '{{field_title}}',
					) )
				);

				if ( $select_options ) {
					$option_search  = array( '&#91;', '&#93;' );
					$option_replace = array( '[', ']' );
					$select_options = str_replace( $option_search, $option_replace, $select_options );
					$select_options = json_decode( $select_options );

					foreach ( $select_options as $option ) {
						$option_id = isset( $option->id ) ? sprintf( ' data-id="%1$s"', esc_attr( $option->id ) ) : '';

						$options .= sprintf(
							'<option value="%1$s"%3$s>%2$s</option>',
							esc_attr( wp_strip_all_tags( $option->value ) ),
							wp_strip_all_tags( $option->value ),
							$option_id
						);
					}
				}

				$input_field = sprintf(
					'<select 
						id="mrc_plan_%3$s_%2$s" 
						class="mrc_plan_select input" 
						name="mrc_plan_%3$s_%2$s" 
						data-required_mark="%6$s" 
						data-field_type="%4$s" 
						data-original_id="%3$s"
					>
						%7$s
					</select>',
					( isset( $_POST['mrc_plan_' . $field_id . '_' . $current_module_num] ) ? esc_attr( sanitize_text_field( $_POST['mrc_plan_' . $field_id . '_' . $current_module_num] ) ) : '' ),
					esc_attr( $current_module_num ),
					esc_attr( $field_id ),
					esc_attr( $field_type ),
					esc_attr( $field_title ),
					'off' === $required_mark ? 'not_required' : 'required',
					$options
				);
				break;
		}

		// Module classnames
		$this->add_classname( array(
			$this->get_text_orientation_classname(),
		) );

		if ( 'off' === $full_width ) {
			$this->add_classname( 'mrc_form_field_not_full_width' );
		} else {
			$this->add_classname( 'mrc_form_field_full_width' );
		}

		if ( 0 === $et_pb_half_width_counter % 2 ) {
			$this->add_classname( 'mrc_plan_field_last' );
		}

		if ( 'on' === self::$_->array_get( $this->props, 'hidden' ) ) {
			$this->add_classname( 'mrc_plan_field--hidden' );
		}
		
		if ( 'label' === $field_type ) {
			$this->add_classname( 'mrc_form_field_label_mobile' );
		}
		// Remove automatically added classname
		$this->remove_classname( 'et_pb_module' );

		$output = sprintf(
			'<p id="mrc_health_saving_%3$s_p" class="%5$s error-message"%6$s data-id="%3$s" data-type="%7$s">
				%9$s
				%8$s
				<label for="mrc_plan_%3$s_%2$s" id="mrc_health_saving_%3$s_label" class="mrc_plan_form_label"%10$s>%1$s</label>
				%4$s
			</p>',
			esc_html( $field_title ),
			esc_attr( $current_module_num ),
			esc_attr( $field_id ),
			$input_field,
			$this->module_classname( $render_slug ),
			$conditional_logic_attr,
			$field_type,
			$video_background,
			$parallax_image_background,
			$multi_view->render_attrs( array(
				'content' => '{{field_title}}',
			) )
		);

		return $output;
	}
}

new mrc_plan_form_Item;
