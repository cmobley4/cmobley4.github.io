<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Chris's Website</title>
    <link rel="stylesheet" href="/styles/nav.css">
    <link rel="stylesheet" href="/styles/main.css">
    <link rel="stylesheet" href="/styles/projects.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <nav></nav>
    <div id="main-container">
        <div class="sidebar"></div>
        <main>
            <h1>Projects</h1>
            <form action="/project_page.php" method="post" id="project-list">
                <?php
                    $string = file_get_contents("project-pages/projects.json");
                    $project_list = json_decode($string, true, 5);

                    $i = 0;
                    foreach ($project_list as $project) {
                        $button = '<button name="project-id" type="submit" value="' . $i . '" class="project-link">';
                        $button .= '<img src="' . $project["thumbnail"] . '" alt="' . $project["title"] . '">';
                        $button .= '<p>' . $project["title"] . '</p></button>';
                        echo $button;
                        $i++;
                    }
                ?>
            </form>
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