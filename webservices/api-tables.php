<?php
/**
 * NOT SECURE, JUST A DEMO!
 *
 * Demo Webservice
 * Get count table
 *
 * Optional params:
 *      $_GET['table']   count table  (between 0 and 100)
 *      $_GET['start']   start at number (between 0 and 100)
 *      $_GET['end']     end at number (between 0 and 100)
 *      $_GET['output']  xml or json (default: json)
 * 
 * @example XML output:
 *
 *      <?xml version="1.0"?>
 *      <results>
 *          <result>
 *              <number>6</number>
 *              <table>3</table>
 *              <outcome>18</outcome>
 *          </result>
 *      </results>
 *
 * @example JSON output:
 *
 *      {
 *          "results": [
 *              {
 *                  "number": 6,
 *                  "table": 3,
 *                  "outcome": 18
 *              }
 *          ]
 *      }
 */
// allow CORS
header("Access-Control-Allow-Origin: *");

function getGetOrDefault($key, $defaulValue = 1) {
    if (isset($_GET[$key]) && $_GET[$key] >= 0 && $_GET[$key] <= 100) {
        $value = $_GET[$key];
    } else {
        $value = $defaulValue;
    }
    
    return $value;
}

// check request params
$table = getGetOrDefault('table', 1);
$start = getGetOrDefault('start', 1);
$end = getGetOrDefault('end', 10);

// calculate results
$results = [];

for ($x = $start; $x <= $end; $x += 1) {
    $results[] = [
        'number'    => $x,
        'table'     => $table,
        'outcome'   => $x * $table,
    ];
}

// show output
if (isset($_GET['output']) && $_GET['output'] === 'xml') {
    // output XML
    header("Content-type: text/xml");
    
    $xml = new SimpleXMLElement('<results/>');

    for ($x = 0, $len = count($results); $x < $len; $x += 1) {
        $resultNode = $xml->addChild('result');
        $resultNode->addChild('number', $results[$x]['number']);
        $resultNode->addChild('table', $results[$x]['table']);
        $resultNode->addChild('outcome', $results[$x]['outcome']);
    }

    echo $xml->asXML();
} else {
    // output JSON
    header("Content-type: application/json");
    
    echo json_encode(['results' => $results]);
}
