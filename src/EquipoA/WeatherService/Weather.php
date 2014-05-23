<?php


namespace EquipoA\WeatherService;

use Guzzle\Http\Client;


class Weather
{

	protected $url;
	protected $location;
	protected $xml;

	public function __construct($location)
	{

		$this->url = 'http://query.yahooapis.com/v1/public/yql?q=select%20item%20from%20weather.forecast%20where%20location%3D%22' . $location . '%22&format=json';

		$this->url = urldecode($this->url);
	}

	public function connect()
	{
		$client = new Client();
		$req = $client->get($this->url);

		$res = $req->send();

		return $res->json();

	}

	public function getTemperature()
	{

	}


	public function getPrecipitation()
	{

	}

	public function getHumidity()
	{

	}

}