-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 09:31 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brainster_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `username`, `password`) VALUES
(4, 'johndoe@example.com', 'Admin John', '$2y$10$4AXvBjNQxGNr5lIyapRgYuus7d65MqfX.1zo5hu.oAK1AISUXkdBu'),
(5, 'jacksmith@example.com', 'Admin Jack', '$2y$10$wglK2apSIesHeVcOETLzAOM8Re5ROIdXmYiCvJrYExUq0GGmEpdb6');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `author_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `surname`, `bio`, `author_deleted`) VALUES
(1, 'John', 'Tolkien', 'John Ronald Reuel Tolkien - 3 January 1892 – 2 September 1973) was an English writer and philologist. He was the author of the high fantasy works The Hobbit and The Lord of the Rings.\r\n\r\nFrom 1925 to 1945, Tolkien was the Rawlinson and Bosworth Professor of Anglo-Saxon and a Fellow of Pembroke College, both at the University of Oxford. He then moved within the same university to become the Merton Professor of English Language and Literature and Fellow of Merton College, and held these positions from 1945 until his retirement in 1959. Tolkien was a close friend of C. S. Lewis, a co-member of the informal literary discussion group The Inklings. He was appointed a Commander of the Order of the British Empire by Queen Elizabeth II on 28 March 1972.', 0),
(2, 'George', 'Martin', 'George Raymond Richard Martin (born George Raymond Martin; September 20, 1948),also known as GRRM, is an American novelist, screenwriter, television producer and short story writer. He is the author of the series of epic fantasy novels A Song of Ice and Fire, which were adapted into the Emmy Award-winning HBO series Game of Thrones (2011–2019) and its prequel series House of the Dragon (2022–present). He also helped create the Wild Cards anthology series, and contributed worldbuilding for the 2022 video game Elden Ring.\r\n\r\nIn 2005, Lev Grossman of Time called Martin \"the American Tolkien\", and in 2011, he was included on the annual Time 100 list of the most influential people in the world. He is a longtime citizen of Santa Fe, New Mexico, where he helped fund Meow Wolf and owns the Jean Cocteau Cinema. The city commemorates March 29 as George R. R. Martin Day.', 0),
(3, 'Clive', 'Barker', 'Clive Barker (born 5 October 1952) is an English novelist, playwright, author, film director, and visual artist who came to prominence in the mid-1980s with a series of short stories, the Books of Blood, which established him as a leading horror writer. He has since written many novels and other works. His fiction has been adapted into films, notably the Hellraiser series, the first installment of which he also wrote and directed, and the Candyman series. He was also an executive producer of the film Gods and Monsters, which won an Academy Award for Best Adapted Screenplay.\r\n\r\nBarker\'s paintings and illustrations have been shown in galleries in the United States, and have appeared in his books. He has also created characters and series for comic books, and some of his more popular horror stories have been featured in ongoing comics series.', 0),
(4, 'Stephen', 'King', 'Stephen Edwin King (born September 21, 1947) is an American author of horror, supernatural fiction, suspense, crime, science-fiction, and fantasy novels. Described as the \"King of Horror\", a play on his surname and a reference to his high standing in pop culture, his books have sold more than 350 million copies, and many have been adapted into films, television series, miniseries, and comic books. King has published 64 novels, including seven under the pen name Richard Bachman, and five non-fiction books. He has also written approximately 200 short stories, most of which have been published in book collections.\r\n\r\nKing has received Bram Stoker Awards, World Fantasy Awards, and British Fantasy Society Awards. In 2003, the National Book Foundation awarded him the Medal for Distinguished Contribution to American Letters. He has also received awards for his contribution to literature for his entire bibliography, such as the 2004 World Fantasy Award for Life Achievement and the 2007 Grand Master Award from the Mystery Writers of America. In 2015, he was awarded with a National Medal of Arts from the U.S. National Endowment for the Arts for his contributions to literature.', 0),
(5, 'Frank', 'Herbert', 'Franklin Patrick Herbert Jr. (October 8, 1920 – February 11, 1986) was an American science fiction author best known for the 1965 novel Dune and its five sequels. Though he became famous for his novels, he also wrote short stories and worked as a newspaper journalist, photographer, book reviewer, ecological consultant, and lecturer.\r\n\r\nThe Dune saga, set in the distant future, and taking place over millennia, explores complex themes, such as the long-term survival of the human species, human evolution, planetary science and ecology, and the intersection of religion, politics, economics and power in a future where humanity has long since developed interstellar travel and settled many thousands of worlds. Dune is the best-selling science fiction novel of all time, and the entire series is considered to be among the classics of the genre.', 0),
(6, 'George ', 'Orwell', 'Eric Arthur Blair (25 June 1903 – 21 January 1950), better known by his pen name George Orwell, was an English novelist, essayist, journalist, and critic. His work is characterised by lucid prose, social criticism, opposition to totalitarianism, and support of democratic socialism.Orwell produced literary criticism, poetry, fiction and polemical journalism. He is known for the allegorical novella Animal Farm (1945) and the dystopian novel Nineteen Eighty-Four (1949). His non-fiction works, including The Road to Wigan Pier (1937), documenting his experience of working-class life in the industrial north of England, and Homage to Catalonia (1938), an account of his experiences soldiering for the Republican faction of the Spanish Civil War (1936–1939), are as critically respected as his essays on politics, literature, language and culture.Blair was born in India, and raised and educated in England. After school he became an Imperial policeman in Burma, before returning to Suffolk, England, where he began his writing career as George Orwell—a name inspired by a favourite location, the River Orwell. He lived from occasional pieces of journalism, and also worked as a teacher or bookseller whilst living in London. From the late 1920s to the early 1930s, his success as a writer grew and his first books were published. He was wounded fighting in the Spanish Civil War, leading to his first period of ill health on return to England. During the Second World War he worked as a journalist and for the BBC. The publication of Animal Farm led to fame during his lifetime. During the final years of his life he worked on Nineteen Eighty-Four, and moved between Jura in Scotland and London. It was published in June 1949, less than a year before his death.Orwell\'s work remains influential in popular culture and in political culture, and the adjective ', 0),
(7, 'Ernest', 'Hemingway', 'Ernest Miller Hemingway (July 21, 1899 – July 2, 1961) was an American novelist, short-story writer, and journalist. His economical and understated style—which he termed the iceberg theory—had a strong influence on 20th-century fiction, while his adventurous lifestyle and public image brought him admiration from later generations. Hemingway produced most of his work between the mid-1920s and the mid-1950s, and he was awarded the 1954 Nobel Prize in Literature. He published seven novels, six short-story collections, and two nonfiction works. Three of his novels, four short-story collections, and three nonfiction works were published posthumously. Many of his works are considered classics of American literature.\r\n\r\nHemingway was raised in Oak Park, Illinois. After high school, he was a reporter for a few months for The Kansas City Star before leaving for the Italian Front to enlist as an ambulance driver in World War I. In 1918, he was seriously wounded and returned home. His wartime experiences formed the basis for his novel A Farewell to Arms (1929).\r\n\r\nIn 1921, he married Hadley Richardson, the first of four wives. They moved to Paris, where he worked as a foreign correspondent and fell under the influence of the modernist writers and artists of the 1920s\' \"Lost Generation\" expatriate community. Hemingway\'s debut novel The Sun Also Rises was published in 1926. He divorced Richardson in 1927, and married Pauline Pfeiffer. They divorced after he returned from the Spanish Civil War (1936–1939), which he covered as a journalist and which was the basis for his novel For Whom the Bell Tolls (1940). Martha Gellhorn became his third wife in 1940. He and Gellhorn separated after he met Mary Welsh in London during World War II. Hemingway was present with Allied troops as a journalist at the Normandy landings and the liberation of Paris.\r\n\r\nHe maintained permanent residences in Key West, Florida (in the 1930s) and in Cuba (in the 1940s and 1950s). He almost died in 1954 after two plane crashes on successive days, with injuries leaving him in pain and ill health for much of the rest of his life. In 1959, he bought a house in Ketchum, Idaho, where, in mid-1961, he died by suicide.', 0),
(8, 'Mary', 'Shelley', 'Mary Wollstonecraft Shelley - 30 August 1797 – 1 February 1851) was an English novelist who wrote the Gothic novel Frankenstein; or, The Modern Prometheus (1818), which is considered an early example of science fiction and one of her best-known works. She also edited and promoted the works of her husband, the Romantic poet and philosopher Percy Bysshe Shelley. Her father was the political philosopher William Godwin and her mother was the philosopher and women\'s rights advocate Mary Wollstonecraft.\r\n\r\nMary\'s mother died less than a fortnight after giving birth to her. She was raised by her father, who provided her with a rich if informal education, encouraging her to adhere to his own anarchist political theories. When she was four, her father married a neighbour, Mary Jane Clairmont, with whom Mary came to have a troubled relationship.\r\n\r\nIn 1814, Mary began a romance with one of her father\'s political followers, Percy Bysshe Shelley, who was already married. Together with her stepsister, Claire Clairmont, she and Percy left for France and travelled through Europe. Upon their return to England, Mary was pregnant with Percy\'s child. Over the next two years, she and Percy faced ostracism, constant debt and the death of their prematurely born daughter. They married in late 1816, after the suicide of Percy Shelley\'s first wife, Harriet.\r\n\r\nIn 1816, the couple and Mary\'s stepsister famously spent a summer with Lord Byron and John William Polidori near Geneva, Switzerland, where Shelley conceived the idea for her novel Frankenstein. The Shelleys left Britain in 1818 for Italy, where their second and third children died before Shelley gave birth to her last and only surviving child, Percy Florence Shelley. In 1822, her husband drowned when his sailing boat sank during a storm near Viareggio. A year later, Shelley returned to England and from then on devoted herself to the upbringing of her son and a career as a professional author. The last decade of her life was dogged by illness, most likely caused by the brain tumour which killed her at age 53.', 0),
(9, 'Jane', 'Austen', 'Jane Austen ( 16 December 1775 – 18 July 1817) was an English novelist known primarily for her six major novels, which interpret, critique, and comment upon the British landed gentry at the end of the 18th century. Austen\'s plots often explore the dependence of women on marriage in the pursuit of favourable social standing and economic security. Her works critique the novels of sensibility of the second half of the 18th century and are part of the transition to 19th-century literary realism. Her use of biting irony, along with her realism and social commentary, have earned her acclaim among critics and scholars.\r\n\r\nWith the publication of Sense and Sensibility (1811), Pride and Prejudice (1813), Mansfield Park (1814), and Emma (1816), she achieved modest success but only little fame in her lifetime since the books were published anonymously. She wrote two other novels—Northanger Abbey and Persuasion, both published posthumously in 1818—and began another, eventually titled Sanditon, but died before its completion. She also left behind three volumes of juvenile writings in manuscript, the short epistolary novel Lady Susan, and the unfinished novel The Watsons.\r\n\r\nAusten gained far more status after her death, and her six full-length novels have rarely been out of print. A significant transition in her posthumous reputation occurred in 1833, when her novels were republished in Richard Bentley\'s Standard Novels series, illustrated by Ferdinand Pickering, and sold as a set. They gradually gained wider acclaim and popular readership. In 1869, fifty-two years after her death, her nephew\'s publication of A Memoir of Jane Austen introduced a compelling version of her writing career and supposedly uneventful life to an eager audience.\r\n\r\nAusten has inspired a large number of critical essays and literary anthologies. Her novels have inspired many films, from 1940\'s Pride and Prejudice to more recent productions like Sense and Sensibility (1995) and Love & Friendship (2016).', 0),
(10, 'Charlotte', 'Bronte', 'Charlotte Brontë (21 April 1816 – 31 March 1855) was an English novelist and poet, the eldest of the three Brontë sisters who survived into adulthood and whose novels became classics of English literature.\r\n\r\nShe enlisted in school at Roe Head in January 1831, aged 14 years. She left the year after to teach her sisters, Emily and Anne, at home, returning in 1835 as a governess. In 1839, she undertook the role of governess for the Sidgwick family, but left after a few months to return to Haworth, where the sisters opened a school but failed to attract pupils. Instead, they turned to writing and they each first published in 1846 under the pseudonyms of Currer, Ellis, and Acton Bell. Although her first novel, The Professor, was rejected by publishers, her second novel, Jane Eyre, was published in 1847. The sisters admitted to their Bell pseudonyms in 1848, and by the following year were celebrated in London literary circles.\r\n\r\nCharlotte Brontë was the last to die of all her siblings. She became pregnant shortly after her marriage in June 1854 but died on 31 March 1855, almost certainly from hyperemesis gravidarum, a complication of pregnancy which causes excessive nausea and vomiting.', 0),
(11, 'Wes', 'Craven', 'Wesley Earl Craven (August 2, 1939 – August 30, 2015) was an American film director, screenwriter, producer, actor, and editor. Craven has commonly been recognized as one of the greatest masters of the horror genre due to the cultural impact and influence of his work. Amongst his prolific filmography, Craven was best known for his pioneering work in the horror genre, particularly slasher films, where he mixed horror cliches with humor and satire. Craven created the A Nightmare on Elm Street franchise (1984–2010), specifically writing and directing the first film, co-writing and producing the third, A Nightmare on Elm Street 3: Dream Warriors (1987), and writing and directing the seventh, Wes Craven\'s New Nightmare (1994). He additionally directed the first four films in the Scream franchise (1996–2011). He also directed cult classics The Last House on the Left (1972) and The Hills Have Eyes (1977), the horror comedy The People Under the Stairs (1991), and psychological thriller Red Eye (2005). His other notable films include Swamp Thing (1982), The Serpent and the Rainbow (1988), Shocker (1989), Vampire in Brooklyn (1995), and Music of the Heart (1999).  Craven received several accolades across his career, which includes a Scream Award, a Sitges Film Festival Award, a Fangoria Chainsaw Award, and nominations for a Saturn Award and several other film festivals. In 1995, he was honored by the Academy of Science Fiction, Fantasy and Horror Films with the Life Career Award, for his accomplishments in the horror genre. In 2012, the New York City Horror Film Festival awarded Craven the Lifetime Achievement Award. On August 30, 2015, aged 76, Craven died of a brain tumor at his home in Los Angeles.', 0),
(12, 'Joseph', 'Heller', 'Joseph Heller (May 1, 1923 – December 12, 1999) was an American author of novels, short stories, plays, and screenplays. His best-known work is the 1961 novel Catch-22, a satire on war and bureaucracy, whose title has become a synonym for an absurd or contradictory choice. He was nominated in 1972 for the Nobel Prize in Literature.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `year_published` date NOT NULL,
  `pages` int(11) NOT NULL,
  `cover` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `book_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_title`, `author_id`, `year_published`, `pages`, `cover`, `category_id`, `book_deleted`) VALUES
(1, 'The Scarlet Gospels', 3, '2015-05-19', 368, 'https://upload.wikimedia.org/wikipedia/en/1/15/The_Scarlet_Gospels_cover.jpg', 2, 0),
(2, 'The Hellbound Heart', 3, '1986-11-01', 186, 'https://upload.wikimedia.org/wikipedia/en/b/b6/Hellboundheart.jpg', 2, 0),
(3, 'Abarat', 3, '2002-09-01', 418, 'https://upload.wikimedia.org/wikipedia/en/7/75/Abarat_book_cover.jpeg', 1, 0),
(4, 'Cabal', 3, '1988-01-01', 368, 'https://upload.wikimedia.org/wikipedia/en/b/b9/CabalBarker.jpg', 2, 0),
(5, 'Books of Blood', 3, '1984-01-01', 500, 'https://upload.wikimedia.org/wikipedia/en/0/0b/Book_of_Blood_Omnibus%2C_Volumes_1-3.jpg', 2, 0),
(6, 'Infernal Parade', 3, '2017-02-28', 88, 'https://cdn11.bigcommerce.com/s-65f8qukrjx/images/stencil/1280x1280/products/5675/6659/infernal_parade-cvr1__06091.1660573623.jpg?c=1', 2, 0),
(7, 'The Shining', 4, '1977-01-28', 447, 'https://upload.wikimedia.org/wikipedia/en/4/4c/Shiningnovel.jpg', 2, 0),
(8, 'It', 4, '1986-09-15', 1138, 'https://upload.wikimedia.org/wikipedia/en/7/78/It_%28Stephen_King_novel_-_cover_art%29.jpg', 2, 0),
(9, 'Pet Sematary', 4, '1983-11-14', 374, 'https://upload.wikimedia.org/wikipedia/en/5/52/StephenKingPetSematary.jpg', 2, 0),
(10, 'Salem\'s Lot', 4, '1975-10-17', 439, 'https://upload.wikimedia.org/wikipedia/en/d/df/Salemslothardcover.jpg', 2, 0),
(11, 'Cell', 4, '2006-01-24', 350, 'https://upload.wikimedia.org/wikipedia/en/0/0c/Cell_by_Stephen_King.jpg', 2, 0),
(12, 'Gerald\'s Game', 4, '1992-05-01', 332, 'https://upload.wikimedia.org/wikipedia/en/b/b4/GeraldsGame.jpg', 4, 0),
(13, 'The Fellowship of the Ring', 1, '1954-07-29', 423, 'https://upload.wikimedia.org/wikipedia/en/8/8e/The_Fellowship_of_the_Ring_cover.gif', 1, 0),
(14, 'The Two Towers', 1, '1954-11-11', 352, 'https://upload.wikimedia.org/wikipedia/en/a/a1/The_Two_Towers_cover.gif', 1, 0),
(15, 'The Return of the King', 1, '1955-10-20', 416, 'https://upload.wikimedia.org/wikipedia/en/1/11/The_Return_of_the_King_cover.gif', 1, 0),
(16, 'The Book of Lost Tales 1', 1, '1983-10-28', 297, 'https://upload.wikimedia.org/wikipedia/en/d/d0/LostTales1.jpg', 1, 0),
(17, 'The Silmarillion', 1, '1977-09-15', 365, 'https://upload.wikimedia.org/wikipedia/en/d/db/Silmarillion.png', 1, 0),
(18, 'The Book of Magic: A Collection of Stories', 2, '2018-10-16', 576, 'https://m.media-amazon.com/images/I/81zpSpBIPyL.jpg', 1, 0),
(19, 'A Game of Thrones', 2, '1996-08-01', 694, 'https://upload.wikimedia.org/wikipedia/en/9/93/AGameOfThrones.jpg', 1, 0),
(20, 'A Knight of the Seven Kingdoms', 2, '1998-08-25', 355, 'https://m.media-amazon.com/images/I/A1z8vxHPrwL.jpg', 1, 0),
(21, 'Fevre Dream', 2, '1982-01-01', 350, 'https://upload.wikimedia.org/wikipedia/en/c/c0/Fevre_dream.jpg', 1, 0),
(22, 'The Green Mile', 4, '1996-08-29', 432, 'https://upload.wikimedia.org/wikipedia/en/f/f7/Greenmilepart1.jpg', 4, 0),
(23, 'The Godmakers', 5, '1972-01-01', 176, 'https://upload.wikimedia.org/wikipedia/en/d/d1/The_Godmakers_%281972%29.jpg', 3, 0),
(24, 'The Lazarus Effect', 5, '1983-06-30', 381, 'https://upload.wikimedia.org/wikipedia/en/a/af/The_Lazarus_Effect_%281983%29.jpg', 3, 0),
(25, 'The Dosadi Experiment', 5, '1977-01-01', 320, 'https://upload.wikimedia.org/wikipedia/en/a/a0/The_Dosadi_Experiment%2C_first_edition.jpg', 3, 0),
(26, 'The Dragon in the Sea', 5, '1956-01-01', 192, 'https://upload.wikimedia.org/wikipedia/en/c/cf/The_Dragon_in_the_Sea.jpg', 3, 0),
(27, 'Dune', 5, '1965-01-01', 412, 'https://upload.wikimedia.org/wikipedia/en/d/de/Dune-Frank_Herbert_%281965%29_First_edition.jpg', 3, 0),
(28, 'God Emperor of Dune', 5, '1981-05-28', 496, 'https://upload.wikimedia.org/wikipedia/en/a/a7/God_Emperor_of_Dune-Frank_Herbert_%281981%29_First_edition.jpg', 3, 0),
(29, 'Whipping Star', 5, '1970-01-01', 256, 'https://upload.wikimedia.org/wikipedia/en/8/8b/Whipping_Star.jpg', 3, 0),
(30, 'Nineteen Eighty-Four', 6, '1949-06-08', 328, 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/1984first.jpg/330px-1984first.jpg', 6, 0),
(31, 'Homage to Catalonia', 6, '1938-04-25', 368, 'https://upload.wikimedia.org/wikipedia/en/b/b6/Homage_to_Catalonia%2C_Cover%2C_1st_Edition.jpg', 6, 0),
(32, 'Animal Farm', 6, '1945-08-17', 140, 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fb/Animal_Farm_-_1st_edition.jpg/330px-Animal_Farm_-_1st_edition.jpg', 6, 0),
(33, 'Down and Out in Paris and London', 6, '1933-01-09', 230, 'https://upload.wikimedia.org/wikipedia/en/0/06/Downout_paris_london.jpg', 5, 0),
(34, 'Burmese Days', 6, '1934-10-01', 300, 'https://kbimages1-a.akamaihd.net/2279bcfc-fa23-4ba6-8af5-6db2c9c98abc/1200/1200/False/burmese-days-37.jpg', 6, 0),
(35, 'Coming Up for Air', 6, '1939-06-12', 237, 'https://upload.wikimedia.org/wikipedia/en/9/9a/Coming_Up_for_Air_%28George_Orwell_novel_-_cover_art%29.jpg', 5, 0),
(36, 'The Lion and the Unicorn: Socialism and the English Genius', 6, '1941-01-01', 96, 'https://kbimages1-a.akamaihd.net/beb5094e-1688-4c46-9728-27cc82730f53/1200/1200/False/the-lion-and-the-unicorn-socialism-and-the-english-genius-1.jpg', 6, 0),
(38, 'The Sun Also Rises', 7, '1926-10-22', 251, 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8b/The_Sun_Also_Rises_%281st_ed._cover%29.jpg/330px-The_Sun_Also_Rises_%281st_ed._cover%29.jpg', 5, 0),
(39, 'The Garden of Eden ', 7, '1986-01-01', 247, 'https://upload.wikimedia.org/wikipedia/en/f/f0/The_Garden_of_Eden.jpg', 5, 0),
(40, 'Islands in the Stream', 7, '1970-01-01', 448, 'https://upload.wikimedia.org/wikipedia/en/2/22/IslandsInTheStream.jpg', 5, 0),
(41, 'Across the River and Into the Trees', 7, '1950-01-01', 320, 'https://upload.wikimedia.org/wikipedia/en/f/f4/Hemingriver.jpg', 5, 0),
(42, 'Mathilda', 8, '1959-01-01', 104, 'https://broadviewpress.com/wp-content/uploads/2017/08/Mathilda.jpg', 4, 0),
(43, 'The Last Man', 8, '1826-01-23', 479, 'https://kbimages1-a.akamaihd.net/26d9d838-3c53-4e22-92c0-fdf6d37df51c/1200/1200/False/the-last-man-6.jpg', 4, 0),
(44, 'Lodore', 8, '1835-01-01', 312, 'https://kbimages1-a.akamaihd.net/d834f5c0-3a0c-45ed-8262-2fcae48a19eb/1200/1200/False/lodore-14.jpg', 4, 0),
(45, 'The Mortal Immortal, and the Evil Eye', 8, '2008-12-12', 48, 'https://owl-static.enotescdn.net/uploads/covers/404416-19-10-2017.jpeg', 4, 0),
(46, 'Pride and Prejudice', 9, '1813-01-28', 480, 'https://wordsworth-editions.com/wp-content/uploads/2021/02/Pride-Prejudice-CE-head_on.jpg', 7, 0),
(47, 'Lady Susan', 9, '1871-01-01', 80, 'https://m.media-amazon.com/images/I/416G+T5xeAL._AC_SY780_.jpg', 7, 0),
(48, 'Emma', 9, '1815-12-23', 1036, 'https://m.media-amazon.com/images/I/51nrg1To-kL._AC_SY1000_.jpg', 7, 0),
(49, 'Persuasion', 9, '1817-12-20', 149, 'https://m.media-amazon.com/images/I/516I90WxHGL.jpg', 7, 0),
(50, 'Sense and Sensibility', 9, '1811-01-01', 222, 'https://m.media-amazon.com/images/I/51GtlVqXz4L._AC_SY780_.jpg', 7, 0),
(51, 'Jane Eyre', 10, '1847-10-19', 624, 'https://www.creativeml.ox.ac.uk/sites/default/files/styles/article_image_mobile/public/2017-05/Charlotte_Bronte_coloured_drawing/index.png?itok=21wW9Djp', 7, 0),
(52, 'Shirley, A Tale', 10, '1849-01-01', 318, 'https://m.media-amazon.com/images/I/51aIUNSl2-L.jpg', 5, 0),
(53, 'The Professor, A Tale', 10, '1857-01-01', 330, 'https://i.guim.co.uk/img/media/a54c7d051e32532257c797f3996de7060de4e67f/0_0_254_400/master/254.jpg?width=300&quality=45&auto=format&fit=max&dpr=2&s=b908782159786123c686926d3a647257', 5, 0),
(54, 'The Green Dwarf', 10, '1833-01-01', 116, 'https://m.media-amazon.com/images/I/31y88TRdzFL._AC_SY1000_.jpg', 7, 0),
(55, 'Book1', 9, '1111-11-11', 200, 'randomimg', 4, 1),
(57, 'Book2', 7, '2222-02-22', 300, 'randomimg2', 4, 1),
(59, 'book200', 10, '2222-04-04', 800, 'randomimgs', 2, 1),
(60, 'book5', 5, '2222-04-04', 500, 'randomimg6', 6, 1),
(61, 'book6', 6, '2222-02-22', 136, 'asdasd', 5, 1),
(62, 'book32', 1, '4444-04-04', 712, 'coverimage5', 1, 1),
(63, 'Fountain Society', 11, '1999-10-01', 464, 'https://m.media-amazon.com/images/I/51pNXGldX5L._AC_SY780_.jpg', 2, 0),
(64, 'Catch 22', 12, '1995-10-17', 453, 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1463157317l/168668.jpg', 8, 0),
(65, 'No Laughing Matter', 12, '1986-01-01', 336, 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1393774671i/10716.jpg', 8, 0),
(66, 'Picture This', 12, '1988-01-01', 351, 'https://upload.wikimedia.org/wikipedia/en/thumb/6/63/JosephHeller_PictureThis.jpg/220px-JosephHeller_PictureThis.jpg', 8, 0),
(67, 'Something Happened', 12, '1974-09-01', 576, 'https://upload.wikimedia.org/wikipedia/en/9/9b/SomethingHappened.JPG', 8, 0),
(68, 'Closing Time', 12, '1994-10-01', 464, 'https://upload.wikimedia.org/wikipedia/en/d/d4/Closing_Time_%28Joseph_Heller_novel%29.jpg', 8, 0),
(69, 'Wes Craven\'s New Nightmare', 11, '1994-11-15', 216, 'https://amc-theatres-res.cloudinary.com/image/upload/f_auto,fl_lossy,h_465,q_auto,w_310/v1579117921/amc-cdn/production/2/movies/5000/4977/Poster/p_800x1200_NightmareOnElmStA_En_092716.jpg', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `category_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `category_deleted`) VALUES
(1, 'Fantasy', 0),
(2, 'Horror', 0),
(3, 'ScienceFiction', 0),
(4, 'Thriller', 0),
(5, 'Drama', 0),
(6, 'Political', 0),
(7, 'Romance', 0),
(8, 'War', 0),
(9, 'Science', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `book` int(11) NOT NULL,
  `approved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment`, `user_id`, `book`, `approved`) VALUES
