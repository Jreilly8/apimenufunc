<?php
/*
Example:
mainMenu('http://rest.infoalamedacounty.org/index.php/api/reentry/servicegroup/', 'categoryID', 'index.php');
$api = URL to XML API.
$xmlTag = name of xml tag you want to use.
$home = PHP file you want to use as home, and pass $_Get variables too.
*/

function mainMenu($api, $xmlTag, $home ){

	if( ! $xml = simplexml_load_file($api) ) { 
		
		echo 'SORRY APPLICATION IS DOWN- RETURN LATER. :-(';
	
	} else { 
		$homePage = $home;
		$currentPage = $_SERVER['REQUEST_URI'];
		if($homePage == $currentPage){
		echo '<nav><b><a href="'.$homePage.'">'.'Home '.'</a></b>';
		} else {
			echo '<nav><b><a href="'.$homePage.'">'.'Home '.'</a></b>';
		}		
		foreach($xml as $item)
		{  	
			if (isset($_GET['cat']) && $_GET['cat'] == $item->$xmlTag){
				echo '<b><a href="'.$homePage.'?cat='.$item->$xmlTag.'"> '.$item->$xmlTag.' </a></b>';
				}else{
					echo '<a href="'.$homePage.'?cat='.$item->$xmlTag.'"> '.$item->$xmlTag.' </a>';
				}			
		}
	echo '</nav>';
	}
}

?>
