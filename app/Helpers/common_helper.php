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
function cust_encode($string)
{
	$key = "ArmSvmX";
	$string = base64_encode($string);
	$string = str_replace('=', '', $string);
	$main_arr = str_split($string);
	$output = array();
	$count = 0;
	for( $i=0; $i<strlen($string); $i++) {
		$output[] = $main_arr[$i];
		if($i%2==1) {
			$output[] = substr($key, $count, 1);
			$count++;
		}
	}
	$string = implode('', $output);
	return $string;	
}
function cust_decode($string)
{
	$key = "ArmSvmX";
	$arr = str_split($string);
	$count = 0;
	for( $i=0; $i<strlen($string); $i++) {
		if( $count < strlen($key) ) {
			if($i%3==2) {
				unset($arr[$i]);
				$count++;
			}
		}
	}
	$string = implode('', $arr);
	$string = base64_decode($string);
	return $string;
}

?>