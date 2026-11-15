# Laboration 2 | Webbutveckling för Wordpress DT209G

## Webbplats för sin Bucketlist
Webbplatsen har tre sidor:
- **Startsidan** med information om uppgiften och reflektioner om PHP-språket.
- **Bucketlist** visar tillagda bucketlist-saker med möjlighet att lägga till fler genom ett formulär.
- **AI** vilka AI-verktyg jag använt i laborationen och mina slutsatser av deras stöd.

Funktionalitet för CRUD är implementerat genom CREATE, READ, DELETE och PUT för bucketlist-poster. Användaren kan genom detta uppdatera och radera sina befintliga saker.  
Felmeddelanden visas i användargränssnittet och formuläret vid fel, både om något går fel på servern eller vid felhantering av användarens inmatade uppgifter.

### Publicerad webbplats
Länk: https://studenter.miun.se/~fibe2504/lab2-php 

## Diagram

### ER
<img width="341" height="282" alt="er" src="https://github.com/user-attachments/assets/cf7e52a3-d6e7-4ed4-90f7-cd2c9203d4c0" />

### UML
<img width="1039" height="561" alt="uml" src="https://github.com/user-attachments/assets/af43bca5-a737-4120-95a1-8971f66e0d53" />

## Databas
Laborationen använder en MYSQL-databas via Mittuniversitetet och phpmyadmin. Databasinställningar lagras i en ej versionshanterad .env-fil.

### För att köra projektet lokalt med egen databas
Skapa en `.env`-fil i projektets rotmapp (även möjligt att fylla i uppgifterna direkt i `includes/config.php`).
```
DB_HOST=localhost
DB_USER=användarnamn
DB_PASSWORD=lösenord
DB_NAME=bucketlist
```

### Installera databas
Tabellen `bucketlist` skapas automatiskt via installationsskriptet `scripts/install.php` och detta går att göra via att köra skriptet på localhost i webbläsaren: `http://localhost/lab2-php/scripts/install.php`, alternativt manuellt med följande SQL-fråga på phpMyAdmin:

```sql
CREATE TABLE IF NOT EXISTS bucketlist (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(128) NOT NULL,
    description TEXT NOT NULL,
    priority INT NOT NULL CHECK (priority >= 1 AND priority <= 3),
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);  
````


