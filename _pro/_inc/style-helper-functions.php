<?php
$uploads = wp_upload_dir();
if(cc_mkdir($uploads['basedir'] . DIRECTORY_SEPARATOR .'custom-community')){
    define ( 'CC_MAIN_CSS_FILE_PATH',   $uploads['basedir'] . DIRECTORY_SEPARATOR .'custom-community'. DIRECTORY_SEPARATOR .'main.css' );
    define ( 'CC_CUSTOM_CSS_FILE_PATH', $uploads['basedir'] . DIRECTORY_SEPARATOR .'custom-community'. DIRECTORY_SEPARATOR .'custom.css' );
    define ( 'CC_BACKUP_CSS_FILE_PATH', $uploads['basedir'] . DIRECTORY_SEPARATOR .'custom-community'. DIRECTORY_SEPARATOR .'backup.css' );

    define ( 'CC_MAIN_CSS_FILE_URL',   $uploads['baseurl'] . '/custom-community/main.css' );
    define ( 'CC_CUSTOM_CSS_FILE_URL', $uploads['baseurl'] . '/custom-community/custom.css' );
}

/**
* This function creates static file
* @param string $content
* @param string $filename
* @param string $flag
*/
function create_static_css_file($content, $filepath, $mode = 'w+'){
    if($handle = fopen($filepath, $mode)){
		if(is_writable($filepath)){
			fwrite($handle, $content);
			fclose($handle);
			return true;
		}
		else{
			//TODO: error handler
			return false;
		}
    }else{
		//TODO: error handler (user notification)
		return false;
    }
}

/**
* This function removes static css files
* @param string or array of string values filename
*/
function cc_remove_static_css_files($filenames){
    if(is_array($filenames)){
		$names_arr = $filenames;
    }elseif(is_string($filenames)){
		$names_arr[] = $filenames;
    }else{
		return false;
    }
	
    foreach( $names_arr as $val ){
		if(file_exists($val)){
			unlink($val);
		}
    }
}

/**
* This function creates new directory
* @param string $dirpath
*/
function cc_mkdir($dirpath){
    if(!file_exists($dirpath)){
		if(mkdir($dirpath, 0777)){
			return true;
		}else{
			return false;
			//TODO: error handler (user notification)
		}
    }
    return true;
}

/**
* This function overwrites option by it's name
* @param string $new_value
* @param string $opt_name
* @param string $option_key
*/
function cc_overwrite_option($new_value, $opt_name, $inner_key = ''){
    if(!empty($inner_key)){
		$opt_val = get_option($opt_name);
		if(array_key_exists($inner_key, $opt_val)){
			$opt_val[$inner_key] = $new_value;
		}
	}else{
		$opt_val = $new_value;
	}

	if(update_option($opt_name, $opt_val)){
		return true;
    }else{
		return false;
    }
}
/**
* This function generates static css files
*/
function cc_create_static_css_files(){
	global $cap;

	if( isset($_REQUEST['page']) == 'theme_settings' && isset($_REQUEST['action']) == 'update' ){
		ob_start();
		get_css();
		$dynamic_styles = ob_get_contents();
		ob_end_clean();
		
		
		$custom_styles = '';
		if($cap->overwrite_css){
			$custom_styles = $cap->overwrite_css;
		}
		
		//create backup css file
		if( file_exists(CC_MAIN_CSS_FILE_PATH) ){
			if($old_main_css = file_get_contents(CC_MAIN_CSS_FILE_PATH)){
				create_static_css_file($old_main_css, CC_BACKUP_CSS_FILE_PATH);
				if(file_exists(CC_CUSTOM_CSS_FILE_PATH)){
					if($old_custom_css = file_get_contents(CC_CUSTOM_CSS_FILE_PATH)){
						create_static_css_file("\r\n".'/*custom styles*/'."\r\n".$old_custom_css, CC_BACKUP_CSS_FILE_PATH, 'a+');
					}
				}
			}
		}
		
		//create static css files
		if(create_static_css_file($dynamic_styles, CC_MAIN_CSS_FILE_PATH)){
			if(!empty($custom_styles)){
				create_static_css_file($custom_styles, CC_CUSTOM_CSS_FILE_PATH);
			}
		}
		else{
			return false;
		}
	}
	
	if( is_admin() && isset($_REQUEST['page']) == 'theme_settings' && file_exists(CC_CUSTOM_CSS_FILE_PATH) ){
		$custom_css = file_get_contents(CC_CUSTOM_CSS_FILE_PATH);
		cc_overwrite_option($custom_css, 'custom_community_theme_options', 'cap_overwrite_css');
	}
}

