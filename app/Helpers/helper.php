<?php

/**
 * Get list of languages
 */

use App\Models\City;
use Carbon\Carbon;

if (!function_exists('getCountry')) {
	function getCountry($city_id)
	{
		$city = City::whereId($city_id)->select('country_id')->first();
		return $city->country_id;
	}
}

if (!function_exists('userType')) {
	function userType($type)
	{
		if($type == 'personal'){
			return '<div class="badge badge-light-success fw-bolder">'.__("Personal").'</div>';
		}elseif($type == 'company'){
			return '<div class="badge badge-light-info fw-bolder">'.__("Company").'</div>';
		}
	}
}



/**
 * Get list of languages
 */

if (!function_exists('getFullName')) {
	function getFullName($user)
	{
		if ($user == null) return '';
		return $user->first_name . ' ' . $user->last_name;
	}
}

/**
 * Upload
 */
if (!function_exists('upload')) {
	function upload($file, $path)
	{
		$baseDir = 'uploads/' . $path;

		$name = sha1(time() . $file->getClientOriginalName());
		$extension = $file->getClientOriginalExtension();
		$fileName = "{$name}.{$extension}";

		$file->move(public_path() . '/' . $baseDir, $fileName);

		return "{$baseDir}/{$fileName}";
	}
}
