47.

SELECT nom, prenom, emploi, service from employes inner join services on employes.noserv = services.noserv; 


48.

SELECT nom, emploi, emp.noserv, service from emp inner join serv on emp.noserv = serv.noserv; 

49.

SELECT nom, emploi, emp.noserv, service from emp as E inner join serv as S on E.noserv = S.noserv; 

50.

SELECT nom, emploi, S.* from emp as E inner join serv as S on E.noserv = S.noserv; 

51.

SELECT E1.nom, E1.embauche, E2.nom, E2.embauche 
FROM emp as E1 inner join emp as E2 ON E1.sup = E2.noemp
WHERE E1.embauche < E2.embauche;
ORDER BY E1.nom, E2.nom;

52.

SELECT prenom, emploi from emp where emploi = "DIRECTEUR"
UNION
SELECT prenom, emploi from emp where emploi = "TECHNICIEN" and noserv = 1; 


53.

SELECT noserv, service, ville from serv
WHERE noserv not in (SELECT distinct noserv FROM emp);

54.

SELECT DISTINCT emp.noserv, service, ville from emp inner join serv on emp.noserv = serv.noserv;

55.

SELECT E.*, S.ville FROM emp AS E INNER JOIN serv AS S ON E.noserv = S.noserv
WHERE S.ville = "LILLE";

ou

SELECT * FROM emp WHERE noserv IN (SELECT noserv FROM serv WHERE ville = "LILLE"); 

56.

SELECT * FROM emp 
WHERE sup in (SELECT sup FROM emp WHERE nom = "DUBOIS")
AND nom != "DUBOIS";

57.

SELECT * FROM emp WHERE embauche = (SELECT embauche FROM emp WHERE nom = "DUMONT");

58.

SELECT nom, embauche FROM emp 
WHERE embauche < (SELECT embauche FROM emp WHERE nom = "MINET")
ORDER BY embauche;

59.

SELECT nom, prenom, embauche FROM emp 
WHERE embauche < (SELECT MIN(embauche) FROM emp WHERE noserv = 6);


60.

SELECT nom, prenom, (sal + ifnull(comm, 0)) as revenu_mensuel FROM emp 
WHERE (sal + ifnull(comm, 0)) > (SELECT MIN(sal + ifnull(comm, 0)) 
								 FROM emp 
								 WHERE noserv = 3
								)
ORDER BY 3;


61.

SELECT nom, noserv, emploi, sal 
FROM emp AS E INNER JOIN serv AS S ON E.noserv = S.noserv
WHERE S.ville = (SELECT ville 
				 FROM emp AS E INNER JOIN serv AS S ON E.noserv = S.noserv 
                 WHERE nom = "HAVET");


62.

SELECT * FROM emp 
WHERE noserv = 1
AND emploi IN (SELECT DISTINCT emploi FROM emp WHERE noserv = 3);


63.

SELECT * FROM emp 
WHERE noserv = 1
AND emploi NOT IN (SELECT DISTINCT emploi FROM emp WHERE noserv = 3);



64.

SELECT nom, prenom, emploi, sal FROM emp
WHERE emploi =(SELECT emploi FROM emp WHERE nom = "CARON")
AND sal > (SELECT sal FROM emp WHERE nom = "CARON");


65.

SELECT * FROM emp
WHERE noserv = 1
AND emploi in(SELECT distinct emploi 
				FROM emp inner join serv 
				on emp.noserv = serv.noserv 
				WHERE serv.service = "VENTES");


66.

SELECT nom, prenom, emploi, serv.ville 
FROM emp INNER JOIN serv ON emp.noserv = serv.noserv
WHERE serv.ville = "LILLE"
AND emploi = (SELECT emploi 
				FROM emp
				WHERE nom = "RICHARD")
ORDER BY nom;



67.

SELECT prenom, nom, sal, noserv FROM emp as E1
WHERE sal > (SELECT AVG(sal) FROM emp as E2 WHERE E1.noserv = E2.noserv)
ORDER BY noserv;


68.

SELECT nom, prenom, emp.noserv, embauche 
FROM emp inner join serv on emp.noserv = serv.noserv 
WHERE service = "INFORMATIQUE" 
AND date_format(embauche, "%Y") IN(
	SELECT distinct date_format(embauche, "%Y") as ANNEE 
	FROM emp inner join serv on emp.noserv = serv.noserv 
    WHERE service = "VENTES");
	
	
