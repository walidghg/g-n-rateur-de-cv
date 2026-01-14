<?php
require 'vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $couleur = htmlspecialchars($_POST['couleur'] ?? '#2c3e50');
    $prenom = htmlspecialchars($_POST['prenom'] ?? '');
    $nom = htmlspecialchars($_POST['nom'] ?? '');
    $titre = htmlspecialchars($_POST['titre'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $tel = htmlspecialchars($_POST['tel'] ?? '');
    $description = htmlspecialchars($_POST['description'] ?? '');
    $nom_complet = $prenom . ' ' . $nom;

    $experiences = $_POST['experiences'] ?? [];
    $formations = $_POST['formations'] ?? [];
    $competences = $_POST['competences'] ?? [];

    // Gestion Photo (Base64)
    $photo_base64 = null;
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['photo']['tmp_name'];
        $type = pathinfo($tmp_name, PATHINFO_EXTENSION);
        $data = file_get_contents($tmp_name);
        $photo_base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    }

    ob_start();
    include 'cv-template.php';
    $html = ob_get_clean();

    $options = new Options();
    $options->set('defaultFont', 'Helvetica');
    $options->set('isRemoteEnabled', true);

    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    $dompdf->stream("mon_cv.pdf", ["Attachment" => true]);
} else {
    header("Location: index.php");
    exit;
}