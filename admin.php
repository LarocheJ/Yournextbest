<?php 
    $pageTitle = "Admin Panel";
    require('includes/connection.php');
    include('includes/head.php');

    $sql = "SELECT * FROM users ORDER BY id";
    $stmt = mysqli_stmt_init($connection);

    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
?>
<?php
    //Check if user logged in
    if(isset($_SESSION['admin'])){
?>

<script src="https://www.w3schools.com/lib/w3.js"></script>

<div class="wrapper">
    <?php include('includes/admin-header.php'); ?>
    <div class="page-header">
        <div class="user-info">
            <h1>Admin Panel</h1>
        </div>
    </div>
    <div class="fade-2">
        <div class="admin-panel">
            <h2>Users</h2>
            <p>Click on a user for more information.</p>
            <form action="csv_export.php" method="post">
                <input type="submit" class="general-btn-submit" name="export" value="Export to CSV">
            </form>

            <?php
                
                    if(isset($_GET['action'])){
                        if($_GET['action'] == 'success'){
                            ?>
            <p class="success">The user was successfully deleted. </p>
            <?php
                        } elseif($_GET['action'] == 'failed'){
                            ?>
            <p class="warning"> There was an error. The user was not deleted. </p>
            <?php
                        } 
                    }  
                    
                ?>


            <table id="usersTable">
                <thead>
                    <tr>
                        <th onclick="w3.sortHTML('#usersTable', '.users', 'td:nth-child(1)')" style="cursor:pointer">
                            Name <i class="fas fa-sort"></i>
                        </th>
                        <th onclick="w3.sortHTML('#usersTable', '.users', 'td:nth-child(2)')" style="cursor:pointer">
                            Email <i class="fas fa-sort"></i>
                        </th>
                        <th onclick="w3.sortHTML('#usersTable', '.users', 'td:nth-child(3)')" style="cursor:pointer">
                            Code <i class="fas fa-sort"></i>
                        </th>
                        <th onclick="w3.sortHTML('#usersTable', '.users', 'td:nth-child(4)')" style="cursor:pointer">
                            Videos completed <i class="fas fa-sort"></i>
                        </th>
                        <th onclick="w3.sortHTML('#usersTable', '.users', 'td:nth-child(5)')" style="cursor:pointer">
                            User Id <i class="fas fa-sort"></i>
                        </th>
                        <th onclick="w3.sortHTML('#usersTable', '.users', 'td:nth-child(6)')" style="cursor:pointer">
                            Last login <i class="fas fa-sort"></i>
                        </th>
                        <th onclick="w3.sortHTML('#usersTable', '.users', 'td:nth-child(7)')" style="cursor:pointer">
                            Date joined<i class="fas fa-sort"></i>
                        </th>
                        <th onclick="w3.sortHTML('#usersTable', '.users', 'td:nth-child(8)')" style="cursor:pointer">
                            Action<i class="fas fa-sort"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        while($row = mysqli_fetch_array($result)){
                            print '<tr class="users">';
                            print '<td>';
                            print '<a href="user.php?id='.$row['id'].'">'.$row['name'].'</a>';  
                            print '</td>';  
                            print '<td>';
                            print '<a href="user.php?id='.$row['id'].'">'.$row['email'].'</a>';  
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
                            if($row['last_login'] == 0){
                                print "User hasn't logged in yet";
                            } else {
                                print $row['last_login']; 
                            }
                            print '</td>'; 
                            print '<td>';
                            print $row['date'];  
                            print '</td>';  
                            print '<td>';
                            print '<a class="warning" href="delete.php?id='.$row['id'].'">Delete</a>';  
                            print '</td>'; 
                            print '</tr>';
                        }
                    ?>
                </tbody>
            </table>

            <h2>School Codes</h2>

            <div class="school-code-container">
                <h3>Add a school code</h3>
                <?php
                
                    if(isset($_GET['school_code'])){
                        if($_GET['school_code'] == 'success'){
                            ?>
                <p class="success">The school was successfully added. </p>
                <?php
                        } elseif($_GET['school_code'] == 'error'){
                            ?>
                <p class="warning"> There was an error. The school was not added. </p>
                <?php
                        } 
                    } 
                    
                    if(isset($_GET['deletion'])){
                        if($_GET['deletion'] == 'success'){
                            ?>
                <p class="success">The school was successfully deleted. </p>
                <?php
                        } elseif($_GET['deletion'] == 'error'){
                            ?>
                <p class="warning"> There was an error. The school was not deleted. </p>
                <?php
                        } 
                    } 

                
                ?>
                <form action="add-school-code.php" method="post">
                    <div class="flex between">
                        <div class="input-container">
                            <label for="code">School code:</label>
                            <input type="text" name="code">
                        </div>

                        <div class="input-container">
                            <label for="school">School Name:</label>
                            <input type="text" name="school">
                        </div>
                    </div>
                    <input type="submit" name="submit" value="Add">
                </form>
            </div>

            <table id="schoolsTable">
                <thead>
                    <tr>
                        <th onclick="w3.sortHTML('#schoolsTable', 'schools', 'td:nth-child(1)')" style="cursor:pointer">
                            Code <i class="fas fa-sort"></i>
                        </th>
                        <th onclick="w3.sortHTML('#schoolsTable', 'schools', 'td:nth-child(2)')" style="cursor:pointer">
                            School <i class="fas fa-sort"></i>
                        </th>
                        <th onclick="w3.sortHTML('#schoolsTable', 'schools', 'td:nth-child(3)')" style="cursor:pointer">
                            Action <i class="fas fa-sort"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                     $sql = "SELECT * FROM school_codes";
                     $stmt = mysqli_stmt_init($connection);
                 
                     mysqli_stmt_prepare($stmt, $sql);
                     mysqli_stmt_execute($stmt);
                     $result = mysqli_stmt_get_result($stmt);
                        while($row = mysqli_fetch_array($result)){
                            print '<tr class="schools">';
                            print '<td>';
                            print $row['code'];  
                            print '</td>';  
                            print '<td>';
                            print $row['school'];  
                            print '</td>'; 
                            print '<td>';
                            print '<a class="warning" href="delete-school.php?id='.$row['id'].'">Delete</a>';  
                            print '</td>';
                            print '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
    } else {
        //if user hasn't logged in, redirect them to login page.
        header("Location: login.php");
    }
?>

<?php 
    include('includes/footer.php');
?>