69.

SELECT nom, prenom, emploi, ville
FROM emp AS E1 inner join serv on emp.noserv = serv.noserv
WHERE noserv <> (SELECT noserv FROM emp As E2 WHERE E2.noemp = E1.sup);


70.

SELECT noemp, nom, prenom, service, (sal + ifnull(comm, 0)) as REVENU
FROM emp inner join serv on emp.noserv = serv.noserv
WHERE noemp IN (SELECT distinct sup FROM emp)
ORDER BY 5 DESC;


71.

SELECT nom, emploi , round((sal + ifnull(comm, 0)), 2) as revenu
FROM emp;


72.

SELECT * from emp WHERE ifnull(comm, 0) > sal * 2;


73.

SELECT nom, prenom, emploi, round((ifnull(comm, 0)/(ifnull(comm, 0) +sal)) * 100, 2) as "%commission"
FROM emp 
WHERE emploi = "VENDEUR"
ORDER BY "%commission"; 

74.

SELECT nom, prenom, service, round(sal + ifnull(comm, 0)) * 12 as "revenu_annuel"
FROM emp inner join serv on emp.noserv = serv.noserv
WHERE emploi = "VENDEUR";


78.

SELECT nom, emploi,
		sal / 22 AS salaire_jounalier_SA,
		round(sal / 22, 2) AS salaire_jounalier_ARRONDI,
		sal / 22 / 8 AS salaire_horaire_SA,
		round(sal / 22 / 8, 2) AS salaire_horaire_ARRONDI
FROM emp
WHERE noserv in (3, 5, 6);


79.

SELECT nom, emploi,
		sal / 22 AS salaire_jounalier_SA,
		truncate(sal / 22, 2) AS salaire_jounalier_ARRONDI,
		sal / 22 / 8 AS salaire_horaire_SA,
		truncate(sal / 22 / 8, 2) AS salaire_horaire_ARRONDI
FROM emp
WHERE noserv in (3, 5, 6);


80.

SELECT service , ville, 
	concat(rpad(service, (select max(length(service)) from serv), "-"), "--->", ville) AS "service ---> ville"
FROM serv;


81.

SELECT nom, emploi, (
	case emploi
		when 'PRESIDENT' then 1
		when 'DIRECTEUR' then 2
		when 'COMPTABLE' then 3
		when 'VENDEUR' then 4
		when 'TECHNICIEN' then 5
		else 0
	end
) AS "CODE_EMPLOI"
FROM emp
ORDER BY 3;


82.

SELECT noserv, prenom, emploi, (
	case noserv
		when 1 then "*****"
		else nom
	end
) as toto
FROM emp;


83.

SELECT substr(service, 1, 5)
FROM serv;


84. 

select * from emp where date_format(embauche, "%Y") = "1988";


85.

select 
	upper(nom) as "MAJ",
	concat(upper(left(nom, 1)), lower(right(nom, length(nom) - 1))) AS "CAP",
	lower(nom) AS "MIN"
from emp;

85.bis

select 
	upper(nom) AS "MAJ",
	concat(upper(substr(nom, 1, 1)), lower(substr(nom, 2, length(nom)))) AS "CAP"
	lower(nom) AS "MIN"
From emp;


86.

select nom, locate("M", nom) as "POS de M", locate("E", nom) as "POS de E"
from emp;


87.

select service, length(service) AS "LENGTH" from serv;


88. 

SELECT sal, rpad('', sal/2000, '#')
FROM emp;


89.

SELECT nom, emploi, embauche
FROM emp
WHERE noserv = 6;

90.

SELECT nom, emploi, embauche, date_format(embauche, "%d-%m-%y")
FROM emp
WHERE noserv = 6;

91.

SELECT nom, emploi, embauche, date_format(embauche, "%W %d %M %Y")
FROM emp
WHERE noserv = 6;

92.

SELECT nom, emploi, embauche, date_format(embauche, "%W %d %b %y")
FROM emp
WHERE noserv = 6;


93.

SELECT nom, emploi, embauche, date_format(embauche, "%y %b %d")
FROM emp
WHERE noserv = 6;

94.

