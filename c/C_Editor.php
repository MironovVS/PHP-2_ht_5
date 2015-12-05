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
    $this->title .= '::Просмотр статьи';

    if($this->isPost())
    {
      text_set($_POST['text']);
      header('location: index.php');
      exit();
    }

    $text = text_get();
    $this->content = $this->Template('v/v_Article.php', array('text' => $text));
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