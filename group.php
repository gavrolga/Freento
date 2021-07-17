<?php

class Group
{
	private $group_name;
	private $teams = array();
	
	public function __construct($name, Group $group = null)
	{
		$this->group_name = $name;
		if (isset($group)) {
			$this->teams = $group->getTeams();
		}
	}
	
	public function addTeam(Team $team)
	{
		$this->teams[] = $team;
		return $this;
	}
	
	public function getTeams()
	{
		return $this->teams;
	}
	
	public function generateCalendar()
	{
		$new_array = $this->teams;
		$first_elem = array_shift($new_array);
		if ((count($new_array) % 2) == 0) {
			$new_array[] = 0;
		}
		
		$offset = (int)(count($new_array) / 2);
		
		$round = 1;
		while ($round <= count($new_array)) {
			
			echo $this->group_name.'. Round '.$round.'<br>';
			
			if ($new_array[$offset] !== 0) {
				echo $first_elem->getFullName().' - '.$new_array[$offset]->getFullName().'<br>';
			}
			
			for ($i = 0; $i < $offset; $i++) {
				$team1 = $new_array[$i];
				$team2 = $new_array[count($new_array) - $i - 1];
				if ($team1 !== 0 AND $team2 !== 0) {
					echo $team1->getFullName().' - '.$team2->getFullName().'<br>';
				}
			}
			
			$tmp = array_pop($new_array);
			array_unshift($new_array, $tmp);
			$round++;
		}
	}
}