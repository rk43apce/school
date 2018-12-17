<?php

require_once '../core/init.php';

if (!Input::exists('get')) {

    Redirect::to('manageCourse.php');

    die();
}

$classId = Input::get('classId');

$course = new Course();
$teaches = new Teaches();

$classes = $course->getClassById($classId);

if ($courseSubjects = $course->getCourseSubjects($classId)) {

}

?>


<!DOCTYPE html>
<html>

<head>
    <?php include './include/cssLink.php'?>
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <?php include './include/defaultNavbar.php';?>

        <!-- Page Content Holder -->
        <div id="content">

            <!-- topnavbar Holder -->
            <?php include './include/topNavbar.php';?>

            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "><?php echo $classes['className']; ?></li>
                            <li class="breadcrumb-item active">Subjects</li>
                            <li class="breadcrumb-item "><a href="./editCourse.php?classId=<?php echo $classId; ?>" class="btn-link"> Edit Course </a></li>
                        </ol>
                        <div class="line"></div>
                        <table id="" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Subject</th>
                                     <th>Teacher</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($courseSubjects) {

                                    $serialNo = 1;

                                    foreach ($courseSubjects as $key => $subject) {?>

                                        <tr>
                                            <td><?php echo $serialNo; ?></td>
                                            <td><?php echo $subject['subjectName']; ?></td>
                                             <td>
                                                <?php  

                                                $facultyData  = $teaches->subjectTeacher($subject['classId'], $subject['subjectId']);  

                                                if (empty(!$facultyData)) {
                                                # code...
                                                    echo $facultyData['f_name'];

                                                } else {

                                                echo 'Faculty  not assign';
                                                }

                                                ?>
                                                 
                                             </td>
                                            <td>

                                            <?php if ($teaches->exits($subject['classId'], $subject['subjectId'])) { ?>

                                            <form action="editSubjectTeacher.php" method="post">
                                                <input type="hidden" name="classId" value="<?php echo $subject['classId']; ?>">
                                                <input type="hidden" name="subjectId" value="<?php echo $subject['subjectId']; ?>">
                                                <input type="hidden" name="facultyId" value="<?php echo $facultyData['f_id']; ?>">
                                                <button class="btn btn-success" type="submit">Change  Teacher</button>
                                            </form>


                                            

                                            <?php } else { ?>

                                            <form action="assignTeacher.php" method="post">
                                                <input type="hidden" name="classId" value="<?php echo $subject['classId']; ?>">
                                                <input type="hidden" name="subjectId" value="<?php echo $subject['subjectId']; ?>">
                                                <button class="btn btn-primary" type="submit">Add Teacher</button>
                                            </form>

                                            <?php } ?>                                             
                                        </td>
                                    </tr>

                                    <?php $serialNo++; }

                                } else { ?>

                                <tr>
                                    <td align="center" colspan="2">Couser is not defien yet! <br> <a class="btn-link" href="addCourse.php"> Clik here to add subject </a> </td>
                                </tr>

                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include './include/footer.php'?>

</body>

</html>