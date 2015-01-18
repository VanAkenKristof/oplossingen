<?php 
$artikels =	array(
	array(	'title'	=> 'Verassende Titel waar je op wil klikken',
		'body' 	=> 'Je hebt erop geklikt, nu ben je helemaal in de ban van dit artikel, wow so artikel much read',
		'tags' 	=> 'Verassend, Doge artikels, In de ban van',
		),
	array(	'title'	=> 'Anti-Joke',
		'body' 	=> 'Why did sarah fall off the swing? Because sarah has no arms. Knock knock, -who\'s there? Definitely not sarah',
		'tags' 	=> 'Sarah, No-Arms, Swings',
		),
	array(	'title'	=> 'Watch man doing 14 saltos in 1 jump',
		'body' 	=> 'Stop wasting your time on stupid crap and be productive for once. That paper isn\'t going to write itself',
		'tags' 	=> 'Get, A, Life',
		)
	);

if ( isset( $_GET[ 'artikel' ] ) )
{
	$artikel	=	$artikels[ $_GET[ 'artikel' ] ];
}


include 'view/header-partial.html';
include 'view/body-partial.html';
include 'view/footer-partial.html';

?>
