-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Nov 12, 2026 alle 16:03
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pasticceria_alba`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotti`
--

CREATE TABLE `prodotti` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `categoria` text NOT NULL,
  `prezzo` double NOT NULL,
  `disponibilita` int(11) NOT NULL,
  `descrizione` varchar(300) NOT NULL,
  `ingredienti` varchar(500) NOT NULL,
  `allergeni` varchar(300) NOT NULL,
  `immagine` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `prodotti`
--

INSERT INTO `prodotti` (`id`, `nome`, `categoria`, `prezzo`, `disponibilita`, `descrizione`, `ingredienti`, `allergeni`, `immagine`) VALUES
(1, 'Sacher', 'Torte', 21, 6, 'Torta al cioccolato con morbido pan di spagna, farcita con marmellata di albicocche e ricoperta da glassa al cioccolato fondente.', 'Pan di spagna (uova, zucchero, farina di grano tenero), cioccolato fondente, confettura di albicocche, burro, zucchero, cacao.', 'Glutine, uova, latte. Può contenere tracce di frutta a guscio e soia.', 'sacher.jpg'),
(2, 'Crostata di frutta e crema pasticcera', 'Torte', 15, 5, 'Crostata di pasta frolla friabile con crema pasticcera alla vaniglia e guarnizione di frutti rossi freschi (fragole, lamponi, mirtilli e ribes).', 'Pasta frolla (farina di grano tenero, burro, zucchero, uova), crema pasticcera (latte, uova, zucchero, amido di mais, vaniglia), frutti rossi freschi (fragole, lamponi, mirtilli, ribes), gelatina alimentare.', 'Glutine, uova, latte. Può contenere tracce di frutta a guscio e soia.', 'crostata.jpg'),
(3, 'Torta moderna cioccolato bianco e frutti di bosco', 'Torte', 35, 7, 'Torta moderna con mousse ai frutti di bosco, gelèe al lampone, namelaka al cioccolato bianco e una base di riso soffiato e cioccolato bianco.', 'Base riso soffiato (cioccolato bianco, burro di cacao, riso soffiato), gelée ai lamponi (lamponi, zucchero, acqua, amido di mais), mousse frutti di bosco (frutti di bosco, zucchero, gelatina, panna), e namelaka al cioccolato bianco(panna, latte, gelatina alimentare, cioccolato bianco)', 'Soia, latte e derivati. Può contenere tracce di frutta a guscio e uova.', 'moderna1.jpg'),
(4, 'Torta foresta nera moderna', 'Torte', 30, 7, 'Torta foresta nera moderna con inserto alle ciligie, namelaka al cioccolato fondente e biscuit al cacao.', 'Biscuit al cacao (uova, zucchero, farina di frumento, cacao amaro, burro), crema namelaka al cioccolato fondente (cioccolato fondente, latte, panna, zucchero, gelatina alimentare), inserto alle ciliegie (ciliegie, zucchero, succo di limone, amido di mais)', 'Uova, glutine, soia, latte e derivati.Può contenere tracce di frutta a guscio.', 'moderna2.jpg'),
(5, 'Croissant al cioccolato', 'Sfogliati', 3, 10, 'Croissant con all\'interno una crema di cioccolato gianduia.', 'Pasta sfoglia(farina di frumento, burro, acqua, zucchero, lievito, sale), crema al gianduia (zucchero, nocciole, cioccolato al latte, cacao, olio di girasole, latte), uova (per doratura).', 'Glutine, uova, latte, frutta a guscio(nocciole). Può contenere tracce di altra frutta a guscio e soia.', 'croissantcioccolato.jpg'),
(6, 'Croissant al lampone', 'Sfogliati', 3, 10, 'Croissant farcito con confettura di lamponi.', 'Pasta sfoglia(farina di frumento, burro, acqua, zucchero, lievito, sale), confettura di mirtilli (mirtilli, zucchero, succo di limone, pectina), uova (per doratura).', 'Glutine, uova, latte. Può contenere tracce di frutta a guscio e soia.', 'croissantlampone.jpg'),
(7, 'Croissant al pistacchio', 'Sfogliati', 4, 15, 'Croissant farcito con crema al pistacchio di Bronte.', 'Pasta sfoglia (farina, burro, acqua, zucchero, lievito, sale), crema al pistacchio di Bronte(pistacchio di Bronte, zucchero, oli vegetali, latte, cacao bianco, aromi naturali), uova(per doratura).', 'Glutine, uova, frutta a guscio(pistacchio), latte e derivati. Può contenere tracce di altra frutta a guscio e soia.', 'croissantpistacchio.jpg'),
(8, 'Croissant alla crema e mirtilli', 'Sfogliati', 3, 8, 'Croissant farcito con crema alla vaniglia e guarnito con mirtilli freschi.', 'Pasta sfoglia(farina di frumento, burro, acqua, zucchero, lievito, sale), crema alla vaniglia tipo pasticcera (latte, uova, zucchero, amido di mais, vaniglia naturale), mirtilli freschi, uova (per doratura).', 'Uova, glutine, latte e derivati. Può contenere tracce di frutta a guscio e soia.', 'croissantcremamirtilli.jpg'),
(9, 'Cannoncini alla crema', 'Pasticcini', 2, 20, 'Cannoncini di pasta sfoglia farciti con crema pasticcera.', 'Pasta sfoglia (farina di frumento, burro, acqua, sale), crema pasticcera (latte, zucchero, tuorlo d’uovo, amido di mais, aroma naturale di vaniglia).', 'Glutine, uova, latte e derivati. Può contenere tracce di frutta a guscio e soia.', 'cannoncini.jpg'),
(10, 'Tartellette alla frutta', 'Pasticcini', 2, 20, 'Tartellette farcite con crema pasticcera e guarnite da frutta fresca.', 'Pasta frolla (farina di frumento, burro, zucchero, uova, sale), crema pasticcera (latte, zucchero, tuorlo d’uovo, amido di mais, aroma naturale di vaniglia), frutta fresca di stagione (fragole, mirtilli, kiwi, lamponi, uva o altra frutta), gelatina alimentare per lucidatura.', 'Glutine, uova, latte e derivati. Può contenere tracce di frutta a guscio e soia.', 'tartatelle.jpg'),
(11, 'Baci di dama', 'Pasticcini', 2, 30, 'Due biscotti friabili alle nocciole uniti da un sottile strato di cioccolato fondente.', 'Biscotti alle nocciole (farina di frumento, nocciole, burro, zucchero), cioccolato fondente (massa di cacao, zucchero, burro di cacao, emulsionante: lecitina di soia, aroma naturale di vaniglia).', 'Glutine, soia, frutta a guscio(nocciole), latte e derivati. Può contenere tracce di altra frutta a guscio e uova.', 'bacidama.jpg'),
(12, 'Tartellette meringate al limone', 'Pasticcini', 3, 20, 'Tartelletta di pasta frolla con crema al limone vellutata e copertura di meringa soffice leggermente caramellata.', 'Pasta frolla (farina di frumento, burro, zucchero, uova, sale), crema al limone (zucchero, uova, succo di limone, burro, scorza di limone, amido di mais), meringa (albume d’uovo, zucchero).', 'Glutine, uova, latte e derivati. Può contenere tracce di frutta a guscio e soia.', 'tartatellelimone.jpg'),
(13, 'Petit four al lampone su base financier', 'Pasticcini', 3, 15, 'Petit four su base di financier alle mandorle, farcito con mousseline al lampone, cuore di coulis di frutta e lampone fresco in superficie.', 'Financier (burro, zucchero a velo, albume d’uovo, farina di mandorle, farina di frumento, lievito) mousseline al lampone (latte, zucchero, tuorlo d’uovo, burro, amido di mais, purea di lamponi, coulis di frutta (lamponi, zucchero, succo di limone, decorazione(lampone fresco).', 'Uova, glutine, frutta a guscio (mandorle), latte e derivati. Può contenere tracce di frutta a guscio e soia.', 'petitfour.jpg'),
(14, 'Religieuse al cioccolato', 'Pasticcini', 3, 15, 'Dolce di pasta choux composto da due bignè sovrapposti, farciti con crema al cioccolato e ricoperti da una glassa lucida al cioccolato fondente.', 'Pasta choux (acqua, burro, farina di frumento, uova, sale), crema al cioccolato (latte, zucchero, tuorlo d’uovo, amido di mais, cioccolato fondente: massa di cacao, zucchero, burro di cacao), glassa al cioccolato (cioccolato fondente, panna, zucchero, glucosio, gelatina alimentare.', 'Glutine, uova, latte e derivati. Può contenere tracce di frutta a guscio e soia.', 'bigne.jpg'),
(15, 'Monoporzione di tiramisù', 'Monoporzioni', 5, 6, 'Monoporzione composta da un guscio di frolla friabile, farcito con crema al tiramisù a base di mascarpone e caffè, stratificata con biscotto inzuppato e rifinita con cacao amaro in superficie.', 'Pasta frolla (farina di frumento, burro, zucchero, uova, tuorlo, vaniglia, sale), crema tiramisù (mascarpone, panna fresca, zucchero, uova pastorizzate, caffè espresso, cacao amaro), inserto di savoiardi (farina di frumento, zucchero, uova caffè espresso, zucchero), finitura(cacao amaro in polvere).', 'Glutine, uova, latte e derivati. Può contenere tracce di frutta a guscio e soia.', 'monoporzionetiramisu.jpg'),
(16, 'Monoporzione crema e mirtilli', 'Monoporzioni', 6, 6, 'Tartelletta composta da un guscio di frolla friabile farcito con crema alla vaniglia e mirtilli freschi, decorata con ciuffi di crema, mirtilli interi, fiori edibili e scaglie d’oro alimentare.', 'Pasta frolla (farina di frumento, burro, zucchero, uova, sale, vaniglia), crema alla vaniglia (latte intero, panna fresca, zucchero, tuorli d’uovo, amido di mais, vaniglia), decorazione (mirtilli freschi).', 'Glutine, uova, latte e derivati. Può contenere tracce di frutta a guscio e soia.', 'monoporzionecrema.jpg'),
(17, 'Monoporzione moderna al mango', 'Monoporzioni', 8, 10, 'Monoporzione al mango composta da una mousse leggera al mango con cuore cremoso alla vaniglia e mango.', 'Mousse al mango (purea di mango, panna fresca, zucchero, gelatina alimentare, succo di limone, cuore cremoso mango e vaniglia (purea di mango, uovo, zucchero, burro, gelatina, vaniglia), copertura effetto mango(burro di cacao, cioccolato bianco, coloranti alimentari).', 'Uova, latte e derivati. Può contenere tracce di glutine, altra frutta a guscio e soia.', 'mango.jpg'),
(18, 'Monoporzione moderna alla nocciola', 'Monoporzioni', 9, 10, 'Monoporzione a forma di nocciola composta da una mousse al cioccolato al latte e nocciola, con cuore cremoso alla vaniglia e caramello, inserto pralinato alla nocciola con fiocchi di fleur de sel e copertura al cioccolato.', 'Mousse cioccolato al latte e nocciola (cioccolato al latte, panna fresca, purea di nocciole, zucchero, gelatina alimentare), cuore caramello e vaniglia (zucchero, panna, burro, vaniglia, gelatina alimentare), inserto pralinato nocciola e fleur de sel (nocciole, zucchero, burro di cacao, sale, cioccolato), copertura (cioccolato al latte, burro di cacao, coloranti alimentari).', 'Glutine, latte e derivati, frutta a guscio(nocciole). Può contenere tracce di frutta a guscio, uova e soia.', 'nocciola.jpg'),
(19, 'Monoporzione moderna al caffè', 'Monoporzioni', 8, 10, 'Monoporzione al caffè composta da mousse al caffè, cremoso al caffè, biscuit al caffè e croccante pralinato con nocciole, mandorle e fleur de sel, con inserto gel al caffè ristretto.', 'Mousse al caffè (panna fresca, latte, zucchero, caffè, gelatina alimentare), cremoso al caffè (latte, panna, tuorli d’uovo, zucchero, caffè, burro, gelatina alimentare), biscuit al caffè (uova, zucchero, farina di frumento, caffè, burro), croccante pralinato caffè e fleur de sel (nocciole, mandorle, zucchero, cioccolato, burro di cacao, sale (fleur de sel), cereali croccanti), gel al caffè ristretto (caffè espresso ristretto, zucchero, gelificante).\r\n          </p>  <br>', 'Glutine, uova, frutta a guscio (nocciole, mandorle), latte e derivati. Può contenere tracce di frutta a guscio e soia.', 'caffe.jpg'),
(20, 'Monoporzione moderna alle arachidi', 'Monoporzioni', 9, 10, 'Monoporzione a base di arachidi composta da mousse alle arachidi, cuore cremoso alla vaniglia e caramello, inserto pralinato alle arachidi con fleur de sel e copertura al cioccolato.', 'Mousse alle arachidi (burro di arachidi, panna fresca, latte, zucchero, gelatina alimentare), cuore caramello e vaniglia (zucchero, panna, burro, vaniglia, gelatina alimentare), inserto pralinato alle arachidi e fleur de sel (arachidi, zucchero, burro di cacao, cioccolato, sale), copertura (cioccolato al latte o fondente, burro di cacao, coloranti alimentari).', 'Arachidi, latte e derivati. Può contenere tracce di glutine, uova, soia e altra frutta a guscio.', 'arachide.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`nome`, `cognome`, `email`, `username`, `password`, `admin`) VALUES
('Giorgia', 'Calissano', 'giorgia.calissano@gmail.com', 'giorgia.calissano', '12345678', 1),
('Mario', 'Rossi', 'mario@gmail.com', 'mario.rossi', '87654321', 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `prodotti`
--
ALTER TABLE `prodotti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `prodotti`
--
ALTER TABLE `prodotti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
