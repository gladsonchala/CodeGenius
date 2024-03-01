<?php
// Include the PHP Markdown Extra library
require 'vendor/autoload.php';

// Your Markdown content
$markdown = "
# Hello, Markdown Extra!

This is **bold** and _italic_ text.

```py
print('Hello, World!')
```

- Item 1
- Item 2
- Item 3

1. Item 1
2. Item 2
3. Item 3

**Link to Google:**

__[Google](https://www.google.com)__

// This is a blockquote.

[Google](https://www.google.com)

> This is a blockquote.

This is a table:

| Header 1 | Header 2 |
| ---------| ---------|
| Cell 1   | Cell 2   |

This is a code block:

``````````````````
<?php
echo 'Hello, World!';
?>
``````````````````


";

echo \Michelf\MarkdownExtra::defaultTransform($markdown);