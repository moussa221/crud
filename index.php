<?php
include_once "./connexion.php";
$object = new Connexion();
$connexion = $object->Connect();

$query = "SELECT  id, note_name, note_description FROM notesphp";
$result = $connexion->prepare($query);
$result->execute();
$data = $result->fetchALL(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
        <title>PHP CRUD</title>
    </head>
    <body>
        <nav class="navbar text-white bg-dark">
            <span class="navbar-brand mb-0 h1">Youtube channel</span>
        </nav>
        <br>
        <div class="container">
            <button class="btn btn-primary" type="button" id="new" data-toggle="modal" data-target="#exampleModal">
            New Note <i class="far fa-plus-square"></i></button>
            <br><br>
            <table id="tableNotes" class="table mx-auto">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Note Name</th>
                        <th scope="col">Note Description</th>
                        <th scope="col">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach($data as $note){
                    ?>
                        <tr>
                            <td><?php echo $note['id']?></td>
                            <td><?php echo $note['note_name']?></td>
                            <td><?php echo $note['note_description']?></td>
                            <td></td>
                        </tr>
                    <?php 
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form id="formNotes">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" id="noteName" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control" id="noteDescription" placeholder="Description">
                            </div>
                            <button type="submit" class="btn btn-primary">Send <i class="far fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>   
        <script src="main.js"></script>
        
    </body>
</html>


