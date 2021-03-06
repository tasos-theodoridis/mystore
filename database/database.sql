-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 05 Μαρ 2021 στις 19:46:43
-- Έκδοση διακομιστή: 10.4.14-MariaDB
-- Έκδοση PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `database`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `titlos` varchar(100) NOT NULL,
  `katigoria` varchar(100) NOT NULL,
  `apothema` int(11) NOT NULL,
  `keimeno` text NOT NULL,
  `img` varchar(100) NOT NULL,
  `timh` float NOT NULL,
  `suggrafeas` varchar(50) NOT NULL,
  `ekdoseis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `books`
--

INSERT INTO `books` (`book_id`, `titlos`, `katigoria`, `apothema`, `keimeno`, `img`, `timh`, `suggrafeas`, `ekdoseis`) VALUES
(1, '1984', 'a', 10, 'Περιγραφή: Renowned urban artist Shepard Faireys new look for Orwells dystopian masterpiece Winston Smith works for the Ministry of Truth in London, chief city of Airstrip One. Big Brother stares out from every poster, the Thought Police uncover every act of betrayal.For those with original thoughts they invented Room 101. . . 1984 is George Orwells terrifying vision of a totalitarian future in which everything and everyone is slave to a tyrannical regime.', 'images/biblia/1984.png', 9, 'Orwell George', 'Penguin Books Ltd'),
(2, 'The idiot ', 'a', 10, 'Περιγραφή:Prince Myshkin returns to Russia from an asylum in Switzerland. As he becomes embroiled in the frantic amatory and financial intrigues which centre around a cast of brilliantly realised characters and which ultimately lead to tragedy, he emerges as a unique combination of the Christian ideal of perfection and Dostoevskys own views, afflictions and manners. His serene selflessness is contrasted with the worldly qualities of every other character in the novel. ', 'images/biblia/theidiot.png', 5, 'Dostoyevsky Fyodor', 'Wordsworth Editions Ltd'),
(3, 'The witcher', 'a', 15, 'Περιγραφή:Geralt of Rivia is a Witcher, a man whose magic powers and lifelong training have made him a brilliant fighter and a merciless assassin. Yet he is no ordinary killer: he hunts the vile fiends that ravage the land and attack the innocent. In this second collection of short stories, following the adventures of the hit collection The Last Wish, join Geralt as he battles monsters, demons and prejudices alike .', 'images/biblia/sword.png', 13, 'Sapkowski Andrzej', 'Orion Publishing Co'),
(4, 'Murakami', 'a', 12, 'Περιγραφή: When he hears her favourite Beatles song, Toru Watanabe recalls his first love Naoko, the girlfriend of his best friend Kizuki. Immediately he is transported back almost twenty years to his student days in Tokyo, adrift in a world of uneasy friendships, casual sex, passion, loss and desire - to a time when an impetuous young woman called Midori marches into his life and he has to choose between the future and the past.', 'images/biblia/murakami.png', 8.5, 'Murakami Haruki', 'Vintage Publishing'),
(5, 'Macbeth', 'a', 10, 'Περιγραφή:When a drug bust turns into a bloodbath its up to Inspector Macbeth and his team to clean up the mess. Hes also an ex-drug addict with a troubled past. Hes rewarded for his success. Power. Money. Respect. Theyre all within reach. But a man like him wont get to the top. Plagued by hallucinations and paranoia, Macbeth starts to unravel. Hes convinced he wont get what is rightfully his. Unless he kills for it.', 'images/biblia/macbeth.png', 9, 'Nesbo Jo', 'Vintage Publishing'),
(6, 'Assassin creed', 'a', 15, 'Get ready for Odyssey: journey deeper in the world of Assassins Creed in the official novel of the highly anticipated new game, coming October 2018. Greece, 5th century BCE. Kassandra is a mercenary of Spartan blood, sentenced to death by her family, cast out into exile. Now she will embark on an epic journey to become a legendary hero - and uncover the truth about her mysterious lineage.', 'images/biblia/assassinscreed.png', 16.8, 'Doherty Gordon', 'Penguin Books Ltd'),
(7, 'Η μεγάλη χίμαιρα', 'b', 8, 'Περιγραφή: Ο συγγραφέας καταπιάνεται με ένα γυναικείο χαρακτήρα και τον αναλύει συστηματικά. Η ιστορία της Μαρίνας, μιας νεαρής Γαλλίδας που ερωτεύεται, παντρεύεται και ακολουθεί τον άνδρα της στη Σύρα, στο πατρικό του σπίτι της Επισκοπής. Κάθε τόσο τα όνειρα την ανατάραζαν, τη στριφογύριζαν στο κρεβάτι με μοχθηρία, ώσπου το κορμί της κουράστηκε να παλεύει με τους ίσκιους.', 'images/biblia/ximaira.png', 11, 'Καραγάτσης Μ.', 'Βιβλιοπωλείον της Εστίας'),
(8, 'Το σπίτι δίπλα στο ποτάμι', 'b', 9, 'Περιγραφή:Η Μελλισάνθη, η Ιουλία, η Ασπασία, η Πολυξένη και η Μαγδαληνή μεγαλώνουν με τη μητέρα τους σ’ ένα χωριό στον Όλυμπο, δίπλα σ’ ένα ποτάμι. Αυτό που επιθυμούν και οι πέντε είναι να γνωρίσουν τη ζωή μακριά από το πατρικό τους. Και θα το καταφέρουν! Η μοίρα θα τις στείλει στα τέσσερα σημεία του ορίζοντα, κάνοντας το όνειρο πραγματικότητα. Μόνο που καμιά φορά, τα όνειρα γίνονται εφιάλτες που στοιχειώνουν και κυνηγούν...', 'images/biblia/tospiti.png', 15, 'Μαντά Λένα', 'Ψυχογιός'),
(9, 'Ο λιμός', 'b', 8, 'Περιγραφή: Αθήνα, Δεκέμβριος 1941.\r\nΗ πόλη έχει βυθιστεί στον εφιάλτη του μεγάλου λιμού. Ένας λοχαγός των Ες Ες, ο οποίος ερευνά μια υπόθεση για λογαριασμό του υπουργού Προπαγάνδας Γιόζεφ Γκέμπελς, δολοφονείται άγρια στο ξενοδοχείο Μεγάλη Βρεταννία.Η υπόθεση παίρνει γρήγορα απρόβλεπτες διαστάσεις και ο υπαστυνόμος θα διαπιστώσει ότι έχει εμπλακεί σε ένα φονικό παιχνίδι στο οποίο συμμετέχουν μαυραγορίτες, μέλη της δωσιλογικής κυβέρνησης, επίορκα στελέχη της Ειδικής Ασφάλειας και αξιωματικοί των Ες Ες.', 'images/biblia/olimos.png', 11.6, 'Αμυράς Πάνος', 'Διόπτρα'),
(10, 'Ο φοίνικας', 'b', 10, 'Περιγραφή: ο Φοίνικας είναι το πιο φιλόδοξο έργο του Χωµενίδη. Καλύπτει εβδοµήντα σχεδόν χρόνια, από το 1860 έως το 1927.Κυρίως ο Φοίνικας δεν αφήνει ανέγγιχτο κανένα από τα µεγάλα, τα διαχρονικά ζητήµατα. Την καταγωγή και την ταυτότητα του καθενός, τον έρωτα, τη γονεϊκότητα, τις ολισθηρές στροφές του βίου, την πίστη και την προδοσία, την αγωνία για ένα νόηµα που θα υπερβαίνει τον θάνατο. ', 'images/biblia/ofoinikas.png', 12, 'Χωμενίδης Χρήστος Α.', 'Πατάκη'),
(11, 'Η Φόνισσα', 'b', 15, 'H «Φόνισσα» (1903) κατέχει, κατά γενική ομολογία, ξεχωριστή θέση στο έργο του Παπαδιαμάντη. Ξεχωριστή και με τις δύο σημασίες της λέξης: και ιδιαίτερη και εξέχουσα. Tο κακό που διαπράττει η γραία Xαδούλα δεν είναι το καθημερινό κακό, το συνηθισμένο, το κοινωνικό, αλλά το μέγα κακό, το ριζικό, το ασυγχώρητο.', 'images/biblia/hfonissa.png', 8, 'Παπαδιαμάντης Αλέξανδρος', 'Βιβλιοπωλείον της Εστίας'),
(12, 'Το κελάρι της ντροπής', 'b', 12, 'Περιγραφή: Δεκαετία του ’60. Σ’ ένα μικρό χωριό της Μεσσηνίας, τρεις αδελφές, η Δήμητρα, η Αναστασία και η Μυρτώ, μεγαλώνουν στη σκιά ενός πατέρα αφέντη και μιας μάνας που δεν έχει λόγο. Σταδιακά τα κορίτσια ξενιτεύονται σε τρεις διαφορετικές ηπείρους και με τον καιρό οι οικογενειακοί δεσμοί κόβονται. Σχεδόν τριάντα χρόνια αργότερα ένα τηλεφώνημα από την πατρίδα θα ταράξει τη μέχρι τότε ήρεμη ζωή τους. Η επιστροφή στο χωριό τους γίνεται επιτακτική και ο επικείμενος θάνατος της μάνας που άφησαν ολομόναχη χωρίς να ενδιαφερθούν γι’ αυτήν θα τις φέρει αντιμέτωπες με μυστικά και αλήθειες που απέκρυψαν. ', 'images/biblia/tokelari.png', 16, 'Δημουλίδου Χρυσηίδα', 'Ψυχογιός'),
(13, 'Η σκιά του κυβερνήτη', 'c', 8, 'Περιγραφή: Τέλη του 1827. Η Ελληνική Επανάσταση έχει σχεδόν καταπνιγεί. Η χώρα αγωνίζεται ακόμα για την ανεξαρτησία της. Οι δύο εμφύλιοι, η πτώση του Μεσολογγίου, οι καταστροφές του Ιμπραήμ στην Πελοπόννησο έχουν οδηγήσει τους Έλληνες στην απόγνωση. Σε μια ύστατη προσπάθεια να σωθούν καλούν τον Καποδίστρια να κυβερνήσει την Ελλάδα. Ο Ιωάννης Καποδίστριας είχε ένα όραμα για την Ελλάδα. Θα μείνει στην Ιστορία σαν μια ευκαιρία που χάθηκε.', 'images/biblia/skia.png', 15, 'Σφακιανάκης Άρης', 'Κέδρος'),
(14, 'Οι πύλες της φωτιάς', 'c', 8, 'Περιγραφή: Επτά ημέρες πολέμου και ζωής... Σε ένα στενό πέρασμα του όρους Καλλιδρόμου με τη θάλασσα, που λέγεται Θερμοπύλες, μακριά από τη γενέτειρά τους, το 480 π.Χ. τριακόσιοι επίλεκτοι Σπαρτιάτες πολεμιστές απώθησαν τους χιλιάδες πολεμιστές του Πέρση εισβολέα και έδωσαν με γενναιότητα τη ζωή τους, υπηρετώντας με ανιδιοτέλεια τη δημοκρατία και την ελευθερία. Ο Στίβεν Πρέσσφιλντ δεν ήταν στις Θερμοπύλες το 480 π.Χ., αλλά όταν τελειώσετε το βιβλίο θα νομίζετε ότι ήταν, κι εσείς μαζί.', 'images/biblia/pules.png', 13.3, 'Pressfield Steven', 'Πατάκη'),
(15, 'Η βιβλιοθηκάριος του Άουσβιτς', 'c', 9, 'Περιγραφή: Βασισμένο στην αληθινή ιστορία της Ντίτα Κράους.\r\nΗ ιστορία της μικρότερης και πιο επικίνδυνης βιβλιοθήκης στον κόσμο, ειπωμένη από μια κρατούμενη του Άουσβιτς που κατόρθωσε να επιβιώσει.Μόνο η Ντίτα Κράους και μια χούφτα ακόμα κρατούμενοι επέζησαν, έπειτα από παραμονή ενός έτους, πριν από την απελευθέρωσή τους από τους Συμμάχους την Άνοιξη του ’45.θυμάται τον Φρέντι Χιρς, τον αρχηγό του παιδικού μπλοκ 31. Στη μαύρη λάσπη του Άουσβιτς που καταπίνει τα πάντα, ο Φρέντι Χιρς έκτισε μυστικά ένα σχολείο. Οι Ναζί δεν το ξέρουν. Όπως δεν γνωρίζουν και την ύπαρξη της μικρότερης, κρυμμένης και παράνομης δημόσιας βιβλιοθήκης που υπήρξε ποτέ. \r\n', 'images/biblia/bibliothikarios.png', 13, 'Iturbe Antonio', 'Κλειδάριθμος'),
(16, 'Σαλαμίνα', 'c', 10, 'Περιγραφή: 480 π.Χ.. Η γιγαντιαία περσική αυτοκρατορία είναι αποφασισμένη να καταστρέψει την πόλη-σύμβολο και να κατακτήσει ολόκληρη την Ελλάδα. Από τη σαρωτική νίκη των Αθηναίων κατά της στρατιάς του Δαρείου στη μάχη του Μαραθώνα μέχρι τη θυσία των Σπαρτιατών και του Λεωνίδα στις Θερμοπύλες, εκτυλίσσονται τα γεγονότα των Μηδικών Πολέμων για να καταλήξουν στη Σαλαμίνα και στη ναυμαχία που ανέδειξε την ιδιοφυΐα και τη χαρισματική προσωπικότητα του στρατηγού Θεμιστοκλή και που ήταν στην ουσία η μάχη που έβαλε φρένο στο μένος και στη λαίλαπα των Περσών. ', 'images/biblia/salamina.png', 11, 'Negrete Javier', 'Ψυχογιός'),
(17, 'Οι νεράιδες του Πόντου', 'c', 7, 'Περιγραφή: Η Χρυσή, μια δυναμική σύγχρονη γυναίκα, νιώθει έτοιμη μετά από αρκετά χρόνια προβληματισμού και διλημμάτων, να εκπληρώσει το χρέος της απέναντι στη γιαγιά της Χρυσούλα, να διασώσει την ιστορία της. Αποφασίζει λοιπόν να γράψει ένα βιβλίο με τις ζωντανές μαρτυρίες της γιαγιάς και των συγγενών της, από τους διωγμούς που υπέστησαν στη γενέθλια γη τους, το μαρτυρικό Πόντο. ', 'images/biblia/neraides.png', 11, 'Παμπουκίδου Αγγελική', 'Πηγή'),
(18, 'Βυζαντινός εσπερινός', 'c', 8, 'Περιγραφή: Το χρονικό των τελευταίων ημερών της Βυζαντινής Αυτοκρατορίας και της Άλωσης της Βασιλεύουσας μέσ’ απ’ την αφήγηση του Λουκά Πασχάλη, γιατρού και νεαρού γόνου αριστοκρατικής οικογένειας από τον Μυστρά. Έρωτες, απώλειες, φιλοσοφικές αναζητήσεις και προβληματισμοί συνθέτουν την πορεία του ήρωα που διασταυρώνεται με τις σημαντικότερες ιστορικές προσωπικότητες της εποχής: τον αυτοκράτορα Κωνσταντίνο Παλαιολόγο, τον Γεώργιο Φραντζή, τον Γεώργιο Γεμιστό, τον Βησσαρίωνα, τον Ιουστινιάνη, την τσαρίνα Σοφία Παλαιολογίνα. ', 'images/biblia/buzantinos.png', 16.1, 'De Pascalis Luigi', 'Αίολος'),
(19, 'Σκανδιναβική Μυθολογία', 'd', 12, 'Περιγραφή: Τώρα ο Neil Gaiman αντλεί έμπνευσή από τις αυθεντικές ιστορίες και μας παρουσιάζει μια νέα, μοντέρνα και συναρπαστική απόδοση αυτών των σκανδιναβικών μύθων.\r\nΜέσα από τις σελίδες του βιβλίου, ο Όντιν και ο Θωρ, ο Λόκι και η Φρέγια, ζωντανέυουν με συναρπαστικό τρόπο μέσα στις σελίδες και προκαλούν τον μοντέρνο αναγνώστη με την αρχέγονη δύναμη τους.\r\n', 'images/biblia/skandinabikh.png', 14, 'Gaiman Neil', 'Σελίνι'),
(20, 'Το παιχνίδι του στέμματος', 'd', 10, 'Περιγραφή: Ο Άρχοντας Ένταρντ Σταρκ εγκαταλείπει την αρχαία έδρα του οίκου του και ταξιδεύει στο Νότο για να αναλάβει το αξίωμα που θα τον αναδείξει στον δεύτερο ισχυρότερο άνθρωπο του βασιλείου. Σκοπός του είναι να εξιχνιάσει το μυστηριώδη θάνατο του φίλου και προκατόχου του και να αποκαλύψει τη συνωμοσία εναντίον του θρόνου.\r\nΣε έναν κόσμο όπου οι χειμώνες διαρκούν δεκαετίες ολόκληρες,\r\nβασιλείς και βασίλισσες, ιππότες και μάγοι, ευγενείς και δολοφόνοι,\r\nβρίσκονται αντιμέτωποι σ ένα θανατερό παιχνίδι...\r\n', 'images/biblia/paixnidi.png', 17, 'Martin George R. R.', 'Anubis'),
(21, 'Η λάμψη', 'd', 11, 'Περιγραφή:Η καινούργια δουλειά του Τζακ Τόρανς στο ξενοδοχείο «Η Θέα» είναι η ιδανική ευκαιρία για μια νέα αρχή. Ως χειμερινός επιστάτης στο ατμοσφαιρικό παλιό ξενοδοχείο, ο Τζακ θα έχει άφθονο χρόνο για να επανασυνδεθεί με την οικογένειά του και να συγκεντρωθεί στο γράψιμο. Όταν όμως έρχεται ο σκληρός χειμώνας, η ειδυλλιακή τοποθεσία αρχίζει να φαίνεται απολύτως απομονωμένη, απολύτως σατανική. ', 'images/biblia/lampsi.png', 16.9, 'King Stephen', 'Κλειδάριθμος'),
(22, 'Το κοράκι', 'd', 12, 'Περιγραφή:Ένας άντρας το σκάει από μια μονάδα βιολογικών δοκιμών και μεταδίδει ένα μεταλλαγμένο στέλεχος της γρίπης, το οποίο αφανίζει το ενενήντα εννέα τοις εκατό της ανθρωπότητας μέσα σε διάστημα λίγων εβδομάδων. η Μάμα Άμπιγκεϊλ, μια καλοσυνάτη γυναίκα 108 ετών που τους προτρέπει να δημιουργήσουν μια κοινότητα στο Μπόλντερ του Κολοράντο, και ο Ράνταλ Φλαγκ, ο μοχθηρός «σκοτεινός άντρας» που αναζητά το χάος και τη βία. Στη μάχη των δύο για την εξουσία, οι επιζώντες καλούνται να επιλέξουν τον κατάλληλο ηγέτη και, τελικά, να καθορίσουν τη μοίρα της ανθρωπότητας.', 'images/biblia/koraki.png', 26.9, 'King Stephen', 'Κλειδάριθμος'),
(23, 'Το αυτό', 'd', 10, 'Περιγραφή:Αυτό που κάνει τη μικρή πόλη του Ντέρι τόσο τρομακτικά διαφορετική από τις άλλες είναι όλα εκείνα που βλέπουν –και αισθάνονται– μόνο τα παιδιά.\r\nΣτα φρεάτια και τους υπονόμους, το Αυτό καραδοκεί και παίρνει τη μορφή εφιάλτη, του βαθύτερου τρόμου που φωλιάζει σε κάθε παιδί. Όμως, πότε πότε, το Αυτό προβάλλει από τα ζοφερά και υγρά βάθη, αρπάζει, διαμελίζει, σκοτώνει.\r\n', 'images/biblia/auto.png', 10, 'King Stephen', 'Κλειδάριθμος'),
(24, 'Ο ιππότης των επτά βασιλείων', 'd', 15, 'Περιγραφή:Ο νεαρός, αφελής, αλλά γενναίος περιπλανώμενος ιππότης σερ Ντάνκαν ο Ψηλός υπερέχει των αντιπάλων του – αν όχι σε πείρα, σίγουρα σε ανάστημα. Στις περιπέτειές του τον συνοδεύει ο μικροσκοπικός του ακόλουθος, ένα αγόρι ονόματι Εγκ – του οποίου το πραγματικό όνομα (και επτασφράγιστο μυστικό) είναι Αίγκον Ταργκάρυεν. ', 'images/biblia/ippotis.png', 11, 'Martin George R. R.', 'Μεταίχμιο'),
(25, 'Avengers', 'e', 15, 'Περιγραφή: O Κάπτεν Αμέρικα, ο Θορ, ο Άιρον Μαν και οι Εκδικητές είναι οι Μεγαλύτεροι Ήρωες της Γης -- μα ακόμα κι αυτοί αισθάνονται φόβο. Και όταν ένα πανίσχυρο και αρχαίο κακό καταλαμβάνει τον κόσμο, κάθε ήρωας θα χρειαστεί να κάνει μια θυσία για να σώσει τη Γη.Με κάθε χτύπημα του σφυριού, ήρωες θα πέσουν, θεοί θα πεθάνουν κι ο φόβος θα κυριαρχήσει παντού! ', 'images/biblia/avengers.png', 13, 'Fraction Matt', 'Anubis'),
(26, 'Σέρλοκ Χολμς', 'e', 11, 'Περιγραφή: Ο θρυλικός ντετέκτιβ Σέρλοκ Χολμς και ο Δόκτωρ Γουάτσον σε μια από τις πιο παράξενες υποθέσεις της καριέρας τους.', 'images/biblia/serlok.png', 10, 'Moore Leah, Reppion John', 'Οξύ'),
(27, 'Tomb Raider', 'e', 10, 'Περιγραφή: Η ΛΑΡΑ ΚΡΟΦΤ αναζητά το μυστικό για ένα μανιτάρι που λέγεται πως χαρίζει την αθανασία, όμως μία οργάνωση ονόματι Ιππότες του Σκοτεινού Σπόρου θα κάνει τα πάντα για να αποκτήσουν εκείνοι αυτή τη δύναμη.Παλιοί φίλοι θα σταθούν στο πλευρό της και νέοι εχθροί θα κάνουν την εμφάνισή τους σε μια περιπέτεια που συνεχίζει την ιστορία της διάσημης ηρωίδας μετά το επιτυχημένο βιντεοπαιχνίδι “Rise of the Tomb Raider”!', 'images/biblia/tomb.png', 9, 'Tamaki Mariko', 'Anubis'),
(28, 'James Bond', 'e', 10, 'Περιγραφή: Η νέα αποστολή του Τζέιμς Μποντ είναι η εξάρθρωση μιας επιχείρησης διακίνησης ενός νέου τύπου ναρκωτικών που σπέρνουν τον θάνατο στο Λονδίνο. Ακολουθώντας τα ίχνη του κυκλώματος θα βρεθεί στο Βερολίνο, όπου θα μπει στο στόχαστρο ενός ιδιοφυούς αλλά παρανοϊκού αντιπάλου.', 'images/biblia/jamesbond.png', 9, 'Ellis Warren', 'Οξύ'),
(29, 'Pheonix', 'e', 12, 'Περιγραφή: Χρόνια πριν, η Τζιν Γκρέι πέθανε και οι X-Men θρήνησαν το χαμό της.\r\nΤώρα, όταν περίεργα φαινόμενα εκδηλώνονται σε όλο τον κόσμο, οι X-Men καταλήγουν σε ένα μόνο συμπέρασμα: η μία και μοναδική Τζιν Γκρέι επέστρεψε!Οι X-Men πρέπει να σταματήσουν τον κύκλο του θανάτου που φέρνει ο Φοίνικας!\r\nΚαι οι κόσμοι τους πρόκειται να συγκρουστούν με αναπάντεχες συνέπειες!\r\n\r\n', 'images/biblia/pheonix.png', 10, 'Rosenberg Matthew', 'Anubis'),
(30, 'Batman', 'e', 15, 'Περιγραφή:Αφού επανασυνδέεται με την παλιά του σύντροφο, τη Χάρλεϊ Κουίν, θέτει σε εφαρμογή μια προσεκτικά σχεδιασμένη καμπάνια για να δυσφημίσει τον άνθρωπο που θεωρεί ως τον αληθινό εχθρό του Γκόθαμ Σίτι: τον Μπάτμαν.\r\nΗ σταυροφορία του αποκαλύπτει ένα ιστορικό διαφθοράς δεκαετιών μέσα στο Αστυνομικό Τμήμα του Γκόθαμ Σίτι και μεταμορφώνει τον Νέιπιερ σε σύμβουλο της πόλης και αστικό ήρωα. ', 'images/biblia/batman.png', 20.9, 'Murphy Sean', 'Οξύ / DC comics'),
(31, 'Lego Ninjago', 'f', 10, 'Περιγραφή: Ο κόσμος του Ninjago απειλείται! Ο Άρχοντας Γκάρμαντον χρησιμοποιεί το στρατό του από σκελετούς για να ξαναχτίσει τον κόσμο κατ εικόνα του. Οι μόνοι που στέκονται στο δρόμο του είναι τέσσερις νεαροί μύστες μιας αρχαίας πολεμικής τέχνης... Γνωρίστε τους ατρόμητους νίντζα που εκπαιδεύτηκαν από το μυστηριώδη Σενσέι Γου για να γίνουν οι τρανοί Δάσκαλοι του Spinjitzu!', 'images/biblia/lego.png', 6.2, 'Farshtey Greg', 'Anubis'),
(32, 'Λούκι Λουκ', 'f', 10, 'Περιγραφή: Ένα ακόμα τεύχος από τα Λούκυ Κιντ. Οι πρώτες περιπέτειες, τα πρώτα σκιρτήματα, και τα μπλεξίματα του θρυλικού καουμπόϋ, από την πένα του Achde. Πως μπορεί ένα αθώο παιχνίδι μεταξύ παιδιών να σε κυνηγάει μέχρι την ενήλικη ζωή σου; ', 'images/biblia/louki.png', 4.7, 'Achde', 'Μαμούθ Comix'),
(33, 'Το άξιο εργοτάξιο', 'f', 8, 'Περιγραφή: Βγαίνει ο ήλιος ψηλά, το εργοτάξιο φωτίζει, τα οχήματα ξυπνούν, να δουν τη μέρα που αρχίζει. Κάθε καινούρια μέρα, μια καινούρια αποστολή.\r\nΈτοιμα να τα δώσουν όλα, έτοιμα για δουλειά πολλή!\r\n', 'images/biblia/ergotaxio.png', 5.8, 'Rinker Sherri Duskey', 'Πατάκη'),
(34, 'Το μικρό αγόρι και τα 4 αβγά', 'f', 7, 'Περιγραφή: Ένα όμορφο πρωινό, ένα μικρό αγόρι που θέλει να μάθει όλα τα μυστικά του κόσμου, εξερευνά τον κήπο του σπιτιού του. Ανάμεσα στα λουλούδια ανακαλύπτει μια χελώνα με πολύχρωμο καβούκι.\r\nΗ χελώνα του αναθέτει μια αποστολή… να της φέρει 4 αβγά και του υπόσχεται να του αποκαλύψει ένα μεγάλο μυστικό!\r\nΜέσα από τα ταξίδια του, το μικρό αγόρι θα μάθει για τη διαφορετικότητα και πώς μπορεί να αγαπά και να αποδέχεται όλους τους ανθρώπους με σεβασμό.\r\n', 'images/biblia/toagori.png', 7.8, 'Τσάνταλη Κατρίνα', 'Διόπτρα'),
(35, 'Τα παραμύθια των αδερφών GRIMΜ', 'f', 10, 'Περιγραφή:Η επιτυχία τους οφείλεται σ έναν σπάνιο συνδυασμό της γνώσης με την αγάπη της ποίησης. Ζωντάνεψαν μια γλώσσα πολύχρωμη, για να μιμηθούν το λόγο των απλών ανθρώπων, μια γλώσσα παιχνιδιάρα, φωτεινή και καθάρια. Αξιοποίησαν στο έπακρο τις προφορικές παραδόσεις και τις προίκισαν με μια χάρη και μιαν αφέλεια, που ίσως δεν διέθεταν από μόνες τους', 'images/biblia/grim.png', 14.3, 'Grimm Jakob Ludwig', 'Άγρα'),
(36, 'Ο εγωιστής γίγαντας', 'f', 8, 'Περιγραφή: Ο γίγαντας της ιστορίας μπορεί στην αρχή να ήταν εγωιστής και σκληρός, να είχε απαγορεύσει στα παιδιά να μπαίνουν και να παίζουν στον κήπο του, όμως η καρδιά του έλιωσε όταν είδε ένα μικρό αγόρι να προσπαθεί να σκαρφαλώσει σε ένα ψηλό δέντρο.\r\nΤότε έλιωσαν και τα χιόνια στον κήπο του.\r\n', 'images/biblia/gigantas.png', 7, 'Wilde Oscar', 'Μίνωας');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `customers`
--

CREATE TABLE `customers` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `customers`
--

INSERT INTO `customers` (`username`, `password`, `email`, `name`, `surname`, `phone`) VALUES
('admin', '$2y$10$XBkPBlEtNt05kZM67tTbje2FwEs6GT9isJIE3/kZeLhHfXJSbl0Fa', 'admin@gmail.com', 'Admin', 'Admin', '0000000000');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `list`
--

CREATE TABLE `list` (
  `test_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `posothta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `list`
--

INSERT INTO `list` (`test_id`, `order_id`, `book_id`, `posothta`) VALUES
(1, 1, 8, 1),
(2, 1, 28, 2),
(3, 1, 15, 1),
(4, 2, 15, 1),
(5, 2, 21, 1),
(6, 3, 26, 2),
(7, 4, 26, 1),
(8, 4, 9, 2),
(9, 5, 8, 1),
(10, 5, 17, 1),
(11, 5, 20, 2),
(12, 6, 1, 35),
(13, 6, 14, 2),
(14, 7, 13, 2),
(15, 8, 7, 1),
(16, 8, 20, 2);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `sunolo` float NOT NULL,
  `address` varchar(50) NOT NULL,
  `timologio` tinyint(1) NOT NULL,
  `afm` int(11) DEFAULT NULL,
  `enterprise_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `orders`
