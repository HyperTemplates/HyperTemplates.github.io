<?php

Mayosis_Option::add_section( 'header_dark', array(
	'title'       => __( 'Dark/Light Mode', 'mayosis-core' ),
	'panel'       => 'header',
	//'description' => __( 'This is the section description', 'mayosis-core' ),
) );

 Mayosis_Option::add_field( 'mayo_config', array(
    'type'        => 'radio-buttonset',
	'settings'    => 'dark_mode_script_enable',
	'label'       => __( 'Dark Mode Script Enable', 'mayosis-core' ),
	'section'     => 'header_dark',
	'default'     => 'none',
	'description'     => 'enable sitewide darkmode script',
	'choices'     => array(
		'none'   => esc_attr__( 'None', 'mayosis-core' ),
		'yes' => esc_attr__( 'Enable', 'mayosis-core' ),
	),
));

Mayosis_Option::add_field( 'mayo_config', array(
'type'        => 'color',
'settings'     => 'dark_color_icon',
'label'       => __( 'Dark Icon Color', 'mayosis-core' ),
'description' => __( 'Change Dark Icon Color', 'mayosis-core' ),
'section'     => 'header_dark',
'priority'    => 10,
'default'     => '#ffffff', 
'output' => array(
	array(
		'element'  => '.mayosis-dark-switcher .d-block-dark',
		'property' => 'color',
	),
	),
'choices' => array(
       'alpha' => true,
        'palettes' => array(
            '#28375a',
            '#282837',
            '#5a00f0',
            '#ff6b6b',
            '#c44d58',
            '#ecca2e',
            '#bada55',
        ),
    ),
));

Mayosis_Option::add_field( 'mayo_config', array(
'type'        => 'color',
'settings'     => 'light_color_icon',
'label'       => __( 'Light Icon Color', 'mayosis-core' ),
'description' => __( 'Change light Icon Color', 'mayosis-core' ),
'section'     => 'header_dark',
'priority'    => 10,
'default'     => '#ffffff', 
'output' => array(
	array(
		'element'  => '.mayosis-dark-switcher .d-block-light',
		'property' => 'color',
	),
	),
'choices' => array(
       'alpha' => true,
        'palettes' => array(
            '#28375a',
            '#282837',
            '#5a00f0',
            '#ff6b6b',
            '#c44d58',
            '#ecca2e',
            '#bada55',
        ),
    ),
));

Mayosis_Option::add_field( '',
	array(
		'type'     => 'custom',
		'settings' => 'header-dark-title_options',
		'label'    => __( '', 'mayosis-core' ),
		'section'  => 'header_dark',
		'default'  => '<div class="options-title">Dark Site Colors</div>',
	)
);

Mayosis_Option::add_field( 'mayo_config', array(
'type'        => 'color',
'settings'     => 'site_bg_color_dark',
'label'       => __( 'Site Background Color', 'mayosis-core' ),
'description' => __( 'Change dark mode bg Color', 'mayosis-core' ),
'section'     => 'header_dark',
'priority'    => 10,
'default'     => '#222', 

'choices' => array(
       'alpha' => true,
        'palettes' => array(
            '#28375a',
            '#282837',
            '#5a00f0',
            '#ff6b6b',
            '#c44d58',
            '#ecca2e',
            '#bada55',
        ),
    ),
));

Mayosis_Option::add_field( 'mayo_config', array(
'type'        => 'color',
'settings'     => 'site_txt_color_dark',
'label'       => __( 'Site Text Color', 'mayosis-core' ),
'description' => __( 'Change dark mode text Color', 'mayosis-core' ),
'section'     => 'header_dark',
'priority'    => 10,
'default'     => '#fff', 

'choices' => array(
       'alpha' => true,
        'palettes' => array(
            '#28375a',
            '#282837',
            '#5a00f0',
            '#ff6b6b',
            '#c44d58',
            '#ecca2e',
            '#bada55',
        ),
    ),
));

