<?
session_start();
require_once __DIR__.'/../lib/Classes/UserLibrary.php';
$user_home = new UserLibrary();

if(!$user_home->is_logged_in())
{
    $user_home->redirect('login');
}

$stmt = $user_home->runQuery("SELECT * FROM users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<? include __DIR__ .'/views-stubs/header.php'; ?>
<? include __DIR__ .'/views-stubs/min-head.php'; ?>

        <div class="col-md-2 sidebar">
            <div class="side-logo"></div>
            <div class="inner_content">

                <div class="content">
                    <h3>Department of Computer Science</h3>
                    <span>
                        The Online Materials should help you to read ahead of the semester
                    </span>
                </div>
                <div>
                    <?php echo 'Welcome, ' .$row['fullName']; ?><a href="<?= LINK_PREFIX; ?>logout">Logout</a>
                </div>
            </div>
        </div>
        <div class="book_holder col-md-10">
            <div class="col-lg-12">
                <h3 class="wow animated fadeInDown" data-wow-delay=".5s" data-wow-duration=".4s">Lists of All Available Material For Each Courses and Semester</h3>
                <div class="panel">
                    <div class="panel-body">
                        <table id="books" cellspacing="0" width="100%" class="table wow animated fadeInUp table-hover table-responsive" data-wow-delay=".7s" data-wow-duration=".6s">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Course</th>
                                    <th>Level</th>
                                    <th>Semester</th>
                                    <th>Size</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?= fetchAllBooks(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <? include __DIR__.'/views-stubs/footer.php'; ?>