--

INSERT INTO `orders` (`order_id`, `username`, `status`, `sunolo`, `address`, `timologio`, `afm`, `enterprise_name`) VALUES
(1, 'tasos123', 'pending', 46, 'Endymionos2511143', 0, 0, ''),
(2, 'tasos', 'delivered', 29.9, 'Endymionos2511143', 0, 0, ''),
(3, 'tasos', 'pending', 20, 'Endymionos2511143', 1, 123456789, 'theodoridis AE'),
(4, 'tasos', 'shipped', 33.2, 'Endymionos2511143', 1, 123456789, 'theodoridis AE'),
(5, 'tasos', 'shipped', 60, 'Endymionos2511143', 1, 0, ''),
(6, 'tasos', 'pending', 341.6, 'Endymionos2511143', 0, 0, ''),
(7, 'tasos', 'pending', 30, 'Endymionos2511143', 0, 0, ''),
(8, 'tasos1234', 'pending', 45, 'Endymionos2511143', 0, 0, '');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `book_id` (`book_id`);

--
-- Ευρετήρια για πίνακα `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`username`);

--
-- Ευρετήρια για πίνακα `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`test_id`);

--
-- Ευρετήρια για πίνακα `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT για πίνακα `list`
--
ALTER TABLE `list`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT για πίνακα `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
