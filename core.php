<?php
header("Content-type: application/jon; charset=utf-8");
//Создаём класс, который будем возвращать. В нём всего два свойства - заголовок и тело страницы
class Page {
  public $title;
  public $body;

  public function __construct($title, $body) {
    $this->title = $title;
    $this->body = $body;
  }

  $articles = [
   /*  new Page("About","
    <h4 id="about" class='app__heading' style='background-color: #8a00d4; color: #ffff;'>About</h4>");
    new Page("Blog","
    <h4 id="blog" class='app__heading' style='background-color: #d527b7; color: #ffff;'>Blog</h4>");
    new Page("Pricing","
    <h4 id="pricing" class='app__heading' style='background-color: #f9c46b; color: #ffff;'>Pricing</h4>");
    new Page("Support","
    <h4 id="support" class='app__heading' style='background-color: #34ee78; color: #ffff;'>Support</h4>"); */
    new Page("Article 1", "<p>asdas 1</p> <a href='/Main' class='link link_internal'>Return to main page</a>"),
    new Page("Article 2", "<p>asdas 2</p> <a href='/Main' class='link link_internal'>Return to main page</a>"),
    new Page("Article 3", "<p>asdas 3</p> <a href='/Main' class='link link_internal'>Return to main page</a>"),
    new Page("Article 4", "<p>asdas 4</p> <a href='/Main' class='link link_internal'>Return to main page</a>")
  ];

  if (isset($_GET["page"])) {//"page" is part of request ?page=articles&id=1
    $page = $_GET["page"];//значение будет article или main
  } else {
    $page = "404";
  }
  if (isset($_GET["id"])) {//число получаемое из массива props в функции LinkClick, получаемое в свою очередь из html-разметки по ссылкам anchor
    $id = $_GET["id"];
  } else {
    $id = 0;
  }
  $response = new Page("404", "<p>Page not found</p> <a href='/' class='link link_internal'>Return to main page</a>");

  switch($page) {
    case "main":
      $response = new Page("Main", "
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, iste</p>
      <a href='/Articles/1' class='link_internal'>Article 1</a>
      <a href='/Articles/2' class='link_internal'>Article 2</a>
      <a href='/Articles/3' class='link_internal'>Article 3</a>
      <a href='/Articles/4' class='link_internal'>Article 4</a>
      ")
    case "articles":
      if ($id > 0) {
        if (isset($articles[$id - 1])) {
          $response = $articles[$id - 1];
        }
      }
      break;
  }
}


die(json_encode($response));
?>