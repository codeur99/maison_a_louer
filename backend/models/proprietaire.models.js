const db = require('../config/db.js'); // Assurez-vous d'avoir un fichier db.js qui exporte une instance de connexion MySQL

// Récupère la liste des propriétaires
exports.getProprietaires = () => {
  return new Promise((resolve, reject) => {
    db.query('SELECT * FROM proprietaires', (error, results) => {
      if (error) {
        return reject(error);
      }
      resolve(results);
    });
  });
};

// Ajoute un propriétaire
exports.addProprietaire = (nom, email, telephone) => {
  return new Promise((resolve, reject) => {
    const query = 'INSERT INTO proprietaires (nom, email, telephone) VALUES (?, ?, ?)';
    db.query(query, [nom, email, telephone], (error, results) => {
      if (error) {
        return reject(error);
      }
      resolve(results.insertId);
    });
  });
};

// Met à jour un propriétaire
exports.updateProprietaire = (id, nom, email, telephone) => {
  return new Promise((resolve, reject) => {
    const query = 'UPDATE proprietaires SET nom = ?, email = ?, telephone = ? WHERE idproprietaire = ?';
    db.query(query, [nom, email, telephone, id], (error, results) => {
      if (error) {
        return reject(error);
      }
      resolve(results.affectedRows);
    });
  });
};

// Supprime un propriétaire
exports.deleteProprietaire = (id) => {
  return new Promise((resolve, reject) => {
    const query = 'DELETE FROM proprietaires WHERE idproprietaire = ?';
    db.query(query, [id], (error, results) => {
      if (error) {
        return reject(error);
      }
      resolve(results.affectedRows);
    });
  });
};
