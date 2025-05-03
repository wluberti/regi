<?php
echo 'Writable? ' . (is_writable(__DIR__) ? 'yes' : 'no') . "<br>";
echo 'File exists? ' . (file_exists(__DIR__ . '/users.db') ? 'yes' : 'no') . "<br>";


 phpinfo(); ?>