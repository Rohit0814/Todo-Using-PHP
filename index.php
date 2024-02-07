<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
</head>

<body>


    <div style="display:flex; justify-content:center; background:#010857; margin-bottom:25px">
        <span style="font-size:30px; text-align:center;color:white; font-weight:bolder; padding:10px 0px">Todo List</span>
    </div>

    <div class="container">
        <div class="card" style="margin-bottom:20px">
            <div class="card-header">
                Create Todo
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <form method="post" action="create.php">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Title</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" value="" rows="3"></textarea>
                        </div>
                        <button type="submit" name="submit_btn" class="btn btn-primary">Submit</button>
                    </form>
                </blockquote>
            </div>
        </div>



        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">TimeStamp</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $server_name = "localhost";
                $user_name = "root";
                $password = "";
                $database_name = "todolist";

                $conn = mysqli_connect($server_name, $user_name, $password, $database_name);
                $sql = "select * from todo";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
            <th scope='row'>" . $row["id"] . "</th>
            <td>" . $row["title"] . "</td>
            <td>" . $row["description"] . "</td>
            <td>" . $row["timeStamp"] . "</td>
            <td>
              <button type='button' class='btn btn-primary updateData' data-bs-toggle='modal' data-bs-target='#exampleModal'>Update</button>
              <button type='button' class='btn btn-danger'>Delete</button>
          </td>
          </tr>";
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Title</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="description" value="" rows="3"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        let table = new DataTable('#myTable');


        let updateData=document.getElementsByClassName('updateData');
        updateData.forEach((ele) => {
            ele.addEventListener('click',(event)=>{
                let tr=event.target.parentNode.parentNode;
                let title = tr.getElementsBtTagName("td")[0].innerHTML;
                console.log(title);
            });
        });
    </script>
</body>

</html>