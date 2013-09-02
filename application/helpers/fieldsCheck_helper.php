<?php

function get_fields ($data, $default_value = '')
{
	while($data)
	{
		if(isset($data->gender)==FALSE)
			$gender = default_value;

		if(isset($data->fb_username)==FALSE)
			$fb_username = default_value;

		if(isset($data->about)==FALSE)
			$about = default_value;

}	

	if (is_array($data)) {
		// We have an array. Find the key.
        return isset($haystack[$needle]) ? $haystack[$needle] : $default_value;
    }
    
}