<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Chris's Contact</title>
    <link rel="stylesheet" href="/styles/nav.css">
    <link rel="stylesheet" href="/styles/main.css">
    <link rel="stylesheet" href="/styles/project-page.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <nav></nav>
    <div id="main-container">
        <div class="sidebar"></div>
        <main>
            <?php
                $string = file_get_contents("project-pages/projects.json");
                $project_list = json_decode($string, true, 5);

                echo "<h1>" . $project_list[$_POST["project-id"]]["title"] . "</h1>";
                echo "<p>" . $project_list[$_POST["project-id"]]["description"] . "</p>";
            ?>

            <div id="gallery">
                <?php
                    foreach ($project_list[$_POST["project-id"]]["gallery"] as $sample) {
                        echo "<div>";

                        echo "<img src='" . $sample["image"] . "' alt='" . (isset($sample["alt"]) ? $sample["alt"] : $sample["label"]) . "'>";
                        echo "<h3>" . $sample["label"] . "</h3>";

                        echo "</div>";
                    }
                ?>
            </div>

            <h4>
                For more information, check out this project's
                <?php
                    $num_misc = count($project_list[$_POST["project-id"]]["misc"]);

                    $i = 0;
                    foreach ($project_list[$_POST["project-id"]]["misc"] as $sample) {
                        echo "<a href='" . $sample["link"] . "'>" . $sample["label"] . "</a>";

                        if ($i == $num_misc - 1) {
                            echo ".";
                        }
                        elseif ($i == $num_misc - 2) {
                            echo ", or ";
                        }
                        else {
                            echo ", ";
                        }

                        $i++;
                    }
                ?>
            </h4>

            <div>

            </div>
        </main>
        <div class="sidebar"></div>
    </div>

    <script>
        $(function () {
            $("nav").load("/nav.html");
        });
    </script>
</body>

</html>