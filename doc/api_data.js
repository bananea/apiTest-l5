define({ "api": [
  {
    "description": "<p>Search restaurants on parameters: name, latitude, longitude, id, area_id, price, score, country_id, city, address, phone</p>",
    "type": "get",
    "url": "restaurants/search.json",
    "title": "Search restaurants",
    "name": "Search_restaurants",
    "success": {
      "examples": [
        {
          "title": "Success-Response: This is a truncate example of what the method returns",
          "content": "HTTP/1.1 200 OK\n{\n}",
          "type": "json"
        }
      ]
    },
    "parameter": {
      "examples": [
        {
          "title": "Request-Example:",
          "content": "{\n  ?name=the&sort=newestScore\n}",
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
