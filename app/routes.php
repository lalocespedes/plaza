<?php

require INC_ROOT . '/app/routes/home.php';

require INC_ROOT . '/app/routes/auth/register.php';
require INC_ROOT . '/app/routes/auth/login.php';
require INC_ROOT . '/app/routes/auth/logout.php';
require INC_ROOT . '/app/routes/auth/activate.php';

require INC_ROOT . '/app/routes/auth/password/change.php';
require INC_ROOT . '/app/routes/auth/password/recover.php';
require INC_ROOT . '/app/routes/auth/password/reset.php';

require INC_ROOT . '/app/routes/errors/404.php';

require INC_ROOT . '/app/routes/users/all.php';

require INC_ROOT . '/app/routes/products/all.php';

#admin 
require INC_ROOT . '/app/routes/admin/products/products.php';
require INC_ROOT . '/app/routes/admin/products/save.php';

require INC_ROOT . '/app/routes/admin/categories/categories.php';
require INC_ROOT . '/app/routes/admin/categories/save.php';

#Cart
require INC_ROOT . '/app/routes/cart/cart.php';
require INC_ROOT . '/app/routes/cart/clear.php';
require INC_ROOT . '/app/routes/cart/add-item.php';