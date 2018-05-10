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

// data object
$obj = new DataObjectThingy(param1, param2);

// strings to be converted
$conversion = [
    '{{nonce}}' => wp_nonce_field('edit_location'),
    '{{city}}' => $obj->cityname,
    '{{state}}' => $obj->statename
];

// init the object
$t = new SimpleTemplating(dirname(__FILE__) . '/your_file.snippet.html', $conversion);

// echo to screen
echo $t->echo();
```

Errata
-
I built this for my own convience, take it and run with it. Please inspect source. Use at your own risk. Pull request and issues welcome. 
