# TEAM SETUP INSTRUCTIES - Planify

## 📋 Optie 3: Gedeelde Database via LAN

**Peter host de database**, anderen verbinden via het netwerk.

---

## 🖥️ VOOR PETER (Host)

### 1. MySQL configureren voor externe toegang

1. Open bestand: `C:\xampp\mysql\bin\my.ini`
2. Zoek naar: `bind-address = 127.0.0.1`
3. Verander naar: `bind-address = 0.0.0.0` (of comment uit met #)
4. Sla op en **herstart MySQL** in XAMPP

### 2. Windows Firewall regel toevoegen

Open PowerShell als Administrator en run:
```powershell
New-NetFirewallRule -DisplayName "MySQL" -Direction Inbound -Protocol TCP -LocalPort 3306 -Action Allow
```

### 3. Je lokale IP
```
Jouw IP: 10.69.32.48
```

Deel dit IP met je teamleden!

### 4. Test de verbinding lokaal
Open je browser: `http://localhost/BoostLab/Planify/public/index.php`

---

## 👥 VOOR TEAMLEDEN (Clients)

### 1. Clone de repository
```bash
cd C:\xampp\htdocs\BoostLab
git clone https://github.com/PeterMarzina/Planify.git
cd Planify
```

### 2. Maak een .env bestand
Kopieer `.env.example` naar `.env`:
```bash
copy .env.example .env
```

### 3. Pas .env aan
Open `.env` en verander:
```
DB_HOST=10.69.32.48
DB_NAME=product_db
DB_USER=root
DB_PASS=
```

### 4. Start alleen Apache (geen MySQL nodig!)
- Open XAMPP Control Panel
- Start alleen **Apache**
- MySQL is niet nodig, je gebruikt Peter's database!

### 5. Open de applicatie
```
http://localhost/BoostLab/Planify/public/index.php
```

---

## 🔧 Troubleshooting

### "Can't connect to MySQL server"
- ✅ Check of Peter's computer aan staat
- ✅ Check of je op hetzelfde netwerk zit
- ✅ Check of het IP correct is: `10.69.32.48`
- ✅ Peter: check of MySQL draait in XAMPP
- ✅ Peter: check of firewall regel actief is

### "Access denied for user 'root'"
Peter moet MySQL user rechten geven. Run in MySQL:
```sql
GRANT ALL PRIVILEGES ON product_db.* TO 'root'@'%' IDENTIFIED BY '';
FLUSH PRIVILEGES;
```

### Test verbinding vanaf andere computer
```bash
C:\xampp\mysql\bin\mysql.exe -h 10.69.32.48 -u root product_db
```

---

## 📝 Git Workflow

### Updates ophalen
```bash
git pull origin main
```

### Wijzigingen uploaden
```bash
git add .
git commit -m "Beschrijving van wijziging"
git push origin main
```

---

## ⚠️ Belangrijk

- **Alleen Peter start/stopt MySQL** - anderen alleen Apache!
- **Iedereen werkt op dezelfde data** - wees voorzichtig met testen
- **Altijd git pull** voordat je begint met werken
- **Peter's computer moet aan** staan voor de database

---

## 🎯 Snel Overzicht

| Wie | XAMPP Services | Database Host |
|-----|---------------|---------------|
| **Peter** | Apache + MySQL | localhost |
| **Teamlid 1** | Alleen Apache | 10.69.32.48 |
| **Teamlid 2** | Alleen Apache | 10.69.32.48 |

