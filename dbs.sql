Create DATABASE mhw4;
USE mhw4;

CREATE TABLE users (
    id integer primary key auto_increment,
    username varchar(16) not null unique,
    password varchar(255) not null,
    email varchar(255) not null unique,
    name varchar(255) not null,
    surname varchar(255) not null
) Engine = InnoDB;

CREATE TABLE cart (
    id integer,
    id_contenuto integer not null,
    immagine VARCHAR(255),
	descrizione VARCHAR(255),
	prezzo varchar(255),
    pRIMARY KEY (ID, ID_contenuto)
) Engine = InnoDB;

CREATE TABLE INVENTARIO (
  id INT PRIMARY KEY,
  tipo VARCHAR(255),
  immagine VARCHAR(255),
  descrizione VARCHAR(255),
  prezzo varchar(255)
);


CREATE TABLE recensioni (
    id integer,
    id_contenuto integer not null,
    immagine VARCHAR(255),
	descrizione VARCHAR(255),
	prezzo varchar(255),
    recensione varchar(255)
) Engine = InnoDB;

INSERT INTO INVENTARIO (id, tipo, immagine, descrizione, prezzo)
VALUES   
  (1, 'Maglietta', 'https://shop.ducati.com/media/catalog/product/cache/320c2e69a374e3d7282ccd5a9111d6e0/D/2/D27545FE27F39E9259614CFADF7831BC_4.jpg', 'Maglietta ducati', 70.99),
  (2, 'Maglietta', 'https://cdn2.yamaha-motor.eu/prod/accessories/APPAREL/Apparel/B20-FT111-E1-0L-20-PB-male-t-shirt-ss-WILTHIRE-EU-Studio-002_Tablet.jpg', 'Maglietta yamaha', 30.99),
  (3, 'Maglietta', 'https://shop.ducati.com/media/catalog/product/cache/320c2e69a374e3d7282ccd5a9111d6e0/A/2/A270A6AB1291C79BEC17F6CA8C37465C_28.jpg', 'Maglietta ducati', 72.99),
  (4, 'Maglietta', 'https://cdn.shopify.com/s/files/1/0616/2671/2323/products/YTMTS444804_004_1.jpg?v=1649924123', 'Maglietta yamaha', 31.99),
  (5, 'Maglietta', 'https://i.ebayimg.com/images/g/mFkAAOSwhTJkPlb5/s-l1600.jpg', 'Maglietta aprilia', 44.99),
  (6, 'Maglietta', 'https://www.motostorm.it/images/products/large/casual/ixon_aprilia22_ts1_2.jpg', 'Maglietta aprilia', 51.99),
  (7, 'Maglietta', 'https://www.gpracingapparels.com/media/catalog/product/cache/61513635172605128d103d5d68de8004/9/9/9999185240541_A_5.jpg', 'Maglietta honda', 26.99),
  (8, 'Maglietta', 'https://www.gpracingapparels.com/media/catalog/product/cache/61513635172605128d103d5d68de8004/9/9/9999188176366_A_2.jpg', 'Maglietta honda', 35.99),
  (9, 'Maglietta', 'https://www.motodiguida.it/shop/media/catalog/product/cache/1/image/946x946/9df78eab33525d08d6e5fb8d27136e95/p/h/pho-pw-pers-vs-397576-3rb22002240x-kids-replica-team-tee-front-sall-awsg-v1.jpg', 'Maglietta ktm', 65.99),
  (10, 'Maglietta', 'https://i.ebayimg.com/images/g/1VgAAOSwYrBeofNf/s-l500.jpg', 'Maglietta ktm', 43.99),
  (11, 'Maglietta', 'https://shop.ducatimilano.com/878-large_default/maglietta-t-shirt-ducati-carbon-uomo-98769741.jpg', 'Maglietta ducati', 98.99),
  (12, 'Maglietta', 'https://cdn.shopify.com/s/files/1/0616/2671/2323/products/YDWTS362409_009_1.jpg?v=1649427550', 'Maglietta yamaha', 44.99),
  (13, 'Maglietta', 'https://funky-t-shirt.com/assets/funkytshirt/img/products/6949/image/aprilia-racing-team-tuono-rsv-4-rf-w-racer-t-shirt.JPG', 'Maglietta aprilia', 51.99),
  (14, 'Maglietta', 'https://www.gpracingapparels.com/media/catalog/product/cache/61513635172605128d103d5d68de8004/9/9/9999184864236_A_7.jpg', 'Maglietta honda', 42.99),
  (15, 'Maglietta', 'https://www.maciag-offroad.de/shop/artikelbilder/normal/145477/red-bull-t-shirt-ktm-team-2.jpg', 'Maglietta ktm', 31.99),
  (16, 'Maglietta', 'https://shop.ducati.com/media/catalog/product/cache/320c2e69a374e3d7282ccd5a9111d6e0/9/d/9dc4279ce1533db990c9843952449d37.jpg', 'Maglietta ducati', 80.99),
  (17, 'Maglietta', 'https://www.market2ruote.it/10354-large_default/t-shirt-yamaha.jpg', 'Maglietta yamaha', 15.99),
  (18, 'Maglietta', 'https://images.piaggio.com/aprilia/accessories/607743m/607743m-01/607743m-01-01-thumb.png', 'Maglietta aprilia', 67.99),
  (19, 'Maglietta', 'https://www.gpracingapparels.com/media/catalog/product/cache/61513635172605128d103d5d68de8004/9/9/9999194157038_A_6.jpg', 'Maglietta honda', 53.99),
  (20, 'Maglietta', 'https://www.filicorporation.com/store/3835-large_default/ktm-racing-team-enduro-moto-redbull-team-motocross-t-shirt-hoodie-felpa-cappucci-uomo-donna.jpg', 'Maglietta ktm', 21.99),
  (21, 'Maglietta', 'https://shop.ducati.com/media/catalog/product/cache/320c2e69a374e3d7282ccd5a9111d6e0/b/f/bf2e2663ba1c3a46d1285c5589d69e29.jpg', 'Maglietta ducati', 88.99),
  (22, 'Maglietta', 'https://canellamoto.it/shop/it/33092-large_default/vr46-t-shirt-heritage-yamaha.jpg', 'Maglietta yamaha', 42.99),
  (23, 'Maglietta', 'https://www.filicorporation.com/store/4219-large_default/aprilia-racing-team-personalizzata-superbike-motogp-replica-fans-t-shirt-hoodie-felpa-cappucci-uomo-donna.jpg', 'Maglietta aprilia', 54.99),
  (24, 'Maglietta', 'https://ae01.alicdn.com/kf/HTB1AhINRW6qK1RjSZFmq6x0PFXad.jpg?width=800&height=820&hash=1620', 'Maglietta honda', 47.99),
  (25, 'Maglietta', 'https://www.filicorporation.com/store/3839-large_default/ktm-racing-team-enduro-moto-redbull-team-motocross-t-shirt-hoodie-felpa-cappucci-uomo-donna.jpg', 'Maglietta ktm', 57.99),
  (26, 'Maglietta', 'https://shop.ducati.com/media/catalog/product/cache/320c2e69a374e3d7282ccd5a9111d6e0/d/b/db3b7fbe-78f6-408c-b42e-5e909e5af2d0_14.jpg', 'Maglietta ducati', 96.99),
  (27, 'Maglietta', 'https://cdn.shopify.com/s/files/1/0616/2671/2323/products/YTMTS296109_009_1.jpg?v=1649427621', 'Maglietta yamaha', 36.99),
  (28, 'Maglietta', 'https://www.filicorporation.com/store/4213-large_default/aprilia-racing-team-personalizzata-superbike-motogp-replica-fans-t-shirt-hoodie-felpa-cappucci-uomo-donna.jpg', 'Maglietta aprilia', 38.99),
  (29, 'Maglietta', 'https://i.etsystatic.com/43685510/r/il/d1f75d/4963313541/il_fullxfull.4963313541_trzv.jpg', 'Maglietta honda', 43.99),
  (30, 'Maglietta', 'https://cdn1.helmexpress.com/media/catalog/product/cache/1c3d95e40b87aeaaccd4ad4c52659359/r/e/red-bull-ktm-backprint-herren-t-shirt-grau-xxl-214035grxxl_3.jpg', 'Maglietta ktm', 65.99);
  
  insert into inventario(id, tipo, immagine, descrizione, prezzo)
