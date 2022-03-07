<?php
include_once "./Database.php";
include "./vol.php";
include "./controler.php"
?>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Espace admin</title>
        <link href="css/a.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
            </ul>
        </nav>
<div class="d-flex justify-content-center">

<!-- form ajouter vol -->

<form action="" method="POST" enctype="multipart/form-data" class="w-50">
    <br>
    <input type="date" name="date_depart" id="date_depart" class="form-control"  placeholder="date_depart" autocomplete="off">

    <input type="time" name="heure_depart" id="heure_depart" class="form-control"  placeholder="heure_depart " autocomplete="off">

    <input type="time" name="heure_arrivee" id="heure_arrivee" class="form-control"  placeholder="heure_arrivee " autocomplete="off">

    <input type="number" name="ref_pilote" id="ref_pilote" class="form-control"  placeholder="ref_pilote " autocomplete="off">

    <input type="number" name="ref_avion" id="ref_avion" class="form-control"  placeholder="ref_avion " autocomplete="off">

    <div class="d-flex justify-content-center">
        <input  type="submit"  class="btn btn-success" value="ajouter" name="ajouter">
    </div>
</form>
    <?php
    $userC =new controler();

    if(
        isset($_POST['date_depart']) &&
        isset($_POST['heure_depart']) &&
        isset ($_POST['heure_arrivee']) &&
        isset($_POST['ref_pilote'])&&
        isset($_POST['ref_avion'])
        )
        {
            if(
            !empty($_POST['date_depart']) &&
            !empty($_POST['heure_depart']) &&
            !empty($_POST['heure_arrivee']) &&
            !empty($_POST['ref_pilote']) &&
            !empty($_POST['ref_avion']) 
            )
            {
            // user is an object
            $user = new vol(
            $_POST['date_depart'],
            $_POST['heure_depart'],
            $_POST['heure_arrivee'],
            $_POST['ref_pilote'],
            $_POST['ref_avion']
        );
            
        // remplissage et ajout de les attribue  added in database
        $userC->ajouterVol($user);
    }
    else 
    $error = "Missing information";
    
    }
?>

<?php 
$utilisateurC= new controler();
$listeUsers= $utilisateurC->recupererVol();
?>
</div>
            <div class="card-body">
             </div>
        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i id="liste" class="fas fa-table mr-1"></i>
                                Liste des vols
                                <a style="position:absolute; right:4%;" href="exportProduit.php">export</a>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                            <th>date_depart</th>
                                            <th>heure_depart</th>
                                            <th>heure_arrive</th>
                                            <th>ref_pilote</th>
                                            <th>ref_avion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
            // afficher tous les produit dans une booucle

   foreach($listeUsers as $user) {
    ?>
    <tr>
    <td><?php echo $user['date_depart'] ;?></td>
   <td><?php echo $user['heure_depart'] ;?></td>
   <td><?php echo $user['heure_arrivee'] ;?></td>
   <td><?php echo $user['ref_pilote']; ?></td>
   <td><?php echo $user['ref_avion']; ?></td>
   <td>
  
            </td>
         
                                            </tr>
                                            <?php } ?>
                                            
                                            

                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
</div>
