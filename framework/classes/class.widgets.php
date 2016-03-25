<?php

/**
 * Widget Loader - Includes all the framework files.
 */

class themep_widgets
{

	private $files;

	function themep_widgets()
	{
		
		global $themep_widgets;
		
		$this->files = $themep_widgets;
				
		foreach ($this->files as $file)
		{
			
			require_once ( get_template_directory() . "/widgets/$file.php" );
			
		}
		
	}
	
}	

$load_widgets = new themep_widgets();

?>