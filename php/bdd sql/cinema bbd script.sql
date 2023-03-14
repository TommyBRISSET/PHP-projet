CREATE TABLE FILMS(
	ID INTEGER(4)PRIMARY KEY NOT NULL AUTO_INCREMENT,
	TITRE VARCHAR(255) NOT NULL,
	PRIX INTEGER(5) NOT NULL,
	DESCRIPTION VARCHAR(255) NOT NULL,
	REALISATEUR VARCHAR(255) NOT NULL,
	CATEGORIE VARCHAR(50) NOT NULL,
	ANNEE INTEGER(5) NOT NULL,
	ACTEUR_PRINCIPAL VARCHAR(255),
	DUREE INTEGER(5));
	
CREATE TABLE UTILISATEUR(
	ID INTEGER(4)PRIMARY KEY NOT NULL AUTO_INCREMENT,
	PRENOM VARCHAR(255) NOT NULL,
	NOM VARCHAR(255) NOT NULL,
	PSEUDO VARCHAR(255) NOT NULL,
	EMAIL VARCHAR(255) NOT NULL,
	MOTDEPASSE VARCHAR(255) NOT	NULL);

CREATE TABLE PANIERS(
	NBR_FILMS INTEGER(4) NOT NULL,
	TOTAL INTEGER(5) NOT NULL,
	ID INTEGER(4)PRIMARY KEY NOT NULL AUTO_INCREMENT,
	ID_FILM INTEGER(4) NOT NULL,
	ID_UTILISATEUR INTEGER(4) NOT NULL,
	CONSTRAINT FK_PANIERS_FILMS FOREIGN KEY (ID_FILM)
	REFERENCES FILMS (ID),
	CONSTRAINT FK_PANIERS_UTILISATEUR FOREIGN KEY (ID_UTILISATEUR)
	REFERENCES UTILISATEUR (ID));

INSERT INTO FILMS 
VALUES (1,"X-Men : Dark Phoenix",16,"Film de super héros. Suite du film : X MEN : le commencement. Lors d'une périlleuse mission spatiale, Jean est frappée par une force qui la change en l'un des mutants les plus puissants qui soient. Elle devient peu à peu incontrôlable ...","Simon Kinberg","action",2019,"Sophie Turner",115);

INSERT INTO FILMS 
VALUES (2,"Valérian et la cité des milles planètes",9,"Au 28ème siècle, Valérian et Laureline forment une équipe d'agents spatio-temporels chargés de maintenir l'ordre dans les territoires humains. Un mystère se cache au cœur d'Alpha, une force obscure qui menace l'existence de la Cité des Mille Planètes.","Luc Besson","action",2017,"Dane DeHaan",137);

INSERT INTO FILMS 
VALUES (3,"Malavita",7,"Giovanni Manzoni, repenti de la mafia new-yorkaise sous protection du FBI, s’installe avec sa famille dans un village de Normandie. Mais, les vieilles habitudes vont vite reprendre le dessus quand il s’agira de régler les petits soucis du quotidien. ","Luc Besson","action",2013,"Robert De Niro",112);

INSERT INTO FILMS 
VALUES (4,"Lucy",10,"A la suite de circonstances indépendantes de sa volonté, une jeune étudiante voit ses capacités intellectuelles se développer à l’infini. Elle « colonise » son cerveau, et acquiert des pouvoirs illimités.","Luc Besson","action",2014,"Scarlett Johanson",89);

INSERT INTO FILMS 
VALUES (5,"Ready player one",12,"2045. Le monde est au bord du chaos. Les humains se réfugient dans l'OASIS, univers virtuel crée par James Halliday. Avant de disparaître, il décide de léguer sa fortune à quiconque découvrira l'œuf de Pâques numérique qu'il a dissimuler dans l'OASIS.","Steven Spielberg","action",2018,"Tye Sheridan",140);

INSERT INTO FILMS 
VALUES (6,"Indiana jones et le royaume du crane de cristal",20,"En 1957, en pleine Guerre Froide. Indy et Mac viennent d'échapper à une bande d'agents soviétiques. De retour au Marshall Collège, le Professeur apprend une mauvaise nouvelle : ses activités l'ont rendu suspect aux yeux du gouvernement américain.","Steven Spielberg","action",2008,"Harrsson Ford",123);

INSERT INTO FILMS 
VALUES (7,"Les dents de la mer",5,"Les habitants de la station balnéaire d'Amity sont en émoi par la découverte d'un corps mutilé d'une jeune vacancière. Pour le chef de la police, il ne fait aucun doute que la jeune fille a été victime d'un requin","Steven Spielberg","action",1975,"Roy Scheider",124);

INSERT INTO FILMS 
VALUES (8,"Avatar : la voie de l'eau",21,"AVATAR raconte l'histoire de la famille Sully, les épreuves auxquelles ils sont confrontés, les chemins qu’ils doivent emprunter pour se protéger les uns les autres, les batailles qu’ils doivent mener pour rester en vie et les tragédies qu'ils endurent","James Cameron","action",2022,"Sam Worthington",182);

