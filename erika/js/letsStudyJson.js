/**
 * 
 */



//creating players user account in DiscGolf app
{
  "type": "object",
    "properties": {
      "name":      { "type": "string", "maxLength": 25},
      "username":  { "type": "string", "maxLength": 25},
      "email":     { "type": "string" },

  },
  "required": ["name", "email"],
  "additionalProperties": { "type": "string" }
}

//searching courses in DiscGolf app
{
	"type": "object",
	  "properties": {
	    "coursename":      { "type": "string" },
	    "nrOfTracks":	 { "type": "integer" },
	    "address":     { "type": "string" },
	  },
    "required": ["address"],
    "dependencies": {
        "coursename": ["nrOfTracks"],
        "nrOfTracks": ["coursename"]
      }
}


//marking scores in DiscGolf app
{
	"type": "object",
	  "properties": {
	    "coursename":{ "type": "string" },
	    "tracknr":	 { "type": "integer" },
	    "throwsnr":  { "type": "integer", "maximum": 99},
	  },
	  "additionalProperties": false
	}

