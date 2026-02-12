Stappenplan agenda project (3 personen)

1) Kickoff (samen, 1 sessie)
- Doel en scope bepalen (MVP)
- Doelgroep en belangrijkste functies kiezen
- Technologie en repo-structuur afspreken

2) Rollen verdelen
- Persoon 1: PHP/Structuur (pagina's in PHP, includes/partials)
- Persoon 2: CSS/Design (layout en styling)
- Persoon 3: JS/Interactie (functionaliteit in de browser)

3) MVP features (klein starten)
- Agendaweergave (dag/week/maand)
- Afspraak toevoegen/bewerken/verwijderen (in de browser)
- Opslaan in localStorage (geen database)

4) Designfase (1-2 dagen)
- Wireframes maken
- User flow uitwerken

5) Technisch ontwerp
- Pagina-structuur in PHP (partials, header/footer)
- Componentenlijst
- Data-structuur in JS

6) Sprint 1 (basis)

Persoon 1 (PHP/Structuur):
- index.php aanmaken
- header.php en footer.php in partials/
- navigation.php aanmaken
- basis template-structuur met includes

Persoon 2 (CSS/Design):
- style.css opzetten met basisstijlen
- Color scheme en fonts kiezen
- Layout grid/flexbox voor agenda
- Responsive design (desktop/tablet/mobiel)

Persoon 3 (JS/Interactie):
- script.js aanmaken
- Data-array voor afspraken aanmaken
- Basis functies schrijven (nog zonder interactie)
- localStorage setup

7) Sprint 2 (core)

Persoon 1 (PHP/Structuur):
- calendar.php aanmaken (agenda-pagina)
- form.php aanmaken (formulier toevoegen/bewerken afspraak)
- Functions in app/core/functions.php schrijven (php helpers)
- Partials uitbreiden met formulier-onderdelen

Persoon 2 (CSS/Design):
- Instagram-achtig agendaweergave stylen
- Formulier mooi opmaken
- Buttons en hover-effecten
- Color coding voor afspraken

Persoon 3 (JS/Interactie):
- Functie: afspraak toevoegen (formulier -> data)
- Functie: afspraak verwijderen
- Functie: afspraak bewerken
- Data in localStorage opslaan

8) Sprint 3 (polish)

Persoon 1 (PHP/Structuur):
- Helper-functies uitbreiden (validatie, datum-conversie)
- Search/filter functionaliteit voorbereiding
- Code cleanup en comments

Persoon 2 (CSS/Design):
- Error/warning messagees stylen
- Kleine iconen/graphics toevoegen
- Final polish (spacing, transitions)
- Print CSS voor agenda

Persoon 3 (JS/Interactie):
- Validatie afspraken (lege velden, datum controle)
- Error boodschappen tonen
- Zoek/filter-functionaliteit
- Datum-weergave switch (dag/week/maand)

9) Testen & demo (samen)

Testen:
- Afspraken toevoegen/bewerken/verwijderen controleren
- localStorage gegevens controleren
- Layout test (desktop/tablet/mobiel)
- Formulier validatie testen
- Browser compatibility (Chrome, Firefox, Edge)

Bugfixes:
- Bugs verdelen en fixen
- Elkaar helpen waar nodig

Demo voorbereiding:
- Demo scenario schrijven (wat je gaat laten zien)
- Screenshots/video samenvoegen
- Korte uitleg per onderdeel