1. Cu ajutorul programului DBF manager scot datele in format xml, rezultatul il vedem in 020720151331.xml
2. Cu ajutorul fisierului server.js (nodejs) parsam xml-ul si trimit datele in format obiect catre index.html
3. In index.html cu ajutorul algoritmului javascript transcriu din obiecte de array-uri, in obiecte simple (mai sterg campurile de care n-am nevoie)
4. Dupa ce dau click pe parseaza se scriu datele intr-un fisier out.json
5. Cu set_columns.php rescriu colonele cum sunt la mine in baza actuala si scriu in out2.js
6. Pornind write_db.js cu nodejs scriu in tabelul nou datele din out2.js