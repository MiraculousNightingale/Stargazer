<?php
/**
 * Created by PhpStorm.
 * User: wenceslaus
 * Date: 5/18/18
 * Time: 2:03 AM
 */

require '../common/db_config.php';

if (isset($_GET['tab'])) {

    switch ($_GET['tab']) {
        case 'info':
            echo file_get_contents('info.html');
            break;
        case 'gaze':

            $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, 'stargazer_db');
            $select_all_query = mysqli_query($db, "SELECT * FROM spacecraft");

            if (mysqli_num_rows($select_all_query) > 0) {

                for ($i = 1;
                     $i <= mysqli_num_rows($select_all_query);
                     $i++) {

                    $fetch_query = mysqli_query($db, "SELECT * FROM spacecraft WHERE id = " . $i);
                    $data = mysqli_fetch_array($fetch_query, MYSQLI_ASSOC);

                    /**
                     * @var $spaceship Spacecraft
                     */
//                    foreach ($data as $key => $value) {
//                        $setMethod = 'set' . ucfirst($key);
//                        $spaceship->$setMethod($value);
//                    }

                    echo '<div class="table-row">';
                    foreach ($data as $key => $value) {
                        echo '<span class="table-cell">' .
                            $value .
                            '</span>';
                    }
                    echo '</div>';

                }
            }
            break;
        case 'news':

            $select_all_query = mysqli_query($db, "SELECT * FROM news");
            if (mysqli_num_rows($select_all_query) > 0) {
                echo"
                <div>
                
                </div>
                ";
                for ($i = mysqli_num_rows($select_all_query); $i > 0; $i--) {

                    $fetch_query = mysqli_query($db, "SELECT * FROM news WHERE id = " . $i);
                    $data = mysqli_fetch_array($fetch_query, MYSQLI_ASSOC);

                    $header = $data['title'];
                    $text = $data['text'];
                    $img = "uploads/" . $data['image'];
                    $date = $data['date'];
                    echo "
                    <div class='news-block'>
                        <h6 class='news-header'>$header</h6>
                        <div class='news-content'>
                            <img src='$img'>
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

            break;
        default:
            echo 'No such tab.';
            break;
    }
}