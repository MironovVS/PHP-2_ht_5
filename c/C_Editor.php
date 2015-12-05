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
    $this->title .= '::Редактирование';

    if($this->isPost())
    {
      text_set($_POST['text']);
      header('location: index.php');
      exit();
    }

    $text = text_get();
    $this->content = $this->Template('v/v_edit.php', array('text' => $text));
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
    $this->title .= '::Удаление статьи';
    $text=text_set('');
    $this->content = $this->Template('v/v_index.php', array('text' => $text));
  }

  //Добавление статьи
  public function action_new(){
    $this->title .= '::Добавить статью';

    if($this->isPost())
    {
      text_set($_POST['text']);
      header('location: index.php');
      exit();
    }

    $text = text_get();
    $this->content = $this->Template('v/v_new.php', array('text' => $text));
  }
}