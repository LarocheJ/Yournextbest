<?php
    $pageTitle = "User";
    require('includes/connection.php');
    include('includes/head.php');

    $id = $_GET['id'];
    $sql = mysqli_query($connection, "SELECT * FROM users WHERE id=$id");
    $row = mysqli_fetch_array($sql);
?>

<div class="wrapper">
    <?php include('includes/admin-header.php'); ?>
    <div class="page-header">
        <div class="user-info">
            <h1>Admin Panel</h1>
        </div>
    </div>
    <div class="fade-2">

        <div class="admin-panel">
            <div class="breadcrumbs">
                <ul>
                    <li><i class="fas fa-chevron-left"></i></li>
                    <li><a href="admin.php"><i class="fas fa-home"></i> Back</a></li>
                </ul>
            </div>
            <!-- <h2>
                <?php 
                    //print ''.$row['name'].' ('.$row['email'].')';
                ?>
            </h2> -->
            <h2 class="big-h2">User Info</h2>
            <table border="1" id="usersTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Birthday</th>
                        <th>Code Used</th>
                        <th>Videos completed</th>
                        <th>User Id</th>
                        <th>Date joined</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                    //Display user's information                   
                        print '<tr class="users">';
                        print '<td>';
                        print stripslashes($row['name']);  
                        print '</td>';  
                        print '<td>';
                        print $row['email'];  
                        print '</td>'; 
                        print '<td>';
                        print $row['birthday'];  
                        print '</td>';                            
                        print '<td>';
                        print $row['code'];  
                        print '</td>';
                        print '<td>';
                        print $row['video_id'];  
                        print '</td>'; 
                        print '<td>';
                        print $row['id'];  
                        print '</td>';
                        print '<td>';
                        print $row['date'];  
                        print '</td>';  
                        print '</tr>';
                    ?>
                </tbody>
            </table>

            <h2 class="big-h2">User Address</h2>
            <table border="1" id="usersTable">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Address</th>
                        <th>Postal Code</th>
                        <th>Country</th>
                        <th>City</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <!-- Display user's mailing address (if applicable)  -->
                        <td><?php print stripslashes($row['full_name']) ?></td>
                        <td><?php print stripslashes($row['address']) ?></td>
                        <td><?php print $row['postal_code'] ?></td>
                        <td><?php print $row['country'] ?></td>
                        <td><?php print stripslashes($row['city']) ?></td>
                    </tr>
                </tbody>
            </table>

            <h2 class="big-h2">Question Answers</h2>
            <?php 
                $sql = mysqli_query($connection, "SELECT * FROM users WHERE id=$id");
                $row = mysqli_fetch_array($sql);
            ?>
            <div class="recap-grid">
                <?php
                //Display user's answers
                    print '<div class="answer-card">';
                    print '<h2>'.$q1.'</h2>';
                    print '<p>'.$row['journal'].'</p>';
                    print '</div>';
                    print '<div class="answer-card">';
                    print '<h2>'.$q2.'</h2>';
                    print '<p>'.stripslashes($row['priorities']).'</p>';
                    print '</div>';
                    print '<div class="answer-card">';
                    print '<h2>'.$q3.'</h2>';
                    print '<p>'.$row['decision_radio'].'</p>';
                    print '</div>';
                    print '<div class="answer-card">';
                    print '<h2>'.$q4.'</h2>';
                    print '<p>'.stripslashes($row['decision']).'</p>';
                    print '</div>';
                    print '<div class="answer-card">';
                    print '<h2>'.$q5.'</h2>';
                    print '<p>'.stripslashes($row['distraction']).'</p>';
                    print '</div>';
                    print '<div class="answer-card">';
                    print '<h2>'.$q6.'</h2>';
                    print '<p>'.$row['sleep'].'</p>';
                    print '</div>';
                    print '<div class="answer-card">';
                    print '<h2>'.$q7.'</h2>';
                    print '<p>'.$row['confidence'].'</p>';
                    print '</div>';
                    print '<div class="answer-card">';
                    print '<h2>'.$q8.'</h2>';
                    print '<p>'.stripslashes($row['joy']).'</p>';
                    print '</div>';
                    print '<div class="answer-card">';
                    print '<h2>'.$q9.'</h2>';
                    print '<p>'.stripslashes($row['commitment']).'</p>';
                    print '</div>';
                    print '<div class="answer-card">';
                    print '<h2>'.$q10.'</h2>';
                    print '<p>'.$row['friends'].'</p>';
                    print '</div>';
                    print '<div class="answer-card">';
                    print '<h2>'.$q11.'</h2>';
                    print '<p>'.$row['consequence_select'].'</p>';
                    print '</div>';
                    print '<div class="answer-card">';
                    print '<h2>'.$q12.'</h2>';
                    print '<p>'.$row['mentor'].'</p>';
                    print '</div>';
                    print '<div class="answer-card">';
                    print '<h2>'.$q13.'</h2>';
                    print '<p>'.stripslashes($row['consequence_face']).'</p>';
                    print '</div>';
                    print '<div class="answer-card">';
                    print '<h2>'.$q14.'</h2>';
                    print '<p>'.$row['inspire'].'</p>';
                    print '</div>';
                    print '<div class="answer-card">';
                    print '<h2>'.$q15.'</h2>';
                    print '<p>'.stripslashes($row['impact']).'</p>';
                    print '</div>';
                    print '<div class="answer-card">';
                    print '<h2>'.$q16.'</h2>';
                    print '<p>'.$row['routine'].'</p>';
                    print '</div>';
                    print '<div class="answer-card">';
                    print '<h2>'.$q17.'</h2>';
                    print '<p>'.$row['bedtime'].'</p>';
                    print '</div>';
                    print '<div class="answer-card">';
                    print '<h2>'.$q18.'</h2>';
                    print '<p>'.stripslashes($row['habit']).'</p>';
                    print '</div>';
                    print '<div class="answer-card">';
                    print '<h2>'.$q19.'</h2>';
                    print '<p>'.$row['relationship'].'</p>';
                    print '</div>';
                    print '<div class="answer-card">';
                    print '<h2>'.$q20.'</h2>';
                    print '<p>'.stripslashes($row['younger_self']).'</p>';
                    print '</div>';
                    print '<div class="answer-card">';
                    print '<h2>'.$q21.'</h2>';
                    print '<p>'.stripslashes($row['older_self']).'</p>';
                    print '</div>';
                    print '<div class="answer-card">';
                    print '<h2>'.$q22.'</h2>';
                    print '<p>'.stripslashes($row['difference']).'</p>';
                    print '</div>';
                ?>
            </div>
        </div> <!-- END ADMIN PANEL -->
    </div>
</div>
<?php 
    include('includes/footer.php');
?>