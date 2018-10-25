<?php

/**
 * @class SBPortfolioPopup
 */
class SBPortfolioPopup extends FLBuilderModule {

	/**
	 * @method __construct
	 */
	public function __construct()	{
		parent::__construct(array(
			'name'          	=> __('SB Portfolio Popup', 'fl-builder'),
			'description'   	=> __('Utilise the built-in modal dialog box in Bootstrap to create a portfolio grid with hover and popups.', 'fl-builder'),
			'category'      	=> __('Advanced Modules', 'fl-builder'),
			'dir'           => SB_MODULES_DIR . 'sb-portfolio-popup/',
			'url'           => SB_MODULES_URL . 'sb-portfolio-popup/',
			'partial_refresh'	=> true
		));
		$this->add_css('font-awesome');
	}
}


/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('SBPortfolioPopup', array(
	'items'         => array(
		'title'         => __('Portfolio Items', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'portfolio_item'         => array(
						'type'          => 'form',
						'label'         => __('Item', 'fl-builder'),
						'form'          => 'sb_portfolio_popup_items_form', // ID from registered form below
						'preview_text'  => 'label', // Name of a field to use for the preview text
						'multiple'      => true
					)
				)
			)
		)
	),

	'style'        => array(
		'title'         => __('Style', 'fl-builder'),
		'sections'      => array(
			'grid'       => array(
				'title'         => 'Grid',
				'fields'        => array(
					'show_title' => array(
						'type'          => 'select',
						'label'         => __( 'Show Titles on Blocks?', 'fl-builder' ),
						'default'       => 'yes',
						'options'       => array(
							'yes'      => __( 'Yes', 'fl-builder' ),
							'no'      => __( 'No', 'fl-builder' )
						)
					),
					'blocks_per_row'  => array(
						'type'          => 'select',
						'label'         => __('Blocks per Row', 'fl-builder'),
						'default'       => '4',
						'options'       => array(
							'50%'		      => __( '2', 'fl-builder' ),
							'33.333333%'  => __( '3', 'fl-builder' ),
							'25%'         => __( '4', 'fl-builder' ),
							'20%'         => __( '5', 'fl-builder' ),
							'16.666666%'  => __( '6', 'fl-builder' )
						),
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.sbpp-grid-block',
							'property'      => 'flex-basis'
						)
					)
				)
			),
			'blocks'       => array(
				'title'         => 'Blocks',
				'fields'        => array(
					'padding' => array(
						'type'          => 'text',
						'label'         => __('Padding', 'fl-builder'),
						'default'       => '35',
						'description'   => 'px',
						'maxlength'     => '4',
						'size'          => '5'
					),
					'block_color' => array(
						'type'          => 'color',
						'label'         => __('Block Color', 'fl-builder'),
						'default'       => 'ffffff',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.sbpp-block-color',
							'property'      => 'color'
						)
					),
					'block_hover' => array(
						'type'          => 'color',
						'label'         => __('Block Hover', 'fl-builder'),
						'default'       => 'ffffff',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.sbpp-block-hover',
							'property'      => 'color'
						)
					),
					'show_block_text' => array(
						'type'          => 'select',
						'label'         => __( 'Show Block Text', 'fl-builder' ),
						'default'       => 'Yes',
						'options'       => array(
								'yes'      => __( 'Yes', 'fl-builder' ),
								'no'      => __( 'No', 'fl-builder' )
						)
					),
					'toggle'     => array(
						'no'      => array(),
		        'yes'      => array(
							'fields'   => array('block_text_color','block_text_hover_color')
		        )
		    	),
					'block_text_color' => array(
						'type'          => 'color',
						'label'         => __('Block Text Color', 'fl-builder'),
						'default'       => '000000',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.sbpp-block-text',
							'property'      => 'color'
						)
					),
					'block_text_hover_color' => array(
						'type'          => 'color',
						'label'         => __('Block Text Hover Color', 'fl-builder'),
						'default'       => 'ffffff',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.sbpp-block-text',
							'property'      => 'color'
						)
					)
				)
			)
		)
	)
));

/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('sb_portfolio_popup_items_form', array(
		'title' => __('Add Item', 'fl-builder'),
		'tabs'  => array(
			'port_item_settings'      => array(
				'title'         => __('Portfolio Item', 'fl-builder'),
				'sections'      => array(
					'meta'       => array(
						'title'         => 'Meta',
						'fields'        => array(
							'label'         => array(
								'type'          => 'text',
								'label'         => __('Title', 'fl-builder')
							),
							'subtitle'         => array(
								'type'          => 'text',
								'label'         => __('Sub Title', 'fl-builder')
							)
						)
					),
					'block_content'       => array(
						'title'         => 'Block Content',
						'fields'        => array(
							'photo' => array(
								'type'          => 'photo',
								'label'         => __('Block Photo', 'fl-builder'),
								'show_remove'	=> true
							)
						)
					),
					'popup_content'       => array(
						'title'         => __('Popup Content', 'fl-builder'),
						'fields'        => array(
							'popup_photo' => array(
								'type'          => 'photo',
								'label'         => __('Popup Photo', 'fl-builder'),
								'show_remove'	=> true
							),
							'content'       => array(
								'type'          => 'editor',
								'label'         => 'Full Description',
								'wpautop'		=> false
							),
							'url' => array(
								'type'          => 'link',
								'label'         => __('URL', 'fl-builder')
							),
							'url_title' => array(
								'type'          => 'text',
								'label'         => __('URL Title', 'fl-builder')
							)
						)
					)
				)
			)
		)
));
