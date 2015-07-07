<?php

function _toFloat($value, $decimals = 2)
{
	return number_format( (float) $value, $decimals, ',', '.');
}

function _toInt($value)
{
	return number_format( (int) $value, 0, ',', '.');
}

function _toDate($value, $format = 'd.m.Y', $default = '-')
{
	if( empty($value) )
	{
		return $default;
	}
	$value = substr($value, 0, 10);
	return Carbon\Carbon::createFromFormat('Y-m-d', $value)->format($format);
}

function _toDateTime($value, $format = 'd.m.Y H:i:s', $default = '-')
{
	if( empty($value) )
	{
		return $default;
	}
	$value = substr($value, 0, 19);
	return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value)->format($format);
}

function _toFileSize($size, $precision = 2)
{
	if($size == 0){
		return _toFloat(0);
	}
    $base     = log($size, 1024);
    $suffixes = array('', 'K', 'M', 'G', 'T');   
    return _toFloat(round(pow(1024, $base - floor($base)), $precision)) . ' ' . $suffixes[floor($base)];
}