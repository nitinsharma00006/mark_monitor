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

function setFlashData($CI , $name , $msg , $type = 'success')
{
	$data = "toastr.$type('$msg !', '". ucfirst($type) ."',{closeButton: true,timeOut:6000,showMethod:'slideDown' , hideMethod:'slideUp'});";
	$CI->session->setFlashdata($name , $data);
}
function getFlashData($CI , $name)
{
	$CI->session = \Config\Services::session();
	$data = $CI->session->getFlashdata($name);
	return $data;
}
function userLoggedIn($CI , $redirect = '')
{
	if ($CI->session->get('id')) {
		if( !empty($redirect) ) redirect($redirect);
		return true;
	} else {
		return false;
	}
}

?>