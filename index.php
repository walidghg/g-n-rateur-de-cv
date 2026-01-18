<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Générateur de CV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f0f0; padding: 20px; }
        .container { background: white; padding: 30px; border-radius: 10px; max-width: 800px; }
        h1 { text-align: center; color: #333; margin-bottom: 30px; }
    </style>
</head>
<body>

<div class="container">
    <h1>Créer mon CV</h1>
    
    <form action="cv.php" method="POST">
        
        <h3>Infos personnelles</h3>
        <div class="mb-3">
            <label>Prénom</label>
            <input type="text" name="prenom" class="form-control" placeholder="Ex: Jean" required>
        </div>
        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" placeholder="Ex: Dupont" required>
        </div>
        <div class="mb-3">
            <label>Poste visé</label>
            <input type="text" name="poste" class="form-control" placeholder="Ex: Développeur Web">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="desc" class="form-control" rows="3"></textarea>
        </div>

        <hr>

        <h3>Expérience Pro</h3>
        <div class="mb-3">
            <label>Nom de l'entreprise</label>
            <input type="text" name="ent_nom" class="form-control">
        </div>
        <div class="mb-3">
            <label>Poste occupé</label>
            <input type="text" name="ent_poste" class="form-control">
        </div>
        <div class="row">
            <div class="col">
                <label>Date début</label>
                <input type="date" name="ent_debut" class="form-control">
            </div>
            <div class="col">
                <label>Date fin</label>
                <input type="date" name="ent_fin" class="form-control">
            </div>
        </div>

        <hr>

        <h3>Formation</h3>
        <div class="mb-3">
            <label>École</label>
            <input type="text" name="ecole" class="form-control">
        </div>
        <div class="mb-3">
            <label>Diplôme</label>
            <input type="text" name="diplome" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary w-100 mt-4">Voir mon CV</button>
    </form>
</div>

</body>
</html>