Mayosis_Option::add_field( 'mayo_config', array(
'type'        => 'color',
'settings'     => 'header_bg_color_dark',
'label'       => __( 'Header Background Color', 'mayosis-core' ),
'description' => __( 'Change dark mode header bg Color', 'mayosis-core' ),
'section'     => 'header_dark',
'priority'    => 10,
'default'     => '#222', 

'choices' => array(
       'alpha' => true,
        'palettes' => array(
            '#28375a',
            '#282837',
            '#5a00f0',
            '#ff6b6b',
            '#c44d58',
            '#ecca2e',
            '#bada55',
        ),
    ),
));

Mayosis_Option::add_field( 'mayo_config', array(
'type'        => 'color',
'settings'     => 'header_txt_color_dark',
'label'       => __( 'Header Text Color', 'mayosis-core' ),
'description' => __( 'Change dark mode header text Color', 'mayosis-core' ),
'section'     => 'header_dark',
'priority'    => 10,
'default'     => '#fff', 

'choices' => array(
       'alpha' => true,
        'palettes' => array(
            '#28375a',
            '#282837',
            '#5a00f0',
            '#ff6b6b',
            '#c44d58',
            '#ecca2e',
            '#bada55',
        ),
    ),
));



Mayosis_Option::add_field( 'mayo_config', array(
'type'        => 'color',
'settings'     => 'dark_primary_color',
'label'       => __( 'Dark Primary Background', 'mayosis-core' ),
'description' => __( 'Change dark mode primary bg Color', 'mayosis-core' ),
'section'     => 'header_dark',
'priority'    => 10,
'default'     => '#222', 

'choices' => array(
       'alpha' => true,
        'palettes' => array(
            '#28375a',
            '#282837',
            '#5a00f0',
            '#ff6b6b',
            '#c44d58',
            '#ecca2e',
            '#bada55',
        ),
    ),
));

Mayosis_Option::add_field( 'mayo_config', array(
'type'        => 'color',
'settings'     => 'dark_primary_text_color',
'label'       => __( 'Dark Primary Text', 'mayosis-core' ),
'description' => __( 'Change dark mode primary bg Color', 'mayosis-core' ),
'section'     => 'header_dark',
'priority'    => 10,
'default'     => '#fff', 

'choices' => array(
       'alpha' => true,
        'palettes' => array(
            '#28375a',
            '#282837',
            '#5a00f0',
            '#ff6b6b',
            '#c44d58',
            '#ecca2e',
            '#bada55',
        ),
    ),
));


Mayosis_Option::add_field( 'mayo_config', array(
'type'        => 'color',
'settings'     => 'dark_alter_color',
'label'       => __( 'Dark Alter Background', 'mayosis-core' ),
'description' => __( 'Change dark mode primary bg Color', 'mayosis-core' ),
'section'     => 'header_dark',
'priority'    => 10,
'default'     => '#666', 

'choices' => array(
       'alpha' => true,
        'palettes' => array(
            '#28375a',
            '#282837',
            '#5a00f0',
            '#ff6b6b',
            '#c44d58',
            '#ecca2e',
            '#bada55',
        ),
    ),
));

Mayosis_Option::add_field( 'mayo_config', array(
'type'        => 'color',
'settings'     => 'dark_alter_text_color',
'label'       => __( 'Dark Alter Text', 'mayosis-core' ),
'description' => __( 'Change dark mode primary bg Color', 'mayosis-core' ),
'section'     => 'header_dark',
'priority'    => 10,
'default'     => '#fff', 

'choices' => array(
       'alpha' => true,
        'palettes' => array(
            '#28375a',
            '#282837',
            '#5a00f0',
            '#ff6b6b',
            '#c44d58',
            '#ecca2e',
            '#bada55',
        ),
    ),
));
Mayosis_Option::add_field( 'mayo_config', array(
'type'        => 'color',
'settings'     => 'dark_secondary_color',
'label'       => __( 'Dark Secondary Background', 'mayosis-core' ),
'description' => __( 'Change dark mode secondary bg Color', 'mayosis-core' ),
'section'     => 'header_dark',
'priority'    => 10,
'default'     => '#282C35', 

'choices' => array(
       'alpha' => true,
        'palettes' => array(
            '#28375a',
            '#282837',
            '#5a00f0',
            '#ff6b6b',
            '#c44d58',
            '#ecca2e',
            '#bada55',
        ),
    ),
));

