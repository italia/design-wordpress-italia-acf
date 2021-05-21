    <?php
    /*
     * sidebar per amministrazione trasparente - plugin
     */
        ?>

    <nav class="navbar it-navscroll-wrapper navbar-expand-lg it-bottom-navscroll it-left-side affix-top">
            <button class="custom-navbar-toggler" type="button" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation" data-target="#navbarNav"><span class="it-list"></span>Amministrazione Trasparente
            </button>
            <div class="navbar-collapsable" id="navbarNav">
                <div class="overlay"></div>
                <div class="close-div sr-only">
                    <button class="btn close-menu" type="button"><span class="it-close"></span>Chiudi</button>
                </div>
                <a class="it-back-button" href="#">
                    <svg class="icon icon-sm icon-primary align-top">
                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/bootstrap-italia/svg/sprite.svg#it-chevron-left"></use>
                    </svg>
                    <span>Indietro</span></a>
                <div class="menu-wrapper">

                    <div class="link-list-wrapper">
                        <h3>Amministrazione Trasparente</h3>

                        <?php
                        foreach (amministrazionetrasparente_getarray() as $inner) {

	                        echo '<ul  class="link-list"><li class="nav-item"><span class="nav-link"><b>'.$inner[0].'</b></span>';
	                        $atreturn = '';
	                        foreach ($inner[1] as $value) {
		                        $atreturn .= '<li class="nav-item"><a class="nav-link" href="' . get_term_link( get_term_by('name', $value, 'tipologie'), 'tipologie' ) . '" title="' . $value . '"><span>' . $value . '</span></a></li>';
	                        }
	                        echo '<ul class="link-list">'.$atreturn.'</ul>';

	                        echo '</li></ul>';
                        }

                        ?>
                    </div>
                </div>
            </div>
    </nav>
     <?php

?>
