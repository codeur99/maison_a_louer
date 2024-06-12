const ProprietairesModel = require('../models/proprietaires.model');

// Récupère la liste des propriétaires
module.exports.getProprietaires = async (req, res) => {
  try {
    var results = await ProprietairesModel.getProprietaires();
    if (results) {
      res.status(200).send(results);
    } else {
      res.status(404).send({ message: "Aucun propriétaire trouvé" });
    }
  } catch (error) {
    res.status(500).send({ message: "Erreur serveur", error: error.message });
  }
};

// Ajoute un propriétaire
module.exports.addProprietaire = async (req, res) => {
  const { nom, email, telephone } = req.body;

  if (!nom) {
    res.status(400).json({ message: "Merci d'ajouter un nom" });
    return;
  }

  if (!telephone) {
    res.status(400).json({ message: "Merci d'ajouter un numéro de téléphone" });
    return;
  }

  if (!email) {
    res.status(400).json({ message: "Merci d'ajouter un email" });
    return;
  }

  try {
    var addProprietaire = await ProprietairesModel.addProprietaire(nom, email, telephone);
    if (addProprietaire) {
      res.status(201).send("Propriétaire ajouté avec succès");
    } else {
      res.status(500).send("Échec dans l'ajout du propriétaire");
    }
  } catch (error) {
    res.status(500).send({ message: "Erreur serveur", error: error.message });
  }
};

// Met à jour les informations d'un propriétaire
module.exports.updateProprietaire = async (req, res) => {
  const { nom, email, telephone } = req.body;

  if (!nom) {
    res.status(400).json({ message: "Merci d'ajouter un nom" });
    return;
  }

  if (!telephone) {
    res.status(400).json({ message: "Merci d'ajouter un numéro de téléphone" });
    return;
  }

  if (!email) {
    res.status(400).json({ message: "Merci d'ajouter un email" });
    return;
  }

  try {
    var updateProprietaire = await ProprietairesModel.updateProprietaire(req.params.id, nom, email, telephone);
    if (updateProprietaire) {
      res.status(200).send("Propriétaire modifié avec succès");
    } else {
      res.status(500).send("Échec dans la modification du propriétaire");
    }
  } catch (error) {
    res.status(500).send({ message: "Erreur serveur", error: error.message });
  }
};

// Supprime un propriétaire
module.exports.deleteProprietaire = async (req, res) => {
  try {
    var deleteProprietaire = await ProprietairesModel.deleteProprietaire(req.params.id);
    if (deleteProprietaire) {
      res.status(200).send("Propriétaire supprimé avec succès");
    } else {
      res.status(500).send("Échec dans la suppression du propriétaire");
    }
  } catch (error) {
    res.status(500).send({ message: "Erreur serveur", error: error.message });
  }
};
