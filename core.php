<?php
header("Content-type: application/jon; charset=utf-8");
//Создаём класс, который будем возвращать. В нём всего два свойства - заголовок и тело страницы
class Page {
  public $title;
  public $body;

  public function __construct($title, $body) {
    $this->title = $title;
    $this->bodt = $body;
  }

  $articles = [
    new Page("About","
    <h4 class='app__heading' style='background-color: #8a00d4; color: #ffff;'>About</h4>");
    new Page("Blog","
    <h4 class='app__heading' style='background-color: #d527b7; color: #ffff;'>Blog</h4>");
    new Page("Pricing","
    <h4 class='app__heading' style='background-color: #f9c46b; color: #ffff;'>Pricing</h4>");
    new Page("Support","
    <h4 class='app__heading' style='background-color: #34ee78; color: #ffff;'>Support</h4>");
  ]
}

?>