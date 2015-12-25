{
	"$schema": "http://json-schema.org/draft-04/schema#",
	"title": "car",
	"description": "Attributes of car",
	"type": "object",
	"required": [ "model", "color" ],
	"properties": {
		"model": {
			"type": "string"
		},
		"firstRegistration": {
			"format": "date-time",
		},
		"model": { 
			"type": "string"
		},
		
		"power": {
			"allOf": [
				{"type": "number"},
				{"maxLength": 4}
			]
		}
	}
}
