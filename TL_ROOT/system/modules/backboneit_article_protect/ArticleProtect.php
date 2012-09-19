<?php

class ArticleProtect extends Controller {
	
	public function hookGetArticle($objArticle) {
		if(BE_USER_LOGGED_IN) {
			return;
		}
		
		if($objArticle->guests) {
			$objArticle->published = $objArticle->protected || FE_USER_LOGGED_IN ? '' : '1';
			return;
		}
		
		if(!$objArticle->protected) {
			return;
		}
		
		if(!FE_USER_LOGGED_IN) {
			$objArticle->publish = '';
			return;
		}
		
		$arrGroups = deserialize($objRow->groups, true);
		$objArticle->published = array_intersect($arrGroups, $this->User->groups) ? '1' : '';
	}
	

	protected function __construct() {
		parent::__construct();
		$this->import('FrontendUser', 'User');
	}
	
	private static $objInstance;
	
	public static function getInstance() {
		if(!isset(self::$objInstance)) {
			self::$objInstance = new self();
		}
		return self::$objInstance;
	}

}
