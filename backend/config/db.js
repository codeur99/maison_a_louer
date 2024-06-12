const mysql = require("mysql")

const connection = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "root",
    database: "locationmaison"
});

connection.connect((err) => {
    if (err) {
        console.error("Erreur de connexion: " + err.stack)
    }
    console.log("connexion à la base de données réussi")
});

module.exports = connection;