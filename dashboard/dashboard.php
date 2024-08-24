<?php

include '../dashboard/extends/header.php';


$user_query = "SELECT * FROM users";

$users = mysqli_query($db, $user_query);

?>
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>

    <div class="row">
        <div class="col">
            <?php if(isset($_SESSION['temp_name'])) : ?>
        <div class="alert alert-custom" role="alert">
                <div class="custom-alert-icon icon-dark"><i class="material-icons-outlined">done</i></div>
                <div class="alert-content">
                    <span class="alert-title">Welcome Mr. <?= $_SESSION['author_name']?></span>
                    <span class="alert-text">Your Email Is : <?= $_SESSION['author_email']?></span>
                </div>
            </div>
            <?php endif; unset($_SESSION['temp_name'])?>
        </div>
    </div>


    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h4>User Information..!!</h4>
                </div>
                <div class="card-body">
                <div class="example-content">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $num = 1;
                            $id = $_SESSION['author_id'] ;
                            foreach($users as $user) : 
                            if($user['id'] == $id){
                                continue ;
                            }
                            ?>
                                <tr>
                                    <th scope="row">
                                        <?= $num++ ?></th>
                                    <td> <?php print_r($user['name'])?></td>
                                    <td> <?php print_r($user['email'])?></td>
                                    <td>.....</td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    
 <?php

include '../dashboard/extends/footer.php';

?> 