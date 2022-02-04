<?php 
    $products = [
        ['nome' => 'Macbook air',
         'prezzo' => 1000,
         'img' => 'mac.jpg',
         'tipologia' => 'pc'],

         ['nome' => 'Cuffie trust',
         'prezzo' => 70,
         'img' => 'trust.jpg',
         'tipologia' => 'accessori'],

         ['nome' => 'magic mouse',
         'prezzo' => 100,
         'img' => 'mm.jpg',
         'tipologia' => 'accessori'],
    ];
    $filteredproducts = $products;

    if (isset($_GET['select']) !== false) {
        $tipologia = $_GET['select'];
        if ($tipologia === 'all') {
          $filteredproducts = $products;
        } else {
          $filteredproducts = [];
          foreach ($products as $product) {
            if ($product['tipologia'] === $tipologia) {
              $filteredproducts[] = $product;

            }
             else if (($product['prezzo'] < $tipologia)) {
                $filteredproducts[] = $product;

            }
    }
}
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Snack 03-02-2022</title>
</head>
<body>
    <header class="header">
        <form action="index-php.php" method="GET">
            <select name="select" id="select">
                <option value="all">All</option>
                <option value="pc">PC</option>
                <option value="accessori">Accessori</option>
                <option value="999">Al di sotto di 1000</option>
                
            </select>
        <button>Cerca</button>
        </form>
    </header>
    <div class="container" >
        <?php 
                
            foreach ($filteredproducts as $product) { ?>
                <div class="cards">
                    <img src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/snack-0302/img/<?php echo $product['img'] ?>" class="img">
                    <h4> <?php echo $product['nome'] ?> </h4> 
                    <h5> <?php echo $product['tipologia'] ?> </h5>
                    <p> <?php echo $product['prezzo'] ?> </p>
                </div>

        <?php } 
        ?>
    </div>
    
</body>
</html>