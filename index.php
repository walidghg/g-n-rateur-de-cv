<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Générateur de CV Pro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container-fluid">
    <div class="row">
        
        <div class="col-md-6 p-4 overflow-auto" id="form-section">
            <h2 class="mb-4">Éditeur de CV</h2>
            
            <form action="export.php" method="POST" id="cv-form" enctype="multipart/form-data">
                
                <div class="row mb-4 bg-white p-3 border rounded mx-1 shadow-sm">
                    <div class="col-md-6">
                        <label class="form-label fw-bold small">Photo de profil</label>
                        <input type="file" name="photo" id="input-photo" class="form-control form-control-sm" accept="image/*">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold small">Couleur principale</label>
                        <input type="color" name="couleur" id="input-color" class="form-control form-control-color w-100" value="#2c3e50">
                    </div>
                </div>

                <h4 class="text-primary mt-4">Informations Générales</h4>
                <div class="mb-3">
                    <label class="form-label">Prénom</label>
                    <input type="text" name="prenom" id="input-prenom" class="form-control" placeholder="Jean">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nom</label>
                    <input type="text" name="nom" id="input-nom" class="form-control" placeholder="Dupont">
                </div>
                <div class="mb-3">
                    <label class="form-label">Titre du profil</label>
                    <input type="text" name="titre" id="input-titre" class="form-control" placeholder="Développeur Web">
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" id="input-email" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Téléphone</label>
                        <input type="tel" name="tel" id="input-tel" class="form-control">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" id="input-description" class="form-control" rows="4"></textarea>
                </div>

                <hr>

                <h4 class="text-primary mt-4">Expériences</h4>
                <div id="experiences-container">
                    <div class="experience-item card p-3 mb-3 bg-light">
                        <div class="mb-2">
                            <input type="text" name="experiences[0][poste]" class="form-control input-exp-poste" placeholder="Poste">
                        </div>
                        <div class="mb-2">
                            <input type="text" name="experiences[0][entreprise]" class="form-control input-exp-ent" placeholder="Entreprise">
                        </div>
                        <div class="row mb-2">
                            <div class="col-6"><input type="date" name="experiences[0][debut]" class="form-control input-exp-date-deb"></div>
                            <div class="col-6"><input type="date" name="experiences[0][fin]" class="form-control input-exp-date-fin"></div>
                        </div>
                        <textarea name="experiences[0][desc]" class="form-control input-exp-desc" rows="2" placeholder="Missions..."></textarea>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-primary btn-sm" id="btn-add-exp">+ Ajouter</button>

                <hr>

                <h4 class="text-primary mt-4">Formations</h4>
                <div id="formations-container">
                    <div class="formation-item card p-3 mb-3 bg-light">
                        <div class="mb-2">
                            <input type="text" name="formations[0][diplome]" class="form-control input-form-diplome" placeholder="Diplôme">
                        </div>
                        <div class="mb-2">
                            <input type="text" name="formations[0][ecole]" class="form-control input-form-ecole" placeholder="École">
                        </div>
                        <div class="row mb-2">
                            <div class="col-6"><input type="date" name="formations[0][debut]" class="form-control input-form-date-deb"></div>
                            <div class="col-6"><input type="date" name="formations[0][fin]" class="form-control input-form-date-fin"></div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-primary btn-sm" id="btn-add-formation">+ Ajouter</button>

                <hr>

                <h4 class="text-primary mt-4">Compétences</h4>
                <div id="competences-container">
                    <div class="competence-item row mb-2">
                        <div class="col-7">
                            <input type="text" name="competences[0][nom]" class="form-control input-skill-nom" placeholder="Compétence">
                        </div>
                        <div class="col-4">
                            <select name="competences[0][niveau]" class="form-select input-skill-niveau">
                                <option value="Débutant">Débutant</option>
                                <option value="Intermédiaire">Intermédiaire</option>
                                <option value="Expert">Expert</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <button type="button" class="btn btn-outline-danger btn-sm delete-skill">X</button>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-primary btn-sm" id="btn-add-skill">+ Ajouter</button>

                <hr>

                <div class="d-grid gap-2 mt-5 mb-5">
                    <button type="submit" class="btn btn-success btn-lg">Télécharger le PDF</button>
                </div>
            </form>
        </div>

        <div class="col-md-6 p-4 d-flex justify-content-center" id="preview-section">
            <div class="cv-paper w-100" id="cv-preview">
                
                <div class="text-center mb-4">
                    <div id="preview-photo-container"></div>
                    
                    <h1 class="text-uppercase mb-0"><span id="preview-prenom">Prénom</span> <span id="preview-nom">NOM</span></h1>
                    <h3 class="text-muted" id="preview-titre">Titre du poste</h3>
                </div>
                
                <div class="text-center mb-4 small">
                    <span id="preview-email">email@exemple.com</span> | <span id="preview-tel">06 00 00 00 00</span>
                </div>

                <div class="mb-4">
                    <h5 class="border-bottom pb-2">Profil</h5>
                    <p id="preview-description">Votre description apparaîtra ici...</p>
                </div>

                <div class="mb-4">
                    <h5 class="border-bottom pb-2">Expériences</h5>
                    <div id="preview-experiences"></div>
                </div>

                <div class="mb-4">
                    <h5 class="border-bottom pb-2">Formations</h5>
                    <div id="preview-formations"></div>
                </div>

                <div class="mb-4">
                    <h5 class="border-bottom pb-2">Compétences</h5>
                    <ul id="preview-competences" class="list-unstyled"></ul>
                </div>
                
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>