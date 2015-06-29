<?php

/**
 * Helper functions lists for Election API Website
 */

if ( ! function_exists('app_type'))
{
	function app_type($type)
	{
		switch ($type) {
			case 'android':
				return 'Android';
				break;

			case 'ios':
				return 'iOS';
				break;

			case 'web':
				return 'Web';
				break;
			
			default:
				# code...
				break;
		}
	}
}


if ( ! function_exists('endpoint_lists'))
{
	function endpoint_lists()
	{
		return ['Sample Endpoint', 'Test Endpoint', 'Another Endpoint'];
	}
}
