<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Générateur de CV Pro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container-fluid">
    <div class="row">
        
        <div class="col-md-6 p-4 overflow-auto" id="form-section">
            
            <div class="d-flex align-items-center mb-5">
                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                    <i class="fa-solid fa-file-pdf fa-xl"></i>
                </div>
                <div>
                    <h2 class="m-0 fw-bold" style="font-family: 'Montserrat';">CV Generator</h2>
                    <p class="text-muted m-0 small">Créez votre CV professionnel</p>
                </div>
            </div>
            
            <form action="export.php" method="POST" id="cv-form" enctype="multipart/form-data">
                
                <div class="mb-4 bg-white p-3 border rounded shadow-sm mx-1">
                    <label class="form-label fw-bold small"><i class="fa-solid fa-camera me-2"></i>Ma Photo</label>
                    <input type="file" name="photo" id="input-photo" class="form-control" accept="image/*">
                </div>

                <h4 class="text-primary mt-4"><i class="fa-solid fa-user me-2"></i>Infos Générales</h4>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Prénom</label>
                        <input type="text" name="prenom" id="input-prenom" class="form-control" placeholder="Jean">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nom</label>
                        <input type="text" name="nom" id="input-nom" class="form-control" placeholder="Dupont">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Titre du profil</label>
                    <input type="text" name="titre" id="input-titre" class="form-control" placeholder="Développeur Web">
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" id="input-email" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Téléphone</label>
                        <input type="tel" name="tel" id="input-tel" class="form-control">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" id="input-description" class="form-control" rows="3" placeholder="Présentez-vous..."></textarea>
                </div>

                <hr>

                <h4 class="text-primary mt-4"><i class="fa-solid fa-briefcase me-2"></i>Expériences</h4>
                <div id="experiences-container">
                    <div class="experience-item card p-3 mb-3">
                        <div class="mb-2">
                            <input type="text" name="experiences[0][poste]" class="form-control input-exp-poste" placeholder="Poste occupé">
                        </div>
                        <div class="mb-2">
                            <input type="text" name="experiences[0][entreprise]" class="form-control input-exp-ent" placeholder="Entreprise">
                        </div>
                        <div class="row mb-2">
                            <div class="col-6"><input type="date" name="experiences[0][debut]" class="form-control input-exp-date-deb"></div>
                            <div class="col-6"><input type="date" name="experiences[0][fin]" class="form-control input-exp-date-fin"></div>
                        </div>
                        <textarea name="experiences[0][desc]" class="form-control input-exp-desc" rows="2" placeholder="Vos missions..."></textarea>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-primary btn-sm mb-4" id="btn-add-exp">
                    <i class="fa-solid fa-plus"></i> Ajouter une expérience
                </button>

                <hr>

                <h4 class="text-primary mt-4"><i class="fa-solid fa-graduation-cap me-2"></i>Formations</h4>
                <div id="formations-container">
                    <div class="formation-item card p-3 mb-3">
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
                <button type="button" class="btn btn-outline-primary btn-sm mb-4" id="btn-add-formation">
                    <i class="fa-solid fa-plus"></i> Ajouter une formation
                </button>

                <hr>

                <h4 class="text-primary mt-4"><i class="fa-solid fa-star me-2"></i>Compétences</h4>
                <div id="competences-container">
                    <div class="competence-item row mb-2 align-items-center">
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
                            <button type="button" class="btn btn-outline-danger btn-sm rounded-circle delete-skill" style="width:30px;height:30px;padding:0;">X</button>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-primary btn-sm mb-5" id="btn-add-skill">
                    <i class="fa-solid fa-plus"></i> Ajouter une compétence
                </button>

                <div class="d-grid gap-2 pb-5">
                    <button type="submit" class="btn btn-success btn-lg py-3 shadow-lg">
                        <i class="fa-solid fa-download me-2"></i> TÉLÉCHARGER LE PDF
                    </button>
                </div>
            </form>
        </div>

        <div class="col-md-6 p-4 d-flex justify-content-center" id="preview-section">
            <div class="cv-paper w-100" id="cv-preview">
                
                <div class="text-center mb-4 pt-3">
                    <div id="preview-photo-container"></div>
                    
                    <h1 class="text-uppercase mb-0 fw-bold"><span id="preview-prenom">Prénom</span> <span id="preview-nom">NOM</span></h1>
                    <h3 class="text-muted mt-2" id="preview-titre">Titre du poste</h3>
                </div>
                
                <div class="text-center mb-4 small text-muted">
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