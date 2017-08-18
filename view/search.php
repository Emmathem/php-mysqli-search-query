<? include __DIR__ . '/views-stubs/header.php' ?>
    <? include __DIR__ . '/views-stubs/min-head.php' ?>
        <?

if (isset($_POST['search'])) {

    $mysqli = new MySQLi("localhost", "root", "engineer", "e-library");
    $data = $mysqli->real_escape_string($_POST['data']);
    if (empty($_POST['data'])) {
        $msg = "<div class = 'col-md-5 col-md-offset-3 text-center alert alert-warning pad'><strong>Ops! You can't search empty field.</strong></div>";
    } else {

        $resultSet = $mysqli->query("SELECT `b`.*, `c`.`c_name` AS `course`, `l`.`name` AS `level`,`s`.`s_name` AS `semester`
                              FROM 
                            `books` `b`, `courses` `c`, `level` `l`, `semester` `s` 
                              WHERE (title LIKE '%$data%' OR `c`.`c_name` LIKE '%$data%' OR `l`.`name` LIKE '%$data' OR `s`.`s_name` LIKE '%$data') 
                              AND
                            `b`.`c_id` = `c`.`id` AND `b`.`level` = `l`.`id` AND `b`.`s_id` = `s`.`id`");
        if ($resultSet->num_rows > 0) {
            ?>
            <div class="col-lg-10 col-md-10 col-sm-10 col-md-offset-1" style="margin-top:5%" ;>
               <div class = "col-md-5 col-md-offset-3">
                <div class="alert alert-success text-center">
                    <strong>There are <?= mysqli_num_rows($resultSet); ?> Result Matching your Query</strong></div>
                </div>
                <?
            echo "<table id = 'result' class='table table-striped table-hover table-bordered panel-primary' cellpadding='2' cellspacing='2'>";
            echo "<tr>
					<th>s/n</th>
					<th>Title</th>
					<th>Description</th>
					<th>Level</th>
					<th>Course</th>
					<th>Semester</th>
					<th>Size</th>	
						<th></th>
				</tr>";
            ?>
              <?php

                while ($row = $resultSet->fetch_object()) {
                    $sn = 0;
                    echo "<tr>";
                    echo "<td>" . $sn++ . "</td>";
                    echo "<td>" . $row->title . "</td>";
                    echo "<td>" . $row->book_desc . "</td>";
                    echo "<td>" . $row->level . "</td>";
                    echo "<td>" . $row->course . "</td>";
                    echo "<td>" . $row->semester. "</td>";
                    echo "<td>" . $row->size . "</td>";
                    echo "<td><a href=''><span class = 'fa fa-download'></span>Download</a> </td>";
                    echo "</tr>";
                }
                echo "</table>";
                ?>
           

            <?
        } 
            else 
            {
            $msg = "<div class = 'col-md-5 col-md-offset-3 text-center alert alert-warning pad'>
            <strong>No results Matching this search Query = " . $data . "!</strong></div>";
                
        }

    }
}
    ?>
        <? if (isset($msg)) { echo $msg; } ?>
 </div>
<? include __DIR__ . '/views-stubs/footer.php'; ?>
