Simple Templating for Wordpress plugins developers
=

Rather than closing and reopening `<?php`  `?>` tags or stuffing everything into one variable to later `echo` it out. This method first sets up a HTML snippet file such as:

_html snippet file_
```
<!--
<form action="" method="post">
   {{nonce}}
   <input name="city" value="{{city}}">
   <input name="state" value="{{state}}">
    .
    .
    .
 </form>

```

_php snippet to call and apply values_
```

// Data object. This could be anything -- an API, database, remote request. 
$obj = new DataObjectThingy(param1, param2);

// First, set up an array of PLACEHOLDERS and REPLACEMENT 
// VALUES will be applied to the conversion
$conversion = [
    '{{nonce}}' => wp_nonce_field('edit_location'),
    '{{city}}' => $obj->cityname,
    '{{state}}' => $obj->statename
];

// Second, Init the object by giving it the snippet file location and the conversion array.
$t = new SimpleTemplating(dirname(__FILE__) . '/your_file.snippet.html', $conversion);

// Finally, Echo to screen
echo $t->echo();
```

Errata
-
I built this for my own convience, take it and run with it. Please inspect source. Use at your own risk. Pull request and issues welcome. 
