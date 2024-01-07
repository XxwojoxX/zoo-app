-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sty 07, 2024 at 09:17 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zoo`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `animals`
--

CREATE TABLE `animals` (
  `animalId` int(11) NOT NULL,
  `animalSpecies` varchar(25) DEFAULT NULL,
  `animalDescription` varchar(999) DEFAULT NULL,
  `animalName` varchar(25) DEFAULT NULL,
  `animalDiet` varchar(25) DEFAULT NULL,
  `animalFeeding` varchar(255) DEFAULT NULL,
  `animalImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`animalId`, `animalSpecies`, `animalDescription`, `animalName`, `animalDiet`, `animalFeeding`, `animalImage`) VALUES
(1, 'Lew Afrykański', 'Lew afrykański, znany naukowo jako Panthera leo, to majestatyczne drapieżniki zamieszkujące głównie obszary subsaharyjskie Afryki. Jego charakterystyczna grzywa i potężna sylwetka czynią go jednym z najsilniejszych i najbardziej rozpoznawalnych drapieżników na świecie.\r\n\r\nLwy afrykańskie są zwierzętami stadnymi, żyjącymi w grupach zwanych stadami. W skład stada wchodzą przeważnie spokrewnione samice, młode i kilku dorosłych samców. To społeczne podejście do życia umożliwia im skuteczne polowanie na większą zdobycz.\r\n\r\nTe majestatyczne zwierzęta są często symbolem siły, dumy i sprawności w kulturze afrykańskiej. W naszym zoo z przyjemnością prezentujemy lwy afrykańskie, zapewniając odwiedzającym niezapomniane chwile obserwacji ich majestatycznego zachowania. Doświadcz bliskiego spotkania z królami sawanny i zgłęb tajemnice ich fascynującego życia.', 'lew', 'mięso', '14:00', 'http://localhost/cos/img/lew.jpg'),
(2, 'Tygrys Bengalski', 'Tygrys bengalski, znany naukowo jako Panthera tigris tigris, to jeden z najbardziej charakterystycznych i zagrożonych gatunków tygrysów. Zamieszkują głównie obszary lasów deszczowych, bagiennej roślinności i równin w Azji Południowo-Wschodniej. Jego okazała sierść o wyrazistych, ciemnych pasach sprawia, że jest jednym z najbardziej rozpoznawalnych drapieżników na świecie.\r\n\r\nTygrysy bengalskie są znane ze swojej siły i zwinności. To doskonali myśliwi, polując głównie na dziki i jelenie. Jednak niestety, ze względu na utratę naturalnych siedlisk i kłusownictwo, są one zagrożone wyginięciem.\r\n\r\nW naszym zoo z pełnym szacunkiem prezentujemy tygrysy bengalskie, starając się podkreślić ich ważną rolę w ochronie różnorodności biologicznej. Oferujemy odwiedzającym niepowtarzalną szansę na obserwację tych pięknych i majestatycznych zwierząt oraz zrozumienie potrzeby ich ochrony w dzikiej przyrodzie.', 'Tygrys', 'mięso', '15:00', 'http://localhost/cos/img/tygrys.jpg'),
(3, 'Słoń Afrykański', 'Słoń afrykański, znany naukowo jako Loxodonta africana, to olbrzymi i wyjątkowy gatunek, zamieszkujący różnorodne obszary Afryki, od sawann po lasy deszczowe. Z charakterystycznymi, wygiętymi kłami i potężnymi uszami, słoń afrykański jest jednym z najbardziej rozpoznawalnych ssaków na świecie.\r\n\r\nTe inteligentne i społeczne zwierzęta żyją w rodzinnych grupach, znanych jako stada. Stada składają się z samic, ich potomstwa i czasem dorosłych samców. Słoń afrykański jest także kluczowym graczem w ekosystemie, wpływając na kształtowanie krajobrazu i zachowanie innych gatunków.\r\n\r\nNiestety, ze względu na kłusownictwo i utratę siedlisk, słoń afrykański jest obecnie zagrożony wyginięciem. W naszym zoo, z zaangażowaniem w ochronę przyrody, prezentujemy te imponujące stworzenia, zachęcając do zrozumienia ich roli w ekosystemie oraz potrzeby skutecznej ochrony dla przyszłych pokoleń.', 'Słoń', 'rośliny', '10:00', 'http://localhost/cos/img/slon.jpg'),
(4, 'Pingwin Cesarski', 'Pingwin cesarski, naukowo znany jako Aptenodytes forsteri, to majestatyczny ptak zamieszkujący arktyczne obszary Antarktyki. Jego charakterystyczne czarno-białe upierzenie z wyrazistymi, jaskrawożółtymi plamami na głowie czyni go jednym z najbardziej rozpoznawalnych mieszkańców zimowego krańca świata.\r\n\r\nTe zdolne do pływania i nurkowania ptaki cesarskie żyją w dużych koloniach, gdzie budują silne społeczności. Opieka nad jajami i młodymi odgrywa kluczową rolę w ich życiu społecznym, co nadaje pingwinom cesarskim wyjątkową tożsamość w królestwie przyrody.\r\n\r\nW naszym zoo z dumą prezentujemy te fascynujące ptaki, umożliwiając odwiedzającym bliskie spotkanie z ich naturalnym środowiskiem. Zachęcamy do zgłębiania tajemnic życia pingwinów cesarskich oraz do zrozumienia ich roli w ekosystemie Antarktyki.', 'Pingwin', 'ryby', '11:00', 'http://localhost/cos/img/pingwin.jpg'),
(5, 'Żyrafa Siatkowana', 'Żyrafa siatkowana, znana również jako Giraffa reticulata, to imponujące ssaki zamieszkujące głównie obszary sawann i lasów Afryki. Charakteryzują się długą szyją i plamistą sierścią, co sprawia, że są jednymi z najbardziej rozpoznawalnych zwierząt na Ziemi.\r\n\r\nTe wyjątkowe stworzenia żywią się głównie liśćmi z drzew, korzystając z długiej szyi, by dotrzeć do koron drzew, które są poza zasięgiem innych zwierząt. Żyrafa siatkowana dostosowała się do życia w różnorodnych środowiskach, od suchych sawann po wilgotne lasy.\r\n\r\nW naszym zoo z dumą prezentujemy żyrafy siatkowane, umożliwiając odwiedzającym bliskie spotkanie z tymi imponującymi zwierzętami. Zachęcamy do obserwacji ich naturalnego zachowania i do zgłębienia tajemnic ich fascynującego świata.', 'Zyrafa', 'rośliny', '9:00', 'http://localhost/cos/img/zyrafa.jpg'),
(6, 'Gepard', 'Gepard, Acinonyx jubatus, jest niezwykłym drapieżnikiem zamieszkującym głównie obszary sawann Afryki. Jego elegancka sylwetka, ozdobiona charakterystycznym złotym futrem i ciemnymi plamami, czyni go jednym z najbardziej rozpoznawalnych mieszkańców afrykańskich równin.\r\n\r\nGepardy są bezsprzecznie najszybszymi lądowymi drapieżnikami, zdolnymi osiągnąć znaczące prędkości w krótkich biegach. Ich smukła budowa ciała, długie nogi i zdolności łowieckie uczyniły z nich mistrzów skradania się i zdobywania pokarmu. To społeczne zwierzęta żyją w małych grupach rodzinnych, co podkreśla ich silne więzi społeczne.\r\n\r\nW naszym zoo z pasją prezentujemy gepardy, umożliwiając odwiedzającym niezwykłą okazję do bliskiego spotkania z tymi ekscytującymi drapieżnikami. Zachęcamy do zgłębiania fascynującego świata gepardów i do zrozumienia ich roli w delikatnej równowadze ekosystemu Afryki.', 'Gepard', 'mięso', '9:30', 'http://localhost/cos/img/gepard.jpg'),
(7, 'Krokodyl Nilowy', '\r\nKrokodyl nilowy, znany naukowo jako Crocodylus niloticus, to imponujący drapieżnik żyjący w wodach rzek i jezior Afryki. Jego charakterystyczny wygląd, z twardym pancerzem skórnym i groźnymi szczękami, czyni go jednym z najbardziej rozpoznawalnych gadów.\r\n\r\nTe potężne zwierzęta są doskonałymi myśliwymi, polując głównie w wodzie na ryby i inne zwierzęta wodne. Krokodyle nilowe potrafią także wznosić się na bieguna i są bardzo zręczne na lądzie, co czyni je groźnymi drapieżnikami w różnorodnych środowiskach.\r\n\r\nW naszym zoo prezentujemy krokodyle nilowe, umożliwiając odwiedzającym bliskie spotkanie z tymi prehistorycznymi stworzeniami. To fascynujące zwierzęta ukazują nam unikalne aspekty ekologii wodnych obszarów Afryki i przypominają o znaczeniu ochrony różnorodności biologicznej w ich siedliskach naturalnych.', 'Krokodyl', 'mięso', '10:30', 'http://localhost/cos/img/krokodyl.jpg'),
(8, 'Flaming Różowy', '\r\nFlamingi różowe, znane również jako Phoenicopterus roseus, to urocze ptaki zamieszkujące słone bagna, jeziora i inne mokradła w Afryce, Azji, Europie i Ameryce. Charakteryzują się wyjątkowym różowym upierzeniem, długimi szyjami i zakrzywionymi dziobami.\r\n\r\nTe społeczne ptaki żyją w dużych koloniach, tworząc niesamowite widoki swoimi intensywnie różowymi skupiskami. Ich kolorowe pióra zawdzięczają zawartym w pożywieniu substancjom organicznym, takim jak karotenoidy. Flamingi różowe spędzają dużo czasu w wodzie, gdzie szukają pokarmu, a ich charakterystyczne nogi pozwalają im wadeować po płytkich obszarach.\r\n\r\nW naszym zoo prezentujemy te piękne flamingi, umożliwiając odwiedzającym niezapomniane chwile obserwacji ich eleganckiego tańca i unikalnego wyglądu. To doskonała okazja do zanurzenia się w tajemnice życia tych uroczych ptaków i zrozumienia ich roli w ekosystemie mokradeł.', 'Flaming', 'skorupiaki', '11:30', 'http://localhost/cos/img/flaming.jpg'),
(9, 'Panda Wielka', '\r\nPanda wielka, znana także jako Ailuropoda melanoleuca, to uroczy i zagrożony wyginięciem gatunek żyjący w górskich lasach Chin. Jej charakterystyczne czarne i białe ubarwienie oraz sympatyczna aparycja sprawiają, że jest jednym z najbardziej rozpoznawalnych zwierząt na świecie.\r\n\r\nPandy wielkie są roślinożerne, a ich głównym pożywieniem są bambusy. Ich wyspecjalizowane kły i umiejętność chwytania pędy bambusa sprawiają, że są doskonałymi adeptami życia w gęstych lasach. Choć zwykle żyją samotnie, towarzyszą im małe pandy, które wprowadzają dodatkowy urok do ich społeczności.\r\n\r\nW naszym zoo z dumą prezentujemy pandy wielkie, umożliwiając odwiedzającym bliskie spotkanie z tymi uroczymi mieszkańcami górskich obszarów Chin. To niepowtarzalna okazja do zrozumienia ich unikalnej biologii, problemów związanych z ochroną oraz do zachwycenia się ich urokiem i delikatnością.', 'Panda', 'rośliny', '12:30', 'http://localhost/cos/img/panda.jpg'),
(10, 'Wilk Szary', 'Wilk szary, znany naukowo jako Canis lupus, to majestatyczny drapieżnik, zamieszkujący różnorodne obszary na całym świecie, od tundr po lasy i góry. Jego charakterystyczne sierść, zwykle o odcieniach szarości, oraz spojrzenie pełne determinacji sprawiają, że jest jednym z najbardziej ikonicznych przedstawicieli dzikich karnivorów.\r\n\r\nWataha wilków szarych, zorganizowana grupa rodzinna, odgrywa kluczową rolę w ich społeczności. Współpracujące polowania oraz opieka nad młodymi członkami watahy podkreślają ich silne więzi rodzinne. Jako zwierzęta terytorialne, wilki szare odgrywają istotną rolę w regulacji populacji zwierząt, wpływając na równowagę ekosystemu.\r\n\r\nW naszym zoo z pasją prezentujemy wilki szare, umożliwiając odwiedzającym bliskie spotkanie z tymi dzikimi i pięknymi drapieżnikami. To niezwykła okazja do zgłębienia ich naturalnych zachowań, a także do zrozumienia roli, jaką odgrywają w przyrodzie.\r\n\r\n\r\n\r\n\r\n\r\n', 'Wilk', 'mięso', '15:00', 'http://localhost/cos/img/wilk.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `contact`
--

CREATE TABLE `contact` (
  `contactId` int(11) NOT NULL,
  `contactName` varchar(50) DEFAULT NULL,
  `contactEmail` varchar(50) DEFAULT NULL,
  `contactMessage` varchar(999) DEFAULT NULL,
  `contactDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contactId`, `contactName`, `contactEmail`, `contactMessage`, `contactDate`) VALUES
(1, 'aaa', 'aaa@aaa', '', '2023-09-15 07:23:40'),
(3, 'aaa', 'aaa@aaa', '', '2023-09-15 07:23:48'),
(4, 'aaa', 'aaa@aaa', '', '2023-09-15 07:23:48'),
(7, 'aaa', 'admin@gmail.com', 'a', '2023-09-15 07:43:18'),
(8, 'aaa', 'aaa@aaa', 'aaaaaaaa', '2023-09-15 07:53:51'),
(9, 'bbb', 'bbb@bbb', 'bbb', '2023-09-15 08:03:28'),
(10, 'bbbb', 'bbb@bbb', 'bbbb', '2023-09-15 08:04:42'),
(11, 'aaa', 'admin@admin.pl', 'aaa', '2023-09-15 08:08:09'),
(12, 'ccc', 'ccc@ccc', 'ccc', '2023-09-15 08:11:09'),
(13, 'bbb', 'admin@admin.pl', 'a', '2023-09-16 08:48:33'),
(14, 'bbb', 'admin@gmail.com', 'a', '2023-09-16 08:50:42'),
(15, 'bbb', 'admin@admin.pl', 'a', '2023-09-16 08:55:37'),
(16, 'proba', 'proba@proba.pl', 'proba', '2023-09-16 09:04:54'),
(17, 'ddd', 'ddd@ddd.pl', 'ddddddddddddddddd', '2023-10-04 14:25:28'),
(18, 'aaa', 'aaa@aaa', 'aaa', '2023-10-04 14:45:02'),
(19, 'aaa', 'aaa@aaa', 'abc', '2023-10-05 07:30:32'),
(20, 'a', 'a@a', 'a', '2023-10-05 07:50:17'),
(21, 'a', 'aaa@aaa', 'aa', '2023-10-05 07:53:55'),
(22, 'bbb', 'aaa@aaa', 'aaa', '2023-10-05 07:55:27'),
(23, 'bbb', 'aaa@aaa', 'a', '2023-10-05 07:56:43'),
(24, 'aaa', 'admin@admin.pl', 'a', '2023-10-05 07:56:57'),
(25, 'a', 'aaa@aaa', 'a', '2023-10-05 08:04:40'),
(26, 'aaa', 'aaa@aaa', 'a', '2023-10-05 08:05:39'),
(27, 'cos', 'cos@cos.gmail', 'abc', '2023-12-13 14:13:51');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `events`
--

CREATE TABLE `events` (
  `eventId` int(11) NOT NULL,
  `eventName` varchar(50) DEFAULT NULL,
  `eventDate` datetime DEFAULT NULL,
  `eventDescription` varchar(999) DEFAULT NULL,
  `eventImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventId`, `eventName`, `eventDate`, `eventDescription`, `eventImage`) VALUES
(1, 'Piknik rodzinny', '2024-04-10 12:00:00', 'Zapraszamy na wyjątkowy piknik rodzinny w naszym zoo! Czekają na Was niezapomniane chwile w otoczeniu egzotycznych zwierząt. Odpocznijcie na kocu, delektując się pysznym jedzeniem, uczestniczcie w konkursach, malujcie twarze dzieciom, a także bierzcie udział w edukacyjnych pokazach o naszych zwierzętach. Stwórzcie wspólne wspomnienia podczas pikniku rodzinengo w Królestwie Zwierząt!', 'http://localhost/cos/img/piknik.jpg'),
(2, 'Warsztat edukacyjny', '2024-04-15 14:30:00', 'Witamy na naszym edukacyjnym warsztacie o zwierzętach! Podczas wydarzenia uczestnicy będą mogli dowiedzieć się fascynujących faktów o różnorodności gatunków, obcować z niektórymi zwierzętami, a także uczestniczyć w praktycznych zajęciach i eksperymentach. Dołącz do nas, aby poznać tajniki przyrody w sposób interaktywny i edukacyjny', 'http://localhost/cos/img/warsztat_edu.jpg'),
(3, 'Adopcja zwierząt', '2024-04-25 10:00:00', 'Adoptuj zwierzę z naszego zoo i stań się jego opiekunem! Twój wkład wspiera konkretne zwierzę, a w zamian otrzymasz certyfikat, zdjęcia oraz regularne aktualizacje. To nie tylko wyjątkowy gest wsparcia, ale także możliwość zaangażowania się w ochronę zagrożonych gatunków i ich środowiska. Dołącz do naszej społeczności opiekunów i spraw, aby życie tych zwierząt było lepsze i bezpieczniejsze.', 'http://localhost/cos/img/adopcja1.jpg'),
(4, 'Konkurs fotograficzny', '2024-05-10 08:00:00', 'Witamy w naszym Konkursie Fotograficznym! Zapraszamy do udziału wszystkich miłośników fotografii. Wystarczy złapać chwilę związaną z naturą, wysłać nam zdjęcie, a może zdobywasz fantastyczne nagrody! Termin zgłaszania prac upływa tydzień po ogłoszeniu konkursu, więc nie przegap szansy podzielenia się swoim talentem i celebracji piękna przyrody!', 'http://localhost/cos/img/konkurs_foto1.jpg'),
(5, 'Noc w ZOO', '2024-05-15 20:00:00', 'Witajcie na Nocy w Zoo! Przygotujcie się na nocne odkrycia, fascynujące prezentacje i specjalne pokazy zwierząt. Doświadczcie magicznej atmosfery zoo po zmroku, wypełnionej dźwiękami, smakami i tajemniczym urokiem nocnych mieszkańców. Dołączcie do nas i stwórzcie razem niezapomnianą nocną przygodę!', 'http://localhost/cos/img/noc_w_zoo.jpg'),
(6, 'Święto ZOO', '2024-05-31 10:00:00', 'Witajcie na Święcie Zoo! Czekają na Was radość, zabawa i mnóstwo zwierzęcej magii. Odkrywajcie tematyczne strefy, uczestniczcie w pokazach, warsztatach i konkursach. Razem świętujmy przyrodę i radość z bycia razem podczas tego wyjątkowego święta w zoo!\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla facilisi. Nulla ultrices neque et elit facilisis, a bibendum libero volutpat.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget a', 'http://localhost/cos/img/swieto_zoo.jpg'),
(8, 'Urodziny pandy', '2024-06-10 14:00:00', 'Witamy serdecznie na wyjątkowych Urodzinach Pandy! Przygotowaliśmy dla Was niezapomnianą urodzinową przygodę, pełną kolorów, uroku pandy i radosnych momentów. Odkrywajcie wspólnie udekorowane przestrzenie, korzystajcie z pysznych przekąsek, uczestniczcie w kreatywnych warsztatach dla dzieci i nie tylko.\r\n\r\nPodczas tego wyjątkowego święta nie zabraknie muzyki, zabawnych konkursów oraz spotkań z maskotką pandy, która z pewnością dostarczy wielu uśmiechów. Dołączcie do naszej radosnej społeczności podczas Urodzin Pandy i wspólnie celebrować tę wyjątkową chwilę urodzinową!', 'http://localhost/cos/img/urodziny_pandy.jpg'),
(9, 'Adopcja zwierząt', '2024-06-20 14:00:00', 'Adoptuj zwierzę z naszego zoo i stań się jego opiekunem! Twój wkład wspiera konkretne zwierzę, a w zamian otrzymasz certyfikat, zdjęcia oraz regularne aktualizacje. To nie tylko wyjątkowy gest wsparcia, ale także możliwość zaangażowania się w ochronę zagrożonych gatunków i ich środowiska. Dołącz do naszej społeczności opiekunów i spraw, aby życie tych zwierząt było lepsze i bezpieczniejsze.', 'http://localhost/cos/img/adopcja2.jpg'),
(10, 'Konkurs fotograficzny', '2024-06-28 08:00:00', 'Witamy w naszym Konkursie Fotograficznym! Zapraszamy do udziału wszystkich miłośników fotografii. Wystarczy złapać chwilę związaną z naturą, wysłać nam zdjęcie, a może zdobywasz fantastyczne nagrody! Termin zgłaszania prac upływa tydzień po ogłoszeniu konkursu, więc nie przegap szansy podzielenia się swoim talentem i celebracji piękna przyrody!', 'http://localhost/cos/img/konkurs_foto2.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `orderDeliveryStreet` varchar(50) DEFAULT NULL,
  `orderDeliveryOption` varchar(30) DEFAULT NULL,
  `orderPaymentMethod` varchar(30) DEFAULT NULL,
  `Data_zamówienia` date DEFAULT current_timestamp(),
  `orderDeliveryLocal` varchar(5) DEFAULT NULL,
  `orderStatus` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `userId`, `orderDeliveryStreet`, `orderDeliveryOption`, `orderPaymentMethod`, `Data_zamówienia`, `orderDeliveryLocal`, `orderStatus`) VALUES
(35, 1, 'cos', 'paczkomat', 'paypal', '2024-01-07', '2137', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `order_products`
--

CREATE TABLE `order_products` (
  `order_productsId` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`order_productsId`, `order_id`, `productId`) VALUES
(30, 35, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_change_tokens`
--

CREATE TABLE `password_change_tokens` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `productId` int(11) NOT NULL,
  `productName` varchar(50) DEFAULT NULL,
  `productDescription` varchar(9999) DEFAULT NULL,
  `productPrice` float(10,2) DEFAULT NULL,
  `productQuantity` int(11) DEFAULT NULL,
  `productCategory` varchar(15) DEFAULT NULL,
  `productImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `productName`, `productDescription`, `productPrice`, `productQuantity`, `productCategory`, `productImage`) VALUES
(2, 'Koszulka motyw ZOO', 'Koszulka z motywem zwierząt zoo. Doskonała dla miłośników przyrody i wizyt w ogrodzie zoologicznym. Przyciągnij uwagę swoim ulubionym zwierzakiem na koszulce i wyraź swoją pasję do świata dzikiej przyrody. Niech ta koszulka stanie się Twoim towarzyszem podczas fascynujących przygód związanych z odkrywaniem świata zwierząt!', 40.00, 100, 't-shirt', 'http://localhost/cos/img/koszulka_zoo.jpg'),
(3, 'Koszulka lew', 'Koszulka z majestatycznym motywem lwa. Wyrazista grafika przedstawiająca króla sawanny dodaje charakteru i stylu. Czuj się pewnie i silnie, nosząc tę koszulkę, która jest nie tylko wygodna, ale również manifestem siły i dumy. Idealna dla tych, którzy cenią sobie symbolikę lwa jako odzwierciedlenie siły, władzy i determinacji.', 50.00, 100, 't-shirt', 'http://localhost/cos/img/koszulka_lew.jpg'),
(4, 'Koszulka żyrafa', 'Oryginalna koszulka z urokliwym motywem zyrafy. Zachwyć się pięknem najwyższego zwierzęcia na świecie i dodaj odrobinę elegancji do swojej garderoby. Grafika przedstawiająca zyrafę sprawia, że ta koszulka to nie tylko ubranie, ale również wyraz indywidualności i miłości do przyrody. Daj się ponieść subtelnemu urokowi zyrafy i wprowadź do swojego stylu nutę lekkości i gracji.', 30.00, 100, 't-shirt', 'http://localhost/cos/img/koszulka_zyrafa.jpg'),
(5, 'Koszulka wilk', 'Dynamiczna koszulka z ujęciem wilka – symbolem wolności i siły dzikiej natury. Grafika przedstawiająca wilka dodaje tej koszulce charakteru i tajemniczości. Odczuj siłę i determinację, nosząc to wyjątkowe ubranie, które stanowi hołd dla tych niezwykłych drapieżników. Idealna dla osób, które cenią niezależność i silne więzi z dziką, nieposkromioną stroną natury.', 60.00, 100, 't-shirt', 'http://localhost/cos/img/koszulka_wilk.jpg'),
(6, 'Bluza ZOO', 'Bluza z uroczym motywem zoo to nie tylko wybór ubrania, ale również manifestacja miłości do świata zwierząt. Zestawienie różnorodnych i kolorowych postaci z ogrodu zoologicznego nadaje bluzie radosnego charakteru. Wybierz tę bluzę, jeśli chcesz wyrazić swoją fascynację przyrodą i uczucie związane z wizytą w ogrodzie zoologicznym. Daj się otoczyć pozytywną energią zwierząt i ciesz się komfortem noszenia tej unikalnej bluzy.', 100.00, 100, 'hoodie', 'http://localhost/cos/img/bluza_zoo.jpg'),
(7, 'Bluza słoń', 'Bluza z imponującym motywem słonia to wybór dla tych, którzy kochają te majestatyczne stworzenia. Grafika przedstawiająca słonia podkreśla ich siłę, mądrość i delikatność. Ta bluza nie tylko dodaje stylu, ale także wyraża szacunek dla tych niezwykłych zwierząt. Wybierz tę bluzę, aby podkreślić swoją miłość do natury i symboliczną wartość słonia jako ikony siły i mądrości.', 120.00, 100, 'hoodie', 'http://localhost/cos/img/bluza_slon.jpg'),
(8, 'Bluza krokodyl', 'Bluza z ekscytującym motywem krokodyla to wyraz odwagi i dzikości. Grafika przedstawiająca krokodyla dodaje bluzie unikalnego charakteru i tropikalnego uroku. Wybierz tę bluzę, aby wyrazić swoje zainteresowanie dzikimi obszarami i fascynację tymi niezwykłymi drapieżnikami wodnymi. Czuj się pewnie i stylowo, nosząc bluzę z motywem krokodyla, która z pewnością przyciągnie uwagę swoim oryginalnym designem.', 200.00, 100, 'hoodie', 'http://localhost/cos/img/bluza_krokodyl.jpg'),
(9, 'Bluza flaming', 'Bluza z uroczym motywem flaminga to doskonały wybór dla tych, którzy pragną dodatku pełnego wdzięku i delikatności. Grafika przedstawiająca flaminga nadaje bluzie lekkości i elegancji, idealnie oddając urok tych pięknych ptaków. Wybierz tę bluzę, aby wnieść do swojej garderoby kolorowy akcent i wyrazić miłość do tropikalnych motywów. Ciesz się wygodą i unikalnym stylem noszenia bluzy z motywem flaminga.', 160.00, 100, 'hoodie', 'http://localhost/cos/img/bluza_flaming.jpg'),
(10, 'Maskotka panda', 'Maskotka pandy to uroczy i przytulny dodatek dla każdego miłośnika zwierząt. Z czarno-białym futrem i uroczymi dużymi oczami, ta maskotka sprawi, że każdy dzień stanie się bardziej radosny. Idealna do przytulania i towarzyszenia w codziennych przygodach, maskotka panda jest symbolem delikatności i przyjaźni. Dodaj uroku swojemu otoczeniu i spraw sobie uśmiech, adoptując tę uroczą maskotkę pandy.', 40.00, 100, 'mascot', 'http://localhost/cos/img/maskotka_panda.jpg'),
(11, 'Maskotka lew', 'Maskotka lwa to odważny i majestatyczny towarzysz, gotowy podbić serca każdego, kto ją przygarnie. Z miękkim, meszkatym futrem i dumnie unoszącą się grzywą, ta maskotka emanuje siłą i pewnością siebie. Idealna do przytulania i dzielenia się chwilami radości, maskotka lwa jest symbolem odwagi i mocy. Dodaj odrobinę dzikości do swojego świata, adoptując tę wspaniałą maskotkę lwa.', 50.00, 100, 'mascot', 'http://localhost/cos/img/maskotka_lew.jpg'),
(12, 'Maskotka jaszczurka', 'Maskotka jaszczurki to niezwykła towarzyszka dla miłośników zwierząt i przygód. Z miękkim pluszowym futerkiem i wesołymi oczami, ta maskotka dodaje do każdej chwili nuty egzotyki. Idealna do zabawy i eksploracji, maskotka jaszczurki jest symbolem ciekawości i radości z odkrywania. Odkryj magiczny świat gadów, przygarniając tę uroczą maskotkę jaszczurki.', 45.00, 100, 'mascot', 'http://localhost/cos/img/maskotka_jaszczurka.jpg'),
(13, 'Maskotka delfin', 'Maskotka delfina to wspaniały towarzysz, który przeniesie cię w świat morskich przygód i radości. Z miękkim pluszowym futerkiem i uśmiechem na pyszczku, ta maskotka emanuje energią i entuzjazmem. Idealna do przytulania i marzenia o podwodnych podróżach, maskotka delfina jest symbolem wolności i radości życia. Odkryj magiczny świat oceaniczny, przytulając tę uroczą maskotkę delfina.', 55.00, 100, 'mascot', 'http://localhost/cos/img/maskotka_delfin.jpg'),
(14, 'Bilet ulgowy', 'Bilet ulgowy jest dostępny dla dzieci, uczniów oraz studentów do 26 roku życia, oferując atrakcyjne zniżki dla młodych odkrywców. Aby skorzystać z ulgi, konieczne jest przedstawienie ważnej legitymacji potwierdzającej status ucznia lub studenta. Ta oferta umożliwia młodzieży korzystanie z fascynujących atrakcji z zachowaniem oszczędności. Odkrywaj świat z ulgowym biletem i ciesz się niezapomnianymi chwilami, jednocześnie szanując swój budżet.', 20.00, 0, 'ticket', 'http://localhost/cos/img/bilet_ulgowy.jpg'),
(15, 'Bilet normalny', 'Bilet normalny to klucz do pełnego spektrum atrakcji, dostępny dla wszystkich entuzjastów bez żadnych dodatkowych wymogów. Oferuje pełną swobodę zwiedzania muzeów, parków rozrywki i innych miejsc pełnych kultury oraz rozrywki. Skorzystaj z tej wygodnej opcji, aby odkrywać fascynujący świat bez żadnych ograniczeń. Zakup biletu normalnego i ciesz się niezapomnianymi przeżyciami, dostosowanymi do Twoich własnych upodobań i planów.', 30.00, 0, 'ticket', 'http://localhost/cos/img/bilet_normalny.jpg'),
(16, 'Bilet rodzinny', 'Bilet rodzinny to idealna opcja dla rodzin, oferująca wyjątkową okazję do wspólnego odkrywania atrakcji. Ten bilet jest dostępny dla rodzin składających się z dwóch dorosłych i dwójki dzieci, co sprawia, że cała rodzina może cieszyć się razem niezapomnianymi chwilami. Bez względu na to, czy planujesz wizytę w muzeum, parku rozrywki czy innym miejscu pełnym rozrywki, bilet rodzinny zapewnia dostęp do fascynujących atrakcji dla każdego członka rodziny. Stwórzcie wspólne wspomnienia i cieszcie się rodzinna przygodą z biletem dedykowanym dla Was - rodziny 2+2.', 80.00, 0, 'ticket', 'http://localhost/cos/img/bilet_rodzinny.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(25) DEFAULT NULL,
  `userPassword` varchar(255) DEFAULT NULL,
  `userEmail` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userPassword`, `userEmail`) VALUES
(1, 'admin', '$2y$10$UAHTtcLq8zTmtpZ/I9uq.OaznoFwIvvws3vvFymuxCBHX7mzXHj26', 'admin@admin.pl'),
(2, 'user1', '$2y$10$6GnsMrGcgdVOZtnNDwl7ouoevBtIEArTSw3L3h/OUU5fEdPeK8g5a', 'cos.test.inz@gmail.com');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`animalId`);

--
-- Indeksy dla tabeli `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactId`);

--
-- Indeksy dla tabeli `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventId`);

--
-- Indeksy dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `userId` (`userId`);

--
-- Indeksy dla tabeli `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`order_productsId`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`productId`);

--
-- Indeksy dla tabeli `password_change_tokens`
--
ALTER TABLE `password_change_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksy dla tabeli `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `animalId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `order_productsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `password_change_tokens`
--
ALTER TABLE `password_change_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`orderId`),
  ADD CONSTRAINT `order_products_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `products` (`productId`);

--
-- Constraints for table `password_change_tokens`
--
ALTER TABLE `password_change_tokens`
  ADD CONSTRAINT `password_change_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`userId`) ON DELETE CASCADE;

--
-- Constraints for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD CONSTRAINT `password_reset_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`userId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
