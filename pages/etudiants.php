<?php require("haut_de_page.php");?>
<?php if ($_SESSION['valider']==false) {header('Location: ../index.php'); exit();}?>      
<body>
    <?php include('nav.php');?>
    <section class="container-fluid sect">
        <!-- Début formulaire -->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 MonForm">
                
                <form <?php if(isset($_POST['Batiment']))echo'action="traitement.php?title=traitement"'; else echo'action=""';?> method="POST" id='MonForm'> 
                <?php $form=new Form($_POST);?>
                <?php ?>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <?php $form->label('','Nom','col-md-2 espace pourLabel')?> 
                        <?php $form->input('text','nom','form-control col-md-7 espace','Nom','','',true);?>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <?php $form->label('','Prénom','col-md-2 espace pourLabel')?> 
                        <?php $form->input('text','prenom','form-control col-md-7 espace','Prénom','','',true);?>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <?php $form->label('','Naissance','col-md-2 espace pourLabel')?> 
                        <?php $form->input('date','naiss','form-control col-md-7 espace','',true);?>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                       <?php $form->label('','Email','col-md-2 espace pourLabel')?> 
                        <?php $form->input('email','email','form-control col-md-7 espace','Email','','',true);?>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                       <?php $form->label('','Téléphone','col-md-2 espace pourLabel')?> 
                        <?php $form->input('number','tel','form-control col-md-7 espace','Téléphone','','',true);?>
                    </div>
                    <div class="row">
                        <div class=""></div>
                        <?php
                        $checked='';
                        if (isset($_POST['choix']) && $_POST['choix']=='Loger') $checked='" checked ';
                        ?>
                        <?php $form->label('','Non Boursier','col-md-3 espace pourLabel centrerDroite')?> 
                        <?php $form->input('radio','choix','form-control col-md-1 espace btRadio ','','Non Boursier','nonBoursier','','afficherPourNonBoursier()');?>
                        <?php $form->label('','Boursier','col-md-2 espace pourLabel centrerDroite ')?>
                        <?php $form->input('radio','choix','form-control col-md-1 espace btRadio','','Boursier','Boursier','','afficherPourBoursier()');?>
                        <?php $form->label('','Loger','col-md-2 espace pourLabel centrerDroite')?>
                        <?php $form->input('radio','choix','form-control col-md-1 espace btRadio '.$checked,'','Loger','Loger','','afficherPourLoge()');?>
                    </div>
                    <div class="row" id='typeBourse'>
                        <div class="col-md-1"></div>
                       <?php $form->label('','Bourse','col-md-2 espace pourLabel')?>
                        <?php $tab_option=EtudiantService::find('Categorie_Bourse','Libelle');
                        $form->select($tab_option,'type_bour','form-control col-md-7 espace');?>
                    </div>
                    <div class="row" id='Batiment'>
                        <div class="col-md-1"></div>
                        <?php $form->label('','Batiment','col-md-2 espace pourLabel')?>
                        <?php if(isset($_POST['Batiment'])) $cocher=$_POST['Batiment']; else $cocher='';?>
                       <?php Affichage::selectBat('Batiment','form-control col-md-7 espace',$cocher)?> 
                    </div>
                    <?php if(isset($_POST['Batiment']) && $_POST['choix']=='Loger'){?>
                    <div class="row" id='Chambre'>
                        <div class="col-md-1"></div>
                        <?php $form->label('','Chambre','col-md-2 espace pourLabel')?> 
                       <?php Affichage::selectChambre('chambre','form-control col-md-7 espace',$_POST['Batiment']);?> 
                    </div>
                    <?php }?>
                    <div class="row" id='adresse'>
                        <div class="col-md-1"></div>
                       <?php $form->label('','Adresse','col-md-2 espace pourLabel')?> 
                        <?php $form->input('text','adresse','form-control col-md-7 espace','Adresse');?>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>                        
                        <?php $form->submit('valider_ajout_etudiant','Enregistrer','form-control col-md-5 espace mb');?>
                    </div>
                </form>
            </div>
        </div>
        <!-- Fin formulaire -->
        <div class="Mes_tableaux">
            <?php
            $titres=array('Matricule','Nom','Prenom','Naissance','Email','Telephone','Statut','Modifier','Supprimer');
            //$class=array('col-md-1 text-center','col-md-2 text-center','col-md-2 text-center','col-md-1 text-center','col-md-3 text-center','col-md-1 text-center','col-md-1 text-center','col-md-1 text-center');
            $etudiants=EtudiantService::find('Etudiants');
            Affichage::tableau_etu($titres,$etudiants,'display nowrap');
            ?>
        </div>
        <!-- Fin tableau -->
    </section>
</body>
<?php 
    if(isset($_GET["matricule_sup"])){
        $sonId=$_GET["matricule_sup"];
        $sup='matricule_sup='.$sonId
        ?>
        <script>
            if(confirm("Confirmer la suppression ?")){
                document.location.href = "traitement.php?title=traitement&<?php echo "$sup"; ?>"
            }
            else{
                document.location.href = "etudiants.php?title=Etudiants"
            }
        </script>
        <?php
    }
    require("footer.php");
?>