Mayosis_Option::add_field( 'mayo_config', array(
'type'        => 'color',
'settings'     => 'dark_secondary_text_color',
'label'       => __( 'Dark Secondary Text', 'mayosis-core' ),
'description' => __( 'Change dark mode seccondary bg Color', 'mayosis-core' ),
'section'     => 'header_dark',
'priority'    => 10,
'default'     => '#fff', 

'choices' => array(
       'alpha' => true,
        'palettes' => array(
            '#28375a',
            '#282837',
            '#5a00f0',
            '#ff6b6b',
            '#c44d58',
            '#ecca2e',
            '#bada55',
        ),
    ),
));

Mayosis_Option::add_field( 'mayo_config', array(
'type'        => 'color',
'settings'     => 'dark_input_color',
'label'       => __( 'Dark Input Background', 'mayosis-core' ),
'description' => __( 'Change dark mode input bg Color', 'mayosis-core' ),
'section'     => 'header_dark',
'priority'    => 10,
'default'     => '#ccc', 

'choices' => array(
       'alpha' => true,
        'palettes' => array(
            '#28375a',
            '#282837',
            '#5a00f0',
            '#ff6b6b',
            '#c44d58',
            '#ecca2e',
            '#bada55',
        ),
    ),
));

Mayosis_Option::add_field( 'mayo_config', array(
'type'        => 'color',
'settings'     => 'dark_input_border_color',
'label'       => __( 'Dark Input Border', 'mayosis-core' ),
'description' => __( 'Change dark mode input border Color', 'mayosis-core' ),
'section'     => 'header_dark',
'priority'    => 10,
'default'     => '#ccc', 

'choices' => array(
       'alpha' => true,
        'palettes' => array(
            '#28375a',
            '#282837',
            '#5a00f0',
            '#ff6b6b',
            '#c44d58',
            '#ecca2e',
            '#bada55',
        ),
    ),
));

Mayosis_Option::add_field( 'mayo_config', array(
'type'        => 'color',
'settings'     => 'dark_input_text_color',
'label'       => __( 'Dark Input Text', 'mayosis-core' ),
'description' => __( 'Change dark mode input text Color', 'mayosis-core' ),
'section'     => 'header_dark',
'priority'    => 10,
'default'     => '#fff', 

'choices' => array(
       'alpha' => true,
        'palettes' => array(
            '#28375a',
            '#282837',
            '#5a00f0',
            '#ff6b6b',
            '#c44d58',
            '#ecca2e',
            '#bada55',
        ),
    ),
));


Mayosis_Option::add_field( 'mayo_config', array(
'type'        => 'color',
'settings'     => 'dark_footer_bg_color',
'label'       => __( 'Dark Footer Background Color', 'mayosis-core' ),
'description' => __( 'Change dark mode footer bg Color', 'mayosis-core' ),
'section'     => 'header_dark',
'priority'    => 10,
'default'     => '#000', 

'choices' => array(
       'alpha' => true,
        'palettes' => array(
            '#28375a',
            '#282837',
            '#5a00f0',
            '#ff6b6b',
            '#c44d58',
            '#ecca2e',
            '#bada55',
        ),
    ),
));

Mayosis_Option::add_field( 'mayo_config', array(
'type'        => 'color',
'settings'     => 'dark_footer_text_color',
'label'       => __( 'Dark Button Border Color', 'mayosis-core' ),
'description' => __( 'Change dark mode footer text Color', 'mayosis-core' ),
'section'     => 'header_dark',
'priority'    => 10,
'default'     => '#ff', 

'choices' => array(
       'alpha' => true,
        'palettes' => array(
            '#28375a',
            '#282837',
            '#5a00f0',
            '#ff6b6b',
            '#c44d58',
            '#ecca2e',
            '#bada55',
        ),
    ),
));






