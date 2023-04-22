-- Készítő: Cengiz
-- Gép: localhost
-- Username: root
-- Passwd: 


--
-- legitarsasag adatbázis törlése ha van.
--

DROP DATABASE IF EXISTS legitarsasag;

-- --------------------------------------------------------

--
-- legitarsasag adatbázis létrehozása
--

CREATE DATABASE legitarsasag DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE legitarsasag;


-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `username` varchar(50) COLLATE utf8_hungarian_ci NOT NULL PRIMARY KEY,
  `passwd` varchar(50) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `varosok`
--

CREATE TABLE `varosok` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `isoCode` varchar(3) COLLATE utf8_hungarian_ci NOT NULL,
  `varos` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  UNIQUE(isoCode,varos)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orszagok`
--

CREATE TABLE `orszagok` (
  `isoCode` varchar(3) COLLATE utf8_hungarian_ci NOT NULL PRIMARY KEY,
  `orszag` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `hivatalosNyelv` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `penzNem` varchar(50) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `repulok`
--

CREATE TABLE `repulok` (
  `regisztracioKod` varchar(50) COLLATE utf8_hungarian_ci NOT NULL PRIMARY KEY,
  `neve` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `tipus` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `maxfo` INT NOT NULL,
  `egyForeJegy` INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `utasok`
--

CREATE TABLE `utasok` (
  `utlevelSzam` varchar(20) COLLATE utf8_hungarian_ci NOT NULL PRIMARY KEY,
  `neve` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `szulido` date NOT NULL,
  `telefonszam` varchar(15) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jaratok`
--

CREATE TABLE `jaratok` (
  `jaratSzam` varchar(6) COLLATE utf8_hungarian_ci NOT NULL PRIMARY KEY,
  `repuloRegisztracioKod` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `indulas` datetime NOT NULL,
  `erkezes` datetime NOT NULL,
  `honnan_varosId` INT NOT NULL,
  `hova_varosId` INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jaratUtas`
--

CREATE TABLE `jaratUtas` (
  `jaratSzam` varchar(6) COLLATE utf8_hungarian_ci NOT NULL,
  `utasutlevelSzam` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  UNIQUE(jaratSzam,utasutlevelSzam)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

ALTER TABLE `jaratok`
  ADD CONSTRAINT `FK_jaratok_repuloId` FOREIGN KEY (`repuloRegisztracioKod`) REFERENCES `repulok` (`regisztracioKod`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_honnan_varosId` FOREIGN KEY (`honnan_varosId`) REFERENCES `varosok` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_hova_varosId` FOREIGN KEY (`hova_varosId`) REFERENCES `varosok` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `jaratUtas`
  ADD CONSTRAINT `FK_jaratUtas_jaratSzam` FOREIGN KEY (`jaratSzam`) REFERENCES `jaratok` (`jaratSzam`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_jaratUtas_utasutlevelSzam` FOREIGN KEY (`utasutlevelSzam`) REFERENCES `utasok` (`utlevelSzam`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `varosok`
  ADD CONSTRAINT `FK_varosok_isoCode` FOREIGN KEY (`isoCode`) REFERENCES `orszagok` (`isoCode`) ON DELETE CASCADE ON UPDATE CASCADE;