(1, 'This book is amazing, i enjoy reading it in the night before i go to sleep. There are some unique lines written by the author that amaze me in every way. I recommend this book to anyone who wants thrills and suspense!', 4, 19, 1),
(2, 'I love horror novels and this one is the top book for me. I enjoy every aspect of the descriptions of such terrifying beings and scenery that freezes the heart. Recommended to every horror lover out there!', 1, 2, 1),
(3, 'This book is unusually alluring with all the romantic scenes and plot twists that happen between the main characters. I love romance novels but this one really surprised me. I would love to read more books like this one!', 5, 49, 1),
(4, 'Such a detailed description about the state of a country in political uproar, the brutal reality hits really close to home since we\'ve all witnessed at least a decent amount of suffering like that described in the novel. The author is amazing for writing from his own experience on the field!', 3, 34, 1),
(5, 'Oh how i love these series, Clive is one of the masters of horror, the best ever known to man. I wish i could read the whole series in one sitting, the story is amazing!', 2, 2, 1),
(6, 'The master of horror has spoken! The cenobytes are one of the most original characters in horror, even tho they resemble demons from biblical descriptions. Still, this is an original approach to the theme and such development of actions!', 6, 2, 1),
(7, 'Such a lovely romance. The delivery and motive are quite remarkable, even in modern times this is a piece of art that none can come close to!', 1, 49, 1),
(8, 'Great novel! I was consumed in reading by the intrigues and games that led to a very interesting outcome between the main characters. I recommend this book to everyone who is able to read!', 2, 49, 1),
(9, 'Great book, stunning descriptions and perfectly described characters. Makes the perfect horror novel for horror lovers!', 8, 2, 1),
(10, 'Excellent character development, i feel fully immersed in the story with all those dark personalities. Even tho i\'m not quite the fan of horror, this one is a great piece of art!', 10, 2, 1),
(11, 'Comment from Bob Smith', 3, 2, 0),
(13, 'I am commenting now as Joe Black', 11, 13, 1),
(16, 'I recommend this book to every horror lover, it\'s an excellent book from a well known wrtier!', 7, 63, 1),
(17, 'This is and excellent book about war and bureaucracy, corrupting the world thru politics and nepotism.', 8, 64, 1),
(33, 'I recommend this book to everyone, it\'s a good book !', 12, 13, 1),
(38, 'I recommend this book to every horror lover, it\'s an excellent book from a well known wrtier!', 12, 2, 1),
(48, 'I am commenting now as Don Gordon', 12, 14, 1),
(50, 'I am commenting now as Joe Black', 11, 14, 1),
(52, 'I am commenting now as Robert Green', 6, 64, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `note_id` int(11) NOT NULL,
  `note` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `book` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`note_id`, `note`, `user_id`, `book`) VALUES
