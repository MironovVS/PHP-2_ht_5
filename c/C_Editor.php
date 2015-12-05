<?php

require_once('m/model.php');

class C_Editor extends C_Base {

  //Посмотр всех статей
  public function action_list() {

    //Подготовка данных
    $articles_all = articles_all();

    $this->title .= '::Просмотр статей';

    $this->content = $this->Template('v/v_editor.php', array('articles_all' => $articles_all));
  }

  //редактирование статьи
  public function action_edit(){

    $id=(int)$_GET['id'];
    if (!$id) {
      die("Не верный id");
    }

    $article_edit = articles_get($id);

    if (isset($_POST['submit'])) {
      articles_edit($_POST['id'], $_POST['name'], $_POST['content']);
      die(header('Location: index.php'));
    }

    $this->title .= '::Редактирование';

    $this->content = $this->Template('v/v_edit.php', array('article_edit'=>$article_edit));
  }

  //Просмотр одной статьи
  public function action_show(){

    $id=(int)$_GET['id'];
    if (!$id) {
      die("Не верный id");
    }

    $article = articles_get($id);

    $this->title .= '::Просмотр статьи';

    $this->content = template('v/v_article.php', array('article'=>$article));
  }

  //Удаление статьи
  public function action_del() {

    $id=(int)$_GET['id'];
    if (!$id) {
      die("Не верный id");
    }

    articles_delete($id);
    header('Location: index.php');

  }

  //Добавление статьи
  public function action_new(){

    $title_art = "";
    $content_art = "";
    $error = false;

// Обработка отправки формы
    if (isset($_POST['submit'])) {
      if ($_POST['title_art'] != "" && $_POST['content_art'] != "") {
        articles_new($_POST['title_art'], $_POST['date_art'], $_POST['content_art']);
        die(header('Location: index.php'));
      }
      $title_art = $_POST['title_art'];
      $content_art = $_POST['content_art'];
      $error = true;
    }

    $this->title .= '::Добавить статью';

    $this->content = $this->Template('v/v_new.php');
  }
}