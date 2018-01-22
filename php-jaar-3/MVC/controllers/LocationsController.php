<?php
/**
* Locations controller
*/

class LocationsController {

  /**
   * Action "overview"
   * URL: /index.php?controllers=Location&action=overview
   */

   public function overview() {

     // load model
     require_once  APP_PATH . '/models/LocationsModel.php';

     // get all locations
     $locationsModel = new LocationsModel();
     $locations = $locationsModel->getAll();

     // show views
     loadView('theme/header');
     loadView('locations/overview', [
       'locations' => $locations,
     ]);
     loadView('theme/footer');
   }

}

 ?>
