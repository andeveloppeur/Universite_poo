<?php require("haut_de_page.php");?>    
<body>
    <?php include('nav.php');?>
    <section class="container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 MonForm">
                <form action="" method="POST"> <?php $form=new Form($_POST);?>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <?php $form->label('','Nom','col-md-2 espace pourLabel')?> 
                        <?php $form->input('text','nom','form-control col-md-7 espace','Nom');?>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                       <?php $form->label('','Prénom','col-md-2 espace pourLabel')?> 
                        <?php $form->input('text','prenom','form-control col-md-7 espace','Prénom');?>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <?php $form->label('','Naissance','col-md-2 espace pourLabel')?> 
                        <?php $form->input('date','naiss','form-control col-md-7 espace','');?>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                       <?php $form->label('','Email','col-md-2 espace pourLabel')?> 
                        <?php $form->input('email','email','form-control col-md-7 espace','Email');?>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                       <?php $form->label('','Téléphone','col-md-2 espace pourLabel')?> 
                        <?php $form->input('number','tel','form-control col-md-7 espace','Téléphone');?>
                    </div>
                    <div class="row">
                        <div class=""></div>
                       <?php $form->label('','Non Boursier','col-md-3 espace pourLabel centrerDroite')?> 
                        <?php $form->input('radio','choix','form-control col-md-1 espace','','Non Boursier');?>
                        <?php $form->label('','Boursier','col-md-2 espace pourLabel centrerDroite')?>
                        <?php $form->input('radio','choix','form-control col-md-1 espace','','Boursier');?>
                        <?php $form->label('','Loger','col-md-2 espace pourLabel centrerDroite')?>
                        <?php $form->input('radio','choix','form-control col-md-1 espace','','Loger');?>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                       <!-- <?php //$form->label('','Bourse','col-md-2 espace pourLabel')?>  -->
                        <!-- <?php //$form->input('number','type_bour','form-control col-md-7 espace','Liste déroulant pour type de bourse');?> -->
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                       <!-- <?php //$form->label('','Chambre','col-md-2 espace pourLabel')?>  -->
                        <!-- <?php //$form->input('number','chambre','form-control col-md-7 espace','Liste déroulant pour chambre');?> -->
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                       <!-- <?php //$form->label('','Adresse','col-md-2 espace pourLabel')?>  -->
                        <!-- <?php //$form->input('number','adresse','form-control col-md-7 espace','Adresse');?> -->
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>                        
                        <?php $form->submit('valider','Envoyer','form-control col-md-5 espace mb');?>
                    </div>
                    
                </form>
            </div>
        </div>
    </section>
</body>
<?php require("footer.php");?>