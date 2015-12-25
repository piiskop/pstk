{
	"$schema": "http://json-schema.org/draft-04/schema#",
    "description": "Representation of a class",
    "type": "object",
    "required": ["startYear","studentCount"]
    "properties": {
    	"startYear": { "type": "integer" },
    	"studentList": {
    		"type": "array",
    		"maxItems": 30,
    		"items": {
    			"type": "string"
    		}
    	},
    	"teacherName": { "type": "string" }
    }
}