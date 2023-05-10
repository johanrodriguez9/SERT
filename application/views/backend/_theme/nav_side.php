<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!--

<li class="nav-item ">
    <a class="nav-link" href="<?= site_url('backend') ?>">
        <i class="material-icons">Inicio</i>
        <p> Inicio </p>
    </a>
</li>
-->
<!--
<li class="nav-item ">
    <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
        <i class="material-icons">image</i>
        <p> Administracion 
            <b class="caret"></b>
        </p>
    </a>
    <div class="collapse" id="pagesExamples">
        <ul class="nav">
            <li class="nav-item ">
                <a class="nav-link" href="<?= site_url(Hasher::make(21)) ?>">
                    <span class="sidebar-mini"> P </span>
                    <span class="sidebar-normal"> Usuarios </span>
                </a>
            </li>
        </ul>
    </div>
</li>-->

<?php
$conter = 0;
foreach (Hasher::getMenu() as $mKey => $mVal) {
    $conter++;
    if (gettype($mVal) == "string") {
        if (isset($mMenu)) {
            if ($mKey == $mMenu) {
              //  echo "<li class='active'>";
            } else {
               // echo "<li>";
            }
        } else {
          //  echo "<li>";
        }
        echo "<li class='dropdown'>";
        echo '<a class="nav-link menu-title" href="'.base_url($mVal).'"><i class="side-menu__icon fe fe-airplay"></i><span class="side-menu__label">' . $mKey . '</span></a>';
        echo "</li>";
    } elseif (gettype($mVal) == "array") {
        if (isset($mMenu)) {
            if ($mSubMenu == $mKey) {
                //echo "<li >";
            } else {
                //echo "<li class='xn-openable'>";
            }
        } else {
               echo "<li class='dropdown'>";
        }
        echo' <a class="nav-link menu-title" data-toggle="slide" href="#'. $mKey .'"><i class="side-menu__icon '.Mapping::iconn()[$conter].'"></i><span class="side-menu__label"> '. $mKey .'</span></a>';

        // echo ' <div class="collapse" id="'. $mKey .'"> ' ;
        echo ' <ul class="nav-submenu menu-content"> ' ;
        foreach ($mVal as $smKey => $smVal) {
            if (isset($mMenu) && isset($mSubMenu)) {
                if ($mKey == $mSubMenu && $smKey == $mMenu) {
                   // echo "<li >";
                } else {
                   // echo "<li>";
                }
            } else {
                //echo "<li>";
                 echo ' <li>';
            }
            echo'<a  class="slide-item" href="'.site_url($smVal).'">';
              /* echo''.substr($smKey, 0, 1).' ';*/
            echo' <span class="sidebar-normal">  '. $smKey.' </span>';
            echo' </a>    ';
         echo'   </li>';
        }
          echo '</ul>';
   // echo ' </div>';
echo '</li>';

    }

}

?>

 







