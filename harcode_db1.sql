-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 07, 2018 at 09:28 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `harcode_db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `drzave`
--

DROP TABLE IF EXISTS `drzave`;
CREATE TABLE IF NOT EXISTS `drzave` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(40) NOT NULL,
  `opis` varchar(500) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drzave`
--

INSERT INTO `drzave` (`ID`, `naziv`, `opis`) VALUES
(19, 'Switzerland', ''),
(18, 'Hrvatska', '');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

DROP TABLE IF EXISTS `emails`;
CREATE TABLE IF NOT EXISTS `emails` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `text` varchar(1000) NOT NULL,
  `title` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `text`, `title`) VALUES
(1, 'Primjer', 'Ovo je naslov e-maila');

-- --------------------------------------------------------

--
-- Table structure for table `galerija`
--

DROP TABLE IF EXISTS `galerija`;
CREATE TABLE IF NOT EXISTS `galerija` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `harcode` varchar(7) NOT NULL,
  `slike` varchar(500) NOT NULL,
  `user` varchar(250) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edit` varchar(250) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galerija`
--

INSERT INTO `galerija` (`ID`, `harcode`, `slike`, `user`, `time`, `edit`) VALUES
(21, '0000018', 'Immuno FD 3.JPG', '', '0000-00-00 00:00:00', ''),
(20, '0000018', 'Immuno FD 2.JPG', '', '0000-00-00 00:00:00', ''),
(16, '0000018', 'Immuno FD.jpeg', '', '0000-00-00 00:00:00', ''),
(22, '0000018', 'Immuno FD 1.JPG', '', '0000-00-00 00:00:00', ''),
(29, '0000034', 'UROVITA kutijica 3D.jpg', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `gradovi`
--

DROP TABLE IF EXISTS `gradovi`;
CREATE TABLE IF NOT EXISTS `gradovi` (
  `zip` varchar(15) NOT NULL,
  `naziv` varchar(40) NOT NULL,
  `drzava` varchar(40) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gradovi`
--

INSERT INTO `gradovi` (`zip`, `naziv`, `drzava`, `ID`) VALUES
('10000', 'Zagreb', 'Hrvatska', 5);

-- --------------------------------------------------------

--
-- Table structure for table `grupe`
--

DROP TABLE IF EXISTS `grupe`;
CREATE TABLE IF NOT EXISTS `grupe` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `grupa` varchar(100) NOT NULL,
  `opis` varchar(250) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grupe`
--

INSERT INTO `grupe` (`ID`, `grupa`, `opis`) VALUES
(7, 'Farmaceutski proizvodi', '');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

DROP TABLE IF EXISTS `korisnici`;
CREATE TABLE IF NOT EXISTS `korisnici` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`ID`, `user`, `password`, `ime`, `prezime`, `email`) VALUES
(1, 'admin', 'admin', 'Ime', 'Prezime', 'ime.prezime@domena.domena'),
(2, 'akozar', 'nqld.66R', 'Antonio', 'KoÅ¾ar', 'a.kozar@live.com');

-- --------------------------------------------------------

--
-- Table structure for table `lijekarne`
--

DROP TABLE IF EXISTS `lijekarne`;
CREATE TABLE IF NOT EXISTS `lijekarne` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(200) NOT NULL,
  `grad` varchar(50) NOT NULL,
  `adresa` varchar(200) NOT NULL,
  `drzava` varchar(50) NOT NULL,
  `zupanija` varchar(50) NOT NULL,
  `telefon` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `timestamp` datetime NOT NULL,
  `user` int(50) NOT NULL,
  `contacted` varchar(255) NOT NULL,
  `checked` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lijekarne`
--

INSERT INTO `lijekarne` (`id`, `naziv`, `grad`, `adresa`, `drzava`, `zupanija`, `telefon`, `email`, `timestamp`, `user`, `contacted`, `checked`) VALUES
(7, 'Aplikacije', 'Babina Greda', 'as', 'asd', 'asd', '8947984', 'aasd@asdasd.asd', '0000-00-00 00:00:00', 0, '', 0),
(8, 'Test ime', 'Test grad', 'Test adresa', 'Test država', 'test županija', '989468494', 'antonio.kozar@hotmail.com', '0000-00-00 00:00:00', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `podgrupe`
--

DROP TABLE IF EXISTS `podgrupe`;
CREATE TABLE IF NOT EXISTS `podgrupe` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(150) NOT NULL,
  `opis` varchar(500) NOT NULL,
  `grupa` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `podgrupe`
--

INSERT INTO `podgrupe` (`ID`, `naziv`, `opis`, `grupa`) VALUES
(4, 'Dodaci prehrani', '', 'Farmaceutski proizvodi'),
(5, 'Za uroloÅ¡ke probleme', '', 'Farmaceutski proizvodi');

-- --------------------------------------------------------

--
-- Table structure for table `predmeti`
--

DROP TABLE IF EXISTS `predmeti`;
CREATE TABLE IF NOT EXISTS `predmeti` (
  `harcode` varchar(7) NOT NULL,
  `barcode` varchar(13) NOT NULL,
  `naslov` varchar(250) NOT NULL,
  `podnaslov` varchar(250) NOT NULL,
  `opis` longtext NOT NULL,
  `info` varchar(250) NOT NULL,
  `audio` varchar(100) NOT NULL,
  `video` text NOT NULL,
  `pdf` text NOT NULL,
  `grupa` varchar(100) NOT NULL,
  `podgrupa` varchar(250) NOT NULL,
  `ID` bigint(11) NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edit` varchar(250) NOT NULL,
  `user` varchar(250) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `predmeti`
--

INSERT INTO `predmeti` (`harcode`, `barcode`, `naslov`, `podnaslov`, `opis`, `info`, `audio`, `video`, `pdf`, `grupa`, `podgrupa`, `ID`, `time`, `edit`, `user`) VALUES
('0000018', '3858885151594', 'Immuno FD', 'S vitaminom C i selenom', 'PRIMJENA IMUNOLOÅ KE TERAPIJE U LIJEÄŒENJU KARCINOMA\r\n\r\nNovi naÄin pomoÄ‡i oboljelima od malignih bolesti i u \r\nVIÅ E OD 1000 KLINIKA U SVIJETU JE PRIMJEMJUJE KAO NADOPUNU STANDARDNIM TERAPIJAMA\r\n \r\nBESPLATNI SAVJETI dr HEDER 01.6187.113\r\n \r\n- KAKO smanjiti nuspojave kemoterapije:\r\n  povraÄ‡anje, muÄnine, umor, gubitak   apetita, gubitak kose.... ?\r\n- KAKO smanjiti, zaustaviti ili usporiti rast tumora ?\r\n- KAKO sprijeÄiti i usporiti Å¡irenje metastaza ?\r\n- KAKO produÅ¾iti periode remisije i preÅ¾ivljavanja ?\r\n \r\nImunoterapija je najnovija grana moderne onkologije koja koristi imunoloÅ¡ki sustav organizma, bilo direktno ili indirektno, u borbi protiv raka. NaÅ¡ organizam ima prirodnu sposobnost da se zaÅ¡titi od bolesti, ukljuÄujuÄ‡i zloÄ‡udne. ImunoloÅ¡ki sustav moÅ¾e prepoznati razliku izmedju zdravih i zloÄ‡udnih stanica i eliminirati potonje iz tijela.\r\nImunoterapija ili bioloÅ¡ka terapija obnavlja, stimulira ili pojaÄava prirodnu antitumorsku funkciju imunoloÅ¡kog sustava.\r\nPotvrda velikog znaÄenja imunoterapije u modernoj medicini je proÅ¡logodiÅ¡nja Nobelova nagrada za medicinu dodijeljena za istraÅ¾ivanja u podruÄju imunoterapije.\r\n \r\nBOLJE PODNOÅ ENJE I MANJA Å TETNOST KEMOTERAPIJE\r\n \r\nDjelotvornost imunoterapije najbolja se pokazala u kombinaciji sa kemoterapijom.\r\nSmanjuje kroniÄni umor, malaksalost i iscrpljenost, smanjuje gubitak kose, poboljÅ¡ava apetit vraÄ‡a energiju, poboljÅ¡ava san i raspoloÅ¾enje, izaziva manje muÄnine, povraÄ‡anje i proljeve smanjuje oÅ¡teÄ‡enje jetre i pomaÅ¾e u odrÅ¾avanju normalnih nivoa jetrenih enzima za vrijeme kemoterapije, kao jak antioksidant smanjuje i oÅ¡teÄ‡enja zdravog tkiva uzrokovanog zraÄenjem, smanjuje toksiÄnost kemoterapije na koÅ¡tanu srÅ¾, pa time i pad vrijednosti leukocita, trombocita i eritrocita za vrijeme kemoterapije, poveÄ‡ava uÄinkovitost kemoterapije.\r\nImunoterapija moÅ¾e poboljÅ¡ati  uÄinkovitost kemoterapije djelovanjem na imunoloÅ¡ki sustav i dovesti  do znaÄajnog smanjenja nuspojava ili popratnih pojava kemoterapije. Uz pomoÄ‡ imunoterapije, kemoterapija postaje  podnoÅ¡ljivija i manje Å¡tetna za pacijente oboljele od malignih bolesti.\r\n \r\nREZULTATI KORIÅ TENJA\r\n \r\nOd usporavanja ili zaustavljanja rasta tumora do stvarnog smanjenja tumorske mase, zaustavljanja Å¡irenja metastaza, poveÄ‡anog vremena preÅ¾ivljavanja, produÅ¾enja perioda remisije bolesti do poboljÅ¡anja kvalitete Å¾ivota i boljeg opÄ‡eg zdravstvenog stanja oboljelih od zloÄ‡udne bolest.\r\n \r\nU Hrvatskoj je pacijentima i njihovim obiteljima, osigurano i lijeÄniÄko savjetovaliÅ¡te, pa je tako dr.med. Dijana Heder na raspolaganju za sve informacije, savjete te  psiholoÅ¡ku pomoÄ‡ i podrÅ¡ku na tel. 01.6187.113.\r\n ', 'EuroVita d.o.o.', 'Immuno FD AUDIO 40sek.mp3', 'www.youtube.com/embed/69UMSMnx1C0?feature=player_detailpage', 'Imunoterapija.pdf', 'Farmaceutski proizvodi', 'Dodaci prehrani', 9, '2014-05-16 14:51:54', '', ''),
('0000034', '3830049642032', 'UroVITA', 'PomaÅ¾e kod problema s mokrenjem ', 'UroVITA, 60kapsula\r\nBESPLATNI SAVJETI dr. HEDER Tel: 01.6187.032\r\n\r\nImate li problema sa prostatom ?\r\nUroVITA jedinstven spoj najuÄinkovitijih 100% prirodnih sastojaka\r\nza odrÅ¾avanje zdrave prostate.\r\nPomaÅ¾e funkciji prostate i mokraÄ‡ih kanala\r\n \r\nSadrÅ¾i SUHI EKSTRAT KORIJENA KOPRIVE\r\nSVJETSKI BROJ 1 U UBLAÅ½AVANJU UROLOÅ KIH PROBLEMA\r\nPOTRAÅ½ITE U SVIM LJEKARNAMA\r\n \r\nâ€¢ ÄŒesto, isprekidano i oteÅ¾ano mokrenje\r\nâ€¢ Äesto noÄ‡no mokrenje\r\nâ€¢ slab i spor mlaz mokraÄ‡e\r\nâ€¢ nemoguÄ‡nost zadrÅ¾avanja mokraÄ‡e\r\nâ€¢ osjeÄ‡aj neispraÅ¾njenosti mokracnog mjehura\r\nâ€¢ kapanje mokraÄ‡e\r\nâ€¢ problemi s erekcijom i ejakulacijom\r\n \r\nNEKA UROLOÅ KI PROBLEMI POSTANU PROÅ LOST!\r\n \r\nSASTOJCI UroVITE:\r\nNAJKAVALITETNIJI SUHI EKSTRAKT KORIJENA KOPRIVE, KORA AFRIÄŒKE Å LJIVE (PYGEUM AFRICANUM), SABAL PALMA, EKSTRAKT LIVADNE DJETELINE,\r\nVITAMIN D, VITAMIN E, SELEN, EKSTRAKT ZELENOG  ÄŒAJA I EKSTRAT NARA\r\n \r\nJedinstven spoj najuÄinkovitijih 100% prirodnih sastojaka za odrÅ¾avanje zdrave prostate. Kod malo kojeg oboljenja se moÅ¾e naci tako djelotvorna prirodna alternativa.\r\n \r\n \r\nZaÅ¡to uzimati UroVITU?\r\n \r\nUroVITA moÅ¾e usporiti benigno poveÄ‡anje  prostate, te ublaÅ¾iti tegobe i uvelike olakÅ¡ati Å¾ivot pacijentima sa uveÄ‡anom prostatom. UroVITA sadrÅ¾i biljne supstance koje se  koriste  od davnih vremena u ublaÅ¾avanju smetnji mokrenja. Velika prednost  UroVITE je praktiÄno nepostojanje neÅ¾eljenih efekata, a  koristi se  bez recepta.\r\n \r\n \r\nÄŒesto noÄ‡no mokrenje, slab protok urina, nemoguÄ‡nost zadrÅ¾avanja urina  i nekontrolirano mokrenje\r\n \r\nOvo su vrlo  neugodni simptomi koji naruÅ¡avaju kvalitetu  Å¾ivota milijunima muÅ¡karaca. Ne dozvolite da se to dogodi i vama. UroVITA sadrÅ¾i ekstrakt ploda sabal palme (Saw Palmetto ili Serenoa repens) i ekstrakt kore afriÄke Å¡ljive (pygeum africanum) , koji  imaju  dokazani uÄinak na smanjenje spomenutih tegoba.\r\n \r\n \r\nNeispraÅ¾njenost mokraÄ‡nog mjehura\r\n \r\nNeispraÅ¾njenost mokraÄ‡nog mjehura, zaostali urin u mjehuru  je opasan simptom jer moÅ¾e dovesti do rasta bakterija i Äestih upala mokraÄ‡nog mjehura. UroVITA sadrÅ¾i najkvalitetniji ekstrakt korijena koprive koji potpomognut i ekstraktom kore afriÄke Å¡ljive djeluje diuretski i olakÅ¡ava mokrenje, Äime se smanjuje koliÄina zaostalog urina u mjehuru i sprjeÄava stvaranje upale. Korijen koprive regulira i rad prostate i sprjeÄava njeno poveÄ‡anje. Sabal palma i ekstrakt nara imaju izraÅ¾eno antiseptiÄko i protuupalno djelovanje.\r\n \r\nSeksualna disfunkcija prati poveÄ‡anje prostate\r\n \r\nSeksualna disfunkcija, problemi sa erekcijom i potencijom Äesti su i neugodni pratioci poveÄ‡anja prostate. Bitno je naglasiti da pygeum africanum i sabal palma koji su sastavni dio UroVITE ne izazivaju nuspojave u smislu smanjenja potencije kao farmaceutski lijekovi koji se koriste kod ublaÅ¾avanja simptoma poveÄ‡ane  prostate. DapaÄe,ekstrakti pygeuma u kombinaciji sa sabal palmom ublaÅ¾avaju seksualnu disfunkciju i dovode do opÄ‡eg poboljÅ¡anja kvalitete Å¾ivota.\r\n \r\n \r\nAktivnost spolnih hormona\r\n \r\nEkstrakt livadne djeteline (lat. Trifolium pratense) sadrÅ¾i izoflavone, a to su tvari koje nalikuju na hormone. Zbog toga djeluje na regulaciju, proizvodnju i aktivnost spolnih hormona koji imaju ulogu kod poveÄ‡anja prostate.\r\n \r\n \r\nZaÅ¡tita mokraÄ‡nog i spolnog sustava\r\n \r\nVitamin D, vitamin E, selen i ekstrakt zelenog Äaja su vrlo snaÅ¾ni antioksidanti i Å¡tite stanice prostate od oÅ¡teÄ‡enja, Å¡to doprinosi zaÅ¡titi mokraÄ‡nog i spolnog sustava.\r\n \r\n \r\nBENIGNO POVEÄ†ANJE PROSTATE (BHP)\r\n \r\nBenigno poveÄ‡anje prostate je bolest koja uzrokuje razlicite stupnjeve zaÄepljenja mokraÄ‡nih putova te oteÅ¾ava ili gotovo potpuno onemoguÄ‡ava praÅ¾njenje mokraÄ‡nog mjehura. BHP je najÄeÅ¡ce dijagnosticirano stanje kod odraslih muÅ¡karaca, od kojeg boluje svaki treÄ‡i muÅ¡karac u dobi iznad 50 godina. Preko 35% muÅ¡karaca u dobi od 50 do 60 godina boluje od BHP-a, preko 60% u dobi od 60 do 70 godina, a skoro preko\r\n80% je oboljelih u dobi iznad 75 godina Å¾ivota.\r\nNeki bolesnici izrazite smetnje doÅ¾ivljavaju kao normalno stanje za svoje godine, te se i ne obraÄ‡aju lijeÄniku, dok drugi reagiraju i na minimalne promjene vezane za mokrenje. Benigno povecanje prostate se moÅ¾e usporiti, mogu se ublaÅ¾iti tegobe i time uvelike olakÅ¡ati Å¾ivot pacijentima sa uveÄ‡anom prostatom.\r\n \r\nBiljni preparati koriste se od davnih vremena u ublaÅ¾avanju smetnji mokrenja.\r\nNjihova velika prednost je praktiÄno ne postojanje neÅ¾eljenih efekata, a mogu se koristiti i bez recepta.\r\n \r\nUROVITA sadrÅ¾i najkvalitetniji suhi ekstrakt korijena koprive:\r\n \r\nSVJETSKI BROJ 1 u ublaÅ¾avanju uroloÅ¡kih problema, snaÅ¾ne antioksidanse: vitamin D,\r\nvitamin E, selen i ekstrakt zelenog Äaja koji Å¡tite stanice prostate od oÅ¡tecenja, dok ekstrakti livadne djeteline, nara, kore africke Å¡ljive (pygeum africanum) i Sabal palme Äine da uroloÅ¡ki problemi postanu proÅ¡lost.\r\n \r\nUPALA PROSTATE\r\n \r\nUpala prostate ili prostatitis je bolest od koje barem jednom u Å¾ivotu oboli 10-15% muÅ¡karaca. NajceÅ¡ca je uroloÅ¡ka dijagnoza kod muÅ¡karaca mlaÄ‘ih od 50 godina i treÄ‡a najÄeÅ¡ca uroloÅ¡ka dijagnoza u muÅ¡karaca starijih od 50 godina (nakon dijagnoze benignog povecanja prostate i raka prostate).\r\nOd svih posjeta urologu, oko 8% muÅ¡karaca javlja se radi smetnji uzrokovanih prostatitisom.\r\nAkutna upala prostate najceÅ¡ce se javlja kod muÅ¡karaca izmeu 20. i 40. godine. OÄituje se naglim poÄetkom sa znakovima i simptomima infekcije.\r\n \r\nIzraÅ¾ene smetnje su: opÄ‡a slabost, poviÅ¡ena tjelesna temperatura, bolovi u predjelu ispod i iza spolnog organa ili osjeÄ‡aj nelagode izmeÄ‘u Ämara i moÅ¡nje ili u zavrÅ¡nom dijelu debelog crijeva.\r\nOsim navedenih tegoba javlja se uÄestalo, bolno i oteÅ¾ano mokrenje, gnojan ili krvav\r\niscjedak iz mokraÄ‡ne cijevi, a katkad moÅ¾e doÄ‡i i do nemoguÄ‡nosti mokrenja.\r\n \r\nKroniÄna upala prostate, predstavlja u veÄ‡oj ili manjoj mjeri trajno poremeÄ‡enu funkciju. UzroÄnici kroniÄnog bakterijskog prostatitisa su mikroorganizmi razliÄitih vrsta (Escherichia coli, Proteus, Enterococcus, Klebsiella, Neisseria gonrrhoeae itd), koji prodiru u prostatu i izazivaju bolesno stanje.\r\n \r\nSimptome kroniÄne upale prostate moÅ¾emo podijeliti u tri skupine:\r\nbolni simptomi (bol izmeu moÅ¡nje i cmara, bol u donjem dijelu leÄ‘a, bol u donjem dijelu trbuha, bol u sjemenicima, bol u spolnom udu, bol kod mokrenja),\r\n \r\nZnaci poremeÄ‡enog mokrenja (nepotpuno mokrenje, ponovni poziv na mokrenje u periodu manjem od 2 sata, mokrenje na mahove, slabi mlaz mokraÄ‡e, mokrenje s napinjanjem ili uz pritisak, noÄ‡no mokrenje)\r\n \r\nI znaci ili simptomi vezani za seksualne poremecaje (smetnje erekcije, bolovi kod ejakulacije, krv u spermi, umanjena Å¾elja za seksualnim odnosom, preuranjena ejakulacija).\r\n \r\nKroniÄni prostatitis nije lako dijagnosticirati niti lijeÄiti. To je bolest koja predstavlja â€žkriÅ¾â€œ u urologiji zbog svoje Å¡arolike slike, promjenjivog intenziteta, dugotrajnosti smetnji i dvostrukog nezadovoljstva, kako od strane pacijenta koji se ne uspijeva brzo i potpuno rijeÅ¡iti svojih tegoba, tako i od strane lijeÄnika urologa koji ne uspijeva uspjeÅ¡no izlijeÄiti bolest. No, to nikako ne znaÄi da se smije odustati od dijagnostiÄkih postupaka i\r\nlijeÄenja. Stavljanje pod kontrolu kroniÄnog prostatitisa moÅ¾e muÅ¡karcima uvelike uljepÅ¡ati Å¾ivot a i sprijeÄiti neke Äesto ozbiljne poremeÄ‡aje fiziÄkog i psihiÄkog aspekta zdravlja.\r\n \r\nBiljni preparati koriste se od davnih vremena u ublaÅ¾avanju smetnji mokrenja.\r\nNjihova velika prednost je praktiÄno ne postojanje neÅ¾eljenih efekata, a mogu se koristiti i bez recepta.\r\n \r\nUroVITA je jedinstven spoj najuÄinkovitijih 100% prirodnih sastojaka za odrÅ¾avanje\r\nzdrave prostate. Kod malo kojeg oboljenja se moÅ¾e naÄ‡i tako djelotvorna prirodna alternativa. UroVITA nije lijek. UroVITA je dodatak prehrani.\r\n ', 'EuroVita d.o.o.', '0', 'www.youtube.com/embed/4gAz85GRMAg?feature=player_detailpage', 'UroVITA.pdf', 'Farmaceutski proizvodi', 'Za uroloÅ¡ke probleme', 13, '2014-05-21 16:11:53', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodaci`
--

DROP TABLE IF EXISTS `proizvodaci`;
CREATE TABLE IF NOT EXISTS `proizvodaci` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(50) NOT NULL,
  `opis` longtext NOT NULL,
  `adresa` varchar(100) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(80) NOT NULL,
  `url` varchar(100) NOT NULL,
  `grad` varchar(40) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proizvodaci`
--

INSERT INTO `proizvodaci` (`ID`, `naziv`, `opis`, `adresa`, `tel`, `email`, `url`, `grad`) VALUES
(7, 'EuroVita d.o.o.', '', 'Kornatska 1A', '01/6187.032', 'info@eurovita.ch', 'www.eurovita.ch', 'Zagreb');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(70) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `usertype` varchar(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `contact`, `password`, `usertype`) VALUES
(1, 'admin', 'admin', 'admin@admin.admin', 'admin', '1234', '1'),
(6, 'user', 'user', 'user@user.user', 'user', '4321', '2');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
