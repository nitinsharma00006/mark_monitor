<?php

function load_view($view,$data = array())
{
    $page['title'] = (array_key_exists('title' , $data)) ? $data['title'] : APP_NAME;
    $page['includes'] = (array_key_exists('includes' , $data)) ? inclusions($data['includes']) : inclusions();
    echo view('templates/header' , $page);
    echo view($view , $data);
    echo view('templates/footer' , $page);
}
// include scripts and css
function inclusions( $values = array() ) {
	$options = array(
		'validate' => array(
							array(
								'type' => 'js',
								'value' => 'assets/validation/jquery.validate'
							),
							array(
								'type' => 'css',
								'value' => 'assets/validation/screen'
							),
						),
	);

    // header js which includes all of the pages 
	$output['header_js'] = array();

	foreach( $values as $value ) {
		$inputs = $options[$value];
		foreach( $inputs as $input ) {
			$output[$input['type']][] = $input['value'];
		}
	}
	return $output;
}

?>