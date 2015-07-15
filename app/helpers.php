<?php

/**
 * Helper functions lists for Election API Website.
 * 
 * @package Election API Website
 * @author Nyan Lynn Htut <naynlynnhtut@hexcores.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if ( ! function_exists('app_type'))
{	
	/**
	 * Get appication type's showable name based on key.
	 *
	 * @param  string $type
	 * @return string
	 */
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

			case 'window':
				return 'Window Mobile';
				break;
			
			default:
				return 'Other';
				break;
		}
	}
}


if ( ! function_exists('endpoint_lists'))
{
	/**
	 * Get endpoint lists from API Router.
	 *
	 * @return array
	 */
	function endpoint_lists()
	{
		try {
			
			return Cache::remember('endpoint_lists', 60, function() {
				$client = new GuzzleHttp\Client();

				$res = $client->get('http://api.maepaysoh.org/endpoints');

				return json_decode($res->getBody(), true);	
			});
			
		} catch (Exception $e) {
			return [];
		}
	}
}
