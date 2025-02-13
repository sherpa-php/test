<?php

/**
 * Create the native Sherpa Test overlay.
 */
function overlay(): void
{
    echo "<div id='sherpa_test__overlay' 
               style='
                 position: fixed;
                 inset: 0; 
                 border: 6px solid #2fdc2f;
               '></div>";
}