<?php include('db.php') ?>
<?php include('./includes/header.php') ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <?php if(isset($_SESSION['message'])){ ?>

                <div class="alert alert-<?php echo $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                    
            <?php
                session_unset();
                } ?>

            <div class="card card-body">
                <form action="save_task.php" method="POST">
                    <div class="mb-3">
                        <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
                    </div>
                    <div class="mb-3">
                        <textarea name="description" rows="2" class="form-control" placeholder="Description"></textarea>
                    </div>
                    <input type="submit" class="mb-3 btn btn-success w-100" name="save_task" value="Save Task">
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                        $query = "SELECT * FROM task";
                        $result_tasks = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result_tasks)){ ?>
                        <tr>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                            <td class="text-center">
                                <a class="btn btn-secondary" href="edit.php?id=<?php echo $row['id']; ?>"><i class="fa-solid fa-pen"></i></a>
                                <a class="btn btn-danger" href="delete_task.php?id=<?php echo $row['id']; ?>"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('./includes/footer.php') ?>