<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\Filesystem\Folder;
// use Cake\View\StringTemplateTrait;

class RoomHelper extends Helper
{	
	public $subDir = '/view';

	public function getTemplatesList($dir) {

        $basicDir = $dir . $this->subDir;
        $dir = new Folder($basicDir);
        $templatesList = array_map( function ($dirAddr) use ( $basicDir ) {
                return str_replace($basicDir . '/', '', $dirAddr);
            }, 
            $dir->findRecursive('.*\.html')
        );

       	return array_combine($templatesList, $templatesList);
	}

	public function loadTemplate($templateAddr, $commonDir) {
		// compact
		$dir = $commonDir . $this->subDir;

		$testVar = 5555;
		ob_start();
		include $dir . '/' . $templateAddr;
		$content=ob_get_contents();
		ob_end_clean();

		return $content;
	}

	public function parseEventTickets() {
		include_once $_SERVER['DOCUMENT_ROOT'] . '/lib/simple_html_dom.php';
	}
}

?>
