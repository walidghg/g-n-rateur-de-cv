<?php

if (empty($_POST)) {
    header('Location: index.php');
    exit;
}
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$poste = $_POST['poste'];
$email = $_POST['email'];
$desc = $_POST['desc'];

$ent_nom = $_POST['ent_nom'];
$ent_poste = $_POST['ent_poste'];
$ent_debut = $_POST['ent_debut'];
$ent_fin = $_POST['ent_fin'];


$ecole = $_POST['ecole'];
$diplome = $_POST['diplome'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>CV de <?php echo $prenom; ?></title>
    <style>
        body {
            background-color: #555;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            padding: 30px;
        }
        .page {
            background: white;
            width: 21cm;
            min-height: 29.7cm;
            padding: 2cm;
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
        }
        .header {
            border-bottom: 2px solid #333;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
        h1 { margin: 0; text-transform: uppercase; color: #2c3e50; }
        h2 { font-size: 18px; color: #666; margin-top: 5px; }
        .contact { font-size: 14px; color: #888; margin-top: 10px; }
        
        .section-title {
            color: #2c3e50;
            border-bottom: 1px solid #ccc;
            margin-top: 30px;
            margin-bottom: 15px;
            text-transform: uppercase;
            font-weight: bold;
        }
        .item { margin-bottom: 15px; }
        .date { float: right; font-size: 12px; color: #666; }
        .bold { font-weight: bold; }
    </style>
</head>
<body>

    <div class="page">
        <div class="header">
            <h1><?php echo $prenom . " " . $nom; ?></h1>
            <h2><?php echo $poste; ?></h2>
            <div class="contact">Email : <?php echo $email; ?></div>
        </div>

        <div class="section">
            <div class="section-title">Profil</div>
            <p><?php echo $desc; ?></p>
        </div>

        <div class="section">
            <div class="section-title">Expérience Professionnelle</div>
            <?php if(!empty($ent_nom)): ?>
                <div class="item">
                    <span class="date">Du <?php echo $ent_debut; ?> au <?php echo $ent_fin; ?></span>
                    <div class="bold"><?php echo $ent_poste; ?></div>
                    <div>Chez <?php echo $ent_nom; ?></div>
                </div>
            <?php else: ?>
                <p>Aucune expérience renseignée.</p>
            <?php endif; ?>
        </div>

        <div class="section">
            <div class="section-title">Formation</div>
            <?php if(!empty($ecole)): ?>
                <div class="item">
                    <div class="bold"><?php echo $diplome; ?></div>
                    <div><?php echo $ecole; ?></div>
                </div>
            <?php else: ?>
                <p>Aucune formation renseignée.</p>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>