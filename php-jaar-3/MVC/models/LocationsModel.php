<?php

/**
* Locations Model
*/

class LocationsModel {

  /**
  * Get all locations
  * @return array
  */

  public function getAll() {

    // get connection
    $dbConnection = getDbConnection();

    // run query
    $stmt = $dbConnection->prepare("SELECT locatie FROM locations");
    $stmt->execute();

    // get all rows as an arrayof objects
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;

  }

}

 ?>
