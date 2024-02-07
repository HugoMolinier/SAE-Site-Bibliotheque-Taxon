<div class= "Formulaire_recherche">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" class='FormRecherche' id='FormRecherche'>
                
                    <?php if ($rechercheES != 0 && $rechercheES != "Collection_Utilisateur"): ?>
                        <input type="text" class="Recherche_Input" name="query" placeholder="Rechercher..." value="<?= $query ?>" />
                    <?php endif; ?>

                    <?php if ($rechercheES == 0): ?>
                        <input type='hidden' name='link' value= "<?= ModelRecherche::generateLink($options) ?>" />
                    <?php endif; ?>

                    <?php if ($rechercheES == 0 ||$rechercheES == 1): ?>
                        <label class="checkbox">
                            <input type="checkbox" id="rechercheES" name="rechercheES" <?php if ($rechercheES == 1) echo 'checked'; ?> onchange="updateFormSubmit()"/>
                            <p>Recherche avancée </p>
                        </label>
                    <?php endif; ?>


                    <?php if ($rechercheES == 'Collection_membre'): ?>
                        <label class="checkbox">
                            <input type="checkbox" name="collection_vide" value="0" <?php echo ($collection_vide == "0" ) ? 'checked' : ''; ?>>
                            <p> Afficher les Collections vide </p>
                        </label>
                    <?php endif; ?>
                    <?php if ($rechercheES == 'Collection_Utilisateur'): ?>
                        <input type='hidden' name='Id_Collection' value= "<?= $id ?>" />
                        <h4> Par date d'ajout :</h4>
                        <label class="radio">
                            <input type="radio"  name="ordre_date" value="DESC" <?= $ordre_date === 'DESC' ? 'checked' : ''; ?> />
                            <p>Plus récent</p>
                        </label>
                        <label class="radio">
                            <input type="radio" name="ordre_date" value="ASC" <?= $ordre_date === 'ASC' ? 'checked' : ''; ?> />
                            <p>Moins récent</p>
                        </label>
                    <?php endif; ?>
                    <?php if ($rechercheES == 'Collection_membre'|| $rechercheES == 'Collection_Utilisateur'): ?>
                        <h4> Ordre Alphabétique :</h4>
                        <label class="radio">
                            <input type="radio"  name="ordreAlph" value="ASC" <?= $ordre_alphabétique === 'ASC' ? 'checked' : ''; ?> />
                            <p>Croissant</p>
                        </label>
                        <label class="radio">
                            <input type="radio" name="ordreAlph" value="DESC" <?= $ordre_alphabétique === 'DESC' ? 'checked' : ''; ?> />
                            <p>Décroissant</p>
                        </label>
                    <?php endif; ?>
                    <?php if ($rechercheES == 'Collection_membre'): ?>
                        <h4> Par nombre d'éspèce :</h4>
                        <label class="radio">
                            <input type="radio" name="ordreES" value="ASC" <?= $ordre_nombre_éspèce == 'ASC' ? 'checked' : ''; ?> />
                            <p>Croissant</p>
                        </label>
                        <label class="radio">
                            <input type="radio" name="ordreES" value="DESC" <?= $ordre_nombre_éspèce == 'DESC' ? 'checked' : ''; ?> />
                            <p>Décroissant</p>
                        </label>
                    <?php endif; ?>

                    <?php if ($rechercheES == 0 || $rechercheES == 1|| $rechercheES == 'Collection_Utilisateur'): ?>
                        <h4> Langue du nom :</h4>
                    <label class="radio">
                        <input type="radio" id="radio1" name="lang" value="SC" <?= $lang === 'SC'|| $lang== null ? 'checked' : ''; ?> />
                        <p>Nom Scientifique</p>
                    </label>
                    <label class="radio">
                        <input type="radio" id="radio2" name="lang" value="FR" <?= $lang === 'FR'  ? 'checked' : ''; ?> />
                        <p>Nom Français</p>
                    </label>
                    <label class="radio">
                        <input type="radio" id="radio3" name="lang" value="EN" <?= $lang === 'EN' ? 'checked' : ''; ?> />
                        <p>Nom Anglais</p>
                    </label>
                    <?php endif; ?>
                    <?php if ($rechercheES == 1): ?>
                        <h4> Habitat :</h4>
                        <select name="habitats" class=select >
                        <option value="">Choisir un habitat</option>
                        <option value="1" <?= $habitas == 1  ? 'selected' : ''; ?>>Marin</option>
                        <option value="2" <?= $habitas == 2  ? 'selected' : ''; ?>>Eau douce</option>
                        <option value="3" <?= $habitas == 3  ? 'selected' : ''; ?>>Terrestre</option>
                        <option value="4" <?= $habitas == 4  ? 'selected' : ''; ?>>Marin & eau douce</option>
                        <option value="5" <?= $habitas == 5  ? 'selected' : ''; ?>>Marin & terrestre</option>
                        <option value="6" <?= $habitas == 6  ? 'selected' : ''; ?>>Eau saumâtre</option>
                        <option value="8" <?= $habitas == 8  ? 'selected' : ''; ?>>Continental</option>
                        </select>
                        <?php endif; ?>
                    <input type="submit" class="Button_Recherche" value="Rechercher" />
                </form>

                <!-- Formulaire additionnel pour les données de la checkbox -->
            <form id="additionalForm" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" id="additionalCheckbox" name="rechercheES" value="<?= $rechercheES ?>" />
                </form>

            
</div>
    
        