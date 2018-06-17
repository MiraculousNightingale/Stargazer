<?php

require_once '../common/db_config.php';

/**
 * Build a query depending on filters activated.
 * Designed for `spacecraft` table, refactor for other tables.
 * @param string $table
 * @return string
 */
function buildFilterQuery($table = 'spacecraft')
{
    $query_line = "SELECT * FROM `$table` WHERE ";
//    Add only active filters to filters array
    if ($_GET['name'] != 'None' && $_GET['name'] != '')
        $filters['name'] = $_GET['name'];
    if ($_GET['type'] != 'None')
        $filters['type'] = $_GET['type'];
    if ($_GET['ownership'] != 'None')
        $filters['ownership'] = $_GET['ownership'];
    if ($_GET['category'] != 'None')
        $filters['category'] = $_GET['category'];
    if ($_GET['move_state'] != 'None')
        $filters['move_state'] = $_GET['move_state'];

//    Build a query depending on filters
    if (count($filters) == 1)
        foreach ($filters as $key => $value)
            $query_line .= "`$key` LIKE '%$value%'";
    elseif (count($filters) > 1) {
        $filter_line = "";
        foreach ($filters as $key => $value) {
            $filter_line .= "`$key` LIKE '%$value%' AND";
        }
        $query_line .= substr($filter_line, 0, strlen($filter_line) - 4);
    } else {
//        If no filters selected then get all rows
        $query_line = "SELECT * FROM `$table`";
    }
    return $query_line;
}

//Show generated query
//echo buildFilterQuery();


/**
 * Requests a table from database, or shows 'no results' message
 */
$fetch_query = mysqli_query($db, buildFilterQuery());
if (mysqli_num_rows($fetch_query) > 0)
    while ($row = mysqli_fetch_array($fetch_query, MYSQLI_ASSOC)) {

        echo '<div class="table-row">';
        foreach ($row as $key => $value) {
            echo '<span class="table-cell">' .
                $value .
                '</span>';
        }
        echo '</div>';
    }
else
    echo 'No results found!';
