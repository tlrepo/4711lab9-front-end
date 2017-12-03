# package-restful

Phil Sturgeon's (old) REST server libraries & controller, packaged for CodeIgniter.

To use, copy the source into your project, so that "restful" ends up inside the 
"third_party" folder of your application.

Then add the package path to your config/.autoload...
    
    $autoload['packages'] = array(APPPATH.'third_party/restful/');

##Method remapping

Incoming requests are remapped automatically, to a method named after the
apparent requested method from the requests's URI segments, followed by an
underscore and the HTTP verb type.

For instance, a GET to <code>http://example.com/rest</code>
would remap to <code>index_get()</code> inside the <code>Rest</code> controller.
A POST request to <code>http://example.com/rest/item/2</code> would remap to
<code>item_post()</code> inside the controller, and it isn't clear to me what would be done 
with the "2".

##Passing parameters to the REST controller

Parameters can be passed in a number of ways, all at the same time.
The possible named parameters are extracted into a single collection,
which is then available to the controller.

- for a POST or PUT, parameters can be passed as key/calue pairs inside the 
message payload; these would be added to those form a form submission
- for any HTTP type, messages can be passed as query parameters,
as part of the URL
- for any HTTP type, key/value pairs can be passed as URI segment pairs,
after the method name; it isn't clear what happens with an odd number of segments
after the method name

So, the parameter "name" with the value "jim" could be passed as
- name=jim in the payload, or
- ...?name=jim as a URI query string, or
- .../name/jim in the URI 

##Specifying the response format

The response format desired can be specified in a number of ways. 
In priority order:

- as an apparent file extension in the last URI segment, eg. work/item/123.xml or work/item/123.json
- as a "format" parameter, passed per above
- as an HTTP-ACCEPT header attribute
- otherwise, using the default format in the package config file.

##Putting it together...

If you want to pass an "id" parameter, with the value "123", and you want
the response in "json", you could do that with any of:

- /controller/item/id/123.json
- /controller/item/id/123/format/json
- /controller/item?id=123&format=json

These would be available to the item_VERB() using $this->get("id"), $this->post("id")
or $this->put("id"), or $this->delete("id"), depending on the HTTP verb type.

#Disclaimer

This package is version 2.6.1 of Phil's package.

The work continues at https://github.com/chriskacerguis/codeigniter-restserver.
The package there is up to v2.7.3, and has a number of enhancements.