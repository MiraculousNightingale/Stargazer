<?php

require_once '../common/db_config.php';

/**
 * Builds a query for news table
 * @param string $table
 * @param string $attribute
 * @return string
 */
function buildNewsQuery($table = 'news', $attribute = 'date')
{
    $query_line = "SELECT * FROM `$table` ";
//    Search by title
    if ($_GET['title'] != '') {
        $title = $_GET['title'];
        $query_line .= "WHERE `title` LIKE '%$title%' ";
    }
//    Apply sorting order and then return the result
    $order = $_GET['sort'];
    $query_line .= "ORDER BY `$attribute` $order";
    return $query_line;
}

//Show generated query
//echo buildNewsQuery();

/**
 * Requests a table from database, or shows 'no results' message
 */
$fetch_news_query = mysqli_query($db, buildNewsQuery());
if (mysqli_num_rows($fetch_news_query) > 0) {

    while ($data = mysqli_fetch_array($fetch_news_query, MYSQLI_ASSOC)) {
        $header = $data['title'];
        $text = $data['text'];
        $img = "uploads/" . $data['image'];
        $date = $data['date'];
        echo "
        <div class='news-block'>
            <h6 class='news-header'>$header</h6>
            <div class='news-content'>                         
                <div class='img' style='background:url('$img');'></div>
                <article>
                $text
                </article>
                <span>
                $date
                </span>
            </div>
        </div>
        ";

    }
} else {
    echo 'No news right now.';
}