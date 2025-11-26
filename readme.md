# PHP tanterv

## Alapadatok

**Műveltségi terület:** informatika  

**Tantárgy:** digitális kultúra  

**Osztály:** 11.osztály  

**Óraszám:** Egész éves 68 órából a félév 34 óra  
https://www.oktatas.hu/pub_bin/dload/kozoktatas/kerettanterv/Digitalis_kultura_K.docx  
Algoritmizálás, formális programozási nyelv használata  
- 20 / 20 óra

Adatbázis-kezelés  
- 14 / 20 óra  

Heti 2 óra.

**Előismeretek:** A diákok már rendelkeznek alapvető számítógépes ismeretekkel. 
Találkoztak blokk programozási környezettel, 
ismernek formális nyelveket melyeken szövegesen is készítettek egyszerű programot.  

**Tantárgyi kapcsolatok:**
- matematika
- magyar nyelv és irodalom

## Didaktikai célok, módszer, eszköz

- PHP nyelv segítségével egy dinamikus weboldal készítése.  
- Korábban tanultak alkalmazása valós programozói feladatban.  
- Nem csak PHP, hanem a dinamikus webfejlesztéshez szorosan kapcsolódó GIT alapok,
SQL alapok elsajátítása. 
- Valós munkahelyi feladat bemutatásával az érdeklődés felkeltése a programozói szakma iránt.
- Cél a precíz munkavégzés. A páros programozás előnyeit bemutatva páros munka preferálása. 
- Párok kialakítása, egyik órán egyik, másik órán másik diák kódol.
A gyorsaság másodlagos.
- Házi feladat nincs, az iskolai eszközökön folyik a fejlesztés.
- A tanár saját gépének képét kivetítve vezeti az órát és mutatja be az elérendő célt.

## Tanulási eredmények

- PHP futtatói környezetet telepít.
- PHPStorm fejlesztői környezetet használva szöveges PHP kódot ír.
- Feladatot modellez, folyamatábrán ábrázolja a program futásának lépéseit.
- Felismeri az IP címet, meg tudja különböztetni a domain-től.
- phpmyadmin-ban adatbázist létrehoz, tábla CREATE scriptet állományba elment.  
- Böngészőben beírt adatot adatbázisban tárol, módosít, töröl.
- Tisztában van a CRUD, Create, Read, Update, Delete elvvel.
- MVC elv szerint csoportosítja megírt kódját.  
- Felismeri az osztályt(OOP) és a megírt osztályt alkalmazza kódjában.
- Programját teszteli, a hibákat javítja.
- Böngészőben a `developer tools` segítségével megtalálja a weboldal betöltött alkotórészeit,
  felismeri a fejlécet és a tartalmat.
- A felhasználóval teljes mondatokban kommunikál, hogy a megalkotott felület felhasználóbarát legyen.
- Elkészített programjáról leírást készít markdown formátumban és abból PDF-et generál.
- Elkészített kódját lokálisan GIT verziókövetés alá helyezi és rendszeresen commitel.
- Repository-t hoz létre a github regisztráció után és oda commitel pushol.

## Óravázlat címek

1. XAMPP, PHP telepítés, fejlesztői környezet kialakítása. Hello world.
2. GIT telepítés, git alapok.
3. Hasznos weboldalak www.w3schools.com, www.php.net, www.stackoverflow.com.  
AI-t óvatosan használni, inkább asszisztens, segéd. 
4. www.w3schools.com példaprogramjainak kipróbálása.
5. Hálózati alapismeretek, IP cím, domain, port, kiszolgáló, request, response.
6. Specifikáció készítés valós problémáról. Regisztráció mintaprojekt.
7. Tervezés, brain storming a megvalósítandó oldalakról, funkciókról. Folyamatábra készítés.  
8. Alapismeretek átismétlése. Változók, vezérlések, műveletek.
9. Adattípusok, mixed, array.
10. PHP egyediségek. $, ., "" közötti kiértékelés, ===, !==, <=>
11. $_REQUEST, $_GET, $_POST globális tömbök használata.
12. foreach loop, match van switch helyett php 8-tól.   
https://www.php.net/manual/en/control-structures.match.php
13. Adatbázis létrehozás, tervezés, SQL alapok.
14. Mező adattípusok, SQL alapok.
15. phpmyadmin használata.
16. Ismétlés, összefoglalás.
17. Dolgozat teszt formában, felismerés jellegű feladatokkal.


