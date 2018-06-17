<?php
/**
 * Created by PhpStorm.
 * User: wenceslaus
 * Date: 6/17/18
 * Time: 2:34 PM
 */

require_once '../common/db_connection.php';

/**
 * Generates filers in filter boxes
 * @param $distinct string - Indicate attribute to filter by
 */
function getFilterBox($distinct)
{
    echo "<option value='None'>None</option>";
    global $db;
    $query = mysqli_query($db, "SELECT DISTINCT(`$distinct`) FROM spacecraft");
    while ($row = mysqli_fetch_array($query, MYSQLI_NUM)) {
        $filterOption = $row[0];
        echo "<option value='$filterOption'>$filterOption</option>";
    }
}
?>
<script> gazeTableLoad(true); </script>
    <div class="filter-block">
        <h1>Filters:</h1>
        <button class="filter_button" onclick="gazeTableLoad(true)">All</button>
        <input id="nameFilter" type="text" title="Name">
        <select id="typeFilter">
            <?php getFilterBox('type'); ?>
        </select>
        <select id="ownershipFilter">
            <?php getFilterBox('ownership'); ?>
        </select>
        <select id="categoryFilter">
            <?php getFilterBox('category'); ?>
        </select>
        <select id="move_stateFilter">
            <?php getFilterBox('move_state'); ?>
        </select>
        <button class="filter_button" onclick="gazeTableLoad(false)">Use Filter</button>
    </div>

<div id="gaze-table">
</div>

<script>

</script>
