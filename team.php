<?php

class Team
{
	private $team_name;
	private $team_country = null;
	
	public function __construct($name)
	{
		$this->team_name = $name;
	}
	
	public function setCountry($country)
	{
		$this->team_country = $country;
		return $this;
	}
	
	public function getName()
	{
		return $this->team_name;
	}
	
	public function getCountry()
	{
		return $this->team_country;
	}
	
	public function getFullName()
	{
		$result = $this->team_name;
		if (isset($this->team_country))
		{
			$result .= " (".$this->team_country.")";
		}
		return $result;
	}
}