18. Adatbázishoz kapcsolódás PHP-ból.
19. Adatok kiírása adatbázisból weboldalra.
20. Adatok kiírása adatbázisból weboldalra.
21. Adatok beolvasása felhasználótól és eltárolása adatbázisban.
22. Adatok beolvasása felhasználótól és eltárolása adatbázisban.
23. Create, Read, Update, Delete CRUD elv.
24. Create, Read, Update, Delete CRUD elv.
25. Model View Controller, MVC elv alkalmazása a minta projektben.
26. Model View Controller, MVC elv alkalmazása a minta projektben.
27. OOP alapok PHP-ban.
28. Inputok validálása, reguláris kifejezések.
29. HTML, CSS alapok.
30. Hibakezelés, tesztelés.
31. Böngészőben a CTRL-SHIFT-I developer tools használata a hibakereséshez.
32. Dokumentáció írás markdown formátumban, pdf generálás.  
https://www.markdowntopdf.com/
33. Ismétlés, összefoglalás.
34. Dolgozat teszt formában, alkalmazás jellegű feladatokkal.

### További fejlesztési ötletek

- Ne kelljen mindig jelszót módosítani.
- Új jelszó megadásához megkelljen adni a régit és az újat kétszer.
Validálás: megegyezik-e az új jelszó két bevitele?

### Tehetséggondozás
A gyorsabban haladóknak további feldolgozandó területek a mintaprojektben.
- Belépés.
- Regisztrált felhasználók kezelése belépett felhasználóknak.
- COOKIE és SESSION kezelés PHP-ban.
- Avatar kép, állomány feltöltése felhasználókhoz.
- Aszinkron javascript hívások szerver oldalra, törlés és lista frissítése.
- A nyelvi elemek külön állományba szervezése, nyelviesítés.
- Template kezelés, keretrendszer alkalmazása, Laravel.
- httpd.conf
- php.ini
- my.ini

### Cheat sheets

#### Python vs PHP (by AI)

[./doc/php_python_cheatsheet.pdf](./doc/php_python_cheatsheet.pdf)  
[./doc/php_python_advanced_cheatsheet.pdf](./doc/php_python_advanced_cheatsheet.pdf)  

#### GIT (by AI)

[./doc/git_cheat_sheet.pdf](./doc/git_cheat_sheet.pdf)  

#### SQL (by AI)

[./doc/sql_cheat_sheet.pdf](./doc/sql_cheat_sheet.pdf)  

## 1. XAMPP, PHP telepítés, fejlesztői környezet kialakítása. Hello world.

PHP fejlesztőkörnyezet Windows 10,11-re telepítés bemutatása.
XAMPP
Apache + MariaDB + PHP + Perl  
https://www.apachefriends.org/

Szövegszerkesztésre IDE.  
Integrated Development Envirement.  
Jetbrains PHPStorm terméke.  
Educational ingyenes verzió igényelhető.  

Alternatív szerkesztő a Visual Studio Code.  

Program telepítése asztali számítógépre hasonló, mint app telepítése mobil eszközre.   
Azt mindenki ismeri már.

## 2. GIT telepítés, git alapok
A fejlesztéshez hozzátartozik a forrásállományok változáskövetése.

https://git-scm.com/install/windows  
`git init` - GIT repository inicializálás.  
`git config user.name 'zsolt.duzmath'` - Fejlesztő felhasználó beállítása.  
`git config user.name 'zsolt.duzmath@gmail.com'`  
`git add` - Állomány hozzáadása, törlés, módosítás észlelése automatikus.  
`git status` - Ellenőrizhetjük mi is történt a könyvtárunkban, módosítások, törlések, új állományok.  
`git diff` - Módosítások áttekintése.  
`git commit -m 'Mit módosítottunk a kódon'` - Változtatásainknak a rögzítése.

A helyi tároláson túl a GIT repository-t van lehetőség távoli szerveren is tárolni biztonsági okokból.  
`git push` - Távoli szerverre feltöltés.  
`git pull` - Távoli szerverről letöltés.

github push:  
`git remote add origin https://github.com/zsoltduzmath/php_tanterv.git`  
`git push -u origin master`