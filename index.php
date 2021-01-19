<?php
include 'backend/database.php';
?>
<!DOCTYPE html>
<head>
    <title>Mini Projet</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="ajax/ajax.js"></script>
</head>
<body>
    <div class="container">
    <p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Les Utilisateurs</h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Ajouter</span></a>
                        <a href="JavaScript:void(0);" class="btn btn-danger" id="delete_multiple"><i class="material-icons"></i> <span>Supprimer</span></a>                       
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="selectAll">
                                <label for="selectAll"></label>
                            </span>
                        </th>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <th>Téléphone
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                
                <?php
                $result = mysqli_query($conn,"SELECT * FROM utilisateur");
                    $i=1;
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <tr id="<?php echo $row["id"]; ?>">
                <td>
                            <span class="custom-checkbox">
                                <input type="checkbox" class="user_checkbox" data-user-id="<?php echo $row["id"]; ?>">
                                <label for="checkbox2"></label>
                            </span>
                        </td>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row["Nom"]; ?></td>
                    <td><?php echo $row["Prénom"]; ?></td>
                    <td><?php echo $row["Email"]; ?></td>
                    <td><?php echo $row["Adresse"]; ?></td>
                    <td><?php echo $row["Tel"]; ?></td>
                    <td>
                        <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                            <i class="material-icons update" data-toggle="tooltip" 
                            data-id="<?php echo $row["id"]; ?>"
                            data-nom="<?php echo $row["Nom"]; ?>"
                            data-prenom="<?php echo $row["Prénom"]; ?>"
                            data-email="<?php echo $row["Email"]; ?>"
                            data-adresse="<?php echo $row["Adresse"]; ?>"
                            data-tel="<?php echo $row["Tel"]; ?>"
                            title="Edit"></i>
                        </a>
                        <a href="#deleteEmployeeModal" class="delete" data-id="<?php echo $row["id"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" 
                         title="Delete"></i></a>
                    </td>
                </tr>
                <?php
                $i++;
                }
                ?>
                </tbody>
            </table>
            
        </div>
    </div>


    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="user_form">
                    <div class="modal-header">                      
                        <h4 class="modal-title">Ajouter</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">                    
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" id="Nom" name="Nom" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Prénom</label>
                            <input type="text" id="Prénom" name="Prénom" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" id="Email" name="Email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Adresse</label>
                            <input type="text" id="Adresse" name="Adresse" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Téléphone</label>
                            <input type="text" id="Tel" name="Tel" class="form-control" required>
                        </div>                  
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" value="1" name="type">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="button" class="btn btn-success" id="btn-add">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="update_form">
                    <div class="modal-header">                      
                        <h4 class="modal-title">Modifier</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id_u" name="id" class="form-control" required>                 
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" id="Nom" name="Nom" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Prénom</label>
                            <input type="text" id="Prénom" name="Prénom" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" id="Email" name="Email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Adresse</label>
                            <input type="text" id="Adresse" name="Adresse" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Téléphone</label>
                            <input type="text" id="Tel" name="Tel" class="form-control" required>
                        </div>                  
                    </div>
                    <div class="modal-footer">
                    <input type="hidden" value="2" name="type">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="button" class="btn btn-info" id="update">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                        
                    <div class="modal-header">                      
                        <h4 class="modal-title">Supprimer</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id_d" name="id" class="form-control">                  
                        <p>Voulez-vous vraiment supprimer ces enregistrements?</p>
                        <p class="text-warning"><small>Cette action ne peut pas être annulée.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="button" class="btn btn-danger" id="delete">Supprimer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>    