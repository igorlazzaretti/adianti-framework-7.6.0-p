<?php

class NavegaDir extends TPage
{

    public function __construct()
    {
        parent::__construct();
        echo '<br> Aqui será construído o programa NavegaDir<br> <br>';

        $directory = "./";
        $scan = scandir($directory);

        sort($scan);

        $formattedScan = [];
        foreach ($scan as $scaned) {
            $fullPath = $directory . '/' . $scaned;
            
            $formattedEntries[] = [
            'name' => $scaned,
            'fullPath' => $fullPath,
            'isDirectory' => is_dir($fullPath),
            ];
            
        }

        //Display
        echo '<ul>';
        foreach ($formattedEntries as $entry){
            if (!$entry["isDirectory"]){
                echo "<li>" . $entry['name'] . "</li>";
            };
        };
        echo '</ul>';



        echo "\n";

    }
    
}
