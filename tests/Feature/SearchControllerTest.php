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
         $response = $this->json('GET', 'api/v5.12.300/search/filter?RestaurantName=the&sort=averageProductPrice');
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

}
