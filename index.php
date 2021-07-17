<?php

require_once "team.php"; //внутри реализовать class Team
require_once "group.php"; //внутри реализовать класс Group

$groupA = new Group("Group A");
$groupA
	->addTeam( (new Team("Team 1"))->setCountry("Belarus") )
	->addTeam( (new Team("Team 2"))->setCountry("Belarus") )
	->addTeam( (new Team("Team 3"))->setCountry("Russia") )
	->addTeam( (new Team("Team 4"))->setCountry("Russia") );

$groupB = new Group("Group B", $groupA);

$groupB
	->addTeam( new Team("Team 5") )
	->addTeam( new Team("Team 6") )
	->addTeam( new Team("Team 7") );

$groupA->generateCalendar();
echo '<hr>';
/*
ожидаемый результат выполнения $groupA->generateCalendar();
Примечание. Все пары уникальные.
Group A. Round 1
Team 1 (Belarus) - Team 4 (Russia)
Team 2 (Belarus) - Team 3 (Russia)
Group A. Round 2
Team 1 (Belarus) - Team 3 (Russia)
Team 4 (Russia) - Team 2 (Belarus)
Group A. Round 3
Team 1 (Belarus) - Team 2 (Belarus)
Team 3 (Russia) - Team 4 (Russia)
*/

$groupB->generateCalendar();

/*
ожидаемый результат выполнения $groupB->generateCalendar();
Примечание. Все пары уникальные. В каждом туре есть одна команда его пропускающая. Например, в первом туре это Team 1 (Belarus)
Group B. Round 1
Team 2 (Belarus) - Team 7
Team 3 (Russia) - Team 6
Team 4 (Russia) - Team 5
Group B. Round 2
Team 1 (Belarus) - Team 7
Team 2 (Belarus) - Team 5
Team 3 (Russia) - Team 4 (Russia)
Group B. Round 3
Team 1 (Belarus) - Team 6
Team 7 - Team 5
Team 2 (Belarus) - Team 3 (Russia)
Group B. Round 4
Team 1 (Belarus) - Team 5
Team 6 - Team 4 (Russia)
Team 7 - Team 3 (Russia)
Group B. Round 5
Team 1 (Belarus) - Team 4 (Russia)
Team 5 - Team 3 (Russia)
Team 6 - Team 2 (Belarus)
Group B. Round 6
Team 1 (Belarus) - Team 3 (Russia)
Team 4 (Russia) - Team 2 (Belarus)
Team 6 - Team 7
Group B. Round 7
Team 1 (Belarus) - Team 2 (Belarus)
Team 4 (Russia) - Team 7
Team 5 - Team 6
*/