VALUES
  (31, 'Cappello', 'https://shop.ducati.com/media/catalog/product/cache/320c2e69a374e3d7282ccd5a9111d6e0/c/d/cd5b5f1322c19513c5a9ffe5d50d2443.jpg', 'Cappello ducati', 30.99),
  (32, 'Cappello', 'https://offroadstore.it/pub/media/catalog/product/cache/72fdc86af83e566c44969589d4ba8e9f/7/8/7833_1.jpg', 'Cappello yamaha', 12.99),
  (33, 'Cappello', 'https://www.apriliamotostore.com/files/foto/427_1_small.jpg', 'Cappello aprilia', 15.99),
  (34, 'Cappello', 'https://www.gpracingapparels.com/media/catalog/product/cache/61513635172605128d103d5d68de8004/9/9/9999188318940_A_1.jpg', 'Cappello honda', 17.99),
  (35, 'Cappello', 'https://gigliolimotori.com/wp-content/uploads/2021/11/150115_3PW1775300_RACING-ORANGE-CAP.jpg', 'Cappello ktm', 24.99),
  (36, 'Cappello', 'https://www.neweracap.eu/globalassets/products/b9345_657/60334546/ducati-motor-logo-black-9forty-a-frame-trucker-cap-60334546-left.jpg', 'Cappello ducati', 51.99),
  (37, 'Cappello', 'https://i.ebayimg.com/images/g/Is0AAOSwDtxe6fMJ/s-l400.jpg', 'Cappello yamaha', 21.99),
  (38, 'Cappello', 'https://img.cappellishop.it/Cappellino-9Forty-Sport-Aprilia-by-New-Era-nero.55808_rf4.jpg', 'Cappello aprilia', 29.99),
  (39, 'Cappello', 'https://img.cappellishop.it/Cappellino-Honda-Classic-Flexfit-by-FOX.52643a.jpg', 'Cappello honda', 19.99),
  (40, 'Cappello', 'https://www.centaurodorico.com/6330-thickbox_default/cappello-ktm-replica-team-curved.jpg', 'Cappello ktm', 11.99),
  (41, 'Tuta', 'https://shop.ducati.com/media/catalog/product/cache/d737c4e9011f92407994a498031f753a/7/0/7087BC8CBB0ECA56C6B74AA463E11D91_8.jpg', 'Tuta ducati', 510.99),
  (42, 'Tuta', 'https://www.dueruote.it/content/dam/dueruote/it/news/equipaggiamento/2009/02/25/abbigliamento-racing-by-yamaha/rbig/giacca-kiron-ok.jpg', 'Tuta yamaha', 220.99),
  (43, 'Tuta', 'https://eadn-wc01-3207080.nxedge.io/cdn/pub/media/catalog/product/cache/360x360/v/a/valentino-rossi-aprilia-gp-1999-leathers-front.jpg', 'Tuta aprilia', 340.99),
  (44, 'Tuta', 'https://www.fuorigirict.it/picviewer.php?IDFile=5276&mode=resize&size=800', 'Tuta honda', 450.99),
  (45, 'Tuta', 'https://ktmfarioli.com/storage/media/8747/pho_pw_pers_vs_482248_3pw23000200x_radius_1_pcs_suit_front_street_equipment__sall__awsg__v1.jpg', 'Tuta ktm', 399.99),
  (46, 'Tuta', 'https://shop.ducati.com/media/catalog/product/cache/320c2e69a374e3d7282ccd5a9111d6e0/4/f/4f43aa7674a57bef1db9e9b959fdc2bb.jpg', 'Tuta ducati', 813.99),
  (47, 'Tuta', 'https://data.outletmoto.eu/imgprodotto/tuta-moto-professionale-in-pelle-berik-2-0-ls1-171334-bk-nero-blu-yamaha_126422_zoom.jpg', 'Tuta yamaha', 405.99),
  (48, 'Tuta', 'https://eadn-wc01-3207080.nxedge.io/cdn/pub/media/catalog/product/cache/360x360/a/n/andrea-iannone-aprilia-motogp-2019-leather-suit-front-view.jpg', 'Tuta aprilia', 230.99),
  (49, 'Tuta', 'https://www.motostorm.it/images/products/large/tute/alpinestars_honda_gp_force_suit_rossoblu.jpg', 'Tuta honda', 430.99),
  (50, 'Tuta', 'https://www.gimoto.com/images/menu/6.png', 'Tuta ktm', 520.99),
  (51, 'Poster', '', 'Poster ducati', 21.99),
  (52, 'Poster', '', 'Poster yamaha', 12.99),
  (53, 'Poster', '', 'Poster aprilia', 20.99),
  (54, 'Poster', '', 'Poster honda', 11.99),
  (55, 'Poster', '', 'Poster ktm', 13.99),
  (56, 'Poster', '', 'Poster ducati', 15.99),
  (57, 'Poster', '', 'Poster yamaha', 18.99),
  (58, 'Poster', '', 'Poster aprilia', 8.99),
  (59, 'Poster', '', 'Poster honda', 19.99),
  (60, 'Poster', '', 'Poster ktm', 6.99),
  (71, 'Casco', '', 'Casco ducati', 399.99),
  (72, 'Casco', '', 'Casco yamaha', 280.99),
  (73, 'Casco', '', 'Casco aprilia', 120.99),
  (74, 'Casco', '', 'Casco honda', 230.99),
  (75, 'Casco', '', 'Casco ktm', 340.99),
  (76, 'Casco', '', 'Casco ducati', 520.99),
  (77, 'Casco', '', 'Casco yamaha', 360.99),
  (78, 'Casco', '', 'Casco aprilia', 280.99),
  (79, 'Casco', '', 'Casco honda', 350.99),
  (80, 'Casco', '', 'Casco ktm', 180.99),
  (81, 'Guanti', '', 'Guanti ducati', 110.99),
  (82, 'Guanti', '', 'Guanti yamaha', 70.99),
  (83, 'Guanti', '', 'Guanti aprilia', 81.99),
  (84, 'Guanti', '', 'Guanti honda', 24.99),
  (85, 'Guanti', '', 'Guanti ktm', 55.99),
  (86, 'Guanti', '', 'Guanti ducati', 99.99),
  (87, 'Guanti', '', 'Guanti yamaha', 36.99),
  (88, 'Guanti', '', 'Guanti aprilia', 44.99),
  (89, 'Guanti', '', 'Guanti honda', 61.99),
  (90, 'Guanti', '', 'Guanti ktm', 48.99);
  

  