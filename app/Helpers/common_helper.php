<?php
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

function setFlashData($name , $msg , $type = 'success')
{
	$data = "toastr.$type($msg !, ucfirst($type),{timeOut:6000,showMethod:'slideDown' , hideMethod:'slideUp'});";
	// $this->session->setFlashdata($name , $data);
}

?>