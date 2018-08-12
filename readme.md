# Mamikos API

## Bussiness Process
MamiKos is an app where user can search for rooms that have been added by owner.
Also, user can ask about room availability using credit system. Regular user will have 20
credit and premium user will have 40 credit per month.

## STEP BY STEP

- Clone this repo.
- Run this command `php artisan key:generate` inside project folder.
- Open `.env` file. Replace the value `APP_KEY` with the generated key in previous step.
- Import the database `mamikosdb.sql`. it attached.
- And Go!

## API Documentation

###### CREATE ROOMS
> url (POST) : api/room/create

parameter
```
{
	"data" : 
	[
		{
			"ownerID"       : integer,
			"roomName"      : "string",
			"area"          : "string",
			"price"         : double,
			"address"       : "string",
			"city"          : "string",
			"totalRoom"     : integer,
			"availableRoom" : integer
		}
	]
}
```

###### UPDATE ROOM
> url (POST) : api/room/update

parameter
```
{
    "roomID"        : integer,
    "ownerID"       : integer,
	"roomName"      : "string",
	"area"          : "string",
	"price"         : double,
	"address"       : "string",
	"city"          : "string",
	"totalRoom"     : integer,
	"availableRoom" : integer
}
```

###### GET ALL ROOM
> url (GET) : api/room

###### GET ROOM DETAIL
> url (GET) : api/room/detail/{roomID}

###### GET ROOM BY SORTING FIELD
> url (GET) : api/room/{sortField}

###### GET ROOM BY SEARCH
> url (POST) : api/room

parameter
```
{
	"type"		: "string",
	"keyword"	: depend on type ("string" / integer)
}
```

###### DELETE ROOM
> url (GET) : api/room/delete/{roomID}

###### CHECK ROOM AVAILABILTY
> url (POST) : api/transaction/purchase

parameter
```
{
	"userID" : integer,
	"roomID" : integer,
}
```