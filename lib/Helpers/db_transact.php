<?
require __DIR__. '/../Config/connect.php';

//error_reporting(E_COMPILE_ERROR);

function formatHtml($string) {
		$string = str_replace("\n","<br />",$string);
		$string = str_replace('\n',"<br />",$string);
		$string = stripslashes($string);
		$string = preg_replace('/[^a-z0-9]+/i','-', iconv('UTF-8','ASCII//TRANSLIT',$string));
		$string = trim($string,'-');
		$string = strtolower($string);
		return $string;
}

function cat_style($cat) {
		$cat = str_replace("\n", "<br />", $cat);
		$cat = str_replace('\n', "<br />", $cat);
		$cat = strtolower($cat);
		$cat = trim($cat,'-');
		return $cat;
	}



/*Fetch content of Marriage Content*/

function client_fetch_articles($limit) {
	global $conn;
	$result = $conn->query("SELECT * FROM articles ORDER BY a_link DESC LIMIT $limit");
		while ($r = mysqli_fetch_array($result)) {
			extract($r); ?>
			<div class="media">
        		<div class="media-body ">
          			<h4 class="media-heading"><span style = 'color:red;'><?= $r['time_published']; ?></span>
          			<a style = 'color: #111;' href="<?=LINK_PREFIX ?><?= 'articles/'.$r['a_link'].'/'?>"><? echo $r['a_title']; ?></a>
          			</h4>     			
       			 </div>
      		</div>
      		<hr>
    <?		}
}

function peaceful_gallery() {
	global $conn;
		$query = "SELECT * FROM gallery ORDER by gallery_id ASC";
		$result = mysqli_query($conn, $query);
		while ($r = mysqli_fetch_array($result)) {
			extract($r);
			echo "<table><tr>";
			for ($i = 0; $i < 4; $i++) { if ($puid == $gallery_id) 
			{
				$r = mysqli_fetch_array($result); 
				extract($r); 
				if ($puid == $gallery_id)
				 break;
				 } ?>
			<td class="prod_c">
             <? echo "<a data-target='#modal' href='gallery?gallery_id=$gallery_id'>"; ?>
             <img class="thumbnail" src="<? echo "admin/image/gallery/$img_path"; ?>" style="width:250px; height:150px;" alt="<? echo $name; ?>" title="<? echo $name; ?>"/>
             </a> 
            </td>
<?				$puid = $gallery_id;
			}
			echo "</tr></table>";
		}
}

function peaceful_admin_gallery() {
	global $conn;
		$query = "SELECT * FROM gallery ORDER BY gallery_id ASC";
		$result = mysqli_query($conn, $query);
		while ($r = mysqli_fetch_array($result)) {
			extract($r);
			echo "<table><tr>";
			for ($i = 0; $i < 3; $i++) { if ($puid == $gallery_id) 
			{
				$r = mysqli_fetch_array($result); 
				extract($r); 
				if ($puid == $gallery_id)
				 break;
				 } ?>
			<td class="prod_c">
             
             <img class="thumbnail" src="<? echo "../image/gallery/$img_path"; ?>" style="width:250px; height:150px;" alt="<? echo $name; ?>" title="<? echo $name; ?>"/>
            <? echo "<a href='delete_image?gallery_id=".$r['gallery_id']."'><span class = 'fa fa-trash'></span></a>"; ?>
            </td>

<?					$puid = $gallery_id;
			}
			echo "</tr></table>";
		}
}

function admin_download() {
	global $conn;
	if ($result = $conn->query("SELECT * FROM download ORDER BY id DESC"))
		{
			if ($result->num_rows > 0)
				{	
					
					echo "<table class=\"table table-striped table-hover table-bordered panel-primary\" cellpadding=\"2\" cellspacing=\"2\">";
						echo "<tr>
								<th>File_id</th>
								<th>File Name</th>
								<th>Description</th>
								<th>Size</th>
								<th>Type</th>
								<th>Date Added</th>
								<th>Actions</th>
							</tr>";
										
				while($row = $result->fetch_object())
					{
						echo "<tr>";
							echo "<td>" . $row->file_id . "</td>";
							echo "<td>" . $row->name . "</td>";
							echo "<td>" . $row->file_details . "</td>";
							echo "<td>" . $row->size . "</td>";
							echo "<td>" . $row->type. "</td>";
							echo "<td>" . $row->date_upload . "</td>";
							echo "<td> 
									  <a href='./?id=".$row->file_id."' data-target='#modal'><span class = 'fa fa-edit'></span></a> | 
									  <a href='bgWorker?id=".$row->file_id."'><span class = 'fa fa-trash'></span></a>
								  </td>";
						echo "</tr>";
					}
					echo "</table>"; 
				}
					else
						{
							echo "<div class = 'alert alert-warning' style='padding-left:100px;'>No results to display</div>";
						}
				}
					else
						{
							echo "Error: ". $conn->error;
						}

					//$conn->close();
		}

