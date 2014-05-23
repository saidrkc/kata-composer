<?php

namespace EquipoA\Weather;

use EquipoA\WeatherService\Weather;

class WeatherTest extends \PHPUnit_Framework_TestCase
{


	public function testconnect()
	{
		$weather = new  Weather(48907);
		print_r($weather->connect());
	}



}