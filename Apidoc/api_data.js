define({ "api": [
  {
    "description": "<p>Search restaurants on parameters: name</p>",
    "type": "get",
    "url": "/search/filter?name=the&sort=popularity",
    "title": "Search restaurants",
    "name": "Search_restaurants",
    "success": {
      "examples": [
        {
          "title": "Success-Response: This is a truncate example of what the method returns",
          "content": "HTTP/1.1 200 OK\n{\n                [\n                   {\n                       \"id\": 98001302,\n                       \"name\": \"The Nighttest\",\n                       \"branch\": \"\",\n                       \"phone\": \"053-4307449\",\n                       \"email\": \"\",\n                       \"logo\": \"images\\/chains\\/nl\\/thuisbezorgdnl\\/logo.png\",\n                       \"address\": \"Lasondersingel\",\n                       \"housenumber\": \"94\",\n                       \"postcode\": \"7514BV\",\n                       \"city\": \"Niemandsland\",\n                       \"latitude\": \"52.2276290\",\n                       \"longitude\": \"6.8947505\",\n                       \"url\": \"thenighttest\",\n                       \"open\": 1,\n                       \"bestMatch\": 249,\n                       \"newestScore\": 824,\n                       \"ratingAverage\": 0,\n                       \"popularity\": 129,\n                       \"averageProductPrice\": 25,\n                       \"deliveryCosts\": 8.24,\n                       \"minimumOrderAmount\": 8.24\n                   },\n                   {\n                       \"id\": 98001225,\n                       \"name\": \"The Nightshop\",\n                       \"branch\": \"\",\n                       \"phone\": \"\",\n                       \"email\": \"private-email@takeaway.com\",\n                       \"logo\": \"\\/nl\\/R\\/logo.png\",\n                       \"address\": \"Lasondersingel\",\n                       \"housenumber\": \"94\",\n                       \"postcode\": \"7514BV\",\n                       \"city\": \"Enschede\",\n                       \"latitude\": \"52.2275177\",\n                       \"longitude\": \"6.8947028\",\n                       \"url\": \"thenightshopenschede\",\n                       \"open\": 2,\n                       \"bestMatch\": 242,\n                       \"newestScore\": 1731,\n                       \"ratingAverage\": 4,\n                       \"popularity\": 66,\n                       \"averageProductPrice\": 18.75,\n                       \"deliveryCosts\": 6.69,\n                       \"minimumOrderAmount\": 6.69\n                   },\n                   {\n                       \"id\": 98001322,\n                       \"name\": \"The Time\",\n                       \"branch\": \"\",\n                       \"phone\": \"020-6709301\",\n                       \"email\": \"\",\n                       \"logo\": \"\\/nl\\/003\\/logo.png\",\n                       \"address\": \"Tolstraat\",\n                       \"housenumber\": \"200\",\n                       \"postcode\": \"1074VN\",\n                       \"city\": \"Amsterdam\",\n                       \"latitude\": \"52.3530638\",\n                       \"longitude\": \"4.9074755\",\n                       \"url\": \"thetime\",\n                       \"open\": 0,\n                       \"bestMatch\": 167,\n                       \"newestScore\": 1026,\n                       \"ratingAverage\": 0,\n                       \"popularity\": 2,\n                       \"averageProductPrice\": 25,\n                       \"deliveryCosts\": 6.09,\n                       \"minimumOrderAmount\": 6.09\n                   }\n               ]\n}",
          "type": "json"
        }
      ]
    },
    "parameter": {
      "examples": [
        {
          "title": "Request-Example:",
          "content": "{\n  name=the \n  sort=newestScore -or any field from restaurant db , default bestMatch\n}",
          "type": "get"
        }
      ],
      "fields": {
        "GET": [
          {
            "group": "GET",
            "type": "String",
            "optional": true,
            "field": "name",
            "description": "<p>Restaurant name</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/search/filter?name=the&sort=popularity"
      }
    ],
    "version": "0.0.0",
    "filename": "C:/Takeaway/apiTest/app/Http/Controllers/SearchController.php",
    "group": "C__Takeaway_apiTest_app_Http_Controllers_SearchController_php",
    "groupTitle": "C__Takeaway_apiTest_app_Http_Controllers_SearchController_php"
  }
] });
