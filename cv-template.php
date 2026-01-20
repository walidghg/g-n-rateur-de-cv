<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.5; color: #333; }
        .header { text-align: center; border-bottom: 2px solid #ddd; padding-bottom: 20px; margin-bottom: 30px; }
        h1 { margin: 0; text-transform: uppercase; font-size: 26px; color: <?php echo $couleur; ?>; }
        h3 { margin: 5px 0; font-weight: normal; color: #666; font-size: 16px; }
        .contact-info { font-size: 12px; margin-top: 10px; color: #555; }
        
        .photo-profil { 
            width: 100px; 
            height: 100px; 
            border-radius: 50%; 
            object-fit: cover; 
            border: 4px solid <?php echo $couleur; ?>; 
            margin-bottom: 15px; 
        }

        .section-title { 
            text-transform: uppercase; 
            font-weight: bold; 
            border-bottom: 2px solid <?php echo $couleur; ?>; 
            padding-bottom: 5px; 
            margin-top: 30px; 
            margin-bottom: 15px; 
            color: <?php echo $couleur; ?>; 
            font-size: 16px;
        }
        
        .item { margin-bottom: 20px; }
        .item-header { width: 100%; margin-bottom: 5px; }
        .left-col { float: left; width: 70%; font-weight: bold; font-size: 14px; }
        .right-col { float: right; width: 25%; text-align: right; color: #777; font-size: 12px; }
        .clear { clear: both; }
        .description { color: #444; margin-top: 5px; text-align: justify; }
        .skill-badge { display: inline-block; background: #eee; padding: 4px 10px; border-radius: 4px; margin-right: 5px; margin-bottom: 5px; font-size: 12px; }
    </style>
</head>
<body>

    <div class="header">
        <?php if($photo_base64): ?>
            <img src="<?php echo $photo_base64; ?>" class="photo-profil">
        <?php endif; ?>

        <h1><?php echo strtoupper($nom_complet); ?></h1>
        <h3><?php echo $titre; ?></h3>
        <div class="contact-info">
            <?php echo $email; ?> | <?php echo $tel; ?>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Profil</div>
        <p><?php echo nl2br($description); ?></p>
    </div>

    <?php if(!empty($experiences)): ?>
    <div class="section">
        <div class="section-title">Expériences Professionnelles</div>
        <?php foreach($experiences as $exp): ?>
            <div class="item">
                <div class="item-header">
                    <div class="left-col">
                        <?php echo $exp['poste']; ?> <span style="font-weight:normal; color:#666;">chez</span> <?php echo $exp['entreprise']; ?>
                    </div>
                    <div class="right-col">
                        <?php echo $exp['debut']; ?> / <?php echo $exp['fin']; ?>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="description"><?php echo nl2br($exp['desc']); ?></div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <?php if(!empty($formations)): ?>
    <div class="section">
        <div class="section-title">Formations</div>
        <?php foreach($formations as $form): ?>
            <div class="item">
                <div class="item-header">
                    <div class="left-col"><?php echo $form['diplome']; ?></div>
                    <div class="right-col"><?php echo $form['debut']; ?> - <?php echo $form['fin']; ?></div>
                    <div class="clear"></div>
                </div>
                <div style="color:#666;"><?php echo $form['ecole']; ?></div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <?php if(!empty($competences)): ?>
    <div class="section">
        <div class="section-title">Compétences</div>
        <?php foreach($competences as $skill): ?>
            <span class="skill-badge"><?php echo $skill['nom']; ?> (<?php echo $skill['niveau']; ?>)</span>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

</body>
</html>