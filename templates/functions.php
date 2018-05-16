 <?php
        $spaceBlog = file_get_contents('./data/posts.json');
        $spaceBlogArray = json_decode($spaceBlog, true);


    //sort posts by dates, descending
    function compareDate($a, $b){
    {
        if ($a['post_date'] == $b['post_date']) {
            return 0;
        }
        return ($a['post_date'] > $b['post_date']) ? -1 : 1;
    }

    }

    usort($spaceBlogArray, 'compareDate');

    //display posts in desc order: SORT_DESC
    //create new array; found on 10/05; stackoverflow
            // $dates = array();
            // foreach ($spaceBlogArray as $key => $row)
            // {
            //     $dates[$key] = $row['post_date'];
            // }
            // //  print_r($dates);     
            // //https://stackoverflow.com/questions/1597736/how-to-sort-an-array-of-associative-arrays-by-value-of-a-given-key-in-php    
            // array_multisort($dates, SORT_DESC, $spaceBlogArray);

    //start with index to get the last row
            $index = 0;
            foreach ($spaceBlogArray as $article){
                $date = date("F j, Y", $article['post_date']);
                //I need last row because the last article does not have border
                $lastRow = ++$index === count($spaceBlogArray);

        
                echo "<h2>$article[title]</h2>" . "<em>$date</em>" ."<p>by $article[author]</p>" ."<p>$article[content]</p>" . "<strong>Categorized in: </strong>";
                echo ucwords(implode(", ", $article['category']));

                if (!$lastRow){
                    echo "<hr>";
                }
                

            };

?>