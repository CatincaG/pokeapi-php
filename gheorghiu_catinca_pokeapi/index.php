<?php include './includes/header.php' ?>

<?php

    // Configuration
    include './includes/config.php';

    //Instantiate curl
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://pokeapi.co/api/v2/pokemon?limit=40');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($curl);
    curl_close($curl);

    $data = json_decode($data);
    //echo '<pre>';
    //print_r($data);
    //echo '</pre>';

    // Get key array key
    $keyArray = $data->results;

?>

<main class="container">
    <!-- Page title -->
    <h1>Pokedex</h1>

    <!-- Search pokemon -->
    <h4>Want to know your pokemon better ?</h4>
    <div class="button">
        <a href="search.php">Find it here</a>
    </div>

    <!-- Pokemon list -->
    <h4>Have a look at this pokemons !</h4>
    <div class="table-css">
        <table>
        <tr>
            <th>Name</th>
            <th>Appearance</th>
            <th>Id</th>
        </tr>
        </table>
        <?php foreach($keyArray as $key => $test) { ?>
            <?php 
                // Get the url of each pokemon
                $url = $test->url;
                // Split the url
                $parts = explode('/', $url);
                // Get the second last part of the url
                $pokemonId = $parts[count($parts) - 2];
                // Dynamic URL image
                $image = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/$pokemonId.png";
            ?>

            <!-- Table -->
            <table>
                <tr>
                    <td><?= ucfirst($test->name) ?></td>
                    <td><img src="<?= $image ?>" alt="<?= ucfirst($name) ?>"/></td>
                    <td>N° <?= $pokemonId ?></td>
                </tr>
            </table>

        <?php } ?>
    </div>
</main>


<?php include './includes/footer.php' ?>



