<?php

// cookie arguments: name, value, expiry, path, domain, security (1 or 0, 1 can only be sent through safe https requests)

setcookie("name", "John Doe", time()+3600, "/", 0);
setcookie("age", "33", time()+3600, "/", 0);

if(isset($_COOKIE["name"])) {
  echo "Welcome " . $_COOKIE["name"];
}
else {
  echo "Sorry... not recognized.";
}

// delete cookies by setting their expiry to past dates, eg. time()-60

 ?>
