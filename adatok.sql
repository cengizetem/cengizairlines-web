USE legitarsasag;

INSERT INTO `orszagok`
VALUES 
('AUS', 'Australia',      'Nincs', 'Ausztrál dollár'),
('AUT', 'Austria',        'Német', 'Euro'  ),
('BRA', 'Brazil',         'Portugál', 'Brazil real' ),
('EGY', 'Egypt',          'Arab' , 'Egyiptomi font'),
('FIN', 'Finland',        'Finn', 'Euro' ),
('FRA', 'France',         'Francia', 'Euro'),
('DEU', 'Germany',        'Német', 'Euro'),
('GRC', 'Greece',         'Görög', 'Euro'),
('HUN', 'Hungary',        'Magyar', 'Magyar forint' ),
('IRL', 'Ireland',        'Angol', 'Euro' ),
('ISR', 'Israel',         'Héber', 'Izraeli új sékel'),
('JAM', 'Jamaica',        'Angol', 'Jamaicai dollár' ),
('JPN', 'Japan',          'Japán', 'Japán jen' ),
('KOR', 'South Korea',    'Korea', 'Dél-koreai von'),
('LUX', 'Luxembourg',     'Német', 'Euro'),
('MCO', 'Monaco',         'Angol', 'Euro'),
('MNG', 'Mongolia',       'Mongol', 'Mongol tugrik' ),
('NLD', 'Netherlands',    'Holland', 'Euro'),
('NOR', 'Norway',         'Norvég', 'Norvég korona'),
('POL', 'Poland',         'Lengyel', 'Lengyel zloty'),
('PRT', 'Portugal',       'Portugál', 'Euro'),
('ESP', 'Spain',          'Spanyol', 'Euro' ),
('SWE', 'Sweden',         'Svéd', 'Svéd Korona'),
('CHE', 'Switzerland',    'Német', 'Svájci frank'  ),
('ARE', 'United Arab Emirates',   'Arab', 'Emirátusi dirham' ),
('GBR', 'United Kingdom',   'Angol', 'Angol font' ),
('USA', 'United States',   'Angol', 'Amerikai dollár'  );

INSERT INTO `varosok`(`isoCode`,`varos`)
VALUES 
('AUS', 'Canberra'),
('AUT', 'Vienna'),
('BRA', 'Brasilia'),
('EGY', 'Cairo'),
('FIN', 'Helsinki'),
('FRA', 'Paris'),
('DEU', 'Berlin'),
('GRC', 'Athens'),
('HUN', 'Budapest'),
('IRL', 'Dublin'),
('ISR', 'Jerusalem'),
('JAM', 'Kingston'),
('JPN', 'Tokyo'),
('KOR', 'Seoul'),
('LUX', 'Luxembourg'),
('MCO', 'Monaco'),
('MNG', 'Ulaanbaatar'),
('NLD', 'Amsterdam'),
('NOR', 'Oslo'),
('POL', 'Warsaw'),
('PRT', 'Lisbon'),
('ESP', 'Madrid'),
('SWE', 'Stockholm'),
('CHE', 'Bern'),
('ARE', 'Abu Dhabi'),
('GBR', 'London'),
('USA', 'Washington D.C.');



