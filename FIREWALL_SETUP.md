# FIREWALL CONFIGURATIE - Voer uit als Administrator

## Optie 1: Via PowerShell (Aanbevolen)

1. **Open PowerShell als Administrator**
   - Klik rechts op Start knop
   - Kies "Windows PowerShell (Admin)" of "Terminal (Admin)"

2. **Run dit commando:**
```powershell
New-NetFirewallRule -DisplayName "MySQL voor Planify" -Direction Inbound -Protocol TCP -LocalPort 3306 -Action Allow
```

---

## Optie 2: Via Windows Firewall GUI

1. Open **Windows Firewall with Advanced Security**
   - Druk Win+R
   - Type: `wf.msc`
   - Druk Enter

2. Klik op **Inbound Rules** (links)

3. Klik op **New Rule...** (rechts)

4. Volg de wizard:
   - Rule Type: **Port**
   - Protocol: **TCP**
   - Specific local ports: **3306**
   - Action: **Allow the connection**
   - Profile: Vink alles aan **(Domain, Private, Public)**
   - Name: **MySQL voor Planify**

5. Klik **Finish**

---

## Verificatie

Test of de firewall regel werkt:
```powershell
Test-NetConnection -ComputerName 10.69.32.48 -Port 3306
```

Zou moeten tonen: `TcpTestSucceeded : True`
