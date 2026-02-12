# TEAM SETUP INSTRUCTIES - Planify

## 📋 Optie 2: Lokale Database + Git

**Iedereen gebruikt zijn eigen lokale XAMPP database**. Code wordt gedeeld via Git, maar data blijft lokaal.

---

## 👥 SETUP VOOR ALLE TEAMLEDEN

### 1. Installeer XAMPP
Download en installeer XAMPP als je het nog niet hebt:
https://www.apachefriends.org/

### 2. Clone de repository
```bash
cd C:\xampp\htdocs\BoostLab
git clone https://github.com/PeterMarzina/Planify.git
cd Planify
```

### 3. Start XAMPP Services
- Open XAMPP Control Panel
- Start **Apache**
- Start **MySQL**

### 4. Importeer de database
**Optie A - Via Command Line:**
```bash
C:\xampp\mysql\bin\mysql.exe -u root -e "source C:\xampp\htdocs\BoostLab\Planify\database\schema.sql"
```

**Optie B - Via phpMyAdmin:**
1. Ga naar http://localhost/phpmyadmin
2. Klik op "Import"
3. Selecteer `database/schema.sql`
4. Klik "Go"

### 5. Open de applicatie
```
http://localhost/BoostLab/Planify/public/index.php
```

---

## 📝 Git Workflow

### Updates ophalen (voor je begint met werken)
```bash
git pull origin main
```

### Wijzigingen uploaden
```bash
git add .
git commit -m "Beschrijving van je wijziging"
git push origin main
```

### Bij merge conflicten
```bash
git pull origin main
# Los conflicten op in de files
git add .
git commit -m "Merge conflicts resolved"
git push origin main
```

---

## 🔧 Troubleshooting

### "Unknown database 'product_db'"
Importeer het schema opnieuw:
```bash
C:\xampp\mysql\bin\mysql.exe -u root -e "source C:\xampp\htdocs\BoostLab\Planify\database\schema.sql"
```

### "Access denied for user 'root'"
- Check of MySQL draait in XAMPP Control Panel
- Default XAMPP credentials: `username=root`, `password=(leeg)`

### "File not found" errors
- Check of je in de juiste directory bent: `C:\xampp\htdocs\BoostLab\Planify`
- Verifieer dat alle files correct zijn gecloned

### Apache start niet
- Check of poort 80 niet bezet is door andere software
- Stop Skype, IIS of andere webservers

---

## ⚠️ Belangrijk

- ✅ **Iedereen heeft zijn eigen database** - jullie data is NIET gesynchroniseerd
- ✅ **Test veilig** - wat jij doet beïnvloedt anderen niet
- ✅ **Alleen code wordt gedeeld** via Git
- ✅ **Altijd `git pull` eerst** voordat je begint met werken

---

## 🎯 Voordelen Optie 2

✅ Geen afhankelijkheid van één persoon's computer  
✅ Iedereen kan offline werken  
✅ Veilig testen zonder anderen te beïnvloeden  
✅ Simpele setup - geen netwerk configuratie nodig  

---

## 📊 Database Wijzigingen Delen (Optioneel)

Als je database wijzigingen maakt (nieuwe tabellen, kolommen, etc.):

1. **Update het schema bestand:**
   - Exporteer je wijzigingen naar `database/schema.sql`
   
2. **Commit en push:**
   ```bash
   git add database/schema.sql
   git commit -m "Update database schema: added X table"
   git push
   ```

3. **Teamleden importeren opnieuw:**
   ```bash
   git pull
   C:\xampp\mysql\bin\mysql.exe -u root product_db < database/schema.sql
   ```

---

## 📂 Project Structuur

```
Planify/
├── database/
│   └── schema.sql         # Database setup
├── public/
│   ├── index.php          # Hoofdpagina
│   ├── form.php           # Product formulier
│   ├── error.php          # Error pagina
│   ├── success.php        # Success pagina
│   └── css/
│       └── style.css      # Styling
├── src/
│   ├── config/
│   │   └── db_connection.php  # Database verbinding
│   └── process_product.php    # Form processing
└── templates/
    ├── header.php         # Herbruikbare header
    └── footer.php         # Herbruikbare footer
```

---

## 👥 Team Workflow Best Practices

1. **Altijd eerst pullen** voordat je begint
2. **Test lokaal** voordat je pusht
3. **Commit regelmatig** met duidelijke berichten
4. **Communiceer** bij grote wijzigingen
5. **Review elkaars code** via GitHub

---

## 🆘 Hulp Nodig?

Bij vragen, check met het team of maak een issue aan op GitHub!