INSERT INTO `utasok`
VALUES 
('YJ5527003', 'Klaudia Feher', '1998-06-8',  '+36209236063', 'klaudiafeher818@gmail.com'),
('XJ1410778', 'Aron Orosz', '1997-04-1',  '+36607835002', 'aronorosz722@gmail.com'),
('IN5027025', 'Aron Gaspar', '1995-08-12',  '+36508566846', 'arongaspar806@gmail.com'),
('UD6933657', 'Patricia Balla', '1999-09-12',  '+36408287216', 'patriciaballa209@gmail.com'),
('XA7658995', 'Rudolf Katona', '2000-03-24',  '+36608711971', 'rudolfkatona422@gmail.com'),
('LM1739946', 'Katalin Boros', '1998-06-12',  '+36708315714', 'katalinboros580@gmail.com'),
('NA5331577', 'Milla Barna', '1997-03-5',  '+36504967181', 'millabarna855@gmail.com'),
('AW9601933', 'Adel Farkas', '1997-08-18',  '+36601563991', 'adelfarkas305@gmail.com'),
('CO9668810', 'Kornel Kiraly', '1999-01-21',  '+36206242216', 'kornelkiraly460@gmail.com'),
('KU8008683', 'Zoltan Illes', '1996-06-20',  '+36705798027', 'zoltanilles610@gmail.com'),
('UD5623435', 'Endre Balla', '1998-09-16',  '+36203918226', 'endreballa908@gmail.com'),
('DI4911817', 'Rudolf Szoke', '1995-07-15',  '+36807960003', 'rudolfszoke567@gmail.com'),
('SE1695909', 'Kornel Orban', '1999-05-24',  '+36709848434', 'kornelorban993@gmail.com'),
('YF5806208', 'Emoke Szabo', '1998-08-25',  '+36603575563', 'emokeszabo458@gmail.com'),
('NG6129673', 'Maja Racz', '2000-04-1',  '+36509208006', 'majaracz231@gmail.com'),
('PM3913930', 'Katinka Balog', '1999-07-7',  '+36400097815', 'katinkabalog656@gmail.com'),
('DV8026899', 'Szervac Kerekes', '2000-05-8',  '+36806927204', 'szervackerekes804@gmail.com'),
('PI2266742', 'Barna Kiraly', '1995-06-18',  '+36603040152', 'barnakiraly954@gmail.com'),
('BG7320300', 'Dorian Novak', '1996-06-17',  '+36603781814', 'doriannovak768@gmail.com'),
('ET9775116', 'Lena Fulop', '2000-04-3',  '+36302859283', 'lenafulop806@gmail.com'),
('OI2182132', 'Hosszu Laszlo', '2000-08-14',  '+36403494275', 'hosszulaszlo030@gmail.com'),
('RS5468219', 'Mestyan Gabor', '1997-03-15',  '+36703262774', 'mestyangabor679@gmail.com'),
('FR6277644', 'Michael Jackson', '2000-05-21',  '+36503921728', 'michaeljackson233@gmail.com'),
('BZ9926551', 'Gaspar Gyozike', '1995-07-23',  '+36806731832', 'gaspargyozike899@gmail.com'),
('EM7771422', 'Adel Racz', '1997-02-6',  '+36606424343', 'adelracz649@gmail.com'),
('SM8644248', 'Bence Magyar', '1998-08-2',  '+36309279695', 'bencemagyar322@gmail.com'),
('YQ2942718', 'Henrietta Simon', '1997-02-20',  '+36705948367', 'henriettasimon766@gmail.com'),
('RA4401659', 'Attila Gal', '1998-06-20',  '+36308450197', 'attilagal695@gmail.com'),
('IK9250795', 'Andrea Pap', '1997-06-5',  '+36202137634', 'andreapap297@gmail.com'),
('EG7503273', 'Maria Jonas', '2000-04-4',  '+36503336792', 'mariajonas166@gmail.com'),
('TP6987269', 'Rudolf Mate', '1998-07-7',  '+36807224621', 'rudolfmate591@gmail.com'),
('UA8417442', 'Angela Barna', '1996-06-22',  '+36309215179', 'angelabarna689@gmail.com'),
('KZ2579539', 'Katalin Vegh', '2000-09-13',  '+36205106615', 'katalinvegh881@gmail.com'),
('ZO8142318', 'Vilmos Bogdan', '1997-08-1',  '+36801519904', 'vilmosbogdan984@gmail.com'),
('WN9534590', 'Greta Fodor', '1997-02-1',  '+36806147899', 'gretafodor908@gmail.com'),
('KN4945976', 'Johanna Biro', '1996-04-10',  '+36600443587', 'johannabiro073@gmail.com'),
('GC4730726', 'Gitta Illes', '1998-02-10',  '+36306471839', 'gittailles156@gmail.com'),
('AD2971803', 'Otto Hajdu', '1995-02-2',  '+36203595861', 'ottohajdu799@gmail.com'),
('GA4082196', 'Hanga Peter', '1997-01-10',  '+36607374100', 'hangapeter140@gmail.com'),
('EI0921383', 'Martina Takacs', '1998-08-24',  '+36407179463', 'martinatakacs830@gmail.com'),
('OF0599404', 'Peter Kiss', '1997-03-23',  '+36301021641', 'peterkiss620@gmail.com'),
('MG6708867', 'Sandor Bogdan', '1997-05-16',  '+36600402256', 'sandorbogdan776@gmail.com'),
('EK0019536', 'Istvan Szalai', '1997-03-11',  '+36503405382', 'istvanszalai459@gmail.com'),
('JF7401581', 'Csenge Tamas', '1997-01-20',  '+36204255706', 'csengetamas940@gmail.com');


INSERT INTO `felhasznalok`
VALUES('admin', 'admin');

INSERT INTO `repulok`
VALUES 
('A4O-OXB', 'Superman','Airbus A321-253NX', '50', '70000'),
('LZ-CGA', 'Wonder Woman','Boeing 737-809(SF)', '70', '120000'),
('TC-JNE', 'Batman','Airbus A330-203', '2', '300000');



INSERT INTO `jaratok`
VALUES
('W62281', 'A4O-OXB', '2022-12-05 10:34', '2022-12-05 14:34', '1', '9'),
('LO536', 'LZ-CGA', '2022-12-08 12:34', '2022-12-10 16:34', '7', '5'),
('LH1337', 'A4O-OXB', '2022-12-10 10:34', '2022-12-11 01:34', '9', '2'),
('IB3291', 'TC-JNE', '2022-12-12 10:34', '2022-12-12 14:34', '1', '9'),
('W33281', 'LZ-CGA', '2022-12-14 10:34', '2022-12-16 15:34', '1', '3');


INSERT INTO `jaratUtas`
VALUES
('W62281', 'EK0019536'),
('W62281', 'OF0599404'),
('W62281', 'GC4730726'),
('LO536', 'ZO8142318'),
('LO536', 'UA8417442'),
('LO536', 'RA4401659'),
('LO536', 'ET9775116'),
('LH1337', 'YQ2942718'),
('LH1337', 'PM3913930'),
('LH1337', 'UD5623435'),
('LH1337', 'EM7771422'),
('IB3291', 'YQ2942718');



