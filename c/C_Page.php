<?php//// Конттроллер страницы чтения.//require_once('m/model.php');class C_Page extends C_Base{	public function action_index(){		$this->title .= '::Чтение';		$text = text_get();		$this->content = $this->Template('v/v_index.php', array('text' => $text));		}	}