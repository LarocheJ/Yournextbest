<?php 
    require('includes/connection.php');

    if(isset($_POST['export'])){
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=users.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, array('Name', 'Email', 'Code', 'Videos Completed', 'User Id', 'Last Login', 'Date Joined'));
        $query = "SELECT name, email, code, video_id, id, last_login, date FROM users ORDER BY name";
        $result = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($result)){
            fputcsv($output, $row);
        }
        fclose($output);
    } else {
        header("Location: admin.php");
    }
?>