INSERT INTO FILMS 
VALUES (9,"Mayday",19,"Un pilote commercial, Brodie Torrance, a réussi l'exploit de faire atterrir son avion endommagé par une tempête sur la terre ferme. Il va découvrir qu'il s'est déposé sur une zone de guerre. Lui et les passagers se retrouvent pris en otage.","Jean Francois Richet","action",2023,"Gerard Butler",108);

INSERT INTO FILMS 
VALUES (10,"Black Panter : Wakand forever",18,"La Reine Ramonda, Shuri, M’Baku, Okoye et les Dora Milaje luttent pour protéger leur nation des ingérences d’autres puissances mondiales après la mort du roi T’Challa. Mais une terrible menace surgit d’un royaume caché au plus profond des océans","Ryan Coogler","action",2022,"Letitia Wright",162);

INSERT INTO FILMS 
VALUES (11,"Forrest Gump",7,"Quelques décennies d'histoire américaine, des années 1940 à la fin du XXème siècle, à travers le regard et l'étrange odyssée d'un homme simple et pur, Forrest Gump.","Robert Zemeckis","comédie",2015,"Tom Hanks",140);

INSERT INTO FILMS 
VALUES (12,"Asterix et Obelix : l'empire du milieu",20,"L’Impératrice de Chine est emprisonnée suite à un coup d’état. Aidée par le marchand phénicien, et par sa fidèle guerrière , la princesse Fu Yi, s’enfuit en Gaule pour demander de l’aide aux deux valeureux guerriers Astérix et Obélix.","Guillaune Canet","comédie",2023,"Guillaune Canet",111);

INSERT INTO FILMS 
VALUES (13,"Zodi et Téhu, frères du desert",17,"Zodi, un jeune nomade de 12 ans, découvre dans le désert un bébé dromadaire orphelin. Il le recueille, le nourrit, le baptise Téhu. Zodi apprend que Téhu est un coureur exceptionnel et qu’il peut rapporter beaucoup d’argent à sa tribu.","Eric Barbier","comédie",2023,"Yassir Drief",110);

INSERT INTO FILMS 
VALUES (14,"Nous finirons ensemble",14,"Préoccupé, Max est parti dans sa maison au bord de la mer pour se ressourcer. Ses potes, qu’il n’a pas vue depuis plus de 3 ans débarque par surprise pour lui fêter son anniversaire ! La surprise est entière mais l’accueil l’est beaucoup moins...","Guillaune Canet","comédie",2019,"Guillaune Canet",135);

INSERT INTO FILMS 
VALUES (15,"Les petits mouchoirs",16,"suite à un événement, une bande de copains décide, de partir en vacances. Leur amitié, leurs certitudes, leur culpabilité, leurs amours en seront ébranlées. Ils vont devoir lever les petits mouchoirs qu'ils ont posés sur leurs secrets.","Guillaune Canet","comédie",2010,"Guillaune Canet",194);

INSERT INTO FILMS 
VALUES (16,"Les cyclades",15,"Adolescentes, Blandine et Magalie étaient inséparables. Les années ont passé et elles se sont perdues de vue. Alors que leurs chemins se croisent de nouveau, elles décident de faire ensemble le voyage dont elles ont toujours rêvé. Direction la Grèce ...","Marc Fitoussi","comédie",2023,"Laure Calamy",110);

INSERT INTO FILMS 
VALUES (17,"Selfie",14,"Dans un monde où la technologie numérique a envahi nos vies, certains finissent par craquer. Addict ou technophobe, en famille ou à l’école, au travail ou dans les relations amoureuses, Selfie raconte les destins d’Humain au bord de la crise de nerfs…","Marc Fitoussi","comédie",2020,"Bertand Soulier",107);

INSERT INTO FILMS 
VALUES (18,"La vie d'artiste",6,"Alice rêve de se voir sur un écran de cinéma. Bertrand aspire à la consécration littéraire et Cora, espère bouleverser la chanson française. Tous les trois sont décidés à parvenir à leurs fins. Mais les chemins de la gloire sont semés d'embûches..","Marc Fitoussi","comédie",2007,"Julien Baumgartner",107);

INSERT INTO FILMS 
VALUES (19,"Les Banshees dinisherin",16,"Sur Inisherin - une île isolée au large de la côte ouest de l'Irlande - deux compères de toujours, Padraic et Colm, se retrouvent dans une impasse lorsque Colm décide du jour au lendemain de mettre fin à leur amitié.","Martin McDonagh","comédie",2022,"Colin Farrell",114);

INSERT INTO FILMS 
VALUES (20,"Un petit miracle",19,"Rien ne va plus pour Juliette ! L’école dans laquelle elle enseignait a brulé, sa classe unique va devoir être dispatchée dans le département. Elle propose une solution surprenante : installer sa classe aux Platanes, la maison de retraite locale.","Sophie Boudre","comédie",2023,"Alice Pol",92);

INSERT INTO FILMS 
VALUES (21,"A la belle étoile",22,"Depuis son plus jeune âge, Yazid n’a qu’une passion, la pâtisserie. Elevé entre famille d’accueil et foyer, le jeune homme s’est forgé un caractère indomptable. Il va tenter de réaliser son rêve : travailler chez les plus grands chefs pâtissiers","Sebastien Tulard","comédie",2023,"Riadh Belaiche",110);
