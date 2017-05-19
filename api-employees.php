<?php
/**
 * NOT SECURE, JUST A DEMO!
 *
 * Demo Webservice
 * Get random employees
 *
 * Optional params:
 *      $_GET['amount']  amount of employees
 *      $_GET['output']  xml or json (default: json)
 *
 * @example XML output:
 *
 *      <?xml version="1.0"?>
 *      <employees>
 *          <employee>
 *              <name>Drake W. Fleming</name>
 *              <company>Arcu Morbi Corporation</company>
 *          </employee>
 *      </employees>
 *
 * @example JSON output:
 *
 *      {
 *          "employees": [
 *              {
 *                  "name": "Eugenia A. Byrd",
 *                  "company": "Praesent Ltd"
 *              }
 *          ]
 *      }
 */
// allow CORS
header("Access-Control-Allow-Origin: *");

// include data
require_once('data/employees.php');

// check request params
if (isset($_GET['amount']) && $_GET['amount'] < 50) {
    $amount = $_GET['amount'];
} else {
    $amount = 1;
}

// get random employee(s)
shuffle($employees);
$result = array_slice($employees, 0, $amount);

// show output
if (isset($_GET['output']) && $_GET['output'] === 'xml') {
    // output XML
    header("Content-type: text/xml");

    $xml = new SimpleXMLElement('<employees/>');

    for ($x = 0, $len = count($result); $x < $len; $x += 1) {
        $resultNode = $xml->addChild('employee');
        $resultNode->addChild('name', $result[$x]['name']);
        $resultNode->addChild('company', $result[$x]['company']);
    }

    echo $xml->asXML();
} else {
    // output JSON
    header("Content-type: application/json");

    echo json_encode(['employees' => $result]);
}
