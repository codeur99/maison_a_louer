const express = require('express');
const app = express();
const bodyParser = require('body-parser');
const proprietairesRoutes = require('./routes/proprietaires.routes');

// Middleware
app.use(bodyParser.json());

// Routes
app.use('/api/proprietaires', proprietairesRoutes);

// Démarrage du serveur
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
  console.log(`Server is running on port ${PORT}`);
});
