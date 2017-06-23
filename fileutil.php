<?php
function getTextBetweenTags($string, $tagname) {
	$pattern = "/<$tagname?.*>(.*)<\/$tagname>/";
	preg_match($pattern, $string, $matches);
	return $matches[1];
}
function getDirectoryPath($root){
	$iter = new RecursiveIteratorIterator(
		new RecursiveDirectoryIterator($root, RecursiveDirectoryIterator::SKIP_DOTS),
		RecursiveIteratorIterator::SELF_FIRST,
		RecursiveIteratorIterator::CATCH_GET_CHILD // Ignore "Permission denied"
	);
	$paths = array();	
	foreach ($iter as $path => $dir) {
		if ($dir->isDir()) {							
			$paths[] = $path;					
		}
	}
	return $paths;
}

function getDirNames($dirPath){	
	$dirName = array();
	foreach($dirPath as $dir){
		$names = explode("\\",$dir);
		$dirName[] = $names[sizeof($names)-1];
	}
	return $dirName;
}

function buildMenu($dirName){
	echo '<ul>';
	foreach($dirName as $name){
		echo '<li>'.$name.'</li>';
	}
	echo '</ul>';
}

?>