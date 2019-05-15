### This snippet can be viewed in md viewer .

### I assume that handling authenticated used is handled through some api middleware class so i don't have to pass ids of user with every request
## A seller "Delicious bananas LTD" (id=899) adds a lot of 'Red Dacca' (cultivar) bananas, planted at Costa Rica and harvested July 27, 2018 and a total weight of 1500 kg and succeed.


> Request Body

```json
{
  "lot": {
    "cultivar": "Red Dacca",
    "country_id" : "costarica_country_id", // from countries table
    "weight": 1500,
    "harvest_date": "2018-07-27 09:29:06"
  }
}

```

> Response Body

```json
{
  "lot_it": "_9676a657"
}
```

### HTTP Request

`POST /api/lots/`

### HTTP Code

`200`


## "Delicious bananas LTD" adds a lot of 'Red Dacca' (cultivar) bananas, planted at Costa Rica and harvested 27th July, 2018 and a total weight of 500 kg, but a minimum weight allowed is 1000 kg


> Request Body

```json
{
  "lot": {
    "cultivar": "Red Dacca",
    "country_id" : "costarica_country_id", // from countries table
    "weight": 500,
    "harvest_date": "2018-07-27 09:29:06"
  }
}

```

> Response Body

```json
{
  "errors": [
      {
        "weight" : "minimum weight allowed is 1000 kg"
      }
  ]
}
```

### HTTP Request

`POST /api/lots/`

### HTTP Code

`422`


## "Delicious bananas LTD" changes harvesting date of created lot to June 14, 2018.

> Request Body

```json
{
  "lot": {
    "harvest_date": "2018-06-14 09:29:06"
  }
}

```

> Response Body

```json
{
  "lot_id": "_9676a657"
}
```

### HTTP Request

`PUT /api/lots/{id}`

### HTTP Code

`200`

## "Delicious bananas LTD" starts an auction on 04 Sep 2018 on the same lot with a cost $1.20/kg and duration 1 day.

> Request Body

```json
{
  "auction": {
    "start_date": "2018-09-04 09:29:06",
     "end_date": "2018-09-05 09:29:06",
     "cost_per_kg" : 1.20

  }
}

```

> Response Body

```json
{
  "auction_id": "_9676a657"
}
```

### HTTP Request

`POST /api/lots/auction`

### HTTP Code

`200`

## A buyer "German Retailer GmbH" (id=72) bids on the same lot with a price $1.21/kg

> Request Body

```json
{
  "bid": {
     "cost_per_kg" : 1.21

  }
}

```

> Response Body

```json
{
  "bid_id": "_9676a657"
}
```

### HTTP Request

`POST /api/auctions/{id}/bid`

### HTTP Code

`200`
G) "Delicious bananas LTD" wants to remove sold lot

> Request Body

```json

```

> Response Body

```json
{
  "success": true
}
```

### HTTP Request

`DELETE /api/lots/{id}`

### HTTP Code

`200`


## Delicious bananas LTD" wants to see a list of bids on his lot

> Request Body

```json

```

> Response Body

```json
{
  "bids": [
   {
      "user" : {
      "id" : "_231212",
      "name" : "john",
      "email" : "john@doe.com"
      },
      "cost_per_kg" : 2.2
    },
     {
        "user" : {
        "id" : "_2312sd",
        "name" : "Mai",
        "email" : "mai@doe.com"
        },
        "cost_per_kg" : 3.2
      }
  ]
}
```

### HTTP Request

`GET /api/lots/{id}/bids`

### HTTP Code

`200`