<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Controllers\SearchController;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SearchControllerTest extends TestCase {

    public function testSearch() {
        $response = $this->call('GET', '/search/filter?name=the&sort=newestSco2re');
        $this->assertEquals($response->status(), 200);
    }

    //this test should let us see the restaurant work with filter with name and  sorted by bestMatch
    public function testSearchMore() {
        $response = $this->json('GET', '/search/filter?name=the&sort=newestSco2re');
        $expected = '[
            {
                "id": 98001302,
                "name": "The Nighttest",
                "branch": "",
                "phone": "053-4307449",
                "email": "",
                "logo": "images\/chains\/nl\/thuisbezorgdnl\/logo.png",
                "address": "Lasondersingel",
                "housenumber": "94",
                "postcode": "7514BV",
                "city": "Niemandsland",
                "latitude": "52.2276290",
                "longitude": "6.8947505",
                "url": "thenighttest",
                "open": 1,
                "bestMatch": 249,
                "newestScore": 824,
                "ratingAverage": 0,
                "popularity": 129,
                "averageProductPrice": 25,
                "deliveryCosts": 8.24,
                "minimumOrderAmount": 8.24
            },
            {
                "id": 98001225,
                "name": "The Nightshop",
                "branch": "",
                "phone": "",
                "email": "private-email@takeaway.com",
                "logo": "\/nl\/R\/logo.png",
                "address": "Lasondersingel",
                "housenumber": "94",
                "postcode": "7514BV",
                "city": "Enschede",
                "latitude": "52.2275177",
                "longitude": "6.8947028",
                "url": "thenightshopenschede",
                "open": 2,
                "bestMatch": 242,
                "newestScore": 1731,
                "ratingAverage": 4,
                "popularity": 66,
                "averageProductPrice": 18.75,
                "deliveryCosts": 6.69,
                "minimumOrderAmount": 6.69
            },
            {
                "id": 98001322,
                "name": "The Time",
                "branch": "",
                "phone": "020-6709301",
                "email": "",
                "logo": "\/nl\/003\/logo.png",
                "address": "Tolstraat",
                "housenumber": "200",
                "postcode": "1074VN",
                "city": "Amsterdam",
                "latitude": "52.3530638",
                "longitude": "4.9074755",
                "url": "thetime",
                "open": 0,
                "bestMatch": 167,
                "newestScore": 1026,
                "ratingAverage": 0,
                "popularity": 2,
                "averageProductPrice": 25,
                "deliveryCosts": 6.09,
                "minimumOrderAmount": 6.09
            }
        ]';
        $response->assertStatus(200);
        $this->assertJsonStringEqualsJsonString($response->getContent(), $expected);
    }

    //This test should let us see the restaurants are sorted by averageProductPrice
    public function testSearchMoreWithPopularity() {
        $response = $this->json('GET', '/search/filter?name=the&sort=averageProductPrice');
        $expected = '[
            {
                "id": 98001302,
                "name": "The Nighttest",
                "branch": "",
                "phone": "053-4307449",
                "email": "",
                "logo": "images\/chains\/nl\/thuisbezorgdnl\/logo.png",
                "address": "Lasondersingel",
                "housenumber": "94",
                "postcode": "7514BV",
                "city": "Niemandsland",
                "latitude": "52.2276290",
                "longitude": "6.8947505",
                "url": "thenighttest",
                "open": 1,
                "bestMatch": 249,
                "newestScore": 824,
                "ratingAverage": 0,
                "popularity": 129,
                "averageProductPrice": 25,
                "deliveryCosts": 8.24,
                "minimumOrderAmount": 8.24
            },
            {
                "id": 98001322,
                "name": "The Time",
                "branch": "",
                "phone": "020-6709301",
                "email": "",
                "logo": "\/nl\/003\/logo.png",
                "address": "Tolstraat",
                "housenumber": "200",
                "postcode": "1074VN",
                "city": "Amsterdam",
                "latitude": "52.3530638",
                "longitude": "4.9074755",
                "url": "thetime",
                "open": 0,
                "bestMatch": 167,
                "newestScore": 1026,
                "ratingAverage": 0,
                "popularity": 2,
                "averageProductPrice": 25,
                "deliveryCosts": 6.09,
                "minimumOrderAmount": 6.09
            },
            {
                "id": 98001225,
                "name": "The Nightshop",
                "branch": "",
                "phone": "",
                "email": "private-email@takeaway.com",
                "logo": "\/nl\/R\/logo.png",
                "address": "Lasondersingel",
                "housenumber": "94",
                "postcode": "7514BV",
                "city": "Enschede",
                "latitude": "52.2275177",
                "longitude": "6.8947028",
                "url": "thenightshopenschede",
                "open": 2,
                "bestMatch": 242,
                "newestScore": 1731,
                "ratingAverage": 4,
                "popularity": 66,
                "averageProductPrice": 18.75,
                "deliveryCosts": 6.69,
                "minimumOrderAmount": 6.69
            }
            ]';
        $response->assertStatus(200);
        $this->assertJsonStringEqualsJsonString($response->getContent(), $expected);
    }

    //This should let us see that RestaurantName Search work for api v5.12.300
    public function testSearchWithVersionUrl() {
         $response = $this->json('GET', 'api/v5.12.300/search/filter?name=the&sort=averageProductPrice');
        $expected = '[
        {
            "id": 98001302,
            "RestaurantName": "The Nighttest",
            "branch": "",
            "phone": "053-4307449",
            "email": "",
            "logo": "images\/chains\/nl\/thuisbezorgdnl\/logo.png",
            "address": "Lasondersingel",
            "housenumber": "94",
            "postcode": "7514BV",
            "city": "Niemandsland",
            "latitude": "52.2276290",
            "longitude": "6.8947505",
            "url": "thenighttest",
            "open": 1,
            "bestMatch": 249,
            "newestScore": 824,
            "ratingAverage": 0,
            "popularity": 129,
            "averageProductPrice": 25,
            "deliveryCosts": 8.24,
            "minimumOrderAmount": 8.24
        },
        {
            "id": 98001322,
            "RestaurantName": "The Time",
            "branch": "",
            "phone": "020-6709301",
            "email": "",
            "logo": "\/nl\/003\/logo.png",
            "address": "Tolstraat",
            "housenumber": "200",
            "postcode": "1074VN",
            "city": "Amsterdam",
            "latitude": "52.3530638",
            "longitude": "4.9074755",
            "url": "thetime",
            "open": 0,
            "bestMatch": 167,
            "newestScore": 1026,
            "ratingAverage": 0,
            "popularity": 2,
            "averageProductPrice": 25,
            "deliveryCosts": 6.09,
            "minimumOrderAmount": 6.09
        },
        {
            "id": 98001225,
            "RestaurantName": "The Nightshop",
            "branch": "",
            "phone": "",
            "email": "private-email@takeaway.com",
            "logo": "\/nl\/R\/logo.png",
            "address": "Lasondersingel",
            "housenumber": "94",
            "postcode": "7514BV",
            "city": "Enschede",
            "latitude": "52.2275177",
            "longitude": "6.8947028",
            "url": "thenightshopenschede",
            "open": 2,
            "bestMatch": 242,
            "newestScore": 1731,
            "ratingAverage": 4,
            "popularity": 66,
            "averageProductPrice": 18.75,
            "deliveryCosts": 6.69,
            "minimumOrderAmount": 6.69
        }
        ]';
        $response->assertStatus(200);
        $this->assertJsonStringEqualsJsonString($response->getContent(), $expected);
    }
    
    //This test should let us see the restaurants are having open state =2
    public function testSearchMoreWithOpenState() {
        $response = $this->json('GET', '/search/filter?open=2');
        $expected = '[
            {
                "id": 98001312,
                "name": "Toko Oen",
                "branch": "",
                "phone": "015-2125665",
                "email": "",
                "logo": "\/nl\/07N\/logo.png",
                "address": "Van der Lelijstraat",
                "housenumber": "5a",
                "postcode": "2614EC",
                "city": "Delft",
                "latitude": "52.0092792",
                "longitude": "4.3382508",
                "url": "tokooen",
                "open": 2,
                "bestMatch": 384,
                "newestScore": 1623,
                "ratingAverage": 0,
                "popularity": 126,
                "averageProductPrice": 25,
                "deliveryCosts": 7.16,
                "minimumOrderAmount": 7.16
            },
            {
                "id": 98001259,
                "name": "Porto Ercole",
                "branch": "Pieter Calandlaan",
                "phone": "020-4106200",
                "email": "portoercolebv@gmail.com",
                "logo": "\/nl\/111\/logo.png",
                "address": "Pieter Calandlaan",
                "housenumber": "126",
                "postcode": "1068NR",
                "city": "Amsterdam",
                "latitude": "52.3549019",
                "longitude": "4.8109790",
                "url": "portoercolepietercalandlaan",
                "open": 2,
                "bestMatch": 357,
                "newestScore": 567,
                "ratingAverage": 7,
                "popularity": 53,
                "averageProductPrice": 7.47,
                "deliveryCosts": 3.61,
                "minimumOrderAmount": 3.61
            },
            {
                "id": 98001317,
                "name": "Piramiden of Gold",
                "branch": "",
                "phone": "0152124141",
                "email": "",
                "logo": "\/nl\/5QN\/logo.png",
                "address": "Brabantse Turfmarkt",
                "housenumber": "19",
                "postcode": "2611CL",
                "city": "Delft",
                "latitude": "52.0094015",
                "longitude": "4.3610341",
                "url": "piramidenofgold",
                "open": 2,
                "bestMatch": 351,
                "newestScore": 1260,
                "ratingAverage": 6,
                "popularity": 85,
                "averageProductPrice": null,
                "deliveryCosts": 9.76,
                "minimumOrderAmount": 9.76
            },
            {
                "id": 98001275,
                "name": "Pizza Tonno",
                "branch": "",
                "phone": "020-6185877",
                "email": "",
                "logo": "\/nl\/R51\/logo.png",
                "address": "Jan van Galenstraat",
                "housenumber": "202-204",
                "postcode": "1056ck",
                "city": "Amsterdam",
                "latitude": "52.3725777",
                "longitude": "4.8475527",
                "url": "pizzatonno",
                "open": 2,
                "bestMatch": 344,
                "newestScore": 1184,
                "ratingAverage": 0,
                "popularity": 77,
                "averageProductPrice": 25,
                "deliveryCosts": 1.32,
                "minimumOrderAmount": 1.32
            },
            {
                "id": 98001281,
                "name": "La Rosa",
                "branch": "Hoofddorp",
                "phone": "023-5554426",
                "email": "rahim.mn@gmail.com",
                "logo": "\/nl\/771\/logo.png",
                "address": "Tussenweg",
                "housenumber": "41",
                "postcode": "2132CS",
                "city": "Hoofddorp",
                "latitude": "52.3036054",
                "longitude": "4.6954293",
                "url": "larosa",
                "open": 2,
                "bestMatch": 335,
                "newestScore": 940,
                "ratingAverage": 7,
                "popularity": 28,
                "averageProductPrice": 8.76,
                "deliveryCosts": 9.57,
                "minimumOrderAmount": 9.57
            },
            {
                "id": 98001234,
                "name": "Valentino",
                "branch": "Utrecht",
                "phone": "030-2936768",
                "email": "pizzavalentino@live.nl",
                "logo": "\/nl\/P3\/logo.png",
                "address": "Jan Pieterszoon Coenstraat",
                "housenumber": "82a",
                "postcode": "3531EX",
                "city": "Utrecht",
                "latitude": "52.0925068",
                "longitude": "5.0968962",
                "url": "pizzeriavalentinoutrecht",
                "open": 2,
                "bestMatch": 318,
                "newestScore": 1008,
                "ratingAverage": 9,
                "popularity": 72,
                "averageProductPrice": 13.8,
                "deliveryCosts": 7.13,
                "minimumOrderAmount": 7.13
            },
            {
                "id": 98001309,
                "name": "Kerklaan Express",
                "branch": "Amsterdam",
                "phone": "020-4214939",
                "email": "",
                "logo": "\/nl\/1PN\/logo.png",
                "address": "Plantage Muidergracht",
                "housenumber": "69",
                "postcode": "1018TM",
                "city": "Amsterdam",
                "latitude": "52.3655630",
                "longitude": "4.9108390",
                "url": "kerklaanexpressamsterdam",
                "open": 2,
                "bestMatch": 315,
                "newestScore": 2648,
                "ratingAverage": 7,
                "popularity": 35,
                "averageProductPrice": null,
                "deliveryCosts": 6.44,
                "minimumOrderAmount": 6.44
            },
            {
                "id": 98001228,
                "name": "Brasserie Meerzicht voor Bedrijven",
                "branch": "",
                "phone": "",
                "email": "",
                "logo": "zoetermeer_meerzicht.jpg",
                "address": "Middelwaard",
                "housenumber": "86",
                "postcode": "2716CW",
                "city": "Zoetermeer",
                "latitude": "52.0561139",
                "longitude": "4.4688796",
                "url": "brasseriemeerzichtvoorbedrijven",
                "open": 2,
                "bestMatch": 314,
                "newestScore": 2833,
                "ratingAverage": 0,
                "popularity": 84,
                "averageProductPrice": 25,
                "deliveryCosts": 1.76,
                "minimumOrderAmount": 1.76
            },
            {
                "id": 98001278,
                "name": "Broodje Gesmeerd",
                "branch": "Zwarte Woud",
                "phone": "030-2801293",
                "email": "info@broodjegesmeerd.nl",
                "logo": "\/nl\/QP1\/logo.png",
                "address": "Zwarte Woud",
                "housenumber": "232",
                "postcode": "3524SL",
                "city": "Utrecht",
                "latitude": "52.0628827",
                "longitude": "5.1428522",
                "url": "broodjegesmeerd",
                "open": 2,
                "bestMatch": 312,
                "newestScore": 301,
                "ratingAverage": 9,
                "popularity": 54,
                "averageProductPrice": null,
                "deliveryCosts": 9.19,
                "minimumOrderAmount": 9.19
            },
            {
                "id": 98001261,
                "name": "Rotibode",
                "branch": "",
                "phone": "070-3235680",
                "email": "rotibode10@gmail.com",
                "logo": "\/nl\/711\/logo.png",
                "address": "Escamplaan",
                "housenumber": "1",
                "postcode": "2547GA",
                "city": "Den Haag",
                "latitude": "52.0654330",
                "longitude": "4.2790270",
                "url": "rotibodedenhaag",
                "open": 2,
                "bestMatch": 302,
                "newestScore": 2743,
                "ratingAverage": 7,
                "popularity": 80,
                "averageProductPrice": null,
                "deliveryCosts": 6.39,
                "minimumOrderAmount": 6.39
            },
            {
                "id": 98001240,
                "name": "Signore Pizza",
                "branch": "",
                "phone": "010-2200114",
                "email": "signorepizza@outlook.com",
                "logo": "\/nl\/O5\/logo.png",
                "address": "Rietdekkerweg",
                "housenumber": "131",
                "postcode": "3068GW",
                "city": "Rotterdam",
                "latitude": "51.9652960",
                "longitude": "4.5717836",
                "url": "signorepizza",
                "open": 2,
                "bestMatch": 299,
                "newestScore": 2175,
                "ratingAverage": 7,
                "popularity": 91,
                "averageProductPrice": 12.37,
                "deliveryCosts": 5.9,
                "minimumOrderAmount": 5.9
            },
            {
                "id": 98001241,
                "name": "Bella Pronto",
                "branch": "",
                "phone": "053-4805860",
                "email": "thomas.bouwels@takeaway.com, foo@bar.nl",
                "logo": "\/nl\/75\/logo.png",
                "address": "Hengelosestraat",
                "housenumber": "705",
                "postcode": "7521PA",
                "city": "Enschedeeeeeee",
                "latitude": "52.2348270",
                "longitude": "6.8588192",
                "url": "bellaprontoenschede",
                "open": 2,
                "bestMatch": 282,
                "newestScore": 1123,
                "ratingAverage": 0,
                "popularity": 5,
                "averageProductPrice": 25,
                "deliveryCosts": 2.64,
                "minimumOrderAmount": 2.64
            },
            {
                "id": 98001227,
                "name": "Brasserie Meerzicht",
                "branch": "",
                "phone": "079-3512957",
                "email": "info@brasseriemeerzicht.nl",
                "logo": "\/nl\/51\/logo.png",
                "address": "Middelwaard",
                "housenumber": "86",
                "postcode": "2716CW",
                "city": "Zoetermeer",
                "latitude": "52.0560070",
                "longitude": "4.4691330",
                "url": "brasseriemeerzicht",
                "open": 2,
                "bestMatch": 274,
                "newestScore": 1589,
                "ratingAverage": 9,
                "popularity": 133,
                "averageProductPrice": null,
                "deliveryCosts": 8.14,
                "minimumOrderAmount": 8.14
            },
            {
                "id": 98001251,
                "name": "India Glory",
                "branch": "",
                "phone": "070-3858661",
                "email": "lak2010@live.nl, indiaglory@hotmail.com",
                "logo": "\/nl\/7Q\/logo.png",
                "address": "2e Louise de Colignystraat",
                "housenumber": "24",
                "postcode": "2595SR",
                "city": "Den Haag",
                "latitude": "52.0817361",
                "longitude": "4.3380984",
                "url": "restaurantindiaglory",
                "open": 2,
                "bestMatch": 257,
                "newestScore": 151,
                "ratingAverage": 7,
                "popularity": 98,
                "averageProductPrice": null,
                "deliveryCosts": 1.21,
                "minimumOrderAmount": 1.21
            },
            {
                "id": 98001225,
                "name": "The Nightshop",
                "branch": "",
                "phone": "",
                "email": "private-email@takeaway.com",
                "logo": "\/nl\/R\/logo.png",
                "address": "Lasondersingel",
                "housenumber": "94",
                "postcode": "7514BV",
                "city": "Enschede",
                "latitude": "52.2275177",
                "longitude": "6.8947028",
                "url": "thenightshopenschede",
                "open": 2,
                "bestMatch": 242,
                "newestScore": 1731,
                "ratingAverage": 4,
                "popularity": 66,
                "averageProductPrice": 18.75,
                "deliveryCosts": 6.69,
                "minimumOrderAmount": 6.69
            },
            {
                "id": 98001311,
                "name": "Steakhouse Pizzeria De Nijl",
                "branch": "",
                "phone": "030-6090200",
                "email": "a.nazeer2@hotmail.com",
                "logo": "\/nl\/7PN\/logo.png",
                "address": "Herenstraat",
                "housenumber": "42",
                "postcode": "3431CW",
                "city": "Nieuwegein",
                "latitude": "52.0364804",
                "longitude": "5.0940207",
                "url": "denijlnieuwegein",
                "open": 2,
                "bestMatch": 222,
                "newestScore": 1488,
                "ratingAverage": 7,
                "popularity": 36,
                "averageProductPrice": 8.94,
                "deliveryCosts": 9.71,
                "minimumOrderAmount": 9.71
            },
            {
                "id": 98001258,
                "name": "Rick\'s Ontbijtservice",
                "branch": "",
                "phone": "030-2440225",
                "email": "",
                "logo": "\/nl\/Q01\/logo.png",
                "address": "Manitobadreef",
                "housenumber": "5",
                "postcode": "3565CH",
                "city": "Utrecht",
                "latitude": "52.1286692",
                "longitude": "5.0839427",
                "url": "ricksontbijtservice",
                "open": 2,
                "bestMatch": 219,
                "newestScore": 1057,
                "ratingAverage": 0,
                "popularity": 82,
                "averageProductPrice": 25,
                "deliveryCosts": 0.87,
                "minimumOrderAmount": 0.87
            },
            {
                "id": 98001223,
                "name": "La Gondolina",
                "branch": "",
                "phone": "0641079539",
                "email": "info@lagondolina.nl",
                "logo": "\/nl\/3\/logo.png",
                "address": "Karperweg",
                "housenumber": "3 hs",
                "postcode": "1075LA",
                "city": "Amsterdam",
                "latitude": "52.3486912",
                "longitude": "4.8570568",
                "url": "lagondolina",
                "open": 2,
                "bestMatch": 218,
                "newestScore": 1685,
                "ratingAverage": 9,
                "popularity": 91,
                "averageProductPrice": 10.93,
                "deliveryCosts": 6.57,
                "minimumOrderAmount": 6.57
            },
            {
                "id": 98001263,
                "name": "Surakarta Express",
                "branch": "",
                "phone": "071-5123524",
                "email": "bartdeboer@planet.nl",
                "logo": "\/nl\/3N1\/logo.png",
                "address": "Noordeinde",
                "housenumber": "51",
                "postcode": "2311CB",
                "city": "Leiden",
                "latitude": "52.1602292",
                "longitude": "4.4844306",
                "url": "surakartaexpress",
                "open": 2,
                "bestMatch": 208,
                "newestScore": 3001,
                "ratingAverage": 8,
                "popularity": 134,
                "averageProductPrice": null,
                "deliveryCosts": 8.94,
                "minimumOrderAmount": 8.94
            },
            {
                "id": 98001280,
                "name": "Pizza Boy Amsterdam",
                "branch": "",
                "phone": "020-4888888",
                "email": "a.ozaydinli@outlook.com",
                "logo": "\/nl\/O71\/logo.png",
                "address": "Spaarndammerstraat",
                "housenumber": "62",
                "postcode": "1013SZ",
                "city": "Amsterdam",
                "latitude": "52.3879592",
                "longitude": "4.8807286",
                "url": "pizzaboyamsterdam",
                "open": 2,
                "bestMatch": 196,
                "newestScore": 107,
                "ratingAverage": 9,
                "popularity": 29,
                "averageProductPrice": 15.58,
                "deliveryCosts": 1.39,
                "minimumOrderAmount": 1.39
            },
            {
                "id": 98001316,
                "name": "De Rijsttafel",
                "branch": "Delft",
                "phone": "015-2855111",
                "email": "anke_wang@hotmail.com",
                "logo": "\/nl\/NQN\/logo.png",
                "address": "Minervaweg",
                "housenumber": "4",
                "postcode": "2624BZ\u00a0",
                "city": "Delft",
                "latitude": "51.9967350",
                "longitude": "4.3557810",
                "url": "derijsttafeldelft",
                "open": 2,
                "bestMatch": 183,
                "newestScore": 2066,
                "ratingAverage": 9,
                "popularity": 89,
                "averageProductPrice": null,
                "deliveryCosts": 9.3,
                "minimumOrderAmount": 9.3
            },
            {
                "id": 98001231,
                "name": "Nan King",
                "branch": "",
                "phone": "030-2733149",
                "email": "",
                "logo": "\/nl\/7N\/logo.png",
                "address": "Bollenhofsestraat",
                "housenumber": "142",
                "postcode": "3572VT",
                "city": "Utrecht",
                "latitude": "52.0988885",
                "longitude": "5.1353035",
                "url": "nanking",
                "open": 2,
                "bestMatch": 177,
                "newestScore": 2072,
                "ratingAverage": 0,
                "popularity": 99,
                "averageProductPrice": 25,
                "deliveryCosts": 0.43,
                "minimumOrderAmount": 0.43
            },
            {
                "id": 98001256,
                "name": "Dalia",
                "branch": "",
                "phone": "053-4355737",
                "email": "",
                "logo": "\/nl\/N01\/logo.png",
                "address": "Haaksbergerstraat",
                "housenumber": "346",
                "postcode": "7513EJ",
                "city": "Enschede",
                "latitude": "52.2118185",
                "longitude": "6.8801200",
                "url": "daliaenschede",
                "open": 2,
                "bestMatch": 172,
                "newestScore": 1777,
                "ratingAverage": 0,
                "popularity": 33,
                "averageProductPrice": 25,
                "deliveryCosts": 4.57,
                "minimumOrderAmount": 4.57
            },
            {
                "id": 98001229,
                "name": "Pizza Bella Napoli",
                "branch": "",
                "phone": "079-3169221",
                "email": "Kurmandj2@hotmail.com",
                "logo": "\/nl\/1N\/logo.png",
                "address": "Edisonstraat",
                "housenumber": "11F",
                "postcode": "2723RS",
                "city": "Zoetermeer",
                "latitude": "52.0634196",
                "longitude": "4.5232861",
                "url": "pizzabellanapolizoetermeer",
                "open": 2,
                "bestMatch": 169,
                "newestScore": 618,
                "ratingAverage": 8,
                "popularity": 48,
                "averageProductPrice": 10.56,
                "deliveryCosts": 4.4,
                "minimumOrderAmount": 4.4
            },
            {
                "id": 98001287,
                "name": "Manli",
                "branch": "",
                "phone": "020-4713010",
                "email": "",
                "logo": "\/nl\/5R1\/logo.png",
                "address": "Hobbemakade",
                "housenumber": "72",
                "postcode": "1071XM",
                "city": "Amsterdam",
                "latitude": "52.3535653",
                "longitude": "4.8862572",
                "url": "manliamsterdam",
                "open": 2,
                "bestMatch": 162,
                "newestScore": 1842,
                "ratingAverage": 0,
                "popularity": 64,
                "averageProductPrice": 25,
                "deliveryCosts": 2.67,
                "minimumOrderAmount": 2.67
            },
            {
                "id": 98001237,
                "name": "Classic Pizza",
                "branch": "Rotterdam",
                "phone": "010-4655080",
                "email": "reza-rezai@live.nl",
                "logo": "\/nl\/5O\/logo.png",
                "address": "Schieweg",
                "housenumber": "92a",
                "postcode": "3038BB",
                "city": "Rotterdam",
                "latitude": "51.9324600",
                "longitude": "4.4662701",
                "url": "classicpizzarotterdam-1",
                "open": 2,
                "bestMatch": 159,
                "newestScore": 313,
                "ratingAverage": 8,
                "popularity": 136,
                "averageProductPrice": 12.85,
                "deliveryCosts": 8.98,
                "minimumOrderAmount": 8.98
            },
            {
                "id": 98001262,
                "name": "Pizza Pita Center",
                "branch": "",
                "phone": "030\/ 227 18 66",
                "email": "",
                "logo": "\/nl\/0N1\/logo.png",
                "address": "",
                "housenumber": "",
                "postcode": "",
                "city": "Utrecht",
                "latitude": null,
                "longitude": null,
                "url": "pizzapitacenter",
                "open": 2,
                "bestMatch": 135,
                "newestScore": 2291,
                "ratingAverage": 0,
                "popularity": 66,
                "averageProductPrice": 25,
                "deliveryCosts": 5.62,
                "minimumOrderAmount": 5.62
            },
            {
                "id": 98001306,
                "name": "Jeruzalem",
                "branch": "Delft",
                "phone": "015-2124141",
                "email": "zico64@hotmail.com",
                "logo": "\/nl\/N5N\/logo.png",
                "address": "Choorstraat",
                "housenumber": "31",
                "postcode": "2611JE",
                "city": "Delft",
                "latitude": "52.0130556",
                "longitude": "4.3580824",
                "url": "jeruzalemdelftdelft",
                "open": 2,
                "bestMatch": 132,
                "newestScore": 401,
                "ratingAverage": 8,
                "popularity": 49,
                "averageProductPrice": null,
                "deliveryCosts": 1.05,
                "minimumOrderAmount": 1.05
            },
            {
                "id": 98001250,
                "name": "Bel Pizza",
                "branch": "Den Haag",
                "phone": "070-3640123",
                "email": "info@delekkerstepizza.nl",
                "logo": "\/nl\/OQ\/logo.png",
                "address": "Weimarstraat",
                "housenumber": "47",
                "postcode": "2562GP",
                "city": "Den Haag",
                "latitude": "52.0776020",
                "longitude": "4.2846140",
                "url": "belpizzadenhaag",
                "open": 2,
                "bestMatch": 123,
                "newestScore": 1104,
                "ratingAverage": 6,
                "popularity": 88,
                "averageProductPrice": 12.64,
                "deliveryCosts": 6.36,
                "minimumOrderAmount": 6.36
            },
            {
                "id": 98001265,
                "name": "Porto Ercole & Grieks",
                "branch": "",
                "phone": "020-4287444",
                "email": "uzunal@live.nl",
                "logo": "\/nl\/RN1\/logo.png",
                "address": "Pieter Vlamingstraat",
                "housenumber": "11",
                "postcode": "1093AA",
                "city": "Amsterdam",
                "latitude": "52.3648701",
                "longitude": "4.9259498",
                "url": "portogriekweteringstraat",
                "open": 2,
                "bestMatch": 110,
                "newestScore": 1936,
                "ratingAverage": 6,
                "popularity": 15,
                "averageProductPrice": 7.97,
                "deliveryCosts": 2.47,
                "minimumOrderAmount": 2.47
            },
            {
                "id": 98001320,
                "name": "Pizza Line",
                "branch": "",
                "phone": "020-6709301",
                "email": "",
                "logo": "\/nl\/ORN\/logo.png",
                "address": "",
                "housenumber": "",
                "postcode": "",
                "city": "Amsterdam",
                "latitude": null,
                "longitude": null,
                "url": "pizzaline",
                "open": 2,
                "bestMatch": 105,
                "newestScore": 818,
                "ratingAverage": 0,
                "popularity": 43,
                "averageProductPrice": 25,
                "deliveryCosts": 2.84,
                "minimumOrderAmount": 2.84
            },
            {
                "id": 98001248,
                "name": "Angelo\'s Pizza",
                "branch": "",
                "phone": "010-4844411",
                "email": "info@angelospizza.nl",
                "logo": "\/nl\/Q7\/logo.png",
                "address": "Hilledijk",
                "housenumber": "289b",
                "postcode": "3074GD",
                "city": "Rotterdam",
                "latitude": "51.8978842",
                "longitude": "4.5097880",
                "url": "angelospizzaservice",
                "open": 2,
                "bestMatch": 100,
                "newestScore": 1945,
                "ratingAverage": 9,
                "popularity": 32,
                "averageProductPrice": 8.44,
                "deliveryCosts": 4.88,
                "minimumOrderAmount": 4.88
            }
       ]';
        $response->assertStatus(200);
        $this->assertJsonStringEqualsJsonString($response->getContent(), $expected);
    }
}
