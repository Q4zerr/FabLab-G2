function updateStudentCount() {
  fetch("http://45.13.119.138:8000/total_etudiant/1")
      .then(response => response.json())
      .then(data => {
          // Met à jour le contenu de la balise avec l'ID "studentCount"
          document.getElementById("studentCount").innerHTML = data.nombre_etudiant;
      })
      .catch(error => {
          console.error("Erreur lors de la requête API :", error);
      });
}

// Met à jour toutes les 5 secondes (5000 millisecondes)
setInterval(updateStudentCount, 5000);

// Appelle la fonction pour mettre à jour la valeur dès le chargement de la page
updateStudentCount();
