<?php

for ($i=0; $i < 10; $i++) { 
    echo rand(1,500) % 2 == 0 ? "M" : "F";
}
