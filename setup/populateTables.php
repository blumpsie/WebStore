<?php

chdir(__DIR__);
require_once "../include/db.php";

echo "\n---- database = ", DBProps::which, "\n";

R::begin();  // start tranaction

//==================================================
echo "\n---- users\n";

// name, email, password, for simplicity password = name
$user_data = [
    ["john", "arachnid@oracle.com", "john"],
    ["kirsten", "buffalo@go.com", "kirsten"],
    ["bill", "digger@gmail.com", "bill"],
    ["mary", "elephant@wcupa.edu", "mary"],
    ["joan", "kangaroo@upenn.edu", "joan"],
    ["alice", "feline@yahoo.com", "alice"],
    ["carla", "badger@esu.edu", "carla"],
    ["dave", "warthog@temple.edu", "dave"],
];

foreach ($user_data as $data) {
  list($username, $email, $password) = $data;
  $user = R::dispense('user');
  $user->name = $username;
  $user->email = $email;
  $user->password = hash('sha256', $password);
  $user->is_admin = false;
  try {
    $id = R::store($user);
    echo "$id: $username\n";
  }
  catch (Exception $ex) {
    echo $ex->getMessage(), "\n";
  }
}

//==================================================
echo "\n---- admins\n";
foreach (['dave', 'carla'] as $name) {
  $user = R::findOne('user', 'name = ?', [$name]);
  $user->is_admin = true;
  R::store($user);
  echo "admin: $name\n";
}

//==================================================
echo "\n---- categories\n\n";

foreach ([
'video-audio',
 'copy-scan',
 'storage',
 'voice',
 'computer',
 'network',
 'calculator',
 'printer',
 'camera',
# 'accessory',
]
as $name) {
  $category = R::dispense('category');
  $category->name = $name;
  $id = R::store($category);
  echo "$id: $name\n";
}

//==================================================
echo "\n---- photos\n\n";

$photos_dir = __DIR__ . "/../img/products/";

// get all files in $photos_dir minus the UNIX "." and ".."
$imageFiles = array_diff(scandir($photos_dir), [".", ".."]);
foreach ($imageFiles as $file) {
  $photo = R::dispense('photo');
  $photo->name = $file;
  $id = R::store($photo);
  echo "$id: $file\n";
}

//==================================================
echo "\n---- products\n\n";

$products_file = "products.txt";
$descriptions_dir = "descriptions";
if (!file_exists($products_file)) {
  die("missing file $products_file\n");
}
if (!is_dir($descriptions_dir)) {
  die("missing directory $descriptions_dir\n");
}
$product_details = file($products_file);

define("MAX_PRODUCTS", 30);

$products = [];

$num = 0;
foreach ($product_details as $str) {
  $info = trim($str);
  if (empty($info)) {
    continue;
  }
  if (substr($info, 0, 1) == "#") {
    continue;
  }
  if (++$num > MAX_PRODUCTS) {
    break;
  }
  list($category_name, $name, $price, $image_file) = array_map('trim', explode("|", $info));

  $category = R::findOne('category', 'name=?', [$category_name]);
  if (is_null($category)) {
    throw new Exception("missing category: $category_name");
  }
  
  $photo = R::findOne('photo', "name=?", [$image_file]);
  if (is_null($photo)) {
    throw new Exception("missing photo: $image_file");
  }

  // extract the portion without extension:
  preg_match("/(.*)\.\S+$/", $image_file, $match);
  $base = $match[1];

  // description file uses the base + ".html" extension
  // if it exists, read the contents into the description
  $description_file = "$descriptions_dir/$base.html";
  if (file_exists($description_file)) {
    $description = file_get_contents($description_file);
  }
  else {
    echo "--- missing description file : $base\n"; 
    $description = "";
  }

  $product = R::dispense('product');
  $product->name = $name;
  $product->category_id = $category->id;
  $product->price = $price;
  $product->photo_id = $photo->id;
  $product->description = $description;

  $id = R::store($product);

  $products[$id] = $product;

  echo "#$id: $name | $category->name | $price | $image_file\n";
}

//==================================================
echo "\n---- orders\n";

define("SECONDS_PER_DAY", 3600 * 24);

function randTimeNdaysPast($days) {
  $timestamp = time() - $days * SECONDS_PER_DAY + rand(0, SECONDS_PER_DAY);
  return date("Y-m-d H:i:s", $timestamp);
}

function makeOrder($user, $ndays, $prodQuant) {
  $order = R::dispense('order');
  $order->user_id = $user->id;
  $order->created_at = randTimeNdaysPast($ndays);
  echo "\nby $user->name on $order->created_at\n";
  foreach ($prodQuant as $arr) {
    list($prod, $quant) = $arr;
    echo " #$prod->id: $prod->name ($quant)\n";
    $order->link('selection', ['quantity' => $quant])->product = $prod;
  }
  R::store($order);
}

$alice = R::findOne('user', 'name=?', ["alice"]);
$john = R::findOne('user', 'name=?', ["john"]);
$bill = R::findOne('user', 'name=?', ["bill"]);

$ndays = 7;

makeOrder($alice, $ndays--, [
    [$products[1], 2],
    [$products[5], 3],
]);

makeOrder($alice, $ndays--, [
    [$products[13], 3],
    [$products[22], 1],
]);

makeOrder($bill, $ndays--, [
    [$products[22], 1],
    [$products[26], 2],
]);

makeOrder($alice, $ndays--, [
    [$products[3], 4],
    [$products[21], 1],
]);

makeOrder($bill, $ndays--, [
    [$products[1], 1],
    [$products[3], 3],
    [$products[5], 1],
    [$products[6], 2],
]);

R::commit();  // commit transaction

  