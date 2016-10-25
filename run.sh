#!/bin/sh
service redis-server start
/usr/bin/lynx -source http://127.0.0.1/JudgeOnline/xtb/rank/run.php
