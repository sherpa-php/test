<?php

/**
 * Create the native Sherpa Test overlay.
 */
function overlay(): void
{
    echo "<style>body { padding: 50px; font-family: monospace; }</style>

          <div id='sherpa_test__overlay' 
               style='
                 position: fixed;
                 z-index: -1;
                 inset: 0; 
                 border: 6px solid #2fdc2f;
               '></div>";
}