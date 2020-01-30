<?php

$allePaginas = '
        <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
        <META HTTP-EQUIV="EXPIRES" CONTENT="Mon, 22 Jul 2002 11:12:01 GMT">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="./components/css/FooterCSS.css">
        <link rel="stylesheet" href="./components/css/index.css">
        <link href="https://fonts.googleapis.com/css?family=IM+Fell+Great+Primer" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta property="og:image" content="https://fresh-dev.academy/ivar-wouter/components/images/image.jpg">
';


$timestamp = $_SERVER["REQUEST_TIME"];

$timestampday = date('d', $timestamp);
$timestampmonth = date('m', $timestamp);
$timestampyear = date('Y', $timestamp);

$browser = $_SERVER['HTTP_USER_AGENT'];
$ipaddress = $_SERVER["HTTP_X_REAL_IP"];

require('Mobile_Detect.php');
$detect = new Mobile_Detect;

if ($detect->isMobile()){
    $deskmob = 'mob';
} else {
    $deskmob = 'desk';
}

switch ($_SERVER["SCRIPT_NAME"]) {
    case "/ivar-wouter/index.php":
        $CURRENT_PAGE = "index";
        $PAGE_TITLE = "M&N Bodyfashion - Home";
        echo $allePaginas;
            if ($_SESSION["is_admin"] == 0){
                require('./components/dbconn.php');
                $sql1 = "INSERT INTO pdf (id, ip, page, browser, dag, maand, jaar, deskmob)
                VALUES ('', '$ipaddress', '$CURRENT_PAGE', '$browser', '$timestampday', '$timestampmonth', '$timestampyear', '$deskmob')";
                $statement1 = $conn->prepare($sql1);
                $statement1->execute();
            }

        $metadescription = array();
        $metakeywords = array();

        require ('./components/dbconn.php');
        $sqlindex = "SELECT * FROM metadata WHERE page = 'Index'";
        foreach($conn->query($sqlindex, PDO::FETCH_ASSOC) as $row) {
            $metadescription = $row['metadescription'];
            $metakeywords = $row['metakeywords'];
        }


        ?>
        <!--Include Persoonlijke CSS hier-->
        <link rel="stylesheet" href="./components/css/contentMain.css">
        <link rel="stylesheet" href="./components/css/nav.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="//wpcc.io/lib/1.0.2/cookieconsent.min.css"/>
        <script src="//wpcc.io/lib/1.0.2/cookieconsent.min.js"></script>
        <?php echo "<meta name='description' content='" . $metadescription . "'>";
        echo "<meta name='keywords' content='" . $metakeywords ."'>";

        break;


    case "/ivar-wouter/Acties.php":
        $CURRENT_PAGE = "Acties";
        $PAGE_TITLE = "M&N Bodyfashion - Acties";
        echo $allePaginas;
        if ($_SESSION["is_admin"] == 0){
            require('./components/dbconn.php');
            $sql1 = "INSERT INTO pdf (id, ip, page, browser, dag, maand, jaar, deskmob)
              VALUES ('', '$ipaddress', '$CURRENT_PAGE', '$browser', '$timestampday', '$timestampmonth', '$timestampyear', '$deskmob')";
            $statement1 = $conn->prepare($sql1);
            $statement1->execute();
        }

        $metadescription = array();
        $metakeywords = array();

        require ('./components/dbconn.php');
        $sqlacties = "SELECT * FROM metadata WHERE page = 'Acties'";
        foreach($conn->query($sqlacties, PDO::FETCH_ASSOC) as $row) {
            $metadescription = $row['metadescription'];
            $metakeywords = $row['metakeywords'];
        }

        ?>
        <!--Include Persoonlijke CSS hier-->
        <link rel="stylesheet" href="./components/css/contentActies.css">
        <link rel="stylesheet" href="./components/css/nav.css">
        <?php echo "<meta name='description' content='" . $metadescription . "'>";
        echo "<meta name='keywords' content='" . $metakeywords ."'>";


        break;

    case "/ivar-wouter/Contact.php":
        $CURRENT_PAGE = "Contact";
        $PAGE_TITLE = "M&N Bodyfashion - Contact";
        echo $allePaginas;

        if ($_SESSION["is_admin"] == 0){
            require('./components/dbconn.php');
            $sql1 = "INSERT INTO pdf (id, ip, page, browser, dag, maand, jaar, deskmob)
              VALUES ('', '$ipaddress', '$CURRENT_PAGE', '$browser', '$timestampday', '$timestampmonth', '$timestampyear', '$deskmob')";
            $statement1 = $conn->prepare($sql1);
            $statement1->execute();
        }

        $metadescription = array();
        $metakeywords = array();

        require ('./components/dbconn.php');
        $sqlcontact = "SELECT * FROM metadata WHERE page = 'Contact'";
        foreach($conn->query($sqlcontact, PDO::FETCH_ASSOC) as $row) {
            $metadescription = $row['metadescription'];
            $metakeywords = $row['metakeywords'];
        }

        ?>
        <!--Include Persoonlijke CSS hier-->
        <link rel="stylesheet" href="./components/css/contentContact.css">
        <link rel="stylesheet" href="./components/css/nav.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <?php echo "<meta name='description' content='" . $metadescription . "'>";
        echo "<meta name='keywords' content='" . $metakeywords ."'>";

        break;

    case "/ivar-wouter/dashboard.php":
        $CURRENT_PAGE = "dashboard";
        $PAGE_TITLE = "M&N Bodyfashion - Dashboard";
        echo $allePaginas;

        if ($_SESSION["is_admin"] == 0){
            require('./components/dbconn.php');
            $sql1 = "INSERT INTO pdf (id, ip, page, browser, dag, maand, jaar, deskmob)
              VALUES ('', '$ipaddress', '$CURRENT_PAGE', '$browser', '$timestampday', '$timestampmonth', '$timestampyear', '$deskmob')";
            $statement1 = $conn->prepare($sql1);
            $statement1->execute();
        }
        ?>
        <!--Include Persoonlijke CSS hier-->
        <link rel="stylesheet" href="./components/css/contentDashboard.css">
        <link rel="stylesheet" href="./components/css/navbardash.css">
        <?php
        break;

    case "/ivar-wouter/gebruikersbeheer.php":
        $CURRENT_PAGE = "gebruikersbeheer";
        $PAGE_TITLE = "M&N Bodyfashion - Gebruikersbeheer";
        echo $allePaginas;
        ?>
        <!--Include Persoonlijke CSS hier-->
        <link href="./components/css/contentGebruikersbeheer.css" rel="stylesheet">
        <link rel="stylesheet" href="./components/css/navbardash.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <?php
        break;

    case "/ivar-wouter/Lijst.php":
        $CURRENT_PAGE = "Lijst";
        $PAGE_TITLE = "M&N Bodyfashion - Lijst";
        echo $allePaginas;

        if ($_SESSION["is_admin"] == 0){
            require('./components/dbconn.php');
            $sql1 = "INSERT INTO pdf (id, ip, page, browser, dag, maand, jaar, deskmob)
              VALUES ('', '$ipaddress', '$CURRENT_PAGE', '$browser', '$timestampday', '$timestampmonth', '$timestampyear', '$deskmob')";
            $statement1 = $conn->prepare($sql1);
            $statement1->execute();
        }
        ?>
        <!--Include Persoonlijke CSS hier-->
        <link rel="stylesheet" href="./components/css/contentLijst.css">
        <link rel="stylesheet" href="./components/css/nav.css">
        <?php

        break;

    case "/ivar-wouter/log.php":
        $CURRENT_PAGE = "log";
        $PAGE_TITLE = "M&N Bodyfashion - Log";
        echo $allePaginas;
        ?>
        <!--Include Persoonlijke CSS hier-->
        <link rel="stylesheet" href="./components/css/contentLog.css">
        <link rel="stylesheet" href="./components/css/navbardash.css">
        <?php
        break;

    case "/ivar-wouter/login.php":
        $CURRENT_PAGE = "login";
        $PAGE_TITLE = "M&N Bodyfashion - Login";
        echo $allePaginas;

        if ($_SESSION["is_admin"] == 0){
            require('./components/dbconn.php');
            $sql1 = "INSERT INTO pdf (id, ip, page, browser, dag, maand, jaar, deskmob)
              VALUES ('', '$ipaddress', '$CURRENT_PAGE', '$browser', '$timestampday', '$timestampmonth', '$timestampyear', '$deskmob')";
            $statement1 = $conn->prepare($sql1);
            $statement1->execute();
        }

        ?>
        <!--Include Persoonlijke CSS hier-->
        <link rel="stylesheet" href="./components/css/login.css">
        <link rel="stylesheet" href="./components/css/nav.css">
        <?php
        break;

    case "/ivar-wouter/logout.php":
        $CURRENT_PAGE = "logout";
        $PAGE_TITLE = "M&N Bodyfashion - Logout";

        if ($_SESSION["is_admin"] == 0){
            require('./components/dbconn.php');
            $sql1 = "INSERT INTO pdf (id, ip, page, browser, dag, maand, jaar, deskmob)
              VALUES ('', '$ipaddress', '$CURRENT_PAGE', '$browser', '$timestampday', '$timestampmonth', '$timestampyear', '$deskmob')";
            $statement1 = $conn->prepare($sql1);
            $statement1->execute();
        }
        ?>
        <!--Include Persoonlijke CSS hier-->
        <link rel="stylesheet" href="./components/css/contentActies.css">
        <link rel="stylesheet" href="./components/css/nav.css">
        <?php

        break;

    case "/ivar-wouter/mailsysteem.php":
        $CURRENT_PAGE = "mailsysteem";
        $PAGE_TITLE = "M&N Bodyfashion - Mailsysteem";
        echo $allePaginas;
        ?>
        <!--Include Persoonlijke CSS hier-->
        <link rel="stylesheet" href="./components/css/contentMailSysteem.css">
        <link rel="stylesheet" href="./components/css/navbardash.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <?php
        break;

    case "/ivar-wouter/Merken.php":
        $CURRENT_PAGE = "Merken";
        $PAGE_TITLE = "M&N Bodyfashion - Merken";
        echo $allePaginas;

        if ($_SESSION["is_admin"] == 0){
            require('./components/dbconn.php');
            $sql1 = "INSERT INTO pdf (id, ip, page, browser, dag, maand, jaar, deskmob)
              VALUES ('', '$ipaddress', '$CURRENT_PAGE', '$browser', '$timestampday', '$timestampmonth', '$timestampyear', '$deskmob')";
            $statement1 = $conn->prepare($sql1);
            $statement1->execute();
        }

        $metadescription = array();
        $metakeywords = array();

        require ('./components/dbconn.php');
        $sqlmerken = "SELECT * FROM metadata WHERE page = 'Merken'";
        foreach($conn->query($sqlmerken, PDO::FETCH_ASSOC) as $row) {
            $metadescription = $row['metadescription'];
            $metakeywords = $row['metakeywords'];
        }

        ?>
        <!--Include Persoonlijke CSS hier-->
        <link rel="stylesheet" href="./components/css/contentMerken.css">
        <link rel="stylesheet" href="./components/css/nav.css">
        <?php echo "<meta name='description' content='" . $metadescription . "'>";
        echo "<meta name='keywords' content='" . $metakeywords ."'>";

        break;

    case "/ivar-wouter/merkenDash.php":
        $CURRENT_PAGE = "merkenDash";
        $PAGE_TITLE = "M&N Bodyfashion - Merken Dashboard";
        echo $allePaginas;
        ?>

        <!--Include Persoonlijke CSS hier-->
        <link rel="stylesheet" href="./components/css/merkenDash.css">
        <link rel="stylesheet" href="./components/css/navbardash.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

        <?php
        break;

    case "/ivar-wouter/OverOns.php":
        $CURRENT_PAGE = "OverOns";
        $PAGE_TITLE = "M&N Bodyfashion - Over Ons";
        echo $allePaginas;

        if ($_SESSION["is_admin"] == 0){
            require('./components/dbconn.php');
            $sql1 = "INSERT INTO pdf (id, ip, page, browser, dag, maand, jaar, deskmob)
              VALUES ('', '$ipaddress', '$CURRENT_PAGE', '$browser', '$timestampday', '$timestampmonth', '$timestampyear', '$deskmob')";
            $statement1 = $conn->prepare($sql1);
            $statement1->execute();
        }

        $metadescription = array();
        $metakeywords = array();

        require ('./components/dbconn.php');
        $sqloverons = "SELECT * FROM metadata WHERE page = 'Over Ons'";
        foreach($conn->query($sqloverons, PDO::FETCH_ASSOC) as $row) {
           $metadescription = $row['metadescription'];
           $metakeywords = $row['metakeywords'];
        }

        ?>
        <!--Include Persoonlijke CSS hier-->
        <link rel="stylesheet" href="./components/css/contentAboutUs.css">
        <link rel="stylesheet" href="./components/css/nav.css">
        <?php echo "<meta name='description' content='" . $metadescription . "'>";
        echo "<meta name='keywords' content='" . $metakeywords ."'>";

        break;

    case "/ivar-wouter/Spaarsysteem.php":
        $CURRENT_PAGE = "Spaarsysteem";
        $PAGE_TITLE = "M&N Bodyfashion - Spaarsysteem";
        echo $allePaginas;

        if ($_SESSION["is_admin"] == 0){
            require('./components/dbconn.php');
            $sql1 = "INSERT INTO pdf (id, ip, page, browser, dag, maand, jaar, deskmob)
              VALUES ('', '$ipaddress', '$CURRENT_PAGE', '$browser', '$timestampday', '$timestampmonth', '$timestampyear', '$deskmob')";
            $statement1 = $conn->prepare($sql1);
            $statement1->execute();
        }

        $metadescription = array();
        $metakeywords = array();

        require ('./components/dbconn.php');
        $sqlspaarsysteem = "SELECT * FROM metadata WHERE page = 'Spaarsysteem'";
        foreach($conn->query($sqlspaarsysteem, PDO::FETCH_ASSOC) as $row) {
            $metadescription = $row['metadescription'];
            $metakeywords = $row['metakeywords'];
        }

        ?>
        <!--Include Persoonlijke CSS hier-->
        <link rel="stylesheet" href="./components/css/contentSpaar.css">
        <link rel="stylesheet" href="./components/css/nav.css">
        <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.5/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.5/css/froala_style.min.css" rel="stylesheet" type="text/css" />
        <?php echo "<meta name='description' content='" . $metadescription . "'>";
        echo "<meta name='keywords' content='" . $metakeywords ."'>";

        break;

    case "/ivar-wouter/exportPDF.php":
        $CURRENT_PAGE = "exportPDF";
        $PAGE_TITLE = "M&N Bodyfashion - exportPDF";
        echo $allePaginas;
        ?>
        <!--Include Persoonlijke CSS hier-->
        <link rel="stylesheet" href="./components/css/contentPDF.css">
        <link rel="stylesheet" href="./components/css/navbardash.css">
        <?php
        break;

    case "/ivar-wouter/seo.php":
        $CURRENT_PAGE = "seo";
        $PAGE_TITLE = "M&N Bodyfashion - SEO";
        echo $allePaginas;
        ?>
        <link rel="stylesheet" href="./components/css/contentSEO.css">
        <link rel="stylesheet" href="./components/css/navbardash.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<?php
}
?>