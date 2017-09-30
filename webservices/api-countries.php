<?php
/**
 * NOT SECURE, JUST A DEMO!
 *
 * Demo Webservice
 * Get countries
 *
 * Optional params:
 *      $_GET['id']      country id, when no id was given it will show all countries 
 *      $_GET['output']  xml or json (default: json)
 * 
 * @example XML output:
 *
 *      <?xml version="1.0"?>
 *      <countries>
 *          <country>
 *              <id>6</id>
 *              <name>Indonesia</name>
 *          </country>
 *      </countries>
 *
 * @example JSON output:
 *
 *      {
 *          "countries": [
 *              {
 *                  "id": 33,
 *                  "name": "Mexico"
 *              }
 *          ]
 *      }
 */
// allow CORS
header("Access-Control-Allow-Origin: *");

// include data
require_once('data/countries.php');

// check request params
if (isset($_GET['id']) && $_GET['id'] <= count($countries)) {
    $id = $_GET['id'];
} else {
    $id = null;
}

// get country
if ($id === null) {
    $result = $countries;
} else {
    // get country of given id
    $keys = array_keys(array_column($countries, 'id'), $id);
    $result = array_map(function($k) use ($countries){ return $countries[$k]; }, $keys);
}

// show output
if (isset($_GET['output']) && $_GET['output'] === 'xml') {
    // output XML
    header("Content-type: text/xml");
    
    $xml = new SimpleXMLElement('<countries/>');

    for ($x = 0, $len = count($result); $x < $len; $x += 1) {
        $resultNode = $xml->addChild('country');
        $resultNode->addChild('id', $result[$x]['id']);
        $resultNode->addChild('name', $result[$x]['name']);
    }

    echo $xml->asXML();
} else {
    // output JSON
    header("Content-type: application/json");
    
    echo json_encode(['countries' => $result]);
}

