<?php

// Session handler singleton

return [
   'Native' => Web\Session\NativeSession::class,
   'PDO' => Web\Session\PDOSession::class
];