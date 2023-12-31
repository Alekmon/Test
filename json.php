<?php
//json из примера
return '{
    "type": "container",
    "payload": {},
    "children": [
        {
            "type": "text",
            "payload": {
                "text": "Header"
            },
            "parameters": {
                "fontSize": "large",
                "textAlign": "center"
            }
        },
        {
            "type": "block",
            "payload": {},
            "children": [
                {
                    "type": "container",
                    "payload": {},
                    "children": [
                        {
                            "type": "button",
                            "payload": {
                                "link": {
                                    "type": "url",
                                    "payload": "https://ya.ru/"
                                },
                                "text": "Button"
                            },
                            "parameters": {
                                "size": "medium",
                                "style": "custom",
                                "textColor": "#FFFFFF",
                                "backgroundColor": "#00F0F0"
                            }
                        },                
			{
			    "type": "image",
			    "payload": {
				"link": null,
				"image": {
				    "id": 1,
				    "meta": {
				        "format": "PNG",
				        "width": 640,
				        "height": 360,
				        "filesize": 232.2
				    },
				    "url": "https://plans.72dom.online/plans/previews/medium/cf/86/cf8655d586df82194a90aeeed9d2039c.png"
				}
			    },
			    "parameters": {
				"zoom": false
			    }
			}
                    ],
                    "parameters": {}
                }
            ],
            "parameters": {
                "textAlign": "right"
            }
        }
    ],
    "parameters": {}
}';