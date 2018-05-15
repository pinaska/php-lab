
    <?php
        $spaceBlog = file_get_contents('./data/posts.json');
        $spaceBlogArray = json_decode($spaceBlog, true);

        // echo "<pre>";
        // var_dump($spaceBlog);
        // echo "</pre>";

        // echo $spaceBlogArray['1']['title'];
        
        $index = 0;
        foreach ($spaceBlogArray as $article){
            $date = date("F d, Y", $article['post_date']);
            //I need last row because the last article does not have border
            $lastRow = ++$index === count($spaceBlogArray);
    
            echo "<h2>$article[title]</h2>" . "<em>$date</em>" ."<p>by $article[author]</p>" ."<p>$article[content]</p>";

            if (!$lastRow)
            echo "<hr>";

        };
    ?>