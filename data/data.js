
// Les jardins municipaux de LGC
// https://www.lagarennecolombes.fr/index.php/Parcs-et-jardins-municipaux?idpage=6045
let jardins = [
   {lat: 48.9082, lng: 2.2403, nom: "square Jean-Boiselle"},
   {lat: 48.9037, lng: 2.2451, nom: "square Jean-Nicolas-Corvisart"},
   {lat: 48.9069, lng: 2.2486, nom: "square de l'ancienne Bibliothèque"},
   {lat: 48.9070, lng: 2.2456, nom: "parc de l'Hôtel de Ville"},
   {lat: 48.9112, lng: 2.2533, nom: "parc Wangen im Allgäu"},
   {lat: 48.9052, lng: 2.2368, nom: "jardin de Yoqneam"},
   {lat: 48.9082, lng: 2.2513, nom: "square Jean-Jerphanion"},
   {lat: 48.9063, lng: 2.2335, nom: "jardin de La Sablière"},
   {lat: 48.9130, lng: 2.2560, nom: "square Guy-Môquet"},
   {lat: 48.9037, lng: 2.2328, nom: "square des Bleuets"},
   {lat: 48.9035, lng: 2.2443, nom: "square Aimé-Heitzmann"},
   {lat: 48.9033, lng: 2.2476, nom: "square Jeanne d'Arc-Ridel"},
   {lat: 48.9055, lng: 2.2347, nom: "esplanade de Clarksville"},
   {lat: 48.9051, lng: 2.2354, nom: "jardin Bonnin"}
];

// Équipements sportifs de LGC
// https://www.lagarennecolombes.fr/index.php/Complexes-sportifs?idpage=6183
let sportifs = [
   {lat: 48.9059, lng: 2.2318, nom: "Nelson Mandela"},
   {lat: 48.9020, lng: 2.2285, nom: "Marcel Payen"},
   {lat: 48.9056, lng: 2.2428, nom: "Claude Chedal Anglay"},
   {lat: 48.9074, lng: 2.2566, nom: "Pierre Denis"},
   {lat: 48.9054, lng: 2.2439, nom: "Piscine Municipale"}
];

// Petit voyage : LGC, Bruxelles, Londres, Pau, Albiez-le-Vieux, Bayern
let etapes = [[48.9064, 2.2483], [50.845, 4.35], [51.5007, -0.1267], [43.2949, -0.3756], [45.2132, 6.3837], [48.9468, 11.4039]];


// https://fr.wikipedia.org/wiki/Centre_de_la_France
// https://www.coordonnees-gps.fr/conversion-coordonnees-gps
let centreFR = { lat: 46.7603, lng:2.4255 };
let franceCentres = [
   // Barycentres
   {coords: [46.76032, 2.425503], dms: '46° 45′ 47″ N, 2° 25′ 29″ E', nom: "Bruère-Allichamps", cercle: 0},
   {coords: [46.759216, 2.401144], dms: '46° 45′ 34″ N, 2° 24′ 04″ E', nom: "Farges-Allichamps", cercle: 0},
   {coords: [46.721435, 2.510088], dms: '46° 43′ 17″ N, 2° 30′ 37″ E', nom: "Saint-Amand-Montrond", cercle: 0},
   {coords: [46.606227, 2.498464], dms: '46° 36′ 21″ N, 2° 29′ 54″ E', nom: "Saulzais-le-Potier", cercle: 0},
   {coords: [46.5395274, 2.4301044], dms: '46° 32′ 23″ N, 2° 25′ 49″ E', nom: "Vesdun", cercle: 0},
   {coords: [46.483784, 2.526173], dms: '46° 29′ 01″ N, 2° 31′ 35″ E', nom: "Chazemais", cercle: 0},
   {coords: [46.3738529, 2.4774161], dms: '46° 22′ 26″ N, 2° 28′ 39″ E', nom: "Huriel", cercle: 0},
   {coords: [46.4936065, 2.6029695], dms: '46° 29′ 38″ N, 2° 36′ 10″ E', nom: "Nassigny", cercle: 0},
   // Centre du cercle minimum
   {coords: [46.6055983, 1.8750922], dms: '46° 36′ 22″ N, 1° 52′ 31″ E', nom: "Tranzault", cercle: 543.7},
   // Centre du plus grand cercle inclus
   {coords: [47.262223, 2.422246], dms: '47° 15′ 39″ N, 2° 25′ 08″ E', nom: "Saint-Palais", cercle: 291.3}
];
