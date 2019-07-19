<?php

/* Metaboxes para el home */ 


add_action( 'cmb2_admin_init', 'lanp_campos_home' );
/**
 * Hook in and add a metabox that only appears on the 'home' page
 */
function lanp_campos_home() {
    $prefix = 'lanp_home';

    $id_home = get_option('page_on_front');
	/**
	 * Metabox to be displayed on a single page ID
	 */
	$lanp_campos_home = new_cmb2_box( array(
		'id'           => 'lap_home',
		'title'        => esc_html__( 'Home Page Metabox', 'cmb2' ),
		'object_types' => array( 'page' ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		'show_on'      => array(
			'id' => array( $id_home),
		), // Specific post IDs to display this metabox
	) );

	$lanp_campos_home->add_field( array(
		'name'    => esc_html__( 'Texto Superior 1', 'cmb2' ),
		'desc'    => esc_html__( 'Parrafo para el texto 1', 'cmb2' ),
		'id'      => 'texto_superior_1',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
    ) ); 
    
    $lanp_campos_home->add_field( array(
		'name' => esc_html__( 'Imagen Hero 1 ', 'cmb2' ),
		'desc' => esc_html__( 'Primera imagen del texto superior 1 ', 'cmb2' ),
		'id'   => 'imagen_superior_1',
		'type' => 'file',
	) );

    $lanp_campos_home->add_field( array(
		'name'    => esc_html__( 'Texto Superior 2', 'cmb2' ),
		'desc'    => esc_html__( 'Parrafo para el texto 2', 'cmb2' ),
		'id'      => 'texto_superior_2',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
    ) ); 

    $lanp_campos_home->add_field( array(
		'name' => esc_html__( 'Imagen Hero 2 ', 'cmb2' ),
		'desc' => esc_html__( 'Segunda imagen del texto superior 2 ', 'cmb2' ),
		'id'   => 'imagen_superior_2',
		'type' => 'file',
	) );
    

}


?>