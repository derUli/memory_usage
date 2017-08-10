<?php
class MemoryUsage extends Controller {
	private $moduleName = "memory_usage";
	private function getBytes($val) {
		$val = trim ( $val );
		$last = strtolower ( $val [strlen ( $val ) - 1] );
		switch ($last) {
			// The 'G' modifier is available since PHP 5.1.0
			case 'g' :
				$val *= 1024;
			case 'm' :
				$val *= 1024;
			case 'k' :
				$val *= 1024;
		}
		
		return $val;
	}
	private function getMemoryUsage() {
		return memory_get_usage ( false );
	}
	private function getMemoryLimit() {
		return $this->getBytes ( ini_get ( 'memory_limit' ) );
	}
	private function getMemoryUsagePercent() {
		return round ( ($this->getMemoryUsage () / $this->getMemoryLimit ()) * 100 );
	}
	public function accordionLayout() {
		$memory_used = round ( $this->getMemoryUsage () / 1024 / 1024 ) . " MB";
		ViewBag::set ( "memory_used", $memory_used );
		$memory_limit = round ( $this->getMemoryLimit () / 1024 / 1024 ) . " MB";
		ViewBag::set ( "memory_limit", $memory_limit ) . " MB";
		$percent = $this->getMemoryUsagePercent ();
		ViewBag::set ( "percent", $percent ) . " MB";
		$percent_color = "background-color:green; color: white";
		
		if ($percent > 80) {
			$percent_color = "background-color:yellow; color: black";
		} else if ($percent > 95) {
			$percent_color = "background-color:red; color: white";
		}
		ViewBag::set ( "percent_color", $percent_color );
		
		echo Template::executeModuleTemplate ( $this->moduleName, "dashboard.php" );
	}
}