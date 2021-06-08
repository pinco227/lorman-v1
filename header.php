<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
  <META name="verify-v1" content="OJRMFOFKphnrSwShGCsyL7HjYtgCxZK2qMoASnMniYM=" />
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <?php
  if ((!isset($title)) || ($title == '')) $title = 'Haine din Piele :: LorMan di Mano :: Jachete Sacouri Geci Pantaloni Fuste Imbracaminte din Piele Naturala - Iasi';
  if ((!isset($desc)) || ($desc == '')) $desc = 'diMano Romania cele mai frumoase haine din piele facute cu cea mai noua tehnologie. Jachete Sacouri Geci Pantaloni Fuste Imbracaminte din Piele Naturala';
  ?>
  <title>
    <?php echo $title; ?>
  </title>

  <meta name="Keywords" content="hainapiele, hainedepiele, piele, hainedinpiele, cloth, geacadepiele, geci, piele, jachete, fuste, fusta piele pantaloni, sacou, sacouri piele lorman, di mano, corset, veste, bikere, bussines, sexy, magazin virtual, produse, naturala">
  <meta name="author" content="P4uL">
  <meta name="rating" content="GENERAL">
  <meta name="description" content="<?php echo $desc; ?>">
  <meta name="subject" content="diMano Romania cele mai frumoase haine din piele facute cu cea mai noua tehnologie. Jachete Sacouri Geci Pantaloni Fuste din Piele Naturala">
  <meta name="classification" content="diMano Romania cele mai frumoase haine din piele facute cu cea mai noua tehnologie. Jachete Sacouri Geci Pantaloni Fuste din Piele Naturala">
  <meta name="copyright" content="LorMan S.R.L. @ 2006. Toate drepturile sunt rezervate. - http://www.lorman.ro">
  <meta name="robots" content="index,follow">
  <meta name="geography" content="Romania, Iasi">
  <meta name="language" content="Romanian">
  <meta HTTP-EQUIV="expires" content="never">
  <meta name="designer" content="P4uL">
  <meta name="publisher" content="di Mano">
  <meta name="distribution" content="Global">
  <meta name="city" content="Iasi">
  <meta name="country" content="Romania">

  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="favicon.ico" rel="shortcut icon" type="image/x-icon">
</head>