SELECT nom, emploi, embauche, date_format(embauche, "%W-%d-%M-%Y")
FROM emp
WHERE noserv = 6;

95.

SELECT nom, emploi, embauche, datediff(sysdate(), embauche)
FROM emp;

96.

SELECT nom, emploi, embauche, timestampdiff(month, embauche, sysdate())
FROM emp;

97.

SELECT nom, emploi, embauche, 
	   concat(date_format(embauche, "%d-%m-"), date_format(embauche, "%Y") + 12) AS "dd-mm-yyyy",
	   concat(date_format(embauche, "%Y") + 12, date_format(embauche, "-%m-%d")) AS "yyyy-mm-dd"
FROM emp;


98.

SELECT nom, emploi, embauche
FROM emp
WHERE timestampdiff(year, embauche, sysdate()) > 25;

99.

select timestampdiff(month, "1990-01-01", sysdate());

100.

select timestampdiff(day, "1990-01-01", sysdate());


101.

SELECT avg((sal + ifnull(comm, 0)))
FROM emp
WHERE emploi = "VENDEUR";

102.

SELECT emploi, floor(avg((sal + ifnull(comm, 0)))) as revenu_moyen
FROM emp
group by emploi;


103.

SELECT SUM(sal) as somme_sal, SUM(comm) AS somme_comm
FROM emp
WHERE emploi = "VENDEUR";


104.
SELECT max(sal), min(sal), max(sal)-min(sal)
FROM emp

105.

SELECT count(noemp), date_format(embauche, "%Y") as annee
FROM emp
GROUP BY annee;


106.

SELECT service, length(service) FROM serv 
where length(service) = (SELECT min(length(service)) FROM serv);


107.

SELECT * FROM emp
WHERE sal + ifnull(comm, 0) =(SELECT max(sal + ifnull(comm, 0)) FROM emp);


108.

SELECT count(*) FROM emp WHERE noserv = 3 AND ifnull(comm, 0) != 0;



109.

SELECT count(distinct emploi)
FROM emp
WHERE noserv = 1;

110.

SELECT count(*)
FROM emp
WHERE noserv = 3;


111.

Select noserv, round(avg(sal),0)
From emp
group by noserv;


112.

Select noserv, emploi, avg(sal) * 12
From emp
where emploi not in ("DIRECTEUR", "PRESIDENT")
group by noserv;


113.

select noserv, emploi, count(*) AS effectif, avg(sal)
from emp
group by noserv, emploi;

114.

select service, emploi, count(*) AS effectif, avg(sal)
from emp inner join serv on emp.noserv = serv.noserv 
group by service, emploi;


115.

select emploi, count(*), avg(sal)
from emp
group by emploi
having count(*) >= 2;

116.

select serv.*
from emp inner join serv on emp.noserv = serv.noserv
where emploi = "VENDEUR"
group by noserv
having count(*) >= 2;


117.

select serv.*, avg(ifnull(comm, 0)) as comm_average, avg(sal) / 4 as sal_average
from emp inner join serv on emp.noserv = serv.noserv
group by emp.noserv
having avg(ifnull(comm, 0)) > avg(sal) / 4;



118.

SELECT emploi, avg(sal)
From emp
GROUP BY emploi
HAVING avg(sal) > (SELECT avg(sal) From emp WHERE emploi = "DIRECTEUR");


119.

SELECT noserv, count(comm) as "HAS_COMM", count(*) - count(comm) AS "HAS_NO_COMM"
FROM emp
GROUP BY noserv;


120.

SELECT emploi, count(*), AVG(sal) AS "AVG SAL", SUM(sal) AS "TOTAL SAL", 
		AVG(ifnull(comm, 0)) AS "AVG COMM", SUM(ifnull(comm, 0)) AS "TOTAL COMM"
FROM emp
GROUP BY emploi;



/*Pour ces exercices, vous devez vous connecter sous votre identifiant et faire une copie
des tables EMP et SERV.*/

SET AUTOCOMMIT = 0;

create table emp2
(
noemp int(4) not null,
nom varchar(20),
prenom varchar(20),
emploi varchar(20),
sup int(4),
embauche date,
sal float(9,2),
comm float(9,2),
noserv int(2)
);

alter table emp2
add constraint PK_EMP2 primary key (noemp);


