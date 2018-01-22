<?php

class PageController {

  /**
   * Action "home"
   * URL: /index.php?controller=page&action=home
   */

  public function home() {

    //load views
    loadView('theme/header');
    loadView('pages/home', [
      'name' => 'Tome',
       'age' => 20,
    ]);
    loadView('theme/footer');

  }
  /**
   * Action "about"
   * URL: /index.php?controller=page&action=about
   */

    public function about() {
      //load views
      loadView('theme/header');
      loadView('pages/about');
      loadView('theme/footer');

    }

}


?>
