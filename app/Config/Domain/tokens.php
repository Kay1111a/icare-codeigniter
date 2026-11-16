<?php
return ['expiration' => (int) env('TOKEN_EXPIRATION', env('SANCTUM_EXPIRATION', 480))];