create table serv2
(
noserv int(2) not null,
service varchar(20),
ville varchar(20)
);

alter table serv2
add constraint PK_SERV2 primary key(noserv);



insert into emp2 values (1000,'LEROY','PAUL','PRESIDENT',null,'1987-10-25',55005.5,null,1);
insert into emp2 values (1100,'DELPIERRE','DOROTHEE','SECRETAIRE',1000,'1987-10-25',12351.24,null,1);
insert into emp2 values (1101,'DUMONT','LOUIS','VENDEUR',1300,'1987-10-25',9047.9,0,1);
insert into emp2 values (1102,'MINET','MARC','VENDEUR',1300,'1987-10-25',8085.81,17230,1);
insert into emp2 values (1104,'NYS','ETIENNE','TECHNICIEN',1200,'1987-10-25',12342.23,null,1);
insert into emp2 values (1105,'DENIMAL','JEROME','COMPTABLE',1600,'1987-10-25',15746.57,null,1);
insert into emp2 values (1200,'LEMAIRE','GUY','DIRECTEUR',1000,'1987-03-11',36303.63,null,2);
insert into emp2 values (1201,'MARTIN','JEAN','TECHNICIEN',1200,'1987-06-25',11235.12,null,2);
insert into emp2 values (1202,'DUPONT','JACQUES','TECHNICIEN',1200,'1988-10-30',10313.03,null,2);
insert into emp2 values (1300,'LENOIR','GERARD','DIRECTEUR',1000,'1987-04-02',31353.14,13071,3);
insert into emp2 values (1301,'GERARD','ROBERT','VENDEUR',1300,'1999-04-16',7694.77,12430,3);
insert into emp2 values (1303,'MASURE','EMILE','TECHNICIEN',1200,'1988-06-17',10451.05,null,3);
insert into emp2 values (1500,'DUPONT','JEAN','DIRECTEUR',1000,'1987-10-23',28434.84,null,5);
insert into emp2 values (1501,'DUPIRE','PIERRE','ANALYSTE',1500,'1984-10-24',23102.31,null,5);
insert into emp2 values (1502,'DURAND','BERNARD','PROGRAMMEUR',1500,'1987-07-30',13201.32,null,5);
insert into emp2 values (1503,'DELNATTE','LUC','PUPITREUR',1500,'1999-01-15',8801.01,null,5);
insert into emp2 values (1600,'LAVARE','PAUL','DIRECTEUR',1000,'1991-12-13',31238.12,null,6);
insert into emp2 values (1601,'CARON','ALAIN','COMPTABLE',1600,'1985-09-16',33003.3,null,6);
insert into emp2 values (1602,'DUBOIS','JULES','VENDEUR',1300,'1990-12-20',9520.95,35535,6);
insert into emp2 values (1603,'MOREL','ROBERT','COMPTABLE',1600,'1985-07-18',33003.3,null,6);
insert into emp2 values (1604,'HAVET','ALAIN','VENDEUR',1300,'1991-01-01',9388.94,33415,6);
insert into emp2 values (1605,'RICHARD','JULES','COMPTABLE',1600,'1985-10-22',33503.35,null,5);
insert into emp2 values (1615,'DUPREZ','JEAN','BALAYEUR',1000,'1998-10-22',6000.6,null,5);

commit;


insert into serv2 values (1,'DIRECTION','PARIS');
insert into serv2 values (2,'LOGISTIQUE','SECLIN');
insert into serv2 values (3,'VENTES','ROUBAIX');
insert into serv2 values (4,'FORMATION','VILLENEUVE D''ASCQ');
insert into serv2 values (5,'INFORMATIQUE','LILLE');
insert into serv2 values (6,'COMPTABILITE','LILLE');
insert into serv2 values (7,'TECHNIQUE','ROUBAIX');


commit;

/*121 : Augmenter de 10% ceux qui ont un salaire inférieur au salaire moyen. Valider.*/
Set autocommit = 0;
UPDATE emp2
SET sal = 1.1*(sal)
where sal<(select avg(sal)
            from emp);

Commit;
/*122 : Insérez vous comme nouvel employé embauché aujourd’hui au salaire que vous
désirez. Valider.*/
Set autocommit = 0;

