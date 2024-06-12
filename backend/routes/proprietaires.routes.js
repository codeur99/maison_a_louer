const express = require('express');
const {
  getProprietaires,
  addProprietaire,
  updateProprietaire,
  deleteProprietaire
} = require('../controllers/proprietaires.controller');
const router = express.Router();

router.get("/", getProprietaires);
router.post("/", addProprietaire);
router.put("/:id", updateProprietaire);
router.delete("/:id", deleteProprietaire);

module.exports = router;