<body>
  <table width="800" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
      <td height="120" colspan="3">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="442"><img src="images/a_03.gif" width="442" height="120" alt=""></td>
            <td width="200" align="center"><img src="images/animatie.gif" alt="">&nbsp;</td>
            <td>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td bgcolor="#412F13" height="9"><img src="images/a_13.gif" width="9" height="9" alt=""></td>
                  <td align="right" bgcolor="#412F13" height="9"><img src="images/a_15.gif" width="9" height="9" alt="">
                  </td>
                </tr>
                <tr>
                  <td colspan="2" class="lk" align="center">
                    <div style="border-bottom:solid; border-bottom-width: 1px;">COS</div>
                    <table>
                      <tr>
                        <td></td>
                      </tr>
                    </table>
                    <div style="font-size:12px;">
                      <?php
                      error_reporting(0);

                      $table = getenv('REMOTE_ADDR');
                      $table = str_replace('.', '_', $table);

                      $intrari_totale = mysqli_num_rows(mysqli_query($conexiune, 'SELECT `id` FROM `' . $table . '`'));
                      if ($intrari_totale == 0) echo '<font color="white">0 produse</font>';
                      else echo '<font color="yellow">' . $intrari_totale . ' produs(e)</font>';
                      ?>
                      |
                      <?php
                      $table = getenv('REMOTE_ADDR');
                      $table = str_replace('.', '_', $table);

                      $cerereSUM = 'SELECT SUM(`pret`) FROM `' . $table . '`';
                      $pret_total = mysqli_num_rows(mysqli_query($conexiune, $cerereSUM));

                      if ($pret_total == '') echo '<font color="white">0 RON / 0 &euro;</font>';
                      else {
                        $euro = round($pret_total / 3);
                        echo '<font color="yellow">' . $pret_total . ' RON / ' . $euro . ' &euro;</font>';
                      }
                      ?>
                    </div>
                    <table>
                      <tr>
                        <td></td>
                      </tr>
                    </table>
                    <a href="vezi_cos.php" class="lk2">Vezi cos</a> | <a href="trimite.php" class="lk2">Comanda</a>
                  </td>
                </tr>
                <tr>
                  <td bgcolor="#412F13" height="10"><img src="images/a_18.gif" width="9" height="10" alt=""></td>
                  <td align="right" bgcolor="#412F13" height="10"><img src="images/a_20.gif" width="9" height="10" alt=""></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td height="32" style="background-image:url(images/a_08.gif);"><img src="images/a_07.gif" width="15" height="32" alt=""></td>
      <td width="100%" height="32" align="center" class="lk3" style="background-image:url(images/a_08.gif);"><a href="index.php">Prima pagina</a> | <a href="intretinere.php">Intretinere Piele</a> | <a href="contact.php">Contact</a> | <a href="admin.php">Admin</a></td>
      <td height="32" style="background-image:url(images/a_08.gif);" align="right"><img src="images/a_09.gif" width="16" height="32" alt=""></td>
    </tr>
    <tr>
      <td colspan="2" height="5"> </td>
    </tr>
    <tr>
      <td colspan="3">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="3"></td>
            <td width="150" valign="top">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td bgcolor="#412F13" height="9"><img src="images/a_13.gif" width="9" height="9" alt=""></td>
                  <td align="right" bgcolor="#412F13" height="9"><img src="images/a_15.gif" width="9" height="9" alt="">
                  </td>
                </tr>
                <tr>
                  <td colspan="2" class="lk">
                    <script type="text/javascript">
                      <?php
                      $sacouri1 = mysqli_num_rows(mysqli_query(
                        $conexiune,
                        'SELECT `id` FROM `produse` WHERE `cat`="Femei" AND `subcat`="Sacouri"'
                      ));
                      $scurte1 = mysqli_num_rows(mysqli_query(
                        $conexiune,
                        'SELECT `id` FROM `produse` WHERE `cat`="Femei" AND `subcat`="Scurte"'
                      ));
                      $hainelungi1 = mysqli_num_rows(mysqli_query(
                        $conexiune,
                        'SELECT `id` FROM `produse` WHERE `cat`="Femei" AND `subcat`="Haine lungi"'
                      ));
                      $jackete1 = mysqli_num_rows(mysqli_query(
                        $conexiune,
                        'SELECT `id` FROM `produse` WHERE `cat`="Femei" AND `subcat`="Jackete"'
                      ));
                      $veste1 = mysqli_num_rows(mysqli_query(
                        $conexiune,
                        'SELECT `id` FROM `produse` WHERE `cat`="Femei" AND `subcat`="Veste"'
                      ));
                      $biker1 = mysqli_num_rows(mysqli_query(
                        $conexiune,
                        'SELECT `id` FROM `produse` WHERE `cat`="Femei" AND `subcat`="Biker"'
                      ));
                      $pantaloni1 = mysqli_num_rows(mysqli_query(
                        $conexiune,
                        'SELECT `id` FROM `produse` WHERE `cat`="Femei" AND `subcat`="Pantaloni"'
                      ));
                      $rochii = mysqli_num_rows(mysqli_query(
                        $conexiune,
                        'SELECT `id` FROM `produse` WHERE `cat`="Femei" AND `subcat`="Rochii"'
                      ));
                      $fuste = mysqli_num_rows(mysqli_query(
                        $conexiune,
                        'SELECT `id` FROM `produse` WHERE `cat`="Femei" AND `subcat`="Fuste"'
                      ));
                      $pantaloniscurti = mysqli_num_rows(mysqli_query(
                        $conexiune,
                        'SELECT `id` FROM `produse` WHERE `cat`="Femei" AND `subcat`="Pantaloni scurti"'
                      ));
                      $corsete = mysqli_num_rows(mysqli_query(
                        $conexiune,
                        'SELECT `id` FROM `produse` WHERE `cat`="Femei" AND `subcat`="Corsete"'
                      ));
                      $sacouri2 = mysqli_num_rows(mysqli_query(
                        $conexiune,
                        'SELECT `id` FROM `produse` WHERE `cat`="Barbati" AND `subcat`="Sacouri"'
                      ));
                      $scurte2 = mysqli_num_rows(mysqli_query(
                        $conexiune,
                        'SELECT `id` FROM `produse` WHERE `cat`="Barbati" AND `subcat`="Scurte"'
                      ));
                      $hainelungi2 = mysqli_num_rows(
                        mysqli_query(
                          $conexiune,
                          'SELECT `id` FROM `produse` WHERE `cat`="Barbati" AND `subcat`="Haine lungi"'
                        ),
                        0
                      );
                      $jackete2 = mysqli_num_rows(mysqli_query(
                        $conexiune,
                        'SELECT `id` FROM `produse` WHERE `cat`="Barbati" AND `subcat`="Jackete"'
                      ));
                      $veste2 = mysqli_num_rows(mysqli_query(
                        $conexiune,
                        'SELECT `id` FROM `produse` WHERE `cat`="Barbati" AND `subcat`="Veste"'
                      ));
                      $biker2 = mysqli_num_rows(mysqli_query(
                        $conexiune,
                        'SELECT `id` FROM `produse` WHERE `cat`="Barbati" AND `subcat`="Biker"'
                      ));
                      $house = mysqli_num_rows(mysqli_query(
                        $conexiune,
                        'SELECT `id` FROM `produse` WHERE `cat`="Barbati" AND `subcat`="House"'
                      ));
                      $pantaloni2 = mysqli_num_rows(mysqli_query(
                        $conexiune,
                        'SELECT `id` FROM `produse` WHERE `cat`="Barbati" AND `subcat`="Pantaloni"'
                      ));
                      $masculin = mysqli_num_rows(mysqli_query(
                        $conexiune,
                        'SELECT `id` FROM `produse` WHERE `cat`="Bussines" AND `subcat`="Masculin"'
                      ));
                      $dama2 = mysqli_num_rows(mysqli_query(
                        $conexiune,
                        'SELECT `id` FROM `produse` WHERE `cat`="Bussines" AND `subcat`="Dama"'
                      ));
                      // if($sacouri1 != 0) {echo '['.$sacouri1.']';} else {echo '';}

                      ?>
                      //Contents for menu 1
                      var menu1 = new Array()
                      menu1[0] = '<a href="produse.php?cat=Femei&subcat=Sacouri">Sacouri</a>'
                      menu1[1] = '<a href="produse.php?cat=Femei&subcat=Scurte">Scurte</a>'
                      menu1[2] = '<a href="produse.php?cat=Femei&subcat=Haine+lungi">Haine Lungi</a>'
                      menu1[3] = '<a href="produse.php?cat=Femei&subcat=Jackete">Jackete</a>'
                      menu1[4] = '<a href="produse.php?cat=Femei&subcat=Veste">Veste</a>'
                      menu1[5] = '<a href="produse.php?cat=Femei&subcat=Biker">Biker</a>'
                      menu1[6] = '<a href="produse.php?cat=Femei&subcat=Pantaloni">Pantaloni</a>'
                      menu1[7] = '<a href="produse.php?cat=Femei&subcat=Rochii">Rochii</a>'
                      menu1[8] = '<a href="produse.php?cat=Femei&subcat=Fuste">Fuste</a>'
                      menu1[9] = '<a href="produse.php?cat=Femei&subcat=Pantaloni+scurti">Pantaloni scurti</a>'
                      menu1[10] = '<a href="produse.php?cat=Femei&subcat=Corsete">Corsete</a>'
                      //Contents for menu 2, and so on
                      var menu2 = new Array()
                      menu2[0] = '<a href="produse.php?cat=Barbati&subcat=Sacouri">Sacouri</a>'
                      menu2[1] = '<a href="produse.php?cat=Barbati&subcat=Scurte">Scurte</a>'
                      menu2[2] = '<a href="produse.php?cat=Barbati&subcat=Haine+lungi">Haine Lungi</a>'
                      menu2[3] = '<a href="produse.php?cat=Barbati&subcat=Jackete">Jackete</a>'
                      menu2[4] = '<a href="produse.php?cat=Barbati&subcat=Veste">Veste</a>'
                      menu2[5] = '<a href="produse.php?cat=Barbati&subcat=Biker">Biker</a>'
                      menu2[6] = '<a href="produse.php?cat=Barbati&subcat=House">House</a>'
                      menu2[7] = '<a href="produse.php?cat=Barbati&subcat=Pantaloni">Pantaloni</a>'
                      var menu3 = new Array()
                      menu3[0] = '<a href="produse.php?cat=Bussines&subcat=Masculin">Barbati</a>'
                      menu3[1] = '<a href="produse.php?cat=Bussines&subcat=Dama">Dama</a>'
                      var disappeardelay = 250 //menu disappear speed onMouseout (in miliseconds)
                      var horizontaloffset = 2 //horizontal offset of menu from default location. (0-5 is a good value)
                      /////No further editting needed
                      var ie4 = document.all
                      var ns6 = document.getElementById && !document.all
                      if (ie4 || ns6)
                        document.write(
                          '<div id="dropmenudiv" style="visibility:hidden;width: 160px" onmouseover="clearhidemenu()" onmouseout="dynamichide(event)"></div>'
                        )

                      function getposOffset(what, offsettype) {
                        var totaloffset = (offsettype == "left") ? what.offsetLeft : what.offsetTop;
                        var parentEl = what.offsetParent;
                        while (parentEl != null) {
                          totaloffset = (offsettype == "left") ? totaloffset + parentEl.offsetLeft : totaloffset +
                            parentEl.offsetTop;
                          parentEl = parentEl.offsetParent;
                        }
                        return totaloffset;
                      }

                      function showhide(obj, e, visible, hidden, menuwidth) {
                        if (ie4 || ns6)
                          dropmenuobj.style.left = dropmenuobj.style.top = -500
                        dropmenuobj.widthobj = dropmenuobj.style
                        dropmenuobj.widthobj.width = menuwidth
                        if (e.type == "click" && obj.visibility == hidden || e.type == "mouseover")
                          obj.visibility = visible
                        else if (e.type == "click")
                          obj.visibility = hidden
                      }

                      function iecompattest() {
                        return (document.compatMode && document.compatMode != "BackCompat") ? document.documentElement :
                          document.body
                      }

                      function clearbrowseredge(obj, whichedge) {
                        var edgeoffset = 0
                        if (whichedge == "rightedge") {
                          var windowedge = ie4 && !window.opera ? iecompattest().scrollLeft + iecompattest()
                            .clientWidth - 15 : window.pageXOffset + window.innerWidth - 15
                          dropmenuobj.contentmeasure = dropmenuobj.offsetWidth
                          if (windowedge - dropmenuobj.x - obj.offsetWidth < dropmenuobj.contentmeasure)
                            edgeoffset = dropmenuobj.contentmeasure + obj.offsetWidth
                        } else {
                          var topedge = ie4 && !window.opera ? iecompattest().scrollTop : window.pageYOffset
                          var windowedge = ie4 && !window.opera ? iecompattest().scrollTop + iecompattest()
                            .clientHeight - 15 : window.pageYOffset + window.innerHeight - 18
                          dropmenuobj.contentmeasure = dropmenuobj.offsetHeight
                          if (windowedge - dropmenuobj.y < dropmenuobj.contentmeasure) { //move menu up?
                            edgeoffset = dropmenuobj.contentmeasure - obj.offsetHeight
                            if ((dropmenuobj.y - topedge) < dropmenuobj
                              .contentmeasure) //up no good either? (position at top of viewable window then)
                              edgeoffset = dropmenuobj.y
                          }
                        }
                        return edgeoffset
                      }

                      function populatemenu(what) {
                        if (ie4 || ns6)
                          dropmenuobj.innerHTML = what.join("")
                      }

                      function dropdownmenu(obj, e, menucontents, menuwidth) {
                        if (window.event) event.cancelBubble = true
                        else if (e.stopPropagation) e.stopPropagation()
                        clearhidemenu()
                        dropmenuobj = document.getElementById ? document.getElementById("dropmenudiv") : dropmenudiv
                        populatemenu(menucontents)
                        if (ie4 || ns6) {
                          showhide(dropmenuobj.style, e, "visible", "hidden", menuwidth)
                          dropmenuobj.x = getposOffset(obj, "left")
                          dropmenuobj.y = getposOffset(obj, "top")
                          dropmenuobj.style.left = dropmenuobj.x - clearbrowseredge(obj, "rightedge") + obj
                            .offsetWidth + horizontaloffset + "px"
                          dropmenuobj.style.top = dropmenuobj.y - clearbrowseredge(obj, "bottomedge") + "px"
                        }
                        return clickreturnvalue()
                      }

                      function clickreturnvalue() {
                        if (ie4 || ns6) return false
                        else return true
                      }

                      function contains_ns6(a, b) {
                        while (b.parentNode)
                          if ((b = b.parentNode) == a)
                            return true;
                        return false;
                      }

                      function dynamichide(e) {
                        if (ie4 && !dropmenuobj.contains(e.toElement))
                          delayhidemenu()
                        else if (ns6 && e.currentTarget != e.relatedTarget && !contains_ns6(e.currentTarget, e
                            .relatedTarget))
                          delayhidemenu()
                      }

                      function hidemenu(e) {
                        if (typeof dropmenuobj != "undefined") {
                          if (ie4 || ns6)
                            dropmenuobj.style.visibility = "hidden"
                        }
                      }

                      function delayhidemenu() {
                        if (ie4 || ns6)
                          delayhide = setTimeout("hidemenu()", disappeardelay)
                      }

                      function clearhidemenu() {
                        if (typeof delayhide != "undefined")
                          clearTimeout(delayhide)
                      }
                    </script>
                    <?php
                    $dama = mysqli_num_rows(mysqli_query($conexiune, 'SELECT `id` FROM `produse` WHERE `cat`="Femei"'));
                    $barbati = mysqli_num_rows(mysqli_query($conexiune, 'SELECT `id` FROM `produse` WHERE `cat`="Barbati"'));
                    $bussines = mysqli_num_rows(mysqli_query($conexiune, 'SELECT `id` FROM `produse` WHERE `cat`="Bussines"'));
                    $sexy = mysqli_num_rows(mysqli_query($conexiune, 'SELECT `id` FROM `produse` WHERE `cat`="Femei" AND (`subcat`="Fuste" OR `subcat`="Corsete" OR `subcat`="Pantaloni scurti")'));
                    ?>
                    <div class="div1" onmouseover="dropdownmenu(this, event, menu1, '125px')" onmouseout="delayhidemenu()" onClick="window.location='produse1.php?cat=Femei'"><a href="produse1.php?cat=Femei" class="lk">Dama</a>
                      <?php if ($dama != 0) {
                        echo '[' . $dama . ']';
                      } else {
                        echo '';
                      } ?>
                    </div>
                    <div class="div1" onmouseover="dropdownmenu(this, event, menu2, '100px')" onmouseout="delayhidemenu()" onClick="window.location='produse1.php?cat=Barbati'"><a href="produse1.php?cat=Barbati" class="lk">Barbati</a>
                      <?php if ($barbati != 0) {
                        echo '[' . $barbati . ']';
                      } else {
                        echo '';
                      } ?>
                    </div>
                    <div class="div1" onmouseover="dropdownmenu(this, event, menu3, '80px')" onmouseout="delayhidemenu()" onClick="window.location='produse1.php?cat=Bussines'"><a href="produse1.php?cat=Bussines" class="lk">Business </a>
                      <?php if ($bussines != 0) {
                        echo '[' . $bussines . ']';
                      } else {
                        echo '';
                      } ?>
                    </div>
                    <div class="div1" onClick="window.location='sexy.php'"><a href="sexy.php" class="lk">Sexy </a>
                      <?php if ($sexy != 0) {
                        echo '[' . $sexy . ']';
                      } else {
                        echo '';
                      } ?>
                    </div>
                    <div class="div1" onClick="window.location='vezi_cos.php'"><a href="vezi_cos.php" class="lk">Vezi
                        Cos</a></div>
                  </td>
                </tr>
                <tr>
                  <td bgcolor="#412F13" height="10"><img src="images/a_18.gif" width="9" height="10" alt=""></td>
                  <td align="right" bgcolor="#412F13" height="10"><img src="images/a_20.gif" width="9" height="10" alt=""></td>
                </tr>
              </table>
              <table>
                <tr>
                  <td></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="9"><img src="images/a_22.gif" width="9" height="22" alt=""></td>
                  <td width="100%" align="center" valign="middle" class="other1" style="background-image:url(images/a_23.gif);">Cauta</td>
                  <td width="9" align="right"><img src="images/a_24.gif" width="9" height="22" alt=""></td>
                </tr>
                <tr>
                  <td colspan="3" class="other" align="center">
                    <form action="cauta.php" method="post" name="cauta" style="margin: 0px 0px 0px 0px;">
                      <select name="in">
                        <option value="">------ Alege ------</option>
                        <option value="Femei">Dama</option>
                        <option value="Barbati">Barbati</option>
                        <option value="Bussines">Bussines</option>
                      </select><br>
                      <input type="text" name="de_cautat" value="" size="15"><br>
                      <input name="cauta" type="image" src="images/cauta.gif" style="width:80; height:26;">
                    </form>
                  </td>
                </tr>
                <tr>
                  <td width="9" height="9"><img src="images/a_26.gif" width="9" height="9" alt=""></td>
                  <td height="9" style="background-image:url(images/a_27.gif);"></td>
                  <td width="9" height="9"><img src="images/a_28.gif" width="9" height="9" alt=""></td>
                </tr>
              </table>
              <table>
                <tr>
                  <td></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="9"><img src="images/a_22.gif" width="9" height="22" alt=""></td>
                  <td width="100%" align="center" valign="middle" class="other1" style="background-image:url(images/a_23.gif);">Lingua</td>
                  <td width="9" align="right"><img src="images/a_24.gif" width="9" height="22" alt=""></td>
                </tr>
                <tr>
                  <td colspan="3" class="other" align="center">

                    <table border="0" align="center" cellpadding="5" cellspacing="5">
                      <tr>
                        <td bgcolor="#CC3333" align="center" valign="middle"><img src="images/flag_romania.png"></td>
                        <td align="center" valign="middle"><a href="/it/index.php" target="_parent"><img src="images/flag_italy.png"></a></td>
                      </tr>
                      <tr>
                        <td align="center" valign="middle">romana</td>
                        <td align="center" valign="middle">italiana</td>
                      </tr>
                    </table>

                  </td>
                </tr>
                <tr>
                  <td width="9" height="9"><img src="images/a_26.gif" width="9" height="9" alt=""></td>
                  <td height="9" style="background-image:url(images/a_27.gif);"></td>
                  <td width="9" height="9"><img src="images/a_28.gif" width="9" height="9" alt=""></td>
                </tr>
              </table>
              <table>
                <tr>
                  <td></td>
                </tr>
              </table>
            </td>
            <td width="642" valign="top" style="padding:5px 5px 5px 5px;">
              <table width="640" cellpadding="0" cellspacing="0" border="1" bordercolor="#990000" style="border-style:solid;" align="center">
                <tr>
                  <td style="color:#333333; width:90px; border:0px;" align="center">Anunturi !!</td>
                  <td style="width:550px; border:0px;">
                    <marquee style="color:#FF0000; width:550px; font-weight:bold;" direction="left" onMouseover="this.scrollAmount=3" onMouseout="this.scrollAmount=5">
                      <?php
                      $cerereSQL = 'SELECT * FROM `anunturi` ORDER BY `id` DESC';
                      $rezultat = mysqli_query($conexiune, $cerereSQL);

                      while ($rand = mysqli_fetch_assoc($rezultat)) {
                        echo ' * ' . $rand['text'] . ' * ';
                      }
                      ?>
                    </marquee>
                  </td>
                </tr>
              </table>
              <table>
                <tr>
                  <td></td>
                </tr>
              </table>