(2, 'We are explorers of the further regions of experience, angels to some, demons to others.', 11, 2),
(3, 'Pain has a face, allow me to introduce it to you. Gentleman, i am pain!', 11, 2),
(5, 'Pleasure was pain there, and vice versa. And he knew it well enough to call it home', 11, 2),
(6, 'She wanted nothing that he could offer her, except perhaps his absence.', 11, 2),
(8, 'The lament configuration is a gateway to hell and we are it\'s guardians.', 11, 2),
(9, 'And so the fellowship of the ring began and went on the journey to Mount Doom', 11, 13),
(10, 'A wizard is never late nor early! He arrives precisely when he wants to.', 11, 13),
(11, 'It\'s a troll. They have a cave troll !', 11, 14),
(12, 'Oh but you opened the box, you summoned us.', 11, 2),
(13, 'Reminder to self, re read this book again, it\'s excellent!', 7, 63),
(14, 'Just as heart is a fountain of unspoken words, the universe is a womb of wonder weird worlds', 7, 63),
(16, 'In the desert, the only god is a well.', 7, 63),
(17, 'Never trust society, never trust the government.', 8, 64),
(22, 'Leaving a note here just in case', 12, 14),
(25, 'Leaving a note as Robert Green', 6, 64),
(26, 'Welcome to oblivion! Amen.', 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `surname` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`) VALUES
(1, 'Alice', 'Burton', 'aliceburton@example.com', '$2y$10$y/e4pqtNMebgZbAC/Nnqou3JTAGwAtej4WELzOPpEYHVTd1cGhdvO'),
(2, 'Alex', 'Spencer', 'alexspencer@example.com', '$2y$10$mXKZoQN3Vl7WWY/1/rr.MOSXcxN74wieZNE7mnFKYnGCXtBjYnjFy'),
(3, 'Bob', 'Smith', 'bobsmith@example.com', '$2y$10$zCIK8rlrlSm3tEWOOY10YeIQvV04F0XzfCyyH.IKfvF13O6nBU3sC'),
(4, 'Jane', 'Doe', 'janedoe@example.com', '$2y$10$WO0qqni4MQ54atGpAQhEiOyWHLB5sdMzVK9HxpwwqTP01j01uSP0y'),
(5, 'Rebecca', 'Smith', 'rebeccasmith@example.com', '$2y$10$CJXWS4niLcfKVnL7ZzEp5OzUqyO6c2uNQiKhtnH7csP1xfo4r.JK.'),
(6, 'Robert', 'Green', 'robertgreen@example.com', '$2y$10$lBEboHO4p4h3dhUtp/pz.uHDc8zzmzjKyprinKMO1U3tqCRSTajZe'),
(7, 'John', 'Doe', 'johndoe@example.com', '$2y$10$UtiSdEcQUOWetDvj7esyl.KSvT63gHuhAy/6FMeo/N/E8jRBej4yK'),
(8, 'Carol', 'Johnson', 'caroljohnson@example.com', '$2y$10$lRf7.W9Zisk/hYSz66csbODov5DGPdevNux7J13HQaktB4UzztKn2'),
(9, 'Peter', 'White', 'peterwhite@example.com', '$2y$10$O4w4nB2me5on6DSLccbI5OWM4tIxKUhoMYJb9LlGdlcaY/9aUsxEe'),
(10, 'Sam', 'Free', 'samfree@example.com', '$2y$10$83zO1UT.cio42/T5xT56NegQqJFBtWplPOarzD9bks8c2a3H29ozi'),
(11, 'Joe', 'Black', 'joeblack@example.com', '$2y$10$MJVJbt4iiDV9iOOK3yYVHen7Jl.kX6A1AowYFNUk6NTfFqA0g7rgu'),
(12, 'Don', 'Gordon', 'dongordon@example.com', '$2y$10$a8rmolJTLGb/B9ryGwm2VeAfVrRgsb5OWAhuHjJV6E69e4WUrp4FW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `books_authors` (`author_id`),
  ADD KEY `books_categories` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book` (`book`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`note_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book` (`book`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_authors` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  ADD CONSTRAINT `books_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`book`) REFERENCES `books` (`book_id`);

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`book`) REFERENCES `books` (`book_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
