<?php
session_start();
$user = $_SESSION['user'];
$userfirstname = $user['userfirstname'];
$uid = $user['uid'];
$listeid = $_SESSION['listid'];

/*
 * Générer un PDF à partir d'une base de données
 */

require("config/config.php");

/*
 * Début de la temporisation de sortie
 */
ob_start();
?>

<page backtop="5%" backbottom="5%" backleft="5%" backright="5%">

    <h1 style="text-align:center">Liste de Souhaits</h1>

    <table style="width:100%;border:1px dashed">
      <tr>
        <th style="width:45%">Nom du souhait</th>
        <th style="width:45%">Description du souhait</th>
      </tr>


        <?php

        /*
         * Requête SQL pour récupérer notre liste de cadeaux.
         */

         $reponse = $connexion->query('SELECT libelleliste, descriptifliste FROM liste WHERE listeid =' . $listeid);
         $donnees = $reponse->fetch();

         ?>

         <table class="table table-striped- table-condensed">
           <div class="panel-heading">
             <h3 class="panel-title">Les informations de la liste</h3>
           </div>
           <thead>
             <tr>
               <th>Titre de la liste</th>
               <th>Message accompagnant la liste</th>
             </tr>
           </thead>
           <tbody>
               <tr>
                 <td><?php echo htmlspecialchars ($donnees['libelleliste']); ?></td>
                 <td><?php echo htmlspecialchars ($donnees['descriptifliste']); ?></td>
               </tr>
             </tbody>
           </table>
         </div>
         <div class="panel panel-primary">
           <table class="table table-striped- table-condensed">
             <div class="panel-heading">
               <h3 class="panel-title">Les souhaits de la liste</h3>
             </div>
             <thead>
               <tr>
                 <th>Nom du souhait</th>
                 <th>Description du souhait</th>
               </tr>
             </thead>
             <tbody>
             <?php
             $req = $connexion->query('SELECT * FROM cadeau WHERE listeid =' . $listeid);
             while($gift = $req->fetch()) { ?>
               <tr>
                 <td><?php echo htmlspecialchars($gift['libellecadeau']); ?></td>
                 <td><?php echo htmlspecialchars ($gift['descriptifcadeau']); ?></td>
               </tr>
               <?php  } ?>
               </tbody>
             </table>

    </table>
</page>

<?php

/*
 * $content récupére toutes les données mises en mémoire.
 */

$content = ob_get_clean();

include('html2pdf.class.php');

/*
 * On instancie notre constructeur
 * On affiche le contenu
 * On génére notre PDF
 */

$pdf = new HTML2PDF('P','A4','fr','true','UTF-8');
$pdf->writeHTML($content);
$pdf->Output('liste.pdf');

?>
