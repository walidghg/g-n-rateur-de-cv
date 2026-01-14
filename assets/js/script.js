document.addEventListener('DOMContentLoaded', function() {

    const form = document.getElementById('cv-form');
    
    // Changement de la couleur
    document.getElementById('input-color').addEventListener('input', function(e) {
        document.documentElement.style.setProperty('--primary-color', e.target.value);
    });

    // Affichage Photo
    document.getElementById('input-photo').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const container = document.getElementById('preview-photo-container');
                container.innerHTML = `<img src="${e.target.result}" style="width:100px;height:100px;border-radius:50%;object-fit:cover;border:3px solid var(--primary-color);margin-bottom:15px;">`;
            }
            reader.readAsDataURL(file);
        }
    });

    form.addEventListener('input', updatePreview);

    function updatePreview() {
        document.getElementById('preview-prenom').textContent = document.getElementById('input-prenom').value || 'Prénom';
        document.getElementById('preview-nom').textContent = document.getElementById('input-nom').value || 'NOM';
        document.getElementById('preview-titre').textContent = document.getElementById('input-titre').value || 'Titre du poste';
        document.getElementById('preview-email').textContent = document.getElementById('input-email').value || 'email@exemple.com';
        document.getElementById('preview-tel').textContent = document.getElementById('input-tel').value || '06 00 00 00 00';
        document.getElementById('preview-description').textContent = document.getElementById('input-description').value || 'Votre description...';

        // Expériences
        const expContainer = document.getElementById('preview-experiences');
        expContainer.innerHTML = '';
        document.querySelectorAll('.experience-item').forEach(item => {
            const poste = item.querySelector('.input-exp-poste').value;
            const ent = item.querySelector('.input-exp-ent').value;
            const deb = item.querySelector('.input-exp-date-deb').value;
            const fin = item.querySelector('.input-exp-date-fin').value;
            const desc = item.querySelector('.input-exp-desc').value;
            
            if(poste || ent) {
                expContainer.innerHTML += `
                    <div class="mb-3">
                        <strong>${poste}</strong> chez <em>${ent}</em>
                        <div class="text-muted small">${deb} - ${fin}</div>
                        <p>${desc.replace(/\n/g, '<br>')}</p>
                    </div>`;
            }
        });

        // Formations
        const formContainer = document.getElementById('preview-formations');
        formContainer.innerHTML = '';
        document.querySelectorAll('.formation-item').forEach(item => {
            const dipl = item.querySelector('.input-form-diplome').value;
            const ecole = item.querySelector('.input-form-ecole').value;
            const deb = item.querySelector('.input-form-date-deb').value;
            const fin = item.querySelector('.input-form-date-fin').value;
            
            if(dipl || ecole) {
                formContainer.innerHTML += `
                    <div class="mb-2">
                        <strong>${dipl}</strong> - <em>${ecole}</em>
                        <div class="text-muted small">${deb} - ${fin}</div>
                    </div>`;
            }
        });

        // Compétences
        const skillContainer = document.getElementById('preview-competences');
        skillContainer.innerHTML = '';
        document.querySelectorAll('.competence-item').forEach(item => {
            const nom = item.querySelector('.input-skill-nom').value;
            const niv = item.querySelector('.input-skill-niveau').value;
            
            if(nom) {
                skillContainer.innerHTML += `<li>${nom} <span class="badge bg-secondary">${niv}</span></li>`;
            }
        });
    }

    // Ajout dynamique (simplifié)
    let counts = { exp: 1, form: 1, skill: 1 };

    document.getElementById('btn-add-exp').onclick = () => {
        const div = document.createElement('div');
        div.className = 'experience-item card p-3 mb-3 bg-light';
        div.innerHTML = `
            <div class="d-flex justify-content-between mb-2">
                <input type="text" name="experiences[${counts.exp}][poste]" class="form-control input-exp-poste" placeholder="Poste">
                <button type="button" class="btn btn-sm btn-outline-danger btn-remove">X</button>
            </div>
            <input type="text" name="experiences[${counts.exp}][entreprise]" class="form-control input-exp-ent mb-2" placeholder="Entreprise">
            <div class="row mb-2">
                <div class="col-6"><input type="date" name="experiences[${counts.exp}][debut]" class="form-control input-exp-date-deb"></div>
                <div class="col-6"><input type="date" name="experiences[${counts.exp}][fin]" class="form-control input-exp-date-fin"></div>
            </div>
            <textarea name="experiences[${counts.exp}][desc]" class="form-control input-exp-desc" rows="2"></textarea>
        `;
        document.getElementById('experiences-container').appendChild(div);
        counts.exp++;
    };

    document.getElementById('btn-add-formation').onclick = () => {
        const div = document.createElement('div');
        div.className = 'formation-item card p-3 mb-3 bg-light';
        div.innerHTML = `
            <div class="d-flex justify-content-between mb-2">
                <input type="text" name="formations[${counts.form}][diplome]" class="form-control input-form-diplome" placeholder="Diplôme">
                <button type="button" class="btn btn-sm btn-outline-danger btn-remove">X</button>
            </div>
            <input type="text" name="formations[${counts.form}][ecole]" class="form-control input-form-ecole mb-2" placeholder="École">
            <div class="row mb-2">
                <div class="col-6"><input type="date" name="formations[${counts.form}][debut]" class="form-control input-form-date-deb"></div>
                <div class="col-6"><input type="date" name="formations[${counts.form}][fin]" class="form-control input-form-date-fin"></div>
            </div>
        `;
        document.getElementById('formations-container').appendChild(div);
        counts.form++;
    };

    document.getElementById('btn-add-skill').onclick = () => {
        const div = document.createElement('div');
        div.className = 'competence-item row mb-2';
        div.innerHTML = `
            <div class="col-7"><input type="text" name="competences[${counts.skill}][nom]" class="form-control input-skill-nom"></div>
            <div class="col-4"><select name="competences[${counts.skill}][niveau]" class="form-select input-skill-niveau"><option>Débutant</option><option>Expert</option></select></div>
            <div class="col-1"><button type="button" class="btn btn-outline-danger btn-sm btn-remove">X</button></div>
        `;
        document.getElementById('competences-container').appendChild(div);
        counts.skill++;
    };

    document.body.addEventListener('click', function(e) {
        if(e.target.classList.contains('btn-remove')) {
            e.target.closest('.card, .row').remove();
            updatePreview();
        }
    });
});