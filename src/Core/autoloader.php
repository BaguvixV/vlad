<?php

spl_autoload_register(callback: function ($className): void {

   $className = str_replace(search: "\\", replace: DIRECTORY_SEPARATOR, subject: $className);

   $res = require base_path(path: "src/{$className}.php");
});