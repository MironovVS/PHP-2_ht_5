<?php//// Конттроллер страницы чтения.//require_once('m/model.php');class C_Articles extends C_Base{	public function action_index(){		// Значение по умолчанию для кол-ва статей на одной странице		if($_SESSION['num'] == null) {			$_SESSION['num'] = 5;		}	// Проверка ГЕТ запроса, содержащего кол-во статей, которое должно отображаться на одной страние(по-умолчанию 5)		if(isset($_GET['num'])) {			// Сохранение в переменную			$num = (int)$_GET['num'];			// Проверка значения			if($num <= 10 && $num > 0) {				// Запись в сессию и редирект				$_SESSION['num'] = $num;				redirect('index.php');			}		}	// Подсчет кол-ва статей в БД		$count = articles_count();	// Переменная равная отношению кол-ва статей в БД к требуемому кол-ву статей на одной странице		$n = $count / $_SESSION['num'];	// Проверка ГЕТ запроса, содержащего номер страницы		if(isset($_GET['page'])) {			// Сохранение в переменную			$num_page = (int)$_GET['page'];			// Округление в большую сторону			$n1 = ceil($n);			// Проверка значения			if($num_page > $n1 || $num_page <= 1) {				redirect('index.php');			}		}		// Подготовка данных		$articles_all = articles_getIntro(40, $_GET['page'], $_SESSION['num']);		$this->title .= '::Список статей';		$this->content = template('v/v_index.php', array('articles_all'=>$articles_all, 'n' => $n));	}	}