<?php
	namespace fruithost\Module\SSL\Providers;
	
	use \fruithost\I18N;
	
	class LetsEncrypt implements Provider  {
		public $name		= null;
		public $description	= null;
		
		public function __construct() {
			$this->name			= sprintf('Let\'s Encrypt %s', I18N::get('Certificate'));
			$this->description	= I18N::get('Secure your site and improve SEO with a free certificate from Let\'s Encrypt: <ul><li>Displays the \'lock\' icon in browser address bars</li><li>Free automatic renewals</li><li>New non-profit certificate authority</li></ul>');
		}
		
		public function getName() : string {
			return $this->name;
		}
		
		public function getDescription() : string {
			return $this->description;
		}
		
		public function isFree() : bool {
			return true;
		}
		
		public function renewPeriod() : int | null {
			return 90;
		}
		
		public function renewUntil() : int | null {
			return 10;
		}
		
		public function getIcon() : string | null {
			return 'data:image/svg+xml;base64,PHN2ZyBjbGFzcz0ibS1yaWdodC0yIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMTcuNjQgMTI0LjQxIiB3aWR0aD0iNDAiIGhlaWdodD0iMTAwJSI+PHBhdGggZmlsbD0iIzAwNzNlYyIgZD0iTTg5LjcxLDY0LjM0SDg2LjI5di01YTI3LjQ3LDI3LjQ3LDAsMSwwLTU0Ljk1LDB2NUgyNy45NGE3LjIsNy4yLDAsMCwwLTcuMTksNy4xOXY0NS42OWE3LjIsNy4yLDAsMCwwLDcuMTksNy4xOUg4OS43MWE3LjIsNy4yLDAsMCwwLDcuMTktNy4xOVY3MS41MkE3LjIsNy4yLDAsMCwwLDg5LjcxLDY0LjM0Wm0tNTMuNTgtNWEyMi42OSwyMi42OSwwLDEsMSw0NS4zOCwwdjVoLTkuNnYtNWExMy4wOSwxMy4wOSwwLDAsMC0yNi4xOCwwdjVoLTkuNlptMzEsNUg1MC41MnYtNWE4LjMxLDguMzEsMCwwLDEsMTYuNjEsMFptMjUsNTIuODhhMi40MSwyLjQxLDAsMCwxLTIuNCwyLjQxSDI3Ljk0YTIuNDEsMi40MSwwLDAsMS0yLjQtMi40MVY3MS41M2EyLjQxLDIuNDEsMCwwLDEsMi40LTIuNEg4OS43MWEyLjQxLDIuNDEsMCwwLDEsMi40LDIuNFoiPjwvcGF0aD48cGF0aCBmaWxsPSIjMDA3M2VjIiBkPSJNNTguODIsODIuNDVBOC43NSw4Ljc1LDAsMCwwLDUzLjMsOTh2NC45NGE1LjUyLDUuNTIsMCwxLDAsMTEsMFY5OGE4Ljc1LDguNzUsMCwwLDAtNS41My0xNS41M1ptMiwxMi4yLTEuMjEuNjl2Ny41OWEuNzQuNzQsMCwxLDEtMS40OCwwVjk1LjM0bC0xLjIxLS42OWE0LDQsMCwxLDEsMy45LDBaIj48L3BhdGg+PHBhdGggZmlsbD0iIzAwNzNlYyIgZD0iTTIxLjY3LDYyLjMxSDYuNzdhNi43Nyw2Ljc3LDAsMSwxLDAtMTMuNTNIMjEuNjdhNi43Nyw2Ljc3LDAsMSwxLDAsMTMuNTNaTTYuNzcsNTMuNTZhMiwyLDAsMSwwLDAsNEgyMS42N2EyLDIsMCwxLDAsMC00WiI+PC9wYXRoPjxwYXRoIGZpbGw9IiMwMDczZWMiIGQ9Ik0zMi4xOCwzOC44NmE2Ljc5LDYuNzksMCwwLDEtNC4zLTEuNTRsLTExLjc5LTkuN2E2Ljc3LDYuNzcsMCwwLDEsOC42LTEwLjQ2bDExLjc5LDkuN2E2Ljc3LDYuNzcsMCwwLDEtNC4zLDEyWk0yMC4zOSwyMC40MmEyLDIsMCwwLDAtMS4yNiwzLjUybDExLjc5LDkuNjlhMiwyLDAsMCwwLDEuMjYuNDUsMiwyLDAsMCwwLDEuMjYtMy41MkwyMS42NSwyMC44N0EyLDIsMCwwLDAsMjAuMzksMjAuNDJaIj48L3BhdGg+PHBhdGggZmlsbD0iIzAwNzNlYyIgZD0iTTU4LjgyLDI4LjU2YTYuNzcsNi43NywwLDAsMS02Ljc3LTYuNzd2LTE1YTYuNzcsNi43NywwLDAsMSwxMy41NCwwdjE1QTYuNzgsNi43OCwwLDAsMSw1OC44MiwyOC41NlptMC0yMy43N2EyLDIsMCwwLDAtMiwydjE1YTIsMiwwLDAsMCw0LDB2LTE1QTIsMiwwLDAsMCw1OC44Miw0Ljc5WiI+PC9wYXRoPjxwYXRoIGZpbGw9IiMwMDczZWMiIGQ9Ik04NS40NywzOC44NmE2Ljc3LDYuNzcsMCwwLDEtNC4zLTEyTDkzLDE3LjE3YTYuNzcsNi43NywwLDAsMSw4LjYsMTAuNDZMODkuNzcsMzcuMzJBNi43Niw2Ljc2LDAsMCwxLDg1LjQ3LDM4Ljg2Wk05Ny4yNiwyMC40MmEyLDIsMCwwLDAtMS4yNi40NUw4NC4yMSwzMC41NmEyLDIsMCwwLDAsMS4yNiwzLjUyLDIsMiwwLDAsMCwxLjI1LS40NWwxMS44LTkuN2EyLDIsMCwwLDAsLjI3LTIuNzksMiwyLDAsMCwwLTEuMzQtLjcxWiI+PC9wYXRoPjxwYXRoIGZpbGw9IiMwMDczZWMiIGQ9Ik0xMTAuODcsNjIuMzFoLTE1YTYuNzcsNi43NywwLDAsMSwwLTEzLjUzaDE1YTYuNzcsNi43NywwLDEsMSwwLDEzLjUzWm0tMTUtOC43NWEyLDIsMCwwLDAsMCw0aDE1YTIsMiwwLDEsMCwwLTRaIj48L3BhdGg+PC9zdmc+';
		}
	}
?>