select @nextId :=  max(noemp)+1 from emp2;
insert into emp2 (noemp, nom, prenom, sal, embauche, emploi, noserv, sup) 
values ( @nextId,'SACI','MOHAMED-ELHADI',3000,sysdate(),'DEVELOPPEUR', 5, 1200);

select @nextId :=  max(noemp)+1 from emp2;
select @moy :=  avg(sal) from emp2;
insert into emp2 (noemp, nom, prenom, sal, embauche, emploi, noserv, sup)
values (@nextId, 'DELSART', 'THIBAULT', @moy, sysdate(), 'PUPITREUR', 5, 1500);
commit

/*123 : Effacer les employés ayant le métier de SECRETAIRE. Valider.*/
Set autocommit = 0;
DELETE FROM emp2 
WHERE emploi='SECRETAIRE';
commit;
/*124 : Insérer le salarié dont le nom est MOYEN, prénom Toto, no 1010, embauché le
12/12/99, supérieur 1000, pas de comm, service no 1, salaire vaut le salaire moyen des
employés. Valider.*/
Set autocommit = 0;
select @salMoy := AVG(sal) from emp2;
insert into emp2 (noemp, nom, prenom, sal, embauche, emploi, sup, noserv) 
values ( 1010,'MOYEN','Toto',@salMoy,'1999-12-12','DEVELOPPEUR',1000,1);
commit;

/*125 : Supprimer tous les employés ayant un A dans leur nom. Faire un SELECT sur
votre table pour vérifier cela. Annuler les modifications et vérifier que cette action
s’est bien déroulée.*/

SET AUTOCOMMIT = 0;

delete from emp2
where nom like '%A%';

select *
from emp2;

rollback;

select *
from emp2;


/*126 :
Créer une table PROJET avec les colonnes suivantes:
numéro de projet (noproj), type numérique 3 chiffres, doit contenir une valeur.  nom de projet (nomproj), type caractère, longueur = 10
budget du projet (budget), type numérique, 6 chiffres significatifs et 2 décimales.
Vérifier l'existence de la table PROJET.
Faire afficher la description de la table PROJET.
C’était une erreur!!! Renommez la table PROJET en PROJ
.*/
create table projet
(
noproj int(3) primary key,
nomproj varchar(10),
budget float(8,2)
);


/* vérifier si la table existe */
/* ou */
use emploi;
show tables;

/* ou */

select * 
from proj;

DESCRIBE projet;

rename table projet to proj;
/*127 :
 Insérer trois lignes de données dans la table PROJ:
numéros des projets = 101, 102, 103
noms des projets = alpha, beta, gamma
budgets = 250000, 175000, 950000
 Afficher le contenu de la table PROJ.
 Valider les insertions faites dans la table PROJ.*/
insert into proj (nomproj,noproj,budget) values ('ALPHA', 101,250000);
insert into proj (nomproj,noproj,budget) values ('BETA', 102,175000);
insert into proj (nomproj,noproj,budget) values ('GAMMA', 103,950000);
commit;
select * from proj;

/*128 :
 Modifier la table PROJ en donnant un budget de 1.500.000 Euros au projet 103.
 Modifier la colonne budget afin d'accepter des projets jusque 10.000.000.000 d’Euros
 Retenter la modification demandée 2 lignes au dessus.*/
update proj 
set budget=1500000
where noproj=103;

alter table proj
modify budget float(13,2);

update proj 
set budget=1500000
where noproj=103;
commit;

select *
from proj;

/*129 :
Ajouter une colonne NOPROJ (type numérique) à la table EMP.
Afficher le contenu de la table EMP.*/
 alter table emp2
 add noproj int(3);

 select *
 from emp2;


/* 130 : Affecter les employés dont le numéro est supérieur à 1350 au projet 102, sauf
ceux qui sont déjà affectés à un projet.*/
update emp2
set noproj=102 
where noemp>1350
and noproj is null;
commit;

/*131 : Affecter les employés n'ayant pas de projet au projet 103.*/
update emp2
set noproj=103 
where noproj is null;
commit;

/*132 : Sélectionner les noms d'employés avec le nom de leur projet et le nom de leur
service.*/
select e.nom,e.prenom,e.emploi, p.nomproj, s.service 
from emp2 as e inner join serv2 as s inner join proj as p 
	 on e.noserv=s.noserv and e.noproj = p.noproj;