function fetchAuthor() {
    global $conn;
    $result = $conn->query("SELECT * FROM admin WHERE userStatus = 'Y'");
    return $result->fetch_assoc();
  }

  /*Post all articles view to user(front-end)*/
function fetchAllArticle() {
    global $conn;
    $result  = $conn->query("SELECT * FROM articles ORDER BY article_id DESC");
   return $result->fetch_array();
  }
/*
 * This function get the  details of all registered administrators from the database
 */
function manage_admins()
{
    global $conn;
    if ($result = $conn->query("SELECT * FROM admin ORDER BY userID")) {
        if ($result->num_rows > 0) {
            echo "<table class=\"table table-striped table-bordered\" cellpadding=\"2\" cellspacing=\"2\">";
            echo "<tr>
                      <th>Name</th>
                      <th>Email Address</th>
                      <th>Position</th>
                      <th>Status</th>
                      <th>Action</th>
                      </tr>";
            while ($row = $result->fetch_object()) {
                echo "<tr>";
                echo "<td>" . $row->fullName . "</td>";
                echo "<td>" . $row->userEmail . "</td>";
                echo "<td>" . $row->userPost . "</td>";
                echo "<td>" . $row->userStatus . "</td>";
                echo "<td><button class = 'btn btn-small btn-danger'><a style = 'color:#fff;' href = 'models/a_action?userID=" . $row->userID . "'><i class = \"fa fa-trash\"> Delete</i></a></button></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<div class = 'alert alert-warning' style='padding-left:100px;'>No results to display</div>";
        }
    } else {
        echo "Error: " . $conn->error;
    }
}

/**
 * Article for Admin to Manage
 * @return array|bool
 * @param book
 * */
function adminFetchBooks() {
    global $conn;
    $sn = 1;
    $sql = "SELECT `b`.*, `c`.`c_name` AS `course`, `l`.`name` AS `level`,`s`.`s_name` AS `semester`
            FROM 
            `books` `b`, `courses` `c`, `level` `l`, `semester` `s`
            WHERE
            `b`.`c_id` = `c`.`id` AND `b`.`level` = `l`.`id` AND `b`.`s_id` = `s`.`id`
            ORDER BY
            `b`.`id`";
    if ($result = $conn->query($sql))
    {
        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_object())
            {
                echo "<tr>";
                echo "<td>" . $sn++ . "</td>";
                echo "<td>" . $row->title . "</td>";
                echo "<td>" . $row->course . "</td>";
                echo "<td>" . $row->level . "</td>";
                echo "<td>" . $row->semester . "</td>";
                echo "<td>" . $row->size . "</td>";
                echo "<td>" . $row->type . "</td>";
                echo "<td>" . $row->date_added . "</td>";
                echo "<td><a class='btn btn-danger btn-sm' title='Delete' href='models/b_action?id=" . $row->id ."'><i class = 'fa fa-trash'></i> Delete</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        else
        {
            echo "<div class = 'alert alert-warning' style='padding-left:100px;'>No results to display</div>";
        }
    }
    else
    {
        echo "Error: ". $conn->error;
    }

    //$conn->close();
}
/*
 * This function fetches all feedbacks to admin
 * */
function fetchAllBooks()
{
    global $conn;
    $sql = "SELECT `b`.*, `c`.`c_name` AS `course`, `l`.`name` AS `level`,`s`.`s_name` AS `semester`
            FROM 
            `books` `b`, `courses` `c`, `level` `l`, `semester` `s`
            WHERE
            `b`.`c_id` = `c`.`id` AND `b`.`level` = `l`.`id` AND `b`.`s_id` = `s`.`id`
            ORDER BY
            `b`.`id`";
    $id_c = 1;
    if ($result = $conn->query($sql)) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                echo "<tr>";
                echo "<td>" . $id_c++ . "</td>";
                echo "<td>" . $row->title . "</td>";
                echo "<td>" . $row->book_desc . "</td>";
                echo "<td>" . $row->course . "</td>";
                echo "<td>" . $row->level . "</td>";
                echo "<td>" . $row->semester . "</td>";
                echo "<td>" . $row->size . "</td>";
                ?>
                <td><a class="btn btn-success btn-sm" title="Download" href="<?= LINK_PREFIX; ?>uploads/materials/<?= $row->book_path; ?>"><i class = "fa fa-download"></i> Download</a></td>
<?php
                echo "</tr>";
            }
        } else {
            echo "<div class = 'alert alert-warning' style='padding-left:100px;'>No results to display</div>";
        }
    } else {
        echo "Error: " . $conn->error;
    }
}

?>