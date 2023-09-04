<?php 
session_start();
include './inc/database.php';

$database = new Database();function fetchDataBetweenDates($database)
{
    // Get the start date from the 'project' table's 'date_work_order' column
    $project_start_date = $database->get('project', 'date_work_order', ['LIMIT' => 1, 'ORDER' => ['date_work_order' => 'ASC']]);

    // Get the end date from the 'bills' table's 'date_measurement' column
    $project_end_date = $database->get('bills', 'date_measurement', ['LIMIT' => 1, 'ORDER' => ['date_measurement' => 'DESC']]);

    // Query to fetch data from 'price_escalation' table where 'month' is between the start and end date
    $data = $database->select('price_escalation', '*', [
        'month[>=]' => $project_start_date,
        'month[<=]' => $project_end_date,
    ]);

    return $data;
}


// Usage example:
$data = fetchDataBetweenDates($database);

?>