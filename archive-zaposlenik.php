<?php
get_header();
?>

<?php
$sImageUrl = get_template_directory_uri().'/img/pozadina.jpg';
echo '<header class="masthead" style="background-image: url('.$sImageUrl.')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-10 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Zaposlenici</h1>
              <span class="subheading">Što kažu naši zaposlenici?</span>
            </div>
          </div>
        </div>
      </div>
</header>';
?>

<?php
echo '<div class="container-fluid text-center">
		<div class="zaposlenik-vrsta-item">
			    <h2>Kuhari</h2>';
				echo daj_zaposlenika( 'kuhar' );
				echo '<h2>Šefovi kuhinje</h2>';
				echo daj_zaposlenika( 'sef-kuhinje' );
				echo '<h2>Voditelji</h2>';
				echo daj_zaposlenika( 'voditelj' );
echo '</div></div>';
?>

<h2>Uz McDonald’s mogu.</h2>
<div class="boxes">
  <div class="box">
      <h3>Studenti</h3>
      <p>Fleksibilno radno vrijeme postavlja McDonald's na vrh ljestvice studentskih poslodavaca.</p>
      <p>Biram kada ću raditi.</p>
  </div>
  <div class="box">
      <h3>Napredovanje</h3>
      <p>Rad u McDonald'su pomaže u osobnoj izgradnji i napredovanju.</p>
      <p>McDonald's je uvijek tu, da vas podrži i  nagradi. </p>
  </div>
  <div class="box">
      <h3>Prvi posao</h3>
      <p>Uz pomoć kolega brzo sam savladala izazov zadataka.</p>
      <p>Timski rad nam je važan i zato na posao idem s lakoćom.</p>
  </div>
  <div class="box">
      <h3>Oni s više životnog iskustva</h3>
      <p>Mogu biti na usluzi sa svojim znanjem i iskustvom.
      </p>
      <p>Motivira me osjećaj da izađeš s posla zadovoljan.</p>
  </div>
  <div class="box">
      <h3>Osobe s invaliditetom</h3>
      <p>U McDonald'su sam naučio kako se organizirati, a to mi pomaže i kod kuće.
      </p>
      <p>Podrška kolega je velika. Jako sam zadovoljan!</p>
  </div>
</div>

<?php
get_footer();
?>
