<?php
// Verdeel de gebruikers over je subdomeinen/IP adressen
class Domain {
	public $domain = array('domein1','domein2','domein3');
	public $current = 0;

	public function getDomain(){
		if($this->current >= count($this->domain)) $this->current = 0;
		$tld = $this->domain[$this->current];
		$this->current++;
		return $tld;
	}
}